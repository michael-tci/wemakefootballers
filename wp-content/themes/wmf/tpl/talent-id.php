<?php
/*
Template Name: Talent ID
*/

get_header(); ?>

  <div id="primary" class="content-area wmf-news">
    <!-- <main id="main" class="site-main row" role="main">
    	<div class="page-header-pages">
    		<div class="container">
    			<div class="full-breadcrumbs">
    				<?php //if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    			</div>
    		</div>    	
    	</div>
		
    </main> -->


    <div class="section-all-row heaerprttp" data-aos="fade-up">
	  	<div class="container">
	  		<div class="text-center">
	  			<div class="iconof-pgtitle"><img src="<?php if(get_field('talent_id_icon')) : echo get_field('talent_id_icon'); else: echo get_stylesheet_directory_uri().'/assets/img/talent-id-icon.png'; endif; ?>" alt="icon"></div>
	  			<h2 class="pagetitlename">
	  				<?php if(get_field('talent_id_heading')) : echo get_field('talent_id_heading'); else: echo get_the_title(); endif; ?>
	  			</h2>
	  			<?php if(get_field('talent_id_content', false, false)) : ?>
	  				<p><?php echo get_field('talent_id_content', false, false); ?></p>
	  			<?php endif; ?>
	  		</div>
	  	</div>
  	</div><!-- section-all-row END -->

  


  	<div class="talenttwo_sec">
  		<div class="talenttwo_sec_image" data-aos="fade-up">
  			<img src="<?php if(get_field('talent_id_banner_image')) : echo get_field('talent_id_banner_image'); else: echo site_url().'/wp-content/uploads/2015/11/4E7A50411.jpg'; endif; ?>" alt="image"></div>
  		
  		<div class="container">
  			<div class="talenttwo_sec_content" data-aos="fade-up">
  				<?php if(get_field('talent_id_banner_content')) : ?>
					<p><?php echo get_field('talent_id_banner_content'); ?></p>
				<?php endif; ?>
  			</div>
  		</div>
  	</div><!-- talenttwo_sec END -->


  	<div class="talentid_third">
  		<div class="container">
  			<div class="talentid_third_table">
  				<div class="talentid_third_cell talentid_third__imag">
  					<div class="talentid_third__imag_ce">
  						<img src="<?php if(get_field('our_talent_id_events_image')) : echo get_field('our_talent_id_events_image'); else: echo site_url().'/wp-content/uploads/2015/11/4E7A50411.jpg'; endif; ?>" alt="image">
  					</div>
				</div>  				
  				<div class="talentid_third_cell talentid_third__content">
  					<div class="bottomcontentj_third">
  						<?php if(get_field('our_talent_id_events_content')) : ?>
		            		<?php echo get_field('our_talent_id_events_content'); ?>
		              	<?php endif; ?>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div><!-- talentid_third END -->


  	<div class="section-all-row largeparagh upcoming-talentsectionbx" data-aos="fade-up">
	  	<div class="container">
	  		<div class="text-center"  data-aos="fade-up">
		  		<h2 class="pagetitlename"><?php the_field('upcoming_talent_id_events_heading'); ?></h2>
		  		<?php if(get_field('upcoming_talent_id_events_sub_heading')) : ?>
		  			<p><?php echo get_field('upcoming_talent_id_events_sub_heading'); ?></p>
		  		<?php endif; ?>
	  		</div>
	  		<div class="upcomingtaleidsection_no"  data-aos="fade-up">
	  			<div><?php the_field('upcoming_talent_id_events_content'); ?></div>
	  		</div>


	  		<!-- Talent IDs Show -->
	  		<div class="upcomingtaleidsection_show">
	  			<div class="row">
	  				<?php if(have_rows('upcoming_events')) : while(have_rows('upcoming_events')) :  the_row(); ?>


	  				<div class="col-md-8" data-aos="fade-up">
	  					<div class="upcomingtaleidsection_show-col">
	  						<div class="upcomingtaleidsection_show-img">
	  							<?php if(get_sub_field('event_icon')) : ?>
	  								<img src="<?php echo get_sub_field('event_icon'); ?>" alt="image">
	  							<?php endif; ?>
	  						</div>
	  						<div class="upcomingtaleidsection_show-content">
	  							<div class="ttle-upcoming-col"><?php the_sub_field('event_name'); ?></div>
	  							<div class="upcoming-collishow">
	  								<ul>
	  									<li><i class="fa fa-calendar" aria-hidden="true"></i>
	  										<span><?php the_sub_field('event_date'); ?></span>
	  									</li>
	  									<li><i class="fa fa-info-circle" aria-hidden="true"></i>
	  										<span><?php the_sub_field('event_time'); ?></span>
	  									</li>
	  								</ul>
	  							</div>
	  							<div class="clearfix btn btn-primary">
	  								<a href="<?php  //echo get_field('event_button_link'); ?>https://www.eventbrite.co.uk/e/we-make-footballers-beckenham-talent-id-registration-45138730157" target="_blank">Book Now</a>
	  							</div>
	  						</div>
	  					</div>
	  				</div>
	  			<?php endwhile; endif; wp_reset_postdata(); ?>

	  				
	  			</div>
	  		</div>

	  	</div>
  	</div><!-- section-all-row END  -->

  	


  </div><!-- .content-area -->

<?php get_footer(); ?>
