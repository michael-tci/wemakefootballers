(function($) {
    /*** --- Gss --- ***/
    $.adminCore = function(t, p){

        // param
        var params = $.extend({
            skin_url: ''
        }, p);

        // func
        var func = {
            initialize: function(){
              this.event();
            },
            event: function(){
                var that = this;
                /* --- Status --- */
                this.updateNaviSettingThemePanel();
                this.wp_media.initialize();
                $('button[type="submit"]').removeAttr('disabled').on('click', function () {
                  $(this).button('loading');
                });
                this.select2.instance('select.select-2');
                this.social.init();
            },
            updateNaviSettingThemePanel: function(){
              var parent = $('div.navi-setting-theme-panel');
              if ( parent.length && parent.children('a.list-group-item').length )
              {
                var page = parent.attr('data-page');
                if ( typeof(page) != undefined )
                {
                  parent.children('a.list-group-item').removeClass('active');
                  parent.children('a.'+page).addClass('active');
                }
              }
            },
            wp_media:{
              initialize: function(){
                if ( $('div.block-upload-media').length )
                {
                  $('div.block-upload-media').uploadMedia();
                }
              }
            },
            social: {
              items:[],
              init: function(){
                var that = this;
                if ( $('select.is-socials').length )
                {
                  $('select.is-socials').each(function(){
                    that.update(this);
                    $(this).change(function(){
                      that.update(this);
                    });
                  });
                }
              },
              update: function(t){
                var array = $(t).val(), selectId = $(t).attr('id');
                if ( array == null || array == '' )
                {
                  this.items = [];
                  $('ul#ul-'+selectId).empty();
                }
                else if ( this.items.length == 0 )
                {
                  this.items = array;
                  for (var i = 0; i < this.items.length; i++)
                  {
                    this.addItem(this.items[i], selectId);
                  };
                  
                }
                else
                {
                  for (var i = 0; i < array.length; i++)
                  {
                    var is_old = false;
                    for (var j = 0; j < this.items.length; j++)
                    {
                      if ( array[i] == this.items[j] )
                      {
                        this.items.splice(j,1);
                        is_old = true;
                        break;
                      }
                    };
                    // add new item
                    if ( !is_old )
                    {
                      this.addItem(array[i], selectId);
                    }
                  };
                  // Delete item
                  if ( this.items.length )
                  {
                    for (var i = 0; i < this.items.length; i++)
                    {
                      $('li#li-'+this.items[i], 'ul#ul-'+selectId).remove();
                    };
                  }
                  this.items = array;
                }
                return this;
              },
              addItem: function(item, selectId){
                if ( !$('li#li-'+item, 'ul#ul-'+selectId).length )
                {
                  var html = ('<li id="li-'+item+'" class="list-group-item">')
                    +('<div class="form-group form-group-remove-margin-bottom">')
                      +('<label class="col-sm-2 control-label">'+item+'</label>')
                      +('<div class="col-sm-10">')
                        +('<input type="text" name="social['+item+']" class="form-control" id="link-'+item+'" placeholder="Link to social">')
                      +('</div>')
                    +('</div>')
                  +('</li>');
                  $('ul.social-lists').append(html);
                }
              }
            }
        }

        func = $.extend(func, new $.core(params));
        
        t.params = params;
        t.func = func;
        t.func.initialize();
        return t;
    }

    $.fn.uploadMedia = function(p){
      return this.each(function(){
        this.init = function(){
          this.update();
          this.event();
        };
        this.event = function(){
          var that = this;
          $('#upload-btn', this).click(function(e) {
            e.preventDefault();
            var image = wp.media({ 
              title: 'Upload Image',
              multiple: false
            }).open()
            .on('select', function(e){
              var uploaded_image = image.state().get('selection').first();
              var image_url = uploaded_image.toJSON().url;
              $('input.upload-via-media', that).val(image_url);
              that.update();
            });
          });
          $(document).on('click', 'div.block-upload-media-main span.glyphicon-trash', function(){
            var parent = $(this).closest('div.block-upload-media');
            if ( parent.length )
            {
              if ( parent.find('.upload-via-media') )
              {
                parent.find('.upload-via-media').val('');
                that.update();
              }              
            }
            return false;
          });
        };
        this.update = function(){
          $('input.upload-via-media', this).each(function(){
            var wrp = $(this).parent().children('div.block-upload-media-main');          
            if ( $(this).val() != '' )
            {
              if ( wrp.length )
              {
                if ( wrp.length )
                {
                  wrp.empty().append('<img class="img-thumbnail" src="'+$(this).val()+'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>').slideDown(300);
                }
              }
            }
            else
            {
              if ( wrp.length )
              {
                wrp.slideUp(300).empty();
              }
            }
          })
        };
        this.init();
        return this;
      });
    }

    $.fn.coreInstance = function(p){
      var that = this;
      /*this.updateNaviSettingThemePanel = function(''){
        return that.each(function(){
          if ( $.core.prototype.checks.isset(this.func) )
          {
            this.func.updateNaviSettingThemePanel();
          }
        })
      }*/
      return this;
    }
    $.fn.coreadmin = function(p){
      return this.each(function(){
        $.adminCore(this, p);
      });
    }
})(jQuery);