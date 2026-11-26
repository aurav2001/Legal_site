<?php
/**
 * Template Name: Practice Area Detail
 *
 * Detailed single practice area layout (e.g., Arbitration, Commercial Litigation).
 * Displays practice overview, landmark cases timeline/cards, and sidebar links.
 * Fully editable via WordPress Admin (Page Editor + Page Meta Box).
 *
 * @package Legal_Insights
 */

get_header();

// If page is edited with Elementor, render full-width content directly
if (function_exists('legal_insights_is_elementor_page') && legal_insights_is_elementor_page()) {
    echo '<main id="primary" class="site-main elementor-practice-content" style="width: 100%;">';
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    echo '</main>';
    get_footer();
    return;
}

$firm_name  = function_exists('legal_insights_get_firm_name') ? legal_insights_get_firm_name(false) : 'Malhotra & Co.';
$page_id    = get_the_ID();

// Determine Practice Slug from URL or Query Var
$request_uri = $_SERVER['REQUEST_URI'] ?? '';
$path = trim(parse_url($request_uri, PHP_URL_PATH), '/');
$slug = '';
if (preg_match('#(?:our-expertise|expertise|practice)/([^/]+)#', $path, $matches)) {
    $slug = sanitize_title($matches[1]);
}
if (empty($slug) && isset($_GET['practice'])) {
    $slug = sanitize_title($_GET['practice']);
}
if (empty($slug)) {
    $slug = 'arbitration';
}

// 7 Core Practice Areas Knowledge Repository (Malhotra & Co.)
$practices_catalog = array(
    'commercial-litigation' => array(
        'title'    => 'Commercial Litigation',
        'badge'    => 'Commercial Courts & High Court',
        'subtitle' => 'Representation in high-value contractual disputes, shareholder conflicts, partnership dissolutions, and commercial recovery suits.',
        'overview' => array(
            'At Malhotra & Co., our Commercial Litigation practice represents businesses, enterprises, and individual commercial litigants before the Commercial Divisions of the High Court of Delhi and District Commercial Courts.',
            'With three generations of courtroom advocacy, we combine rigorous factual preparation with aggressive interim protection strategy to secure urgent injunctions, asset protection orders, and decisive decrees.',
        ),
        'cases'    => array(
            array('forum' => 'Delhi High Court Commercial Division', 'title' => 'Contractual Breach & Interim Injunction', 'desc' => 'Secured immediate ad-interim injunction restraining illegal termination of long-term commercial supply and franchise agreements.'),
            array('forum' => 'District Commercial Court', 'title' => 'Commercial Debt & Injunction Decrees', 'desc' => 'Successfully argued and secured attachment-before-judgment orders securing full financial recovery for client.'),
        ),
    ),
    'arbitration' => array(
        'title'    => 'Domestic & Institutional Arbitration',
        'badge'    => 'Arbitral Seats & Indian Arbitration Act',
        'subtitle' => 'Commercial arbitration under the Indian Arbitration & Conciliation Act 1996, alongside institutional arbitrations under SIAC and ICC rules.',
        'overview' => array(
            'Our arbitration practice acts in domestic and institutional arbitrations across commercial, infrastructure, real estate, and partnership disputes.',
            'We regularly represent clients in Section 9 applications for interim measures, Section 11 petitions for appointment of independent arbitrators, and Section 34/37 proceedings for challenging or enforcing arbitral awards before the High Court of Delhi and appellate courts.',
        ),
        'cases'    => array(
            array('forum' => 'Delhi High Court (Section 9)', 'title' => 'Protection of Arbitral Subject Matter', 'desc' => 'Obtained urgent pre-arbitral interim injunction under Section 9 preserving disputed commercial funds pending arbitral tribunal constitution.'),
            array('forum' => 'Arbitral Tribunal Proceedings', 'title' => 'High-Quantum Commercial Arbitration', 'desc' => 'Represented leading commercial enterprise in breach of contract claims under institutional arbitration rules.'),
        ),
    ),
    'civil-litigation' => array(
        'title'    => 'Civil Litigation',
        'badge'    => 'Property, Tenancy & Succession',
        'subtitle' => 'Strategic civil trial and appellate representation in property disputes, tenancy conflicts, inheritance partitions, and recovery suits.',
        'overview' => array(
            'Malhotra & Co. holds deep heritage across three generations in civil courtroom practice across Delhi trial courts and the High Court of Delhi.',
            'We guide families, property owners, landlords, tenants, and business houses through complex title disputes, specific performance suits, partition claims, and possession decrees with meticulous care.',
        ),
        'cases'    => array(
            array('forum' => 'Delhi High Court Appellate Bench', 'title' => 'Ancestral Property Partition & Injunction', 'desc' => 'Secured favorable partition decree and status quo protections over high-value ancestral real estate properties.'),
            array('forum' => 'Civil District Court', 'title' => 'Landlord-Tenant Possession Decree', 'desc' => 'Successfully obtained eviction and mesne profits decree under the tenancy laws and general civil framework.'),
        ),
    ),
    'criminal-litigation' => array(
        'title'    => 'Criminal Litigation & Defense',
        'badge'    => 'Economic Offences & Trial Defense',
        'subtitle' => 'White-collar criminal defense, economic offences, corporate investigations, quashing petitions, and regular & anticipatory bail.',
        'overview' => array(
            'Our criminal litigation practice provides strategic, partner-led defense in economic offences, statutory investigations, corporate compliance probes, and trial proceedings.',
            'We act before Special Courts, Sessions Courts, Delhi High Court, and the Supreme Court of India in securing regular and anticipatory bail, quashing of FIRs under Section 482 CrPC / BNSS, and appellate stays.',
        ),
        'cases'    => array(
            array('forum' => 'High Court of Delhi', 'title' => 'Quashing of Frivolous Commercial FIR', 'desc' => 'Invoked inherent high court jurisdiction under Section 482 CrPC to quash malicious criminal proceedings arising from civil disputes.'),
            array('forum' => 'Sessions & Appellate Courts', 'title' => 'Anticipatory Bail in Economic Offence', 'desc' => 'Secured pre-arrest bail protections demonstrating full statutory compliance and absence of flight risk or tampering.'),
        ),
    ),
    'startup-advisory' => array(
        'title'    => 'Startup Advisory & Corporate Compliance',
        'badge'    => 'Emerging Businesses & Regulatory Counsel',
        'subtitle' => 'Hands-on policy, regulatory compliance, commercial contracts, and venture advisory for emerging businesses, founders, and startups.',
        'overview' => array(
            'We advise high-growth startups, emerging businesses, and founders on navigating India\'s dynamic regulatory landscape with confidence and clarity.',
            'Our counsel encompasses corporate structuring, founder agreements, terms of service, vendor contracts, data compliance under DPDPA 2023, and pre-litigation dispute avoidance.',
        ),
        'cases'    => array(
            array('forum' => 'Corporate & Advisory Practice', 'title' => 'Founders Structuring & Shareholder Agreements', 'desc' => 'Drafted and negotiated comprehensive founder covenants, vesting schedules, and key commercial contracts for emerging businesses.'),
            array('forum' => 'Regulatory & Policy Advisory', 'title' => 'DPDPA 2023 Compliance Architecture', 'desc' => 'Advised emerging digital platform on data fiduciary compliance, user consent workflows, and grievance redressal policies.'),
        ),
    ),
    'appellate-supreme-court' => array(
        'title'    => 'Appellate & Supreme Court Litigation',
        'badge'    => 'Apex Court of India',
        'subtitle' => 'Special Leave Petitions (SLPs), Civil & Criminal Appeals, Review Petitions, and Curative Petitions before the Supreme Court of India.',
        'overview' => array(
            'Our advocates command distinguished appellate credentials before the Hon\'ble Supreme Court of India and appellate benches of the Delhi High Court.',
            'We handle the drafting and oral advocacy of Special Leave Petitions under Article 136 of the Constitution, statutory appeals, stay applications, and review petitions across civil, commercial, and criminal benches.',
        ),
        'cases'    => array(
            array('forum' => 'Supreme Court of India', 'title' => 'Special Leave Petition (Civil) Stay Order', 'desc' => 'Secured immediate stay of adverse High Court order in a complex commercial recovery and arbitration dispute.'),
            array('forum' => 'Supreme Court of India', 'title' => 'Criminal SLP & Liberty Protections', 'desc' => 'Successfully argued and secured bail relief safeguarding personal liberty against arbitrary arrest procedures.'),
        ),
    ),
    'tribunal-practice' => array(
        'title'    => 'Tribunal Practice (NCLAT & DRAT)',
        'badge'    => 'Company Law & Debt Recovery',
        'subtitle' => 'Specialized representation before the National Company Law Appellate Tribunal (NCLAT), Debt Recovery Appellate Tribunal (DRAT), and DRT.',
        'overview' => array(
            'Malhotra & Co. provides focused, partner-led representation in specialized tribunal proceedings across company law, insolvency, oppression/mismanagement, and debt recovery.',
            'We act before NCLT/NCLAT in shareholder and corporate insolvency matters, and before DRT/DRAT in SARFAESI proceedings, debt recovery challenges, and financial restructuring.',
        ),
        'cases'    => array(
            array('forum' => 'NCLAT Principal Bench (New Delhi)', 'title' => 'Shareholder Oppression & Interim Stay', 'desc' => 'Successfully obtained interim appellate stay against coercive board actions in a closely-held corporate entity.'),
            array('forum' => 'DRAT / DRT (Delhi)', 'title' => 'SARFAESI Action Challenge & Account Restructure', 'desc' => 'Protected commercial assets against premature possession notices, facilitating lawful debt restructuring.'),
        ),
    ),
);

// Fallback to Arbitration if slug not found
$practice = isset($practices_catalog[$slug]) ? $practices_catalog[$slug] : $practices_catalog['arbitration'];

// Post overrides if set in WordPress Admin Page Editor
$db_title      = get_the_title($page_id);
$display_title = (!empty($db_title) && $db_title !== 'Practice Area Detail' && $db_title !== 'Practice Areas') ? $db_title : $practice['title'];

$meta_badge    = get_post_meta($page_id, '_practice_badge', true);
$display_badge = !empty($meta_badge) ? $meta_badge : $practice['badge'];

$meta_subhead  = get_post_meta($page_id, '_practice_subheading', true);
$display_subhead = !empty($meta_subhead) ? $meta_subhead : 'Overview & Strategic Approach';

$display_sub   = $practice['subtitle'];
$page_content  = get_post_field('post_content', $page_id);
$landmark_meta = get_post_meta($page_id, '_practice_landmark_cases', true);
?>

<!-- Sub-Page Hero Banner (Matching Luxury AGL Design with High Contrast) -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag">
                    <span><?php echo esc_html($display_badge); ?></span> &bull; <span><?php echo esc_html($firm_name); ?></span>
                </div>
                <h1 class="bnr_heading"><?php echo esc_html($display_title); ?></h1>
                <p class="bnr_subtitle">
                    <?php echo esc_html($display_sub); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Content & Landmark Cases Section -->
<section class="paddingTop paddingBottom" style="background: var(--bg-light); padding: 75px 0 95px 0;">
    <div class="container-custom">
        <div class="row">
            
            <!-- Left 8 Columns: Detail & Landmark Cases -->
            <div class="col-lg-8 col-12">
                
                <div class="mb-5" data-aos="fade-up">
                    <div class="sub-badge" style="display:inline-block; margin-bottom: 12px; background: rgba(197, 160, 89, 0.12); color: var(--color-gold); font-size: 0.8rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 6px 16px; border-radius: 20px;">
                        <?php echo esc_html($display_badge); ?>
                    </div>
                    <h2 class="headingFontBlk" style="margin-bottom: 18px; font-family: var(--font-serif); font-size: 2.2rem; color: #0f172a;">
                        <?php echo esc_html($display_subhead); ?>
                    </h2>
                    
                    <?php if (!empty(trim($page_content))) : ?>
                        <div class="entry-content" style="font-size: 1.05rem; line-height: 1.85; color: #334155; margin-bottom: 24px;">
                            <?php 
                            while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                            rewind_posts();
                            ?>
                        </div>
                    <?php else : ?>
                        <?php foreach ($practice['overview'] as $p_para) : ?>
                            <p style="font-size: 1.05rem; line-height: 1.85; color: #334155; margin-bottom: 20px;">
                                <?php echo esc_html($p_para); ?>
                            </p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="landmark-cases-wrapper" style="margin-top: 48px;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.85rem; color: #0b111e; margin-bottom: 24px;" data-aos="fade-up">
                        Landmark Precedents &amp; Representative Matters
                    </h3>

                    <?php if (!empty($landmark_meta)) : ?>
                        <div class="case-milestone-card" data-aos="fade-up" style="background:#ffffff; padding:28px 24px; border-radius:12px; border:1px solid #e2e8f0; margin-bottom:20px; box-shadow:0 4px 15px rgba(0,0,0,0.03);">
                            <span class="case-forum-badge" style="background:rgba(197,160,89,0.15); color:#997328; font-weight:700; font-size:0.75rem; text-transform:uppercase; padding:4px 12px; border-radius:4px; display:inline-block; margin-bottom:10px;">Chambers Benchmark Precedents</span>
                            <div class="case-summary" style="white-space: pre-line; font-size:0.95rem; line-height:1.75; color:#334155;">
                                <?php echo esc_html($landmark_meta); ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php foreach ($practice['cases'] as $c_idx => $c_item) : ?>
                            <div class="case-milestone-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($c_idx + 1) * 50); ?>" style="background:#ffffff; padding:28px 24px; border-radius:12px; border:1px solid #e2e8f0; margin-bottom:20px; box-shadow:0 4px 15px rgba(0,0,0,0.03);">
                                <span class="case-forum-badge" style="background:rgba(197,160,89,0.15); color:#997328; font-weight:700; font-size:0.75rem; text-transform:uppercase; padding:4px 12px; border-radius:4px; display:inline-block; margin-bottom:10px;">
                                    <?php echo esc_html($c_item['forum']); ?>
                                </span>
                                <h4 class="case-title" style="font-family: var(--font-serif); font-size: 1.3rem; color: #0b111e; margin: 4px 0 10px 0;">
                                    <?php echo esc_html($c_item['title']); ?>
                                </h4>
                                <p class="case-summary" style="font-size: 0.95rem; line-height: 1.75; color: #475569; margin: 0;">
                                    <?php echo esc_html($c_item['desc']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

            </div>

            <!-- Right 4 Columns: Practice Area Directory Sidebar -->
            <div class="col-lg-4 col-12 mt-5 mt-lg-0">
                <div class="blg_rgt" data-aos="fade-left">
                    
                    <div class="rlt-pst-hdr mb-4">
                        <h3 class="rlt-pst-hdng" style="font-size: 1.35rem; font-family: var(--font-serif); color: #0b111e;">All Practice Areas</h3>
                        <p style="font-size: 0.85rem; color: #64748b; margin-top: 4px;">Explore our 7 core legal practice disciplines</p>
                    </div>

                    <ul class="practice-sidebar-list" style="display: flex; flex-direction: column; gap: 8px; list-style: none; padding: 0; margin: 0;">
                        <?php foreach ($practices_catalog as $p_key => $p_val) : 
                            $is_active = ($p_key === $slug);
                            $link_url  = home_url('/our-expertise/' . $p_key . '/');
                        ?>
                            <li>
                                <a href="<?php echo esc_url($link_url); ?>" class="practice-sidebar-link <?php echo $is_active ? 'active' : ''; ?>" style="display: flex; align-items: center; gap: 12px; padding: 12px 16px; border-radius: 8px; text-decoration: none; font-size: 0.92rem; font-weight: 600; transition: all 0.2s ease; <?php echo $is_active ? 'background: #0b111e; color: #c5a059; border-left: 4px solid #c5a059;' : 'background: #ffffff; color: #334155; border: 1px solid #e2e8f0;'; ?>">
                                    <span style="font-size: 0.9rem;"><?php echo $is_active ? '⚖️' : '✦'; ?></span>
                                    <span><?php echo esc_html($p_val['title']); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Urgent Inquiry Card -->
                    <div style="margin-top: 36px; background: #0b111e; border: 1.5px solid rgba(197, 160, 89, 0.4); border-radius: var(--card-radius-curve); padding: 32px 24px; color: #ffffff; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                        <span style="font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--color-gold); font-weight: 700; display: block; margin-bottom: 8px;">Apex Registry</span>
                        <h4 style="font-family: var(--font-serif); font-size: 1.35rem; color: #ffffff; margin-bottom: 12px;">Retain Apex Counsel</h4>
                        <p style="font-size: 0.88rem; color: #cbd5e1; line-height: 1.65; margin-bottom: 22px;">
                            For time-sensitive special leave petitions (SLPs), emergency arbitral stays, or caveat filings before the Supreme Court.
                        </p>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" style="display: block; text-align: center; background: linear-gradient(135deg, #c5a059 0%, #dfba73 50%, #b38b42 100%); color: #0b111e; padding: 12px 20px; border-radius: 6px; font-weight: 700; font-size: 0.88rem; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; box-shadow: 0 4px 15px rgba(197,160,89,0.35);">
                            Submit Intake Mandate &rarr;
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
