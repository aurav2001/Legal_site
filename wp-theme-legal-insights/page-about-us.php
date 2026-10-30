<?php
/**
 * Template Name: About Us (AGL Style)
 *
 * Description: Law firm heritage, core values, vision & mission, and achievements.
 * Fully editable via WordPress Admin (Page Editor + Page Meta Box).
 *
 * @package Legal_Insights
 */

get_header();

// If page is edited with Elementor, render full-width content directly
if (function_exists('legal_insights_is_elementor_page') && legal_insights_is_elementor_page()) {
    echo '<main id="primary" class="site-main elementor-about-content" style="width: 100%;">';
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    echo '</main>';
    get_footer();
    return;
}

$page_id = get_the_ID();
$tagline        = get_post_meta($page_id, '_about_tagline', true);
$heritage_tag   = get_post_meta($page_id, '_about_heritage_tag', true);
$heritage_title = get_post_meta($page_id, '_about_heritage_title', true);
$heritage_text  = get_post_meta($page_id, '_about_heritage_text', true);

if (empty($tagline)) {
    $tagline = 'Institutional Heritage & Values';
}
if (empty($heritage_tag)) {
    $stat1_num = function_exists('legal_insights_get_option') ? legal_insights_get_option('stat1_num', '1964') : '1964';
    $heritage_tag = 'Established In ' . $stat1_num;
}
if (empty($heritage_title)) {
    $heritage_title = 'Pioneering Legal Institutions with Supreme Court Chambers';
}
if (empty($heritage_text)) {
    $firm_name = function_exists('legal_insights_get_firm_name') ? legal_insights_get_firm_name(false) : 'Malhotra & Co.';
    $heritage_text = 'Established with a distinguished heritage, ' . $firm_name . ' has evolved into one of India’s premier full-service law firms, counseling Fortune 500 multinationals, sovereign public sector entities, financial institutions, and high-net-worth individuals on landmark litigation, high-stakes arbitration, and corporate restructurings.';
}
?>

<!-- Banner Section -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag"><?php echo esc_html($tagline); ?></div>
                <h1 class="bnr_heading"><?php the_title(); ?></h1>
                <p class="bnr_subtitle">
                    Six decades of formidable courtroom presence, client trust, and relentless pursuit of legal excellence across all judicial forums of India.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Established Heritage Statement (.estbshed-mn) -->
<section class="estbshed-mn" style="padding: 70px 0; background: #ffffff; border-bottom: 1px solid #eee8e2;">
    <div class="container-custom">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <div style="max-width: 960px; margin: 0 auto; text-align: center;">
                    <span style="color: var(--color-gold); font-size: 0.85rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;">
                        <?php echo esc_html($heritage_tag); ?>
                    </span>
                    <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--color-dark); margin: 16px 0 20px 0; line-height: 1.35;">
                        <?php echo esc_html($heritage_title); ?>
                    </h2>
                    <p style="font-size: 1.12rem; color: #554a43; line-height: 1.8;">
                        <?php echo esc_html($heritage_text); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Render Content from WordPress Page Editor if present
if (function_exists('legal_insights_render_page_content')) {
    legal_insights_render_page_content();
}
?>

<!-- Core Values Section (.our-vlues) with Curved Cards -->
<section class="our-vlues" style="padding: 80px 0; background: #fbfbfd;">
    <div class="container-custom">
        
        <div style="text-align: center; margin-bottom: 50px;" data-aos="fade-up">
            <div class="bnr_tag" style="justify-content: center;">Foundational Principles</div>
            <h2 style="font-family: var(--font-serif); font-size: 2.6rem; color: var(--color-dark);">Our Core Values</h2>
        </div>

        <div class="values-grid">
            
            <!-- Value 1 -->
            <div style="background: #ffffff; border: 1px solid var(--border-card); border-radius: var(--card-radius-curve); padding: 34px 28px; box-shadow: 0 4px 18px rgba(51, 39, 32, 0.06); position: relative; overflow: hidden;" data-aos="fade-up" data-aos-delay="100">
                <div style="width: 52px; height: 52px; background: rgba(197, 160, 89, 0.12); border: 1px solid var(--color-gold); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 22px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-gold);"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3 style="font-family: var(--font-serif); font-size: 1.45rem; color: var(--color-dark); margin-bottom: 12px;">Client-Centricity</h3>
                <p style="font-size: 0.95rem; line-height: 1.7; color: #554a43;">
                    Tailored legal strategies engineered around each client’s unique commercial objectives, risk appetite, and institutional goals.
                </p>
                <div class="bggrdnt"></div>
            </div>

            <!-- Value 2 -->
            <div style="background: #ffffff; border: 1px solid var(--border-card); border-radius: var(--card-radius-curve); padding: 34px 28px; box-shadow: 0 4px 18px rgba(51, 39, 32, 0.06); position: relative; overflow: hidden;" data-aos="fade-up" data-aos-delay="200">
                <div style="width: 52px; height: 52px; background: rgba(197, 160, 89, 0.12); border: 1px solid var(--color-gold); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 22px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-gold);"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <h3 style="font-family: var(--font-serif); font-size: 1.45rem; color: var(--color-dark); margin-bottom: 12px;">Uncompromising Trust</h3>
                <p style="font-size: 0.95rem; line-height: 1.7; color: #554a43;">
                    Generations of fiduciary integrity and total confidentiality before all judicial forums and corporate boardrooms.
                </p>
                <div class="bggrdnt"></div>
            </div>

            <!-- Value 3 -->
            <div style="background: #ffffff; border: 1px solid var(--border-card); border-radius: var(--card-radius-curve); padding: 34px 28px; box-shadow: 0 4px 18px rgba(51, 39, 32, 0.06); position: relative; overflow: hidden;" data-aos="fade-up" data-aos-delay="300">
                <div style="width: 52px; height: 52px; background: rgba(197, 160, 89, 0.12); border: 1px solid var(--color-gold); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 22px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-gold);"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3 style="font-family: var(--font-serif); font-size: 1.45rem; color: var(--color-dark); margin-bottom: 12px;">Approachable Counsel</h3>
                <p style="font-size: 0.95rem; line-height: 1.7; color: #554a43;">
                    Direct partner engagement, swift turnarounds, and plain-English communication, demystifying procedural complexities.
                </p>
                <div class="bggrdnt"></div>
            </div>

            <!-- Value 4 -->
            <div style="background: #ffffff; border: 1px solid var(--border-card); border-radius: var(--card-radius-curve); padding: 34px 28px; box-shadow: 0 4px 18px rgba(51, 39, 32, 0.06); position: relative; overflow: hidden;" data-aos="fade-up" data-aos-delay="400">
                <div style="width: 52px; height: 52px; background: rgba(197, 160, 89, 0.12); border: 1px solid var(--color-gold); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 22px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-gold);"><path d="M2 12h20"/><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-6"/><path d="m12 2 10 10-10 10L2 12Z"/></svg>
                </div>
                <h3 style="font-family: var(--font-serif); font-size: 1.45rem; color: var(--color-dark); margin-bottom: 12px;">Radical Transparency</h3>
                <p style="font-size: 0.95rem; line-height: 1.7; color: #554a43;">
                    Clear litigation risk analysis, statutory timelines, and principled billing structures free from ambiguities.
                </p>
                <div class="bggrdnt"></div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
