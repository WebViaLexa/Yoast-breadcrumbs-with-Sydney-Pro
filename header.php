<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Sydney
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php sydney_do_schema( 'html' ); ?>>

<?php do_action('sydney_before_site'); //Hooked: sydney_preloader() ?>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sydney' ); ?></a>

	<?php sydney_contact_info(); ?>

	<?php do_action('sydney_before_header'); //Hooked: sydney_header_clone() ?>	

	<header id="masthead" class="site-header" role="banner" <?php sydney_do_schema( 'header' ); ?>>
		<div class="header-wrap">
            <div class="<?php echo esc_attr( sydney_menu_container() ); ?>">
                <div class="row">
				<div class="col-md-4 col-sm-8 col-xs-12">
		        <?php if ( get_theme_mod('site_logo') ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" <?php sydney_do_schema( 'logo' ); ?> /></a>
		        <?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>	        
		        <?php endif; ?>
				</div>
				<div class="col-md-8 col-sm-4 col-xs-12">
					<div class="btn-menu"><i class="sydney-svg-icon"><?php sydney_get_svg_icon( 'icon-menu', true ); ?></i></div>
					<nav id="mainnav" class="mainnav" role="navigation" <?php sydney_do_schema( 'nav' ); ?>>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'sydney_menu_fallback' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php do_action('sydney_after_header'); ?>

	<div class="sydney-hero-area">
		<?php sydney_slider_template(); ?>
		<div class="header-image">
			<?php sydney_header_overlay(); ?>
			<?php $shop_thumb = get_the_post_thumbnail_url( get_option( 'woocommerce_shop_page_id' )); ?>
			<?php if ( ( get_theme_mod('front_header_type','slider') == 'image' && is_front_page() ) || (get_theme_mod('site_header_type') == 'image' && !is_front_page() ) || ( class_exists( 'Woocommerce' ) && is_shop() && !$shop_thumb  ) ) : ?>
				<img class="header-inner" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
			<?php endif; ?>		
		</div>
		<?php sydney_header_video(); ?>

		<?php do_action('sydney_inside_hero'); ?>
	</div>

	<?php do_action('sydney_after_hero'); ?>

	<?php if ( is_active_sidebar( 'sidebar-header' ) && get_theme_mod('activate_bh_widgets') && (!is_front_page() || ( is_front_page() && get_theme_mod('hide_bh_widgets') != 1 ) ) ) : ?>
    <div class="header-widgets">
	    <div class="container">
	        <?php dynamic_sidebar( 'sidebar-header' ); ?>
	    </div>
    </div>
    <?php endif; 
	
	?>    

	<div id="content" class="page-wrap">
		<div class="content-wrapper container">
			<div class="row">	

				
				
				
<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>		
				
