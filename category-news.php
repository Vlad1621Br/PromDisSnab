<?php
/**
 * Template Name: Новости
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package creamel
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php /*<a href="/blog/" class="d-inline-flex align-items-center back_works"><i class="icon_arrow_left mr-2"></i>Назад</a>*/ ?>
					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="big_title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header>


					<!-- .entry-header -->
					<div class="entry-full pb-96">
						<div class="row">

								<?php global $wp_query;
								$args = array('post_type' => 'post','cat' => 18,/*'posts_per_page' => 9,*/);
								$wp_query = new WP_Query($args);?>
								<?php $i=0; while ( $wp_query -> have_posts() ) : $wp_query ->the_post(); ?>
									<a id="post-<?php the_ID(); ?>" <?php if($i==0){ ?>class="col-12 news_item mt-4"<?php } 
									else { ?>class="col-lg-4 col-md-6 col-12 news_item mt-4"<?php } ?>
									href="<?php echo esc_url( get_permalink() ); ?>">
										<div class="img_center p-1">
											<?php the_post_thumbnail('portfolio-thumb');//the_post_thumbnail('large'); ?>
										</div>
										<div class="d-flex flex-column p-1 mt-3">
											<div class="news_date mb-2"><?php the_time("d.m.Y"); ?></div>
											<?php the_title( '<div class="news_item__title mb-2">', '</div>' ); ?>
											<div class="news_excerpt flex-1"><?php the_excerpt(); ?></div>					
										</div>
									</a>
								<?php $i++;endwhile; ?>
								<?php wp_reset_postdata();?>
								<?php if (  $wp_query->max_num_pages > 1 ) : ?>
								<script>
									var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
									var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
									var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
									var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
								</script>
									<div class="primary__button w_btn my-4 mx-auto" id="true_loadmore">Показать еще</div>
								<?php endif; ?>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->
<script>
jQuery(function($){
	$('#true_loadmore').click(function(){
		$(this).text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
		var data = {
			'action': 'loadmore',
			'query': true_posts,
			'page' : current_page
		};
		$.ajax({
			url:ajaxurl, // обработчик
			data:data, // данные
			type:'POST', // тип запроса
			success:function(data){
				if( data ) { 
					$('#true_loadmore').text('Загрузить ещё').before(data); // вставляем новые посты
					current_page++; // увеличиваем номер страницы на единицу
					if (current_page == max_pages) $("#true_loadmore").remove(); // если последняя страница, удаляем кнопку
				} else {
					$('#true_loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
				}
			}
		});
	});
});</script>
<?php
//get_sidebar();
get_footer();
