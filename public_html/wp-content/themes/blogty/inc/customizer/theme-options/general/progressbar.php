<?php
$wp_customize->add_section(
	'progressbar_options',
	array(
		'title' => __( 'Progressbar Options', 'blogty' ),
		'panel' => 'general_options_panel',
	)
);

/*Show Progressbar*/
$wp_customize->add_setting(
	'show_progressbar',
	array(
		'default'           => $theme_options_defaults['show_progressbar'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'show_progressbar',
		array(
			'label'    => __( 'Show Progressbar', 'blogty' ),
			'section'  => 'progressbar_options',
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting(
	'progressbar_position',
	array(
		'default'           => $theme_options_defaults['progressbar_position'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'progressbar_position',
	array(
		'label'           => __( 'Progressbar Position', 'blogty' ),
		'section'         => 'progressbar_options',
		'type'            => 'select',
		'choices'         => array(
			'top'    => __( 'Top', 'blogty' ),
			'bottom' => __( 'Bottom', 'blogty' ),
		),
		'active_callback' => 'blogty_is_progressbar_enabled',
		'priority'        => 20,
	)
);

$wp_customize->add_setting(
	'progressbar_color',
	array(
		'default'           => $theme_options_defaults['progressbar_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'progressbar_color',
		array(
			'label'           => __( 'Progressbar Color', 'blogty' ),
			'section'         => 'progressbar_options',
			'type'            => 'color',
			'active_callback' => 'blogty_is_progressbar_enabled',
			'priority'        => 30,
		)
	)
);