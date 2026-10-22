<?php
/**
 * The header for the 2027 version.
 * Logo, awards button and year switcher come from Theme Options 2027.
 *
 * @package futuretrend
 */

$awards_button = get_field( 'opt_2027_awards_button', 'option' );
$years         = get_field( 'opt_2027_years', 'option' );
$year_prefix   = get_field( 'opt_2027_year_prefix', 'option' );
$current_year  = '2027';
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
				<?php echo ft_2027_logo(); ?>
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

					// On mobile the awards button sits in the menu panel.
					if ( $awards_button ) {
						echo '<a href="' . esc_url( $awards_button['url'] ) . '" class="hd27__button hd27__button--menu" target="' . esc_attr( $awards_button['target'] ? $awards_button['target'] : '_self' ) . '">' . esc_html( $awards_button['title'] ) . '</a>';
					}
				?>
			</nav>

			<div class="hd27__actions">
				<?php if ( $years ) : ?>
					<div class="hd27__year">
						<button type="button" class="hd27__year-toggle" aria-expanded="false" aria-controls="hd27-years">
							<span><?php if ( $year_prefix ) : ?><span class="hd27__year-prefix"><?php echo esc_html( $year_prefix ); ?> </span><?php endif; ?><?php echo esc_html( $current_year ); ?></span>
							<i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
						</button>
						<ul id="hd27-years" class="hd27__year-list" hidden>
							<?php foreach ( $years as $year ) : ?>
								<li>
									<a href="<?php echo esc_url( $year['link'] ); ?>" class="<?php echo false !== strpos( $year['year'], $current_year ) ? 'is-current' : ''; ?>"><?php echo esc_html( $year['year'] ); ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if ( $awards_button ) : ?>
					<a href="<?php echo esc_url( $awards_button['url'] ); ?>" class="hd27__button" target="<?php echo esc_attr( $awards_button['target'] ? $awards_button['target'] : '_self' ); ?>"><?php echo esc_html( $awards_button['title'] ); ?></a>
				<?php endif; ?>

				<button type="button" class="hd27__toggle" aria-controls="hd27-nav" aria-expanded="false">
					<i class="fa-solid fa-bars hd27__toggle-open" aria-hidden="true"></i>
					<i class="fa-solid fa-xmark hd27__toggle-close" aria-hidden="true"></i>
					<span class="screen-reader-text"><?php esc_html_e( 'Menu', THEME_TEXTDOMAIN ); ?></span>
				</button>
			</div>
		</div>
	</header>
