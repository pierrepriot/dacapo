<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); 
include_once('genfact_dc_famille.inc.php'); 

$iSaison = DEF_DC_SAISON;
//$iFamille = $_GET["display"];
$iTrim = $_GET["trim"];

// toutes les inscriptions du trimestre/saison, leur familles, leur facture pour le trimestre

$sql = 'SELECT DISTINCT fam.* FROM dc_famille AS fam, dc_inscription AS i, dc_eleve AS e, dc_formule AS f WHERE f.dc_nom NOT LIKE "%stage%" AND i.dc_formule = f.dc_id AND  i.dc_saison='.$iSaison.' AND i.dc_statut=4 AND i.dc_eleve = e.dc_id AND e.dc_famille = fam.dc_id AND (SELECT COUNT(*) FROM dc_facture WHERE dc_facture.dc_famille = fam.dc_id AND dc_facture.dc_saison = '.$iSaison.' AND dc_facture.dc_trim = '.$iTrim.' ) = 0;';

$aFam = dbGetObjectsFromRequete('dc_famille', $sql);

 foreach($aFam as $k => $oFam){
	//var_dump($oFam->get_id());
	genFactureForFamily($oFam->get_id(), $iSaison, $iTrim);
 }

?>
<p><br /><a href="/backoffice/dc_famille/list_dc_famille.php">retour familles</a> - <a href="/backoffice/dc_inscription/list_dc_inscription.php">retour inscriptions</a></p>
