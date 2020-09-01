<?php 
if( ! function_exists( 'frannawp_theme_footer' ) ):

    function frannawp_theme_footer() {
    ?>

        <div class="wrapper">
			<p class="copyright">
				<?php printf(
					/* translators: 1: Theme Name, 2: Author */
					 esc_html__( 'Theme %1$s by %2$s', 'frannawp' ), '<a target="_blank" href="'. esc_url( 'https://webthemevault.xyz/wp-themes/frannawp/' ) .'">'. esc_html( 'FrannaWP', 'frannawp' ) .'</a>', esc_html( 'Pitshou Kalombo' ) ); ?> 
				<span class="sep">|</span>
				<?php printf(
					/* translators: %: CMS Name */
					 esc_html__( 'Powered by %s', 'frannawp' ), esc_html__( 'WordPress', 'frannawp' ) ); ?>
			</p>
        </div>
        
    <?php
    }

endif;
add_action( 'frannawp_theme_footer_credit', 'frannawp_theme_footer' );