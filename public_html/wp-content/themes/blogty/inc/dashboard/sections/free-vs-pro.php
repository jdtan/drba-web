<?php
/**
 * Free v Pro
 *
 * @package Blogty
 */

$icons = array(
	'0' => '<span class="dashicons dashicons-no"></span>',
	'1' => '<span class="dashicons dashicons-yes"></span>',
);
?>
<div class="blogty-dashboard-body">
	<div class="free-vs-pro-wrapper">
		<div class="section-cta-upgrade">
			<span><?php esc_html_e( 'PREMIUM', 'blogty' ); ?></span>
			<h2><?php esc_html_e( 'Unlock More with Blogty Pro', 'blogty' ); ?></h2>
			<p><?php esc_html_e( 'Unlock all the possibilties and true potential with premium version of this theme', 'blogty' ); ?></p>
			<a href="<?php echo esc_url( $this->theme_url . '?utm_source=wp&utm_medium=theme-dashboard&utm_campaign=fvp' ); ?>" target="_blank" class="button button-primary button-plus"><?php esc_html_e( 'Upgrade To Pro', 'blogty' ); ?></a>
		</div>
		<table>
			<thead>
				<tr>
					<th class="blogty-text-left"><?php esc_html_e( 'Features', 'blogty' ); ?></th>
					<th class="blogty-text-center"><?php esc_html_e( 'Free', 'blogty' ); ?></th>
					<th class="blogty-text-center"><?php esc_html_e( 'Pro', 'blogty' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$free_vs_pro = array(
					array(
						'feature' => __( 'Help and support', 'blogty' ),
						'free'    => __( 'Standard support', 'blogty' ),
						'pro'     => __( 'High priority support', 'blogty' ),
					),
					array(
						'feature' => __( 'Predesigned website templates', 'blogty' ),
						'free'    => __( '2', 'blogty' ),
						'pro'     => __( '5', 'blogty' ),
					),
					array(
						'feature' => __( 'Seo optimized', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Translation ready', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'RTL ready', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Post formats support', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'WooCommerce ready', 'blogty' ),
						'free'    => 1,
						'pro'     => __( 'With more options', 'blogty' ),
					),
					array(
						'feature' => __( 'Preloader option', 'blogty' ),
						'free'    => 1,
						'pro'     => __( '15+ Preloaders', 'blogty' ),
					),
					array(
						'feature' => __( 'Progressbar option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Typography font option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Typography color option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Primary menu font option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Primary menu responisve font sizes', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Headings font option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Headings responisve font sizes', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Body font option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Body responisve font sizes', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Primary color option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Menu color option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub-menu color option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner slider option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner slider style', 'blogty' ),
						'free'    => __( '1', 'blogty' ),
						'pro'     => __( '4', 'blogty' ),
					),
					array(
						'feature' => __( 'Homepage banner thumbnail option', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner thumbnail style', 'blogty' ),
						'free'    => 0,
						'pro'     => __( '2', 'blogty' ),
					),
					array(
						'feature' => __( 'Homepage banner carousel option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner carousel style', 'blogty' ),
						'free'    => __( '1', 'blogty' ),
						'pro'     => __( '4', 'blogty' ),
					),
					array(
						'feature' => __( 'Homepage pinned posts', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner section visibility options', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner section dimensions', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner section dividers', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending posts', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending post style', 'blogty' ),
						'free'    => __( '1', 'blogty' ),
						'pro'     => __( '2', 'blogty' ),
					),
					array(
						'feature' => __( 'Homepage trending post visibility options', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending post section dimensions', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending post section dividers', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage layout option', 'blogty' ),
						'free'    => 1,
						'pro'     => __( 'With more options', 'blogty' ),
					),
					array(
						'feature' => __( 'Homepage custom sidebar', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Darkmode option', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Topbar option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Topbar color option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Header style', 'blogty' ),
						'free'    => __( '2', 'blogty' ),
						'pro'     => __( '4', 'blogty' ),
					),
					array(
						'feature' => __( 'Header ad banner', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sticky header', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Header section dimensions', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Menu Bar option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sticky sidebar', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas light/dark theme', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas logo', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas widgets title style', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Archive style', 'blogty' ),
						'free'    => __( '4', 'blogty' ),
						'pro'     => __( '8', 'blogty' ),
					),
					array(
						'feature' => __( 'Archive post metas', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Ajax load posts on click', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Infinite scroll load posts', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Related posts', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Floating related posts', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Author posts', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Author info box', 'blogty' ),
						'free'    => 1,
						'pro'     => __( 'With social links option', 'blogty' ),
					),
					array(
						'feature' => __( 'Integrated social share option', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Page layout option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category image option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category color option', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category banner image option', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category different pagination', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Different design style for each category', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Different design style for each tags', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Tags different pagination', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Custom widgets', 'blogty' ),
						'free'    => __( '16+', 'blogty' ),
						'pro'     => __( '22+', 'blogty' ),
					),
					array(
						'feature' => __( 'Widgets title style & align options', 'blogty' ),
						'free'    =>  __( '10+ Styles', 'blogty' ),
						'pro'     =>  __( '15+ Styles', 'blogty' ),
					),
					array(
						'feature' => __( 'Widgetareas', 'blogty' ),
						'free'    =>  __( '12+', 'blogty' ),
						'pro'     =>  __( '12+', 'blogty' ),
					),
					array(
						'feature' => __( 'Widgetareas visibility options', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Widgetareas dimension options', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Widgetareas dividers', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Single post layout', 'blogty' ),
						'free'    =>  __( '3', 'blogty' ),
						'pro'     =>  __( '6', 'blogty' ),
					),
					array(
						'feature' => __( 'Single post navigation style', 'blogty' ),
						'free'    => __( '3', 'blogty' ),
						'pro'     => __( '5', 'blogty' ),
					),
					array(
						'feature' => __( 'Post primary category option', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Post subtitle option', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Extended gallery format support', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Extended video format support', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Extended audio format support', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( '404 page options', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Footer layouts', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Footer widgets title style & align options', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Footer light/dark theme', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub footer', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub footer light/dark theme', 'blogty' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub footer layout', 'blogty' ),
						'free'    => __( '1', 'blogty' ),
						'pro'     => __( '2', 'blogty' ),
					),
					array(
						'feature' => __( 'Sub footer logo', 'blogty' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Scroll to top', 'blogty' ),
						'free'    => 1,
						'pro'     => __( 'With more options', 'blogty' ),
					),
				);
				foreach ( $free_vs_pro as $features ) :
					?>
					<tr>
						<td class="blogty-text-left"><?php echo esc_html( $features['feature'] ); ?></td>
						<td class="blogty-text-center">
							<?php
							if ( 1 === $features['free'] ) {
								echo $icons[1];
							} elseif ( 0 === $features['free'] ) {
								echo $icons[0];
							} else {
								echo esc_html( $features['free'] );
							}
							?>
						</td>
						<td class="blogty-text-center">
							<?php
							if ( 1 === $features['pro'] ) {
								echo $icons[1];
							} elseif ( 0 === $features['pro'] ) {
								echo $icons[0];
							} else {
								echo esc_html( $features['pro'] );
							}
							?>
						</td>
					</tr>
					<?php
				endforeach;
				?>
			</tbody>
		</table>
		<div class="free-vs-pro-footer">
			<a href="<?php echo esc_url( $this->theme_url . '?utm_source=wp&utm_medium=theme-dashboard&utm_campaign=fvp' ); ?>" target="_blank"><?php esc_html_e( 'And many more features', 'blogty' ); ?><span class="dashicons dashicons-external"></span></a>
		</div>
	</div>
</div>
