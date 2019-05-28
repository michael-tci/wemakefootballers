<?php
/*
Plugin Name: Accadamy Management Plugin
Plugin URI: http://www.pixelmargin.com/ 
Description: For managing accadamy Activities.
Version: 1.0
*/

include('includes/acadamy_manager.php');

add_action('admin_menu', 'accadamy_plugin_setup_menu');

function accadamy_plugin_setup_menu(){
		add_menu_page( 'Accadamy Management', 'Accadamy Management', 'manage_options', 'accaday-activities', 'gaccadamy_init' );
}

function accadamy_list_shortcode() {
    ob_start();

   global  $wpdb;
   if(isset($_GET['post_code'])){
	   $postCode = $_GET['post_code'];
   }
   else
   {
	   $postCode = $_POST['post_code'];
   }
   if(isset($postCode)){
   $results = $wpdb->get_results("SELECT * from wp_accadamy");
   $myArray= array();
    foreach($results as $row){
	   $post_code = $row->post_code;
	   $postcode1=(str_replace(' ', '', $postCode));
	   $postcode2=(str_replace(' ', '', $post_code));
		 
		$url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=$postcode2&destinations=$postcode1&mode=driving&language=en-EN&sensor=false";
		 
		$data = @file_get_contents($url);
		$result = json_decode($data, true);
		
		$row=(array)$row;
	    $row['distance'] = $result['rows'][0]['elements'][0]['distance']['value'];
	    $myArray[] = $row;
    }
    usort($myArray, function($a, $b) {
    	return $a['distance'] - $b['distance'];
	});
	?>
	<?php foreach($myArray as $row){ ?>
	
	<div class="jsn-bootstrap3 container">
	<div class="row">
	<div class="jsn-bootstrap3 wr-element-container wr-element-text locator-acd-list"><div class="wr_text" id="Mg5p3y"><p></p>
<div class="locator-right">
<h2><a href="<?php echo $row['academy_link'];?>"><?php print $row['name']; ?></a></h2>
<p class="distance-matrix"><?php print round($row['distance']/1000,2); ?> km</p>
<?php print nl2br($row['acc_address']); ?>
<p><?php print $row['post_code'];?></p>
</div>
<div class="extra-btns"><button class="weekly-training"><a href="<?php print $row['training_link']; ?>">Weekly Training Times &gt;</a></button><br>
<button class="holi-camps"><a href="<?php print $row['holyday_link']; ?>">Holiday Camps &gt;</a></button></div>
<p>
</p></div></div>

<?php } ?>


	</div>
	</div>
<?php
	
	
	
   
    }
     return ob_get_clean();
}
add_shortcode( 'accadamy_list', 'accadamy_list_shortcode' );


function accadamy_list_search_shortcode(){
	 ob_start();

	?>
	
	<div class="jsn-bootstrap3 wr-element-container wr-element-text"><div class="wr_text" id="A9rlRA"><div class="section form">
    <div class="container">
      <div class="row text-center home_footer_search">
        <h3 class="postcode-text"><?php print __('Find your nearest academy'); ?></h3>
        <form class="col-sm-16 post_selector_black" action="" method="post">
          <input class="form-controls" name="post_code" placeholder="Enter your postcode">
          <button type="submit" class="btn btn-find-locators" id="near-academy"><?php echo __('go') ?></button>
        </form>
      </div>
    </div>
  </div>
</div></div>
	
	
	<?php
	return ob_get_clean();
	
}
//[postcodesearchblack]
add_shortcode( 'accadamy_list_serach', 'accadamy_list_search_shortcode' );


function gaccadamy_init(){
	addForm();
	getList();
}

function addForm(){
	ini_set('display_errors',1);
	if(isset($_POST['submit'])){
		$name = $_POST['acc_name'];
		$address = $_POST['address'];
		$academy_link = $_POST['academy_link'];
		$training = $_POST['training'];
		$holyday = $_POST['holyday'];
		$post_code = $_POST['post_code'];
		$ac_ID = $_POST['ac_id'];
		
		if($_POST['ac_id'] == ''){
			global  $wpdb;
			//$wpdb->show_errors();
				$wpdb->insert( 
					'wp_accadamy', 
					array( 
						'name' => $name, 
						'acc_address' => $address,
						'academy_link' => $academy_link,
						'training_link'=>$training,
						'holyday_link' =>$holyday,
						'post_code' => $post_code
					), 
					array( 
						'%s', 
						'%s',
						'%s',
						'%s',
						'%s',
						'%s'
					) 
				);
			
				echo 'New Accadamy is added';
		}
		else
		{
			global  $wpdb;
			$wpdb->update(
				'wp_accadamy',
				array( 
						'name' => $name, 
						'acc_address' => $address,
						'academy_link' => $academy_link,
						'training_link'=>$training,
						'holyday_link' =>$holyday,
						'post_code' => $post_code
					),
				array('id'=> $ac_ID),
				array( 
						'%s', 
						'%s',
						'%s',
						'%s',
						'%s',
						'%s'
					) 
				);
				echo 'Accadamy updated successfully';
		}
		
	}
	
	global  $wpdb;
	if($_GET['action']=='edit' && isset($_GET['id']) && ($_GET['id'] != '')){
		$id = $_GET['id'];	
		$get_academy = $wpdb->get_row( "SELECT * FROM wp_accadamy WHERE id= $id " );
		$name= $get_academy->name;
		$acc_address= $get_academy->acc_address;
		$post_code = $get_academy->post_code;
		$academy_link = $get_academy->academy_link;
		$training_link = $get_academy->training_link;
		$holyday_link = $get_academy->holyday_link;

		//print_r($get_academy);
	}
	
	

?>
		  <div class="add_form">
		  
		  	<form action=""  method="post">
		  		<h4>Manage Academy List</h4>
		  		<input type="hidden" name="ac_id" value="<?php echo (isset($_GET['action']) && $_GET['action']=='edit')? $_GET['id']:'';?>">
		  		<table>
		  			<tr>
			  			<td><?php print __('Name'); ?></td>
			  			<td><input type="text" name="acc_name" required="true" value="<?php echo (isset($name) && $name!='')? $name :'';?>"></td>
		  			</tr>
		  			<tr>
		  				<td><?php print __('Address'); ?></td>
		  				<td><textarea name="address" rows="6" cols="50"><?php echo (isset($acc_address) && $acc_address!='')? $acc_address :'';?></textarea></td>
		  			</tr>
		  			<tr>
			  			<td><?php print __('Postcode'); ?></td>
			  			<td><input type="text" name="post_code" required="true" value="<?php echo (isset($post_code) && $post_code!='')? $post_code :'';?>"></td>
		  			</tr>
		  			<tr>
			  			<td><?php print __('Academy Link'); ?></td>
			  			<td><input type="text" name="academy_link" required="true" value="<?php echo (isset($academy_link) && $academy_link!='')? $academy_link :'';?>"></td>
		  			</tr>
		  			<tr>
		  				<td><?php print __('Weekly Training Times (link)'); ?></td>
		  				<td><input type="text" name="training" required="true" value="<?php echo (isset($training_link) && $training_link!='')? $training_link :'';?>"></td>
		  			</tr>
		  			
		  			<tr>
		  				<td><?php print __('Holyday camp (Link)'); ?></td>
		  				<td><input type="text" name="holyday" required="true" value="<?php echo (isset($holyday_link) && $holyday_link!='')? $holyday_link :'';?>"></td>
		  			</tr>
		  			<tr>
		  				<td colspan="2" align="right"><input type="submit" name="submit"></td>
		  			</tr>
		  		</table>
		  	
		  	</form>
		  </div>
<?php
	}
?>


<?php 
	function getList()
	{
		global  $wpdb;
		if(isset($_GET['action']) && $_GET['action']=='delete'){
		 	$id= $_GET['id'];
		 	$wpdb->delete( 'wp_accadamy', array( 'id' => $id) );
	 	}

?>
	
		<div class="container">
			<h4>Academy List</h4>
			<table cellpadding="10" cellspacing="10">
				
				<?php 
					$myrows = $wpdb->get_results( "SELECT * FROM wp_accadamy" ); 
					if(count($myrows)>0){  
						foreach($myrows as $row)
						{ 
							$id= $row->id; ?>
						<tr>
							<div class="academy-mngmt-list" style="margin-bottom: 40px;">
							<h5><strong><?php echo $row->name;?></strong></h5>
							<ul>
								<li><?php echo $row->acc_address;?></li>
								<li><?php echo $row->post_code;?></li>
								<li>Academy Link: <a href="<?php echo $row->academy_link;?>"><?php echo $row->academy_link;?></a></li>
								<li>Weekly Training: <a href="<?php echo $row->training_link;?>"><?php echo $row->training_link;?></a></li>
								<li>Holiday Camps: <a href="<?php echo $row->holyday_link;?>"><?php echo $row->holyday_link;?></a></li>
							</ul>
							<a href="<?php print admin_url("admin.php?page=accaday-activities&id=$id&action=edit"); ?>" class="edit"><?php echo __('Edit'); ?></a> |
							<a href="<?php print admin_url("admin.php?page=accaday-activities&id=$id&action=delete"); ?>"><?php echo __('Delete'); ?></a>

							</div>
						</tr>
						
				<?php			
						}
				}
				?>
			</table>
		</div>

<?php } ?>