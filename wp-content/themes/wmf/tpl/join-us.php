<?php
/*
Template Name: join-us
*/

get_header(); ?>

  <div id="primary" class="content-area join-us">
  	<div class="top-join-sec">
	  	<div class="section-all-row heaerprttp sectionsetscroll top-join-sechomeban">
		  	<div class="container">
		  		<div class="content-wrapper">
		  		<div class="text-center">
		  			<div class="iconof-pgtitle"><img src="<?php if(get_field('opportunities_top_icon')) : echo get_field('opportunities_top_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/jobs-icon.png'; endif; ?>" alt="icon"></div>
		  			<h2 class="pagetitlename">
		  				<?php if(get_field('join_us_careers_heading')) : echo get_field('join_us_careers_heading'); else: echo "CAREERS OPPORTUNITIES WITH WE MAKE FOOTBALLERS"; endif; ?>		  					
		  			</h2>
		  			<p><?php the_field('join_us_careers_content'); ?></p>
		  			<div class="apply-coach-inner">
							<div class="btn btn-primary coach-apply">
								<a href="<?php if(get_field('coach_button_link')) : echo get_field('coach_button_link'); else: echo "#"; endif; ?>">
									<?php if(get_field('coach_button_text')) : echo get_field('coach_button_text'); else: echo "string"; endif; ?>									
								</a>
							</div>
							<div class="btn btn-primary"><a href="<?php if(get_field('customer_service_role_button_link')) : echo get_field('customer_service_role_button_link'); else: echo "#"; endif; ?>"><?php if(get_field('customer_service_role_text')) : echo get_field('customer_service_role_text'); else: echo "Apply For a customer service role"; endif; ?></a></div>
						</div>
		  		</div>

		  		
		  	</div>
		  	</div>
		</div>		
	

		<div class="sectionsetscroll slidersectionjoinus">
			<div class="content-wrapper">
				<div class="container">
					<div class="clearfix"></div>
		  			<div class="text-center jonustexteset">
						<h2>Why Join Us?</h2><br>
					</div>
				</div>
			
				<div class="wuc-carousel">
					<?php
						$why_join_us = array(
							'post_type' => 'why_join_us',
							'post_status' => 'publish',
							'posts_per_page' => 7,
						);
						$get_why_join_us = new Wp_query($why_join_us);
						$slide_why_join = $get_why_join_us->post_count;
						$slide_why_join_counter = 1;
					?>
				
					<?php if($get_why_join_us->have_posts()) : $counter_why_join =1; while($get_why_join_us->have_posts()) : $get_why_join_us->the_post();  if($counter_why_join %2 == 1) : ?>						
						<div class="section-twocol section-twocol-full  wuc-section-left health-safety">
							<div class="section-twocol-table">
								<div class="section-twocol-col section-twocol-col-image indesktopnone" >
									<div class="section-twocol-col-imagebx">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="icon">
									</div>
								  </div>
								<div class="section-twocol-col section-twocol-col-content">
								  <div class="contentoverlaythis rightset">
										<h4><?php the_title(); ?></h4>
										<p><?php the_content(); ?></p>
								  </div>
								</div>
								  <div class="section-twocol-col section-twocol-col-image inmobilenone">
									<div class="section-twocol-col-imagebx">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="icon">
									</div>
								  </div>
							</div>
						</div>
						<?php else: ?>
						<!-- section-twocol END -->
						<div class="section-twocol section-twocol-full  wuc-section-right facilities" >
							<div class="section-twocol-table">
							  <div class="section-twocol-col section-twocol-col-image" >
								<div class="section-twocol-col-imagebx">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="icon">
								</div>
							  </div>
							  <div class="section-twocol-col section-twocol-col-content">
								  <div class="contentoverlaythis rightset rightsetsidecont">
										<h4><?php the_title(); ?></h4>
										<p><?php the_content(); ?></p>
								  </div>
							  </div>
							</div>
						</div>
						<?php endif; ?>
					<?php $counter_why_join++; endwhile; endif; wp_reset_postdata(); ?>
					
				</div>
			</div>
		</div>

	<div class="joinusnot_scoll sectionsetscroll">
	<div class="vacancies-section fulwraper ">
		<div class="section-all-row heaerprttp aos-init aos-animate" data-aos="fade-up">
		  	<div class="container">
		  		<div class="text-center">
		  			<h2 class="pagetitlename"><br><br><?php the_field('vacancies_heading'); ?></h2>
		  			<p><?php the_field('vacancies_content'); ?></p>
		  		</div>
		  	</div>
		</div>
		<div class="col-sm-6">
			<div class="apply-inner-section" style="background-image: url(<?php if(get_field('apply_for_a_coaching_position_image')) : echo get_field('apply_for_a_coaching_position_image'); else: echo site_url().'/wp-content/themes/wmf/assets/img/holiday-camp-header.jpg'; endif; ?>);">
				<div class="apply-txt-inner">
					<h2><?php the_field('apply_for_a_coaching_position_heading'); ?></h2>
					<div class="btn btn-primary">
						<a href="<?php if(get_field('apply_for_a_coaching_position_button_link')) : echo get_field('apply_for_a_coaching_position_button_link'); else : echo "#"; endif; ?>">
							<?php if(get_field('apply_for_a_coaching_position_button_text')) : echo get_field('apply_for_a_coaching_position_button_text'); else: echo "Apply"; endif; ?>								
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="apply-inner-section apply-inner-section-2" style="background-image: url(<?php if(get_field('parent_host_image')) : echo get_field('parent_host_image'); else: echo site_url().'/wp-content/themes/wmf/assets/img/holiday-camp-bg.png'; endif; ?>);">
				<div class="apply-txt-inner">
					<h2><?php the_field('staff_host_heading'); ?></h2>
					<div class="btn btn-primary">
						<a href="<?php if(get_field('parent_host_button_link')) : echo get_field('parent_host_button_link'); else: echo "#"; endif; ?>">
							<?php if(get_field('parent_host_button_text')) : echo get_field('parent_host_button_text'); else: echo "Apply"; endif; ?>								
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="coaches-about-slider-section slider-sectionaskdhaksdh" data-aos="fade-up">
		<div class="testimonial-slider-section">
	        <div class="clearfix"></div>
	        <div id="myCarousel" class="carousel slide" data-ride="carousel">
	          <!-- Indicators -->
	          <?php 
	          	$testimonial = array(
	          		'post_type' => 'tesimonials',
	          		'post_status' => 'publish',
	          		 'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'lising_type',
                                                            'field' => 'slug',
                                                            'terms' => 'join-us',
                                                        ),
                                                    ),
                                'posts_per_page' => -1,
	          	); 
	          	$get_testimonials = new Wp_query($testimonial);
	          	$total_slide = $get_testimonials->post_count;
	          ?>
	          <ol class="carousel-indicators">
	          	<?php $current_bullet =1; ?>
	          		<?php for($i=0; $i<=$total_slide-1; $i++){ ?>
	            		<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($current_bullet ==1 ) : echo 'active'; endif; ?>"></li>	            
	            	<?php $current_bullet++; } ?>
	          </ol>
	          <!-- Wrapper for slides -->
	          <div class="carousel-inner">
	          <?php if($get_testimonials->have_posts()) : $counter=1; while($get_testimonials->have_posts()) : $get_testimonials->the_post(); ?>
		            <div class="item <?php if($counter == 1 ) : echo 'active'; endif; ?>">
		              <div class="container">
		                <div class="parent-table">
		                  <div class="left-revolver-img-parent">
		                    <div class="left-revolver-img">
		                      <?php the_post_thumbnail(); ?>
		                    </div>
		                  </div>
		                  <div class="about-revolver-right">
		                    <p><?php the_content(); ?></p>
		                    <div class="revolver-name">
		                      <h4><?php the_title(); ?><span><?php if(get_field('testi_player_position')) : echo ', '.get_field('testi_player_position'); endif; ?></span></h4>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>
		        <?php $counter++; endwhile; endif; wp_reset_postdata(); ?>	           
	          </div>
	        </div>
	    </div>
	</div>
	<div class="franchise-section fulwraper text-center" style="background-image: url(<?php if(get_field('opportunities_bg')) : echo get_field('opportunities_bg'); else: echo site_url().'/wp-content/themes/wmf/assets/img/image_wmf_in_school_00.jpg'; endif; ?>);">
		<div class="container">
			<div class="upper-franchise">
				<div class="bfa-logo-join-us">
					<img src="<?php if(get_field('franchise_opportunities_bfa_logo')) : echo get_field('franchise_opportunities_bfa_logo'); else: echo site_url().'/wp-content/themes/wmf/assets/img/footer-logo.jpg'; endif;?>" alt="icon">
				</div>
				<h1>
					<?php if(get_field('franchise_opportunities_heading')) : echo get_field('franchise_opportunities_heading'); else: echo "FRANCHISE OPPORTUNITIES"; endif; ?>					
				</h1>
				<p><?php the_field('franchise_opportunities_content'); ?></p>
				<div class="btn btn-primary"><a href="<?php if(get_field('opportunities_button_link')) : echo get_field('opportunities_button_link'); else: echo "#"; endif; ?>"><?php if(get_field('opportunities_button_text')) : echo get_field('opportunities_button_text'); else: echo "Franchise with us"; endif; ?></a></div>
			</div>
				
		</div>
	</div>

</div><!-- joinusnot_scoll END -->




	</div><!-- top-join-sec END -->
  </div><!-- .content-area -->



<?php get_footer(); ?>
