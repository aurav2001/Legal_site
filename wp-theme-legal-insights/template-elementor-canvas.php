<?php
/**
 * Template Name: Elementor Canvas (LexVanguard)
 * Template Post Type: page, post
 *
 * Provides a 100% blank canvas with zero theme header or footer,
 * ideal for landing pages built entirely in Elementor.
 *
 * @package Legal_Insights
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class('elementor-canvas-template'); ?>>
<?php wp_body_open(); ?>

<main id="primary" class="site-main elementor-canvas-content">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
