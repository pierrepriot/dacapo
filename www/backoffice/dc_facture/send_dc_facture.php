<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); 
$script = explode('/',$_SERVER['PHP_SELF']);
$script = $script[sizeof($script)-1];

if (is_file($_SERVER['DOCUMENT_ROOT'].'/include/bo/cms/prepend.'.$script))
	require_once('include/bo/cms/prepend.'.$script);

// fetch factures et lignes en statut 4
$iSaison = DEF_DC_SAISON;

if (is_get('id')){
	$sql = 'SELECT f.* FROM dc_facture AS f WHERE  f.dc_id='.$_GET['id'].';';
}
else{
	$sql = 'SELECT f.* FROM dc_facture AS f WHERE  f.dc_statut=4 ;';
}
$aF = dbGetObjectsFromRequete('dc_facture', $sql);

/*$sql = 'SELECT l.* FROM dc_factureligne AS l WHERE l.dc_statut=4 ;';

$aL = dbGetObjectsFromRequete('dc_factureligne', $sql);
*/
$sql = 'SELECT f.* FROM dc_famille AS f WHERE  f.dc_statut=4 ;';

$aFam = dbGetObjectsFromRequete('dc_famille', $sql);

foreach($aF as $kF => $oF){
   if(is_get('id')	||	((trim($oF->get_montant())!='')	&&	($oF->get_envoyee()==0)	&&	is_file($_SERVER['DOCUMENT_ROOT'].'/tmp/'.$oF->get_designation().' Facture Da Capo.pdf'))){


        foreach($aFam as $kFam => $oFam){
                if ($oFam->get_id()==$oF->get_famille()){
                        //found !
                        break;
                }


        }

	if ($oF->get_reglee()==1){
		echo '<p>Facture r&eacute;gl&eacute;e ';
	}
	else{
		echo '<p>Facture &agrave; r&eacute;gler ';
	}

	// envoi du mail
	$aTrims=array('', 'premier', 'deuxi&egrave;me', 'troisi&egrave;me', 'stage');
	$from = '"Da Capo" <tresorier@dacapo.fr>';
	$sujet = 'Da Capo - facture '.html_entity_decode($aTrims[$oF->get_trim()]).' trimestre 2016/2017';
	$html = '<p>Bonjour,</p>
		<p>Voici la facture correspondant au '.$aTrims[$oF->get_trim()].' trimestre 2016/2017.</p>';

        if ($oF->get_reglee()==1){
                $html .= '<p>Facture r&eacute;gl&eacute;e - vous n\'avez rien &agrave; payer.</p> ';
        }
        else{
                $html .= '<p>Facture &agrave; r&eacute;gler, merci de nous faire parvenir votre r&eacute;glement.</p>';
        }

	$html .= '<p>Bonne r&eacute;ception,<p>
		<p>Pierre PRIOT<br />
		<strong>Da Capo !</strong><br />
		Tr&eacute;sorier<br />
		tresorier@dacapo.fr</p>';
	$text = strip_tags(html_entity_decode($html));
	$attach = $_SERVER['DOCUMENT_ROOT'].'/tmp/';
	$aName_file = array($oF->get_designation().' Facture Da Capo.pdf');
	$typeAttach='application/pdf';

	if (trim($oFam->get_emailmere())!=''){
	        $to = htmlentities($oFam->get_emailmere());
        }
        else{
        	$to = htmlentities($oFam->get_emailpere());
        }

	echo $to.'<br />';
	
	$bRes=false;
	$bRes= (bool) multiPartMail_file($to , $sujet , $html , $text, $from, $attach, $aName_file, $typeAttach);
	//multiPartMail_file('pierre@sdep.com', $sujet , $html , $text, $from, $attach, $aName_file, $typeAttach);
	if($bRes	&&	(trim($to)!='')){
		echo "envoi OK";
		$oF->set_envoyee(1);
		dbSauve($oF);
	}
	echo '<hr />';
   }
}
?>
