<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T7DHNW2');</script>
<!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="format-detection" content="telephone=no">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=9" /> -->
  <link type="image/x-icon" href="/wp-content/themes/wmf/assets/img/favicon.ico" rel="icon">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
  <script defer type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.sync.bootstrap.min.js"></script>
  <!-- Hotjar Tracking Code for https://www.wemakefootballers.com -->
  <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:186945,hjsv:5};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
  </script>
  <style type="text/css">
  .visible-sm-block.contact-us a{display:none!important}#responsive-menu-additional-content .sign-in a:nth-child(1){text-align:right;border-right:2px solid}#responsive-menu-additional-content .sign-in a{color:#fff;padding:10px;display:block;float:left;font-size:20px;font-weight:500;height:100%;line-height:59px;margin:0;text-align:left;text-decoration:none;text-transform:uppercase;vertical-align:middle;width:50%}.hide-contact,.wmf_locator_link{display:none}.wmf_locator_link a{color:#ee7925!important}@media screen and (max-width:768px){#wpadminbar{position:fixed!important}.hide-contact,.wmf_locator_link{display: block!important;}}
  </style>

  <link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/wmf/r-menu-custom.css" type="text/css" /> 
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/wmf/assets/css/fontend/main.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/wmf/assets/css/fontend/media.css" type="text/css"/>



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
if( get_the_ID() == '4833') { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/wmf/assets/libs/semantic/dist/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/wmf/assets/libs/semantic/components/card.css">
  <style type="text/css">
    .innerform{
        display: none;
        padding: 0 5% 5% 5%;
      }
      body.scrolling {
        /*overflow: hidden !important;*/
      }
      .innerform .modal-header{
        text-align: center;
        background: url(https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/quotebanner.png);
        height: 100px;
        background-size: cover;
        border: none;
        background-position: 50% 50%;
        color:#fff;
      }
      .innerform .modal-header .modal-title:nth-child(3){  
        margin-right: 27px;
      }
      
      .freetrial-trigger:hover{
          cursor: pointer;
      }
    .ui.cards > .card > .image:not(.ui) > img{
        height: 242px;
        }
        .ui.cards > .card > .middle > .header:not(.ui){
          text-transform: uppercase;
          font-size: 40px;
          color:#fff;
        }
        .ui.cards > .card > .middle, .ui.card > .middle {
          text-align: center;
          position: absolute;
          top: 100px;
          left: 0;
          right: 0;
        }
        .ui.cards > .card .meta, .ui.card .meta {
          padding-bottom: 30px;
        }
        .ui.cards > .card .middle .meta > a:not(.ui), .ui.card .meta > a:not(.ui) {
          color:orange;
          font-size: 25px;
            text-shadow: 1px 1px #000;
        }
        .extra.content span{
          color:#000;
        }
          .modals.dimmer .ui.scrolling.modal{
              min-height: 80%;
          }
        #bg{
          background: #ffffff;
           }
            #wmf-cards{
              max-width: 975px;
              margin: 0 auto;
              text-align: center;
              padding: 90px 0;
            }
            .ui.cards > .card, .ui.card, .ui.card:hover,.ui.cards a.card:hover, .ui.link.cards .card:hover, a.ui.card:hover, .ui.link.card:hover {
              border-radius: 0;
              background: #f2711c;
              max-width:390px;
              width:50%;
              /*min-width: 290px;*/
              margin: 0 auto;
              -webkit-box-shadow: 0px 0px 100px -8px rgba(0,0,0,0.47);
              -moz-box-shadow: 0px 0px 100px -8px rgba(0,0,0,0.47);
              box-shadow: 0px 0px 100px -8px rgba(0,0,0,0.47);
            }

            .ui.cards > .card > .image:not(.ui) > img {
              border-radius: 0;
              height: auto;
            }
            .ui.inverted.orange.button, .ui.inverted.orange.buttons .button,
             .ui.inverted.orange.button:focus, .ui.inverted.orange.buttons .button:focus{
              background-color:#ffffff;
              max-width: 300px;
              width: 100%;
              font-size: 17px;
              font-weight: bold;
              border-radius: 10px;
              color: #ff851b;
              border: 2px solid #ff851b;

            }

            .ui.inverted.orange.button:hover, .ui.inverted.orange.buttons .button:hover, 
            .ui.inverted.orange.button:focus:hover, .ui.inverted.orange.buttons .button:focus:hover{
              background-color: transparent;
              border: 2px solid #fff;
              color: #fff;

            }
            .ui.cards > .card > .image{
              height:242px;
              background-size: cover!important;
              background-repeat: no-repeat !important;
            }
            .open-manchester .image{
              background: url("https://www.wemakefootballers.com/wp-content/uploads/2017/04/Manchester-480.jpg") !important;

            }
            .open-london .image{
              background: url("https://www.wemakefootballers.com/wp-content/uploads/2017/04/London-480.jpg") !important;

            }
            .ui.cards > .card > .content, .ui.card > .content{
              border-top: none;
            }
            .ui.cards > .card > .content > .header + .description{
              margin: 60px 8px 0 -14px;
              background:rgba(0,0,0,0.5);
              color:#fff;
              text-align:center;
              padding:2px;
              width:130px;
              text-transform: uppercase;
              font-size: 12px;
              font-weight: bold;
            }
            .description .ui.button{
              width:auto;    
              margin: 7px 1%;
              font-weight: bold;
              font-size: 13px;
            }
            .ui.modal>.content>.icon+.description, .ui.modal>.content>.image+.description{
              width: 45%;
            }        
          .image.content .ui.large.image .middle.content{
              text-align: center;
              position: absolute;
              top: 100px;
              left: 0;
              right: 0;
          }
          .image.content .ui.large.image .header{
              text-transform: uppercase;
              font-size: 50px;
              color: #fff;
              font-weight: bold;
          }
          .image.content .ui.image img{
              margin-bottom: 10px;
              min-width: 100%;
              max-height: 277px;
          }
          .image.content .table{
              margin-bottom: 5px;
          }
          .image.content .ui.large.image p{
              font-size: 13.5px;
              text-align: left;
              margin: 0;
          }
          .btn_footer{
              width: 100%;
              text-align:center;
          }
          .closeModal{
              font-size: 30px;
              position: absolute;
              right: 2%;
              top: 10px;
              text-align: center;
              width: 30px;
              height: 30px;
              cursor: pointer;
              background: #fff;
              border-radius: 20px; 
          }
           .image.content .ui.header:nth-child(1){
                display: none;
            }
          .ui.modal .header:first-child{
                  font-size: 17px;
          }
          .image.content .ui.header{
                  padding: 5px 0;
                  font-size: 17px;
                  border-bottom: 1px solid rgba(34,36,38,.15);
              }
          .image.content .ui.header>.icon{
              font-size:17px;
              vertical-align: top !important;
          }
           .image.content .description .ui.header{
                display: block!important;
               border: none !important;
            }
            .ui.modal>.actions{
                background: transparent !important;   
                padding: 0!important;
            }
            button.open-london{
              padding: 20px !important;
            }
            @media handheld, only screen and (max-width: 960px), only screen and (max-device-width: 960px){
                 #bg {
                width: 100%;
              }
            }
          @media handheld, only screen and (max-width: 768px), only screen and (max-device-width: 768px){
            .modals.dimmer .ui.scrolling.modal {
                margin-top: 4rem!important;
            }

            #bg {
              /* max-width: 500px;   */
              /* margin: 0 auto; */
            }

            #wmf-cards{
                padding: 90px 0 50px;
                /* max-width: 405px; */
                margin:auto;
            }
            .ui.cards > .card, .ui.card, .ui.card:hover,.ui.cards a.card:hover, .ui.link.cards .card:hover, a.ui.card:hover, .ui.link.card:hover {  
                margin: 20px 20px 0px -6px;
                width:100%;
            }
             .image.content .description .ui.header{
                display: none!important;
            }
           .image.content .ui.header:nth-child(1){
                display: block;
            }
            .ui.modal .content>.description{
             
                margin: 0 auto !important;
                max-width: 450px!important;
            }
          }
          @media handheld, only screen and (max-width: 468px), only screen and (max-device-width: 468px){
            .image.content .ui.large.image .middle .header{
              font-size: 30px !important;  
              margin-top: 20px;

            }
            .ui.cards > .card, .ui.card, .ui.card:hover,.ui.cards a.card:hover, .ui.link.cards .card:hover, a.ui.card:hover, .ui.link.card:hover {  
                margin: 20px auto;
                width:100%;
            }

          }
  </style>

  <script defer src="<?php echo site_url(); ?>/wp-content/themes/wmf/assets/libs/semantic/dist/semantic.min.js"></script>
<script type="text/javascript" defer>
   $( document ).ready( function(){
      $('.open-london').click( function(){
      
    //         $('.ui.modal .image.content').css('display','flex');
      $('.london-acads').modal('show')});

      $('.open-manchester').click( function(){
            $('.manchester-acads')
            .modal('show')
            ;
      });
      // $('.ui.modal').on(closed, function(){
      //      // $('.ui.modal .image.content').css('display','block');
      // });

      /*enables scrolling with WMF theme*/
      $('.card').click(function() {

        $('.ui.modal').addClass('scrolling');
        $('body').addClass('scrolling');

        //auto scroll to top
        $(".dimmer").animate({ scrollTop: 0 }, "slow");

      });

      //hides and show form on each academy
      $('.freetrial-trigger').click( function(){
        
        $('.image.content').hide();
        
        //manchester acads
        if ($(this).hasClass('cheshire')) {
               $('#cheshire-form').fadeIn().delay(1000);
        }

        //london acads
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
        if($(this).hasClass('carshalton')) {
               $('#carshalton-form').fadeIn().delay(1000);
        }       
        if ($(this).hasClass('richmond')) {
               $('#richmond-form').fadeIn().delay(1000);
        }     
        if ($(this).hasClass('southall')) {
               $('#southall-form').fadeIn().delay(1000);
        }  
        if ($(this).hasClass('coulsdon')) {
               $('#coulsdon-form').fadeIn().delay(1000);
        }  
        if ($(this).hasClass('kingston')) {
               $('#kingston-form').fadeIn().delay(1000);
        }  
        if ($(this).hasClass('ashford')) {
               $('#ashford-form').fadeIn().delay(1000);
        }
        if ($(this).hasClass('finchley')) {
               $('#finchley-form').fadeIn().delay(1000);
        }
        if ($(this).hasClass('coulsdon-south')) {
               $('#coulsdon-south-form').fadeIn().delay(1000);
        }

        //auto scroll to top
        $(".dimmer").animate({ scrollTop: 0 }, "slow");
        
      });

      //close any and all forms in modal
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
<body <?php body_class($_class); ?>>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7DHNW2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="loading"></div>

