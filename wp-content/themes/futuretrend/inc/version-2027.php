<?php
/**
 * Version 2027: menu, assets and data config.
 *
 * 2027 pages load their own stylesheet and scripts only, so 2026 assets
 * (assets/css/style.css, js/custom.js) never touch them and vice versa.
 *
 * @package futuretrend
 */

/**
 * Page templates that belong to the 2027 version, keyed by page type.
 */
function ft_2027_templates() {
	return array(
		'home'   => 'template-parts/template-homepage-2027.php',
		'about'  => 'template-parts/template-about-2027.php',
		'awards' => 'template-parts/template-awards-2027.php',
	);
}

/**
 * Current 2027 page type (home, about, awards) or false on any other page.
 */
function ft_2027_page_type() {
	foreach ( ft_2027_templates() as $type => $template ) {
		if ( is_page_template( $template ) ) {
			return $type;
		}
	}
	return false;
}

/**
 * Menu location for the 2027 header and footer.
 */
function ft_2027_menus() {
	register_nav_menus(
		array(
			'primary-menu-2027' => esc_html__( 'Primary 2027', THEME_TEXTDOMAIN ),
		)
	);
}
add_action( 'after_setup_theme', 'ft_2027_menus' );

/**
 * Award groups shown on the 2027 pages, in display order.
 * Field names are the ACF fields on each taxonomy's categories.
 */
function ft_2027_award_groups() {
	return array(
		'corporate'    => array(
			'label'      => get_field( 'word_corp_awards', 'option' ),
			'taxonomy'   => 'corporate_cat',
			'order'      => 'corp_cate_order',
			'number'     => 'corp_cate_number_awards',
			'list'       => 'corp_cate_list',
			'list_title' => 'corp_cate_list_title',
			'listing'    => 'corp_cate_list_listing',
			'name'       => 'corp_name',
		),
		'better-world' => array(
			'label'      => get_field( 'word_better_world_awards', 'option' ),
			'taxonomy'   => 'better_world_cat',
			'order'      => 'bett_corp_cate_order',
			'number'     => 'bett_corp_cate_number_awards',
			'list'       => 'bett_corp_cate_list',
			'list_title' => 'bett_corp_cate_list_title',
			'listing'    => 'bett_corp_cate_list_listing',
			'name'       => 'corp_name',
		),
		'beloved'      => array(
			'label'      => get_field( 'word_beloved_awards', 'option' ),
			'taxonomy'   => 'beloved_employer_cat',
			'order'      => 'beloved_cate_order',
			'number'     => 'beloved_cate_number_awards',
			'list'       => 'beloved_cate_list',
			'list_title' => 'beloved_cate_list_title',
			'listing'    => 'beloved_cate_list_listing',
			'name'       => 'corp_name',
		),
		'leader'       => array(
			'label'      => get_field( 'word_lead_awards', 'option' ),
			'taxonomy'   => 'leader_cat',
			'order'      => 'lead_cate_order',
			'number'     => 'lead_cate_number_awards',
			'list'       => 'lead_cate_list',
			'list_title' => 'lead_cate_list_title',
			'listing'    => 'lead_cate_list_listing',
			'name'       => 'lead_name',
		),
		'government'   => array(
			'label'      => 'The Future Government Awards',
			'taxonomy'   => 'government_cat',
			'order'      => 'gov_cate_order',
			'number'     => 'gov_cate_number_awards',
			'list'       => 'gov_cate_list',
			'list_title' => 'gov_cate_list_title',
			'listing'    => 'gov_cate_list_listing',
			'name'       => 'corp_name',
		),
	);
}

/**
 * The 2027 award groups that have categories, each with its config and 2027 data
 * (title, desc, image, terms, total). Cached for the request.
 */
function ft_2027_award_groups_data() {
	static $groups = null;
	if ( null !== $groups ) {
		return $groups;
	}

	$groups = array();
	foreach ( ft_2027_award_groups() as $key => $config ) {
		$data = ft_award_group( $config['taxonomy'], 2027, $config['order'], $config['number'] );
		if ( ! $data['terms'] ) {
			continue;
		}
		$data['title']  = $data['title'] ? $data['title'] : $config['label'];
		$groups[ $key ] = array_merge( $config, $data );
	}
	return $groups;
}

/**
 * Committee groups for the 2027 About page (committee_cat slugs under "2027").
 */
function ft_2027_committee_groups() {
	return array(
		'corporate'    => 'committee-coporates-awards-2027',
		'better-world' => 'committee-better-world-coporate-awards-2027',
		'beloved'      => 'committee-most-beloved-employer-awards-2027',
		'leader'       => 'committee-leaders-awards-2027',
		'government'   => 'committee-government-awards-2027',
	);
}

/**
 * 2027 logo <img> from Theme Options 2027, falling back to the file in the theme.
 */
function ft_2027_logo() {
	$logo = get_field( 'opt_2027_logo', 'option' );
	$src  = $logo ? $logo['url'] : get_template_directory_uri() . '/assets/images/2027/logo-future-trends-2027.svg';
	$alt  = ( $logo && $logo['alt'] ) ? $logo['alt'] : get_bloginfo( 'name' );

	return '<a href="' . esc_url( home_url( '/' ) ) . '" class="ft27-logo" rel="home"><img src="' . esc_url( $src ) . '" alt="' . esc_attr( $alt ) . '" width="187" height="107"></a>';
}

/**
 * Icon of a Theme Options 2027 repeater row (Social, Contact): the uploaded image, else the Font Awesome class.
 */
function ft_2027_icon( $row ) {
	if ( ! empty( $row['image'] ) ) {
		return '<img class="ft27-icon-img" src="' . esc_url( $row['image']['url'] ) . '" alt="" width="20" height="20">';
	}
	if ( ! empty( $row['icon'] ) ) {
		return '<i class="' . esc_attr( $row['icon'] ) . '" aria-hidden="true"></i>';
	}
	return '';
}

/**
 * Star icon used in the Awards page section tags (assets/images/2027/icon-star.svg).
 */
function ft_2027_icon_star() {
	return '<img class="ft27-tag-icon" src="' . esc_url( ft_2027_image( 'icon-star.svg' ) ) . '" alt="" width="18" height="18">';
}

/**
 * URL of an image in assets/images/2027.
 */
function ft_2027_image( $file ) {
	return get_template_directory_uri() . '/assets/images/2027/' . $file;
}

/**
 * Cache-busting version for a theme file: its modified time.
 */
function ft_2027_asset_version( $relative_path ) {
	$file = get_template_directory() . $relative_path;
	return file_exists( $file ) ? (string) filemtime( $file ) : _S_VERSION;
}

/**
 * Swap the 2026 assets for the 2027 ones on 2027 pages.
 */
function ft_2027_enqueue() {
	$type = ft_2027_page_type();
	if ( ! $type ) {
		return;
	}

	// 2026 stylesheet and scripts: custom.js expects #masthead and errors without it.
	wp_dequeue_style( '-custom-css' );
	wp_dequeue_script( THEME_TEXTDOMAIN . '-custom-js' );

	$uri = get_template_directory_uri();

	wp_enqueue_style( 'ft-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), null );
	wp_enqueue_style( 'ft-2027', $uri . '/assets/css/style-2027.css', array( 'ft-fontawesome' ), ft_2027_asset_version( '/assets/css/style-2027.css' ) );
	wp_enqueue_script( 'ft-site-2027', $uri . '/js/site-2027.js', array(), ft_2027_asset_version( '/js/site-2027.js' ), true );

	$page_script = '/js/' . $type . '-2027.js';
	$deps        = ( 'about' === $type ) ? array( 'jquery', '-magnific-popup-js' ) : array();
	wp_enqueue_script( 'ft-' . $type . '-2027', $uri . $page_script, $deps, ft_2027_asset_version( $page_script ), true );

	if ( 'about' === $type ) {
		$gallery = ft_2027_about_gallery();
		wp_localize_script(
			'ft-about-2027',
			'ftAbout2027',
			array(
				'restUrl'    => esc_url_raw( rest_url( 'wp/v2/gallery' ) ),
				'galleryCat' => $gallery['term'],
				'total'      => $gallery['total'],
				'perPage'    => 8,
				'step'       => 4,
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'ft_2027_enqueue', 20 );

/**
 * About 2027 gallery: the Gallery Category chosen on the page (about_2027_gall_year, named by the year of the event)
 * and its number of photos. Cached for the request (used by the template and ft_2027_enqueue()).
 *
 * @return array { term: term ID or 0, total: number of published photos }
 */
function ft_2027_about_gallery() {
	static $gallery = null;
	if ( null !== $gallery ) {
		return $gallery;
	}

	$term    = (int) get_field( 'about_2027_gall_year', get_queried_object_id() );
	$gallery = array( 'term' => $term, 'total' => 0 );
	if ( $term ) {
		$query = new WP_Query(
			array(
				'post_type'      => 'gallery',
				'post_status'    => 'publish',
				'posts_per_page' => 1,
				'fields'         => 'ids',
				'tax_query'      => array(
					array(
						'taxonomy' => 'gallery_cat',
						'field'    => 'term_id',
						'terms'    => $term,
					),
				),
			)
		);
		$gallery['total'] = (int) $query->found_posts;
	}
	return $gallery;
}
