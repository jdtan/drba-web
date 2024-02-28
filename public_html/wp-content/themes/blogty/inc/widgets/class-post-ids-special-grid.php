<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Post_Ids_Special_Grid extends Blogty_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogty_post_ids_special_grid';
		$this->widget_description = __( 'Displays posts in special grid style', 'blogty' );
		$this->widget_id          = 'blogty_post_ids_special_grid';
		$this->widget_name        = __( 'Blogty: Overlay Posts', 'blogty' );

		$this->settings = array(
			'title'                     => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
			),
			'post_settings_heading'     => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'blogty' ),
			),
			'post_ids'                  => array(
				'type'  => 'text',
				'label' => __( 'Enter Post ID\'s', 'blogty' ),
				'desc'  => __( 'Post IDs, separated by commas. Eg: 1, 2, 3', 'blogty' ),
			),
			'or'                        => array(
				'type'  => 'subtitle',
				'label' => __( '&mdash; Or &mdash;', 'blogty' ),
			),
			'post_cat'                  => array(
				'type'  => 'dropdown-taxonomies',
				'label' => __( 'Select Category', 'blogty' ),
				'desc'  => __( 'Only select category if you want the posts to be category specific instead of using post IDs from above.', 'blogty' ),
				'args'  => array(
					'taxonomy'        => 'category',
					'class'           => 'widefat',
					'hierarchical'    => true,
					'show_count'      => 1,
					'show_option_all' => __( '&mdash; Select &mdash;', 'blogty' ),
				),
			),
			'no_of_posts'               => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 4,
				'label' => __( 'Number of posts to show', 'blogty' ),
			),
			'offset'                    => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'blogty' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'blogty' ),
			),
			'orderby'                   => array(
				'type'    => 'select',
				'std'     => 'date',
				'label'   => __( 'Order By', 'blogty' ),
				'options' => array(
					'date'  => __( 'Date', 'blogty' ),
					'ID'    => __( 'ID', 'blogty' ),
					'title' => __( 'Title', 'blogty' ),
					'rand'  => __( 'Random', 'blogty' ),
				),
			),
			'order'                     => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'blogty' ),
				'options' => array(
					'asc'  => __( 'ASC', 'blogty' ),
					'desc' => __( 'DESC', 'blogty' ),
				),
			),
			'category_settings_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Category Settings', 'blogty' ),
			),
			'show_category'             => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Category', 'blogty' ),
				'std'   => true,
			),
			'category_color'            => array(
				'type'    => 'select',
				'label'   => __( 'Category Color', 'blogty' ),
				'options' => blogty_get_category_color_display(),
				'std'     => 'as_bg',
			),
			'category_style'            => array(
				'type'    => 'select',
				'label'   => __( 'Category Style', 'blogty' ),
				'options' => blogty_get_category_styles(),
				'std'     => 'style_2',
			),
			'no_of_category'            => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 1,
				'label' => __( 'Number of Category to Display', 'blogty' ),
			),
			'meta_settings_heading'     => array(
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'blogty' ),
			),
			'post_meta'                 => array(
				'type'    => 'multi-checkbox',
				'label'   => __( 'Post Meta', 'blogty' ),
				'options' => array(
					'author'    => __( 'Author', 'blogty' ),
					'read_time' => __( 'Post Read Time', 'blogty' ),
					'date'      => __( 'Date', 'blogty' ),
					'comment'   => __( 'Comment', 'blogty' ),
				),
				'std'     => array( 'date' ),
			),
			'post_meta_icon'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Meta Icon', 'blogty' ),
				'desc'  => __( 'Some Icons may show up regardless to provide better info.', 'blogty' ),
				'std'   => true,
			),
			'date_format'               => array(
				'type'    => 'select',
				'label'   => __( 'Date Format', 'blogty' ),
				'desc'    => __( 'Make sure to select Date from above for this to work.', 'blogty' ),
				'options' => array(
					'format_1' => __( 'Times Ago', 'blogty' ),
					'format_2' => __( 'Default Format', 'blogty' ),
				),
				'std'     => 'format_1',
			),
			'author_image'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Author Image', 'blogty' ),
				'desc'  => __( 'Make sure to select Author from above for this to work. Will only show up in express post.', 'blogty' ),
				'std'   => false,
			),
			'widget_settings_heading'   => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogty' ),
			),
			'special_grid_style'        => array(
				'type'    => 'select',
				'label'   => __( 'Grid Style', 'blogty' ),
				'options' => array(
					'grid_style_1' => __( 'Style 1', 'blogty' ),
					'grid_style_2' => __( 'Style 2', 'blogty' ),
					'grid_style_3' => __( 'Style 3', 'blogty' ),
					'grid_style_4' => __( 'Style 4', 'blogty' ),
					'grid_style_5' => __( 'Style 5', 'blogty' ),
					'grid_style_6' => __( 'Style 6', 'blogty' ),
					'grid_style_7' => __( 'Style 7', 'blogty' ),
				),
				'std'     => 'grid_style_1',
			),
			'enable_post_format_icon'   => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Post Format Icon', 'blogty' ),
				'std'   => false,
			),
			'title_limit'               => array(
				'type'    => 'select',
				'label'   => __( 'Post Title Limit', 'blogty' ),
				'options' => blogty_get_title_limit_choices(),
				'std'     => '',
			),
		);

		parent::__construct();
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		ob_start();

		$is_cat = false;
		if ( ! empty( $instance['post_cat'] ) && -1 != $instance['post_cat'] && 0 != $instance['post_cat'] ) {
			$is_cat = true;
		}

		if ( ! empty( $instance['post_ids'] ) || $is_cat ) {

			$query_args = array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'no_found_rows'       => 1,
				'ignore_sticky_posts' => 1,
			);

			if ( $is_cat ) {

				$number  = ! empty( $instance['no_of_posts'] ) ? absint( $instance['no_of_posts'] ) : $this->settings['no_of_posts']['std'];
				$orderby = ! empty( $instance['orderby'] ) ? sanitize_text_field( $instance['orderby'] ) : $this->settings['orderby']['std'];
				$order   = ! empty( $instance['order'] ) ? sanitize_text_field( $instance['order'] ) : $this->settings['order']['std'];
				$offset  = ! empty( $instance['offset'] ) ? sanitize_text_field( $instance['offset'] ) : $this->settings['offset']['std'];

				$query_args['posts_per_page'] = $number;
				$query_args['orderby']        = $orderby;
				$query_args['order']          = $order;

				if ( $offset && 0 != $offset ) {
					$query_args['offset'] = absint( $offset );
				}

				$query_args['tax_query'][] = array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $instance['post_cat'],
				);

			} else {

				$post_ids = explode( ',', esc_attr( $instance['post_ids'] ) );

				$query_args['post__in']       = $post_ids;
				$query_args['orderby']        = 'post__in';
				$query_args['posts_per_page'] = count( $post_ids );

			}

			$query = new WP_Query( $query_args );

			if ( $query->have_posts() ) {

				$this->widget_start( $args, $instance );

				$counter = 1;
				$j       = 0;

				$found_post = $query->post_count;

				$style                   = isset( $instance['special_grid_style'] ) ? $instance['special_grid_style'] : $this->settings['special_grid_style']['std'];
				$title_limit             = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
				$enable_post_format_icon = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];
				$col_arr_class           = array( 'col-lg-6', 'col-sm-6 col-lg-3', 'col-sm-6 col-lg-3' );

				if ( 'grid_style_6' == $style ) {
					$col_arr_class = array( 'col-lg-8', 'col-lg-4' );
				}

				do_action( 'blogty_before_post_ids_special_grid' );
				?>
				<div class="blogty-post-ids-special-grid <?php echo esc_attr( $style ); ?>">
					<div class="row g-1">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();

							$grid_wrapper_start = $grid_wrapper_end = '';

							switch ( $style ) {
								case 'grid_style_1':
									if ( 1 == $counter ) {
										$col_class = 'col-lg-6 first-col';
									} elseif ( $counter == 2 ) {
										$grid_wrapper_start = '<div class="col-lg-6 second-col"><div class="row g-1">';
										$col_class          = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 3 ) {
										$col_class = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 4 ) {
										$col_class        = 'col-md-12';
										$grid_wrapper_end = '</div></div>';
									} else {
										$col_class = 'col-md-4';
									}
									break;
								case 'grid_style_2':
									if ( 1 == $counter ) {
										$col_class = 'col-lg-6 first-col';
									} elseif ( $counter == 2 ) {
										$grid_wrapper_start = '<div class="col-lg-6 second-col"><div class="row g-1">';
										$col_class          = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 3 ) {
										$col_class = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 4 ) {
										$col_class = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 5 ) {
										$col_class        = 'col-md-6';
										$grid_wrapper_end = '</div></div>';
									} else {
										$col_class = 'col-md-4';
									}
									break;
								case 'grid_style_3':
								case 'grid_style_6':
									$col_class = $col_arr_class[ $j ];
									break;
								case 'grid_style_4':
									if ( 1 == $counter ) {
										$grid_wrapper_start = '<div class="col-lg-3 first-col"><div class="row g-1">';
										$col_class          = 'col-sm-6 col-lg-12';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 2 ) {
										$col_class        = 'col-sm-6 col-lg-12';
										$grid_wrapper_end = '</div></div>';
									} elseif ( $counter == 3 ) {
										$grid_wrapper_start = '<div class="col-lg-6 mid-col">';
										$col_class          = '';
										$grid_wrapper_end   = '</div>';
									} elseif ( $counter == 4 ) {
										$grid_wrapper_start = '<div class="col-lg-3 last-col"><div class="row g-1">';
										$col_class          = 'col-sm-6 col-lg-12';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 5 ) {
										$col_class        = 'col-sm-6 col-lg-12';
										$grid_wrapper_end = '</div></div>';
									} else {
										$col_class = 'col-md-4';
									}
									break;
								case 'grid_style_7':
									$col_class = 'col-md-6';
									break;
								default:
									$col_class = 'col-md-4';
							}

							?>
							
							<?php echo wp_kses_post( $grid_wrapper_start ); ?>

							<div class="<?php echo esc_attr( $col_class ); ?>">
								<div class="saga-block-item-w-overlay img-animate-zoom">
									<div class="saga-block-image-w-overlay blogty-rounded-img">
										<a href="<?php the_permalink(); ?>" class="">
											<?php
											if ( $enable_post_format_icon ) {
												blogty_post_format_icon( 'right' );
											}
											?>
											<span aria-hidden="true" class="blogty-block-overlay overlay_w_gradient"></span>
											<?php the_post_thumbnail( 'blogty-large-img' ); ?>
										</a>
									</div>
									<div class="saga-block-overlay-content">
										<?php
										$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];

										if ( $show_category ) {
											$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
											$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
											$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
											blogty_post_categories( $cat_style, $color, $limit );
										}

										?>
										<h3 class="saga-block-overlay-title blogty-limit-lines <?php echo esc_attr( $title_limit ); ?>">
											<a href="<?php the_permalink(); ?>" class="text-decoration-none blogty-title-line">
												<?php the_title(); ?>
											</a>
										</h3>
										<?php
										// Post Meta.
										$enabled_post_meta            = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
										$meta_settings['date_format'] = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
										$meta_settings['show_icons']  = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];

										// Author Image.
										$meta_settings['author_image'] = false;
										if ( 1 == $counter ) {
											$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
										}
										if ( 'grid_style_3' == $style || 'grid_style_4' == $style || 'grid_style_6' == $style ) {
											$meta_settings['author_image'] = false;
										}
										if ( 'grid_style_4' == $style && 3 == $counter ) {
											$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
										}
										if ( 'grid_style_5' == $style || 'grid_style_7' == $style ) {
											$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
										}
										blogty_post_meta_info( $enabled_post_meta, $meta_settings );
										?>
									</div>
								</div>
							</div><!-- col -->
							
							<?php echo wp_kses_post( $grid_wrapper_end ); ?>

							<?php
							if ( 'grid_style_3' == $style ) {
								++$j;
								if ( $counter % 3 == 0 ) {
									$j             = 0;
									$col_arr_class = array_reverse( $col_arr_class );
								}
							}
							if ( 'grid_style_6' == $style ) {
								++$j;
								if ( $counter % 2 == 0 ) {
									$j             = 0;
									$col_arr_class = array_reverse( $col_arr_class );
								}
							}
							++$counter;
							endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div><!--.blogty-post-ids-special-grid-->
				<?php
				do_action( 'blogty_after_post_ids_special_grid' );

				$this->widget_end( $args );
			}
		}
		echo ob_get_clean();
	}
}
