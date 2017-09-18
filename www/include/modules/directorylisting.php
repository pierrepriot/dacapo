<?php
if ((strpos($_SERVER['PHP_SELF'], 'backoffice/') === false)||(strpos($_SERVER['PHP_SELF'], 'tmp/') === false)){

	include_once('cms-inc/arbopage.lib.php');
	include_once('cms-inc/include_cms.php');
	include_once('cms-inc/include_class.php');
	//--------------------------------------------------------------------	
	
	$aChild = getNodeChildren($idSite, $db, $courant['id']);	
	if ($aChild != false){
		echo '<div id="listing">';
		for ($ic=0;$ic<count($aChild);$ic++){
			if (strval($aChild[$ic]['order']) != '0'){
				echo '<h2>';
				echo '<a href="/content'.$aChild[$ic]['path'].'" title="'.$aChild[$ic]['libelle'].'">';
				echo $aChild[$ic]['libelle'];
				echo '</a>';
				echo '</h2>';
			}
		}
		echo '</div>';	
	}	
}
else{
	echo 'titre dynamique - non fonctionnel en backoffice';
}
?>