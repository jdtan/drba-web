<?php
$wp_customize->remove_setting( 'display_header_text' );
$wp_customize->remove_control( 'display_header_text' );

$wp_customize->add_setting(
	'hide_title',
	array(
		'default'           => $theme_options_defaults['hide_title'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'hide_title',
		array(
			'label'    => __( 'Hide Site Title', 'blogty' ),
			'section'  => 'title_tagline',
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting(
	'hide_tagline',
	array(
		'default'           => $theme_options_defaults['hide_tagline'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'hide_tagline',
		array(
			'label'    => __( 'Hide Tagline', 'blogty' ),
			'section'  => 'title_tagline',
			'priority' => 20,
		)
	)
);

// Tagline Style
$wp_customize->add_setting(
	'site_tagline_style',
	array(
		'default'           => $theme_options_defaults['site_tagline_style'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'site_tagline_style',
	array(
		'label'    => __( 'Site Tagline Style', 'blogty' ),
		'section'  => 'title_tagline',
		'type'     => 'select',
		'choices'  => array(
			'style_1' => __( 'Style 1', 'blogty' ),
			'style_2' => __( 'Style 2', 'blogty' ),
			'style_3' => __( 'Style 3', 'blogty' ),
			'style_4' => __( 'Style 4', 'blogty' ),
		),
		'priority' => 30,
	)
);

/*Site title text size*/
$wp_customize->add_setting(
	'site_title_font_size_desktop',
	array(
		'default'           => $theme_options_defaults['site_title_font_size_desktop'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'site_title_font_size_desktop',
	array(
		'label'       => __( 'Site Title Text Size', 'blogty' ),
		'description' => __( '( Default: 42px ) Changes\'re only applicable to desktop version.', 'blogty' ),
		'section'     => 'title_tagline',
		'type'        => 'number',
		'input_attrs' => array(
			'min'   => 1,
			'max'   => 100,
			'style' => 'width: 150px;',
		),
		'priority'    => 40,
	)
);
$wp_customize->add_setting(
	'site_tagline_font_size_desktop',
	array(
		'default'           => $theme_options_defaults['site_tagline_font_size_desktop'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'site_tagline_font_size_desktop',
	array(
		'label'       => __( 'Site Tagline Text Size', 'blogty' ),
		'description' => __( '( Default: 16px ) Changes\'re only applicable to desktop version.', 'blogty' ),
		'section'     => 'title_tagline',
		'type'        => 'number',
		'input_attrs' => array(
			'min'   => 1,
			'max'   => 100,
			'style' => 'width: 150px;',
		),
		'priority'    => 50,
	)
);
