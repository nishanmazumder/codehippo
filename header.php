<?php
/**
 * The header for our theme tristanbains
 * Author Nishan Mazumder
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<?php global $ts_theme_option; ?>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- google fonts -->
<link rel='stylesheet' id='googlefonts-Lato-OpenSans-css'  href='https://fonts.googleapis.com/css?family=Lato%3A100%2C100i%2C300%2C300i%2C400%2C400i%2C700%2C700i%2C900%2C900i%7COpen+Sans%3A300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%2C900i&#038;ver=4.8.1' type='text/css' media='all' />
<link rel='stylesheet' id='googlefonts-SourceSansPro-css'  href='https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A200%2C200i%2C300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i%2C900%2C900i&#038;ver=4.8.1' type='text/css' media='all' />
<link rel='stylesheet' id='open-sans-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.8.1' type='text/css' media='all' />
	
<?php wp_head(); ?>
<style type="text/css">
	.ts-other-page a{
		text-decoration: none !important;
	}
	nav{
		border-bottom: 1px solid <?php echo $ts_theme_option['ts_header_border_color'];?>;
	}
	.active a{
		color: <?php echo $ts_theme_option['ts_link_color_active'];?> !important;
		border-bottom: 0px solid transparent !important;
	}
	a {
		  color: <?php echo $ts_theme_option['ts_link_color'];?>;
	}
	a:hover {
		  color: <?php echo $ts_theme_option['ts_link_color_hover'];?>;
	}
	.ml-auto>li>a{color: <?php echo $ts_theme_option['ts_link_color'];?>;}
	.ml-auto>li>a:hover{color: <?php echo $ts_theme_option['ts_link_color_hover'];?> !important;}
	.read-more {
		  color: <?php echo $ts_theme_option['ts_link_color'];?>;
	}
	.bullet-list-img{
		display: inline-block !important;
		margin: 0px auto !important;
	}
	.read-more:hover{
		  color: <?php echo $ts_theme_option['ts_link_color_hover'];?>;
	}
	.ts-main-search-form input:focus {
		border-color: <?php echo $ts_theme_option['ts_link_color_hover'];?>;
	}
	.ts-main-search-form button{
		background-color: <?php echo $ts_theme_option['ts_link_color'];?>;
		color: #fff;
	}
	.ts-main-search-form button:hover{
		background-color: <?php echo $ts_theme_option['ts_link_color_hover'];?>;
	}
	.search-form .search-submit {
		background-color: <?php echo $ts_theme_option['ts_link_color'];?>;
	}
	input[type=submit]{
		background-color: <?php echo $ts_theme_option['ts_link_color'];?> !important;
		font-size: 18px !important;
	}
	input[type=submit]:hover {
		background-color: <?php echo $ts_theme_option['ts_link_color_hover'];?>;
	}
	input[type=text]:focus {
		border: 1px solid <?php echo $ts_theme_option['ts_link_color_hover'];?>;
	}
	aside .search-form .search-submit {
		background-color: <?php echo $ts_theme_option['ts_link_color'];?>;
	}
	
	.navbar-brand{
		top: <?php echo $ts_theme_option['ts_header_logo_spacing']['top'];?> !important;
		bottom: <?php echo $ts_theme_option['ts_header_logo_spacing']['bottom'];?>;
		left: <?php echo $ts_theme_option['ts_header_logo_spacing']['left'];?>;
		right: <?php echo $ts_theme_option['ts_header_logo_spacing']['right'];?>;
	}
	.navbar-brand img {
		height: <?php echo $ts_theme_option['ts_logo_dimensions']['height'];?>;
		width: <?php echo $ts_theme_option['ts_logo_dimensions']['width'];?>;
	}
	
	.dork-content li:before {
		  content: url('<?php echo $ts_theme_option['ts_feature_post_icon']['url'];?>');
		  margin: 4px 6px 0px -39px;
		  position: absolute;
		  top: 0px;
		  left: -2px;
		}
	.taco-logo img{  
		height: <?php echo $ts_theme_option['ts_footer_image_dimension']['height'];?> !important;
		width: <?php echo $ts_theme_option['ts_footer_image_dimension']['width'];?> !important;
		margin-top: <?php echo $ts_theme_option['ts_footer_image_spacing']['margin-top'];?> !important;
		margin-bottom: <?php echo $ts_theme_option['ts_footer_image_spacing']['margin-bottom'];?> !important;
		margin-left: <?php echo $ts_theme_option['ts_footer_image_spacing']['margin-left'];?> !important;
		margin-right: <?php echo $ts_theme_option['ts_footer_image_spacing']['margin-right'];?> !important;
	}
	
	.comment-notes{
		display: none;
	}
	.ts-hidden-area{
		display: none;
	}
		
<?php echo $ts_theme_option['ts-code-edit-css'];?>	

</style>
</head>

<body <?php body_class(); ?>>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<!-- Navbar -->
					<div class="container">
						<nav class="nav-reset-ts navbar-toggleable-md">	
							<!-- button -->
							<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
								<img src="<?php echo $ts_theme_option['ts_res_menu_icon']['url'];?>">
							</button>
							<!-- logo area get_stylesheet_directory_uri().'/static/file/img/logo.png' -->
							<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $ts_theme_option['ts_upload_logo']['url'];?>"></a>
							<?php
								wp_nav_menu( array(
									'menu'              => 'ts_main_menu',
									'theme_location'    => 'ts_main_menu',
									'depth'             => 0,
									'container'         => 'div',
									'container_class'   => 'menu-navbar-container collapse navbar-collapse',
									'container_id'      => 'navbarNav',
									'menu_class'        => 'menu navbar-nav ml-auto',
									'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
									'walker'            => new WP_Bootstrap_Navwalker())
								);
							?>
						</nav>
					</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	
<!-- <div id="page" class="site">
	<div class="site-content-contain">
		<div id="content" class="site-content">
 -->