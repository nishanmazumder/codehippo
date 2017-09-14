<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	
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
					<div class="container dork-text">
						<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/post/content', 'excerpt' );

								endwhile; // End of the loop.

								the_posts_pagination( array(
									'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
								) );

							else : ?>

								<p><?php echo $ts_theme_option['ts_serch_text'];?></p>
								<?php
									get_search_form(); 
								?>
								<h6 class="text-center"><?php echo $ts_theme_option['ts_search_back_home'];?>&nbsp;&nbsp;&nbsp;<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></h6>
								<?php
							endif;
							?>
						<!--Best articles area-->
						<h3><?php echo $ts_theme_option['ts_feature_post_title'];?></h3>
						<ul class="list-bullet">
						<?php 
							$posts = new WP_Query();
							$posts->query( "category_name='{feature-article}'&posts_per_page=10" );
							if($posts->have_posts()) :
								while ($posts->have_posts()) : $posts->the_post(); ?>
									<li>
										<a href="<?php the_permalink(); ?>" rel="noopener" data-wpel-link="internal">
											<?php the_title(); ?>
										</a>
									</li>
								<?php endwhile;        
							endif;
							wp_reset_postdata();
						?>	
						</ul>
					</div>
					
					<!-- END text container -->
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<!-- / POST SECTION -->

<?php get_footer();
