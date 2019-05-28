<?php
/**
 * Template Name: Microsite Weekly
 *
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PMMW2QG');</script>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="format-detection" content="telephone=no">
  <link type="image/x-icon" href="/wp-content/themes/wmf/assets/img/favicon.ico" rel="icon">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
  <style type="text/css">
  .visible-sm-block.contact-us a{display:none!important}#responsive-menu-additional-content .sign-in a:nth-child(1){text-align:right;border-right:2px solid}#responsive-menu-additional-content .sign-in a{color:#fff;padding:10px;display:block;float:left;font-size:20px;font-weight:500;height:100%;line-height:59px;margin:0;text-align:left;text-decoration:none;text-transform:uppercase;vertical-align:middle;width:50%}.hide-contact,.wmf_locator_link{display:none}.wmf_locator_link a{color:#ee7925!important}@media screen and (max-width:768px){#wpadminbar{position:fixed!important}.hide-contact,.wmf_locator_link{display: block!important;}}
  </style>

  <link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/wmf/r-menu-custom.css" type="text/css" /> 

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMMW2QG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="loading"></div>


<?php  get_template_part( 'header/header', 'banner-local' ); ?>

<?php 	
	get_template_part( 'header/header', 'tablet-local' );
	global $blog_id;
	$current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
?>


    <!-- Active Campaign Form -->
    <div id="myModal" class="row modal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
            <h4 class="modal-title">Book Your Free Session</h4>
            <h4 class="modal-title">@ <?php  echo $current_blog_details->blogname; ?></h4>
          </div>
          <div class="triangle-down"></div>
          <div class="modal-body">
          <?php echo get_option('embed_code'); ?>
          </div>
          <div class="modal-footer">
          </div><div class="quotefooter"></div>
        </div>
      </div>
    </div>
 

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		 <div class="entry-content wmf-weekly-traning-location micro-weekly-traning-location " id="entry-content">
			<div class="jsn-bootstrap3 container  wuc-main-weekly-traning">
				<div id="JzoNUf" class="row" style="">
					<div class="wmf-col col-md-8 col-sm-7 col-xs-16 " data-aos="fade-right">
						<?php the_field('content_one'); ?>
					</div>
					<div class="wmf-col col-md-8 col-sm-9 col-xs-16" data-aos="fade-left" >
						<div class="wuc-main-iframe"><?php the_field('iframe_one',false); ?></div>
					</div>

				</div>
			</div>
			
			<div class="jsn-bootstrap3 container">
				<div id="HRdeMR" class="row text-center">
					<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">		
						<div class="jsn-bootstrap3 wr-element-container wr-element-text  wuc-main-popFreeTrial">							
							<div class="jsn-bootstrap3 wr-element-container wr-element-button wuc-popFreeTrial popFreeTrial">
								<button class="btn   btn-default " type="button">
									<?php _e('Book A Free Session','wmf'); ?>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
				$player_criteria = get_field('player_criteria');
			?>
			<div class="section-weekly-colstwo" style="background:url(<?php echo $player_criteria['url']; ?>)">
				<div class="container">
					<div class="section-weekly-col-table">
						<div class="section-weekly-col">
							<div class="section-weekly-boldtext"><?php the_field('title_player'); ?></div>
						</div>
						<div class="section-weekly-col">
							<div class="section-weekly-contet">
								<?php the_field('content_player'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="wuc-background-traning">
				<div class="jsn-bootstrap3 container">
					<div id="4ipmPF" class="row wuc-th-header" style="padding-top:0;padding-bottom:50px;padding-left:10px;padding-right:10px;">
						<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
						
							<div class="jsn-bootstrap3 wr-element-container wr-element-heading" style="margin-top:40px; margin-bottom:40px ">
								<h2 style="text-align:center;">
									<?php the_field('title_training'); ?>
								</h2>
							</div>
							<div class="jsn-bootstrap3 wr-element-container wr-element-text text-center">
								<div class="wr_text" id="vmc35l">
									<?php the_field('content_training'); ?>								
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="jsn-bootstrap3 container">
			
					<div id="nb2Lux" class="row wuc-services" style="padding-left:10px;padding-right:10px;">
						<?php
							if( have_rows('different_icons') ):
							while ( have_rows('different_icons') ) : the_row(); 
						?>

							<div class="wmf-col col-md-5 col-sm-5 col-xs-16">
								<div class="jsn-bootstrap3 wr-element-container wr-element-image" style="margin-bottom:15px ">
									<div class="text-center">
										<?php $image_icon = get_sub_field('image'); ?>
										<img src="<?php echo $image_icon['url']; ?>" alt="<?php echo $image_icon['alt']; ?>" />
									</div>
								</div>
								<div class="jsn-bootstrap3 wr-element-container wr-element-text" style="text-align:center;margin-bottom:30px;margin-top: 20px;">
									<div class="wr_text">
										<p><?php the_sub_field('title') ?></p>
									</div>
								</div>
							</div>
						
						<?php						
							endwhile;
							else :
							endif;
						?>

					</div>
				</div>
			</div>
			
			<!-- -->
			
			<div class="jsn-bootstrap3 container  wuc-weekly-traning-location">
				<div id="JzoNUf" class="row container wmf-map-right" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
					<div class="wmf-col col-md-7 col-sm-7 col-xs-16 ">
						<div class="jsn-bootstrap3 wr-element-container wr-element-gssweeklytraining wr-element-table table table-hover">
							<?php echo $optionTheme = get_option('gss_training_times'); ?>							
						</div>						
					</div>
					<div class="wmf-col col-md-9 col-sm-9 col-xs-16 ">					
						<div class="jsn-bootstrap3 wr-element-container wr-element-text ">
							<div class="wr_text" id="WDMoWU">
								<?php the_field('iframe_map'); ?>	
							</div>
						</div>
						<div class="jsn-bootstrap3 wr-element-container wr-element-text facility_postcode wuc-facility_left">
							<div class="wr_text" id="R9GkGS">
								<?php the_field('address_training'); ?>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<!-- -->
			
			<div class="jsn-bootstrap3 container">
				<div id="HRdeMR12" class="row text-center wuc-free-session">
					<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">		
						<div class="jsn-bootstrap3 wr-element-container wr-element-button wuc-popFreeTrial popFreeTrial" style=" ;text-align:center;">
							<button class="btn   btn-link " type="button"><?php the_field('text_training_sections'); ?></button>
						</div>			
					</div>
				</div>
			</div>
			
			<!-- -->
			
			<div class="jsn-bootstrap3 container">
				<div id="8KTUg2" class="row wuc-shadow wmf-shadow" style="padding-top:18px;padding-bottom:10px;padding-left:0px;padding-right:0px;">					
					<?php
						if( have_rows('the_team') ):
						while ( have_rows('the_team') ) : the_row(); 
					?>
						<div class="wmf-col col-md-5 col-sm-5 col-xs-16 ">
							<div class="jsn-bootstrap3 wr-element-container wr-element-heading text-center" style="margin-top:5px; margin-bottom:25px ">
								<h3 style=""><?php the_sub_field('title'); ?></h3>
							</div>
							<div class="jsn-bootstrap3 wr-element-container wr-element-image img-coach text-center">
								<?php $the_team_image = get_sub_field('image'); ?>
								<img src="<?php echo $the_team_image['url']; ?>" alt="<?php echo $the_team_image['alt']; ?>" />								
							</div>
							<div class="jsn-bootstrap3 wr-element-container wr-element-text about-coach text-center">
								<div class="wr_text" id="C3kSSw">
									<?php the_sub_field('content'); ?>									
								</div>
							</div>
						</div>
					<?php	
						endwhile;
						else :
						endif;
					?>
				</div>
			</div>
						
			<!-- -->
			
			<div class="jsn-bootstrap3 container-fluid">
				<div id="c0EDlI" class="row wr_fullwidth content info text-center" style="-webkit-box-sizing: content-box;-moz-box-sizing: content-box;box-sizing: content-box;background: none;margin-top:40px;margin-bottom:40px;">
					<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
						<div class="jsn-bootstrap3 wr-element-container wr-element-gssgetintouch wr-element-text wmf-info ">
							<div class="wr_text" id="BnEnN4">
								<?php the_field('content_book'); ?>								
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- -->
			
			<div class="jsn-bootstrap3 container">
				<div id="cpvFFi" class="row text-center book-now" style="padding-top:10px;padding-bottom:10px;padding-left:50px;padding-right:10px;">
					<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
						<div class="jsn-bootstrap3 wr-element-container wr-element-button popFreeTrial wuc-popFreeTrial">
							<button class="btn   btn-default " type="button"><?php the_field('text_button_session'); ?></button>
						</div>
						<div class="jsn-bootstrap3 wr-element-container wr-element-text wuc-micro-button" style="margin-top:30px;margin-bottom:30px;">
							<div class="wr_text" id="j7dv2r">
								<?php $image_session = get_field('image_session'); ?>
								<img src="<?php echo $image_session['url']; ?>"  alt="comment" width="81" height="44"alt="<?php echo $image_session['alt']; ?>" />	
								
							</div>
						</div>						
					</div>
				</div>
			</div>
			<!-- -->
			
			<div class="jsn-bootstrap3">
				<div id="SHDLPa" class="row wr_fullwidth wmf-st-testimonial wuc-st-testimonial" style="padding-bottom:100px;">
					<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">
						<div class="jsn-bootstrap3 wr-element-container wr-element-testimonial comment">							
							<div id="myCarousel" class="carousel slide wr-testimonial" data-ride="carousel">						
								
								<ol class="carousel-indicators">
									<?php
										if( have_rows('content_testimonial') ): $testi_counter = 1;
										while ( have_rows('content_testimonial') ) : the_row(); 
									?>
									
									<li data-target="#myCarousel" data-slide-to="<?php echo $testi_counter; ?>" class="<?php if($testi_counter ==1 ): echo "active"; endif; ?>">
									</li>									
									<?php
										$testi_counter++;
										endwhile;
										else :
										endif;
									?>
								</ol>
								
								<div class="carousel-inner">
									<?php										
										if( have_rows('content_testimonial') ): $count_testi = 1;
										while ( have_rows('content_testimonial') ) : the_row(); 
									?>									
									<div class="item wr-testimonial-item  <?php if($count_testi ==1 ) : echo "active"; endif; ?> col-md-16 col-sm-16" style="padding-bottom:30px;">
										<div class="wr-testimonial-box top">
											<div class="arrow"></div>
											<div class="wr-testimonial-content">
												<?php the_sub_field('feedback_content'); ?>
											</div>
										</div>
										<div class="wr-testimonial-avatar">
											<?php $avatar = get_sub_field('avatar'); ?>
											<img src="<?php echo $avatar['url']; ?>" alt="<?php echo $avatar['alt']; ?>" />										
										</div>
										<div class="wr-testimonial-meta">
											<strong style="font-size: 12px" class="wr-testimonial-name">
												<?php the_sub_field('clients_name'); ?>
											</strong>
											<span class="wr-testimonial-jobtitle">
												<?php the_sub_field('clients_position'); ?>
											</span>
										</div>
									</div>									
									<?php
										$count_testi++;
										endwhile;
										else :
										endif;
									?>	
								</div>
							</div>							
						</div>						
					</div>
				</div>
			</div>
			
			<!-- -->
			
		</div>
	</article><!-- #post-## -->
<!-- -->
<style>
    
</style>
<footer class="footer_full">
<div class="footer-up">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-col-bx">
                    <div class="footer-nav-title">Navigate</div>
                    <div class="footer-menu-nav">
                        <?php
                             $menu_name = 'footer-menu-link';
                            
                             if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
                               $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                               $menu_items = wp_get_nav_menu_items($menu->term_id);
                               $menu_list = array();
                            
                               foreach ( (array) $menu_items as $key => $menu_item ) {
                                   $menu_list[] = '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>';
                               }
                            
                               echo implode($menu_list);
                             }
                            ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-col-bx">
                    <div class="footer-nav-title">Customer Service</div>
                    <div class="footer-menu-nav">
                        <?php
                            $menu_name = 'footer-menu-detail';
                            
                            if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
                              $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                              $menu_items = wp_get_nav_menu_items($menu->term_id);
                              $menu_list = array();
                            
                              foreach ( (array) $menu_items as $key => $menu_item ) {
                                  $menu_list[] = '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>';
                              }
                            
                              echo implode("",$menu_list);
                            }
                            ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-col-bx">
                    <div class="footer-nav-title">Contact Us</div>
                    <div class="footer-contact">
                        <?php dynamic_sidebar( 'contact_us'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-down">
    <div class="container">
        <div class="copyright-sec">
            <div class="other-brand-logos">
                <ul>
                    <li>
                        <?php
							$optionTheme = get_option('gss_theme_option');
							$logo = !empty($optionTheme['gsstheme_setting_footer_logo']) ? $optionTheme['gsstheme_setting_footer_logo'] : get_stylesheet_directory_uri() . '/assets/img/BFA-White.png';
                            echo sprintf('<a href="%s"><img src="%s" alt="" class="img-responsive" /></a>', get_site_url(), $logo);
                            ?>
                    </li>
                    <?php 
                        if ( is_active_sidebar( 'footerlogo' ) ) : ?>
                     <?php dynamic_sidebar( 'footerlogo'); ?> 
                    <?php endif; ?>
                </ul>
            </div>
            <div class="copyright-text">
                <?php echo !empty($optionTheme['gsstheme_setting_footer_content']) ? $optionTheme['gsstheme_setting_footer_content'] : '&#169;2013-2018 We Make Footballers<sup>&#174;</sup> Football Academy for Children' ?>
            </div>
        </div>
        <div class="social-footer">
            <?php
                $optionTheme = get_option('gss_theme_option');
                if ( isset($optionTheme) AND !empty($optionTheme['social']) )
                {
                    foreach ($optionTheme['social'] as $key => $social)
                    {
                      echo "<div class='col-xs-5 icon-socials'>
                              <a href='$social' title='$key' ><i class='icon-social icon-social-$key'></i></a>
                            </div>";
                    }
                }
                else {
                  ?>
            <div class="col-xs-5 icon-socials">
                <a><i class="icon-social icon-social-facebook"></i></a>
            </div>
            <div class="col-xs-5 icon-socials">
                <a><i class="icon-social icon-social-twitter"></i></a>
            </div>
            <div class="col-xs-5 icon-socials">
                <a><i class="icon-social icon-social-instagram"></i></a>
            </div>
            <?php
                }
                ?>
        </div>
    </div>
</div>
<a href="#" id="back-to-top" class="backtotop_btn" title="Back to top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</footer>

<?php wp_footer(); ?>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('.show_postcode_pop').attr('data-toggle','modal').attr('data-target','#myModal');

    jQuery('#postCode_search').keyup(function (event) {
       
        if (event.keyCode == 13) {
            var firstResult = $(".pac-container .pac-item:first").text();
            // jQuery('.show_postcode_pop').attr('data-toggle','modal').attr('data-target','#myModal');
            jQuery('.overlaybuttonthiss').click();

            //tiny fix
            var typeText = jQuery("#postCode_search").val();
            if(typeText.split(' ').length == 1){
                var Pastetext = firstResult;
            }else{
                var Pastetext = typeText;
            }
            jQuery("#abc").val(Pastetext); 
            jQuery( ".find_postcode" ).trigger( "click" );
            // tiny end fix
        }
    });
    //tiny fix
    jQuery('.overlaybuttonthiss').on('click', function (event) {
        var firstResult = $(".pac-container .pac-item:first").text();
        // var Pastetext = jQuery("#postCode_search").val();
            var typeText = jQuery("#postCode_search").val();
            if(typeText.split(' ').length == 1){
                var Pastetext = firstResult;
            }else{
                var Pastetext = typeText;
            }
        jQuery("#abc").val(Pastetext); 
        jQuery( ".find_postcode" ).trigger( "click" );
    });
    // tiny end fix

    jQuery(".post_selector").submit(function() {
        console.log('clickable');
        return false;
    });
    jQuery( "#myModal" ).on('shown.bs.modal', function () {
        var Pastetext = jQuery("#postCode_search").val();
        jQuery("#abc").val(Pastetext); 
    });
    jQuery( "#myModal" ).on('hidden.bs.modal', function () {
        jQuery("#postCode_search").val('');
         jQuery("#abc").val(''); 
         jQuery(".searched_academy").text('');
         jQuery(".academy_data").text('');
    });
});
</script>
<script>
(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '/wp-content/themes/wmf/assets/js/analytics.js', 'ga');

ga('create', 'UA-33674505-1', 'auto');
ga('send', 'pageview');
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
    
    jQuery(".postcode-plugin-head").keypress(function(e) {
        if (e.which == 13) {
            $('input[name = post_code]').click();
            var post = jQuery(".postcode-plugin-head").val();
            var url = '/academy-locator/';
            window.open(url + "?post_code=" + post);
        }
    });

    jQuery(".postcode-plugin").click(function() {
        var post = jQuery(".postcode-plugin-val").val();
        var url = 'https://www.wemakefootballers.com/academy-locator/';
        window.open(url + "?post_code=" + post);
    });


 
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    // back to top
    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function() {
            backToTop();
        });
        $('#back-to-top').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
});
</script>
<script>
$(".web-menu-bx ul li.menu-item-has-children").click(function() {
    $('.web-menu-bx ul li.menu-item-has-children.current').not(this).removeClass('current');
    $(this).toggleClass('current');
})

$('.webmenu-icon').click(function() {
    $('.web-menu-bx').slideToggle('current');
    $('.masking-menu').show();
    $('.header-custom header').addClass('down-bottom');
});

$('.close-menu-all, .masking-menu').click(function() {
    $('.web-menu-bx').slideToggle('current');
    $('.masking-menu').hide();
    $('.header-custom header').removeClass('down-bottom');
});
</script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/owl.carousel.js"></script>
<script type="text/javascript">
jQuery(function($) {
    jQuery('.user_dob').datepicker({
        "dateFormat": "mm/dd/yy",
        "controlType": "slider",
        "addSliderAccess": true,
        "sliderAccessArgs": {
            "touchonly": true
        },
        "stepHour": 1,
        "stepMinute": 1,
        "stepSecond": 1
    }).datepicker('option', $.datepicker.regional['de']).datepicker('option', 'minDate', "").datepicker('option', 'maxDate', "0").datepicker('refresh');
});

jQuery('.wpcf7-repeater-add').on('click', function() {
    setTimeout(function() {
        jQuery('.wpcf7-repeater-item').find('.user_dob').datepicker({
            "dateFormat": "mm/dd/yy",
            "controlType": "slider",
            "addSliderAccess": true,
            "sliderAccessArgs": {
                "touchonly": true
            },
            "stepHour": 1,
            "stepMinute": 1,
            "stepSecond": 1
        }).datepicker('option', $.datepicker.regional['de']).datepicker('option', 'minDate', "").datepicker('option', 'maxDate', "0").datepicker('refresh');
    }, 100);
});


// header fixed
$(window).scroll(function() {
    if ($(window).scrollTop() >= 150) {
        $('header').addClass('fixed-header');

    } else {
        $('header').removeClass('fixed-header');

    }


    if ($(window).scrollTop() >= 1) {
        $('header').addClass('up-header');
        $('body').addClass('fixed-body');
    } else {
        $('header').removeClass('up-header');
        $('body').removeClass('fixed-body');
    }

});

$(window).scroll(function() {
    if ($(window).scrollTop() >= 250) {

        $('.wahywmf-mmenu').addClass('full-fixed');
    } else {

        $('.wahywmf-mmenu').removeClass('full-fixed');
        $('.wahywmf-mmenu ul li a').removeClass('Active');
    }

});
</script>



<script>
// This example displays an address form, using the autocomplete feature
var placeSearch, autocomplete;
var componentForm = {
street_number: 'short_name',
route: 'long_name',
locality: 'long_name',
administrative_area_level_1: 'short_name',
country: 'long_name',
postal_code: 'short_name'
};

function initAutocomplete() {
// Create the autocomplete object, restricting the search to geographical
// location types.
autocomplete = new google.maps.places.Autocomplete(
/** @type {!HTMLInputElement} */(document.getElementById('abc')),
{types: ['geocode']});

// When the user selects an address from the dropdown, populate the address
// fields in the form.
autocomplete.addListener('place_changed', fillInAddress);

autocomplete = new google.maps.places.Autocomplete(
/** @type {!HTMLInputElement} */(document.getElementById('postCode_search')),
{types: ['geocode']});

// When the user selects an address from the dropdown, populate the address
// fields in the form.
autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
// Get the place details from the autocomplete object.
var place = autocomplete.getPlace();

for (var component in componentForm) {
if(document.getElementById(component) !== null){
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
}
}
// Get each component of the address from the place details
// and fill the corresponding field on the form.
if(place.address_components !== undefined){
    for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxhgcC9Un6YMIVL5agYr7ygNvQMt306Nc&libraries=places&callback=initAutocomplete" async defer></script>

<script type="text/javascript">
function parenthostsent(){
location.replace('https://www.wemakefootballers.com/thank-you-parenthost');
}
</script>

<!-- tiny add datetimePicker -->
<script src="<?php echo get_stylesheet_directory_uri().'/assets/js/fontend/tmp/DateTimePicker.js';?>"></script>
<!-- tiny add datetimePicker -->
<script type="text/javascript">
jQuery(document).ready(function() {

// end branch-28
jQuery( window ).load(function() {
    jQuery('.date_field').each(function() {
        jQuery(this).prop('readonly', true);
        jQuery(this).attr("data-field", "date");
        jQuery(this).after('<script type="text/javascript">jQuery("#dtBox").DateTimePicker();<\/script>');
    });

});
});
</script>
<script defer type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.sync.bootstrap.min.js"></script>


<div id="dtBox"></div>
</body>
</html>
