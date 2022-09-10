<?php
/**
 * Template Name: Потребности
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
<section id="head_our_needs">
    <div class="container-fluid p-lg-0">
        <div class="row">
            <div class="col-lg-6 col-12 mb-lg-0 mb-0">
                <div class="our_needs_img_wrap">
                    <img src="/wp-content/themes/creamel/img/img_our_needs_page.jpg" loading="lazy">
                </div>
            </div>
            <div class="text_top_our_needs col-lg-6 col-12 d-flex align-items-center">
                <div class="our_needs_h_wrap ps-lg-5 ps-3 ">
                    <h1 class=" txt_white text-uppercase my-2">Наши потребности</h1>
                    <div class="our_needs_text">
                        <p class="txt_white">
                            При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="block_text_strategy">
    <div class="container pt-96">
        <div class="row">
            <div class="text_list_of_strategies col-12">
                <div class="title_section text-uppercase my-3">Сайт рыбатекст</div>
                <div class="description_section my-2">Существует две стратегии восстановительных работ: </div>
                <ul>
                    <?php if(get_field('list_of_strategies')): ?>
                    <?php $i=1;while(the_repeater_field('list_of_strategies')): ?> 
                        <li>
                            <span><?php the_sub_field('text'); ?></span> 
                        </li>                                                                  
                    <?php $i++;endwhile; ?>
                    <?php endif; ?>
                </ul>       
            </div>
        </div>
    </div>
</section>

<?php if(get_field('photo_gallery')): ?>
    <section id="photo_gallery_slider">
        <div class="container pt-96">
            <div class="row">
                <div class="title_section col-12 mb-3 d-flex align-items-start justify-content-between">
                    <span class="title_section ">Фотогалерея</span>
                    <div class="slider_arrow_gallery"></div>
                </div>     
                <div class="col-12 px-0">
                    <div class="slider_photo_gallery">                       
                        <?php $img_gallery = get_field('photo_gallery');
                            if ($img_gallery) { $i = 0;?>
                            <?php foreach( $img_gallery as $img ) {  $i++ ?>
                            <div class="img_slider">
                                <img src="<?php echo esc_url($img['sizes']['large']);?>"/>
                                <a href="<?php echo esc_url($img['sizes']['large']); ?>" data-fancybox="images"></a>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php endif; ?>




<section id="submit_your_application">
    <div class="container">
        <div class="row pt-96 pb-96">
            <div class="block_your_application justify-content-between flex-column flex-lg-row col-12 d-flex pt-96 pb-96">
                <div class="text_your_application d-flex flex-column justify-content-start align-items-start mx-lg-5 px-5">
                    <span class="title_section font-weight-bold txt_white pb-4">Оставить предложение</span>
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