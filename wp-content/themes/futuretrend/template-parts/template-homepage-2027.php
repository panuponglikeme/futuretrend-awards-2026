<?php
    /*
        Template name: Homepage 2027
    */
    get_header('2027');
?>

<main class="hm27">
    <?php // Hero: built from the 2027 design. ?>
    <section class="hm27-hero">
        <div class="hm27-container">
            <h1 class="hm27-hero-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <?php // Award groups summary: each group with its 2027 categories and number of awards. ?>
    <section class="hm27-awards">
        <div class="hm27-container">
            <?php foreach ( ft_2027_award_groups() as $key => $group ) : ?>
                <div class="hm27-award-group hm27-award-group--<?php echo esc_attr( $key ); ?>">
                    <h2 class="hm27-award-group-title"><?php echo esc_html( $group['label'] ); ?></h2>

                    <?php $terms = ft_award_terms( $group['taxonomy'], 2027, $group['order'] ); ?>
                    <?php if ( $terms ) : ?>
                        <ul class="hm27-award-cats">
                            <?php foreach ( $terms as $term ) : ?>
                                <li class="hm27-award-cat">
                                    <span class="hm27-award-cat-num"><?php echo esc_html( get_field( $group['number'], $term ) ); ?></span>
                                    <h3 class="hm27-award-cat-name"><?php echo esc_html( $term->name ); ?></h3>
                                    <div class="hm27-award-cat-desc"><?php echo term_description( $term ); ?></div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php get_footer('2027'); ?>
