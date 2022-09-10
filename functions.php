<?php
/**
 * creamel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package creamel
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'creamel_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function creamel_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on creamel, use a find and replace
		 * to change 'creamel' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'creamel', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'creamel' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'creamel_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'creamel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function creamel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'creamel_content_width', 640 );
}
add_action( 'after_setup_theme', 'creamel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function creamel_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'creamel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'creamel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
		'name'          => esc_html__( 'Wish_Compare', 'creamel' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'creamel' ),
		'before_widget' => '<div class="for-wc">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'creamel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function creamel_scripts() {
	wp_enqueue_style( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), false, true );

	wp_enqueue_style( 'creamel-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'creamel-style', 'rtl', 'replace' );

	wp_enqueue_script( 'creamel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'creamel_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function echo_phone_link() {$phone_mobile_link=get_field('phone', 30); echo '+'.preg_replace('/[^0-9]/', '', $phone_mobile_link);}

function do_excerpt($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
    array_pop($words);
  echo implode(' ', $words) . ' ...';
}

/* изменить дизайн под проект */
function true_load_objects(){
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
	query_posts( $args );
	if( have_posts() ) :
		while( have_posts() ): the_post();
?>
					<div class="col-lg-4 col-sm-6 col-12 mb-4">
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<div class="service_item">
								<div class="service_img"><?php the_post_thumbnail(''); ?></div>
								<div class="service_title"><span><?php echo the_title(); ?></span></div>
							</div>
						</a>
					</div>
<?php
		endwhile;
	endif;
	die();
}
add_action('wp_ajax_loadmore', 'true_load_objects');
add_action('wp_ajax_nopriv_loadmore', 'true_load_objects');


add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );}
add_action('init', 'so_38878702_remove_hook');
function so_38878702_remove_hook()
{
//remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_pagination', 10 );
//remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
add_action('woocommerce_after_shop_loop','woocommerce_result_count', 9);
//remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
}

//WooCommerce 3.4.5<br>//Уведомление о добавлении товара в корзину
add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message( $message ) {
    $message = ''; //здесь можно задать свой текст при добавлении товара в корзину, если оставите пустым то уведомление не будет выводиться
    return $message;
}

add_filter( 'woocommerce_product_subcategories_hide_empty', function() { return false; }, 10, 1 );
function wc_hide_selected_terms( $terms, $taxonomies, $args ) {
$new_terms = array();
if ( in_array( 'product_cat', $taxonomies ) && !is_admin() && is_shop() && is_home() && is_front_page() ) {
foreach ( $terms as $key => $term ) {
if ( ! in_array( $term->slug, array( 'uncategorized' ) ) ) {
$new_terms[] = $term;
}
}
$terms = $new_terms;
}
return $terms;
}
add_filter( 'get_terms', 'wc_hide_selected_terms', 10, 3 );
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
function iconic_cart_count_fragments( $fragments ) {
	if ( WC()->cart->get_cart_contents_count() > 0 ) {
		$fragments['span.basket-btn__counter'] = '<span class="basket-btn__counter">' . WC()->cart->get_cart_contents_count() . '</span>';
		return $fragments;   
	} else {
		$fragments['span.basket-btn__counter'] = '<span class="basket-btn__counter">' . WC()->cart->get_cart_contents_count() . '</span>';
		return $fragments;
	}
}
add_filter( 'woocommerce_pagination_args', 	'rocket_woo_pagination' );
function rocket_woo_pagination( $args ) {
	$args['prev_text'] = '<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.140381 11.8389L7.32788 19.0264C7.51507 19.2135 7.81829 19.2135 8.00544 19.0264C8.19263 18.8392 8.19263 18.5359 8.00544 18.3488L1.63587 11.9792L22.5208 11.9792C22.7857 11.9792 23 11.7649 23 11.5001C23 11.2352 22.7857 11.0209 22.5208 11.0209L1.63587 11.0209L8.00544 4.65136C8.19263 4.46417 8.19263 4.16094 8.00544 3.9738C7.91187 3.88023 7.78923 3.83342 7.66664 3.83342C7.54404 3.83342 7.42145 3.88023 7.32784 3.9738L0.140336 11.1613C-0.0468089 11.3484 -0.0468086 11.6517 0.140381 11.8389Z" fill="white"/></svg>';
	$args['next_text'] = '<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.8596 11.1611L15.6721 3.97364C15.4849 3.78645 15.1817 3.78645 14.9946 3.97364C14.8074 4.16083 14.8074 4.46406 14.9946 4.6512L21.3641 11.0208H0.479182C0.214322 11.0208 0 11.2351 0 11.4999C0 11.7648 0.214322 11.9791 0.479182 11.9791H21.3641L14.9946 18.3486C14.8074 18.5358 14.8074 18.8391 14.9946 19.0262C15.0881 19.1198 15.2108 19.1666 15.3334 19.1666C15.456 19.1666 15.5785 19.1198 15.6722 19.0262L22.8597 11.8387C23.0468 11.6516 23.0468 11.3483 22.8596 11.1611Z" fill="white"/></svg>';
	return $args;
}

function woo_hide_category_count() {
// No count
}
add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	}
	return $title;
}



function posts_on_blog( $query ) {
if ( is_category( array(29, 45) ) ) 
    {
        // If you want "posts per page"
        $query->query_vars['posts_per_page'] = 9;
        return;
    }
}
add_action( 'pre_get_posts', 'posts_on_blog' );

if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ){
function yith_wcwl_ajax_update_count(){
wp_send_json( array(
'count' => yith_wcwl_count_all_products()
) );
}
add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

function woocommerce_custom_add_to_cart_class ( $html, $product, $args ) {
    // Define the classes to be added
    $class_to_append = "added";
    // Check if product is in cart
    $in_cart = WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product->get_id() ) );
    if ( $in_cart != '' ) {
        // Append the extra class
        $args['class'] = $args['class']." {$class_to_append}";
        $html = sprintf( '<a href="/cart/" data-quantity="%s" class="%s" %s>Уже в корзине</a>',
//        $html = sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
//            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            esc_html( $product->add_to_cart_text() )
        );
    }
    // Return Add to cart button
    return $html;
}
add_filter( "woocommerce_loop_add_to_cart_link", "woocommerce_custom_add_to_cart_class", 10, 3 );

remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
function add_sku(){
global $product;
	if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
	<div class="product_meta">
		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
	</div>
	<?php endif;
}
add_filter( 'woocommerce_single_product_summary', 'add_sku', 6 );

function my_woocommerce_account_menu_items($items) {
    // unset($items['dashboard']);         // убрать вкладку Консоль
    // unset($items['orders']);             // убрать вкладку Заказы
     unset($items['downloads']);         // убрать вкладку Загрузки
    // unset($items['edit-address']);         // убрать вкладку Адреса
    // unset($items['edit-account']);         // убрать вкладку Детали учетной записи
    // unset($items['customer-logout']);     // убрать вкладку Выйти
    $items['dashboard'] = "Общая информация";
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'my_woocommerce_account_menu_items', 10 );
add_filter( 'woocommerce_product_description_heading', '__return_null' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );
add_filter( 'yikes_woocommerce_custom_repeatable_product_tabs_heading', '__return_null' );

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');
function translate_text($translated) {
$translated = str_ireplace('Подытог', 'Сумма', $translated);
return $translated;
}

add_filter( 'single_template', function ( $single_template ) {
    $parent     = '19'; //Change to your category ID
    $categories = get_categories( 'child_of=' . $parent );
    $cat_names  = wp_list_pluck( $categories, 'name' );
    if ( has_category( 'blog' ) || has_category( $cat_names ) ) {
        $single_template = dirname( __FILE__ ) . '/single-blog.php';
    }
    return $single_template;
}, PHP_INT_MAX, 2 );
/*
//Castom adminbar
if( 'Сollapse Toolbar' ){
	//
	// Сollapse ADMIN-BAR (Toolbar) into left-top corner
	// v 0.9
	//
	add_action( 'admin_bar_init', function(){
			remove_action( 'wp_head', '_admin_bar_bump_cb' ); // html margin bumps
			add_action( 'wp_before_admin_bar_render', 'kama_adminbar_styles' );
			//add_action( 'wp_after_admin_bar_render', 'set_adminbar_styles_show' );
	});
	function kama_adminbar_styles(){
			// Выходим если админка, можно закомментить...
			if( is_admin() ) return;
			ob_start();
			?>
			<style>
					#wpadminbar{ background:none; float:left; width:auto; height:auto; bottom:0; min-width:0 !important; }
					#wpadminbar > *{ float:left !important; clear:both !important; }
					#wpadminbar .ab-top-menu li{ float:none !important; }
					#wpadminbar .ab-top-secondary{ float: none !important; }
					#wpadminbar .ab-top-menu>.menupop>.ab-sub-wrapper{ top:0; left:100%; white-space:nowrap; }
					#wpadminbar .quicklinks>ul>li>a{ padding-right:17px; }
					#wpadminbar .ab-top-secondary .menupop .ab-sub-wrapper{ left:100%; right:auto; }
					html{ margin-top:0!important; }
					#wpadminbar{ overflow:hidden; width:33px; height:30px; }
					#wpadminbar:hover{ overflow:visible; width:auto; height:auto; background:rgba(102,102,102,.7); }
					#wp-admin-bar-<?= is_multisite() ? 'my-sites' : 'site-name' ?> .ab-item:before{ color:#797c7d; }
					#wp-admin-bar-wp-logo{ display:none; }
						#wp-admin-bar-search{ display:none; }
					body.admin-bar:before{ display:none; }
					@media screen and ( min-width: 782px ) {
							html.wp-toolbar{ padding-top:0 !important; }
							#wpadminbar:hover{ background:rgba(102,102,102,1); }
							#adminmenu{ margin-top:48px !important; }
					}
					#wpwrap .edit-post-header{ top:0; }
					#wpwrap .edit-post-sidebar{ top:56px; }
			</style>
			<?php
			$styles = ob_get_clean();
			echo preg_replace( '/[\n\t]/', '', $styles ) ."\n";
	}
}
*/
function theme_current_type_nav_class($css_class, $item) {
    static $custom_post_types, $post_type, $filter_func;
    if (empty($custom_post_types))
        $custom_post_types = get_post_types(array('_builtin' => false));
    if (empty($post_type))
        $post_type = get_post_type();
    if ('page' == $item->object && in_array($post_type, $custom_post_types)) {
        $css_class = array_filter($css_class, function($el) {
            return $el !== "current_page_parent";
        });
        $template = get_page_template_slug($item->object_id);
        if (!empty($template) && preg_match("/^page(-[^-]+)*-$post_type/", $template) === 1)
            array_push($css_class, 'current_page_parent');
    }
    return $css_class;
}
add_filter('nav_menu_css_class', 'theme_current_type_nav_class', 1, 2);

function sc50k_check_size_to_crop($size){
	$allowed_sizes = array('thumbnail', 'woocommerce_thumbnail', 'woocommerce_single', 'woocommerce_gallery_thumbnail', 'shop_catalog', 'shop_single', 'shop_thumbnail');
	if ( !in_array($size, $allowed_sizes) ){
		return false;
	} else {
		return true;
	}
}
/*
wp_deregister_script( 'buymaskedinput' );
add_action( 'wp_enqueue_scripts', 'true_include_myscript' );
function true_include_myscript() {
wp_enqueue_script('buymaskedinput', plugins_url() . '/buy-one-click-woocommerce/js/jquery.maskedinput.min.js', array('jquery'), null, true);
}

add_filter('show_admin_bar', '__return_true');
*/

add_filter('paginate_links', function($link) {
    $pos = strpos($link, 'page/1/');
    if($pos !== false) {
        $link = substr($link, 0, $pos);
    }
    return $link;
});

function remove_wc_image_sizes() {
    //remove_image_size( 'woocommerce_thumbnail' );
    //remove_image_size( 'woocommerce_single' );
    remove_image_size( 'thumbnail' );
    remove_image_size( 'alm-thumbnail' );
    remove_image_size( 'woocommerce_gallery_thumbnail' );
    remove_image_size( 'shop_catalog' );
    remove_image_size( 'shop_single' );
    remove_image_size( 'shop_thumbnail' );
    remove_image_size( 'shop_thumbnail' );
}
add_action('init', 'remove_wc_image_sizes');

function services() {
		// Регистрируем новый тип записи
		$labels = array(
			'name' => 'Услуги',
			'menu_name' => 'Услуги',
			'singular_name' => 'Услуга',
			'add_new' => 'Добавить Услугу',
			'menu_icon'   => 'dashicons-format-chat',
			'add_new_item' => 'Добавить новую услугу',
			'edit_item' => 'Редактировать услугу',
			'new_item' => 'Новая услуга',
			'all_items' => 'Все услуги',
			'view_item' => 'Смотреть услугу',
			'search_items' => 'Просмотр',
			'not_found' =>  'Не найдено',
			'not_found_in_trash' => 'В корзине пусто'
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 2,
			'show_in_rest' => true,
			'menu_icon'   => 'dashicons-format-chat',
			'supports' => array('title', 'editor', 'thumbnail', 'post-formats', 'excerpt')
		);
		register_post_type( 'services', $args );
	}
services();




