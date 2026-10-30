<?php
/**
 * Template Name: Elementor Full Width (LexVanguard)
 * Template Post Type: page, post
 *
 * Provides a clean, full-width canvas retaining the theme's sticky header
 * and luxury footer, allowing edge-to-edge Elementor sections and containers.
 *
 * @package Legal_Insights
 */

get_header(); ?>

<main id="primary" class="site-main elementor-fullwidth-content" style="width: 100%; min-height: 60vh;">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php get_footer(); ?>

