<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Ads_Code extends Blogty_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogty_ads_code_widget';
		$this->widget_description = __( 'Advertisements or codes widget.', 'blogty' );
		$this->widget_id          = 'blogty_ads_code_widget';
		$this->widget_name        = __( 'Blogty: Ads Code', 'blogty' );
		$this->settings           = array(
			'ads_code'        => array(
				'type'  => 'textarea',
				'label' => __( 'Ads Code', 'blogty' ),
			),
			'align'           => array(
				'type'    => 'select',
				'label'   => __( 'Alignment', 'blogty' ),
				'options' => array(
					'left'    => __( 'Left', 'blogty' ),
					'center'  => __( 'Center', 'blogty' ),
					'right'   => __( 'Right', 'blogty' ),
					'strecth' => __( 'Stretch', 'blogty' ),
				),
				'std'     => 'center',
			),
			'hide_on_desktop' => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide on Desktop', 'blogty' ),
				'std'   => false,
			),
			'hide_on_tablet'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide on Tablet', 'blogty' ),
				'std'   => false,
			),
			'hide_on_mobile'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide on Mobile', 'blogty' ),
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

		echo wp_kses_post( $before_widget );

		$ad_class = '';
		if ( $instance['hide_on_desktop'] ) {
			$ad_class .= ' hide-on-desktop';
		}
		if ( $instance['hide_on_tablet'] ) {
			$ad_class .= ' hide-on-tablet';
		}
		if ( $instance['hide_on_mobile'] ) {
			$ad_class .= ' hide-on-mobile';
		}

		do_action( 'blogty_before_ads_code' );

		?>

		<div class="blogty-ads-code-widget<?php echo esc_attr( $ad_class ); ?>" style="justify-items:<?php echo esc_attr( $instance['align'] ); ?>;" >
			<?php
			if ( $instance['ads_code'] ) {
				echo wp_kses_post( $instance['ads_code'] );
			}
			?>
		</div>

		<?php

		do_action( 'blogty_after_ads_code' );

		echo wp_kses_post( $after_widget );

		echo ob_get_clean();
	}

}
