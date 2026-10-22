<?php
/**
 * 2027 hero: desktop and mobile images (as in 2026). With only one image, it shows on every screen size.
 *
 * @package futuretrend
 *
 * @param array $args { desktop: attachment ID, mobile: attachment ID }
 */

$desktop = isset( $args['desktop'] ) ? $args['desktop'] : 0;
$mobile  = isset( $args['mobile'] ) ? $args['mobile'] : 0;
?>

<section class="ft27-hero">
	<?php
		if ( $desktop && $mobile ) {
			echo '<figure class="ft27-hero-img ft27-hero-img--desktop">' . wp_get_attachment_image( $desktop, 'full' ) . '</figure>';
			echo '<figure class="ft27-hero-img ft27-hero-img--mobile">' . wp_get_attachment_image( $mobile, 'full' ) . '</figure>';
		} elseif ( $desktop || $mobile ) {
			echo '<figure class="ft27-hero-img">' . wp_get_attachment_image( $desktop ? $desktop : $mobile, 'full' ) . '</figure>';
		}
	?>
</section>
