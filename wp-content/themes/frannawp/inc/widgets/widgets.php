<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Load Custom widgets files
 */
get_template_part( 'inc/widgets/widget-featured-left' );
get_template_part( 'inc/widgets/widget-featured-right' );
get_template_part( 'inc/widgets/widget-category-one' );
get_template_part( 'inc/widgets/widget-category-two' );
get_template_part( 'inc/widgets/widget-category-three-left' );
get_template_part( 'inc/widgets/widget-category-three-right' );
get_template_part( 'inc/widgets/sanitize-widgets' );

function frannawp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Right Sidebar', 'frannawp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'frannawp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Frontpage Left Featured Posts', 'frannawp' ),
			'id'            => 'frontpage-left-featured-posts',
			'description'   => esc_html__( 'Add widgets here. Add left featured content widget', 'frannawp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
    );
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Frontpage Right Featured Posts', 'frannawp' ),
			'id'            => 'frontpage-right-featured-posts',
			'description'   => esc_html__( 'Add widgets here. Add right featured content widget', 'frannawp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
    );

    register_sidebar(
		array(
			'name'          => esc_html__( 'Frontpage Category one', 'frannawp' ),
			'id'            => 'frontpage-category-one',
			'description'   => esc_html__( 'Add widgets here. Add category one widget', 'frannawp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
    );

    register_sidebar(
		array(
			'name'          => esc_html__( 'Frontpage Category two', 'frannawp' ),
			'id'            => 'frontpage-category-two',
			'description'   => esc_html__( 'Add widgets here. Add category two widget', 'frannawp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
    );

    register_sidebar(
		array(
			'name'          => esc_html__( 'Frontpage Category three Left', 'frannawp' ),
			'id'            => 'frontpage-category-three-left',
			'description'   => esc_html__( 'Add widgets here. Add category three widget', 'frannawp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Frontpage Category three Right', 'frannawp' ),
			'id'            => 'frontpage-category-three-right',
			'description'   => esc_html__( 'Add widgets here. Add category three widget', 'frannawp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_widget( 'frannawp_Category_One_Widget' );
	register_widget( 'frannawp_Category_Two_Widget' );
	register_widget( 'frannawp_Category_Three_Left_Widget' );
	register_widget( 'frannawp_Category_Three_Right_Widget' );
	register_widget( 'frannawp_Featured_Left_Widget' );
	register_widget( 'frannawp_Featured_Right_Widget' );
    
}
add_action( 'widgets_init', 'frannawp_widgets_init' );