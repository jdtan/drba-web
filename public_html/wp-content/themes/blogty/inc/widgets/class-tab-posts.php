<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Tab_Posts extends Blogty_Widget_Base {

	public $display_style = '';

	public $unique_id;

	private static $counter = 0;

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogty widget_tab_posts';
		$this->widget_description = __( 'Displays posts in tab', 'blogty' );
		$this->widget_id          = 'blogty_tab_posts';
		$this->widget_name        = __( 'Blogty: Tab Posts', 'blogty' );

		$this->settings = array(
			'popular_post_settings'   => array(
				'type'  => 'heading',
				'label' => __( 'Popular Post Settings', 'blogty' ),
			),
			'show_popular_posts'      => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Tab', 'blogty' ),
				'std'   => true,
			),
			'popular_posts_desc'      => array(
				'type'  => 'subtitle',
				'label' => __( 'Will display post based on comments count', 'blogty' ),
			),
			'popular_posts_title'     => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
				'std'   => __( 'Popular', 'blogty' ),
				'desc'  => __( 'Leave as it is to show default title or leave blank to only show icon', 'blogty' ),
			),
			'show_popular_posts_icon' => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Icon', 'blogty' ),
				'std'   => true,
			),
			'popular_post_cat'        => array(
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
			'popular_post_offset'     => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'blogty' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'blogty' ),
			),
			'popular_post_order'      => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'blogty' ),
				'options' => array(
					'asc'  => __( 'ASC', 'blogty' ),
					'desc' => __( 'DESC', 'blogty' ),
				),
			),
			'hot_post_settings'       => array(
				'type'  => 'heading',
				'label' => __( 'Hot Post Settings', 'blogty' ),
			),
			'show_hot_posts'          => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Tab', 'blogty' ),
				'std'   => false,
			),
			'hot_posts_title'         => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
				'std'   => __( 'Hot', 'blogty' ),
				'desc'  => __( 'Leave as it is to show default title or leave blank to only show icon', 'blogty' ),
			),
			'show_hot_posts_icon'     => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Icon', 'blogty' ),
				'std'   => true,
			),
			'hot_post_cat'            => array(
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
			'hot_post_offset'         => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'blogty' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'blogty' ),
			),
			'hot_post_orderby'        => array(
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
			'hot_post_order'          => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'blogty' ),
				'options' => array(
					'asc'  => __( 'ASC', 'blogty' ),
					'desc' => __( 'DESC', 'blogty' ),
				),
			),
			'latest_post_settings'    => array(
				'type'  => 'heading',
				'label' => __( 'Latest Post Settings', 'blogty' ),
			),
			'show_latest_posts'       => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Tab', 'blogty' ),
				'std'   => true,
			),
			'latest_posts_title'      => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
				'std'   => __( 'Latest', 'blogty' ),
				'desc'  => __( 'Leave as it is to show default title or leave blank to only show icon', 'blogty' ),
			),
			'show_latest_posts_icon'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Icon', 'blogty' ),
				'std'   => true,
			),
			'latest_post_cat'         => array(
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
			'latest_post_offset'      => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'blogty' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'blogty' ),
			),
			'latest_post_orderby'     => array(
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
			'latest_post_order'       => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'blogty' ),
				'options' => array(
					'asc'  => __( 'ASC', 'blogty' ),
					'desc' => __( 'DESC', 'blogty' ),
				),
			),
			'comments_settings'       => array(
				'type'  => 'heading',
				'label' => __( 'Comments Settings', 'blogty' ),
			),
			'show_comment_tab'        => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Tab', 'blogty' ),
				'std'   => true,
			),
			'comments_title'          => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
				'std'   => __( 'Comments', 'blogty' ),
				'desc'  => __( 'Leave as it is to show default title or leave blank to only show icon', 'blogty' ),
			),
			'show_comments_icon'      => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Icon', 'blogty' ),
				'std'   => true,
			),
			'comments_number'         => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of comments to show', 'blogty' ),
			),
			'show_comment_user_img'   => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Comment Avatar', 'blogty' ),
				'std'   => true,
			),
			'show_comment_date'       => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Comment Date', 'blogty' ),
				'std'   => true,
			),
			'show_comment_excerpt'    => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Comment Excerpt', 'blogty' ),
				'std'   => true,
			),
			'general_settings'        => array(
				'type'  => 'heading',
				'label' => __( 'General Settings', 'blogty' ),
			),
			'number'                  => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 3,
				'label' => __( 'Number of posts to show', 'blogty' ),
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
				'std'     => array( 'author', 'date', 'comment' ),
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
			'show_category'           => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Category', 'blogty' ),
				'std'   => true,
			),
			'category_color'          => array(
				'type'    => 'select',
				'label'   => __( 'Category Color', 'blogty' ),
				'options' => blogty_get_category_color_display(),
				'std'     => 'as_bg',
			),
			'category_style'          => array(
				'type'    => 'select',
				'label'   => __( 'Category Style', 'blogty' ),
				'options' => blogty_get_category_styles(),
				'std'     => 'style_2',
			),
			'no_of_category'          => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 1,
				'label' => __( 'Number of Category to Display', 'blogty' ),
			),
			'tab_display_style'       => array(
				'type'    => 'select',
				'label'   => __( 'Tab Display Style', 'blogty' ),
				'options' => array(
					'style_1' => __( 'Left Image + Right Content', 'blogty' ),
					'style_2' => __( 'Top Image + Bottom Content', 'blogty' ),
					'style_3' => __( 'Top Image + Bottom Content Variation', 'blogty' ),
				),
				'std'     => 'style_1',
			),
			'invert_post'             => array(
				'type'  => 'checkbox',
				'label' => __( 'Invert Post', 'blogty' ),
				'std'   => false,
			),
			'inverted_block_color'    => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'blogty' ),
				'desc'  => __( 'Can be used if you have dark background and want ligter color on the text.', 'blogty' ),
				'std'   => false,
			),
			'hide_image'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide Post Image', 'blogty' ),
				'std'   => false,
			),
			'enable_post_format_icon' => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Post Format Icon', 'blogty' ),
				'std'   => false,
			),
			'title_limit'             => array(
				'type'    => 'select',
				'label'   => __( 'Post Title Limit', 'blogty' ),
				'options' => blogty_get_title_limit_choices(),
				'std'     => '',
			),
		);

		parent::__construct();
	}

	/**
	 * Outputs the tab Content
	 *
	 * @param array  $instance
	 * @param string $block The block to display.
	 */
	public function render_tab_title( $instance, $block, $is_active = false ) {

		if ( ! $block ) {
			return;
		}

		$enabled = isset( $instance[ "show_{$block}_posts" ] ) ? $instance[ "show_{$block}_posts" ] : $this->settings[ "show_{$block}_posts" ]['std'];

		if ( $enabled ) :
			$icon  = isset( $instance[ "show_{$block}_posts_icon" ] ) ? $instance[ "show_{$block}_posts_icon" ] : $this->settings[ "show_{$block}_posts_icon" ]['std'];
			$title = isset( $instance[ "{$block}_posts_title" ] ) ? $instance[ "{$block}_posts_title" ] : $this->settings[ "{$block}_posts_title" ]['std'];
			?>
			<a id="<?php echo esc_attr( $block ); ?>-posts-<?php echo esc_attr( $this->unique_id ); ?>" href="#<?php echo esc_attr( $block ); ?>-posts-<?php echo esc_attr( $this->unique_id ); ?>-block" class="tab-item tab-link<?php echo ( $is_active ) ? ' active' : ''; ?>" data-toggle="uf-tab" aria-selected="<?php echo ( $is_active ) ? 'true' : 'false'; ?>" role="tab"  aria-controls="<?php echo esc_attr( $block ); ?>-posts-<?php echo esc_attr( $this->unique_id ); ?>-block">
				<?php if ( $icon ) : ?>
					<span class="tab-title-icon"><?php blogty_the_theme_svg( $block ); ?></span>
				<?php endif; ?>
				<?php if ( $title ) : ?>
					<span class="tab-title-label"><?php echo $title; ?></span>
				<?php endif; ?>
			</a>
			<?php
		endif;
	}

	/**
	 * Outputs the tab Content
	 *
	 * @param array  $instance
	 * @param string $block The block to display.
	 */
	public function render_tab_content( $instance, $block, $is_active = false ) {

		if ( ! $block ) {
			return;
		}

		$enabled                 = isset( $instance[ "show_{$block}_posts" ] ) ? $instance[ "show_{$block}_posts" ] : $this->settings[ "show_{$block}_posts" ]['std'];
		$hide_image              = isset( $instance['hide_image'] ) ? $instance['hide_image'] : $this->settings['hide_image']['std'];
		$title_limit             = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
		$enable_post_format_icon = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];

		if ( $enabled ) :

			$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];

			if ( 'popular' == $block ) {
				$orderby = 'comment_count';
			} else {
				$orderby = ! empty( $instance[ "{$block}_post_orderby" ] ) ? sanitize_text_field( $instance[ "{$block}_post_orderby" ] ) : $this->settings[ "{$block}_post_orderby" ]['std'];
			}

			$order  = ! empty( $instance[ "{$block}_post_order" ] ) ? sanitize_text_field( $instance[ "{$block}_post_order" ] ) : $this->settings[ "{$block}_post_order" ]['std'];
			$offset = ! empty( $instance[ "{$block}_post_offset" ] ) ? sanitize_text_field( $instance[ "{$block}_post_offset" ] ) : $this->settings[ "{$block}_post_offset" ]['std'];

			$query_args = array(
				'post_type'           => 'post',
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

			if ( ! empty( $instance[ "{$block}_post_cat" ] ) && -1 != $instance[ "{$block}_post_cat" ] && 0 != $instance[ "{$block}_post_cat" ] ) {
				$query_args['tax_query'][] = array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $instance[ "{$block}_post_cat" ],
				);
			}

			$posts = new WP_Query( $query_args );
			if ( $posts->have_posts() ) :

				$enabled_post_meta             = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
				$meta_settings['date_format']  = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
				$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
				$meta_settings['show_icons']   = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];
				$show_category                 = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];
				if ( $show_category ) {
					$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
					$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
					$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
				}
				?>
				<div id="<?php echo esc_attr( $block ); ?>-posts-<?php echo esc_attr( $this->unique_id ); ?>-block" class="blogty-tab-panel blogty-animate-opacity<?php echo ( $is_active ) ? ' active' : ''; ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $block ); ?>-posts-<?php echo esc_attr( $this->unique_id ); ?>">
					<div class="blogty-list-posts">
						<?php
						while ( $posts->have_posts() ) :
							$posts->the_post();
							?>
							<div class="blogty-article-block-wrapper img-animate-zoom blogty-card-box">
								<?php
								if ( ! $hide_image && has_post_thumbnail() ) {
									if ( 'style_1' == $this->display_style ) {
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
									} else {
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
													'blogty-medium-img',
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
								}
								?>
								<div class="article-details">
									<?php
									if ( $show_category ) {
										echo '<div class="article-cat-info">';
											blogty_post_categories( $cat_style, $color, $limit );
										echo '</div>';
									}
									?>
									<h3 class="article-title no-margin color-accent-hover blogty-limit-lines <?php echo esc_attr( $title_limit ); ?>">
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
			endif;
		endif;
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

		$before_widget = $args['before_widget'];
		$after_widget  = $args['after_widget'];

		echo wp_kses_post( $before_widget );

		do_action( 'blogty_before_tab_posts' );

		$this->display_style  = isset( $instance['tab_display_style'] ) ? $instance['tab_display_style'] : $this->settings['tab_display_style']['std'];
		$invert_post          = isset( $instance['invert_post'] ) ? $instance['invert_post'] : $this->settings['invert_post']['std'];
		$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];
		$hide_image           = isset( $instance['hide_image'] ) ? $instance['hide_image'] : $this->settings['hide_image']['std'];

		$widget_class = $this->display_style;

		if ( $invert_post ) {
			$widget_class .= ' saga-inverted-item';
		}

		if ( $hide_image ) {
			$widget_class .= ' saga-hidden-post-image';
		}

		// Comments Tab.
		if ( function_exists( 'has_blocks' ) ) {
			$is_gutenberg = true;
		} else {
			$is_gutenberg = false;
		}
		$show_comment_tab = isset( $instance['show_comment_tab'] ) ? $instance['show_comment_tab'] : $this->settings['show_comment_tab']['std'];

		// Inverted Color.
		if ( $inverted_block_color ) {
			$widget_class .= ' saga-block-inverted-color';
		}

		++self::$counter;
		$this->unique_id = 'blogty-tab-' . self::$counter;
		?>

		<div class="blogty-tab-posts-widget <?php echo esc_attr( $widget_class ); ?>">
			<div class="blogty-tabs-wrapper">
				<div class="blogty-tab-head" role="tablist" aria-label="<?php esc_attr_e( 'Tab Navigation', 'blogty' ); ?>">
					<?php $this->render_tab_title( $instance, 'popular', true ); ?>
					<?php $this->render_tab_title( $instance, 'hot' ); ?>
					<?php $this->render_tab_title( $instance, 'latest' ); ?>
					<?php
					if ( $is_gutenberg && $show_comment_tab ) :
						$show_comments_icon = isset( $instance['show_comments_icon'] ) ? $instance['show_comments_icon'] : $this->settings['show_comments_icon']['std'];
						$comments_title     = isset( $instance['comments_title'] ) ? $instance['comments_title'] : $this->settings['comments_title']['std'];
						?>
						<a id="latest-comments-<?php echo esc_attr( $this->unique_id ); ?>" href="#latest-comments-<?php echo esc_attr( $this->unique_id ); ?>-block" class="tab-item tab-link" data-toggle="uf-tab" aria-selected="false" role="tab" aria-controls="latest-comments-<?php echo esc_attr( $this->unique_id ); ?>-block">
							<?php if ( $show_comments_icon ) : ?>
								<span class="tab-title-icon"><?php blogty_the_theme_svg( 'chat' ); ?></span>
							<?php endif; ?>
							<?php if ( $comments_title ) : ?>
								<span class="tab-title-label"><?php echo $comments_title; ?></span>
							<?php endif; ?>
						</a>
					<?php endif; ?>
				</div>
				<div class="blogty-tab-content">
					<?php $this->render_tab_content( $instance, 'popular', true ); ?>
					<?php $this->render_tab_content( $instance, 'hot' ); ?>
					<?php $this->render_tab_content( $instance, 'latest' ); ?>
					<?php
					if ( $is_gutenberg && $show_comment_tab ) :
						// Build attributes.
						$comments_number       = isset( $instance['comments_number'] ) ? $instance['comments_number'] : $this->settings['comments_number']['std'];
						$show_comment_user_img = isset( $instance['show_comment_user_img'] ) ? $instance['show_comment_user_img'] : $this->settings['show_comment_user_img']['std'];
						$show_comment_date     = isset( $instance['show_comment_date'] ) ? $instance['show_comment_date'] : $this->settings['show_comment_date']['std'];
						$show_comment_excerpt  = isset( $instance['show_comment_excerpt'] ) ? $instance['show_comment_excerpt'] : $this->settings['show_comment_excerpt']['std'];
						?>
						<div id="latest-comments-<?php echo esc_attr( $this->unique_id ); ?>-block" class="blogty-tab-panel blogty-animate-opacity" role="tabpanel" aria-labelledby="latest-comments-<?php echo esc_attr( $this->unique_id ); ?>">
							<?php
							$blocks = parse_blocks( '<!-- wp:latest-comments {"commentsToShow":' . absint( $comments_number ) . ',"displayAvatar":' . $show_comment_user_img . ',"displayDate":' . $show_comment_date . ',"displayExcerpt":' . $show_comment_excerpt . '} /-->' );
							foreach ( $blocks as $block ) {
								echo render_block( $block );
							}
							?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php

		do_action( 'blogty_after_tab_posts' );

		echo wp_kses_post( $after_widget );

		echo ob_get_clean();
	}
}
