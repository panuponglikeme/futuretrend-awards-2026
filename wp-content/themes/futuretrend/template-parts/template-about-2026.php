<?php
    /*
        Template name: About 2026
    */
    get_header('2025');

    $about_2026_hero_desktop = get_field('about_2026_hero_desktop');
    $about_2026_hero_mobile = get_field('about_2026_hero_mobile');

    $about_2026_obj_title = get_field('about_2026_obj_title');
    $about_2026_obj_subtitle = get_field('about_2026_obj_subtitle');
    $about_2026_obj_details = get_field('about_2026_obj_details');

    $about_2026_gall_title = get_field('about_2026_gall_title');
    $about_2026_gall_subtitle = get_field('about_2026_gall_subtitle');
    $about_2026_gall_title_details = get_field('about_2026_gall_title_details');
    $about_2026_video_bg = get_field('about_2026_video_bg');
    $about_2026_video = get_field('about_2026_video');
    $about_2026_title_photo_gallery = get_field('about_2026_title_photo_gallery');
    $about_2026_subtitle_photo_gallery = get_field('about_2026_subtitle_photo_gallery');

    $about_2026_comm_corp_title = get_field('about_2026_comm_corp_title');
    $about_2026_comm_corp_subtitle = get_field('about_2026_comm_corp_subtitle');
    $about_2026_comm_better_title = get_field('about_2026_comm_better_title');
    $about_2026_comm_better_subtitle = get_field('about_2026_comm_better_subtitle');
    $about_2026_comm_beloved_title = get_field('about_2026_comm_beloved_title');
    $about_2026_comm_beloved_subtitle = get_field('about_2026_comm_beloved_subtitle');
    $about_2026_comm_lead_title = get_field('about_2026_comm_lead_title');
    $about_2026_comm_lead_subtitle = get_field('about_2026_comm_lead_subtitle');

    $about_2026_pn_title = get_field('about_2026_pn_title');
    $about_2026_pn_subtitle = get_field('about_2026_pn_subtitle');

    $word_show_me_more = get_field('word_show_me_more', 'option');
?>

<div class="about-2025-hero">
    <?php
        if( $about_2026_hero_desktop ) {
            echo '<figure class="desktop">';
            echo wp_get_attachment_image( $about_2026_hero_desktop, 'full' );
            echo '</figure>';
        }

        if( $about_2026_hero_mobile ) {
            echo '<figure class="mobile">';
            echo wp_get_attachment_image( $about_2026_hero_mobile, 'full' );
            echo '</figure>';
        }
    ?>
</div>

<div class="about-2025-obj-wrapper">
    <div class="inner-wrapper">
        <h1><?php echo $about_2026_obj_title; ?></h1>
        <div class="subtitle"><?php echo $about_2026_obj_subtitle; ?></div>

        <ul class="listing-wrapper">
            <?php
                if( have_rows('about_2026_obj_listing') ) :
                    $i = 0;
                    while( have_rows('about_2026_obj_listing') ): the_row();
                    $i++;
                    $listing_details = get_sub_field('listing_details');
            ?>
            <li><?php echo $listing_details; ?></li>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
    </div>
</div>

<div class="about-2025-gall-wrapper">
    <div class="inner-wrapper">
        <h2><?php echo $about_2026_gall_title; ?></h2>
        <h3><?php echo $about_2026_gall_subtitle; ?></h3>
        <h4><?php echo $about_2026_gall_title_details; ?></h4>

        <?php
            if( $about_2026_video_bg ) {
                echo '<figure class="video-wrapper">';
                echo wp_get_attachment_image( $about_2026_video_bg, 'full' );
                echo '<a href="'.$about_2026_video.'" class="play play-video"></a>';
                echo '</figure>';
            }

            // Only this year's photos; falls back to all photos until the "2026" gallery category exists.
            $gall_year = get_term_by( 'slug', '2026', 'gallery_cat' );

            $args = array(
                'post_type' => 'gallery',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
            if ( $gall_year ) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'gallery_cat',
                        'field'    => 'term_id',
                        'terms'    => $gall_year->term_id,
                    ),
                );
            }
            $query = new WP_Query($args);
            if( $query->have_posts() ) {
                while( $query->have_posts() ) {
                    $query->the_post();
                    $foundPosts = $query->found_posts;
                }wp_reset_query();
            }
        ?>

        <div class="photo-gall-wrapper">
            <?php
                if ($about_2026_title_photo_gallery) { echo '<h2>'.$about_2026_title_photo_gallery.'</h2>'; }
                if ($about_2026_subtitle_photo_gallery) { echo '<h3>'.$about_2026_subtitle_photo_gallery.'</h3>'; }
            ?>

            <div class="photo-list-wrapper" id="photo-list-wrapper"><span class="load-text">Loading...</span></div>
            <div id="photo-load-more" class="photo-load-more"><?php echo $word_show_me_more; ?><div id="photo-list-loading" class="loader"></div></div>
        </div>
    </div>
</div>

<div class="about-2025-comm-wrapper">
    <div class="inner-wrapper">
        <div class="comm-corp">
            <h2><?php echo $about_2026_comm_corp_title; ?></h2>
            <h3><?php echo $about_2026_comm_corp_subtitle; ?></h3>
            
            <?php
                $args = array(
                    'post_type' => 'committee',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'committee_cat',
                            'field'    => 'slug',
                            'terms'    => 'committee-coporates-awards'
                            ),
                        ),
                );
                $query = new WP_Query($args);
                if( $query->have_posts() ) {
                    echo '<ul class="the-wrapper">';
                    while( $query->have_posts() ) {
                        $query->the_post();

                        $name = get_field('cmt_name');
                        $position = get_field('cmt_position');
                        $details = get_field('cmt_details');

                        if(has_post_thumbnail()){
                            echo '<li><figure>';
                            echo the_post_thumbnail('full').'</figure>';
                            echo '<div class="desc"><h3>'.$name.'</h3><div class="position">'.$position.'</div><div class="company">'.$details.'</div></div>';
                            echo '</li>';
                        }
                    }
                    echo '</ul>';
                }
            ?>
        </div>

        <div class="comm-lead comm-better">
            <h2><?php echo $about_2026_comm_better_title; ?></h2>
            <h3><?php echo $about_2026_comm_better_subtitle; ?></h3>
            
            <?php
                $args = array(
                    'post_type' => 'committee',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'committee_cat',
                            'field'    => 'slug',
                            'terms'    => 'committee-better-world-coporate-awards'
                            ),
                        ),
                );
                $query = new WP_Query($args);
                if( $query->have_posts() ) {
                    echo '<ul class="the-wrapper">';
                    while( $query->have_posts() ) {
                        $query->the_post();

                        $name = get_field('cmt_name');
                        $position = get_field('cmt_position');
                        $details = get_field('cmt_details');

                        if(has_post_thumbnail()){
                            echo '<li><figure>';
                            echo the_post_thumbnail('full').'</figure>';
                            echo '<div class="desc"><h3>'.$name.'</h3><div class="position">'.$position.'</div><div class="company">'.$details.'</div></div>';
                            echo '</li>';
                        }
                    }
                    echo '</ul>';
                }
            ?>
        </div>

        <div class="comm-lead comm-better">
            <h2><?php echo $about_2026_comm_beloved_title; ?></h2>
            <h3><?php echo $about_2026_comm_beloved_subtitle; ?></h3>
            
            <?php
                $args = array(
                    'post_type' => 'committee',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'committee_cat',
                            'field'    => 'slug',
                            'terms'    => 'committee-most-beloved-employer-awards'
                            ),
                        ),
                );
                $query = new WP_Query($args);
                if( $query->have_posts() ) {
                    echo '<ul class="the-wrapper">';
                    while( $query->have_posts() ) {
                        $query->the_post();

                        $name = get_field('cmt_name');
                        $position = get_field('cmt_position');
                        $details = get_field('cmt_details');

                        if(has_post_thumbnail()){
                            echo '<li><figure>';
                            echo the_post_thumbnail('full').'</figure>';
                            echo '<div class="desc"><h3>'.$name.'</h3><div class="position">'.$position.'</div><div class="company">'.$details.'</div></div>';
                            echo '</li>';
                        }
                    }
                    echo '</ul>';
                }
            ?>
        </div>

        <div class="comm-lead">
            <h2><?php echo $about_2026_comm_lead_title; ?></h2>
            <h3><?php echo $about_2026_comm_lead_subtitle; ?></h3>
            
            <?php
                $args = array(
                    'post_type' => 'committee',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'committee_cat',
                            'field'    => 'slug',
                            'terms'    => 'committee-leaders-awards'
                            ),
                        ),
                );
                $query = new WP_Query($args);
                if( $query->have_posts() ) {
                    echo '<ul class="the-wrapper">';
                    while( $query->have_posts() ) {
                        $query->the_post();

                        $name = get_field('cmt_name');
                        $position = get_field('cmt_position');
                        $details = get_field('cmt_details');

                        if(has_post_thumbnail()){
                            echo '<li><figure>';
                            echo the_post_thumbnail('full').'</figure>';
                            echo '<div class="desc"><h3>'.$name.'</h3><div class="position">'.$position.'</div><div class="company">'.$details.'</div></div>';
                            echo '</li>';
                        }
                    }
                    echo '</ul>';
                }
            ?>
        </div>
    </div>
</div>

<?php /* Partner Awards section: hidden to match live
<div class="about-2025-pn-wrapper">
    <div class="inner-wrapper">
        <h2><?php echo $about_2026_pn_title; ?></h2>
        <h3><?php echo $about_2026_pn_subtitle; ?></h3>

        <?php
            $args = array(
                'post_type' => 'partner',
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            if( $query->have_posts() ) {
                echo '<ul class="partner-wrapper">';
                while( $query->have_posts() ) {
                    $query->the_post();
                    if(has_post_thumbnail()){
                        echo '<li>';
                        the_post_thumbnail('full');
                        echo '</li>';
                    }
                }
                echo '</ul>';
            }
        ?>
    </div>
</div>
*/ ?>

<script>
    let gallID = document.querySelector('#photo-list-wrapper')
    let pppGall = 8;
    let pppPlusGall = 4;

    if ( gallID ) {

        function gallList(pppGall, gallCount) {
            let requestOptions = {
                method: 'GET',
                redirect: 'follow',
            }

            let targetURL = '/wp-json/wp/v2/gallery?order=desc&per_page='+pppGall<?php if ( $gall_year ) { echo " + '&gallery_cat=" . (int) $gall_year->term_id . "'"; } ?>

            fetch(targetURL, requestOptions)
            .then(response => response.text())
            .then(result => {

                var resultObj = JSON.parse(result)
                //console.log(resultObj);

                //Load more
                    document.querySelector('#photo-list-loading').style.display = 'none'

                    loadMore = document.getElementById('photo-load-more')
                    loadMore.style.display = 'inline-flex';

                    if (pppGall >= gallCount) {
                        loadMore.style.display = 'none'
                    }

                    function loadmoreFunc() {
                        document.querySelector('#photo-load-more').onclick = function () {
                            document.querySelector('#photo-list-loading').style.display = 'inline-block';
                            var pppAllGall = pppGall += pppPlusGall;
                            gallList(pppAllGall, gallCount)
                        }
                    }loadmoreFunc()
                //End loadmore

                theObj = resultObj;

                let html = ''
                html += '<ul>';
                for(let i = 0; i < resultObj.length; i++) {
                    let theGall = resultObj[i];

                    html += `<li><img src="${theGall.gall_thumbnail_img_url}" alt="Futuretrends 2026 gallery"></li>`;
                }
                html += '</ul>';

                document.querySelector('#photo-list-wrapper').innerHTML = html;
                document.querySelector('#photo-list-loading').innerHTML = ''

            })
            .catch(error => console.log('error', error))
        }

    }gallList(pppGall, <?php echo $foundPosts; ?>)

</script>

<?php get_footer('2025'); ?>