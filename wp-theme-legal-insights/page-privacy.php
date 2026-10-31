<?php
/**
 * Template Name: Privacy Policy & Disclaimer
 *
 * Privacy Policy and Bar Council of India Regulatory Disclaimer.
 * Fully editable via WordPress Admin (Page Editor).
 *
 * @package Legal_Insights
 */

get_header();

// If page is edited with Elementor, render full-width content directly
if (function_exists('legal_insights_is_elementor_page') && legal_insights_is_elementor_page()) {
    echo '<main id="primary" class="site-main elementor-privacy-content" style="width: 100%;">';
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    echo '</main>';
    get_footer();
    return;
}

$firm_name = function_exists('legal_insights_get_firm_name') ? legal_insights_get_firm_name(false) : 'Malhotra & Co.';
$content = get_post_field('post_content', get_the_ID());
?>

<!-- Sub-Page Banner -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag">Regulatory Compliance &amp; Client Privilege</div>
                <h1 class="bnr_heading"><?php echo !empty(get_the_title()) ? get_the_title() : 'Privacy Policy'; ?></h1>
                <p class="bnr_subtitle">
                    <strong><?php echo esc_html($firm_name); ?></strong> &bull; Compliance with Bar Council of India Regulations and statutory advocate-client confidentiality.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="paddingTop paddingBottom" style="background: var(--bg-light);">
    <div class="container-custom">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="background: #ffffff; border: 1px solid var(--border-card-subtle); border-radius: var(--card-radius-curve); padding: 48px 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.04);" data-aos="fade-up">
                    
                    <?php if (!empty(trim($content))) : ?>
                        <div class="entry-content" style="font-size: 1.05rem; line-height: 1.85; color: var(--color-body-txt);">
                            <?php 
                            while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                            rewind_posts();
                            ?>
                        </div>
                    <?php else : ?>
                        <h2 style="font-family: var(--font-serif); font-size: 1.8rem; color: var(--color-dark); margin-bottom: 20px;">
                            Bar Council of India Regulatory Compliance
                        </h2>
                        <p style="font-size: 1rem; line-height: 1.75; color: var(--color-body-txt); margin-bottom: 24px;">
                            The rules of the Bar Council of India strictly prohibit law firms and advocates from advertising and soliciting work in any form or manner. By accessing this website, the user acknowledges that:
                        </p>
                        <ul style="list-style: disc; margin-left: 24px; color: var(--color-body-txt); line-height: 1.8; margin-bottom: 32px;">
                            <li style="margin-bottom: 10px;">The user is seeking information relating to <?php echo esc_html($firm_name); ?> of their own accord and there has been no advertisement, personal communication, solicitation, invitation or inducement of any sort whatsoever by or on behalf of the Firm.</li>
                            <li style="margin-bottom: 10px;">The information provided under this website is solely available for informational purposes and should not be interpreted as legal advice or solicitation of legal business.</li>
                            <li style="margin-bottom: 10px;">No attorney-client relationship is created or established by accessing, reading, or submitting information through this website.</li>
                            <li style="margin-bottom: 10px;"><?php echo esc_html($firm_name); ?> is not liable for any consequence of any action taken by the user relying on material or information provided on this website.</li>
                            <li style="margin-bottom: 10px;">All content on this website constitutes intellectual property of <?php echo esc_html($firm_name); ?> and cannot be reproduced without prior written approval.</li>
                        </ul>

                        <h3 style="font-family: var(--font-serif); font-size: 1.4rem; color: var(--color-dark); margin-bottom: 14px;">
                            Information Collection &amp; Confidentiality
                        </h3>
                        <p style="font-size: 1rem; line-height: 1.75; color: var(--color-body-txt); margin-bottom: 20px;">
                            Any transmission or inquiry initiated through our confidential consultation forms is safeguarded under statutory advocate-client privilege. We do not sell, rent, or trade client inquiries to external entities.
                        </p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
