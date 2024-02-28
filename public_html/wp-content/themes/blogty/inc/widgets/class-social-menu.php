<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogty_Social_Menu extends Blogty_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'widget_blogty_social_menu';
		$this->widget_description = __( 'Displays social menu if you have set it.', 'blogty' );
		$this->widget_id          = 'blogty_social_menu';
		$this->widget_name        = __( 'Blogty: Social Menu', 'blogty' );
		$this->settings           = array(
			'title'      => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogty' ),
			),
			'color'      => array(
				'type'    => 'select',
				'label'   => __( 'Social Links Color', 'blogty' ),
				'options' => array(
					'theme_color' => __( 'Use Theme Color', 'blogty' ),
					'brand_color' => __( 'Use Brand Color', 'blogty' ),
				),
				'std'     => 'theme_color',
			),
			'style'      => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'blogty' ),
				'options' => blogty_get_social_links_styles(),
				'std'     => 'style_1',
			),
			'show_label' => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Label', 'blogty' ),
				'std'   => false,
			),
			'column'     => array(
				'type'    => 'select',
				'label'   => __( 'Column', 'blogty' ),
				'desc'    => __( 'Will only work when label is enabled from above and there is enough space to display the columns.', 'blogty' ),
				'options' => array(
					'one'   => __( 'One', 'blogty' ),
					'two'   => __( 'Two', 'blogty' ),
					'three' => __( 'Three', 'blogty' ),
				),
				'std'     => 'two',
			),
			'align'      => array(
				'type'    => 'select',
				'label'   => __( 'Alignment', 'blogty' ),
				'options' => array(
					'left'   => __( 'Left', 'blogty' ),
					'center' => __( 'Center', 'blogty' ),
					'right'  => __( 'Right', 'blogty' ),
				),
				'std'     => 'left',
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

		$this->widget_start( $args, $instance );

		do_action( 'blogty_before_social_menu' );

		$wrapper_class = isset( $instance['align'] ) ? $instance['align'] : $this->settings['align']['std'];

		?>
		<div class="blogty-social-menu-widget menu-align-<?php echo esc_attr( $wrapper_class ); ?>">
			<?php

			if ( has_nav_menu( 'social-menu' ) ) {

				$social_link_class  = ' reset-list-style blogty-social-icons ';
				$social_link_style  = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
				$social_link_style .= blogty_get_social_icons_class( $social_link_style );
				$social_link_color  = isset( $instance['color'] ) ? $instance['color'] : $this->settings['color']['std'];

				$social_link_class .= $social_link_style . ' ' . $social_link_color;

				$label_class = 'screen-reader-text';
				$show_label  = isset( $instance['show_label'] ) ? $instance['show_label'] : $this->settings['show_label']['std'];
				if ( $show_label ) {
					$label_class        = 'em-social-menu-label';
					$social_link_class .= ' has-social-menu-label';
					$column             = isset( $instance['column'] ) ? $instance['column'] : $this->settings['column']['std'];
					$social_link_class .= ' em-flex-col-' . $column;
				}

				wp_nav_menu(
					array(
						'theme_location'  => 'social-menu',
						'container_class' => 'social-navigation',
						'fallback_cb'     => false,
						'depth'           => 1,
						'menu_class'      => $social_link_class,
						'link_before'     => '<span class="' . $label_class . '">',
						'link_after'      => '</span>',
					)
				);
			} else {
				esc_html_e( 'Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'blogty' );
			}
			?>
		</div>
		<?php

		do_action( 'blogty_after_social_menu' );

		$this->widget_end( $args );

		echo ob_get_clean();
	}
}
