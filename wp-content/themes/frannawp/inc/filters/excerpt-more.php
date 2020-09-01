<?php 
/**
 * Read More Link control
 */
function frannawp_excerpt_more_btn( $more ) {
    if( is_admin() ) {
        return $more;
    }
    return "";
}
add_filter( 'excerpt_more', 'frannawp_excerpt_more_btn' );