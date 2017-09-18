<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); 
$script = explode('/',$_SERVER['PHP_SELF']);
$script = $script[sizeof($script)-1];

if (is_file($_SERVER['DOCUMENT_ROOT'].'/include/bo/cms/prepend.'.$script))
	require_once('include/bo/cms/prepend.'.$script);

$aCustom = array();
$aCustom["JS"] = "";
$aCustom["Action"] = "<a href=\"batch_dc_facture.php?id=##id##\" title=\"G&eacute;n&eacute;rer le PDF\"><img src=\"/backoffice/cms/img/2013/icone/modifier-xml.png\"  alt=\"Cr&eacute;er une facture T1\" border=\"0\" /></a>";


include('cms-inc/autoClass/list.php');
?>