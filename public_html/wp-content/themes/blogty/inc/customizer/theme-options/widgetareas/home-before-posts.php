<?php

$wp_customize->add_section(
	'before_home_posts_widgetarea_options',
	array(
		'title' => __( 'Above Home Posts', 'blogty' ),
		'panel' => 'widgetareas_options_panel',
	)
);

/* Before Home Posts Widgetareas heading style */
$wp_customize->add_setting(
	'before_home_posts_widgetarea_heading_style',
	array(
		'default'           => $theme_options_defaults['before_home_posts_widgetarea_heading_style'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'before_home_posts_widgetarea_heading_style',
	array(
		'label'    => __( 'Widgets Title Style', 'blogty' ),
		'section'  => 'before_home_posts_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogty_get_title_styles(),
	)
);

/* Before Home Posts Widgetarea heading Align */
$wp_customize->add_setting(
	'before_home_posts_widgetarea_heading_align',
	array(
		'default'           => $theme_options_defaults['before_home_posts_widgetarea_heading_align'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'before_home_posts_widgetarea_heading_align',
	array(
		'label'    => __( 'Widgets Title Alignment', 'blogty' ),
		'section'  => 'before_home_posts_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogty_get_title_alignments(),
	)
);
