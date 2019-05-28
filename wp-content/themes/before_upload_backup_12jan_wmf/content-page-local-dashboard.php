<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="container">
    <div class="row">
      <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
    </div>
  </header><!-- .entry-header -->

  <div class="entry-content" id="entry-content">
    <?php the_content(); ?>
    <?php
      wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ) );
    ?>
  </div><!-- .entry-content -->
</article><!-- #post-## -->
