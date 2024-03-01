<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogty
 */
?>

<?php do_action( 'blogty_before_footer' ); ?>

<?php get_template_part( 'template-parts/footer/before-footer' ); ?>

<?php get_template_part( 'template-parts/footer/before-footer-no-container' ); ?>

<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

<?php get_template_part( 'template-parts/footer/footer-info' ); ?>

<?php get_template_part( 'template-parts/footer/after-footer' ); ?>

<?php get_template_part( 'template-parts/footer/after-footer-no-container' ); ?>

<?php do_action( 'blogty_after_footer' ); ?>

<?php
if ( get_theme_mod( 'enable_scroll_to_top', true ) ) {
	$pos = get_theme_mod( 'scroll_to_top_pos', 'right' );
	?>
	<a href="#" class="blogty-toggle-scroll-top blogty-floating-scroll-top fill-children-current-color <?php echo esc_attr( $pos ); ?>">
		<?php blogty_the_theme_svg( 'chevron-up' ); ?>
	</a>
	<?php
}
?>
	</div><!-- #site-content-wrapper -->
</div><!-- #page -->

<?php do_action( 'blogty_after_site' ); ?>

<?php get_template_part( 'template-parts/header/canvas-modal' ); ?>

<?php wp_footer(); ?>

</body>
</html>