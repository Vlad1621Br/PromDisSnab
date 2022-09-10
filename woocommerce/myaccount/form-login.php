<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set pb-5 row" id="customer_login">

	<div class="u-column1 offset-lg-4 col-lg-4 offset-md-3 col-md-6 col-12 login_block active">

<?php endif; ?>
		<div class="-bg_beige -p-3">
		<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text px-0" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>*" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text px-0" type="password" name="password" id="password" autocomplete="current-password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>*" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			</p>
			<p class="form-row">
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit w-100" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			</p>
			<div class="d-flex justify-content-between">
				<p class="woocommerce-LostPassword lost_password">
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
				</p>
				<p class="woocommerce-NewAccount new_cccount">
					<a href="#new_account" class="new_account"><?php esc_html_e( 'Регистрация', 'woocommerce' ); ?></a>
				</p>
			</div>
			<?php do_action( 'woocommerce_login_form_end' ); ?>
		</form>
		</div>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div class="u-column2 offset-lg-4 col-lg-4 offset-md-3 col-md-6 col-12 register_block">

		<div class="-bg_beige -p-3">
		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text px-0" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'Username', 'woocommerce' ); ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text px-0" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'Email address', 'woocommerce' ); ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text px-0" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit w-100" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<p class="woocommerce-NewAccount new_cccount">
				<a href="#login_account" class="login_account"><?php esc_html_e( 'Уже есть аккаунт', 'woocommerce' ); ?></a>
			</p>
			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>
		</div>

	</div>

</div>
<?php endif; ?>
<script>
jQuery(document).ready(function($){
	$('.new_account').click(function(event){
		event.preventDefault();
		$('.login_block').removeClass('active');
		$('.register_block').addClass('active');
	});
	$('.login_account').click(function(event){
		event.preventDefault();
		$('.register_block').removeClass('active');
		$('.login_block').addClass('active');
	});
});
</script>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
