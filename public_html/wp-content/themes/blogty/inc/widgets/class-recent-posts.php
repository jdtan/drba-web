<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Recent_Posts extends Blogty_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_blogty_recent_posts';
		$this->widget_description = __( 'Displays recent posts with an image', 'blogty' );
		$this->widget_id          = 'blogty_recent_posts_with_image';
		$this->widget_name        = __( 'Blogty: Recent Posts', 'blogty' );
		$this->settings           = array(
			'title'                   => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
			),
			'post_settings_heading'   => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'blogty' ),
			),
			'category'                => array(
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
			'number'                  => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 3,
				'label' => __( 'Number of posts to show', 'blogty' ),
			),
			'offset'                  => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'blogty' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'blogty' ),
			),
			'orderby'                 => array(
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
			'order'                   => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'blogty' ),
				'options' => array(
					'asc'  => __( 'ASC', 'blogty' ),
					'desc' => __( 'DESC', 'blogty' ),
				),
			),
			'meta_settings_heading'   => array(
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'blogty' ),
			),
			'post_meta'               => array(
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
			'post_meta_icon'          => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Meta Icon', 'blogty' ),
				'desc'  => __( 'Some Icons may show up regardless to provide better info.', 'blogty' ),
				'std'   => true,
			),
			'date_format'             => array(
				'type'    => 'select',
				'label'   => __( 'Date Format', 'blogty' ),
				'desc'    => __( 'Make sure to select Date from above for this to work.', 'blogty' ),
				'options' => array(
					'format_1' => __( 'Times Ago', 'blogty' ),
					'format_2' => __( 'Default Format', 'blogty' ),
				),
				'std'     => 'format_1',
			),
			'author_image'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Author Image', 'blogty' ),
				'desc'  => __( 'Make sure to select Author from above for this to work.', 'blogty' ),
				'std'   => false,
			),
			'widget_settings_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogty' ),
			),
			'style'                   => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'blogty' ),
				'options' => array(
					'style_1' => __( 'Default', 'blogty' ),
					'style_2' => __( 'Circled Image', 'blogty' ),
				),
				'std'     => 'style_1',
			),
			'enable_post_format_icon' => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Post Format Icon', 'blogty' ),
				'std'   => false,
			),
			'invert_list_post'        => array(
				'type'  => 'checkbox',
				'label' => __( 'Invert List Post', 'blogty' ),
				'std'   => false,
			),
			'inverted_block_color'    => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'blogty' ),
				'desc'  => __( 'Can be used if you have dark background and want ligter color on the text.', 'blogty' ),
				'std'   => false,
			),
			'title_limit'             => array(
				'type'    => 'select',
				'label'   => __( 'Post Title Limit', 'blogty' ),
				'options' => blogty_get_title_limit_choices(),
				'std'     => '',
			),
			'enable_item_separator'   => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Item Separator', 'blogty' ),
				'std'   => false,
			),
			'hide_list_image'         => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide List Post Image', 'blogty' ),
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
		$number  = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
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

		return new WP_Query( apply_filters( 'blogty_recent_posts_query_args', $query_args ) );
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

			do_action( 'blogty_before_recent_posts_with_image' );

			$class                         = '';
			$style                         = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
			$widget_class                  = $style;
			$enable_post_format_icon       = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];
			$title_limit                   = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
			$enabled_post_meta             = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$meta_settings['date_format']  = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
			$meta_settings['show_icons']   = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];

			// Inverted Item.
			$invert_list_post = isset( $instance['invert_list_post'] ) ? $instance['invert_list_post'] : $this->settings['invert_list_post']['std'];
			if ( $invert_list_post ) {
				$widget_class .= ' saga-inverted-item';
			}
			// Item Separator.
			$item_separator = isset( $instance['enable_item_separator'] ) ? $instance['enable_item_separator'] : $this->settings['enable_item_separator']['std'];
			if ( $item_separator ) {
				$widget_class .= ' saga-item-sep';
			}

			$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];

			// Hide List Image.
			$show_image      = true;
			$hide_list_image = isset( $instance['hide_list_image'] ) ? $instance['hide_list_image'] : $this->settings['hide_list_image']['std'];
			if ( $hide_list_image ) {
				$widget_class .= ' saga-hidden-post-image';
				$show_image    = false;
			}
			if ( 'style_1' === $style ) {
				$class = ' img-animate-zoom';
			}

			// Inverted Color.
			if ( $inverted_block_color ) {
				$widget_class .= ' saga-block-inverted-color';
			}
			?>

			<div class="blogty-recent-posts-widget <?php echo esc_attr( $widget_class ); ?>">
				<div class="blogty-list-posts">
					<?php
					while ( $posts->have_posts() ) :
						$posts->the_post();
						?>
							<div class="blogty-article-block-wrapper<?php echo esc_attr( $class ); ?>">
								<?php
								if ( $show_image && has_post_thumbnail() ) {
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
												'thumbnail',
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
								}
								?>
								<div class="article-details">
									<h3 class="entry-title no-margin color-accent-hover blogty-limit-lines <?php echo esc_attr( $title_limit ); ?>">
										<a href="<?php the_permalink(); ?>" class="text-decoration-none blogty-title-line">
											<?php the_title(); ?>
										</a>
									</h3>
									<?php blogty_post_meta_info( $enabled_post_meta, $meta_settings ); ?>
								</div>
							</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
			<?php

			do_action( 'blogty_after_recent_posts_with_image' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}
}
