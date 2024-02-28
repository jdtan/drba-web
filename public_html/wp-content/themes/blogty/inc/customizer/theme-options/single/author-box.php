<?php
$wp_customize->add_section(
	'single_author_box_options',
	array(
		'title' => __( 'Author Info Box Options', 'blogty' ),
		'panel' => 'single_posts_options_panel',
	)
);

$wp_customize->add_setting(
	'show_author_info',
	array(
		'default'           => $theme_options_defaults['show_author_info'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'show_author_info',
		array(
			'label'    => __( 'Show Author Info Box', 'blogty' ),
			'section'  => 'single_author_box_options',
			'priority' => 10,
		)
	)
);
