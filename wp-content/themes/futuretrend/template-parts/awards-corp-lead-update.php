<div class="awards-cl-wrapper">
    <div class="inner-wrapper">
        <?php
            if( $awards_corp_title ) {
                echo '<h2>'.$awards_corp_title.'</h2>';
            }
        ?>

        <div class="inner corp">
            <div class="tab-link-wrapper">
                <div class="tab">
                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'corporate_cat',
                            'hide_empty' => false,
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'corp_cate_order',
                            'order' => 'ASC'
                        ));
                        $i = 0;
                        foreach ($terms as $_terms):
                            $i++;
                            $corp_cate_icon = get_field( 'corp_cate_icon', $_terms->taxonomy . '_' . $_terms->term_id );
                    ?>
                    <button class="tablinks tablinks-corp" onclick="openCorp(event, '<?php echo $_terms->slug; ?>')" id="<?php if ( $i == 1 ) { echo 'defaultOpenCorp'; } ?>">
                        <?php
                            if ( $corp_cate_icon ) {
                                echo wp_get_attachment_image( $corp_cate_icon,'full' );
                            }
                        ?>
                    </button>
                    <?php endforeach; wp_reset_query(); ?>
                </div>
            </div>

            <div class="tabcontent-wrapper">
                <?php
                    // $terms = get_terms( array(
                    //     'taxonomy' => 'corporate_cat',
                    //     'hide_empty' => false,
                    //     'orderby' => 'meta_value_num',
                    //     'meta_key' => 'corp_cate_order',
                    //     'order' => 'ASC'
                    // ) );
                    foreach ($terms as $_terms):
                        $description = get_term_field( 'description', $_terms );
                        $corp_cate_img_desktop = get_field( 'corp_cate_img_desktop', $_terms->taxonomy . '_' . $_terms->term_id );
                        $corp_cate_img_mobile = get_field( 'corp_cate_img_mobile', $_terms->taxonomy . '_' . $_terms->term_id );
                ?>
                <div id="<?php echo $_terms->slug; ?>" class="tabcontent tabcontent-corp">
                    <div class="tab-row">
                        <div class="top">
                            <?php
                                echo '<h3>'.$_terms->name.'</h3><div class="desc">'.$description.'</div>';
                            ?>
                        </div>

                        <div class="bottom">
                            <?php
                                // if( $corp_cate_img_desktop ) {
                                //     echo '<figure class="desktop">';
                                //     echo wp_get_attachment_image( $corp_cate_img_desktop, 'full' );
                                //     echo '</figure>';
                                // }

                                // if( $corp_cate_img_mobile ) {
                                //     echo '<figure class="mobile">';
                                //     echo wp_get_attachment_image( $corp_cate_img_mobile, 'full' );
                                //     echo '</figure>';
                                // }

                                if( have_rows('corp_cate_list', $_terms->taxonomy . '_' . $_terms->term_id) ) {

                                    echo '<div class="row-wrapper">';

                                        while( have_rows('corp_cate_list', $_terms->taxonomy . '_' . $_terms->term_id) ) {
                                            the_row();

                                            echo '<div class="row-list">';

                                                $corp_cate_list_title = get_sub_field('corp_cate_list_title');
                                                $corp_cate_list_listing = get_sub_field('corp_cate_list_listing');

                                                if ( $corp_cate_list_title ) {
                                                    echo '<h4>'.$corp_cate_list_title.'</h4>';
                                                }

                                                if ( $corp_cate_list_listing ) {

                                                    echo '<div class="row-inner-wrapper">';

                                                    foreach( $corp_cate_list_listing as $post ) {
                                                        setup_postdata( $post );
                                                        $title = get_field('corp_name');

                                                            echo '<div class="row-inner-list"><div class="list">';
        
                                                                if(has_post_thumbnail()){
                                                                    echo '<figure>';
                                                                    the_post_thumbnail('full');
                                                                    echo '</figure>';
                                                                } else {
                                                                    echo '<figure><img src="../wp-content/themes/futuretrend/assets/images/no-img.jpg" /></figure>';
                                                                }
        
                                                                echo '<div class="name">'.$title.'</div>';

                                                            echo '</div></div>';
                                                    }

                                                    echo '</div>';
                                                }
                                            echo '</div>';
                                        }

                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; wp_reset_query(); ?>
            </div>
        </div>
    </div>

    <div class="inner-wrapper">
        <?php
            if( $awards_lead_title ) {
                echo '<h2>'.$awards_lead_title.'</h2>';
            }
        ?>

        <div class="inner lead">
            <div class="tab-link-wrapper">
                <div class="tab">
                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'leader_cat',
                            'hide_empty' => false,
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'lead_cate_order',
                            'order' => 'ASC'
                        ));
                        $i = 0;
                        foreach ($terms as $_terms):
                            $i++;
                            $lead_cate_icon = get_field( 'lead_cate_icon', $_terms->taxonomy . '_' . $_terms->term_id );
                    ?>
                    <button class="tablinks tablinks-lead" onclick="openLead(event, '<?php echo $_terms->slug; ?>')" id="<?php if ( $i == 1 ) { echo 'defaultOpenLead'; } ?>">
                        <?php
                            if ( $lead_cate_icon ) {
                                echo wp_get_attachment_image( $lead_cate_icon,'full' );
                            }
                        ?>
                    </button>
                    <?php endforeach; wp_reset_query(); ?>
                </div>
            </div>

            <div class="tabcontent-wrapper">
                <?php
                    // $terms = get_terms( array(
                    //     'taxonomy' => 'leader_cat',
                    //     'hide_empty' => false,
                    //     'orderby' => 'meta_value_num',
                    //     'meta_key' => 'lead_cate_order',
                    //     'order' => 'ASC'
                    // ) );
                    foreach ($terms as $_terms):
                        $description = get_term_field( 'description', $_terms );
                        $lead_cate_img_desktop = get_field( 'lead_cate_img_desktop', $_terms->taxonomy . '_' . $_terms->term_id );
                        $lead_cate_img_mobile = get_field( 'lead_cate_img_mobile', $_terms->taxonomy . '_' . $_terms->term_id );
                ?>
                <div id="<?php echo $_terms->slug; ?>" class="tabcontent tabcontent-lead">
                    <div class="tab-row">
                        <div class="top">
                            <?php
                                echo '<h3>'.$_terms->name.'</h3><div class="desc">'.$description.'</div>';
                            ?>
                        </div>

                        <div class="bottom">
                            <?php
                                // if( $lead_cate_img_desktop ) {
                                //     echo '<figure class="desktop">';
                                //     echo wp_get_attachment_image( $lead_cate_img_desktop, 'full' );
                                //     echo '</figure>';
                                // }

                                // if( $lead_cate_img_mobile ) {
                                //     echo '<figure class="mobile">';
                                //     echo wp_get_attachment_image( $lead_cate_img_mobile, 'full' );
                                //     echo '</figure>';
                                // }

                                if( have_rows('lead_cate_list', $_terms->taxonomy . '_' . $_terms->term_id) ) {

                                    echo '<div class="row-wrapper">';

                                        while( have_rows('lead_cate_list', $_terms->taxonomy . '_' . $_terms->term_id) ) {
                                            the_row();

                                            echo '<div class="row-list">';

                                                $lead_cate_list_title = get_sub_field('lead_cate_list_title');
                                                $lead_cate_list_listing = get_sub_field('lead_cate_list_listing');

                                                if ( $lead_cate_list_title ) {
                                                    echo '<h4>'.$lead_cate_list_title.'</h4>';
                                                }

                                                if ( $lead_cate_list_listing ) {

                                                    echo '<div class="row-inner-wrapper">';

                                                    foreach( $lead_cate_list_listing as $post ) {
                                                        setup_postdata( $post );
                                                        $title = get_field('lead_name');

                                                            echo '<div class="row-inner-list"><div class="list">';
        
                                                                if(has_post_thumbnail()){
                                                                    echo '<figure>';
                                                                    the_post_thumbnail('full');
                                                                    echo '</figure>';
                                                                } else {
                                                                    echo '<figure><img src="../wp-content/themes/futuretrend/assets/images/no-img.jpg" /></figure>';
                                                                }
        
                                                                echo '<div class="name">'.$title.'</div>';

                                                            echo '</div></div>';
                                                    }

                                                    echo '</div>';
                                                }
                                            echo '</div>';
                                        }

                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; wp_reset_query(); ?>
            </div>
        </div>
    </div>

    <?php if ( $awards_cl_factsheet ) {
            echo '<a class="download-factsheet" href="'.$awards_cl_factsheet.'" target="_blank">'.$awards_cl_factsheet_text.'</a>';
        }
    ?>
</div>