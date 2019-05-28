<?php get_template_part( 'header/header', 'html' ); ?>

<style type="text/css">

/*Homepage coach form section height fixes */ 

#load_more{
    margin-bottom: 15px;
}
.acform input:focus, .acform textarea:focus{
	outline: none !important;
}
.btn-primary:hover {
    color: #fff;
    background-color: unset !important;
    border-color: unset !important;
}
</style>
<div class="header-custom">
<?php get_template_part( 'header/header', 'banner' ); ?>



<?php
  $blog_siteurl = '';
  if ( is_multisite() ) {
    $blog_details = get_blog_details(get_current_blog_id(), true);
    $blog_siteurl = !empty($blog_details->siteurl) ? $blog_details->siteurl : '';
  } else {
    $blog_siteurl = site_url('/');
  }
?>
  
<?php if(is_front_page()): ?>
		<?php $image_banner = get_field('image_banner'); ?>
  <div class="banner-content-full" style="background:url(<?php echo $image_banner['url']; ?>)">
    <div class="banner-content-full-inset"></div>
      <div class="banner-content-full_table">
        <div class="banner-content-full_tablecell">
          <div class="container">
            <p class="bannertext"><?php the_field('banner_text_1'); ?></p>
            <h1 class="bannertext"><?php the_field('banner_text_2'); ?></h1>
            <div class="book-freetrial-btn"><a id="generate" href="javascript:void(0);"><?php the_field('text_button'); ?></a></div>
          </div>
        </div>
      </div>
  </div><!-- banner-content-full END -->
<?php endif; ?>

</div>


<div class="container search-popup">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body clearfix">
                    <div class="popup-top-section">
                        <div class="left-local-class">
                            <div class="inner-right-txt">
                                <h4><i class="fa fa-search" aria-hidden="true"></i> &nbsp;&nbsp; select your local class</h4>
                            </div>
                        </div>
                        <div class="right-search-postcode text-center">
                            <h4>find your nearest class</h4>
                            <input type="text" name="postcode_here" id="abc" placeholder="Enter your postcode" class="postcode_here">
                            <input type="submit" name="find_postcode" value="GO" class="find_postcode">
                            <div id="suggesstion-box"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="pop-up-mid-sec">
                        <div class="searched_academy"></div>
                    <?php $get_locations = $wpdb->get_results("SELECT `training_location` FROM `wp_accadamy`  GROUP BY training_location"); ?>

                    <div class="academy_data"></div>

                    <?php foreach($get_locations as $loc): ?>
                        <div class="london_academy">                            
                            <h3><?php echo $loc->training_location; ?></h3>
                            <div class="london_academy_lists london_nortwest_list">
                                <ul class="clearfix mid-linlk-ul">
                                    <?php                                        
                                        $get_result = $wpdb->get_results("SELECT `acc_name` FROM `wp_accadamy` WHERE `training_location`='$loc->training_location' ORDER BY acc_name  asc ");
                                        foreach ($get_result as $key => $acc_london_value) {
                                    ?>
                                        <li><a href="javascript:void(0);"><?php echo $acc_london_value->acc_name; ?></a></li>  

                                    <?php } ?>                                   
                                  
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>


                        
                        
                        
                        <div class="outer-of-loader">
                            <div class="inner-of-popup">
                                <img src="<?php echo site_url()?>/wp-content/uploads/2017/12/loading_ajax.gif">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="cross" data-dismiss="modal"></button>
                </div>
            </div>
        </div>
    </div>
</div>
