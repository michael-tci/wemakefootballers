jQuery(document).ready(function () {
var ppp = 5; // Post per page
var pageNumber = 1;


function load_posts(){ 
    pageNumber++;
    var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';//alert(ajax_posts.ajaxurl);
    $.ajax({
        type: "POST",       
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){  
            var $data = jQuery(data); 
            if($data.length){
                jQuery(".newsslidewrap .container .row").append(data);
                jQuery("#more_posts").attr("disabled",false);
            } else{
                jQuery("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

jQuery("#loadMore").on("click",function(){  // When btn is pressed.
    jQuery("#loadMore").attr("disabled",true); // Disable the button, temp.
    load_posts();
});

});

