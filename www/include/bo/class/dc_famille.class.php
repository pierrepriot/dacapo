<?php
/* [Begin patch] */
/* [End patch] */
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/include/bo/class/dc_famille.class.php')  && (strpos(__FILE__,'/include/bo/class/dc_famille.class.php')===FALSE) ){
		include_once($_SERVER['DOCUMENT_ROOT'].'/include/bo/class/dc_famille.class.php');
}else{
/*======================================

objet de BDD dc_famille :: class dc_famille

SQL mySQL:

DROP TABLE IF EXISTS dc_famille;
CREATE TABLE dc_famille
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_nommere			varchar (64),
	dc_prenommere			varchar (64),
	dc_emailmere			varchar (128),
	dc_telmere			varchar (24),
	dc_adressemere			varchar (1024),
	dc_nompere			varchar (64),
	dc_prenompere			varchar (64),
	dc_emailpere			varchar (128),
	dc_telpere			varchar (24),
	dc_adressepere			varchar (1024),
	dc_contact			varchar (1024),
	dc_assok			int (11) not null,
	dc_adhok			int (11) not null,
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

SQL Oracle:

DROP TABLE dc_famille
CREATE TABLE dc_famille
(
	dc_id			number (11) constraint dc_pk PRIMARY KEY not null,
	dc_nommere			varchar2 (64),
	dc_prenommere			varchar2 (64),
	dc_emailmere			varchar2 (128),
	dc_telmere			varchar2 (24),
	dc_adressemere			varchar2 (1024),
	dc_nompere			varchar2 (64),
	dc_prenompere			varchar2 (64),
	dc_emailpere			varchar2 (128),
	dc_telpere			varchar2 (24),
	dc_adressepere			varchar2 (1024),
	dc_contact			varchar2 (1024),
	dc_assok			number (11) not null,
	dc_adhok			number (11) not null,
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			number (11) not null
)


<?xml version="1.0" encoding="ISO-8859-1" ?>
<class name="dc_famille" libelle="Famille" prefix="dc" display="nommere" abstract="nompere"  def_order_field="id" def_order_direction="DESC">
<item name="id" type="int" length="11" isprimary="true" notnull="true" default="-1" list="true" order="true" />

<item name="nommere" libelle="Nom mère" type="varchar" length="64" list="true" order="true" oblig="true" nohtml="true" />
<item name="prenommere" libelle="Prénom mère" type="varchar" length="64" list="true" order="true" oblig="true" nohtml="true" />
<item name="emailmere" libelle="E-mail mère" type="varchar" length="128" list="true" order="true" nohtml="true" />
<item name="telmere" libelle="Téléphone mère" type="varchar" length="24" list="true" order="true" nohtml="true" />
<item name="adressemere" libelle="Adresse mère" type="varchar" length="1024"  nohtml="true" option="textarea" />

<item name="nompere" libelle="Nom père" type="varchar" length="64" list="true" order="true" nohtml="true" />
<item name="prenompere" libelle="Prénom père" type="varchar" length="64" list="true" order="true" nohtml="true" />
<item name="emailpere" libelle="E-mail père" type="varchar" length="128" list="true" order="true" nohtml="true" />
<item name="telpere" libelle="Téléphone père" type="varchar" length="24" list="true" order="true" nohtml="true" />
<item name="adressepere" libelle="Adresse père" type="varchar" length="1024"  nohtml="true" option="textarea" />

<item name="contact" libelle="Personne(s) à contacter" type="varchar" length="1024"  nohtml="true" option="textarea" />

<item name="assok" libelle="Assurance OK" type="int" length="11" notnull="true" default="-1" list="true" order="true" option="bool" />

<item name="adhok" libelle="Adhésion payée" type="int" length="11" notnull="true" default="-1" list="true" order="true" option="bool" />

<item name="desc" libelle="Description" type="text" length="1024" list="false" order="false" oblig="false" option="textarea" />

<item name="cdate" libelle="Date de création" type="timestamp" list="true" order="true" />
<item name="mdate" libelle="Date de modification" type="timestamp" list="true" order="true" />
<item name="statut" libelle="statut" type="int" length="11" notnull="true" default="4" list="true" />
<langpack lang="fr">
<norecords>Pas de donnée à afficher</norecords>
</langpack>
</class>  


==========================================*/

class dc_famille
{
var $inherited_list = array();
var $inherited = array();
var $id;
var $nommere;
var $prenommere;
var $emailmere;
var $telmere;
var $adressemere;
var $nompere;
var $prenompere;
var $emailpere;
var $telpere;
var $adressepere;
var $contact;
var $assok;
var $adhok;
var $desc;
var $cdate;
var $mdate;
var $statut;


var $XML = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>
<class name=\"dc_famille\" libelle=\"Famille\" prefix=\"dc\" display=\"nommere\" abstract=\"nompere\"  def_order_field=\"id\" def_order_direction=\"DESC\">
<item name=\"id\" type=\"int\" length=\"11\" isprimary=\"true\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" />

<item name=\"nommere\" libelle=\"Nom mère\" type=\"varchar\" length=\"64\" list=\"true\" order=\"true\" oblig=\"true\" nohtml=\"true\" />
<item name=\"prenommere\" libelle=\"Prénom mère\" type=\"varchar\" length=\"64\" list=\"true\" order=\"true\" oblig=\"true\" nohtml=\"true\" />
<item name=\"emailmere\" libelle=\"E-mail mère\" type=\"varchar\" length=\"128\" list=\"true\" order=\"true\" nohtml=\"true\" />
<item name=\"telmere\" libelle=\"Téléphone mère\" type=\"varchar\" length=\"24\" list=\"true\" order=\"true\" nohtml=\"true\" />
<item name=\"adressemere\" libelle=\"Adresse mère\" type=\"varchar\" length=\"1024\"  nohtml=\"true\" option=\"textarea\" />

<item name=\"nompere\" libelle=\"Nom père\" type=\"varchar\" length=\"64\" list=\"true\" order=\"true\" nohtml=\"true\" />
<item name=\"prenompere\" libelle=\"Prénom père\" type=\"varchar\" length=\"64\" list=\"true\" order=\"true\" nohtml=\"true\" />
<item name=\"emailpere\" libelle=\"E-mail père\" type=\"varchar\" length=\"128\" list=\"true\" order=\"true\" nohtml=\"true\" />
<item name=\"telpere\" libelle=\"Téléphone père\" type=\"varchar\" length=\"24\" list=\"true\" order=\"true\" nohtml=\"true\" />
<item name=\"adressepere\" libelle=\"Adresse père\" type=\"varchar\" length=\"1024\"  nohtml=\"true\" option=\"textarea\" />

<item name=\"contact\" libelle=\"Personne(s) à contacter\" type=\"varchar\" length=\"1024\"  nohtml=\"true\" option=\"textarea\" />

<item name=\"assok\" libelle=\"Assurance OK\" type=\"int\" length=\"11\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" option=\"bool\" />

<item name=\"adhok\" libelle=\"Adhésion payée\" type=\"int\" length=\"11\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" option=\"bool\" />

<item name=\"desc\" libelle=\"Description\" type=\"text\" length=\"1024\" list=\"false\" order=\"false\" oblig=\"false\" option=\"textarea\" />

<item name=\"cdate\" libelle=\"Date de création\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"mdate\" libelle=\"Date de modification\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"statut\" libelle=\"statut\" type=\"int\" length=\"11\" notnull=\"true\" default=\"4\" list=\"true\" />
<langpack lang=\"fr\">
<norecords>Pas de donnée à afficher</norecords>
</langpack>
</class>  ";

var $XML_inherited = null;

var $sMySql = "CREATE TABLE dc_famille
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_nommere			varchar (64),
	dc_prenommere			varchar (64),
	dc_emailmere			varchar (128),
	dc_telmere			varchar (24),
	dc_adressemere			varchar (1024),
	dc_nompere			varchar (64),
	dc_prenompere			varchar (64),
	dc_emailpere			varchar (128),
	dc_telpere			varchar (24),
	dc_adressepere			varchar (1024),
	dc_contact			varchar (1024),
	dc_assok			int (11) not null,
	dc_adhok			int (11) not null,
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

";

// constructeur
function dc_famille($id=null)
{
	if (istable(get_class($this)) == false){
		dbExecuteQuery($this->sMySql);
	}

	if($id!=null) {
		$tempThis = dbGetObjectFromPK(get_class($this), $id);
		foreach ($tempThis as $tempKey => $tempValue){
			$this->$tempKey = $tempValue;
		}
		$tempThis = null;
		if(array_key_exists('0',$this->inherited_list)){
			foreach($this->inherited_list as $class){
				if(!is_object($class))
					$this->inherited[$class] = dbGetObjectFromPK($class, $id);
			}
		}
	} else {
		$this->id = -1;
		$this->nommere = "";
		$this->prenommere = "";
		$this->emailmere = "";
		$this->telmere = "";
		$this->adressemere = "";
		$this->nompere = "";
		$this->prenompere = "";
		$this->emailpere = "";
		$this->telpere = "";
		$this->adressepere = "";
		$this->contact = "";
		$this->assok = -1;
		$this->adhok = -1;
		$this->desc = "";
		$this->cdate = date('Y-m-d H:i:s');
		$this->mdate = date('Y-m-d H:i:s');
		$this->statut = 4;
		if(array_key_exists('0',$this->inherited_list)){
			foreach($this->inherited_list as $class){
				if(!is_object($class))
					$this->inherited[$class] = new $class();
			}
		}
	}
}


// liste des champs de l'objet
function getListeChamps()
{
	// ATTENTION, respecter l'ordre des champs de la table dans la base de données pour construire laListeChamp
	$laListeChamps[]=new dbChamp("Dc_id", "entier", "get_id", "set_id");
	$laListeChamps[]=new dbChamp("Dc_nommere", "text", "get_nommere", "set_nommere");
	$laListeChamps[]=new dbChamp("Dc_prenommere", "text", "get_prenommere", "set_prenommere");
	$laListeChamps[]=new dbChamp("Dc_emailmere", "text", "get_emailmere", "set_emailmere");
	$laListeChamps[]=new dbChamp("Dc_telmere", "text", "get_telmere", "set_telmere");
	$laListeChamps[]=new dbChamp("Dc_adressemere", "text", "get_adressemere", "set_adressemere");
	$laListeChamps[]=new dbChamp("Dc_nompere", "text", "get_nompere", "set_nompere");
	$laListeChamps[]=new dbChamp("Dc_prenompere", "text", "get_prenompere", "set_prenompere");
	$laListeChamps[]=new dbChamp("Dc_emailpere", "text", "get_emailpere", "set_emailpere");
	$laListeChamps[]=new dbChamp("Dc_telpere", "text", "get_telpere", "set_telpere");
	$laListeChamps[]=new dbChamp("Dc_adressepere", "text", "get_adressepere", "set_adressepere");
	$laListeChamps[]=new dbChamp("Dc_contact", "text", "get_contact", "set_contact");
	$laListeChamps[]=new dbChamp("Dc_assok", "entier", "get_assok", "set_assok");
	$laListeChamps[]=new dbChamp("Dc_adhok", "entier", "get_adhok", "set_adhok");
	$laListeChamps[]=new dbChamp("Dc_desc", "text", "get_desc", "set_desc");
	$laListeChamps[]=new dbChamp("Dc_cdate", "date_formatee_timestamp", "get_cdate", "set_cdate");
	$laListeChamps[]=new dbChamp("Dc_mdate", "date_formatee_timestamp", "get_mdate", "set_mdate");
	$laListeChamps[]=new dbChamp("Dc_statut", "entier", "get_statut", "set_statut");
	return($laListeChamps);
}


// getters
function get_id() { return($this->id); }
function get_nommere() { return($this->nommere); }
function get_prenommere() { return($this->prenommere); }
function get_emailmere() { return($this->emailmere); }
function get_telmere() { return($this->telmere); }
function get_adressemere() { return($this->adressemere); }
function get_nompere() { return($this->nompere); }
function get_prenompere() { return($this->prenompere); }
function get_emailpere() { return($this->emailpere); }
function get_telpere() { return($this->telpere); }
function get_adressepere() { return($this->adressepere); }
function get_contact() { return($this->contact); }
function get_assok() { return($this->assok); }
function get_adhok() { return($this->adhok); }
function get_desc() { return($this->desc); }
function get_cdate() { return($this->cdate); }
function get_mdate() { return($this->mdate); }
function get_statut() { return($this->statut); }


// setters
function set_id($c_dc_id) { return($this->id=$c_dc_id); }
function set_nommere($c_dc_nommere) { return($this->nommere=$c_dc_nommere); }
function set_prenommere($c_dc_prenommere) { return($this->prenommere=$c_dc_prenommere); }
function set_emailmere($c_dc_emailmere) { return($this->emailmere=$c_dc_emailmere); }
function set_telmere($c_dc_telmere) { return($this->telmere=$c_dc_telmere); }
function set_adressemere($c_dc_adressemere) { return($this->adressemere=$c_dc_adressemere); }
function set_nompere($c_dc_nompere) { return($this->nompere=$c_dc_nompere); }
function set_prenompere($c_dc_prenompere) { return($this->prenompere=$c_dc_prenompere); }
function set_emailpere($c_dc_emailpere) { return($this->emailpere=$c_dc_emailpere); }
function set_telpere($c_dc_telpere) { return($this->telpere=$c_dc_telpere); }
function set_adressepere($c_dc_adressepere) { return($this->adressepere=$c_dc_adressepere); }
function set_contact($c_dc_contact) { return($this->contact=$c_dc_contact); }
function set_assok($c_dc_assok) { return($this->assok=$c_dc_assok); }
function set_adhok($c_dc_adhok) { return($this->adhok=$c_dc_adhok); }
function set_desc($c_dc_desc) { return($this->desc=$c_dc_desc); }
function set_cdate($c_dc_cdate) { return($this->cdate=$c_dc_cdate); }
function set_mdate($c_dc_mdate) { return($this->mdate=$c_dc_mdate); }
function set_statut($c_dc_statut) { return($this->statut=$c_dc_statut); }


// autres getters
function getGetterPK() { return("get_id"); }
function getSetterPK() { return("set_id"); }
function getFieldPK() { return("dc_id"); }
// statut
function getGetterStatut() {return("get_statut"); }
function getFieldStatut() {return("dc_statut"); }
//
function getTable() { return("dc_famille"); }
function getClasse() { return("dc_famille"); }
function getPrefix() { return(""); }
function getDisplay() { return("nommere"); }
function getAbstract() { return("nompere"); }


} //class


// ecriture des fichiers
if (!is_dir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_famille")){
	mkdir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_famille");
	$list = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_famille/list_dc_famille.php", "w");
	$listContent = "<"."?php
include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); 
\$"."script = explode('/',\$"."_SERVER['PHP_SELF']);
\$"."script = \$"."script[sizeof(\$"."script)-1];

if (is_file(\$"."_SERVER['DOCUMENT_ROOT'].'/include/bo/cms/prepend.'.\$"."script))
	require_once('include/bo/cms/prepend.'.\$"."script);

include('cms-inc/autoClass/list.php');
?".">";
	fwrite($list, $listContent);
	fclose($list);
	$maj = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_famille/maj_dc_famille.php", "w");
	$majContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/maj.php'); ?".">";
	fwrite($maj, $majContent);
	fclose($maj);
	$show = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_famille/show_dc_famille.php", "w");
	$showContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/show.php'); ?".">";
	fwrite($show, $showContent);
	fclose($show);
	$rss = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_famille/rss_dc_famille.php", "w");
	$rssContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/rss.php'); ?".">";
	fwrite($rss, $rssContent);
	fclose($rss);
	$xml = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_famille/xml_dc_famille.php", "w");
	$xmlContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xml.php'); ?".">";
	fwrite($xml, $xmlContent);
	fclose($xml);
	$xmlxls = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_famille/xlsx_dc_famille.php", "w");
	$xmlxlsContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xlsx.php'); ?".">";
	fwrite($xmlxls, $xmlxlsContent);
	fclose($xmlxls);
	$import = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_famille/import_dc_famille.php", "w");
	$importContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/import.php'); ?".">";
	fwrite($import, $importContent);
	fclose($import);
}
}
?>