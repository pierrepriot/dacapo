<?php
// sponthus 31/05/05
// fichier de config du CMS

include_once('cms-inc/utility_define.php');

//----- authorized GET  --------------

$getVars = array(
			"id" => "int",
			"adodb_next_page" => "int", 
			"xid" => "int",
			"xdo" => "varchar",
			"fCP" => "int",
			"fevent" => "varchar",
			"formname" => "varchar",
			"file" => "varchar",
			"dir" => "varchar",
			"chemin" => "varchar",
			"theme" => "int",
			"type" => "int",
			"urlTo" => "varchar",
			"action" => "varchar", 
			"ins" => "varchar",
			// cpacha
			"random" => "varchar",
			"function" => "varchar",
			// param PopupWysiwyg
			"source" => "varchar",
			"classe" => "varchar",
			"idObject" => "int",
			"idField" => "varchar", 
			"idForm" => "varchar", 
			// param AJouter dans MAJ
			"classeMain" => "varchar",
			"classeMainPrefixe" => "varchar",
			"idMain" => "int",
			"classeName" => "varchar", 
			// param FCKeditor
		    "idField" => "varchar",
		    "idForm" => "varchar",
		    "source" => "varchar",
		    "Type" => "varchar",
		    "CurrentFolder" => "varchar",
		    "Connector" => "varchar",
		    "Command" => "varchar",
		    "ExtraParams" => "varchar",
		    // fin param FCKeditor 
			"widthGab" => "int", 
			"heightGab" => "int",
			"idnew" => "int", 
			"num" => "int",
			"xmlData" => "varchar",
			// param export
			"export" => "int", 
			"idInslien" => "int",
			"rub" => "int",
			"theme" => "int",
			"idtheme" => "int",
			"idage" => "int",
			"page" => "varchar",
			"ass" => "int",
			"xidsite" => "int",
			"keyword" => "varchar",
			"idcourant" => "int",
			"format" => "varchar",
			"site" => "varchar",
			"idpage" => "int",
			"mois" => "int",
			"annee" => "int",
			"jour" => "int",
			"gamme" => "int", 
			"product" => "int", 
			"PHPSESSID" => "varchar",
			"id_survey" => "int"
			);
			
// -------------------------------

// sitemap excludes
// parametrage
$excludedUrls = array("content/aws2006/reference.php","content/aws2006/inter.php","content/aws2006/reference_temoignage.php",	"content/aws2006/reference_bloc.php","content/aws2006/reference_detailprojet.php", "content/aws2006/index2.php");
//-----------------------------------------------------------------

define ("DEF_SAISON", 5); // obsolete, remplacer par DEF_DC_SAISON

// ----------------------------

// fonctionnalités ADEQUATION
define ("DEF_MENUS_CCITRON", "ON"); // valeurs possibles : ON, OFF
define ("DEF_FONCT_NEWSLETTER", "OFF"); // valeurs possibles : ON, OFF
define ("DEF_MENUS_MINISITES", "ON"); // valeurs possibles : ON, OFF
define ("DEF_SCROLLSPACECONTENT", "OFF"); // valeurs possibles : ON, OFF
define ("DEF_XHTML", "1.0 Transitional"); // valeurs possibles : 1.0 Transitional, 1.0 Strict, 1.1
define ("DEF_FLASHPLAYERREQUIRED", "9"); // valeurs possibles : -1 = pas flash, 1,2,...,8,9,etc
define ("DEF_FLASHPLAYERLATEST", "10"); // valeurs possibles : 1,2,...,8,9,etc
define ("DEF_APP_USE_TRANSLATIONS", true);
define ("DEF_APP_LANGUE", 1);

// connexion BDD
define("DEF_BDD", "MYSQL"); // valeurs possibles : ORACLE, POSTGRES, MYSQL

define ("DEF_DRIVER", "MYSQL"); // oci8, MYSQL
define ("DEF_BDD_SERVER", "localhost"); // server
define ("DEF_BDD_DBNAME", "dacapo"); // nom BDD
define ("DEF_BDD_USER", "mysql"); // user BDD
define ("DEF_BDD_PWD", "pwdmysql"); // pwd BDD
define ("DEF_BDD_DEBUG", false); // debug

define ("DEF_NAME_FIELD", "LOWER"); // nom des champs en Majuscules (UPPER) ou Minuscules (LOWER)

define ("DEF_MEMORY_LIMIT", 32); // MEMORY_LIMIT Mo de RAM (INT)

// CMS : CHEMINS
define ("DEF_SPAW_ROOT", "spaw.1.1rc1/"); // éditeur WYSIWYG
define ("DEF_CSV", "documents/"); // fichiers csv
define ("DEF_GABARIT_ROOT", "custom/gabarit"); // répertoire de stockage des gabarits
define ("DEF_PAGE_ROOT", "content"); // répertoire de stockage des pages
define ("DEF_TEMP_ROOT", "tmp"); // répertoire des fichiers temporaires

// id du gabarit INIT
define ("DEF_IDGABINIT", "1"); // gabarit d'initialisation pour la création des gabarits

// GABARIT
define ("DEF_GABINIT", "init"); // gabarit d'initialisation pour la création des gabarits
define ("DEF_GABINITWIDTH", "1024"); // WIDTH et HEIGHT par défaut
define ("DEF_GABINITHEIGHT", "768");

// ZONE EDITABLE - BRIQUE EDITABLE
define ("DEF_ZONEDIT", "ZONEDIT"); // brique de zone éditable pour la création des gabarits
define ("DEF_ZONEDITWIDTH", "200"); // WIDTH et HEIGHT par défaut
define ("DEF_ZONEDITHEIGHT", "200");

// nouvelle brique éditable créée à la place de la zone editable
define ("DEF_BRIQUEEDIT", "BRIQUEDIT");

// UTILISATEURS
define ("DEF_USERLOGIN", "ccitron"); // utilisateurs par défaut
define ("DEF_USERNOM", "ccitron"); // si ces users n'existent pas ils sont créés comme ceci
define ("DEF_USERPRENOM", "ccitron"); // s'il existent (check sur le login), ils ne sont pas modifiés
define ("DEF_USERMAIL", "technique@couleur-citron.com");
define ("DEF_USERTEL", "05 34 51 38 15");
define ("DEF_USERPASSWD", "couleur");

// CIVILITE
define ("DEF_ID_CIV_MME", 51); // id
define ("DEF_ID_CIV_MLLE", 52);
define ("DEF_ID_CIV_M", 53);
define ("DEF_LIB_CIV_MME", "Mme"); // libelle
define ("DEF_LIB_CIV_MLLE", "Mlle");
define ("DEF_LIB_CIV_M", "Mr");

// CALENDRIER
define("DEF_CALEND_NOSEMAINE", false);
define("DEF_CALEND_ONLYDAYOFMONH", true);
define("DEF_CALEND_CLIC", true);
define("DEF_CALEND_ALLCLIC", false);

// nombre de champs PLUS dans un forumaire référence
define("DEF_MAX_PLUS", 7);
// nombre de champs temoignage dans un forumaire référence
define("DEF_MAX_TEM",1);

// TYPES DES REFERENCES
define ("DEF_ID_REF_01", "200"); // id
define ("DEF_ID_REF_02", "201");
define ("DEF_ID_REF_03", "202");
define ("DEF_ID_REF_04", "203");
define ("DEF_ID_REF_05", "204");
define ("DEF_LIB_REF_01", "communication globale"); // libelles
define ("DEF_LIB_REF_02", "édition");
define ("DEF_LIB_REF_03", "web");
define ("DEF_LIB_REF_04", "multimedia");
define ("DEF_LIB_REF_05", "vidéo");
define ("DEF_ID_REF_DEFAUT", DEF_ID_REF_01); // par défaut
define ("DEF_ID_REF_DEFAULT","8");

// rangs utilisateurs
define ("DEF_ADMIN", "ADMIN");
define ("DEF_LIBADMIN", "Administrateur");
define ("DEF_GEST", "GEST");
define ("DEF_LIBGEST", "Valideur");
define ("DEF_REDACT", "REDACT");
define ("DEF_LIBREDACT", "Contributeur");


// STATUT
define ("DEF_LIB_STATUT_ATTEN", "En attente"); // libellés
define ("DEF_LIB_STATUT_REDACT", "A valider");
define ("DEF_LIB_STATUT_GEST", "Validé");
define ("DEF_LIB_STATUT_LIGNE", "En ligne");
define ("DEF_LIB_STATUT_ARCHI", "Archivé");
define ("DEF_ID_STATUT_ATTEN", "1"); // id
define ("DEF_ID_STATUT_REDACT", "2");
define ("DEF_ID_STATUT_GEST", "3");
define ("DEF_ID_STATUT_LIGNE", "4");
define ("DEF_ID_STATUT_ARCHI", "5");
define ("DEF_CODE_STATUT_DEFAUT", DEF_ID_STATUT_ATTEN); // par défaut

// STATUT ACTUALITES
define ("DEF_LIB_STATUT_ACTU_BROUILLON", "Brouillon"); // libellés
define ("DEF_LIB_STATUT_ACTU_LIGNE", "En ligne");
define ("DEF_ID_STATUT_ACTU_BROUILLON", "20"); // id
define ("DEF_ID_STATUT_ACTU_LIGNE", "21");
define ("DEF_CODE_STATUT_ACTU_DEFAUT", DEF_ID_STATUT_ACTU_BROUILLON); // par défaut

// STATUT REFERENCES
define ("DEF_LIB_STATUT_REF_BROUILLON", "Brouillon"); // libellés
define ("DEF_LIB_STATUT_REF_LIGNE", "En ligne");
define ("DEF_ID_STATUT_REF_BROUILLON", "30"); // id
define ("DEF_ID_STATUT_REF_LIGNE", "31");
define ("DEF_CODE_STATUT_REF_DEFAUT", DEF_ID_STATUT_REF_BROUILLON); // par défaut

// statuts des newsletter
define ("DEF_ID_STATUT_NEWS_ATTEN", "1"); // id
define ("DEF_ID_STATUT_NEWS_CREA", "4");
define ("DEF_ID_STATUT_NEWS_ENVOI", "5");
define ("DEF_ID_STATUT_NEWS_ERREUR", "9");
//define ("DEF_ID_STATUT_NEWS_VALID ", "10"); // libellés
define ("DEF_LIB_STATUT_NEWS_ATTEN", "En attente"); // libellés
define ("DEF_LIB_STATUT_NEWS_CREA", "Créée");
define ("DEF_LIB_STATUT_NEWS_ENVOI", "Envoyé");
define ("DEF_LIB_STATUT_NEWS_ERREUR", "Erreur d'envoi");
define ("DEF_CODE_STATUT_NEWS_DEFAUT", DEF_ID_STATUT_NEWS_ATTEN); // par défaut
define ("DEF_LIB_STATUT_NEWS_ENCOURS", "En cours de rédaction"); // libellés
define ("DEF_LIB_STATUT_NEWS_VALID", "Validé"); // libellés

// MESSAGES D'ERREUR
define ("DEF_ERR_AUCUNMINISITE", "Aucun mini site créé"); // a_voir sponthus créer un fichier d'erreurs

// FONCTIONNALITES disponibles par mini site
define ("DEF_NBFONCT", "5");
define ("DEF_FONCT0", "PA"); // code
define ("DEF_FONCT1", "FORUM");
define ("DEF_FONCT2", "NEWSLETTER");
define ("DEF_FONCT3", "SONDAGE");
define ("DEF_FONCT4", "FORM");
define ("DEF_LIBFONCT0", "Petites annonces"); // libelle
define ("DEF_LIBFONCT1", "Forum");
define ("DEF_LIBFONCT2", "Newsletter");
define ("DEF_LIBFONCT3", "Sondage");
define ("DEF_LIBFONCT4", "Formulaire");


// Mode Debug => affichage complet de l'erreur si true
define ("DEF_MODE_DEBUG", false);

// PAGINATION
define ("DEF_NBACTUSHORT_PAGE", 6); // Nombre de résumé d'actus par page (homepage)
define ("DEF_NBACTULONG_PAGE", 2); // Nombre d'actus détaillées par page
define ("DEF_NBRESULT_PAGE", 15); // Nombre de ligne résultat de recherche (musicien/répertoire) par page
define ("DEF_NBDROIT_PAGE", 50); // Nombre de pages dans la gestion des droits (backoffice)
define ("DEF_NBDROIT_CONTENT", 50); // Nombre de content dans la gestion des contenus (backoffice)

// TAILLE IMAGES

// PETITES ANNONCES
define ("DEF_EXPIRE_INSCRIPTION", "180");
define ("DEF_RAPPEL_INSCRIPTION", "15");
define ("DEF_EXPIRE_FROM", "webmaster.internet@".$_SERVER['HTTP_HOST']);
define ("DEF_EXPIRE_SUJET", "[Mairie Boulogne Billancourt] Petites annonces et gardes partagées");
define ("DEF_EXPIRE_MSG", "Bonjour [PRENOM] [NOM],<br><br>
vous n'utilisez plus le module petites annonces de la mairie de Boulogne Billancourt.<br><br>
Si vous souhaitez continuer à utiliser ce service, veuillez cliquer sur le lien suivant : <br>
<a href='http://".$_SERVER['HTTP_HOST']."/frontoffice/petites_annonces/inscrire.php?id=[ID]&mail=[MAIL]&inscription=yes' target='_blank'>poursuivre 
l'inscription</a><br><br>
Si vous ne souhaitez plus continuer à utiliser ce service, veuillez cliquer sur le lien suivant : <br>
<a href='http://".$_SERVER['HTTP_HOST']."/frontoffice/petites_annonces/inscrire.php?id=[ID]&mail=[MAIL]&inscription=no' target='_blank'>se désinscrire</a><br><br>
Si vous ne connaissez plus votre mot de passe, veuillez cliquer sur le lien suivant : <br>
<a href='http://".$_SERVER['HTTP_HOST']."/frontoffice/petites_annonces/inscrire.php?id=[ID]&mail=[MAIL]&inscription=newpwd' target='_blank'>générer un nouveau mot de passe</a><br><br>
En l'absence de réponse à ce mail dans un délai de 15 jours, votre compte sera supprimé.<br><br>
Cordialement, le webmaster <br>
<a href='mailto:".DEF_EXPIRE_FROM."'>".DEF_EXPIRE_FROM."</a><br><br>
<a href='http://".$_SERVER['HTTP_HOST']."</a>'>".$_SERVER['HTTP_HOST']."</a>");

define ("DEF_VALIDATE_PA_FROM", "webmaster.internet@".$_SERVER['HTTP_HOST']);
define ("DEF_VALIDATE_PA_SUJET", "[[SITE]] :: Confirmation d'inscription aux petites annonces");
define ("DEF_VALIDATE_PA_MSG", "Bonjour [PRENOM] [NOM], <br><br>
Nous avons bien reçu votre demande d\'inscription et l\'avons validée.<br><br>
Vous pouvez désormais vous connecter afin de consulter pleinement et déposer 
des annonces sur le site http://".$_SERVER['HTTP_HOST']."/content/BBMIX/<br><br>
Vos codes d\'accès : <br>
identifiant : [MAIL] <br>
mot de passe : [PWD] <br> <br>
Cordialement, <br>
le webmaster.");

define ("DEF_UNVALIDATE_PA_FROM", "webmaster.internet@".$_SERVER['HTTP_HOST']);
define ("DEF_UNVALIDATE_PA_SUJET", "[[SITE]] :: Désinscription aux petites annonces");
define ("DEF_UNVALIDATE_PA", "Bonjour [PRENOM] [NOM],<br><br>
Nous avons le regret de vous informer que votre compte a été désactivé par nos services.<br><br>
Pour plus d\'informations sur les motifs de cette action, merci de contacter le webmaster à l\'adresse suivante : <br>
webmaster.internet@".$_SERVER['HTTP_HOST']." <br><br>
Cordialement,<br>
le webmaster");

define ("DEF_SUPPINSCRIT_PA_FROM", "webmaster.internet@".$_SERVER['HTTP_HOST']);
define ("DEF_SUPPINSCRIT_PA_SUJET", "[[SITE]] :: Petites annonces - suppression de votre compte");
define ("DEF_SUPPINSCRIT_PA", "Bonjour [PRENOM] [NOM], <br><br>
Nous avons le regret de vous informer que votre compte a été supprimé de nos serveurs. <br>
Cette suppression est définitive. <br>
Vous avez toutefois la possibilité de vous recréer un compte sur le site de BBMIX.<br><br>
Cordialement,<br>
le webmaster");


// newsletter
define("DEF_ID_INSCRIT_0", "100");
define("DEF_LIB_INSCRIT_0", "inscrit newsletter");
define("DEF_LITE_NEWSLETTER", "OFF"); // valeurs possibles : ON, OFF

// MAIL
define("DEF_MAIL_HOST", "80.247.235.90");
define("DEF_MAIL_ENGINE", "sendmail");// valeurs possibles : sendmail, smtp
define("DEF_USEPHPMAILFUNCTION", "0"); // valeur : 0, 1 - default 0

// TAILLE IMAGES
define ("DEF_PHOTO_WIDTH_ACT", "142");
define ("DEF_PHOTO_HEIGHT_ACT", "91");
define ("DEF_PHOTO_WIDTH_NOUVEAU", "450");
define ("DEF_PHOTO_HEIGHT_NOUVEAU", "650");
define ("DEF_PHOTO_WIDTH_ANI", "95");
define ("DEF_PHOTO_HEIGHT_ANI", "66");
define ("DEF_PHOTO_WIDTH_INT", "220");
define ("DEF_PHOTO_HEIGHT_INT", "188");
define ("DEF_UPLOADPHOTO", "/custom/upload/photo");
define ("DEF_ROOT_UPLOADPHOTO", $_SERVER['DOCUMENT_ROOT'].DEF_UPLOADPHOTO);

//newsletter
define ("DEF_UPLOADNEWS", "/custom/upload/newsletter");
define ("DEF_ROOT_UPLOADNEWS", $_SERVER['DOCUMENT_ROOT'].DEF_UPLOADNEWS);
define ("DEF_ROOT_TEMPLATENEWS", "/frontoffice/newsletter/template");

// PDF
define ("DEF_UPLOADPDF", "/custom/upload/");

// email de l'expéditeur (from) "contact"
define ("DEF_CONTACT_FROM", "Couleur Citron <technique@couleur-citron.com>");
//define ("DEF_CONTACT_FROM", "Couleur Citron <technique@couleur-citron.com>");
//define ("DEF_CONTACT_FROM", "technique@couleur-citron.com");
define ("DEF_CONTACT_FROM_NAME", "Couleur Citron");
define ("DEF_CONTACT_FROM_EMAIL", "technique@couleur-citron.com");


define ("DEF_RSS_GUID", "");

$descriptionTOP =''; 
$descriptionBOTTOM='';

define ("DEF_RSS_HTML_TOP", $descriptionTOP);
define ("DEF_RSS_HTML_BOTTOM", $descriptionBOTTOM);

$sMsgNews = "Confirmation d'inscription à la Newsletter de la Maison de l'Environnement de Midi-Pyrénées<br><br>";
$sMsgNews.= "Nom : [NOM]<br> Prénom : [PRENOM]<br>Email : [MAIL]";
$sMsgNews.= "<br><br>Newsletter sélectionnées : [INTERET]";


$sMsgNews.= "<a href='http://".$_SERVER['HTTP_HOST']."'>".$_SERVER['HTTP_HOST']."</a></font>"; 

define ("DEF_MSG_INSCRIT_NEWSLETTER", $sMsgNews);


// formulaire
define("DEF_MAXCHAMPSFORM", 15);
define ("DEF_FCK_VERSION", "ckeditor");
define ("DEF_FCK_TOOLBARSET","Full"); // variable déjà existante à modifier

// Da Capo
define ("DEF_DC_SAISON", 5); // id de la saison en cours



// WEBSHOP
/*

// Setup
define('WEBSHOP_NAME', $_SERVER['HTTP_HOST']);
define('WEBSHOP_ORDER_PREFIX', 'SAFRAL');
define('WEBSHOP_STOCK_DEDUCE', true);		// deduce from stock when ordering product
define('WEBSHOP_STOCK_ALERT', true);		// alert when low stock level is reached
define('WEBSHOP_LOGIN_CUSTOMER', true);		// customer handles his account
define('WEBSHOP_CUSTOM_LIB', 'modules/webshop/custom/lib.webshop_agelys.php'); 

define('SHP_AUTO_EMAIL', 'commande@safral.com');
//define('SHP_AUTO_EMAIL', 'luc@suhali.net');
define('SHP_DEST_EMAIL', 'thao@couleur-citron.com');
//define('SHP_DEST_EMAIL', 'luc.thibault@online.fr');
define ('SHP_PAYPAL_EMAIL', 'thao@couleur-citron.com');
//define ('SHP_PAYPAL_EMAIL', 'shop_1261403541_biz@couleur-citron.com');

define("WEBSHOP_IS_TYPEPRODUIT", false);		// use product type when getting product list

// Specify payment engine
define('WEBSHOP_CBAPI', 'systempay_APIv1');	// systempay_APIv1, e_transactions_APIv6
define('WEBSHOP_POSTTEST', 'result');		// result (systempay_APIv1), DATA (e_transactions_APIv6)
define('WEBSHOP_SPAY_ID', '96644184');
define('WEBSHOP_SPAY_CERTIF', '3288711457130288');

// list of shipping destinations countries (IDs)
$country_pile = Array(74, 81, 14, 21, 58, 84, 104, 106, 125, 142, 151, 161, 172, 205, 206, 248);

// list of available order status !! DO NOT EDIT
define('OR_KRT_STD',	1);		// en cours de composition (état premier si tracking des commandes avortées)
define('OR_KRT_OK',	2);		// composée
define('OR_PAY_FAI',	3);		// paiement échoué
define('OR_PAY_STD',	4);		// en attente de paiement
define('OR_PAY_RET',	5);		// premier retour paiement (avant IPN)
define('OR_PAY_OK',	6);		// confirmation paiement (IPN OK)
define('OR_MAN_FAI',	7);		// erreur à la préparation
define('OR_MAN_STD',	8);		// en attente de préparation
define('OR_MAN_VAL',	9);		// préparation en attente de validation
define('OR_MAN_OK',	10);		// préparation validée
define('PCK_VAL_STD',	11);		// colis en attente de préparation
define('PCK_VAL_OK',	12);		// colis prêt
define('PCK_SHP_STD',	13);		// colis en attente d'envoi
define('PCK_SHP_OK',	14);		// colis envoyé
define('PCK_DEL_OK',	15);		// colis arrivé

*/
?>