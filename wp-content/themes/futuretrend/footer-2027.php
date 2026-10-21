<?php
/**
 * The footer for the 2027 version.
 *
 * @package futuretrend
 */

	$footer_copyright = get_field( 'footer_copyright', 'option' );
?>

	<footer class="ft27">
		<div class="ft27__inner">
			<div class="ft27__brand">
				<?php the_custom_logo(); ?>
			</div>

			<nav class="ft27__nav" aria-label="<?php esc_attr_e( 'Footer', THEME_TEXTDOMAIN ); ?>">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu-2027',
							'container'      => false,
							'menu_class'     => 'ft27__menu',
							'fallback_cb'    => false,
						)
					);
				?>
			</nav>
		</div>

		<?php if ( $footer_copyright ) : ?>
			<div class="ft27__copyright"><p><?php echo $footer_copyright; ?></p></div>
		<?php endif; ?>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
