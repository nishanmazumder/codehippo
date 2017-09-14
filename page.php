<?php
/**
 * The template for displaying all pages tristanbains
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!-- POST SECTION -->		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 dork-content dork-text-out">
					<!-- START image container
					<div class="header-img ts-border-top-ot">
						<php the_post_thumbnail(); ?>
					</div>
					END image container -->
					
					<!-- START text container -->
					<div class="container dork-text ts-other-page">
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/page/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
					
					</div>
					<!-- END text container -->
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<!-- / POST SECTION -->


<?php get_footer();
