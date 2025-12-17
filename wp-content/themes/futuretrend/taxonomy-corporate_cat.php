<?php
    get_header();

    $term = get_queried_object();
    $corp_cate_icon = get_field( 'corp_cate_icon', $term );
    $description = get_term_field( 'description', $term );

    $text_back = get_field('text_back', 'option');
?>

<div class="tax-wrapper">
    <div class="inner-wrapper">
        <button class="back" onclick="history.back()"><?php echo $text_back; ?></button>

        <div class="top-wrapper">
            <?php
                if ( $corp_cate_icon ) {
                    echo wp_get_attachment_image( $corp_cate_icon,'full' );
                }

                echo '<h1>'.$term->name.'</h1><div class="desc">'.$description.'</div>';
            ?>
        </div>

        <div class="list-wrapper">
            <?php
                $args = array(
                'posts_per_page' => -1,
                'post_type' => 'corporate',
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'corporate_cat',
                        'field'    => 'slug',
                        'terms'    => $term->slug
                        ),
                    ),
                );

                $query = new WP_Query( $args );
                while ( $query->have_posts() ):
                $query->the_post();
                    $corp_name = get_field('corp_name');
                    $corp_position = get_field('corp_position');
            ?>
            <div class="listing">
                <?php
                    if(has_post_thumbnail()){
                        echo '<figure>';
                        the_post_thumbnail('full');
                        echo '</figure>';
                    }
                ?>
                <div class="details-wrapper">
                    <h3><?php echo $corp_name; ?></h3>
                    <p class="position"><?php echo $corp_position; ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>