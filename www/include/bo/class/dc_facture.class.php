<?php
/* [Begin patch] */
/* [End patch] */

/*======================================

objet de BDD dc_facture :: class dc_facture

SQL mySQL:

DROP TABLE IF EXISTS dc_facture;
CREATE TABLE dc_facture
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_designation			varchar (64),
	dc_famille			int (11),
	dc_montant			decimal (10,2),
	dc_tva			decimal (10,2),
	dc_total			decimal (10,2),
	dc_desc			text (1024),
	dc_saison			int (11),
	dc_trim			int (11),
	dc_reglee			int (2),
	dc_envoyee			int (2),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

SQL Oracle:

DROP TABLE dc_facture
CREATE TABLE dc_facture
(
	dc_id			number (11) constraint dc_pk PRIMARY KEY not null,
	dc_designation			varchar2 (64),
	dc_famille			number (11),
	dc_montant			decimal (10,2),
	dc_tva			decimal (10,2),
	dc_total			decimal (10,2),
	dc_desc			text (1024),
	dc_saison			number (11),
	dc_trim			number (11),
	dc_reglee			number (2),
	dc_envoyee			number (2),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			number (11) not null
)


<?xml version="1.0" encoding="ISO-8859-1" ?>
<class name="dc_facture" libelle="Facture" prefix="dc" display="designation" abstract="famille" def_order_field="id" def_order_direction="DESC">
<item name="id" type="int" length="11" isprimary="true" notnull="true" default="-1" list="true" order="true" />

<item name="designation" libelle="D�signation" type="varchar" length="64" list="true" order="true" oblig="true" nohtml="true" />

<item name="famille" libelle="Famille" type="int" length="11" list="true" order="true" fkey="dc_famille"/>

<item name="montant" libelle="Total HT" type="decimal" length="10,2" list="true" order="true" nohtml="true" />
<item name="tva" libelle="TVA" type="decimal" length="10,2" default="0" list="true" order="true" nohtml="true" />
<item name="total" libelle="Total Net" type="decimal" length="10,2" list="true" order="true" nohtml="true" />

<item name="desc" libelle="Description" type="text" length="1024" list="false" order="false" oblig="false" option="textarea" />

<item name="saison" libelle="Saison" type="int" length="11" list="true" order="true" default="DEF_DC_SAISON" fkey="dc_saison"/>

<item name="trim" libelle="Trimestre" type="int" length="11" list="true" order="true" default="1" option="enum">
<option type="value" value="1" libelle="Trimestre 1" />
<option type="value" value="2" libelle="Trimestre 2" />
<option type="value" value="3" libelle="Trimestre 3" />
<option type="value" value="4" libelle="Stage" />
</item>

<item name="reglee" libelle="R�gl�e" type="int" length="2" default="1" list="true" order="true" option="bool" />

<item name="envoyee" libelle="Envoy�e" type="int" length="2" default="0" list="true" order="true" option="bool" />

<item name="cdate" libelle="Date de cr�ation" type="timestamp" list="true" order="true" />
<item name="mdate" libelle="Date de modification" type="timestamp" list="true" order="true" />
<item name="statut" libelle="statut" type="int" length="11" notnull="true" default="DEF_CODE_STATUT_DEFAUT" list="true" />
<langpack lang="fr">
<norecords>Pas de donn�e � afficher</norecords>
</langpack>
</class>  


==========================================*/

class dc_facture
{
var $inherited_list = array();
var $inherited = array();
var $id;
var $designation;
var $famille;
var $montant;
var $tva;
var $total;
var $desc;
var $saison;
var $trim;
var $reglee;
var $envoyee;
var $cdate;
var $mdate;
var $statut;


var $XML = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>
<class name=\"dc_facture\" libelle=\"Facture\" prefix=\"dc\" display=\"designation\" abstract=\"famille\" def_order_field=\"id\" def_order_direction=\"DESC\">
<item name=\"id\" type=\"int\" length=\"11\" isprimary=\"true\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" />

<item name=\"designation\" libelle=\"D�signation\" type=\"varchar\" length=\"64\" list=\"true\" order=\"true\" oblig=\"true\" nohtml=\"true\" />

<item name=\"famille\" libelle=\"Famille\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" fkey=\"dc_famille\"/>

<item name=\"montant\" libelle=\"Total HT\" type=\"decimal\" length=\"10,2\" list=\"true\" order=\"true\" nohtml=\"true\" />
<item name=\"tva\" libelle=\"TVA\" type=\"decimal\" length=\"10,2\" default=\"0\" list=\"true\" order=\"true\" nohtml=\"true\" />
<item name=\"total\" libelle=\"Total Net\" type=\"decimal\" length=\"10,2\" list=\"true\" order=\"true\" nohtml=\"true\" />

<item name=\"desc\" libelle=\"Description\" type=\"text\" length=\"1024\" list=\"false\" order=\"false\" oblig=\"false\" option=\"textarea\" />

<item name=\"saison\" libelle=\"Saison\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" default=\"DEF_DC_SAISON\" fkey=\"dc_saison\"/>

<item name=\"trim\" libelle=\"Trimestre\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" default=\"1\" option=\"enum\">
<option type=\"value\" value=\"1\" libelle=\"Trimestre 1\" />
<option type=\"value\" value=\"2\" libelle=\"Trimestre 2\" />
<option type=\"value\" value=\"3\" libelle=\"Trimestre 3\" />
<option type=\"value\" value=\"4\" libelle=\"Stage\" />
</item>

<item name=\"reglee\" libelle=\"R�gl�e\" type=\"int\" length=\"2\" default=\"1\" list=\"true\" order=\"true\" option=\"bool\" />

<item name=\"envoyee\" libelle=\"Envoy�e\" type=\"int\" length=\"2\" default=\"0\" list=\"true\" order=\"true\" option=\"bool\" />

<item name=\"cdate\" libelle=\"Date de cr�ation\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"mdate\" libelle=\"Date de modification\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"statut\" libelle=\"statut\" type=\"int\" length=\"11\" notnull=\"true\" default=\"DEF_CODE_STATUT_DEFAUT\" list=\"true\" />
<langpack lang=\"fr\">
<norecords>Pas de donn�e � afficher</norecords>
</langpack>
</class>  ";

var $XML_inherited = null;

var $sMySql = "CREATE TABLE dc_facture
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_designation			varchar (64),
	dc_famille			int (11),
	dc_montant			decimal (10,2),
	dc_tva			decimal (10,2),
	dc_total			decimal (10,2),
	dc_desc			text (1024),
	dc_saison			int (11),
	dc_trim			int (11),
	dc_reglee			int (2),
	dc_envoyee			int (2),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

";

// constructeur
function dc_facture($id=null)
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
		$this->designation = "";
		$this->famille = -1;
		$this->montant =  0.00;
		$this->tva =  0.00;
		$this->total =  0.00;
		$this->desc = "";
		$this->saison = DEF_DC_SAISON;
		$this->trim = 1;
		$this->reglee = 1;
		$this->envoyee = -1;
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
	// ATTENTION, respecter l'ordre des champs de la table dans la base de donn�es pour construire laListeChamp
	$laListeChamps[]=new dbChamp("Dc_id", "entier", "get_id", "set_id");
	$laListeChamps[]=new dbChamp("Dc_designation", "text", "get_designation", "set_designation");
	$laListeChamps[]=new dbChamp("Dc_famille", "entier", "get_famille", "set_famille");
	$laListeChamps[]=new dbChamp("Dc_montant", "decimal", "get_montant", "set_montant");
	$laListeChamps[]=new dbChamp("Dc_tva", "decimal", "get_tva", "set_tva");
	$laListeChamps[]=new dbChamp("Dc_total", "decimal", "get_total", "set_total");
	$laListeChamps[]=new dbChamp("Dc_desc", "text", "get_desc", "set_desc");
	$laListeChamps[]=new dbChamp("Dc_saison", "entier", "get_saison", "set_saison");
	$laListeChamps[]=new dbChamp("Dc_trim", "entier", "get_trim", "set_trim");
	$laListeChamps[]=new dbChamp("Dc_reglee", "entier", "get_reglee", "set_reglee");
	$laListeChamps[]=new dbChamp("Dc_envoyee", "entier", "get_envoyee", "set_envoyee");
	$laListeChamps[]=new dbChamp("Dc_cdate", "date_formatee_timestamp", "get_cdate", "set_cdate");
	$laListeChamps[]=new dbChamp("Dc_mdate", "date_formatee_timestamp", "get_mdate", "set_mdate");
	$laListeChamps[]=new dbChamp("Dc_statut", "entier", "get_statut", "set_statut");
	return($laListeChamps);
}


// getters
function get_id() { return($this->id); }
function get_designation() { return($this->designation); }
function get_famille() { return($this->famille); }
function get_montant() { return($this->montant); }
function get_tva() { return($this->tva); }
function get_total() { return($this->total); }
function get_desc() { return($this->desc); }
function get_saison() { return($this->saison); }
function get_trim() { return($this->trim); }
function get_reglee() { return($this->reglee); }
function get_envoyee() { return($this->envoyee); }
function get_cdate() { return($this->cdate); }
function get_mdate() { return($this->mdate); }
function get_statut() { return($this->statut); }


// setters
function set_id($c_dc_id) { return($this->id=$c_dc_id); }
function set_designation($c_dc_designation) { return($this->designation=$c_dc_designation); }
function set_famille($c_dc_famille) { return($this->famille=$c_dc_famille); }
function set_montant($c_dc_montant) { return($this->montant=$c_dc_montant); }
function set_tva($c_dc_tva) { return($this->tva=$c_dc_tva); }
function set_total($c_dc_total) { return($this->total=$c_dc_total); }
function set_desc($c_dc_desc) { return($this->desc=$c_dc_desc); }
function set_saison($c_dc_saison) { return($this->saison=$c_dc_saison); }
function set_trim($c_dc_trim) { return($this->trim=$c_dc_trim); }
function set_reglee($c_dc_reglee) { return($this->reglee=$c_dc_reglee); }
function set_envoyee($c_dc_envoyee) { return($this->envoyee=$c_dc_envoyee); }
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
function getTable() { return("dc_facture"); }
function getClasse() { return("dc_facture"); }
function getPrefix() { return(""); }
function getDisplay() { return("designation"); }
function getAbstract() { return("famille"); }


} //class


// ecriture des fichiers
if (!is_dir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_facture")){
	mkdir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_facture");
	$list = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_facture/list_dc_facture.php", "w");
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
	$maj = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_facture/maj_dc_facture.php", "w");
	$majContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/maj.php'); ?".">";
	fwrite($maj, $majContent);
	fclose($maj);
	$show = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_facture/show_dc_facture.php", "w");
	$showContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/show.php'); ?".">";
	fwrite($show, $showContent);
	fclose($show);
	$rss = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_facture/rss_dc_facture.php", "w");
	$rssContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/rss.php'); ?".">";
	fwrite($rss, $rssContent);
	fclose($rss);
	$xml = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_facture/xml_dc_facture.php", "w");
	$xmlContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xml.php'); ?".">";
	fwrite($xml, $xmlContent);
	fclose($xml);
	$xmlxls = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_facture/xlsx_dc_facture.php", "w");
	$xmlxlsContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xlsx.php'); ?".">";
	fwrite($xmlxls, $xmlxlsContent);
	fclose($xmlxls);
	$import = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_facture/import_dc_facture.php", "w");
	$importContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/import.php'); ?".">";
	fwrite($import, $importContent);
	fclose($import);
}
?>