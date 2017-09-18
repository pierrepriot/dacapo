<?php
/* [Begin patch] */
/* [End patch] */
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/include/bo/class/dc_inscription.class.php')  && (strpos(__FILE__,'/include/bo/class/dc_inscription.class.php')===FALSE) ){
		include_once($_SERVER['DOCUMENT_ROOT'].'/include/bo/class/dc_inscription.class.php');
}else{
/*======================================

objet de BDD dc_inscription :: class dc_inscription

SQL mySQL:

DROP TABLE IF EXISTS dc_inscription;
CREATE TABLE dc_inscription
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_eleve			int (11),
	dc_formule			int (11),
	dc_cours			int (11),
	dc_quinzaine			int (2),
	dc_reduit			int (2),
	dc_datedebut			date,
	dc_datefin			date,
	dc_t1ok			int (11) not null,
	dc_t2ok			int (11) not null,
	dc_t3ok			int (11) not null,
	dc_saison			int (11),
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

SQL Oracle:

DROP TABLE dc_inscription
CREATE TABLE dc_inscription
(
	dc_id			number (11) constraint dc_pk PRIMARY KEY not null,
	dc_eleve			number (11),
	dc_formule			number (11),
	dc_cours			number (11),
	dc_quinzaine			number (2),
	dc_reduit			number (2),
	dc_datedebut			date,
	dc_datefin			date,
	dc_t1ok			number (11) not null,
	dc_t2ok			number (11) not null,
	dc_t3ok			number (11) not null,
	dc_saison			number (11),
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			number (11) not null
)


<?xml version="1.0" encoding="ISO-8859-1" ?>
<class name="dc_inscription" libelle="Inscription" prefix="dc" display="eleve" abstract="formule" def_order_field="id" def_order_direction="DESC">
<item name="id" type="int" length="11" isprimary="true" notnull="true" default="-1" list="true" order="true" />

<item name="eleve" libelle="Elève" type="int" length="11" list="true" order="true" fkey="dc_eleve"/>

<item name="formule" libelle="Formule" type="int" length="11" list="true" order="true" fkey="dc_formule"/>

<item name="cours" libelle="Cours" type="int" length="11" list="true" order="true" fkey="dc_cours"/>

<item name="quinzaine" libelle="Par quinzaine" type="int" length="2" list="true" order="true" default="0" option="bool" />

<item name="reduit" libelle="Tarif réduit" type="int" length="2" list="true" order="true" default="0" option="bool" />

<item name="datedebut" libelle="Date de début" type="date" default="2014-09-15" list="true" order="true" />
<item name="datefin" libelle="Date de fin" type="date" default="2015-06-26"  list="true" order="true" />

<item name="t1ok" libelle="Trimestre 1 payé" type="int" length="11" notnull="true" default="-1" list="true" order="true" option="bool" />
<item name="t2ok" libelle="Trimestre 2 payé" type="int" length="11" notnull="true" default="-1" list="true" order="true" option="bool" />
<item name="t3ok" libelle="Trimestre 3 payé" type="int" length="11" notnull="true" default="-1" list="true" order="true" option="bool" />


<item name="saison" libelle="Saison" type="int" length="11" list="true" order="true" default="DEF_DC_SAISON" fkey="dc_saison"/>

<item name="desc" libelle="Description" type="text" length="1024" list="false" order="false" oblig="false" option="textarea" />

<item name="cdate" libelle="Date de création" type="timestamp" list="true" order="true" />
<item name="mdate" libelle="Date de modification" type="timestamp" list="true" order="true" />
<item name="statut" libelle="statut" type="int" length="11" notnull="true" default="4" list="true" />
<langpack lang="fr">
<norecords>Pas de donnée à afficher</norecords>
</langpack>
</class>  


==========================================*/

class dc_inscription
{
var $inherited_list = array();
var $inherited = array();
var $id;
var $eleve;
var $formule;
var $cours;
var $quinzaine;
var $reduit;
var $datedebut;
var $datefin;
var $t1ok;
var $t2ok;
var $t3ok;
var $saison;
var $desc;
var $cdate;
var $mdate;
var $statut;


var $XML = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>
<class name=\"dc_inscription\" libelle=\"Inscription\" prefix=\"dc\" display=\"eleve\" abstract=\"formule\" def_order_field=\"id\" def_order_direction=\"DESC\">
<item name=\"id\" type=\"int\" length=\"11\" isprimary=\"true\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" />

<item name=\"eleve\" libelle=\"Elève\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" fkey=\"dc_eleve\"/>

<item name=\"formule\" libelle=\"Formule\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" fkey=\"dc_formule\"/>

<item name=\"cours\" libelle=\"Cours\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" fkey=\"dc_cours\"/>

<item name=\"quinzaine\" libelle=\"Par quinzaine\" type=\"int\" length=\"2\" list=\"true\" order=\"true\" default=\"0\" option=\"bool\" />

<item name=\"reduit\" libelle=\"Tarif réduit\" type=\"int\" length=\"2\" list=\"true\" order=\"true\" default=\"0\" option=\"bool\" />

<item name=\"datedebut\" libelle=\"Date de début\" type=\"date\" default=\"2014-09-15\" list=\"true\" order=\"true\" />
<item name=\"datefin\" libelle=\"Date de fin\" type=\"date\" default=\"2015-06-26\"  list=\"true\" order=\"true\" />

<item name=\"t1ok\" libelle=\"Trimestre 1 payé\" type=\"int\" length=\"11\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" option=\"bool\" />
<item name=\"t2ok\" libelle=\"Trimestre 2 payé\" type=\"int\" length=\"11\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" option=\"bool\" />
<item name=\"t3ok\" libelle=\"Trimestre 3 payé\" type=\"int\" length=\"11\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" option=\"bool\" />


<item name=\"saison\" libelle=\"Saison\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" default=\"DEF_DC_SAISON\" fkey=\"dc_saison\"/>

<item name=\"desc\" libelle=\"Description\" type=\"text\" length=\"1024\" list=\"false\" order=\"false\" oblig=\"false\" option=\"textarea\" />

<item name=\"cdate\" libelle=\"Date de création\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"mdate\" libelle=\"Date de modification\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"statut\" libelle=\"statut\" type=\"int\" length=\"11\" notnull=\"true\" default=\"4\" list=\"true\" />
<langpack lang=\"fr\">
<norecords>Pas de donnée à afficher</norecords>
</langpack>
</class>  ";

var $XML_inherited = null;

var $sMySql = "CREATE TABLE dc_inscription
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_eleve			int (11),
	dc_formule			int (11),
	dc_cours			int (11),
	dc_quinzaine			int (2),
	dc_reduit			int (2),
	dc_datedebut			date,
	dc_datefin			date,
	dc_t1ok			int (11) not null,
	dc_t2ok			int (11) not null,
	dc_t3ok			int (11) not null,
	dc_saison			int (11),
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

";

// constructeur
function dc_inscription($id=null)
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
		$this->eleve = -1;
		$this->formule = -1;
		$this->cours = -1;
		$this->quinzaine = -1;
		$this->reduit = -1;
		$this->datedebut = "2014-09-15";
		$this->datefin = "2015-06-26";
		$this->t1ok = -1;
		$this->t2ok = -1;
		$this->t3ok = -1;
		$this->saison = DEF_DC_SAISON;
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
	$laListeChamps[]=new dbChamp("Dc_eleve", "entier", "get_eleve", "set_eleve");
	$laListeChamps[]=new dbChamp("Dc_formule", "entier", "get_formule", "set_formule");
	$laListeChamps[]=new dbChamp("Dc_cours", "entier", "get_cours", "set_cours");
	$laListeChamps[]=new dbChamp("Dc_quinzaine", "entier", "get_quinzaine", "set_quinzaine");
	$laListeChamps[]=new dbChamp("Dc_reduit", "entier", "get_reduit", "set_reduit");
	$laListeChamps[]=new dbChamp("Dc_datedebut", "date_formatee", "get_datedebut", "set_datedebut");
	$laListeChamps[]=new dbChamp("Dc_datefin", "date_formatee", "get_datefin", "set_datefin");
	$laListeChamps[]=new dbChamp("Dc_t1ok", "entier", "get_t1ok", "set_t1ok");
	$laListeChamps[]=new dbChamp("Dc_t2ok", "entier", "get_t2ok", "set_t2ok");
	$laListeChamps[]=new dbChamp("Dc_t3ok", "entier", "get_t3ok", "set_t3ok");
	$laListeChamps[]=new dbChamp("Dc_saison", "entier", "get_saison", "set_saison");
	$laListeChamps[]=new dbChamp("Dc_desc", "text", "get_desc", "set_desc");
	$laListeChamps[]=new dbChamp("Dc_cdate", "date_formatee_timestamp", "get_cdate", "set_cdate");
	$laListeChamps[]=new dbChamp("Dc_mdate", "date_formatee_timestamp", "get_mdate", "set_mdate");
	$laListeChamps[]=new dbChamp("Dc_statut", "entier", "get_statut", "set_statut");
	return($laListeChamps);
}


// getters
function get_id() { return($this->id); }
function get_eleve() { return($this->eleve); }
function get_formule() { return($this->formule); }
function get_cours() { return($this->cours); }
function get_quinzaine() { return($this->quinzaine); }
function get_reduit() { return($this->reduit); }
function get_datedebut() { return($this->datedebut); }
function get_datefin() { return($this->datefin); }
function get_t1ok() { return($this->t1ok); }
function get_t2ok() { return($this->t2ok); }
function get_t3ok() { return($this->t3ok); }
function get_saison() { return($this->saison); }
function get_desc() { return($this->desc); }
function get_cdate() { return($this->cdate); }
function get_mdate() { return($this->mdate); }
function get_statut() { return($this->statut); }


// setters
function set_id($c_dc_id) { return($this->id=$c_dc_id); }
function set_eleve($c_dc_eleve) { return($this->eleve=$c_dc_eleve); }
function set_formule($c_dc_formule) { return($this->formule=$c_dc_formule); }
function set_cours($c_dc_cours) { return($this->cours=$c_dc_cours); }
function set_quinzaine($c_dc_quinzaine) { return($this->quinzaine=$c_dc_quinzaine); }
function set_reduit($c_dc_reduit) { return($this->reduit=$c_dc_reduit); }
function set_datedebut($c_dc_datedebut) { return($this->datedebut=$c_dc_datedebut); }
function set_datefin($c_dc_datefin) { return($this->datefin=$c_dc_datefin); }
function set_t1ok($c_dc_t1ok) { return($this->t1ok=$c_dc_t1ok); }
function set_t2ok($c_dc_t2ok) { return($this->t2ok=$c_dc_t2ok); }
function set_t3ok($c_dc_t3ok) { return($this->t3ok=$c_dc_t3ok); }
function set_saison($c_dc_saison) { return($this->saison=$c_dc_saison); }
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
function getTable() { return("dc_inscription"); }
function getClasse() { return("dc_inscription"); }
function getPrefix() { return(""); }
function getDisplay() { return("eleve"); }
function getAbstract() { return("formule"); }


} //class


// ecriture des fichiers
if (!is_dir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_inscription")){
	mkdir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_inscription");
	$list = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_inscription/list_dc_inscription.php", "w");
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
	$maj = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_inscription/maj_dc_inscription.php", "w");
	$majContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/maj.php'); ?".">";
	fwrite($maj, $majContent);
	fclose($maj);
	$show = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_inscription/show_dc_inscription.php", "w");
	$showContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/show.php'); ?".">";
	fwrite($show, $showContent);
	fclose($show);
	$rss = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_inscription/rss_dc_inscription.php", "w");
	$rssContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/rss.php'); ?".">";
	fwrite($rss, $rssContent);
	fclose($rss);
	$xml = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_inscription/xml_dc_inscription.php", "w");
	$xmlContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xml.php'); ?".">";
	fwrite($xml, $xmlContent);
	fclose($xml);
	$xmlxls = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_inscription/xlsx_dc_inscription.php", "w");
	$xmlxlsContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xlsx.php'); ?".">";
	fwrite($xmlxls, $xmlxlsContent);
	fclose($xmlxls);
	$import = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_inscription/import_dc_inscription.php", "w");
	$importContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/import.php'); ?".">";
	fwrite($import, $importContent);
	fclose($import);
}
}
?>