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
  <script defer type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.sync.bootstrap.min.js"></script>
<!--   <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:186945,hjsv:5};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
  </script> -->
  <style type="text/css">
  .visible-sm-block.contact-us a{display:none!important}#responsive-menu-additional-content .sign-in a:nth-child(1){text-align:right;border-right:2px solid}#responsive-menu-additional-content .sign-in a{color:#fff;padding:10px;display:block;float:left;font-size:20px;font-weight:500;height:100%;line-height:59px;margin:0;text-align:left;text-decoration:none;text-transform:uppercase;vertical-align:middle;width:50%}.hide-contact,.wmf_locator_link{display:none}.wmf_locator_link a{color:#ee7925!important}@media screen and (max-width:768px){#wpadminbar{position:fixed!important}.hide-contact,.wmf_locator_link{display: block!important;}}
  </style>


<style type="text/css">
  .ck-text{
    color:#ee7925!important;
    font-weight: bold;
    font-size: 15px;
  }
  .cc-top{
    max-width: 1085px!important;
    left:0;
    right:0;
    margin: 0 auto;
    background: rgba(0, 0, 0, 0.75)!important;
  }
.cc-top h5{
    line-height: 0px;
  }
  .ck-text.cc-btn{
    width:auto!important;
    display: inline-block!important;
    padding: 0!important;
    position: relative!important;
    top:0!important;
    right:0!important;
    min-width: auto!important;
    background: none!important;
  }
  .cc-banner .cc-btn:last-child{
    position: absolute;
    background: none!important;
    top: 7px;
    right: 16px;
  }
  @media handheld, only screen and (max-width: 400px), only screen and (max-device-width: 400px){
    .cc-banner .cc-btn:last-child{display: none;}
  }
</style>

<script type="text/javascript">
$(document).ready(function() {
          
      $('#entry-content').delay(1).fadeIn(1);
      $('#loading').delay(1).fadeOut(1);
  });
</script>

<?php //WMF Cards
//get_the_ID() == '4277' || || get_the_ID() == '279'
if(is_page_template('page-home.php')){ ?>
  
  <style type="text/css">
    
  </style>

  <script defer src="<?php echo site_url(); ?>/wp-content/themes/wmf/assets/libs/semantic/dist/semantic.min.js"></script>
<script type="text/javascript" defer>
   $( document ).ready( function(){
      $('.open-london').click( function(){
      $('.london-acads').modal('show')});
      $('.open-manchester').click( function(){
            $('.manchester-acads')
            .modal('show')
            ;
      });
   
      $('.card').click(function() {
        $('.ui.modal').addClass('scrolling');
        $('body').addClass('scrolling');
        //auto scroll to top
        $(".dimmer").animate({ scrollTop: 0 }, "slow");
      });
      $('.freetrial-trigger').click( function(){
        
        $('.image.content').hide();
        
        if ($(this).hasClass('cheshire')) {
               $('#cheshire-form').fadeIn().delay(1000);
        }
        if($(this).hasClass('isleworth')) {
               $('#isleworth-form').fadeIn().delay(1000);
        } 
        if($(this).hasClass('hounslow')) {
               $('#hounslow-form').fadeIn().delay(1000);
        } 
        if($(this).hasClass('teddington')) {
               $('#teddington-form').fadeIn().delay(1000);
        } 
        if($(this).hasClass('twickenham')) {
               $('#twickenham-form').fadeIn().delay(1000);
        }
        if($(this).hasClass('chiswick')) {
               $('#chiswick-form').fadeIn().delay(1000);
        }
        if($(this).hasClass('carshalton-south')) {
               $('#carshalton-form').fadeIn().delay(1000);
        }       
        if ($(this).hasClass('richmond')) {
               $('#richmond-form').fadeIn().delay(1000);
        }     
        if ($(this).hasClass('southall')) {
               $('#southall-form').fadeIn().delay(1000);
        }  
        if ($(this).hasClass('carshalton')) {
               $('#coulsdon-form').fadeIn().delay(1000);
        }  
        if ($(this).hasClass('kingston')) {
               $('#kingston-form').fadeIn().delay(1000);
        }  
        if ($(this).hasClass('sunbury')) {
               $('#sunbury-form').fadeIn().delay(1000);
        }
        if ($(this).hasClass('finchley')) {
               $('#finchley-form').fadeIn().delay(1000);
        }
        if ($(this).hasClass('coulsdon-south')) {
               $('#coulsdon-south-form').fadeIn().delay(1000);
        }
        if ($(this).hasClass('milton-keynes')) {
               $('#milton-keynes-form').fadeIn().delay(1000);
        }
        if ($(this).hasClass('beckenham')) {
               $('#beckenham-form').fadeIn().delay(1000);
        }
        //auto scroll to top
        $(".dimmer").animate({ scrollTop: 0 }, "slow");
        
      });
      $('.innerform .close, .cancel').click( function(){
         $('.innerform').hide(); //hide form
         $('.image.content').fadeIn().delay(1000);
        
      });
    });
</script>

<?php } ?>

<script async src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#000"
    },
    "button": {
      "background": "#ee7925",
      "text": "#fff"
    }
  },
  "position": "top",
  "content": {
    "message": "<h5>WE MAKE FOOTBALLERS COOKIE POLICY</h5><div>Welcome to www.wemakefootballers.co.uk. This website uses cookies to ensure you get the best experience on our website.</div><div> Please see our <a href='https://www.wemakefootballers.com/privacy-policy/' class='ck-text'>Privacy Policy</a> for further information. Click <a aria-label='dismiss cookie message' class='cc-dismiss ck-text cc-btn'>CLOSE</a> to accept cookies from this site.</div>",
    "dismiss": "CLOSE",
    "link": null,
    "href": "https://www.wemakefootballers.com/privacy-policy/"
  }
})});
var cookieconsent_ts = 1479819880;
var cookieconsent_id = '8a536e47-6672-41f5-8985-e9b3f4e41b8b';
</script>
</head>

<?php
  $_class = ( isset($post) AND is_object($post) ) ? 'wmf-'.$post->post_name : '';
  $_classes_keys = get_post_custom_keys();
  if($_classes_keys) {
    $_class_exist = array_key_exists('class', $_classes_keys) || in_array('class', $_classes_keys);
    if($_class_exist) {
      $_class .= ' ' . implode(' ', get_post_custom_values('class'));
    }
  }
  $_class .= ' page';
  if (is_main_site()) {
    $_class .= ' page-template-default';
  } else {
    $_class .= ' page-template-page-location-dashboard-php';
  }
?>

<?php if(is_page_template('page-home.php')){
      $_class .= ' wmf-home';
?>
<?php }?>
<body <?php body_class($_class); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMMW2QG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="loading"></div>