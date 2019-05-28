<?php 
/**
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
**/

if ( !class_exists('template') )
{
  class template extends core implements interfaceTemplate
  {
    private $layout = 'tpl.layouts.default';
    private $_header = '';
    private $_content = '';
    private $_footer = '';
    private $args;
    
    public function instance(){
      return $this;
    }

    public function set($name, $value){
      $this->{$name} = $value;
    }

    public function get($name){
      return $this->{$name};
    }

    public function getContent(){
      $this->including($this->_content);
    }

    public function getLayout(){
      return str_replace('.', '/', $this->layout).'.php';
    }

    public function getData(){
      return $this->args;
    }

    public function including($file){
      if ( !empty($file) AND file_exists(locate_template($file)) )
      {
        include locate_template($file);
      }
    }

    public function render($args = array()){
      if ( !empty($args) )
      {
        $this->args = $args;
        if ( is_array($args) AND count($args) AND !empty($this->args['tpl']) )
        {
          $this->set('_content', $this->args['tpl']);
          $this->including($this->getLayout());
        }
      }
    }

  }
}

?>