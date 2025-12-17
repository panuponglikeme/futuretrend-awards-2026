<?php
    /*
        Template name: Awards
    */
    get_header();

    $awards_hero = get_field('awards_hero');
    $awards_hero_mobile = get_field('awards_hero_mobile');
    $awards_title = get_field('awards_title');
    $awards_subtitle = get_field('awards_subtitle');
    $awards_title_details = get_field('awards_title_details');

    $awards_corp_title = get_field('awards_corp_title');
    $awards_lead_title = get_field('awards_lead_title');
    $awards_cl_bg = get_field('awards_cl_bg');
    $awards_cl_bg_mobile = get_field('awards_cl_bg_mobile');

    $awards_cl_factsheet_text = get_field('awards_cl_factsheet_text');
    $awards_cl_factsheet = get_field('awards_cl_factsheet');

    $awards_process_bg = get_field('awards_process_bg');
    $awards_process_bg_mobile = get_field('awards_process_bg_mobile');
    $awards_process_title = get_field('awards_process_title');

    $awards_process_img_desktop = get_field('awards_process_img_desktop');
    $awards_process_img_mobile_step_1 = get_field('awards_process_img_mobile_step_1');
    $awards_process_img_mobile_step_2 = get_field('awards_process_img_mobile_step_2');
    $awards_process_img_mobile_step_3 = get_field('awards_process_img_mobile_step_3');
    $awards_process_step_1 = get_field('awards_process_step_1');
    $awards_process_step_2 = get_field('awards_process_step_2');
    $awards_process_step_3 = get_field('awards_process_step_3');
    $awards_process_banner = get_field('awards_process_banner');
    $awards_process_banner_mobile = get_field('awards_process_banner_mobile');

    $awards_cmt_switch = get_field('awards_cmt_switch');
    $awards_cmt_bg = get_field('awards_cmt_bg');
    $awards_cmt_bg_mobile = get_field('awards_cmt_bg_mobile');
    $awards_cmt_title = get_field('awards_cmt_title');
?>

<div class="awards-hero">
    <?php
        if( $awards_hero ) {
            echo '<figure class="desktop">';
            echo wp_get_attachment_image( $awards_hero, 'full' );
            echo '</figure>';
        }

        if( $awards_hero_mobile ) {
            echo '<figure class="mobile">';
            echo wp_get_attachment_image( $awards_hero_mobile, 'full' );
            echo '</figure>';
        }
    ?>
</div>

<div class="awards-process-wrapper">
    <div class="inner-wrapper">
        <?php
            if( $awards_process_title ) {
                echo '<div class="title-wrapper">'.$awards_process_title.'</div>';
            }
        ?>

        <div class="inner-process" style="background-image: url('<?php echo $awards_process_img_desktop; ?>');">
            <div class="process-details-wrapper">
                <div class="listing">
                    <div class="img-mobile">
                        <?php
                            if( $awards_process_img_mobile_step_1 ) {
                                echo wp_get_attachment_image( $awards_process_img_mobile_step_1, 'full' );
                            }
                        ?>
                    </div>

                    <div class="details">
                        <?php echo $awards_process_step_1; ?>
                    </div>
                </div>

                <div class="listing">
                    <div class="img-mobile">
                        <?php
                            if( $awards_process_img_mobile_step_2 ) {
                                echo wp_get_attachment_image( $awards_process_img_mobile_step_2, 'full' );
                            }
                        ?>
                    </div>

                    <div class="details">
                        <?php echo $awards_process_step_2; ?>
                    </div>
                </div>

                <div class="listing">
                    <div class="img-mobile">
                        <?php
                            if( $awards_process_img_mobile_step_3 ) {
                                echo wp_get_attachment_image( $awards_process_img_mobile_step_3, 'full' );
                            }
                        ?>
                    </div>

                    <div class="details">
                        <?php echo $awards_process_step_3; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        if( $awards_process_banner ) {
            echo '<div class="inner-banner-wrapper desktop"><figure class="desktop">';
            echo wp_get_attachment_image( $awards_process_banner, 'full' );
            echo '</figure></div>';
        }

        if( $awards_process_banner_mobile ) {
            echo '<div class="inner-banner-wrapper mobile"><figure class="mobile">';
            echo wp_get_attachment_image( $awards_process_banner_mobile, 'full' );
            echo '</figure></div>';
        }
    ?>
    </div>
</div>

<div id="awards-title" class="awards-title-wrapper">
    <div class="inner">
        <div class="left">
            <div class="title"><?php echo $awards_title; ?></div>
        </div>

        <div class="right">
            <div class="subtitle"><?php echo $awards_subtitle; ?></div>
            <div class="details"><?php echo $awards_title_details; ?></div>
        </div>
    </div>
</div>

<?php
    /**
     * Corp & Lead Update
     */
    require get_template_directory() . '/template-parts/awards-corp-lead-update.php';
?>

<?php
    /**
     * Committee.
     */
    if ( $awards_cmt_switch == 'open' ) {
        require get_template_directory() . '/template-parts/awards-committee.php';
    }
?>

<style>
    .awards-cl-wrapper {
        background-image: url('<?php echo $awards_cl_bg; ?>');
    }

    .awards-process-wrapper {
        background-image: url('<?php echo $awards_process_bg; ?>');
    }

    .awards-cmt-wrapper {
        background-image: url('<?php echo $awards_cmt_bg; ?>');
    }

    @media screen and (max-width: 767px) {
        .awards-cl-wrapper {
            background-image: url('<?php echo $awards_cl_bg_mobile; ?>');
        }

        .awards-process-wrapper {
            background-image: url('<?php echo $awards_process_bg_mobile; ?>');
        }

        .awards-cmt-wrapper {
            background-image: url('<?php echo $awards_cmt_bg_mobile; ?>');
        }
    }
</style>

<?php get_footer(); ?>