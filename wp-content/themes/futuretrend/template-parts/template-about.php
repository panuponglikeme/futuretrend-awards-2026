<?php
    /*
        Template name: About
    */
    get_header();

    $about_hero = get_field('about_hero');
    $about_hero_mobile = get_field('about_hero_mobile');

    $about_obj_bg = get_field('about_obj_bg');
    $about_obj_bg_mobile = get_field('about_obj_bg_mobile');
    $about_obj_title = get_field('about_obj_title');
    $about_obj_subtitle = get_field('about_obj_subtitle');
    $about_obj_details = get_field('about_obj_details');
    $about_obj_listing = get_field('about_obj_listing');
    $about_obj_img = get_field('about_obj_img');

    $about_cmt_switch = get_field('about_cmt_switch');
    $about_cmt_bg = get_field('about_cmt_bg');
    $about_cmt_bg_mobile = get_field('about_cmt_bg_mobile');
    $about_cmt_title = get_field('about_cmt_title');
?>

<div class="about-hero">
    <?php
        if( $about_hero ) {
            echo '<figure class="desktop">';
            echo wp_get_attachment_image( $about_hero, 'full' );
            echo '</figure>';
        }

        if( $about_hero_mobile ) {
            echo '<figure class="mobile">';
            echo wp_get_attachment_image( $about_hero_mobile, 'full' );
            echo '</figure>';
        }
    ?>
</div>

<div class="about-obj-wrapper">
    <div class="inner-wrapper">
        <div class="left">
            <?php
                if( $about_obj_title ) {
                    echo '<h1>'.$about_obj_title.'</h1>';
                }

                if( $about_obj_img ) {
                    echo '<figure class="obj-img">';
                    echo wp_get_attachment_image( $about_obj_img, 'full' );
                    echo '</figure>';
                }
            ?>
        </div>

        <div class="right">
            <h3 class="subtitle"><?php echo $about_obj_subtitle; ?></h3>
            <div class="details"><p><?php echo $about_obj_details; ?></p></div>

            <ul class="listing-wrapper">
                <?php
                    if( have_rows('about_obj_listing') ) :
                        $i = 0;
                        while( have_rows('about_obj_listing') ): the_row();
                        $i++;
                        $about_obj_listing_details = get_sub_field('about_obj_listing_details');
                ?>
                <li><span><?php if ( $i <= 9 ) { echo "0"; }echo $i; ?></span><p><?php echo $about_obj_listing_details; ?></p></li>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</div>

<?php
    /**
     * Committee.
     */
    if ( $about_cmt_switch == 'open' ) {
        require get_template_directory() . '/template-parts/awards-committee.php';
    }
?>

<style>
    .about-obj-wrapper {
        background-image: url('<?php echo $about_obj_bg; ?>');
    }

    .awards-cmt-wrapper {
        background-image: url('<?php echo $about_cmt_bg; ?>');
    }

    @media screen and (max-width: 767px) {
        .about-obj-wrapper {
            background-image: url('<?php echo $about_obj_bg_mobile; ?>');
        }

        .awards-cmt-wrapper {
            background-image: url('<?php echo $about_cmt_bg_mobile; ?>');
        }
    }
</style>

<?php get_footer(); ?>