<?php

// Upsell.
$wp_customize->add_section(
	'theme_upsell',
	array(
		'title'    => esc_html__( 'Unlock More Features', 'blogty' ),
		'priority' => 1,
	)
);
$wp_customize->add_setting(
	'theme_pro_features',
	array(
		'sanitize_callback' => '__return_true',
	)
);
$wp_customize->add_control(
	new Blogty_Upsell(
		$wp_customize,
		'theme_pro_features',
		array(
			'section' => 'theme_upsell',
			'type'    => 'upsell',
		)
	)
);

// General Options.
$wp_customize->add_section(
	new Blogty_Section_Features_List(
		$wp_customize,
		'theme_general_features',
		array(
			'title'         => esc_html__( 'More Options on Blogty Pro!', 'blogty' ),
			'features_list' => array(
				esc_html__( 'Dark mode options', 'blogty' ),
				esc_html__( 'Menu badge options', 'blogty' ),
				esc_html__( '17+ Preloader options', 'blogty' ),
				esc_html__( 'More color options', 'blogty' ),
				esc_html__( '404 page options', 'blogty' ),
				esc_html__( '... and many other premium features', 'blogty' ),
			),
			'panel'         => 'general_options_panel',
			'priority'      => 999,
		)
	)
);

// Header Options.
$wp_customize->add_section(
	new Blogty_Section_Features_List(
		$wp_customize,
		'theme_header_features',
		array(
			'title'         => esc_html__( 'More Options on Blogty Pro!', 'blogty' ),
			'features_list' => array(
				esc_html__( 'More topbar options', 'blogty' ),
				esc_html__( '4+ header styles', 'blogty' ),
				esc_html__( 'Header margin & padding controls', 'blogty' ),
				esc_html__( 'Dark mode options', 'blogty' ),
				esc_html__( 'More color options', 'blogty' ),
				esc_html__( '... and many other premium features', 'blogty' ),
			),
			'panel'         => 'header_options_panel',
			'priority'      => 999,
		)
	)
);

// Footer Options.
$wp_customize->add_section(
	new Blogty_Section_Features_List(
		$wp_customize,
		'theme_footer_features',
		array(
			'title'         => esc_html__( 'More Options on Blogty Pro!', 'blogty' ),
			'features_list' => array(
				esc_html__( '13+ footer layouts', 'blogty' ),
				esc_html__( '15+ footer shape dividers', 'blogty' ),
				esc_html__( 'Footer margin & padding controls', 'blogty' ),
				esc_html__( 'More sub footer styles', 'blogty' ),
				esc_html__( '15+ sub footer shape dividers', 'blogty' ),
				esc_html__( 'Sub footer margin & padding controls', 'blogty' ),
				esc_html__( '9+ scroll to top icons', 'blogty' ),
				esc_html__( 'More scroll to top options', 'blogty' ),
				esc_html__( 'Dark mode options', 'blogty' ),
				esc_html__( 'More color options', 'blogty' ),
				esc_html__( '... and many other premium features', 'blogty' ),
			),
			'panel'         => 'footer_options_panel',
			'priority'      => 999,
		)
	)
);

// Front Page.
$wp_customize->add_section(
	new Blogty_Section_Features_List(
		$wp_customize,
		'theme_widget_features_home',
		array(
			'title'             => esc_html__( 'Over 16+ Widgets', 'blogty' ),
			'description'       => sprintf( __( 'Along with the above sections, this theme comes with wide range of widgets that you can combine in any number and sequences and place in over 10+ widgetareas to build your unique website. <br/> <br/> Go to <a href="%s" target="_blank">widgets</a>.', 'blogty' ), esc_url( admin_url( 'widgets.php' ) ) ),
			'features_list'     => array(
				esc_html__( 'Ads Code', 'blogty' ),
				esc_html__( 'Author Info ( 3+ Styles )', 'blogty' ),
				esc_html__( 'Call To Action ( 4+ Styles )', 'blogty' ),
				esc_html__( 'Grid Posts ( 2+ Styles )', 'blogty' ),
				esc_html__( 'Heading ( 10+ Styles )', 'blogty' ),
				esc_html__( 'List Posts ( 11+ Styles )', 'blogty' ),
				esc_html__( 'Mailchimp/Newsletter ( 2+ Styles )', 'blogty' ),
				esc_html__( 'Popular Posts ( 5+ Styles )', 'blogty' ),
				esc_html__( 'Categories Grid ( 4+ Styles )', 'blogty' ),
				esc_html__( 'Posts Overlay Grid ( 7+ Styles )', 'blogty' ),
				esc_html__( 'Posts slider ( 2+ Styles )', 'blogty' ),
				esc_html__( 'Posts Carousel ( 2+ Styles )', 'blogty' ),
				esc_html__( 'Recent Posts ( 2+ Styles )', 'blogty' ),
				esc_html__( 'Single Column Posts', 'blogty' ),
				esc_html__( 'Tab Posts ( 3+ Styles )', 'blogty' ),
				esc_html__( 'Social Menu ( 4+ Styles )', 'blogty' ),
			),
			'is_upsell_feature' => false,
			'panel'             => 'theme_home_option_panel',
			'priority'          => 999,
		)
	)
);

// Typography Options.
$wp_customize->add_section(
	new Blogty_Section_Features_List(
		$wp_customize,
		'theme_typography_features',
		array(
			'title'         => esc_html__( 'More Options on Blogty Pro!', 'blogty' ),
			'features_list' => array(
				esc_html__( 'Line heights', 'blogty' ),
				esc_html__( 'Letter spacings', 'blogty' ),
				esc_html__( 'Menu font sizes', 'blogty' ),
				esc_html__( '(H1-H6) font sizes', 'blogty' ),
				esc_html__( 'Body font sizes', 'blogty' ),
				esc_html__( '... and many other premium features', 'blogty' ),
			),
			'panel'         => 'typography_options_panel',
			'priority'      => 999,
		)
	)
);

// Archive Options.
$wp_customize->add_section(
	new Blogty_Section_Features_List(
		$wp_customize,
		'theme_archive_features',
		array(
			'title'         => esc_html__( 'More Options on Blogty Pro!', 'blogty' ),
			'features_list' => array(
				esc_html__( '8+ archive styles', 'blogty' ),
				esc_html__( 'Read time options', 'blogty' ),
				esc_html__( 'More category styles', 'blogty' ),
				esc_html__( 'More read more styles', 'blogty' ),
				esc_html__( '... and many other premium features', 'blogty' ),
			),
			'panel'         => 'blog_options_panel',
			'priority'      => 999,
		)
	)
);

// Single Options.
$wp_customize->add_section(
	new Blogty_Section_Features_List(
		$wp_customize,
		'theme_single_features',
		array(
			'title'         => esc_html__( 'More Options on Blogty Pro!', 'blogty' ),
			'features_list' => array(
				esc_html__( '6+ single styles', 'blogty' ),
				esc_html__( '5+ post navigation styles', 'blogty' ),
				esc_html__( 'Floating related posts', 'blogty' ),
				esc_html__( 'Extended gallery formats', 'blogty' ),
				esc_html__( 'Extended audio formats', 'blogty' ),
				esc_html__( 'Extended video formats', 'blogty' ),
				esc_html__( 'Author box social links', 'blogty' ),
				esc_html__( 'Post subtitle options', 'blogty' ),
				esc_html__( 'Social share options', 'blogty' ),
				esc_html__( '... and many other premium features', 'blogty' ),
			),
			'panel'         => 'single_posts_options_panel',
			'priority'      => 999,
		)
	)
);

// Widgetare Options.
$wp_customize->add_section(
	new Blogty_Section_Features_List(
		$wp_customize,
		'theme_widgetarea_features',
		array(
			'title'         => esc_html__( 'More Options on Blogty Pro!', 'blogty' ),
			'features_list' => array(
				esc_html__( '15+ widgetareas shape dividers', 'blogty' ),
				esc_html__( '15+ widgetareas title styles', 'blogty' ),
				esc_html__( 'Widgetareas margin & padding', 'blogty' ),
				esc_html__( 'Widgetareas visibilty options', 'blogty' ),
				esc_html__( 'Dark mode options', 'blogty' ),
				esc_html__( 'More color options', 'blogty' ),
				esc_html__( '... and many other premium features', 'blogty' ),
			),
			'panel'         => 'widgetareas_options_panel',
			'priority'      => 999,
		)
	)
);