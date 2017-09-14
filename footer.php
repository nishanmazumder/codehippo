<?php
/**
 * The template for displaying the footer tristanbains
 * Author : Nishan mazumder
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

 global $ts_theme_option;
 
?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="dork-copyright text-left"><?php echo $ts_theme_option['ts_site_info']; ?></div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="taco-logo text-right"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive footer-logo" src="<?php echo $ts_theme_option['ts_footer_image']['url'];?>"></a></div>					
						</div> 
					</div>
				</div>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
