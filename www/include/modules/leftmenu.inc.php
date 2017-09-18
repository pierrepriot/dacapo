<div id="col_menu">
<?php
if (strpos($_SERVER['PHP_SELF'], 'content/') !== false){

include('recherche.inc.php'); ?>
<div id="sommaire">
<div id="sommaire_liste">
<?php
function getNodeAsHTML($idSite, $db, $path, $currentNodeId=0){
	$aInfo = getNodeInfos($db, $path);
	if (intval($currentNodeId) == intval($aInfo["id"])){
		$aInfo["iscourant"] = 1;
	}
	else{
		$aInfo["iscourant"] = 0;
	}
	$aChidren = getNodeChildren($idSite, $db, $path);

	if ($aChidren != false){// write sub node - opened node
		echo '<ul><li><a href="/content'.$aInfo['path'].'" title="'.$aInfo['libelle'].'">'.$aInfo['libelle'].'</a>';
		for($i=0;$i<count($aChidren);$i++){
			if (intval($aChidren[$i]["order"]) != 0){
				getNodeAsHTML($idSite, $db, $aChidren[$i]["id"], $currentNodeId);
			}
		}
		echo "</li></ul>\n";
	}
	else{// closed node
		echo '<ul><li><a href="/content'.$aInfo['path'].'" title="'.$aInfo['libelle'].'">'.$aInfo['libelle'].'</a></li></ul>';
	}
}

$currentNodeId=$courant["id"];
$path =  '0';
$aInfo = getNodeInfos($db, 0);
if (intval($currentNodeId) == intval($aInfo["id"])){
	$aInfo["iscourant"] = 1;
}
else{
	$aInfo["iscourant"] = 0;
}
$aTop = getNodeChildren($idSite, $db, $path);

if ($aTop != false){
	// write sub node - opened node	
	for($i=0;$i<count($aTop);$i++){
		if (intval($aTop[$i]["order"]) != 0){
			echo '<h1><a href="/content'.$aTop[$i]['path'].'" title="'.$aTop[$i]['libelle'].'">'.$aTop[$i]['libelle'].'</a></h1>';
			$aChidren = getNodeChildren($idSite, $db, $aTop[$i]['id']);
			if ($aChidren != false){
				for($ii=0;$ii<count($aChidren);$ii++){
					getNodeAsHTML($idSite, $db, $aChidren[$ii]["id"], $currentNodeId);
				}
			}
		}
	}
}
?>
</div>
</div>
<?php
}
?>
</div>