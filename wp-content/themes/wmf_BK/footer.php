<footer class="section">
  <div class="container">
    <div class="row text-center">
      <div class="col-xs-16 footer-menu-link">
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
    <div class="row">
      <div class="col-xs-2 col-xs-offset-7">
        <div class="row">
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
    <div class="row contact">
      <div class="col-md-7 col-lg-6 col-lg-offset-1 gsstheme_setting_footer_content text-right">
        <?php echo !empty($optionTheme['gsstheme_setting_footer_content']) ? $optionTheme['gsstheme_setting_footer_content'] : '©2013-2015 We Make Footballers<sup>®</sup> Football Academy for Children' ?>
      </div>
      <div class="col-md-2 text-center gsstheme_setting_footer_logo">
        <?php
          $logo = !empty($optionTheme['gsstheme_setting_footer_logo']) ? $optionTheme['gsstheme_setting_footer_logo'] : get_stylesheet_directory_uri() . '/assets/img/logo-wmf.png';
          echo sprintf('<a href="%s"><img src="%s" alt="" class="img-responsive" /></a>', get_site_url(), $logo);
        ?>
      </div>
      <div class="col-md-7 col-lg-6 text-left footer-menu-detail">
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
</footer>

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-33674505-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
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
		
		jQuery(".academ_finder").click(function(){
		var val = jQuery(".search-aca").val();
		window.open(val);
		});
		
		jQuery(".postcode-plugin-head").keypress(function(e){
		if (e.which == 13) {
			$('input[name = post_code]').click();
			var post = jQuery(".postcode-plugin-head").val();
			var url = '/academy-locator/';
			window.open(url+"?post_code="+post);
		}
		});
		
		jQuery(".postcode-plugin").click(function(){ 
			var post = jQuery(".postcode-plugin-val").val();
			var url = 'https://www.wemakefootballers.com/academy-locator/';
			window.open(url+"?post_code="+post);
		});
		
		
		jQuery(".postcode-plugin-orange").click(function(){
			var post = jQuery(".postcode-plugin-val-orange").val(); 
			var url = 'https://www.wemakefootballers.com/academy-locator/';
			window.open(url+"?post_code="+post);
		});
		
		jQuery(".postcode-plugin-footer").click(function(){ 
			var post = jQuery(".postcode-plugin-val-footer").val();
			var url = 'https://www.wemakefootballers.com/academy-locator/';
			window.open(url+"?post_code="+post);
		});

		
		jQuery(".btn-find-near").click(function(){ 
			var post = jQuery(".input-postcode-find").val();
			var url = 'https://www.wemakefootballers.com/academy-locator/';
			window.open(url+"?post_code="+post);
		});
		
		jQuery(".search-acad").on('change', function(e) { //alert(this.value);
			e.preventDefault();
			var val = this.value;
			window.location.href = val;
		});		
		
		/*$(".locator-acd-list.locator-right").each(function(i) {
		    $(this).find("span").text(++i);
		});*/
		 jQuery("<span>1</span>").insertAfter(".locator-acd-list.locator-right");
		 
		 if ( (event.which == 13) ) {
			 if($(this).is('.input-postcode-site, .input-postcode-site-2, [type=poscode]')) {
				 alert("dfgh")
			 }
		 }
		 
		 
	});
	
</script>
</body>
</html>
