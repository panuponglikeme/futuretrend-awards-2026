<?php
    /*
        Template name: Homepage
    */
    get_header();

    $home_hero = get_field('home_hero');
    $home_hero_mobile = get_field('home_hero_mobile');
    $home_hero_cta = get_field('home_hero_cta');
    $home_title_switch = get_field('home_title_switch');
    $home_title = get_field('home_title');
    $home_subtitle = get_field('home_subtitle');
    $home_title_details = get_field('home_title_details');

    $home_video_switch = get_field('home_video_switch');
    $home_video_bg = get_field('home_video_bg');
    $home_video_bg_mobile = get_field('home_video_bg_mobile');
    $home_video_title = get_field('home_video_title');
    $home_video_btn_text = get_field('home_video_btn_text');
    $home_video_url = get_field('home_video_url');

    $home_ahead_switch = get_field('home_ahead_switch');
    $home_ahead_bg = get_field('home_ahead_bg');
    $home_ahead_bg_mobile = get_field('home_ahead_bg_mobile');
    $home_ahead_title = get_field('home_ahead_title');
    $home_ahead_subtitle = get_field('home_ahead_subtitle');
    $home_ahead_details = get_field('home_ahead_details');
    $home_ahead_ebook = get_field('home_ahead_ebook');

    $home_awards_bg = get_field('home_awards_bg');
    $home_awards_bg_mobile = get_field('home_awards_bg_mobile');
    $home_awards_title = get_field('home_awards_title');
    $home_awards_details = get_field('home_awards_details');

    $home_cl_bg = get_field('home_cl_bg');
    $home_cl_bg_mobile = get_field('home_cl_bg_mobile');
    $home_cl_corp_title = get_field('home_cl_corp_title');
    $home_cl_corp_awards = get_field('home_cl_corp_awards');
    $home_cl_lead_title = get_field('home_cl_lead_title');
    $home_cl_lead_awards = get_field('home_cl_lead_awards');

    $home_ag_switch = get_field('home_ag_switch');
    $home_ag_bg = get_field('home_ag_bg');
    $home_ag_bg_mobile = get_field('home_ag_bg_mobile');
    $home_ag_title = get_field('home_ag_title');
    $home_ag_date = get_field('home_ag_date');
    $home_ag_details = get_field('home_ag_details');
    $home_ag_logo = get_field('home_ag_logo');
    $home_ag_inv_text = get_field('home_ag_inv_text');

    $home_spk_title = get_field('home_spk_title');

    $home_sp_switch = get_field('home_sp_switch');
    $home_sp_bg = get_field('home_sp_bg');
    $home_sp_bg_mobile = get_field('home_sp_bg_mobile');
    $home_sp_title = get_field('home_sp_title');
    $home_sp_first_sponsor = get_field('home_sp_first_sponsor');
    $home_sp_second_title = get_field('home_sp_second_title');
    $home_sp_second_sponsor = get_field('home_sp_second_sponsor');
    $home_sp_third_title = get_field('home_sp_third_title');
    $home_sp_third_sponsor = get_field('home_sp_third_sponsor');
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

        if ( $home_hero_cta ) {
            echo '<a href="'.$home_hero_cta['url'].'" class="hero-cta" target="'.$home_hero_cta['target'].'">'.$home_hero_cta['title'].'</a>';
        }
    ?>
</div>

<?php if ( $home_title_switch == 'open' ) : ?>
<div class="home-title-wrapper">
    <?php
        if ( $home_title ) {
            echo '<div class="home-title-inner"><h1>'.$home_title.'<span>'.$home_subtitle.'</span></h1></div>';
        }

        if ( $home_title_details ) {
            echo '<div class="details"><p>'.$home_title_details.'</p></div>';
        }
    ?>
</div>
<?php endif; ?>

<?php if ( $home_video_switch == 'open' ) : ?>
<div class="home-video-wrapper">
    <?php if ( $home_video_title ) {
            echo '<h2>'.$home_video_title.'</h2>';
        }
    ?>
    <a href="<?php echo $home_video_url; ?>" class="play play-video"><span class="inner"><?php echo $home_video_btn_text; ?><span class="circle"></span></span></a>
</div>
<?php endif; ?>

<?php if ( $home_ahead_switch == 'open' ) : ?>
<div class="home-ahead-wrapper">
    <div class="inner-wrapper">
        <div class="inner">
            <?php if ( $home_ahead_title ) {
                    echo '<div class="title-wrapper">'.$home_ahead_title.'</div>';
                }
            ?>

            <?php if ( $home_ahead_subtitle ) {
                    echo '<div class="subtitle-wrapper">'.$home_ahead_subtitle.'</div>';
                }
            ?>

            <?php if ( $home_ahead_details ) {
                    echo '<div class="details-wrapper"><div class="details">'.$home_ahead_details.'</div><a href="'.$home_ahead_ebook['url'].'" target="'.$home_ahead_ebook['target'].'">'.$home_ahead_ebook['title'].'</a></div>';
                }
            ?>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="home-awards-wrapper">
    <div class="inner-wrapper">
        <div class="inner">
            <?php if ( $home_awards_title ) {
                    echo '<div class="title-wrapper">'.$home_awards_title.'</div>';
                }
            ?>

            <?php if ( $home_awards_details ) {
                    echo '<div class="details-wrapper"><div class="details">'.$home_awards_details.'</div></div>';
                }
            ?>
        </div>
    </div>
</div>

<div class="home-cl-wrapper">
    <div class="inner-wrapper">
        <?php
            if( $home_cl_corp_title ) {
                echo '<h2>'.$home_cl_corp_title.'</h2>';
            }
        ?>

        <div class="inner corp">
            <?php
                if( $home_cl_corp_awards ) {
                    echo '<div class="awards"><p>'.$home_cl_corp_awards.'</p></div>';
                }
            ?>
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
                        $corp_cate_icon = get_field( 'corp_cate_icon', $_terms->taxonomy . '_' . $_terms->term_id );
                ?>
                
                    <li>
                        <?php
                            if ( $corp_cate_icon ) {
                                echo wp_get_attachment_image( $corp_cate_icon,'full' );
                            }

                            echo '<h3>'.$_terms->name.'</h3>';
                        ?>
                    </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </div>
    </div>

    <div class="inner-wrapper">
        <?php
            if( $home_cl_lead_title ) {
                echo '<h2>'.$home_cl_lead_title.'</h2>';
            }
        ?>

        <div class="inner lead">
            <?php
                if( $home_cl_lead_awards ) {
                    echo '<div class="awards"><p>'.$home_cl_lead_awards.'</p></div>';
                }
            ?>
            <ul>
                <?php
                    $termsLead = get_terms( array(
                        'taxonomy' => 'leader_cat',
                        'hide_empty' => false,
                        'orderby' => 'meta_value_num',
                        'meta_key' => 'lead_cate_order',
                        'order' => 'ASC'
                    ) );
                    foreach ($termsLead as $_terms):
                        $lead_cate_icon = get_field( 'lead_cate_icon', $_terms->taxonomy . '_' . $_terms->term_id );
                ?>
                
                    <li>
                        <?php
                            if ( $lead_cate_icon ) {
                                echo wp_get_attachment_image( $lead_cate_icon,'full' );
                            }

                            echo '<h3>'.$_terms->name.'</h3>';
                        ?>
                    </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</div>

<?php if ( $home_ag_switch == 'open' ) : ?>
<div class="home-ag-wrapper">
    <div class="inner-ag-wrapper">
        <div class="top">
            <div class="top-left">
                <div class="top-left-inner">
                    <?php
                        if ( $home_ag_title ) {
                            echo '<h2>'.$home_ag_title.'</h2>';
                        }

                        if ( $home_ag_date ) {
                            echo '<div class="date-wrapper"><p class="date">'.$home_ag_date.'</p><p class="details">'.$home_ag_details.'</p></div>';
                        }
                    ?>
                </div>
            </div>

            <div class="top-right">
                <?php
                    if( $home_ag_logo ) {
                        echo '<figure class="ag-logo">';
                        echo wp_get_attachment_image( $home_ag_logo, 'full' );
                        echo '</figure>';
                    }
                ?>
            </div>
        </div>

        <?php
            if ( $home_ag_date ) {
                echo '<div class="date-wrapper-mobile"><p class="date">'.$home_ag_date.'</p><p class="details">'.$home_ag_details.'</p></div>';
            }
        ?>

        <div class="listing-wrapper">
            <ul>
                <?php
                    if( have_rows('home_ag_listing') ) :
                        while( have_rows('home_ag_listing') ): the_row();
                        $home_ag_listing_time = get_sub_field('home_ag_listing_time');
                        $home_ag_listing_title = get_sub_field('home_ag_listing_title');
                ?>
                <li class="main-list">
                    <div class="left">
                        <div class="time"><?php echo $home_ag_listing_time; ?></div>
                        <div class="title"><?php echo $home_ag_listing_title; ?></div>
                    </div>

                    <div class="right">
                        <ul>
                            <?php
                                if( have_rows('home_ag_listing_time_list') ) :
                                    while( have_rows('home_ag_listing_time_list') ): the_row();
                                    $the_time_list = get_sub_field('the_time_list');
                            ?>
                            <li class="sub-list">
                                <p><?php echo $the_time_list; ?></p>
                            </li>
                            <?php endwhile; endif; ?>
                        </ul>
                    </div>
                </li>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </ul>
        </div>

        <div class="inv"><?php echo $home_ag_inv_text; ?></div>
    </div>

    <?php
        /**
         * Speaker.
         */
        require get_template_directory() . '/template-parts/homepage-speaker.php';
    ?>

    <img src="/wp-content/themes/futuretrend/assets/images/cube-1.png" class="cube-1">
    <img src="/wp-content/themes/futuretrend/assets/images/cube-3.png" class="cube-3">
</div>
<?php endif; ?>

<?php if ( $home_sp_switch == 'open' ) : ?>
<div class="home-sp-wrapper">
    <div class="inner-wrapper">
        <?php
            if( $home_sp_title ) {
                echo '<h2>'.$home_sp_title.'</h2>';
            }
        ?>

        <?php $terms = get_terms( array(
                'taxonomy' => 'sponsor_cat',
                'hide_empty' => false,
                'orderby' => 'meta_value_num',
                'meta_key' => 'sponsor_tax_order',
                'order' => 'ASC'
            ) );
            foreach ($terms as $_terms):
        ?>
            <h3><?php echo $_terms->name; ?></h3>
            <div class="listing <?php
                                    if ( $_terms->slug == 'title-sponsor' ) {
                                        echo 'title-sponsor-wrapper';
                                    } elseif ( $_terms->slug == 'platinum-sponsors' ) {
                                        echo 'first-wrapper';
                                    } elseif ( $_terms->slug == 'gold-sponsors' ) {
                                        echo 'second-wrapper';
                                    } else {
                                        echo 'third-wrapper';
                                    }
                                ?>">
                <?php
                    $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'sponsor',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'sponsor_cat',
                            'field'    => 'slug',
                            'terms'    => $_terms->slug
                            ),
                        ),
                    );
                    $query_sponsor = new WP_Query( $args );
                    while ( $query_sponsor->have_posts() ):
                    $query_sponsor->the_post();
                    $sponsor_logo = get_field('sponsor_logo');
                ?>
                <?php if ( $sponsor_logo ) { echo '<figure><img src="'.$sponsor_logo.'"></figure>'; } ?>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        <?php endforeach; wp_reset_query(); ?>
    </div>
</div>
<?php endif; ?>

<style>
    .home-video-wrapper {
        background-image: url('<?php echo $home_video_bg; ?>');
    }

    .home-ahead-wrapper .inner-wrapper {
        background-image: url('<?php echo $home_ahead_bg; ?>');
    }

    .home-awards-wrapper {
        background-image: url('<?php echo $home_awards_bg; ?>');
    }

    .home-cl-wrapper {
        background-image: url('<?php echo $home_cl_bg; ?>');
    }

    .home-ag-wrapper {
        background-image: url('<?php echo $home_ag_bg; ?>');
    }

    .home-sp-wrapper {
        background-image: url('<?php echo $home_sp_bg; ?>');
    }

    @media screen and (max-width: 767px) {
        .home-video-wrapper {
            background-image: url('<?php echo $home_video_bg_mobile; ?>');
        }

        .home-ahead-wrapper .inner-wrapper {
            background-image: url('<?php echo $home_ahead_bg_mobile; ?>');
        }

        .home-awards-wrapper {
            background-image: url('<?php echo $home_awards_bg_mobile; ?>');
        }

        .home-cl-wrapper {
            background-image: url('<?php echo $home_cl_bg_mobile; ?>');
        }

        .home-ag-wrapper {
            background-image: url('<?php echo $home_ag_bg_mobile; ?>');
        }

        .home-sp-wrapper {
            background-image: url('<?php echo $home_sp_bg_mobile; ?>');
        }
    }
</style>

<?php get_footer(); ?>