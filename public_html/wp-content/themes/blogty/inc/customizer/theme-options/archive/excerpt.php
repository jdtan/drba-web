<?php

$wp_customize->add_section(
	'excerpt_options',
	array(
		'title' => __( 'Excerpt Options', 'blogty' ),
		'panel' => 'blog_options_panel',
	)
);

/* Excerpt Length */
$wp_customize->add_setting(
	'excerpt_length',
	array(
		'default'           => $theme_options_defaults['excerpt_length'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'excerpt_length',
	array(
		'label'    => __( 'Excerpt Length', 'blogty' ),
		'section'  => 'excerpt_options',
		'type'     => 'number',
		'priority' => 10,
	)
);

/* Excerpt Read More Text */
$wp_customize->add_setting(
	'excerpt_read_more_text',
	array(
		'default'           => $theme_options_defaults['excerpt_read_more_text'],
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	)
);
$wp_customize->add_control(
	'excerpt_read_more_text',
	array(
		'label'       => __( 'Read More Text', 'blogty' ),
		'description' => __( 'Leave empty if you want to use default text "Read More".', 'blogty' ),
		'section'     => 'excerpt_options',
		'type'        => 'text',
		'priority'    => 20,
	)
);

// Read More Icon.
$wp_customize->add_setting(
	'excerpt_read_more_icon',
	array(
		'default'           => $theme_options_defaults['excerpt_read_more_icon'],
		'sanitize_callback' => 'blogty_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Blogty_Radio_Image_Control(
		$wp_customize,
		'excerpt_read_more_icon',
		array(
			'label'    => __( 'Read More Icon', 'blogty' ),
			'section'  => 'excerpt_options',
			'choices'  => blogty_get_read_more_icons(),
			'priority' => 30,
		)
	)
);
