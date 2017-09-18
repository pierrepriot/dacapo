<?php

$xitiPage = "/test";
$xitiNiveau = "0";

// tout ceci, only si dans content
if ((strpos($_SERVER['REQUEST_URI'],"backoffice") === false)&&(isset($courant))){

	$xitiPage = $courant['path'];
	
	$xitiPage = str_replace("/mre", "", $xitiPage);
	$xitiPage = ereg_replace("^/(.*)", "\\1", $xitiPage);
	$xitiPage = ereg_replace("(.*)/$", "\\1", $xitiPage);
	$xitiPage = str_replace("/", "::", $xitiPage);
	
	$xitiPage = ereg_replace("(.*)::$", "\\1::", $xitiPage);
	
	$pageBaseName = str_replace(".php", "", basename($_SERVER['PHP_SELF']));
	
	if ($pageBaseName == "index"){
		// index. rien à ajouter	
	}
	else{
		$xitiPage .= "::".$pageBaseName;	
	}
	
	$xitiPage = removeXitiForbiddenChars($xitiPage);
	
	
	// cas des homes 
	if ($xitiPage == ""){
		$xitiPage = "accueil";
	}
	$xitiPage = strtolower($xitiPage);
	
	// niveau
	if (substr($xitiPage,0,3) == "sqa"){
		$xitiNiveau = "3";
	}
	else if (substr($xitiPage,0,3) == "car"){
		$xitiNiveau = "2";
		
	}
	else{
		$xitiNiveau = "1";
	}
?><script type="text/javascript">
<!--
xtnv = document;           //affiliation frameset : document, parent.document ou top.document
xtsd = "http://logi9";
xtsite = "204329";
xtn2 = "<?=$xitiNiveau?>";           //utiliser le numero du niveau 2 dans lequel vous souhaitez ranger la page
xtpage = "<?=$xitiPage?>";             //placer un libellé de page pour les rapports Xiti
xtdmc = "";           //Domaine cookie en ".monsite.fr" (optionnel)
xtprm = "";           //Paramètres supplémentaires (optionnel)
//-->
</script><script type="text/javascript" src="http://www.oremip.fr/backoffice/cms/js/xiti.js"></script><noscript>
<img width="1" alt="" height="1" src="http://logi9.xiti.com/hit.xiti?s=204339&s2=<?=$xitiNiveau?>&p=<?=$xitiPage?>&">
</noscript><?php
}
?>