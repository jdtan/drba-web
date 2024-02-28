<?php
// Inverted OffCanvas.
$wrapper_classes = 'blogty-canvas-block';
if ( 'dark' == get_theme_mod( 'offcanvas_theme', 'light' ) ) {
	$wrapper_classes .= ' inverted-offcanvas';
}
?>
<div class="blogty-canvas-modal <?php echo esc_attr( $wrapper_classes ); ?>" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Offcanvas', 'blogty' ); ?>">
	<div class="blogty-canvas-header">
		<?php
		$offcanvas_logo = get_theme_mod( 'offcanvas_logo' );
		if ( $offcanvas_logo ) {
			?>
			<div class="blogty-offcanvas-logo">
				<img src="<?php echo esc_url( $offcanvas_logo ); ?>">
			</div>
			<?php
		}
		?>
		<button class="close-canvas-modal blogty-off-canvas-close toggle fill-children-current-color">
			<span class="screen-reader-text"><?php esc_html_e( 'Close Off Canvas', 'blogty' ); ?></span>
			<?php blogty_the_theme_svg( 'modal-close' ); ?>
		</button>
	</div>
	<?php
	$heading_style = ' saga-title-style-' . get_theme_mod( 'offcanvas_widgetarea_heading_style', 'style_9' );
	$heading_align = ' saga-title-align-' . get_theme_mod( 'offcanvas_widgetarea_heading_align', 'left' );
	$class         = $heading_style . $heading_align;
	?>
	<div class="blogty-canvas-content <?php echo esc_attr( $class ); ?>">
		<?php
		if ( is_active_sidebar( 'offcanvas-before-menu' ) ) :
			dynamic_sidebar( 'offcanvas-before-menu' );
		endif;
		?>
		<nav aria-label="<?php echo esc_attr_x( 'Mobile', 'menu', 'blogty' ); ?>" role="navigation">
			<ul id="blogty-mobile-nav" class="blogty-responsive-menu reset-list-style">
				<?php
				if ( has_nav_menu( 'primary-menu' ) ) {
					wp_nav_menu(
						array(
							'container'      => '',
							'items_wrap'     => '%3$s',
							'show_toggles'   => true,
							'theme_location' => 'primary-menu',
						)
					);
				}
				?>
			</ul>
		</nav>
		<?php
		if ( is_active_sidebar( 'offcanvas-after-menu' ) ) :
			dynamic_sidebar( 'offcanvas-after-menu' );
		endif;
		?>
	</div>
</div>
