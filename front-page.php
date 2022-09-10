<?php
/**
 * Template Name: Главная
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
<section id="h_slider">
	<div class="container-fluid p-0">
		<div class="row no-gutters">
			<div class="col-12">
			<!--<div class="container socials_tower_container">
					<div class="socials_tower">
						<?php /* if(get_field('socials', 30)): ?>
						<?php $i=1;while(the_repeater_field('socials', 30)): ?>
						<a href="<?php echo get_sub_field('link'); ?>" target="_blank"><img src="<?php echo get_sub_field('icon'); ?>"></a>
						<?php $i++;endwhile; ?>
						<?php endif; */?>
					</div>
				</div> -->
				<div class="h_slider__wrapper m-0">
					<?php if(get_field('slider')): ?>
					<?php $i=1;while(the_repeater_field('slider')): ?>
					<div class="h_slider__item" style="background-image:url(<?php echo the_sub_field('image'); ?>);">
						<img src="<?php the_sub_field('image'); ?>" class="hs-big">
						<div class="h_slider__info">							
							<?php if($i==1){?><h1><?php } ?><div class="h_slider__title"><?php the_sub_field('title'); ?></div><?php if($i==1){?></h1><?php } ?>
							<div class="h_slider_desc mb-md-5 mb-3"><?php the_sub_field('description'); ?></div>
							<a href="<?php the_sub_field('btn_slider'); ?>" class="slider_btn grd_btn_blue">Подробнее</a>							
						</div>
					</div>
					<?php $i++;endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="for_dots"></div>
				<div class="weather_widget"><?php dynamic_sidebar( 'weather' );?></div>
			</div>
		</div>
	</div>
</section>


<section id="product_in_stock" >
	<div class="container">
		<div class="row pt-96">
			<div class="title_product_in_stock  col-lg-4 col-md-6 col-12 mb-md-4 mb-2 d-flex flex-column align-items-start justify-content-evenly">
				<span class="title_section mb-4">Товары в наличии</span>
				<span class="description_section mb-4">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать </span>
				<a href="#" class="grd_btn_red txt_white mb-2">Смотреть все</a>
			</div>
			<?php if ( have_rows('product_in_stock') ) { $i=1;
				while ( have_rows('product_in_stock') ) { the_row(); $i++;?>
					<div class="block_product_cat col-lg-4 col-md-6 col-12 p-sm-0 p-auto">
				    	<a href="<?php the_sub_field('link'); ?>" class="photo_product_in_stock">
				    		<img src="<?php echo the_sub_field('image'); ?>" class="img_product">
				    		<img src="<?php echo the_sub_field('gif'); ?>" class="gif_product" style= "display: none;">
							<div class="text_category_product d-flex align-items-center justify-content-between" id="product_<?php echo $i;?>"><span class="txt_white"><?php the_sub_field('title'); ?></span><div class="right_arrow_category arrow_numb"></div></div>						
						</a>
				 	</div>													
			<?php  } } ?>
		</div>
	</div>
</section>



<section id="services" >
	<div class="container">
		<div class="row pt-96">
			<div class="title_services col-lg-3 col-sm-6 col-12 mb-4 d-flex flex-column align-items-start justify-content-evenly">
				<span class="title_section mb-3">Услуги</span>
				<span class="description_section mb-3">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру</span>
				<a href="/uslugi/" class="grd_btn_red txt_white">Смотреть все</a>
			</div>
			<?php global $wp_query;
			$args = ['post_type' => 'services','posts_per_page' => 6];	
			$wp_query = new WP_Query($args);
			$i=1;while ( $wp_query->have_posts() ) : $wp_query->the_post();
			?>
			<div id="post-<?php the_ID(); ?>" class="col-lg-3 col-sm-6 col-12 project_item p-xs-4 p-0">				
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


<section id="about_company">
	<div class="container">
		<div class="row pt-96">
			<div class="about_company_title col-md-5 col-12">
				<div class="title_section mb-4 d-flex align-items-start ">О компании</div>
				<div class="subtitle_section mb-4 d-flex align-items-start ">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев</div>
			</div>
			<div class="about_company_descr col-md-7 col-12">					
				<div class="description_section  d-flex align-items-start ">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</div>					
			</div>
		</div>
	</div>
</section>


<section id="privilege_icons">
	<div class="container">
		<div class="row pt-96 pb-96">
			<?php if ( have_rows('privilege_icons') ) { $i=0;
   				while ( have_rows('privilege_icons') ) { the_row(); $i++;?>
					<div class="cell_privilege <?php if($i==5){ ?>col-lg-5<?php } else { ?>col-lg-4<?php } ?> col-sm-6 col-12">
						<div class="advant_item_wrap box_shadows">													
							<img src="<?php the_sub_field('image') ?>" loading="lazy" >
							<div class="advant_title subtitle_section mb-1"><?php the_sub_field('title') ?></div>								
						</div>
					</div>
			<?php } } ?>
			<div class="privilege_btn col-lg-3 col-sm-6 col-12 d-flex">
				<div class="advant_item_btns d-flex">
					<a href="#" class=" txt_white"><div class="mt-5 ms-4">Подробнее о нас</div> <div class="right_arrow_privilege mt-3 ms-4"></div></a>
				</div> 
			</div>
		</div>
	</div>
</section>


<section id="submit_desired_item">
	<div class="container">
		<div class="row">
			<div class="block_your_desired_item col-12 d-flex flex-column pt-96 pb-96 px-md-0 px-5">
				<div class="text_your_desired_item d-flex flex-column mb-4">
					<span class="title_section txt_white pb-4">Не нашли нужного товара?</span>
					<span class="description_section txt_white pb-5">Мы оперативно рассмотрим вашу заявку и в кратчайший срок предоставим ответ.</span>
				</div>
				<div class="form_desired_item">
					<?php echo do_shortcode('[contact-form-7 id="209" title="Не нашли нужного товара?"]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
			


<section id="news" >
	<div class="container">
		<div class="row pt-96">
			<div class="title_services col-12 mb-3 d-flex align-items-start justify-content-between">
				<span class="title_section ">Новости</span>
				<div class="slider_slick_news">
				</div>
			</div>
			<div class="news_slider p-0">				
				<?php global $wp_query;
					$args = ['cat' => 18,'post_type' => 'post','posts_per_page' => 4,];	
					$wp_query = new WP_Query($args);
					$i=1;while ( $wp_query->have_posts() ) : $wp_query->the_post();
				?>
				<a id="post-<?php the_ID(); ?>" class=" news_item mt-4" href="<?php echo esc_url( get_permalink() ); ?>">
					<div class="img_center p-1">
						<?php the_post_thumbnail('portfolio-thumb');//the_post_thumbnail('large'); ?>
					</div>
					<div class="d-flex flex-column p-1 mt-3">
						<div class="news_date mb-2"><?php the_time("d.m.Y"); ?></div>
						<?php the_title( '<div class="news_item__title mb-2">', '</div>' ); ?>
						<div class="news_excerpt flex-1"><?php the_excerpt(); ?></div>					
					</div>
				</a>
				<?php $i++;endwhile; wp_reset_query();?>
			</div>
			<div class="col-12 pt-4 d-flex flex-column align-items-center justify-content-center">
				<a href="/news/" class="grd_btn_red txt_white ms-4">Смотреть все</a>
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

