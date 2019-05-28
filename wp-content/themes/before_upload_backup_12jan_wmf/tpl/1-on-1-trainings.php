<?php
/*
Template Name: 1-on-1-Trainings
*/

get_header(); ?>

  <div id="primary" class="content-area wmf-news container-fluid">
    <main id="main" class="site-main row" role="main">
    	<div class="page-header-pages">
    		<div class="container">
    			<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    		</div>
    		<div class="page-header-pages-image">
    			<img width="" height="" src="<?php if(get_field('header_bg')) : echo get_field('header_bg'); else: echo site_url().'/wp-content/uploads/2015/10/04d_121-training_JR_02.jpg'; endif; ?>">
    		</div>
    		<div class="page-header-pages-content">
    			<div class="page-header-pages-content-mask"></div>
    			<div class="container">
    				<h1 style="text-align:center;">
    					<?php if(get_field('header_title_icon')) : ?>
    						<img src="<?php echo get_field('header_title_icon'); ?>"> 
    					<?php else: echo get_the_title(); endif; ?>
    					<?php if(get_field('header_content')) : ?><span><?php echo get_field('header_content'); ?></span><?php endif; ?>
    				</h1>
    			</div>
    		</div>
    	</div><!-- page-header-pages END -->

		<div class="section-all-row">
			<div class="container">

				<div class="oneonone-sec" data-aos="fade-up">
					<div class="row">
						<div class="col-md-8">
							<div class="imagecol-secc text-right">
								<div>
									<img src="<?php if(get_field('learn_the_basics_section_image')) : echo get_field('learn_the_basics_section_image'); else: echo site_url().'/wp-content/uploads/2015/10/04d_121-training_JR_05.jpg'; endif;?>" alt="image"/>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="imagecol-text">
								<div>
									<?php if(get_field('learn_the_basics_section_heading')) : echo get_field('learn_the_basics_section_heading');?>
									<?php else: ?>Learn the basics<?php endif; ?>
								</div>
								<?php if(get_field('learn_the_basics_section_content')) : ?>
										<p><?php echo get_field('learn_the_basics_section_content'); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="oneonone-sec" data-aos="fade-up">
					<div class="row">
						<div class="col-md-8 indesktopnone">
							<div class="imagecol-secc secondth text-left">
								<div>
									<img src="<?php if(get_field('learn_the_basics_section_image')) : echo get_field('learn_the_basics_section_image'); else: echo site_url().'/wp-content/uploads/2015/10/04d_121-training_JR_07.jpg'; endif;?>" alt="image"/>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="imagecol-text">
								<div>
									<?php if(get_field('extra_support_section_heading')) : echo get_field('extra_support_section_heading'); ?>
									<?php else: ?>Extra Support<?php endif; ?>
								</div>
								<?php if(get_field('extra_support_section_content')) : ?>
									<p><?php echo get_field('extra_support_section_content'); ?></p>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-md-8 inmobilenone">
							<div class="imagecol-secc secondth text-left">
								<div>
									<img src="<?php if(get_field('learn_the_basics_section_image')) : echo get_field('learn_the_basics_section_image'); else: echo site_url().'/wp-content/uploads/2015/10/04d_121-training_JR_07.jpg'; endif;?>" alt="image"/>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="oneonone-sec" data-aos="fade-up">
					<div class="row">
						<div class="col-md-8">
							<div class="imagecol-secc text-right">
								<div>
									<img src="<?php if(get_field('achive_dreams_section_image')) : echo get_field('achive_dreams_section_image'); else: echo site_url().'/wp-content/uploads/2015/10/04d_121-training_JR_09.jpg'; endif; ?>" alt="image"/>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="imagecol-text">
								<div>
									<?php if(get_field('achive_dreams_section_heading')) : echo get_field('achive_dreams_section_heading'); ?>
									<?php else: ?>Achive Dreams<?php endif; ?>
								</div>
								<?php if(get_field('achive_dreams_section_content')) : ?>
									<p><?php echo get_field('achive_dreams_section_content'); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div><!-- section-all-row END -->

		<div class="section-all-row">
			<div class="container">
				<div class="checkoutheading" data-aos="fade-up">
					<?php if(get_field('who_provides_the_1-on-_coaching_heading')) : ?>
						<h3 class="hedline-txt"><?php echo get_field('who_provides_the_1-on-_coaching_heading'); ?></h3>
					<?php else: ?>Who provides The 1-on-1 Coaching<?php endif; ?>
					<?php if(get_field('who_provides_the_1-on-_coaching_content', false, false)) : ?>
						<p class="desc-txt desc-txt-sm"><?php echo get_field('who_provides_the_1-on-_coaching_content', false, false); ?></p>
					<?php endif; ?>
				</div>
				<div class="clearfix"></div>

				<div class="author-comment-section" data-aos="fade-up">
					<div class="container">
						<?php 
							$coach_testimonail = array(
								'post_type' => 'coaching_testimonial',
								'post_status' => 'publish',
								'posts_per_page' =>10
								);
							$get_coach_testi = new Wp_query($coach_testimonail);
						?>
						<div class="commenticon-tp">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/comment.png" alt="icon"/>
						</div>
						<div class="author-commentcarousel carousel slide" id="testimonialslide">
							<div class="carousel-inner">
								<?php if($get_coach_testi->have_posts()) : $counter =1; while($get_coach_testi->have_posts()) : $get_coach_testi->the_post(); ?>
									<div class="item <?php if($counter == 1): echo 'active'; endif; ?>">
										<div class="author-commentcarousel-col">
											<div class="author-commentcarousel-left">
												<div class="coach-author-image">												
													<img src="<?php the_post_thumbnail_url(); ?>" alt="icon"/>
												</div>
												<div class="coach-about-nm">
													<div><?php the_title(); ?></div>
													<?php if(get_field('coaches_position_name')) : ?>
														<span><?php echo get_field('coaches_position_name'); ?></span>
													<?php endif; ?>
												</div>
											</div>
											<div class="author-commentcarousel-right">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
								<?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
							</div>
							<?php $total_testi = $get_coach_testi->post_count; $slide=1; ?>
							<ol class="carousel-indicators">
								<?php for( $i=0; $i<=$total_testi-1; $i++ ) { ?>
							   		<li data-target="#testimonialslide" data-slide-to="<?php echo $i; ?>" class="<?php if($slide ==1 ) : echo 'active'; endif; ?>"></li>							    
							   	<?php $slide++; } ?>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div><!-- section-all-row END -->


		<div class="footerabove-section" data-aos="fade-up">
			<div class="container">
				<h3 class="postcode-text">
					<?php if(get_field('contact_us_to_discuss_heading')) : ?>
						<?php echo get_field('contact_us_to_discuss_heading'); ?>
					<?php else: ?>Contact us to discuss a programme for your child:<?php endif; ?></h3>
				<?php if(get_field('contact_us_to_discuss_number')) : ?><div class="phnoshow"><?php echo get_field('contact_us_to_discuss_number'); ?></div><?php endif; ?>
				<div class="clearfix"></div>

				<div class="text-center">
					<div class="btn btn-primary open-london">
						<a href="<?php echo get_site_url()?>/contact-us">
							<?php if(get_field('contact_us_to_discuss_button_text')) : ?>
								<?php echo get_field('contact_us_to_discuss_button_text'); ?>
							<?php else: ?>Send a message about 1on1 coaching
							<?php endif; ?>
						</a>
					</div>
				</div>
			</div>
		</div><!-- "footerabove-section END -->
    </main><!-- .site-main -->
  </div><!-- .content-area -->



<?php get_footer(); ?>
