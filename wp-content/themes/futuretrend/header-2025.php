<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header site-header-2025">
		<div class="site-header-inner">
			<div class="site-branding">
				<?php the_custom_logo(); ?>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>

				<div class="header-2025-actions">
					<?php
						// Year switcher (desktop); on mobile the copy outside the menu panel is shown.
						echo ft_year_switcher( '2026', 'ft-year--desktop' );

						$link_awards_section = get_field('link_awards_section', 'option');

						if ( $link_awards_section ) {
							echo '<a href="'.$link_awards_section['url'].'" class="link-awards" target="'.$link_awards_section['target'].'"><span>'.$link_awards_section['title'].'</span></a>';
						}
					?>
				</div>
			</nav><!-- #site-navigation -->

			<?php echo ft_year_switcher( '2026', 'ft-year--mobile' ); ?>

			<div class="hamberger">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>
		</div>

	</header><!-- #masthead -->
	<div class="overlay"></div>
