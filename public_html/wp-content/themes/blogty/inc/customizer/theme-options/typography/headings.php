<?php

// Add Headings section.
$wp_customize->add_section(
	'headings_typography_options',
	array(
		'title' => __( 'Headings', 'blogty' ),
		'panel' => 'typography_options_panel',
	)
);

// Primary Font.
$wp_customize->add_setting(
	'primary_font',
	array(
		'default'           => $theme_options_defaults['primary_font'],
		'sanitize_callback' => 'blogty_sanitize_special_select',
	)
);
$wp_customize->add_control(
	'primary_font',
	array(
		'label'    => __( 'Font For Heading Titles', 'blogty' ),
		'section'  => 'headings_typography_options',
		'type'     => 'select',
		'choices'  => blogty_get_fonts(),
		'priority' => 10,
	)
);

// Primary Font Weight.
$wp_customize->add_setting(
	'primary_font_weight',
	array(
		'default'           => $theme_options_defaults['primary_font_weight'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'primary_font_weight',
	array(
		'label'    => __( 'Heading Titles Font Weight', 'blogty' ),
		'section'  => 'headings_typography_options',
		'type'     => 'select',
		'choices'  => array(
			'normal'  => 'Normal',
			'bold'    => 'Bold',
			'bolder'  => 'Bolder',
			'lighter' => 'Lighter',
			'100'     => '100',
			'200'     => '200',
			'300'     => '300',
			'400'     => '400',
			'500'     => '500',
			'600'     => '600',
			'700'     => '700',
			'800'     => '800',
			'900'     => '900',
		),
		'priority' => 20,
	)
);
