<?php 

if ( ! function_exists( 'frannawp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function frannawp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on frannawp, use a find and replace
		 * to change 'frannawp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'frannawp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		//Custom Image Sizes
		add_image_size( 'frannawp-featured-image', 1000, 550, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary'   =>  esc_html__( 'Primary Menu', 'frannawp' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'frannawp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'frannawp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function frannawp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'frannawp_content_width', 800 );
}
add_action( 'after_setup_theme', 'frannawp_content_width', 0 );

/**
 * Add Theme Starter content
 */
if( ! function_exists( 'frannawp_starter_content_setup' ) ):

	function frannawp_starter_content_setup() {
		$starter_content = array(
			'widgets'     => array(
				'sidebar-1'                         => array(
					'search', 
					'recent-posts', 
					'categories', 
					'text_business_info', 
					'text_about',
				),
				'frontpage-left-featured-posts'    => array(
					'frontpage_featured_left',
					array(
						'featured_left_widget',
						array(
							'type'	=>	'latest'
						),
					),
				),
				'frontpage-right-featured-posts'     => array(
					'frontpage_featured_posts_right',
					array( 
						'featured_right_widget',
						array(
							'number'	=>	4,
						),
					),
				),
				'frontpage-category-one'     		=> array(
					'frontpage_category_one',
					array( 
						'category_one_widget',
						array(
							'title'		=>	'Sport News',
							'number'	=>	6,
						),
					),
				),
				'frontpage-category-two'     		=> array(
					'frontpage_category_two',
					array( 
						'category_two_widget',
						array(
							'title'		=>	'International News',
							'number'	=>	6,
						),
					),
				),
				'frontpage-category-three-left'     		=> array(
					'frontpage_category_3_left',
					array( 
						'category_3_left_widget',
						array(
							'title'		=>	'Health',
							'number'	=>	3,
						),
					),
				),
				'frontpage-category-three-right'     		=> array(
					'frontpage_category_3_right',
					array( 
						'category_3_right_widget',
						array(
							'title'		=>	'Fitness',
							'number'	=>	3,
						),
					),
				),
			),

			// Specify the core-defined pages to create and add custom thumbnails to some of them.
			'posts'       => array(
				'sample'            => array(
					'post_type'    	=> 'page',
					'post_title'   	=> esc_html__( 'Sample Page', 'frannawp' ),
				),
				'home'	=>	array(
					'template'	=>	'inc/templates/front-starter-content.php'
				),
				'contact',
				'blog',
				'about',
				// Create posts
				'ut-non-enim-eleifend-felis-vestibulum' => array(
					'post_type'    => 'post',
					'post_title'   => esc_html__( 'Ut non enim eleifend felis vestibulum', 'frannawp' ),
					'post_content' => esc_html__('Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Etiam iaculis nunc ac metus. In turpis. Pellentesque auctor neque nec urna. Praesent ac massa at ligula laoreet iaculis.', 'frannawp'),
					'thumbnail'    => '{{image-desk-coffee-cup.jpg}}',
				),
				'vestibulum-fringilla-pede-sit-amet' => array(
					'post_type'    => 'post',
					'post_title'   => esc_html__( 'Vestibulum fringilla pede sit amet', 'frannawp'),
					'post_content' => esc_html__( 'Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Etiam iaculis nunc ac metus. In turpis. Pellentesque auctor neque nec urna. Praesent ac massa at ligula laoreet iaculis.', 'frannawp'),
					'thumbnail'    => '{{image-desk-coffee-cup.jpg}}',
				),
				'vestibulum-fringilla-pede-eleifend-felis' => array(
					'post_type'    => 'post',
					'post_title'   => esc_html__( 'Vestibulum fringilla pede eleifend felis', 'frannawp'),
					'post_content' => esc_html__( 'Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Etiam iaculis nunc ac metus. In turpis. Pellentesque auctor neque nec urna. Praesent ac massa at ligula laoreet iaculis.', 'frannawp'),
					'thumbnail'    => '{{image-desk-coffee-cup.jpg}}',
				),
				'nam-quam-nunc-blandit-praesent-venenatis'           => array(
					'post_type'    => 'post',
					'post_title'   => esc_html__( 'Nam quam nunc blandit Praesent venenatis', 'frannawp' ),
					'post_content' => esc_html__( 'The cover block lets you add text on top of images or videos. This blocktype has several alignment options, and you can also align or center the text inside the block.', 'frannawp' ),
					'thumbnail'    => '{{image-desk-coffee-cup.jpg}}',
				),
				'nam-quam-nunc-blandit-vel-praesent' => array(
					'post_type'    => 'post',
					'post_title'   => esc_html__( 'Nam quam nunc blandit vel praesent', 'frannawp' ),
					'post_content' => esc_html__( 'Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Etiam iaculis nunc ac metus. In turpis. Pellentesque auctor neque nec urna. Praesent ac massa at ligula laoreet iaculis.', 'frannawp' ),
					'thumbnail'    => '{{image-desk-coffee-cup.jpg}}',
				),
				'praesent-venenatis-metus-at-tortor'           => array(
					'post_type'    => 'post',
					'post_title'   => esc_html__( 'Praesent venenatis metus at tortor', 'frannawp' ),
					'post_content' => esc_html__( 'Getting to know better the frannawp WordPress theme for your Blog. Use this to design a nice looking News or magazine website', 'frannawp' ),
					'thumbnail'    => '{{image-desk-coffee-cup.jpg}}',
				),
			),

			'theme_mods'		=>	array(
				'frannawp_header_advertisement_728x90_setting'		=>	false,
				'frannawp_header_advertisement_728x90_img_setting'	=>	'{{sample-ads-blank}}',
				'frannawp_header_advertisement_728x90_url_setting'	=>	esc_url( home_url( '/' ) )
			),

			'options'    => array(
				'blogname'        	=> ucfirst( 'frannawp' ),
				'blogdescription' 	=> ucfirst( 'frannawp' ) .' Theme Starter',
				'show_on_front' 	=> 'page',
				'page_on_front' 	=> '{{home}}',
				'page_for_posts' 	=> '{{blog}}',
			),

			// Create the custom image attachments used as post thumbnails for pages.
			'attachments' => array(
				'image-desk-coffee-cup.jpg'              	=> array(
					'post_title' => 'Ancient Architecture Coliseum',
					'file'       => 'dist/assets/images/image-desk-coffee-cup.jpg',
				),
				'image-desk-coffee-cup.jpg' 	=> array(
					'post_title' => 'Arc de triomphe',
					'file'       => 'dist/assets/images/image-desk-coffee-cup.jpg',
				),
				'sample-ads-blank'               			=> array(
					'post_title' => '728x90 Ad',
					'file'       => 'dist/assets/images/sample-ads-blank',
				)
			),

			// Set up nav menus for each of the two areas registered in the theme.
			'nav_menus'  	=> array(
				// Assign a menu to the "primary" location.
				'primary' 	=> array(
					'name'  => esc_html__( 'Primary', 'frannawp' ),
					'items' => array(
						'page_home'		=>	array(
							'type'		=>	'post_type',
							'object'	=>	'page',
							'object_id'	=>	'{{home}}',
						),
						'page_sample'   => array(
							'type'      => 'post_type',
							'object'    => 'page',
							'object_id' => '{{sample}}',
						),
						'page_blog',
						'page_about',
						'page_contact',
					),
				),
			),

		);
		$starter_content = apply_filters( 'frannawp_starter_content', $starter_content );

		add_theme_support( 'starter-content', $starter_content );
	}

endif;
add_action( 'after_setup_theme', 'frannawp_starter_content_setup' );
