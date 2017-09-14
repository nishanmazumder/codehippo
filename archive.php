<?php
/**
 * The template for displaying archive pages tristanbains
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<!-- <php if ( have_posts() ) : ?>
		<header class="page-header">
			<php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header>.page-header
	<php endif; ?> -->

	<!-- POST SECTION -->		
		<div id="post-9582" class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 dork-content dork-text-pad">
					<!-- START text container -->
					<div class="container dork-text">
						<?php
							if ( have_posts() ) : ?>
								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/post/content', 'tscategory' );

								endwhile;

								the_posts_pagination( array(
									'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
								) );

							else :

								get_template_part( 'template-parts/post/content', get_post_format() );

							endif; ?>
					</div>
					
					<!-- END text container -->
					<!-- <ul class="pagination justify-content-center"><li><span class='page-numbers button-dork current'>1</span></li><li><a class='page-numbers button-dork' href='http://okdork.com/category/growing-business/page/2/'>2</a></li><li><a class="next page-numbers button-dork" href="http://okdork.com/category/growing-business/page/2/">NEXT</a></li></ul>						
					 -->
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<!-- / POST SECTION -->

<?php get_footer();
