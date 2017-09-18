<?php
/*
sponthus 11/07/05

*/

/*

function makeMenu($idNoeud, $aMenu)
function getChildren($idNoeud, $aMenu)
function getNoeud($idNoeud, $aMenu)
function isAllowed ($rankUser, $rankNode)
*/

include_once($_SERVER['DOCUMENT_ROOT'].'/include/cms-inc/include_class.php');

$rankUser = $_SESSION['rank'];
$groupUser = $_SESSION['groupe'];
$groupOrdreUser = $_SESSION['groupeordre'];
$sFonct = $_SESSION['fonct'];

// fonctionnalités spécifiques BBMIX
if ($_SESSION['site'] == "BBMIX") $bSpecificBBMIX = 1;
else $bSpecificBBMIX = 0;

//=========================
// PARAMETRAGE DU MENU
$aMenu = array();

$aMenu[] = new Menu("", "main", "Menu", "", "ADMIN;GEST;REDACT");


// MENUS GENERIQUES ---------------------
include("cms-inc/menu.gen.inc.php");
// --------------------- MENUS GENERIQUES


// modules 
$aMenu[] = new Menu("main", "gestionmodules", "Modules", "");


// gestion des produits
if (isAllowed ($rankUser, "ADMIN;GEST;REDACT")){
	$aMenu[] = new Menu("gestionmodules", "gestiondc_famille", "Familles", $URL_ROOT."/backoffice/dc_famille/list_dc_famille.php");
	$aMenu[] = new Menu("gestionmodules", "gestiondc_eleve", "Eleves", $URL_ROOT."/backoffice/dc_eleve/list_dc_eleve.php");
	$aMenu[] = new Menu("gestionmodules", "gestiondc_inscription", "Inscriptions", $URL_ROOT."/backoffice/dc_inscription/list_dc_inscription.php");
	
	$aMenu[] = new Menu("gestionmodules", "gestiondc_facture", "Factures", $URL_ROOT."/backoffice/dc_facture/list_dc_facture.php");
	$aMenu[] = new Menu("gestionmodules", "gestiondc_factureligne", "Lignes de factures", $URL_ROOT."/backoffice/dc_factureligne/list_dc_factureligne.php");
	

	$aMenu[] = new Menu("gestionmodules", "gestiondc_cours", "Cours", $URL_ROOT."/backoffice/dc_cours/list_dc_cours.php");
	$aMenu[] = new Menu("gestionmodules", "gestiondc_discipline", "Disciplines", $URL_ROOT."/backoffice/dc_discipline/list_dc_discipline.php");
	$aMenu[] = new Menu("gestionmodules", "gestiondc_formule", "Formules", $URL_ROOT."/backoffice/dc_formule/list_dc_formule.php");
	$aMenu[] = new Menu("gestionmodules", "gestiondc_professeur", "Professeurs", $URL_ROOT."/backoffice/dc_professeur/list_dc_professeur.php");
	$aMenu[] = new Menu("gestionmodules", "gestiondc_saison", "Saison", $URL_ROOT."/backoffice/dc_saison/list_dc_saison.php");


	

}



// construction des éléments du menu
$aMenuFinal = makeMenu("main", $aMenu);

//=========================

//===========================
// menu Final
//===========================
$menuStruct = array( 
	'main' => $aMenuFinal
);
 
?>
