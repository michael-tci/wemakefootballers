<?php 
$options = $this->getData();
$options = ( !empty($options['datas']) AND !empty($options['datas']['general']) ) ? $options['datas']['general'] : array();

$bg_color = ( isset($options['settings']) AND isset($options['settings']['body']) AND isset($options['settings']['body']['background-color']) ) ? $options['settings']['body']['background-color'] : '';
$bg_img = ( isset($options['settings']) AND isset($options['settings']['body']) AND isset($options['settings']['body']['background-image']) ) ? $options['settings']['body']['background-image'] : '';
$bg_repeat = ( isset($options['settings']) AND isset($options['settings']['body']) AND isset($options['settings']['body']['background-repeat']) ) ? $options['settings']['body']['background-repeat'] : '';
$bg_size = ( isset($options['settings']) AND isset($options['settings']['body']) AND isset($options['settings']['body']['background-size']) ) ? $options['settings']['body']['background-size'] : '';
$bg_position = ( isset($options['settings']) AND isset($options['settings']['body']) AND isset($options['settings']['body']['background-position']) ) ? $options['settings']['body']['background-position'] : '';
$body_size = ( isset($options['settings']) AND isset($options['settings']['body']) AND isset($options['settings']['body']['size']) ) ? $options['settings']['body']['size'] : '';
$body_color = ( isset($options['settings']) AND isset($options['settings']['body']) AND isset($options['settings']['body']['color']) ) ? $options['settings']['body']['color'] : '';
$h1_size = ( isset($options['settings']) AND isset($options['settings']['h1']) AND isset($options['settings']['h1']['size']) ) ? $options['settings']['h1']['size'] : '';
$h1_color = ( isset($options['settings']) AND isset($options['settings']['h1']) AND isset($options['settings']['h1']['color']) ) ? $options['settings']['h1']['color'] : '';
$h2_size = ( isset($options['settings']) AND isset($options['settings']['h2']) AND isset($options['settings']['h2']['size']) ) ? $options['settings']['h2']['size'] : '';
$h2_color = ( isset($options['settings']) AND isset($options['settings']['h2']) AND isset($options['settings']['h2']['color']) ) ? $options['settings']['h2']['color'] : '';
$h3_size = ( isset($options['settings']) AND isset($options['settings']['h3']) AND isset($options['settings']['h3']['size']) ) ? $options['settings']['h3']['size'] : '';
$h3_color = ( isset($options['settings']) AND isset($options['settings']['h3']) AND isset($options['settings']['h3']['color']) ) ? $options['settings']['h3']['color'] : '';
$h4_size = ( isset($options['settings']) AND isset($options['settings']['h4']) AND isset($options['settings']['h4']['size']) ) ? $options['settings']['h4']['size'] : '';
$h4_color = ( isset($options['settings']) AND isset($options['settings']['h4']) AND isset($options['settings']['h4']['color']) ) ? $options['settings']['h4']['color'] : '';
$h5_size = ( isset($options['settings']) AND isset($options['settings']['h5']) AND isset($options['settings']['h5']['size']) ) ? $options['settings']['h5']['size'] : '';
$h5_color = ( isset($options['settings']) AND isset($options['settings']['h5']) AND isset($options['settings']['h5']['color']) ) ? $options['settings']['h5']['color'] : '';
$h6_size = ( isset($options['settings']) AND isset($options['settings']['h6']) AND isset($options['settings']['h6']['size']) ) ? $options['settings']['h6']['size'] : '';
$h6_color = ( isset($options['settings']) AND isset($options['settings']['h6']) AND isset($options['settings']['h6']['color']) ) ? $options['settings']['h6']['color'] : '';

$custom_css = ( isset($options['custom']) AND isset($options['custom']['css']) ) ? $options['custom']['css'] : '';

?>
<form action="<?php echo admin_url('admin.php?page=gss-theme-setting')?>" method="post" class="" >
  <div class="panel">
    <div class="panel-heading"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> General</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="">Body background color</label>
            <input type="text" class="form-control" id="general-body-background-color" name="general[settings][body][background-color]" value="<?php echo $bg_color?>">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
          <div class="form-group">
            <label for="">Body background image</label>
            <div class="block-upload-media">
              <input type="text" class="regular-text upload-via-media" id="general-body-background-image" name="general[settings][body][background-image]" value="<?php echo $bg_img?>">
              <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="">Body background repeat</label>
            <input type="text" class="form-control" id="general-body-background-color" name="general[settings][body][background-repeat]" value="<?php echo $bg_repeat?>">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="">Body background size</label>
            <input type="text" class="form-control" id="general-body-background-color" name="general[settings][body][background-size]" value="<?php echo $bg_size?>">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="">Body background position</label>
            <input type="text" class="form-control" id="general-body-background-color" name="general[settings][body][background-position]" value="<?php echo $bg_position?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
          <div class="form-group">
            <label for="general-font-size">Body text size</label>
            <input type="text" class="form-control" id="general-font-size" name="general[settings][body][size]" value="<?php echo $body_size?>">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
          <div class="form-group">
            <label for="general-color">Body text color</label>
            <input type="text" class="form-control" id="general-color" name="general[settings][body][color]" value="<?php echo $body_color?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="form-inline">
            <div class="form-group">
              <label for="general-h1-size">H1 Size</label>
              <input type="text" class="form-control" id="general-h1-size" name="general[settings][h1][size]" value="<?php echo $h1_size?>">
            </div>
            <div class="form-group">
              <label for="general-h1-color">H1 Color</label>
              <input type="text" class="form-control" id="general-h1-color" name="general[settings][h1][color]" value="<?php echo $h1_color?>">
            </div>
          </div>
        </div>
      </div>
      <div class="form-inline">
        <div class="form-group">
          <label for="general-h2-size">H2 Size</label>
          <input type="text" class="form-control" id="general-h2-size" name="general[settings][h2][size]" value="<?php echo $h2_size?>">
        </div>
        <div class="form-group">
          <label for="general-h2-color">h2 Color</label>
          <input type="text" class="form-control" id="general-h2-color" name="general[settings][h2][color]" value="<?php echo $h2_color?>">
        </div>
      </div>
      <div class="form-inline">
        <div class="form-group">
          <label for="general-h3-size">h3 Size</label>
          <input type="text" class="form-control" id="general-h3-size" name="general[settings][h3][size]" value="<?php echo $h3_size?>">
        </div>
        <div class="form-group">
          <label for="general-h3-color">h3 Color</label>
          <input type="text" class="form-control" id="general-h3-color" name="general[settings][h3][color]" value="<?php echo $h3_color?>">
        </div>
      </div>
      <div class="form-inline">
        <div class="form-group">
          <label for="general-h4-size">h4 Size</label>
          <input type="text" class="form-control" id="general-h4-size" name="general[settings][h4][size]" value="<?php echo $h4_size?>">
        </div>
        <div class="form-group">
          <label for="general-h4-color">h4 Color</label>
          <input type="text" class="form-control" id="general-h4-color" name="general[settings][h4][color]" value="<?php echo $h4_color?>">
        </div>
      </div>
      <div class="form-inline">
        <div class="form-group">
          <label for="general-h5-size">h5 Size</label>
          <input type="text" class="form-control" id="general-h5-size" name="general[settings][h5][size]" value="<?php echo $h5_size?>">
        </div>
        <div class="form-group">
          <label for="general-h5-color">h5 Color</label>
          <input type="text" class="form-control" id="general-h5-color" name="general[settings][h5][color]" value="<?php echo $h5_color?>">
        </div>
      </div>
      <div class="form-inline">
        <div class="form-group">
          <label for="general-h6-size">h6 Size</label>
          <input type="text" class="form-control" id="general-h6-size" name="general[settings][h6][size]" value="<?php echo $h6_size?>">
        </div>
        <div class="form-group">
          <label for="general-h6-color">h6 Color</label>
          <input type="text" class="form-control" id="general-h6-color" name="general[settings][h6][color]" value="<?php echo $h6_color?>">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="form-group">
            <label for="general-custom-css">Custom css</label>
            <textarea class="form-control" id="general-custom-css" rows="5" name="general[custom][css]"><?php echo $custom_css?></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <button type="submit" class="btn btn-primary btn-save-upload-via-media" data-loading-text="<span class='glyphicon glyphicon-refresh fa-spin' aria-hidden='true'></span> Loading..."><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Save setting</button>
    </div>
  </div>
</form>