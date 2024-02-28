<?php
/**
 * Displays the site navigation.
 *
 * @package Blogty
 */

$is_sticky = get_theme_mod( 'enable_sticky_menu', true );
$class     = $is_sticky ? ' sticky-menu' : '';
$class    .= blogty_get_menu_bar_border();
?>
<div class="site-header-row-wrapper blogty-primary-bar-row<?php echo esc_attr( $class ); ?>">
	<div class="primary-bar-row-wrapper">
		<div class="uf-wrapper">
			<div class="blogty-primary-bar-wrapper">

				<?php do_action( 'blogty_primary_nav_items' ); ?>

				<div class="secondary-navigation blogty-secondary-nav">
					<?php do_action( 'blogty_secondary_nav_items' ); ?>
				</div>

			</div>
		</div>
	</div>
</div>