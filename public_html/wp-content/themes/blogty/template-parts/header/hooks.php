<?php

// Topbar Date.
if ( ! function_exists( 'blogty_topbar_date' ) ) :
	function blogty_topbar_date() {
		if ( get_theme_mod( 'enable_todays_date', true ) ) :
			$date_format = get_theme_mod( 'todays_date_format', 'l, F j Y' );
			?>
			<div class="blogty-components-date">
				<span><?php echo esc_html( date_i18n( $date_format, current_time( 'timestamp' ) ) ); ?></span>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'blogty_topbar_first_col_items', 'blogty_topbar_date', 10 );

// Topbar Nav.
if ( ! function_exists( 'blogty_topbar_nav' ) ) :
	function blogty_topbar_nav() {
		if ( get_theme_mod( 'enable_top_nav' ) ) :
			wp_nav_menu(
				array(
					'theme_location'  => 'top-menu',
					'container_class' => 'blogty-top-nav',
					'fallback_cb'     => false,
					'depth'           => 2,
					'menu_class'      => 'blogty-top-menu reset-list-style',
				)
			);
		endif;
	}
endif;
add_action( 'blogty_topbar_first_col_items', 'blogty_topbar_nav', 20 );

// Topbar Social icons.
if ( ! function_exists( 'blogty_topbar_social' ) ) :
	function blogty_topbar_social() {
		if ( get_theme_mod( 'enable_topbar_social_nav', true ) ) :

			$menu_class         = ' reset-list-style blogty-social-icons ';
			$social_link_style  = get_theme_mod( 'header_social_links_display_style', 'style_1' );
			$social_link_style .= blogty_get_social_icons_class( $social_link_style );
			$social_link_color  = get_theme_mod( 'header_social_links_color_as', 'theme_color' );
			$menu_class        .= $social_link_style . ' ' . $social_link_color;

			$enable_header_social_label = get_theme_mod( 'enable_header_social_links_label' );
			if ( $enable_header_social_label ) {
				$header_social_label_txt = get_theme_mod( 'header_social_links_label_text' );
				if ( ! $header_social_label_txt ) {
					$header_social_label_txt = __( 'Follow Us :', 'blogty' );
				}
			}
			?>
			<div class="blogty-social-nav">
				<?php if ( $enable_header_social_label ) : ?>
					<div class="blogty-social-nav-label">
						<?php echo esc_html( $header_social_label_txt ); ?>
					</div>
				<?php endif; ?>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'social-menu',
						'container_class' => '',
						'fallback_cb'     => false,
						'depth'           => 1,
						'menu_class'      => $menu_class,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
					)
				);
				?>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'blogty_topbar_last_col_items', 'blogty_topbar_social', 10 );

// Topbar WooCommerce Icons.
if ( ! function_exists( 'blogty_topbar_woo_icons' ) ) :
	function blogty_topbar_woo_icons() {

		if ( blogty_is_wc_active() ) :

			if ( get_theme_mod( 'enable_woo_my_account_top_bar' ) ) :
				$my_account_page = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
				if ( is_user_logged_in() ) :
					?>
					<a href="<?php echo esc_url( $my_account_page ); ?>" class="site-header-account" title="<?php esc_attr_e( 'My Account', 'blogty' ); ?>">
					<?php blogty_the_theme_svg( 'login' ); ?>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url( $my_account_page ); ?>" class="site-header-account" title="<?php esc_attr_e( 'Login / Register', 'blogty' ); ?>">
					<?php blogty_the_theme_svg( 'login' ); ?>
					</a>
					<?php
				endif;
			endif;

			if ( get_theme_mod( 'enable_woo_mini_cart_top_bar' ) ) :
				blogty_woocommerce_header_cart();
			endif;

		endif;
	}
endif;
add_action( 'blogty_topbar_last_col_items', 'blogty_topbar_woo_icons', 20 );

// Topbar Search.
if ( ! function_exists( 'blogty_topbar_search' ) ) :
	function blogty_topbar_search() {
		if ( get_theme_mod( 'enable_search_on_top_bar' ) ) :
			?>
			<div class="blogty-search-toggle">
				<button class="blogty-search-canvas-btn blogty-search search-icon toggle-search-block toggle" aria-expanded="false" data-block=".blogty-search-block" data-body-class="showing-search-block" data-focus=".blogty-search-form .search-field">
					<span class="search-label"><?php esc_html_e( 'Search', 'blogty' ); ?></span>
					<?php blogty_the_theme_svg( 'search' ); ?>
					<?php blogty_the_theme_svg( 'cross' ); ?>
				</button>
				<div class="blogty-search-form blogty-canvas-modal">
					<div class="em-search-form-inner">
						<?php
						get_search_form(
							array(
								'aria_label' => __( 'Search for:', 'blogty' ),
							)
						);
						?>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'blogty_topbar_last_col_items', 'blogty_topbar_search', 30 );

// Primary Menu Bar Offcanvas Icon.
if ( ! function_exists( 'blogty_primary_bar_offcanvas' ) ) :
	function blogty_primary_bar_offcanvas() {
		$class = '';
		if ( get_theme_mod( 'offcanvas_hide_desktop', true ) ) {
			$class .= ' hide-on-desktop';
		}
		?>
		<div class="blogty-offcanvas-toggle<?php echo esc_attr( $class ); ?>">
			<button class="blogty-off-canvas-btn toggle toggle-off-canvas toggle-canvas-modal" data-modal=".blogty-canvas-block" data-body-class="showing-offcanvas-modal" data-focus=".blogty-off-canvas-close" aria-expanded="false">
				<span class="off-canvas-bars">
					<span class="bar-one"></span>
					<span class="bar-two"></span>
				</span>
				<span class="toggle-text screen-reader-text">
					<?php esc_html_e( 'Off Canvas', 'blogty' ); ?>
				</span>
			</button>
		</div>
		<?php
	}
endif;
add_action( 'blogty_primary_nav_items', 'blogty_primary_bar_offcanvas', 10 );

// Primary Menu Bar Menu.
if ( ! function_exists( 'blogty_primary_bar_menu' ) ) :
	function blogty_primary_bar_menu() {
		if ( get_theme_mod( 'center_align_primary_nav' ) ) {
			$class = ' center-aligned-menu';
		} else {
			$class = ' left-aligned-menu';
		}
		?>
		<div id="site-navigation" class="main-navigation blogty-primary-nav<?php echo esc_attr( $class ); ?>">
			
			<?php
			if ( has_nav_menu( 'primary-menu' ) ) :
				$menu_wrapper_class = '';

				$capitalize_primary_nav_text = get_theme_mod( 'capitalize_primary_nav_text', true );
				if ( $capitalize_primary_nav_text ) {
					$menu_wrapper_class .= ' em-uppercase-primary-menu';
				}

				$capitalize_sub_nav_text = get_theme_mod( 'capitalize_sub_nav_text' );
				if ( $capitalize_sub_nav_text ) {
					$menu_wrapper_class .= ' em-uppercase-sub-menu';
				}
				?>
				<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Primary', 'menu', 'blogty' ); ?>">
					<ul class="primary-menu reset-list-style<?php echo esc_attr( $menu_wrapper_class ); ?>">
					<?php
					wp_nav_menu(
						array(
							'container'      => '',
							'items_wrap'     => '%3$s',
							'theme_location' => 'primary-menu',
						)
					);
					?>
					</ul>
				</nav><!-- .primary-menu-wrapper -->
			<?php endif; ?>
		</div>
		<?php
	}
endif;
add_action( 'blogty_primary_nav_items', 'blogty_primary_bar_menu', 20 );

// Primary Menu Bar Site Branding.
if ( ! function_exists( 'blogty_primary_bar_branding' ) ) :
	function blogty_primary_bar_branding() {
		?>
		<div class="site-branding">
			<?php
			if ( get_theme_mod( 'enable_different_logo_menu_bar' ) ) {
				$logo_menu_bar = get_theme_mod( 'logo_menu_bar' );
				if ( $logo_menu_bar ) {
					$logo_menu_bar = "<img src='" . esc_url( $logo_menu_bar ) . "' decoding='async'>";
					?>
					<div class="site-logo">
						<?php
						if ( is_front_page() && ! is_paged() ) {
							// If on the home page, don't link the logo to home.
							$html = sprintf(
								'<span class="custom-logo-link">%1$s</span>',
								$logo_menu_bar
							);
						} else {
							$aria_current = is_front_page() && ! is_paged() ? ' aria-current="page"' : '';

							$html = sprintf(
								'<a href="%1$s" class="custom-logo-link" rel="home"%2$s>%3$s</a>',
								esc_url( home_url( '/' ) ),
								$aria_current,
								$logo_menu_bar
							);
						}
						echo $html;
						?>
					</div>
					<?php
				}
			} elseif ( has_custom_logo() ) {
				?>
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div>
					<?php
			} else {
				$blog_info    = get_bloginfo( 'name' );
				$hide_title   = get_theme_mod( 'hide_title' );
				$header_class = $hide_title ? 'screen-reader-text' : 'site-title';
				if ( $blog_info ) {
					?>
						<h1 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
						<?php
				}
			}
			?>
		</div>
		<?php
	}
endif;
add_action( 'blogty_primary_nav_items', 'blogty_primary_bar_branding', 30 );

// Primary Menu Bar Social icons.
if ( ! function_exists( 'blogty_primary_bar_social' ) ) :
	function blogty_primary_bar_social() {
		if ( get_theme_mod( 'show_menu_bar_social_nav' ) ) :

			$menu_class         = ' reset-list-style blogty-social-icons ';
			$social_link_style  = get_theme_mod( 'header_social_links_display_style', 'style_1' );
			$social_link_style .= blogty_get_social_icons_class( $social_link_style );
			$social_link_color  = get_theme_mod( 'header_social_links_color_as', 'theme_color' );
			$menu_class        .= $social_link_style . ' ' . $social_link_color;

			$enable_header_social_label = get_theme_mod( 'enable_header_social_links_label' );
			if ( $enable_header_social_label ) {
				$header_social_label_txt = get_theme_mod( 'header_social_links_label_text' );
				if ( ! $header_social_label_txt ) {
					$header_social_label_txt = __( 'Follow Us :', 'blogty' );
				}
			}
			?>
			<div class="blogty-social-nav">
				<?php if ( $enable_header_social_label ) : ?>
					<div class="blogty-social-nav-label">
						<?php echo esc_html( $header_social_label_txt ); ?>
					</div>
				<?php endif; ?>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'social-menu',
						'container_class' => '',
						'fallback_cb'     => false,
						'depth'           => 1,
						'menu_class'      => $menu_class,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
					)
				);
				?>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'blogty_secondary_nav_items', 'blogty_primary_bar_social', 10 );

// Primary Menu Bar WooCommerce Icons.
if ( ! function_exists( 'blogty_primary_bar_woo_icons' ) ) :
	function blogty_primary_bar_woo_icons() {

		if ( blogty_is_wc_active() ) :

			if ( get_theme_mod( 'enable_woo_my_account_menu_bar', true ) ) :
				$my_account_page = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
				if ( is_user_logged_in() ) :
					?>
					<a href="<?php echo esc_url( $my_account_page ); ?>" class="site-header-account" title="<?php esc_attr_e( 'My Account', 'blogty' ); ?>">
					<?php blogty_the_theme_svg( 'login' ); ?>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url( $my_account_page ); ?>" class="site-header-account" title="<?php esc_attr_e( 'Login / Register', 'blogty' ); ?>">
					<?php blogty_the_theme_svg( 'login' ); ?>
					</a>
					<?php
				endif;
			endif;

			if ( get_theme_mod( 'enable_woo_mini_cart_menu_bar', true ) ) :
				blogty_woocommerce_header_cart();
			endif;

		endif;
	}
endif;
add_action( 'blogty_secondary_nav_items', 'blogty_primary_bar_woo_icons', 20 );

// Primary Menu Bar Search Icon.
if ( ! function_exists( 'blogty_primary_bar_search' ) ) :
	function blogty_primary_bar_search() {
		if ( get_theme_mod( 'enable_search_on_menu_bar', true ) ) :
			?>
			<div class="blogty-search-toggle">
				<button class="blogty-search-canvas-btn blogty-search search-icon toggle-search-block toggle" aria-expanded="false" data-block=".blogty-search-block" data-body-class="showing-search-block" data-focus=".blogty-search-form .search-field">
					<span class="search-label"><?php esc_html_e( 'Search', 'blogty' ); ?></span>
					<?php blogty_the_theme_svg( 'search' ); ?>
					<?php blogty_the_theme_svg( 'cross' ); ?>
				</button>
				<div class="blogty-search-form blogty-canvas-modal">
					<div class="em-search-form-inner">
						<?php
						get_search_form(
							array(
								'aria_label' => __( 'Search for:', 'blogty' ),
							)
						);
						?>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'blogty_secondary_nav_items', 'blogty_primary_bar_search', 30 );
