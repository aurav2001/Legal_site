<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Legal_Insights
 */

get_header();
?>

<section class="about-mn" style="padding: 120px 0 85px 0;">
    <div class="container-custom text-center">
        <div style="max-width: 650px; margin: 0 auto; text-align: center;" data-aos="fade-up">
            <div style="font-size: 5.5rem; font-weight: 700; color: #c5a059; line-height: 1; margin-bottom: 20px; font-family: var(--font-serif);">404</div>
            <h1 class="bnr_heading" style="font-size: 2.2rem; margin-bottom: 16px;">Page Not Found</h1>
            <p style="color: #94a3b8; font-size: 1.05rem; line-height: 1.7; margin-bottom: 32px;">
                The legal chamber, publication, or vertical you are looking for has been moved or is currently unavailable.
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="clean-nav-btn" style="display: inline-block; padding: 14px 34px; font-size: 0.95rem;">
                Return to Homepage &rarr;
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
