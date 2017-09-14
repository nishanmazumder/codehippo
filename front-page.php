<?php
/**
 * The front page template file tristanbains
 *	Author : Nishan mazumder
 * If the user has selected a static page for their homepage, this is what will 
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">		
		<!-- BODY & POST SECTION -->		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 offset-md-1 dork-content dork-text-out">
					<!-- START text container -->
					<div class="container dork-text">
						<!--<h1>Best of OkDork</h1>-->
						<p class="ts-border-top">
						<?php echo $ts_theme_option['ts_header_text'];?>
						
						</p>
						<div class="home-latest">
							<h3 class="section-title"><?php echo $ts_theme_option['ts_post_title'];?></h3>
							<div class="row home-latest-posts">
								<?php
									$ts_post_item = new WP_Query(array(
										'post_type' 	=> 'post',
										'posts_per_page'=> 4
									)
								);
								while($ts_post_item -> have_posts()) : $ts_post_item -> the_post(); ?>

								<div class="home-latest-post col-12 col-md-6">
									<a href="<?php the_permalink(); ?>" class="post-link">
										<!-- <img src="" class="img-fluid post-image"> -->
										<?php the_post_thumbnail(); ?>
										<div class="post-body">
											<h4 class="post-title"><?php the_title(); ?></h4>
											<p class="post-excerpt">
												How do you make it big in a highly competitive industry? It’s not easy. Ben Mezrich failed 190 times before he succeeded. But today, Ben’s unconventional thinking has led to MASSIVE success. Here’s what Ben is famous for… Writing the book The Accidental Billionaire — which became The Social Network, one of the best movies of all-time...
											</p>
											<div class="post-more">Read More</div>
										</div>
									</a>
								</div>
								<?php endwhile; ?>	
							</div>
						</div>
					</div><!-- END  -->
				</div><!-- END -->
			</div>
		</div>
		
		
		<div class="clearfix"></div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 offset-md-1 dork-content">
					<div class="container dork-text">
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
				</div>
			</div>
		</div>
		
		<?php $newsletter_disply = $ts_theme_option['ts_newsletter_area_switch'];
		if ($newsletter_disply == 1 ){
		?>
		<!--Newsletter-->
		<div class="container-fluid dork-content">
			<div class="row">
				<div class="col-md-10 offset-md-1 dork-text">
					<div class="container">
						<h4 class="text-left"><?php echo $ts_theme_option['ts_newsletter_title'];?></h4>
						<?php echo $ts_theme_option['ts_newsletter_area'];?>
								<!-- <div id="mc_embed_signup">
								<form action="//byethost5.us13.list-manage.com/subscribe/post?u=9e8cae7f98288f02afc12c5cc&amp;id=af59aa2891" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate dorkform form-inline justify-content-center" target="_blank" novalidate>
									<div id="mc_embed_signup_scroll">
									<label class="sr-only" for="mce-EMAIL">Subscribe to our mailing list</label>
									<input type="email" value="" name="EMAIL" class="email form-control mb-2 mr-sm-2 mb-sm-0 form-inline ts-form-input" id="mce-EMAIL" placeholder="Enter your Email" required>
									<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_9e8cae7f98288f02afc12c5cc_af59aa2891" tabindex="-1" value=""></div>
									
									<input type="submit" value="Bring it" name="subscribe" id="mc-embedded-subscribe" class="button button-dork-big ts-subscribe-btn">
									
									</div>
								</form>
								</div> -->
					</div>
				</div>
			</div>
		</div>	
		<div class="clearfix"></div>
		<?php } ?>
		
					
		<!--Category area-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 offset-md-1 dork-content">
					<div class="container dork-text">
						<h3><?php echo $ts_theme_option['ts_category_title'];?></h3>
						<ul class="blog-categories row">
							<?php
	
								$categories = get_categories( array(
									'orderby' => 'name',
									'order'   => 'ASC'
								) );
								 
								foreach( $categories as $category ) {
									$category_link = sprintf( 
										'<a href="%1$s" alt="%2$s">%3$s</a>',
										esc_url( get_category_link( $category->term_id ) ),
										esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
										esc_html( $category->name )
									);
									 
									echo '<li class="blog-category col-12 col-md-4">' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) . '</li> ';
								} 							
							?>
						</ul>
					
						<!--Archive area-->
						<?php $archieve_disply = $ts_theme_option['ts_archive_area_switch'];
						if ($archieve_disply == 1 ){ ?>
						<h3><?php echo $ts_theme_option['ts_archives_title'];?></h3>
						<p><a action="_blank" href="<?php echo $ts_theme_option['ts_archives_link'];?>">Browse the full archive</a></p>
						<p>&nbsp;</p>
						<?php }?>
						<p><strong><?php echo $ts_theme_option['ts_search_head_line'];?></strong></p>
						<p><?php echo $ts_theme_option['ts_search_sub_line'];?></p>
						
						<form id="searchform" class="ts-main-search-form" action="<?php echo home_url( '/' ); ?>" method="get" style="max-width:100%;">
							<input class="form-inline" id="s" name="s" type="text" value="" size="50" placeholder="<?php echo $ts_theme_option['ts_search_place_holder'];?>" />
							<button id="searchsubmit" type="submit"><i class="fa fa-search"></i></button>
						</form>
						
						<p>&nbsp;</p>
						
					</div><!-- END text -->
				</div>
			</div>
		</div>
		
		<!-- POST SECTION  & BODY end-->
		
		<div class="clearfix"></div>
		
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
