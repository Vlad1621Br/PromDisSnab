<?php
/**
 * Template Name: Контакты
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

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title_contact">
                    <h1 class="text-uppercase mb-4">Контакты</h1>
                </div>
            </div>
            <div class="txt_whblue col-lg-3 col-12 d-flex flex-column">
                    <div class="b_contacts ms-xl-4 ms-0">
                        <div class="b_mail"><?php echo get_field('mail', 30); ?></div>
                        <div class="b_phone mt-4">
                            <a href="tel:<?php the_field( "phone", 2); ?>" class="contact_link">
                                <div class="d-flex align-items-center  my-2">
                                    <span class="icon-phone-black me-3"></span>
                                    <span class="d-block "><?php the_field( "phone", 2 ); ?></span>
                                </div>                              
                            </a>
                            <a href="address:<?php the_field( "address", 2); ?>" class="contact_link">
                                <div class="d-flex align-items-center  my-2">
                                    <span class="icon-address-black me-3"></span>
                                    <span class="d-block "><?php the_field( "address", 2 ); ?></span>
                                </div>                              
                            </a>
                            <a href="time:<?php the_field( "time", 2); ?>" class="contact_link">
                                <div class="d-flex align-items-center  my-2">
                                    <span class="icon-time-black me-3"></span>
                                    <span class="d-block "><?php the_field( "time", 2 ); ?></span>
                                </div>                              
                            </a>
                            <a href="mailto:<?php the_field( "mail", 2); ?>" class="contact_link">
                                <div class="d-flex align-items-center  my-2">
                                    <span class="icon-mail-black me-3"></span>
                                    <span class="d-block "><?php the_field( "mail", 2 ); ?></span>
                                </div>                              
                            </a>
                            <a href="requisites:<?php the_field( "requisites", 2); ?>" class="contact_link">
                                <div class="d-flex align-items-center  my-2">
                                    <span class="icon-user me-3"></span>
                                    <span class="txt_requisit">Показать реквизиты</span>
                                    <span class="numb_requisit"><?php the_field( "requisites", 2); ?></span>
                                </div>                              
                            </a>

                        </div>
                    </div>
                    <div class="socials d-flex flex-column mt-4 ms-xl-4 ms-0">
                        <span class="txt_min">Мы в соц. сетях</span>
                        <div>
                            <?php if(get_field('socials', 2)): ?>
                            <?php $i=1;while(the_repeater_field('socials', 2)): ?>
                            <?php if(get_sub_field('link')): ?>
                            <a href="<?php echo get_sub_field('link'); ?>" target="_blank" class="me-3 mt-2">
                                <img src="<?php echo get_sub_field('icon'); ?>" class="mt-2">
                            </a>
                            <?php endif; ?>
                            <?php $i++;endwhile; ?>
                            <?php endif; ?>                            
                        </div>
                    </div> 
                    <div class="messengers d-flex flex-column mt-3 ms-xl-4 ms-0">                         
                        <span class="txt_min">Мы в мессенджерах</span>
                        <div>
                            <?php if ( have_rows('messengers', 2) ) { 
                                while ( have_rows('messengers', 2) ) { the_row();?>              
                                    <a href="tel:<?php the_sub_field('link', 2); ?>" class="mess_link me-3 mt-2">
                                        <img src="<?php the_sub_field('icon', 2); ?>" class="mt-2">
                                    </a>
                            <?php } } ?>                            
                        </div>
                    </div>  
            </div>
            <div class="col-lg-9 col-12 px-lg-0 pt-lg-0 pt-4">
                <?php the_field( "map", 2); ?>                           
            </div>
        </div>
    </div>
</section>



<section id="manager_info" >
    <div class="container">
        <div class="row pt-96">
            <?php if ( have_rows('manager_for_work_with', 2) ) { $i=0;
                while ( have_rows('manager_for_work_with', 2) ) { the_row(); $i++;?>
                    <div class="block_manager_info col-md-3 col-6 d-flex flex-column">
                        <span class="job_title py-2"><?php the_sub_field( "job_title", 2); ?></span>
                        <span class="full_name txt_mid py-2"><?php the_sub_field( "full_name", 2); ?></span>
                        <div class=" txt_mid block_tel1_<?php echo $i ?> d-flex py-2">
                            <div class="icon-phone-black me-3"></div>
                            <span class="tel1"><?php the_sub_field( "tel1", 2); ?></span>
                        </div>                      
                         <div class=" txt_mid block_tel2 d-flex py-2">
                            <?php if( get_sub_field('tel2') ) { ?>
                                <div class="icon-phone-black me-3"></div>
                            <?php } ?>                       
                            <span class="tel2"> <?php the_sub_field( "tel2", 2); ?>  </span>
                        </div>                                            
                    </div>                                                  
            <?php  } } ?>
        </div>
    </div>
</section>



<section id="submit_your_application_contact">
    <div class="container">
        <div class="row pt-96 pb-96">
            <div class="contact_your_application justify-content-between flex-column flex-lg-row col-12 d-flex pt-96 pb-96">
                <div class="text_your_application d-flex flex-column justify-content-start align-items-start mx-lg-5 px-5">
                    <span class="title_section font-weight-bold pb-4">Оставить заявку</span>
                    <span class="description_section pb-4">Мы оперативно рассмотрим вашу заявку и в кратчайший срок предоставим ответ.</span>
                    <span class="description_section pb-5">Заявку можно отпрвить с помощью месседжера или позвонить по телефону</span>
                    <div class="d-flex align-items-center">
                        <span class=" me-4"><?php the_field( "phone", 2 ); ?></span>
                        <?php if ( have_rows('messengers', 2) ) { 
                            while ( have_rows('messengers', 2) ) { 
                                the_row();?>              
                                <a href="tel:<?php the_sub_field('link', 2); ?>" class="mess_link mx-2">
                                    <img src="<?php the_sub_field('icon', 2); ?>" >
                                </a>
                        <?php } } ?>                        
                    </div>
                </div>
                <div class="form_your_application_contact px-5 me-lg-5">
                    <?php echo do_shortcode('[contact-form-7 id="173" title="Оставить заявку"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();