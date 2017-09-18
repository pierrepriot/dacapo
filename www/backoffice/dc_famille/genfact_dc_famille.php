<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); 

$iSaison = DEF_DC_SAISON;
$iFamille = $_GET["display"];
$iTrim = $_GET["trim"];

include_once('genfact_dc_famille.inc.php'); 

genFactureForFamily($iFamille, $iSaison, $iTrim);

?>
<p><br /><a href="/backoffice/dc_famille/list_dc_famille.php">retour familles</a> - <a href="/backoffice/dc_inscription/list_dc_inscription.php">retour inscriptions</a> - <a href="/backoffice/dc_facture/list_dc_facture.php">retour factures</a></p>
