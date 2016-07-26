<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Liberty
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>

			<div class="footer-widgets clear">

				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>

					<div class="widget-area">

						<?php dynamic_sidebar( 'footer-1' ); ?>

					</div><!-- .widget-area -->

				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>

					<div class="widget-area">

						<?php dynamic_sidebar( 'footer-2' ); ?>

					</div><!-- .widget-area -->

				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>

					<div class="widget-area">

						<?php dynamic_sidebar( 'footer-3' ); ?>

					</div><!-- .widget-area -->

				<?php endif; ?>

			</div><!-- .footer-widgets -->

		<?php endif; ?>

		<div class="site-info">
			<?php liberty_footer_credits(); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
