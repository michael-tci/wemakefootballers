$( document ).ready( function(){

  $('.open-london').click( function(){
  
//         $('.ui.modal .image.content').css('display','flex');
  
  $('.london-acads')
    .modal('show')
  });

  $('.open-manchester').click( function(){
        $('.manchester-acads')
        .modal('show')
        ;
  });
  // $('.ui.modal').on(closed, function(){
  //      // $('.ui.modal .image.content').css('display','block');
  // });

  /*enables scrolling with WMF theme*/
  $('.card').click(function() {

    $('.ui.modal').addClass('scrolling');
    $('body').addClass('scrolling');

    //auto scroll to top
    $(".dimmer").animate({ scrollTop: 0 }, "slow");

  });

  //hides and show form on each academy
  $('.freetrial-trigger').click( function(){
    
    $('.image.content').hide();
    
    //manchester acads
    if ($(this).hasClass('cheshire')) {
           $('#cheshire-form').fadeIn().delay(1000);
    }

    //london acads
    if($(this).hasClass('isleworth')) {
           $('#isleworth-form').fadeIn().delay(1000);
    } 
    if($(this).hasClass('hounslow')) {
           $('#hounslow-form').fadeIn().delay(1000);
    } 
    if($(this).hasClass('teddington')) {
           $('#teddington-form').fadeIn().delay(1000);
    } 
    if($(this).hasClass('twickenham')) {
           $('#twickenham-form').fadeIn().delay(1000);
    }
    if($(this).hasClass('chiswick')) {
           $('#chiswick-form').fadeIn().delay(1000);
    }
    if($(this).hasClass('carshalton')) {
           $('#carshalton-form').fadeIn().delay(1000);
    }       
    if ($(this).hasClass('richmond')) {
           $('#richmond-form').fadeIn().delay(1000);
    }     
    if ($(this).hasClass('southall')) {
           $('#southall-form').fadeIn().delay(1000);
    }  
    if ($(this).hasClass('coulsdon')) {
           $('#coulsdon-form').fadeIn().delay(1000);
    }  
    if ($(this).hasClass('kingston')) {
           $('#kingston-form').fadeIn().delay(1000);
    }  
    if ($(this).hasClass('ashford')) {
           $('#ashford-form').fadeIn().delay(1000);
    }
    if ($(this).hasClass('finchley')) {
           $('#finchley-form').fadeIn().delay(1000);
    }
    //auto scroll to top
    $(".dimmer").animate({ scrollTop: 0 }, "slow");
    
  });

  //close any and all forms in modal
  $('.innerform .close, .cancel').click( function(){
     $('.innerform').hide(); //hide form
     $('.image.content').fadeIn().delay(1000);
    
  });



});