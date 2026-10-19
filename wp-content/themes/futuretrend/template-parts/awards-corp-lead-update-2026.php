<div id="awards-cl-wrapper" class="awards-cl-wrapper">
    <div class="awards-section-wrapper">
        <figure class="icon"></figure>

        <?php echo '<h2 class="title">'.$awards_section_title.'</h2><div class="subtitle">'.$awards_section_subtitle.'</div>'; ?>
    </div>
    <div class="tab-button-wrapper">
        <button class="tab-button-corp-lead active" data-target="tab-button-corp"><?php echo $word_corp_awards; ?></button>
        <button class="tab-button-corp-lead" data-target="tab-button-better-world"><?php echo $word_better_world_awards; ?></button>
        <button class="tab-button-corp-lead" data-target="tab-button-beloved"><?php echo $word_beloved_awards; ?></button>
        <button class="tab-button-corp-lead" data-target="tab-button-lead"><?php echo $word_lead_awards; ?></button>
    </div>

    <div class="inner-wrapper tab-content-corp-lead corp active" data-target="tab-button-corp">
        <?php
            if( $awards_corp_title ) {
                echo '<h2>'.$awards_corp_title.'</h2>';
            }

            if( $awards_corp_title_desc ) {
                echo '<div class="descp">'.$awards_corp_title_desc.'</div>';
            }
        ?>

        <div class="inner corp">
            <div class="tab-link-wrapper">
                <div class="tab">
                    <?php
                        $terms = ft_award_terms( 'corporate_cat', 2026, 'corp_cate_order' );
                        $i = 0;
                        foreach ($terms as $_terms):
                            $i++;
                            $corp_cate_icon = get_field( 'corp_cate_icon', $_terms->taxonomy . '_' . $_terms->term_id );
                            $corp_cate_number_awards = get_field( 'corp_cate_number_awards', $_terms->taxonomy . '_' . $_terms->term_id );
                    ?>
                    <button class="tablinks tablinks-corp" onclick="openCorp(event, '<?php echo $_terms->slug; ?>')" id="<?php if ( $i == 1 ) { echo 'defaultOpenCorp'; } ?>">
                        <?php
                            // if ( $corp_cate_icon ) {
                            //     echo wp_get_attachment_image( $corp_cate_icon,'full' );
                            // }
                            echo '<div class="name-wrapper">'.$_terms->name.'<span class="num">'.$corp_cate_number_awards.'</span></div>';
                        ?>
                    </button>
                    <?php endforeach; wp_reset_query(); ?>
                </div>

                <img src="../wp-content/themes/futuretrend/assets/images/arrow-double-down.svg" />
            </div>

            <div class="tabcontent-wrapper">
                <?php
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
                                                                    echo '<div class="fig-wrapper"><figure>';
                                                                    the_post_thumbnail('full');
                                                                    echo '</figure></div>';
                                                                } else {
                                                                    echo '<div class="fig-wrapper"><figure><img src="../wp-content/themes/futuretrend/assets/images/no-img.jpg" /></figure></div>';
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

    <div class="inner-wrapper tab-content-corp-lead better" data-target="tab-button-better-world">
        <?php
            if( $awards_better_world_title ) {
                echo '<h2>'.$awards_better_world_title.'</h2>';
            }

            if( $awards_better_world_title_desc ) {
                echo '<div class="descp">'.$awards_better_world_title_desc.'</div>';
            }
        ?>

        <div class="inner better-world">
            <div class="tab-link-wrapper">
                <div class="tab">
                    <?php
                        $terms = ft_award_terms( 'better_world_cat', 2026, 'bett_corp_cate_order' );
                        $i = 0;
                        foreach ($terms as $_terms):
                            $i++;
                            $bett_corp_cate_icon = get_field( 'bett_corp_cate_icon', $_terms->taxonomy . '_' . $_terms->term_id );
                            $bett_corp_cate_number_awards = get_field( 'bett_corp_cate_number_awards', $_terms->taxonomy . '_' . $_terms->term_id );
                    ?>
                    <button class="tablinks tablinks-better-world" onclick="openBetter(event, '<?php echo $_terms->slug; ?>')" id="<?php if ( $i == 1 ) { echo 'defaultOpenBetter'; } ?>">
                        <?php
                            // if ( $corp_cate_icon ) {
                            //     echo wp_get_attachment_image( $corp_cate_icon,'full' );
                            // }
                            echo '<div class="name-wrapper">'.$_terms->name.'<span class="num">'.$bett_corp_cate_number_awards.'</span></div>';
                        ?>
                    </button>
                    <?php endforeach; wp_reset_query(); ?>
                </div>

                <img src="../wp-content/themes/futuretrend/assets/images/arrow-double-down.svg" />
            </div>

            <div class="tabcontent-wrapper">
                <?php
                    foreach ($terms as $_terms):
                        $description = get_term_field( 'description', $_terms );
                        $bett_corp_cate_img_desktop = get_field( 'bett_corp_cate_img_desktop', $_terms->taxonomy . '_' . $_terms->term_id );
                        $bett_corp_cate_img_mobile = get_field( 'bett_corp_cate_img_mobile', $_terms->taxonomy . '_' . $_terms->term_id );
                ?>
                <div id="<?php echo $_terms->slug; ?>" class="tabcontent tabcontent-better">
                    <div class="tab-row">
                        <div class="top">
                            <?php
                                echo '<h3>'.$_terms->name.'</h3><div class="desc">'.$description.'</div>';
                            ?>
                        </div>

                        <div class="bottom">
                            <?php

                                if( have_rows('bett_corp_cate_list', $_terms->taxonomy . '_' . $_terms->term_id) ) {

                                    echo '<div class="row-wrapper">';

                                        while( have_rows('bett_corp_cate_list', $_terms->taxonomy . '_' . $_terms->term_id) ) {
                                            the_row();

                                            echo '<div class="row-list">';

                                                $bett_corp_cate_list_title = get_sub_field('bett_corp_cate_list_title');
                                                $bett_corp_cate_list_listing = get_sub_field('bett_corp_cate_list_listing');

                                                if ( $bett_corp_cate_list_title ) {
                                                    echo '<h4>'.$bett_corp_cate_list_title.'</h4>';
                                                }

                                                if ( $bett_corp_cate_list_listing ) {

                                                    echo '<div class="row-inner-wrapper">';

                                                    foreach( $bett_corp_cate_list_listing as $post ) {
                                                        setup_postdata( $post );
                                                        $title = get_field('corp_name');
                                                        $the_title = get_the_title();

                                                            echo '<div class="row-inner-list"><div class="list">';
        
                                                                if(has_post_thumbnail()){
                                                                    echo '<div class="fig-wrapper"><figure>';
                                                                    the_post_thumbnail('full');
                                                                    echo '</figure></div>';
                                                                } else {
                                                                    echo '<div class="fig-wrapper"><figure><img src="../wp-content/themes/futuretrend/assets/images/no-img.jpg" /></figure></div>';
                                                                }
        
                                                                echo '<div class="name">'.$the_title.'</div>';

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

    <div class="inner-wrapper tab-content-corp-lead beloved" data-target="tab-button-beloved">
        <?php
            if( $awards_beloved_title ) {
                echo '<h2>'.$awards_beloved_title.'</h2>';
            }

            if( $awards_beloved_title_desc ) {
                echo '<div class="descp">'.$awards_beloved_title_desc.'</div>';
            }
        ?>

        <div class="inner beloved">
            <div class="tab-link-wrapper">
                <div class="tab">
                    <?php
                        $terms = ft_award_terms( 'beloved_employer_cat', 2026, 'beloved_cate_order' );
                        $i = 0;
                        foreach ($terms as $_terms):
                            $i++;
                            $beloved_cate_icon = get_field( 'beloved_cate_icon', $_terms->taxonomy . '_' . $_terms->term_id );
                            $beloved_cate_number_awards = get_field( 'beloved_cate_number_awards', $_terms->taxonomy . '_' . $_terms->term_id );
                    ?>
                    <button class="tablinks tablinks-beloved" onclick="openBeloved(event, '<?php echo $_terms->slug; ?>')" id="<?php if ( $i == 1 ) { echo 'defaultOpenBeloved'; } ?>">
                        <?php
                            // if ( $corp_cate_icon ) {
                            //     echo wp_get_attachment_image( $corp_cate_icon,'full' );
                            // }
                            echo '<div class="name-wrapper">'.$_terms->name.'<span class="num">'.$beloved_cate_number_awards.'</span></div>';
                        ?>
                    </button>
                    <?php endforeach; wp_reset_query(); ?>
                </div>

                <img src="../wp-content/themes/futuretrend/assets/images/arrow-double-down.svg" />
            </div>

            <div class="tabcontent-wrapper">
                <?php
                    foreach ($terms as $_terms):
                        $description = get_term_field( 'description', $_terms );
                        $beloved_cate_img_desktop = get_field( 'beloved_cate_img_desktop', $_terms->taxonomy . '_' . $_terms->term_id );
                        $beloved_cate_img_mobile = get_field( 'beloved_cate_img_mobile', $_terms->taxonomy . '_' . $_terms->term_id );
                ?>
                <div id="<?php echo $_terms->slug; ?>" class="tabcontent tabcontent-beloved">
                    <div class="tab-row">
                        <div class="top">
                            <?php
                                echo '<h3>'.$_terms->name.'</h3><div class="desc">'.$description.'</div>';
                            ?>
                        </div>

                        <div class="bottom">
                            <?php

                                if( have_rows('beloved_cate_list', $_terms->taxonomy . '_' . $_terms->term_id) ) {

                                    echo '<div class="row-wrapper">';

                                        while( have_rows('beloved_cate_list', $_terms->taxonomy . '_' . $_terms->term_id) ) {
                                            the_row();

                                            echo '<div class="row-list">';

                                                $beloved_cate_list_title = get_sub_field('beloved_cate_list_title');
                                                $beloved_cate_list_listing = get_sub_field('beloved_cate_list_listing');

                                                if ( $beloved_cate_list_title ) {
                                                    echo '<h4>'.$beloved_cate_list_title.'</h4>';
                                                }

                                                if ( $beloved_cate_list_listing ) {

                                                    echo '<div class="row-inner-wrapper">';

                                                    foreach( $beloved_cate_list_listing as $post ) {
                                                        setup_postdata( $post );
                                                        $title = get_field('corp_name');
                                                        $the_title = get_the_title();

                                                            echo '<div class="row-inner-list"><div class="list">';
        
                                                                if(has_post_thumbnail()){
                                                                    echo '<div class="fig-wrapper"><figure>';
                                                                    the_post_thumbnail('full');
                                                                    echo '</figure></div>';
                                                                } else {
                                                                    echo '<div class="fig-wrapper"><figure><img src="../wp-content/themes/futuretrend/assets/images/no-img.jpg" /></figure></div>';
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

    <div class="inner-wrapper tab-content-corp-lead lead" data-target="tab-button-lead">
        <?php
            if( $awards_lead_title ) {
                echo '<h2>'.$awards_lead_title.'</h2>';
            }

            if( $awards_lead_title_desc ) {
                echo '<div class="descp">'.$awards_lead_title_desc.'</div>';
            }
        ?>

        <div class="inner lead">
            <div class="tab-link-wrapper">
                <div class="tab">
                    <?php
                        $terms = ft_award_terms( 'leader_cat', 2026, 'lead_cate_order' );
                        $i = 0;
                        foreach ($terms as $_terms):
                            $i++;
                            $lead_cate_icon = get_field( 'lead_cate_icon', $_terms->taxonomy . '_' . $_terms->term_id );
                            $lead_cate_number_awards = get_field( 'lead_cate_number_awards', $_terms->taxonomy . '_' . $_terms->term_id );
                    ?>
                    <button class="tablinks tablinks-lead" onclick="openLead(event, '<?php echo $_terms->slug; ?>')" id="<?php if ( $i == 1 ) { echo 'defaultOpenLead'; } ?>">
                        <?php
                            // if ( $lead_cate_icon ) {
                            //     echo wp_get_attachment_image( $lead_cate_icon,'full' );
                            // }
                            echo '<div class="name-wrapper">'.$_terms->name.'<span class="num">'.$lead_cate_number_awards.'</span></div>';
                        ?>
                    </button>
                    <?php endforeach; wp_reset_query(); ?>
                </div>

                <img src="../wp-content/themes/futuretrend/assets/images/arrow-double-down.svg" />
            </div>

            <div class="tabcontent-wrapper">
                <?php
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
                                                                    echo '<div class="fig-wrapper"><figure>';
                                                                    the_post_thumbnail('full');
                                                                    echo '</figure></div>';
                                                                } else {
                                                                    echo '<div class="fig-wrapper"><figure><img src="../wp-content/themes/futuretrend/assets/images/no-img.jpg" /></figure></div>';
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