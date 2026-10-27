<?php
    /*
        Template name: About 2027
    */
    get_header('2027');

    $about_2027_hero_tag    = get_field('about_2027_hero_tag');
    $about_2027_hero_title  = get_field('about_2027_hero_title');
    $about_2027_hero_desc   = get_field('about_2027_hero_desc');
    $about_2027_hero_trophy = get_field('about_2027_hero_trophy');

    $about_2027_obj_tag   = get_field('about_2027_obj_tag');
    $about_2027_obj_title = get_field('about_2027_obj_title');
    $about_2027_obj_label = get_field('about_2027_obj_label');
    $about_2027_obj_items = get_field('about_2027_obj_items');

    $about_2027_video_title           = get_field('about_2027_video_title');
    $about_2027_video_title_highlight = get_field('about_2027_video_title_highlight');
    $about_2027_video_subtitle        = get_field('about_2027_video_subtitle');
    $about_2027_video_bg              = get_field('about_2027_video_bg');
    $about_2027_video                 = get_field('about_2027_video');

    $about_2027_gall_tag      = get_field('about_2027_gall_tag');
    $about_2027_gall_title    = get_field('about_2027_gall_title');
    $about_2027_gall_subtitle = get_field('about_2027_gall_subtitle');
    $about_2027_gall_more     = get_field('about_2027_gall_more');

    $about_2027_comm_tag = get_field('about_2027_comm_tag');

    $about_2027_pn_year            = get_field('about_2027_pn_year');
    $about_2027_pn_title           = get_field('about_2027_pn_title');
    $about_2027_pn_title_highlight = get_field('about_2027_pn_title_highlight');
    $about_2027_pn_subtitle        = get_field('about_2027_pn_subtitle');

    $gallery   = ft_2027_about_gallery();
    $icon_star = ft_2027_icon_star();
    $icon_world = '<img class="ft27-tag-icon" src="' . esc_url( ft_2027_image( 'icon-world.svg' ) ) . '" alt="" width="16" height="16">';

    // Hero title: line 1 as is, line 2 highlighted.
    $hero_lines = $about_2027_hero_title ? preg_split( '/\R/', trim( $about_2027_hero_title ), 2 ) : array();
?>

<main class="ab27<?php echo $about_2027_hero_trophy ? '' : ' ab27--no-trophy'; ?>">
    <?php // Hero: text, then the trophy, which runs over the Objective section below (_about2027.scss). ?>
    <section class="ab27-hero">
        <div class="ab27-container">
            <?php if ( $about_2027_hero_tag ) : ?>
                <div class="ft27-tag ab27-hero-tag"><?php echo $icon_star; ?><?php echo esc_html( $about_2027_hero_tag ); ?></div>
            <?php endif; ?>

            <?php if ( $hero_lines ) : ?>
                <h1 class="ab27-hero-title">
                    <span class="ab27-hero-title-line"><?php echo esc_html( $hero_lines[0] ); ?></span>
                    <?php if ( isset( $hero_lines[1] ) ) : ?>
                        <span class="ab27-hero-title-highlight"><?php echo esc_html( $hero_lines[1] ); ?></span>
                    <?php endif; ?>
                </h1>
            <?php endif; ?>

            <?php if ( $about_2027_hero_desc ) : ?>
                <p class="ab27-hero-desc"><?php echo wp_kses( $about_2027_hero_desc, array( 'br' => array() ) ); ?></p>
            <?php endif; ?>

            <?php if ( $about_2027_hero_trophy ) : ?>
                <figure class="ab27-hero-trophy"><?php echo wp_get_attachment_image( $about_2027_hero_trophy, 'full', false, array( 'fetchpriority' => 'high' ) ); ?></figure>
            <?php endif; ?>
        </div>
    </section>

    <?php // Objective ?>
    <section class="ab27-objective">
        <div class="ab27-container">
            <?php if ( $about_2027_obj_tag ) : ?>
                <div class="ft27-tag" data-ft27-fade><?php echo $icon_star; ?><?php echo esc_html( $about_2027_obj_tag ); ?></div>
            <?php endif; ?>

            <?php if ( $about_2027_obj_title ) : ?>
                <h2 class="ab27-objective-title" data-ft27-fade style="--ft27-fade-delay: 0.1s"><?php echo esc_html( $about_2027_obj_title ); ?></h2>
            <?php endif; ?>

            <?php if ( $about_2027_obj_items ) : ?>
                <ol class="ab27-objective-list">
                    <?php foreach ( array_values( $about_2027_obj_items ) as $i => $item ) : ?>
                        <li class="ab27-objective-item" data-ft27-fade style="--ft27-fade-delay: <?php echo esc_attr( $i * 0.1 ); ?>s">
                            <?php if ( $about_2027_obj_label ) : ?>
                                <span class="ft27-tag ab27-objective-label"><?php echo $icon_star; ?><?php echo esc_html( str_replace( '{n}', $i + 1, $about_2027_obj_label ) ); ?></span>
                            <?php endif; ?>
                            <p class="ab27-objective-details"><?php echo wp_kses( $item['details'], array( 'br' => array() ) ); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
    </section>

    <?php // The Night of Excellence: video popup (js/about-2027.js) ?>
    <?php if ( $about_2027_video_bg || $about_2027_video_title ) : ?>
        <section class="ab27-video">
            <div class="ab27-container">
                <div class="ab27-video-panel" data-ft27-fade>
                    <?php if ( $about_2027_video_title || $about_2027_video_title_highlight ) : ?>
                        <h2 class="ab27-title">
                            <?php echo esc_html( $about_2027_video_title ); ?>
                            <?php if ( $about_2027_video_title_highlight ) : ?>
                                <span class="ab27-title-highlight"><?php echo esc_html( $about_2027_video_title_highlight ); ?></span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ( $about_2027_video_subtitle ) : ?>
                        <p class="ab27-subtitle"><?php echo esc_html( $about_2027_video_subtitle ); ?></p>
                    <?php endif; ?>

                    <?php if ( $about_2027_video_bg ) : ?>
                        <figure class="ab27-video-cover">
                            <?php echo wp_get_attachment_image( $about_2027_video_bg, 'full' ); ?>
                            <?php if ( $about_2027_video ) : ?>
                                <a href="<?php echo esc_url( $about_2027_video ); ?>" class="ab27-video-play" aria-label="<?php esc_attr_e( 'Play video', THEME_TEXTDOMAIN ); ?>"><i class="fa-solid fa-play" aria-hidden="true"></i></a>
                            <?php endif; ?>
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php // Gallery: photos of the chosen Gallery Category, loaded by js/about-2027.js; hidden while the category has no photos. ?>
    <?php if ( $gallery['total'] ) : ?>
        <section class="ab27-gallery">
            <div class="ab27-container">
                <?php if ( $about_2027_gall_tag ) : ?>
                    <div class="ft27-tag" data-ft27-fade><?php echo $icon_world; ?><?php echo esc_html( $about_2027_gall_tag ); ?></div>
                <?php endif; ?>

                <?php if ( $about_2027_gall_title ) : ?>
                    <h2 class="ab27-title" data-ft27-fade style="--ft27-fade-delay: 0.1s"><span class="ab27-title-highlight"><?php echo esc_html( $about_2027_gall_title ); ?></span></h2>
                <?php endif; ?>

                <?php if ( $about_2027_gall_subtitle ) : ?>
                    <p class="ab27-subtitle" data-ft27-fade style="--ft27-fade-delay: 0.2s"><?php echo esc_html( $about_2027_gall_subtitle ); ?></p>
                <?php endif; ?>

                <ul class="ab27-photos" data-ab27-photos></ul>

                <button type="button" class="ab27-photos-more" data-ab27-photos-more hidden>
                    <?php echo esc_html( $about_2027_gall_more ? $about_2027_gall_more : __( 'Show more', THEME_TEXTDOMAIN ) ); ?>
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </button>
            </div>
        </section>
    <?php endif; ?>

    <?php // Committee: one list per award group (committee_cat under "2027"), titled as in 2026; groups without members are hidden. ?>
    <?php
        foreach ( ft_2027_committee_groups() as $key => $slug ) :
            $query = new WP_Query(
                array(
                    'post_type'      => 'committee',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'committee_cat',
                            'field'    => 'slug',
                            'terms'    => $slug,
                        ),
                    ),
                )
            );
            if ( ! $query->have_posts() ) {
                continue;
            }

            // From the page: the previous group's loop has moved the global post.
            $field    = 'about_2027_comm_' . str_replace( '-', '_', $key );
            $title    = get_field( $field . '_title', get_queried_object_id() );
            $subtitle = get_field( $field . '_subtitle', get_queried_object_id() );
    ?>
        <section class="ab27-committee ab27-committee--<?php echo esc_attr( $key ); ?>">
            <div class="ab27-container">
                <?php if ( $about_2027_comm_tag ) : ?>
                    <div class="ft27-tag" data-ft27-fade><?php echo $icon_world; ?><?php echo esc_html( $about_2027_comm_tag ); ?></div>
                <?php endif; ?>

                <?php if ( $title || $subtitle ) : ?>
                    <h2 class="ab27-title" data-ft27-fade style="--ft27-fade-delay: 0.1s">
                        <?php if ( $title ) : ?>
                            <span class="ab27-title-highlight"><?php echo esc_html( $title ); ?></span>
                        <?php endif; ?>
                        <?php echo esc_html( $subtitle ); ?>
                    </h2>
                <?php endif; ?>

                <ul class="ab27-members">
                    <?php
                        $i = 0;
                        while ( $query->have_posts() ) :
                            $query->the_post();
                            $role = array_filter( array(
                                trim( (string) get_field( 'cmt_position' ) ),
                                trim( wp_strip_all_tags( (string) get_field( 'cmt_details' ) ) ),
                            ) );
                    ?>
                        <li class="ab27-member" data-ft27-fade style="--ft27-fade-delay: <?php echo esc_attr( ( $i++ % 3 ) * 0.1 ); ?>s">
                            <figure class="ab27-member-photo"><?php the_post_thumbnail( 'full' ); ?></figure>
                            <div class="ab27-member-body">
                                <h3 class="ab27-member-name"><?php echo esc_html( get_field( 'cmt_name' ) ); ?></h3>
                                <?php if ( $role ) : ?>
                                    <p class="ab27-member-role"><?php echo esc_html( implode( ' : ', $role ) ); ?></p>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
            </div>
        </section>
    <?php endforeach; ?>

    <?php // Partners: the chosen Partner Category; hidden while it has no partners. ?>
    <?php
        $partners = new WP_Query(
            array(
                'post_type'      => 'partner',
                'orderby'        => 'date',
                'order'          => 'DESC',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'partner_cat',
                        'field'    => 'term_id',
                        'terms'    => (int) $about_2027_pn_year,
                    ),
                ),
            )
        );
        if ( $about_2027_pn_year && $partners->have_posts() ) :
    ?>
        <section class="ab27-partners">
            <div class="ab27-container">
                <?php if ( $about_2027_pn_title || $about_2027_pn_title_highlight ) : ?>
                    <h2 class="ab27-title" data-ft27-fade>
                        <?php echo esc_html( $about_2027_pn_title ); ?>
                        <?php if ( $about_2027_pn_title_highlight ) : ?>
                            <span class="ab27-title-highlight"><?php echo esc_html( $about_2027_pn_title_highlight ); ?></span>
                        <?php endif; ?>
                    </h2>
                <?php endif; ?>

                <?php if ( $about_2027_pn_subtitle ) : ?>
                    <p class="ab27-subtitle" data-ft27-fade style="--ft27-fade-delay: 0.1s"><?php echo esc_html( $about_2027_pn_subtitle ); ?></p>
                <?php endif; ?>

                <ul class="ab27-partner-list">
                    <?php
                        $i = 0;
                        while ( $partners->have_posts() ) :
                            $partners->the_post();
                            if ( ! has_post_thumbnail() ) {
                                continue;
                            }
                    ?>
                        <li class="ab27-partner" data-ft27-fade style="--ft27-fade-delay: <?php echo esc_attr( ( $i++ % 4 ) * 0.1 ); ?>s"><?php the_post_thumbnail( 'full' ); ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </section>
    <?php endif; wp_reset_postdata(); ?>
</main>

<?php get_footer('2027'); ?>
