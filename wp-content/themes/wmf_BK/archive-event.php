<?php
/**
 * Template Name: Events Archive
 **/
?>

<?php 
	
	global  $wpdb;
	$myrows = $wpdb->get_results( "SELECT * FROM wp_accadamy WHERE eventOne != '' " );
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
			
				<div class="singleEvent">
				<div class="eventOnly">
				<p><?php echo $eventOne[0];?></p>
				<span>&pound;<?php echo $eventOne[1].' Full Event';?></span> 
				<span class="linebrk">/</span>
				<span>&pound;<?php echo $eventOne[2].' Single Day';?></span>
				</div>
				<div class="bookEvent"><a href="http://www.kidsregister.com/login.php">Book now</a></div>
				</div>
				
				<?php if($eventTwo[0] != "") { ?>
				<div class="singleEvent">
				<div class="eventOnly">
				<p><?php echo $eventTwo[0];?></p>
				<span>&pound;<?php echo $eventTwo[1].' Full Event';?></span> 
				<span class="linebrk">/</span>
				<span>&pound;<?php echo $eventTwo[2].' Single Day';?></span>
				</div>
				<div class="bookEvent"><a href="http://www.kidsregister.com/login.php">Book now</a></div>
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
				<div class="bookEvent"><a href="http://www.kidsregister.com/login.php">Book now</a></div>
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
				<div class="bookEvent"><a href="http://www.kidsregister.com/login.php">Book now</a></div>
				</div>
				<?php } ?>
				

				
			</div>
			
		</div>
			
<?php			
			
		}
	}
	
?>