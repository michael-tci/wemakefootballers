<?php

if(!class_exists('Aq_Resize')) {
	require_once(get_theme_file_path( '/code/inc/aq_resizer.php'));
}

if(!function_exists('zo_image_resize')) {
    /**
     * This is just a tiny wrapper function for the class above so that there is no
     * need to change any code in your own WP themes. Usage is still the same :)
     * @param $url
     * @param null $width
     * @param null $height
     * @param null $crop
     * @param bool $single
     * @param bool $upscale
     * @return array|bool|string
     * @throws Aq_Exception
     * @throws Exception
     */
    function zo_image_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
        $aq_resize = Aq_Resize::getInstance();
        return $aq_resize->process( $url, $width, $height, $crop, $single, $upscale );
    }
}

?>
