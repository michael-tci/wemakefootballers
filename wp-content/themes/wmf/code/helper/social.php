<?php 
/**
*   Theme Name: WMF
*   @author: GSS
*   @author URI: http://gsmartsolutions.com
*   Description:
*   Version: 1.0
*   Text Domain: akali
**/

if ( !class_exists('socialHelper') )
{
  class socialHelper
  {
    
    protected $_socials = array('facebook', 'instagram', 'twitter');

    public function renderOptions($selected = array()){
      return $this->options($this->_socials, $selected);
    }

    public function renderLists($datas = array()){
      $output = '';
      if ( !empty($datas) AND is_array($datas) AND count($datas) )
      {
        foreach ($datas as $key => $data)
        {
          $output .= $this->renderItem($key, $data);
        }
      }
      return $output;
    }

    public function renderItem($name, $value){
      if ( !empty($name) AND !empty($value) )
      {
        return '<li id="li-'.$name.'" class="list-group-item">'
          .'<div class="form-group form-group-remove-margin-bottom">'
            .'<label class="col-sm-2 control-label">'.$name.'</label>'
            .'<div class="col-sm-10">'
              .'<input type="text" name="social['.$name.']" class="form-control" id="link-'.$name.'" value="'.$value.'" placeholder="Link to social">'
            .'</div>'
          .'</div>'
        .'</li>';
      }
    }

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