<?php
/**
 * Template Name: Услуги
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creamel
 */


get_header();
?>

<!-- титульная услуги -->
<section id="services" >
    <div class="container">
        <div class="row pt-48">
            <div class="title_services col-12 mb-4 d-flex align-items-start">
                <span class=" mb-3"><h1>Услуги</h1></span>
            </div>
            <?php global $wp_query;
            $args = ['post_type' => 'services','posts_per_page' => 6];  
            $wp_query = new WP_Query($args);
            $i=1;while ( $wp_query->have_posts() ) : $wp_query->the_post();
            ?>
            <div id="post-<?php the_ID(); ?>" class="col-md-4 col-sm-6 col-12 project_item p-xs-4 p-0">             
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="box_shadow">                 
                    <div class="block_services">
                        <div class="services_img"><img src="<?php the_post_thumbnail_url(); ?>"></div>
                        <div class="services_subhead d-flex align-items-center justify-content-between">
                            <div class="services_name"><?php echo the_title(); ?></div>
                            <div class="right_arrow_services"></div>
                        </div>                                      
                    </div>
                </a>
            </div>
            <?php $i++;endwhile; wp_reset_query();?>
        </div>
    </div>
</section>

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
get_footer();