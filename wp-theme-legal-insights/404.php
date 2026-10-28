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
            <a href="<?php echo esc_url(home_url('/')); ?>" class="clean-nav-btn" style="display: inline-flex; align-items: center; justify-content: center; padding: 14px 34px; font-size: 0.95rem; background: linear-gradient(135deg, #c5a059 0%, #dfba73 50%, #b38b42 100%); color: #0b111e !important; font-weight: 700; border-radius: 6px; text-decoration: none; box-shadow: 0 4px 18px rgba(197, 160, 89, 0.35); border: 1px solid #dfba73;">
                Return to Homepage &rarr;
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
