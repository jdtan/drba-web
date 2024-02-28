<?php
/**
 * Getting Started
 *
 * @package Blogty
 */

?>
<div class="blogty-dashboard-body">
	<div class="welcome-section-wrapper">
		<div class="welcome-section-intro">
			<?php $user = wp_get_current_user(); ?>
			<div class="intro__hello">
				<?php
				printf(
					/* translators: %s: User Name. */
					esc_html__( 'Hello %s,', 'blogty' ),
					ucfirst( $user->display_name )
				);
				?>
			</div>
			<div class="intro__thanks">
				<?php
					printf(
						/* translators: %s: Theme Name. */
						esc_html__( 'Welcome to %s', 'blogty' ),
						$this->theme_name
					);
					?>
				<sup><?php echo esc_html( $this->theme_version ); ?></sup>
			</div>
			<div class="intro__desc">
				<?php
					esc_html_e( 'We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Also check out premium version of the theme if you need more features.', 'blogty' );
				?>
			</div>
			<div class="intro__links">
				<a href="<?php echo esc_url( $this->theme_url ); ?>" class="button button-primary" target="_blank"><span class="dashicons dashicons-media-text"></span><?php esc_html_e( 'Theme Details', 'blogty' ); ?></a>
				<a href="<?php echo esc_url( $this->doc_url ); ?>" class="button button-primary" target="_blank"><span class="dashicons dashicons-media-document"></span><?php esc_html_e( 'Documentation', 'blogty' ); ?></a>
				<a href="<?php echo esc_url( $this->redirect_template_url ); ?>" class="button button-primary"><span class="dashicons dashicons-welcome-view-site"></span><?php esc_html_e( 'Starter Templates', 'blogty' ); ?></a>
			</div>
		</div>
		<div class="welcome-section-image">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/screenshot.png' ); ?>" alt="<?php esc_attr_e( 'Blogty Screenshot', 'blogty' ); ?>">
		</div>
	</div>
	<div class="welcome-body-wrapper">
		<div class="first-col">
			<div class="customizer-links-wrapper">
				<div class="customizer-links-heading">
					<p><?php esc_html_e( 'Quick Settings', 'blogty' ); ?></p>
					<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_self" rel="noreferrer" class="link-with-icon"><?php esc_html_e( 'Visit Customizer', 'blogty' ); ?><span class="dashicons dashicons-arrow-right-alt"></span></a>
				</div>
				<div class="customizer-links-content">
					<ul>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[control]', 'blogname', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-upload"></span><?php esc_html_e( 'Upload Logo', 'blogty' ); ?></a></li>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'colors', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-color-picker"></span><?php esc_html_e( 'Color Options', 'blogty' ); ?></a></li>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'typography_options_panel', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-heading"></span></span><?php esc_html_e( 'Typography Options', 'blogty' ); ?></a></li>
					</ul>
					<ul>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'header_options_panel', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-edit"></span></span><?php esc_html_e( 'Header Options', 'blogty' ); ?></a></li>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'theme_sidebar_panel', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-align-pull-left"></span><?php esc_html_e( 'Sidebar Options', 'blogty' ); ?></a></li>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'footer_options_panel', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-edit"></span></span><?php esc_html_e( 'Footer Options', 'blogty' ); ?></a></li>
					</ul>
					<ul>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'blog_options_panel', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-welcome-write-blog"></span><?php esc_html_e( 'Archive Options', 'blogty' ); ?></a></li>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'single_posts_options_panel', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-align-pull-left"></span><?php esc_html_e( 'Single Options', 'blogty' ); ?></a></li>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'theme_home_option_panel', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-admin-page"></span></span><?php esc_html_e( 'Frontpage Options', 'blogty' ); ?></a></li>
					</ul>
					<ul>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'nav_menus', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-menu"></span><?php esc_html_e( 'Set Menus', 'blogty' ); ?></a></li>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'widgetareas_options_panel', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-welcome-widgets-menus"></span><?php esc_html_e( 'Widgetareas', 'blogty' ); ?></a></li>
						<li><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'general_options_panel', admin_url( 'customize.php' ) ) ); ?>" target="_blank"><span class="dashicons dashicons-admin-settings"></span><?php esc_html_e( 'General Settings', 'blogty' ); ?></a></li>
					</ul>
				</div>
			</div>
			<div class="support-section-wrapper">
				<div class="support-doc-wrap">
					<h3><?php esc_html_e( 'Documentation', 'blogty' ); ?></h3>
					<p><?php esc_html_e( 'You\'ll find all the information you need to get started with the theme in the documentation. If you did not find the solution, you can always contact us.', 'blogty' ); ?>
					</p>
					<a href="<?php echo esc_url( $this->doc_url ); ?>" target="_blank" class="link-with-icon"><?php esc_html_e( 'Documentation', 'blogty' ); ?><span class="dashicons dashicons-arrow-right-alt"></span></a>
				</div>
				<div class="support-contact-wrap">
					<h3><?php esc_html_e( 'Need Help?', 'blogty' ); ?></h3>
					<p><?php esc_html_e( 'Coud not find what you were looking for on the documentation? Reach out to us and our dedicated team of members will help you to solve your problems.', 'blogty' ); ?></p>
					<a href="<?php echo esc_url( $this->support_url ); ?>" target="_blank" class="link-with-icon"><?php esc_html_e( 'Contact Us', 'blogty' ); ?><span class="dashicons dashicons-arrow-right-alt"></span></a>
				</div>
			</div>
		</div>
		<div class="last-col">
			<div class="rate-us-wrapper">
				<h3><?php esc_html_e( 'Rate Us', 'blogty' ); ?></h3>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<p><?php esc_html_e( 'We welcome your feedback and would be thankful for the review you provide.', 'blogty' ); ?></p>
				<a href="<?php echo esc_url( $this->review_url ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Submit a Review', 'blogty' ); ?></a>
			</div>
		</div>
	</div>
</div>
<div class="blogty-upgrade-to-pro">
	<div class="content-wrapper">
		<div class="first-col features-list">
			<h3 class="feature-title">
				<?php esc_html_e( 'Unlock more features with premium version of this theme', 'blogty' ); ?>
			</h3>  
			<ul>
				<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'All Premium Modules', 'blogty' ); ?></li>
				<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Advance Typography', 'blogty' ); ?></li>
				<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Header Options', 'blogty' ); ?></li>
				<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Footer Options', 'blogty' ); ?></li>
				<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Color Options', 'blogty' ); ?></li>
				<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Widgets Options', 'blogty' ); ?></li>
				<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Customizer Options', 'blogty' ); ?></li>
				<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Archive Layouts', 'blogty' ); ?></li>
				<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Post Layouts', 'blogty' ); ?></li>
				<li><span class="dashicons dashicons-plus"></span><?php esc_html_e( 'and Much More Stuff...', 'blogty' ); ?></li>
			</ul>
		</div>
		<div class="last-col">
			<div class="upgrade-card">
				<span><?php esc_html_e( 'PRO', 'blogty' ); ?></span>
				<p><?php esc_html_e( 'Unlock all the possibilties and true potential with premium version of this theme', 'blogty' ); ?></p>
				<a href="<?php echo esc_url( $this->theme_url . '?utm_source=wp&utm_medium=theme-dashboard&utm_campaign=fvp' ); ?>" target="_blank" class="button button-primary button-plus"><?php esc_html_e( 'Upgrade To Pro', 'blogty' ); ?></a>
			</div>
		</div>
	</div>
</div>
