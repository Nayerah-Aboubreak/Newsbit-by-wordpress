<?php 
/**
 * Sanitization Functions for the Theme
 * 
 * @package frannawp
 * 
 */

/**
 * Sanitize Checkbox
 */
function frannawp_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * file input sanitization function
 */
function frannawp_sanitize_file_input( $file, $setting ) {
          
	//allowed file types
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
	);
	  
	//check file type from file name
	$file_ext = wp_check_filetype( $file, $mimes );
	  
	//if file has a valid mime type return it, otherwise return default
	return ( $file_ext['ext'] ? $file : $setting->default );
}

/**
 * Sanitize Number input
 */
function frannawp_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/**
 * Sanitize Select input, Radio input
 */
function frannawp_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize Text, Textarea, Password
 */
function frannawp_sanitize_nohtml( $nohtml ) {
	return wp_filter_nohtml_kses( $nohtml );
}