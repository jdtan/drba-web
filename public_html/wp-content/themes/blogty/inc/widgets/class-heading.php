<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Heading extends Blogty_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogty_heading_widget';
		$this->widget_description = __( 'Displays widget heading style to match the theme styles. It helps if you\'re using blocks in widgets but want a heading style of the theme.', 'blogty' );
		$this->widget_id          = 'blogty_heading_widget';
		$this->widget_name        = __( 'Blogty: Heading', 'blogty' );
		$this->settings           = array(
			'title'               => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
			),
			'subtitle'            => array(
				'type'  => 'text',
				'label' => __( 'Subtitle', 'blogty' ),
			),
			'heading_style'       => array(
				'type'    => 'select',
				'label'   => __( 'Heading Style', 'blogty' ),
				'options' => blogty_get_title_styles(),
				'std'     => 'style_1',
			),
			'heading_alignment'   => array(
				'type'    => 'select',
				'label'   => __( 'Heading Alignment', 'blogty' ),
				'options' => blogty_get_title_alignments(),
				'std'     => 'left',
			),
			'inverted_text_color' => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Text Color', 'blogty' ),
				'desc'  => __( 'Can be used if you have dark background and want ligter color on the text.', 'blogty' ),
				'std'   => false,
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

		$before_widget = $args['before_widget'];
		$after_widget  = $args['after_widget'];

		$wrapper_class   = 'saga-element-header ' . $instance['heading_style'];
		$wrapper_class  .= ' saga-title-align-' . $instance['heading_alignment'];

		$subtitle            = isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$inverted_text_color = isset( $instance['inverted_text_color'] ) ? $instance['inverted_text_color'] : $this->settings['inverted_text_color']['std'];

		if ( $inverted_text_color ) {
			$wrapper_class  .= ' blogty-inverted-title-color';
		}

		echo wp_kses_post( $before_widget );

		if ( $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ) ) {
			?>
			<div class="<?php echo esc_attr( $wrapper_class ); ?>">
				<div class="saga-element-title-wrapper">
					<h2 class="saga-element-title">
						<span><?php echo esc_html( $title ); ?></span>
					</h2>
				</div>
				<?php 
				if ( $subtitle ) {
					?>
					<p class="saga-element-subtitle"><?php echo esc_html( $subtitle ); ?></p>
					<?php
				}
				?>
			</div>
			<?php
		}

		echo wp_kses_post( $after_widget );

		echo ob_get_clean();
	}
}
