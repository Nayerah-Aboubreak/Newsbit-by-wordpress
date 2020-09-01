<?php 
/**
 * Sanitization Functions for the Theme
 * 
 * @package frannawp
 * 
 */

/**
 * Sanitize Number input
 */
function frannawp_sanitize_widget_number( $number ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	
	return $number;
}

/**
 * Sanitize Select input, Radio input
 */
function frannawp_sanitize_widget_select( $input ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	return $input;
}

/**
 * Sanitize Text, Textarea, Password
 */
function frannawp_sanitize_widget_nohtml( $nohtml ) {
	return wp_filter_nohtml_kses( $nohtml );
}