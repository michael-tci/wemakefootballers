<?php
/**
 * Template Name: Events Archive
 **/
?>

<?php 
	
	global  $wpdb;
	$myrows = $wpdb->get_results( "SELECT * FROM wp_accadamy WHERE eventOne != '' ORDER BY eventOne DESC " );
	if(count($myrows)>0){ 
		foreach($myrows as $row){
			//print_r($row); 
							
							$eventOne = explode(",",$row->eventOne);
							$eventTwo = explode(",",$row->eventTwo); 
							$eventThree = explode(",",$row->eventThree);
							$eventFour = explode(",",$row->eventFour);

							
		?>	
		
		<div class="accademyEvents">
			<h3><?php echo $row->name;?></h3>
			<div class="acc_addre"><p><?php echo $row->acc_address;?></p>
			<p><?php echo $row->post_code;?></p></div>
			<div class="eventDates">
			<?php
						if($eventOne[0] != NULL){
					 ?>
				<div class="singleEvent">
				<div class="eventOnly">
					
				<p><?php echo $eventOne[0];?></p>
				<span>&pound;<?php echo $eventOne[1].' Full Event';?></span> 
				<span class="linebrk">/</span>
				<span>&pound;<?php echo $eventOne[2].' Single Day';?></span>
				</div>
				<div class="bookEvent"><a href="https://www.parentarea.co/parent/login">Book now</a></div>
				</div>
				<?php }else{ ?>
				
				<div class="singleEvent">
				<div class="eventOnly"><span style="color:rgb( 238, 121, 37 );">There are currently no holiday camps scheduled at this academy.</span></div></div>

				<?php } ?>

				<?php if($eventTwo[0] != "") { ?>
				<div class="singleEvent">
				<div class="eventOnly">
				<p><?php echo $eventTwo[0];?></p>
				<span>&pound;<?php echo $eventTwo[1].' Full Event';?></span> 
				<span class="linebrk">/</span>
				<span>&pound;<?php echo $eventTwo[2].' Single Day';?></span>
				</div>
				<div class="bookEvent"><a href="https://www.parentarea.co/parent/login">Book now</a></div>
				</div>
				<?php } ?>
				
				<?php if($eventThree[0] != "") { ?>
				<div class="singleEvent">
				<div class="eventOnly">
				<p><?php echo $eventThree[0];?></p>
				<span>&pound;<?php echo $eventThree[1].' Full Event';?></span> 
				<span class="linebrk">/</span>
				<span>&pound;<?php echo $eventThree[2].' Single Day';?></span>
				</div>
				<div class="bookEvent"><a href="https://www.parentarea.co/parent/login">Book now</a></div>
				</div>
				<?php } ?>
				
				<?php if($eventFour[0] != "") { ?>
				<div class="singleEvent">
				<div class="eventOnly">
				<p><?php echo $eventFour[0];?></p>
				<span>&pound;<?php echo $eventFour[1].' Full Event';?></span> 
				<span class="linebrk">/</span>
				<span>&pound;<?php echo $eventFour[2].' Single Day';?></span>
				</div>
				<div class="bookEvent"><a href="https://www.parentarea.co/parent/login">Book now</a></div>
				</div>
				<?php } ?>
				

				
			</div>
			
		</div>
			
<?php			
			
		}
	}
	
?>