<?php
/**
 * The template for displaying all single posts tristanbains
 *	Author : Nishan mazumder
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<div class="col-md-10 dork-content dork-text-pad">
					<!-- START image container -->
					<div class="header-img">
						<?php the_post_thumbnail(); ?>
					</div>
					<!-- END image container -->
					
					<!-- START text container -->
					<div class="container dork-text">
						<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content', get_post_format() );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
								) );

							endwhile; // End of the loop.
							?>
					
					</div>
					<!-- END text container -->
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<!-- / POST SECTION -->
		
		
		<!-- LATTEST POSTS SECTION -->
		
		
		
		<?php $orig_post = $post;
			global $post;
			$categories = get_the_category($post->ID);
			if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
			$args=array(
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=> 2, // Number of related posts that will be shown.
			'caller_get_posts'=>1
			);
			$my_query = new wp_query( $args );
			if( $my_query->have_posts() ) {
			?>
			
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="container dork-lattest">
						<h3><?php echo $ts_theme_option['ts_related_pots_category'];?></h3>
						<div class="row">
						<?php while( $my_query->have_posts() ) {
							$my_query->the_post();?>
							<!-- START Lattest Box -->
							<div class="col-12 col-md-6">
								<a class="lattest-box" href="<?php the_permalink()?>">
									<div class="lattest-image d-flex">
										<div class="align-self-center">
											<?php the_post_thumbnail(); ?>
										</div>
									</div>
									<div class="lattest-body">
										<h4 class="lattest-title pad-top-letest"><?php the_title(); ?></h4>
										<div class="read-more">Read More</div>
									</div>									
								</a>
							</div>
							<!-- END Lattest Box -->
							<?php
								}
								}
								}
								$post = $orig_post;
								wp_reset_query(); ?>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<!-- / LATTEST POSTS SECTION -->
		

<?php get_footer();
