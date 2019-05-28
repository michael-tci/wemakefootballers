<?php 
$options = $this->getData();
$options = ( !empty($options['datas']) AND !empty($options['datas']['social']) ) ? $options['datas']['social'] : array();
?>
<form action="<?php echo admin_url('admin.php?page=gss-setting-social')?>" method="post" class="form-horizontal" >
  <div class="panel">
    <div class="panel-heading text-uppercase"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Setting Social</div>
    <div class="panel-body">
      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <select name="select-social" id="select-social" class="select-2 form-control is-socials" multiple="multiple" data-placeholder="Select an Social" style="width:100%;">
            <?php echo $this->helper()->social()->renderOptions(array_keys($options)); ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <ul id="ul-select-social" class="list-group form-horizontal social-lists form-horizontal">
            <?php echo $this->helper()->social()->renderLists($options); ?>
          </ul>
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