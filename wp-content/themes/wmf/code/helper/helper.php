<?php 
/**
*   Theme Name: WMF
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
*   Text Domain: akali
**/
if ( !class_exists('gssHelper') )
{
  class gssHelper
  {

    protected $_html;

    public function __construct(){
    }

    public function social(){
      locate_template('code/helper/social.php', true, true);
      return new socialHelper();
    }
    
  }
}

?>