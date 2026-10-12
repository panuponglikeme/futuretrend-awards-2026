<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package futuretrend
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function futuretrend_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'futuretrend_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function futuretrend_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'futuretrend_pingback_header' );

/**
* Allow svg file upload
*/
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//ACF Option Page
add_action('acf/init', function() {
	if ( function_exists( 'acf_add_options_page' ) ) {

		// Main Theme Settings Page
		$parent = acf_add_options_page( array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Options',
		'redirect'   => 'Theme Settings',
		) );

		acf_add_options_sub_page( array(
		'page_title' => 'Theme Options',
		'menu_title' => __('Theme Options'),
		'menu_slug'  => "acf-options",
		'parent'     => $parent['menu_slug']
		) );
	}
});

/**
 * Add News post type Corporate
 */
 $labelsCorp = array(
	'name' => _x('Corporate', THEME_TEXTDOMAIN),
	'singular_name' => _x('Corporate', THEME_TEXTDOMAIN),
	'menu_name' => _x('Corporate', THEME_TEXTDOMAIN),
	'name_admin_bar' => _x('Corporate', THEME_TEXTDOMAIN),
	'add_new' => _x('Add New', THEME_TEXTDOMAIN),
	'add_new_item' => _x('Add New', THEME_TEXTDOMAIN),
	'new_item' => _x('New', THEME_TEXTDOMAIN),
	'edit_item' => _x('Edit', THEME_TEXTDOMAIN),
	'view_item' => _x('View', THEME_TEXTDOMAIN),
	'all_items' => _x('All Corporate', THEME_TEXTDOMAIN),
	'search_items' => _x('Search', THEME_TEXTDOMAIN),
	'parent_item_colon' => _x('Parent:', THEME_TEXTDOMAIN),
	'not_found' => _x('Not found.', THEME_TEXTDOMAIN),
	'not_found_in_trash' => _x('Not found in Trash.', THEME_TEXTDOMAIN)
);

$args = array(
    "labels" => $labelsCorp,
    "description" => "",
    "public" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
	'publicly_queryable' => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    'menu_icon'           => 'dashicons-networking',
    'menu_position'       => 30,
    "rewrite" => array( "slug" => "corporate", "with_front" => true ),
    "query_var" => true,
    "show_in_nav_menus" => true,
    "supports" => array( "title", 'page-attributes', 'thumbnail' ),
);
register_post_type( "corporate", $args );


/**
 * Add News post type Leader
 */
 $labelsLead = array(
	'name' => _x('Leader', THEME_TEXTDOMAIN),
	'singular_name' => _x('Leader', THEME_TEXTDOMAIN),
	'menu_name' => _x('Leader', THEME_TEXTDOMAIN),
	'name_admin_bar' => _x('Leader', THEME_TEXTDOMAIN),
	'add_new' => _x('Add New', THEME_TEXTDOMAIN),
	'add_new_item' => _x('Add New', THEME_TEXTDOMAIN),
	'new_item' => _x('New', THEME_TEXTDOMAIN),
	'edit_item' => _x('Edit', THEME_TEXTDOMAIN),
	'view_item' => _x('View', THEME_TEXTDOMAIN),
	'all_items' => _x('All Leader', THEME_TEXTDOMAIN),
	'search_items' => _x('Search', THEME_TEXTDOMAIN),
	'parent_item_colon' => _x('Parent:', THEME_TEXTDOMAIN),
	'not_found' => _x('Not found.', THEME_TEXTDOMAIN),
	'not_found_in_trash' => _x('Not found in Trash.', THEME_TEXTDOMAIN)
);

$args = array(
    "labels" => $labelsLead,
    "description" => "",
    "public" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
	'publicly_queryable' => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    'menu_icon'           => 'dashicons-universal-access',
    'menu_position'       => 31,
    "rewrite" => array( "slug" => "leader", "with_front" => true ),
    "query_var" => true,
    "show_in_nav_menus" => true,
    "supports" => array( "title", 'page-attributes', 'thumbnail' ),
);
register_post_type( "leader", $args );

/**
 * Add News post type Better World Corporate
 */
 $labelsBetter = array(
	'name' => _x('Better World Corporate', THEME_TEXTDOMAIN),
	'singular_name' => _x('Better World Corporate', THEME_TEXTDOMAIN),
	'menu_name' => _x('Better World Corporate', THEME_TEXTDOMAIN),
	'name_admin_bar' => _x('Better World Corporate', THEME_TEXTDOMAIN),
	'add_new' => _x('Add New', THEME_TEXTDOMAIN),
	'add_new_item' => _x('Add New', THEME_TEXTDOMAIN),
	'new_item' => _x('New', THEME_TEXTDOMAIN),
	'edit_item' => _x('Edit', THEME_TEXTDOMAIN),
	'view_item' => _x('View', THEME_TEXTDOMAIN),
	'all_items' => _x('All Better World Corporate', THEME_TEXTDOMAIN),
	'search_items' => _x('Search', THEME_TEXTDOMAIN),
	'parent_item_colon' => _x('Parent:', THEME_TEXTDOMAIN),
	'not_found' => _x('Not found.', THEME_TEXTDOMAIN),
	'not_found_in_trash' => _x('Not found in Trash.', THEME_TEXTDOMAIN)
);

$argsBetter = array(
    "labels" => $labelsBetter,
    "description" => "",
    "public" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
	'publicly_queryable' => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    'menu_icon'           => 'dashicons-universal-access',
    'menu_position'       => 31,
    "rewrite" => array( "slug" => "better-world", "with_front" => true ),
    "query_var" => true,
    "show_in_nav_menus" => true,
    "supports" => array( "title", 'page-attributes', 'thumbnail' ),
);
register_post_type( "better-world", $argsBetter );

/**
 * Add News post type Most Beloved Employer
 */
 $labelsMost = array(
	'name' => _x('Most Beloved Employer', THEME_TEXTDOMAIN),
	'singular_name' => _x('Most Beloved Employer', THEME_TEXTDOMAIN),
	'menu_name' => _x('Most Beloved Employer', THEME_TEXTDOMAIN),
	'name_admin_bar' => _x('Most Beloved Employer', THEME_TEXTDOMAIN),
	'add_new' => _x('Add New', THEME_TEXTDOMAIN),
	'add_new_item' => _x('Add New', THEME_TEXTDOMAIN),
	'new_item' => _x('New', THEME_TEXTDOMAIN),
	'edit_item' => _x('Edit', THEME_TEXTDOMAIN),
	'view_item' => _x('View', THEME_TEXTDOMAIN),
	'all_items' => _x('All Most Beloved Employer', THEME_TEXTDOMAIN),
	'search_items' => _x('Search', THEME_TEXTDOMAIN),
	'parent_item_colon' => _x('Parent:', THEME_TEXTDOMAIN),
	'not_found' => _x('Not found.', THEME_TEXTDOMAIN),
	'not_found_in_trash' => _x('Not found in Trash.', THEME_TEXTDOMAIN)
);

$argsMost = array(
    "labels" => $labelsMost,
    "description" => "",
    "public" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
	'publicly_queryable' => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    'menu_icon'           => 'dashicons-universal-access',
    'menu_position'       => 31,
    "rewrite" => array( "slug" => "beloved-employer", "with_front" => true ),
    "query_var" => true,
    "show_in_nav_menus" => true,
    "supports" => array( "title", 'page-attributes', 'thumbnail' ),
);
register_post_type( "beloved-employer", $argsMost );

/**
 * Add News post type Sponsors
 */
 $labelsSp = array(
	'name' => _x('Sponsor', THEME_TEXTDOMAIN),
	'singular_name' => _x('Sponsor', THEME_TEXTDOMAIN),
	'menu_name' => _x('Sponsor', THEME_TEXTDOMAIN),
	'name_admin_bar' => _x('Sponsor', THEME_TEXTDOMAIN),
	'add_new' => _x('Add New', THEME_TEXTDOMAIN),
	'add_new_item' => _x('Add New', THEME_TEXTDOMAIN),
	'new_item' => _x('New', THEME_TEXTDOMAIN),
	'edit_item' => _x('Edit', THEME_TEXTDOMAIN),
	'view_item' => _x('View', THEME_TEXTDOMAIN),
	'all_items' => _x('All Sponsor', THEME_TEXTDOMAIN),
	'search_items' => _x('Search', THEME_TEXTDOMAIN),
	'parent_item_colon' => _x('Parent:', THEME_TEXTDOMAIN),
	'not_found' => _x('Not found.', THEME_TEXTDOMAIN),
	'not_found_in_trash' => _x('Not found in Trash.', THEME_TEXTDOMAIN)
);

$argsSp = array(
    "labels" => $labelsSp,
    "description" => "",
    "public" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
	'publicly_queryable' => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    'menu_icon'           => 'dashicons-image-filter',
    'menu_position'       => 32,
    "rewrite" => array( "slug" => "sponsor", "with_front" => true ),
    "query_var" => true,
    "show_in_nav_menus" => true,
    "supports" => array( "title", 'page-attributes', 'thumbnail' ),
);
register_post_type( "sponsor", $argsSp );

/**
 * Add News post type Committee
 */
$labelsCmt = array(
	'name' => _x('Committee', THEME_TEXTDOMAIN),
	'singular_name' => _x('Committee', THEME_TEXTDOMAIN),
	'menu_name' => _x('Committee', THEME_TEXTDOMAIN),
	'name_admin_bar' => _x('Committee', THEME_TEXTDOMAIN),
	'add_new' => _x('Add New', THEME_TEXTDOMAIN),
	'add_new_item' => _x('Add New', THEME_TEXTDOMAIN),
	'new_item' => _x('New', THEME_TEXTDOMAIN),
	'edit_item' => _x('Edit', THEME_TEXTDOMAIN),
	'view_item' => _x('View', THEME_TEXTDOMAIN),
	'all_items' => _x('All Committee', THEME_TEXTDOMAIN),
	'search_items' => _x('Search', THEME_TEXTDOMAIN),
	'parent_item_colon' => _x('Parent:', THEME_TEXTDOMAIN),
	'not_found' => _x('Not found.', THEME_TEXTDOMAIN),
	'not_found_in_trash' => _x('Not found in Trash.', THEME_TEXTDOMAIN)
);

$argsCmt = array(
    "labels" => $labelsCmt,
    "description" => "",
    "public" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
	'publicly_queryable' => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    'menu_icon'           => 'dashicons-businessman',
    'menu_position'       => 33,
    "rewrite" => array( "slug" => "committee", "with_front" => true ),
    "query_var" => true,
    "show_in_nav_menus" => true,
    "supports" => array( "title", 'page-attributes', 'thumbnail' ),
);
register_post_type( "committee", $argsCmt );

/**
 * Add News post type Gallery
 */
$labelsGal = array(
	'name' => _x('Gallery', THEME_TEXTDOMAIN),
	'singular_name' => _x('Gallery', THEME_TEXTDOMAIN),
	'menu_name' => _x('Gallery', THEME_TEXTDOMAIN),
	'name_admin_bar' => _x('Gallery', THEME_TEXTDOMAIN),
	'add_new' => _x('Add New', THEME_TEXTDOMAIN),
	'add_new_item' => _x('Add New', THEME_TEXTDOMAIN),
	'new_item' => _x('New', THEME_TEXTDOMAIN),
	'edit_item' => _x('Edit', THEME_TEXTDOMAIN),
	'view_item' => _x('View', THEME_TEXTDOMAIN),
	'all_items' => _x('All Gallery', THEME_TEXTDOMAIN),
	'search_items' => _x('Search', THEME_TEXTDOMAIN),
	'parent_item_colon' => _x('Parent:', THEME_TEXTDOMAIN),
	'not_found' => _x('Not found.', THEME_TEXTDOMAIN),
	'not_found_in_trash' => _x('Not found in Trash.', THEME_TEXTDOMAIN)
);

$argsGal = array(
    "labels" => $labelsGal,
    "description" => "",
    "public" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
	'publicly_queryable' => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    'menu_icon'           => 'dashicons-format-gallery',
    'menu_position'       => 34,
    "rewrite" => array( "slug" => "gallery", "with_front" => true ),
    "query_var" => true,
    "show_in_nav_menus" => true,
    "supports" => array( "title", 'page-attributes', 'thumbnail' ),
);
register_post_type( "gallery", $argsGal );

/**
 * Add News post type Gallery
 */
$labelsGal = array(
	'name' => _x('Partner', THEME_TEXTDOMAIN),
	'singular_name' => _x('Partner', THEME_TEXTDOMAIN),
	'menu_name' => _x('Partner', THEME_TEXTDOMAIN),
	'name_admin_bar' => _x('Partner', THEME_TEXTDOMAIN),
	'add_new' => _x('Add New', THEME_TEXTDOMAIN),
	'add_new_item' => _x('Add New', THEME_TEXTDOMAIN),
	'new_item' => _x('New', THEME_TEXTDOMAIN),
	'edit_item' => _x('Edit', THEME_TEXTDOMAIN),
	'view_item' => _x('View', THEME_TEXTDOMAIN),
	'all_items' => _x('All Partner', THEME_TEXTDOMAIN),
	'search_items' => _x('Search', THEME_TEXTDOMAIN),
	'parent_item_colon' => _x('Parent:', THEME_TEXTDOMAIN),
	'not_found' => _x('Not found.', THEME_TEXTDOMAIN),
	'not_found_in_trash' => _x('Not found in Trash.', THEME_TEXTDOMAIN)
);

$argsGal = array(
    "labels" => $labelsGal,
    "description" => "",
    "public" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "has_archive" => true,
    "show_in_menu" => true,
    "exclude_from_search" => false,
	'publicly_queryable' => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    'menu_icon'           => 'dashicons-image-filter',
    'menu_position'       => 35,
    "rewrite" => array( "slug" => "partner", "with_front" => true ),
    "query_var" => true,
    "show_in_nav_menus" => true,
    "supports" => array( "title", 'page-attributes', 'thumbnail' ),
);
register_post_type( "partner", $argsGal );

/* Taxonomy */
add_action( 'init', 'likeme_taxonomy' );
function likeme_taxonomy() {

    register_taxonomy(
        'corporate_cat', 'corporate',
        array(
          'label'     => _x( 'Categories', THEME_TEXTDOMAIN ),
          'hierarchical'  => true,
          'query_var'   => true,
          'rewrite'     => array( 'slug' => 'corporate_categories' ),
		  'publicly_queryable' => false,
        )
    );

	register_taxonomy(
        'better_world_cat', 'better-world',
        array(
          'label'     => _x( 'Categories', THEME_TEXTDOMAIN ),
          'hierarchical'  => true,
          'query_var'   => true,
          'rewrite'     => array( 'slug' => 'better_world_categories' ),
		  'publicly_queryable' => false,
        )
    );

	register_taxonomy(
        'beloved_employer_cat', 'beloved-employer',
        array(
          'label'     => _x( 'Categories', THEME_TEXTDOMAIN ),
          'hierarchical'  => true,
          'query_var'   => true,
          'rewrite'     => array( 'slug' => 'beloved_employer_categories' ),
		  'publicly_queryable' => false,
        )
    );

	register_taxonomy(
        'leader_cat', 'leader',
        array(
          'label'     => _x( 'Categories', THEME_TEXTDOMAIN ),
          'hierarchical'  => true,
          'query_var'   => true,
          'rewrite'     => array( 'slug' => 'leader_categories' ),
		  'publicly_queryable' => false,
        )
    );

	register_taxonomy(
        'sponsor_cat', 'sponsor',
        array(
          'label'     => _x( 'Categories', THEME_TEXTDOMAIN ),
          'hierarchical'  => true,
          'query_var'   => true,
          'rewrite'     => array( 'slug' => 'sponsor_categories' ),
		  'publicly_queryable' => false,
        )
    );

	register_taxonomy(
        'committee_cat', 'committee',
        array(
          'label'     => _x( 'Categories', THEME_TEXTDOMAIN ),
          'hierarchical'  => true,
          'query_var'   => true,
          'rewrite'     => array( 'slug' => 'committee_categories' ),
		  'publicly_queryable' => false,
        )
    );

	register_taxonomy(
        'gallery_cat', 'gallery',
        array(
          'label'     => _x( 'Categories', THEME_TEXTDOMAIN ),
          'hierarchical'  => true,
          'query_var'   => true,
          'rewrite'     => array( 'slug' => 'gallery_categories' ),
		  'publicly_queryable' => false,
        )
    );
}

//Order post type back-end
function wpse_81939_post_types_admin_order( $wp_query ) {
	if (is_admin()) {

		// Get the post type from the query
		$post_type = $wp_query->query['post_type'];

		if ( $post_type == 'speaker' || $post_type == 'corporate' || $post_type == 'leader' || $post_type == 'better-world-corporate' || $post_type == 'sponsor' || $post_type == 'committee' || $post_type == 'gallery' || $post_type == 'partner' ) {
			$wp_query->set('orderby', 'date');
			$wp_query->set('order', 'DESC');
		}
	}
}
add_filter('pre_get_posts', 'wpse_81939_post_types_admin_order');

//API Speaker
function prepare_rest_speaker($data, $post, $request){
	$_data = $data->data;

	//Thumbnail
	$thumbnail_id = get_post_thumbnail_id( $post->ID );

	if ( $thumbnail_id ) {
		$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full' );
	} else {
		$thumbnail_url = '/wp-content/themes/martech/assets/images/no-img.jpg';
	}

	//ACF
	$spk_logo = get_field('spk_logo');
	$spk_name = get_field('spk_name');
	$spk_position = get_field('spk_position');
	$spk_company_initial = get_field('spk_company_initial');
	$spk_company_full = get_field('spk_company_full');
	$spk_top_subject = get_field('spk_top_subject');
	$spk_subject = get_field('spk_subject');
	$spk_keynote = get_field('spk_keynote');
	$spk_time = get_field('spk_time');
	$spk_color = get_field('spk_color');

	$_data['spk_thumbnail_img_url'] = $thumbnail_url[0];
	$_data['spk_logo'] = $spk_logo;
	$_data['spk_name'] = $spk_name;
	$_data['spk_position'] = $spk_position;
	$_data['spk_company_initial'] = $spk_company_initial;
	$_data['spk_company_full'] = $spk_company_full;
	$_data['spk_top_subject'] = $spk_top_subject;
	$_data['spk_subject'] = $spk_subject;
	$_data['spk_keynote'] = $spk_keynote;
	$_data['spk_time'] = $spk_time;
	$_data['spk_color'] = $spk_color;

	$data->data = $_data;

	return $data;
}
add_filter('rest_prepare_speaker', 'prepare_rest_speaker', 10, 3);

//API Committee
function prepare_rest_committee($data, $post, $request){
	$_data = $data->data;

	//Thumbnail
	$thumbnail_id = get_post_thumbnail_id( $post->ID );

	if ( $thumbnail_id ) {
		$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full' );
	} else {
		$thumbnail_url = '/wp-content/themes/martech/assets/images/no-img.jpg';
	}

	//ACF
	$cmt_name = get_field('cmt_name');
	$cmt_position = get_field('cmt_position');
	$cmt_company = get_field('cmt_company');
	$cmt_details = get_field('cmt_details');

	$_data['cmt_thumbnail_img_url'] = $thumbnail_url[0];
	$_data['cmt_name'] = $cmt_name;
	$_data['cmt_position'] = $cmt_position;
	$_data['cmt_company'] = $cmt_company;
	$_data['cmt_details'] = $cmt_details;

	$data->data = $_data;

	return $data;
}
add_filter('rest_prepare_committee', 'prepare_rest_committee', 10, 3);

//API Gallery
function prepare_rest_gallery($data, $post, $request){
	$_data = $data->data;

	//Thumbnail
	$thumbnail_id = get_post_thumbnail_id( $post->ID );

	if ( $thumbnail_id ) {
		$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full' );
	}

	$_data['gall_thumbnail_img_url'] = $thumbnail_url[0];

	$data->data = $_data;

	return $data;
}
add_filter('rest_prepare_gallery', 'prepare_rest_gallery', 10, 3);

//Show fetch data more than 100 items
add_filter( 'rest_speaker_collection_params', function ( $params, WP_Post_Type $post_type ) {
    if ( 'speaker' === $post_type->name && isset( $params['per_page'] ) ) {
        $params['per_page']['maximum'] = 3000;
    }
    return $params;
}, 10, 2 );

add_filter( 'rest_committee_collection_params', function ( $params, WP_Post_Type $post_type ) {
    if ( 'committee' === $post_type->name && isset( $params['per_page'] ) ) {
        $params['per_page']['maximum'] = 1000;
    }
    return $params;
}, 10, 2 );

add_filter( 'rest_gallery_collection_params', function ( $params, WP_Post_Type $post_type ) {
    if ( 'gallery' === $post_type->name && isset( $params['per_page'] ) ) {
        $params['per_page']['maximum'] = 1000;
    }
    return $params;
}, 10, 2 );