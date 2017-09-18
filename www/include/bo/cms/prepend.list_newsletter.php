<?php
$sql = 'SELECT f.* FROM dc_famille AS f WHERE  f.dc_statut=4 ;';

$aFam = dbGetObjectsFromRequete('dc_famille', $sql);

if ($aFam){
	foreach($aFam as $k => $oFam){		
	
		if (trim($oFam->get_emailmere())!=''){
                	$to = htmlentities($oFam->get_emailmere());
			$oNews = new newsletter();
			$oNews->set_theme(1);
			$addy = trim(strtolower($to));
			if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]+$/', $addy)==1){
				include($_SERVER['DOCUMENT_ROOT'].'/backoffice/cms/newsletter/newsletter_create.inc.php');
			} // fin if adresse valide		
			unset($oNews);
        	}
        	if (trim($oFam->get_emailpere())!=''){
                	$to = htmlentities($oFam->get_emailpere());
			$oNews = new newsletter();
			$oNews->set_theme(1);
			$addy = trim(strtolower($to));
			if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]+$/', $addy)==1){
				include($_SERVER['DOCUMENT_ROOT'].'/backoffice/cms/newsletter/newsletter_create.inc.php');
			} // fin if adresse valide		
			unset($oNews);
        	}		
	}// fin boucle famille
}
else{
        echo 'pas de famille';
}
?>