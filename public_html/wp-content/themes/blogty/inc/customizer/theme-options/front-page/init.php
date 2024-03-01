<?php
// Add Home Page Options Panel.
$wp_customize->add_panel(
	'theme_home_option_panel',
	array(
		'title'       => __( 'Front Page', 'blogty' ),
		'description' => __( 'Contains all front page settings', 'blogty' ),
		'priority'    => 42,
	)
);

require_once get_template_directory() . '/inc/customizer/theme-options/front-page/trending-posts.php';
require_once get_template_directory() . '/inc/customizer/theme-options/front-page/banner.php';
require_once get_template_directory() . '/inc/customizer/theme-options/front-page/pinned-posts.php';
require_once get_template_directory() . '/inc/customizer/theme-options/front-page/homepage-settings.php';