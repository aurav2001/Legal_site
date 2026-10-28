<?php
/**
 * The template for displaying all single pages
 *
 * @package Legal_Insights
 */

get_header();
?>

<!-- Banner Section -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag"><?php bloginfo('name'); ?></div>
                <h1 class="bnr_heading"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<!-- Page Content Section -->
<section class="page-content-sec" style="padding: 70px 0 90px 0; background: var(--bg-light);">
    <div class="container-custom">
        <div style="background: #ffffff; padding: 45px 40px; border-radius: 12px 0 35px 0; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px rgba(0,0,0,0.03); font-size: 1.05rem; line-height: 1.85; color: #334155;">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
