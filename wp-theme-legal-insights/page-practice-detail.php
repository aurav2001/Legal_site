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

// 11 Core Practice Areas Knowledge Repository
$practices_catalog = array(
    'arbitration' => array(
        'title'    => 'Arbitration & ADR',
        'badge'    => 'Dispute Resolution & Arbitral Seats',
        'subtitle' => 'High-stakes domestic and international arbitrations governed by LCIA, SIAC, ICC, and Indian Arbitration & Conciliation Act 1996.',
        'overview' => array(
            'From pioneering decisions on the impact of arbitration on non-signatories to influencing the grounds for setting aside arbitral awards, our Firm is at the forefront of navigating complex, multi-jurisdiction disputes across energy, infrastructure, telecom, and corporate sectors.',
            'We represent sovereign entities, multinational conglomerates, and premier financial institutions in both institutional arbitrations and Section 9, 11, 34, and 37 proceedings before Indian High Courts and the Supreme Court of India.',
        ),
        'cases'    => array(
            array('forum' => 'Supreme Court of India Landmark', 'title' => 'Sukanya Holdings vs Jayesh H Pandya', 'desc' => "Seminal Supreme Court ruling addressing the effect of arbitration on non-signatories and bifurcating causes of action under Section 8 of the Arbitration Act."),
            array('forum' => 'Apex Court Jurisprudence', 'title' => 'ONGC vs Saw Pipes Ltd', 'desc' => "Landmark judgment defining the ambit of 'public policy' as a vital ground for setting aside arbitral awards under Section 34."),
            array('forum' => 'Supreme Court Curative Bench', 'title' => 'DMRC Curative Petition (Airport Express Line)', 'desc' => 'Represented concessionaire in high-quantum Section 34, 37, and unprecedented open-court Curative Petition proceedings arising from the Airport Metro Express Line.'),
            array('forum' => 'SIAC Institutional Arbitration', 'title' => 'MEMG Emergency Arbitration (SIAC)', 'desc' => 'Secured emergency interim relief under SIAC rules, restraining hostile transfer of educational and healthcare corporate equity assets.'),
        ),
    ),
    'commercial-litigation' => array(
        'title'    => 'Commercial Litigation',
        'badge'    => 'Commercial Courts & Appellate Advocacy',
        'subtitle' => 'Formidable courtroom presence before the Supreme Court of India, Delhi High Court, and commercial divisions nationwide.',
        'overview' => array(
            'Our Commercial Litigation practice represents Fortune 500 multinationals, domestic corporate houses, and financial institutions in high-stakes commercial disputes, contractual disputes, shareholder conflicts, injunctions, and appellate challenges.',
            'We combine aggressive forensic factual analysis with deep trial experience to secure immediate interim protections, injunctions, and decisive appellate decrees across statutory and common law jurisdictions.',
        ),
        'cases'    => array(
            array('forum' => 'Supreme Court Commercial Division', 'title' => 'Shareholder Oppression & Management Deadlock', 'desc' => 'Defended majority shareholders in multi-thousand crore management oppression disputes before NCLAT and the Supreme Court.'),
            array('forum' => 'Delhi High Court Appellate Bench', 'title' => 'Cross-Border Injunction & Foreign Asset Restraint', 'desc' => 'Obtained worldwide asset-freezing orders and anti-suit injunctions in contractual enforcement across international maritime and energy sectors.'),
        ),
    ),
    'competition-law' => array(
        'title'    => 'Competition Law',
        'badge'    => 'Antitrust & Regulatory Defense',
        'subtitle' => 'Defense and advisory before the Competition Commission of India (CCI) and National Company Law Appellate Tribunal (NCLAT).',
        'overview' => array(
            'We advise and defend market leaders, digital tech platforms, and manufacturers in antitrust investigations, abuse of dominance inquiries, cartel allegations, and merger control clearances before the CCI and appellate courts.',
            'Our team pairs legal acumen with economic analysis to structure safe commercial arrangements, compliance frameworks, and aggressive defense before regulatory directors general.',
        ),
        'cases'    => array(
            array('forum' => 'Competition Commission of India', 'title' => 'Digital Platform Abuse of Dominance Probe', 'desc' => 'Defended leading e-commerce and algorithmic platform providers against allegations of search bias and predatory deep-discounting.'),
            array('forum' => 'NCLAT Competition Appellate', 'title' => 'Cartelization Penalty Stay Decree', 'desc' => 'Secured absolute appellate stay against severe penalty orders passed by the CCI on alleged price-fixing accusations.'),
        ),
    ),
    'corporate-insolvency' => array(
        'title'    => 'Corporate & Insolvency Laws (IBC)',
        'badge'    => 'Distressed Assets & NCLAT Practice',
        'subtitle' => 'Strategic counsel under the Insolvency & Bankruptcy Code 2016 before NCLT, NCLAT, and Supreme Court of India.',
        'overview' => array(
            'Recognized as a leading practice in corporate turnaround and insolvency jurisprudence. We represent financial creditors, resolution applicants, and corporate debtors in multi-thousand crore CIRP proceedings, resolution plans formulation, Section 7/9 filings, and avoidance transaction litigation.',
            'Our partners have steered landmark distressed asset acquisitions across steel, infrastructure, hospitality, and real estate sectors.',
        ),
        'cases'    => array(
            array('forum' => 'Supreme Court Constitution Bench', 'title' => 'Section 29A Eligibility Benchmarks', 'desc' => 'Landmark precedent interpreting resolution applicant qualification standards and promoter disqualification norms under IBC.'),
            array('forum' => 'NCLAT Principal Bench', 'title' => 'Multi-Thousand Crore Resolution Approval', 'desc' => 'Steered committee of creditors (CoC) voting and successful approval of resolution plan for a premier heavy industrial manufacturing unit.'),
        ),
    ),
    'constitutional-law' => array(
        'title'    => 'Constitutional Law',
        'badge'    => 'Apex Court Bench Advocacy',
        'subtitle' => 'Writ petitions, Special Leave Petitions (SLPs), and landmark fundamental rights litigation before Supreme Court Constitution Benches.',
        'overview' => array(
            'Our senior advocates command historic presence in interpreting constitutional liberties, federal division of legislative powers, statutory validity challenges, and regulatory vires before the Supreme Court of India and State High Courts.',
            'We regularly represent industry associations and citizen coalitions on crucial matters of executive overreach and fundamental rights enforcement.',
        ),
        'cases'    => array(
            array('forum' => 'Supreme Court of India (Constitution Bench)', 'title' => 'Legislative Competence & Federal Vires Challenge', 'desc' => 'Challenged state enactments encroaching on central regulatory authority under the Seventh Schedule of the Constitution.'),
            array('forum' => 'High Court of Delhi', 'title' => 'Article 226 Landmark Mandamus Writ', 'desc' => 'Secured historic writ of mandamus protecting commercial license entitlements against retrospective administrative cancellation.'),
        ),
    ),
    'criminal-law' => array(
        'title'    => 'Criminal Law - White Collar',
        'badge'    => 'Economic Offenses & Trial Defense',
        'subtitle' => 'Specialized defense under Prevention of Money Laundering Act (PMLA), CBI investigations, SFIO, and ED prosecutions.',
        'overview' => array(
            'Comprehensive representation in high-stakes white-collar investigations, anticipatory bails, trial defense, and appellate stays before Special CBI Courts, PMLA Appellate Tribunals, High Courts, and the Supreme Court.',
            'Our defense strategy combines deep statutory insight with aggressive constitutional challenges to coercive search, seizure, and attachment powers.',
        ),
        'cases'    => array(
            array('forum' => 'Supreme Court of India', 'title' => 'Section 45 PMLA Bail Standards', 'desc' => 'Successfully secured landmark bail relief establishing statutory safeguards against arbitrary pre-trial incarceration in financial offense investigations.'),
            array('forum' => 'Special PMLA Court', 'title' => 'Quashing of Provisional Attachment Orders', 'desc' => 'De-freezed high-value commercial operating accounts wrongfully attached under speculative money-laundering allegations.'),
        ),
    ),
    'environmental-law' => array(
        'title'    => 'Environmental Law',
        'badge'    => 'Sustainable Industry & NGT Practice',
        'subtitle' => 'Representation before the National Green Tribunal (NGT), Supreme Court, and Ministry of Environment & Forests.',
        'overview' => array(
            'Advising industrial infrastructure developers, mining corporations, and renewable energy consortiums on environmental clearances, coastal regulation zone (CRZ) compliances, pollution control mandates, and defense against NGT penalty directives.',
            'We deliver pragmatic regulatory compliance roadmaps alongside vigorous courtroom defense against frivolous environmental injunctions.',
        ),
        'cases'    => array(
            array('forum' => 'National Green Tribunal (Principal Bench)', 'title' => 'Green Clearance Vires & Project Continuity', 'desc' => 'Defended mega clean-energy solar installation clearances against environmental challenge petitions, securing project commissioning orders.'),
        ),
    ),
    'regulatory-litigation' => array(
        'title'    => 'Regulatory Litigation',
        'badge'    => 'Statutory Tribunals & Regulators',
        'subtitle' => 'Advocacy across Electricity (APTEL), Telecom (TDSAT), Petroleum & Natural Gas (PNGRB), and Sectoral Regulators.',
        'overview' => array(
            'Navigating complex tariffs, concession disputes, license terminations, and policy arbitrations for telecom operators, transmission utilities, and infrastructure concessionaires.',
            'Our counsel bridge technical domain engineering realities with rigorous administrative law principles.',
        ),
        'cases'    => array(
            array('forum' => 'Appellate Tribunal for Electricity (APTEL)', 'title' => 'Renewable Tariff Determination Dispute', 'desc' => 'Successfully argued for tariff revision based on change-in-law clauses and force majeure grid interruptions.'),
        ),
    ),
    'mediation' => array(
        'title'    => 'Mediation & Conciliation',
        'badge'    => 'Consensual Dispute Resolution',
        'subtitle' => 'Structured commercial mediation for family business succession, shareholder splits, and joint venture settlements.',
        'overview' => array(
            'Confidential, high-trust mediation protocols designed to resolve intricate inter-generational business governance disputes, joint venture deadlock resolutions, and confidential commercial partitions.',
            'We preserve commercial relationships and corporate confidentiality while securing ironclad enforceable settlement deeds.',
        ),
        'cases'    => array(
            array('forum' => 'Private Commercial Conciliation', 'title' => 'Cross-Border Joint Venture Partition', 'desc' => 'Successfully steered multi-million dollar asset separation between international joint venture partners without public litigation.'),
        ),
    ),
    'securities-law' => array(
        'title'    => 'Securities Law & SEBI',
        'badge'    => 'Capital Markets & Securities Appellate',
        'subtitle' => 'Defense before SEBI Whole-Time Members, Securities Appellate Tribunal (SAT), and Supreme Court.',
        'overview' => array(
            'Defending promoters, listed entities, and merchant bankers in insider trading investigations, takeover code violations, fraud and unfair trade practices (FUTP) allegations, and SAT appeals.',
            'We advise boards on continuous disclosure norms, market abuse surveillance, and regulatory settlement applications.',
        ),
        'cases'    => array(
            array('forum' => 'Securities Appellate Tribunal (SAT)', 'title' => 'Stay on Promoters Debarment Order', 'desc' => 'Secured stay against SEBI ex-parte interim directions alleging price rigging and insider disclosure non-compliances.'),
        ),
    ),
    'tax' => array(
        'title'    => 'Tax - Direct & Indirect',
        'badge'    => 'Fiscal Jurisprudence & GST Litigation',
        'subtitle' => 'Representation before ITAT, CESTAT, High Courts, and Supreme Court in high-quantum tax assessments.',
        'overview' => array(
            'Strategic counsel on corporate taxation, transfer pricing disputes, GST classification challenges, search & seizure assessments, and constitutional validity of fiscal levies.',
            'Our advocates possess deep forensic understanding of accounting standards, cross-border treaty interpretations, and fiscal statutory schemes.',
        ),
        'cases'    => array(
            array('forum' => 'Delhi High Court Tax Bench', 'title' => 'Quashing of Arbitrary GST Reassessment', 'desc' => 'Secured writ relief quashing reassessment notices issued without statutory jurisdiction, establishing procedure for digital input credits.'),
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
                        <p style="font-size: 0.85rem; color: #64748b; margin-top: 4px;">Explore our 11 legal practice verticals</p>
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
