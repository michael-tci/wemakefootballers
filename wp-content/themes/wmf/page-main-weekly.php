
<?php
/**
 * Template Name: Main Weekly
 *
 */

get_header();
?>
	<div id="primary" class="content-area wmf-news">
		<div class="jsn-bootstrap3 container  wuc-main-weekly-traning wuc-weekly-text">
			<div id="JzoNUf" class="row" style="">
				<div class="wmf-col col-md-8 col-sm-7 col-xs-16 " data-aos="fade-right">
					<?php the_field('content_one'); ?>
				</div>
				<div class="wmf-col col-md-8 col-sm-9 col-xs-16" data-aos="fade-left" >
					<div class="wuc-main-iframe">
						<?php the_field('iframe_one',false); ?>
					</div>
				</div>

			</div>
		</div>
		
		<div class="jsn-bootstrap3 container" >
			<div id="HRdeMR" class="row text-center">
				<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">		
					<div class="jsn-bootstrap3 wr-element-container wr-element-text">
						<div class="jsn-bootstrap3 wr-element-container wr-element-button wuc-main-popFreeTrial ">
							<div class="btn   btn-default " data-aos="fade-up">
		  						<a href="javascript:void(0);" id="generate">
									<?php _e('Book A Free Session','wmf'); ?>								
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="jsn-bootstrap3 container" data-aos="fade-up">
			<div id="HRdeMR" class="row text-center">
				<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">		
					<div class="jsn-bootstrap3 wr-element-container wr-element-text" data-aos="fade-up">
						<div class="jsn-bootstrap3 wr-element-container wr-element-button wuc-main-weekyear wuc-weekly-text">
							<h2><?php the_field('title_two') ?></h2>
							<?php the_field('content_two') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php if(have_rows('brief_description_of_ways')) : $counter = 1; while(have_rows('brief_description_of_ways')) : the_row(); ?>
			<?php if( $counter %2 == 1 ) : ?>
				<div class="section-twocol section-twocol-full nobgandfull wuc-section-right" id="to_<?php echo $counter; ?>">
					<div class="section-twocol-table">
					  <div class="section-twocol-col section-twocol-col-image" data-aos="fade-right">
						<div class="section-twocol-col-imagebx">
							<?php $why_make_image = get_sub_field('why_make_image'); ?>
							<img src="<?php echo $why_make_image['url']; ?>" alt="<?php echo $why_make_image['alt']; ?>" />
						</div>
					  </div>
					  <div class="section-twocol-col section-twocol-col-content"  data-aos="fade-left">
						  <div class="contentoverlaythis rightset rightsetsidecont text-center">
								<div><?php the_sub_field('why_make_title'); ?></div>
								<p><?php the_sub_field('why_make_description') ?></p>
						  </div>
					  </div>
					</div>
				</div>
			<?php elseif( $counter %2 == 0): ?>
				<div class="section-twocol section-twocol-full nobgandfull wuc-section-left" id="to_<?php echo $counter; ?>">
					<div class="section-twocol-table">
						<div class="section-twocol-col section-twocol-col-image indesktopnone" data-aos="fade-left">
							<div class="section-twocol-col-imagebx">
								<?php $why_make_image = get_sub_field('why_make_image'); ?>
								<img src="<?php echo $why_make_image['url']; ?>" alt="<?php echo $why_make_image['alt']; ?>" />
							</div>
						  </div>
						<div class="section-twocol-col section-twocol-col-content"  data-aos="fade-right">
						  <div class="contentoverlaythis rightset text-center">
								<div><?php the_sub_field('why_make_title'); ?></div>
								<p><?php the_sub_field('why_make_description') ?></p>
						  </div>
						</div>
						  <div class="section-twocol-col section-twocol-col-image inmobilenone" data-aos="fade-left">
							<div class="section-twocol-col-imagebx">
								<?php $why_make_image = get_sub_field('why_make_image'); ?>
								<img src="<?php echo $why_make_image['url']; ?>" alt="<?php echo $why_make_image['alt']; ?>" />
							</div>
						  </div>
					</div>
				</div>
		<?php endif; ?>

	  <?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
	
		<div class="jsn-bootstrap3 container" data-aos="fade-up">
			<div id="HRdeMR" class="row text-center">
				<div class="wmf-col col-md-16 col-sm-16 col-xs-16 ">		
					<div class="jsn-bootstrap3 wr-element-container wr-element-text" data-aos="fade-up">
						<div class="jsn-bootstrap3 wr-element-container wr-element-button wuc-main-outdoors-training">
							<h2><?php the_field('title_outdoors_training') ?></h2>
							<?php the_field('content_outdoors_training') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="section-twocol section-twocol-full nobgandfull wuc-section-start">
			<div class="section-twocol-table section-twocol-table coach-children">
			  <div class="section-twocol-col section-twocol-col-image" data-aos="fade-right">
				<div class="section-twocol-col-imagebx">
					<?php $image_start_here = get_field('image_start_here'); ?>
					<img src="<?php echo $image_start_here['url']; ?>" alt="<?php echo $image_start_here['alt']; ?>" />
				</div>
			  </div>
			  <div class="section-twocol-col section-twocol-col-content"  data-aos="fade-left">
				  <div class="contentoverlaythis rightsetsidecont wuc-rightsetsidecont">
						<div><?php the_field('content_start_her'); ?></div>
				  </div>
			  </div>
			</div>
		</div>
		
	</div>
<?php
get_footer();?>