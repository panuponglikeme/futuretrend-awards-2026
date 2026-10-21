<?php
/**
 * The header for the 2027 version.
 *
 * @package futuretrend
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'v2027' ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site site-2027">
	<header class="hd27">
		<div class="hd27__inner">
			<div class="hd27__brand">
				<?php the_custom_logo(); ?>
			</div>

			<nav id="hd27-nav" class="hd27__nav" aria-label="<?php esc_attr_e( 'Primary', THEME_TEXTDOMAIN ); ?>">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu-2027',
							'container'      => false,
							'menu_class'     => 'hd27__menu',
							'fallback_cb'    => false,
						)
					);
				?>
			</nav>

			<?php // Year switcher (2026 / 2027): added once the URL structure is decided. ?>

			<button type="button" class="hd27__toggle" aria-controls="hd27-nav" aria-expanded="false">
				<span class="hd27__toggle-bar"></span>
				<span class="hd27__toggle-bar"></span>
				<span class="hd27__toggle-bar"></span>
				<span class="screen-reader-text"><?php esc_html_e( 'Menu', THEME_TEXTDOMAIN ); ?></span>
			</button>
		</div>
	</header>
