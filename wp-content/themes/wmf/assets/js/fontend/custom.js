(function($) {
    $('.wmf-tc-team').find('.wmf-col').each(function(){
        var text = $(this).text();
        if(text.length === 1){
            $(this).addClass('hidden');
        }
    });
    $('.wmf-services-one-column-wrapper').find('.col-md-6').each(function(){
        var ww = $(window).width(),
            $this = $(this),
            height = $this.outerHeight();
        if(ww > 767){
            $this.parent().find('.col-md-4').css('height',height);
        }
    });

    $(document).on('click', 'a[href^="#"]', function(e) {

        if(!$(this).closest('.row').hasClass('wmf-about-values-nav')){
            var id = $(this).attr('href');
            var $id = $(id);
            if ($id.length === 0) {
                return;
            }
            e.preventDefault();
            var pos = $id.offset().top;
            $('body, html').animate({
                scrollTop: pos,
            }, 1500);
        }
    });
    $('.view-coach-information').click(function(){
        var $this = $(this);
        $this.closest('.wmf-skill-bar').addClass('close-coach');
        $this.closest('.wmf-skill-bar').find('.wr-element-progressbar').slideToggle();
        $this.closest('.wmf-skill-bar').find('.skill-description').slideToggle();
    });
    $('.close-coach-information').click(function(){
        var $this = $(this);
        $this.closest('.wmf-skill-bar').removeClass('close-coach');
        $this.closest('.wmf-skill-bar').find('.wr-element-progressbar').slideToggle();
        $this.closest('.wmf-skill-bar').find('.skill-description').slideToggle();
    });

    $('.coaching-level .wpcf7-select').change(function(){
        var clv = $(this).val();
        if(clv == 'Yes'){
            $(this).closest('.coaching-info').find('.coaching-info-content').slideDown();
        }else{
            $(this).closest('.coaching-info').find('.coaching-info-content').slideUp();
        }
    });
    /*
    $(".carousel").swipe({
        swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
            if (direction == 'left') $(this).carousel('next');
            if (direction == 'right') $(this).carousel('prev');
        },
        allowPageScroll:"vertical"
    });
    */
    $('.wmf-contact-us .nature-combobox').each(function(){
        var url = $(location).attr('href');
        var value = url.split("?");
        var nature = '';
        if(value[1]){
            var cb = value[1].split("&");
            var str = cb[0].split("=");
            if(str[0] == 'nature'){
                nature = str[1];
            }
        }
        nature = nature.replace(/%20/gi, " ");
        $(this).val(nature);
    });
    $('.wmf-contact-us .your-message textarea').each(function(){
        var url = $(location).attr('href');
        var value = url.split("?");
        var message = '';
        if(value[1]){
            var cb = value[1].split("&");
            var str = cb[1].split("=");
            if(str[0] == 'message'){
                message = str[1];
            }
        }
        message = message.replace(/%20/gi, " ");
        message = message.replace(/%C2/gi, "|");
        message = message.replace(/%A3/gi, " £");
        $(this).val(message);
    });
    $('.header-thank-free-trial h2').each(function(){
        var url = $(location).attr('href');
        var value = url.split("?");
        var parent = '', child = '';
        if(value[1]){
            var cb = value[1].split("&");
            var str1 = cb[0].split("=");
            if(str1[0] == 'parent'){
                parent = str1[1];
            }
            var str2 = cb[1].split("=");
            if(str2[0] == 'child'){
                child = str2[1];
            }
        }
        parent = parent.replace(/%20/gi, " ");
        child = child.replace(/%20/gi, " ");
        var $text = $(this).text();
        $text = $text.replace("[Parent Name]", parent);
        $text = $text.replace("[Child’s name]", child);
        $(this).text($text);
    });
    $('.wmf-about-values-nav').each(function(){
        var $active = false;
        $(this).find('.wmf-col').each(function(){
            if($(this).hasClass('active')){
                $active = true;
            }
        });
        if($active == false){
            $(this).find('.wmf-col').addClass('actived');
        }
    });
    $('.wmf-about-values-nav a').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        $(this).closest('.wmf-about-values-nav').find('.wmf-col').removeClass('actived');
        $(this).closest('.wmf-about-values-nav').find('.wmf-col').removeClass('active');
        $(this).closest('.wmf-col').addClass('active');
        var $class = href.split('#');
        $(this).closest('.wmf-col').addClass($class[1]);
        if(href != '#wmf-about-safety'){
            $('#wmf-about-safety').slideUp();
        }
        if(href != '#wmf-about-passion'){
            $('#wmf-about-passion').slideUp();
        }
        if(href != '#wmf-about-development'){
            $('#wmf-about-development').slideUp();
        }
        if(href != '#wmf-about-fun'){
            $('#wmf-about-fun').slideUp();
        }
        $('body').find(href).slideDown();
    });
    $('.wmf-about-5-in-5').each(function(){
        var $this = $(this);
        var mh = 0;
        $this.find('.wr-element-text').each(function(){
            var height = $(this).outerHeight();
            if(height > mh){
                mh = height;
            }
        });
        $this.find('.wr-element-text').css('min-height', mh);
    });
})(jQuery);