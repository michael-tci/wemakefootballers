<?php 
/**
*   Theme Name: WMF
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
*   Text Domain: akali
**/

if ( !class_exists('htmlHelper') )
{
  class htmlHelper
  {

    public function options($items = array(), $selected = array()){
      $output = '';
      if ( is_array($items) AND count($items) )
      {
        foreach ($items as $item)
        {
          $output .= sprintf('<option value="%s" %s>%s</option>',
            $item, 
            ( ( is_array($selected) AND in_array($item, $selected) ) ? 'selected="selected"' : '' ),
            strtoupper($item)
          );
        }
      }
      return $output;
    }
    
  }
}

?>