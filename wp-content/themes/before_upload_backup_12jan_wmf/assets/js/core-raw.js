(function($){
  $.core = function(options){
    this.options = $.extend(this.options, options);
  }
  $.core.prototype = {
    options: {},
    checks: {
      isset: function(x, y){
        y = typeof(y) == 'undefined' ? false : y;
        x = typeof(x) == 'undefined' ? y : x;
        return x;
      },
      // check File exists of Array
      in_array : function (x, array) {
        if (array.length) {
          for (var i = 0; i < array.length; i++) {
            if ( array[i] == x ) return true;
          }
        }
        return false;
      },
      isfunc : function(x) {
        if (this.isset(x) && typeof(x) === 'function' )
        {
          return true;
        }
        return false;
      }
    },
    assets:{
      js : {
        library : [], // library
        // include Path to head
        include : function(path) {
          $('head').append('<script type="text/javascript" src="'+path+'"></script>');
        },
        init : function(path) {
          if ( ! $.core.prototype.checks.in_array(path, this.library) ) {
            this.library.push(path);
            if ( !$.core.prototype.assets.is_load(path) ) {
              this.include(path);
            }
          }
        }
      },
      css : {
        library : [], // library
        // include Path to Header
        include : function(path) {
          if ( document.createStyleSheet ) {
            document.createStyleSheet(path);
          } else {
            $('head').append('<link rel="stylesheet" type="text/css" href="'+path+'">');
          }
        },
        init : function(path) {
          if ( !$.core.prototype.checks.in_array(path, this.library) ) {
            this.library.push(path);
            if ( ! $.core.prototype.assets.is_load(path) ) {
              this.include(path);
            }
          }
        }
      },
      // check file exists document
      is_load: function(path){
        return ($('html').html().indexOf(path) >= 0);
      },
      // generate file
      generate : function(path) {
        var ext = path.substring(path.lastIndexOf('.'), path.length);
        switch(ext) {
          case '.js':
            path = $.core.prototype.path(path);
            this.js.init(path);
            break;
          case '.css':
            path = $.core.prototype.path(path);
            this.css.init(path);
            break;
        }
      },
      // init file
      init: function(opt){
        // opt is a function
        if ( typeof(opt) === 'function' )
        {
          setTimeout(opt, 200);
          return false;
        }
        // opt is a array
        if (opt instanceof Array) {
          if ( $.core.prototype.checks.isset(opt[1]) )
          {
            this.generate(opt[0], opt[1]);
          }
          else
          {
            this.generate(opt[0]);
          }
        }
        else
        {
          this.generate(opt);
        }
      },
      // load file
      load: function(){
        if (arguments.length)
        {
          for (var i = 0; i < arguments.length; i++)
          {
            this.init(arguments[i]);
          };
        }
      }
    },
    path: function(path){
      var skin = this.checks.isset(this.options.skin_url, '');
      return this.options.skin_url+path;
    },
    message: {
      loading: function(i){
        i = $.core.prototype.checks.isset(i);
        if ( i )
        {
          $('div#gss-loading').remove();
        }
        else
        {
          $('body').append('<div id="gss-loading" class="wrapper-gss-loading"><div class="overflay"></div><div class="content"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> <label>Loading...</label></div></div>');
        }
      },
      notify: function(opt){
        opt.title = $.core.prototype.checks.isset(opt.title, 'Notify');
        $.core.prototype.assets.load('gss/libs/notify/toastr.notify.css', 'gss/libs/notify/toastr.notify.js', function(){
          // Notify successfully
          if ( $.core.prototype.checks.isset(opt.success) )
          {
            toastr['success'](opt.success, opt.title);
          }
          // Notify info
          if ( $.core.prototype.checks.isset(opt.info) )
          {
            toastr['info'](opt.info, opt.title);
          }
          // Notify warning
          if ( $.core.prototype.checks.isset(opt.warning) )
          {
            toastr['warning'](opt.warning, opt.title);
          }
          // Notify error
          if ( $.core.prototype.checks.isset(opt.error) )
          {
            toastr['error'](opt.error, opt.title);
          }
        });
      }
    },
    bootstrap: {
      modal: {
        init: function(opt){
          $.core.prototype.assets.load('gss/libs/bootstrap/bootstrap-modal.css', 'gss/libs/bootstrap-dialog/css/bootstrap-dialog.min.css', 'gss/libs/bootstrap/bootstrap-modal.js', 'gss/libs/bootstrap-dialog/js/bootstrap-dialog.min.js', function(){
            var params = $.extend({
              message: 'Hi Apple!',
              size: 'size-wide',
              buttons: [{
                label: 'Save',
                cssClass: 'btn-primary'
              }, {
                label: 'Close',
                action: function(dialogItself){
                  dialogItself.close();
                }
              }]
            },opt);
            BootstrapDialog.show(params);
          });
        }
      }
    },
    ajax: {
      instance: function(opt){
        var setting = $.extend({
          url: '',
          type: 'post',
          dataType: 'json',
          data:{},
          beforeSend: function(){
              $.core.prototype.message.loading();
          },
          success: function(json){},
          complete: function(josn){}
        }, opt);
        $.ajax(setting);
      },
      post: function(opt){
        opt = typeof(opt) == 'object' ? opt : {};
        opt.type = 'post';
        this.instance(opt);
      },
      get: function(opt){
        opt = typeof(opt) == 'object' ? opt : {};
        opt.type = 'get';
        this.instance(opt);
      }
    },
    select2: {
      instance: function(ele, opt){
        $.core.prototype.assets.load('assets/libs/select2/css/select2.min.css', 'assets/libs/select2/js/select2.min.js', function(){
          $(ele).select2(opt);
        });
      }
    }
};
})(jQuery);

