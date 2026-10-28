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
<section class="hme_bnr__area" style="background: #14171f; position: relative; padding: 90px 0 100px 0; overflow: hidden; color: #ffffff;">
    <div class="container-custom">
        <div class="row align-items-center">
            
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="bnr_sml_cntnt" style="font-size: 0.88rem; letter-spacing: 0.22em; text-transform: uppercase; color: #c5a059; margin-bottom: 24px; font-weight: 500;">
                    LEXVANGUARD ADVOCATES &amp; PARTNERS
                </div>
                <h1 class="hdng_bnr" style="font-family: var(--font-serif); font-size: clamp(2.8rem, 5.2vw, 4.4rem); color: #ffffff; line-height: 1.12; margin-bottom: 24px; font-weight: 400;">
                    With You In Every <span style="color: #c5a059; font-style: italic;">Challenge</span>
                </h1>
                <p class="para_bnr" style="font-size: 1.1rem; line-height: 1.75; color: #cbd5e1; max-width: 540px; margin-bottom: 38px;">
                    At LexVanguard, we deliver dedicated, personalized legal counsel and appellate advocacy across the Supreme Court of India, High Courts, and International Arbitration Tribunals.
                </p>
                <div style="display: flex; gap: 16px; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="sub_filter_btn active" style="padding: 14px 32px; font-size: 0.95rem; background: linear-gradient(135deg, #c5a059 0%, #dfba73 50%, #b38b42 100%); color: #0b111e !important; font-weight: 700; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 4px 18px rgba(197, 160, 89, 0.35); border: 1px solid #dfba73;">
                        Schedule Consultation
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="sub_filter_btn" style="padding: 14px 32px; font-size: 0.95rem; background: rgba(255, 255, 255, 0.08); color: #ffffff !important; border: 1.5px solid rgba(197, 160, 89, 0.6); border-radius: 6px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
                        Our Practice Areas &rarr;
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center mt-5 mt-lg-0" data-aos="fade-left" data-aos-duration="1000">
                <div style="position: relative; display: flex; align-items: center; justify-content: center;">
                    <div style="width: 100%; max-width: 460px; height: 480px; border-radius: 220px 220px 24px 24px; overflow: hidden; border: 2px solid rgba(197, 160, 89, 0.4); box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80" alt="Supreme Court Legal Excellence" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="position: absolute; top: 20px; left: 10px; width: 78px; height: 78px; border-radius: 50%; background: rgba(20, 23, 31, 0.92); border: 1.5px solid var(--color-gold); display: flex; align-items: center; justify-content: center; color: var(--color-gold); box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4); backdrop-filter: blur(8px);">
                        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                    </div>
                    <div style="position: absolute; bottom: 30px; right: 20px; width: 78px; height: 78px; border-radius: 50%; background: rgba(20, 23, 31, 0.92); border: 1.5px solid var(--color-gold); display: flex; align-items: center; justify-content: center; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4); backdrop-filter: blur(8px); text-align: center; line-height: 1.1;">
                        <div>
                            <span style="font-size: 1.35rem; font-weight: 800; color: #ffffff;">60+</span>
                            <span style="font-size: 0.6rem; text-transform: uppercase; display: block; color: #c5a059;">Years</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 2: WELCOME TO LEXVANGUARD LEGAL -->
<section style="background: #fbf9f5; padding: 90px 0; position: relative;">
    <div class="container-custom">
        <div class="row align-items-center">
            
            <div class="col-lg-7" data-aos="fade-right">
                <div style="color: #c5a059; font-size: 0.84rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 12px;">
                    Heritage &bull; Excellence &bull; Integrity
                </div>
                <h2 style="font-family: var(--font-serif); font-size: 2.4rem; color: #1e293b; margin-bottom: 20px; line-height: 1.25;">
                    Welcome to LexVanguard Legal
                </h2>
                <p style="font-size: 1.05rem; line-height: 1.8; color: #475569; margin-bottom: 30px;">
                    Established with a storied tradition of courtroom excellence, LexVanguard has grown into a leading full-service law firm serving major corporations, financial institutions, and high-net-worth clients across India. Today, we are proud to be one of the most trusted legal institutions handling high-stakes constitutional and commercial disputes.
                </p>
                <div style="display: flex; gap: 24px; margin-top: 36px;">
                    <div style="background: #ffffff; border: 1px solid #e5ded6; border-radius: 12px 0 28px 0; padding: 20px 28px; box-shadow: 0 6px 18px rgba(0,0,0,0.04); min-width: 140px;">
                        <div style="font-family: var(--font-serif); font-size: 2.2rem; color: #c5a059; font-weight: 700; line-height: 1; margin-bottom: 6px;">1964</div>
                        <div style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.08em; color: #64748b; font-weight: 600;">Established</div>
                    </div>
                    <div style="background: #ffffff; border: 1px solid #e5ded6; border-radius: 12px 0 28px 0; padding: 20px 28px; box-shadow: 0 6px 18px rgba(0,0,0,0.04); min-width: 140px;">
                        <div style="font-family: var(--font-serif); font-size: 2.2rem; color: #c5a059; font-weight: 700; line-height: 1; margin-bottom: 6px;">11</div>
                        <div style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.08em; color: #64748b; font-weight: 600;">Practice Areas</div>
                    </div>
                    <div style="background: #ffffff; border: 1px solid #e5ded6; border-radius: 12px 0 28px 0; padding: 20px 28px; box-shadow: 0 6px 18px rgba(0,0,0,0.04); min-width: 140px;">
                        <div style="font-family: var(--font-serif); font-size: 2.2rem; color: #c5a059; font-weight: 700; line-height: 1; margin-bottom: 6px;">500+</div>
                        <div style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.08em; color: #64748b; font-weight: 600;">Landmark Cases</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 text-center mt-5 mt-lg-0" data-aos="fade-left">
                <div style="background: #ffffff; border: 1px solid #e5ded6; border-radius: 16px 0 45px 0; padding: 36px 30px; box-shadow: 0 15px 35px rgba(51, 39, 32, 0.08);">
                    <div style="width: 72px; height: 72px; border-radius: 50%; background: rgba(197, 160, 89, 0.15); border: 2px solid #c5a059; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: #c5a059; font-size: 1.8rem;">
                        ▶
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.4rem; color: #332720; margin-bottom: 12px;">Our Strategic Counsel</h3>
                    <p style="font-size: 0.92rem; color: #64748b; line-height: 1.6; margin-bottom: 24px;">
                        "Combining forensic factual scrutiny with generational appellate advocacy to deliver exceptional legal outcomes."
                    </p>
                    <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="sub_filter_btn" style="padding: 12px 28px; font-size: 0.88rem; display: inline-flex; align-items: center; justify-content: center; background: #0e172a; color: #c5a059 !important; border: 1.5px solid #c5a059; border-radius: 6px; font-weight: 600; text-decoration: none; box-shadow: 0 4px 14px rgba(14, 23, 42, 0.15);">
                        Read Our Full Story &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 3: OUR EXPERTISE (The 3 Signature Pillars) -->
<section style="background: #231F20; padding: 100px 0; color: #ffffff;">
    <div class="container-custom">
        <div class="row text-center mb-5" data-aos="fade-up">
            <div class="col-12">
                <h2 style="font-family: var(--font-serif); font-size: 2.6rem; color: #ffffff; margin-bottom: 12px;">
                    Our Expertise
                </h2>
                <p style="color: #cbd5e1; font-size: 1.05rem; max-width: 600px; margin: 0 auto;">
                    We offer complete solutions for all your legal needs across forums.
                </p>
            </div>
        </div>

        <div class="row">
            <!-- Pillar 1 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="slide-up" data-aos-duration="900">
                <div style="background: #2e2826; border: 1px solid rgba(197, 160, 89, 0.25); border-radius: 16px 0 45px 0; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                    <div style="height: 230px; overflow: hidden;">
                        <img src="https://aglaw.in/wp-content/uploads/2024/07/our-srv-img2.jpg" alt="Litigation" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=600&q=80';">
                    </div>
                    <div style="padding: 30px 28px; display: flex; flex-direction: column; justify-content: space-between; flex: 1;">
                        <div>
                            <h3 style="font-family: var(--font-serif); font-size: 1.45rem; line-height: 1.3; margin-bottom: 24px; color: #ffffff;">
                                <span style="color: #c5a059;">Litigation</span> Across Courts &amp; Tribunals
                            </h3>
                            <p style="font-size: 0.9rem; color: #a1968e; line-height: 1.6; margin-bottom: 24px;">
                                Proven appellate representation before the Supreme Court of India, High Courts, NCLAT, and specialized regulatory bodies.
                            </p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="serv-btn-link" style="color: #c5a059; font-weight: 700; text-transform: uppercase;">Learn More &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Pillar 2 (Cream accent card) -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="slide-up" data-aos-duration="1100">
                <div style="background: #f7f3ee; border: 1px solid rgba(197, 160, 89, 0.5); border-radius: 16px 0 45px 0; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; height: 100%; color: #332720;">
                    <div style="height: 230px; overflow: hidden;">
                        <img src="https://aglaw.in/wp-content/uploads/2024/07/our-srv-img3-1.jpg" alt="Alternate Dispute Resolution" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=600&q=80';">
                    </div>
                    <div style="padding: 30px 28px; display: flex; flex-direction: column; justify-content: space-between; flex: 1;">
                        <div>
                            <h3 style="font-family: var(--font-serif); font-size: 1.45rem; line-height: 1.3; margin-bottom: 24px; color: #332720;">
                                <span style="color: #8c6a2d;">Alternate</span> Dispute Resolution
                            </h3>
                            <p style="font-size: 0.9rem; color: #5d534c; line-height: 1.6; margin-bottom: 24px;">
                                High-stakes commercial arbitration under SIAC, LCIA, ICC, and Indian Arbitration Act, alongside enforcement proceedings.
                            </p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/our-expertise/arbitration/')); ?>" class="serv-btn-link" style="color: #332720; font-weight: 700; text-transform: uppercase;">Learn More &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Pillar 3 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="slide-up" data-aos-duration="1300">
                <div style="background: #2e2826; border: 1px solid rgba(197, 160, 89, 0.25); border-radius: 16px 0 45px 0; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                    <div style="height: 230px; overflow: hidden;">
                        <img src="https://aglaw.in/wp-content/uploads/2024/07/our-srv-img1.jpg" alt="Corporate Practice" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80';">
                    </div>
                    <div style="padding: 30px 28px; display: flex; flex-direction: column; justify-content: space-between; flex: 1;">
                        <div>
                            <h3 style="font-family: var(--font-serif); font-size: 1.45rem; line-height: 1.3; margin-bottom: 24px; color: #ffffff;">
                                <span style="color: #c5a059;">Corporate</span> &amp; Commercial Practice
                            </h3>
                            <p style="font-size: 0.9rem; color: #a1968e; line-height: 1.6; margin-bottom: 24px;">
                                Advising leading enterprises in mergers, corporate restructuring, insolvency resolution (IBC), and antitrust disputes.
                            </p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="serv-btn-link" style="color: #c5a059; font-weight: 700; text-transform: uppercase;">Learn More &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 4: PRACTICE AREAS INTERACTIVE SHOWCASE -->
<section style="background: #ffffff; padding: 95px 0;">
    <div class="container-custom">
        <div class="row align-items-center">
            
            <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-right">
                <div style="background: #231F20; border-radius: 16px 0 45px 0; padding: 40px 32px; color: #ffffff; box-shadow: 0 16px 40px rgba(0,0,0,0.12);">
                    <span style="color: #c5a059; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; display: block; margin-bottom: 12px;">Practice Portfolio</span>
                    <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: #ffffff; margin-bottom: 18px; line-height: 1.25;">
                        Specialized Legal Verticals
                    </h2>
                    <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.7; margin-bottom: 28px;">
                        Our multidisciplinary team navigates complex disputes across sector-specific tribunals, High Courts, and the Supreme Court with seasoned strategic foresight.
                    </p>
                    <div style="border-top: 1px solid rgba(197, 160, 89, 0.3); padding-top: 24px;">
                        <div style="font-size: 0.85rem; color: #c5a059; font-weight: 600; margin-bottom: 6px;">Managing Partner:</div>
                        <div style="font-family: var(--font-serif); font-size: 1.3rem; color: #ffffff;">Mr. Vikramaditya Shroff</div>
                        <div style="font-size: 0.82rem; color: #94a3b8;">Senior Advocate &bull; Supreme Court of India</div>
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
