<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Blogty
 */

if ( ! function_exists( 'blogty_generate_font_family' ) ) :
	/**
	 * Returns css apporpriate font family
	 *
	 * @since 1.0.0
	 *
	 * @return string font-family
	 */
	function blogty_generate_font_family( $font_base ) {
		if ( ! empty( $font_base ) ) {
			$font_base         = str_replace( '"', '', $font_base );
			$font_base_explode = explode( ', ', $font_base );
			$font_name         = isset( $font_base_explode[0] ) ? $font_base_explode[0] : '';
			$font_serif        = isset( $font_base_explode[2] ) ? $font_base_explode[2] : '';
			$space_end         = ', ';
			if ( empty( $font_serif ) ) :
				$space_end = '';
			endif;
			return "'" . $font_name . "'" . $space_end . $font_serif;
		}
	}
endif;

if ( ! function_exists( 'refactor_css' ) ) :
	/**
	 * Refactor CSS.
	 *
	 * @since 1.0.0
	 */
	function refactor_css( $css ) {
		$refactored_css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
		return $refactored_css;
	}
endif;

if ( ! function_exists( 'blogty_get_inline_css' ) ) :
	/**
	 * Outputs theme custom CSS.
	 *
	 * @since 1.0.0
	 */
	function blogty_get_inline_css() {

		$css = '';

		$css .= blogty_get_general_color_css();
		$css .= blogty_get_global_elements_css();
		$css .= blogty_get_general_widgetarea_css();
		$css .= blogty_get_home_sections_css();
		$css .= blogty_get_header_css();
		$css .= blogty_get_footer_css();
		$css .= blogty_get_typography_css();

		return refactor_css( apply_filters( 'blogty_global_inline_css', $css ) );
	}
endif;

if ( ! function_exists( 'blogty_get_general_color_css' ) ) :
	function blogty_get_general_color_css() {

		$defaults = array(
			'primary_color'    => '#666666',
			'accent_color'     => '#b49169',
			'link_color'       => '#b49169',
			'link_color_hover' => '#000000',
			'h1_color'         => '#191a1f',
			'h2_color'         => '#191a1f',
			'h3_color'         => '#191a1f',
			'h4_color'         => '#191a1f',
			'h5_color'         => '#191a1f',
			'h6_color'         => '#191a1f',
		);

		$primary_color    = get_theme_mod( 'primary_color', $defaults['primary_color'] );
		$accent_color     = get_theme_mod( 'accent_color', $defaults['accent_color'] );
		$link_color       = get_theme_mod( 'link_color', $defaults['link_color'] );
		$link_color_hover = get_theme_mod( 'link_color_hover', $defaults['link_color_hover'] );
		$h1_color         = get_theme_mod( 'h1_color', $defaults['h1_color'] );
		$h2_color         = get_theme_mod( 'h2_color', $defaults['h2_color'] );
		$h3_color         = get_theme_mod( 'h3_color', $defaults['h3_color'] );
		$h4_color         = get_theme_mod( 'h4_color', $defaults['h4_color'] );
		$h5_color         = get_theme_mod( 'h5_color', $defaults['h5_color'] );
		$h6_color         = get_theme_mod( 'h6_color', $defaults['h6_color'] );

		$css = '';

		if ( $primary_color !== $defaults['primary_color'] ) :
			$css .= '
			:root {
                --global--color-primary:' . esc_attr( $primary_color ) . ';
            }';
		endif;
		if ( $accent_color !== $defaults['accent_color'] ) :
			$css .= '
			:root {
                --global--color-accent:' . esc_attr( $accent_color ) . ';
            }';
		endif;
		if ( $link_color !== $defaults['link_color'] ) :
			$css .= '
			:root {
                --global--link-color:' . esc_attr( $link_color ) . ';
            }';
		endif;
		if ( $link_color_hover !== $defaults['link_color_hover'] ) :
			$css .= '
			:root {
                --global--link-color-hover:' . esc_attr( $link_color_hover ) . ';
            }';
		endif;
		if ( $h1_color !== $defaults['h1_color'] ) :
			$css .= '
			:root {
                --global--color-h1:' . esc_attr( $h1_color ) . ';
            }';
			$css .= '
			h1 a {
                color:' . esc_attr( $h1_color ) . ';
            }';
		endif;
		if ( $h2_color !== $defaults['h2_color'] ) :
			$css .= '
			:root {
                --global--color-h2:' . esc_attr( $h2_color ) . ';
            }';
			$css .= '
			h2 a {
                color:' . esc_attr( $h2_color ) . ';
            }';
		endif;
		if ( $h3_color !== $defaults['h3_color'] ) :
			$css .= '
			:root {
                --global--color-h3:' . esc_attr( $h3_color ) . ';
            }';
			$css .= '
			h3 a {
                color:' . esc_attr( $h3_color ) . ';
            }';
		endif;
		if ( $h4_color !== $defaults['h4_color'] ) :
			$css .= '
			:root {
                --global--color-h4:' . esc_attr( $h4_color ) . ';
            }';
			$css .= '
			h4 a {
                color:' . esc_attr( $h4_color ) . ';
            }';
		endif;
		if ( $h5_color !== $defaults['h5_color'] ) :
			$css .= '
			:root {
                --global--color-h5:' . esc_attr( $h5_color ) . ';
            }';
			$css .= '
			h5 a {
                color:' . esc_attr( $h5_color ) . ';
            }';
		endif;
		if ( $h6_color !== $defaults['h6_color'] ) :
			$css .= '
			:root {
                --global--color-h6:' . esc_attr( $h6_color ) . ';
            }';
			$css .= '
			h6 a {
                color:' . esc_attr( $h6_color ) . ';
            }';
		endif;

		return apply_filters( 'blogty_general_color_css', $css );
	}
endif;

if ( ! function_exists( 'blogty_get_global_elements_css' ) ) :
	function blogty_get_global_elements_css() {

		$defaults = array(
			'global_buttons_text_color'       => '#000000',
			'global_buttons_text_hover_color' => '#ffffff',
			'global_buttons_bg_color'         => '#ffffff',
			'global_buttons_bg_hover_color'   => '#000000',
			'preloader_bg_color'              => '#ffffff',
			'preloader_color'                 => '#b49169',
			'progressbar_color'               => '#b49169',
			'breadcrumb_link_color'           => '#b49169',
			'global_post_meta_icons_color'    => '#a0a0a0',
			'global_card_element_bg_color'    => '#ffffff',
			'global_card_element_inverted_bg_color' => '#1e1e1e',
		);

		$global_buttons_text_color       = get_theme_mod( 'global_buttons_text_color', $defaults['global_buttons_text_color'] );
		$global_buttons_text_hover_color = get_theme_mod( 'global_buttons_text_hover_color', $defaults['global_buttons_text_hover_color'] );
		$global_buttons_bg_color         = get_theme_mod( 'global_buttons_bg_color', $defaults['global_buttons_bg_color'] );
		$global_buttons_bg_hover_color   = get_theme_mod( 'global_buttons_bg_hover_color', $defaults['global_buttons_bg_hover_color'] );
		$global_post_meta_icons_color    = get_theme_mod( 'global_post_meta_icons_color', $defaults['global_post_meta_icons_color'] );
		$global_card_element_bg_color    = get_theme_mod( 'global_card_element_bg_color', $defaults['global_card_element_bg_color'] );
		$card_element_inverted_bg_color  = get_theme_mod( 'global_card_element_inverted_bg_color', $defaults['global_card_element_inverted_bg_color'] );

		$css = '';

		if ( $global_buttons_text_color !== $defaults['global_buttons_text_color'] ) :
			$css .= '
			:root {
				--global--color-btn:' . esc_attr( $global_buttons_text_color ) . ';
			}';
		endif;
		if ( $global_buttons_text_hover_color !== $defaults['global_buttons_text_hover_color'] ) :
			$css .= '
			:root {
				--global--color-btn-hover:' . esc_attr( $global_buttons_text_hover_color ) . ';
			}';
		endif;
		if ( $global_buttons_bg_color !== $defaults['global_buttons_bg_color'] ) :
			$css .= '
			:root {
				--global--color-btn-bg:' . esc_attr( $global_buttons_bg_color ) . ';
			}';
		endif;
		if ( $global_buttons_bg_hover_color !== $defaults['global_buttons_bg_hover_color'] ) :
			$css .= '
			:root {
				--global--color-btn-hover-bg:' . esc_attr( $global_buttons_bg_hover_color ) . ';
			}';
		endif;

		if ( get_theme_mod( 'show_preloader' ) ) :

			$preloader_bg_color = get_theme_mod( 'preloader_bg_color', $defaults['preloader_bg_color'] );
			$preloader_color    = get_theme_mod( 'preloader_color', $defaults['preloader_color'] );

			if ( $preloader_bg_color !== $defaults['preloader_bg_color'] ) :
				$css .= '
				:root {
					--global--color-preloader-bg:' . esc_attr( $preloader_bg_color ) . ';
				}';
			endif;
			if ( $preloader_color !== $defaults['preloader_color'] ) :
				$css .= '
				:root {
					--global--color-preloader:' . esc_attr( $preloader_color ) . ';
				}';
			endif;
		endif;

		if ( get_theme_mod( 'show_progressbar' ) ) :
			$progressbar_color = get_theme_mod( 'progressbar_color', $defaults['progressbar_color'] );
			if ( $progressbar_color !== $defaults['progressbar_color'] ) :
				$css .= '
				:root {
					--global--color-progressbar:' . esc_attr( $progressbar_color ) . ';
				}';
			endif;
		endif;

		if ( get_theme_mod( 'enable_breadcrumb', true ) ) :
			$breadcrumb_link_color = get_theme_mod( 'breadcrumb_link_color', $defaults['breadcrumb_link_color'] );
			if ( $breadcrumb_link_color !== $defaults['breadcrumb_link_color'] ) :
				$css .= '
				:root {
					--global--color-breadcrumb:' . esc_attr( $breadcrumb_link_color ) . ';
				}';
			endif;
		endif;

		if ( $global_post_meta_icons_color !== $defaults['global_post_meta_icons_color'] ) :
			$css .= '
			:root {
				--global--color-post-meta-icons:' . esc_attr( $global_post_meta_icons_color ) . ';
			}';
		endif;

		if ( $global_card_element_bg_color !== $defaults['global_card_element_bg_color'] ) :
			$css .= '
			:root {
				--global--card-bg:' . esc_attr( $global_card_element_bg_color ) . ';
			}';
		endif;

		if ( $card_element_inverted_bg_color !== $defaults['global_card_element_inverted_bg_color'] ) :
			$css .= '
			.saga-block-inverted-color.is-active-card-layout {
				--global--card-bg:' . esc_attr( $card_element_inverted_bg_color ) . ';
			}';
		endif;

		return apply_filters( 'blogty_global_elements_css', $css );
	}
endif;

if ( ! function_exists( 'blogty_get_general_widgetarea_css' ) ) :
	function blogty_get_general_widgetarea_css() {

		$defaults = array(
			'offcanvas_bg_color'                      => '#ffffff',
			'dark_offcanvas_bg_color'                 => '#10100f',
			'below_header_widgetarea_bg_color'        => '#ffffff',
			'before_home_columns_widgetarea_bg_color' => '#ffffff',
			'home_columns_widgetarea_bg_color'        => '#ffffff',
			'above_home_widgetarea_bg_color'          => '#ffffff',
			'below_home_widgetarea_bg_color'          => '#ffffff',
			'above_footer_widgetarea_bg_color'        => '#ffffff',
			'below_footer_widgetarea_bg_color'        => '#ffffff',
		);

		$offcanvas_bg_color           = get_theme_mod( 'offcanvas_bg_color', $defaults['offcanvas_bg_color'] );
		$dark_offcanvas_bg_color      = get_theme_mod( 'dark_offcanvas_bg_color', $defaults['dark_offcanvas_bg_color'] );
		$below_header_area_bg         = get_theme_mod( 'below_header_widgetarea_bg_color', $defaults['below_header_widgetarea_bg_color'] );
		$home_before_columns_bg_color = get_theme_mod( 'before_home_columns_widgetarea_bg_color', $defaults['before_home_columns_widgetarea_bg_color'] );
		$home_columns_bg_color        = get_theme_mod( 'home_columns_widgetarea_bg_color', $defaults['home_columns_widgetarea_bg_color'] );
		$above_home_area_bg           = get_theme_mod( 'above_home_widgetarea_bg_color', $defaults['above_home_widgetarea_bg_color'] );
		$below_home_area_bg           = get_theme_mod( 'below_home_widgetarea_bg_color', $defaults['below_home_widgetarea_bg_color'] );
		$above_footer_area_bg         = get_theme_mod( 'above_footer_widgetarea_bg_color', $defaults['above_footer_widgetarea_bg_color'] );
		$below_footer_area_bg         = get_theme_mod( 'below_footer_widgetarea_bg_color', $defaults['below_footer_widgetarea_bg_color'] );

		$css = '';

		if ( $offcanvas_bg_color !== $defaults['offcanvas_bg_color'] ) :
			$css .= '
			.blogty-canvas-block {
                background-color:' . esc_attr( $offcanvas_bg_color ) . ';
            }';
		endif;
		if ( $dark_offcanvas_bg_color !== $defaults['dark_offcanvas_bg_color'] ) :
			$css .= '
			.blogty-canvas-block.inverted-offcanvas {
                background-color:' . esc_attr( $dark_offcanvas_bg_color ) . ';
            }';
		endif;

		if ( $below_header_area_bg !== $defaults['below_header_widgetarea_bg_color'] ) :
			$css .= '
			:root {
                --global--widetarea-below-header-bg:' . esc_attr( $below_header_area_bg ) . ';
            }';
		endif;
		if ( $home_before_columns_bg_color !== $defaults['before_home_columns_widgetarea_bg_color'] ) :
			$css .= '
			:root {
                --global--widetarea-before-home-columns-bg:' . esc_attr( $home_before_columns_bg_color ) . ';
            }';
		endif;
		if ( $home_columns_bg_color !== $defaults['home_columns_widgetarea_bg_color'] ) :
			$css .= '
			:root {
                --global--widetarea-home-columns-bg:' . esc_attr( $home_columns_bg_color ) . ';
            }';
		endif;
		if ( $above_home_area_bg !== $defaults['above_home_widgetarea_bg_color'] ) :
			$css .= '
			:root {
                --global--widetarea-before-home-bg:' . esc_attr( $above_home_area_bg ) . ';
            }';
		endif;
		if ( $below_home_area_bg !== $defaults['below_home_widgetarea_bg_color'] ) :
			$css .= '
			:root {
                --global--widetarea-after-home-bg:' . esc_attr( $below_home_area_bg ) . ';
            }';
		endif;
		if ( $above_footer_area_bg !== $defaults['above_footer_widgetarea_bg_color'] ) :
			$css .= '
			:root {
                --global--widetarea-before-footer-bg:' . esc_attr( $above_footer_area_bg ) . ';
            }';
		endif;
		if ( $below_footer_area_bg !== $defaults['below_footer_widgetarea_bg_color'] ) :
			$css .= '
			:root {
                --global--widetarea-after-footer-bg:' . esc_attr( $below_footer_area_bg ) . ';
            }';
		endif;

		return apply_filters( 'blogty_general_widgetarea_css', $css );
	}
endif;

if ( ! function_exists( 'blogty_get_home_sections_css' ) ) :
	function blogty_get_home_sections_css() {

		$defaults = array(
			'trending_section_bg_color' => '#ffffff',
			'banner_arrows_bg_color'    => '#ffffff',
			'banner_section_bg_color'   => '#ffffff',
		);

		$css = '';

		if ( get_theme_mod( 'enable_trending_posts' ) ) :
			$trending_section_bg_color = get_theme_mod( 'trending_section_bg_color', $defaults['trending_section_bg_color'] );
			if ( $trending_section_bg_color !== $defaults['trending_section_bg_color'] ) :
				$css .= '
				:root {
					--global--trending-section-bg:' . esc_attr( $trending_section_bg_color ) . ';
				}';
			endif;
		endif;

		if ( get_theme_mod( 'enable_banner' ) ) :
			$banner_section_bg_color = get_theme_mod( 'banner_section_bg_color', $defaults['banner_section_bg_color'] );
			if ( $banner_section_bg_color !== $defaults['banner_section_bg_color'] ) :
				$css .= '
				:root {
					--global--banner-section-bg:' . esc_attr( $banner_section_bg_color ) . ';
				}';
			endif;

			if ( get_theme_mod( 'enable_banner_arrows', true ) ) :
				$banner_arrows_bg_color = get_theme_mod( 'banner_arrows_bg_color', $defaults['banner_arrows_bg_color'] );
				if ( $banner_arrows_bg_color !== $defaults['banner_arrows_bg_color'] ) :
					$banner_arrows_bg_color = blogty_hex2rbga( $banner_arrows_bg_color, 0.8 );

					$css .= '
					.blogty-banner-wrapper { 
						--swiper-pagination-bg-color:' . esc_attr( $banner_arrows_bg_color ) . ';
					}';
				endif;
			endif;
		endif;

		return apply_filters( 'blogty_home_sections_css', $css );
	}
endif;

if ( ! function_exists( 'blogty_get_header_css' ) ) :
	function blogty_get_header_css() {

		$defaults = array(
			'header_social_links_icons_color'       => '#ffffff',
			'header_social_links_icons_hover_color' => '#b49169',
			'header_search_btn_bg_color'            => '#b49169',
			'header_social_links_label_color'       => '#ffffff',

			'top_bar_bg_color'                      => '#000000',
			'top_bar_date_color'                    => '#ffffff',
			'top_bar_nav_menu_color'                => '#ffffff',
			'top_bar_nav_menu_hover_color'          => '#b49169',
			'top_bar_sub_menu_color'                => '#000000',
			'top_bar_sub_menu_hover_color'          => '#000000',
			'top_bar_sub_menu_bg_color'             => '#ffffff',

			'header_bg_color'                       => '#ffffff',

			'primary_menu_bg_color'                 => '#ffffff',
			'offcanvas_icon_color'                  => '#000000',
			'primary_menu_text_color'               => '#000000',
			'primary_menu_text_hover_color'         => '#000000',
			'primary_menu_text_hover_border'        => '#b49169',
			'primary_menu_active_item_color'        => '#000000',
			'primary_menu_active_item_border'       => '#b49169',
			'primary_menu_desc_color'               => '#b49169',
			'sub_menu_bg_color'                     => '#ffffff',
			'sub_menu_text_color'                   => '#000000',
			'sub_menu_text_hover_color'             => '#b49169',
			'sub_menu_desc_color'                   => '#999999',
		);

		$header_social_icons             = get_theme_mod( 'header_social_links_icons_color', $defaults['header_social_links_icons_color'] );
		$header_social_icons_hover       = get_theme_mod( 'header_social_links_icons_hover_color', $defaults['header_social_links_icons_hover_color'] );
		$header_social_links_label_color = get_theme_mod( 'header_social_links_label_color', $defaults['header_social_links_label_color'] );
		$header_search_btn_bg_color      = get_theme_mod( 'header_search_btn_bg_color', $defaults['header_search_btn_bg_color'] );

		$header_bg_color = get_theme_mod( 'header_bg_color', $defaults['header_bg_color'] );
		$header_padding_top = get_theme_mod( 'header_padding_desktop_top' );
		$header_padding_bottom = get_theme_mod( 'header_padding_desktop_bottom' );

		$primary_menu_bg_color           = get_theme_mod( 'primary_menu_bg_color', $defaults['primary_menu_bg_color'] );
		$offcanvas_icon_color            = get_theme_mod( 'offcanvas_icon_color', $defaults['offcanvas_icon_color'] );
		$primary_menu_text_color         = get_theme_mod( 'primary_menu_text_color', $defaults['primary_menu_text_color'] );
		$primary_menu_text_hover_color   = get_theme_mod( 'primary_menu_text_hover_color', $defaults['primary_menu_text_hover_color'] );
		$primary_menu_text_hover_border  = get_theme_mod( 'primary_menu_text_hover_border', $defaults['primary_menu_text_hover_border'] );
		$primary_menu_active_item_color  = get_theme_mod( 'primary_menu_active_item_color', $defaults['primary_menu_active_item_color'] );
		$primary_menu_active_item_border = get_theme_mod( 'primary_menu_active_item_border', $defaults['primary_menu_active_item_border'] );
		$primary_menu_desc_color         = get_theme_mod( 'primary_menu_desc_color', $defaults['primary_menu_desc_color'] );
		$sub_menu_bg_color               = get_theme_mod( 'sub_menu_bg_color', $defaults['sub_menu_bg_color'] );
		$sub_menu_text_color             = get_theme_mod( 'sub_menu_text_color', $defaults['sub_menu_text_color'] );
		$sub_menu_text_hover_color       = get_theme_mod( 'sub_menu_text_hover_color', $defaults['sub_menu_text_hover_color'] );
		$sub_menu_desc_color             = get_theme_mod( 'sub_menu_desc_color', $defaults['sub_menu_desc_color'] );

		$css = '';

		if ( $header_social_icons !== $defaults['header_social_links_icons_color'] ) :
			$css .= '
			:root {
                --global--color-header-social-nav:' . esc_attr( $header_social_icons ) . ';
            }';
		endif;
		if ( $header_social_icons_hover !== $defaults['header_social_links_icons_hover_color'] ) :
			$css .= '
			:root {
				--global--color-header-social-nav-hover:' . esc_attr( $header_social_icons_hover ) . ';
			}';
		endif;
		if ( $header_social_links_label_color !== $defaults['header_social_links_label_color'] ) :
			$css .= '
			:root {
				--global--color-header-social-label:' . esc_attr( $header_social_links_label_color ) . ';
			}';
		endif;
		if ( $header_search_btn_bg_color !== $defaults['header_search_btn_bg_color'] ) :
			$css .= '
			:root {
				--global--color-header-search-btn-bg:' . esc_attr( $header_search_btn_bg_color ) . ';
			}';
		endif;

		if ( get_theme_mod( 'enable_top_bar', true ) ) :

			$top_bar_bg_color = get_theme_mod( 'top_bar_bg_color', $defaults['top_bar_bg_color'] );

			if ( $top_bar_bg_color !== $defaults['top_bar_bg_color'] ) :
				$css .= '
				:root {
					--global--color-topbar-bg:' . esc_attr( $top_bar_bg_color ) . ';
				}';
			endif;
			if ( get_theme_mod( 'enable_todays_date', true ) ) :
				$top_bar_date_color = get_theme_mod( 'top_bar_date_color', $defaults['top_bar_date_color'] );
				if ( $top_bar_date_color !== $defaults['top_bar_date_color'] ) :
					$css .= '
					:root {
						--global--color-topbar-date:' . esc_attr( $top_bar_date_color ) . ';
					}';
				endif;
			endif;
			if ( get_theme_mod( 'enable_top_nav' ) ) :
				$top_bar_nav_menu_color       = get_theme_mod( 'top_bar_nav_menu_color', $defaults['top_bar_nav_menu_color'] );
				$top_bar_nav_menu_hover_color = get_theme_mod( 'top_bar_nav_menu_hover_color', $defaults['top_bar_nav_menu_hover_color'] );
				$top_bar_sub_menu_bg_color    = get_theme_mod( 'top_bar_sub_menu_bg_color', $defaults['top_bar_sub_menu_bg_color'] );
				if ( $top_bar_nav_menu_color !== $defaults['top_bar_nav_menu_color'] ) :
					$css .= '
					:root {
						--global--color-topbar-menu:' . esc_attr( $top_bar_nav_menu_color ) . ';
					}';
				endif;
				if ( $top_bar_nav_menu_hover_color !== $defaults['top_bar_nav_menu_hover_color'] ) :
					$css .= '
					:root {
						--global--color-topbar-menu-hover:' . esc_attr( $top_bar_nav_menu_hover_color ) . ';
					}';
				endif;
				if ( $top_bar_sub_menu_bg_color !== $defaults['top_bar_sub_menu_bg_color'] ) :
					$css .= '
					:root {
						--global--color-topbar-submenu-bg:' . esc_attr( $top_bar_sub_menu_bg_color ) . ';
					}';
				endif;
			endif;
		endif;

		if ( $header_bg_color !== $defaults['header_bg_color'] ) :
			$css .= '
			:root {
                --global--color-header-bg:' . esc_attr( $header_bg_color ) . ';
            }';
		endif;

		if ( is_numeric ( $header_padding_top ) ) :
			$css .= '
			.blogty-site-header, .blogty-site-header.has-header-image {
                padding-top:' . esc_attr( absint ( $header_padding_top ) ) . 'px;
            }';
		endif;

		if ( is_numeric ( $header_padding_bottom ) ) :
			$css .= '
			.blogty-site-header, .blogty-site-header.has-header-image {
                padding-bottom:' . esc_attr( absint ( $header_padding_bottom ) ) . 'px;
            }';
		endif;

		if ( $primary_menu_bg_color !== $defaults['primary_menu_bg_color'] ) :
			$css .= '
			:root {
                --global--color-primary-menu-bg:' . esc_attr( $primary_menu_bg_color ) . ';
            }';
		endif;
		if ( $offcanvas_icon_color !== $defaults['offcanvas_icon_color'] ) :
			$css .= '
			:root {
                --global--color-offcanvas-icon:' . esc_attr( $offcanvas_icon_color ) . ';
            }';
		endif;
		if ( $primary_menu_text_color !== $defaults['primary_menu_text_color'] ) :
			$css .= '
			:root {
                --global--color-primary-menu:' . esc_attr( $primary_menu_text_color ) . ';
            }';
		endif;
		if ( $primary_menu_text_hover_color !== $defaults['primary_menu_text_hover_color'] ) :
			$css .= '
			:root {
                --global--color-primary-menu-hover:' . esc_attr( $primary_menu_text_hover_color ) . ';
            }';
		endif;
		if ( $primary_menu_text_hover_border !== $defaults['primary_menu_text_hover_border'] ) :
			$css .= '
			:root {
                --global--color-primary-menu-hover-border:' . esc_attr( $primary_menu_text_hover_border ) . ';
            }';
		endif;
		if ( $primary_menu_active_item_color !== $defaults['primary_menu_active_item_color'] ) :
			$css .= '
			:root {
                --global--color-primary-menu-active:' . esc_attr( $primary_menu_active_item_color ) . ';
            }';
		endif;
		if ( $primary_menu_active_item_border !== $defaults['primary_menu_active_item_border'] ) :
			$css .= '
			:root {
                --global--color-primary-menu-active-border:' . esc_attr( $primary_menu_active_item_border ) . ';
            }';
		endif;
		if ( $primary_menu_desc_color !== $defaults['primary_menu_desc_color'] ) :
			$css .= '
			:root {
                --global--color-primary-menu-desc:' . esc_attr( $primary_menu_desc_color ) . ';
            }';
		endif;
		if ( $sub_menu_bg_color !== $defaults['sub_menu_bg_color'] ) :
			$css .= '
			:root {
                --global--color-sub-menu-bg:' . esc_attr( $sub_menu_bg_color ) . ';
            }';
		endif;
		if ( $sub_menu_text_color !== $defaults['sub_menu_text_color'] ) :
			$css .= '
			:root {
                --global--color-sub-menu:' . esc_attr( $sub_menu_text_color ) . ';
            }';
		endif;
		if ( $sub_menu_text_hover_color !== $defaults['sub_menu_text_hover_color'] ) :
			$css .= '
			:root {
                --global--color-sub-menu-hover:' . esc_attr( $sub_menu_text_hover_color ) . ';
            }';
		endif;
		if ( $sub_menu_desc_color !== $defaults['sub_menu_desc_color'] ) :
			$css .= '
			:root {
                --global--color-sub-menu-desc:' . esc_attr( $sub_menu_desc_color ) . ';
            }';
		endif;

		return apply_filters( 'blogty_header_css', $css );
	}
endif;

if ( ! function_exists( 'blogty_get_footer_css' ) ) :
	function blogty_get_footer_css() {

		$defaults = array(
			'footer_theme'                 => 'light',
			'footer_bg_color'              => '#ffffff',
			'dark_footer_bg_color'         => '#000000',

			'sub_footer_theme'             => 'light',
			'sub_footer_bg_color'          => '#ffffff',
			'dark_sub_footer_bg_color'     => '#000000',

			'scroll_to_top_color'          => '#ffffff',
			'scroll_to_top_hover_color'    => '#ffffff',
			'scroll_to_top_bg_color'       => '#b49169',
			'scroll_to_top_hover_bg_color' => '#b49169',
		);

		$footer_theme     = get_theme_mod( 'footer_theme', $defaults['footer_theme'] );
		$sub_footer_theme = get_theme_mod( 'sub_footer_theme', $defaults['sub_footer_theme'] );

		$css = '';

		if ( 'light' == $footer_theme ) :
			$footer_bg_color = get_theme_mod( 'footer_bg_color', $defaults['footer_bg_color'] );
			if ( $footer_bg_color !== $defaults['footer_bg_color'] ) :
				$css .= '
				:root {
					--global--color-footer-bg:' . esc_attr( $footer_bg_color ) . ';
				}';
			endif;
		endif;
		if ( 'dark' == $footer_theme ) :
			$dark_footer_bg_color = get_theme_mod( 'dark_footer_bg_color', $defaults['dark_footer_bg_color'] );
			if ( $dark_footer_bg_color !== $defaults['dark_footer_bg_color'] ) :
				$css .= '
				.site-footer.inverted-footer {
					--global--color-footer-bg:' . esc_attr( $dark_footer_bg_color ) . ';
				}';
			endif;
		endif;

		if ( 'light' == $sub_footer_theme ) :
			$sub_footer_bg_color = get_theme_mod( 'sub_footer_bg_color', $defaults['sub_footer_bg_color'] );
			if ( $sub_footer_bg_color !== $defaults['sub_footer_bg_color'] ) :
				$css .= '
				:root {
					--global--color-sub-footer-bg:' . esc_attr( $sub_footer_bg_color ) . ';
				}';
			endif;
		endif;
		if ( 'dark' == $sub_footer_theme ) :
			$dark_sub_footer_bg_color = get_theme_mod( 'dark_sub_footer_bg_color', $defaults['dark_sub_footer_bg_color'] );
			if ( $dark_sub_footer_bg_color !== $defaults['dark_sub_footer_bg_color'] ) :
				$css .= '
				.site-sub-footer.inverted-sub-footer {
					--global--color-sub-footer-bg:' . esc_attr( $dark_sub_footer_bg_color ) . ';
				}';
			endif;
		endif;

		if ( get_theme_mod( 'enable_scroll_to_top', true ) ) :

			$scroll_to_top_color          = get_theme_mod( 'scroll_to_top_color', $defaults['scroll_to_top_color'] );
			$scroll_to_top_hover_color    = get_theme_mod( 'scroll_to_top_hover_color', $defaults['scroll_to_top_hover_color'] );
			$scroll_to_top_bg_color       = get_theme_mod( 'scroll_to_top_bg_color', $defaults['scroll_to_top_bg_color'] );
			$scroll_to_top_hover_bg_color = get_theme_mod( 'scroll_to_top_hover_bg_color', $defaults['scroll_to_top_hover_bg_color'] );

			if ( $scroll_to_top_color !== $defaults['scroll_to_top_color'] ) :
				$css .= '
				:root {
					--global--color-scroll-top:' . esc_attr( $scroll_to_top_color ) . ';
				}';
			endif;
			if ( $scroll_to_top_hover_color !== $defaults['scroll_to_top_hover_color'] ) :
				$css .= '
				:root {
					--global--color-scroll-top-hover:' . esc_attr( $scroll_to_top_hover_color ) . ';
				}';
			endif;
			if ( $scroll_to_top_bg_color !== $defaults['scroll_to_top_bg_color'] ) :
				$css .= '
				:root {
					--global--color-scroll-top-bg:' . esc_attr( $scroll_to_top_bg_color ) . ';
				}';
			endif;
			if ( $scroll_to_top_hover_bg_color !== $defaults['scroll_to_top_hover_bg_color'] ) :
				$css .= '
				:root {
					--global--color-scroll-top-hover-bg:' . esc_attr( $scroll_to_top_hover_bg_color ) . ';
				}';
			endif;
		endif;

		return apply_filters( 'blogty_footer_css', $css );
	}
endif;

if ( ! function_exists( 'blogty_get_typography_css' ) ) :
	function blogty_get_typography_css() {

		$defaults = array(
			'site_title_font_size_desktop'   => 42,
			'site_tagline_font_size_desktop' => 16,
			'primary_menu_font'              => '"Open Sans", "300:300italic:regular:italic:600:600italic:700:700italic:800:800italic", sans-serif',
			'primary_menu_font_weight'       => 600,
			'primary_font'                   => '"Lora", "regular:italic:700:700italic", serif',
			'primary_font_weight'            => 700,
			'secondary_font'                 => '"Lato", "100:100italic:300:300italic:regular:italic:700:700italic:900:900italic", sans-serif',
			'secondary_font_weight'          => 'normal',
		);

		$site_title_font_size   = get_theme_mod( 'site_title_font_size_desktop', $defaults['site_title_font_size_desktop'] );
		$site_tagline_font_size = get_theme_mod( 'site_tagline_font_size_desktop', $defaults['site_tagline_font_size_desktop'] );

		$primary_menu_font        = get_theme_mod( 'primary_menu_font', $defaults['primary_menu_font'] );
		$primary_menu_font_weight = get_theme_mod( 'primary_menu_font_weight', $defaults['primary_menu_font_weight'] );
		$primary_font             = get_theme_mod( 'primary_font', $defaults['primary_font'] );
		$primary_font_weight      = get_theme_mod( 'primary_font_weight', $defaults['primary_font_weight'] );
		$secondary_font           = get_theme_mod( 'secondary_font', $defaults['secondary_font'] );
		$secondary_font_weight    = get_theme_mod( 'secondary_font_weight', $defaults['secondary_font_weight'] );

		$css = '';

		if ( $site_title_font_size != $defaults['site_title_font_size_desktop'] ) :
			$css .= '
            @media (min-width: 1000px){
                .site-title {
                    font-size:' . esc_attr( $site_title_font_size ) . 'px;
                }
            }';
		endif;
		if ( $site_tagline_font_size != $defaults['site_tagline_font_size_desktop'] ) :
			$css .= '
             @media (min-width: 1000px){
                .site-description {
                    font-size:' . esc_attr( $site_tagline_font_size ) . 'px;
                }
            }';
		endif;

		if ( $primary_menu_font != $defaults['primary_menu_font'] ) :
			$css .= '
            :root {
                --font-primary-menu:' . sanitize_text_field( blogty_generate_font_family( $primary_menu_font ) ) . ';
            }';
		endif;
		if ( $primary_menu_font_weight != $defaults['primary_menu_font_weight'] ) :
			$css .= '
            :root {
                --primary--menu-font-weight:' . esc_attr( $primary_menu_font_weight ) . ';
            }';
		endif;

		if ( $primary_font != $defaults['primary_font'] ) :
			$css .= '
            :root {
                --font-headings:' . sanitize_text_field( blogty_generate_font_family( $primary_font ) ) . ';
            }';
		endif;
		if ( $primary_font_weight != $defaults['primary_font_weight'] ) :
			$css .= '
            :root {
                --heading--font-weight:' . esc_attr( $primary_font_weight ) . ';
            }';
		endif;

		if ( $secondary_font != $defaults['secondary_font'] ) :
			$css .= '
            :root {
                --font-base:' . sanitize_text_field( blogty_generate_font_family( $secondary_font ) ) . ';
            }';
		endif;
		if ( $secondary_font_weight != $defaults['secondary_font_weight'] ) :
			$css .= '
            body {
                font-weight:' . esc_attr( $secondary_font_weight ) . ';
            }';
		endif;

		return apply_filters( 'blogty_typography_css', $css );
	}
endif;

if ( ! function_exists( 'blogty_get_woo_inline_css' ) ) :
	/**
	 * Outputs woocommerce custom CSS.
	 *
	 * @since 1.0.0
	 */
	function blogty_get_woo_inline_css() {

		$defaults = array(
			'accent_color' => '#b49169',
		);

		$accent_color = get_theme_mod( 'accent_color', $defaults['accent_color'] );

		$css = '';

		if ( $accent_color !== $defaults['accent_color'] ) :
			$css .= '
			:root {
				--global--color-woo-accent:' . esc_attr( $accent_color ) . ';
			}';
		endif;

		return refactor_css( $css );
	}

endif;
