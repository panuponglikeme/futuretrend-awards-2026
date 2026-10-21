<?php
    /*
        Template name: Awards 2027
    */
    get_header('2027');
?>

<main class="aw27">
    <?php // Hero: built from the 2027 design. ?>
    <section class="aw27-hero">
        <div class="aw27-container">
            <h1 class="aw27-hero-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <div class="aw27-container">
        <?php get_template_part( 'template-parts/2027/award-groups' ); ?>
    </div>
</main>

<?php get_footer('2027'); ?>
