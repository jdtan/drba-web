<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Call_To_Action extends Blogty_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'widget_blogty_call_to_action';
		$this->widget_description = __( 'Adds Call to action section', 'blogty' );
		$this->widget_id          = 'blogty_call_to_action';
		$this->widget_name        = __( 'Blogty: Call To Action', 'blogty' );

		$this->settings = array(
			'title'            => array(
				'type'  => 'text',
				'label' => __( 'Widget Title', 'blogty' ),
			),
			'cta_settings'     => array(
				'type'  => 'heading',
				'label' => __( 'CTA Settings', 'blogty' ),
			),
			'title_text'       => array(
				'type'  => 'text',
				'label' => __( 'CTA Title', 'blogty' ),
			),
			'desc'             => array(
				'type'  => 'textarea',
				'label' => __( 'CTA Description', 'blogty' ),
				'rows'  => 10,
			),
			'btn_text'         => array(
				'type'  => 'text',
				'label' => __( 'Button Text', 'blogty' ),
			),
			'btn_link'         => array(
				'type'  => 'url',
				'label' => __( 'Link to url', 'blogty' ),
				'desc'  => __( 'Enter a proper url with http: OR https:', 'blogty' ),
			),
			'btn_style'        => array(
				'type'    => 'select',
				'label'   => __( 'Button Style', 'blogty' ),
				'options' => blogty_get_read_more_styles(),
				'std'     => 'style_1',
			),
			'btn_icon'         => array(
				'type'    => 'select',
				'label'   => __( 'Button Icon', 'blogty' ),
				'options' => blogty_get_read_more_icons_list(),
				'std'     => '',
			),
			'link_target'      => array(
				'type'  => 'checkbox',
				'label' => __( 'Open Link in new Tab', 'blogty' ),
				'std'   => true,
			),
			'widget_settings'  => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogty' ),
			),
			'style'            => array(
				'type'    => 'select',
				'label'   => __( 'Display Style', 'blogty' ),
				'options' => array(
					'style_1' => __( 'Items Aligned Center + Small Width Description', 'blogty' ),
					'style_2' => __( 'Items Aligned Center + Full Width Description', 'blogty' ),
					'style_3' => __( 'Items Aligned Left', 'blogty' ),
					'style_4' => __( 'Items Aligned Right', 'blogty' ),
					'style_5' => __( 'Normal', 'blogty' ),
				),
				'std'     => 'style_1',
			),
			'justify_content'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Justify Content', 'blogty' ),
				'std'   => false,
			),
			'enable_bg_color'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Background Color', 'blogty' ),
				'std'   => false,
			),
			'bg_color'         => array(
				'type'  => 'color',
				'label' => __( 'Background Color', 'blogty' ),
				'std'   => '#000000',
				'desc'  => __( 'Will be overridden if used background image.', 'blogty' ),
			),
			'bg_image'         => array(
				'type'  => 'image',
				'label' => __( 'Background Image', 'blogty' ),
			),
			'enable_fixed_bg'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Fixed Background Image', 'blogty' ),
				'std'   => true,
			),
			'bg_overlay_color' => array(
				'type'  => 'color',
				'label' => __( 'Overlay Color', 'blogty' ),
				'std'   => '#000000',
			),
			'overlay_opacity'  => array(
				'type'  => 'number',
				'step'  => 10,
				'min'   => 0,
				'max'   => 100,
				'std'   => 50,
				'label' => __( 'Overlay Opacity', 'blogty' ),
			),
			'height'           => array(
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

		ob_start();

		$style         = '';
		$class         = $instance['style'];
		$image_enabled = false;

		$this->widget_start( $args, $instance );

		if ( $instance['enable_bg_color'] ) {
			$bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : $this->settings['bg_color']['std'];
			$style    = 'background-color:' . esc_attr( $bg_color ) . ';';
		}

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

		$justify_content = isset( $instance['justify_content'] ) ? $instance['justify_content'] : '';
		if ( $justify_content ) {
			$class .= ' justified-cta';
		}

		do_action( 'blogty_before_cta' );

		?>

		<div class="blogty-cta-widget <?php echo esc_attr( $class ); ?>" style="<?php echo esc_attr( $style ); ?>">

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
			<div class="blogty-cta-inner-wrapper blogty-block-inner-wrapper">

				<?php if ( $instance['title_text'] ) : ?>
					<div class="cta-title">
						<?php echo esc_html( $instance['title_text'] ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $instance['desc'] ) : ?>
					<div class="cta-description">
						<?php echo wpautop( wp_kses_post( $instance['desc'] ) ); ?>
					</div>
				<?php endif; ?>

				<?php
				if ( $instance['btn_text'] ) :
					$link_class = isset( $instance['btn_style'] ) ? $instance['btn_style'] : $this->settings['btn_style']['std'];
					$btn_icon   = isset( $instance['btn_icon'] ) ? $instance['btn_icon'] : $this->settings['btn_icon']['std'];
					?>
					<div class="cta-button saga-block-inverted-color">
						<a href="<?php echo ( $instance['btn_link'] ) ? esc_url( $instance['btn_link'] ) : ''; ?>" 
						target="<?php echo ( $instance['link_target'] ) ? '_blank' : '_self'; ?>" class="blogty-btn-link text-decoration-none <?php echo esc_attr( $link_class ); ?>">
							<?php
							echo esc_html( ( $instance['btn_text'] ) );
							if ( $btn_icon ) {
								?>
								<span><?php blogty_the_theme_svg( $btn_icon ); ?></span>
								<?php
							}
							?>
						</a>
					</div>
				<?php endif; ?>

			</div>

		</div>

		<?php

		do_action( 'blogty_after_cta' );

		$this->widget_end( $args );

		echo ob_get_clean();
	}
}
