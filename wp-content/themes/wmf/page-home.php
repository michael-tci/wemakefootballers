
<?php
/**
 * Template Name: Home Page
 *
 */

get_header();
?>


<script>
	$(document).ready(function() {
		$('body').css('overflow-y', 'hidden');
		if (window.location.hash) { 
			//bind to scroll function
			$(document).scroll( function() {
				var hash = window.location.hash
				var hashName = hash.substring(1, hash.length);
				var element;
				//if element has this id then scroll to it
				if ($(hash).length != 0) {
					element = $(hash);
				}
				//catch cases of links that use anchor name
				else if ($('a[name="' + hashName + '"]').length != 0)
				{
					//just use the first one in case there are multiples
					element = $('a[name="' + hashName + '"]:first');
				}
				//if we have a target then go to it
				if (element != undefined) {
					window.scrollTo(0, element.position().top);
				}
				//unbind the scroll event
				$(document).unbind("scroll");
			});
		}
	});
	$(window).on('beforeunload', function() {
		$(window).scrollTop(0);
	});
	$(window).load(function() {
		//$('#loadingbar').css('cssText', 'display: none;');
		$('body').css('overflow-y', 'scroll');
	});
</script>
<?php 

        echo '
        <div class="jsn-bootstrap3 container" style="margin-top: 30px;">
        <div id="7w4sLK" class="row" style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;">
			    <div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
			        <div class="jsn-bootstrap3 wr-element-container wr-element-text">
			            <div class="wr_text" id="e6zTPz">
        <div class="trustpilot-widget" data-locale="en-GB" data-template-id="539adbd6dec7e10e686debee" data-businessunit-id="5630b23d0000ff000584db47" data-style-height="500px" data-style-width="100%" data-stars="5" data-schema-type="Organization"><a href="https://uk.trustpilot.com/review/wemakefootballers.com" target="_blank" rel="noopener noreferrer">Trustpilot</a></div>
        				</div>
        			</div>
        		</div>
        </div>
        </div>
        ';

       ?>

     <div class="jsn-bootstrap3 container" style="margin-top: 80px;margin-bottom: 20px;">
       	<div id="qguAWQ" class="row heading-section checkoutheading" style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;">
       		<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
       			<div class="jsn-bootstrap3 wr-element-container wr-element-text">
       				<div class="wr_text" id="nH25Ag">
						<h3 class="hedline-txt">Check out our classes</h3>
						<p class="desc-txt">With over 16 venues, we run classes every day of the week, click to find your local We Make Footballers centre:</p>
					</div>'
				</div>
			</div>
		</div>
	</div>

<?php $get_locations = $wpdb->get_results("SELECT * FROM `wp_cat_image` "); ?>

        <?php foreach($get_locations as $loc): ?>
            
   
        		<?php
        			$get_result = $wpdb->get_results("SELECT * FROM `wp_accadamy` WHERE `training_location`='$loc->cat_name' ORDER BY acc_name  asc ");

        			if(count($get_result) > 0){
        			
        		?>
        		<style type="text/css">
	            	.academic-location-box-<?php echo $loc->id; ?>:before{
									<?php if($loc->cat_bg_color == '#ffffff' || $loc->cat_bg_color == '#fff'): ?>
										background: transparent !important;
										opacity: 0 !important; 
									<?php else: ?>
										background: <?php echo $loc->cat_bg_color; ?>;
										opacity: .6 !important; 
									<?php endif; ?>
									  
	            	}
	            </style>
	            <div class="academic-location-box academic-location-box-<?php echo $loc->id; ?>" style="width: 50%; float:left;">
	            
				<div class="academic-location-box-content" >
				<div class="academic-location-box-content-table">
				<div class="academic-location-box-content-table-cell">
				<div class="academic-location-name"><?php echo $loc->cat_name; ?></div>
				<?php $tl_no_space = preg_replace('/\s+/', '', $loc->cat_name); ?>
				<div class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $tl_no_space; ?>"><a>View Classes</a></div>
				</div>
				</div>
				</div>
				<div class="academic-location-box-img"><img src="<?php echo $loc->cat_image; ?>" /></div>
				</div>
			


                <div id="<?php echo $tl_no_space; ?>" class="modal fade" role="dialog">
                	<div class="ui long transition modal scrolling manchester-acads" style=" display: block !important; opacity: 1 !important; top: 20px !important; margin-bottom: 20px !important">
					    <div class="header"><?php echo $loc->cat_name; ?></div>
					    <div class="actions">
					      <div class="closeModal button cancel" data-dismiss="modal">&#x2715;</div>
					    </div>

                    <?php                                        
                        
                        foreach ($get_result as $key => $acc_london_value) {
                    ?>

                             
					
					    <div class="image content">
					      <div class="ui header">
					        <i class="university icon"></i><?php echo $acc_london_value->acc_name . 'Academy'; ?>
					      </div>  
					       <div class="ui large image">

					            <img class="image" src="<?php echo $acc_london_value->academy_image;  ?>">

					            <p class="wmf-card-address">
					              <b><i class="home icon orange"></i>Address:</b> <?php echo $acc_london_value->acc_address; ?>
					              <br>
					              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:<?php echo $acc_london_value->academy_email; ?>"><?php echo $acc_london_value->academy_email; ?></a>
					              <br>
					              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:<?php echo $acc_london_value->academy_contact; ?>"><?php echo '+'.$acc_london_value->academy_contact; ?></a>

					            </p>
					         <div class="middle content">
					             <div class="header"><?php echo $acc_london_value->acc_name; ?></div>
					         </div>
					        
					        </div>
					     <div class="description">
					 
					          <div class="ui header">
					           <i class="university icon"></i><?php echo $acc_london_value->acc_name . ' Academy'; ?>
					          </div> 
					          <table class="table table-hover" style="text-align:left;">
					              <tr>
					                  <th colspan="2">
					                  <p>Weekly Training <br> <?php echo $acc_london_value->weekly_training_price; ?><br>
					                  </p>
					                  </th>
					              </tr>
					              <?php 
					              	$timing = unserialize( stripslashes( htmlspecialchars_decode( $acc_london_value->training_time) ) );
					              	$weeks = unserialize( stripslashes( htmlspecialchars_decode( $acc_london_value->training_week) ) );

					              	$age = unserialize( stripslashes( htmlspecialchars_decode( $acc_london_value->training_age) ) );

					              $timingArray = array();
					              foreach($timing as $key => $ObjTiming){
					              	$timingArray[$key]->training_time = $ObjTiming; 
					              }
					              foreach($weeks as $key => $Objweeks){
					              	$timingArray[$key]->training_week = $Objweeks; 
					              }
					              foreach($age as $key => $Objage){
					              	$timingArray[$key]->training_age = $Objage; 
					              }

 
					              ?>

					              <?php foreach($timingArray as $weekTimeAge): ?>
					              <tr>
					                <td><p><a class="freetrial-trigger <?php echo $acc_london_value->acc_name; ?>"><?php echo $weekTimeAge->training_week . ' '. $weekTimeAge->training_time; ?> </a></p></td>
					                <td><p><?php echo $weekTimeAge->training_age; ?></p></td>
					              </tr>
					          <?php endforeach; ?>
					              
					          </table>
					          
					          <p class="btn_footer">
								  <!-- <button data-toggle="modal" data-target="#<?php //echo strtolower(preg_replace('/[\s_]/', '-', $acc_london_value->acc_name)); ?>-form" class=" ui orange button freetrial-trigger <?php //echo strtolower(preg_replace('/[\s_]/', '-', $acc_london_value->acc_name)); ?>">Book Trial Online</button> -->
								  <button id="<?php echo strtolower(preg_replace('/[\s_]/', '-', $acc_london_value->acc_name)); ?>-book-trial" class=" ui orange button freetrial-trigger <?php echo strtolower(preg_replace('/[\s_]/', '-', $acc_london_value->acc_name)); ?>">Book Trial Online</button>
					              <a class="ui basic black button" href="<?php echo $acc_london_value->academy_link; ?>" target="_blank" >Visit <?php echo $acc_london_value->acc_name; ?> Website</a>
							  </p> 
					      </div> 
					    </div>


				<div id="<?php echo strtolower(preg_replace('/[\s_]/', '-', $acc_london_value->acc_name)); ?>-form" class="innerform" role="dialog">
            	<div class="" style="">
					    <!-- <div class="header"><?php echo $loc->cat_name; ?></div>
					    <div class="actions">
					      <div class="closeModal button cancel" data-dismiss="modal">?</div>
					    </div> -->

					    <div class="modal-content">
						
					      <!-- <div class="modal-header">
					        <input type="hidden" name="class_name" value="<?php echo $acc_london_value->acc_name; ?> Academy" id="className">
					        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
					        <h4 class="modal-title">Book Your Free Trial</h4>
					        <h4 class="modal-title">@ <?php echo $acc_london_value->acc_name; ?> Academy</h4>
					      </div> -->
								<div class="modal-header">
									<button type="button" class="close" id="<?php echo strtolower(preg_replace('/[\s_]/', '-', $acc_london_value->acc_name)); ?>-modal-close"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
									<h4 class="modal-title">Book Your Free Trial</h4>
									<h4 class="modal-title">@ <?php echo $acc_london_value->acc_name; ?> Academy</h4>
								</div>
					      <div class="triangle-down"></div>
					      <div class="modal-body">
							
					      	<!--form start -->
							   <?php 
							   // echo do_shortcode('[contact-form-7 id="4264" title="Free trial form_wmf_Hounslow"]');
							   // echo '<pre>';
							   // print_r($acc_london_value);
							  // echo "$acc_london_value->active_campaign_form" , 'embed_code';
							   echo get_blog_option("$acc_london_value->active_campaign_form" , 'embed_code' ); // microsite id + option name for active campaign form code
							//    echo do_shortcode( "[activecampaign form='".$acc_london_value->active_campaign_form."']" );   
							   ?>
       
					   	  </div>
					   </div>


   
					</div>
				</div>


				<script>
					$(document).ready(function(){
						$('#<?php echo strtolower(preg_replace('/[\s_]/', '-', $acc_london_value->acc_name)); ?>-book-trial').click(function(){
							$('#<?php echo strtolower(preg_replace('/[\s_]/', '-', $acc_london_value->acc_name)); ?>-form').css('display', 'block');
						});
					});
				</script>
					
				<?php } ?>  

					</div>

				</div><!-- modal close -->
                
            <?php } ?>
			
			
        <?php endforeach; ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

 
        <div class="entry">
            <?php the_content(); ?>
        </div><!-- entry -->
<?php endwhile; ?>
<?php endif; ?>



<script type="text/javascript">
	$("#contactForm").submit(function(event){
	    // cancels the form submission
	    event.preventDefault();
	    submitForm();
	});
</script>

<script type="text/javascript">
	function submitForm(){
	    // Initiate Variables With Form Content
	    var book_trial_fullname = $("#book_trial_fullname").val();
	    var book_trial_email = $("#book_trial_email").val();
	    var book_trial_phone = $("#book_trial_phone").val();
	    var book_trial_childs_name = $("#book_trial_childs_name").val();
	    var book_trial_date = $("#book_trial_date").val();
	    var book_trial_information = $("#book_trial_information").val();
	 
	    $.ajax({
	        type: "POST",
	        url: "http://localhost/book-trial-form/",
	        data: "book_trial_fullname=" + book_trial_fullname + "&book_trial_email=" + book_trial_email + "&book_trial_phone=" + book_trial_phone + "&book_trial_childs_name=" + book_trial_childs_name + "&book_trial_date=" + book_trial_date + "&book_trial_information=" + book_trial_information,
	        success : function(text){
	            if (text == "success"){
	                formSuccess();
	            }
	        }
	    });
	}
	function formSuccess(){
	    $( "#msgSubmit" ).removeClass( "hidden" );
	}
</script>


<?php
get_footer();?>