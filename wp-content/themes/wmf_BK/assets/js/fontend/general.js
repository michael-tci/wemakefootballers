(function($) {
    /*** --- Gss --- ***/
    $.addFontEnd = function(t, p){

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

            $('p').each(function(){
              if ( $(this).html().trim() == '' )
              {
                $(this).remove();
              }
            })

          }
        }

        func = $.extend(func, new $.core(params));

        t.params = params;
        t.func = func;
        t.func.initialize();
        return t;
    }

    $.fn.fontEndInstance = function(p){
      var that = this;
      return this;
    }
    $.fn.fontEnd = function(p){
      return this.each(function(){
        $.addFontEnd(this, p);
      });
    }
    $.fn.loadContactForm = function(p){
      this.html();
      // return this.each(function(){
        // $.addFontEnd(this, p);
      // });
    }


    $(document)

    .ready(function() {
      $("img").lazyload({
        effect : "fadeIn",
        threshold : 200
      });
      // $("img").each(function() {
      //   var img = new Image();
      //   img.src = $(this).attr('src');
      // });
    })

    .on('click', '.back-to-top button', function () {
      $("html, body").animate({scrollTop: 0}, 1000);
    })

    .on('click', 'body.page .wmf-navbar .container .menu-main-menu-container .menu .menu-item>a, body.page .wmf-navbar .container .menu-primarylocation-container .menu .menu-item>a', function (event) {
      if (window.matchMedia('(max-width: 1199px)').matches
        && window.matchMedia('(min-width: 992px)').matches) {
          if( $(this).attr('data-click') ) {
            $(this).attr('data-click', false);
          } else {
            $(this).attr('data-click', true);
            if( $(this).next().is('.sub-menu') ) {
              event.preventDefault();
              return false;
            }
          }
      }
    })

    .on('click', '.wmf-services .col-md-4', function () {
      $(this).children('a').click();
    })

    .on('click', '.wmf-football-training .all-services .col-md-4', function() {
      window.location.href = $(this).find(".btn-link").attr("href");
    })

    .on('click', '.wmf-holiday-camps .apprenticeship .col-md-5.col-sm-5', function() {
      window.location.href = $(this).find("a").attr("href");
    })

    .on('click', '.wmf-pathways .intro-pathways .wmf-col', function() {
      window.location.href = $(this).find("a").attr("href");
    })

    .on('click', '.wmf-weekly-training-session .section .col-md-16 .content.col-3', function() {
      window.location.href = $(this).find("a").attr("href");
    })

    .on('click', '.wmf-holiday-camps-location .wmf-shadow .col-md-4.col-sm-4', function() {
      window.location.href = $(this).find("a").attr("href");
    })

    .on('click', '.wmf-weekly-traning-location .grassroots-local.wmf-shadow .col-md-5.col-sm-5', function() {
      window.location.href = $(this).find("p > a").attr("href");
    })

    .on('click', '.table-faq ol > li', function() {
        $(this).toggleClass('active');
        $(this).find('.sub-menu').slideToggle();
    })

    .on('click', '.all-themes-switch a', function(e) {
        e.preventDefault();
        var $this=$(this),
          rel=$this.attr("rel"),
          el=$(".content");
        switch(rel){
          case "toggle-content":
            el.toggleClass("expanded-content");
            break;
        }
    })

    .ready(function() {
      $( window ).load(function() {
        var MAXHeightServices = 0;
        $(".wmf-other-services .all-services .col-md-4 p").each(function(){
           if ($(this).height() > MAXHeightServices) { MAXHeightServices = $(this).height(); }
        });
        $(".wmf-other-services .all-services .col-md-4 .wr-element-text").height(MAXHeightServices);
      });
    })

    .ready(function() {
      $( window ).load(function() {
        var MAXHeight = 0;
        $(".wmf-testimonials .testmonials-all-2 .wr-element-heading h4").each(function(){
           if ($(this).height() > MAXHeight) { MAXHeight = $(this).height(); }
        });
        $(".wmf-testimonials .testmonials-all-2 .wr-element-heading h4").height(MAXHeight);
      });
    })

    .ready(function() {
      $( window ).load(function() {
        var MaxHeight = 0;
        $(".wmf-testimonials .testmonials-all-2 .wr-element-text .wr_text p").each(function(){
           if ($(this).height() > MaxHeight) { MaxHeight = $(this).height(); }
        });
        $(".wmf-testimonials .testmonials-all-2 .wr-element-text .wr_text p").height(MaxHeight);
      });
    })

    .ready(function() {
      $( window ).load(function() {
        var MaxHeightTraining = 0;
        $(".wmf-football-training .all-services .col-md-4 p").each(function(){
           if ($(this).height() > MaxHeightTraining) { MaxHeightTraining = $(this).height(); }
        });
        $(".wmf-football-training .all-services .col-md-4 .wr-element-text").height(MaxHeightTraining);
      });
    })

    .ready(function() {
      $( window ).load(function() {
        var maxHeight = 0;
        $(".wmf-testimonials .testmonials-all .col-md-5.col-sm-5 .wr-element-text").each(function(){
          if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
        });
        $(".wmf-testimonials .testmonials-all .col-md-5.col-sm-5 .wr-element-text").height(maxHeight);
      });
    })

    // .on('resize load', window. function() {
    //   var maxHeightLocator = Math.max($('.wmf-academy-locator .entry-content .address-academy-locator .session-time.col-sm-6').outerHeight(),
    //   $('.wmf-academy-locator .entry-content .address-academy-locator .address-info').outerHeight())
    //   $('.wmf-academy-locator .entry-content .address-academy-locator .session-time.col-sm-6').outerHeight(maxHeightLocator);
    //   $('.wmf-academy-locator .entry-content .address-academy-locator .address-info').outerHeight(maxHeightLocator);
    // })

    .ready(function() {
      $( window ).load(function() {
        var maxHeightLocator = Math.max($('.wmf-academy-locator .entry-content .address-academy-locator .session-time.col-sm-6').outerHeight(),
        $('.wmf-academy-locator .entry-content .address-academy-locator .address-info').outerHeight());
        $('.wmf-academy-locator .entry-content .address-academy-locator .session-time.col-sm-6').outerHeight(maxHeightLocator);
        $('.wmf-academy-locator .entry-content .address-academy-locator .address-info').outerHeight(maxHeightLocator);
      });
    })
    .ready(function() {
      $( window ).load(function() {
        $( window ).resize(function() {
          $('.entry-post-content .post-excerpt').height(function(){
            out_height   = $(this).parent().children('.post-thumbnail').height();
            title_height = $('.entry-post-content .post-excerpt .post-title').outerHeight();
            return parseInt((out_height - title_height) / 29) * 29 + title_height;
          });
        });
        $( window ).resize();

        if ($('#wmf-twitter').length > 0) {
          var wmf_twitter = (function() {
            return $.ajax({
              dataType: 'script',
              cache: true,
              url: '//platform.twitter.com/widgets.js'
            });
          })();

          wmf_twitter.done(function() {
            twttr.ready( function (twttr) {
              twttr.widgets.load(
                $('#wmf-twitter')
              );
            });
          });
        }

        if ($('#wmf-facebook').length > 0) {
          (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
        }
      });
    })

    .ready(function() {
      $( window ).load(function() {
        $('body').fontEnd();
        $(".chosen-select").chosen({disable_search_threshold: 10});

        $.mCustomScrollbar.defaults.scrollButtons.enable=true; //enable scrolling buttons by default
        $.mCustomScrollbar.defaults.axis="yx"; //enable 2 axis scrollbars by default
        $("#content-md").mCustomScrollbar({theme:"minimal-dark"});
      });
    })

    .ready(function() {
      $( window ).load(function() {
        $('.wmf-news .wmf-news-body .wmf-news-sidebar #search-2 .search-form label input').attr('placeholder', 'Search');
      });
    });
 

})(jQuery);


jQuery(document).ready(function(){
	
 jQuery("#near-academy").click(function(){
	 alert("dgfjjhg");
 }); 

});