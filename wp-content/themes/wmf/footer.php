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
				<?php 
					
					echo !empty($optionTheme['gsstheme_setting_footer_content']) ? $optionTheme['gsstheme_setting_footer_content'] : '&#169;2013-2019 We Make Footballers<sup>&#174;</sup> Football Academy for Children'; 				
				?>
            </div>
        </div>
        <div class="social-footer">
            <?php
               
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


    jQuery("#generate").on("click touchstart", function(e) {
        var ww = jQuery( window ).width();
        e.preventDefault();
        if(ww < 992) {
            jQuery('html, body').animate({
                scrollTop: jQuery(".coach-form").offset().top - 0
            }, 1000);
        } else {
            jQuery('html, body').animate({
                scrollTop: jQuery(".coach-children").offset().top - 60
            }, 1000);
        }
    });
    jQuery('#_form_4_ ._html-code p:last-child').addClass('new_text');
    jQuery('#_form_4_ ._html-code p').each(function(){
        var _this = jQuery(this);
        if(_this.hasClass('new_text')){
            var _text = _this.text();
            _this.text(_text.replace(_text, 'By clicking above, you agree that we may process your information in accordance with these terms.')); 
        }
    })
 
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
<?php if(is_main_site()) : ?>
<script type="text/javascript">
jQuery(document).ready(function(){

    jQuery('.free_academy_list').change(function(){

        var get_selected_academy = jQuery(this).val();
       
        jQuery('.get_trial_academy_name').text('@ '+get_selected_academy);

        jQuery('#className').val(get_selected_academy);

    });

    jQuery('.close').on('click', function(){

        //document.getElementById('_form_41_').reset();
        jQuery('form', jQuery(this).parents('.modal') )[0].reset();

        jQuery(".free_academy_list").val(jQuery(".free_academy_list option:first").val());

        jQuery(".get_trial_academy_name").text('');

    });

    jQuery("#myModal_popup").on("show", function () {

      jQuery("body").addClass("modal-open");

    }).on("hidden", function () {

      jQuery("body").removeClass("modal-open")

    });

 });
</script>
<div class="container children-popup">
<div class="modal fade" id="myModal_popup" role="dialog">
    <div class="modal-dialog">

<div id="cheshire-form" class="innerform">
<div id="formAlerts"></div>
<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
<input type="hidden" name="class_name" value="For Free Trial" id="className">
    <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
    <h4 class="modal-title">Book Your Free Trial</h4>
    <!-- <h4 class="modal-title get_trial_academy_name"></h4> -->
  </div>
  <div class="triangle-down"></div>
  <div class="modal-body">
<!--form start -->
         <?php 
         //echo do_shortcode( '[contact-form-7 id="5607" title="Begin my child’s football journey" html_id="free_trial_form"]' ); 
         echo do_shortcode('[active-campaign-main-trial-form]');
         ?>
<!--form end -->

</div>
<div class="modal-footer">
</div><div class="quotefooter"></div>
</div>
</div>

    </div>
</div>
</div>

<style type="text/css">
.innerform .modal-header{
    text-align: center;
    background: url(<?php echo site_url().'/wp-content/themes/wmf/assets/img/quotebanner.png';?>);
    /* background: url(<?php echo site_url().'/wp-content/themes/wmf/assets/img/fill-detail.png';?>); */
    height: 100px;
    background-size: cover;
    border: none;
    background-position: 50% 50%;
    color:#fff;
  }
  .innerform .modal-header .modal-title:nth-child(3){  
    margin-right: 27px;
  }

</style>


<?php if(is_page(4985)) : ?>
<?php 
  $parent_name = htmlspecialchars($_GET["parent_name"]);
  $child_name = htmlspecialchars($_GET["child_name"]);
  $class_name = htmlspecialchars($_GET["class_name"]);      
?>
<script type="text/javascript">        
    jQuery('.thank_free_trial_message').append("HI <?php echo $parent_name; ?> THANK YOU FOR BOOKING A FREE SESSION FOR <?php echo $child_name; ?> AT WMF <?php echo $class_name; ?>");
    jQuery('.discover_wmf_class').append('Discover more of what WMF <?php echo $class_name; ?> offers.');

</script>
<?php endif; ?>

<?php if (is_page(4996)): ?>
<script type="text/javascript">
jQuery(document).ready(function(){              
      jQuery(".btn-send").live("click", function () {
         if(jQuery('.error_exists').hasClass('error_exists')){
            jQuery('#error_class').remove();
         }
        var location = jQuery("#location");
        // if (location[0].selectedIndex <= 0) {
        //         jQuery('<span id="error_class" class="wpcf7-not-valid-tip error_exists" style="margin:auto; max-width:400px;">Please select an academy.</span>').insertAfter('#location');
        //         jQuery('html, body').animate({
        //            scrollTop: jQuery('#scroll_to').offset().top
        //         }, 1000);
        //         return false;

        // }
    });
});
</script>


<script type="text/javascript">
var geocoder;
var map;
var geoMarker;
var lastUserEmail;
var locationUserPhoneNumber;

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
    $("#to-email").val("info@wemakefootballers.com");
    $("#location").change(function() {
            var addr_url= $('#location :selected').val();
            var addr = $('#location :selected').text().split(" Academy")[0];
            jQuery.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'get_academy_list',
                    get_academy_url:  addr_url+'/'
                },
                success: function(data){
                    jQuery('.outer-of-loader').hide();
                    if(data == "[]"){
                        $("#map_canvas").hide();
                        $("#image-logo-map").show();
                        jQuery(".change_email").attr("href", "mailto: info@wemakefootballers.com").html('info@wemakefootballers.com');
                        jQuery(".change_phonenumber").attr("href", "tel: 4402071481602").html('44 (0)2071481602');
                        $("#to-email").val('info@wemakefootballers.com');
                    }else{
                        var userEmail = JSON.parse(data)[0].academy_email;
                        var userPhoneNumber = JSON.parse(data)[0].academy_contact;
                        lastUserEmail = userEmail;
                        locationUserPhoneNumber = userPhoneNumber;
                        jQuery("#location :selected").each(function() {
                        jQuery(".change_email").attr("href", "mailto:"+lastUserEmail).html(lastUserEmail);
                        jQuery(".change_phonenumber").attr("href", "tel:"+locationUserPhoneNumber).html(locationUserPhoneNumber);
                        $("#to-email").val(lastUserEmail);
                        });
                    }
                }
            });
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
            } else if(status == "ZERO_RESULTS") {
              
            }else{
                alert("“Oops, something went wrong: "+ status+ ". Please try again” ");
            }
        });
    });

    // $("#location").change(function() {
    //     var addr = $('#location :selected').text().split(" Academy")[0];
    //     jQuery('.outer-of-loader').show();
    //     jQuery.ajax({
    //             type: 'POST',
    //             url: '<?php echo admin_url('admin-ajax.php'); ?>',
    //             data: {
    //                 action: 'get_academy_list',
    //                 get_postcode_value_click:  addr
    //             },
    //             success: function(data){
    //                 jQuery('.outer-of-loader').hide();
    //                 var userEmail = $(data).find('ul.detail-ul > li')[1];
    //                 var userPhoneNumber = $(data).find('ul.detail-ul > li')[2];
    //                 lastUserEmail = $(userEmail).text();
    //                 locationUserPhoneNumber = $(userPhoneNumber).text();
    //                 if(addr == "We Make Footballers"){
    //                     $("#map_canvas").hide();
    //                     $("#image-logo-map").show();
    //                     jQuery(".change_email").attr("href", "mailto: tw@wemakefootballers.com").html('tw@wemakefootballers.com');
    //                     jQuery(".change_phonenumber").attr("href", "tel: 4402071481602").html('44 (0)2071481602');
    //                     $("#to-email").val('tw@wemakefootballers.com');

    //                 }else{
    //                     jQuery("#location :selected").each(function() {
    //                     jQuery(".change_email").attr("href", "mailto:"+lastUserEmail).html(lastUserEmail);
    //                     jQuery(".change_phonenumber").attr("href", "tel:"+locationUserPhoneNumber).html(locationUserPhoneNumber);
    //                     $("#to-email").val(lastUserEmail);
    //                  });
    //                 }
    //             }
    //         })
      

    //     if( addr == 'Kingston Academy'){
    //         var complete_addr = 'Grey Court School';
    //     }else{
    //         var complete_addr = 'We Make Footballers ' + addr ;
    //     }
    //     var geocoder = new google.maps.Geocoder();                    
    //     geocoder.geocode({
    //         'address': complete_addr
    //     }, 
    //     function(results, status) {
    //         if (status == google.maps.GeocoderStatus.OK) {
    //             map.setCenter(results[0].geometry.location);
    //             geoMarker.setOptions({
    //               position: results[0].geometry.location,
    //             });
    //         } else if(status == "ZERO_RESULTS") {
              
    //         }else{
    //             alert("“Oops, something went wrong: "+ status+ ". Please try again” ");
    //         }
    //     });
    // });
}
google.maps.event.addDomListener(window, "load", initialize);
</script>    
<?php endif; ?>
<script type="text/javascript">    
jQuery(document).ready(function() {
    jQuery('.default_link').hide();
    jQuery('#location').change(function() {
        $("#image-logo-map").hide();
        $("#map_canvas").show();
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
                get_postcode_value_click:  london_nortwest_list
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

                    jQuery('#myModal').animate({
                       scrollTop: jQuery('.academy_data').offset().top
                    }, 1000);
                    $('.academy_data #load_more').hide();
                        // var itemsCount = 0,
                        //     itemsMax = $('#academyouter div.outer-of-acadmy').length;
                            // if (itemsMax <= 3) {
                            //     $('#load_more').hide();
                            // }
                            // $('#academyouter div.outer-of-acadmy').hide();

                            // function showNextItems() {
                            //     var pagination = 3;

                            //     for (var i = itemsCount; i < (itemsCount + pagination); i++) {
                            //         $('#academyouter div.outer-of-acadmy:eq(' + i + ')').show();
                            //     }

                            //     itemsCount += pagination;

                            //     if (itemsCount >= itemsMax) {
                            //         $('#load_more').hide();
                            //     }
                            // };
                            // showNextItems();
                            //     $('#load_more').on('click', function (e) {
                                    
                            //         e.preventDefault();
                            //     showNextItems();
                            // });
                    
                },2000);  
                  
            }
        })

    });

    jQuery('#abc').keyup(function (event) {
        if (event.keyCode == 13) {
            var firstResult = $(".pac-container .pac-item:first").text();
            jQuery('#suggesstion-box').hide();
            jQuery('.outer-of-loader').show();
            var postcode_value = jQuery('.postcode_here').val();
           
            if(postcode_value != ''){
               jQuery('.blank_postcode').remove();
               if(postcode_value.split(' ').length == 1){
                    postcode_value = firstResult;
                }
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
                    
                    setTimeout(function(){
                        jQuery('.outer-of-loader').hide();
                        jQuery('.academy_data').hide();
                        jQuery('.searched_academy').show();
                        jQuery('.searched_academy').html(data);
                        if($(data).find(".no_result").text() != "No nearest class found !"){
                            var $divs = $("div.outer-of-acadmy");
                            var numericallyOrderedDivs = $divs.sort(function (a, b) {
                                return Number($(a).attr("message_count")) - Number($(b).attr("message_count"));
                            });
                            $(".academy_outer").html(numericallyOrderedDivs);

                            var itemsCount = 0,
                            itemsMax = $('#academyouter div.outer-of-acadmy').length;
                            if (itemsMax <= 3) {
                                $('#load_more').hide();
                            }
                            $('#academyouter div.outer-of-acadmy').hide();

                            function showNextItems() {
                                var pagination = 3;

                                for (var i = itemsCount; i < (itemsCount + pagination); i++) {
                                    $('#academyouter div.outer-of-acadmy:eq(' + i + ')').show();
                                }

                                itemsCount += pagination;

                                if (itemsCount >= itemsMax) {
                                    $('#load_more').hide();
                                }
                            };
                            showNextItems();
                                $('#load_more').on('click', function (e) {
                                    
                                    e.preventDefault();
                                showNextItems();
                            });
                        }else{
                            $('#load_more').hide();
                        }
                    },2000);
                }
            })
        }
    });
    jQuery('.find_postcode').live('click', function(){
        var firstResult = $(".pac-container .pac-item:first").text();
        jQuery('#suggesstion-box').hide();
         jQuery('.outer-of-loader').show();
        var postcode_value = jQuery('.postcode_here').val();
        if(postcode_value != ''){
           jQuery('.blank_postcode').remove();
           if(postcode_value.split(' ').length == 1){
                postcode_value = firstResult;
            }
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
               
                setTimeout(function(){
                    jQuery('.outer-of-loader').hide();
                    jQuery('.academy_data').hide();
                    jQuery('.searched_academy').show();
                    jQuery('.searched_academy').html(data);
                    
                    if($(data).find(".no_result").text() != "No nearest class found !"){
                            var $divs = $("div.outer-of-acadmy");
                            var numericallyOrderedDivs = $divs.sort(function (a, b) {
                                return Number($(a).attr("message_count")) - Number($(b).attr("message_count"));
                            });
                            $(".academy_outer").html(numericallyOrderedDivs);

                            var itemsCount = 0,
                            itemsMax = $('#academyouter div.outer-of-acadmy').length;
                            if (itemsMax <= 3) {
                                $('#load_more').hide();
                            }
                            $('#academyouter div.outer-of-acadmy').hide();

                            function showNextItems() {
                                var pagination = 3;

                                for (var i = itemsCount; i < (itemsCount + pagination); i++) {
                                    $('#academyouter div.outer-of-acadmy:eq(' + i + ')').show();
                                }

                                itemsCount += pagination;

                                if (itemsCount >= itemsMax) {
                                    $('#load_more').hide();
                                }
                            };
                            showNextItems();
                                $('#load_more').on('click', function (e) {
                                    e.preventDefault();
                                showNextItems();
                            });
                        }else{
                            $('#load_more').hide();
                        }
                },2000);
            }
        })
    }); 
});  
</script>
<script type="text/javascript">
jQuery(document).ready(function(){

    jQuery('.mid-linlk-ul li').live('click',function(){

        jQuery('.mid-linlk-ul li').removeClass('active');

        jQuery('.mid-linlk-ul li').addClass('blur');            

        jQuery(this).addClass('active');

    });

});
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('.book-session-link').live('click', function(){
        var acc_name = jQuery(this).attr('data-value');

        if ( jQuery('#_form_411_').length ) { //this is active campaign form
                var match_value = acc_name;  
                
                jQuery(".get_trial_academy_name").text('@ '+match_value)+' Academy';
                jQuery("#academy_trial_list option").each(function(){
                        if(jQuery(this).val()==match_value){ // EDITED THIS LINE
                            jQuery(this).attr("selected","selected");    
                        }
                });
                
                
        } else { // it is using cf7

            if(acc_name == "Carshalton South"){
            var match_value = "Carshalton Academy";
            } else {
                var match_value = acc_name+" Academy";
            }

            jQuery(".get_trial_academy_name").text('@ '+match_value);
            //jQuery("select[name='academy_trial_list']").val(match_value);
            jQuery("select[name='academy_trial_list'] option").each(function(){
                    if(jQuery(this).val()==match_value){ // EDITED THIS LINE
                        jQuery(this).attr("selected","selected");    
                    }
            });
        }
    });
});
</script>

<?php endif; ?>


<script id="exclude" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/aos.js"></script>

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
    $("#book_pop").click(function(){
        $("#myModal_popup").modal('show');
    });
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
$('footer').hide();
$(document).ready(function() {
    $('ol.faqclic > li').click(function() {
        $('ol.faqclic').closest('li').toggleClass('active');
    });
    $(window).load(function(){
        $('footer').show();
    });
  
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
<style>
@media only screen and (max-width: 767px) {
.datepicker-dropdown {
    position: fixed !important;
}
}

.dtpicker-twoButtons .dtpicker-buttonClear {background:grey !important;}
.dtpicker-twoButtons .dtpicker-buttonSet {background:#389811 !important;}
.dtpicker-header .dtpicker-value {color:#389811 !important;} 
.dtpicker-header .dtpicker-close {color:#389811 !important;} 
.dtpicker-header .dtpicker-title {color:#389811 !important;}
.dtpicker-components .dtpicker-comp > * {color:#389811 !important;}
.dtpicker-overlay {z-index:9999 !important;}
body .content-coachform {max-height:688px !important;}
</style>

<!-- tiny add datetimePicker -->
<script src="<?php echo get_stylesheet_directory_uri().'/assets/js/fontend/tmp/DateTimePicker.js';?>"></script>
<!-- tiny add datetimePicker -->
<script type="text/javascript">
jQuery(document).ready(function() {
// start branch-28
jQuery(".popFreeTrial-anchor").on("click touchstart", function(e) {
    var ww = jQuery( window ).width();
    e.preventDefault();
    if(ww < 992) {
        jQuery('html, body').animate({
            scrollTop: jQuery(".ways-to-book-heading").offset().top - 0
        }, 1000);
    } else {
        jQuery('html, body').animate({
            scrollTop: jQuery(".ways-to-book-heading").offset().top - 60
        }, 1000);
    }
});
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

<script>
$(document).ready(function(){
    $("#map_canvas").hide();
    $("#image-logo-map").show();
    // $("#map_canvas").replaceWith( "<div id='' class='image-responsive'><img src='/wp-content/uploads/2018/contact-us-logo.png'></div>" );
});
</script>
<script>
	$(document).ready(function(){
		/*$("#myCarousel_joinus").hover(function(){
			$('body').css('overflow-y', 'hidden');
		}, function(){
			$('body').css('overflow-y', 'scroll');
		});*/
	});
</script>


<script>
	$(document).ready(function(){
		/*$('#myCarousel_joinus').on('mousewheel', function(e){
            $( "#myCarousel_joinus>.carousel-inner>.item:last-child").addClass('lastitem');
            $( "#myCarousel_joinus>.carousel-inner>.item:first-child").addClass('firstitem');
            if($('div.item.lastitem.active').length > 0){
                $('body').css('overflow-y', 'scroll');
                if(e.originalEvent.wheelDelta /120 > 0) {
                    $('body').css('overflow-y', 'hidden');
    				$(this).carousel('prev');	
                }
            }else if($('div.item.firstitem.active').length > 0){
                $('body').css('overflow-y', 'scroll');
                if(e.originalEvent.wheelDelta /120 < 0) {
                    $('body').css('overflow-y', 'hidden');
    				$(this).carousel('next');	
                }
            }else{
                if(e.originalEvent.wheelDelta /120 > 0) {
                    $('body').css('overflow-y', 'hidden');
    				$(this).carousel('prev');	
  			}else{
                    $('body').css('overflow-y', 'hidden');
                    $(this).carousel('next');
  			}
            }
		});*/
    });
</script> 
<script>
    $(document).ready(function(){
        $('#myCarousel_joinus').on('swipeleft', function(e) {
            e.preventDefault();
            $(this).carousel('next');
        });
    
        $('#myCarousel_joinus').on('swiperight', function(e) {
            e.preventDefault();
            $(this).carousel('prev');
        });
    });
</script>



<div id="dtBox"></div>
</body>
</html>