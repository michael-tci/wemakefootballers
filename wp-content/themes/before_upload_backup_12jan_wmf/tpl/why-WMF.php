<?php
/*
Template Name: Why WMF
*/

get_header(); ?>

  <div id="primary" class="content-area wmf-news">
    <main id="main" class="site-main row" role="main">
    	<div class="page-header-pages">
    		<div class="container">
    			<div class="full-breadcrumbs">
    				<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    			</div>
    		</div>    	
    	</div><!-- page-header-pages END -->
		
    </main><!-- .site-main -->


    <div class="section-all-row heaerprttp" data-aos="fade-up">
	  	<div class="container">
	  		<div class="text-center">
	  			<div class="iconof-pgtitle"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/footballer-icon.png" alt="icon"></div>
	  			<h2 class="pagetitlename"><?php the_field('why_we_make_footballers_heading'); ?></h2>
	  			<p><?php the_field('why_we_make_footballers_description'); ?></p>
	  		</div>
	  	</div>
  	</div><!-- section-all-row END -->

  	<div class="section-all-row wahywmf-mmenudevicee">
  		<div class="container">
			<div class="wahywmf-mmenu" id="nav">
				<ul>
					<?php if(have_rows('list_of_ways_for_make_footballers')) : $lists = 1;  while(have_rows('list_of_ways_for_make_footballers')) : the_row(); ?>
					<li>
						<a href="#to_<?php echo $lists; ?>">
							<div class="iconof_whywmf <?php if($lists == 1): echo 'facilities-icn'; elseif($lists == 2): echo'health-safety-icn'; elseif($lists == 3) : echo 'online-booking-icn'; elseif($lists == 4): echo 'pathways-icn'; elseif($lists == 5): echo 'value-money-icn'; elseif($lists == 6): echo 'session-structure-icn'; elseif($lists == 7): echo 'proven-icn'; elseif($lists == 8): echo 'coaches-icn'; endif; ?>"></div>
							<span><?php the_sub_field('name_of_ways'); ?></span>
						</a>
					</li>
				<?php $lists++; endwhile; endif; wp_reset_postdata(); ?>
					<!-- <li><a href="#health-safety"><div class="iconof_whywmf health-safety-icn"></div><span>Health & Safety</span></a></li>
					<li><a href="#onlinebooking-software"><div class="iconof_whywmf online-booking-icn"></div><span>Online Booking Software</span></a></li>
					<li><a href="#pathways"><div class="iconof_whywmf pathways-icn"></div><span>Pathways</span></a></li>
					<li><a href="#value-money"><div class="iconof_whywmf value-money-icn"></div><span>Value for Money</span></a></li>
					<li><a href="#session-structure"><div class="iconof_whywmf session-structure-icn"></div><span>Session Structure</span></a></li>
					<li><a href="#proven-track"><div class="iconof_whywmf proven-icn"></div><span>Proven Track Record</span></a></li>
					<li><a href="#coaches"><div class="iconof_whywmf coaches-icn"></div><span>Coaches</span></a></li> -->
				</ul>
			</div>
  		</div>
  	</div>

  	<?php if(have_rows('brief_description_of_ways')) : $counter = 1; while(have_rows('brief_description_of_ways')) : the_row(); ?>
  		<?php if( $counter %2 == 1 ) : ?>
		  	<div class="section-twocol section-twocol-full nobgandfull" id="to_<?php echo $counter; ?>">
			    <div class="section-twocol-table">
			      <div class="section-twocol-col section-twocol-col-image" data-aos="fade-right">
			        <div class="section-twocol-col-imagebx"><img src="<?php the_sub_field('why_make_image'); ?>" alt="image"></div>
			      </div>
			      <div class="section-twocol-col section-twocol-col-content"  data-aos="fade-left">
			          <div class="contentoverlaythis rightset rightsetsidecont">
			          		<div><?php the_sub_field('why_make_title'); ?></div>
			               	<p><?php the_sub_field('why_make_description') ?></p>
			          </div>
			      </div>
			    </div>
		  	</div>
		<?php elseif( $counter %2 == 0): ?>
			<div class="section-twocol section-twocol-full nobgandfull" id="to_<?php echo $counter; ?>">
			    <div class="section-twocol-table">
			    	<div class="section-twocol-col section-twocol-col-image indesktopnone" data-aos="fade-left">
				        <div class="section-twocol-col-imagebx"><img src="<?php the_sub_field('why_make_image'); ?>" alt="image"></div>
				      </div>
			    	<div class="section-twocol-col section-twocol-col-content"  data-aos="fade-right">
			          <div class="contentoverlaythis rightset">
			          		<div><?php the_sub_field('why_make_title'); ?></div>
			             	<p><?php the_sub_field('why_make_description') ?></p>
			          </div>
			      	</div>
				      <div class="section-twocol-col section-twocol-col-image inmobilenone" data-aos="fade-left">
				        <div class="section-twocol-col-imagebx"><img src="<?php the_sub_field('why_make_image'); ?>" alt="image"></div>
				      </div>
			    </div>
		  	</div>
	<?php endif; ?>

  <?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
  	

  	<div class="section-all-row bgpartcount-section-text bgnonetransparent aos-init aos-animate" data-aos="fade-up">
	  	<div class="container">
	  		<div class="text-center">
	  			<p class="sizesetfont"><?php the_field('companies_in_the_uk_heading'); ?></p>
	  		</div>
	  	</div>
  	</div><!-- section-all-row END -->

  	<div class="our-goals-wmf">
  		<div class="container">
  			<div class="our-goals-wmfinnner">
  				<div class="row">
  					<div class="col-md-3 col-widthget">
  						&nbsp;
  					</div>
  					<?php if(have_rows('football_coaching_companies_in_the_uk')) : while(have_rows('football_coaching_companies_in_the_uk')) : the_row(); ?>
	  					<div class="col-md-4">
	  						<div class="our-goals-wmf-col">
	  							<div class="our-goals-wmf-col-img"><img src="<?php if(get_sub_field('coaching_companies_image')) : echo get_sub_field('coaching_companies_image'); else: echo site_url().'/wp-content/themes/wmf/assets/img/slide3.jpg'; endif;  ?>" alt="icon"></div>
	  							<div class="hedlinssdad"><?php the_sub_field('coaching_companies_name'); ?></div>
	  							<div class="btn btn-primary"><a href="<?php if(get_sub_field('comp_button_link')) : echo get_sub_field('comp_button_link'); else: echo site_url(); endif; ?>"><?php the_sub_field('comp_button_text'); ?></a></div>
	  						</div>
	  					</div>  
	  				<?php endwhile; endif; ?>					
  				</div>
  			</div>
  		</div>
  	</div><!-- our-goals-wmf END -->

  	<div class="entry-content findnearest_academyanimbx">
	  <div class="jsn-bootstrap3 container">
	    <div class="row findnearest_academy">
	      <?php echo do_shortcode('[postcodesearch]'); ?>
	    </div>
	  </div>
	</div>

  </div><!-- .content-area -->

<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fontend/jquery.pagenav.js"></script>
<script>
    jQuery(document).ready(function () {
        jQuery('#nav a').pageNav({'scroll_shift': jQuery('#nav').outerHeight() + 180});       
    });
</script>
<?php get_footer(); ?>
