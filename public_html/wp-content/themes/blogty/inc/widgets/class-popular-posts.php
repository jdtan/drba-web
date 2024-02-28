<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Popular_Posts extends Blogty_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_blogty_popular_posts';
		$this->widget_description = __( 'Displays popular posts with an image', 'blogty' );
		$this->widget_id          = 'blogty_popular_posts';
		$this->widget_name        = __( 'Blogty: Popular Posts', 'blogty' );
		$this->settings           = array(
			'title'                                 => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
			),
			'post_settings_heading'                 => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'blogty' ),
			),
			'category'                              => array(
				'type'  => 'dropdown-taxonomies',
				'label' => __( 'Select Category', 'blogty' ),
				'desc'  => __( 'Leave empty if you don\'t want the posts to be category specific', 'blogty' ),
				'args'  => array(
					'taxonomy'        => 'category',
					'class'           => 'widefat',
					'hierarchical'    => true,
					'show_count'      => 1,
					'show_option_all' => __( '&mdash; Select &mdash;', 'blogty' ),
				),
			),
			'no_of_posts'                           => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of posts to show', 'blogty' ),
			),
			'offset'                                => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'blogty' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'blogty' ),
			),
			'orderby'                               => array(
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
			'order'                                 => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'blogty' ),
				'options' => array(
					'asc'  => __( 'ASC', 'blogty' ),
					'desc' => __( 'DESC', 'blogty' ),
				),
			),
			'meta_settings_heading'                 => array(
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'blogty' ),
			),
			'post_meta'                             => array(
				'type'    => 'multi-checkbox',
				'label'   => __( 'Post Meta', 'blogty' ),
				'options' => array(
					'author'    => __( 'Author', 'blogty' ),
					'read_time' => __( 'Post Read Time', 'blogty' ),
					'date'      => __( 'Date', 'blogty' ),
					'comment'   => __( 'Comment', 'blogty' ),
				),
				'std'     => array( 'author', 'date' ),
			),
			'show_meta_on_express_only'             => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Metas on Express Post Only', 'blogty' ),
				'desc'  => __( 'Make sure to select post meta from above for this to work.', 'blogty' ),
				'std'   => false,
			),
			'post_meta_icon'                        => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Meta Icon', 'blogty' ),
				'desc'  => __( 'Some Icons may show up regardless to provide better info.', 'blogty' ),
				'std'   => false,
			),
			'date_format'                           => array(
				'type'    => 'select',
				'label'   => __( 'Date Format', 'blogty' ),
				'desc'    => __( 'Make sure to select Date from above for this to work.', 'blogty' ),
				'options' => array(
					'format_1' => __( 'Times Ago', 'blogty' ),
					'format_2' => __( 'Default Format', 'blogty' ),
				),
				'std'     => 'format_2',
			),
			'author_image'                          => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Author Image', 'blogty' ),
				'desc'  => __( 'Make sure to select Author from above for this to work. Will only show up in express post.', 'blogty' ),
				'std'   => false,
			),
			'category_settings_heading'             => array(
				'type'  => 'heading',
				'label' => __( 'Category Settings', 'blogty' ),
			),
			'show_category'                         => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Category', 'blogty' ),
				'std'   => false,
			),
			'category_color'                        => array(
				'type'    => 'select',
				'label'   => __( 'Category Color', 'blogty' ),
				'options' => blogty_get_category_color_display(),
				'std'     => 'none',
			),
			'category_style'                        => array(
				'type'    => 'select',
				'label'   => __( 'Category Style', 'blogty' ),
				'options' => blogty_get_category_styles(),
				'std'     => 'style_1',
			),
			'no_of_category'                        => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 1,
				'label' => __( 'Number of Category to Display', 'blogty' ),
			),
			'show_cat_on_express_only'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Categories on Express Post Only', 'blogty' ),
				'desc'  => __( 'Make sure to select Show Category from above for this to work.', 'blogty' ),
				'std'   => false,
			),
			'widget_settings_heading'               => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogty' ),
			),
			'style'                                 => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'blogty' ),
				'options' => array(
					'style_1' => __( 'List Only', 'blogty' ),
					'style_2' => __( 'Express + List', 'blogty' ),
				),
				'std'     => 'style_1',
			),
			'counter_style'                         => array(
				'type'    => 'select',
				'label'   => __( 'Counter Style', 'blogty' ),
				'options' => array(
					'style_1' => __( 'Plain', 'blogty' ),
					'style_2' => __( 'Plain with a dot', 'blogty' ),
					'style_3' => __( 'Plain with a border', 'blogty' ),
					'style_4' => __( 'With Background', 'blogty' ),
					'style_5' => __( 'With Circular Background', 'blogty' ),
				),
				'std'     => 'style_5',
			),
			'counter_accent_color'                  => array(
				'type'  => 'checkbox',
				'label' => __( 'Use accent color for the counter', 'blogty' ),
				'std'   => false,
			),
			'inverted_block_color'                  => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'blogty' ),
				'desc'  => __( 'Can be used if you have dark background and want ligter color on the text.', 'blogty' ),
				'std'   => false,
			),
			'title_limit'                           => array(
				'type'    => 'select',
				'label'   => __( 'Post Title Limit', 'blogty' ),
				'options' => blogty_get_title_limit_choices(),
				'std'     => '',
			),
			'express_post_display_settings_heading' => array(
				'type'  => 'message',
				'label' => __( 'Express Posts Settings', 'blogty' ),
			),
			'express_counter_style'                 => array(
				'type'    => 'select',
				'label'   => __( 'Express Post Counter Style', 'blogty' ),
				'desc'    => __( 'Useful if you want different counter style on express post.', 'blogty' ),
				'options' => array(
					''        => __( '&mdash; Inherit &mdash;', 'blogty' ),
					'style_1' => __( 'Plain', 'blogty' ),
					'style_2' => __( 'Plain with a dot', 'blogty' ),
					'style_3' => __( 'Plain with a border', 'blogty' ),
					'style_4' => __( 'With Background', 'blogty' ),
					'style_5' => __( 'With Circular Background', 'blogty' ),
				),
				'std'     => '',
			),
			'border_below_express_post'             => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Border Below Express Post', 'blogty' ),
				'std'   => false,
			),
			'invert_express_post'                   => array(
				'type'  => 'checkbox',
				'label' => __( 'Invert Express Post', 'blogty' ),
				'std'   => false,
			),
			'bigger_counter_express_post'           => array(
				'type'  => 'checkbox',
				'label' => __( 'Increase Counter Font Size on Express Post', 'blogty' ),
				'std'   => false,
			),
			'list_post_display_settings_heading'    => array(
				'type'  => 'message',
				'label' => __( 'List Posts Settings', 'blogty' ),
			),
			'invert_list_post'                      => array(
				'type'  => 'checkbox',
				'label' => __( 'Invert List Post', 'blogty' ),
				'std'   => false,
			),
		);

		parent::__construct();
	}

	/**
	 * Query the posts and return them.
	 *
	 * @param  array $args
	 * @param  array $instance
	 * @return WP_Query
	 */
	public function get_posts( $args, $instance ) {
		$number  = ! empty( $instance['no_of_posts'] ) ? absint( $instance['no_of_posts'] ) : $this->settings['no_of_posts']['std'];
		$orderby = ! empty( $instance['orderby'] ) ? sanitize_text_field( $instance['orderby'] ) : $this->settings['orderby']['std'];
		$order   = ! empty( $instance['order'] ) ? sanitize_text_field( $instance['order'] ) : $this->settings['order']['std'];
		$offset  = ! empty( $instance['offset'] ) ? sanitize_text_field( $instance['offset'] ) : $this->settings['offset']['std'];

		$query_args = array(
			'posts_per_page'      => $number,
			'post_status'         => 'publish',
			'no_found_rows'       => 1,
			'orderby'             => $orderby,
			'order'               => $order,
			'ignore_sticky_posts' => 1,
		);

		if ( $offset && 0 != $offset ) {
			$query_args['offset'] = absint( $offset );
		}

		if ( ! empty( $instance['category'] ) && -1 !== $instance['category'] && 0 !== $instance['category'] ) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $instance['category'],
			);
		}

		return new WP_Query( apply_filters( 'blogty_popular_posts_query_args', $query_args ) );
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

		if ( ( $posts = $this->get_posts( $args, $instance ) ) && $posts->have_posts() ) {
			$this->widget_start( $args, $instance );

			do_action( 'blogty_before_popular_posts_with_image' );

			$style        = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
			$widget_class = $style;

			$title_limit          = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
			$counter_accent_color = isset( $instance['counter_accent_color'] ) ? $instance['counter_accent_color'] : $this->settings['counter_accent_color']['std'];
			$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];
			$counter_style        = isset( $instance['counter_style'] ) ? $instance['counter_style'] : $this->settings['counter_style']['std'];

			$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];
			if ( $show_category ) {
				$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
				$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
				$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
			}
			$cat_on_express_only = isset( $instance['show_cat_on_express_only'] ) ? $instance['show_cat_on_express_only'] : $this->settings['show_cat_on_express_only']['std'];

			$enabled_post_meta             = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$meta_settings['date_format']  = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$meta_settings['show_icons']   = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];
			$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
			$meta_on_express_only          = isset( $instance['show_meta_on_express_only'] ) ? $instance['show_meta_on_express_only'] : $this->settings['show_meta_on_express_only']['std'];

			// Check for list only styles.
			$list_only_style = false;
			if ( 'style_1' == $style ) {
				$list_only_style = true;
			}

			$image_size         = 'blogty-large-img';
			$express_post_style = 'style_1';

			// Counter Accent Color.
			if ( $counter_accent_color ) {
				$widget_class .= ' blogty-is-counter-accent';
			}

			// Inverted Color.
			if ( $inverted_block_color ) {
				$widget_class .= ' saga-block-inverted-color';
			}

			// Border Below Express Post.
			$border_below_express_post = isset( $instance['border_below_express_post'] ) ? $instance['border_below_express_post'] : $this->settings['border_below_express_post']['std'];
			if ( $border_below_express_post ) {
				$widget_class .= ' blogty-border-popular-express';
			}

			// Bigger Counter in Express Post.
			$bigger_counter_express_post = isset( $instance['bigger_counter_express_post'] ) ? $instance['bigger_counter_express_post'] : $this->settings['bigger_counter_express_post']['std'];
			if ( $bigger_counter_express_post ) {
				$widget_class .= ' blogty-big-popular-express';
			}

			// Inverted Style.
			$invert_express_post = isset( $instance['invert_express_post'] ) ? $instance['invert_express_post'] : $this->settings['invert_express_post']['std'];
			$invert_list_post    = isset( $instance['invert_list_post'] ) ? $instance['invert_list_post'] : $this->settings['invert_list_post']['std'];
			if ( $invert_express_post ) {
				$widget_class .= ' blogty-inverted-popular-express';
			}
			if ( $invert_list_post ) {
				$widget_class .= ' blogty-inverted-popular-list';
			}

			$show_image      = false;
			$is_express_post = false;
			?>

			<div class="blogty-popular-posts-widget <?php echo esc_attr( $widget_class ); ?>">
				<?php
				$counter     = 1;
				$total_posts = $posts->post_count;
				while ( $posts->have_posts() ) :
					$posts->the_post();

					if ( ! $list_only_style ) {
						if ( 1 == $counter ) {
							$is_express_post     = true;
							$wrapper_class_start = '<div class="blogty-popular-express ' . $express_post_style . '">';
							$wrapper_class_end   = '</div>';

							// Check for different counter.
							if ( $instance['express_counter_style'] ) {
								$counter_style = $instance['express_counter_style'];
							}
						} else {
							$is_express_post = false;
							if ( 2 == $counter ) {
								$wrapper_class_start = '<div class="blogty-list-posts">';
							}
							// Make sure to close on the last post.
							if ( $counter == $total_posts ) {
								$wrapper_class_end = '</div>';
							}

							$counter_style = $instance['counter_style'];
						}
					} else {
						$wrapper_class_start = '<div class="blogty-list-posts">';
						$wrapper_class_end   = '</div>';
					}

					if ( $is_express_post ) {
						$show_image = true;
					} else {
						$show_image = false;
					}
					?>

					<?php echo wp_kses_post( $wrapper_class_start ); ?>

						<?php
						if ( $show_image ) :
							$this->display_image( $image_size );
						endif;
						?>

						<div class="blogty-article-block-wrapper">

							<?php $this->display_counter( $counter, $counter_style ); ?>

							<div class="article-details">
								<?php

								if ( $show_category ) {
									if ( $cat_on_express_only ) {
										if ( $is_express_post ) {
											$this->display_categories( $cat_style, $color, $limit );
										}
									} else {
										$this->display_categories( $cat_style, $color, $limit );
									}
								}

								$this->display_title( $title_limit );

								if ( ! $is_express_post ) {
									$meta_settings['author_image'] = false;
								}
								if ( $meta_on_express_only ) {
									if ( $is_express_post ) {
										$this->display_meta( $enabled_post_meta, $meta_settings );
									}
								} else {
									$this->display_meta( $enabled_post_meta, $meta_settings );
								}
								?>

							</div>

						</div>

					<?php echo wp_kses_post( $wrapper_class_end ); ?>

					<?php
					++$counter;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<?php

			do_action( 'blogty_after_popular_posts_with_image' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}

	public function display_image( $size ) {
		if ( has_post_thumbnail() ) :
			?>
			<div class="article-image blogty-rounded-img">
				<a href="<?php the_permalink(); ?>">
				<?php
				the_post_thumbnail(
					$size,
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
				</a>
			</div>
			<?php
		endif;
	}

	public function display_counter( $counter, $counter_style ) {
		?>
		<div class="article-counter <?php echo esc_attr( $counter_style ); ?>"><?php echo esc_html( sprintf( '%02d', $counter ) ); ?></div>
		<?php
	}

	public function display_title( $title_limit ) {
		?>
		<h3 class="article-title no-margin color-accent-hover blogty-limit-lines <?php echo esc_attr( $title_limit ); ?>">
			<a href="<?php the_permalink(); ?>" class="text-decoration-none blogty-title-line">
				<?php the_title(); ?>
			</a>
		</h3>
		<?php
	}

	public function display_categories( $cat_style, $color, $limit ) {
		?>
		<div class="article-cat-info">
			<?php blogty_post_categories( $cat_style, $color, $limit ); ?>
		</div>
		<?php
	}

	public function display_meta( $enabled_post_meta, $meta_settings ) {
		blogty_post_meta_info( $enabled_post_meta, $meta_settings );
	}
}
