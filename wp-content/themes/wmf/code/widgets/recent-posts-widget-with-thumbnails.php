<?php
class sophie_la_girafe_Recent_Posts_Widget_With_Thumbnails extends \WP_Widget {

	var $plugin_slug;  // identifier of this plugin for WP
	var $plugin_version; // number of current plugin version
	var $number_posts;  // number of posts to show in the widget
	var $default_thumb_width;  // width of the thumbnail
	var $default_thumb_height; // height of the thumbnail

	function __construct() {
		$this->plugin_slug  = 'sophie-la-girafe-recent-posts-widget-with-thumbnails';
        parent::__construct(
            $this->plugin_slug, // Base ID
            esc_html__('Zo Recent Posts With Thumbnails', 'wmf'), // Name
            array('description' => esc_html__('List of your site&#8217;s most recent posts, with clickable title and thumbnails.', 'wmf'),) // Args
        );
		$this->plugin_version  = '2.3.1';
		$this->number_posts  = 2;
		$this->default_thumb_width  = 100;
		$this->default_thumb_height = 100;
	}

	function widget( $args, $instance ) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( $this->plugin_slug, 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args[ 'widget_id' ] ) ) {
			$args[ 'widget_id' ] = $this->id;
		}

		if ( isset( $cache[ $args[ 'widget_id' ] ] ) ) {
			echo do_shortcode($cache[ $args[ 'widget_id' ] ]);
			return;
		}

		ob_start();
		extract( $args );

		$number_posts		=  $this->number_posts;
		$thumb_width 		=  $this->default_thumb_width;
		$thumb_height 	= $this->default_thumb_height;

		$size 	= array( $thumb_width, $thumb_height );

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 1.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number_posts,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ( $r->have_posts()) :
		?>
		<?php echo do_shortcode($before_widget); ?>
		<ul>
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
				<div class="recent-thumb">
					<?php 
					$image_url = zo_image_resize(wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()))[0], $thumb_width, $thumb_height, true, true, true);
				  echo '<img alt="' . get_the_title() . '" class="attachment-featuredImageCropped" src="'. esc_url($image_url) .'">';
					?>
					<div class="recent-thumb-overlay"></div>
				</div>
				<div class="recent-detail">
				  <div class="zo-post-title">
				    <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a>
				  </div>
				  <div class="zo-post-readmore">
				    <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('View', 'wmf');?></a>
				  </div>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo do_shortcode($after_widget); ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args[ 'widget_id' ] ] = ob_get_flush();
			wp_cache_set( $this->plugin_slug, $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	function update( $new_widget_settings, $old_widget_settings ) {

	}

	function form( $instance ) {
	}

} 

/**
 * Register widget on init
 *
 * @since 1.0
 */
function sophie_la_girafe_register_recent_posts_widget_with_thumbnails () {
	register_widget('sophie_la_girafe_Recent_Posts_Widget_With_Thumbnails');
}
add_action('widgets_init', 'sophie_la_girafe_register_recent_posts_widget_with_thumbnails');
