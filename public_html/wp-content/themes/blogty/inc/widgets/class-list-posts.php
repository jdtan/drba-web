<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_List_Posts extends Blogty_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogty_list_posts_widget';
		$this->widget_description = __( 'Displays posts in list style', 'blogty' );
		$this->widget_id          = 'blogty_express_posts';
		$this->widget_name        = __( 'Blogty: List Posts', 'blogty' );
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
				'std'     => array( 'author', 'date', 'comment' ),
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
				'std'   => true,
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
				'label'   => __( 'Display Style', 'blogty' ),
				'options' => array(
					'style_1'  => __( 'Left Express + Right List', 'blogty' ),
					'style_3'  => __( 'Left Express + 2 Columns Right List', 'blogty' ),
					'style_4'  => __( 'Left List + Center Express + Right List', 'blogty' ),
					'style_5'  => __( 'Left List + Center Express + Inverted Right List', 'blogty' ),
					'style_2'  => __( 'Top Express + Bottom List', 'blogty' ),
					'style_7'  => __( 'Top Express + Bottom List Variation', 'blogty' ),
					'style_9'  => __( 'Top Express + Bottom 2 Columns List', 'blogty' ),
					'style_8'  => __( '1 Column List', 'blogty' ),
					'style_10' => __( '2 Columns List', 'blogty' ),
					'style_11' => __( '3 Columns List', 'blogty' ),
					'style_6'  => __( '4 Columns List', 'blogty' ),
				),
				'std'     => 'style_1',
			),
			'enable_post_format_icon'               => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Post Format Icon', 'blogty' ),
				'std'   => false,
			),
			'inverted_block_color'                  => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'blogty' ),
				'desc'  => __( 'Can be used if you have dark background and want ligter color on the text.', 'blogty' ),
				'std'   => false,
			),
			'express_post_display_settings_heading' => array(
				'type'  => 'message',
				'label' => __( 'Express Posts Settings', 'blogty' ),
			),
			'express_post_style'                    => array(
				'type'    => 'select',
				'label'   => __( 'Express Post Style', 'blogty' ),
				'options' => array(
					'style_1' => __( 'Style 1', 'blogty' ),
					'style_2' => __( 'Style 2', 'blogty' ),
				),
				'std'     => 'style_1',
			),
			'express_posts_title_limit'             => array(
				'type'    => 'select',
				'label'   => __( 'Express Post Title Limit', 'blogty' ),
				'options' => blogty_get_title_limit_choices(),
				'std'     => '',
			),
			'show_excerpt'                          => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Excerpt', 'blogty' ),
				'std'   => true,
			),
			'excerpt_length'                        => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 20,
				'label' => __( 'Excerpt Length', 'blogty' ),
			),
			'show_read_more'                        => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Read More', 'blogty' ),
				'std'   => false,
			),
			'read_more_text'                        => array(
				'type'  => 'text',
				'label' => __( 'Read More Text', 'blogty' ),
				'desc'  => __( 'Leave Empty if you want to use default text "Read More" ', 'blogty' ),
			),
			'read_more_style'                       => array(
				'type'    => 'select',
				'label'   => __( 'Read More Style', 'blogty' ),
				'options' => blogty_get_read_more_styles(),
				'std'     => 'style_1',
			),
			'read_more_icon'                        => array(
				'type'    => 'select',
				'label'   => __( 'Read More Icon', 'blogty' ),
				'options' => blogty_get_read_more_icons_list(),
				'std'     => '',
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
			'circle_list_image'                       => array(
				'type'  => 'checkbox',
				'label' => __( 'Circle Style List Post Image', 'blogty' ),
				'std'   => false,
			),
			'hide_list_image'                       => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide List Post Image', 'blogty' ),
				'std'   => false,
			),
			'list_posts_title_limit'                => array(
				'type'    => 'select',
				'label'   => __( 'List Post Title Limit', 'blogty' ),
				'options' => blogty_get_title_limit_choices(),
				'std'     => '',
			),
			'enable_list_item_separator'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable List Item Separator', 'blogty' ),
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

		if ( ! empty( $instance['category'] ) && -1 != $instance['category'] && 0 != $instance['category'] ) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $instance['category'],
			);
		}

		return new WP_Query( apply_filters( 'blogty_list_posts_query_args', $query_args ) );
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

			do_action( 'blogty_before_list_posts' );

			$style                     = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
			$invert_list_post          = isset( $instance['invert_list_post'] ) ? $instance['invert_list_post'] : $this->settings['invert_list_post']['std'];
			$hide_list_image           = isset( $instance['hide_list_image'] ) ? $instance['hide_list_image'] : $this->settings['hide_list_image']['std'];
			$circle_list_image         = isset( $instance['circle_list_image'] ) ? $instance['circle_list_image'] : $this->settings['circle_list_image']['std'];
			$meta_on_express_only      = isset( $instance['show_meta_on_express_only'] ) ? $instance['show_meta_on_express_only'] : $this->settings['show_meta_on_express_only']['std'];
			$cat_on_express_only       = isset( $instance['show_cat_on_express_only'] ) ? $instance['show_cat_on_express_only'] : $this->settings['show_cat_on_express_only']['std'];
			$express_posts_title_limit = isset( $instance['express_posts_title_limit'] ) ? $instance['express_posts_title_limit'] : $this->settings['express_posts_title_limit']['std'];
			$list_posts_title_limit    = isset( $instance['list_posts_title_limit'] ) ? $instance['list_posts_title_limit'] : $this->settings['list_posts_title_limit']['std'];
			$enable_post_format_icon   = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];
			$inverted_block_color      = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];
			$express_post_style        = isset( $instance['express_post_style'] ) ? $instance['express_post_style'] : $this->settings['express_post_style']['std'];
			$show_excerpt              = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : $this->settings['show_excerpt']['std'];
			if ( $show_excerpt ) {
				$excerpt_length = isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : $this->settings['excerpt_length']['std'];
			}
			$show_read_more = isset( $instance['show_read_more'] ) ? $instance['show_read_more'] : $this->settings['show_read_more']['std'];
			if ( $show_read_more ) {
				$read_more_text  = isset( $instance['read_more_text'] ) ? $instance['read_more_text'] : '';
				$read_more_style = isset( $instance['read_more_style'] ) ? $instance['read_more_style'] : $this->settings['read_more_style']['std'];
				$read_more_icon  = isset( $instance['read_more_icon'] ) ? $instance['read_more_icon'] : $this->settings['read_more_icon']['std'];
			}
			$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];
			if ( $show_category ) {
				$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
				$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
				$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
			}
			$enabled_post_meta   = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$date_format         = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$post_meta_icon      = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];
			$list_item_separator = isset( $instance['enable_list_item_separator'] ) ? $instance['enable_list_item_separator'] : $this->settings['enable_list_item_separator']['std'];

			$widget_class = $style;

			if ( $invert_list_post ) {
				$widget_class .= ' saga-inverted-item';
			}

			if ( $hide_list_image ) {
				$widget_class .= ' saga-hidden-post-image';
			}

			if ( $circle_list_image ) {
				$widget_class .= ' saga-circle-list-post-image';
			}

			$counter     = 1;
			$show_image  = true;
			$total_posts = $posts->post_count;

			$mid_point           = floor( $total_posts / 2 );
			$mid_point_w_express = $mid_point + 1;

			switch ( $style ) {
				case 'style_1':
					$row_cols_class = ' row-cols-md-2';
					break;
				case 'style_4':
				case 'style_5':
					$row_cols_class = ' row-cols-lg-3';
					break;
				case 'style_6':
					$row_cols_class = ' row-cols-md-2 row-cols-lg-3 row-cols-xl-4';
					break;
				case 'style_10':
					$row_cols_class = ' row-cols-md-2';
					break;
				case 'style_11':
					$row_cols_class = ' row-cols-md-2 row-cols-lg-3';
					break;
				default:
					$row_cols_class = '';
			}

			// Check for list only styles.
			$list_only_style = false;
			if ( 'style_6' == $style || 'style_8' == $style || 'style_10' == $style || 'style_11' == $style ) {
				$list_only_style = true;
			}

			$express_cols_class = $list_cols_class = '';
			if ( 'style_3' == $style ) {
				$express_cols_class = '-lg-4';
				$list_cols_class    = '-lg-8';
			}

			if ( 'style_7' == $style ) {
				$list_post_image_size = 'blogty-large-img';
			} else {
				$list_post_image_size = 'thumbnail';
			}

			// List Item Separator.
			if ( $list_item_separator ) {
				$widget_class .= ' saga-item-sep';
			}

			// Inverted Color.
			if ( $inverted_block_color ) {
				$widget_class .= ' saga-block-inverted-color';
			}
			?>

			<div class="blogty-list-posts-widget <?php echo esc_attr( $widget_class ); ?>">
				<div class="row row-cols-1<?php echo esc_attr( $row_cols_class ); ?> g-4">
					<?php
					while ( $posts->have_posts() ) :
						$posts->the_post();

						$wrapper_class_start = $wrapper_class_end = $article_wrapper_start = $article_wrapper_end = '';

						if ( ! $list_only_style ) {
							if ( 1 == $counter ) {
								$wrapper_class_start = '<div class="col' . $express_cols_class . ' blogty-express-posts ' . $express_post_style . '">';
								$wrapper_class_end   = '</div>';
								$image_size          = 'blogty-large-img';
							} else {
								$image_size = $list_post_image_size;
								if ( 2 == $counter ) {
									$wrapper_class_start = '<div class="col' . $list_cols_class . ' blogty-list-posts">';
								}

								if ( 'style_3' == $style || 'style_9' == $style ) {
									if ( 2 == $counter || ( $counter % 2 ) == 0 ) {
										$article_wrapper_start = '<div class="article-column">';
									}
									if ( $total_posts == $counter || ( $counter % 2 ) == 1 ) {
										$article_wrapper_end = '</div>';
									}
								}

								// Close the list post div at midpoint and open it up on the next post after midpoint.
								if ( 'style_4' == $style || 'style_5' == $style ) {
									if ( $counter == $mid_point_w_express ) {
										$wrapper_class_end = '</div>';
									}
									if ( $counter == ( $mid_point_w_express + 1 ) ) {
										$wrapper_class_start = '<div class="col' . $list_cols_class . ' blogty-list-posts">';
									}
								}

								// Make sure to close on the last post.
								if ( $counter == $total_posts ) {
									$wrapper_class_end = '</div>';
								}
							}
						} else {
							$image_size          = $list_post_image_size;
							$wrapper_class_start = '<div class="col blogty-list-posts">';
							$wrapper_class_end   = '</div>';
						}

						if ( $hide_list_image ) {
							if ( 1 != $counter || $list_only_style ) {
								$show_image = false;
							} else {
								$show_image = true;
							}
						}

						?>

						<?php echo wp_kses_post( $wrapper_class_start ); ?>

							<?php echo wp_kses_post( $article_wrapper_start ); ?>

							<div class="blogty-article-block-wrapper blogty-card-box img-animate-zoom">
								<?php
								if ( has_post_thumbnail() && $show_image ) :
									?>
									<div class="article-image blogty-rounded-img">
										<a href="<?php the_permalink(); ?>">
											<?php
											if ( $enable_post_format_icon ) {
												blogty_post_format_icon( 'center' );
											}
											?>
											<?php
											the_post_thumbnail(
												$image_size,
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
								?>
								<div class="article-details">
									<?php
									if ( $show_category ) {
										if ( $cat_on_express_only ) {
											if ( 1 == $counter && ( ! $list_only_style ) ) {
												echo '<div class="article-cat-info">';
													blogty_post_categories( $cat_style, $color, $limit );
												echo '</div>';
											}
										} else {
											echo '<div class="article-cat-info">';
												blogty_post_categories( $cat_style, $color, $limit );
											echo '</div>';
										}
									}
									?>
									<h3 class="article-title no-margin color-accent-hover blogty-limit-lines <?php echo esc_attr( 1 == $counter ? $express_posts_title_limit : $list_posts_title_limit ); ?>">
										<a href="<?php the_permalink(); ?>" class="text-decoration-none blogty-title-line">
											<?php the_title(); ?>
										</a>
									</h3>

									<?php
									$meta_settings['date_format'] = $date_format;
									$meta_settings['show_icons']  = $post_meta_icon;
									// Author Image.
									if ( 1 == $counter && ( ! $list_only_style ) ) {
										$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
									} else {
										$meta_settings['author_image'] = false;
									}

									if ( $meta_on_express_only ) {
										if ( 1 == $counter && ( ! $list_only_style ) ) {
											blogty_post_meta_info( $enabled_post_meta, $meta_settings );
										}
									} else {
										blogty_post_meta_info( $enabled_post_meta, $meta_settings );
									}
									?>
									
									<?php
									if ( 'style_7' == $style ) :
										if ( $show_excerpt && $excerpt_length > 0 ) :
											?>
												<div class="article-excerpt">
													<p class="no-margin">
														<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length, '&hellip;' ); ?>
													</p>
												</div>
											<?php
											if ( $show_read_more ) {
												?>
												<div class="article-read-more">
													<a href="<?php the_permalink(); ?>" class="blogty-btn-link text-decoration-none <?php echo esc_attr( $read_more_style ); ?>">
														<?php
														if ( $read_more_text ) {
															echo esc_html( $read_more_text );
														} else {
															esc_html_e( 'Read More', 'blogty' );
														}
														if ( $read_more_icon ) {
															?>
															<span><?php blogty_the_theme_svg( $read_more_icon ); ?></span>
															<?php
														}
														?>
													</a>
												</div>
												<?php
											}
										endif;
									elseif ( 1 == $counter && ( ! $list_only_style ) ) :
										if ( $show_excerpt && $excerpt_length > 0 ) :
											?>
													<div class="article-excerpt">
														<p class="no-margin">
														<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length, '&hellip;' ); ?>
														</p>
													</div>
												<?php
												if ( $show_read_more ) {
													?>
													<div class="article-read-more">
														<a href="<?php the_permalink(); ?>" class="blogty-btn-link text-decoration-none <?php echo esc_attr( $read_more_style ); ?>">
															<?php
															if ( $read_more_text ) {
																echo esc_html( $read_more_text );
															} else {
																esc_html_e( 'Read More', 'blogty' );
															}
															if ( $read_more_icon ) {
																?>
																<span><?php blogty_the_theme_svg( $read_more_icon ); ?></span>
																<?php
															}
															?>
														</a>
													</div>
													<?php
												}
											endif;
									endif;

									?>
								</div>
							</div><!--article-->

							<?php echo wp_kses_post( $article_wrapper_end ); ?>

						<?php echo wp_kses_post( $wrapper_class_end ); ?>

						<?php
						++$counter;
					endwhile;
					wp_reset_postdata();
					?>
				</div><!-- row -->
			</div>
			<?php

			do_action( 'blogty_after_list_posts' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}
}
