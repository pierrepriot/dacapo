<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php');
include_once('cms-inc/include_cms.php');
include_once('cms-inc/include_class.php');
header("Content-type: text/xml; charset=utf-8");

$debProcess = time();

// TRAITEMENT du POST XML -------------------
/*$aPOST = $GLOBALS['HTTP_POST_VARS'];
$sPOST = "";
foreach ($aPOST as $key => $value){
	$sPOST .= str_replace("_", " ", $key)."=".$value;
}
$sPOST = stripslashes($sPOST);*/
$sPOST = file_get_contents('php://input') ;
$stack = array();
xmlStringParse($sPOST);
$_HUB = array();
if (isset($stack[0]['attrs'])){
	foreach ($stack[0]['attrs'] as $attName => $attValue){
		if((int)intval(PHP_VERSION) >= 5){
			$_HUB[$attName] = $attValue;
		}
		else{
			$_HUB[$attName] = utf8_encode($attValue);
		}	
	}
}
//------------------------------------------

echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?".">\n";
echo "<adequat>\n";
echo "<retour>\n";

if ($stack[0]['name']=="CONTROLER"){
	include("modules/sap/fetchsap.php");

	
}
else{
	echo '<error message="mauvais appel" />';
}
echo "</retour>\n";
$endProcess = time();
echo "<process time=\"".($endProcess-$debProcess)."\" />\n";
echo "</adequat>";
?>