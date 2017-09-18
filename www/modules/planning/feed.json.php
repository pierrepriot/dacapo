<?php
header("Content-type: application/json; charset=utf-8");

include_once($_SERVER['DOCUMENT_ROOT'].'/include/cms-inc/include_cms.php');

require('publicite.lib.php');

$iSaison = DEF_DC_SAISON; 

// en param = Page
//$section = 0;
if(is_get('source')){
	list($source, $wday) = explode(';',$_GET['source']);
	//$source=$_GET['source'];
	if($source!=0){
		$sql = 'SELECT c . * , f . * , e . *, p.*
		FROM dc_cours AS c, dc_eleve AS e, dc_inscription AS i, dc_famille AS f, dc_professeur AS p
		WHERE i.dc_statut = 4 AND i.dc_eleve = e.dc_id
		AND i.dc_saison = '.$iSaison.'
		AND e.dc_famille = f.dc_id
		AND c.dc_professeur = '.$source.'
		AND c.dc_professeur = p.dc_id
		AND c.dc_id = i.dc_cours';

	}
	else{
		$sql = 'SELECT c . * , f . * , e . *, p.*
		FROM dc_cours AS c, dc_eleve AS e, dc_inscription AS i, dc_famille AS f, dc_professeur AS p
		WHERE i.dc_statut = 4 AND i.dc_eleve = e.dc_id
		AND i.dc_saison = '.$iSaison.'
		AND e.dc_famille = f.dc_id
		AND c.dc_professeur = p.dc_id
		AND c.dc_id = i.dc_cours ';		
	}
}


$rs = $db->Execute($sql);

$aJSON = array();

if($rs) {
	
	/*
	array (size=77)
  0 => string '53' (length=2)
  'dc_id' => string '132' (length=3)
  1 => string 'Charlotte Lundi 18h05' (length=21)
  'dc_nom' => string 'Chevalier' (length=9)
  2 => string '5' (length=1)
  'dc_discipline' => string '5' (length=1)
  3 => string '5' (length=1)
  'dc_professeur' => string '5' (length=1)
  4 => string '1' (length=1)
  'dc_jour' => string '1' (length=1)
  5 => string '18h05' (length=5)
  'dc_horaire' => string '18h05' (length=5)
  6 => string '-1' (length=2)
  'dc_salle' => string '-1' (length=2)
  7 => string '33' (length=2)
  'dc_formule' => string '33' (length=2)
  8 => string '3' (length=1)
  'dc_saison' => string '3' (length=1)
  9 => string '' (length=0)
  'dc_desc' => string '' (length=0)
  10 => string '2015-09-12 17:35:07' (length=19)
  'dc_cdate' => string '2015-09-12 17:34:14' (length=19)
  11 => string '0000-00-00 00:00:00' (length=19)
  'dc_mdate' => string '0000-00-00 00:00:00' (length=19)
  12 => string '4' (length=1)
  'dc_statut' => string '4' (length=1)
  13 => string '120' (length=3)
  14 => string 'Chevalier' (length=9)
  'dc_nommere' => string 'Chevalier' (length=9)
  15 => string 'Virginie' (length=8)
  'dc_prenommere' => string 'Virginie' (length=8)
  16 => string 'jvchevalier@hotmail.com' (length=23)
  'dc_emailmere' => string 'jvchevalier@hotmail.com' (length=23)
  17 => string '0652534144' (length=10)
  'dc_telmere' => string '0652534144' (length=10)
  18 => string '59 rue Achille Viadieu' (length=22)
  'dc_adressemere' => string '59 rue Achille Viadieu' (length=22)
  19 => string '' (length=0)
  'dc_nompere' => string '' (length=0)
  20 => string '' (length=0)
  'dc_prenompere' => string '' (length=0)
  21 => string '0789601287' (length=10)
  'dc_emailpere' => string '0789601287' (length=10)
  22 => string '' (length=0)
  'dc_telpere' => string '' (length=0)
  23 => string '' (length=0)
  'dc_adressepere' => string '' (length=0)
  24 => string '' (length=0)
  'dc_contact' => string '' (length=0)
  25 => string '0' (length=1)
  'dc_assok' => string '0' (length=1)
  26 => string '1' (length=1)
  'dc_adhok' => string '1' (length=1)
  27 => string '' (length=0)
  28 => string '2015-09-12 17:30:37' (length=19)
  29 => string '0000-00-00 00:00:00' (length=19)
  30 => string '4' (length=1)
  31 => string '132' (length=3)
  32 => string 'Chevalier' (length=9)
  33 => string 'Philomène' (length=9)
  'dc_prenom' => string 'Philomène' (length=9)
  34 => string '120' (length=3)
  'dc_famille' => string '120' (length=3)
  35 => string '' (length=0)
  'dc_email' => string '' (length=0)
  36 => string '' (length=0)
  'dc_tel' => string '' (length=0)
  37 => string '2015-09-12' (length=10)
  'dc_ddn' => string '2015-09-12' (length=10)
  38 => string 'Fermat' (length=6)
  'dc_ecole' => string 'Fermat' (length=6)
  39 => string '11' (length=2)
  'dc_classe' => string '11' (length=2)
  40 => string '' (length=0)
  41 => string '2015-09-12 17:34:14' (length=19)
  42 => string '0000-00-00 00:00:00' (length=19)
  43 => string '4' (length=1)
array (size=77)
  0 => string '56' (length=2)
  'dc_id' => string '60' (length=2)
  1 => string 'Charlotte lundi 17h35' (length=21)
  'dc_nom' => string 'Ashmar' (length=6)
  2 => string '5' (length=1)
  'dc_discipline' => string '5' (length=1)
  3 => string '5' (length=1)
  'dc_professeur' => string '5' (length=1)
  4 => string '1' (length=1)
  'dc_jour' => string '1' (length=1)
  5 => string '17h35' (length=5)
  'dc_horaire' => string '17h35' (length=5)
  6 => string '2' (length=1)
  'dc_salle' => string '2' (length=1)
  7 => string '28' (length=2)
  'dc_formule' => string '28' (length=2)
  8 => string '3' (length=1)
  'dc_saison' => string '3' (length=1)
  9 => string '' (length=0)
  'dc_desc' => string '' (length=0)
  10 => string '2015-09-20 14:17:21' (length=19)
  'dc_cdate' => string '2014-09-30 22:00:52' (length=19)
  11 => string '0000-00-00 00:00:00' (length=19)
  'dc_mdate' => string '2015-09-20 14:19:31' (length=19)
  12 => string '4' (length=1)
  'dc_statut' => string '4' (length=1)
  13 => string '55' (length=2)
  14 => string 'Jacquemettaz' (length=12)
  'dc_nommere' => string 'Jacquemettaz' (length=12)
  15 => string 'Odile' (length=5)
  'dc_prenommere' => string 'Odile' (length=5)
  16 => string 'alexodile@hotmail.fr' (length=20)
  'dc_emailmere' => string 'alexodile@hotmail.fr' (length=20)
  17 => string '0751064028' (length=10)
  'dc_telmere' => string '0751064028' (length=10)
  18 => string '48, Bd Pierre Paul Riquet
31000 Toulouse' (length=41)
  'dc_adressemere' => string '48, Bd Pierre Paul Riquet
31000 Toulouse' (length=41)
  19 => string 'Ashmar' (length=6)
  'dc_nompere' => string 'Ashmar' (length=6)
  20 => string 'Ayman' (length=5)
  'dc_prenompere' => string 'Ayman' (length=5)
  21 => string '' (length=0)
  'dc_emailpere' => string '' (length=0)
  22 => string '0695873626' (length=10)
  'dc_telpere' => string '0695873626' (length=10)
  23 => string '' (length=0)
  'dc_adressepere' => string '' (length=0)
  24 => string '' (length=0)
  'dc_contact' => string '' (length=0)
  25 => string '1' (length=1)
  'dc_assok' => string '1' (length=1)
  26 => string '1' (length=1)
  'dc_adhok' => string '1' (length=1)
  27 => string 'cash' (length=4)
  28 => string '2015-09-09 21:50:53' (length=19)
  29 => string '2015-09-20 14:19:42' (length=19)
  30 => string '4' (length=1)
  31 => string '60' (length=2)
  32 => string 'Ashmar' (length=6)
  33 => string 'Lucie-Nour' (length=10)
  'dc_prenom' => string 'Lucie-Nour' (length=10)
  34 => string '55' (length=2)
  'dc_famille' => string '55' (length=2)
  35 => string '' (length=0)
  'dc_email' => string '' (length=0)
  36 => string '' (length=0)
  'dc_tel' => string '' (length=0)
  37 => string '2014-09-30' (length=10)
  'dc_ddn' => string '2014-09-30' (length=10)
  38 => string 'Michelet' (length=8)
  'dc_ecole' => string 'Michelet' (length=8)
  39 => string '7' (length=1)
  'dc_classe' => string '7' (length=1)
  40 => string '' (length=0)
  41 => string '2014-09-30 22:00:52' (length=19)
  42 => string '2015-09-20 14:19:31' (length=19)
  43 => string '4' (length=1)
array (size=77)
  0 => string '53' (length=2)
  'dc_id' => string '16' (length=2)
  1 => string 'Charlotte Lundi 18h05' (length=21)
  'dc_nom' => string 'Suc' (length=3)
  2 => string '5' (length=1)
  'dc_discipline' => string '5' (length=1)
  3 => string '5' (length=1)
  'dc_professeur' => string '5' (length=1)
  4 => string '1' (length=1)
  'dc_jour' => string '1' (length=1)
  5 => string '18h05' (length=5)
  'dc_horaire' => string '18h05' (length=5)
  6 => string '-1' (length=2)
  'dc_salle' => string '-1' (length=2)
  7 => string '33' (length=2)
  'dc_formule' => string '33' (length=2)
  8 => string '3' (length=1)
  'dc_saison' => string '3' (length=1)
  9 => string '' (length=0)
  'dc_desc' => string '' (length=0)
  10 => string '2015-09-12 17:35:07' (length=19)
  'dc_cdate' => string '2014-09-13 11:08:37' (length=19)
  11 => string '0000-00-00 00:00:00' (length=19)
  'dc_mdate' => string '0000-00-00 00:00:00' (length=19)
  12 => string '4' (length=1)
  'dc_statut' => string '4' (length=1)
  13 => string '14' (length=2)
  14 => string 'Suc' (length=3)
  'dc_nommere' => string 'Suc' (length=3)
  15 => string 'Agnès' (length=5)
  'dc_prenommere' => string 'Agnès' (length=5)
  16 => string 'agnessuc@gmail.com' (length=18)
  'dc_emailmere' => string 'agnessuc@gmail.com' (length=18)
  17 => string '0681088863' (length=10)
  'dc_telmere' => string '0681088863' (length=10)
  18 => string '14, Rue Toulousane
31000 Toulouse' (length=34)
  'dc_adressemere' => string '14, Rue Toulousane
31000 Toulouse' (length=34)
  19 => string ' ' (length=1)
  'dc_nompere' => string ' ' (length=1)
  20 => string ' ' (length=1)
  'dc_prenompere' => string ' ' (length=1)
  21 => string '' (length=0)
  'dc_emailpere' => string '' (length=0)
  22 => string '0616471657' (length=10)
  'dc_telpere' => string '0616471657' (length=10)
  23 => string '' (length=0)
  'dc_adressepere' => string '' (length=0)
  24 => string '' (length=0)
  'dc_contact' => string '' (length=0)
  25 => string '0' (length=1)
  'dc_assok' => string '0' (length=1)
  26 => string '0' (length=1)
  'dc_adhok' => string '0' (length=1)
  27 => string '' (length=0)
  28 => string '2015-09-09 21:50:53' (length=19)
  29 => string '2014-09-20 15:50:03' (length=19)
  30 => string '4' (length=1)
  31 => string '16' (length=2)
  32 => string 'Suc' (length=3)
  33 => string 'Lea' (length=3)
  'dc_prenom' => string 'Lea' (length=3)
  34 => string '14' (length=2)
  'dc_famille' => string '14' (length=2)
  35 => string '' (length=0)
  'dc_email' => string '' (length=0)
  36 => string '' (length=0)
  'dc_tel' => string '' (length=0)
  37 => string '2014-09-13' (length=10)
  'dc_ddn' => string '2014-09-13' (length=10)
  38 => string 'Lakanal' (length=7)
  'dc_ecole' => string 'Lakanal' (length=7)
  39 => string '11' (length=2)
  'dc_classe' => string '11' (length=2)
  40 => string '' (length=0)
  41 => string '2014-09-13 11:08:37' (length=19)
  42 => string '0000-00-00 00:00:00' (length=19)
  43 => string '4' (length=1)
array (size=77)
  0 => string '54' (length=2)
  'dc_id' => string '133' (length=3)
  1 => string 'Bébé Alice Lundi 17h30' (length=22)
  'dc_nom' => string 'Thuillier Perotto' (length=17)
  2 => string '1' (length=1)
  'dc_discipline' => string '1' (length=1)
  3 => string '6' (length=1)
  'dc_professeur' => string '6' (length=1)
  4 => string '1' (length=1)
  'dc_jour' => string '1' (length=1)
  5 => string '17h30' (length=5)
  'dc_horaire' => string '17h30' (length=5)
  6 => string '-1' (length=2)
  'dc_salle' => string '-1' (length=2)
  7 => string '21' (length=2)
  'dc_formule' => string '21' (length=2)
  8 => string '3' (length=1)
  'dc_saison' => string '3' (length=1)
  9 => string '' (length=0)
  'dc_desc' => string '' (length=0)
  10 => string '2015-09-12 18:29:33' (length=19)
  'dc_cdate' => string '2015-09-12 18:25:19' (length=19)
  11 => string '0000-00-00 00:00:00' (length=19)
  'dc_mdate' => string '0000-00-00 00:00:00' (length=19)
  12 => string '4' (length=1)
  'dc_statut' => string '4' (length=1)
  13 => string '121' (length=3)
  14 => string 'Perotto' (length=7)
  'dc_nommere' => string 'Perotto' (length=7)
  15 => string 'Melanie' (length=7)
  'dc_prenommere' => string 'Melanie' (length=7)
  16 => string 'xiahe@hotmail.fr' (length=16)
  'dc_emailmere' => string 'xiahe@hotmail.fr' (length=16)
  17 => string '0678752221' (length=10)
  'dc_telmere' => string '0678752221' (length=10)
  18 => string '62, avenue de la Garonnette
31000 Toulouse' (length=43)
  'dc_adressemere' => string '62, avenue de la Garonnette
31000 Toulouse' (length=43)
  19 => string 'Thuillier' (length=9)
  'dc_nompere' => string 'Thuillier' (length=9)
  20 => string 'Guy' (length=3)
  'dc_prenompere' => string 'Guy' (length=3)
  21 => string 'melguyt@gmail.com' (length=17)
  'dc_emailpere' => string 'melguyt@gmail.com' (length=17)
  22 => string '0645707487' (length=10)
  'dc_telpere' => string '0645707487' (length=10)
  23 => string '' (length=0)
  'dc_adressepere' => string '' (length=0)
  24 => string '' (length=0)
  'dc_contact' => string '' (length=0)
  25 => string '0' (length=1)
  'dc_assok' => string '0' (length=1)
  26 => string '1' (length=1)
  'dc_adhok' => string '1' (length=1)
  27 => string '' (length=0)
  28 => string '2015-09-12 18:26:11' (length=19)
  29 => string '2015-09-12 18:33:34' (length=19)
  30 => string '4' (length=1)
  31 => string '133' (length=3)
  32 => string 'Thuillier Perotto' (length=17)
  33 => string 'Gustave' (length=7)
  'dc_prenom' => string 'Gustave' (length=7)
  34 => string '121' (length=3)
  'dc_famille' => string '121' (length=3)
  35 => string '' (length=0)
  'dc_email' => string '' (length=0)
  36 => string '' (length=0)
  'dc_tel' => string '' (length=0)
  37 => string '2015-09-12' (length=10)
  'dc_ddn' => string '2015-09-12' (length=10)
  38 => string '' (length=0)
  'dc_ecole' => string '' (length=0)
  39 => string '1' (length=1)
  'dc_classe' => string '1' (length=1)
  40 => string '' (length=0)
  41 => string '2015-09-12 18:25:19' (length=19)
  42 => string '0000-00-00 00:00:00' (length=19)
  43 => string '4' (length=1)
    44 => string '7' (length=1)
  45 => string 'Creff' (length=5)
  46 => string 'Leny' (length=4)
  47 => string ' lenyflaquito@gmail.com' (length=23)
  48 => string ' ' (length=1)
  49 => string '21, rue de Tunis
31200 Toulouse' (length=32)
  'dc_adresse' => string '21, rue de Tunis
31200 Toulouse' (length=32)
  50 => string '1987-06-23' (length=10)
  51 => string 'Brest' (length=5)
  'dc_ldn' => string 'Brest' (length=5)
  52 => string '187062901928760' (length=15)
  'dc_secu' => string '187062901928760' (length=15)
  53 => string '' (length=0)
  'dc_image' => string '' (length=0)
  54 => string '' (length=0)
  55 => string '2015-09-12 14:42:40' (length=19)
  56 => string '2015-09-14 21:35:39' (length=19)
  57 => string '4' (length=1)
  */
 
	if ((int)date(N)==7){ // dimanche
		$baseTime = strtotime("next monday");
	}
	 elseif ((int)date(N)==1){ // lundi
		$baseTime = strtotime("today");
	}
	  else{ // autres jours après lundi
		$baseTime = strtotime("last Monday");
	}
		
	while(!$rs->EOF) {
		$aRes=$rs->fields;
		$aStartTime = explode('h', $aRes[5]);
		$eStartTime = $baseTime + ($aRes[4]-1)*24*3600 + $aStartTime[0]*3600 + $aStartTime[1]*60;
		
		$aJSON[]=array(		
			'id' => $aRes[0],
			'title' => utf8_encode($aRes[32].' '.$aRes[33]." ".$aRes['dc_telmere']." ".$aRes['dc_telpere']),
			'start' => date("r", $eStartTime),
			'end' => date("r", $eStartTime+2700),
			'color' => '#00FF00', 
			'textColor' => 'black',
			'allDay' => false,
			//'url' => 'http://'.$_SERVER['HTTP_HOST'].'/backoffice/dc_famille/show_dc_famille.php?id='.$aRes[13]
			);
			
		$rs->MoveNext();
	}
		
	for($i=0;$i<count($aJSON);$i++){
		$eHue = $i*360/count($aJSON);
		$eSat = .75;
		$eLum = .65;
		$aJSON[$i]['color'] = '#'.rgbnum2rgbhex(hsl2rgb($eHue, $eSat, $eLum));
		
	}
	
	echo json_encode($aJSON);
}
?>