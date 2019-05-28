<div class="wrapper-theme-setting">
  <div class="container-fluid">
    <div class="row gss-wrapper-layout">
      <div class="fix-width-150px">
        <div class="list-group navi-setting-theme-panel text-left" data-page="<?php echo !empty($_GET['page']) ? $_GET['page'] : 'gss-theme-setting'?>">
          <a class="list-group-item gss-theme-setting" href="<?php echo admin_url('admin.php?page=gss-theme-setting')?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> General</a>
          <a class="list-group-item gss-setting-header" href="<?php echo admin_url('admin.php?page=gss-setting-header')?>"><span class="glyphicon glyphicon-header" aria-hidden="true"></span> Header</a>
          <a class="list-group-item gss-setting-social" href="<?php echo admin_url('admin.php?page=gss-setting-social')?>"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Social</a>
          <a class="list-group-item gss-setting-footer" href="<?php echo admin_url('admin.php?page=gss-setting-footer')?>"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Footer</a>
        </div>
      </div>
      <div class="col-md-12 gss-layout-sidebar-right">
        <?php echo $this->getContent() ?>
      </div>
    </div>
  </div>
</div>