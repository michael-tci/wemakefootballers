<?php 
$options = $this->getData();
$options = !empty($options['datas']) ? $options['datas'] : '';
?>
<form action="<?php echo admin_url('admin.php?page=gss-setting-header')?>" method="post" class="form-horizontal" >
  <div class="panel">
    <div class="panel-heading text-uppercase"><span class="glyphicon glyphicon-header" aria-hidden="true"></span> Setting Header</div>
    <div class="panel-body">
      <div class="form-group">
        <label for="logo" class="col-sm-2 control-label">Logo</label>
        <div class="col-sm-10">
          <div class="block-upload-media">
            <input type="text" name="gsstheme_setting_logo" id="logo" class="regular-text upload-via-media" value="<?php echo ( !empty($options) AND is_array($options) AND !empty($options['gsstheme_setting_logo']) ) ? $options['gsstheme_setting_logo'] : '' ?>">
            <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
            <div class="block-upload-media-main"></div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="favicon" class="col-sm-2 control-label">Favicon</label>
        <div class="col-sm-10">
          <div class="block-upload-media">
            <input type="text" name="gsstheme_setting_favicon" id="favicon" class="regular-text upload-via-media" value="<?php echo ( !empty($options) AND is_array($options) AND !empty($options['gsstheme_setting_favicon']) ) ? $options['gsstheme_setting_favicon'] : '' ?>">
            <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
            <div class="block-upload-media-main"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
        <div class="form-group form-group-remove-margin-bottom">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-save-upload-via-media" data-loading-text="<span class='glyphicon glyphicon-refresh fa-spin' aria-hidden='true'></span> Loading..."><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Save setting</button>
          </div>
        </div>
      </div>
  </div>
</form>