<?php
/**
 * The main template file
 * Author : Nishan mazumder
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap ts-content-blog">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- POST SECTION -->		
		<div id="post-9582" class="container">
			<div class="row">
				<div class="col-md-12 dork-content dork-text-pad">
					<!-- START text container -->
					<div class="container dork-text">
						<?php
							if ( have_posts() ) :

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

							endif;
							?>
					
					</div>
					<!-- END text container -->
					<!-- <ul class="pagination justify-content-center"><li><span class='page-numbers button-dork current'>1</span></li><li><a class='page-numbers button-dork' href='http://okdork.com/category/growing-business/page/2/'>2</a></li><li><a class="next page-numbers button-dork" href="http://okdork.com/category/growing-business/page/2/">NEXT</a></li></ul>						
					 -->
				</div>
			</div>
		</div>
		<!-- / POST SECTION -->

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
