<?php
    /*
        Template name: Homepage 2026
    */
    get_header('2025');

    $home_hero = get_field('home_hero');
    $home_hero_mobile = get_field('home_hero_mobile');

    $home_ft_title = get_field('home_ft_title');
    $home_ft_subtitle = get_field('home_ft_subtitle');
    $home_ft_details = get_field('home_ft_details');

    $home_corp_main_title = get_field('home_corp_main_title');
    $home_corp_title = get_field('home_corp_title');
    $home_corp_num = get_field('home_corp_num');

    $home_better_world_main_title = get_field('home_better_world_main_title');
    $home_better_world_title = get_field('home_better_world_title');
    $home_better_world_num = get_field('home_better_world_num');

    $home_bel_main_title = get_field('home_bel_main_title');
    $home_bel_title = get_field('home_bel_title');
    $home_bel_num = get_field('home_bel_num');

    $home_lead_main_title = get_field('home_lead_main_title');
    $home_lead_title = get_field('home_lead_title');
    $home_lead_num = get_field('home_lead_num');

    $word_awards = get_field('word_awards', 'option');
?>

<div id="hero" class="hero">
    <?php
        if( $home_hero ) {
            echo '<figure class="desktop">';
            echo wp_get_attachment_image( $home_hero, 'full' );
            echo '</figure>';
        }

        if( $home_hero_mobile ) {
            echo '<figure class="mobile">';
            echo wp_get_attachment_image( $home_hero_mobile, 'full' );
            echo '</figure>';
        }
    ?>
</div>

<div class="home-ft-wrapper">
    <div class="inner">
        <div class="block">
            <figure class="icon"></figure>
            <h1 class="title"><?php echo $home_ft_title; ?></h1>
            <h2 class="subtitle"><?php echo $home_ft_subtitle; ?></h2>
        </div>

        <?php
            if( have_rows('home_ft_list') ) :
                echo '<ul class="block-list">';
                while( have_rows('home_ft_list') ): the_row();
                $num = get_sub_field('num');
                $name = get_sub_field('name');
        ?>
        <li><div class="num"><?php echo $num; ?></div><div class="name"><?php echo $name; ?></div></li>
        <?php endwhile; echo '</ul>'; endif; wp_reset_postdata(); ?>
    </div>
</div>

<div class="home-cl-2025-wrapper">
    <div class="inner">
        <div class="block corp">
            <div class="blur"></div>
            <div class="top">
                <div class="title-wrapper">
                    <h2 class="main-title"><?php echo $home_corp_main_title; ?></h2>
                    <h3 class="title"><?php echo $home_corp_title; ?></h3>
                </div>

                <div class="num-wrapper">
                    <p class="num"><?php echo $home_corp_num; ?></p>
                    <p class="word"><?php echo $word_awards; ?></p>
                </div>
            </div>

            <div class="cate-wrapper">
                <ul>
                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'corporate_cat',
                            'hide_empty' => false,
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'corp_cate_order',
                            'order' => 'ASC'
                        ) );
                        foreach ($terms as $_terms):
                            $corp_cate_number_awards = get_field( 'corp_cate_number_awards', $_terms->taxonomy . '_' . $_terms->term_id );
                            $description = get_term_field( 'description', $_terms );
                    ?>
                    
                        <li>
                            <?php
                                if ( $corp_cate_number_awards ) {
                                    echo '<div class="number-block"><div class="num">'.$corp_cate_number_awards.'</div><div class="text">'.$word_awards.'</div></div>';
                                }

                                echo '<h3>'.$_terms->name.'</h3><div class="content">'.$description.'</div>';
                            ?>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>
                </ul>
            </div>
        </div>

        <div class="block better">
            <div class="blur"></div>
            <div class="top">
                <div class="title-wrapper">
                    <h2 class="main-title"><?php echo $home_better_world_main_title; ?></h2>
                    <h3 class="title"><?php echo $home_better_world_title; ?></h3>
                </div>

                <div class="num-wrapper">
                    <p class="num"><?php echo $home_better_world_num; ?></p>
                    <p class="word"><?php echo $word_awards; ?></p>
                </div>
            </div>

            <div class="cate-wrapper">
                <ul>
                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'better_world_cat',
                            'hide_empty' => false,
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'bett_corp_cate_order',
                            'order' => 'ASC'
                        ) );
                        foreach ($terms as $_terms):
                            $bett_corp_cate_number_awards = get_field( 'bett_corp_cate_number_awards', $_terms->taxonomy . '_' . $_terms->term_id );
                            $description = get_term_field( 'description', $_terms );
                    ?>
                    
                        <li>
                            <?php
                                if ( $bett_corp_cate_number_awards ) {
                                    echo '<div class="number-block"><div class="num">'.$bett_corp_cate_number_awards.'</div><div class="text">'.$word_awards.'</div></div>';
                                }

                                echo '<h3>'.$_terms->name.'</h3><div class="content">'.$description.'</div>';
                            ?>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>
                </ul>
            </div>
        </div>

        <div class="block beloved">
            <div class="blur"></div>
            <div class="top">
                <div class="title-wrapper">
                    <h2 class="main-title"><?php echo $home_bel_main_title; ?></h2>
                    <h3 class="title"><?php echo $home_bel_title; ?></h3>
                </div>

                <div class="num-wrapper">
                    <p class="num"><?php echo $home_bel_num; ?></p>
                    <p class="word"><?php echo $word_awards; ?></p>
                </div>
            </div>

            <div class="cate-wrapper">
                <ul>
                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'beloved_employer_cat',
                            'hide_empty' => false,
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'beloved_cate_order',
                            'order' => 'ASC'
                        ) );
                        foreach ($terms as $_terms):
                            $beloved_cate_number_awards = get_field( 'beloved_cate_number_awards', $_terms->taxonomy . '_' . $_terms->term_id );
                            $description = get_term_field( 'description', $_terms );
                    ?>
                    
                        <li>
                            <?php
                                if ( $beloved_cate_number_awards ) {
                                    echo '<div class="number-block"><div class="num">'.$beloved_cate_number_awards.'</div><div class="text">'.$word_awards.'</div></div>';
                                }

                                echo '<h3>'.$_terms->name.'</h3><div class="content">'.$description.'</div>';
                            ?>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>
                </ul>
            </div>
        </div>

        <div class="block lead">
            <div class="blur"></div>
            <div class="top">
                <div class="title-wrapper">
                    <h2 class="main-title"><?php echo $home_lead_main_title; ?></h2>
                    <h3 class="title"><?php echo $home_lead_title; ?></h3>
                </div>

                <div class="num-wrapper">
                    <p class="num"><?php echo $home_lead_num; ?></p>
                    <p class="word"><?php echo $word_awards; ?></p>
                </div>
            </div>

            <div class="cate-wrapper">
                <ul>
                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'leader_cat',
                            'hide_empty' => false,
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'lead_cate_order',
                            'order' => 'ASC'
                        ) );
                        foreach ($terms as $_terms):
                            $lead_cate_number_awards = get_field( 'lead_cate_number_awards', $_terms->taxonomy . '_' . $_terms->term_id );
                            $description = get_term_field( 'description', $_terms );
                    ?>
                    
                        <li>
                            <?php
                                if ( $lead_cate_number_awards ) {
                                    echo '<div class="number-block"><div class="num">'.$lead_cate_number_awards.'</div><div class="text">'.$word_awards.'</div></div>';
                                }

                                echo '<h3>'.$_terms->name.'</h3><div class="content">'.$description.'</div>';
                            ?>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>
                </ul>
            </div>
        </div>

    </div>
</div>

<?php get_footer('2025'); ?>