<?php

$pinned_post_args = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'no_found_rows'       => 1,
	'ignore_sticky_posts' => 1,
);

$pinned_posts_content_from = get_theme_mod( 'pinned_posts_content_from', 'category' );

if ( 'category' == $pinned_posts_content_from ) :

	$pinned_posts_cat     = get_theme_mod( 'pinned_posts_cat' );
	$pinned_posts_orderby = esc_attr( get_theme_mod( 'pinned_posts_orderby', 'date' ) );

	$pinned_post_args['posts_per_page'] = 2;
	$pinned_post_args['orderby']        = ( 'id' == $pinned_posts_orderby ) ? strtoupper( $pinned_posts_orderby ) : $pinned_posts_orderby;
	$pinned_post_args['order']          = esc_attr( get_theme_mod( 'pinned_posts_order', 'desc' ) );

	if ( ! empty( $pinned_posts_cat ) ) :
		$pinned_post_args['tax_query'][] = array(
			'taxonomy' => 'category',
			'field'    => 'term_id',
			'terms'    => absint( $pinned_posts_cat ),
		);
	endif;

else :

	$pinned_posts_ids = get_theme_mod( 'pinned_posts_ids' );
	if ( ! empty( $pinned_posts_ids ) ) :
		$post_ids                           = explode( ',', esc_attr( $pinned_posts_ids ) );
		$pinned_post_args['post__in']       = $post_ids;
		$pinned_post_args['orderby']        = 'post__in';
		$pinned_post_args['posts_per_page'] = 2;
	endif;

endif;

$pinned_post = new WP_Query( $pinned_post_args );
if ( $pinned_post->have_posts() ) :
	$show_pinned_posts_category = get_theme_mod( 'show_pinned_posts_category', true );
	if ( $show_pinned_posts_category ) {
		$pinned_posts_cat_style = get_theme_mod( 'pinned_posts_category_style', 'style_2' );
		$pinned_posts_cat_color = get_theme_mod( 'pinned_posts_category_color_display', 'as_bg' );
		$pinned_posts_cat_limit = get_theme_mod( 'pinned_posts_category_limit', 1 );
	}
	$enable_pinned_posts_overlay = get_theme_mod( 'enable_pinned_posts_overlay', true );
	if ( $enable_pinned_posts_overlay ) {
		$pinned_posts_overlay_style  = 'background-color:' . esc_attr( get_theme_mod( 'pinned_posts_overlay_color', '#000000' ) ) . ';';
		$pinned_posts_overlay_style .= 'opacity:' . esc_attr( get_theme_mod( 'pinned_posts_overlay_opacity', 0.6 ) ) . ';';
	}
	$pinned_post_meta          = get_theme_mod( 'pinned_post_meta' );
	$pinned_post_meta_settings = array(
		'date_format'  => get_theme_mod( 'pinned_posts_date_format', 'format_2' ),
		'author_image' => get_theme_mod( 'enable_pinned_posts_author_image' ),
		'show_icons'   => get_theme_mod( 'show_pinned_post_meta_icon', true ),
	);
	?>
	<div class="col-lg-5">
		<?php
		$pinned_posts_title = get_theme_mod( 'pinned_posts_title' );
		if ( ! empty( $pinned_posts_title ) ) :
			$title_style = get_theme_mod( 'pinned_posts_title_style', 'style_1' );
			$title_align = 'saga-title-align-' . get_theme_mod( 'pinned_posts_title_align', 'left' );
			?>
			<div class="saga-section-title">
				<div class="saga-element-header <?php echo esc_attr( $title_style . ' ' . $title_align ); ?>">
					<div class="saga-element-title-wrapper">
						<h2 class="saga-element-title">
							<span><?php echo esc_html( $pinned_posts_title ); ?></span>
						</h2>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="blogty-pinned-posts-wrapper">
			<div class="blogty-pinned-posts">
				<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-1 g-4">
					<?php
					$title_limit = get_theme_mod( 'pinned_posts_title_limit' );
					while ( $pinned_post->have_posts() ) :
						$pinned_post->the_post();
						if ( has_post_thumbnail() ) :
							?>
							<div class="col">
								<div class="saga-block-item-w-overlay img-animate-zoom">
									<?php
									if ( get_theme_mod( 'show_pinned_posts_post_format_icon' ) ) {
										blogty_post_format_icon( 'right' );
									}
									?>
									<div class="saga-block-image-w-overlay blogty-rounded-img">
										<a href="<?php the_permalink(); ?>" class="">
											<?php if ( $enable_pinned_posts_overlay ) : ?>
												<span aria-hidden="true" class="blogty-block-overlay" style="<?php echo $pinned_posts_overlay_style; ?>"></span>
											<?php endif; ?>
											<?php the_post_thumbnail( 'blogty-large-img' ); ?>
										</a>
									</div>
									<div class="saga-block-overlay-content">
										<?php
										if ( $show_pinned_posts_category ) :
											blogty_post_categories( $pinned_posts_cat_style, $pinned_posts_cat_color, $pinned_posts_cat_limit );
										endif;
										?>
										<h3 class="saga-block-overlay-title blogty-limit-lines <?php echo esc_attr( $title_limit ); ?>">
											<a href="<?php the_permalink(); ?>" class="text-decoration-none blogty-title-line">
												<?php the_title(); ?>
											</a>
										</h3>
										<?php blogty_post_meta_info( $pinned_post_meta, $pinned_post_meta_settings ); ?>
									</div>
								</div>
							</div>
							<?php
						endif;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
endif;