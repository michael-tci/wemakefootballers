<footer class="footer_full">
    <div class="footer-up">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col-bx">
                        <div class="footer-nav-title">Navigate</div>
                        <div class="footer-menu-nav">
                            <?php
                                //$blogs = get_blogs_of_user(1); echo '<pre>';print_r($blogs); echo '</pre>';
                                
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
                    <?php echo !empty($optionTheme['gsstheme_setting_footer_content']) ? $optionTheme['gsstheme_setting_footer_content'] : '©2013-2015 We Make Footballers<sup>®</sup> Football Academy for Children' ?>
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
<?php echo do_shortcode('[wmf_cards]'); ?>

<?php wp_footer(); ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.show_postcode_pop').attr('data-toggle','modal').attr('data-target','#myModal');
        jQuery('.show_postcode_pop').on('click', function(){
            jQuery('#myModal').show();
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
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    
    ga('create', 'UA-33674505-1', 'auto');
    ga('send', 'pageview');
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(6)").removeClass('container');
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(6)").addClass('container-fluid');
    
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(7)").removeClass('container');
        jQuery(" article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(7)").addClass('container-fluid');
    
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(8)").removeClass('container');
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(8)").addClass('container-fluid');
    
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(9)").removeClass('container');
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(9)").addClass('container-fluid');
    
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(10)").removeClass('container');
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(10)").addClass('container-fluid');
    
        jQuery("article#post-1656 div#entry-content>.jsn-bootstrap3:nth-child(3)").removeClass('container');
        jQuery("article#post-1656 div#entry-content>.jsn-bootstrap3:nth-child(3)").addClass('container-fluid');
    
    
    
        jQuery("article#post-2849 div#entry-content>.jsn-bootstrap3:first-child").removeClass('container');
        jQuery("article#post-2849 div#entry-content>.jsn-bootstrap3:first-child").addClass('container-fluid');
    
        jQuery("article#post-2849 div#entry-content>.jsn-bootstrap3:nth-child(3)").removeClass('container');
        jQuery("article#post-2849 div#entry-content>.jsn-bootstrap3:nth-child(3)").addClass('container-fluid testi-background');
    
        jQuery("article#post-2900 div#entry-content>.jsn-bootstrap3:first-child").removeClass('container');
        jQuery("article#post-2900 div#entry-content>.jsn-bootstrap3:first-child").addClass('container-fluid');
    
        jQuery("article#post-2900 div#entry-content>.jsn-bootstrap3:nth-child(3)").removeClass('container');
        jQuery("article#post-2900 div#entry-content>.jsn-bootstrap3:nth-child(3)").addClass('container-fluid testi-background');
    
        jQuery("article#post-2900 div#entry-content>.jsn-bootstrap3:nth-child(4)").removeClass('container');
        jQuery("article#post-2900 div#entry-content>.jsn-bootstrap3:nth-child(4)").addClass('container-fluid');
    
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(11)").removeClass('container');
        jQuery("article#post-279 div#entry-content>.jsn-bootstrap3:nth-child(11)").addClass('container-fluid');
    
        jQuery(".page-id-2849").addClass('wmf-holiday-camps-professional');
    
        jQuery(".wmf-news main#main>.jsn-bootstrap3").removeClass('container');
        jQuery(".wmf-news main#main>.jsn-bootstrap3").addClass('container-fluid');
    
        jQuery(".academ_finder").click(function() {
            var val = jQuery(".search-aca").val();
            window.open(val);
        });
    
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
    
    
        jQuery(".postcode-plugin-orange").click(function() {
            var post = jQuery(".postcode-plugin-val-orange").val();
            var url = 'https://www.wemakefootballers.com/academy-locator/';
            window.open(url + "?post_code=" + post);
        });
    
        jQuery(".postcode-plugin-footer").click(function() {
            var post = jQuery(".postcode-plugin-val-footer").val();
            var url = 'https://www.wemakefootballers.com/academy-locator/';
            window.open(url + "?post_code=" + post);
        });
    
    
        jQuery(".btn-find-near").click(function() {
            var post = jQuery(".input-postcode-find").val();
            var url = 'https://www.wemakefootballers.com/academy-locator/';
            window.open(url + "?post_code=" + post);
        });
    
        jQuery(".search-acad").on('change', function(e) { //alert(this.value);
            e.preventDefault();
            var val = this.value;
            window.location.href = val;
        });
    
        jQuery("<span>1</span>").insertAfter(".locator-acd-list.locator-right");
    
    
        jQuery("#generate").click(function(e) {
            e.preventDefault();
            jQuery('html, body').animate({
                scrollTop: jQuery(".grey-secbg").offset().top
            }, 1000);
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
<!-- <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/i18n/datepicker-de.min.js?ver=1.11.4'></script> -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js'></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/owl.carousel.js"></script>
<script type="text/javascript">
    // jQuery(document).ready( function(){ 
    //   alert('hello');
    // });
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
    
    
    /*$(function() {
      $( '.wpcf7-repeater-item .user_dob' ).datepicker({ dateFormat: "yyyy-mm-dd" });
    });*/
    
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
<?php if(is_main_site()) : ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.multiple_attr').attr("multiple", "multilple");
            jQuery('.multiple_attr').attr("name", "wmf_select[]");

            jQuery('#free_trial_form').submit(function(){

                var parent_name = jQuery('input[name="parent-name"]').val();

                var child_name = jQuery('input[name="childs-name"]').val();

                jQuery('.parent_name').text(parent_name);

                jQuery('.child_name').text(child_name);

            });

        });

    </script>

<?php if (is_page(4996)): ?>
<script type="text/javascript">
    jQuery(document).ready(function(){              
          jQuery(".btn-send").live("click", function () {
             if(jQuery('.error_exists').hasClass('error_exists')){
                jQuery('#error_class').remove();
             }
            var location = jQuery("#location");
            if (location[0].selectedIndex <= 0) {
                // alert("Please select");                      
                    jQuery('<span id="error_class" class="wpcf7-not-valid-tip error_exists" style="margin:auto; max-width:400px;">Please select an academy.</span>').insertAfter('#location');
                    jQuery('html, body').animate({
                       scrollTop: jQuery('#scroll_to').offset().top
                    }, 1000);
                    return false;
    
            }
        });
    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3r3IKxoKN-lsWasn6OweDOZdE6xf3TEk&callback=initMap"
    type="text/javascript"></script>
<script type="text/javascript">
    var geocoder;
    var map;
    var geoMarker;
    
    function initialize() {
        var map = new google.maps.Map(
        document.getElementById("map_canvas"), {
          center: new google.maps.LatLng(37.4419, -122.1419),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        geoMarker = new google.maps.Marker();
        geoMarker.setPosition(map.getCenter());
        geoMarker.setMap(map);
    
        $("#location").change(function() {
            var addr = $('#location :selected').text();
            if( addr == 'Kingston Academy'){
                var complete_addr = 'Grey Court School';
            }else{
                var complete_addr = 'We Make Footballers ' + addr ;
            }
            var geocoder = new google.maps.Geocoder();                    
            geocoder.geocode({
                'address': complete_addr
            }, 
            function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    geoMarker.setOptions({
                      position: results[0].geometry.location,
                    });
                } else {
                    alert("“Oops, something went wrong: "+ status+ ". Please try again” ");
                }
            });
        });
    }
    google.maps.event.addDomListener(window, "load", initialize);
</script>    
<?php endif; ?>
<script type="text/javascript">    
    jQuery(document).ready(function() {
        jQuery('.default_link').hide();
        jQuery('#location').change(function() {
            jQuery("#location :selected").each(function() {
                jQuery('[name="hidden_academy_value"]').val(jQuery(this).text());
                var academe_name = jQuery(this).val();
                jQuery('.default_link').show();
                jQuery(".change_link").attr("href", academe_name).html('<i class="fa fa-share-alt"></i>'+academe_name);
            });
        });
    });
    
</script>
<script type="text/javascript">
    jQuery(document).ready(function(){    
        jQuery('.blank_postcode, .postcode_here').click(function(){
             jQuery('.blank_postcode').hide();
        });        
        jQuery('.outer-of-loader').hide();        
        jQuery('#suggesstion-box').hide();
        jQuery('.postcode_here').keyup(function(){
            var key = jQuery(this).val();            
            jQuery.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data:{
                    action : 'current_search',
                    current_key : key
                },
                success: function(datas){                    
                    jQuery('.outer-of-loader').hide();
                    jQuery('#suggesstion-box').show();
                    jQuery('#suggesstion-box').html(datas);
                    if(jQuery('.postcode_here').val() == ''){
                        jQuery('#suggesstion-box').hide();
                    }
                }
            });
        });
    
        jQuery('#suggesstion-box ul li a').live('click', function(){            
            jQuery('.postcode_here').val(jQuery(this).text());
            var selected_academy = jQuery(this).text();            
            jQuery('#suggesstion-box').hide();
            var arr_split = selected_academy.split(',');           
            jQuery.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'get_academy_list',
                    get_postcode_value:  arr_split[0]
                },
                success: function(data){
                    jQuery('.mid-linlk-ul li').removeClass('blur active');
                    jQuery('.outer-of-loader').show();
                    setTimeout( function(){
                        jQuery('.outer-of-loader').hide();
                        jQuery('.searched_academy').show();
                        jQuery('.searched_academy').html(data);
                        jQuery('.academy_data').hide();
                    },2000);
                }
            })
        });
    
        jQuery('.london_nortwest_list ul li a').live('click', function(){            
           var london_nortwest_list = jQuery(this).text();           
           jQuery.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'get_academy_list',
                    get_postcode_value:  london_nortwest_list
                },
                success: function(data){
                    jQuery('.outer-of-loader').show();
                    setTimeout(function(){
                        jQuery('.outer-of-loader').hide();
                        jQuery('#suggesstion-box').hide();
                        jQuery('.academy_data').show();
                        jQuery('.searched_academy').hide();
                        jQuery('.postcode_here').val(london_nortwest_list);
                            if(jQuery('.postcode_here') != ''){
                                jQuery('.blank_postcode').remove();
                            }
                        jQuery('.academy_data').html(data);
                    },2000);
    
                }
            })
    
        });
    
    
        jQuery('.find_postcode').live('click', function(){
            jQuery('#suggesstion-box').hide();
            var postcode_value = jQuery('.postcode_here').val();
            if(postcode_value != ''){
               jQuery('.blank_postcode').remove();
            }else{
                jQuery('.blank_postcode').show();
                if(!jQuery('p').hasClass('blank_postcode')) {
                    jQuery('.find_postcode').after('<p class="blank_postcode">Please enter your postcode.</p>');
                }
                return false;
            }
            jQuery.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'get_academy_list',
                    get_postcode_value: postcode_value
                },
                success: function(data){
                    jQuery('.outer-of-loader').show();
                    setTimeout(function(){
                        jQuery('.outer-of-loader').hide();
                        jQuery('.academy_data').hide();
                        jQuery('.searched_academy').show();
                        jQuery('.searched_academy').html(data);
                    },2000);
                }
            })
        }); 
    });  
</script>
<script>
    $(function() {
      $( '.mid-linlk-ul li' ).live( 'click', function() {
        $( this ).parent().find( 'li.active' ).removeClass( 'active' );
        $( this ).addClass( 'blur active' );        
      });
    });
    $(".mid-linlk-ul li").click(function(){
        $('.mid-linlk-ul li').addClass('blur')
    }); 
</script>
<?php endif; ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fontend/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fontend/owl.theme.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fontend/main-created.css" />
<script id="exclude" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/aos.js"></script>
<link id="excss" rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fontend/aos.css" />
<script type="text/javascript">

    $(window).resize(function() {
      if ($(window).width() < 1200) {
        $("#exclude").attr('src','');
        $("#excss").attr('href','');
      }
     else {
         $("#exclude").attr('src','<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/aos.js');
           $("#excss").attr('href','<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fontend/aos.css');
     }
    });
</script>



<!-- <script src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/jquery.scrollpath.js"></script>
    <script src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/demo.js"></script> -->
<script>
    AOS.init({
        offset: 120,
        delay: 0,
        easing: 'ease',
        duration: 600,
        disable: false,
        once: true,
        startEvent: 'DOMContentLoaded'
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#testimonialslide").carousel();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //alert('hello');
        $('.jogad').parent('.jsn-bootstrap3').addClass('container');
        $('.jogad').parent('.jsn-bootstrap3').removeClass('container-fluid');
    
    
        $('.our-goals-wmfinnner .col-md-4').click(function() {
            $('.our-goals-wmfinnner .col-md-4.current').removeClass('current');
            $(this).closest('.col-md-4').addClass('current');
        });
        $('.ourgial-winnercolsset .col-md-4').click(function() {
            $('.ourgial-winnercolsset').addClass('currenthidden');
        });
    
        //          
        $('#this-sound-linkclick').click(function() {
            $('#this_sounds_daunting').slideDown();
            $('#my-child-is-an').slideUp();
            $('#whatis_your-coaching').slideUp();
        });
    
        //          
        $('#mychild-linkclick').click(function() {
            $('#my-child-is-an').slideDown();
            $('#this_sounds_daunting').slideUp();
            $('#whatis_your-coaching').slideUp();
        });
    
        //          
        $('#whatisyour-linkclick').click(function() {
            $('#whatis_your-coaching').slideDown();
            $('#this_sounds_daunting').slideUp();
            $('#my-child-is-an').slideUp();
        });
    
    
    });
</script>

<script type="text/javascript">
    
    $(document).ready(function() {
        $('ol.faqclic > li').click(function() {
            //$('ol.faqclic > li.active').removeClass('active');
            $('ol.faqclic').closest('li').toggleClass('active');
        });
    });
</script>
<!-- <script type="text/javascript" src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/path/demo.js"></script>
    <script type="text/javascript" src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/path/jquery.scrollpath.js"></script> -->
</body>
</html>