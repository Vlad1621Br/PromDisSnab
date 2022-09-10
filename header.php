<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creamel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site <?php echo get_field('site_header'); ?>">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'creamel' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="head_top">
			<div class="container-fluid p-0">
				<div class="row row_bb">
					<div class="col-xl-2 col-lg-3 col-md-4 col-6"><?php the_custom_logo(); ?></div>
					<div class="col-xl-10 col-lg-9 col-md-8 col-6 d-flex align-items-center justify-content-between">
						<div class="head_address">
							<a href="mailto:<?php the_field( "mail", 2 ); ?>" class="contact_link align-items-xl-start align-items-center">
								<div class="d-flex align-items-center">
									<span class="icon-mail me-lg-3"></span>
									<span class="d-xl-block d-none"><?php the_field( "mail", 2 ); ?></span>
								</div>
								<div class="to_mail d-xl-block d-none">Написать нам</div>
							</a>
						</div>

						<div class="head_phone ms-3">
							<a href="tel:<?php the_field( "phone", 2 ); ?>" class="contact_link align-items-xl-start align-items-center">
								<div class="d-flex align-items-center">
									<span class="icon-phone me-lg-3"></span>
									<span class="d-xl-block d-none"><?php the_field( "phone", 2 ); ?></span>
								</div>
								<div class="to_phone d-xl-block d-none">Заказать звонок</div>
							</a>
						</div>	

						<div class="head_search mx-3">
							<?php echo do_shortcode('[fibosearch]'); ?>
						</div>


						<div class="head_messenger d-md-flex d-none">
							<?php if ( have_rows('messengers', 2) ) { 
							    while ( have_rows('messengers', 2) ) { 
								    the_row();?>              
									<a href="tel:<?php the_sub_field('link', 2); ?>" class="mess_link mx-2">
										<img src="<?php the_sub_field('icon', 2); ?>" >
									</a>
							<?php } } ?>
						</div>
				
						<?php
						if ( is_user_logged_in() ) {
							echo '<a href="/my-account/" class="d-flex mx-md-3 mx-2"><div class="icon-user mx-2"></div> Мой аккаунт</a>';
						} else {
							echo '<a href="/my-account/" class="d-flex mx-2"><div class="icon-user mx-2"></div> Вход / Регистрация</a>';
						}
						?>
						<div id="responsive-menu-button-2" class="">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="head_bottom d-xl-block d-none mb-3">
			<div class="container p-0">
				<div class="row">
					<div class="col-12 d-flex flex-row">		
					<nav id="site-navigation" class="main-navigation">
						<?php wp_nav_menu(array('theme_location' => 'menu-1','menu_id' => 'primary-menu',));?>
					</nav>
					<div class="menu-basket-wrap">	
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
						<div class="wish-wrapper ">
							<a href="/wishlist/" >
								<div class="icon-like"></div>
								<?php if( class_exists( 'YITH_WCWL' ) ){ $wishlist_count = YITH_WCWL()->count_products(); ?>
								<span class="wish-counter"><?php echo $wishlist_count; ?></span>
								<?php } ?>
							</a>
						</div>
						<div class="cart-wrapper">
							<div class="menu-basket">
								<?php global $woocommerce; ?>
								<a href="<?php echo $woocommerce->cart->get_cart_url() ?>" class="basket-btn d-flex flex-row" title="Товаров в корзине">
									<div class="icon-cart"> </div>
									<span class="basket-btn__counter ms-2"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>

								</a>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php if ( !is_front_page() && !is_home()) { ?>
	<section id="breadcrumbs">
		<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread_wrap mt-4 mb-4">
					<?php if(function_exists('bcn_display')) bcn_display(); ?>
				</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
	<section id="content">