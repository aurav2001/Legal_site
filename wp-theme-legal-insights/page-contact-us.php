<?php
/**
 * Template Name: Contact Us (AGL Style)
 *
 * Description: Law firm office, Supreme Court chambers, and confidential inquiry form.
 * Fully editable via WordPress Admin (Theme Options > Chambers & Contact + Page Editor).
 *
 * @package Legal_Insights
 */

get_header();

// If page is edited with Elementor, render full-width content directly
if (function_exists('legal_insights_is_elementor_page') && legal_insights_is_elementor_page()) {
    echo '<main id="primary" class="site-main elementor-contact-content" style="width: 100%;">';
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    echo '</main>';
    get_footer();
    return;
}

$page_id = get_the_ID();
$tagline    = get_post_meta($page_id, '_contact_tagline', true);
$form_title = get_post_meta($page_id, '_contact_form_title', true);
$form_sub   = get_post_meta($page_id, '_contact_form_sub', true);

if (empty($tagline)) {
    $tagline = 'Chambers Engagement';
}
if (empty($form_title)) {
    $form_title = 'Confidential Inquiries';
}
if (empty($form_sub)) {
    $form_sub = 'All communications are covered by strict statutory advocate-client privilege.';
}

// Office Settings from Theme Options
$off_title  = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_title', 'Our Office') : 'Our Office';
$off_badge  = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_badge', 'Corporate Headquarters') : 'Corporate Headquarters';
$off_addr   = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_address', 'Ground Floor, Mercantile House, 15, Kasturba Gandhi Marg, Connaught Place, New Delhi – 110001') : 'Ground Floor, Mercantile House, 15, Kasturba Gandhi Marg, Connaught Place, New Delhi – 110001';
$off_phone  = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_phone', '+91 11 4220 0000, +91 11 2335 4330') : '+91 11 4220 0000, +91 11 2335 4330';
$off_email  = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_email', 'contact@vanguardpartners.law') : 'contact@vanguardpartners.law';
$off_maps   = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_maps_url', 'https://maps.google.com') : 'https://maps.google.com';

// Chambers Settings from Theme Options
$chamb_title = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_title', 'Our Court Chambers') : 'Our Court Chambers';
$chamb_badge = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_badge', 'Apex Court Desk') : 'Apex Court Desk';
$chamb_addr  = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_address', "48 & 74, Lawyers' Chambers, Supreme Court of India, Tilak Marg, New Delhi – 110001") : "48 & 74, Lawyers' Chambers, Supreme Court of India, Tilak Marg, New Delhi – 110001";
$chamb_phone = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_phone', '+91 11 2338 2318, +91 11 2338 9629') : '+91 11 2338 2318, +91 11 2338 9629';
$chamb_email = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_email', 'chambers@vanguardpartners.law') : 'chambers@vanguardpartners.law';
$chamb_maps  = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_maps_url', 'https://maps.google.com') : 'https://maps.google.com';
?>

<!-- Banner Section -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag"><?php echo esc_html($tagline); ?></div>
                <h1 class="bnr_heading"><?php the_title(); ?></h1>
                <p class="bnr_subtitle">
                    Connect directly with our designated Senior Advocates and Partners at our Supreme Court Chambers and Central New Delhi Offices.
                </p>
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

<!-- Office & Chambers Cards Section -->
<section style="padding: 70px 0 90px 0; background: #fbfbfd;">
    <div class="container-custom">
        
        <div class="contact-offices-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; margin-bottom: 60px;">
            
            <!-- Office Card -->
            <div style="background: #ffffff; border: 1px solid var(--border-card); border-radius: var(--card-radius-curve); padding: 38px; box-shadow: 0 6px 20px rgba(51, 39, 32, 0.06); position: relative; overflow: hidden;" data-aos="fade-right">
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-gold); letter-spacing: 0.12em; text-transform: uppercase; display: block; margin-bottom: 6px;">
                    <?php echo esc_html($off_badge); ?>
                </span>
                <h2 style="font-family: var(--font-serif); font-size: 1.8rem; color: var(--color-dark); margin-bottom: 16px;">
                    <?php echo esc_html($off_title); ?>
                </h2>
                <p style="font-size: 1rem; color: #554a43; line-height: 1.7; margin-bottom: 12px;">
                    <?php echo nl2br(esc_html($off_addr)); ?>
                </p>
                <p style="font-size: 0.95rem; color: #554a43; margin-bottom: 12px;">
                    <strong>Telephone: </strong><?php echo esc_html($off_phone); ?>
                </p>
                <p style="font-size: 0.95rem; color: #554a43; margin-bottom: 24px;">
                    <strong>Email: </strong><a href="mailto:<?php echo esc_attr($off_email); ?>" style="color: var(--color-gold); font-weight: 600;"><?php echo esc_html($off_email); ?></a>
                </p>
                <a href="<?php echo esc_url($off_maps); ?>" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.92rem; font-weight: 600; color: var(--color-dark); text-decoration: underline;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>Find Us on Google Maps</span>
                </a>
                <div class="bggrdnt"></div>
            </div>

            <!-- Court Chambers Card -->
            <div style="background: #ffffff; border: 1px solid var(--border-card); border-radius: var(--card-radius-curve); padding: 38px; box-shadow: 0 6px 20px rgba(51, 39, 32, 0.06); position: relative; overflow: hidden;" data-aos="fade-left">
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-gold); letter-spacing: 0.12em; text-transform: uppercase; display: block; margin-bottom: 6px;">
                    <?php echo esc_html($chamb_badge); ?>
                </span>
                <h2 style="font-family: var(--font-serif); font-size: 1.8rem; color: var(--color-dark); margin-bottom: 16px;">
                    <?php echo esc_html($chamb_title); ?>
                </h2>
                <p style="font-size: 1rem; color: #554a43; line-height: 1.7; margin-bottom: 12px;">
                    <?php echo nl2br(esc_html($chamb_addr)); ?>
                </p>
                <p style="font-size: 0.95rem; color: #554a43; margin-bottom: 12px;">
                    <strong>Telephone: </strong><?php echo esc_html($chamb_phone); ?>
                </p>
                <p style="font-size: 0.95rem; color: #554a43; margin-bottom: 24px;">
                    <strong>Email: </strong><a href="mailto:<?php echo esc_attr($chamb_email); ?>" style="color: var(--color-gold); font-weight: 600;"><?php echo esc_html($chamb_email); ?></a>
                </p>
                <a href="<?php echo esc_url($chamb_maps); ?>" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.92rem; font-weight: 600; color: var(--color-dark); text-decoration: underline;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>View Supreme Court Chambers Location</span>
                </a>
                <div class="bggrdnt"></div>
            </div>

        </div>

        <!-- Confidential Inquiry Form -->
        <div class="contact-form-box" style="background: #ffffff; border: 1px solid var(--border-card-subtle); border-radius: var(--card-radius-curve); box-shadow: 0 8px 30px rgba(51, 39, 32, 0.05); max-width: 860px; margin: 0 auto;" data-aos="fade-up">
            <div style="text-align: center; margin-bottom: 36px;">
                <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--color-dark); margin-bottom: 10px;">
                    <?php echo esc_html($form_title); ?>
                </h2>
                <p style="font-size: 0.95rem; color: #64748b;">
                    <?php echo esc_html($form_sub); ?>
                </p>
            </div>

            <form action="" method="post" class="contact-form-grid">
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Your Full Name *</label>
                    <input type="text" required placeholder="e.g. Alok Sharma" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Official Email *</label>
                    <input type="email" required placeholder="name@company.com" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Contact Number *</label>
                    <input type="tel" required placeholder="+91 98110 00000" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Practice Jurisdiction</label>
                    <select style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none; background: #ffffff;">
                        <option value="Arbitration & ADR">Arbitration &amp; ADR</option>
                        <option value="Commercial Litigation">Commercial Litigation</option>
                        <option value="Corporate & Insolvency Laws">Corporate &amp; Insolvency Laws (IBC)</option>
                        <option value="Competition Law">Competition Law (CCI)</option>
                        <option value="Constitutional Law">Constitutional Law</option>
                        <option value="White-Collar Crime">White-Collar Crime (PMLA)</option>
                        <option value="Other High Court / SC Mandate">Other High Court / SC Mandate</option>
                    </select>
                </div>
                <div style="grid-column: 1 / -1;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Nature of Legal Mandate *</label>
                    <textarea rows="4" required placeholder="Please outline the nature of legal assistance, relevant court forum, and urgency level..." style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none;"></textarea>
                </div>
                <div style="grid-column: 1 / -1; text-align: center; margin-top: 10px;">
                    <button type="submit" style="background: linear-gradient(135deg, #c5a059 0%, #dfba73 50%, #b38b42 100%); color: #0b111e; font-weight: 700; font-size: 1rem; padding: 14px 44px; border: none; border-radius: 8px; cursor: pointer; box-shadow: 0 4px 18px rgba(197, 160, 89, 0.4);">
                        Submit Confidential Inquiry &rarr;
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>

<?php get_footer(); ?>
