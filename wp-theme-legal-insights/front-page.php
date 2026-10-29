<?php
/**
 * Template Name: Homepage Front Page
 *
 * The official Front Page template replicating https://aglaw.in/
 * Featuring hero banner with arch visual, welcome section with counter pills,
 * 3 pillars of expertise, interactive 11 practice areas showcase,
 * awards gallery, leadership profiles, in the news, and latest insights.
 */

get_header(); ?>

<!-- SECTION 1: HERO BANNER (LexVanguard Legal) -->
<section class="hme_bnr__area">
    <div class="container-custom">
        <div class="row align-items-center">
            
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="bnr_sml_cntnt">
                    MALHOTRA &amp; CO. ADVOCATES &amp; PARTNERS
                </div>
                <h1 class="hdng_bnr">
                    With You In Every <span>Challenge</span>
                </h1>
                <p class="para_bnr">
                    At Malhotra &amp; Co., we deliver dedicated, personalized legal counsel and appellate advocacy across the Supreme Court of India, High Courts, and International Arbitration Tribunals.
                </p>
                <div class="hero-btns-wrap">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="sub_filter_btn active">
                        Schedule Consultation
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="sub_filter_btn">
                        Our Practice Areas &rarr;
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center mt-4 mt-lg-0" data-aos="fade-left" data-aos-duration="1000">
                <div class="hm_bnr_visual_frame">
                    <div class="hm_bnr_arch_img">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80" alt="Supreme Court Legal Excellence">
                    </div>
                    <div class="floating-badge-circle fb-top-left">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                    </div>
                    <div class="floating-badge-circle fb-bottom-right">
                        <div>
                            <span class="fb-num">60+</span>
                            <span class="fb-lbl">Years</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 2: WELCOME TO MALHOTRA & CO. -->
<section class="welcome-sec">
    <div class="container-custom">
        <div class="row align-items-center">
            
            <div class="col-lg-7" data-aos="fade-right">
                <div class="welcome-subtag">
                    Heritage &bull; Excellence &bull; Integrity
                </div>
                <h2 class="welcome-title">
                    Welcome to Malhotra &amp; Co.
                </h2>
                <p class="welcome-para">
                    Established with a storied tradition of courtroom excellence, Malhotra &amp; Co. has grown into a leading full-service law firm serving major corporations, financial institutions, and high-net-worth clients across India. Today, we are proud to be one of the most trusted legal institutions handling high-stakes constitutional and commercial disputes.
                </p>
                <div class="welcome-stats-row">
                    <div class="stat-pill-card">
                        <div class="stat-num">1964</div>
                        <div class="stat-lbl">Established</div>
                    </div>
                    <div class="stat-pill-card">
                        <div class="stat-num">11</div>
                        <div class="stat-lbl">Practice Areas</div>
                    </div>
                    <div class="stat-pill-card">
                        <div class="stat-num">500+</div>
                        <div class="stat-lbl">Landmark Cases</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 text-center mt-5 mt-lg-0" data-aos="fade-left">
                <div class="strategic-counsel-card">
                    <div class="sc-play-icon">
                        ▶
                    </div>
                    <h3 class="sc-title">Our Strategic Counsel</h3>
                    <p class="sc-quote">
                        "Combining forensic factual scrutiny with generational appellate advocacy to deliver exceptional legal outcomes."
                    </p>
                    <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="sc-link-btn">
                        Read Our Full Story &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 3: OUR EXPERTISE (The 3 Signature Pillars) -->
<section class="pillars-section">
    <div class="container-custom">
        <div class="row text-center mb-5" data-aos="fade-up">
            <div class="col-12">
                <h2 class="pillars-main-title">
                    Our Expertise
                </h2>
                <p class="pillars-main-sub">
                    We offer complete solutions for all your legal needs across forums.
                </p>
            </div>
        </div>

        <div class="row">
            <!-- Pillar 1 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="slide-up" data-aos-duration="900">
                <div class="pillar-card">
                    <div class="pillar-card-img-wrap">
                        <img src="https://aglaw.in/wp-content/uploads/2024/07/our-srv-img2.jpg" alt="Litigation" onerror="this.src='https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=600&q=80';">
                    </div>
                    <div class="pillar-card-content">
                        <div>
                            <h3 class="pillar-card-title">
                                <span>Litigation</span> Across Courts &amp; Tribunals
                            </h3>
                            <p class="pillar-card-desc">
                                Proven appellate representation before the Supreme Court of India, High Courts, NCLAT, and specialized regulatory bodies.
                            </p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="serv-btn-link">Learn More &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Pillar 2 (Cream accent card) -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="slide-up" data-aos-duration="1100">
                <div class="pillar-card pillar-card-accent">
                    <div class="pillar-card-img-wrap">
                        <img src="https://aglaw.in/wp-content/uploads/2024/07/our-srv-img3-1.jpg" alt="Alternate Dispute Resolution" onerror="this.src='https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=600&q=80';">
                    </div>
                    <div class="pillar-card-content">
                        <div>
                            <h3 class="pillar-card-title">
                                <span>Alternate</span> Dispute Resolution
                            </h3>
                            <p class="pillar-card-desc">
                                High-stakes commercial arbitration under SIAC, LCIA, ICC, and Indian Arbitration Act, alongside enforcement proceedings.
                            </p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/our-expertise/arbitration/')); ?>" class="serv-btn-link">Learn More &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Pillar 3 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="slide-up" data-aos-duration="1300">
                <div class="pillar-card">
                    <div class="pillar-card-img-wrap">
                        <img src="https://aglaw.in/wp-content/uploads/2024/07/our-srv-img1.jpg" alt="Corporate Practice" onerror="this.src='https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80';">
                    </div>
                    <div class="pillar-card-content">
                        <div>
                            <h3 class="pillar-card-title">
                                <span>Corporate</span> &amp; Commercial Practice
                            </h3>
                            <p class="pillar-card-desc">
                                Advising leading enterprises in mergers, corporate restructuring, insolvency resolution (IBC), and antitrust disputes.
                            </p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="serv-btn-link">Learn More &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 4: PRACTICE AREAS INTERACTIVE SHOWCASE -->
<section class="practice-showcase-sec">
    <div class="container-custom">
        <div class="row align-items-center">
            
            <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right">
                <div class="practice-portfolio-card">
                    <span class="portfolio-tag">Practice Portfolio</span>
                    <h2 class="portfolio-title">
                        Specialized Legal Verticals
                    </h2>
                    <p class="portfolio-desc">
                        Our multidisciplinary team navigates complex disputes across sector-specific tribunals, High Courts, and the Supreme Court with seasoned strategic foresight.
                    </p>
                    <div class="portfolio-lead-box">
                        <div class="portfolio-lead-role">Managing Partner:</div>
                        <div class="portfolio-lead-name">Mr. Vikramaditya Shroff</div>
                        <div class="portfolio-lead-bar">Senior Advocate &bull; Supreme Court of India</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left">
                <div style="display: flex; flex-direction: column; gap: 9px;">
                    <a href="<?php echo esc_url(home_url('/our-expertise/arbitration/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                            </span>
                            <span class="pract-row-title">Arbitration (Domestic &amp; International)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/commercial-litigation/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><path d="M3 21h18"/><path d="M4 18h16"/><path d="M6 18v-7"/><path d="M10 18v-7"/><path d="M14 18v-7"/><path d="M18 18v-7"/><polygon points="12 2 20 7 4 7 12 2"/></svg>
                            </span>
                            <span class="pract-row-title">Commercial Litigation &amp; Civil Law</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/competition-law/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M7 17v-4"/><path d="M12 17v-8"/><path d="M17 17v-6"/></svg>
                            </span>
                            <span class="pract-row-title">Competition &amp; Antitrust Law (CCI)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/corporate-insolvency/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>
                            </span>
                            <span class="pract-row-title">Corporate and Insolvency Laws (IBC)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/constitutional-law/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                            </span>
                            <span class="pract-row-title">Constitutional Law &amp; Writ Petitions</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/criminal-law/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                            </span>
                            <span class="pract-row-title">Criminal Law - White Collar, PMLA</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/environmental-law/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                            </span>
                            <span class="pract-row-title">Environmental Laws (NGT)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/regulatory-litigation/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                            </span>
                            <span class="pract-row-title">Regulatory Litigation - Telecom, Electricity, Mining</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/mediation/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </span>
                            <span class="pract-row-title">Mediation &amp; Settlement Proceedings</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/securities-law/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><path d="m3 3 7 7 4-4 7 7"/><path d="M14 7h7v7"/><path d="M3 21h18"/></svg>
                            </span>
                            <span class="pract-row-title">Securities Law (SEBI &amp; SAT)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/tax/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/><circle cx="12" cy="14" r="2"/></svg>
                            </span>
                            <span class="pract-row-title">Tax – Direct Tax, Indirect Tax</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px;min-width:17px;min-height:17px;max-width:17px;max-height:17px;display:block;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 5: LATEST INSIGHTS (Refined Proportions) -->
<section style="background: var(--bg-light); padding: 95px 0;">
    <div class="container-custom">
        <div class="row align-items-center mb-5" data-aos="fade-up">
            <div class="col-md-8">
                <span style="color: #c5a059; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; display: block; margin-bottom: 8px;">Legal Publications</span>
                <h2 class="headingFontBlk" style="margin-bottom: 0;">
                    Latest Insights &amp; Digests
                </h2>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="<?php echo esc_url(home_url('/insights/')); ?>" class="sub_filter_btn active" style="padding: 10px 24px; font-size: 0.88rem; background: linear-gradient(135deg, #c5a059 0%, #dfba73 50%, #b38b42 100%); color: #0b111e !important; font-weight: 700; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(197, 160, 89, 0.35); border: 1px solid #dfba73;">
                    All Publications &rarr;
                </a>
            </div>
        </div>

        <ul class="evnt_lstng_inr">
            <?php
            $home_insights = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($home_insights->have_posts()) :
                while ($home_insights->have_posts()) : $home_insights->the_post();
                    $categories = get_the_category();
                    $cat_name = !empty($categories) ? esc_html($categories[0]->name) : 'Supreme Court';
            ?>
                <li data-aos="fade-up">
                    <div class="evnt_img__bx">
                        <span class="category-badge"><?php echo $cat_name; ?></span>
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=600&q=80" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </a>
                        <div class="bggrdnt"></div>
                    </div>
                    <div class="evnt_txtbx">
                        <div class="evnt_txt__top">
                            <div style="font-size: 0.78rem; color: #94a3b8; margin-bottom: 8px;">
                                <?php echo get_the_date('M Y'); ?> &bull; <?php echo legal_insights_reading_time(); ?>
                            </div>
                            <h3 class="mn_hgt_blg">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p><?php echo function_exists('legal_insights_custom_excerpt') ? legal_insights_custom_excerpt(16) : wp_trim_words(get_the_excerpt(), 16, '...'); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="practice-link-arrw">Read Insight &rarr;</a>
                    </div>
                </li>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul>
    </div>
</section>

<?php get_footer(); ?>
