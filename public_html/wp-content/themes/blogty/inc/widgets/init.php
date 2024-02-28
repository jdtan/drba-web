<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widget-sidebars.php';
require get_template_directory() . '/inc/widgets/widget-base/abstract-widget-base.php';

require get_template_directory() . '/inc/widgets/class-heading.php';
require get_template_directory() . '/inc/widgets/class-ads-code.php';
require get_template_directory() . '/inc/widgets/class-grid-posts.php';
require get_template_directory() . '/inc/widgets/class-single-column-posts.php';
require get_template_directory() . '/inc/widgets/class-list-posts.php';
require get_template_directory() . '/inc/widgets/class-recent-posts.php';
require get_template_directory() . '/inc/widgets/class-popular-posts.php';
require get_template_directory() . '/inc/widgets/class-social-menu.php';
require get_template_directory() . '/inc/widgets/class-author-info.php';
require get_template_directory() . '/inc/widgets/class-mailchimp-form.php';
require get_template_directory() . '/inc/widgets/class-call-to-action.php';
require get_template_directory() . '/inc/widgets/class-tab-posts.php';
require get_template_directory() . '/inc/widgets/class-posts-carousel.php';
require get_template_directory() . '/inc/widgets/class-posts-slider.php';
require get_template_directory() . '/inc/widgets/class-post-ids-special-grid.php';
require get_template_directory() . '/inc/widgets/class-post-categories-grid.php';

/* Register site widgets */
if ( ! function_exists( 'blogty_widgets' ) ) :
	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function blogty_widgets() {
		register_widget( 'Blogty_Heading' );
		register_widget( 'Blogty_Ads_Code' );
		register_widget( 'Blogty_Grid_Posts' );
		register_widget( 'Blogty_Single_Column_Posts' );
		register_widget( 'Blogty_List_Posts' );
		register_widget( 'Blogty_Recent_Posts' );
		register_widget( 'Blogty_Popular_Posts' );
		register_widget( 'Blogty_Social_Menu' );
		register_widget( 'Blogty_Author_Info' );
		register_widget( 'Blogty_Mailchimp_Form' );
		register_widget( 'Blogty_Call_To_Action' );
		register_widget( 'Blogty_Tab_Posts' );
		register_widget( 'Blogty_Posts_Carousel' );
		register_widget( 'Blogty_Posts_Slider' );
		register_widget( 'Blogty_Post_Ids_Special_Grid' );
		register_widget( 'Blogty_Post_Categories_Grid' );
	}
endif;
add_action( 'widgets_init', 'blogty_widgets' );
