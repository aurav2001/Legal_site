<?php
/**
 * Template Name: Practice Area Detail
 *
 * Detailed single practice area layout (e.g., Arbitration, Commercial Litigation).
 * Displays practice overview, landmark cases timeline/cards, and sidebar links.
 */

get_header(); ?>

<!-- Sub-Page Banner -->
<section class="about-mn">
    <div class="about-banner">
        <div class="bnrbx">
            <img class="img-fluid desktop-view" src="https://aglaw.in/wp-content/uploads/2024/07/Arbitration-.png" alt="Arbitration Practice" onerror="this.src='https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=1600&q=80';">
        </div>
        <div class="bnr__cntnt">
            <div class="vrtclcntr_bx">
                <div class="vrtclcntr_bxinr">
                    <div class="container-custom">
                        <div class="about_banner_txt" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="bnr_heading"><?php the_title(); ?></h2>
                            <p class="bnr_para">
                                <strong>Practice Areas</strong> &bull; Agarwal Law Associates<br>
                                High-stakes dispute resolution, emergency relief, and appellate advocacy before domestic and international tribunals.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content & Landmark Cases Section -->
<section class="paddingTop paddingBottom" style="background: var(--bg-light);">
    <div class="container-custom">
        <div class="row">
            
            <!-- Left 8 Columns: Detail & Landmark Cases -->
            <div class="col-8">
                
                <div class="mb-5" data-aos="fade-up">
                    <div class="sub-badge" style="display:inline-block; margin-bottom: 12px; background: rgba(197, 160, 89, 0.12); color: var(--color-gold); font-size: 0.8rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 6px 16px; border-radius: 20px;">
                        Domain Expertise
                    </div>
                    <h2 class="headingFontBlk" style="margin-bottom: 18px;">Overview &amp; Strategic Approach</h2>
                    <p style="font-size: 1.05rem; line-height: 1.8; color: var(--color-body-txt); margin-bottom: 24px;">
                        From pioneering decisions on the impact of arbitration on non-signatories to influencing the grounds for setting aside arbitral awards, our Firm is at the forefront of navigating complex and high-stakes arbitration disputes across energy, infrastructure, telecom, and corporate sectors.
                    </p>
                    <p style="font-size: 1.02rem; line-height: 1.75; color: var(--color-body-txt);">
                        We represent prominent domestic conglomerates, multinational enterprises, and public entities in both ad-hoc arbitrations and institutional proceedings governed by LCIA, SIAC, ICC, and ICA rules, as well as Section 9, 11, 34, and 37 proceedings across Indian High Courts and the Supreme Court.
                    </p>
                </div>

                <div class="landmark-cases-wrapper" style="margin-top: 48px;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.8rem; color: var(--color-dark); margin-bottom: 24px;" data-aos="fade-up">
                        Landmark Precedents &amp; Representative Matters
                    </h3>

                    <!-- Case 1 -->
                    <div class="case-milestone-card" data-aos="fade-up" data-aos-delay="50">
                        <span class="case-forum-badge">Supreme Court of India Landmark</span>
                        <h4 class="case-title">Sukanya Holdings vs Jayesh H Pandya</h4>
                        <p class="case-summary">
                            The Supreme Court of India's seminal ruling addressing the effect of arbitration on non-signatories. The Court established that where a dispute involves multiple parties, some of whom are non-signatories, Section 8 of the Arbitration Act does not permit splitting causes of action to refer only select parties to arbitration.
                        </p>
                    </div>

                    <!-- Case 2 -->
                    <div class="case-milestone-card" data-aos="fade-up" data-aos-delay="100">
                        <span class="case-forum-badge">Apex Court Jurisprudence</span>
                        <h4 class="case-title">ONGC vs Saw Pipes Ltd</h4>
                        <p class="case-summary">
                            Landmark judgment defining the ambit of 'public policy' as a vital ground for setting aside arbitral awards under Section 34, reshaping commercial enforcement across India for decades.
                        </p>
                    </div>

                    <!-- Case 3 -->
                    <div class="case-milestone-card" data-aos="fade-up" data-aos-delay="150">
                        <span class="case-forum-badge">Supreme Court Curative Bench</span>
                        <h4 class="case-title">DMRC Curative Petition (Airport Express Line)</h4>
                        <p class="case-summary">
                            Represented Delhi Airport Metro Express Pvt. Ltd. (DAMEPL) through intricate Section 34, 37, and unprecedented open-court Curative Petition proceedings arising from the concession agreement termination on the Airport Metro Express Line.
                        </p>
                    </div>

                    <!-- Case 4 -->
                    <div class="case-milestone-card" data-aos="fade-up" data-aos-delay="200">
                        <span class="case-forum-badge">SIAC Institutional Arbitration</span>
                        <h4 class="case-title">Manipal Emergency Arbitration (SIAC)</h4>
                        <p class="case-summary">
                            Successfully represented Manipal Education &amp; Medical Group (MEMG) in emergency arbitration proceedings under SIAC rules, securing emergency interim injunctions restraining the transfer of educational equity assets.
                        </p>
                    </div>

                    <!-- Case 5 -->
                    <div class="case-milestone-card" data-aos="fade-up" data-aos-delay="250">
                        <span class="case-forum-badge">Delhi High Court Jurisprudence</span>
                        <h4 class="case-title">Fermina Developers vs Indiabulls Housing Finance</h4>
                        <p class="case-summary">
                            Established precedent regarding SARFAESI Act supremacy: once a lender issues notice under Section 13(2), mortgage-related disputes fall under the Debt Recovery Tribunal's exclusive realm and cannot be referred to arbitration.
                        </p>
                    </div>

                    <!-- Case 6 -->
                    <div class="case-milestone-card" data-aos="fade-up" data-aos-delay="300">
                        <span class="case-forum-badge">Venue vs. Seat Precedent</span>
                        <h4 class="case-title">Vasudev Garg vs Embassy Commercial Projects</h4>
                        <p class="case-summary">
                            Delhi High Court ruled that contractually designated arbitration venues operate as the legal seat unless expressly negated, clarifying forum selection and jurisdictional thresholds in Section 9 petitions.
                        </p>
                    </div>

                </div>

            </div>

            <!-- Right 4 Columns: Practice Area Directory Sidebar -->
            <div class="col-4">
                <div class="blg_rgt" data-aos="fade-left">
                    
                    <div class="rlt-pst-hdr mb-4">
                        <h3 class="rlt-pst-hdng" style="font-size: 1.3rem;">All Practice Areas</h3>
                    </div>

                    <ul class="practice-sidebar-list" style="display: flex; flex-direction: column; gap: 10px;">
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/arbitration/')); ?>" class="sub_filter_btn active" style="display: block; text-align: left; border-radius: 8px;">⚖️ Arbitration &amp; ADR</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/commercial-litigation/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">🏛️ Commercial Litigation</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/competition-law/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">📊 Competition Law</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/corporate-insolvency/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">🏢 Corporate &amp; Insolvency (IBC)</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/constitutional-law/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">📜 Constitutional Law</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/criminal-law/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">🛡️ Criminal Law - White Collar / PMLA</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/environmental-law/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">🌿 Environmental Law (NGT)</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/regulatory-litigation/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">⚡ Regulatory (Telecom, Electricity, Mining)</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/mediation/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">🤝 Mediation &amp; Settlement</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/securities-law/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">📈 Securities Law (SEBI / SAT)</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/tax/')); ?>" class="sub_filter_btn" style="display: block; text-align: left; border-radius: 8px;">💰 Tax - Direct &amp; Indirect</a></li>
                    </ul>

                    <!-- Urgent Inquiry Card -->
                    <div style="margin-top: 36px; background: #111a2e; border: 1px solid rgba(197, 160, 89, 0.3); border-radius: var(--card-radius-curve); padding: 28px 22px; color: #ffffff;">
                        <h4 style="font-family: var(--font-serif); font-size: 1.25rem; color: var(--color-gold); margin-bottom: 10px;">Retain Apex Counsel</h4>
                        <p style="font-size: 0.88rem; color: #94a3b8; line-height: 1.6; margin-bottom: 20px;">
                            For time-sensitive special leave petitions, emergency arbitral relief, or caveat filings before the Supreme Court.
                        </p>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" style="display: block; text-align: center; background: var(--color-gold); color: #0e172a; padding: 10px; border-radius: 6px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">
                            Contact Senior Registry
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
