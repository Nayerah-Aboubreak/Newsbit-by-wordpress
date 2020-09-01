<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package frannawp
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
if ( ! function_exists( 'frannawp_woocommerce_setup' ) ) :

    function frannawp_woocommerce_setup() {

        add_theme_support( 
            'woocommerce',
                array(
                    'thumbnail_image_width' =>  80,
                    'single_image_width'    =>  300,
                    'product_grid'          =>  array(
                        'default_rows'      =>  10,
                        'min_rows'          =>  1,
                        'max_rows'          =>  10,
                        'default_columns'   =>  4,
                        'min_columns'       =>  1,
                        'max_columns'       => 	4,
                    ),
                )
        );

        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

    }

endif;
add_action( 'after_setup_theme', 'frannawp_woocommerce_setup' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function frannawp_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'frannawp_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function frannawp_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'frannawp_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

if ( ! function_exists( 'frannawp_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function frannawp_woocommerce_wrapper_before() {
        ?>
            <div class="page-header woocommerce">
                <?php woocommerce_breadcrumb(); ?>
            </div>

            <div class="content-wrapper full">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'frannawp_woocommerce_wrapper_before' );

if ( ! function_exists( 'frannawp_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function frannawp_woocommerce_wrapper_after() {
		?>
					</main><!-- #main -->
				</div><!-- #primary -->
            </div><!-- .content-wrapper -->
            
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'frannawp_woocommerce_wrapper_after' );

if ( ! function_exists( 'frannawp_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function frannawp_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		frannawp_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'frannawp_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'frannawp_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function frannawp_woocommerce_cart_link() {
        ?>
        <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
            <div class="menu-cart-container" title="<?php esc_attr_e( 'View your Shopping cart', 'frannawp' ); ?>">
                <?php
                    $item_count_text = sprintf(
                        /* translators: number of items in the mini cart. */
                        _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'frannawp' ),
                        WC()->cart->get_cart_contents_count()
                    );
                ?>
                <i class="fas fa-cart-arrow-down"></i>&nbsp;
                <span class="cart-content-number"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
                    <span class="sep">|</span>
                <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
            </div><!-- .menu-cart-container -->
        </a>
		<?php
	}
}

if ( ! function_exists( 'frannawp_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function frannawp_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
        ?>
        <?php frannawp_woocommerce_cart_link(); ?>
        <?php if( ! is_checkout() && ! is_cart() ): ?>
            <ul id="site-header-cart" class="site-header-cart">
                <li>
                    <?php
                    $instance = array(
                        'title' => '',
                    );

                    the_widget( 'WC_Widget_Cart', $instance );
                    ?>
                </li>
            </ul>
        <?php endif; ?>
		<?php
	}
}





