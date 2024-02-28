<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Post_Categories_Grid extends Blogty_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogty_post_categories_grid_widget';
		$this->widget_description = __( 'Displays post categories with image in grid', 'blogty' );
		$this->widget_id          = 'blogty_post_categories_grid_widget';
		$this->widget_name        = __( 'Blogty: Categories Grid', 'blogty' );

		$post_categories = array();
		$categories      = get_categories(
			array(
				'orderby' => 'name',
				'order'   => 'ASC',
			)
		);

		if ( ! empty( $categories ) ) {
			foreach ( $categories as $cat ) {
				$post_categories[ $cat->term_id ] = $cat->name;
			}
		}

		$this->settings = array(
			'title'           => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
			),
			'categories'      => array(
				'type'    => 'multi-checkbox',
				'label'   => __( 'Select Categories', 'blogty' ),
				'options' => $post_categories,
			),
			'no_of_column'    => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => 5,
				'std'   => 2,
				'label' => __( 'Number of Column', 'blogty' ),
			),
			'display_style'   => array(
				'type'    => 'select',
				'label'   => __( 'Display Style', 'blogty' ),
				'options' => array(
					'style_1' => __( 'Default', 'blogty' ),
					'style_2' => __( 'Category on Bottom', 'blogty' ),
					'style_3' => __( 'Category on Center', 'blogty' ),
					'style_4' => __( 'Small Height', 'blogty' ),
				),
				'std'     => 'style_1',
			),
			'show_post_count' => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Count', 'blogty' ),
				'std'   => false,
			),
			'overlay_color'   => array(
				'type'  => 'color',
				'label' => __( 'Overlay Color', 'blogty' ),
				'std'   => '#000000',
			),
			'overlay_opacity' => array(
				'type'  => 'number',
				'step'  => 10,
				'min'   => 0,
				'max'   => 100,
				'std'   => 50,
				'label' => __( 'Overlay Opacity', 'blogty' ),
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

		if ( ! empty( $instance['categories'] ) ) {

			$this->widget_start( $args, $instance );

			do_action( 'blogty_before_post_cat_grid' );

			$column          = $instance['no_of_column'];
			$display_style   = $instance['display_style'];
			$show_post_count = isset( $instance['show_post_count'] ) ? $instance['show_post_count'] : $this->settings['show_post_count']['std'];

			if ( 'style_4' == $display_style ) {
				$gap = ' g-2';
			} else {
				$gap = ' g-4';
			}

			$col_class = 'row row-cols-1';

			if ( 2 == $column ) {
				$col_class .= ' row-cols-sm-2';
			} elseif ( 3 == $column ) {
				$col_class .= ' row-cols-md-3';
			} elseif ( 4 == $column ) {
				$col_class .= ' row-cols-sm-2 row-cols-xl-4';
			} elseif ( 5 == $column ) {
				$col_class .= ' row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5';
			} else {
				$col_class = ' row row-cols-1';
			}

			$col_class .= $gap;

			$img_size = 'blogty-large-img';

			$wrapper_class = $display_style;
			if ( $show_post_count ) {
				$wrapper_class .= ' blogty-cat-post-count-active';
			}

			$style_attr = ' style="background-color:value;"';
			?>

			<div class="blogty-posts-categories-grid-widget <?php echo esc_attr( $wrapper_class ); ?>">
				<div class="<?php echo esc_attr( $col_class ); ?>">
					<?php
					foreach ( $instance['categories'] as $category ) {
						$cat_info = get_category( $category );
						if ( ! empty( $cat_info ) && ! is_wp_error( $cat_info ) ) {
							$thumbnail_id = get_term_meta( $category, 'thumbnail_id', true );
							$image_tag    = wp_get_attachment_image( $thumbnail_id, $img_size );

							if ( $image_tag ) {

								$term_link  = get_category_link( $category );
								$post_count = $cat_info->count;
								$color      = get_term_meta( $cat_info->term_id, 'category_color', true );

								$build_style_attr = '';
								if ( $color ) {
									$build_style_attr = str_replace( 'value', $color, $style_attr );
								} else {
									$build_style_attr = '';
								}

								$style  = 'background-color:' . $instance['overlay_color'] . ';';
								$style .= 'opacity:' . ( $instance['overlay_opacity'] / 100 ) . ';';
								?>
								<div class="col">
									<div class="saga-block-item-w-overlay img-animate-zoom">
										<div class="saga-block-image-w-overlay blogty-rounded-img">
											<a href="<?php echo esc_url( $term_link ); ?>" class="">
											<span aria-hidden="true" class="blogty-block-overlay" style="<?php echo esc_attr( $style ); ?>"></span>
												<?php echo $image_tag; ?>
											</a>
										</div>
										<div class="saga-block-overlay-content">
											<span class="saga-block-overlay-title">
												<a href="<?php echo esc_url( $term_link ); ?>" class="text-decoration-none">
													<span class="blogty-cat-label"><?php echo esc_html( $cat_info->name ); ?></span>
													<?php if ( $show_post_count ) : ?>
														<span class="blogty-cat-post-count" <?php echo $build_style_attr; ?>><?php echo esc_html( $post_count ); ?></span>
													<?php endif; ?>
												</a>
											</span>
										</div>
									</div>
								</div>
								<?php
							}
						}
					}
					?>
				</div>
			</div>
			<?php

			do_action( 'blogty_after_post_cat_grid' );

			$this->widget_end( $args );

		}

		echo ob_get_clean();
	}
}
