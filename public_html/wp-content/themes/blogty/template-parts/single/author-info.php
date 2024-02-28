<?php
global $post;
$post_id = $post->ID;

$author_id   = get_the_author_meta( 'ID' );
$author_url  = get_author_posts_url( $author_id );
$author_name = get_the_author_meta( 'display_name' );
$author_site = get_the_author_meta( 'url' );
$author_desc = get_the_author_meta( 'description' );

?>
<div class="blogty-author-info-wrapper blogty-card-box">

	<a href="<?php echo esc_url( $author_url ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>" class="author-image">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 250 ); ?>
	</a>

	<div class="author-details">

		<?php do_action( 'blogty_author_detail_start' ); ?>

		<div class="author-header-info">
			<a href="<?php echo esc_url( $author_url ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>" class="author-name">
				<?php the_author(); ?>
			</a>
			<?php if ( $author_site ) : ?>
				<a href="<?php echo esc_url( $author_site ); ?>" target="_blank" class="author-site color-accent">
					<?php blogty_the_theme_svg('home');?>
				</a>
			<?php endif; ?>
		</div>

		<?php if ( $author_desc ) : ?>
			<div class="author-desc"> 
				<?php echo wpautop( $author_desc ); ?>
			</div>
		<?php endif; ?>

		<?php do_action( 'blogty_author_detail_end' ); ?>

	</div>

</div>
