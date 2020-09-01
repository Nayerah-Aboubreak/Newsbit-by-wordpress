<?php
/**
 * Return a custom excerpt
 */
function frannawp_add_custom_excerpt( $length ) {
    if( is_admin() ) {
        return $length;
    }
    return 30;
}
add_filter( 'excerpt_length', 'frannawp_add_custom_excerpt' );