<?php

if( !function_exists('pagination') ) :
function gss_pagination($wp_query_custom = NULL, $range = 2) {
  if( !isset($wp_query_custom) || empty($wp_query_custom) ) {
    global $wp_query;
  } else {
    $wp_query = $wp_query_custom;
  }
  $paged = $wp_query->paged;
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : $paged;
  $paged = ( get_query_var('page') ) ? get_query_var('page') : $paged;
  $paged = $paged >= 1 ? $paged : 1;
  ?>
  <nav class="nav-pagination text-center">
    <ul class="pagination">
      <li class="<?php _e($paged == 1 ? ' disabled ' : '');?>">
        <a href="<?php _e( get_pagenum_link(intval( $paged == 1 ? 1 : ($paged - 1) )) ); ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php for ($i=1; $i <= $wp_query->max_num_pages; $i++) :?>
        <?php if( $i > $range && $i < $wp_query->max_num_pages - $range + 1 && ($paged - $range + 1 > $i || $i >= $paged + $range) ) : ?>
          <li class="disabled"><span>...</span></li>
          <?php continue; ?>
        <?php endif; ?>
        <li class="<?php _e($paged==$i?' active ':'');?>">
          <a href="<?php _e( get_pagenum_link(intval($i)) ); ?>"><?php _e($i); ?></a>
        </li>
      <?php endfor; ?>
      <li class="<?php _e($paged == $wp_query->max_num_pages ? ' disabled ' : '');?>">
        <a href="<?php _e( get_pagenum_link(intval($paged == $wp_query->max_num_pages ? $wp_query->max_num_pages : ($paged + 1) )) ); ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  <style type="text/css">
    .pagination .disabled + .disabled {
      display: none;
    }
  </style>
<?php }
endif;
