<?php
    /*
        Template name: Homepage 2027
    */
    get_header('2027');

    // Award groups with their 2027 categories; totals are summed from each category's number of awards.
    $groups = ft_2027_award_groups_data();
    $total_awards = array_sum( wp_list_pluck( $groups, 'total' ) );
    $word_awards  = get_field( 'word_awards', 'option' );

    $home_2027_hero        = get_field('home_2027_hero');
    $home_2027_hero_mobile = get_field('home_2027_hero_mobile');

    $home_2027_ft_tag      = get_field('home_2027_ft_tag');
    $home_2027_ft_title    = get_field('home_2027_ft_title');
    $home_2027_ft_subtitle = get_field('home_2027_ft_subtitle');

    // Title: line 1 as is, line 2 highlighted.
    $title_lines = $home_2027_ft_title ? preg_split( '/\R/', trim( $home_2027_ft_title ), 2 ) : array( get_the_title() );

    // Stat cards from the List field, or the computed numbers when it is empty.
    $stats = get_field('home_2027_ft_list');
    if ( ! $stats ) {
        $stats = array(
            array( 'num' => $total_awards, 'name' => 'รางวัล' ),
            array( 'num' => count( $groups ), 'name' => 'กลุ่มรางวัล' ),
            array( 'num' => 2027, 'name' => 'ประจำปี' ),
        );
    }
?>

<main class="hm27">
    <?php get_template_part( 'template-parts/2027/hero', null, array( 'desktop' => $home_2027_hero, 'mobile' => $home_2027_hero_mobile ) ); ?>

    <?php // Title section under the hero: tag, title, subtitle and stat cards. ?>
    <section class="hm27-intro">
        <div class="hm27-container">
            <?php if ( $home_2027_ft_tag ) : ?>
                <div class="ft27-tag" data-ft27-fade>
                    <img src="<?php echo esc_url( ft_2027_image( 'icon-world.svg' ) ); ?>" alt="" width="16" height="16">
                    <?php echo esc_html( $home_2027_ft_tag ); ?>
                </div>
            <?php endif; ?>

            <h1 class="hm27-intro-title" data-ft27-fade style="--ft27-fade-delay: 0.1s">
                <span class="hm27-intro-title-line"><?php echo esc_html( $title_lines[0] ); ?></span>
                <?php if ( isset( $title_lines[1] ) ) : ?>
                    <span class="hm27-intro-title-highlight"><?php echo esc_html( $title_lines[1] ); ?></span>
                <?php endif; ?>
            </h1>

            <?php if ( $home_2027_ft_subtitle ) : ?>
                <div class="hm27-intro-subtitle" data-ft27-fade style="--ft27-fade-delay: 0.2s"><?php echo wp_kses_post( $home_2027_ft_subtitle ); ?></div>
            <?php endif; ?>

            <ul class="hm27-stat-list">
                <?php foreach ( array_values( $stats ) as $i => $stat ) : ?>
                    <li class="hm27-stat" data-ft27-fade style="--ft27-fade-delay: <?php echo esc_attr( $i * 0.1 ); ?>s">
                        <span class="hm27-stat-num"><?php echo esc_html( $stat['num'] ); ?></span>
                        <img class="hm27-stat-icon" src="<?php echo esc_url( ft_2027_image( sprintf( 'card-section-title-%02d.svg', ( $i % 3 ) + 1 ) ) ); ?>" alt="" width="32" height="32">
                        <span class="hm27-stat-name"><?php echo esc_html( $stat['name'] ); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <?php // Award groups: one card per group, colour set by the group key in _homepage2027.scss. ?>
    <section class="hm27-awards">
        <div class="hm27-container">
            <?php foreach ( $groups as $key => $group ) : ?>
                <article class="hm27-group hm27-group--<?php echo esc_attr( $key ); ?>" data-ft27-fade>
                    <header class="hm27-group-head">
                        <div class="hm27-group-heading">
                            <h2 class="hm27-group-title"><?php echo esc_html( $group['title'] ); ?></h2>
                            <?php if ( $group['desc'] ) : ?>
                                <p class="hm27-group-desc"><?php echo esc_html( $group['desc'] ); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="hm27-group-total">
                            <span class="hm27-group-total-num"><?php echo esc_html( $group['total'] ); ?></span>
                            <span class="hm27-group-total-label"><?php echo esc_html( $word_awards ? $word_awards : 'Awards' ); ?></span>
                        </div>
                    </header>

                    <?php if ( $group['image'] ) : ?>
                        <figure class="hm27-group-image"><?php echo wp_get_attachment_image( $group['image'], 'full' ); ?></figure>
                    <?php endif; ?>

                    <ul class="hm27-cats">
                        <?php foreach ( array_values( $group['terms'] ) as $i => $term ) : ?>
                            <li class="hm27-cat" data-ft27-fade style="--ft27-fade-delay: <?php echo esc_attr( ( $i % 3 ) * 0.08 ); ?>s">
                                <span class="hm27-cat-num"><i class="fa-solid fa-award" aria-hidden="true"></i><?php echo esc_html( get_field( $group['number'], $term ) ); ?></span>
                                <h3 class="hm27-cat-name"><?php echo esc_html( $term->name ); ?></h3>
                                <div class="hm27-cat-desc"><?php echo wp_strip_all_tags( term_description( $term ) ); ?></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php get_footer('2027'); ?>
