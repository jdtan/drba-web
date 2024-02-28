<?php
/**
 * Displays home columns widget area.
 *
 * @package Blogty
 */

if ( is_active_sidebar( 'home-page-col-one' ) || is_active_sidebar( 'home-page-col-two' ) ) :

	$wrapper_class = '';

	$heading_style = ' saga-title-style-' . get_theme_mod( 'home_col_one_widgetarea_heading_style', 'style_2' );
	$heading_align = ' saga-title-align-' . get_theme_mod( 'home_col_one_widgetarea_heading_align', 'left' );
	$col_one_class = $heading_style . $heading_align;

	$heading_style   = ' saga-title-style-' . get_theme_mod( 'home_col_two_widgetarea_heading_style', 'style_5' );
	$heading_align   = ' saga-title-align-' . get_theme_mod( 'home_col_two_widgetarea_heading_align', 'center' );
	$hide_col_mobile = get_theme_mod( 'home_col_two_widgetarea_hide_mobile' ) ? ' hide-on-mobile ' : '';
	$col_two_class   = $heading_style . $heading_align . $hide_col_mobile;

	$wrapper_class = apply_filters( 'home_columns_widgetarea_wrapper_class', $wrapper_class );

	?>
	<div class="column-widgetarea-wrapper <?php echo esc_attr( $wrapper_class ); ?>">
		<div class="uf-wrapper">
			<?php do_action( 'home_columns_widgetarea_top' ); ?>
			<div class="column-widgetarea">
				<?php if ( is_active_sidebar( 'home-page-col-one' ) ) : ?>
					<div class="home-page-col-one-widget-region blogty-pirmary-column <?php echo esc_attr( $col_one_class ); ?>" role="complementary">
						<div class="blogty-sticky-col">
							<?php do_action( 'home_col_one_widgetarea_top' ); ?>
							<?php dynamic_sidebar( 'home-page-col-one' ); ?>
							<?php do_action( 'home_col_one_widgetarea_bottom' ); ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'home-page-col-two' ) ) : ?>
					<div class="home-page-col-two-widget-region blogty-secondary-column <?php echo esc_attr( $col_two_class ); ?>" role="complementary">
						<div class="blogty-sticky-col">
							<?php do_action( 'home_col_two_widgetarea_top' ); ?>
							<?php dynamic_sidebar( 'home-page-col-two' ); ?>
							<?php do_action( 'home_col_two_widgetarea_bottom' ); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<?php do_action( 'home_columns_widgetarea_bottom' ); ?>
		</div>
	</div>
	<?php
	
endif;
