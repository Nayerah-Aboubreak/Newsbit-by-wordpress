<?php
/**
 * Load TGMPA Class File
 */
if ( ! file_exists( get_template_directory() . '/inc/class-tgm-plugin-activation.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-tgm-plugin-activation-missing', __( 'It appears the class-tgm-plugin-activation.php file may be missing.', 'frannawp' ) );
} else {
    // File exists... require it.
    get_template_part( 'inc/class-tgm-plugin-activation' );
}

/**
 * Plugin File Load
 */
function frannawp_register_required_plugins() {

    $plugins    =   array(
        
        array(
            'name'                  =>  'Regenerate Thumbnails',
            'slug'                  =>  'regenerate-thumbnails',
            'required'              =>  false
        )
    );

    $config = array(
		'id'           => 'frannawp-tgmpa',         
		'default_path' => '',                     
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,                   
		'dismissable'  => true,                   
		'dismiss_msg'  => '',                     
		'is_automatic' => false,                  
		'message'      => '',                     
	);

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'frannawp_register_required_plugins' );