<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package creamel
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<!--
			<header class="page-header">
				<h1 class="page-title"><?/*php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'creamel' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'creamel' ); ?></p>
					<?php get_search_form();
					the_widget( 'WP_Widget_Recent_Posts' );
					?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'creamel' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->
					<?php
					// translators: %1$s: smiley 
					$creamel_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'creamel' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$creamel_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					*/?>
			</div>--> <!-- .page-content -->

			<div class="container">
					<div class="row pb-96 pt-96">
						<div class="title_error_404 col-12 d-flex flex-column align-items-center justify-content-center py-lg-0 py-5">
							<div class="icon_404 pb-4"></div>
							<span class="description_404 txt_white pb-4 pt-4">К сожалению, данная страница не найдена</span>
							<a href="https://pkf.koyot.info/" class="grd_btn_blue mt-5">На главную</a>
						</div>
					</div>
				</div>


		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
