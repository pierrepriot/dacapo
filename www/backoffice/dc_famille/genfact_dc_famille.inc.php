<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); 

function genFactureForFamily($iFamille, $iSaison, $iTrim, $iYear=NULL){
	$oFam = new dc_famille($iFamille);
	$bReglee=1; // par defaut, jusqu'a trouver un impaye
	
	if ($iYear==NULL){
		$iYear=date('Y');
	}

        $oSaison = new dc_saison($iSaison);
        $sSaison=$oSaison->get_nom();
	
	// chercher les inscriptions de la famille pour la saison
	$sql = 'SELECT i.* FROM dc_inscription AS i, dc_eleve AS e, dc_formule AS f WHERE f.dc_nom NOT LIKE "%stage%" AND i.dc_formule = f.dc_id AND  i.dc_saison='.$iSaison.' AND i.dc_statut=4 AND i.dc_eleve = e.dc_id AND e.dc_famille = '.$iFamille.';';
	$aIns = dbGetObjectsFromRequete('dc_inscription', $sql);
	$aLignes=array();
	
	// la famille a t elle paye la cotisation
	if($oFam->get_adhok()=='1'){
		echo 'cotisation payee<br />';
	
		// chercher une ligne de facture pour la cotisation
		// designation Cotisation pour famille et saison
		$sql = 'SELECT * FROM dc_factureligne WHERE dc_designation = "Cotisation" AND dc_saison='.$iSaison.' AND dc_famille = '.$iFamille.';';
		$aCotisLignes = dbGetObjectsFromRequete('dc_factureligne', $sql);
		if ($aCotisLignes!=false){
			$oLigne = $aCotisLignes[0];
			if ($oLigne->get_trim()==$iTrim){
				echo 'cotisation facturee ce trimestre sur facture existante<br />';
				$aLignes[]=$oLigne;
			}
			else{
				echo 'cotisation deja facturee trimestre '.$oLigne->get_trim().'<br />';
			}
		}
		else{
			$oLigne = new dc_factureligne();
			$oLigne->set_famille($iFamille);
			$oLigne->set_designation('Cotisation');
			$oLigne->set_prix(30);
			$oLigne->set_quantite(1);
			$oLigne->set_remise(0);
			$oLigne->set_montant(30);
			$oLigne->set_tva(0);
			$oLigne->set_trim($iTrim);
			$oLigne->set_saison($iSaison);
			$oLigne->set_statut(4);
	
			$aLignes[]=$oLigne;
			
			//$bReglee=0; // la facture est donc à payer
		}
	}
	else{
		echo 'cotisation NON payee<br />';
		
		$oLigne = new dc_factureligne();
		$oLigne->set_famille($iFamille);
		$oLigne->set_designation('Cotisation');
		$oLigne->set_prix(30);
		$oLigne->set_quantite(1);
		$oLigne->set_remise(0);
		$oLigne->set_montant(30);
		$oLigne->set_tva(0);
		$oLigne->set_trim($iTrim);
		$oLigne->set_saison($iSaison);
		$oLigne->set_statut(4);
	
		$aLignes[]=$oLigne;
		
		$bReglee=0;
	}
	
	// sommer les inscriptions
	$aEleves=array();
	
	foreach($aIns as $k => $oIns){
		// trouver la formule
		$oForm = new dc_formule($oIns->get_formule());
		$oElev = new dc_eleve($oIns->get_eleve());
		$aEleves[$oIns->get_eleve()]=$oElev;
	
		$oLigne = new dc_factureligne();
		$oLigne->set_famille($iFamille);
		$fPrix = $oForm->get_tarif();
		$sDesign = $oForm->get_nom().' '.$oElev->get_nom().' '.$oElev->get_prenom();
		if(!preg_match('/carnet/msi', $oForm->get_nom())){
			$sDesign .= ' - trimestre '.$iTrim.' '.$sSaison; 
		}
		if($oIns->get_quinzaine()=='1'){
			$fPrix=$fPrix/2;
			$sDesign.=' (par quinzaine)';
		}
		echo $sDesign.' = '.$fPrix.'<br />';
		$oLigne->set_designation($sDesign);
		$oLigne->set_prix($fPrix);
		$oLigne->set_quantite(1);
		$oLigne->set_remise(0);
		$oLigne->set_montant($fPrix);
		$oLigne->set_tva(0);
		$oLigne->set_trim($iTrim);
		$oLigne->set_saison($iSaison);
		$oLigne->set_statut(4);	
	
		$aLignes[]=$oLigne;
		
		// reglee ?
		$getter = 'get_t'.$iTrim.'ok';
		if ($oIns->$getter()==0){
			$bReglee=0;
		}
		
		// calcul de la reduc
		if($oIns->get_reduit()=='1'){
			$iReduc=10;
		}	
	}
	// calcul de la reduc
	if (count($aEleves)==1){
		$iReduc=0;
	}
	elseif (count($aEleves)==2){
		$iReduc=10;
	}
	else{
		$iReduc=20;
	}
	
	echo count($aEleves).' eleves inscrits soit '.$iReduc.' % de reduc<br />';
	
	$fTotal=0;
	
	// appliquer l'eventuelle reduction et sommer
	foreach($aLignes as $k => $oLigne){
		$fMontant=$aLignes[$k]->get_montant();
		if ($oLigne->get_designation()!='Cotisation'){
			$aLignes[$k]->set_remise($iReduc);
			$fMontant=round(($fMontant*(100-$iReduc)))/100;
			$aLignes[$k]->set_montant($fMontant);
		}
		echo $fMontant.' euros <br />';
		$fTotal+=$fMontant;
	}
	
	// facture deja existante
	$sql = 'SELECT f.* FROM dc_facture AS f WHERE f.dc_statut = 4 AND f.dc_famille='.$iFamille.' AND dc_saison='.$iSaison.' AND dc_trim='.$iTrim.' AND dc_statut = 4 ORDER BY f.dc_designation DESC LIMIT 0 , 1;';
	$aFact = dbGetObjectsFromRequete('dc_facture', $sql);
	
	if (is_get('force')     &&      $aFact!=false   &&      count($aFact)==1){
		$oFact = $aFact[0];
		echo 'modification de facture existante<br />';
	}
	elseif ($aFact!=false       &&      count($aFact)==1){
		die('facture existante<br />forcer la <a href="'.$_SERVER['REQUEST_URI'].'&amp;force=1">modification</a>');
	}
	else{//nouvelle facture
		echo 'nouvelle facture<br />';
		// trouver le dernier num de facture
		$sql = 'SELECT f.* FROM dc_facture AS f WHERE f.dc_statut = 4 ORDER BY f.dc_designation DESC LIMIT 0 , 1;';
		$aFact = dbGetObjectsFromRequete('dc_facture', $sql);
		$sLatestFact = $aFact[0]->get_designation();
		$sLatestFact=(int)preg_replace('/^[0-9]{4}\-/si', '', $sLatestFact);
		$sLatestFact++;
		$sLatestFact=str_pad($sLatestFact, 3, '0', STR_PAD_LEFT);
		$oFact = new dc_facture();
		$oFact->set_designation($iYear.'-'.$sLatestFact);
	}
	$oFact->set_famille($iFamille);
	$oFact->set_montant($fTotal);
	$oFact->set_tva(0);
	$oFact->set_total($fTotal);
	$oFact->set_trim($iTrim);
	$oFact->set_reglee($bReglee);
	$oFact->set_saison($oIns->get_saison());
	$oFact->set_statut(4);
	
	echo '<strong>total : '.$fTotal.' euros</strong><br /><br />';
	
	if ($oFact->get_reglee()==1){
		echo '<strong>REGLEE</strong><br /><br />';
	}
	else{
		echo '<strong>A REGLER</strong><br /><br />';
	}
	
	if($iTrim==1){
		echo '<strong>trimestres suivants : '.($fTotal-30).' euros</strong><br />';
	}
	
	// sauver la facture
	$iFact = dbSauve($oFact);
	
	// purger les eventuelles lignes precedentes
	dbExecuteQueryQuiet('DELETE FROM dc_factureligne WHERE dc_facture='.$iFact.';');
	
	// sauver les lignes
	foreach($aLignes as $k => $oLigne){
		$oLigne->set_facture($iFact);
		dbSauve($oLigne);
	}
}
?>