<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Mailchimp_Form extends Blogty_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'widget_blogty_mailchimp_form';
		$this->widget_description = __( 'Displays MailChimp form if you have any', 'blogty' );
		$this->widget_id          = 'blogty_mailchimp_form';
		$this->widget_name        = __( 'Blogty: MailChimp Form', 'blogty' );
		$this->settings           = array(
			'title'                      => array(
				'type'  => 'text',
				'label' => __( 'Widget Title', 'blogty' ),
			),
			'mailchimp_settings_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Mailchimp Settings', 'blogty' ),
			),
			'mailchimp_title'            => array(
				'type'  => 'text',
				'label' => __( 'Mailchimp Title', 'blogty' ),
			),
			'desc'                       => array(
				'type'  => 'textarea',
				'label' => __( 'Description', 'blogty' ),
				'rows'  => 10,
			),
			'form_shortcode'             => array(
				'type'  => 'text',
				'label' => __( 'MailChimp Form Shortcode', 'blogty' ),
			),
			'widget_settings_heading'    => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogty' ),
			),
			'style'                      => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'blogty' ),
				'desc'    => __( 'For Inline Style, make sure to wrap each element ( like name, email, submit, etc. ) you want to display as inline, inside a "&lt;p&gt;&lt;/p&gt;" tag.', 'blogty' ),
				'options' => array(
					'style_1' => __( 'Default Style', 'blogty' ),
					'style_2' => __( 'Form Items Inline', 'blogty' ),
				),
				'std'     => 'style_1',
			),
			'center_aligned_form'        => array(
				'type'  => 'checkbox',
				'label' => __( 'Center Aligned Form', 'blogty' ),
				'std'   => false,
			),
			'wide_submit_btn'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Wide Submit Button', 'blogty' ),
				'std'   => false,
			),
			'enable_bg_color'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Background Color', 'blogty' ),
				'std'   => false,
			),
			'bg_color'                   => array(
				'type'  => 'color',
				'label' => __( 'Background Color', 'blogty' ),
				'std'   => '#000000',
				'desc'  => __( 'Will be overridden if used background image.', 'blogty' ),
			),
			'inverted_block_color'       => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'blogty' ),
				'desc'  => __( 'Can be used if you have dark background and want ligter color on the text.', 'blogty' ),
				'std'   => false,
			),
			'bg_image'                   => array(
				'type'  => 'image',
				'label' => __( 'Background Image', 'blogty' ),
				'desc'  => __( 'Don\'t upload any image if you do not want to show the background image.', 'blogty' ),
			),
			'enable_fixed_bg'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Fixed Background Image', 'blogty' ),
				'std'   => true,
			),
			'bg_overlay_color'           => array(
				'type'  => 'color',
				'label' => __( 'Overlay Color', 'blogty' ),
				'std'   => '#000000',
			),
			'overlay_opacity'            => array(
				'type'  => 'number',
				'step'  => 10,
				'min'   => 0,
				'max'   => 100,
				'std'   => 50,
				'label' => __( 'Overlay Opacity', 'blogty' ),
			),
			'height'                     => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 150,
				'max'   => '',
				'std'   => 350,
				'label' => __( 'Height (px)', 'blogty' ),
				'desc'  => __( 'Works when there is either a background color or image.', 'blogty' ),
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
		if ( ! empty( $instance['form_shortcode'] ) ) {

			ob_start();

			$style         = '';
			$class         = $instance['style'];
			$image_enabled = false;

			$this->widget_start( $args, $instance );

			if ( $instance['center_aligned_form'] ) {
				$class .= ' blogty-mailchimp-centered';
			}

			if ( $instance['wide_submit_btn'] ) {
				$class .= ' blogty-mailchimp-wide-btn';
			}

			if ( $instance['enable_bg_color'] ) {
				$bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : $this->settings['bg_color']['std'];
				$style    = 'background-color:' . esc_attr( $bg_color ) . ';';
			}

			$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];

			if ( ( $instance['bg_image'] && 0 != $instance['bg_image'] ) ) {
				$image_enabled = true;
				if ( $instance['enable_fixed_bg'] ) {
					$class .= ' blogty-bg-image blogty-bg-attachment-fixed';
				}
			}

			if ( $instance['enable_bg_color'] || $image_enabled ) {
				$height = isset( $instance['height'] ) ? $instance['height'] : $this->settings['height']['std'];
				$style .= 'min-height:' . esc_attr( $height ) . 'px;';
				$class .= ' blogty-cover-block';
			}

			// Inverted Color.
			if ( $inverted_block_color ) {
				$class .= ' saga-block-inverted-color';
			}

			do_action( 'blogty_before_mailchimp' );

			?>
			
			<div class="blogty-mailchimp-widget <?php echo esc_attr( $class ); ?>" style="<?php echo esc_attr( $style ); ?>">

				<?php
				if ( $image_enabled ) {
					$overlay_style  = 'background-color:' . $instance['bg_overlay_color'] . ';';
					$overlay_style .= 'opacity:' . ( $instance['overlay_opacity'] / 100 ) . ';';
					?>
					<span aria-hidden="true" class="blogty-block-overlay" style="<?php echo esc_attr( $overlay_style ); ?>"></span>
					<?php echo wp_get_attachment_image( $instance['bg_image'], 'full' ); ?>
					<?php
				}
				?>
				<div class="blogty-mailchimp-inner-wrapper blogty-block-inner-wrapper">

					<div class="mailchimp-content">

						<?php if ( $instance['mailchimp_title'] ) : ?>
							<h3 class="mailchimp-title">
								<?php echo esc_html( $instance['mailchimp_title'] ); ?>
							</h3>
						<?php endif; ?>

						<?php if ( $instance['desc'] ) : ?>
							<div class="mailchimp-desc">
								<?php echo wpautop( wp_kses_post( $instance['desc'] ) ); ?>
							</div>
						<?php endif; ?>

					</div>
					
					<div class="mailchimp-form">
						<?php echo do_shortcode( $instance['form_shortcode'] ); ?>
					</div>

				</div>

			</div>

			<?php

			do_action( 'blogty_after_mailchimp' );

			$this->widget_end( $args );

			echo ob_get_clean();
		}
	}
}
