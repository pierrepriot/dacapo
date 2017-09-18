<?php
if ((strpos($_SERVER['PHP_SELF'], 'backoffice/') === false)||(strpos($_SERVER['PHP_SELF'], 'tmp/') === false)){

	include_once('cms-inc/arbopage.lib.php');
	include_once('cms-inc/include_cms.php');
	include_once('cms-inc/include_class.php');
	//--------------------------------------------------------------------	
	$sTitre = $courant['libelle'];
	if (strval($courant['id']) == 0){
		$sTitre = "Sommaire";		
	}
	//<h1>gestion des pages<br /></h1>
	echo "<h1 id=\"h1_".strtolower(accentPathToStrictPath($sTitre))."\">".strtoupper($sTitre)."</h1>";
}
else{
	echo 'titre dynamique - non fonctionnel en backoffice';
}
?>