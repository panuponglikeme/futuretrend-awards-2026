<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package futuretrend
 */

	$footer_copyright = get_field('footer_copyright', 'option');
	$text_follow_us = get_field('text_follow_us', 'option');

    $footer_follow_title = get_field('footer_follow_title', 'option');
    $footer_award_link_title = get_field('footer_award_link_title', 'option');
    $footer_award_link = get_field('footer_award_link', 'option');
?>

    <footer id="colophon" class="site-footer site-footer-2025">
        <div class="site-info">
            <div class="footer-column branding">
                <div class="site-branding">
                    <?php the_custom_logo(); ?>
                </div>

                <nav class="footer-navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
                </nav>
            </div>

            <div class="footer-column follow">
                <h4 class="follow-title"><?php echo $footer_follow_title; ?></h4>

                <?php
                    if( have_rows('follow_list', 'option') ) {
                        echo '<ul class="follow-list">';
                            while( have_rows('follow_list', 'option') ) : the_row();
                            $follow_list_icon = get_sub_field('follow_list_icon');
                            $follow_list_link = get_sub_field('follow_list_link');

                            echo '<li><a href="'.$follow_list_link['url'].'" target="'.$follow_list_link['target'].'" title="'.$follow_list_link['title'].'"><img src="'.$follow_list_icon['url'].'" alt="'.$follow_list_icon['alt'].'" /></a></li>';

                            endwhile;
                        echo '</ul>';
                    }
                ?>
            </div>

            <div class="footer-column awards">
                <h4 class="award-link-title"><?php echo $footer_award_link_title; ?></h4>

                <?php
                    if ( $footer_award_link ) {
						echo '<a href="'.$footer_award_link['url'].'" class="link-awards" target="'.$footer_award_link['target'].'"><span>'.$footer_award_link['title'].'</span></a>';
					}
                ?>
            </div>
        </div><!-- .site-info -->
        <div class="copyright"><p><?php echo $footer_copyright; ?></p></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>