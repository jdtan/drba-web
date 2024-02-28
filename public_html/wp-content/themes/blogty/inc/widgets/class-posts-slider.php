<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Posts_Slider extends Blogty_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_blogty_posts_slider';
		$this->widget_description = __( 'Displays posts in slider', 'blogty' );
		$this->widget_id          = 'blogty_posts_slider';
		$this->widget_name        = __( 'Blogty: Posts Slider', 'blogty' );
		$this->settings           = array(
			'title'                     => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
			),
			'post_settings_heading'     => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'blogty' ),
			),
			'category'                  => array(
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
			'number'                    => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
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
				'label'   => __( 'Order by', 'blogty' ),
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
				'desc'  => __( 'Make sure to select Author from above for this to work.', 'blogty' ),
				'std'   => false,
			),
			'excerpt_settings_heading'  => array(
				'type'  => 'heading',
				'label' => __( 'Excerpt Settings', 'blogty' ),
			),
			'show_excerpt'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Excerpt', 'blogty' ),
				'std'   => false,
			),
			'excerpt_length'            => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 20,
				'label' => __( 'Excerpt Length', 'blogty' ),
			),
			'show_read_more'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Read More', 'blogty' ),
				'std'   => false,
			),
			'read_more_text'            => array(
				'type'  => 'text',
				'label' => __( 'Read More Text', 'blogty' ),
				'desc'  => __( 'Leave Empty if you want to use default text "Read More" ', 'blogty' ),
			),
			'read_more_style'           => array(
				'type'    => 'select',
				'label'   => __( 'Read More Style', 'blogty' ),
				'options' => blogty_get_read_more_styles(),
				'std'     => 'style_2',
			),
			'read_more_icon'            => array(
				'type'    => 'select',
				'label'   => __( 'Read More Icon', 'blogty' ),
				'options' => blogty_get_read_more_icons_list(),
				'std'     => 'arrow-right',
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
				'std'     => 'bg_color',
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
			'widget_settings_heading'   => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogty' ),
			),
			'style'                     => array(
				'type'    => 'select',
				'label'   => __( 'Display Style', 'blogty' ),
				'options' => array(
					'style_1' => __( 'Style 1', 'blogty' ),
					'style_2' => __( 'Style 2', 'blogty' ),
				),
				'std'     => 'style_1',
			),
			'autoplay'                  => array(
				'type'  => 'checkbox',
				'label' => __( 'Autoplay', 'blogty' ),
				'std'   => false,
			),
			'arrows'                    => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Arrows', 'blogty' ),
				'std'   => true,
			),
			'dots'                      => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Dots', 'blogty' ),
				'std'   => false,
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
	 * Query the posts and return them.
	 *
	 * @param  array $args
	 * @param  array $instance
	 * @return WP_Query
	 */
	public function get_posts( $args, $instance ) {
		$number  = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
		$orderby = ! empty( $instance['orderby'] ) ? esc_attr( $instance['orderby'] ) : $this->settings['orderby']['std'];
		$order   = ! empty( $instance['order'] ) ? esc_attr( $instance['order'] ) : $this->settings['order']['std'];
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
				'terms'    => absint( $instance['category'] ),
			);
		}

		return new WP_Query( apply_filters( 'blogty_posts_slider_query_args', $query_args ) );
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

			do_action( 'blogty_before_posts_slider' );

			$overlay_class = $wrapper_class = $slider_nav = '';
			$display_style = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
			if ( 'style_1' == $display_style ) {
				$overlay_class = ' overlay_w_gradient';
			}

			$wrapper_class .= ' blogty-swiper-inner-bullets ';
			$wrapper_class .= $display_style;

			$data_slider = array();

			$autoplay = isset( $instance['autoplay'] ) ? $instance['autoplay'] : $this->settings['autoplay']['std'];
			if ( $autoplay ) :
				$data_slider['autoplay'] = array(
					'delay' => 5000,
				);
			endif;

			$dots = isset( $instance['dots'] ) ? $instance['dots'] : $this->settings['dots']['std'];
			if ( $dots ) {
				$slider_nav .= '<div class="swiper-pagination"></div>';
			}
			$arrows = isset( $instance['arrows'] ) ? $instance['arrows'] : $this->settings['arrows']['std'];
			if ( $arrows ) {
				$slider_nav .= '<div class="swiper-button-next"></div><div class="swiper-button-prev"></div>';
			}

			$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];
			if ( $show_category ) {
				$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
				$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
				$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
			}
			$enabled_post_meta             = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$meta_settings['date_format']  = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
			$meta_settings['show_icons']   = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];
			$title_limit                   = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
			$enable_post_format_icon       = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];
			$show_excerpt                  = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : $this->settings['show_excerpt']['std'];
			if ( $show_excerpt ) {
				$excerpt_length = isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : $this->settings['excerpt_length']['std'];
			}
			$show_read_more = isset( $instance['show_read_more'] ) ? $instance['show_read_more'] : $this->settings['show_read_more']['std'];
			if ( $show_read_more ) {
				$read_more_text  = isset( $instance['read_more_text'] ) ? $instance['read_more_text'] : '';
				$read_more_style = isset( $instance['read_more_style'] ) ? $instance['read_more_style'] : $this->settings['read_more_style']['std'];
				$read_more_icon  = isset( $instance['read_more_icon'] ) ? $instance['read_more_icon'] : $this->settings['read_more_icon']['std'];
			}
			?>

			<div class="blogty-slider-wrapper-block as_slider <?php echo esc_attr( $wrapper_class ); ?>">
				<div class="swiper" data-slider='<?php echo esc_attr( json_encode( $data_slider ) ); ?>'>
					<div class="swiper-wrapper">
						<?php
						while ( $posts->have_posts() ) :
							$posts->the_post();
							if ( has_post_thumbnail() ) {
								?>
								<div class="swiper-slide">
									<div class="blogty-article-block-wrapper img-animate-zoom">
										<div class="article-image blogty-rounded-img">
											<a href="<?php the_permalink(); ?>">
												<span aria-hidden="true" class="blogty-block-overlay<?php echo esc_attr( $overlay_class ); ?>"></span>
												<?php
												if ( $enable_post_format_icon ) {
													blogty_post_format_icon( 'right' );
												}
												?>
												<?php
												the_post_thumbnail(
													'blogty-large-img',
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
										<div class="article-details">
											<?php
											if ( $show_category ) {
												echo '<div class="article-cat-info">';
												blogty_post_categories( $cat_style, $color, $limit );
												echo '</div>';
											}
											?>
											<h3 class="article-title no-margin blogty-limit-lines <?php echo esc_attr( $title_limit ); ?>">
												<a href="<?php the_permalink(); ?>" class="text-decoration-none blogty-title-line">
													<?php the_title(); ?>
												</a>
											</h3>
											<?php blogty_post_meta_info( $enabled_post_meta, $meta_settings ); ?>
											<?php
											if ( $show_excerpt && $excerpt_length > 0 ) {
												?>
												<div class="article-excerpt hide-on-mobile">
													<p class="no-margin">
														<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length, '&hellip;' ); ?>
													</p>
												</div>
											<?php } ?>
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
											?>
										</div>
									</div>
								</div>
								<?php
							}
						endwhile;
						wp_reset_postdata();
						?>
					</div>
					<?php
					if ( $slider_nav ) :
						echo $slider_nav;
					endif;
					?>
				</div>
			</div>

			<?php

			do_action( 'blogty_after_posts_slider' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}
}
