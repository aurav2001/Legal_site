<?php
/**
 * Template Name: Our Expertise (AGL Style)
 *
 * Description: Practice areas overview covering Litigation, Arbitration, and Corporate law.
 * Fully editable via WordPress Admin (Practice Areas CPT + Page Editor).
 *
 * @package Legal_Insights
 */

get_header();

// If page is edited with Elementor, render full-width content directly
if (function_exists('legal_insights_is_elementor_page') && legal_insights_is_elementor_page()) {
    echo '<main id="primary" class="site-main elementor-expertise-content" style="width: 100%;">';
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    echo '</main>';
    get_footer();
    return;
}

$firm_name = function_exists('legal_insights_get_firm_name') ? legal_insights_get_firm_name(false) : 'Malhotra & Co.';
?>

<!-- Banner Section -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag">Practice Disciplines • Supreme Court &amp; High Courts</div>
                <h1 class="bnr_heading">Our Practice Areas</h1>
                <p class="bnr_subtitle">
                    Strategic courtroom litigation, institutional arbitration, tribunal advocacy, and corporate regulatory counsel across Indian forums.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Established Summary Statement -->
<section style="padding: 50px 0; background: #ffffff; border-bottom: 1px solid #eee8e2;">
    <div class="container-custom">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <div style="max-width: 980px; margin: 0 auto; text-align: center;">
                    <p style="font-size: 1.15rem; color: #554a43; line-height: 1.8;">
                        At <?php echo esc_html($firm_name); ?>, with more than 50 years of practice and three generations in the profession, we act in litigation and advisory matters where careful strategy and focused, partner-led attention make the difference.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pillar 1: Commercial & Appellate Litigation -->
<section class="expertise-pillar-sec" style="padding: 70px 0; background: #fbfbfd; border-bottom: 1px solid #f1f5f9;">
    <div class="container-custom">
        <div class="row align-items-center g-4">
            <div class="col-lg-6 col-12" data-aos="fade-right">
                <div class="pillar-visual-box">
                    <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=1000&q=80" alt="Commercial and Appellate Litigation">
                </div>
            </div>
            <div class="col-lg-6 col-12 pillar-desc-col ps-lg-4" data-aos="fade-left">
                <div class="bnr_tag">Pillar I</div>
                <h2 class="pillar-heading">
                    Commercial &amp; Appellate Litigation
                </h2>
                <p class="pillar-text">
                    Our advocates command extensive courtroom advocacy before the Supreme Court of India and High Court of Delhi, providing strategic counsel in complex contractual disputes, shareholder conflicts, civil appeals, and white-collar criminal defense.
                </p>
                <ul class="pillar-points-list">
                    <li><span style="color: var(--color-gold);">✦</span> Commercial Litigation (Contractual, Shareholder &amp; Business Disputes)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Appellate &amp; Supreme Court Litigation (SLPs, Review &amp; Curative Petitions)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Civil Litigation (Property, Tenancy, Succession &amp; Recovery Suits)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Criminal Litigation (Economic Offences, Trial Defense &amp; Regular / Anticipatory Bail)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Pillar 2: Domestic & Institutional Arbitration -->
<section class="expertise-pillar-sec" style="padding: 70px 0; background: #ffffff; border-bottom: 1px solid #f1f5f9;">
    <div class="container-custom">
        <div class="row align-items-center g-4 flex-lg-row-reverse">
            <div class="col-lg-6 col-12" data-aos="fade-left">
                <div class="pillar-visual-box">
                    <img src="https://images.unsplash.com/photo-1505664194779-8beaceb93744?auto=format&fit=crop&w=1000&q=80" alt="Domestic and Institutional Arbitration">
                </div>
            </div>
            <div class="col-lg-6 col-12 pillar-desc-col pe-lg-4" data-aos="fade-right">
                <div class="bnr_tag">Pillar II</div>
                <h2 class="pillar-heading">
                    Domestic &amp; Institutional Arbitration
                </h2>
                <p class="pillar-text">
                    We represent commercial entities, business partners, and individual litigants in high-stakes arbitrations governed by the Indian Arbitration &amp; Conciliation Act 1996, alongside institutional arbitrations under SIAC and ICC rules.
                </p>
                <ul class="pillar-points-list">
                    <li><span style="color: var(--color-gold);">✦</span> Domestic Commercial Arbitration under the Indian Arbitration &amp; Conciliation Act 1996</li>
                    <li><span style="color: var(--color-gold);">✦</span> Section 9 Applications for Urgent Interim Measures &amp; Protection of Subject Matter</li>
                    <li><span style="color: var(--color-gold);">✦</span> Section 11 Applications for Appointment of Arbitral Tribunals</li>
                    <li><span style="color: var(--color-gold);">✦</span> Section 34 &amp; Section 37 Proceedings (Challenge, Setting Aside &amp; Enforcement of Awards)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Pillar 3: Tribunal Practice & Startup Advisory -->
<section class="expertise-pillar-sec" style="padding: 70px 0; background: #fbfbfd; border-bottom: 1px solid #f1f5f9;">
    <div class="container-custom">
        <div class="row align-items-center g-4">
            <div class="col-lg-6 col-12" data-aos="fade-right">
                <div class="pillar-visual-box">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1000&q=80" alt="Tribunal Practice and Startup Advisory">
                </div>
            </div>
            <div class="col-lg-6 col-12 pillar-desc-col ps-lg-4" data-aos="fade-left">
                <div class="bnr_tag">Pillar III</div>
                <h2 class="pillar-heading">
                    Tribunal Practice &amp; Startup Advisory
                </h2>
                <p class="pillar-text">
                    Specialized representation before regulatory and debt recovery appellate tribunals, combined with hands-on corporate, regulatory, and policy advisory for emerging businesses and founders.
                </p>
                <ul class="pillar-points-list">
                    <li><span style="color: var(--color-gold);">✦</span> Tribunal Practice before NCLAT (National Company Law Appellate Tribunal)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Debt Recovery Appellate Practice before DRAT &amp; DRT</li>
                    <li><span style="color: var(--color-gold);">✦</span> Startup Advisory (Policy, Regulatory Compliance &amp; Structuring for Emerging Businesses)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Commercial Contracts, Founder Agreements, Governance &amp; Pre-Litigation Advisory</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: THE 7 CORE PRACTICE DISCIPLINES -->
<section style="padding: 85px 0; background: #ffffff;">
    <div class="container-custom">
        <div class="row text-center mb-5" data-aos="fade-up">
            <div class="col-12">
                <div style="display:inline-block; margin-bottom: 12px; background: rgba(197, 160, 89, 0.12); color: var(--color-gold); font-size: 0.8rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; padding: 6px 16px; border-radius: 20px;">
                    Comprehensive Legal Disciplines
                </div>
                <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: #0f172a; margin-bottom: 14px;">
                    Our Specialized Practice Areas
                </h2>
                <p style="color: #64748b; max-width: 720px; margin: 0 auto; font-size: 1rem; line-height: 1.7;">
                    Delivering strategic foresight and partner-led attention across trial courts, appellate High Courts, specialized tribunals, and the Supreme Court of India.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- 1. Commercial Litigation -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50">
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; height: 100%; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <span style="width: 40px; height: 40px; border-radius: 8px; background: rgba(197, 160, 89, 0.12); color: #c5a059; display: flex; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M4 18h16"/><path d="M6 18v-7"/><path d="M10 18v-7"/><path d="M14 18v-7"/><path d="M18 18v-7"/><polygon points="12 2 20 7 4 7 12 2"/></svg>
                            </span>
                            <span style="font-size: 0.72rem; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 3px 8px; border-radius: 4px; text-transform: uppercase;">Delhi High Court</span>
                        </div>
                        <h3 style="font-family: var(--font-serif); font-size: 1.25rem; color: #0f172a; margin-bottom: 10px;">Commercial Litigation</h3>
                        <p style="font-size: 0.9rem; color: #64748b; line-height: 1.65; margin-bottom: 16px;">
                            Representation in high-value contractual breaches, shareholder deadlock disputes, injunction applications, and recovery proceedings before Commercial Courts and High Courts.
                        </p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" style="color: #c5a059; font-weight: 600; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">Consult Counsel &rarr;</a>
                </div>
            </div>

            <!-- 2. Domestic & Institutional Arbitration -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; height: 100%; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <span style="width: 40px; height: 40px; border-radius: 8px; background: rgba(197, 160, 89, 0.12); color: #c5a059; display: flex; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                            </span>
                            <span style="font-size: 0.72rem; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 3px 8px; border-radius: 4px; text-transform: uppercase;">SIAC • ICC • Indian Act</span>
                        </div>
                        <h3 style="font-family: var(--font-serif); font-size: 1.25rem; color: #0f172a; margin-bottom: 10px;">Domestic &amp; Institutional Arbitration</h3>
                        <p style="font-size: 0.9rem; color: #64748b; line-height: 1.65; margin-bottom: 16px;">
                            Ad-hoc and institutional commercial arbitration under the Arbitration &amp; Conciliation Act 1996, SIAC, and ICC rules, including Section 9 interim relief and Section 34 award challenges.
                        </p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" style="color: #c5a059; font-weight: 600; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">Consult Counsel &rarr;</a>
                </div>
            </div>

            <!-- 3. Civil Litigation -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; height: 100%; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <span style="width: 40px; height: 40px; border-radius: 8px; background: rgba(197, 160, 89, 0.12); color: #c5a059; display: flex; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                            </span>
                            <span style="font-size: 0.72rem; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 3px 8px; border-radius: 4px; text-transform: uppercase;">Civil Courts &amp; High Court</span>
                        </div>
                        <h3 style="font-family: var(--font-serif); font-size: 1.25rem; color: #0f172a; margin-bottom: 10px;">Civil Litigation</h3>
                        <p style="font-size: 0.9rem; color: #64748b; line-height: 1.65; margin-bottom: 16px;">
                            Strategic civil advocacy in property and real estate title disputes, landlord-tenant conflicts, inheritance &amp; succession partitions, and commercial money recovery suits.
                        </p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" style="color: #c5a059; font-weight: 600; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">Consult Counsel &rarr;</a>
                </div>
            </div>

            <!-- 4. Criminal Litigation -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; height: 100%; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <span style="width: 40px; height: 40px; border-radius: 8px; background: rgba(197, 160, 89, 0.12); color: #c5a059; display: flex; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                            </span>
                            <span style="font-size: 0.72rem; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 3px 8px; border-radius: 4px; text-transform: uppercase;">Sessions &amp; High Courts</span>
                        </div>
                        <h3 style="font-family: var(--font-serif); font-size: 1.25rem; color: #0f172a; margin-bottom: 10px;">Criminal Litigation</h3>
                        <p style="font-size: 0.9rem; color: #64748b; line-height: 1.65; margin-bottom: 16px;">
                            White-collar criminal defense, economic offences, corporate fraud investigations, trial court representations, quashing petitions, and regular &amp; anticipatory bail advocacy.
                        </p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" style="color: #c5a059; font-weight: 600; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">Consult Counsel &rarr;</a>
                </div>
            </div>

            <!-- 5. Startup Advisory -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; height: 100%; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <span style="width: 40px; height: 40px; border-radius: 8px; background: rgba(197, 160, 89, 0.12); color: #c5a059; display: flex; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                            </span>
                            <span style="font-size: 0.72rem; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 3px 8px; border-radius: 4px; text-transform: uppercase;">Corporate &amp; Regulatory</span>
                        </div>
                        <h3 style="font-family: var(--font-serif); font-size: 1.25rem; color: #0f172a; margin-bottom: 10px;">Startup Advisory</h3>
                        <p style="font-size: 0.9rem; color: #64748b; line-height: 1.65; margin-bottom: 16px;">
                            Hands-on counsel for emerging businesses and founders: policy and regulatory compliance, commercial contracts, employment policies, IP protections, and venture structuring.
                        </p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" style="color: #c5a059; font-weight: 600; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">Consult Counsel &rarr;</a>
                </div>
            </div>

            <!-- 6. Appellate & Supreme Court Litigation -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; height: 100%; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <span style="width: 40px; height: 40px; border-radius: 8px; background: rgba(197, 160, 89, 0.12); color: #c5a059; display: flex; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                            </span>
                            <span style="font-size: 0.72rem; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 3px 8px; border-radius: 4px; text-transform: uppercase;">Supreme Court of India</span>
                        </div>
                        <h3 style="font-family: var(--font-serif); font-size: 1.25rem; color: #0f172a; margin-bottom: 10px;">Appellate &amp; Supreme Court</h3>
                        <p style="font-size: 0.9rem; color: #64748b; line-height: 1.65; margin-bottom: 16px;">
                            Distinguished appellate practice: drafting and arguing Special Leave Petitions (SLPs), Civil and Criminal Appeals, Review Petitions, and Curative Petitions before the Apex Court.
                        </p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" style="color: #c5a059; font-weight: 600; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">Consult Counsel &rarr;</a>
                </div>
            </div>

            <!-- 7. Tribunal Practice (NCLAT & DRAT) -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="350">
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; height: 100%; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.25s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                            <span style="width: 40px; height: 40px; border-radius: 8px; background: rgba(197, 160, 89, 0.12); color: #c5a059; display: flex; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M7 17v-4"/><path d="M12 17v-8"/><path d="M17 17v-6"/></svg>
                            </span>
                            <span style="font-size: 0.72rem; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 3px 8px; border-radius: 4px; text-transform: uppercase;">NCLAT • DRAT • DRT</span>
                        </div>
                        <h3 style="font-family: var(--font-serif); font-size: 1.25rem; color: #0f172a; margin-bottom: 10px;">Tribunal Practice</h3>
                        <p style="font-size: 0.9rem; color: #64748b; line-height: 1.65; margin-bottom: 16px;">
                            Dedicated representations before the National Company Law Appellate Tribunal (NCLAT), Debt Recovery Appellate Tribunal (DRAT), and Debt Recovery Tribunals (DRT).
                        </p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" style="color: #c5a059; font-weight: 600; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">Consult Counsel &rarr;</a>
                </div>
            </div>

            <!-- Consultation Banner Card -->
            <div class="col-lg-8 col-md-12" data-aos="fade-up" data-aos-delay="400">
                <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border: 1px solid rgba(197, 160, 89, 0.3); border-radius: 12px; padding: 28px 36px; height: 100%; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
                    <div>
                        <div style="color: #c5a059; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 6px;">
                            Serving Since 1967 • Three Generations
                        </div>
                        <h3 style="font-family: var(--font-serif); font-size: 1.4rem; color: #ffffff; margin-bottom: 6px;">
                            Have an Upcoming Court Date or Urgent Legal Mandate?
                        </h3>
                        <p style="color: #94a3b8; font-size: 0.88rem; margin-bottom: 0; max-width: 500px;">
                            Connect directly with our Chambers at Jangpura Extension or reach our Supreme Court Registry.
                        </p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="sub_filter_btn active" style="padding: 12px 26px; font-size: 0.9rem; background: linear-gradient(135deg, #c5a059 0%, #dfba73 50%, #b38b42 100%); color: #0b111e !important; font-weight: 700; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(197, 160, 89, 0.35); border: 1px solid #dfba73; white-space: nowrap;">
                        Schedule Consultation &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
