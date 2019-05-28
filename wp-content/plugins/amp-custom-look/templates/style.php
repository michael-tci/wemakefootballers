<?php
// Get content width
$content_max_width       = absint( $this->get( 'content_max_width' ) );

// Get template colors
$theme_color             = $this->get_customizer_setting( 'theme_color' );
$text_color              = $this->get_customizer_setting( 'text_color' );
$muted_text_color        = $this->get_customizer_setting( 'muted_text_color' );
$border_color            = $this->get_customizer_setting( 'border_color' );
$link_color              = $this->get_customizer_setting( 'link_color' );
$header_background_color = $this->get_customizer_setting( 'header_background_color' );
$header_color            = $this->get_customizer_setting( 'header_color' );
?>
/* Generic WP styling */

.alignright {
	float: right;
}

.alignleft {
	float: left;
}

.aligncenter {
	display: block;
	margin-left: auto;
	margin-right: auto;
}

.amp-wp-enforced-sizes {
	/** Our sizes fallback is 100vw, and we have a padding on the container; the max-width here prevents the element from overflowing. **/
	max-width: 100%;
	margin: 0 auto;
}

.amp-wp-unknown-size img {
	/** Worst case scenario when we can't figure out dimensions for an image. **/
	/** Force the image into a box of fixed dimensions and use object-fit to scale. **/
	object-fit: contain;
}

/* Template Styles */

.amp-wp-content,
.amp-wp-title-bar div {
	<?php if ( $content_max_width > 0 ) : ?>
	margin: 0 auto;
	max-width: <?php echo sprintf( '%dpx', $content_max_width ); ?>;
	<?php endif; ?>
}

body {
	background: <?php echo sanitize_hex_color( $theme_color ); ?>;
	color: #000;
	font-family: "Open Sans",sans-serif,arial;
	font-weight: 300;
	line-height: 1.75em;
}

p,
ol,
ul,
figure {
	margin: 0 0 1em;
	padding: 0;
}

a,
a:visited {
	color: <?php echo sanitize_hex_color( $link_color ); ?>;
}

a:hover,
a:active,
a:focus {
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
}

/* Quotes */

blockquote {
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
	background: rgba(127,127,127,.125);
	border-left: 2px solid <?php echo sanitize_hex_color( $link_color ); ?>;
	margin: 8px 0 24px 0;
	padding: 16px;
}

blockquote p:last-child {
	margin-bottom: 0;
}

/* UI Fonts */

.amp-wp-meta,

.amp-wp-title,
.wp-caption-text,
.amp-wp-tax-category,
.amp-wp-tax-tag,
.amp-wp-comments-link,
.amp-wp-footer p,
.back-to-top {
	font-family: "Open Sans",sans-serif,arial;
}

/* Header */


.amp-wp-header a {
	color: <?php echo sanitize_hex_color( $header_color ); ?>;
	text-decoration: none;
}

/* Site Icon */

.amp-wp-header .amp-wp-site-icon {
	/** site icon is 32px **/
	background-color: <?php echo sanitize_hex_color( $header_color ); ?>;
	border: 1px solid <?php echo sanitize_hex_color(  $header_color ); ?>;
	border-radius: 50%;
	position: absolute;
	right: 18px;
	top: 10px;
}

/* Article */

.amp-wp-article {
	font-weight: 400;
	margin: 1.5em auto;
	max-width: 840px;
	overflow-wrap: break-word;
	word-wrap: break-word;
	padding-left: 10px;
    padding-right: 10px;
}

/* Article Header */

.amp-wp-article-header {
	align-items: center;
	align-content: stretch;
	display: block;
	flex-wrap: wrap;
	justify-content: space-between;
	margin: 0 16px 0;
}

.amp-wp-title {
    color: #ee7925;
    display: block;
    text-transform: uppercase;
    font-size: 22px;
    font-weight: 700;
    line-height: 112%;
}

/* Article Meta */

.amp-wp-meta {
	display: inline-block;	
	font-size:20px;
	margin: 0;
	padding: 0;
}
.amp-wp-meta h3{
	margin:0px;
}
.amp-wp-article-header .amp-wp-meta:last-of-type {
	text-align: right;
}

.amp-wp-article-header .amp-wp-meta:first-of-type {
	text-align: left;
}

.amp-wp-byline amp-img,
.amp-wp-byline .amp-wp-author {
	display: inline-block;
	vertical-align: middle;
}

.amp-wp-byline amp-img {
	border: 1px solid <?php echo sanitize_hex_color( $link_color ); ?>;
	border-radius: 50%;
	position: relative;
	margin-right: 6px;
}

.amp-wp-posted-on {
	text-align: right;
}

/* Featured image */

.amp-wp-article-featured-image {
	margin: 0 0 1em;
}
.amp-wp-article-featured-image amp-img {
	margin: 0 auto;
}
.amp-wp-article-featured-image.wp-caption .wp-caption-text {
	margin: 0 18px;
}

/* Article Content */

.amp-wp-article-content {
	margin: 0 16px;
	font-size: 17px;
    line-height: 30px;
}

.amp-wp-article-content ul,
.amp-wp-article-content ol {
	margin-left: 1em;
}

.amp-wp-article-content amp-img {
	margin: 0 auto;
}

.amp-wp-article-content amp-img.alignright {
	margin: 0 0 1em 16px;
}

.amp-wp-article-content amp-img.alignleft {
	margin: 0 16px 1em 0;
}

/* Captions */

.wp-caption {
	padding: 0;
}

.wp-caption.alignleft {
	margin-right: 16px;
}

.wp-caption.alignright {
	margin-left: 16px;
}

.wp-caption .wp-caption-text {
	border-bottom: 1px solid <?php echo sanitize_hex_color( $border_color ); ?>;
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	margin: 0;
	padding: .66em 10px .75em;
}

/* AMP Media */

amp-carousel {
	background: <?php echo sanitize_hex_color( $border_color ); ?>;
	margin: 0 -16px 1.5em;
}
amp-iframe,
amp-youtube,
amp-instagram,
amp-vine {
	background: <?php echo sanitize_hex_color( $border_color ); ?>;
	margin: 0 -16px 1.5em;
}

.amp-wp-article-content amp-carousel amp-img {
	border: none;
}

amp-carousel > amp-img > img {
	object-fit: contain;
}

.amp-wp-iframe-placeholder {
	background: <?php echo sanitize_hex_color( $border_color ); ?> url( <?php echo esc_url( $this->get( 'placeholder_image_url' ) ); ?> ) no-repeat center 40%;
	background-size: 48px 48px;
	min-height: 48px;
}

/* Article Footer Meta */

.amp-wp-article-footer .amp-wp-meta {
	display: block;
}

.amp-wp-tax-category,
.amp-wp-tax-tag {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	margin: 1.5em 16px;
}

.amp-wp-comments-link {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	text-align: center;
	margin: 2.25em 0 1.5em;
}

.amp-wp-comments-link a {
	border-style: solid;
	border-color: <?php echo sanitize_hex_color( $border_color ); ?>;
	border-width: 1px 1px 2px;
	border-radius: 4px;
	background-color: transparent;
	color: <?php echo sanitize_hex_color( $link_color ); ?>;
	cursor: pointer;
	display: block;
	font-size: 14px;
	font-weight: 600;
	line-height: 18px;
	margin: 0 auto;
	max-width: 200px;
	padding: 11px 16px;
	text-decoration: none;
	width: 50%;
	-webkit-transition: background-color 0.2s ease;
			transition: background-color 0.2s ease;
}

/* AMP Footer */

.amp-wp-footer {
	background-color: #2c2c2c;
    padding-top: 42px;
    padding-bottom: 50px;
    border-top: 3px solid #a14909;
}

.amp-wp-footer .footer-menu-link{
	text-align: center;
}

.amp-wp-footer .footer-menu-link a{
	display:block;
    font-family: "Open Sans Condensed",sans-serif,arial;
    font-weight: 700;
    font-size: 14px;
    line-height: 25px;
    letter-spacing: .01em;
    text-transform: uppercase;
    color: #fff;
}
.amp-wp-footer .amp-social-share{
	text-align: center;
	padding-top: 35px;
	padding-bottom: 35px;
}
.amp-wp-footer .amp-social-share .icon{
    max-height: 30px;
    max-width: 30px;
    border-radius: 50%;
}
.amp-wp-footer .footer-menu-details{
	font-family: "Open Sans",sans-serif,arial;
    font-weight: 400;
    font-size: 13px;
    color: #676767;
    text-align: center;
}
.amp-wp-footer .footer-menu-details a{
	 color: #676767;
	 display: block;
}
.amp-wp-footer .footer-menu-details div{
    padding: 7% 5% 0;
}

.amp-wp-footer h2 {
	font-size: 1em;
	line-height: 1.375em;
	margin: 0 0 .5em;
}

.amp-wp-footer p {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .8em;
	line-height: 1.5em;
	margin: 0 85px 0 0;
}

.amp-wp-footer a {
	text-decoration: none;
}

.back-to-top {
	bottom: 1.275em;
	font-size: .8em;
	font-weight: 600;
	line-height: 2em;
	position: absolute;
	right: 16px;
}

.headerContent{
    background: #2c2c2c;
    padding: 15px 0 15px 15px;
    position: relative;
    text-align: center;
}
.headerContent .menuIcon{
    border: none;
    background: transparent;
    font-size: 1.5rem;
    position: absolute;
    left: 0;
    cursor: pointer;
    margin-top: 1.5%;
    outline: none;
    color: #fff;
}
  #sidebar {
    width: 250px;
    background-color: #212121;
  }
  #sidebar .amp-sidebar-image {
    line-height: 100px;
    vertical-align:middle;
  }      
  #sidebar li {
    padding: 8% 0 0 15%;
    list-style: none;
  }      
  #sidebar li a{
	text-decoration: none;
	text-transform: uppercase;
    color: #fff;
    font-size: 13px;
  }

  /*hide slider row*/
  .local-banner-carousel{
  	display: none;
  }

  .section{
  	text-align: center;
  }

  h4 {
    text-align: center;
    font-weight: 700;
    line-height: 153%;
    letter-spacing: 0;
    color: #f06d54;
    font-family: "Open Sans",sans-serif,arial;
  }
  .jsn-bootstrap3 a{
    border-bottom: 1px solid #02abc2;
    display: inline-block;
    color: #02abc2;
  }
  .jsn-bootstrap3 a:after{
    content: ">";
    margin-left: 10px;
  }
  .owl-theme{
  	display: none;
  }