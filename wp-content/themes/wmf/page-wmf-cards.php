<?php

/*

Template Name: WMF Cards

 */

//Converted into shortcode [wmf_cards]
// please see code/helper/shortcode.php
// please remember to add javascript triggers to $('.freetrial-trigger').click( function(){ in /header/header-html.php

// get_header('cards'); 
?>

<!-- modal setup BEGIN-->

<div id="north-west-pop" class="modal fade" role="dialog">
<div class="ui long transition modal scrolling manchester-acads" style=" display: block !important; opacity: 1 !important; top: 20px !important; margin-bottom: 20px !important">
    <div class="header">Manchester/Crewe Academy</div>
    <div class="actions">
      <div class="closeModal button cancel" data-dismiss="modal">✕</div>
    </div>
    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Cheshire Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2017/01/Cheshire-Academy.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> South Cheshire College, Dane Bank Ave, Crewe CW2 8AB
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:neil@wemakefootballers.com">neil@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:07802334579">+078 0233 4579</a>

            </p>
         <div class="middle content">
             <div class="header">Cheshire</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Cheshire Academy
          </div> 
          <table class="table table-hover" style="text-align:left;">
              <tr>
                  <th colspan="2">
                  <p>Weekly Training <br> &pound;60 per 10 weeks<br>
                  (Special 2017 Intro Offer)</p>
                  </th>
              </tr>
              <tr>
                <td><p><a class="freetrial-trigger cheshire">Saturday 9.30am-10.30am</a></p></td>
                <td><p>8-12 Years</p></td>
              </tr>
              <tr>
                  <td>
                  <p><a class="freetrial-trigger cheshire">Saturday 10.30am-11.30am</a></p>
                  </td>
                  <td>
                  <p>4-7 Years</p>
                  </td>
              </tr>
              <tr>
                  <td>
                  <p><a class="freetrial-trigger cheshire">Tuesday 5.30pm - 6.30pm</a></p>
                  </td>
                  <td>
                  <p>8-12 Years</p>
                  </td>
              </tr>
              <tr>
                  <td>
                  <p><a class="freetrial-trigger cheshire">Tuesday 4.30pm - 5.30pm</a></p>
                  </td>
                  <td>
                  <p>4-7 Years</p>
                  </td>
              </tr>
          </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger cheshire">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/cheshire/" target="_blank" >Visit Cheshire Website</a>
          </p> 
      </div> 
    </div>

<div id="cheshire-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <input type="hidden" name="class_name" value="Cheshire Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Cheshire Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="4241" title="Free trial form_wmf_Cheshire"]');
   echo get_blog_option( '52', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

</div>
</div>

<div id="london-acadspop" class="modal fade" role="dialog">
  <div class="ui long modal transition scrolling london-acads" style=" display: block !important; opacity: 1 !important; top: 20px !important; margin-bottom: 20px !important">
    <div class="header">London Academies</div>
    <div class="actions">
      <div class="closeModal button cancel" data-dismiss="modal">✕</div>
    </div>

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Isleworth Academy
      </div>  
        <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/isleworth.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> The Green School, Busch Corner, London Road Isleworth, Middlesex
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:tw@wemakefootballers.com">tw@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:02071481602">+020 7148 1602</a>
            </p>
         
         <div class="middle content">
             <div class="header">Isleworth</div>
         </div>
        
        </div>
     <div class="description">
        <div class="ui header">
         <i class="university icon"></i>Isleworth Academy
        </div> 
        <table class="table table-hover" style="text-align:left;">
            <tr>
                <th colspan="2">
                <p>Weekly Training <br> &pound;70 per 10 weeks</p>
                </th>
            </tr>
            <tr>
            <td>
                <p><a class="freetrial-trigger isleworth">Tuesday 5pm-6pm</a></p>
                </td>
                <td>
                <p>4-7 year olds</p>
                </td>
            </tr>
            <tr>
            <td>
                <p><a class="freetrial-trigger isleworth">Wednesday 5pm-6pm</a></p>
                </td>
                <td>
                <p>4-7 year olds</p>
                </td>
            </tr>
            <tr>
                <td>
                <p><a class="freetrial-trigger isleworth">Wednesday 6pm-7pm</a></p>
                </td>
                <td>
                <p>8-12 year olds</p>
                </td>
            </tr>
            <tr>
                <td>
                <p><a class="freetrial-trigger isleworth">Saturday 9.30am-10.30am</a></p>
                </td>
                <td>
                <p>9-12 year olds</p>
                </td>
            </tr>
            <tr>
                <td>
                <p><a class="freetrial-trigger isleworth">Saturday 10.30am-11.30am</a></p>
                </td>
                <td>
                <p>4-6 year olds</p>
                </td>
            </tr>
            <tr>
                <td>
                <p><a class="freetrial-trigger Isleworth">Saturday 11.30am-12.30am</a></p>
                </td>
                <td>
                <p>7-8 year olds</p>
                </td>
            </tr>

        </table>
        
        <p class="btn_footer">
            
            <button class="ui orange button freetrial-trigger isleworth">Book Trial Online</button>
            <a class="ui basic black button" href="https://www.wemakefootballers.com/isleworth/" target="_blank">Visit Isleworth Website</a>
        </p> 
      </div>
    </div> 

<div id="isleworth-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Isleworth Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   //echo do_shortcode('[contact-form-7 id="4263" title="Free trial form_wmf_Isleworth"]'); 
   echo get_blog_option( '12', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

   <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Hounslow Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/hounslow.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Lampton School, Lampton Avenue, Hounslow
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:tw@wemakefootballers.com">tw@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:02071481602">+020 7148 1602</a>

            </p>
         <div class="middle content">
             <div class="header">Hounslow</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Hounslow Academy
          </div> 
          <table class="table table-hover" style="text-align:left;">
              <tr>
                  <th colspan="2">
                  <p>Weekly Training <br> &pound;70 per 10 weeks
                  </p>
                  </th>
              </tr>
              <tr>
              <td>
                  <p><a class="freetrial-trigger hounslow">Saturday 9.30am-10.30am</a></p>
                  </td>
                  <td>
                  <p>9-12 year olds</p>
                  </td>
              </tr>
              <tr>
                  <td>
                  <p><a class="freetrial-trigger hounslow">Saturday 10.30am-11.30am</a></p>
                  </td>
                  <td>
                  <p>4-6 year olds</p>
                  </td>
              </tr>
              <tr>
                  <td>
                  <p><a class="freetrial-trigger hounslow">Saturday 11.30am - 12.30pm</a></p>
                  </td>
                  <td>
                  <p>6-8 year olds</p>
                  </td>
              </tr>
              <tr>
                  <td>
                  <p><a class="freetrial-trigger hounslow">Saturday 12.30pm - 1.30pm</a></p>
                  </td>
                  <td>
                  <p>4-6 year olds</p>
                  </td>
              </tr>
          </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger hounslow">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/Hounslow/" target="_blank" >Visit Hounslow Website</a>
          </p> 
      </div> 
    </div>

<div id="hounslow-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Hounslow Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Hounslow Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="4264" title="Free trial form_wmf_Hounslow"]');
   echo get_blog_option( '42', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

  <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Teddington Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/twickenham.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Teddington Lock Sports Campus, Broom Road, Teddington
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:tw@wemakefootballers.com">tw@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:02071481602">+020 7148 1602</a>

            </p>
         <div class="middle content">
             <div class="header">Teddington</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Teddington Academy
          </div> 
          <table class="table table-hover">
              <tbody>
                <tr>
                <th colspan="2">weekly training<br>
                £87.50 per 10 weeks</th>
                </tr>
                <tr>
                <td><a class="freetrial-trigger teddington">Monday 5.00pm-6.00pm</a></td>
                <td>4 – 7 year olds</td>
                </tr>
                <tr>
                <td><a class="freetrial-trigger teddington">Monday 6.00pm-7.00pm</a></td>
                <td>8 – 12 year olds</td>
                </tr>
                <tr>
                <td><a class="freetrial-trigger teddington">Saturday 9.00am-10.00am</a></td>
                <td>8 – 12 year olds</td>
                </tr>
                <tr>
                <td><a class="freetrial-trigger teddington">Saturday 10.00am-11.00am</a></td>
                <td>4 – 7 year olds</td>
                </tr>
              </tbody>
            </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger teddington">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/Teddington/" target="_blank" >Visit Teddington Website</a>
          </p> 
      </div> 
    </div>

<div id="teddington-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Teddington Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Teddington Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="4265" title="Free trial form_wmf_Teddington"]'); 
   echo get_blog_option( '44', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Twickenham Academy
      </div>  
      <div class="ui large image">

          <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/richmond.jpg">

          <p class="wmf-card-address">
            <b><i class="home icon orange"></i>Address:</b> Orleans Park School, Richmond Rd, Twickenham
            <br>
            <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:tw@wemakefootballers.com">tw@wemakefootballers.com</a>
            <br>
            <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:02071481602">+020 7142 1602</a>

          </p>
         
         <div class="middle content">
             <div class="header">Twickenham</div>
         </div>
        
      </div>      
       <div class="description">
          <div class="ui header">
           <i class="university icon"></i>Twickenham Academy
          </div> 
          <table class="table table-hover" style="text-align:left;">
              <tr>
                  <th colspan="2">
                  <p>Weekly Training <br> &pound;75 per 10 weeks</p>
                  </th>
              </tr>
              <tr>
              <td>
                  <p><a class="freetrial-trigger twickenham">Saturday 9.30am-10.30am</a></p>
                  </td>
                  <td>
                  <p>8-12 year olds</p>
                  </td>
              </tr>
              <tr>
                  <td>
                  <p><a class="freetrial-trigger twickenham">Saturday 10.30am-11.30am</a></p>
                  </td>
                  <td>
                  <p>4-7 year olds</p>
                  </td>
              </tr>
              <tr>
                  <td>
                  <p><a class="freetrial-trigger twickenham">Saturday 12.30am-12.30pm</a></p>
                  </td>
                  <td>
                  <p>6-8 year olds</p>
                  </td>
              </tr>

          </table>
          <p class="btn_footer">
              <button class="ui orange button freetrial-trigger twickenham">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/twickenham/" target="_blank">Visit Twickenham Website</a>
          </p> 
      </div>
    </div>

<div id="twickenham-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Twickenham Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Twickenham Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="4243" title="Free trial form_wmf_twickenham"]');
   echo get_blog_option( '45', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

  <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Chiswick Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/chiswick.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Chiswick School, Burlington Lane, London
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:marcelo@wemakefootballers.com">marcelo@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:02036335022">+020 3633 5022</a>

            </p>
         <div class="middle content">
             <div class="header">Chiswick</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Chiswick Academy
          </div> 
         <table class="table table-hover">
                  <tbody>
                    <tr>
                  <th colspan="2">
                  <p>weekly training<br>
                     £70 per 10 weeks</p>
                  </th>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger chiswick">Monday 5.00-6.00pm</a></p>
                  </td>
                  <td>
                  <p>4 – 7 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger chiswick">Monday 6.00-7.00pm</a></p>
                  </td>
                  <td>
                  <p>8 – 12 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger chiswick">Thursday 4.55-5.55pm</a></p>
                  </td>
                  <td>
                  <p>4 – 7 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger chiswick">Thursday 5.55-6.55pm</a></p>
                  </td>
                  <td>
                  <p>8 – 12 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger chiswick">Saturday 9.30-10.30am</a></p>
                  </td>
                  <td>
                  <p>4 – 7 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger chiswick">Saturday 10.30-11.30am</a></p>
                  </td>
                  <td>
                  <p>4 – 7 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger chiswick">Saturday 11.30am-12.30pm</a></p>
                  </td>
                  <td>
                  <p>8 – 12 year olds</p>
                  </td>
                  </tr>
          </tbody>
        </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger chiswick">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/Chiswick/" target="_blank" >Visit Chiswick Website</a>
          </p> 
      </div> 
    </div>

<div id="chiswick-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Chiswick Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Chiswick Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="4266" title="Free trial form_wmf_Chiswick"]');
   echo get_blog_option( '46', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Carshalton South Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/carshalton-2.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Stanley Park High School, Damson Way, Carshalton, Surrey
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:simon@wemakefootballers.com">simon@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:07850264636">078 5026 4636</a>

            </p>
         <div class="middle content">
             <div class="header">Carshalton South</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Carshalton South Academy
          </div> 
         <table class="table table-hover">
                  <tbody>
                    <tr>
                  <th colspan="2">
                  <p>weekly training<br>
                     £70 per 10 weeks</p>
                  </th>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger carshalton-south">Thursday 6.30pm-7.30pm</a></p>
                  </td>
                  <td>
                  <p>8–12 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger carshalton-south">Thursday 5.30pm-6.00pm</a></p>
                  </td>
                  <td>
                  <p>4–7 year olds</p>
                  </td>
                  </tr>
                  
          </tbody>
        </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger carshalton-south">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/Carshalton-south/" target="_blank" >Visit Carshalton South Website</a>
          </p> 
      </div> 
    </div>

<div id="carshalton-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Carshalton South Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Carshalton South Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="4267" title="Free trial form_wmf_Carshalton_south"]');
   echo get_blog_option( '47', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->
    
    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Richmond Academy
      </div>  
        <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/sheen.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Christ School, Queens Rd, Richmond upon Thames, Surrey
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:tayeb@wemakefootballers.com">tayeb@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel: 02036331789">+020 3633 1789</a>
            </p>
         
         <div class="middle content">
             <div class="header">Richmond</div>
         </div>
        
        </div>
     <div class="description">
        <div class="ui header">
         <i class="university icon"></i>Richmond Academy
        </div> 
        <table class="table table-hover" style="text-align:left;">
            <tr>
                <th colspan="2">
                <p>Weekly Training <br> £70 per 10 weeks</p>
                </th>
            </tr>
            <tr>
            <td>
                <p><a class="freetrial-trigger richmond">Wednesday 5.00pm-6.00pm</a></p>
                </td>
                <td>
                <p>4-7 year olds</p>
                </td>
            </tr>
            <tr>
                <td>
                <p><a class="freetrial-trigger richmond">Wednesday 5.00pm-6.00pm</a></p>
                </td>
                <td>
                <p>8-12 year olds</p>
                </td>
            </tr>

        </table>
        
        <p class="btn_footer">
            
            <button class="ui orange button freetrial-trigger richmond">Book Trial Online</button>
            <a class="ui basic black button" href="https://www.wemakefootballers.com/richmond/" target="_blank">Visit Richmond Website</a>
            </p> 
      </div> 
    </div>

<div id="richmond-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Richmond Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Richmond Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="4242" title="Free trial form_wmf_Richmond"]');
   echo get_blog_option( '48', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Southall Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/southall.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Villiers High School, Boyd Avenue, Southall, Middlesex
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:marcelo@wemakefootballers.com">marcelo@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:02036335022">+020 3633 5022</a>

            </p>
         <div class="middle content">
             <div class="header">Southall</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Southall Academy
          </div> 
         <table class="table table-hover">
                  <tbody>
                    <tr>
                  <th colspan="2">
                  <p>weekly training<br>
                     £70 per 10 weeks</p>
                  </th>
                  </tr>          
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger southall">Tuesday 6.00pm-7.00pm</a></p>
                  </td>
                  <td>
                  <p>4–7 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger southall">Tuesday 7.00pm-8.00pm</a></p>
                  </td>
                  <td>
                  <p>8–12 year olds</p>
                  </td>
                  </tr>
          </tbody>
        </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger southall">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/Southall/" target="_blank" >Visit Southall Website</a>
          </p> 
      </div> 
    </div>

<div id="southall-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Southall Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Southall Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="4269" title="Free trial form_wmf_Southall"]');
   echo get_blog_option( '50', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Carshalton Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/woodcote-high-school.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Carshalton High School, West Street, Carshalton SM5 2QX
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:simon@wemakefootballers.com">simon@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:07850264636">+078 5026 4636</a>

            </p>
         <div class="middle content">
             <div class="header">Carshalton</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Carshalton Academy
          </div> 
         <table class="table table-hover">
                  <tbody>
                    <tr>
                  <th colspan="2">
                  <p>weekly training<br>
                     £70 per 10 weeks</p>
                  </th>
                  </tr>  
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger carshalton">Saturday 9.30am-10.30am</a></p>
                  </td>
                  <td>
                  <p>8–12 year olds</p>
                  </td>
                  </tr>        
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger carshalton">Saturday 10.30am-11.30am</a></p>
                  </td>
                  <td>
                  <p>4–7 year olds</p>
                  </td>
                  </tr>
          </tbody>
        </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger carshalton">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/Carshalton/" target="_blank" >Visit Carshalton Website</a>
          </p> 
      </div> 
    </div>

<div id="coulsdon-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Carshalton Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Carshalton Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   //  echo do_shortcode('[contact-form-7 id="4268" title="Free trial form_wmf_carshalton"]');
   echo get_blog_option( '51', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Coulsdon South Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2016/08/oasis-academy.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Oasis Academy Coulsdon, 50 Homefield Road, Coulsdon CR5 1ES
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:simon@wemakefootballers.com">simon@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:07850264636">+078 5026 4636</a>

            </p>
         <div class="middle content">
             <div class="header">Coulsdon South</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Coulsdon South Academy
          </div> 
         <table class="table table-hover">
                  <tbody>
                    <tr>
                  <th colspan="2">
                  <p>weekly training<br>
                     £70 per 10 weeks</p>
                  </th>
                  </tr>  
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger coulsdon-south">Friday 5.30pm-6.30pm</a></p>
                  </td>
                  <td>
                  <p>4–7 year olds</p>
                  </td>
                  </tr>        
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger coulsdon-south">Friday 6.30pm-7.30pm</a></p>
                  </td>
                  <td>
                  <p>8–12 year olds</p>
                  </td>
                  </tr>
          </tbody>
        </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger coulsdon">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/Coulsdon-south/" target="_blank" >Visit Coulsdon South Website</a>
          </p> 
      </div> 
    </div>

<div id="coulsdon-south-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Coulsdon South Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Coulsdon South Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   //  echo do_shortcode('[contact-form-7 id="4749" title="Free trial form_wmf_coulsdon_south"]'); 
   echo get_blog_option( '58', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Kingston Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2017/02/Kingston-Indoor-Venue-1.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Grey Court School, Ham St, Richmond TW10 7HN
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:tayeb@wemakefootballers.com">tayeb@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel: 02036331789">+020 3633 1789</a>

            </p>
         <div class="middle content">
             <div class="header">Kingston</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Kingston Academy
          </div> 
         <table class="table table-hover">
                  <tbody>
                    <tr>
                  <th colspan="2">
                  <p>weekly training<br>
                     £70 per 10 weeks</p>
                  </th>
                  </tr>         
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger kingston">Saturday 9.00am-10.00am</a></p>
                  </td>
                  <td>
                  <p>4–7 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger kingston">Saturday 10.00am-11.00am</a></p>
                  </td>
                  <td>
                  <p>8–12 year olds</p>
                  </td>
                  </tr> 
          </tbody>
        </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger kingston">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/Kingston/" target="_blank" >Visit Kingston Website</a>
          </p> 
      </div> 
    </div>

<div id="kingston-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Kingston Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Kingston Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   //  echo do_shortcode('[contact-form-7 id="4270" title="Free trial form_wmf_Kingston"]'); 
   echo get_blog_option( '54', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Sunbury Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2017/03/Ashford-825x510.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Bishop Wand School, Layton's Lane, Sunbury-on-Thames TW16 6LT
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:iuri@wemakefootballers.com">iuri@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:07875529306">+07875 529 306</a>

            </p>
         <div class="middle content">
             <div class="header">Sunbury</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Sunbury Academy
          </div> 
         <table class="table table-hover">
                  <tbody>
                    <tr>
                  <th colspan="2">
                  <p>weekly training<br>
                     £70 per 10 weeks</p>
                  </th>
                  </tr>         
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger sunbury">Saturday 9.30am-10.30am</a></p>
                  </td>
                  <td>
                  <p>8–12 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger sunbury">Saturday 10.30am-11.30am</a></p>
                  </td>
                  <td>
                  <p>4–7 year olds</p>
                  </td>
                  </tr> 
          </tbody>
        </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger sunbury">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/sunbury/" target="_blank" >Visit Sunbury Website</a>
          </p> 
      </div> 
    </div>

<div id="sunbury-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Sunbury Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Sunbury Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   //  echo do_shortcode('[contact-form-7 id="4271" title="Free trial form_wmf_sunbury"]');
   echo get_blog_option( '56', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Finchley Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="https://www.wemakefootballers.com/wp-content/uploads/2017/09/Christ-College-Finchley.jpeg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Christ's College Finchley, East End Road, London, N2 0SE
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:michael@wemakefootballers.com">michael@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:07718990849"> 077 1899 0849 </a>

            </p>
         <div class="middle content">
             <div class="header">Finchley</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Finchley Academy
          </div> 
         <table class="table table-hover">
                  <tbody>
                    <tr>
                  <th colspan="2">
                  <p>weekly training<br>
                     £70 per 10 weeks</p>
                  </th>
                  </tr>         
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger finchley">Wednesday 6.00pm-7.00pm</a></p>
                  </td>
                  <td>
                  <p>4–7 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger finchley">Wednesday 7.00pm-8.00pm</a></p>
                  </td>
                  <td>
                  <p>8–12 year olds</p>
                  </td>
                  </tr> 
          </tbody>
        </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger finchley">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/finchley/" target="_blank" >Visit Finchley Website</a>
          </p> 
      </div> 
    </div>


<div id="finchley-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Finchley Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Finchley Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   //  echo do_shortcode('[contact-form-7 id="4699" title="Free trial form_wmf_finchley"]'); 
   echo get_blog_option( '57', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

    <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Milton Keynes Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="http://www.wemakefootballers.com/wp-content/uploads/2018/03/dev_H6764_IMG_02.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Fairfields Primary School, Apollo Avenue. Fairfields, Milton Keynes, MK11 4BA
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:russell@wemakefootballers.com">russell@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:01908011442"> 01908 011 442 </a>

            </p>
         <div class="middle content">
             <div class="header">Milton Keynes</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Milton Keynes Academy
          </div> 
         <table class="table table-hover">
                  <tbody>
                    <tr>
                  <th colspan="2">
                  <p>weekly training<br>
                     £70 per 10 weeks</p>
                  </th>
                  </tr>         
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger milton-keynes">Wednesday 5.00pm-6.00pm</a></p>
                  </td>
                  <td>
                  <p>4–7 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger milton-keynes">Wednesday 6.00pm-7.00pm</a></p>
                  </td>
                  <td>
                  <p>8–12 year olds</p>
                  </td>
                  </tr> 
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger milton-keynes">Sunday 10.00am-11.00am</a></p>
                  </td>
                  <td>
                  <p>4–7 year olds</p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <p><a class="freetrial-trigger milton_keynes">Sunday 11.00am-12.00pm</a></p>
                  </td>
                  <td>
                  <p>8–12 year olds</p>
                  </td>
                  </tr> 
          </tbody>
        </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger milton-keynes">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/milton-keynes/" target="_blank" >Visit Milton Keynes Website</a>
          </p> 
      </div> 
    </div>

<div id="milton-keynes-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Milton Keynes Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Milton Keynes Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="5948" title="Free trial form_wmf_milton_keynes"]');  
   echo get_blog_option( '59', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->

     
   <div class="image content">
      <div class="ui header">
        <i class="university icon"></i>Beckenham Academy
      </div>  
       <div class="ui large image">

            <img class="image" src="http://www.wemakefootballers.com/wp-content/uploads/2018/04/regular_Harris_-_Sports_Hall_th.jpg">

            <p class="wmf-card-address">
              <b><i class="home icon orange"></i>Address:</b> Harris Academy Beckenham, Manor Way, Beckenham, BR3 3SJ
              <br>
              <b><i class="mail icon orange"></i>Email:</b> <a href="mailto:amir@wemakefootballers.com">amir@wemakefootballers.com</a>
              <br>
              <b><i class="call square icon orange"></i>Phone:</b> <a href="tel:07878770606">+4478 7877 0606</a>

            </p>
         <div class="middle content">
             <div class="header">Beckenham</div>
         </div>
        
        </div>
     <div class="description">
 
          <div class="ui header">
           <i class="university icon"></i>Beckenham Academy
          </div> 
          <table class="table table-hover" style="text-align:left;">
              <tr>
                  <th colspan="2">
                  <p>Weekly Training <br> &pound;70 per 10 weeks
                  </p>
                  </th>
              </tr>
              <tr>
              <td>
                  <p><a class="freetrial-trigger beckenham">Saturday 9.30am-10.30am</a></p>
                  </td>
                  <td>
                  <p>4-7 year olds</p>
                  </td>
              </tr>
              <tr>
                  <td>
                  <p><a class="freetrial-trigger beckenham">Saturday 10.30am-11.30am</a></p>
                  </td>
                  <td>
                  <p>8-12 year olds</p>
                  </td>
              </tr>
          </table>
          
          <p class="btn_footer">
              <button class=" ui orange button freetrial-trigger beckenham">Book Trial Online</button>
              <a class="ui basic black button" href="https://www.wemakefootballers.com/beckenham/" target="_blank" >Visit Beckenham Website</a>
          </p> 
      </div> 
    </div>

<div id="beckenham-form" class="innerform">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
<input type="hidden" name="class_name" value="Beckenham Academy" id="className">
        <button type="button" class="close" data-dismiss="modal"><img src="https://www.wemakefootballers.com/wp-content/themes/wmf/assets/img/close_icon_white.png"></button>
        <h4 class="modal-title">Book Your Free Trial</h4>
        <h4 class="modal-title">@ Beckenham Academy</h4>
      </div>
      <div class="triangle-down"></div>
      <div class="modal-body">
<!--form start -->
   <?php 
   // echo do_shortcode('[contact-form-7 id="6113" title="Free trial form_wmf_beckenham"]');  
   echo get_blog_option( '60', 'embed_code' ); // microsite id + option name for active campaign form code
   ?>
   </div>
   </div>
</div>
<!-- form end -->


</div>
</div><!-- modal setup END -->
    
<!--Main content -->
<div id="bg">

<div id="wmf-cards" class="ui link cards">
  <div class="card open-london">
    <div class="image">
    
    </div>
    <div class="middle content">
      <div class="header">South England</div>
      <div class="description">
          <span>
            <i class="university icon"></i>
              13 Academies
          </span>
      </div>
    </div>
    <div class="extra content" style="text-align:center;">
      <button class="ui inverted orange button open-london">View South England Academies</button>

    </div>
  </div>
  <div class="card open-manchester">
    <div class="image">
    </div>
    <div class="middle content">
      <div class="header">North West<br>England</div>
      <div class="description" style="margin: 10px 8px 0 -14px;">
        <span>
        <i class="university icon"></i>
        1 Academy
      </span>
      </div>
    </div>
    <div class="extra content" style="text-align:center;">
      <button class="ui inverted orange button open-manchester">View North West England</button>
    </div>
  </div>
</div>
</div>