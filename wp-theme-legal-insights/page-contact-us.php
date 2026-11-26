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
$off_title  = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_title', 'Principal Chambers') : 'Principal Chambers';
$off_badge  = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_badge', 'Head Office') : 'Head Office';
$off_addr   = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_address', 'B-33, 1st Floor, Jangpura Extension, New Delhi – 110014') : 'B-33, 1st Floor, Jangpura Extension, New Delhi – 110014';
$off_phone  = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_phone', '+91 90135 35766') : '+91 90135 35766';
$off_email  = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_email', 'chaitanyamlegal@gmail.com') : 'chaitanyamlegal@gmail.com';
$off_maps   = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_maps_url', 'https://maps.app.goo.gl/pLAPAMtfgz7hAWnT9') : 'https://maps.app.goo.gl/pLAPAMtfgz7hAWnT9';

// Chambers Settings from Theme Options
$chamb_title = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_title', 'Court Chambers') : 'Court Chambers';
$chamb_badge = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_badge', 'Appellate Chambers') : 'Appellate Chambers';
$chamb_addr  = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_address', "Supreme Court of India & High Court of Delhi Bar Chambers, New Delhi") : "Supreme Court of India & High Court of Delhi Bar Chambers, New Delhi";
$chamb_phone = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_phone', '+91 90135 35766') : '+91 90135 35766';
$chamb_email = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_email', 'chaitanyamlegal@gmail.com') : 'chaitanyamlegal@gmail.com';
$chamb_maps  = function_exists('legal_insights_get_option') ? legal_insights_get_option('chambers_maps_url', 'https://maps.app.goo.gl/pLAPAMtfgz7hAWnT9') : 'https://maps.app.goo.gl/pLAPAMtfgz7hAWnT9';
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
        <div class="contact-form-box" style="background: #ffffff; border: 1px solid var(--border-card-subtle); border-radius: var(--card-radius-curve); box-shadow: 0 8px 30px rgba(51, 39, 32, 0.05); max-width: 900px; margin: 0 auto; padding: 50px 48px;" data-aos="fade-up">
            <div style="text-align: center; margin-bottom: 36px;">
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-gold); letter-spacing: 0.15em; text-transform: uppercase; display: block; margin-bottom: 6px;">
                    Advocate-Client Intake Protocol
                </span>
                <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--color-dark); margin-bottom: 10px;">
                    <?php echo esc_html($form_title); ?>
                </h2>
                <p style="font-size: 0.95rem; color: #64748b; max-width: 600px; margin: 0 auto;">
                    <?php echo esc_html($form_sub); ?>
                </p>
            </div>

            <!-- Dynamic AJAX Alert Container -->
            <div id="inquiryAlert" style="display: none; margin-bottom: 28px; border-radius: 8px; padding: 18px 24px; font-size: 0.95rem; line-height: 1.6;"></div>

            <form id="legalInquiryForm" class="contact-form-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 22px;">
                <!-- Security Honeypot to Trap Automated Spam Bots -->
                <div style="display:none !important; position:absolute; left:-9999px;" aria-hidden="true">
                    <input type="text" name="legal_fax_verify" tabindex="-1" autocomplete="off">
                </div>
                <div>
                    <label for="client_name" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Your Full Name *</label>
                    <input type="text" name="client_name" id="client_name" required placeholder="e.g. Alok Sharma" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none; font-size: 0.95rem;">
                </div>
                <div>
                    <label for="client_email" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Official Email *</label>
                    <input type="email" name="client_email" id="client_email" required placeholder="name@company.com" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none; font-size: 0.95rem;">
                </div>
                <div>
                    <label for="client_phone" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Contact Number *</label>
                    <input type="tel" name="client_phone" id="client_phone" required placeholder="+91 98110 00000" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none; font-size: 0.95rem;">
                </div>
                <div>
                    <label for="practice_jurisdiction" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Practice Area / Jurisdiction</label>
                    <select name="practice_jurisdiction" id="practice_jurisdiction" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none; background: #ffffff; font-size: 0.95rem;">
                        <option value="Commercial Litigation">Commercial Litigation (Contractual &amp; Business Disputes)</option>
                        <option value="Domestic & Institutional Arbitration">Domestic &amp; Institutional Arbitration (SIAC, ICC, Act)</option>
                        <option value="Civil Litigation">Civil Litigation (Property, Tenancy, Succession &amp; Recovery)</option>
                        <option value="Criminal Litigation">Criminal Litigation (Economic Offences &amp; White-Collar Defense)</option>
                        <option value="Startup Advisory">Startup Advisory (Policy &amp; Regulatory Compliance)</option>
                        <option value="Appellate & Supreme Court Litigation">Appellate &amp; Supreme Court Litigation (SLPs, Appeals)</option>
                        <option value="Tribunal Practice">Tribunal Practice (NCLAT &amp; DRAT)</option>
                        <option value="General Corporate Advisory">General Legal Consultation &amp; Retainer Mandate</option>
                    </select>
                </div>
                <div>
                    <label for="court_forum" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Target Judicial Forum</label>
                    <select name="court_forum" id="court_forum" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none; background: #ffffff; font-size: 0.95rem;">
                        <option value="Supreme Court of India">Supreme Court of India (Apex Court)</option>
                        <option value="Delhi High Court">Delhi High Court (Appellate / Original)</option>
                        <option value="NCLAT / NCLT">NCLAT / NCLT (Insolvency &amp; Corporate)</option>
                        <option value="DRAT / DRT">DRAT / DRT (Debt Recovery Tribunals)</option>
                        <option value="Arbitration Tribunal">Domestic / International Arbitral Tribunal</option>
                        <option value="Other State High Court">Other State High Court</option>
                        <option value="Special Sessions Court">Special Sessions Court (PMLA / CBI / Economic)</option>
                    </select>
                </div>
                <div>
                    <label for="urgency_level" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Matter Urgency</label>
                    
                    <!-- Real form select (hidden from direct view, synced via modern UI) -->
                    <select name="urgency_level" id="urgency_level" style="position: absolute; opacity: 0; pointer-events: none; width: 0; height: 0;">
                        <option value="Normal">Normal (Standard Review &amp; Consultation)</option>
                        <option value="High">High (Upcoming Hearing / Impending Order)</option>
                        <option value="Emergency (24-48 Hours)">Emergency (Urgent Mentioning / Stay / Bail)</option>
                    </select>

                    <!-- Modern Luxury Custom Select Trigger -->
                    <div id="urgencyDropdownWrap" style="position: relative;">
                        <div id="urgencyTrigger" tabindex="0" role="combobox" aria-expanded="false" aria-haspopup="listbox" style="width: 100%; padding: 10px 14px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); background: #ffffff; font-size: 0.93rem; display: flex; align-items: center; justify-content: space-between; cursor: pointer; transition: all 0.2s ease; user-select: none;">
                            <div id="urgencyTriggerContent" style="display: flex; align-items: center; gap: 10px; overflow: hidden;">
                                <span id="urgencyTriggerIcon" style="width: 28px; height: 28px; border-radius: 6px; background: rgba(59, 130, 246, 0.1); color: #2563eb; display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                </span>
                                <span id="urgencyTriggerText" style="font-weight: 500; color: #0f172a; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    Normal <span style="color: #64748b; font-size: 0.82rem; font-weight: 400;">(Standard Review)</span>
                                </span>
                            </div>
                            <svg id="urgencyChevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; transition: transform 0.2s ease;"><path d="m6 9 6 6 6-6"/></svg>
                        </div>

                        <!-- Floating Custom Menu -->
                        <div id="urgencyMenu" role="listbox" style="display: none; position: absolute; top: calc(100% + 6px); left: 0; right: 0; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; box-shadow: 0 12px 28px rgba(15, 23, 42, 0.14), 0 4px 10px rgba(15, 23, 42, 0.06); z-index: 100; padding: 6px; flex-direction: column; gap: 4px;">
                            
                            <!-- Normal Option -->
                            <div class="modern-urg-opt selected" data-value="Normal" data-label="Normal (Standard Review)" data-color="#2563eb" data-bg="rgba(59, 130, 246, 0.1)" role="option" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: space-between; transition: all 0.15s ease; background: #f8fafc;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <span style="width: 32px; height: 32px; border-radius: 8px; background: rgba(59, 130, 246, 0.1); color: #2563eb; display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    </span>
                                    <div>
                                        <div style="font-weight: 600; font-size: 0.9rem; color: #0f172a;">Normal</div>
                                        <div style="font-size: 0.77rem; color: #64748b;">Standard Review &amp; Consultation</div>
                                    </div>
                                </div>
                                <span class="urg-check" style="color: #c5a059;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                            </div>

                            <!-- High Option -->
                            <div class="modern-urg-opt" data-value="High" data-label="High Priority (Upcoming Hearing)" data-color="#d97706" data-bg="rgba(217, 119, 6, 0.12)" role="option" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: space-between; transition: all 0.15s ease;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <span style="width: 32px; height: 32px; border-radius: 8px; background: rgba(217, 119, 6, 0.12); color: #d97706; display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                    </span>
                                    <div>
                                        <div style="font-weight: 600; font-size: 0.9rem; color: #b45309; display: flex; align-items: center; gap: 6px;">
                                            High Priority
                                            <span style="font-size: 0.68rem; padding: 2px 6px; border-radius: 4px; background: rgba(217, 119, 6, 0.15); color: #b45309; font-weight: 700; text-transform: uppercase;">Priority</span>
                                        </div>
                                        <div style="font-size: 0.77rem; color: #64748b;">Upcoming Hearing / Impending Order</div>
                                    </div>
                                </div>
                                <span class="urg-check" style="color: #c5a059; display: none;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                            </div>

                            <!-- Emergency Option -->
                            <div class="modern-urg-opt" data-value="Emergency (24-48 Hours)" data-label="Emergency (Urgent Stay / Bail)" data-color="#dc2626" data-bg="rgba(220, 38, 38, 0.12)" role="option" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: space-between; transition: all 0.15s ease;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <span style="width: 32px; height: 32px; border-radius: 8px; background: rgba(220, 38, 38, 0.12); color: #dc2626; display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                                    </span>
                                    <div>
                                        <div style="font-weight: 600; font-size: 0.9rem; color: #dc2626; display: flex; align-items: center; gap: 6px;">
                                            Emergency (24–48 Hours)
                                            <span style="font-size: 0.68rem; padding: 2px 6px; border-radius: 4px; background: rgba(220, 38, 38, 0.15); color: #dc2626; font-weight: 700; text-transform: uppercase;">Urgent</span>
                                        </div>
                                        <div style="font-size: 0.77rem; color: #64748b;">Urgent Mentioning / Stay / Bail</div>
                                    </div>
                                </div>
                                <span class="urg-check" style="color: #c5a059; display: none;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                <div style="grid-column: 1 / -1;">
                    <label for="legal_mandate" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Brief Outline of Legal Mandate *</label>
                    <textarea name="legal_mandate" id="legal_mandate" rows="4" required placeholder="Please summarize the key factual dispute, ongoing legal proceedings (if any), and specific reliefs sought..." style="width: 100%; padding: 14px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none; font-size: 0.95rem;"></textarea>
                </div>
                <div style="grid-column: 1 / -1; text-align: center; margin-top: 10px;">
                    <button type="submit" id="inquirySubmitBtn" style="background: linear-gradient(135deg, #c5a059 0%, #dfba73 50%, #b38b42 100%); color: #0b111e; font-weight: 700; font-size: 1rem; padding: 15px 44px; border: none; border-radius: 8px; cursor: pointer; box-shadow: 0 4px 18px rgba(197, 160, 89, 0.4); display: inline-flex; align-items: center; justify-content: center; gap: 10px; transition: all 0.25s ease;">
                        <span class="btn-text">Transmit Privileged Mandate &rarr;</span>
                        <span class="btn-spinner" style="display: none; align-items: center; gap: 8px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" style="animation: spin 0.8s linear infinite; display: inline-block;"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
                            Transmitting Privileged Mandate...
                        </span>
                    </button>
                    <p style="font-size: 0.82rem; color: #94a3b8; margin-top: 16px; margin-bottom: 0; display: flex; align-items: center; justify-content: center; gap: 6px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <em>Strict Professional Secrecy: Transmissions are covered under Section 126 of the Indian Evidence Act.</em>
                    </p>
                </div>
            </form>
        </div>

    </div>
</section>

<style>
@keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
.modern-urg-opt:hover { background: #f1f5f9 !important; }
#urgencyTrigger:focus, #urgencyTrigger:hover { border-color: #c5a059 !important; box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.15); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var trigger = document.getElementById('urgencyTrigger');
    var menu = document.getElementById('urgencyMenu');
    var chevron = document.getElementById('urgencyChevron');
    var wrap = document.getElementById('urgencyDropdownWrap');
    var hiddenSelect = document.getElementById('urgency_level');
    var iconSpan = document.getElementById('urgencyTriggerIcon');
    var textSpan = document.getElementById('urgencyTriggerText');
    var options = document.querySelectorAll('.modern-urg-opt');

    if (!trigger || !menu || !wrap || !hiddenSelect) return;

    var iconsSvg = {
        'Normal': '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        'High': '<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
        'Emergency (24-48 Hours)': '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>'
    };

    function toggleMenu(open) {
        var isShowing = (open !== undefined) ? open : (menu.style.display !== 'flex');
        if (isShowing) {
            menu.style.display = 'flex';
            trigger.setAttribute('aria-expanded', 'true');
            chevron.style.transform = 'rotate(180deg)';
        } else {
            menu.style.display = 'none';
            trigger.setAttribute('aria-expanded', 'false');
            chevron.style.transform = 'rotate(0deg)';
        }
    }

    trigger.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleMenu();
    });

    trigger.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ' || e.key === 'ArrowDown') {
            e.preventDefault();
            toggleMenu(true);
        } else if (e.key === 'Escape') {
            toggleMenu(false);
        }
    });

    options.forEach(function(opt) {
        opt.addEventListener('click', function(e) {
            e.stopPropagation();
            var val = opt.getAttribute('data-value');
            var color = opt.getAttribute('data-color');
            var bg = opt.getAttribute('data-bg');
            var label = opt.getAttribute('data-label');

            // Sync hidden select
            hiddenSelect.value = val;
            var event = new Event('change', { bubbles: true });
            hiddenSelect.dispatchEvent(event);

            // Update UI trigger
            iconSpan.innerHTML = iconsSvg[val] || iconsSvg['Normal'];
            iconSpan.style.color = color;
            iconSpan.style.background = bg;
            textSpan.innerHTML = label;

            // Update option active states
            options.forEach(function(o) {
                o.style.background = 'transparent';
                var chk = o.querySelector('.urg-check');
                if (chk) chk.style.display = 'none';
            });
            opt.style.background = '#f8fafc';
            var check = opt.querySelector('.urg-check');
            if (check) check.style.display = 'inline-block';

            toggleMenu(false);
        });
    });

    document.addEventListener('click', function(e) {
        if (!wrap.contains(e.target)) {
            toggleMenu(false);
        }
    });
});
</script>
            </form>
        </div>

    </div>
</section>

<?php get_footer(); ?>
