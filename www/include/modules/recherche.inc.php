<?php
if (strpos($_SERVER['PHP_SELF'], 'backoffice/') === false){
	include_once('cms-inc/arbopage.lib.php');
	include_once('cms-inc/include_cms.php');
	include_once('cms-inc/utils/htmlentities4flash.lib.php');
	
	// $idSite ------------------------------------------------------------
	if (!isset($minisite)){
	// param du referer --------------------------------------------
		if ((isset($_REQUEST['refer'])) and ($_REQUEST['refer'] != "")){
			$referUrl = $_REQUEST['refer'];
		}
		else{
			$referUrl = $_SERVER['PHP_SELF'];
		}		
		$minisite = path2minisiteRepertoire($db, $referUrl);
	} //-------------------------------------------------------------
}
else{
	echo 'menu dynamique - non fonctionnel en backoffice';
}
?>
<div id="form_recherche">
<form id="recherche" name="recherche" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input class="input" id="keyword" name="keyword" value="<?php
if ((is_post('keyword'))||(is_get('keyword'))){
	if (is_post('keyword')){
		echo trim($_POST['keyword']);
	}
	else{
		echo trim($_GET['keyword']);
	}
}
else{
	echo 'Rechercher dans le site';
}
?>" type="text" onfocus="update(this);" onkeypress="if(event.keyCode==13) searchwordSelf()" />
<a href="javascript:searchwordSelf();" title="Lancer la recherche"><img align="absmiddle" src="/custom/img/aws-documentation/bt_ok.gif" alt="ok" /></a>
</form>
<br style="clear: both;" />
<?php
if ((is_post('keyword'))||(is_get('keyword'))){
	include_once('cms-inc/swish.php');	
	
	$sFileName = $_SERVER['DOCUMENT_ROOT']."/custom/search/".strtoupper($minisite)."/donnees.index";
	
	if (is_post('keyword')){
		$words = trim($_POST['keyword']);
	}
	else{
		$words = trim($_GET['keyword']);
	}	
	
	if(strlen($words)>0) {
		$wordList = split(' ',$words);
		$args = join("* ", $wordList);
		$argspath = join(" AND ", $wordList);
		$args = $args.'*';
		$searchFolder = $_SERVER['DOCUMENT_ROOT'];
		$searchFolder = split("/",$searchFolder);
		array_pop($searchFolder);
		$searchFolder = join("/",$searchFolder);		
		$swishObj = new swish($sFileName);
		if (is_file('/usr/local/bin/swish-e')==true){
			$swishObj->str_engine = '/usr/local/bin/swish-e';
		}
		else{
			$swishObj->str_engine = '/usr/bin/swish-e';
		}
		$swishObj->set_params($args);
		$results = $swishObj->get_result();
		//var_dump($results);
	}
?>
<div id="resultats_recherche">
<?php
if(is_array($results)) {
	echo '<ul>';
	foreach($results as $k => $v){
		$aNode = dbGetObjectsFromFieldValue("Cms_arbo_pages", array("getAbsolute_path_name"), array(ereg_replace('[\./]*/content(/[^\.]+/)[^\.]+\.[^\.]+', '\\1', $v['URL'])), NULL);		
		if ((count($aNode) > 0)&&($aNode!=false)){
			foreach($aNode as $cKey => $oNode){
				$sLib = $oNode->get_libelle();
				break;				
			}
		}
		else{ // pas de node, titre fabriqué avec le nom du dossier
			$sLib = str_replace('_', ' ', ereg_replace('.*/([^/]+)/[^\.]+\.[^\.]+', '\\1', $v['URL']));			
		}
		echo '<li><a href="'.ereg_replace('[\./]*(/[^\.]+)', '\\1', $v['URL']).'?keyword='.$words.'">'.$sLib.'</a></li>';		
	}
	echo '</ul>';
} 
else{
	echo '<ul><li> Aucun résultat</li></ul>';
}
?>
</div>
<?php
}// fin if ((is_post('keyword'))||(is_get('keyword'))){
?>
</div>