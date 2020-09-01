<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frannawp
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$frannawp_comment_count = get_comments_number();
			if ( '1' === $frannawp_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'frannawp' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $frannawp_comment_count, 'comments title', 'frannawp' ) ),
					number_format_i18n( $frannawp_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'			=>	'ol',
						'short_ping'	=>	true,
						'avatar_size'	=>	45,
						'max_depth'		=>	'2'
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'frannawp' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$cmt_args			=	array(
		'fields'		=>	array(
			'author'	=>	'
				<div class="form-top-field">
					<div class="form-group">
						<label for="name">'.esc_html__( "Name*", "frannawp" ).'</label>
						<input type="text" name="author" id="name" class="form-control" placeholder="'.esc_attr__( 'Enter your Name', 'frannawp' ).'">
					</div>
			',
			'email'		=>	'
				<div class="form-group">
					<label for="email">'.esc_html__( "Email*", "frannawp" ).'</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="'.esc_attr__( 'Enter your Email', 'frannawp' ).'">
				</div>
			',
			'url'		=>	'
				<div class="form-group">
					<label for="url">'.esc_html__( "Website", "frannawp" ).'</label>
					<input type="url" name="url" id="url" class="form-control" placeholder="'.esc_attr__( 'Enter your Website', 'frannawp' ).'">
				</div>
			</div>
			',
		),
		'comment_field'	=>	'
			<div class="form-group">
				<textarea name="comment" id="comment" cols="30" rows="8" class="form-control" placeholder="'.esc_attr__( 'Your Comment*', 'frannawp' ).'"></textarea>
			</div>
		',
		'class_submit'		=>	'btn cmt-btn btn-2 read-more-btn btn-clear',
		'label_submit'		=>	esc_html__( 'Send Comment', 'frannawp' ),
		'title_reply'		=>	esc_html__( 'Leave a reply', 'frannawp' )
	);

	comment_form( $cmt_args );
	?>

</div><!-- #comments -->
