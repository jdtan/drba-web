<?php
/**
 * The front page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogty
 */
get_header();

$enable_trending_posts      = get_theme_mod( 'enable_trending_posts' );
$enable_banner              = get_theme_mod( 'enable_banner' );

if ( 'posts' == get_option( 'show_on_front' ) ) {

	if ( ! is_paged() && is_front_page() ) {
		// Trending Posts.
		if ( $enable_trending_posts ) {
			get_template_part( 'template-parts/home/trending-posts' );
		}
		// Banner.
		if ( $enable_banner ) {
			get_template_part( 'template-parts/home/banner' );
		}
	}

	include get_home_template();

} else {

	// Add a main container in case if sidebar is present.
	$class       = '';
	$page_layout = blogty_get_page_layout();
	
	if ( 'no-sidebar-narrow' == $page_layout ) {
		$class = ' default-max-width';
	} else {
		$class = ' wide-max-width';
	}

	// Trending Posts.
	if ( $enable_trending_posts ) {
		get_template_part( 'template-parts/home/trending-posts' );
	}
	// Banner.
	if ( $enable_banner ) {
		get_template_part( 'template-parts/home/banner' );
	}

	if ( ! is_paged() && is_front_page() ) {
		get_template_part( 'template-parts/home/home-before-columns' );
		get_template_part( 'template-parts/home/home-columns' );
		get_template_part( 'template-parts/home/before-home' );
	}

	do_action('blogty_home_before_widget_area');
	?>

	<?php
	while ( have_posts() ) :
		the_post();
			?>

			<main id="site-content" role="main" class="wrapper <?php echo esc_attr( $class ); ?>">

				<div id="primary" class="content-area">

					<div class="primary-content-area-wrapper">

						<?php
						if ( ! is_paged() && is_front_page() ) {
							get_template_part( 'template-parts/home/home-before-posts-widgets' );
						}
						?>

						<?php if ( get_the_content() ) : ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<div class="blogty-article-block-wrapper">

									<div class="entry-content">
										<?php
										the_content();
										wp_link_pages(
											array(
												'before' => '<nav class="page-links"><span class="label">' . __( 'Pages:', 'blogty' ) . '</span>',
												'after'  => '</nav>',
											)
										);
										?>
									</div><!-- .entry-content -->

									<?php if ( get_edit_post_link() ) : ?>
										<footer class="entry-footer default-max-width">
											<?php
											edit_post_link(
												sprintf(
													wp_kses(
														/* translators: %s: Name of current post. Only visible to screen readers */
														__( 'Edit <span class="screen-reader-text">%s</span>', 'blogty' ),
														array(
															'span' => array(
																'class' => array(),
															),
														)
													),
													wp_kses_post( get_the_title() )
												),
												'<span class="blogty-edit edit-link">' . blogty_get_theme_svg( 'edit' ),
												'</span>'
											);
											?>
										</footer><!-- .entry-footer -->
									<?php endif; ?>

								</div><!-- content-inner-wrap -->

							</article><!-- #post-<?php the_ID(); ?> -->
							
						<?php endif;?>

						<?php
						if ( ! is_paged() && is_front_page() ) {
							get_template_part( 'template-parts/home/home-after-posts-widgets' );
						}
						?>

					</div>

				</div> <!-- #primary -->

				<?php
				if ( 'no-sidebar' != $page_layout && 'no-sidebar-narrow' != $page_layout ) {
					get_sidebar();
				}
				?>

			</main> <!-- #site-content-->

			<?php
		endwhile;
	?>

	<?php
	if ( ! is_paged() && is_front_page() ) {
		get_template_part( 'template-parts/home/after-home' );
	}

	do_action('blogty_home_after_widget_area');
}
get_footer();
