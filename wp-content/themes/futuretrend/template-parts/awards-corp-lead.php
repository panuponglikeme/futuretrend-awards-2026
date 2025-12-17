<div class="awards-cl-wrapper">
    <div class="inner-wrapper">
        <?php
            if( $awards_corp_title ) {
                echo '<h2>'.$awards_corp_title.'</h2>';
            }
        ?>

        <div class="inner corp">
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
                        $description = get_term_field( 'description', $_terms );
                        $term_link = get_term_link($_terms);
                ?>
                <li>
                    <a href="<?php echo $term_link; ?>">
                    <?php
                        if ( $corp_cate_icon ) {
                            echo wp_get_attachment_image( $corp_cate_icon,'full' );
                        }

                        echo '<h3>'.$_terms->name.'</h3><div class="desc">'.$description.'</div>';
                    ?>
                    </a>
                </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </div>
    </div>

    <div class="inner-wrapper">
        <?php
            if( $awards_lead_title ) {
                echo '<h2>'.$awards_lead_title.'</h2>';
            }
        ?>

        <div class="inner lead">
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
                        $description = get_term_field( 'description', $_terms );
                        $term_link = get_term_link($_terms);
                ?>
                <li>
                    <a href="<?php echo $term_link; ?>">
                    <?php
                        if ( $lead_cate_icon ) {
                            echo wp_get_attachment_image( $lead_cate_icon,'full' );
                        }

                        echo '<h3>'.$_terms->name.'</h3><div class="desc">'.$description.'</div>';
                    ?>
                    </a>
                </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </div>
    </div>

    <?php if ( $awards_cl_factsheet ) {
            echo '<a class="download-factsheet" href="'.$awards_cl_factsheet.'" target="_blank">'.$awards_cl_factsheet_text.'</a>';
        }
    ?>
</div>