<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); 
$script = explode('/',$_SERVER['PHP_SELF']);
$script = $script[sizeof($script)-1];

if (is_file($_SERVER['DOCUMENT_ROOT'].'/include/bo/cms/prepend.'.$script))
	require_once('include/bo/cms/prepend.'.$script);

$aCustom = array();
$aCustom["JS"] = " // js
function genfact(id, trim){
                document.##classePrefixe##_list_form.display.value = id;
                document.##classePrefixe##_list_form.actiontodo.value = \"GENFACT\";
                document.##classePrefixe##_list_form.action = \"genfact_dc_famille.php?display=\"+id+\"&trim=\"+trim;
                //document.##classePrefixe##_list_form.method = \"get\";
                document.##classePrefixe##_list_form.submit();
}
 ";
$aCustom["Action"] = "<a href=\"javascript:genfact(##id##, 1);\" title=\"Cr&eacute;er une facture T1\"><img src=\"/backoffice/cms/img/2013/icone/modifier-xml.png\"  alt=\"Cr&eacute;er une facture T1\" border=\"0\" /></a>";
$aCustom["Action"] .= "<a href=\"javascript:genfact(##id##, 2);\" title=\"Cr&eacute;er une facture T2\"><img src=\"/backoffice/cms/img/2013/icone/modifier-xml.png\"  alt=\"Cr&eacute;er une facture T2\" border=\"0\" /></a>";
$aCustom["Action"] .= "<a href=\"javascript:genfact(##id##, 3);\" title=\"Cr&eacute;er une facture T3\"><img src=\"/backoffice/cms/img/2013/icone/modifier-xml.png\"  alt=\"Cr&eacute;er une facture T3\" border=\"0\" /></a>";


include('cms-inc/autoClass/list.php');
?>