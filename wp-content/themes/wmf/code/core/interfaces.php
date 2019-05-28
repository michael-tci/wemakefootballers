<?php 
/**
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
**/

interface interfaceCore{

  public function load();
  public function render();

}

interface interfaceTemplate extends interfaceCore{
  public function load();
  public function render();
}

?>