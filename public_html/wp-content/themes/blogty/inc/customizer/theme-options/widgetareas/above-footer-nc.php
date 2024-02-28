<?php

$wp_customize->add_section(
	'above_footer_nc_widgetarea_options',
	array(
		'title' => __( 'Above Footer - No Container', 'blogty' ),
		'panel' => 'widgetareas_options_panel',
	)
);

/* Above Footer NC Widgetareas heading style */
$wp_customize->add_setting(
	'above_footer_nc_widgetarea_heading_style',
	array(
		'default'           => $theme_options_defaults['above_footer_nc_widgetarea_heading_style'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'above_footer_nc_widgetarea_heading_style',
	array(
		'label'    => __( 'Widgets Title Style', 'blogty' ),
		'section'  => 'above_footer_nc_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogty_get_title_styles(),
	)
);

/* Above Footer NC Widgetarea heading Align */
$wp_customize->add_setting(
	'above_footer_nc_widgetarea_heading_align',
	array(
		'default'           => $theme_options_defaults['above_footer_nc_widgetarea_heading_align'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'above_footer_nc_widgetarea_heading_align',
	array(
		'label'    => __( 'Widgets Title Alignment', 'blogty' ),
		'section'  => 'above_footer_nc_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogty_get_title_alignments(),
	)
);
