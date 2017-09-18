<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); 
include_once('genfact_dc_famille.inc.php'); 

$iSaison = DEF_DC_SAISON;
$iTrim = 1;

// toutes les factures 2016*



$sql = 'SELECT * FROM dc_facture WHERE dc_facture.dc_designation LIKE "2016-%" ;';
$aFact = dbGetObjectsFromRequete('dc_facture', $sql);

 foreach($aFact as $k => $oFact){
	// changer le numéro
	$oFact->set_designation(str_replace('2016-', '2015-', $oFact->get_designation()));
	
	var_dump($oFact->get_designation());
	
	dbSauve($oFact);
	

	// mise à jour "à regler"	
	
	$_GET['force']=1;	
	genFactureForFamily($oFact->get_famille(), $iSaison, $iTrim, 2015);
 }



?>
<p><br /><a href="/backoffice/dc_famille/list_dc_famille.php">retour familles</a> - <a href="/backoffice/dc_inscription/list_dc_inscription.php">retour inscriptions</a></p>
