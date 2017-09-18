<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); 
$script = explode('/',$_SERVER['PHP_SELF']);
$script = $script[sizeof($script)-1];

if (is_file($_SERVER['DOCUMENT_ROOT'].'/include/bo/cms/prepend.'.$script))
	require_once('include/bo/cms/prepend.'.$script);

// fetch factures et lignes en statut 4
$iSaison = DEF_DC_SAISON;

if (is_get('id')){
	$sql = 'SELECT f.* FROM dc_facture AS f WHERE  f.dc_id='.$_GET['id'].';';
}
else{
	$sql = 'SELECT f.* FROM dc_facture AS f WHERE  f.dc_statut=4 ;';
}
$aF = dbGetObjectsFromRequete('dc_facture', $sql);

$sql = 'SELECT l.* FROM dc_factureligne AS l WHERE l.dc_statut=4 ;';

$aL = dbGetObjectsFromRequete('dc_factureligne', $sql);

$sql = 'SELECT f.* FROM dc_famille AS f WHERE  f.dc_statut=4 ;';

$aFam = dbGetObjectsFromRequete('dc_famille', $sql);

foreach($aF as $kF => $oF){
   if(is_get('id')	||	((trim($oF->get_montant())!='')	&&	!is_file($_SERVER['DOCUMENT_ROOT'].'/tmp/'.$oF->get_designation().' Facture Da Capo.pdf'))){
	ob_start();

	echo '<p align="center"><img src="http://www.dacapo.fr/wp-content/uploads/dacapo-signature.png" /></p>';
	if ($oF->get_montant()>0){
		echo '<h1 align="center">FACTURE</h1>';
	}
	else{
		echo '<h1 align="center">FACTURE D\'AVOIR</h1>';
	}
	echo '<p><strong>Association Ecole de Musique Da Capo</strong><br />
	17, rue des Couteliers<br />
	31 000 Toulouse<br />
	Num. Siret : 794 925 321 00034</p>';


	foreach($aFam as $kFam => $oFam){
		if ($oFam->get_id()==$oF->get_famille()){
			echo '<p style="margin-left:400px"><big>';
			if (trim($oFam->get_nommere())!=''){
				echo htmlentities($oFam->get_nommere().' '.$oFam->get_prenommere());
			}
			else{
				echo htmlentities($oFam->get_nompere().' '.$oFam->get_prenompere());
			}

			if (trim($oFam->get_adressemere())!=''){
                                echo '<br />'.nl2br(htmlentities($oFam->get_adressemere()));
                        }
                        elseif (trim($oFam->get_adressepere())!=''){
                                echo '<br (>'.nl2br(htmlentities($oFam->get_adressepere()));
                        }
			echo '</big></p>';
			break;
		}


	}

        echo '<p>Num&eacute;ro de facture : '.$oF->get_designation().'<br />
        Date : '.substr($oF->get_cdate(), 0, 10).'</p>';


	echo '<table border="0" cellspacing="2" cellpadding="5" width="700" align="center" style="width:700px">';
	echo '<tr><td width="250" bgcolor="#AAAAAA">D&eacute;signation</td>
		<td width="80" bgcolor="#AAAAAA">Prix U.</td>
		<td width="80" bgcolor="#AAAAAA">Quantit&eacute;</td>
		<td width="80" bgcolor="#AAAAAA">Remise</td>
		<td width="80" bgcolor="#AAAAAA">Total</td></tr>';

	foreach($aL as $kL => $oL){
		if ($oL->get_facture()==$oF->get_id()){
			echo '<tr>';
			//mb_convert_encoding($oL->get_designation(), 'HTML-ENTITIES', 'UTF-8')
			echo '<td bgcolor="#CCCCCC" width="250">'.htmlentities($oL->get_designation()).'</td>';
			echo '<td align="right" bgcolor="#CCCCCC">'.$oL->get_prix().'</td>';
			echo '<td align="right" bgcolor="#CCCCCC">'.$oL->get_quantite().'</td>';
			if($oL->get_remise()>0){
				echo '<td align="right" bgcolor="#CCCCCC">'.$oL->get_remise().'%</td>';
			}
			else{
				echo '<td align="right" bgcolor="#CCCCCC"></td>';
			}
			echo '<td align="right" bgcolor="#CCCCCC">'.$oL->get_montant().'</td>';
			echo '</tr>';
		}
	}


	echo '<tr><td></td><td></td><td></td><td bgcolor="#AAAAAA">Total HT</td><td align="right" bgcolor="#CCCCCC">'.$oF->get_montant().'</td></tr>';
	echo '<tr><td></td><td></td><td></td><td bgcolor="#AAAAAA">TVA</td><td align="right" bgcolor="#CCCCCC">'.$oF->get_tva().'</td></tr>';
	echo '<tr><td></td><td></td><td></td><td bgcolor="#AAAAAA">Total Net</td><td align="right" bgcolor="#CCCCCC">'.$oF->get_total().'</td></tr>';
	echo '</table>';

	if ($oF->get_reglee()==1){
		echo '<p>Facture acquitt&eacute;e ';
		if ($oF->get_montant()<0){// facture d'avoir
			echo 'par ch&egrave;que';		
		}
		elseif (preg_match('/cash/msi', $oFam->get_desc())	||	preg_match('/cash/msi', $oFam->get_desc())){
			echo 'en esp&egrave;ces';
		}		
		else{
			echo 'par ch&egrave;que';
		}
	}
	else{
		echo '<p>Facture &agrave; r&eacute;gler ';
	}
	echo '</p>';

	echo '<p><small>TVA non applicable, art. 293 B du CGI</small></p>';

	$content = ob_get_flush();	

	
        //lib HTML2PDF
        require_once($_SERVER['DOCUMENT_ROOT'].'/include/cms-inc/lib/html2pdf_v4.03/html2pdf.class.php');


	$html2pdf = new HTML2PDF('P','A4','fr',$unicode=true, $encoding='UTF-8', $marges = array(10, 10, 10, 10));
        $html2pdf->setDefaultNumPage(1);
        $html2pdf->WriteHTML($content);
        $html2pdf->Output($_SERVER['DOCUMENT_ROOT'].'/tmp/'.$oF->get_designation().' Facture Da Capo.pdf','F');

	// envoi du mail
	$aTrims=array('', 'premier', 'deuxi&egrave;me', 'troisi&egrave;me', 'stage');
	$from = '"Da Capo" <tresorier@dacapo.fr>';
	$sujet = 'Da Capo - facture '.html_entity_decode($aTrims[$oF->get_trim()]).' trimestre 2016/2017';
	$html = '<p>Bonjour,</p>
		<p>Voici la facture correspondant au '.$aTrims[$oF->get_trim()].' trimestre 2016/2017.</p>
		<p>Bonne r&eacute;ception,<p>
		<p>Pierre PRIOT<br />
		<strong>Da Capo !</strong><br />
		Tr&eacute;sorier<br />
		tresorier@dacapo.fr</p>';
	$text = strip_tags(html_entity_decode($html));
	$attach = $_SERVER['DOCUMENT_ROOT'].'/tmp/';
	$aName_file = array($oF->get_designation().' Facture Da Capo.pdf');
	$typeAttach='application/pdf';

	if (trim($oFam->get_emailmere())!=''){
	        $to = htmlentities($oFam->get_emailmere());
        }
        else{
        	$to = htmlentities($oFam->get_emailpere());
        }

	echo $to.'<br />';

	//echo (bool) multiPartMail_file($to , $sujet , $html , $text, $from, $attach, $aName_file, $typeAttach);
	echo (bool) multiPartMail_file('pierre@sdep.com', $sujet , $html , $text, $from, $attach, $aName_file, $typeAttach);

	echo '<hr />';
   }
}
?>
