<?php
/**
 * Return custom class for the Logo
 */

function frannawp_custom_logo_class( $html ) {
    $html   =   str_replace( 'custom-logo-link', 'brand-logo', $html );
    return $html;
}
add_filter( 'get_custom_logo', 'frannawp_custom_logo_class' );