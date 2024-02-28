<?php
$wp_customize->add_section(
	'breadcrumb_options',
	array(
		'title' => __( 'Breadcrumb Options', 'blogty' ),
		'panel' => 'general_options_panel',
	)
);

/*Show Breadcrumb*/
$wp_customize->add_setting(
	'enable_breadcrumb',
	array(
		'default'           => $theme_options_defaults['enable_breadcrumb'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_breadcrumb',
		array(
			'label'    => __( 'Enable Breadcrumb', 'blogty' ),
			'section'  => 'breadcrumb_options',
			'priority' => 10,
		)
	)
);

/*Breadcrumb link Color*/
$wp_customize->add_setting(
	'breadcrumb_link_color',
	array(
		'default'           => $theme_options_defaults['breadcrumb_link_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'breadcrumb_link_color',
		array(
			'label'    => __( 'Breadcrumb Link Color', 'blogty' ),
			'section'  => 'breadcrumb_options',
			'type'     => 'color',
			'priority' => 20,
		)
	)
);
