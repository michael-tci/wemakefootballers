jQuery(document).ready(function() {
    function e() {
        a++;
        var e = "&pageNumber=" + a + "&ppp=" + t + "&action=more_post_ajax";
        return $.ajax({
            type: "POST",
            url: ajax_posts.ajaxurl,
            data: e,
            success: function(e) {
                var t = jQuery(e);
                t.length ? (jQuery(".newsslidewrap .container .row").append(e), jQuery("#more_posts").attr("disabled", !1)) : jQuery("#more_posts").attr("disabled", !0)
            },
            error: function(e, t, a) {
                $loader.html(e + " :: " + t + " :: " + a)
            }
        }), !1
    }
    var t = 5,
        a = 1;
    jQuery("#loadMore").on("click", function() {
        jQuery("#loadMore").attr("disabled", !0), e()
    }), $(".popFreeTrial, .wr-element-gssgetintouch span:nth-child(1)").click(function() {
        $("#myModal").fadeIn(400), $("body").css("overflow", "hidden"), $("html").addClass("freezePage"), $("body").addClass("freezePage")
    }), $(".close").click(function() {
        $("#myModal").hide(400), $("body").css("overflow", "auto"), $("html").removeClass("freezePage"), $("body").removeClass("freezePage")
    }), $(".modal").on("hidden.bs.modal", function() {
        $(".modal ._form-thank-you").hide(), $(".modal ._form-content").show()
    }), $("#datep, [name='dob'], .date_field").attr("placeholder", "Child's DOB eg. dd/mm/yyyy");
    $("#datep, [name='dob']").each(function() {
        var e = $(this).val();
        if (void 0 !== e && e.indexOf("-") > 0) {
            var t = e.split("-");
            $(this).val(t[2] + "/" + t[1] + "/" + t[0])
        }
    });

    $("#datep, [name='dob']").datepicker({
        format: "dd/mm/yyyy",
        autoclose: !0,
        changeMonth: !0,
        changeYear: !0
    }), $("#datep").click(function() {
        $("#datep").attr("placeholder", ""), "date" != $('[type="date"]').prop("type") && console.log("The 'date' input type is not supported, so using JQueryUI datepicker instead.")
    }), $("#datep, [name='dob']").keypress(function(e) {
        var t = $(this).val(),
            a = t.length;
        window.e ? code = e.keyCode : code = e.which;
        for (var d = [49, 50, 51, 52, 53, 54, 55, 56, 57, 48, 47], o = !1, r = d.length - 1; r >= 0; r--) d[r] == code && (o = !0);
        if (o === !1 || 47 == code && (a < 2 || a > 5 || 3 == a || 4 == a) || (2 == a || 5 == a) && 47 !== code || 10 == a) return void e.preventDefault()
    }), $("#parentsName, #childName").keypress(function(e) {
        var t = String.fromCharCode(e.which);
        return !!/[a-zA-Z\s]/i.test(t) && void 0
    })
});
/*
var disableSubmit = !1;
jQuery('input.wpcf7-submit[type="submit"]').click(function() {
    return jQuery(':input[type="submit"]').attr("value", "Sending..."), 1 != disableSubmit && (disableSubmit = !0, !0)
});
var wpcf7Elm = document.querySelector(".wpcf7");
wpcf7Elm.length && wpcf7Elm.addEventListener("wpcf7submit", function(e) {
    jQuery(':input[type="submit"]').attr("value", "send"), disableSubmit = !1
}, !1);*/