<?php
/**
 * The footer for the 2027 version. Content comes from Theme Options 2027.
 *
 * @package futuretrend
 */

$tagline    = get_field( 'opt_2027_footer_tagline', 'option' );
$socials    = get_field( 'opt_2027_social', 'option' );
$menu_title = get_field( 'opt_2027_footer_menu_title', 'option' );
$contact    = get_field( 'opt_2027_contact_title', 'option' );
$contacts   = get_field( 'opt_2027_contacts', 'option' );
$copyright  = get_field( 'opt_2027_copyright', 'option' );
?>

	<footer class="ft27">
		<div class="ft27__inner">
			<div class="ft27__col ft27__col--brand">
				<?php echo ft_2027_logo(); ?>

				<?php if ( $tagline ) : ?>
					<p class="ft27__tagline"><?php echo wp_kses_post( $tagline ); ?></p>
				<?php endif; ?>

				<?php if ( $socials ) : ?>
					<ul class="ft27__social">
						<?php foreach ( $socials as $social ) : ?>
							<?php if ( $social['link'] ) : ?>
								<li><a href="<?php echo esc_url( $social['link'] ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $social['label'] ); ?>"><?php echo ft_2027_icon( $social ); ?></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>

			<div class="ft27__col ft27__col--menu">
				<?php if ( $menu_title ) : ?>
					<h4 class="ft27__title"><?php echo esc_html( $menu_title ); ?></h4>
				<?php endif; ?>

				<nav aria-label="<?php esc_attr_e( 'Footer', THEME_TEXTDOMAIN ); ?>">
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

			<div class="ft27__col ft27__col--contact">
				<?php if ( $contact ) : ?>
					<h4 class="ft27__title"><?php echo esc_html( $contact ); ?></h4>
				<?php endif; ?>

				<?php if ( $contacts ) : ?>
					<ul class="ft27__contact">
						<?php foreach ( $contacts as $item ) : ?>
							<li>
								<?php echo ft_2027_icon( $item ); ?>
								<?php if ( $item['link'] ) : ?>
									<a href="<?php echo esc_url( $item['link'], array( 'http', 'https', 'tel', 'mailto' ) ); ?>"><?php echo esc_html( $item['text'] ); ?></a>
								<?php else : ?>
									<span><?php echo esc_html( $item['text'] ); ?></span>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( $copyright ) : ?>
			<div class="ft27__copyright"><p><?php echo esc_html( $copyright ); ?></p></div>
		<?php endif; ?>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
