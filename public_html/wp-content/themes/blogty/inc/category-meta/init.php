<?php
/**
 * Add fields to post category.
 *
 * @package WordPress
 * @subpackage Blogty
 * @since Blogty 1.0
 */

if ( ! function_exists( 'blogty_add_category_fields' ) ) :
	function blogty_add_category_fields() {
		?>
		<div class="form-field term-thumbnail-wrap">
			<label><?php esc_html_e( 'Thumbnail', 'blogty' ); ?></label>
			<div id="post_cat_thumbnail" style="float: left; margin-right: 10px;">
				<img src="<?php echo esc_url( blogty_placeholder_img_src() ); ?>" width="60px" height="60px" />
			</div>
			<div style="line-height: 60px;">
				<input type="hidden" id="post_cat_thumbnail_id" name="post_cat_thumbnail_id" />
				<button type="button" class="upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'blogty' ); ?></button>
				<button type="button" class="remove_image_button button"><?php esc_html_e( 'Remove image', 'blogty' ); ?></button>
			</div>
			<div class="clear"></div>
		</div>
		<div class="form-field term-color-wrap">
			<label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'blogty' ); ?></label>
			<input name="category_color" class="colorpicker" id="term-colorpicker" />
			<p><?php esc_html_e( 'Select color for this category that will be displayed on the front end on many sections.', 'blogty' ); ?></p>
		</div>
		<?php
	}
endif;
add_action( 'category_add_form_fields', 'blogty_add_category_fields' );

/*Category edit form fields*/
if ( ! function_exists( 'blogty_edit_category_fields' ) ) :
	function blogty_edit_category_fields( $term ) {

		$color        = get_term_meta( $term->term_id, 'category_color', true );
		$thumbnail_id = absint( get_term_meta( $term->term_id, 'thumbnail_id', true ) );

		if ( $thumbnail_id ) {
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		} else {
			$image = blogty_placeholder_img_src();
		}
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php esc_html_e( 'Thumbnail', 'blogty' ); ?></label></th>
			<td>
				<div id="post_cat_thumbnail" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" /></div>
				<div style="line-height: 60px;">
					<input type="hidden" id="post_cat_thumbnail_id" name="post_cat_thumbnail_id" value="<?php echo $thumbnail_id; ?>" />
					<button type="button" class="upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'blogty' ); ?></button>
					<button type="button" class="remove_image_button button"><?php esc_html_e( 'Remove image', 'blogty' ); ?></button>
				</div>
				<div class="clear"></div>
			</td>
		</tr>
		<tr class="form-field term-color-wrap">
			<th scope="row"><label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'blogty' ); ?></label></th>
			<td>
				<input name="category_color" value="<?php echo esc_attr( $color ); ?>" class="colorpicker" id="term-colorpicker" />
				<p class="description"><?php esc_html_e( 'Select color for this category that will be displayed on the front end on many sections.', 'blogty' ); ?></p>
			</td>
		</tr>
		<?php
	}
endif;
add_action( 'category_edit_form_fields', 'blogty_edit_category_fields', 10 );

/*Save Category fields*/
if ( ! function_exists( 'blogty_save_category_fields' ) ) :
	function blogty_save_category_fields( $term_id ) {
		if ( isset( $_POST['post_cat_thumbnail_id'] ) ) {
			update_term_meta( $term_id, 'thumbnail_id', absint( $_POST['post_cat_thumbnail_id'] ) );
		}

		if ( isset( $_POST['category_color'] ) && ! empty( $_POST['category_color'] ) ) {
			update_term_meta( $term_id, 'category_color', sanitize_hex_color( $_POST['category_color'] ) );
		} else {
			delete_term_meta( $term_id, 'category_color' );
		}
	}
endif;
add_action( 'created_category', 'blogty_save_category_fields', 10, 3 );
add_action( 'edited_category', 'blogty_save_category_fields', 10, 3 );

/* Category Image Js */
if ( ! function_exists( 'blogty_admin_post_cat_js' ) ) :
	function blogty_admin_post_cat_js( $hook ) {

		if ( $hook != 'edit-tags.php' && $hook != 'term.php' ) {
			return;
		}

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_media();

		wp_enqueue_script( 'post_cat_js', get_template_directory_uri() . '/inc/category-meta/js/script' . $min . '.js', array( 'wp-color-picker' ), _S_VERSION, true );
		wp_localize_script(
			'post_cat_js',
			'UNFOLDADMIN',
			array(
				'title'   => __( 'Choose an image', 'blogty' ),
				'btn_txt' => __( 'Use image', 'blogty' ),
				'img'     => esc_js( blogty_placeholder_img_src() ),
			)
		);
	}
endif;
add_action( 'admin_enqueue_scripts', 'blogty_admin_post_cat_js' );

/*Show category image in admin column*/
if ( ! function_exists( 'blogty_post_cat_column_head' ) ) :
	function blogty_post_cat_column_head( $columns ) {
		$new_columns = array();

		if ( isset( $columns['cb'] ) ) {
			$new_columns['cb'] = $columns['cb'];
			unset( $columns['cb'] );
		}

		$new_columns['thumb'] = __( 'Image', 'blogty' );

		return array_merge( $new_columns, $columns );
	}
endif;
add_filter( 'manage_edit-category_columns', 'blogty_post_cat_column_head' );

if ( ! function_exists( 'blogty_post_cat_column_body' ) ) :
	function blogty_post_cat_column_body( $columns, $column, $id ) {
		if ( 'thumb' == $column ) {
			$thumbnail_id = get_term_meta( $id, 'thumbnail_id', true );
			if ( $thumbnail_id ) {
				$image = wp_get_attachment_thumb_url( $thumbnail_id );
			} else {
				$image = blogty_placeholder_img_src();
			}
			$image    = str_replace( ' ', '%20', $image );
			$columns .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr__( 'Thumbnail', 'blogty' ) . '" class="wp-post-image" height="48" width="48" />';
		}
		return $columns;
	}
endif;
add_filter( 'manage_category_custom_column', 'blogty_post_cat_column_body', 10, 3 );