<?php
if ((strpos($_SERVER['PHP_SELF'], "backoffice/") === false)&&(strpos($_SERVER['PHP_SELF'], "tmp/") === false)){

include_once("cms-inc/arbopage.lib.php");
include_once("cms-inc/include_cms.php");
include_once("cms-inc/include_class.php");
//include_once("cms-inc/utils/htmlentities4flash.lib.php");
//--------------------------------------------------------------------

// $idSite ------------------------------------------------------------
// param du referer --------------------------------------------
if ((isset($_REQUEST['refer'])) and ($_REQUEST['refer'] != "")){
	$referUrl = $_REQUEST['refer'];
}
else{
	$referUrl = $_SERVER['PHP_SELF'];
	//$referUrl = "http://".$_SERVER['HTTP_HOST']."/content/oredon/produits.php?id=10";
}
if (!isset($idSite)){	
	$idSite = path2idside($db, $referUrl);
} //-------------------------------------------------------------

// $courant ------------------------------------------------------------
if (!isset($courant)){
	// pour une page donnée, le module retourne 
	// la descrition du node courant, sa liste de fils	
	if ((isset($_REQUEST['path'])) and ($_REQUEST['path'] != "")){
		$urlToList = urldecode($_REQUEST['path']);
		$pathToList = substr ($urlToList, 0, strrpos ($urlToList, "/") + 1);
	}
	else{
		//$urlToList = '/content/oredon/produits.php?id=10';
		$urlToList = $_SERVER['PHP_SELF'];
		$pathToList = substr ($urlToList, 0, strrpos ($urlToList, "/") + 1);
	}
	// /content/BBCNR/ devient /content/
	if ($pathToList == '/content/'.path2minisiteRepertoire($db, $pathToList).'/'){
		$pathToList = '/content/';
	}
	
	$courant = getNodeInfosReverse($idSite,$db,$pathToList);
} // -----------------------------------------------------------

//<a href="#">sommaire</a> / <a href="#">fonctions globales du CMS</a>
$oSite = new Cms_site($idSite);
$aAriane = split(',', getFullVirtualPath($courant["id"]));

$aStrAriane = array('<a href="/content/'.$oSite->get_rep().'/" title="Sommaire">Sommaire</a>');
for ($ia=1;$ia<count($aAriane);$ia++){
	$subNode = getNodeInfos($db,$aAriane[$ia]);
	$aStrAriane[] = '<a href="/content'.$subNode['path'].'" title="'.ucfirst($subNode['libelle']).'">'.ucfirst($subNode['libelle']).'</a>';

}
echo join(' / ', $aStrAriane);


}
else{
	echo "menu dynamique - non fonctionnel en backoffice";
}
?>