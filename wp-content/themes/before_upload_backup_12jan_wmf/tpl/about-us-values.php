<?php
/*
Template Name: about-us-values
*/

get_header(); ?>


  	<div class="section-all-row heaerprttp">
	  	<div class="container">
	  		<div class="text-center">
	  			<div class="iconof-pgtitle"><img src="<?php if(get_field('our_value_top_icon')) : echo get_field('our_value_top_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/safety-passion-development-icon.png'; endif; ?>" alt="icon"></div>
	  			<h2 class="pagetitlename"><?php if(get_field('our_value_heading')) : echo get_field('our_value_heading'); else: echo get_the_title(); endif; ?></h2>
	  			<p><?php the_field('our_value_description'); ?></p>
	  		</div>
	  	</div>
	</div><!-- section-all-row END -->
	<div class="our-value-section">
		<div class="container">
			
				<div class="col-sm-4section">
					<div class="sectioncolsm-image"><?php if( get_field('safety_bg')) :?><img src="<?php echo get_field('safety_bg'); ?>"/><?php endif; ?></div>
					<div class="our-value-inner safety">
						<a href="#safetypart" id="safetylink"></a>
						<img src="<?php if(get_field('safety_icon')) : echo get_field('safety_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/safety-icon.png'; endif; ?>" alt="icon"/>
						<h3><?php the_field('safety_name'); ?></h3>
					</div>
				</div>
				<div class="col-sm-4section">
					<div class="sectioncolsm-image"><?php if(get_field('passion_bg')) : ?><img src="<?php echo get_field('passion_bg'); ?>"/><?php endif; ?></div>
					<div class="our-value-inner passion">
						<a href="#passionpart" id="passionlink"></a>
						<img src="<?php if(get_field('passion_icon')) : echo get_field('passion_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/safety-icon.png'; endif; ?>" alt="icon"/>
						<h3><?php the_field('passion_name'); ?></h3>
					</div>
				</div>
				<div class="col-sm-4section">
					<div class="sectioncolsm-image"><?php if( get_field('development_bg')) : ?><img src="<?php echo get_field('development_bg'); ?>"/><?php endif; ?></div>
					<div class="our-value-inner devlop">
						<a href="#developmentpart" id="developlink"></a>
						<img src="<?php if(get_field('development_icon')) : echo get_field('development_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/safety-icon.png'; endif; ?>" alt="icon"/>
						<h3><?php the_field('development_name'); ?></h3>
					</div>
				</div>
			


			<div class="clearfix"></div>
			<div class="text-center">
				<div class="btn btn-primary">
					<a href="<?php if(get_field('implement_button_link')) : echo get_field('implement_button_link'); else: echo site_url(); endif; ?>">
						<?php if(get_field('implement_button_text')) : echo get_field('implement_button_text'); else : echo 'BOOK A FREE TRAINING SESSION'; endif; ?>					
					</a>
				</div>
			</div>
		</div>
	</div><!-- our-value-section END -->
	<div class="section-all-row heaerprttp linepartanim sectiondevicelineups" id="safetypart">
		<div class="container">
			<h3 class="aboutsession-titlese"><?php the_field('safety_name'); ?></h3>			
			<?php if(have_rows('safety_points')) : $counter =1 ; while(have_rows('safety_points')) : the_row(); ?>					
				<?php if( $counter == 1 ) : ?>
					<div class="animation-draw-sec" id="safetypart_1">
						<div class="animation-draw-sec-inset">							
							<div class="top-left-line"></div>
							<div class="bottom-left-right-line"></div>
							<div class="bottom-right-line"></div>
							<div class="animation-draw-sec-icon">
								<img src="<?php if(get_sub_field('safety_point_icon')) : echo get_sub_field('safety_point_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/policies-icon.png'; endif; ?>" alt="icon"/>
							</div>
							<div class="animation-draw-content paddtop20"><?php the_sub_field('safety_point_content'); ?></div>
						</div>
					</div>
				<?php elseif( $counter == 2 ): ?>
					<div class="animation-draw-sec animright">
						<div class="animation-draw-sec-inset">
							<div class="revercethis">
								<div class="top-left-line"></div>
								<div class="bottom-left-right-line"></div>
								<div class="bottom-right-line"></div>
							</div>
							<div class="animation-draw-sec-icon">
								<img src="<?php if(get_sub_field('safety_point_icon')) : echo get_sub_field('safety_point_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/policies-icon.png'; endif; ?>" alt="icon"/>
							</div>
							<div class="animation-draw-content paddtop20"><?php the_sub_field('safety_point_content'); ?></div>
						</div>
					</div>
				<?php elseif( $counter == 3 ): ?>
					<div class="animation-draw-sec">
						<div class="animation-draw-sec-inset">
							<div class="left-bottom-left-line"></div>
							<div class="animation-draw-sec-icon">
								<img src="<?php if(get_sub_field('safety_point_icon')) : echo get_sub_field('safety_point_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/policies-icon.png'; endif; ?>" alt="icon"/>
							</div>
							<div class="animation-draw-content"><?php the_sub_field('safety_point_content'); ?></div>
						</div>
					</div>
				<?php endif; ?>
			<?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>	
	<div class="section-all-row heaerprttp linepartanim darkthemthispart sectiondevicelineups" id="passionpart">
		<div class="container">
			<h3 class="aboutsession-titlese"><?php the_field('passion_name'); ?></h3>
			<?php if(have_rows('pafety_points')) : $counter =1 ; while(have_rows('pafety_points')) : the_row(); ?>
				<?php if( $counter == 1 ) : ?>
					<div class="animation-draw-sec">
						<div class="animation-draw-sec-inset">
							<div class="top-left-line"></div>
							<div class="bottom-left-right-line"></div>
							<div class="bottom-right-line"></div>
							<div class="animation-draw-sec-icon">
								<img src="<?php if(get_sub_field('passion_point_icon')) : echo get_sub_field('passion_point_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/policies-icon.png'; endif; ?>" alt="icon"/>
							</div>
							<div class="animation-draw-content"><?php the_sub_field('pafety_point_content'); ?></div>
						</div>
					</div>
				<?php elseif( $counter == 2 ): ?>
					<div class="animation-draw-sec animright">
						<div class="animation-draw-sec-inset">
							<div class="revercethis">
								<div class="top-left-line"></div>
								<div class="bottom-left-right-line"></div>
								<div class="bottom-right-line"></div>
							</div>

							<div class="animation-draw-sec-icon">
								<img src="<?php if(get_sub_field('passion_point_icon')) : echo get_sub_field('passion_point_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/policies-icon.png'; endif; ?>" alt="icon"/>
							</div>
							<div class="animation-draw-content padding-top35"><?php the_sub_field('pafety_point_content'); ?></div>
						</div>
					</div>
				<?php elseif( $counter == 3 ): ?>
					<div class="animation-draw-sec paddig-left100">
						<div class="animation-draw-sec-inset">
							<div class="left-bottom-left-line-dotted"></div>
							<div class="top-right-left-line"></div>
							<div class="top-bottom-left-line"></div>

							<div class="animation-draw-sec-icon">
								<img src="<?php if(get_sub_field('passion_point_icon')) : echo get_sub_field('passion_point_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/policies-icon.png'; endif; ?>" alt="icon"/>
							</div>
							<div class="animation-draw-content paddtop20"><?php the_sub_field('pafety_point_content'); ?></div>
						</div>
					</div>
				<?php endif; ?>
			<?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div><!-- section-all-row END -->
	<div class="section-all-row heaerprttp linepartanim developmentparts sectiondevicelineups" id="developmentpart">
		<div class="container">
			<h3 class="aboutsession-titlese"><?php the_field('development_name'); ?></h3>
			<?php if(have_rows('development_points')) : $counter =1 ; while(have_rows('development_points')) : the_row(); ?>
				<?php if( $counter == 1 ) : ?>
					<div class="animation-draw-sec">
						<div class="animation-draw-sec-inset">
							<div class="top-left-line"></div>
							<div class="bottom-left-right-line"></div>
							<div class="bottom-right-line"></div>
							<div class="animation-draw-sec-icon">
								<img src="<?php if(get_sub_field('development_point_icon')) : echo get_sub_field('development_point_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/policies-icon.png'; endif; ?>" alt="icon"/>
							</div>
							<div class="animation-draw-content"><?php the_sub_field('development_point_content'); ?></div>
						</div>
					</div>
				<?php elseif( $counter == 2 ): ?>
					<div class="animation-draw-sec animright">
						<div class="animation-draw-sec-inset">
							<div class="animation-draw-sec-icon">
								<img src="<?php if(get_sub_field('development_point_icon')) : echo get_sub_field('development_point_icon'); else: echo site_url().'/wp-content/themes/wmf/assets/img/policies-icon.png'; endif; ?>" alt="icon"/>
							</div>
							<div class="animation-draw-content"><?php the_sub_field('development_point_content'); ?></div>
						</div>
					</div>
				<?php endif; ?>
			<?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div><!-- section-all-row END -->
	<div class="section-all-row heaerprttp">
		<div class="container">
			<div class="shehow-implement-title"><?php the_field('implement_heading', false, false); ?></div>
			<div class="clearfix"></div>
			<div class="text-center">
				<div class="btn btn-primary">
					<a href="<?php if(get_field('implement_button_link')) : echo get_field('implement_button_link'); else: echo site_url(); endif; ?>">
						<?php if(get_field('implement_button_text')) : echo get_field('implement_button_text'); else : echo 'BOOK A FREE TRAINING SESSION'; endif; ?>					
					</a>
				</div>
			</div>
		</div>
	</div><!-- section-all-row END -->

  	<div class="entry-content findnearest_academyanimbx">
	  <div class="jsn-bootstrap3 container">
	    <div class="row findnearest_academy">
	      <?php echo do_shortcode('[postcodesearch]'); ?>
	    </div>
	  </div>
	</div><!-- entry-content END -->
<script type="text/javascript">
	$(document).scroll(function(){
		when_visible();
	});
  function when_visible()
  {
  	//console.log($(document).scrollTop())
    var windowInnerHeight = window.innerHeight;
  	$(".linepartanim").each(function(key, value){
  		if(!$(this).hasClass('added'))
  		{
  			if($(document).scrollTop() + windowInnerHeight > $(this).offset().top + 200)
	  		{
	  			
	  			$(this).addClass('added');
	  		}
  		}
  		
  	})
    var windowHeight = $(document).height()
    var topposition = $("#safetypart_1").offset().top;
  }
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$('#safetylink, #passionlink, #developlink').on('click', function(event) {
		    var target = $(this.getAttribute('href'));
		    if( target.length ) {
		        event.preventDefault();
		        $('html, body').stop().animate({
		            scrollTop: target.offset().top - 55
		        }, 1000);
		    }
		});


	});
</script>
<?php get_footer(); ?>
