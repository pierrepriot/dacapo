<?php
/* [Begin patch] */
/* [End patch] */
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/include/bo/class/dc_cours.class.php')  && (strpos(__FILE__,'/include/bo/class/dc_cours.class.php')===FALSE) ){
		include_once($_SERVER['DOCUMENT_ROOT'].'/include/bo/class/dc_cours.class.php');
}else{
/*======================================

objet de BDD dc_cours :: class dc_cours

SQL mySQL:

DROP TABLE IF EXISTS dc_cours;
CREATE TABLE dc_cours
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_nom			varchar (64),
	dc_discipline			int (11),
	dc_professeur			int (11),
	dc_jour			int (6),
	dc_horaire			varchar (64),
	dc_salle			int (6),
	dc_formule			int (11),
	dc_saison			int (11),
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

SQL Oracle:

DROP TABLE dc_cours
CREATE TABLE dc_cours
(
	dc_id			number (11) constraint dc_pk PRIMARY KEY not null,
	dc_nom			varchar2 (64),
	dc_discipline			number (11),
	dc_professeur			number (11),
	dc_jour			number (6),
	dc_horaire			varchar2 (64),
	dc_salle			number (6),
	dc_formule			number (11),
	dc_saison			number (11),
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			number (11) not null
)


<?xml version="1.0" encoding="ISO-8859-1" ?>
<class name="dc_cours" libelle="Cours" prefix="dc" display="nom" abstract="discipline" >
<item name="id" type="int" length="11" isprimary="true" notnull="true" default="-1" list="true" order="true" />

<item name="nom" libelle="Nom" type="varchar" length="64" list="true" order="true" oblig="true" nohtml="true" />

<item name="discipline" libelle="Discipline" type="int" length="11" list="true" order="true" fkey="dc_discipline"/>

<item name="professeur" libelle="Professeur" type="int" length="11" list="true" order="true" fkey="dc_professeur"/>

<item name="jour" libelle="Jour" type="int" length="6" list="true" order="true" option="enum">
<option type="value" value="1" libelle="Lundi" />
<option type="value" value="2" libelle="Mardi" />
<option type="value" value="3" libelle="Mercredi" />
<option type="value" value="4" libelle="Jeudi" />
<option type="value" value="5" libelle="Vendredi" />
<option type="value" value="6" libelle="Samedi" />
</item>

<item name="horaire" libelle="Horaire" type="varchar" length="64" list="true" order="true" oblig="true" nohtml="true" />

<item name="salle" libelle="Salle" type="int" length="6" list="true" order="true" option="enum">
<option type="value" value="1" libelle="Petite (piano noir)" />
<option type="value" value="2" libelle="Grande (piano blanc)" />
</item>

<item name="formule" libelle="Formule" type="int" length="11" list="true" order="true" fkey="dc_formule"/>

<item name="saison" libelle="Saison" type="int" length="11" list="true" order="true" default="DEF_DC_SAISON" fkey="dc_saison"/>

<item name="desc" libelle="Description" type="text" length="1024" list="false" order="false" oblig="false" option="textarea" />

<item name="cdate" libelle="Date de création" type="timestamp" list="true" order="true" />
<item name="mdate" libelle="Date de modification" type="timestamp" list="true" order="true" />
<item name="statut" libelle="statut" type="int" length="11" notnull="true" default="DEF_CODE_STATUT_DEFAUT" list="true" />
<langpack lang="fr">
<norecords>Pas de donnée à afficher</norecords>
</langpack>
</class>  


==========================================*/

class dc_cours
{
var $inherited_list = array();
var $inherited = array();
var $id;
var $nom;
var $discipline;
var $professeur;
var $jour;
var $horaire;
var $salle;
var $formule;
var $saison;
var $desc;
var $cdate;
var $mdate;
var $statut;


var $XML = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>
<class name=\"dc_cours\" libelle=\"Cours\" prefix=\"dc\" display=\"nom\" abstract=\"discipline\" >
<item name=\"id\" type=\"int\" length=\"11\" isprimary=\"true\" notnull=\"true\" default=\"-1\" list=\"true\" order=\"true\" />

<item name=\"nom\" libelle=\"Nom\" type=\"varchar\" length=\"64\" list=\"true\" order=\"true\" oblig=\"true\" nohtml=\"true\" />

<item name=\"discipline\" libelle=\"Discipline\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" fkey=\"dc_discipline\"/>

<item name=\"professeur\" libelle=\"Professeur\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" fkey=\"dc_professeur\"/>

<item name=\"jour\" libelle=\"Jour\" type=\"int\" length=\"6\" list=\"true\" order=\"true\" option=\"enum\">
<option type=\"value\" value=\"1\" libelle=\"Lundi\" />
<option type=\"value\" value=\"2\" libelle=\"Mardi\" />
<option type=\"value\" value=\"3\" libelle=\"Mercredi\" />
<option type=\"value\" value=\"4\" libelle=\"Jeudi\" />
<option type=\"value\" value=\"5\" libelle=\"Vendredi\" />
<option type=\"value\" value=\"6\" libelle=\"Samedi\" />
</item>

<item name=\"horaire\" libelle=\"Horaire\" type=\"varchar\" length=\"64\" list=\"true\" order=\"true\" oblig=\"true\" nohtml=\"true\" />

<item name=\"salle\" libelle=\"Salle\" type=\"int\" length=\"6\" list=\"true\" order=\"true\" option=\"enum\">
<option type=\"value\" value=\"1\" libelle=\"Petite (piano noir)\" />
<option type=\"value\" value=\"2\" libelle=\"Grande (piano blanc)\" />
</item>

<item name=\"formule\" libelle=\"Formule\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" fkey=\"dc_formule\"/>

<item name=\"saison\" libelle=\"Saison\" type=\"int\" length=\"11\" list=\"true\" order=\"true\" default=\"DEF_DC_SAISON\" fkey=\"dc_saison\"/>

<item name=\"desc\" libelle=\"Description\" type=\"text\" length=\"1024\" list=\"false\" order=\"false\" oblig=\"false\" option=\"textarea\" />

<item name=\"cdate\" libelle=\"Date de création\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"mdate\" libelle=\"Date de modification\" type=\"timestamp\" list=\"true\" order=\"true\" />
<item name=\"statut\" libelle=\"statut\" type=\"int\" length=\"11\" notnull=\"true\" default=\"DEF_CODE_STATUT_DEFAUT\" list=\"true\" />
<langpack lang=\"fr\">
<norecords>Pas de donnée à afficher</norecords>
</langpack>
</class>  ";

var $XML_inherited = null;

var $sMySql = "CREATE TABLE dc_cours
(
	dc_id			int (11) PRIMARY KEY not null,
	dc_nom			varchar (64),
	dc_discipline			int (11),
	dc_professeur			int (11),
	dc_jour			int (6),
	dc_horaire			varchar (64),
	dc_salle			int (6),
	dc_formule			int (11),
	dc_saison			int (11),
	dc_desc			text (1024),
	dc_cdate			timestamp,
	dc_mdate			timestamp,
	dc_statut			int (11) not null
)

";

// constructeur
function dc_cours($id=null)
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
		$this->discipline = -1;
		$this->professeur = -1;
		$this->jour = -1;
		$this->horaire = "";
		$this->salle = -1;
		$this->formule = -1;
		$this->saison = DEF_DC_SAISON;
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
	$laListeChamps[]=new dbChamp("Dc_discipline", "entier", "get_discipline", "set_discipline");
	$laListeChamps[]=new dbChamp("Dc_professeur", "entier", "get_professeur", "set_professeur");
	$laListeChamps[]=new dbChamp("Dc_jour", "entier", "get_jour", "set_jour");
	$laListeChamps[]=new dbChamp("Dc_horaire", "text", "get_horaire", "set_horaire");
	$laListeChamps[]=new dbChamp("Dc_salle", "entier", "get_salle", "set_salle");
	$laListeChamps[]=new dbChamp("Dc_formule", "entier", "get_formule", "set_formule");
	$laListeChamps[]=new dbChamp("Dc_saison", "entier", "get_saison", "set_saison");
	$laListeChamps[]=new dbChamp("Dc_desc", "text", "get_desc", "set_desc");
	$laListeChamps[]=new dbChamp("Dc_cdate", "date_formatee_timestamp", "get_cdate", "set_cdate");
	$laListeChamps[]=new dbChamp("Dc_mdate", "date_formatee_timestamp", "get_mdate", "set_mdate");
	$laListeChamps[]=new dbChamp("Dc_statut", "entier", "get_statut", "set_statut");
	return($laListeChamps);
}


// getters
function get_id() { return($this->id); }
function get_nom() { return($this->nom); }
function get_discipline() { return($this->discipline); }
function get_professeur() { return($this->professeur); }
function get_jour() { return($this->jour); }
function get_horaire() { return($this->horaire); }
function get_salle() { return($this->salle); }
function get_formule() { return($this->formule); }
function get_saison() { return($this->saison); }
function get_desc() { return($this->desc); }
function get_cdate() { return($this->cdate); }
function get_mdate() { return($this->mdate); }
function get_statut() { return($this->statut); }


// setters
function set_id($c_dc_id) { return($this->id=$c_dc_id); }
function set_nom($c_dc_nom) { return($this->nom=$c_dc_nom); }
function set_discipline($c_dc_discipline) { return($this->discipline=$c_dc_discipline); }
function set_professeur($c_dc_professeur) { return($this->professeur=$c_dc_professeur); }
function set_jour($c_dc_jour) { return($this->jour=$c_dc_jour); }
function set_horaire($c_dc_horaire) { return($this->horaire=$c_dc_horaire); }
function set_salle($c_dc_salle) { return($this->salle=$c_dc_salle); }
function set_formule($c_dc_formule) { return($this->formule=$c_dc_formule); }
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
function getTable() { return("dc_cours"); }
function getClasse() { return("dc_cours"); }
function getPrefix() { return(""); }
function getDisplay() { return("nom"); }
function getAbstract() { return("discipline"); }


} //class


// ecriture des fichiers
if (!is_dir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_cours")){
	mkdir($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_cours");
	$list = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_cours/list_dc_cours.php", "w");
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
	$maj = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_cours/maj_dc_cours.php", "w");
	$majContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/maj.php'); ?".">";
	fwrite($maj, $majContent);
	fclose($maj);
	$show = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_cours/show_dc_cours.php", "w");
	$showContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/show.php'); ?".">";
	fwrite($show, $showContent);
	fclose($show);
	$rss = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_cours/rss_dc_cours.php", "w");
	$rssContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/rss.php'); ?".">";
	fwrite($rss, $rssContent);
	fclose($rss);
	$xml = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_cours/xml_dc_cours.php", "w");
	$xmlContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xml.php'); ?".">";
	fwrite($xml, $xmlContent);
	fclose($xml);
	$xmlxls = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_cours/xlsx_dc_cours.php", "w");
	$xmlxlsContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/xlsx.php'); ?".">";
	fwrite($xmlxls, $xmlxlsContent);
	fclose($xmlxls);
	$import = fopen($_SERVER['DOCUMENT_ROOT']."/backoffice/dc_cours/import_dc_cours.php", "w");
	$importContent = "<"."?php include_once(\$_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php'); include('cms-inc/autoClass/import.php'); ?".">";
	fwrite($import, $importContent);
	fclose($import);
}
}
?>