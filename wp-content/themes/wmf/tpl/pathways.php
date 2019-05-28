<?php
    /*
    Template Name: Pathways
    */
    
    get_header(); ?>
<div id="primary" class="content-area wmf-news">
    <div class="section-all-row heaerprttp increasespacing" >
        <div class="container">
            <div class="text-center" >
                <div class="iconof-pgtitle" data-aos="fade-up"><img src="<?php if( get_field('pathways_to_success_icon')) : echo get_field('pathways_to_success_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/pathways-icon.png'; endif; ?>" alt="icon"></div>
                <h2 class="pagetitlename" data-aos="fade-up"><?php if(get_field('pathways_to_success_heading')) : echo get_field('pathways_to_success_heading'); else: echo get_the_title(); endif; ?></h2>
                <p data-aos="fade-up"><?php the_field('pathways_to_short_content'); ?></p>
            </div>
        </div>
    </div>
    <!-- section-all-row END -->
    <div class="section-twocol section-twocol-full nobgandfull greysection-twocol" id="facilities" >
        <div class="section-twocol-table">
            <div class="section-twocol-col section-twocol-col-image" data-aos="fade-right">
                <div class="section-twocol-col-imagebx"><img src="<?php if( get_field('pathways_to_success_image')) : echo get_field('pathways_to_success_image'); else : echo site_url().'/wp-content/uploads/2015/11/4E7A50411.jpg'; endif;?>" alt="image"></div>
            </div>
            <div class="section-twocol-col section-twocol-col-content"  data-aos="fade-left">
                <div class="contentoverlaythis rightset rightsetsidecont">
                    <p><?php the_field('pathways_to_success_content'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- section-twocol END -->
    <div class="pathwaysalltotalcol">
        <div class="section-all-row">
            <div class="container">
                <div class="linetool-box upparttool" id="safetypart_1">
                    <div class="pathtphed" data-aos="fade-up">
                        <?php the_field('how_can_we_make_heading'); ?>
                        <div class="line-center-bottom"></div>
                    </div>
                    <div class="childrenplaterimg" data-aos="fade-up">
                        <img src="<?php if( get_field('how_can_we_make_footballers_image')) : echo get_field('how_can_we_make_footballers_image'); else : echo site_url().'/wp-content/uploads/2015/10/04d_121-training_JR_07.jpg'; endif; ?>" alt="image"/>
                    </div>
                </div>
                <div class="linetool-box upparttool paddtopnone paddbottomnone">
                    <div class="pathtphedbottomtext">
                        <div class="pathtphedbottomtext-in" data-aos="fade-left">
                            <P><?php the_field('how_can_we_make_footballers_content'); ?></p>
                        </div>
                        <div class="line-center-bottom smline afterbeforenone"></div>
                        <div class="center-right-top-line"></div>
                        <div class="center-left-top-line"></div>
                        <div class="line-center-bottom left-bottom-line afterbeforenone"></div>
                        <div class="line-center-bottom right-bottom-line afterbeforenone"></div>
                    </div>
                    <div class="pathwaytwocol">
                        <div class="pathwaytwocol-half" data-aos="fade-up">
                            <div class="pathwaycolnamethis">Grassroots</div>
                            <div class="pathwaytwocolimg" id="grassroots-link"><img src="<?php if(get_field('grassroots_icon')) : echo get_field('grassroots_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/grassroots-image.jpg'; endif; ?>" alt="image"/></div>
                        </div>
                        <div class="pathwaytwocol-half" data-aos="fade-up">
                            <div class="pathwaycolnamethis">Professional Academies</div>
                            <div class="pathwaytwocolimg" id="professional_training-link"><img src="<?php if(get_field('professional_traning_icon')) : echo get_field('professional_traning_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/image_wmf_in_school_02.jpg'; endif; ?>" alt="image"/></div>
                        </div>
                    </div>
                </div>
                <div class="colhidedefault" id="grassroots-shcol">
                    <div class="linehr-tp-device"></div>
                    <div class="linehr-down-device"></div>
                    <div class="linetool-box partstwotool">
                        <div class="colleftrihrSet">
                            <div class="colleftrihrSet-right">
                                <div class="colleftrihrSet-icon"><img src="<?php if(get_field('grassroots_what_is_it_icon')) : echo get_field('grassroots_what_is_it_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/grassroots-icon.png'; endif; ?>" alt="image"/></div>
                            </div>
                            <div class="colleftrihrSet-left">
                                <div class="whattopup-line"></div>
                                <div class="colleftrihrSet-leftIn">
                                    <h3><?php the_field('grassroots_what_is_it_heading'); ?></h3>
                                    <p><?php the_field('grassroots_what_is_it_content'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- linetool-box END -->
                    <div class="linetool-box partstwotool">
                        <div class="colleftrihrSet colleftrihrSetangle">
                            <div class="left_side-line"></div>
                            <div class="left__bottom_centerside-line"></div>
                            <div class="colleftrihrSet-right">
                                <div class="colleftrihrSet-icon"><img src="<?php if(get_field('grassroots_second_content_icon')) : echo get_field('grassroots_second_content_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/develop-icon.png'; endif; ?>" alt="image"/></div>
                            </div>
                            <div class="colleftrihrSet-left">
                                <div class="colleftrihrSet-leftIn">
                                    <p><?php the_field('grassroots_second_content'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- linetool-box END -->
                    <div class="linetool-box partstwotool howdoesthispart">
                        <div class="top-right-line"></div>
                        <div class="topcenter-right-line"></div>
                        <div class="top-right-linecentersj"></div>
                        <div class="colleftrihrSet-leftIn">
                            <h3><?php the_field('grassroots_how_does_it_heading'); ?></h3>
                            <p><?php the_field('grassroots_how_does_it_content'); ?></p>
                        </div>
                        <div class="howdoes-imagecenter">
                            <img src="<?php  if(get_field('grassroots_how_does_it_work_section_icon')) : echo get_field('grassroots_how_does_it_work_section_icon'); else: get_stylesheet_directory_uri().'/assets/img/holiday-camp-header.png'; endif; ?>" alt="image"/>
                        </div>
                        <div class="colleftrihrSet-leftIn">
                            <h3><?php the_field('grassroots_isleworthians_heading'); ?></h3>
                            <p><?php the_field('grassroots_old_isleworthians_content'); ?></p>
                        </div>
                        <div class="btnsof_astsection">
                            <div class="text-center">
                                <div class="btn btn-primary" data-aos="fade-up"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_popup"><?php if(get_field('begin_journey_button_text')) : echo get_field('begin_journey_button_text'); else: echo "Begin my child’s football journey"; endif; ?></a></div>
                                <div class="clearfix"></div>
                                <div class="btn btn-primary" data-aos="fade-up"><a href="#grassroots-link" id="restartthe_journey">Restart the journey</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- colhidedefault END -->
                <div class="colhidedefault" id="professional_training">
                    <div class="linehr-tp-device"></div>
                    <div class="linehr-down-device"></div>
                    <div class="linetool-box partstwotool">
                        <div class="colleftrihrSet colleftrihrSetangle">
                            <div class="colleftrihrSet-right">
                                <div class="colleftrihrSet-icon"><img src="<?php if(get_field('professional_what_is_it_icon')) : echo get_field('professional_what_is_it_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/professional-training-what-icon.png.'; endif; ?>" alt="image"/></div>
                            </div>
                            <div class="colleftrihrSet-left">
                                <div class="whattopup-line"></div>
                                <div class="colleftrihrSet-leftIn">
                                    <h3><?php the_field('professional_heading'); ?></h3>
                                    <p><?php the_field('professional_what_is_it_content'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- linetool-box END -->
                    <div class="linetool-box partstwotool">
                        <div class="colleftrihrSet">
                            <div class="line-tp-down"></div>
                            <div class="linehoriontal-tp-down"></div>
                            <div class="line-tp-down leftpartss"></div>
                            <div class="colleftrihrSet-right" style="height: 220px">
                                <div class="colleftrihrSet-icon"><img src="<?php if(get_field('professional_traning_second_content_icon')) : echo get_field('professional_traning_second_content_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/strong-network-icon.png'; endif; ?>" alt="image"/></div>
                            </div>
                            <div class="colleftrihrSet-left">
                                <div class="colleftrihrSet-leftIn">
                                    <p><?php the_field('professional_traning_second_content'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- linetool-box END -->
                    <div class="linetool-box partstwotool">
                        <div class="revercepatcolpath">
                            <div class="line-tp-down"></div>
                            <div class="linehoriontal-tp-down"></div>
                            <div class="line-tp-down leftpartss"></div>
                        </div>
                        <div class="colleftrihrSet colleftrihrSetangle">
                            <div class="colleftrihrSet-right" style="height: 175px;">
                                <div class="colleftrihrSet-icon"><img src="<?php if(get_field('professional_traning_third_content_icon')) : echo get_field('professional_traning_third_content_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/event-icon.png'; endif; ?>" alt="image"/></div>
                            </div>
                            <div class="colleftrihrSet-left">
                                <div class="colleftrihrSet-leftIn">
                                    <p><?php the_field('professional_traning_third_content'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- linetool-box END -->
                    <div class="linetool-box partstwotool">
                        <div class="colleftrihrSet">
                            <div class="line-tp-down"></div>
                            <div class="linehoriontal-tp-down"></div>
                            <div class="line-tp-down leftpartss"></div>
                            <div class="colleftrihrSet-right" style="height: 170px;">
                                <div class="colleftrihrSet-icon"><img src="<?php if(get_field('professional_traning_fourth_content_icon')) : echo get_field('professional_traning_fourth_content_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/hardwork-icon.png'; endif; ?>" alt="image"/></div>
                            </div>
                            <div class="colleftrihrSet-left">
                                <div class="colleftrihrSet-leftIn">
                                    <p><?php the_field('professional_traning_fourth_content'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- linetool-box END -->
                    <div class="linetool-box partstwotool howdoesthispart halfpartpath">
                        <div class="revercepatcolpath halfs">
                            <div class="line-tp-down"></div>
                            <div class="linehoriontal-tp-down"></div>
                            <div class="leftpartssdf"></div>
                        </div>
                        <div class="colleftrihrSet-leftIn">
                            <p><?php the_field('professional_traning_fifth_content'); ?></p>
                        </div>
                    </div>
                    <div class="btnsof_astsection" style="margin-top: -10px;">
                        <div class="text-center">
                            <div class="btn btn-primary" data-aos="fade-up"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_popup"><?php if(get_field('begin_journey_button_text')) : echo get_field('begin_journey_button_text'); else: echo "Begin my child’s football journey"; endif; ?></a></div>
                            <div class="clearfix"></div>
                            <div class="btn btn-primary" data-aos="fade-up"><a href="#professional_training-link" id="restartthe_journeyprofe">Restart the journey</a></div>
                        </div>
                    </div>
                </div>
                <!-- colhidedefault END -->
                <div class="clearfix"></div>
                <div class="text-center" id="appearbtn-show">
                    <div class="btn btn-primary" data-aos="fade-up"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_popup"><?php if(get_field('begin_journey_button_text')) : echo get_field('begin_journey_button_text'); else: echo "Begin my child’s football journey"; endif; ?></a></div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- container END -->
        </div>
        <!-- section-all-row END -->
    </div>
    <!-- pathwaysalltotalcol END -->
    <div class="section-all-row">
        <div class="container">
            <div class="testimonial-slider-section marpaddnonethiss" data-aos="fade-up">
                <div class="testimonialhedlins"><?php if(get_field('footballers_pathways_heading')) : echo get_field('footballers_pathways_heading'); else: echo "Why We Make Footballers is right for all pathways"; endif; ?></div>
                <div class="clearfix"></div>
                <div class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/comment.png" alt="image"/></div>
                <div class="clearfix"></div>
                <br>
                <div class="testimslidebottomse">
                    <div class="carousel-inner">
                        <div class="parent-table">
                            <div class="left-revolver-img-parent">
                                <div class="left-revolver-img">
                                    <img src="<?php if(get_field('player_image')) : echo get_field('player_image'); else: echo site_url().'/wp-content/uploads/2015/11/Untitled-1.png'; endif; ?>">
                                </div>
                            </div>
                            <div class="about-revolver-right">
                                <p><?php the_field('player_description'); ?></p>
                                <div class="revolver-name">
                                    <h4><?php the_field('player_name'); ?><span style="text-transform: none;"><?php if(get_field('player_designation')) : echo ', '.get_field('player_designation'); endif; ?></span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section-all-row END -->
    <div class="section-background-colstwo bottomtestimonialshown" style="background:url(<?php if(get_field('our_player_journeys_bg')) : echo get_field('our_player_journeys_bg'); else: echo site_url().'/wp-content/uploads/sites/42/2017/06/4E7A1641-copy.jpg'; endif; ?>)">
        <div class="container">
            <div class="section-background-col-table">
                <div class="section-background-col" data-aos="fade-right">
                    <div class="section-bckground-boldtext"><?php if(get_field('our_player_journeys_heading')) : echo get_field('our_player_journeys_heading'); else: echo "Our Player Journeys"; endif; ?></div>
                </div>
                <div class="section-background-col" data-aos="fade-left">
                    <div class="section-bckground-contet">
                        <p><?php the_field('our_player_journeys_content'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section-background-colstwo END -->
    <div class="section-all-row-tesim">
        <div class="container">
            <div class="testimonial-slider-section marpaddnonethiss" data-aos="fade-up">
                <div id="myCarousel" class="carousel slide testimslidebottomse" data-ride="carousel">
                    <?php
                        $testimonial = array(
                           		'post_type' => 'tesimonials',
                           		'post_status' => 'publish',
                           		'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'lising_type',
                                                            'field' => 'slug',
                                                            'terms' => 'pathways',
                                                        ),
                                                    ),
                                'posts_per_page' => -1,
                           		);
                           $get_testimonial = new Wp_query($testimonial); 
                           $total_slides = $get_testimonial->post_count;
                        ?>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php $current_bullet = 1; ?>	
                        <?php for($i=0; $i<= $total_slides-1; $i++){ ?>	
                        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($current_bullet ==1) : echo'active'; endif; ?>">				    			
                        </li>
                        <?php $current_bullet++; } ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php if($get_testimonial->have_posts()) : $counter = 1; while($get_testimonial->have_posts()) : $get_testimonial->the_post()?>
                        <div class="item <?php if($counter == 1 ) : echo 'active'; endif; ?>">
                            <div class="parent-table">
                                <div class="left-revolver-img-parent">
                                    <div class="left-revolver-img">
                                        <?php the_post_thumbnail(); ?>	                                        
                                    </div>
                                </div>
                                <div class="about-revolver-right">
                                    <p><?php the_content(); ?></p>
                                    <div class="revolver-name">
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $counter++; endwhile; endif; wp_reset_postdata(); ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section-all-row END -->
    <div class="section-all-row">
        <div class="container">
            <div class="joinwemakepathway">
                <p><?php the_field('join_we_make_footballers_content'); ?></p>
                <div class="clearfix"></div>
                <div class="btn btn-primary"><a data-toggle="modal" data-target="#myModal_popup" href="javascript:void(0);<?php //if(get_field('join_we_make_footballers_button_link')) : echo get_field('join_we_make_footballers_button_link'); else: echo "#"; endif; ?>"><?php if(get_field('join_we_make_footballers_buton_text')) : echo get_field('join_we_make_footballers_buton_text'); else: "Join We Make Footballers"; endif; ?></a></div>
            </div>
        </div>
    </div>
    <div class="entry-content findnearest_academyanimbx">
        <div class="jsn-bootstrap3 container">
            <div class="row findnearest_academy">
                <?php echo do_shortcode('[postcodesearch]'); ?>
            </div>
        </div>
    </div>
</div>
<!-- .content-area -->
<script type="text/javascript">
    $(document).scroll(function(){
    	when_visible();
    });
     function when_visible()
     {
     	//console.log($(document).scrollTop())
       var windowInnerHeight = window.innerHeight;
     	$(".linetool-box").each(function(key, value){
     		if(!$(this).hasClass('added'))
     		{
     			if($(document).scrollTop() + windowInnerHeight > $(this).offset().top + 250)
      		{
      			
      			$(this).addClass('added');
      		}
     		}
     		
     	})
       var windowHeight = $(document).height()
       var topposition = $("#safetypart_1").offset().top;
     }
</script>
<script type="text/javascript">
    $("#grassroots-link,#professional_training-link").click(function(){
    	when_visible_two();
    });
     function when_visible_two()
     {
     	//console.log($(document).scrollTop())
       var windowInnerHeight = window.innerHeight;
     	$(".partstwotool").each(function(key, value){
     		/*if(!$(this).hasClass('added'))
     		{
     			if($(document).scrollTop() + windowInnerHeight > $(this).offset().top + 250)
      		{*/
      			
      			$(this).removeClass('added');
      		/*}
     		}*/
     		
     	})
       var windowHeight = $(document).height()
       var topposition = $("#safetypart_1").offset().top;
     }
</script>
<script type="text/javascript">
    $(document).ready(function(){
    	
    	$('#grassroots-link, #professional_training-link').click(function(){		
    		$('#appearbtn-show').fadeOut();
    	});
    
    	$('#grassroots-link').click(function(){		
    		$('#grassroots-link').addClass('active');
    		$('#professional_training-link').removeClass('active');
    		$('#grassroots-shcol').slideDown();
    		$('#professional_training').slideUp();
    
    		//when_visible();
    	});
    
    	$('#professional_training-link').click(function(){		
    		$('#professional_training-link').addClass('active');
    		$('#grassroots-link').removeClass('active');
    		$('#professional_training').slideDown();
    		$('#grassroots-shcol').slideUp();
    	});
    
    	$('#restartthe_journey, #restartthe_journeyprofe').click(function(){
    		$('#grassroots-shcol, #professional_training').slideUp();
    		$('#appearbtn-show').fadeIn();
    		$('#grassroots-link, #professional_training-link').removeClass('active');
    	});
    
    
    	
    });
    
    
    // $(function(){
    // 	$("#grassroots-link").click(function(){
    // 		$("html,body").animate({scrollTop:$("#grassroots-shcol").offset().top - 150});
    // 		return false
    // 	});
    
    // 	$("#professional_training-link").click(function(){
    // 		$("html,body").animate({scrollTop:$("#professional_training").offset().top - 150});
    // 		return false
    // 	});
    // });
    
</script>
<script type="text/javascript">
    $(document).ready(function(){
    	$('#restartthe_journey, #restartthe_journeyprofe').on('click', function(event) {
    	    var target = $(this.getAttribute('href'));
    	    if( target.length ) {
    	        event.preventDefault();
    	        $('html, body').stop().animate({
    	            scrollTop: target.offset().top -100
    	        }, 1000);
    	    }
    	});
    });
</script>


<script type="text/javascript">
    $(window).resize(function() {
      if ($(window).width() < 1200) {
         $('.linetool-box').addClass('added');
      }
     else {
        $('.linetool-box').hasClass('added');
     }
    });
</script>

<script type="text/javascript">
    $(window).resize(function() {
      if ($(window).width() < 1200) {
            $(document).ready(function(){
                $(".linetool-box").addClass('added');

                $("#grassroots-link,#professional_training-link").click(function(){
                    $(".linetool-box").addClass('added');
                });
            });
      }
     else {
     }
    });
</script>

<?php get_footer(); ?>