<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
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
<?php global $ts_theme_option; ?>
<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'twentyseventeen' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'twentyseventeen'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => twentyseventeen_get_svg( array( 'icon' => 'mail-reply' ) ) . __( 'Reply', 'twentyseventeen' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous', 'twentyseventeen' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>
	<?php
	endif;
	?>
	
	<div class="ts-hidden-area"> <!-- style="display: none;" --> 
		<?php
				//custom
			$ts_comment_title = $ts_theme_option['ts_comment_title'];
			$ts_comment_btn = $ts_theme_option['ts_comment_btn'];
			
			if ($ts_comment_title == 1){
				echo $ts_theme_option['ts_comment_title'];
			}
			
			if ($ts_comment_btn == 1){
				echo $ts_theme_option['ts_comment_btn'];
			}
		?>
	
	</div>
	
	<?php
	$comment_args = array( 
	'title_reply'=> $ts_comment_title,
	
	'fields' => apply_filters( 'comment_form_default_fields', array(
	
	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',   
	
	'email'  => '<p class="comment-form-email">' .
		'<label for="email">' .  __( 'Email' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
		'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.'</p>',

		'url'    =>  '<p class="comment-form-email">' .
		'<label for="url">' .  __( 'Website' ) . '</label> ' .
		'<input id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_website'] ) . '" size="30"' . $aria_req . ' />'.'</p>', ) ),

		'label_submit' => $ts_comment_btn

	);

	comment_form($comment_args); 
	?>

</div><!-- #comments -->
