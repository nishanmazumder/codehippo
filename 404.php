<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyseventeen' ); ?></h1>
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
							<img src="<?php echo $ts_theme_option['ts_404_img']['url'];?>" alt="" />
							<h5 class="text-left"><?php echo $ts_theme_option['ts_404_text'];?></h5>
							<h6 class="text-left error-pad"><?php echo $ts_theme_option['ts_search_back_home'];?>&nbsp;&nbsp;&nbsp;<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></h6>
								
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
