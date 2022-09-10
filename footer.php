<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creamel
 */

?>
	</section>
	<footer id="colophon" class="site-footer">
		<div class="container pb-96">
			<div class="row">
				<div class="col-lg-3 col-12 mb-5 order-1 footer_logo">
					<img src="/wp-content/themes/creamel/img/logo_footer.svg">
					<?php echo do_shortcode('[contact-form-7 id="198" title="Подписаться на новости"]'); ?>
					<?php /* $creamel_description = get_bloginfo( 'description', 'display' );
					if ( $creamel_description || is_customize_preview() ) :
					?>
					<div class="site-description"><?php echo $creamel_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<?php endif; */?>
				</div>
				<div class="col-lg-3 col-sm-6 col-12 ps-5 b_menu order-lg-2 order-3 txt_whblue">
					<div class="block-title">Каталог</div>
					<?php wp_nav_menu("menu=footer_catalog_menu"); ?>
				</div>
				<div class="col-lg-3 col-12 b_menu order-lg-3 order-2 mb-lg-0 mb-5 txt_whblue">
					<div class="block-title">Полезное</div>
					<?php wp_nav_menu("menu=footer_useful_menu"); ?>
				</div>
				<?php /*<div class="col-lg-7 col-12">
					<div class="row b_menu">
						<div class="col-md-3 mb-3 order-md-1 order-2">
							<div class="block-title">О компания</div>
							<?php wp_nav_menu(array('theme_location' => 'menu-company','menu_id' => 'company-menu',)); ?>
						</div>
						<div class="col-md-9 order-md-2 order-1">
							<div class="block-title">Услуги</div>
							<?php wp_nav_menu(array('theme_location' => 'menu-service','menu_id' => 'service-menu',)); ?>
						</div>
					</div>
				</div>*/?>
				<div class="col-lg-3 col-sm-6 col-12 order-4 txt_whblue">
					<div class="block-title">Контакты</div>
					<div class="b_contacts">
						<div class="b_mail"><?php echo get_field('mail', 30); ?></div>
						<div class="b_phone">
							<a href="tel:<?php the_field( "phone", 2 ); ?>" class="contact_link">
								<div class="d-flex align-items-center txt_white my-2">
									<span class="icon-phone-footer me-3"></span>
									<span class="d-block "><?php the_field( "phone", 2 ); ?></span>
								</div>								
							</a>
							<a href="address:<?php the_field( "address", 2 ); ?>" class="contact_link">
								<div class="d-flex align-items-center txt_white my-2">
									<span class="icon-address-footer me-3"></span>
									<span class="d-block "><?php the_field( "address", 2 ); ?></span>
								</div>								
							</a>
							<a href="time:<?php the_field( "time", 2 ); ?>" class="contact_link">
								<div class="d-flex align-items-center txt_white my-2">
									<span class="icon-time-footer me-3"></span>
									<span class="d-block "><?php the_field( "time", 2 ); ?></span>
								</div>								
							</a>
							<a href="mailto:<?php the_field( "mail", 2 ); ?>" class="contact_link">
								<div class="d-flex align-items-center txt_white my-2">
									<span class="icon-mail-footer me-3"></span>
									<span class="d-block "><?php the_field( "mail", 2 ); ?></span>
								</div>								
							</a>

						</div>
					</div>
					<div class="socials mt-4">
						<?php if(get_field('socials', 2)): ?>
						<?php $i=1;while(the_repeater_field('socials', 2)): ?>
						<?php if(get_sub_field('link')): ?>
						<a href="<?php echo get_sub_field('link'); ?>" target="_blank" class="me-3"><img src="<?php echo get_sub_field('icon'); ?>"></a>
						<?php endif; ?>
						<?php $i++;endwhile; ?>
						<?php endif; ?>
						<?php if ( have_rows('messengers', 2) ) { 
							while ( have_rows('messengers', 2) ) { the_row();?>              
								<a href="tel:<?php the_sub_field('link', 2); ?>" class="mess_link mx-2">
									<img src="<?php the_sub_field('icon', 2); ?>" >
								</a>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<div class="footer_bottom">
		<div class="site-info">
			<div class="container">
				<div class="row no-gutters py-4">
					<div class="col-lg-4 col-12 pb-lg-0 pb-3 px-md-0 txt_white footer_sitename">
						© <?php echo get_bloginfo('name'); ?> <?php echo date('Y'); ?>
					</div>
					<div class="col-lg-4 col-12 pb-lg-0 pb-3 text-center footer_dev">
						<div class="txt_white">Разработка сайта <a href="https://shulepov-code.ru/" class="txt_white" target="_blank"><strong>Shulepov_Code</strong></a></div>
					</div>
					<div class="col-lg-4 col-12 px-md-0 footer_site_pp">
						<a href="/politika-konfidencialnosti/" class="txt_white">Политика конфиденциальности</a>
					</div>
				</div>
			</div>
			<?php /*
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'creamel' ) ); ?>">
				<?php
				// translators: %s: CMS name, i.e. WordPress.
				printf( esc_html__( 'Proudly powered by %s', 'creamel' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				// translators: 1: Theme name, 2: Theme author.
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'creamel' ), 'creamel', '<a href="http://koyot.info">Serhii Ivanov</a>' );
			*/
				?>
		</div><!-- .site-info -->
	</div>
</div><!-- #page -->
<div class="fancybox-hidden" style="display:none">
	<div id="top_write">
		<?php echo do_shortcode('[contact-form-7 id="347" title="Задать вопрос (попап)"]'); ?>
	</div>
</div>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri() ?>/slick/slick.js" type="text/javascript"></script>
<link href="<?php echo get_template_directory_uri() ?>/slick/slick.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/slick/slick-theme.css" rel="stylesheet">
<script src="<?php echo get_template_directory_uri() ?>/js/main.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/wow.min.js"></script>
</body>
</html>
