<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package frannawp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<div id="overlay"></div>

	<button id="scroll-to-top">
		<i class="fas fa-fw fa-angle-up" aria-hidden="true"></i>
		<span class="screen-reader-text" aria-hidden="true"><?php esc_html__( 'Scroll to Top', 'frannawp' ); ?></span>
	</button>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'frannawp' ); ?></a>

	<div class="custom-header-container">
		<?php the_header_image_tag(); ?>
	</div>

	<div class="above-navigation">

		<div class="wrapper">

			<div class="site-branding">
				<?php
				 if( has_custom_logo() ):
					the_custom_logo();
				else:

					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$frannawp_description = get_bloginfo( 'description', 'display' );
					if ( $frannawp_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $frannawp_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<?php if( get_theme_mod( 'frannawp_header_advertisement_728x90_setting', false ) ): ?>

			<div class="advertisement">

				<?php
					$img_default	=	get_template_directory_uri() . '/dist/assets/images/sample-ads-blank.jpg';
					$img_link		=	get_theme_mod( 'frannawp_header_advertisement_728x90_url_setting', esc_url( home_url( '/' ) ) );
					$img_ad			=	get_theme_mod( 'frannawp_header_advertisement_728x90_img_setting', esc_url( $img_default ) );
				?>

				<?php if( $img_ad ) {?>
					<div class="advertisement-content">
						<a target="_blank" rel="nofollow" href="<?php echo esc_url( $img_link ); ?>"><img src="<?php echo esc_url( $img_ad ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="img-fluid"></a>
					</div>
				<?php } ?>

			</div><!-- .advertisement -->

			<?php endif; ?>

		</div>

	</div><!-- .above-navigation -->

	<header id="masthead" class="site-header">

		<div class="wrapper">

			<div class="nav-container">

				<nav id="navigation" class="navbar navbar-expand-lg site-navigation" role="navigation" aria-label="<?php esc_attr__( 'Main Navigation', 'frannawp' ); ?>">

					<button class="navbar-toggler menu-toggler-button" data-toggle="collapse" data-target="#mainNavigation">
						<i class="fas fa-bars menu-toggler-icon"></i>
					</button>

					<?php

						if( has_nav_menu( 'primary' ) ) {

							wp_nav_menu( array(
								'theme_location'		=>	'primary',
								'container'				=>	'div',
								'container_id'			=>	'mainNavigation',
								'container_class'		=>	'collapse navbar-collapse',
								'menu_class'			=>	'navbar-nav ml-auto',
								'depth'					=>	3,
								'fallback_cb'       	=> 'WP_Bootstrap_Navwalker::fallback',
								'walker'            	=> new WP_Bootstrap_Navwalker(),
							) );

						}
						
					?>

					<?php
						if ( get_theme_mod( 'frannawp_menu_cart_display_setting', false ) ) :
							if ( class_exists( 'WooCommerce' ) ) {
								frannawp_woocommerce_cart_link();
							}
						endif;
					?>
				</nav><!-- #navigation -->

			</div><!-- .nav-container -->

		</div><!-- .wrapper -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<div class="wrapper">
