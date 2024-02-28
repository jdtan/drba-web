<?php
$class = $border_class = '';

$hide_top_bar_mobile = get_theme_mod( 'hide_top_bar_mobile', true );
if ( $hide_top_bar_mobile ) {
	$class .= ' hide-on-mobile';
}
$enable_topbar_border_bottom = get_theme_mod( 'enable_topbar_border_bottom' );
if ( $enable_topbar_border_bottom ) {
	$class .= ' saga-item-border-bottom';
}
$stack_top_bar_col_responsive = get_theme_mod( 'stack_top_bar_col_responsive' );
if ( $stack_top_bar_col_responsive ) {
	$class .= ' saga-stack-column';
}
?>
<div class="site-header-row-wrapper blogty-topbar-row <?php echo esc_attr( $class ); ?>">
	<div class="uf-wrapper">
		<div class="blogty-topbar-wrapper">
			<div class="blogty-topbar-first">
				<?php do_action( 'blogty_topbar_first_col_items' ); ?>
			</div>
			<div class="blogty-topbar-last">
				<?php do_action( 'blogty_topbar_last_col_items' ); ?>
			</div>
		</div> 
	</div>
</div>
