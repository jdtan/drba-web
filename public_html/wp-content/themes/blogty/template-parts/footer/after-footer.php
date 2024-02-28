<?php
/**
 * Displays after footer widget area.
 *
 * @package Blogty
 */

if ( is_active_sidebar( 'after-footer-widgetarea' ) ) :

	$heading_style = ' saga-title-style-' . get_theme_mod( 'below_footer_widgetarea_heading_style', 'style_1' );
	$heading_align = ' saga-title-align-' . get_theme_mod( 'below_footer_widgetarea_heading_align', 'left' );
	$class         = $heading_style . $heading_align;
	$class         = apply_filters( 'below_footer_widgetarea_wrapper_class', $class );
	?>
	<div class="after-footer-widget-region general-widget-area <?php echo esc_attr( $class ); ?>" role="complementary">
		<div class="uf-wrapper">
			<?php do_action( 'below_footer_widgetarea_top' ); ?>
			<?php dynamic_sidebar( 'after-footer-widgetarea' ); ?>
			<?php do_action( 'below_footer_widgetarea_bottom' ); ?>
		</div>
	</div>
	<?php
	
endif;
