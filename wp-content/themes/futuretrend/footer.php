<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package futuretrend
 */

	$footer_copyright = get_field('footer_copyright', 'option');
	$text_follow_us = get_field('text_follow_us', 'option');
?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="site-branding">
				<?php the_custom_logo(); ?>
			</div>

			<div class="footer-bottom">
				<div class="left">
					<nav class="footer-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
					</nav>

					<p class="copyright-desktop"><?php echo $footer_copyright; ?></p>
				</div>

				<div class="right">
					<div class="follow-wrapper">
						<p><?php echo $text_follow_us; ?></p>

						<?php
							if( have_rows('follow_list', 'option') ) {
								echo '<ul class="follow-list">';
									while( have_rows('follow_list', 'option') ) : the_row();
									$follow_list_icon = get_sub_field('follow_list_icon');
									$follow_list_link = get_sub_field('follow_list_link');

									echo '<li><a href="'.$follow_list_link['url'].'" target="'.$follow_list_link['target'].'" title="'.$follow_list_link['title'].'"><img src="'.$follow_list_icon['url'].'" alt="'.$follow_list_icon['alt'].'" /></a></li>';

									endwhile;
								echo '</ul>';
							}
						?>
					</div>

					<p class="copyright-mobile"><?php echo $footer_copyright; ?></p>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
