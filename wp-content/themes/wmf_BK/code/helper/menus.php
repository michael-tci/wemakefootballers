<?php
/**
*   Theme Name: WMF
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
*   Text Domain: akali
**/
if ( !class_exists('menusHelper') )
{
  class menusHelper extends Walker_Nav_Menu {
      /**
  	 * Start the element output.
  	 *
  	 * @see Walker::start_el()
  	 *
  	 * @since 3.0.0
  	 *
  	 * @param string $output Passed by reference. Used to append additional content.
  	 * @param object $item   Menu item data object.
  	 * @param int    $depth  Depth of menu item. Used for padding.
  	 * @param array  $args   An array of arguments. @see wp_nav_menu()
  	 * @param int    $id     Current item ID.
  	 */
  	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

  		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
  		$classes[] = 'menu-item-' . $item->ID;

  		/**
  		 * Filter the CSS class(es) applied to a menu item's list item element.
  		 *
  		 * @since 3.0.0
  		 * @since 4.1.0 The `$depth` parameter was added.
  		 *
  		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
  		 * @param object $item    The current menu item.
  		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
  		 * @param int    $depth   Depth of menu item. Used for padding.
  		 */
  		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
  		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

  		/**
  		 * Filter the ID applied to a menu item's list item element.
  		 *
  		 * @since 3.0.1
  		 * @since 4.1.0 The `$depth` parameter was added.
  		 *
  		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
  		 * @param object $item    The current menu item.
  		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
  		 * @param int    $depth   Depth of menu item. Used for padding.
  		 */
  		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
  		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

  		$output .= $indent . '<li' . $id . $class_names .'>';

  		$atts = array();
  		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
  		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
  		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
  		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

  		/**
  		 * Filter the HTML attributes applied to a menu item's anchor element.
  		 *
  		 * @since 3.6.0
  		 * @since 4.1.0 The `$depth` parameter was added.
  		 *
  		 * @param array $atts {
  		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
  		 *
  		 *     @type string $title  Title attribute.
  		 *     @type string $target Target attribute.
  		 *     @type string $rel    The rel attribute.
  		 *     @type string $href   The href attribute.
  		 * }
  		 * @param object $item  The current menu item.
  		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
  		 * @param int    $depth Depth of menu item. Used for padding.
  		 */
  		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

  		$attributes = '';
  		foreach ( $atts as $attr => $value ) {
  			if ( ! empty( $value ) ) {
  				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
  				$attributes .= ' ' . $attr . '="' . $value . '"';
  			}
  		}

  		$item_output = $args->before;

      /*
       * Glyphicons
       * ===========
       * Since the the menu item is NOT a Divider or Header we check the see
       * if there is a value in the attr_title property. If the attr_title
       * property is NOT null we apply it as the class name for the glyphicon.
       */
      if ( ! empty( $item->attr_title ) ) {
        $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
      }
      else {
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      }

  		// $item_output .= '<a'. $attributes .'>';
  		/** This filter is documented in wp-includes/post-template.php */
  		// $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
  		$item_output .= '</a>';
  		$item_output .= $args->after;

  		/**
  		 * Filter a menu item's starting output.
  		 *
  		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
  		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
  		 * no filter for modifying the opening and closing `<li>` for a menu item.
  		 *
  		 * @since 3.0.0
  		 *
  		 * @param string $item_output The menu item's starting HTML output.
  		 * @param object $item        Menu item data object.
  		 * @param int    $depth       Depth of menu item. Used for padding.
  		 * @param array  $args        An array of {@see wp_nav_menu()} arguments.
  		 */
  		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  	}
  }
  class menusHelper_test extends Walker_Nav_Menu {

    /**
    * Phương thức start_lvl()
    * Được sử dụng để hiển thị các thẻ bắt đầu cấu trúc của một cấp độ mới trong menu. (ví dụ: <ul class="sub-menu">)
    * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
    * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
    * @param array $args | Các tham số trong hàm wp_nav_menu()
    **/
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul role=\"menu\" class=\"sub-menu dropdown-menu\">\n";
    }

    /**
    * Phương thức end_lvl()
    * Được sử dụng để hiển thị đoạn kết thúc của một cấp độ mới trong menu. (ví dụ: </ul> )
    * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
    * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
    * @param array $args | Các tham số trong hàm wp_nav_menu()
    **/
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "$indent</ul>\n";
    }

    /**
    * Phương thức start_el()
    * Được sử dụng để hiển thị đoạn bắt đầu của một phần tử trong menu. (ví dụ: <li id="menu-item-5"> )
    * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
    * @param string $item | Dữ liệu của các phần tử trong menu
    * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
    * @param array $args | Các tham số trong hàm wp_nav_menu()
    * @param interger $id | ID của phần tử hiện tại
    **/
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

      $class_names = $value = '';

      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;

      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

      // if ( isset($args->has_children) && $args->has_children )
      //   $class_names .= ' dropdown';

      // if ( in_array( 'menu-item-has-children', $classes ) )
      //   $class_names .= ' dropdown-menu';

      if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-parent', $classes ) || in_array( 'current-menu-ancestor', $classes ))
        $class_names .= ' active';


      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

      $output .= $indent . '<li' . $id . $class_names .'>';

      $atts = array();
      $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
      $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
      $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
      $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

      $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

      $attributes = '';
      foreach ( $atts as $attr => $value ) {
        if ( ! empty( $value ) ) {
          $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
          $attributes .= ' ' . $attr . '="' . $value . '"';
        }
      }

      $item_output = $args->before;



      /*
       * Glyphicons
       * ===========
       * Since the the menu item is NOT a Divider or Header we check the see
       * if there is a value in the attr_title property. If the attr_title
       * property is NOT null we apply it as the class name for the glyphicon.
       */
      if ( ! empty( $item->attr_title ) ) {
        $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
      }
      else {
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      }

      // $item_output .= ( in_array( 'menu-item-has-children', $classes ) ) ? ' <span class="caret"></span></a>':'</a>';
      $item_output .= '</a>';
      $item_output .= $args->after;
      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    /**
    * Phương thức end_el()
    * Được sử dụng để hiển thị đoạn kết thúc của một phần tử trong menu. (ví dụ: </li> )
    * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
    * @param string $item | Dữ liệu của các phần tử trong menu
    * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
    * @param array $args | Các tham số trong hàm wp_nav_menu()
    * @param interger $id | ID của phần tử hiện tại
    **/
    public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $output .= "</li>\n";
    }
  }
}
