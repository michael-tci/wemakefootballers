<?php

// tiny edit
global $wpdb;
$updateMessage = '';
$sql = "SELECT * FROM `{$wpdb->prefix}options` WHERE `option_name` = 'academy_dropdown'";
$academy_dropdown = $wpdb->get_results($sql, OBJECT);

if (empty($academy_dropdown)) {
    // alter col to table 
    $sql_insert = "INSERT INTO `{$wpdb->prefix}options` VALUES ('0', 'academy_dropdown', 'add_academy', 'yes')";
    $wpdb->query($sql_insert);
}
// $test = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}options` WHERE `option_name` = 'academy_dropdown'", OBJECT);
// echo "done<pre>"; print_r($test); die;

// tiny end 

    /*
    Plugin Name: Accadamy Management Plugin
    Plugin URI: http://www.pixelmargin.com/ 
    Description: For managing accadamy Activities.
    Version: 1.0
    */
    add_action('admin_menu', 'accadamy_plugin_setup_menu');
    
    function accadamy_plugin_setup_menu(){
    		add_menu_page( 'Accadamy Management', 'Accadamy Management', 'manage_options', 'accaday-activities', 'gaccadamy_init' );
    }
    
    function accadamy_list_shortcode() {
        ob_start();
    
       global  $wpdb;
       if(! empty($_GET['post_code'])){
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
    		 
    		$url = "https://maps.googleapis.com/maps/api/distancematrix/json?key=AIzaSyC8lTvkGwBMLSlbmIuU0RsG8N4N_-ANKKg&origins=$postcode2&destinations=$postcode1&mode=driving&language=en-EN&sensor=false";
    		 
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
<div class="jsn-bootstrap3 container">
    <div id="ANujIo" class="row " style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;">
        <div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
            <div class="jsn-bootstrap3 wr-element-container wr-element-text locator-heading">
                <div class="wr_text" id="aC5cxA">
                    <h1>Nearest Academies to <?php echo $_GET['post_code'];?> </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach($myArray as $row){ ?> 
<div class="jsn-bootstrap3 container">
    <div class="row">
        <div class="jsn-bootstrap3 wr-element-container wr-element-text locator-acd-list">
            <div class="wr_text" id="Mg5p3y">
                <p></p>
                <div class="locator-right">
                    <h2><a href="<?php echo $row['academy_link'];?>"><?php print $row['name']; ?></a></h2>
                    <p class="distance-matrix"><?php print round($row['distance']/1000,2); ?> km</p>
                    <?php print nl2br($row['acc_address']); ?>
                    <p><?php print $row['post_code'];?></p>
                </div>
                <div class="extra-btns"><button class="weekly-training"><a href="<?php print $row['training_link']; ?>">Weekly Training Times &gt;</a></button><br>
                    <button class="holi-camps"><a href="<?php print $row['holyday_link']; ?>">Holiday Camps &gt;</a></button>
                </div>
                <p></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="jsn-bootstrap3 container">
    <div id="rQqJNi" class="row " style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;">
        <div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
            <div class="jsn-bootstrap3 wr-element-container wr-element-text locator-heading">
                <div class="wr_text" id="mKpwqYW">
                    <h1>Search Again:</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }else{?>
<div class="jsn-bootstrap3 container">
    <div id="rQqJNi" class="row " style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;">
        <div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
            <div class="jsn-bootstrap3 wr-element-container wr-element-text locator-heading">
                <div class="wr_text" id="mKpqYW">
                    <h1>Find a WMF Football Academy</h1>
                </div>
            </div>
        </div>
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
<div class="jsn-bootstrap3 wr-element-container wr-element-text">
    <div class="wr_text" id="A9rlRA">
        <div class="section form">
            <div class="container">
                <div class="row text-center home_footer_search">
                    <h3 class="postcode-text"><?php print __('Find your nearest academy'); ?></h3>
                    <form class="col-sm-16 post_selector_black" action="" method="get">
                        <input class="form-controls" name="post_code" placeholder="Enter your postcode">
                        <button type="submit" class="btn btn-find-locators" id="near-academy"><?php echo __('go') ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    return ob_get_clean();
    
    }
    
    add_shortcode( 'accadamy_list_serach', 'accadamy_list_search_shortcode' );
    
    
    function gaccadamy_init(){
    addForm();
    getList();
    } 


    //$success = NULL;

    if(isset($_POST['btnUpdateCategory']) and $_POST['btnUpdateCategory'] != ''){
        global  $wpdb;

        $wpdb->update(        
            'wp_cat_image',
            array( 
                    'cat_name' => $_POST['cate_name_update']
                ),
            array('id'=> $_POST['cat_id']),
                array( 
                       '%s'
                ) 
            );

        $wpdb->update(
            'wp_cat_image',
            array( 
                    'cat_bg_color' => $_POST['category_bg_color_update']
                ),
            array('id'=> $_POST['cat_id']),
                array( 
                       '%s'
                ) 
            );
   
         $wpdb->update(
            'wp_accadamy',
            array( 
                    'training_location' => $_POST['cate_name_update']
                ),
            array('training_location'=> $_POST['cate_name_old']),
                array( 
                       '%s'
                ) 
            );

         $category_image_update = NULL;

         if(isset($_FILES['category_image_update']['name']) and $_FILES['category_image_update']['name'] != ''){
                $path_array = wp_upload_dir();  // normal format start 
                $img_url = $path_array["url"]; 
                $uploaddir = $path_array['path'];
                $category_image_update = $img_url.basename($_FILES['category_image_update']['name']);
                $uploadfile = $uploaddir . basename($_FILES['category_image_update']['name']);
                move_uploaded_file($_FILES['category_image_update']['tmp_name'], $uploadfile);
            }

        if($category_image_update != NULL){
            $wpdb->update(
                'wp_cat_image',
                array( 
                        'cat_image' => $category_image_update
                    ),
                array('id'=> $_POST['cat_id']),
                    array( 
                           '%s'
                    ) 
                );
        }        
        $updateMessage = 'Succesfully Updated';
    }                  
    
    function addForm(){
    ini_set('display_errors',1);
    if(isset($_POST['submit'])){
        if (isset($_POST['action']) && $_POST['action'] == 'dropdown') {
            global $wpdb;
            $arr_academy = implode(',', $_POST['academy_dropdown']);
            $sql_update = "UPDATE `{$wpdb->prefix}options` SET `option_value` = '{$arr_academy}' WHERE `option_name` = 'academy_dropdown'";
            $wpdb->query($sql_update);

            echo 'Accadamy updated successfully';

            // $test = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}options` WHERE `option_name` = 'academy_dropdown'", OBJECT);
            // echo "<pre>"; print_r($_POST);
            // echo "done<pre>"; print_r($test); die;
        } else { 

            $acc_name = $_POST['acc_name'];
            $academy_email = $_POST['academy_email'];
            $academy_contact = $_POST['academy_contact'];
            $post_code = $_POST['post_code'];
            $academy_link = $_POST['academy_link'];
            $acc_address = $_POST['acc_address'];         
            $training_time = serialize($_POST['training_time']);
            $training_week = serialize($_POST['training_week']);
            $training_age = serialize($_POST['training_age']);
            $weekly_training_price = $_POST['weekly_training_price'];
            $training_link = $_POST['training_link'];
            $holyday_link = $_POST['holyday_link'];
            $active_campaign_id = $_POST['active_campaign_form_id'];

           $training_location = NULL;
            if(isset($_POST['training_location']) and $_POST['training_location'] != ''){
                $training_location = $_POST['training_location'];
            }else{
               $training_location = $_POST['category'];
            }
            $eventdate = serialize($_POST['eventdate']);
        	$ac_id = $_POST['ac_id'];
            $url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDFeQ9V13F9lHKxCry0MmMQaRH32C8zIJY&address=".urlencode($post_code)."&amp;sensor=false";
          
            $result_string = file_get_contents($url);
            $result = json_decode($result_string, true);
            $result1[]=$result['results'][0];
            $result2[]=$result1[0]['geometry'];
            $result3[]=$result2[0]['location'];
            $latLong = $result3[0];
                	          
            $lat =  $latLong['lat'];
            $lon = $latLong['lng']; 
            if(isset($_FILES['academy_image']['name'])){
                $path_array = wp_upload_dir();  // normal format start 
                $img_url = $path_array["url"]; 
                $uploaddir = $path_array['path'];
                $academy_image = $img_url.basename($_FILES['academy_image']['name']);
                $uploadfile = $uploaddir . basename($_FILES['academy_image']['name']);
                move_uploaded_file($_FILES['academy_image']['tmp_name'], $uploadfile);
            }

            if(isset($_FILES['category_image']['name'])){
                $path_array = wp_upload_dir();  // normal format start 
                $img_url = $path_array["url"]; 
                $uploaddir = $path_array['path'];
                $category_image = $img_url.basename($_FILES['category_image']['name']);
                $uploadfile = $uploaddir . basename($_FILES['category_image']['name']);
                move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadfile);
            }
            // $academy_image_path   =   pathinfo($tmp_name ,PATHINFO_FILENAME).time().".".pathinfo($tmp_name ,PATHINFO_EXTENSION);
            
        	// if(!empty($_POST['eventOne'])) {
        	// $eventOne =  implode(",",$_POST['eventOne']);
        	//  }
        	//  else
        	//  {      
        	// 	 $eventOne =  $_POST['eventOne'];
        	//  }
        	//  if(!empty($_POST['eventTwo'])) {
        	// $eventTwo =  implode(",",$_POST['eventTwo']); 
        	// }
        	// else
        	// {
        	// 	$eventOne =  $_POST['eventTwo'];
        	// }
        	// if(!empty($_POST['eventThree'])) {
        	// $eventThree =  implode(",",$_POST['eventThree']);
        	//  }
        	//  else
        	//  {
        	// 	 $eventOne =  $_POST['eventThree'];
        	//  }
        	//  if(!empty($_POST['eventFour'])) {
        	// $eventFour =  implode(",",$_POST['eventFour']); 
        	// }
        	// else
        	// {
        	// 	$eventOne =  $_POST['eventFour'];
        	// }

        	if(empty($_POST['ac_id']) and $_POST['submit'] == 'Submit'){
        		global  $wpdb;
                    if(!empty($_POST['category']) and trim($_POST['category']) != ''){
                        $db_categories = $wpdb->get_results("SELECT * FROM 'wp_cat_image' WHERE cat_name = '".$_POST['category']."'");

                        if(count($db_categories) == 0){

                            $wpdb->insert( 
                                'wp_cat_image', 
                                array( 
                                    'cat_name' => $_POST['category'], 
                                    'cat_image' => $category_image,
                                    'cat_bg_color' => $_POST['category_color']

                                ), 
                                array( 
                                    '%s', 
                                    '%s',
                                    '%s'
                                ) 
                            );       
                        }    
                    }           
       
                  
        			$wpdb->insert( 
        				'wp_accadamy', 
        				array( 
        					'acc_name' => $acc_name, 
        					'academy_email' => $academy_email,
        					'academy_contact' => $academy_contact,    					
        					'post_code' => $post_code,  
                            'lat'     => $lat,
                            'lon' => $lon, 					
        					'academy_link' => $academy_link,
                            'academy_image' => $academy_image,
        					'acc_address' => $acc_address,
        					'training_time' => $training_time,
                            'training_week' => $training_week,
                            'training_age' => $training_age,
        					'weekly_training_price'=>$weekly_training_price,    					
        					'training_link' =>$training_link,
        					'holyday_link' => $holyday_link,
        					'training_location' => $training_location,
        					'eventdate' => $eventdate,
                            'active_campaign_form' => $active_campaign_id 

        				), 
        				array( 
        					'%s', 
        					'%s',
                            '%s',
        					'%s',
        					'%s',
        					'%s',
        					'%s',
        					'%s',
        					'%s',
        					'%s',
        					'%s',
        					'%s',
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
                if(!empty($_FILES['academy_image']['name'])) { 
            		$wpdb->update(
            			'wp_accadamy',
            			array( 
                                'acc_name' => $acc_name, 
                                'academy_email' => $academy_email,
                                'academy_contact' => $academy_contact,                      
                                'post_code' => $post_code, 
                                'lat'     => $lat,
                                'lon' => $lon,                      
                                'academy_link' => $academy_link,
                                'academy_image' => $academy_image,
                                'acc_address' => $acc_address,
                                'training_time' => $training_time,
                                'training_week' => $training_week,
                                'training_age' => $training_age,
                                'weekly_training_price'=>$weekly_training_price,                        
                                'training_link' =>$training_link,
                                'holyday_link' => $holyday_link,
                                'training_location' => $training_location,
                                'eventdate' => $eventdate,
                                'active_campaign_form' => $active_campaign_id
            				),
            			array('id'=> $ac_id),
            				array( 
        					       '%s', 
                                   '%s', 
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s'
            				) 
            			);
                }else {
                                    $wpdb->update(
                        'wp_accadamy',
                        array( 
                                'acc_name' => $acc_name, 
                                'academy_email' => $academy_email,
                                'academy_contact' => $academy_contact,                      
                                'post_code' => $post_code,    
                                'lat'     => $lat,
                                'lon' => $lon,                    
                                'academy_link' => $academy_link,
                                'acc_address' => $acc_address,
                                'training_time' => $training_time,
                                'training_week' => $training_week,
                                'training_age' => $training_age,
                                'weekly_training_price'=>$weekly_training_price,                        
                                'training_link' =>$training_link,
                                'holyday_link' => $holyday_link,
                                'training_location' => $training_location,
                                'eventdate' => $eventdate,
                                'active_campaign_form' => $active_campaign_id
                            ),
                        array('id'=> $ac_id),
                            array( 
                                   '%s', 
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s',
                                   '%s'
                            ) 
                        );
                    }
        			echo 'Accadamy updated successfully';
        	}
    	} // end if check action 
    } // end if submit 
    
    global  $wpdb;
    if($_GET['action']=='edit' && isset($_GET['id']) && ($_GET['id'] != '')){
        $btnValue = 'Update';
    	$id = $_GET['id'];	
    	$get_academy = $wpdb->get_row( "SELECT * FROM wp_accadamy WHERE id= $id " );		
    	$acc_name= $get_academy->acc_name;
        $acc_address= $get_academy->acc_address;
        $academy_link= $get_academy->academy_link;
        $academy_email= $get_academy->academy_email;
        $academy_contact= $get_academy->academy_contact;
        $training_location= $get_academy->training_location;
        $training_time= unserialize($get_academy->training_time);
        $training_week= unserialize($get_academy->training_week);  
        $training_age= unserialize($get_academy->training_age);
        $training_link= $get_academy->training_link;
        $weekly_training_price= $get_academy->weekly_training_price;
        $holyday_link= $get_academy->holyday_link;
        $post_code= $get_academy->post_code;
        $eventdate= $get_academy->eventdate;
        $active_campaign_id= $get_academy->active_campaign_form;
        $academy_image = $get_academy->academy_image;
              @$training_arr = array_map(function ($week, $time, $age) {
              return array_combine(
                ['week', 'time', 'age'],
                [$week, $time, $age]
              );
            }, $training_week, $training_time, $training_age);
        

    }
    
    ?>

  <?php 
    if($_GET['action']=='edit_category' && isset($_GET['id']) && ($_GET['id'] != '')){
        $idss = $_GET['id'];  
        $get_categories = $wpdb->get_row( "SELECT * FROM wp_cat_image WHERE id= $idss " );        
        $cate_name= $get_categories->cat_name;
        $cate_image= $get_categories->cat_image;
        $cate_color= $get_categories->cat_bg_color;
  ?>
    <div class="row">                 
        <?php echo $updateMessage; ?>        
        <form action=""  method="post" enctype="multipart/form-data">
            <input type="hidden" name="cat_id" value="<?php echo (isset($_GET['action']) && $_GET['action']=='edit_category')? $_GET['id']:'';?>">


            <input type="hidden" name="cate_name_old" value="<?php echo (isset($cate_name) && $cate_name!='')? $cate_name :'';?>">

            <div class="col-xs-6">
                <input type="text" name="cate_name_update" value="<?php echo (isset($cate_name) && $cate_name!='')? $cate_name :'';?>">
            </div>

            <div class="col-xs-6">
                <input type="file" name="category_image_update" value="" placeholder="Category Image">

    
                <img width="350" src="<?php echo $cate_image; ?>">
           
            </div>

            <div class="col-xs-6">
                <input type="color" name="category_bg_color_update" value="<?php echo (isset($cate_color) && $cate_color!='')? $cate_color :'';?>" placeholder="Category Color">
           
            </div>

            <div class="col-xs-6">
                    <input type="submit" name="btnUpdateCategory" value="Update">
            </div> 
        </form>
    </div>


  <?php 
       }
    ?>
<div class="add_form">
    <form action=""  method="post" enctype="multipart/form-data">
        <h4>Manage Academy List</h4>
        <input type="hidden" name="ac_id" value="<?php echo (isset($_GET['action']) && $_GET['action']=='edit')? $_GET['id']:'';?>">
        <div class="academy_outer">
            <div class="row">
            	<div class="col-xs-6">
        			<label for="academy_name">Name</label>
        			<input type="text" name="acc_name" required="true" value="<?php echo (isset($acc_name) && $acc_name!='')? $acc_name :'';?>">
            	</div>
            	<div class="col-xs-6">        		
        			<label for="academy_email">Academy Email</label>
        			<input type="text" name="academy_email" required="true" value="<?php echo (isset($academy_email) && $academy_email!='')? $academy_email :'';?>">
            	</div>
            	<div class="col-xs-6">        		
        			<label for="academy_contact">Academy Phone no.</label>
        			<input type="text" name="academy_contact" required="true" value="<?php echo (isset($academy_contact) && $academy_contact!='')? $academy_contact :'';?>">
            	</div>
            	
            	<div class="col-xs-6">        		
        			<label for="academy_link">Academy Link</label>
        			<input type="text" name="academy_link" required="true" value="<?php echo (isset($academy_link) && $academy_link!='')? $academy_link :'';?>">
            	</div>
                <div class="col-xs-6">              
                    <label for="academy_image">Academy Image</label>
                    <input type="file" name="academy_image" <?php  if($academy_image=='') : ?> required="true" <?php endif; ?>>
                    <?php echo (isset($academy_image) && $academy_image!='')? "<img src=".$academy_image." height='300' width='300'>" :'';?>
                     

                </div>

            	<div class="col-xs-12">        		
        			<label for="acc_address">Academy Address</label>
                    <input type="text" id="autocomplete" class="form-control text_field" onFocus="geolocate()" name="acc_address" placeholder="----Select Post Code----" value="<?php echo (isset($acc_address) && $acc_address!='')? $acc_address :'';?>" required />
                   
            	</div>
                <div class="col-xs-12">               
                    <label for="post_code">Postcode</label>

                    <input class="form-control text_field" value="<?php echo (isset($post_code) && $post_code!='')? $post_code :'';?>" id="postal_code" name="post_code" required></input>

                </div> 
            	<div class="col-xs-12">
            		<label for="training_time">Weekly Training Times</label>
            		<div class="field_wrapper">
                     <?php if(!empty($training_arr)) { $c = 0;     foreach ($training_arr as $key => $data_value) {   ?>  
                     <?php if($c == 0){  ?> 
    				    <div class="row">
                     <?php } else{ ?>   
                        <div>
                     <?php } ?>   
                            <div class="col-xs-4">
    				            <input type="text" name="training_week[]" value="<?php echo (isset($data_value['week']) && $data_value['week']!='')? $data_value['week'] :''; ?>" placeholder="Week"/>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" name="training_time[]" value="<?php echo (isset($data_value['time']) && $data_value['time']!='')? $data_value['time'] :''; ?>" placeholder="Training Time"/>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" name="training_age[]" value="<?php echo (isset($data_value['age']) && $data_value['age']!='')? $data_value['age'] :''; ?>" placeholder="Age"/>
                            </div>
                             <?php if($c == 0){  ?> 
        				        <a href="javascript:void(0);" class="add_button" title="Add field">
                                    <img src="https://image.flaticon.com/icons/png/128/60/60745.png"/>
                                </a>
                            <?php }else{ ?>
                                <a href="javascript:void(0);" class="remove_button" title="Remove Time">
                                    <img src="https://cdn0.iconfinder.com/data/icons/trends-1/256/icon-10.png"/>
                                </a>
                            <?php } ?>    
    				    </div>
                      <?php $c++; } }else{ ?> 
                        <div class="row">
                     
                            <div class="col-xs-4">
                                <input type="text" name="training_week[]" value="" placeholder="Week"/>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" name="training_time[]" value="" placeholder="Training Time"/>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" name="training_age[]" value="" placeholder="Age"/>
                            </div>
                           
                                <a href="javascript:void(0);" class="add_button" title="Add field">
                                    <img src="https://image.flaticon.com/icons/png/128/60/60745.png"/>
                                </a>
                           
                        </div> 
                        <?php } ?>
    				</div>
            	</div>
            	<div class="col-xs-6">
        			<label for="weekly_training_price">Weekly Training price</label>
        			<input type="text" name="weekly_training_price" required="true" value="<?php echo (isset($weekly_training_price) && $weekly_training_price!='')? $weekly_training_price :'';?>">
            	</div>
            	<div class="col-xs-6">
        			<label for="training_link">Weekly Training link</label>
        			<input type="text" name="training_link" required="true" value="<?php echo (isset($training_link) && $training_link!='')? $training_link :'';?>">
            	</div>
            	<div class="col-xs-6">
            		<label for="holyday_link">Holiday camp (Link)</label>
            		<input type="text" name="holyday_link" required="true" value="<?php echo (isset($holyday_link) && $holyday_link!='')? $holyday_link :'';?>">
            	</div>
            	<div class="col-xs-6"> 
                    <select class="col-xs-12" name="training_location" style="margin-top: 5.8%;height: 35px;">
                        <option value="">Select Category</option>
                      <?php  $categoryName = $wpdb->get_results( "SELECT * FROM wp_cat_image GROUP BY cat_name" ); ?>
                        <?php if(count($categoryName) > 0): ?>
                            <?php foreach($categoryName as $catName): ?>
                                <option value="<?php echo $catName->cat_name; ?>" <?php echo ($training_location == $catName->cat_name)?'selected':'';?>><?php echo $catName->cat_name; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select><!--  
        			<div class="col-xs-6">
        				<input type="radio" name="training_location" id="london" value="london" required="required" <?php //echo (isset($training_location) && $training_location =='london')? 'checked' :'';?>/><label for="london">South England</label>
        			</div>
        			<div class="col-xs-6">
        				<input type="radio" name="training_location" id="northwest" value="northwest" <?php //echo (isset($training_location) && $training_location =='northwest')? 'checked' :''; ?>/><label for="northwest"?>North West</label>
        			</div>  -->  
                    <?php if(!isset($training_location) and $training_location == ''){?>
                        <div class="col-xs-12" style="margin-top: 4%;padding: 0;">
                            <label>Or Add New Category:</label>   
                            <div class="category_wrapper">
                                    <input type="text" id="CategoryText" name="category" value="" placeholder="Category" onblur="return ValidateImageField('CategoryText')">
                            </div>
                        </div>

                        <div class="col-xs-12" style="margin-top: 4%;padding: 0;">
                            <label>Category Image:</label>   
                            <div class="category_wrapper">
                                <input id="image_field" type="file" name="category_image" value="" placeholder="Category Image">
                            </div>
                        </div>

                        <div class="col-xs-12" style="margin-top: 4%;padding: 0;">
                            <label>Category Image bg color:</label>   
                            <div class="category_wrapper">
                                <input id="image_color" type="color" name="category_color" value="" placeholder="Category bg color">
                            </div>
                        </div>
                    <?php }?>
            	</div> 

                <script type="text/javascript">

                    function ValidateImageField(varField){
                        var valueCat = $("#"+varField).val();
                        if(valueCat != ''){
                            $("#image_field").prop("required",true);
                            $("#image_collor").prop("required",true);
                        } 
                        else{
                            $("#image_field").prop("required",false);   
                        } 
                    }   
                </script>
            	<div class="col-xs-12">
            		<label>Events:</label>
            		<div class="events_wrapper">
            			<div class="row">
    		        		<div class="col-xs-4">
    		        			<input type="text" name="eventdate[]" value="" placeholder="Event date">
    		        		</div>
    		        		<div class="col-xs-4">
    		        			<input type="text" name="eventdate[]" value="" placeholder="Event price ( Full Event )">
    		        		</div>
    		        		<div class="col-xs-4">
    		        			<input type="text" name="eventdate[]"  value="" placeholder="Event price ( Single Day )">
    		        		</div>
    	        			<a href="javascript:void(0);" class="add_events" title="Add Events">
    	        				<img src="https://image.flaticon.com/icons/png/128/60/60745.png"/>
    	        			</a>
    		        	</div>
    	        	</div>
            	</div>
                <div class="col-xs-12">
                    <div class="col-xs-4" style="padding: 0;">   
                        <label>Active Campaign Form ID:</label>
                        <input type="text" name="active_campaign_form_id" value="<?php echo (isset($active_campaign_id) && $active_campaign_id!='')? $active_campaign_id :'';?>">
                    </div>
                </div>

        		<div class="col-xs-6">
        			<input type="submit" name="submit" value="<?php echo (isset($btnValue))?$btnValue:'Submit'; ?>">
        		</div>            	
            </div>
        </div>   
    </form>    
    <!-- tiny start -->
    <form id="academy_dropdown" action="" method="post" enctype="multipart/form-data">
        <h4>Manage Academy Dropdown</h4>
        <input type="hidden" name="action" value="dropdown"/>
        <div class="academy_outer">
            <?php
                global $wpdb;
                $rs_academy = $wpdb->get_results("SELECT `option_value` FROM `{$wpdb->prefix}options` WHERE `option_name` = 'academy_dropdown'", OBJECT);
                
                if(empty($rs_academy)) {
            ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <label>Academy Dropdown:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="academy_wrapper">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <input type="text" name="academy_dropdown[]" value="" placeholder="Academy Dropdown" />
                                    </div>
                                    <a href="javascript:void(0);" class="add_academy" title="Add Academy">
                                        <img src="https://image.flaticon.com/icons/png/128/60/60745.png"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="submit" name="submit">
                        </div> 
                    </div>
            <?php 
                } else { 
                    $list_academy = explode(',', $rs_academy[0]->option_value);
                    $a = 0;
            ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <label>Academy Dropdown:</label>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-xs-12">
                                <div class="academy_wrapper">
            <?php 
                    foreach ($list_academy as $item) { $a++;
            ?>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input type="text" name="academy_dropdown[]" value="<?php echo $item;?>" placeholder="Academy Dropdown" />
                                        </div>
                                        <?php if($a==1) {?>
                                        <a href="javascript:void(0);" class="add_academy" title="Add Academy">
                                            <img src="https://image.flaticon.com/icons/png/128/60/60745.png"/>
                                        </a>
                                        <?php } else { ?>
                                        <a href="javascript:void(0);" class="remove_academy" title="Remove Academy">
                                            <img src="https://cdn0.iconfinder.com/data/icons/trends-1/256/icon-10.png"/>
                                        </a>
                                        <?php }?>
                                    </div>
                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="submit" name="submit">
                            </div> 
                        </div>
            <?php } ?>
            
        </div>
    </form>
    <!-- tiny end -->
</div>
<?php
    }
    function getList()
    {
    	global  $wpdb;
    	if(isset($_GET['action']) && $_GET['action']=='delete'){
    	 	$id= $_GET['id'];
    	 	$wpdb->delete( 'wp_accadamy', array( 'id' => $id) );
     	}
    
    ?>

    <?php 
          

        ?>


 

<div class="container">
    <h4>Category List</h4>
    <table cellpadding="10" cellspacing="10">
        <?php 
            $myrows = $wpdb->get_results( "SELECT * FROM wp_cat_image ORDER BY id DESC " ); 
            if(count($myrows)>0){  
                foreach($myrows as $row)
                { 
                    $id= $row->id;
            ?> 
        <tr>
            <div class="academy-mngmt-list" style="margin-bottom: 40px;">
                <ul>
                    <li><?php echo $row->cat_name;?></li>
                    <li><img width="350" src="<?php echo $row->cat_image;?>"></li>
                </ul>
                <a href="<?php print admin_url("admin.php?page=accaday-activities&id=$id&action=edit_category"); ?>" class="edit"><?php echo __('Edit'); ?></a>
            </div>
        </tr>
        <?php           
            }
            }
            ?>
    </table>
</div>













<div class="container">
    <h4>Academy List</h4>
    <table cellpadding="10" cellspacing="10">
        <?php 
            $myrows = $wpdb->get_results( "SELECT * FROM wp_accadamy ORDER BY id DESC " ); 
            if(count($myrows)>0){  
            	foreach($myrows as $row)
            	{ 
            		$id= $row->id; 
            		$eventOne = explode(",",$row->eventOne);
            		$eventTwo = explode(",",$row->eventTwo);
            		$eventThree = explode(",",$row->eventThree);
            		$eventFour = explode(",",$row->eventFour);
            ?>
        <tr>
            <div class="academy-mngmt-list" style="margin-bottom: 40px;">
                <h5><strong><?php echo $row->acc_name;?></strong></h5>
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
<style type="text/css">
.category_wrapper img {
    width: 15px;
    margin-top: 18px;
}
    table.academy_table {
    width: 100%;
    }
    td.academy_data, input[type=text], textarea {
    width: 100%;        
    display: inline;
    margin: 9px 0;
    }
    td.table_field_name {
    width: 20%;
    }
    .academy_data label {
    margin-bottom: 0;
    margin-left: 13px;
}
.field_wrapper img, .events_wrapper img {
    width: 15px;
    margin-top: 18px
}
.row label{
	display: block;
}
.academy_outer {
    display: inline-block;
    width: 99%;
    background-color: #fff;
    padding: 20px;
    border-radius: 3px;
}
.academy_outer input[type="submit"]{
    background-color: #f2711c;
    color: #fff;
    border: 1px solid #ddd;
    padding: 5px 25px;
    font-weight: 600;
    font-size: 17px;
}
.academy_outer .col-xs-12 {
    width: 100%;
}
.academy_outer .col-xs-6 {
    width: 50%;
}
.academy_outer .col-xs-4 {
    width: 31.5%;
}
.field_wrapper img, .academy_wrapper img {
    width: 15px;
    margin-top: 18px;
}
</style>





<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        /*street_number: 'short_name',
        route: 'long_name',
        
        administrative_area_level_1: 'short_name',
        country: 'long_name',*/
        //locality: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }
        
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
        $("#lat").val(latitude);
        $("#lng").val(longitude);
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFeQ9V13F9lHKxCry0MmMQaRH32C8zIJY&libraries=places&callback=initAutocomplete"
        async defer></script>


















<script type="text/javascript">
jQuery(document).ready(function(){
    var maxField = 10;
    var addButton = jQuery('.add_button');
    var wrapper = jQuery('.field_wrapper');
    var fieldHTML = '<div><div class="col-xs-4"> <input type="text" name="training_week[]" placeholder="Week" value=""/></div><div class="col-xs-4"> <input type="text" name="training_time[]" placeholder="Training Time" value=""/></div><div class="col-xs-4"> <input type="text" name="training_age[]" placeholder="Age" value=""/></div> <a href="javascript:void(0);" class="remove_button" title="Remove Time"> <img src="https://cdn0.iconfinder.com/data/icons/trends-1/256/icon-10.png"/> </a></div>'; //
    var x = 1;
    jQuery(addButton).click(function(){
        if(x < maxField){
            x++;
            jQuery(wrapper).append(fieldHTML);
        }
    });
    jQuery(wrapper).on('click','.remove_button',function(e){
        e.preventDefault();
        jQuery(this).parent('div').remove();
        x--;
    });


    var max_category = 100;
    var add_category = jQuery('.add_category');
    var category_wrapper = jQuery('.category_wrapper'); 
    var category_html = '<div><div class="col-xs-11"><input type="text" name="category[]" value="" placeholder="Category"></div><a href="javascript:void(0);" class="remove_category" title="Remove Category"><img src="https://cdn0.iconfinder.com/data/icons/trends-1/256/icon-10.png"/></a></div>';

    var ca = 1;

    jQuery(add_category).click(function(){
        if(ca < max_category){
            ca++;
            jQuery(category_wrapper).append(category_html);
        }
    });
    jQuery(category_wrapper).on('click','.remove_category', function(e){
        e.preventDefault();
        jQuery(this).parent('div').remove();
        ca--;
    });





    var max_events = 4;
    var add_events = jQuery('.add_events');
    var events_wrapper = jQuery('.events_wrapper');
    var events_html = '<div><div class="col-xs-4"><input type="text" name="eventdate[]" value="" placeholder="Event date"></div><div class="col-xs-4"><input type="text" name="eventdate[]" value="" placeholder="Event price ( Full Event )"></div><div class="col-xs-4"><input type="text" ame="eventdate[]"  value="" placeholder="Event price ( Single Day )"></div><a href="javascript:void(0);" class="remove_events" title="Remove Events"><img src="https://cdn0.iconfinder.com/data/icons/trends-1/256/icon-10.png"/></a></div>';

    var y = 1;

    jQuery(add_events).click(function(){
        if(y < max_events){
            y++;
            jQuery(events_wrapper).append(events_html);
        }
    });
    jQuery(events_wrapper).on('click','.remove_events', function(e){
        e.preventDefault();
        jQuery(this).parent('div').remove();
        y--;
    });

    // tiny start
    var max_academy = 200;
    var add_academy = jQuery('.add_academy');
    var academy_wrapper = jQuery('.academy_wrapper');
    var academy_html = '<div class="row"><div class="col-xs-4"><input type="text" name="academy_dropdown[]" value="" placeholder="Academy Dropdown"></div><a href="javascript:void(0);" class="remove_academy" title="Remove Academy"><img src="https://cdn0.iconfinder.com/data/icons/trends-1/256/icon-10.png"/></a></div>';

    var h = 1;

    jQuery(add_academy).click(function(){
        if(h < max_academy){
            h++;
            jQuery(academy_wrapper).append(academy_html);
        }
    });
    jQuery(academy_wrapper).on('click','.remove_academy', function(e){
        e.preventDefault();
        jQuery(this).parent('div').remove();
        h--;
    });
    // tiny end 

});
</script>
<?php }



 ?>