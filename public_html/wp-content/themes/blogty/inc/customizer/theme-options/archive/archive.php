<?php
$wp_customize->add_section(
	'archive_options',
	array(
		'title' => __( 'Archive Post Options', 'blogty' ),
		'panel' => 'blog_options_panel',
	)
);

/* Archive Style */
$wp_customize->add_setting(
	'archive_style',
	array(
		'default'           => $theme_options_defaults['archive_style'],
		'sanitize_callback' => 'blogty_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Blogty_Radio_Image_Control(
		$wp_customize,
		'archive_style',
		array(
			'label'    => __( 'Archive Style', 'blogty' ),
			'section'  => 'archive_options',
			'choices'  => blogty_get_archive_layouts(),
			'priority' => 10,
		)
	)
);

/*Archive Pagination Type*/
$wp_customize->add_setting(
	'pagination_type',
	array(
		'default'           => $theme_options_defaults['pagination_type'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'pagination_type',
	array(
		'label'    => __( 'Archive Pagination Type', 'blogty' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => array(
			'default'              => __( 'Default (Older / Newer Post)', 'blogty' ),
			'none'                 => __( 'None', 'blogty' ),
			'numeric'              => __( 'Numeric', 'blogty' ),
			'button_click_load'    => __( 'Load more post on click', 'blogty' ),
			'infinite_scroll_load' => __( 'Load more posts on scroll', 'blogty' ),
		),
		'priority' => 20,
	)
);

// Center pagination.
$wp_customize->add_setting(
	'center_aligned_pagination',
	array(
		'default'           => $theme_options_defaults['center_aligned_pagination'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'center_aligned_pagination',
		array(
			'label'    => __( 'Center Align Pagination', 'blogty' ),
			'section'  => 'archive_options',
			'priority' => 30,
		)
	)
);

/* Archive Meta */
$wp_customize->add_setting(
	'archive_post_meta',
	array(
		'default'           => $theme_options_defaults['archive_post_meta'],
		'sanitize_callback' => 'blogty_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Blogty_Checkbox_Multiple(
		$wp_customize,
		'archive_post_meta',
		array(
			'label'       => __( 'Archive Post Meta', 'blogty' ),
			'description' => __(
				'Choose the post meta you want to be displayed on archive post listings.
            Some meta values may not show on front end in case of certain archive style or if post have post-formats.',
				'blogty'
			),
			'section'     => 'archive_options',
			'choices'     => array(
				'author'    => __( 'Author', 'blogty' ),
				'read_time' => __( 'Post Read Time', 'blogty' ),
				'date'      => __( 'Date', 'blogty' ),
				'comment'   => __( 'Comment', 'blogty' ),
				'category'  => __( 'Category', 'blogty' ),
				'tags'      => __( 'Tags', 'blogty' ),
			),
			'priority'    => 40,
		)
	)
);

// Show Post Meta Icon.
$wp_customize->add_setting(
	'show_archive_post_meta_icon',
	array(
		'default'           => $theme_options_defaults['show_archive_post_meta_icon'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'show_archive_post_meta_icon',
		array(
			'label'       => __( 'Show Post Meta Icon', 'blogty' ),
			'description' => __( 'Some Icons may show up regardless to provide better info.', 'blogty' ),
			'section'     => 'archive_options',
			'priority'    => 50,
		)
	)
);

// Archive Post Date Format.
$wp_customize->add_setting(
	'archive_date_format',
	array(
		'default'           => $theme_options_defaults['archive_date_format'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_date_format',
	array(
		'label'       => __( 'Date Format', 'blogty' ),
		'description' => __( 'Make sure to enable Date post meta from above for this to work.', 'blogty' ),
		'section'     => 'archive_options',
		'type'        => 'select',
		'choices'     => array(
			'format_1' => __( 'Times Ago', 'blogty' ),
			'format_2' => __( 'Default Format', 'blogty' ),
		),
		'priority'    => 60,
	)
);

// Show Archive Post author image.
$wp_customize->add_setting(
	'enable_archive_author_image',
	array(
		'default'           => $theme_options_defaults['enable_archive_author_image'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_archive_author_image',
		array(
			'label'       => __( 'Show Author Image', 'blogty' ),
			'description' => __( 'Make sure to enable Author post meta from above for this to work.', 'blogty' ),
			'section'     => 'archive_options',
			'priority'    => 70,
		)
	)
);

// Show Archive Category Label.
$wp_customize->add_setting(
	'enable_archive_cat_label',
	array(
		'default'           => $theme_options_defaults['enable_archive_cat_label'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_archive_cat_label',
		array(
			'label'       => __( 'Show Category Label', 'blogty' ),
			'description' => __( 'Make sure to enable Category post meta from above for this to work.', 'blogty' ),
			'section'     => 'archive_options',
			'priority'    => 80,
		)
	)
);

// Archive Category Color Display.
$wp_customize->add_setting(
	'archive_category_color_display',
	array(
		'default'           => $theme_options_defaults['archive_category_color_display'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_category_color_display',
	array(
		'label'    => __( 'Archive Category Color Display', 'blogty' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => blogty_get_category_color_display(),
		'priority' => 90,
	)
);

/* Category Style in Archive Page*/
$wp_customize->add_setting(
	'archive_category_style',
	array(
		'default'           => $theme_options_defaults['archive_category_style'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_category_style',
	array(
		'label'    => __( 'Archive Category Style', 'blogty' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => blogty_get_category_styles(),
		'priority' => 100,
	)
);

// No of Archive Categories.
$wp_customize->add_setting(
	'archive_category_limit',
	array(
		'default'           => $theme_options_defaults['archive_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'archive_category_limit',
	array(
		'label'       => __( 'Limit Categories To Display', 'blogty' ),
		'description' => __( 'Use 0 for no limit.', 'blogty' ),
		'section'     => 'archive_options',
		'type'        => 'number',
		'priority'    => 110,
	)
);

// Archive Category Position.
$wp_customize->add_setting(
	'archive_category_position',
	array(
		'default'           => $theme_options_defaults['archive_category_position'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_category_position',
	array(
		'label'    => __( 'Archive Category Position', 'blogty' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => array(
			'before_title'  => __( 'Before Title', 'blogty' ),
			'after_excerpt' => __( 'After Excerpt', 'blogty' ),
		),
		'priority' => 120,
	)
);

// Show Archive Tag Label.
$wp_customize->add_setting(
	'enable_archive_tag_label',
	array(
		'default'           => $theme_options_defaults['enable_archive_tag_label'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'enable_archive_tag_label',
		array(
			'label'       => __( 'Show Tag Label', 'blogty' ),
			'description' => __( 'Make sure to enable Tags post meta from above for this to work.', 'blogty' ),
			'section'     => 'archive_options',
			'priority'    => 130,
		)
	)
);

/* Tag Style in Archive Page*/
$wp_customize->add_setting(
	'archive_tag_style',
	array(
		'default'           => $theme_options_defaults['archive_tag_style'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_tag_style',
	array(
		'label'    => __( 'Archive Tag Style', 'blogty' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => blogty_get_tag_styles(),
		'priority' => 140,
	)
);

// No of Archive Tags.
$wp_customize->add_setting(
	'archive_tag_limit',
	array(
		'default'           => $theme_options_defaults['archive_tag_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'archive_tag_limit',
	array(
		'label'       => __( 'Limit Tags To Display', 'blogty' ),
		'description' => __( 'Use 0 for no limit.', 'blogty' ),
		'section'     => 'archive_options',
		'type'        => 'number',
		'priority'    => 150,
	)
);

// Show Post Format Icon.
$wp_customize->add_setting(
	'show_archive_post_format_icon',
	array(
		'default'           => $theme_options_defaults['show_archive_post_format_icon'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'show_archive_post_format_icon',
		array(
			'label'       => __( 'Show Post Format Icon', 'blogty' ),
			'description' => __( 'Will not display on certain archive styles.', 'blogty' ),
			'section'     => 'archive_options',
			'priority'    => 160,
		)
	)
);

// Archive Posts Title Limit.
$wp_customize->add_setting(
	'archive_posts_title_limit',
	array(
		'default'           => '',
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_posts_title_limit',
	array(
		'label'    => __( 'Post Title Limit', 'blogty' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => blogty_get_title_limit_choices(),
		'priority' => 170,
	)
);

// Show Excerpt.
$wp_customize->add_setting(
	'show_archive_excerpt',
	array(
		'default'           => $theme_options_defaults['show_archive_excerpt'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'show_archive_excerpt',
		array(
			'label'       => __( 'Show Excerpt', 'blogty' ),
			'description' => __( 'Will not display on certain post formats and archive styles.', 'blogty' ),
			'section'     => 'archive_options',
			'priority'    => 180,
		)
	)
);

// Show Read More.
$wp_customize->add_setting(
	'show_archive_read_more',
	array(
		'default'           => $theme_options_defaults['show_archive_read_more'],
		'sanitize_callback' => 'blogty_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogty_Toggle_Control(
		$wp_customize,
		'show_archive_read_more',
		array(
			'label'       => __( 'Show Read More', 'blogty' ),
			'description' => __( 'Will not display on certain post formats and archive styles.', 'blogty' ),
			'section'     => 'archive_options',
			'priority'    => 190,
		)
	)
);

// Read more stlye.
$wp_customize->add_setting(
	'archive_read_more_style',
	array(
		'default'           => $theme_options_defaults['archive_read_more_style'],
		'sanitize_callback' => 'blogty_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_read_more_style',
	array(
		'label'           => __( 'Read More Style', 'blogty' ),
		'section'         => 'archive_options',
		'type'            => 'select',
		'choices'         => blogty_get_read_more_styles(),
		'active_callback' => 'blogty_is_archive_read_more_enabled',
		'priority'        => 200,
	)
);
