<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/include/autoprepend.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/include/cms-inc/include_cms.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/include/cms-inc/include_class.php');

include_once('publicite.lib.php');

if (preg_match('/planning\/([0-9]+)\/([0-9]+)/si', $_SERVER[REQUEST_URI], $aMatches)){
	$source=$aMatches[1];
	$wday=$aMatches[2];
	$_GET['source']=$source.';'.$wday;
	$admin=0;
}
elseif(!is_get('source')){// values par défault
	$source=0; 
	$wday=0;
	$admin=1;
}
else{// recup du param get
	list($source, $wday) = explode(';',$_GET['source']);
	$admin=1;
}
?>
	<script src="/backoffice/cms/js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<link rel='stylesheet' type='text/css' href='/custom/css/fullcalendar.css' />
	<link rel='stylesheet' type='text/css' href='/custom/css/fullcalendar.print.css' media='print' />		
	<script type='text/javascript' src='/custom/js/fr/fullcalendar.min.js'></script>
	<style type='text/css'>
	body {
		margin-top: 10px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		background-color: #FFFFFF;
		}
	
	#loading {
		background-color: #FFFFFF;
	    display: none;
	    left: 30%;
	    padding: 60px 0;
	    position: absolute;
	    text-align: center;
	    top: 34%;
	    width: 40%;
	    z-index: 200;	
		}
	.spacer {
		clear: both;
		font-size: 1px;
		height: 1px;
	}
	#calendar, #header_calendar {
		width: 90%;		
		margin: 0px auto;	
		position: relative;	
	}
	#header_calendar {
		width: 90%;		
		margin: 5px auto 5px auto;	
		position: relative;	
	}
	#header_calendar .logo {
		float: left;
		margin-right: 50px;			
	}
	#header_calendar select {
		float: left;
		margin: 5px 5px 0px 5px;
		padding: 2px;
		height: 24px;
		font-family: arial;
		font-size: 12px;
		border: 1px solid #5D5D5D;		
	}
	#header_calendar input {
		float: left;
       	border: 1px solid #BF6800;
    	font-family: arial;
    	border-radius: 0 3px 3px 0;
	    color: #FFFFFF;
	    cursor: pointer;	    
	    font-size: 12px;
	    margin: 5px 5px 0px 5px;
	    height: 24px;
	    text-align: center;
	    text-transform: uppercase;
	    width: 66px;
	}
	.fc-header{
		display:none;
	}
	#details{
		margin: 10px 5px 0px 5px;
		float: left;
		font-family: arial;
		font-size: 14px;
		font-weight: bold;
	}
</style>
<script type='text/javascript'>
	$(document).ready(function() {	
		$('#calendar').fullCalendar({		
			editable: false,
			aspectRatio: 1,	
			contentHeight: 1200,
			allDaySlot: false,	
			firstHour: 9,
			minTime:9,
			maxTime: 21,
			defaultView: 'agendaWeek',
			<?php
			if ($wday!=0){
				$hiddenDays=array(0,1,2,3,4,5,6);
				unset($hiddenDays[$wday]);
				
				echo "hiddenDays: [ ".implode(", ", $hiddenDays)."],\n";
			}
			else{
				echo "hiddenDays: [ 0 ],\n";
			}
			?>			
			events: "/modules/planning/feed.json.php?source=<?php echo $source; ?>",
			buttonText: {
				//today: 'Aujourd\'hui',
				//prev:  '&nbsp;&lt;&nbsp;',
				//next:  '&nbsp;&gt;&nbsp;'			        
		    },
		    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet',
	                        'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
	        dayNamesShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],	        
	        			
			eventDrop: function(event, delta) {
				alert(event.title + ' was moved ' + delta + ' days\n' +
					'(should probably update your database)');
			},
			
			eventMouseover: function( event, jsEvent, view ) {
				//alert(event.title);
				$("#details").html(event.title);
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
	
	function compactValues(){
		source = document.getElementById('section').value+';'+document.getElementById('wday').value;
		//source = document.getElementById('section').value;
		document.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?source="+source;	
	}
</script>
<div id="header_calendar">
<?php


if ($admin == 1){
	echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get" id="pubForm" name="pubForm">'."\n";
	
	$aLinks = array('<option value="0">Tous</option>');
	
	$sql = 'SELECT p.* FROM  dc_professeur AS p ORDER BY p.dc_nom ASC;';
	$rs = $db->Execute($sql);

	echo '<select id="section" name="section">'."\n";	
	if($rs) {
		while(!$rs->EOF) {
			$aRes=$rs->fields;
			
			$sLink = '<option value="'.$aRes["dc_id"].'"';
			if ($aRes["dc_id"] == $source){
				$sLink .= ' selected="true"';
			}		
			$sLink .= '>'.$aRes["dc_nom"].' '.$aRes["dc_prenom"].'</option>';
			$aLinks[]=$sLink;
			
			$rs->MoveNext();
		}
	}
	echo implode("\n", $aLinks); 
	echo "\n".'</select>'."\n";
	
	$wD = array('Tous', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	$aLinks = array();
	echo '<select id="wday" name="wday">'."\n";
	foreach($wD as $k => $dayVal){
		$sLink = '<option value="'.$k.'"';
		if ($k == $wday){
			$sLink .= ' selected="true"';
		}		
		$sLink .= '>'.$dayVal.'</option>';
		$aLinks[]=$sLink;
	}
	echo implode("\n", $aLinks); 
	echo "\n".'</select>'."\n";
	
	echo '<input type="button" id="valid" value="OK" onclick="compactValues();"/>';
	echo '</form>'."\n";
}
?>
	<div id="details"></div>
	<div class="spacer">&nbsp;</div>	
	
</div>

<div id="calendar">
	<div id="loading">chargement</div>
</div>

