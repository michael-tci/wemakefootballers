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

//custom free trial popup

$('.popFreeTrial, .wr-element-gssgetintouch span:nth-child(1)').click( function(){

  $('#myModal').fadeIn(400);
  $('body').css('overflow','hidden');
});
// $('.wr-element-gssgetintouch span:nth-child(1)').click(function(){
//     $('#myModal').css('display','block');
// });

$('.close').click( function(){

  $('#myModal').hide(400);
  $('body').css('overflow','auto');

});

$('#datep').click(function(){
        $('#datep').attr("placeholder","");

        //check for broswers who doesn't support the CF7 datepicker

        if ( $('[type="date"]').prop('type') != 'date' ) {
   $('#datep').attr("placeholder","Child's DOB eg. yyyy-mm-dd");
    }
       
});


});//ending



/* contact form codes

on_sent_ok: document.getElementById('myModal').innerHTML ="<div class='fade in modal row' id='myModal' role='dialog' style=display:block;padding-right:21px><div class=modal-dialog><div class=modal-content><div class=modal-header><button class=close data-dismiss=modal id=close type=button><img src=https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png></button><h4 class=modal-title>Book Your Free Trial</h4><h4 class=modal-title>@ Twickenham ACADEMY</h4></div><div class=triangle-down></div><div class=modal-body style=text-align:center;><span style=font-weight:bold>Hi </span><span style=color:#ee7925;>"+document.getElementById('parentsName').value+"</span>,<br><span style=font-weight:bold>Thanks for booking a trial for <span class=childsName style=color:#ee7925>"+document.getElementById('childName').value+"</span> at WMF <span id=getAcademy>Twickenham</span>. One of our managers will be in touch with you, within one working day*, to organise this for you.</span><br><br><span style=font-size:16px;>*Our offices are closed on weekends, as we are out playing and coaching football!</span><br><br>If you haven't heard from us within one working day please email info@wemakefootballers.com and we will investigate any delays.<br><br>Have a great day and be sure to follow our Instagram page! <a href=https://www.instagram.com/wemakefootballers/ >@wemakefootballers</a>.</div><div class=modal-footer></div></div></div></div>";

on_sent_ok: document.getElementById('close').addEventListener('click', function(){document.getElementById('myModal').style.display = 'none';document.body.style.overflow = "auto"; });
*/