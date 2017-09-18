<?php
/* [Begin patch] */
/* [End patch] */
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/include/bo/class/dc_discipline.class.php')  && (strpos(__FILE__,'/include/bo/class/dc_discipline.class.php')===FALSE) ){
		include_once($_SERVER['DOCUMENT_ROOT'].'/include/bo/class/dc_discipline.class.php');
}else{
/*======================================

objet de BDD dc_discipline :: class dc_discipline

SQL mySQL:

DROP TABLE IF EXISTS dc_discipline;
CREATE TABLE dc_discipline
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_nom			varchar (64),
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

SQL Oracle:

DROP TABLE dc_discipline
CREATE TABLE dc_discipline
(
	dc_id			number (11) constraint dc_pk PRIMARY KEY not null,
	dc_nom			varchar2 (64),
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			number (11) not null
)


<?xml version="1.0" encoding="ISO-8859-1" ?>
<class name="dc_discipline" libelle="Discipline" prefix="dc" display="nom" abstract="nom" >
<item name="id" type="int" length="11" isprimary="true" notnull="true" default="-1" list="true" order="true" />

<item name="nom" libelle="Nom" type="varchar" length="64" list="true" order="true" oblig="true" nohtml="true" />


<item name="desc" libelle="Description" type="text" length="1024" list="false" order="false" oblig="false" option="textarea" />

<item name="cdate" libelle="Date de création" type="timestamp" list="true" order="true" />
<item name="mdate" libelle="Date de modification" type="timestamp" list="true" order="true" />
<item name="statut" libelle="statut" type="int" length="11" notnull="true" default="DEF_CODE_STATUT_DEFAUT" list="true" />
<langpack lang="fr">
<norecords>Pas de donnée à afficher</norecords>
</langpack>
</class> 


==========================================*/

class dc_discipline
{
var $inherited_list = array();
var $inherited = array();
var $id;
var $nom;
var $desc;
var $cdate;
var $mdate;
var $statut;


var $XML = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>
<class name=\"dc_discipline\" libelle=\"Discipline\" prefix=\"dc\" display=\"nom\" abstract=\"nom\" >
<item name=\"id\" type=\"int\" length=\"11\" isprimary=\"true\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" />

<item name=\"nom\" libelle=\"Nom\" type=\"varchar\" length=\"64\" list=\"true\" order=\"true\" oblig=\"true\" nohtml=\"true\" />


<item name=\"desc\" libelle=\"Description\" type=\"text\" length=\"1024\" list=\"false\" order=\"false\" oblig=\"false\" option=\"textarea\" />

<item name=\"cdate\" libelle=\"Date de création\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"mdate\" libelle=\"Date de modification\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"statut\" libelle=\"statut\" type=\"int\" length=\"11\" notnull=\"true\" default=\"DEF_CODE_STATUT_DEFAUT\" list=\"true\" />
<langpack lang=\"fr\">
<norecords>Pas de donnée à afficher</norecords>
</langpack>
</class> ";

var $XML_inherited = null;

var $sMySql = "CREATE TABLE dc_discipline
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_nom			varchar (64),
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

";

// constructeur
function dc_discipline($id=null)
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
		$this->nom = "";
		$this->desc = "";
		$this->cdate = date('Y-m-d H:i:s');
		$this->mdate = date('Y-m-d H:i:s');
		$this->statut = DEF_CODE_STATUT_DEFAUT;
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
	$laListeChamps[]=new dbChamp("Dc_nom", "text", "get_nom", "set_nom");
	$laListeChamps[]=new dbChamp("Dc_desc", "text", "get_desc", "set_desc");
	$laListeChamps[]=new dbChamp("Dc_cdate", "date_formatee_timestamp", "get_cdate", "set_cdate");
	$laListeChamps[]=new dbChamp("Dc_mdate", "date_formatee_timestamp", "get_mdate", "set_mdate");
	$laListeChamps[]=new dbChamp("Dc_statut", "entier", "get_statut", "set_statut");
	return($laListeChamps);
}


// getters
function get_id() { return($this->id); }
function get_nom() { return($this->nom); }
function get_desc() { return($this->desc); }
function get_cdate() { return($this->cdate); }
function get_mdate() { return($this->mdate); }
function get_statut() { return($this->statut); }


// setters
function set_id($c_dc_id) { return($this->id=$c_dc_id); }
function set_nom($c_dc_nom) { return($this->nom=$c_dc_nom); }
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
function getTable() { return("dc_discipline"); }
function getClasse() { return("dc_discipline"); }
function getPrefix() { return(""); }
function getDisplay() { return("nom"); }
function getAbstract() { return("nom"); }


} //class


// ecriture des fichiers
if (!is_dir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_discipline")){
	mkdir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_discipline");
	$list = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_discipline/list_dc_discipline.php", "w");
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
	$maj = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_discipline/maj_dc_discipline.php", "w");
	$majContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/maj.php'); ?".">";
	fwrite($maj, $majContent);
	fclose($maj);
	$show = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_discipline/show_dc_discipline.php", "w");
	$showContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/show.php'); ?".">";
	fwrite($show, $showContent);
	fclose($show);
	$rss = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_discipline/rss_dc_discipline.php", "w");
	$rssContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/rss.php'); ?".">";
	fwrite($rss, $rssContent);
	fclose($rss);
	$xml = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_discipline/xml_dc_discipline.php", "w");
	$xmlContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xml.php'); ?".">";
	fwrite($xml, $xmlContent);
	fclose($xml);
	$xmlxls = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_discipline/xlsx_dc_discipline.php", "w");
	$xmlxlsContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xlsx.php'); ?".">";
	fwrite($xmlxls, $xmlxlsContent);
	fclose($xmlxls);
	$import = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_discipline/import_dc_discipline.php", "w");
	$importContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/import.php'); ?".">";
	fwrite($import, $importContent);
	fclose($import);
}
}
?>