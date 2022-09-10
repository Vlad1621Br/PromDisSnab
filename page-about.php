<?php
/**
 * Template Name: О нас
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
<section id="about">
    <div class="container-fluid p-lg-0">
        <div class="row">
            <div class="col-lg-6 col-12 mb-lg-0 mb-0">
                <div class="about_img_wrap">
                    <img src="/wp-content/themes/creamel/img/img_top_about.jpg" loading="lazy">
                </div>
            </div>
            <div class="text_top_about col-lg-6 col-12 d-flex align-items-center">
                <div class="about_h_wrap ps-lg-4 ps-3 ">
                    <h1 class=" txt_white text-uppercase my-2">О нас</h1>
                    <div class="about_text">
                        <p class="txt_white">
                            Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста
                        </p>
                        <p class="txt_white">
                            При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="privilege_icons">
    <div class="container">
        <div class="row pt-96 pb-96">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="title_section col-12 mb-3">
                        <span>Наши ценности</span> 
                    </div>
                    <div class="subtitle_section col-12 mb-3">
                       <span>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать текст</span>
                    </div>
                    <div class="description_section col-12">
                        <span>
                            Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. 
                            При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.
                        </span>
                    </div>                    
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12">
                <div class="row">
                    <?php if ( have_rows('privilege_icons', 6) ) { $i=0;
                        while ( have_rows('privilege_icons', 6) ) { the_row(); $i++;?>
                            <div class="cell_privilege <?php if($i==5){ ?>col-lg-12<?php } else { ?>col-lg-6<?php } ?> col-12">
                                <div class="advant_item_wrap box_shadows">                                                  
                                    <img src="<?php the_sub_field('image') ?>" loading="lazy" >
                                    <div class="advant_title subtitle_section mb-1"><?php the_sub_field('title') ?></div>                               
                                </div>
                            </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="our_needs">
    <div class="container">
        <div class="row pt-96">
            <div class="img_our_needs col-md-6 col-lg-7 d-md-block d-none">
            </div>
            <div class="our_needs col-md-6 col-lg-5 col-12 d-flex">
                <div class="row m-auto">                    
                    <div class="title_section col-12 mb-4 ps-4 d-flex align-items-start ">Наши потребности</div>
                    <div class="subtitle_section col-12 mb-4 ps-4 d-flex align-items-start ">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев</div>
                    <div class="description_section col-12 mb-4 ps-4 d-flex align-items-start ">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</div>
                    <a href="#" class="grd_btn_red txt_white ms-4">Смотреть все</a>     
                </div>
            </div>
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