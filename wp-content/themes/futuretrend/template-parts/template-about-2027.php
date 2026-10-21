<?php
    /*
        Template name: About 2027
    */
    get_header('2027');
?>

<main class="ab27">
    <?php // Hero: built from the 2027 design. ?>
    <section class="ab27-hero">
        <div class="ab27-container">
            <h1 class="ab27-hero-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <?php // Video and photo gallery. The gallery is loaded by js/about-2027.js from gallery_cat "2027". ?>
    <section class="ab27-gallery">
        <div class="ab27-container">
            <?php // Video: <a href="{youtube url}" class="ab27-video">, opened in a popup by js/about-2027.js. ?>

            <div class="ab27-photos" data-ab27-photos></div>
            <button type="button" class="ab27-photos-more" data-ab27-photos-more hidden><?php esc_html_e( 'Load more', THEME_TEXTDOMAIN ); ?></button>
        </div>
    </section>

    <?php // Committee: one list per award group, from the committee_cat categories under "2027". ?>
    <section class="ab27-committee">
        <div class="ab27-container">
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
            ?>
                <div class="ab27-committee-group ab27-committee-group--<?php echo esc_attr( $key ); ?>">
                    <ul class="ab27-committee-list">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <li class="ab27-committee-item">
                                <figure class="ab27-committee-photo"><?php the_post_thumbnail( 'full' ); ?></figure>
                                <h3 class="ab27-committee-name"><?php echo esc_html( get_field( 'cmt_name' ) ); ?></h3>
                                <div class="ab27-committee-position"><?php echo esc_html( get_field( 'cmt_position' ) ); ?></div>
                                <div class="ab27-committee-details"><?php echo get_field( 'cmt_details' ); ?></div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </section>

    <?php // Partners: partner_cat "2027". ?>
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
                        'field'    => 'slug',
                        'terms'    => '2027',
                    ),
                ),
            )
        );
        if ( $partners->have_posts() ) :
    ?>
        <section class="ab27-partners">
            <div class="ab27-container">
                <ul class="ab27-partner-list">
                    <?php while ( $partners->have_posts() ) : $partners->the_post(); ?>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <li class="ab27-partner"><?php the_post_thumbnail( 'full' ); ?></li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        </section>
    <?php endif; wp_reset_postdata(); ?>
</main>

<?php get_footer('2027'); ?>
