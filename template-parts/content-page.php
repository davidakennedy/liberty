<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Liberty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if ( is_page_template( 'right-column-page.php' ) ) : ?>
			<?php edit_post_link( sprintf( esc_html__( 'Edit %1$s', 'liberty' ), '<span class="screen-reader-text">' . the_title_attribute( 'echo=0' ) . '</span>' ), '<span class="edit-link">', '</span>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'liberty' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( ! is_page_template( 'right-column-page.php' ) ) : ?>
		<footer class="entry-footer">
			<?php edit_post_link( sprintf( esc_html__( 'Edit %1$s', 'liberty' ), '<span class="screen-reader-text">' . the_title_attribute( 'echo=0' ) . '</span>' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->

