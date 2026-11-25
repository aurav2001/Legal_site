<?php
/**
 * Template Name: Homepage Front Page
 *
 * The official Front Page template replicating https://aglaw.in/
 * Featuring hero banner with arch visual, welcome section with counter pills,
 * 3 pillars of expertise, interactive 11 practice areas showcase,
 * awards gallery, leadership profiles, in the news, and latest insights.
 *
 * Fully editable via WordPress Admin (Appearance > Theme Options).
 */

get_header();

// If page is edited with or built with Elementor, let Elementor take full control
if (function_exists('legal_insights_is_elementor_page') && legal_insights_is_elementor_page()) {
    echo '<main id="primary" class="site-main elementor-homepage-content">';
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    echo '</main>';
    get_footer();
    return;
}

// Hero Settings
$hero_tagline   = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_tagline', 'MALHOTRA & CO. • ADVOCATES & SOLICITORS') : 'MALHOTRA & CO. • ADVOCATES & SOLICITORS';
$hero_title     = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_title', 'Trusted Counsel Across') : 'Trusted Counsel Across';
$hero_highlight = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_title_highlight', 'Three Generations') : 'Three Generations';
$hero_desc      = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_description', 'Malhotra & Co. is a boutique law firm with more than 50 years of practice and three generations in the profession. We act in litigation and advisory matters where careful strategy and focused, partner-led attention make the difference.') : 'Malhotra & Co. is a boutique law firm with more than 50 years of practice and three generations in the profession. We act in litigation and advisory matters where careful strategy and focused, partner-led attention make the difference.';
$hero_btn1_txt  = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_btn1_text', 'Schedule Consultation') : 'Schedule Consultation';
$hero_btn1_url  = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_btn1_url', '/contact-us/') : '/contact-us/';
$hero_btn2_txt  = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_btn2_text', 'Our Practice Areas →') : 'Our Practice Areas →';
$hero_btn2_url  = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_btn2_url', '/our-expertise/') : '/our-expertise/';
$hero_image     = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_image', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80') : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80';
$badge_num      = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_badge_num', '50+') : '50+';
$badge_lbl      = function_exists('legal_insights_get_option') ? legal_insights_get_option('hero_badge_lbl', 'Years') : 'Years';

if (!empty($hero_btn1_url) && strpos($hero_btn1_url, 'http') === false && strpos($hero_btn1_url, '/') === 0) {
    $hero_btn1_url = home_url($hero_btn1_url);
}
if (!empty($hero_btn2_url) && strpos($hero_btn2_url, 'http') === false && strpos($hero_btn2_url, '/') === 0) {
    $hero_btn2_url = home_url($hero_btn2_url);
}

// Welcome & Stats
$welcome_subtag = function_exists('legal_insights_get_option') ? legal_insights_get_option('welcome_subtag', 'Integrity • Strategy • Timeliness • Confidentiality') : 'Integrity • Strategy • Timeliness • Confidentiality';
$welcome_title  = function_exists('legal_insights_get_option') ? legal_insights_get_option('welcome_title', 'Welcome to Malhotra & Co.') : 'Welcome to Malhotra & Co.';
$welcome_desc   = function_exists('legal_insights_get_option') ? legal_insights_get_option('welcome_description', 'Trusted counsel in the heart of Delhi, across three generations. We take your case off your shoulders — our aim is to handle your matter with care, keep you informed and stress-free, and bring it to a close on time, so you can return to your business.') : 'Trusted counsel in the heart of Delhi, across three generations. We take your case off your shoulders — our aim is to handle your matter with care, keep you informed and stress-free, and bring it to a close on time, so you can return to your business.';

$stat1_num      = function_exists('legal_insights_get_option') ? legal_insights_get_option('stat1_num', '1967') : '1967';
$stat1_lbl      = function_exists('legal_insights_get_option') ? legal_insights_get_option('stat1_lbl', 'Serving Since') : 'Serving Since';
$stat2_num      = function_exists('legal_insights_get_option') ? legal_insights_get_option('stat2_num', '50+') : '50+';
$stat2_lbl      = function_exists('legal_insights_get_option') ? legal_insights_get_option('stat2_lbl', 'Years of Heritage') : 'Years of Heritage';
$stat3_num      = function_exists('legal_insights_get_option') ? legal_insights_get_option('stat3_num', '3') : '3';
$stat3_lbl      = function_exists('legal_insights_get_option') ? legal_insights_get_option('stat3_lbl', 'Generations') : 'Generations';

$strategic_title = function_exists('legal_insights_get_option') ? legal_insights_get_option('strategic_title', 'Our Endeavour') : 'Our Endeavour';
$strategic_quote = function_exists('legal_insights_get_option') ? legal_insights_get_option('strategic_quote', '"We take your case off your shoulders. Our aim is to handle your matter with care, keep you informed and stress-free, and bring it to a close on time, so you can return to your business."') : '"We take your case off your shoulders. Our aim is to handle your matter with care, keep you informed and stress-free, and bring it to a close on time, so you can return to your business."';
$strategic_txt   = function_exists('legal_insights_get_option') ? legal_insights_get_option('strategic_link_text', 'Read Our Full Story →') : 'Read Our Full Story →';
$strategic_url   = function_exists('legal_insights_get_option') ? legal_insights_get_option('strategic_link_url', '/about-us/') : '/about-us/';
if (!empty($strategic_url) && strpos($strategic_url, 'http') === false && strpos($strategic_url, '/') === 0) {
    $strategic_url = home_url($strategic_url);
}
?>

<!-- SECTION 1: HERO BANNER -->
<section class="hme_bnr__area">
    <div class="container-custom">
        <div class="row align-items-center">
            
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="bnr_sml_cntnt">
                    <?php echo esc_html($hero_tagline); ?>
                </div>
                <h1 class="hdng_bnr">
                    <?php echo esc_html($hero_title); ?> <?php if (!empty($hero_highlight)) : ?><span><?php echo esc_html($hero_highlight); ?></span><?php endif; ?>
                </h1>
                <p class="para_bnr">
                    <?php echo esc_html($hero_desc); ?>
                </p>
                <div class="hero-btns-wrap">
                    <?php if (!empty($hero_btn1_txt)) : ?>
                    <a href="<?php echo esc_url($hero_btn1_url); ?>" class="sub_filter_btn active">
                        <?php echo esc_html($hero_btn1_txt); ?>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($hero_btn2_txt)) : ?>
                    <a href="<?php echo esc_url($hero_btn2_url); ?>" class="sub_filter_btn">
                        <?php echo esc_html($hero_btn2_txt); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-6 text-center mt-4 mt-lg-0" data-aos="fade-left" data-aos-duration="1000">
                <div class="hm_bnr_visual_frame">
                    <div class="hm_bnr_arch_img">
                        <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($hero_title); ?>">
                    </div>
                    <div class="floating-badge-circle fb-top-left">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                    </div>
                    <div class="floating-badge-circle fb-bottom-right">
                        <div>
                            <span class="fb-num"><?php echo esc_html($badge_num); ?></span>
                            <span class="fb-lbl"><?php echo esc_html($badge_lbl); ?></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 2: WELCOME TO LAW FIRM -->
<section class="welcome-sec">
    <div class="container-custom">
        <div class="row align-items-center">
            
            <div class="col-lg-7" data-aos="fade-right">
                <div class="welcome-subtag">
                    <?php echo esc_html($welcome_subtag); ?>
                </div>
                <h2 class="welcome-title">
                    <?php echo esc_html($welcome_title); ?>
                </h2>
                <p class="welcome-para">
                    <?php echo esc_html($welcome_desc); ?>
                </p>
                <div class="welcome-stats-row">
                    <div class="stat-pill-card">
                        <div class="stat-num"><?php echo esc_html($stat1_num); ?></div>
                        <div class="stat-lbl"><?php echo esc_html($stat1_lbl); ?></div>
                    </div>
                    <div class="stat-pill-card">
                        <div class="stat-num"><?php echo esc_html($stat2_num); ?></div>
                        <div class="stat-lbl"><?php echo esc_html($stat2_lbl); ?></div>
                    </div>
                    <div class="stat-pill-card">
                        <div class="stat-num"><?php echo esc_html($stat3_num); ?></div>
                        <div class="stat-lbl"><?php echo esc_html($stat3_lbl); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 text-center mt-5 mt-lg-0" data-aos="fade-left">
                <div class="strategic-counsel-card">
                    <div class="sc-play-icon">
                        ▶
                    </div>
                    <h3 class="sc-title"><?php echo esc_html($strategic_title); ?></h3>
                    <p class="sc-quote">
                        <?php echo esc_html($strategic_quote); ?>
                    </p>
                    <a href="<?php echo esc_url($strategic_url); ?>" class="sc-link-btn">
                        <?php echo esc_html($strategic_txt); ?>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
// Display Page Content if user typed content in WordPress editor for Home page
if (function_exists('legal_insights_render_page_content')) {
    legal_insights_render_page_content();
}
?>

<!-- SECTION 3: OUR EXPERTISE (The 3 Signature Pillars) -->
<section class="pillars-section">
    <div class="container-custom">
        <div class="row text-center mb-5" data-aos="fade-up">
            <div class="col-12">
                <h2 class="pillars-main-title">
                    Our Core Practice Disciplines
                </h2>
                <p class="pillars-main-sub">
                    Partner-led litigation, institutional arbitration, and regulatory advisory across courts and tribunals.
                </p>
            </div>
        </div>

        <div class="row">
            <!-- Pillar 1 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="slide-up" data-aos-duration="900">
                <div class="pillar-card">
                    <div class="pillar-card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=600&q=80" alt="Litigation">
                    </div>
                    <div class="pillar-card-content">
                        <div>
                            <h3 class="pillar-card-title">
                                <span>Commercial</span> &amp; Appellate Litigation
                            </h3>
                            <p class="pillar-card-desc">
                                Strategic dispute resolution and appellate advocacy before the Supreme Court of India, High Court of Delhi, and appellate benches.
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
                        <img src="https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=600&q=80" alt="Arbitration">
                    </div>
                    <div class="pillar-card-content">
                        <div>
                            <h3 class="pillar-card-title">
                                <span>Domestic &amp; Institutional</span> Arbitration
                            </h3>
                            <p class="pillar-card-desc">
                                High-stakes commercial arbitration under SIAC, ICC, and Indian Arbitration Act, alongside appointment, interim relief, and enforcement.
                            </p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="serv-btn-link">Learn More &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Pillar 3 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="slide-up" data-aos-duration="1300">
                <div class="pillar-card">
                    <div class="pillar-card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80" alt="Tribunals and Startup Advisory">
                    </div>
                    <div class="pillar-card-content">
                        <div>
                            <h3 class="pillar-card-title">
                                <span>Tribunals</span> &amp; Startup Advisory
                            </h3>
                            <p class="pillar-card-desc">
                                Dedicated representation before NCLAT and DRAT, combined with hands-on regulatory, policy, and contract advisory for emerging businesses.
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
                        Our team navigates complex disputes across sector-specific tribunals (NCLAT &amp; DRAT), High Courts, and the Supreme Court of India with generational foresight.
                    </p>
                    
                    <?php
                    // Retrieve lead partner from Team Member CPT
                    $lead_partner = get_posts(array(
                        'post_type'      => 'team_member',
                        'posts_per_page' => 1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC'
                    ));
                    $lead_name = !empty($lead_partner) ? $lead_partner[0]->post_title : 'Chaitanya Malhotra';
                    $lead_role = !empty($lead_partner) ? get_post_meta($lead_partner[0]->ID, '_team_designation', true) : 'Managing Partner • Advocate, Supreme Court & Delhi High Court';
                    ?>
                    <div class="portfolio-lead-box">
                        <div class="portfolio-lead-role">Senior Leadership:</div>
                        <div class="portfolio-lead-name"><?php echo esc_html($lead_name); ?></div>
                        <div class="portfolio-lead-bar"><?php echo esc_html($lead_role); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left">
                <div style="display: flex; flex-direction: column; gap: 9px;">
                    <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M4 18h16"/><path d="M6 18v-7"/><path d="M10 18v-7"/><path d="M14 18v-7"/><path d="M18 18v-7"/><polygon points="12 2 20 7 4 7 12 2"/></svg>
                            </span>
                            <span class="pract-row-title">Commercial Litigation (Contractual, Shareholder &amp; Business Disputes)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                            </span>
                            <span class="pract-row-title">Domestic &amp; Institutional Arbitration (SIAC, ICC, Indian Arbitration Act)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                            </span>
                            <span class="pract-row-title">Civil Litigation (Property, Tenancy, Succession &amp; Recovery)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                            </span>
                            <span class="pract-row-title">Criminal Litigation (Economic Offences &amp; White-Collar Defense)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                            </span>
                            <span class="pract-row-title">Startup Advisory (Policy &amp; Regulatory Compliance for Emerging Businesses)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                            </span>
                            <span class="pract-row-title">Appellate &amp; Supreme Court Litigation (SLPs, Review &amp; Curative Petitions)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>" class="pract-row-item">
                        <div class="pract-row-content">
                            <span class="pract-row-icon" style="width:36px;height:36px;min-width:36px;min-height:36px;max-width:36px;max-height:36px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M7 17v-4"/><path d="M12 17v-8"/><path d="M17 17v-6"/></svg>
                            </span>
                            <span class="pract-row-title">Tribunal Practice (NCLAT &amp; DRAT)</span>
                        </div>
                        <span class="pract-row-arrw" style="display:inline-flex;align-items:center;flex-shrink:0;">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 5: LATEST INSIGHTS -->
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
