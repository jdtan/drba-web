<?php
/**
 * Style processor for rio vizual
 *
 * @since   1.0.0
 * @package riovizual
 */

/**
 * Style Processor
 */
class Rio_Viz_Style_Processor {

	/**
	 * Constructor
	 */
	public function __construct() {

		add_action( 'rest_api_init', array( $this, 'register_api_hook' ) );

		add_filter( 'get_block_templates', array( $this, 'default_block_template' ), 10, 3 );

		add_filter( 'render_block', array( $this, 'render_block' ), 10, 2 );

		add_action( 'wp_enqueue_scripts', array( $this, 'output_styles_in_head' ), 99 );

		add_action( 'wp_head', array( $this, 'rv_font_post' ) );

		add_action( 'trashed_post', array( $this, 'rv_trashed_post_action' ) );

		add_action( 'delete_post', array( $this, 'rv_delete_post_action' ), 10, 2 );
	}

	/**
	 * Register rest route
	 *
	 * Route - save_blocks_css
	 */
	public function register_api_hook() {
		// For css file save.
		register_rest_route(
			'rio-vizual/v2',
			'/save_blocks_css/',
			array(
				array(
					'methods'             => 'POST',
					'callback'            => array( $this, 'save_css' ),
					'permission_callback' => function () {
						return current_user_can( 'edit_posts' );
					},
					'args'                => array(),
				),
			)
		);
		// For font list save.
		register_rest_route(
			'rio-vizual/v2',
			'/save_blocks_font/',
			array(
				array(
					'methods'             => 'POST',
					'callback'            => array( $this, 'save_font' ),
					'permission_callback' => function () {
						return current_user_can( 'edit_posts' );
					},
					'args'                => array(),
				),
			)
		);
	}

	/**
	 * Callback function for 'save_blocks_css' rest route
	 * Save rio vizual css to post meta
	 *
	 * @param mixed $request request.
	 */
	public function save_css( $request ) {
		$params               = $request->get_params();
		$post_type            = sanitize_text_field( $params['type'] );
		$rio_vizual_css       = sanitize_text_field( $params['blocks_css'] );
		$has_rio_vizual_block = $params['hasBlock'];
		$post_id              = (int) sanitize_text_field( $params['post_id'] );

		if ( 'post' === $post_type ) {

			// Check block exits or not.
			if ( $has_rio_vizual_block ) {
				update_post_meta( $post_id, '_rio_vizual_css', $rio_vizual_css, '' );
			} else {
				if ( metadata_exists( 'post', $post_id, '_rio_vizual_css' ) ) {
					delete_post_meta( $post_id, '_rio_vizual_css' );
				}
			}
		} else {
			$option_name = '_rio_vizual_css_' . $post_id;

			if ( $has_rio_vizual_block ) {
				if ( ! get_option( $option_name ) ) {
					add_option( $option_name, $rio_vizual_css );
				} else {
					update_option( $option_name, $rio_vizual_css );
				}
			} else {
				if ( get_option( $option_name ) ) {
					delete_option( $option_name );
				}
			}
		}

		return 'success';
	}

	/**
	 * Callback function for 'save_blocks_font' rest route
	 * Save google font list
	 *
	 * @param mixed $request request.
	 */
	public function save_font( $request ) {

		$params          = $request->get_params();
		$post_id         = sanitize_text_field( $params['post_id'] );
		$rio_vizual_font = $params['blocks_font']['font'];
		$block_id        = sanitize_text_field( $params['blocks_font']['block_id'] );
		$font_list       = array();
		$option_name     = '_rio_vizual_font';
		$save_font       = get_option( $option_name );

		if ( ! $save_font ) {
			// If no font found in '_rio_vizual_font'.
			$keys = array_keys( $rio_vizual_font );

			// Loop through all selected font.
			foreach ( $keys as $key ) {
				// add font to font list.
				$font_list[ $key ] = array(
					'weight'  => $rio_vizual_font[ $key ],
					'post_id' => array(
						$post_id => array( $block_id ),
					),
				);
			}

			// Add/update font to option '_rio_vizual_font'.
			if ( isset( $save_font ) ) {
				update_option( $option_name, $font_list );
			} else {
				add_option( $option_name, $font_list );
			}
		} else {

			// If already have some font in '_rio_vizual_font'.
			$font_list = $save_font;

			$save_font_keys = array_keys( $save_font );

			$keys = array_keys( $rio_vizual_font );

			foreach ( $keys as $key ) {
				// check current font family already in save font or not.
				if ( in_array( $key, $save_font_keys, true ) ) {
					$save_font_post_ids = array_keys( $save_font[ $key ]['post_id'] );

					// check post id of selected font family already in save font post id or not.
					if ( in_array( $post_id, $save_font_post_ids, false ) ) {
						$save_font_block_ids = $save_font[ $key ]['post_id'][ $post_id ];

						// if no block id in post id, then add.
						if ( ! in_array( $block_id, $save_font_block_ids, false ) ) {
							array_push( $font_list[ $key ]['post_id'][ $post_id ], $block_id );
						}
					} else {
						// Add new post id to save font family.
						$font_list[ $key ]['post_id'][ $post_id ] = array( $block_id );

					}
				} else {
					// Add selected font to font list.
					$font_list[ $key ] = array(
						'weight'  => $rio_vizual_font[ $key ],
						'post_id' => array(
							$post_id => array( $block_id ),
						),
					);
				}
			}

			// get all font family name from updated save font list.
			$updated_save_font_keys = array_keys( $font_list );

			// Look through all font to check any previous font, post id or block id need to remove from font list.
			foreach ( $updated_save_font_keys as $save_font_key ) {
				// Check current font not in selected font.
				if ( ! in_array( $save_font_key, $keys, false ) ) {
					$save_font_post_ids = array_keys( $font_list[ $save_font_key ]['post_id'] );

					// Get post id may be that need to be remove.
					$deleted_post_id = array_search( $post_id, $save_font_post_ids, false );

					if ( false !== $deleted_post_id ) {
						$save_font_block_ids = $font_list[ $save_font_key ]['post_id'][ $post_id ];

						// Get block id may be that need to be remove.
						$deleted_block_id = array_search( $block_id, $save_font_block_ids, false );

						if ( false !== $deleted_block_id ) {
							// Remove current block id from post id.
							unset( $font_list[ $save_font_key ]['post_id'][ $post_id ][ $deleted_block_id ] );

							// If no block id exits in post id then remove post id.
							if ( count( $font_list[ $save_font_key ]['post_id'][ $post_id ] ) === 0 ) {
								// If only post id have in font than remove font too, otherwise remove only post id.
								if ( count( $save_font_post_ids ) === 1 ) {
									unset( $font_list[ $save_font_key ] );
								} else {
									unset( $font_list[ $save_font_key ]['post_id'][ $deleted_post_id ] );
								}
							}
						}
					}
				}
			}

			update_option( $option_name, $font_list );
		}

		return 'success';
	}

	/**
	 * Add Google Font Api to the head
	 *
	 * @param mixed $post_id post id.
	 */
	public static function rio_vizual_font_api( $post_id ) {
		$option_name   = '_rio_vizual_font';
		$save_font     = get_option( $option_name );
		$font_families = array();
		$font_varient  = array();

		if ( $save_font ) {
			$save_font_keys = array_keys( $save_font );

			// Loop thrugh all save font.
			foreach ( $save_font_keys as $key ) {
				$save_font_post_ids = array_keys( $save_font[ $key ]['post_id'] );

				// Generate font family for google apis call, if post id match with save font post id.
				if ( in_array( $post_id, $save_font_post_ids, false ) ) {

					$default_weight        = array();
					$default_italic_weight = array();
					$italic_weight         = array();

					// Generate font weight.
					foreach ( $save_font[ $key ]['weight'] as $weight ) {
						$index = strpos( $weight, ' Italic' );

						// Check for `italic` in font weight.
						if ( $index ) {
							$new_weight = str_replace( ' Italic', '', $weight );
							array_push( $italic_weight, '1,' . $new_weight );
						} else {
							array_push( $default_italic_weight, '0,' . $weight );
							array_push( $default_weight, $weight );
						}
					}

					// if true, generate font family with `italic` font weight.
					if ( count( $italic_weight ) > 0 ) {
						$font_varient = array_merge( $default_italic_weight, $italic_weight );

						$font_families[] = $key . ':ital,wght@' . implode( ';', $font_varient );
					} else {
						$font_families[] = $key . ':wght@' . implode( ';', $default_weight );
					}
				}
			}

			// If font family found, then enqueue font in head.
			if ( count( $font_families ) > 0 ) {
				$query_args = array(
					'family'  => implode( '&family=', $font_families ),
					'display' => 'swap',
				);

				$google_fonts_url = esc_url_raw( add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' ) );

				if ( ! empty( $google_fonts_url ) ) {
					wp_enqueue_style( 'rv-fonts-' . $post_id . '', $google_fonts_url, array(), null );
				}
			}
		}
	}

	/**
	 * Print Google Font Api for post Call in wp_head()
	 */
	public function rv_font_post() {
		global $post;

		if ( $post ) {
			$post_id = (int) $post->ID;
			self::rio_vizual_font_api( $post_id );
		}
	}

	/**
	 * Print CSS styles in wp_head()
	 */
	public function output_styles_in_head() {
		global $post;

		if ( $post ) {
			$post_id = (int) $post->ID;

			$styles = get_post_meta( $post_id, '_rio_vizual_css', true );

			if ( $styles ) {
				$handle = 'rv-css-' . $post_id;

				wp_register_style( $handle, false );
				wp_enqueue_style( $handle );

				wp_add_inline_style( $handle, $styles );
			}
		}
	}

	/**
	 * Add stylesheets to the head
	 *
	 * @param string $id page template id.
	 */
	public static function add_template_styles( $id ) {
		if ( ! $id ) {
			return;
		}

		if ( ! is_admin() ) {
			$option_name = '_rio_vizual_css_' . $id;
			$styles      = get_option( $option_name );

			if ( $styles ) {
				$handle = 'rv-css-' . $id;

				wp_register_style( $handle, false );
				wp_enqueue_style( $handle );

				wp_add_inline_style( $handle, $styles );
			}
		}
	}

	/**
	 * Check default block template and add styles to head
	 *
	 * @param WP_Block_Template[] $query_result  Array of found block templates.
	 * @param array               $query         Optional. Arguments to retrieve templates.
	 * @param string              $template_type wp_template or wp_template_part.
	 *
	 * @return WP_Block_Template[]
	 */
	public function default_block_template( $query_result, $query, $template_type ) {
		if ( is_admin() ) {
			return $query_result;
		}

		if ( 'wp_template' === $template_type ) {

			if ( isset( $query_result[0]->title ) && isset( $query_result[0]->slug ) ) {
				$theme = get_stylesheet();

				if ( isset( $theme ) && $theme && isset( $query_result[0]->slug ) && $query_result[0]->slug ) {
					$template_id = $theme . '_' . $query_result[0]->slug;

					self::add_template_styles( $template_id );
					self::rio_vizual_font_api( $template_id );
				}
			}
		}
		// filter...
		return $query_result;
	}

	/**
	 * Check template parts and add styles to head
	 *
	 * @param string $block_content The block content about to be appended.
	 * @param array  $block         The full block, including name and attributes.
	 *
	 * @return string
	 */
	public function render_block( $block_content, $block ) {
		if ( is_admin() ) {
			return '';
		}

		if ( isset( $block['blockName'] ) && 'core/template-part' === $block['blockName'] && isset( $block['attrs']['slug'] ) && isset( $block['attrs']['theme'] ) ) {

			if ( isset( $block['attrs']['theme'] ) && $block['attrs']['theme'] && isset( $block['attrs']['slug'] ) && $block['attrs']['slug'] ) {
				$template_id = $block['attrs']['theme'] . '_' . $block['attrs']['slug'];

				self::add_template_styles( $template_id );
				self::rio_vizual_font_api( $template_id );
			}
		}
		return $block_content;
	}

	/**
	 * Delete style when post is deleted
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post    Post object.
	 */
	public static function rv_delete_styles( $post_id, $post ) {
		if ( 'wp_template_part' === $post->post_type || 'wp_template' === $post->post_type ) {
			$option_name = '_rio_vizual_css_' . get_stylesheet() . '_' . $post->post_name;

			if ( get_option( $option_name ) ) {
				delete_option( $option_name );
			}
		} elseif ( 'wp_block' === $post->post_type ) {
			if ( metadata_exists( 'post', $post_id, '_rio_vizual_css' ) ) {
				delete_post_meta( $post_id, '_rio_vizual_css' );
			}
		} else {
			if ( metadata_exists( 'post', $post_id, '_rio_vizual_css' ) ) {
				delete_post_meta( $post_id, '_rio_vizual_css' );
			}
		}
	}

	/**
	 * Function for `trashed_post` action-hook.
	 *
	 * @param int $post_id Post ID.
	 *
	 * @return void
	 */
	public function rv_trashed_post_action( $post_id ) {
		$post = get_post( $post_id );

		self::rv_delete_styles( $post_id, $post );
	}

	/**
	 * Function for `delete_post` action-hook.
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post    Post object.
	 *
	 * @return void
	 */
	public function rv_delete_post_action( $post_id, $post ) {
		self::rv_delete_styles( $post_id, $post );
	}

}
