<?php
    /*
        Template name: Homepage 2025
    */
    get_header('2025');

    $home_2025_hero = get_field('home_2025_hero');
    $home_2025_hero_mobile = get_field('home_2025_hero_mobile');

    $home_ft_title = get_field('home_ft_title');
    $home_ft_subtitle = get_field('home_ft_subtitle');
    $home_ft_details = get_field('home_ft_details');

    $home_corp_main_title = get_field('home_corp_main_title');
    $home_corp_title = get_field('home_corp_title');
    $home_corp_num = get_field('home_corp_num');
    $home_lead_main_title = get_field('home_lead_main_title');
    $home_lead_title = get_field('home_lead_title');
    $home_lead_num = get_field('home_lead_num');

    $word_awards = get_field('word_awards', 'option');
?>

<div id="hero" class="hero">
    <?php
        if( $home_2025_hero ) {
            echo '<figure class="desktop">';
            echo wp_get_attachment_image( $home_2025_hero, 'full' );
            echo '</figure>';
        }

        if( $home_2025_hero_mobile ) {
            echo '<figure class="mobile">';
            echo wp_get_attachment_image( $home_2025_hero_mobile, 'full' );
            echo '</figure>';
        }
    ?>
</div>

<div class="home-ft-wrapper">
    <div class="inner">
        <div class="left"></div>
        <div class="right">
            <h1 class="title"><?php echo $home_ft_title; ?></h1>
            <h2 class="subtitle"><?php echo $home_ft_subtitle; ?></h2>
            <div class="details"><?php echo $home_ft_details; ?></div>
        </div>
    </div>
</div>

<div class="home-cl-2025-wrapper">
    <div class="inner">
        <div class="block corp">
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
                            $corp_cate_icon_2025 = get_field( 'corp_cate_icon_2025', $_terms->taxonomy . '_' . $_terms->term_id );
                    ?>
                    
                        <li>
                            <?php
                                if ( $corp_cate_icon_2025 ) {
                                    echo wp_get_attachment_image( $corp_cate_icon_2025,'full' );
                                }

                                echo '<h3>'.$_terms->name.'</h3>';
                            ?>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>
                </ul>
            </div>
        </div>

        <div class="block lead">
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
                            $lead_cate_icon_2025 = get_field( 'lead_cate_icon_2025', $_terms->taxonomy . '_' . $_terms->term_id );
                    ?>
                    
                        <li>
                            <?php
                                if ( $lead_cate_icon_2025 ) {
                                    echo wp_get_attachment_image( $lead_cate_icon_2025,'full' );
                                }

                                echo '<h3>'.$_terms->name.'</h3>';
                            ?>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>
                </ul>
            </div>
        </div>

    </div>
</div>

<?php get_footer('2025'); ?>