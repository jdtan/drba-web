<?php

$wp_customize->add_section(
	'below_home_widgetarea_options',
	array(
		'title' => __( 'Below Home', 'blogty' ),
		'panel' => 'widgetareas_options_panel',
	)
);

// Background Color.
$wp_customize->add_setting(
	'below_home_widgetarea_bg_color',
	array(
		'default'           => $theme_options_defaults['below_home_widgetarea_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'below_home_widgetarea_bg_color',
		array(
			'label'    => __( 'Section Background Color', 'blogty' ),
			'section'  => 'below_home_widgetarea_options',
			'type'     => 'color',
			'priority' => 1,
		)
	)
);

/* Below Home Widgetareas heading style */
$wp_customize->add_setting(
	'below_home_widgetarea_heading_style',
	array(
		'default'           => $theme_options_defaults['below_home_widgetarea_heading_style'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'below_home_widgetarea_heading_style',
	array(
		'label'    => __( 'Widgets Title Style', 'blogty' ),
		'section'  => 'below_home_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogty_get_title_styles(),
	)
);

/* Below Home Widgetarea heading Align */
$wp_customize->add_setting(
	'below_home_widgetarea_heading_align',
	array(
		'default'           => $theme_options_defaults['below_home_widgetarea_heading_align'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'below_home_widgetarea_heading_align',
	array(
		'label'    => __( 'Widgets Title Alignment', 'blogty' ),
		'section'  => 'below_home_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogty_get_title_alignments(),
	)
);
