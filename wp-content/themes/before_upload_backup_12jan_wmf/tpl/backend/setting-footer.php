<?php 
$options = $this->getData();
$options = !empty($options['datas']) ? $options['datas'] : '';
?>
<div class="panel">
  <div class="panel-heading"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Setting Footer</div>
  <div class="panel-body">
    <form action="<?php echo admin_url('admin.php?page=gss-setting-footer')?>" method="post" class="form-horizontal" >
      <div class="form-group">
        <label for="logo" class="col-sm-2 control-label">Logo</label>
        <div class="col-sm-10">
          <div class="block-upload-media">
            <input type="text" name="gsstheme_setting_footer_logo" id="logo" class="regular-text upload-via-media" value="<?php echo ( !empty($options) AND is_array($options) AND !empty($options['gsstheme_setting_footer_logo']) ) ? $options['gsstheme_setting_footer_logo'] : '' ?>">
            <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
            <div class="block-upload-media-main"></div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="content" class="col-sm-2 control-label">Content</label>
        <div class="col-sm-10">
          <div class="block-upload-media">
            <textarea name="gsstheme_setting_footer_content" id="content" class="form-control" rows="3"><?php echo ( !empty($options) AND is_array($options) AND !empty($options['gsstheme_setting_footer_content']) ) ? $options['gsstheme_setting_footer_content'] : '' ?></textarea>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary btn-save-upload-via-media" data-loading-text="<span class='glyphicon glyphicon-refresh fa-spin' aria-hidden='true'></span> Loading..."><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Save setting</button>
        </div>
      </div>
    </form>
  </div>
</div>