<?php
include_once('cms-inc/include_cms.php');
include_once('cms-inc/include_class.php');

require('publicite.lib.php');

// recup du param get
if(!is_get('section')){
	$_GET['source'] = '0;null'; // values par défault
}
else{
	$_GET['source']=$_GET['section'].';'.$_GET['type'];
}

list($section, $type) = explode(';',$_GET['source']);
$source=$_GET['source'];


// ercup de la liste des sections
$oTemp = new meto_publicite();
xmlClassParse($oTemp->XML);

$classeName = $stack[0]["attrs"]["NAME"];
$classePrefixe = $stack[0]["attrs"]["PREFIX"];
$aNodeToSort = $stack[0]["children"];
$aNode = getItemByName($aNodeToSort, 'section');
$aOptions = $aNode["children"];
?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="Copyright" content="" />
	<meta name="Generator" content="Adequat'WEBSITE - Couleur Citron CMS" />
	<meta name="Author" content="" />
	<meta name="KEYWORDS" content="" />
	<meta name="DESCRIPTION" content="" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta http-equiv="Content-Language" content="fr" />
	<meta name="Robots" content="" />
	<meta name="geo.region" content="" />
	<meta name="geo.placename" content="" />
	<meta name="geo.position" content="" />
	<meta name="ICBM" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<title>Metonorm</title>
	<meta property="og:title" content="Metonorm" />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="" />
	<meta property="og:site_name" content="pierre.metonorm.hephaistos.interne" />
	<link rel="stylesheet" href="/custom/css/jquery.mobile-1.1.1.min.css" />
	<script src="/backoffice/cms/js/jquery-1.6.4.min.js" type="text/javascript"></script>		
	<script src="/custom/js/fr/jquery.mobile-1.1.1.min.js"></script>
	<link rel='stylesheet' type='text/css' href='/custom/css/fullcalendar.css' />
	<link rel='stylesheet' type='text/css' href='/custom/css/fullcalendar.print.css' media='print' />		
	<script type='text/javascript' src='/custom/js/fr/fullcalendar.min.js'></script>
	</head>
	<body>
		<style type='text/css'>
	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		background-color: #FFFFFF;
		}
	
	#loading {
		background-color: #FFFFFF;
	    display: none;
	    left: 30%;
	    padding: 70px 0;
	    position: absolute;
	    text-align: center;
	    top: 30%;
	    width: 50%;
	    z-index: 200;	
		}
	.spacer {
		clear: both;
		font-size: 1px;
		height: 1px;
	}
	#calendar, #header_calendar {
		width: 100%;		
		margin: 0px auto;	
		position: relative;	
	}
	#header_calendar {
		width: 900px;		
		margin: 20px auto 20px auto;	
		position: relative;	
	}
	#header_calendar .logo {
		float: left;
		margin-right: 50px;			
	}
	#header_calendar select {
		float: left;
		margin: 30px 5px 0px 5px;
		padding: 2px;
		height: 24px;
		font-family: arial;
		font-size: 12px;
		border: 1px solid #5D5D5D;		
	}
	#header_calendar input {
		float: left;
		background: url("/custom/img/fr/degrade_orange.png") repeat-x left top;
       	border: 1px solid #BF6800;
    	font-family: arial;
    	border-radius: 0 3px 3px 0;
	    color: #FFFFFF;
	    cursor: pointer;	    
	    font-size: 12px;
	    margin: 30px 5px 0px 5px;
	    height: 24px;
	    text-align: center;
	    text-transform: uppercase;
	    width: 66px;
	   }
	 .fc-header-title h2 {
		font-size: 16px;
		margin-top: 5px;
	}	
</style>	
		<script type='text/javascript'>
		$(document).ready(function() {	
			$('#calendar').fullCalendar({		
				editable: true,
				//weekends: false, 
				aspectRatio: 2.5,			
				events: "/modules/publicite/feed.json.php?source=<?php echo $source; ?>",
				buttonText: {
					today: 'Aujourd\'hui',
					prev:  '&nbsp;&lt;&nbsp;',
					next:  '&nbsp;&gt;&nbsp;'		        
			    },
			    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet',
		                        'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
		        dayNamesShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
		        			
				eventDrop: function(event, delta) {
					alert(event.title + ' was moved ' + delta + ' days\n' +
						'(should probably update your database)');
				},
				
				loading: function(bool) {
					if (bool) {
						$("#loading").show();					
					} else {
						$("#loading").hide();					
					}				
				}						
		                        			
			});
				
		});
	
	</script>

	<div data-role="page">
		<div data-role="header">
			<h1 style="text-align: left; margin: 0.6em 0 0.8em 3%;">Metonorm publicités</h1>
			<a href="#formulaire" data-theme="b" data-inline="true" data-icon="search" data-rel="dialog" class="ui-btn-right">Rechercher</a>								
		</div>
		<div data-role="content">	
			<div id="calendar">
				<div id="loading"><img src="/custom/img/fr/ajax-loader.gif" border="0" /></div>
			</div>		
		</div>
		<div data-role="footer"> 
			<h4>Metonorm publicités</h4> 
		</div> 	
	</div>
	
	<div data-role="page" id="formulaire" class="type-interior">
		<div data-role="header" data-theme="b">
			<h1>Choix des critères</h1>		
		</div>
		<div data-role="content">
			<div class="content-primary">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" data-ajax="false">
					<p>Choisir une page et son media pour visualiser le calendrier.</p>	
					<div data-role="fieldcontain" style="text-align: center;">						
					<select id="section" name="section" data-native-menu="false">
					<option data-placeholder="true">Chosir la page</option>
					<?php
					$aLinks = array();
					foreach($aOptions as $k => $aOption){
						if ($aOption["name"] == 'OPTION'){
							$sLink = '<option value="'.$aOption["attrs"]["VALUE"].'"';
							if ($aOption["attrs"]["VALUE"] == $section){
								$sLink .= ' selected="true"';
							}		
							$sLink .= '>'.$aOption["attrs"]["LIBELLE"].'</option>';		
							$aLinks[]=$sLink;
						}
					}
					echo implode("\n", $aLinks); 
					?>	
					</select>				
					</div>
					<div data-role="fieldcontain" style="text-align: center;">	
					<select name="type" id="type" data-native-menu="false">
					<option selected="true" value="-1">Choisir le type de média</option>
					<?php
					// filtrer sur les types de pubs
					// video haut bas habill.						
					// video = home
					//if ($section=='0'){
						echo '<option value="video" '; if($type=='video') echo 'selected="true"'; echo '>Video</option>'."\n";
					//}
					// pub haut = all sauf home
					//if ($section!='0'){
						echo '<option value="haut" '; if($type=='haut') echo 'selected="true"'; echo '>Pub haut</option>'."\n";
					//}
					// pub bas = all
					echo '<option value="bas" '; if($type=='bas') echo 'selected="true"'; echo '>Pub bas</option>'."\n";
					// habill = accueil
					//if ($section=='0'){
						echo '<option value="habill" '; if($type=='habill') echo 'selected="true"'; echo '>Habillage</option>'."\n";
					//}
					?>	
					</select>
					</div>
					<div class="ui-body ui-body-b">
						<fieldset class="ui-grid-a">
								<div class="ui-block-a"><button type="submit" data-theme="d">Cancel</button></div>
								<div class="ui-block-b"><button type="submit" data-theme="b">Submit</button></div>
					    </fieldset>
					</div>
				</form>
			</div>
		</div>
	</div>
	</body>
</html>