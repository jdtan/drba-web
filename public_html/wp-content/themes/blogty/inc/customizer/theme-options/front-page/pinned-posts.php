<?php
// Pinned Posts Options.
$wp_customize->add_section(
	'home_page_pinned_posts_options',
	array(
		'title'           => __( 'Pinned Post Options', 'blogty' ),
		'panel'           => 'theme_home_option_panel',
		'active_callback' => function( $control ) {
			return (
				blogty_is_home_banner_enabled( $control )
				&&
				blogty_is_home_banner_not_fullwidth( $control )
			);
		},
	)
);

// Enable Pinned Posts.
$wp_customize->add_setting(
	'enable_pinned_posts',
	array(
		'default'           => $theme_options_defaults['enable_pinned_posts'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_pinned_posts',
		array(
			'label'   => __( 'Enable Pinned Posts', 'blogty' ),
			'section' => 'home_page_pinned_posts_options',
		)
	)
);

// Pinned Posts Title.
$wp_customize->add_setting(
	'pinned_posts_title',
	array(
		'default'           => $theme_options_defaults['pinned_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'pinned_posts_title',
	array(
		'label'           => __( 'Pinned Posts Title', 'blogty' ),
		'description'     => __( 'Leave empty if you don\'t want to show the title.', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'text',
		'active_callback' => 'blogty_is_pinned_posts_enabled',
	)
);

// Pinned Posts Title Style.
$wp_customize->add_setting(
	'pinned_posts_title_style',
	array(
		'default'           => $theme_options_defaults['pinned_posts_title_style'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_title_style',
	array(
		'label'           => __( 'Pinned Posts Title Style', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => blogty_get_title_styles(),
		'active_callback' => 'blogty_is_pinned_posts_enabled',
	)
);

// Pinned Posts Title Align.
$wp_customize->add_setting(
	'pinned_posts_title_align',
	array(
		'default'           => $theme_options_defaults['pinned_posts_title_align'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_title_align',
	array(
		'label'           => __( 'Pinned Posts Title Alignment', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => blogty_get_title_alignments(),
		'active_callback' => 'blogty_is_pinned_posts_enabled',
	)
);

// Pinned Posts Content from ids or category.
$wp_customize->add_setting(
	'pinned_posts_content_from',
	array(
		'default'           => $theme_options_defaults['pinned_posts_content_from'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_content_from',
	array(
		'label'           => __( 'Get Pinned Posts From', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'category' => __( 'Category', 'blogty' ),
			'post_ids' => __( 'Post ID\'s', 'blogty' ),
		),
		'active_callback' => 'blogty_is_pinned_posts_enabled',
	)
);

// Pinned Posts Category.
$wp_customize->add_setting(
	'pinned_posts_cat',
	array(
		'default'           => $theme_options_defaults['pinned_posts_cat'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Blogty_Dropdown_Taxonomies_Control(
		$wp_customize,
		'pinned_posts_cat',
		array(
			'label'           => __( 'Choose Pinned Posts Category', 'blogty' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => function( $control ) {
				return (
					blogty_is_pinned_posts_enabled( $control )
					&&
					blogty_pinned_posts_content_from_category( $control )
				);
			},
		)
	)
);

// Pinned Post IDs.
$wp_customize->add_setting(
	'pinned_posts_ids',
	array(
		'default'           => $theme_options_defaults['pinned_posts_ids'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'pinned_posts_ids',
	array(
		'label'           => __( 'Post ID\'s', 'blogty' ),
		'description'     => __( 'Comma ( , ) separated posts ids. Ex: 1, 2. Only 2 posts will be shown.', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'text',
		'active_callback' => function( $control ) {
			return (
				blogty_is_pinned_posts_enabled( $control )
				&&
				blogty_pinned_posts_content_from_post_ids( $control )
			);
		},
	)
);

// Enable Pinned Posts Overlay.
$wp_customize->add_setting(
	'enable_pinned_posts_overlay',
	array(
		'default'           => $theme_options_defaults['enable_pinned_posts_overlay'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_pinned_posts_overlay',
		array(
			'label'           => __( 'Show Pinned Posts Overlay', 'blogty' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => 'blogty_is_pinned_posts_enabled',
		)
	)
);

// Pinned Posts overlay color.
$wp_customize->add_setting(
	'pinned_posts_overlay_color',
	array(
		'default'           => $theme_options_defaults['pinned_posts_overlay_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'pinned_posts_overlay_color',
		array(
			'label'           => __( 'Overlay Color', 'blogty' ),
			'section'         => 'home_page_pinned_posts_options',
			'type'            => 'color',
			'active_callback' => function( $control ) {
				return (
					blogty_is_pinned_posts_enabled( $control )
					&&
					blogty_is_pinned_overlay_enabled( $control )
				);
			},
		)
	)
);

// Pinned Post Overlay Opacity.
$wp_customize->add_setting(
	'pinned_posts_overlay_opacity',
	array(
		'default'           => $theme_options_defaults['pinned_posts_overlay_opacity'],
		'sanitize_callback' => 'blogty_sanitize_float',
	)
);
$wp_customize->add_control(
	'pinned_posts_overlay_opacity',
	array(
		'label'           => __( 'Overlay Opacity', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'number',
		'input_attrs'     => array(
			'min'   => 0,
			'max'   => 1,
			'step'  => 0.1,
			'style' => 'width: 150px;',
		),
		'active_callback' => function( $control ) {
			return (
				blogty_is_pinned_posts_enabled( $control )
				&&
				blogty_is_pinned_overlay_enabled( $control )
			);
		},
	)
);

// Show Pinned Post Category.
$wp_customize->add_setting(
	'show_pinned_posts_category',
	array(
		'default'           => $theme_options_defaults['show_pinned_posts_category'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'show_pinned_posts_category',
		array(
			'label'           => __( 'Show Category', 'blogty' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => 'blogty_is_pinned_posts_enabled',
		)
	)
);

// Pinned Posts Category Color Display.
$wp_customize->add_setting(
	'pinned_posts_category_color_display',
	array(
		'default'           => $theme_options_defaults['pinned_posts_category_color_display'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_category_color_display',
	array(
		'label'           => __( 'Pinned Posts Category Color Display', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => blogty_get_category_color_display(),
		'active_callback' => function( $control ) {
			return (
				blogty_is_pinned_posts_enabled( $control )
				&&
				blogty_is_pinned_posts_category_enabled( $control )
			);
		},
	)
);

// Pinned Post Category Style.
$wp_customize->add_setting(
	'pinned_posts_category_style',
	array(
		'default'           => $theme_options_defaults['pinned_posts_category_style'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_category_style',
	array(
		'label'           => __( 'Pinned Post Category Style', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => blogty_get_category_styles(),
		'active_callback' => function( $control ) {
			return (
				blogty_is_pinned_posts_enabled( $control )
				&&
				blogty_is_pinned_posts_category_enabled( $control )
			);
		},
	)
);

// No of Pinned Post Categories.
$wp_customize->add_setting(
	'pinned_posts_category_limit',
	array(
		'default'           => $theme_options_defaults['pinned_posts_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'pinned_posts_category_limit',
	array(
		'label'           => __( 'Number of Categories To Display', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'number',
		'active_callback' => function( $control ) {
			return (
				blogty_is_pinned_posts_enabled( $control )
				&&
				blogty_is_pinned_posts_category_enabled( $control )
			);
		},
	)
);

/* Pinned Posts Meta */
$wp_customize->add_setting(
	'pinned_post_meta',
	array(
		'default'           => $theme_options_defaults['pinned_post_meta'],
		'sanitize_callback' => 'blogty_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Blogty_Checkbox_Multiple(
		$wp_customize,
		'pinned_post_meta',
		array(
			'label'           => __( 'Pinned Post Meta', 'blogty' ),
			'section'         => 'home_page_pinned_posts_options',
			'choices'         => array(
				'author'    => __( 'Author', 'blogty' ),
				'read_time' => __( 'Post Read Time', 'blogty' ),
				'date'      => __( 'Date', 'blogty' ),
				'comment'   => __( 'Comment', 'blogty' ),
			),
			'active_callback' => 'blogty_is_pinned_posts_enabled',
		)
	)
);

// Show Post Meta Icon.
$wp_customize->add_setting(
	'show_pinned_post_meta_icon',
	array(
		'default'           => $theme_options_defaults['show_pinned_post_meta_icon'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'show_pinned_post_meta_icon',
		array(
			'label'       => __( 'Show Post Meta Icon', 'blogty' ),
			'description' => __( 'Some Icons may show up regardless to provide better info.', 'blogty' ),
			'section'     => 'home_page_pinned_posts_options',
			'active_callback' => 'blogty_is_pinned_posts_enabled',
		)
	)
);

// Pinned Posts Date Format
$wp_customize->add_setting(
	'pinned_posts_date_format',
	array(
		'default'           => $theme_options_defaults['pinned_posts_date_format'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_date_format',
	array(
		'label'           => __( 'Date Format', 'blogty' ),
		'description'     => __( 'Make sure to enable Date post meta from above for this to work.', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'format_1' => __( 'Times Ago', 'blogty' ),
			'format_2' => __( 'Default Format', 'blogty' ),
		),
		'active_callback' => 'blogty_is_pinned_posts_enabled',
	)
);

// Show Pinned Posts author image.
$wp_customize->add_setting(
	'enable_pinned_posts_author_image',
	array(
		'default'           => $theme_options_defaults['enable_pinned_posts_author_image'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_pinned_posts_author_image',
		array(
			'label'           => __( 'Show Author Image', 'blogty' ),
			'description'     => __( 'Make sure to enable Author post meta from above for this to work.', 'blogty' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => 'blogty_is_pinned_posts_enabled',
		)
	)
);

// Post Title Limit.
$wp_customize->add_setting(
	'pinned_posts_title_limit',
	array(
		'default'           => '',
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_title_limit',
	array(
		'label'           => __( 'Post Title Limit', 'blogty' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => blogty_get_title_limit_choices(),
		'active_callback' => 'blogty_is_pinned_posts_enabled',
	)
);

// Show Post Format Icons.
$wp_customize->add_setting(
	'show_pinned_posts_post_format_icon',
	array(
		'default'           => $theme_options_defaults['show_pinned_posts_post_format_icon'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'show_pinned_posts_post_format_icon',
		array(
			'label'           => __( 'Show Post Format Icon', 'blogty' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => 'blogty_is_pinned_posts_enabled',
		)
	)
);
