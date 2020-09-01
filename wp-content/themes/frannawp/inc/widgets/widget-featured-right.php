<?php 

/**
 * Adds Class_Widget widget.
 */
class frannawp_Featured_Right_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'featured_right_widget', // Base ID
			esc_html__( 'Right Featured Posts', 'frannawp' ), // Name
			array( 'description' => esc_html__( 'Display Post Beside Main Featured Post in frontpage', 'frannawp' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        global $post;

        $title      = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $number     = ! empty( $instance['number'] ) ? $instance['number'] : 4 ;
        $type       = isset( $instance['type'] ) ? $instance['type'] : 'latest';
        $category   = isset( $instance['category'] ) ? $instance['category'] : '';

        $args_featured_left = array(
            'posts_per_page'      => 4,
            'post_type'           => 'post',
        );

        // Display from chosen category.
        if ( $type == 'category' ) {
            $args_featured_left['category__in'] = $category;
        }

        $post_featured_left   =   new WP_Query( $args_featured_left );
    ?>

    <!-- Widget Featured Post Starts-->

    <?php if( $post_featured_left->have_posts() ): ?>

        <div class="frontpage-featured-posts-right">
            <div class="frontpage-featured-right-container">

                <?php while( $post_featured_left->have_posts() ): $post_featured_left->the_post(); ?>

                    <div class="frontpage-featured-right-content">
                        <div class="img-container">
                            <a href="<?php the_permalink(); ?>">
                                <?php if( has_post_thumbnail() ) :?>
                                    <?php frannawp_post_thumbnail(); ?>
                                <?php else: ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/dist/assets/images/image-desk-coffee-cup.jpg' ); ?>" alt="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="text-container">
                            <h3 class="entry-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="entry-meta">
                                <?php frannawp_posted_on();?>
                                &nbsp;
                                <span>
                                    <i class="fas fa-comments"></i><a href="<?php echo esc_url( get_comments_link( $post_ID ) ); ?>"><?php comments_number("0", "1", "%"); ?></a>
                                </span>
                            </div><!-- .entry-meta -->
                        </div>
                    </div>

                <?php endwhile; wp_reset_postdata(); ?>

            </div>
        </div><!-- .frontpage-featured-posts-right -->

    <?php endif; ?>

    <!-- Widget Featured Post Ends -->

    <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
            $title      = ! empty( $instance['title'] ) ? $instance['title'] : '';
            $number     = ! empty( $instance['number'] ) ? $instance['number'] : 2 ;
            $type       = isset( $instance['type'] ) ? $instance['type'] : 'latest';
            $category   = isset( $instance['category'] ) ? $instance['category'] : '';
        ?>
        
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'frannawp' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of Posts:', 'frannawp' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>" min="2">
        </p>

        <p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'frannawp' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'frannawp' ); ?>
            <br />
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'frannawp' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>
        
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? frannawp_sanitize_widget_nohtml( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? frannawp_sanitize_widget_number( $new_instance['number'] ) : '';
		$instance['type'] = ( ! empty( $new_instance['type'] ) ) ? frannawp_sanitize_widget_select( $new_instance['type'] ) : '';
		$instance['category'] = ( ! empty( $new_instance['category'] ) ) ? frannawp_sanitize_widget_select( $new_instance['category'] ) : '';

		return $instance;
	}

}