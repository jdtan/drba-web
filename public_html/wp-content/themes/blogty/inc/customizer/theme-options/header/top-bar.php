<?php
$wp_customize->add_section(
	'topbar_options',
	array(
		'title' => __( 'Topbar Options', 'blogty' ),
		'panel' => 'header_options_panel',
	)
);

/*Enable Top Bar*/
$wp_customize->add_setting(
	'enable_top_bar',
	array(
		'default'           => $theme_options_defaults['enable_top_bar'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_top_bar',
		array(
			'label'    => __( 'Enable Top Bar', 'blogty' ),
			'section'  => 'topbar_options',
			'priority' => 10,
		)
	)
);

/*Hide Top Bar on Mobile*/
$wp_customize->add_setting(
	'hide_top_bar_mobile',
	array(
		'default'           => $theme_options_defaults['hide_top_bar_mobile'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'hide_top_bar_mobile',
		array(
			'label'           => __( 'Hide Top Bar on Mobile', 'blogty' ),
			'section'         => 'topbar_options',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 20,
		)
	)
);

/*Stack Top Bar Items on Responsive*/
$wp_customize->add_setting(
	'stack_top_bar_col_responsive',
	array(
		'default'           => $theme_options_defaults['stack_top_bar_col_responsive'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'stack_top_bar_col_responsive',
		array(
			'label'           => __( 'Stack Top Bar Columns on Responsive', 'blogty' ),
			'section'         => 'topbar_options',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 30,
		)
	)
);

/*Enable Today's Date*/
$wp_customize->add_setting(
	'enable_todays_date',
	array(
		'default'           => $theme_options_defaults['enable_todays_date'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_todays_date',
		array(
			'label'           => __( 'Enable Today\'s Date', 'blogty' ),
			'section'         => 'topbar_options',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 50,
		)
	)
);

/*Todays Date Format*/
$wp_customize->add_setting(
	'todays_date_format',
	array(
		'default'           => $theme_options_defaults['todays_date_format'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'todays_date_format',
	array(
		'label'           => __( 'Today\'s Date Format', 'blogty' ),
		'description'     => sprintf(
			wp_kses(
				__( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'blogty' ),
				array(
					'a' => array(
						'href'   => array(),
						'target' => array(),
					),
				)
			),
			esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' )
		),
		'section'         => 'topbar_options',
		'type'            => 'text',
		'active_callback' => function ( $control ) {
			return (
				blogty_is_top_bar_enabled( $control )
				&&
				blogty_is_todays_date_enabled( $control )
			);
		},
		'priority'        => 60,
	)
);

/*Enable Top Social Nav*/
$wp_customize->add_setting(
	'enable_topbar_social_nav',
	array(
		'default'           => $theme_options_defaults['enable_topbar_social_nav'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_topbar_social_nav',
		array(
			'label'           => __( 'Enable Top Bar Social Nav Menu', 'blogty' ),
			'description'     => sprintf( __( 'You can add/edit social nav menu from <a href="%s">here</a>.', 'blogty' ), "javascript:wp.customize.control( 'nav_menu_locations[social-menu]' ).focus();" ),
			'section'         => 'topbar_options',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 70,
		)
	)
);

/*Enable Top Nav*/
$wp_customize->add_setting(
	'enable_top_nav',
	array(
		'default'           => $theme_options_defaults['enable_top_nav'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_top_nav',
		array(
			'label'           => __( 'Enable Top Bar Nav Menu', 'blogty' ),
			'description'     => sprintf( __( 'You can add/edit top nav menu from <a href="%s">here</a>.', 'blogty' ), "javascript:wp.customize.control( 'nav_menu_locations[top-menu]' ).focus();" ),
			'section'         => 'topbar_options',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 80,
		)
	)
);

/*Enable Search*/
$wp_customize->add_setting(
	'enable_search_on_top_bar',
	array(
		'default'           => $theme_options_defaults['enable_search_on_top_bar'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_search_on_top_bar',
		array(
			'label'           => __( 'Enable Search Icon', 'blogty' ),
			'section'         => 'topbar_options',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 90,
		)
	)
);

if ( blogty_is_wc_active() ) {

	/*Enable Mini Cart Icon on Top Bar*/
	$wp_customize->add_setting(
		'enable_woo_mini_cart_top_bar',
		array(
			'default'           => $theme_options_defaults['enable_woo_mini_cart_top_bar'],
			'sanitize_callback' => 'blogty_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new Blogty_Toggle_Control(
			$wp_customize,
			'enable_woo_mini_cart_top_bar',
			array(
				'label'           => __( 'Enable Mini Cart Icon', 'blogty' ),
				'section'         => 'topbar_options',
				'active_callback' => 'blogty_is_top_bar_enabled',
				'priority'        => 100,
			)
		)
	);

	/*Enable Myaccount Link Top Bar*/
	$wp_customize->add_setting(
		'enable_woo_my_account_top_bar',
		array(
			'default'           => $theme_options_defaults['enable_woo_my_account_top_bar'],
			'sanitize_callback' => 'blogty_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new Blogty_Toggle_Control(
			$wp_customize,
			'enable_woo_my_account_top_bar',
			array(
				'label'           => __( 'Enable My Account Icon', 'blogty' ),
				'section'         => 'topbar_options',
				'active_callback' => 'blogty_is_top_bar_enabled',
				'priority'        => 110,
			)
		)
	);

}

/*Top Bar background Color*/
$wp_customize->add_setting(
	'top_bar_bg_color',
	array(
		'default'           => $theme_options_defaults['top_bar_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_bar_bg_color',
		array(
			'label'           => __( 'Top Bar Background Color', 'blogty' ),
			'section'         => 'topbar_options',
			'type'            => 'color',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 120,
		)
	)
);

// Top Bar Date Color
$wp_customize->add_setting(
	'top_bar_date_color',
	array(
		'default'           => $theme_options_defaults['top_bar_date_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_bar_date_color',
		array(
			'label'           => __( 'Top Bar Date Color', 'blogty' ),
			'section'         => 'topbar_options',
			'type'            => 'color',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 130,
		)
	)
);

// Top Bar Nav Menu Color
$wp_customize->add_setting(
	'top_bar_nav_menu_color',
	array(
		'default'           => $theme_options_defaults['top_bar_nav_menu_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_bar_nav_menu_color',
		array(
			'label'           => __( 'Top Bar Nav Menu Color', 'blogty' ),
			'section'         => 'topbar_options',
			'type'            => 'color',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 140,
		)
	)
);

// Top Bar Nav Menu Hover Color
$wp_customize->add_setting(
	'top_bar_nav_menu_hover_color',
	array(
		'default'           => $theme_options_defaults['top_bar_nav_menu_hover_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_bar_nav_menu_hover_color',
		array(
			'label'           => __( 'Top Bar Nav Menu Hover Color', 'blogty' ),
			'section'         => 'topbar_options',
			'type'            => 'color',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 150,
		)
	)
);

/*Top Bar Sub Menu Color*/
$wp_customize->add_setting(
	'top_bar_sub_menu_color',
	array(
		'default'           => $theme_options_defaults['top_bar_sub_menu_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_bar_sub_menu_color',
		array(
			'label'           => __( 'Top Bar Sub Menu Color', 'blogty' ),
			'section'         => 'topbar_options',
			'type'            => 'color',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 160,
		)
	)
);

/*Top Bar Sub Menu Hover Color*/
$wp_customize->add_setting(
	'top_bar_sub_menu_hover_color',
	array(
		'default'           => $theme_options_defaults['top_bar_sub_menu_hover_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_bar_sub_menu_hover_color',
		array(
			'label'           => __( 'Top Bar Sub Menu Hover Color', 'blogty' ),
			'section'         => 'topbar_options',
			'type'            => 'color',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 160,
		)
	)
);

/*Top Bar Sub Menu Background Color*/
$wp_customize->add_setting(
	'top_bar_sub_menu_bg_color',
	array(
		'default'           => $theme_options_defaults['top_bar_sub_menu_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_bar_sub_menu_bg_color',
		array(
			'label'           => __( 'Top Bar Sub Menu Background Color', 'blogty' ),
			'section'         => 'topbar_options',
			'type'            => 'color',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 160,
		)
	)
);

/*Enable Border Bottom*/
$wp_customize->add_setting(
	'enable_topbar_border_bottom',
	array(
		'default'           => $theme_options_defaults['enable_topbar_border_bottom'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_topbar_border_bottom',
		array(
			'label'           => __( 'Enable Border Bottom', 'blogty' ),
			'section'         => 'topbar_options',
			'active_callback' => 'blogty_is_top_bar_enabled',
			'priority'        => 170,
		)
	)
);