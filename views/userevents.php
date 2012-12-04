<?php 	
	require_once("../src/Evento.php");
	$event = new Evento;
	$events = $event->getEventos();		


	$layout = '
	<div class="accordion" id="events_accordion">';
	$id = 0;
	foreach ($events as $key => $value) {		
		$event = '
			<div class="accordion-group"  style="margin-top:30px">
			    <div class="accordion-heading">
			      <a class="accordion-toggle" data-toggle="collapse" data-parent="#events_accordion" href="#'.$id.'">'.
					$events[$key]['Name'].' 
				  </a>
				  
				  	<span id="owner">'.$events[$key]['Owner'].' </span> 				  
			    </div>
			    <div id="'.$id.'" class="accordion-body collapse in">
			      <div class="accordion-inner">'.
			        $events[$key]['Description'].'	
			        <br>		       
			        <span id="date">'.substr($events[$key]['Departure'],0,16).' </span>  	
			        <br>		        
			        <a id="maplink"> view map </a>
			      </div>
			    </div>			  
			</div>';
		$layout .= $event;	
		++$id;			
	}
	$layout .= '</div>';
	echo $layout;

?>