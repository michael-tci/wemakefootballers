<?php
load_template(locate_template('code/core/interfaces.php'));
if ( !class_exists('core') )
{
  /**
   * Core
   */
  class core
  {

    private $template;
    /**
     * [template description]
     * @return [type] [description]
     */
    public function template() {
      get_template_part('code/core/template', 'template');
      $this->template = new template();
      return $this->template;
    }

    /**
     * [load description]
     * @param  string  $file         [description]
     * @param  boolean $load         [description]
     * @param  boolean $require_once [description]
     * @return [type]                [description]
     */
    public function load($file = '', $load = true, $require_once= true){
      if ( !empty($file) AND file_exists(locate_template($file)) ){
        locate_template($file, $load, $require_once);
      }
    }

    /**
     * [helper description]
     * @param  string $file    [description]
     * @param  string $clsName [description]
     * @return [type]          [description]
     */
    public function helper($file='helper', $clsName = 'gssHelper'){
      $this->load(sprintf('code/helper/%s',$file).'.php');
      if ( class_exists($clsName) ) {
        return new $clsName;
      } else {
        return new stdClass();
      }
    }

  }
}
?>
