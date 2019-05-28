(function($) {

  var addresses = new Array();
  var map_id = '';
  var map_GV2GmA = null;
  var map_zoom = 12;
  var currentLatLng = new google.maps.LatLng(51.565120, -0.154495);
  var geocoder = new google.maps.Geocoder();

  var service = new google.maps.DistanceMatrixService;

  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer({
    map: map_GV2GmA
  });

  var map_google_directions = 'map-google-directions';
  var none_gmap = 'none_gmap';


  //map options
  var mapOptions_GV2GmA = {
    zoom: map_zoom,
    center: currentLatLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    streetViewControl: true,
    zoomControl: true,
    panControl: true,
    mapTypeControl: true,
    scaleControl: true,
    overviewMapControl: true,
    scrollwheel: false,
  };

  //meters to miles
  function getMiles(i) {
    return i*0.000621371192;
  }

  function addMaker(geocoder, resultsMap, address, index, click_callback, dblclick_callback) {
    geocoder.geocode({"address": address}, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        resultsMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location,
          // label: '' + index + ''
          label: ''
        });

        marker.addListener('click', click_callback);
        marker.addListener('dblclick', dblclick_callback);
        click_callback();
      }
    });
  }

  function getDirections(originAddress, destinationAdd, travelMode) {

    if (typeof travelMode === 'undefined') {
      travelMode = 'DRIVING';
    }
    var options = {
      destination: destinationAdd,
      origin: originAddress,
      travelMode: google.maps.TravelMode[travelMode],
      unitSystem: google.maps.UnitSystem.IMPERIAL
    };
    directionsService.route(options, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });
  }

  function distanceSort() {
    $('.wmf-academy-locator .wr-element-text ol li').sort(function (a, b) {
      return parseInt($(a).attr('data-addressDistance'), 10) > parseInt($(b).attr('data-addressDistance'), 10);
    }).appendTo('.wmf-academy-locator .wr-element-text ol');
    $('.wmf-academy-locator .wr-element-text ol li:first').click();

    $('.distant .wr-element-text ol li').sort(function (a, b) {
      return parseInt($(a).attr('data-addressDistance'), 10) > parseInt($(b).attr('data-addressDistance'), 10);
    }).appendTo('.distant .wr-element-text ol');
    $('.distant .wr-element-text ol li:first').click();
  }

  function distanceMatrix (results, originsAddress, destinationsAddress, maxdistance, callback) {
    if(destinationsAddress) {
      destinationsAddress = destinationsAddress;
    } else {
      destinationsAddress = addresses;
    }
    service.getDistanceMatrix({
      origins: [originsAddress],
      destinations: destinationsAddress,
      travelMode: google.maps.TravelMode.DRIVING,
      unitSystem: google.maps.UnitSystem.IMPERIAL,
      avoidHighways: false,
      avoidTolls: false
    }, function(response, status) {
      if (status === google.maps.DistanceMatrixStatus.OK) {
        var results = response.rows[0].elements;
        wmf_locations_dis = new Array();
        for (var i = 0; i < results.length; i++) {
          $('.wmf-academy-locator .wr-element-text ol li').each(function() {
            if($(this).attr('data-addressIndex') == wmf_locations_dis.length) {
              if($.type(results[i].distance) !== "undefined") {
                $(this).find('.distance-matrix').html(parseFloat(getMiles(results[i].distance.value)).toFixed(1) + ' miles');
                $(this).attr('data-addressDistance', results[i].distance.value);
              } else {
                $(this).find('.distance-matrix').html('');
              }
            }
          });
          $('.distant .wr-element-text ol li').each(function() {
            if($(this).attr('data-addressIndex') == wmf_locations_dis.length) {
              if($.type(results[i].distance) !== "undefined") {
                $(this).attr('data-addressDistance', results[i].distance.value);
                $(this).show();
                if(maxdistance > 0 && parseInt($(this).attr('data-addressDistance'), 10) > maxdistance) {
                  $(this).hide();
                }
              } else {
                $(this).show();
              }
            }
          });
          if($.type(results[i].distance) !== "undefined") {
            wmf_locations_dis.push(new Array(results[i].distance.value, wmf_locations_dis.length));
            wmf_locations_dis = wmf_locations_dis.sort(function(a, b){return a[0]>b[0];});
          } else {
            wmf_locations_dis.push(new Array(0, wmf_locations_dis.length));
          }
        }
        distanceSort();
        if(typeof(callback) == "function") {
          callback();
        }
      }
    });
  }

  function distancesMatrix (results, originsAddress, destinationsAddress, maxdistance, callback) {
    if(results) {
      if (results[0]) {
        originsAddress = results[0].formatted_address;
      } else if (results[1]) {
        originsAddress = results[1].formatted_address;
      }
    }
    distanceMatrix(results, originsAddress, destinationsAddress, maxdistance, callback);
  }

  function distanceMap (geocoder, resultsMap, originsAddress, destinationsAddress, maxdistance, callback) {
    var geocoderOptions = {};

    if($.type(originsAddress) == "string") {
      geocoderOptions.address = originsAddress;
    } else {
      geocoderOptions.location = originsAddress;
    }

    if(geocoderOptions) {
      geocoder.geocode(geocoderOptions, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          originsAddress = results[0].formatted_address;
        }
        centerMap (geocoder, resultsMap, originsAddress);
        distancesMatrix(results, originsAddress, destinationsAddress, maxdistance, callback);
      });
    }
  }

  function centerMap (geocoder, resultsMap, address) {
    var geocoderOptions = {};

    if($.type(address) == "string") {
      geocoderOptions.address = address;
    } else {
      geocoderOptions.location = address;
    }

    if(geocoderOptions) {

      geocoder.geocode(geocoderOptions, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          resultsMap.setCenter(results[0].geometry.location);
          map_GV2GmA.setZoom(map_zoom);
        }
      });
    }
  }

  function valid_postcode(postcode) {
    postcode = postcode.replace(/\s/g, "");
    var regex = /^[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}$/i;
    return regex.test(postcode);
  }


  if (wmf_locations) {

    $(document ).ready( function () { $( window ).load(function() {

      //valid map_id
      map_id = $("#map_locator").children("div").children("div").attr('id');
      if(!map_id) {
        map_id = $("#" + map_google_directions).parent().children("div").attr('id');
      }
      if(!map_id) {
        map_id = none_gmap;
        $('body').append($('<div>').attr('id', map_id).hide());
      }

      //general map
      map_GV2GmA = new google.maps.Map(document.getElementById(map_id), mapOptions_GV2GmA);

      directionsDisplay = new google.maps.DirectionsRenderer({
        map: map_GV2GmA
      });

      //load academys and show to map
      $(".wmf-academy-locator .wr-element-text ol").html('');
      $(".distant .wr-element-text ol").html('');
      $.each(wmf_locations, function(i, val) {
        var address = val.address.replace(/[-]+/g, ' ');
        address = address.replace(/[\n\r]/g, ' ');
        address = address.replace(/[ ]+/g, ' ');
        addresses.push(address);

        if(map_id == map_google_directions) {

          var destinationAdd = blogAddress;
          var originAddress = blogAddress;
          if(postcodeVal) {
            originAddress = postcodeVal;
          }
          getDirections(originAddress, destinationAdd);
          return;
        }

        var title = val.name;
        var addrs = (val.address.split(',')).join(',<br>');

        var academy_locator_li = $('<li>')
          .attr('data-address', address)
          .attr('data-url', val.url)
          .attr('data-coaching-url', val.coaching_url)
          .attr('data-birthday-url', val.birthday_url)
          .attr('data-additonal-info', val.additonal_info)
          .attr('data-session-times', val.session_times)
          .attr('data-addressIndex', i)
          .append('<h2>' + title + '</h2>')
          .append('<p class="distance-matrix">3.6m</p>')
          .append('<span>' + addrs + '</span>');
        $(".wmf-academy-locator .wr-element-text ol").append(academy_locator_li);

        var distant_li = $('<li>')
          .attr('data-address', address)
          .attr('data-url', val.url)
          .attr('data-coaching-url', val.coaching_url)
          .attr('data-birthday-url', val.birthday_url)
          .attr('data-additonal-info', val.additonal_info)
          .attr('data-session-times', val.session_times)
          .attr('data-addressIndex', i)
          .append('<a>' + title + '</a>');
        $(".distant .wr-element-text ol").append(distant_li);

        addMaker(geocoder, map_GV2GmA, address, i + 1, function() {
          academy_locator_li.click();
          distant_li.click();
        }, function() {
          academy_locator_li.dblclick();
          distant_li.dblclick();
        });
        // distanceSort();
      });
    });})

    .ready( function () {$( window ).load(function() {
      //get distance
      currentLatLng = addresses[0]; //default
      if(postcodeVal) {
        currentLatLng = postcodeVal;
      }
      distanceMap(geocoder, map_GV2GmA, currentLatLng, addresses,0);
    });})

    //select academy locator
    .on('click', '.wmf-academy-locator .wr-element-text ol li', function() {
      $('.wmf-academy-locator .wr-element-text ol li.active').removeClass("active");
      $(this).addClass("active");
      centerMap(geocoder, map_GV2GmA, $(this).attr('data-address'));
    })

    .on('click', '.wmf-academy-locator .wr-element-text ol li', function() {
      var title = $('h2', $(this)).html();
      $(".address-info .wr_text ul li h2").html(title);

      var distance = $('.distance-matrix', $(this)).html();
      var description = $('span', $(this)).html();
      var disdes = "<span>" + distance + "</span>" + "<br>" + description;
      $(".address-info .wr_text ul li p:first").html(disdes);

      var index = $(this).index();
      document.styleSheets[0].addRule('.address-info .wr_text ul li:before', 'content: attr(data-before-index) !important;');
      $(".address-info .wr_text ul li").attr('data-before-index', index + 1);

      var data_additonal_info = $(this).attr('data-additonal-info');
      $(".address-info .wr_text ul li h4 + p").html(data_additonal_info);

      var data_session_times = $(this).attr('data-session-times');
      $( ".session-time .wr_text table" ).html(data_session_times);

      var url = $(this).attr('data-url');
      $(".wmf-academy-locator .entry-content .address-academy-locator .session-time div p>a").attr('href', url);

      var maxHeightLocators = $('.wmf-academy-locator .entry-content .address-academy-locator .session-time.col-sm-6 .wr_text').height() + 30 ;
      $('.wmf-academy-locator .entry-content .address-academy-locator .session-time.col-sm-6').outerHeight(maxHeightLocators);
      $('.wmf-academy-locator .entry-content .address-academy-locator .address-info').outerHeight(maxHeightLocators);
      console.log(maxHeightLocators);
    })

    .ready(function() {
      var smode = '<div id="wrapper" style="position:relative;"><div id="floating-panel" style="position: absolute; top: 10px; left: 25%; z-index: 5; background-color: #fff; padding: 5px; border: 1px solid #999; text-align: center; line-height: 30px; padding-left: 10px;"><b>Mode of Travel: </b><select id="mode"><option value="DRIVING">Driving</option><option value="WALKING">Walking</option><option value="BICYCLING">Bicycling</option><option value="TRANSIT">Transit</option></select></div>';
      $('.wmf-google-directions > .page').prepend(smode);
      $( window ).load(function() {
        $(".wmf-academy-locator .entry-content .address-academy-locator .session-time div p>a").html('go to this academy');
      });
    })

    .on('click', '.wmf-academy-locator .wr-element-text ol li', function() {
      // $('[data-type=postcode] + a').click();
    })

    //select distant locator
    .on('click', '.distant .wr-element-text ol li', function() {
      $('.distant .wr-element-text ol li a.active').removeClass("active");
      $(this).find('a').addClass("active");
      centerMap(geocoder, map_GV2GmA, $(this).attr('data-address'));
    })

    .on('dblclick', '.distant .wr-element-text ol li', function() {
      _param = '';
      if($.type(is_birthday_parties) != "undefined" && is_birthday_parties == "true") {
        if($(this).attr('data-birthday-url') != "false") {
          _param = '?p=' + $(this).attr('data-birthday-url');
        }
      } else if($.type(is_121_coaching) != "undefined" && is_121_coaching == "true") {
        if($(this).attr('data-coaching-url') != "false") {
          _param = '?p=' + $(this).attr('data-coaching-url');
        }
      }
      window.open($(this).attr('data-url') + _param, '_blank');
    })

    .on('touchstart', '.distant .wr-element-text ol li', function(e) {
      var timeNow = new Date().getTime();
      var timeLastTouch = $(this).attr('data-lastTouch') || timeNow + 1 ;
      var timeEvent = timeNow - timeLastTouch;
      var tapped;
      if(timeEvent > 600 || timeEvent < 1) {
        tapped = setTimeout(function() {
          $(this).attr('data-lastTouch', timeNow + 1);
          $(this).click();
        }, 600);
      } else {
        clearTimeout(tapped);
        window.location=$(this).attr('data-url');
        // $(this).dblclick();
      }
      e.preventDefault();
    })

    //academy locator autocomplete
    .ready(function() {
      $( window ).load(function() {
        $("#search--an-academy-locator").val(postcodeVal);
      });
      $(window).load(function() {
        if($("#search--an-academy-locator").length > 0 && $("#search--an-academy-locator").val().length > 0) {
          var e = jQuery.Event("keypress");
          e.which = 13;
          $('#search--an-academy-locator').trigger(e);
          event.preventDefault();
        }
      });
    })

    .on('click', '#search--an-academy-locator + a, #search--an-academy-locator ~ .search-locator-postcode, [data-type=postcode] + a, [type=postcode] + a, [type=postcode] ~ .btn-find-locator, [data-type=postcode] ~ .btn-find-locator, [type=postcode] ~ .btn-find-near, [data-type=postcode] ~ .btn-find-near', function(event) {
      var e = jQuery.Event("keypress");
      e.which = 13;
      $('[data-type=postcode], [type=postcode], #search--an-academy, #search--an-academy-locator', $(this).parent()).trigger(e);
      event.preventDefault();
    })

    .on('click keypress', '[data-type=postcode], [data-type=poscode], [type=postcode], [type=poscode], #search--an-academy, #search--an-academy-locator', function(event) {
      $(this).autocomplete({
        source: (function() {
          var _return = new Array();
          $.each(wmf_locations_dis.sort(function(a, b){return a[0]>b[0];}), function(i, v) {
            _return.push(wmf_locations[v[1]]);
          });
          return _return;
        })(),
        select: function( event, ui ) {
          if ( ui && typeof(ui.item) != 'underfined' ) {
            $(this).val(ui.item.label);
            var ckPostcode = $(this).val();
            ckPostcode = valid_postcode(ckPostcode);
            if (ckPostcode == false) {
              alert("Please enter a valid postcode");
              return false;
            }

            //get Directions
            if($(this).attr('placeholder')=='Start point') {
              var destinationAdd = $('.active', $('.wmf-academy-locator .wr-element-text ol')).attr('data-address');
              var originAddress = destinationAdd;
              if($('#search--an-academy-locator', $(this).parents('.wmf-col')).val()) {
                originAddress = $('#search--an-academy-locator', $(this).parents('.wmf-col')).val();
              }
              if($(this).val()) {
                originAddress = $(this).val();
              }
              getDirections(originAddress, destinationAdd);
            }

            //sort in postcode find
            else if ($(this).hasClass('input-postcode-find')) {
              var maxdistance = 0;
              if($('.within-radius', $(this).parent()).val()) {
                maxdistance = $('.within-radius', $(this).parent()).val();
              }
              distanceMap(geocoder, map_GV2GmA, $(this).val(), addresses, maxdistance, function() {
                if(wmf_locations_dis.length > 0) {
                  centerMap (geocoder, map_GV2GmA, wmf_locations[wmf_locations_dis[0][1]].label);
                  map_GV2GmA.setZoom(map_zoom);
                }
              });
            }

            //sort in academy-locator
            else if ($(this).is('#search--an-academy-locator')) {
              distanceMap(geocoder, map_GV2GmA, $(this).val(), addresses);
              var destinationAdd = $('.active', $('.wmf-academy-locator .wr-element-text ol')).attr('data-address');
              var originAddress = destinationAdd;
              if($(this).val()) {
                originAddress = $(this).val();
              }
              if($('#search--an-academy-locator', $(this).parents('.wmf-col')).val()) {
                originAddress = $('#search--an-academy-locator', $(this).parents('.wmf-col')).val();
              }
              getDirections(originAddress, destinationAdd);
            }

            //in subsite direct to google-directions page
            else if($(this).is('.input-postcode-site, .input-postcode-site-2, [type=poscode]')) {
              var urlRedirect = blogUrl + '/google-directions/';
              var form = "<form method='POST' action='" + urlRedirect + "' target='_blank'>\n";
              form += "<input type='hidden' name='postcode' value='" + $(this).val() + "'></input></form>";
              var formElement = $(form);
              $('body').append(formElement);
              $(formElement).submit();
            }

            //move to academy-locator academy-locator page
            else  {
              var urlRedirect = wmf_main_url + '/academy-locator/';
              var form = "<form method='POST' action='" + urlRedirect + "'>\n";
              form += "<input type='hidden' name='postcode' value='" + $(this).val() + "'></input></form>";
              var formElement = $(form);
              $('body').append(formElement);
              $(formElement).submit();
            }
          }
          return false;
        }
      });

      if ( (event.which == 13) ) {
        var ckPostcode = $(this).val();
        ckPostcode = valid_postcode(ckPostcode);

        //get Directions
        if($(this).attr('placeholder')=='Start point') {
          var destinationAdd = $('.active', $('.wmf-academy-locator .wr-element-text ol')).attr('data-address');
          var originAddress = destinationAdd;
          if($('#search--an-academy-locator', $(this).parents('.wmf-col')).val()) {
            originAddress = $('#search--an-academy-locator', $(this).parents('.wmf-col')).val();
          }
          if($(this).val()) {
            originAddress = $(this).val();
          }
          getDirections(originAddress, destinationAdd);
        }

        //valid postcode
        else if (ckPostcode == false) {
          alert("Please enter a valid postcode");
          return false;
        }

        //sort in postcode find
        else if ($(this).hasClass('input-postcode-find')) {
          var maxdistance = 0;
          if($('.within-radius', $(this).parent()).val()) {
            maxdistance = $('.within-radius', $(this).parent()).val();
          }
          distanceMap(geocoder, map_GV2GmA, $(this).val(), addresses, maxdistance, function() {
            if(wmf_locations_dis.length > 0) {
              centerMap (geocoder, map_GV2GmA, wmf_locations[wmf_locations_dis[0][1]].label);
              map_GV2GmA.setZoom(map_zoom);
            }
          });
        }

        //sort in academy-locator
        else if ($(this).is('#search--an-academy-locator')) {
          distanceMap(geocoder, map_GV2GmA, $(this).val(), addresses);
          var destinationAdd = $('.active', $('.wmf-academy-locator .wr-element-text ol')).attr('data-address');
          var originAddress = destinationAdd;
          if($(this).val()) {
            originAddress = $(this).val();
          }
          if($('#search--an-academy-locator', $(this).parents('.wmf-col')).val()) {
            originAddress = $('#search--an-academy-locator', $(this).parents('.wmf-col')).val();
          }
          getDirections(originAddress, destinationAdd);
        }

        //in subsite direct to google-directions page
        else if($(this).is('.input-postcode-site, .input-postcode-site-2, [type=poscode]')) {  
          var urlRedirect = blogUrl + '/google-directions/';
          var form = "<form method='POST' action='" + urlRedirect + "' target='_newtab'>\n";
          form += "<input type='hidden' name='postcode' value='" + $(this).val() + "'></input></form>";
          var formElement = $(form);
          $('body').append(formElement);
          $(formElement).submit();
        }

        //move to academy-locator academy-locator page
        else  {
          var urlRedirect = wmf_main_url + '/academy-locator/';
          var form = "<form method='POST' action='" + urlRedirect + "'>\n";
          form += "<input type='hidden' name='postcode' value='" + $(this).val() + "'></input></form>";
          var formElement = $(form);
          $('body').append(formElement);
          $(formElement).submit();
        }
      }
    })

    .on('change', '#mode', function(e) {
      var selectedMode = $("#mode").val();
      var destinationAdd = blogAddress;
      var originAddress = blogAddress;
      if(postcodeVal) {
        originAddress = postcodeVal;
      }
      getDirections(originAddress, destinationAdd, selectedMode);
    });
  }
  
  
  
  
  
})(jQuery);
