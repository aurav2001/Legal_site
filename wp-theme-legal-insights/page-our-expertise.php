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

$firm_name = function_exists('legal_insights_get_firm_name') ? legal_insights_get_firm_name(false) : 'Malhotra & Co.';
?>

<!-- Banner Section -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag">Practice Jurisdictions</div>
                <h1 class="bnr_heading"><?php the_title(); ?></h1>
                <p class="bnr_subtitle">
                    Comprehensive legal solutions tailored to high-stakes corporate disputes, Supreme Court appellate matters, cross-border transactions, and global arbitrations.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Established Summary Statement -->
<section style="padding: 60px 0; background: #ffffff; border-bottom: 1px solid #eee8e2;">
    <div class="container-custom">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <div style="max-width: 980px; margin: 0 auto; text-align: center;">
                    <p style="font-size: 1.15rem; color: #554a43; line-height: 1.8;">
                        At <?php echo esc_html($firm_name); ?>, we offer strategic legal counsel across three core pillars: Courtroom Litigation before Supreme Court &amp; High Courts, Alternate Dispute Resolution (Arbitration &amp; Mediation), and Corporate Restructuring &amp; Regulatory Practice.
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

<!-- Pillar 1: Litigation Across Courts & Tribunals -->
<section class="expertise-pillar-sec" style="padding: 70px 0; background: #fbfbfd; border-bottom: 1px solid #f1f5f9;">
    <div class="container-custom">
        <div class="row align-items-center g-4">
            <div class="col-lg-6 col-12" data-aos="fade-right">
                <div class="pillar-visual-box">
                    <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=1000&q=80" alt="Litigation">
                </div>
            </div>
            <div class="col-lg-6 col-12 pillar-desc-col ps-lg-4" data-aos="fade-left">
                <div class="bnr_tag">Pillar I</div>
                <h2 class="pillar-heading">
                    Litigation across Courts &amp; Tribunals
                </h2>
                <p class="pillar-text">
                    Our advocates command formidable courtroom stature before the Supreme Court of India, Delhi High Court, Bombay High Court, and specialized tribunals including NCLAT, APTEL, TDSAT, and the National Green Tribunal.
                </p>
                <ul class="pillar-points-list">
                    <li><span style="color: var(--color-gold);">✦</span> Civil &amp; Commercial Litigation</li>
                    <li><span style="color: var(--color-gold);">✦</span> Constitutional Law &amp; Special Leave Petitions (SLPs)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Criminal Law &amp; White-Collar Defense (PMLA / ED / CBI)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Environmental Law &amp; National Green Tribunal (NGT)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Regulatory Litigation (Power, Telecommunications, Mining)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Pillar 2: Alternate Dispute Resolution (ADR) -->
<section class="expertise-pillar-sec" style="padding: 70px 0; background: #ffffff; border-bottom: 1px solid #f1f5f9;">
    <div class="container-custom">
        <div class="row align-items-center g-4 flex-lg-row-reverse">
            <div class="col-lg-6 col-12" data-aos="fade-left">
                <div class="pillar-visual-box">
                    <img src="https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=1000&q=80" alt="Arbitration">
                </div>
            </div>
            <div class="col-lg-6 col-12 pillar-desc-col pe-lg-4" data-aos="fade-right">
                <div class="bnr_tag">Pillar II</div>
                <h2 class="pillar-heading">
                    Alternate Dispute Resolution (ADR)
                </h2>
                <p class="pillar-text">
                    We represent multinational corporations, sovereign contractors, and infrastructure developers in high-value cross-border arbitrations administered under SIAC, ICC, LCIA, and UNCITRAL rules.
                </p>
                <ul class="pillar-points-list">
                    <li><span style="color: var(--color-gold);">✦</span> Domestic &amp; International Commercial Arbitration</li>
                    <li><span style="color: var(--color-gold);">✦</span> Section 9 &amp; Section 34 Applications (Setting Aside Awards)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Cross-Border Enforcement under the New York Convention 1958</li>
                    <li><span style="color: var(--color-gold);">✦</span> Mediation &amp; Pre-Arbitral Dispute Escalation</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Pillar 3: Corporate and Commercial Practice -->
<section class="expertise-pillar-sec" style="padding: 70px 0; background: #fbfbfd;">
    <div class="container-custom">
        <div class="row align-items-center g-4">
            <div class="col-lg-6 col-12" data-aos="fade-right">
                <div class="pillar-visual-box">
                    <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=1000&q=80" alt="Corporate Practice">
                </div>
            </div>
            <div class="col-lg-6 col-12 pillar-desc-col ps-lg-4" data-aos="fade-left">
                <div class="bnr_tag">Pillar III</div>
                <h2 class="pillar-heading">
                    Corporate &amp; Commercial Practice
                </h2>
                <p class="pillar-text">
                    End-to-end strategic advisory on corporate restructurings, insolvencies, mergers, antitrust clearances, and regulatory filings under Indian corporate legislation.
                </p>
                <ul class="pillar-points-list">
                    <li><span style="color: var(--color-gold);">✦</span> Corporate Insolvency &amp; Restructuring (IBC 2016)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Mergers, Demergers &amp; Capital Reduction (NCLT)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Competition &amp; Antitrust Law (CCI Clearance)</li>
                    <li><span style="color: var(--color-gold);">✦</span> Securities Law &amp; SEBI Takeover Regulations</li>
                    <li><span style="color: var(--color-gold);">✦</span> Direct &amp; Indirect Taxation Advisory</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
