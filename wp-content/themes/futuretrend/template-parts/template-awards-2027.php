<?php
    /*
        Template name: Awards 2027
    */
    get_header('2027');

    $awards_2027_hero        = get_field('awards_2027_hero');
    $awards_2027_hero_mobile = get_field('awards_2027_hero_mobile');

    $awards_2027_process_subtitle = get_field('awards_2027_process_subtitle');
    $awards_2027_process_title    = get_field('awards_2027_process_title');
    $awards_2027_process_steps    = get_field('awards_2027_process_steps');

    $awards_2027_section_tag             = get_field('awards_2027_section_tag');
    $awards_2027_section_title           = get_field('awards_2027_section_title');
    $awards_2027_section_title_highlight = get_field('awards_2027_section_title_highlight');
    $awards_2027_section_subtitle        = get_field('awards_2027_section_subtitle');

    // Process title: line 1 as is, line 2 highlighted.
    $process_lines = $awards_2027_process_title ? preg_split( '/\R/', trim( $awards_2027_process_title ), 2 ) : array();

    // Subtitle placeholders {total} and {groups}, counted from the 2027 categories.
    $groups = ft_2027_award_groups_data();
    $awards_2027_section_subtitle = strtr(
        (string) $awards_2027_section_subtitle,
        array(
            '{total}'  => array_sum( wp_list_pluck( $groups, 'total' ) ),
            '{groups}' => count( $groups ),
        )
    );
?>

<main class="aw27">
    <?php get_template_part( 'template-parts/2027/hero', null, array( 'desktop' => $awards_2027_hero, 'mobile' => $awards_2027_hero_mobile ) ); ?>

    <?php // 3 Steps Award Process ?>
    <section class="aw27-process">
        <div class="aw27-container">
            <?php if ( $awards_2027_process_subtitle ) : ?>
                <div class="ft27-tag" data-ft27-fade><?php echo ft_2027_icon_star(); ?><?php echo esc_html( $awards_2027_process_subtitle ); ?></div>
            <?php endif; ?>

            <?php if ( $process_lines ) : ?>
                <h1 class="aw27-process-title" data-ft27-fade style="--ft27-fade-delay: 0.1s">
                    <span class="aw27-process-title-line"><?php echo esc_html( $process_lines[0] ); ?></span>
                    <?php if ( isset( $process_lines[1] ) ) : ?>
                        <span class="aw27-process-title-highlight"><?php echo esc_html( $process_lines[1] ); ?></span>
                    <?php endif; ?>
                </h1>
            <?php endif; ?>

            <?php if ( $awards_2027_process_steps ) : ?>
                <ol class="aw27-steps">
                    <?php foreach ( array_values( $awards_2027_process_steps ) as $i => $step ) : ?>
                        <li class="aw27-step" data-ft27-fade style="--ft27-fade-delay: <?php echo esc_attr( $i * 0.1 ); ?>s">
                            <span class="aw27-step-icon"><?php echo ft_2027_icon( $step ); ?></span>
                            <div class="aw27-step-details"><?php echo wp_kses_post( $step['details'] ); ?></div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
    </section>

    <?php // Celebrating Award: group tabs, then each group's categories and winners. ?>
    <section class="aw27-awards" id="awards" data-aw27-awards>
        <div class="aw27-celebrate">
            <div class="aw27-container">
                <?php if ( $awards_2027_section_tag ) : ?>
                    <div class="ft27-tag" data-ft27-fade><?php echo ft_2027_icon_star(); ?><?php echo esc_html( $awards_2027_section_tag ); ?></div>
                <?php endif; ?>

                <h2 class="aw27-celebrate-title" data-ft27-fade style="--ft27-fade-delay: 0.1s">
                    <?php echo esc_html( $awards_2027_section_title ); ?>
                    <?php if ( $awards_2027_section_title_highlight ) : ?>
                        <span class="aw27-celebrate-title-highlight"><?php echo esc_html( $awards_2027_section_title_highlight ); ?></span>
                    <?php endif; ?>
                </h2>

                <?php if ( $awards_2027_section_subtitle ) : ?>
                    <p class="aw27-celebrate-subtitle" data-ft27-fade style="--ft27-fade-delay: 0.2s"><?php echo esc_html( $awards_2027_section_subtitle ); ?></p>
                <?php endif; ?>

                <?php get_template_part( 'template-parts/2027/award-groups', null, array( 'part' => 'tabs' ) ); ?>
            </div>
        </div>

        <div class="aw27-results">
            <div class="aw27-container">
                <?php get_template_part( 'template-parts/2027/award-groups', null, array( 'part' => 'panels' ) ); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer('2027'); ?>
