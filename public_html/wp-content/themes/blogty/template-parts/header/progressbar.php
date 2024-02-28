<?php
/**
 * Displays progressbar
 *
 * @package Blogty
 */

$progressbar_position = get_theme_mod( 'progressbar_position', 'top' );
?>
<div id="blogty-progress-bar" class="<?php echo esc_attr( $progressbar_position ); ?>"></div>