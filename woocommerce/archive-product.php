<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<div class="container">
	<div class="row">
		<!--
		<div class="col-lg-3 col-12">
			<div id="left-woo" class="mb-4">
				<div class="left-woo-title for_cat_list">Категории каталога</div>
				<?php // dynamic_sidebar( 'cat_menu_1' ); ?>
				<div class="left-woo-title for_filter">Фильтр</div>
				<?php // dynamic_sidebar( 'cat_menu_2' ); ?>
			</div>
		</div>
		-->
		<div class="col-lg-9 col-12">
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

 woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {

            /* Start my loop section */
            foreach( get_terms( array( 'taxonomy' => 'product_cat' ) ) as $category ) :
                $products_loop = new WP_Query( array(
                    'post_type' => 'product',

                    'showposts' => 1,

                    'tax_query' => array_merge( array(
                        'relation'  => 'AND',
                        array(
                            'taxonomy' => 'product_cat',
                            'terms'    => array( $category->term_id ),
                            'field'   => 'term_id'
                        )
                    ), WC()->query->get_tax_query() ),

                    'meta_query' => array_merge( array(

                    // You can optionally add extra meta queries here

                ), WC()->query->get_meta_query() )
            ) );

            ?>                      

            <h2 data-link="<?php echo get_term_link( (int) $category->term_id, 'product_cat' ); ?>"><?php echo $category->name; ?></h2>

            <?php
                while ( $products_loop->have_posts() ) {
                    $products_loop->the_post();
                    /**
                    * woocommerce_shop_loop hook.
                    *
                    * @hooked WC_Structured_Data::generate_product_data() - 10
                    */
                    do_action( 'woocommerce_shop_loop' );
                    wc_get_template_part( 'content', 'product' );
                }
                wp_reset_postdata();
            endforeach;
            /* End my loop section */

    }

    woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 
	do_action( 'woocommerce_after_shop_loop' );
	*/
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );
			?>
		</div>
	</div>
</div>


<section id="submit_your_application">
	<div class="container">
		<div class="row pt-96 pb-96">
			<div class="block_your_application justify-content-between flex-column flex-lg-row col-12 d-flex pt-96 pb-96">
				<div class="text_your_application d-flex flex-column justify-content-start align-items-start mx-lg-5 px-5">
					<span class="title_section font-weight-bold txt_white pb-4">Оставить заявку</span>
					<span class="description_section txt_white pb-4">Мы оперативно рассмотрим вашу заявку и в кратчайший срок предоставим ответ.</span>
					<span class="description_section txt_white pb-5">Заявку можно отпрвить с помощью месседжера или позвонить по телефону</span>
					<div class="d-flex align-items-center">
						<span class="txt_white me-4"><?php the_field( "phone", 2 ); ?></span>
						<?php if ( have_rows('messengers', 2) ) { 
						    while ( have_rows('messengers', 2) ) { 
							    the_row();?>              
								<a href="tel:<?php the_sub_field('link', 2); ?>" class="mess_link mx-2">
									<img src="<?php the_sub_field('icon', 2); ?>" >
								</a>
						<?php } } ?>						
					</div>
				</div>
				<div class="form_your_application px-5 me-lg-5">
					<?php echo do_shortcode('[contact-form-7 id="173" title="Оставить заявку"]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
get_footer( 'shop' );
