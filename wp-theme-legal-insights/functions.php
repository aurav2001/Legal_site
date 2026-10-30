<?php
/**
 * Theme Name: Legal Insights - AGL Style
 * Functions and definitions
 *
 * @package Legal_Insights
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Load Theme Modules (Helpers, Theme Options, Custom Post Types, Page Meta Boxes)
 */
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/theme-options.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/page-meta-boxes.php';
require_once get_template_directory() . '/inc/elementor-support.php';
require_once get_template_directory() . '/inc/contact-inquiries.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function legal_insights_setup() {
    // Make theme available for translation
    load_theme_textdomain('legal-insights', get_template_directory() . '/languages');

    // Explicitly declare theme support for Navigation Menus & Widgets
    add_theme_support('menus');
    add_theme_support('widgets');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 450, true);
    add_image_size('insight-card', 600, 380, true);
    add_image_size('insight-single', 1200, 630, true);
    add_image_size('insight-thumb', 240, 160, true);

    // Register primary navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation Menu', 'legal-insights'),
        'top-bar' => __('Top Bar Category Links', 'legal-insights'),
        'footer'  => __('Footer Quick Links', 'legal-insights'),
    ));

    // Switch default core markup to output valid HTML5.
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 280,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Align wide support
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'legal_insights_setup');

/**
 * Enqueue scripts and styles.
 */
function legal_insights_scripts() {
    // Google Fonts: Cardo & Inter
    wp_enqueue_style(
        'legal-insights-fonts',
        'https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Theme main stylesheet (cache busted with filemtime)
    $style_ver = file_exists(get_stylesheet_directory() . '/style.css') ? filemtime(get_stylesheet_directory() . '/style.css') : '1.2.5';
    wp_enqueue_style('legal-insights-style', get_stylesheet_uri(), array(), $style_ver);

    // Theme JavaScript
    wp_enqueue_script(
        'legal-insights-theme-js',
        get_template_directory_uri() . '/assets/js/theme.js',
        array('jquery'),
        '1.0.0',
        true
    );

    // Pass data to script
    wp_localize_script('legal-insights-theme-js', 'legalInsightsData', array(
        'ajaxurl'      => admin_url('admin-ajax.php'),
        'homeUrl'      => home_url('/'),
        'searchUrl'    => home_url('/insights/'),
        'inquiryNonce' => wp_create_nonce('legal_inquiry_nonce_action'),
    ));
}
add_action('wp_enqueue_scripts', 'legal_insights_scripts');

/**
 * Register Widget Area for Sidebar
 */
function legal_insights_widgets_init() {
    register_sidebar(array(
        'name'          => __('Insights Sidebar', 'legal-insights'),
        'id'            => 'insights-sidebar',
        'description'   => __('Add widgets here to appear in the single article sidebar.', 'legal-insights'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'legal_insights_widgets_init');

/**
 * Custom Excerpt Length and Read More
 */
function legal_insights_excerpt_length($length) {
    return 24;
}
add_filter('excerpt_length', 'legal_insights_excerpt_length', 999);

function legal_insights_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'legal_insights_excerpt_more');

/**
 * Custom Excerpt Helper
 */
function legal_insights_custom_excerpt($limit = 20, $post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $excerpt = get_the_excerpt($post_id);
    if (empty($excerpt)) {
        $content = get_post_field('post_content', $post_id);
        $excerpt = strip_tags($content);
    }
    return wp_trim_words($excerpt, $limit, '...');
}

/**
 * Estimated Reading Time Helper
 */
function legal_insights_reading_time($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return max(1, $reading_time) . ' min read';
}

/**
 * Helper: Get Default Placeholder Image
 */
function legal_insights_default_image() {
    return get_template_directory_uri() . '/assets/images/placeholder-legal.jpg';
}

/**
 * Automatic Setup of Essential Pages and Demo Sample Content
 * Automatically creates all theme pages and legal articles upon theme activation
 */
function legal_insights_auto_setup_content() {
    $initialized = get_option('legal_insights_initialized');
    $force_seed  = isset($_GET['seed_insights']) && current_user_can('manage_options');

    if ($initialized && !$force_seed) {
        return;
    }

    // 1. Create Core Theme Pages
    $pages = array(
        'About Us' => array(
            'slug'     => 'about-us',
            'template' => 'page-about-us.php',
            'content'  => 'About LexVanguard Legal Chambers.',
        ),
        'Our People' => array(
            'slug'     => 'our-people',
            'template' => 'page-our-people.php',
            'content'  => 'Distinguished Advocates and Senior Counsel.',
        ),
        'Our Expertise' => array(
            'slug'     => 'our-expertise',
            'template' => 'page-our-expertise.php',
            'content'  => 'Practice Verticals and Courtroom Advocacy.',
        ),
        'Our Awards' => array(
            'slug'     => 'our-awards',
            'template' => 'page-our-awards.php',
            'content'  => 'Institutional Honors and Benchmark Distinctions.',
        ),
        'Insights' => array(
            'slug'     => 'insights',
            'template' => 'page-insights.php',
            'content'  => 'Supreme Court Digests, Research Briefs, and Commentary.',
        ),
        'Contact Us' => array(
            'slug'     => 'contact-us',
            'template' => 'page-contact-us.php',
            'content'  => 'Consultation Directory and Chambers Contact.',
        ),
        'Terms of Access' => array(
            'slug'     => 'terms',
            'template' => 'page.php',
            'content'  => 'Terms of access and legal compliance standards.',
        ),
    );

    foreach ($pages as $title => $pdata) {
        $existing = get_page_by_path($pdata['slug']);
        if (!$existing) {
            $page_id = wp_insert_post(array(
                'post_title'   => $title,
                'post_name'    => $pdata['slug'],
                'post_content' => $pdata['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_author'  => get_current_user_id() ? get_current_user_id() : 1,
            ));
            if ($page_id && !is_wp_error($page_id) && !empty($pdata['template'])) {
                update_post_meta($page_id, '_wp_page_template', $pdata['template']);
            }
        }
    }

    // 2. Create Sample Categories
    $sample_categories = array('Blogs & Articles', 'Media & Events', 'Supreme Court Digest', 'Corporate & M&A');
    $cat_ids = array();

    foreach ($sample_categories as $cat_name) {
        $cat_term = term_exists($cat_name, 'category');
        if (!$cat_term) {
            $created = wp_insert_term($cat_name, 'category');
            if (!is_wp_error($created)) {
                $cat_ids[$cat_name] = $created['term_id'];
            }
        } else {
            $cat_ids[$cat_name] = is_array($cat_term) ? $cat_term['term_id'] : $cat_term;
        }
    }

    // 3. Seed Sample Legal Articles
    $sample_posts = array(
        array(
            'title'    => 'Mergers, Demergers, Capital Reduction and Restructuring',
            'category' => 'Blogs & Articles',
            'excerpt'  => 'End-to-end legal expertise in mergers, demergers, corporate restructurings, and capital reductions under the Companies Act 2013 and NCLT jurisprudence.',
            'content'  => '<h2>Comprehensive Advisory on Corporate Restructuring</h2><p>Our corporate practice advises leading conglomerates, financial institutions, and multinational corporations on structuring, negotiating, and executing high-value mergers, demergers, and capital reductions.</p><blockquote>The sanctioning of schemes of arrangement under Sections 230-232 requires strict compliance with statutory notices, creditor approvals, and regulatory clearances from Regional Directors, ROC, and the Competition Commission of India.</blockquote><h3>Key Procedural Aspects before NCLT</h3><p>Handling large scale restructuring involves forensic scrutiny of shareholder and creditor meetings, accounting treatment confirmations under Indian Accounting Standards (Ind AS), and timely compliance before the National Company Law Tribunal (NCLT).</p>',
        ),
        array(
            'title'    => 'The Evolution Of Data Protection: Analyzing India’s Legal Framework And Global Implications',
            'category' => 'Blogs & Articles',
            'excerpt'  => 'Data privacy and data protection under the Digital Personal Data Protection Act (DPDPA), 2023: An exhaustive review of cross-border data transfers and enterprise compliance.',
            'content'  => '<h2>Navigating the DPDPA 2023 Framework</h2><p>Data privacy and data protection, though often used interchangeably, represent fundamentally distinct regulatory paradigms in Indian commercial jurisprudence.</p><blockquote>Unlike the EU GDPR, the Indian DPDPA establishes distinct consent architectures and mandatory Data Protection Officer (DPO) mechanisms for Significant Data Fiduciaries.</blockquote><h3>Enterprise Compliance Strategy</h3><p>Enterprises handling consumer data must implement verifiable consent management, automated erasure workflows upon withdrawal, and robust notice disclosures in 22 scheduled Indian languages.</p>',
        ),
        array(
            'title'    => 'Mineral Area Development Authority vs Steel Authority of India: Historic Supreme Court Judgment',
            'category' => 'Supreme Court Digest',
            'excerpt'  => 'On 25th July 2024, the Supreme Court of India delivered a landmark 9-judge bench judgment resolving decades-old constitutional battles over States’ power to tax mineral rights.',
            'content'  => '<h2>9-Judge Constitution Bench Verdict</h2><p>The Supreme Court of India ruled with an 8:1 majority that royalties paid under the Mines and Minerals (Development and Regulation) Act (MMDR Act), 1957 do not constitute taxes, thereby upholding the legislative competence of States to levy taxes on mineral-bearing lands.</p><blockquote>This historic decision redefines federal fiscal dynamics and significantly impacts mining concessions, royalty structures, and tax liabilities across the nation.</blockquote>',
        ),
        array(
            'title'    => 'Annual Global Arbitration Symposium: Cross-Border Commercial Enforcement',
            'category' => 'Media & Events',
            'excerpt'  => 'Partners and Senior Counsel address the 2026 International Arbitration Summit on enforcement of foreign awards under the New York Convention and bilateral treaties.',
            'content'  => '<h2>Key Takeaways from the Global Arbitration Summit</h2><p>Senior advocates and arbitration specialists discussed recent pro-arbitration trends across Singapore, London, and New Delhi seats, addressing emergency arbitrator relief and interim preservation of assets.</p>',
        )
    );

    foreach ($sample_posts as $post_data) {
        $existing = get_page_by_title($post_data['title'], OBJECT, 'post');
        if (!$existing) {
            wp_insert_post(array(
                'post_title'    => $post_data['title'],
                'post_content'  => $post_data['content'],
                'post_excerpt'  => $post_data['excerpt'],
                'post_status'   => 'publish',
                'post_author'   => get_current_user_id() ? get_current_user_id() : 1,
                'post_category' => isset($cat_ids[$post_data['category']]) ? array($cat_ids[$post_data['category']]) : array(),
            ));
        }
    }

    update_option('legal_insights_initialized', 1);

    if ($force_seed) {
        wp_die('Demo sample legal insights and pages successfully initialized! <a href="' . esc_url(home_url('/insights/')) . '">View Insights Page</a>', 'Setup Complete');
    }
}
add_action('admin_init', 'legal_insights_auto_setup_content');
add_action('after_switch_theme', 'legal_insights_auto_setup_content');

/**
 * Automatically ensure all theme pages exist in WordPress database
 */
function legal_insights_ensure_all_pages() {
    $pages = array(
        'About Us' => array(
            'slug'     => 'about-us',
            'template' => 'page-about-us.php',
            'content'  => 'About LexVanguard Legal Chambers.',
        ),
        'Our Team' => array(
            'slug'     => 'our-people',
            'template' => 'page-our-people.php',
            'content'  => 'Distinguished Advocates and Senior Counsel.',
        ),
        'Practice Areas' => array(
            'slug'     => 'our-expertise',
            'template' => 'page-our-expertise.php',
            'content'  => 'Practice Verticals and Courtroom Advocacy.',
        ),
        'Our Awards' => array(
            'slug'     => 'our-awards',
            'template' => 'page-our-awards.php',
            'content'  => 'Institutional Honors and Benchmark Distinctions.',
        ),
        'Insights' => array(
            'slug'     => 'insights',
            'template' => 'page-insights.php',
            'content'  => 'Supreme Court Digests, Research Briefs, and Commentary.',
        ),
        'Contact Us' => array(
            'slug'     => 'contact-us',
            'template' => 'page-contact-us.php',
            'content'  => 'Consultation Directory and Chambers Contact.',
        ),
        'Terms of Access' => array(
            'slug'     => 'terms',
            'template' => 'page.php',
            'content'  => 'Terms of access and legal compliance standards.',
        ),
    );

    // 1. If page 10 exists, restore and publish it with our-people slug
    $p10 = get_post(10);
    if ($p10) {
        if ($p10->post_status !== 'publish' || $p10->post_name !== 'our-people') {
            wp_update_post(array(
                'ID'          => 10,
                'post_status' => 'publish',
                'post_name'   => 'our-people',
                'post_title'  => 'Our People',
            ));
        }
        update_post_meta(10, '_wp_page_template', 'page-our-people.php');
    }

    // 2. If page 11 exists, restore and publish it with our-expertise slug
    $p11 = get_post(11);
    if ($p11) {
        if ($p11->post_status !== 'publish' || $p11->post_name !== 'our-expertise') {
            wp_update_post(array(
                'ID'          => 11,
                'post_status' => 'publish',
                'post_name'   => 'our-expertise',
                'post_title'  => 'Our Expertise',
            ));
        }
        update_post_meta(11, '_wp_page_template', 'page-our-expertise.php');
    }

    foreach ($pages as $title => $pdata) {
        $existing = get_page_by_path($pdata['slug'], OBJECT, 'page');
        if ($existing) {
            if ($existing->post_status !== 'publish') {
                wp_update_post(array(
                    'ID'          => $existing->ID,
                    'post_status' => 'publish',
                ));
            }
            update_post_meta($existing->ID, '_wp_page_template', $pdata['template']);
        } else {
            $by_title = get_page_by_title($title, OBJECT, 'page');
            if ($by_title) {
                wp_update_post(array(
                    'ID'          => $by_title->ID,
                    'post_name'   => $pdata['slug'],
                    'post_status' => 'publish',
                ));
                update_post_meta($by_title->ID, '_wp_page_template', $pdata['template']);
            } else {
                $page_id = wp_insert_post(array(
                    'post_title'   => $title,
                    'post_name'    => $pdata['slug'],
                    'post_content' => $pdata['content'],
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                    'post_author'  => 1,
                ));
                if ($page_id && !is_wp_error($page_id) && !empty($pdata['template'])) {
                    update_post_meta($page_id, '_wp_page_template', $pdata['template']);
                }
            }
        }
    }
}
add_action('init', 'legal_insights_ensure_all_pages', 5);

/**
 * Auto-correct any menu items that point to legacy page_ids or broken links
 */
function legal_insights_fix_menu_item_urls($items) {
    if (!is_array($items)) {
        return $items;
    }
    foreach ($items as $item) {
        $title = trim(strtolower($item->title ?? ''));
        $obj_id = (int)($item->object_id ?? 0);
        $url = $item->url ?? '';

        if ($title === 'our team' || $title === 'our people' || $obj_id === 10 || strpos($url, 'page_id=10') !== false) {
            $item->url = home_url('/our-people/');
        } elseif ($title === 'practice areas' || $title === 'our expertise' || $obj_id === 11 || strpos($url, 'page_id=11') !== false) {
            $item->url = home_url('/our-expertise/');
        } elseif ($title === 'about us') {
            $item->url = home_url('/about-us/');
        } elseif ($title === 'our awards' || $title === 'awards') {
            $item->url = home_url('/our-awards/');
        } elseif ($title === 'insights' || $title === 'blog') {
            $item->url = home_url('/insights/');
        } elseif ($title === 'contact us' || $title === 'contact') {
            $item->url = home_url('/contact-us/');
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'legal_insights_fix_menu_item_urls', 99);

/**
 * Fallback Template Router: Automatically serves theme templates for core paths & 301 redirects legacy page_ids
 */
function legal_insights_fallback_template_router() {
    // 1. Direct 301 redirect if someone hits ?page_id=10 or ?page_id=11
    if (isset($_GET['page_id'])) {
        $pid = (int)$_GET['page_id'];
        if ($pid === 10) {
            wp_safe_redirect(home_url('/our-people/'), 301);
            exit;
        }
        if ($pid === 11) {
            wp_safe_redirect(home_url('/our-expertise/'), 301);
            exit;
        }
    }

    // 2. Intercept 404s for core theme routes
    if (is_404()) {
        $raw_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
        $path = trim($raw_uri, '/');

        // Strip subfolder if WP installed in subdirectory
        $home_path = trim(parse_url(home_url(), PHP_URL_PATH), '/');
        if (!empty($home_path) && strpos($path, $home_path) === 0) {
            $path = trim(substr($path, strlen($home_path)), '/');
        }

        if ($path === 'our-people' || $path === 'people' || $path === 'our-team') {
            status_header(200);
            $GLOBALS['wp_query']->is_404 = false;
            include get_template_directory() . '/page-our-people.php';
            exit;
        }

        if ($path === 'our-expertise' || $path === 'expertise' || $path === 'practice-areas') {
            status_header(200);
            $GLOBALS['wp_query']->is_404 = false;
            include get_template_directory() . '/page-our-expertise.php';
            exit;
        }

        if (strpos($path, 'our-expertise/') === 0 || strpos($path, 'expertise/') === 0 || strpos($path, 'practice/') === 0) {
            status_header(200);
            $GLOBALS['wp_query']->is_404 = false;
            include get_template_directory() . '/page-practice-detail.php';
            exit;
        }

        if ($path === 'about-us' || $path === 'about') {
            status_header(200);
            $GLOBALS['wp_query']->is_404 = false;
            include get_template_directory() . '/page-about-us.php';
            exit;
        }

        if ($path === 'our-awards' || $path === 'awards') {
            status_header(200);
            $GLOBALS['wp_query']->is_404 = false;
            include get_template_directory() . '/page-our-awards.php';
            exit;
        }

        if ($path === 'insights' || $path === 'blog' || $path === 'publications') {
            status_header(200);
            $GLOBALS['wp_query']->is_404 = false;
            include get_template_directory() . '/page-insights.php';
            exit;
        }

        if ($path === 'contact-us' || $path === 'contact') {
            status_header(200);
            $GLOBALS['wp_query']->is_404 = false;
            include get_template_directory() . '/page-contact-us.php';
            exit;
        }

        if ($path === 'terms' || $path === 'terms-of-access') {
            status_header(200);
            $GLOBALS['wp_query']->is_404 = false;
            include get_template_directory() . '/page.php';
            exit;
        }
    }
}
add_action('template_redirect', 'legal_insights_fallback_template_router', 1);

/**
 * Auto-create or Auto-populate Primary Navigation Menu if empty
 */
function legal_insights_auto_create_nav_menu() {
    $locations = get_theme_mod('nav_menu_locations');
    if (!is_array($locations)) {
        $locations = array();
    }

    $target_menu_id = 0;

    // Check if primary location is assigned to an existing menu
    if (!empty($locations['primary'])) {
        $term = get_term($locations['primary'], 'nav_menu');
        if ($term && !is_wp_error($term)) {
            $target_menu_id = $term->term_id;
        }
    }

    // If no menu assigned, find or create 'Primary Navigation Menu'
    if (!$target_menu_id) {
        $menu_name = 'Primary Navigation Menu';
        $menu_exists = wp_get_nav_menu_object($menu_name);
        if (!$menu_exists) {
            $target_menu_id = wp_create_nav_menu($menu_name);
        } else {
            $target_menu_id = $menu_exists->term_id;
        }

        if ($target_menu_id && !is_wp_error($target_menu_id)) {
            $locations['primary'] = $target_menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }

    // If the target menu exists and has 0 items, auto-populate all pages and dropdown practices!
    if ($target_menu_id && !is_wp_error($target_menu_id)) {
        $menu_items = wp_get_nav_menu_items($target_menu_id);
        if (empty($menu_items)) {
            // 1. Home
            wp_update_nav_menu_item($target_menu_id, 0, array(
                'menu-item-title'   => __('Home', 'legal-insights'),
                'menu-item-url'     => home_url('/'),
                'menu-item-status'  => 'publish',
                'menu-item-type'    => 'custom',
            ));

            // 2. About Us
            $about_p = get_page_by_path('about-us');
            if ($about_p) {
                wp_update_nav_menu_item($target_menu_id, 0, array(
                    'menu-item-title'     => __('About Us', 'legal-insights'),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $about_p->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ));
            }

            // 3. Our Team
            $team_p = get_page_by_path('our-people');
            if ($team_p) {
                wp_update_nav_menu_item($target_menu_id, 0, array(
                    'menu-item-title'     => __('Our Team', 'legal-insights'),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $team_p->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ));
            }

            // 4. Practice Areas (Parent)
            $practice_p = get_page_by_path('our-expertise');
            $practice_parent_id = 0;
            if ($practice_p) {
                $practice_parent_id = wp_update_nav_menu_item($target_menu_id, 0, array(
                    'menu-item-title'     => __('Practice Areas', 'legal-insights'),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $practice_p->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ));
            } else {
                $practice_parent_id = wp_update_nav_menu_item($target_menu_id, 0, array(
                    'menu-item-title'   => __('Practice Areas', 'legal-insights'),
                    'menu-item-url'     => home_url('/our-expertise/'),
                    'menu-item-status'  => 'publish',
                    'menu-item-type'    => 'custom',
                ));
            }

            // 5. Practice Areas Sub-Items (Dropdown)
            if ($practice_parent_id && !is_wp_error($practice_parent_id)) {
                $sub_practices = array(
                    'Arbitration & ADR'             => home_url('/our-expertise/arbitration/'),
                    'Commercial Litigation'        => home_url('/our-expertise/commercial-litigation/'),
                    'Competition Law'              => home_url('/our-expertise/competition-law/'),
                    'Corporate & Insolvency Laws'  => home_url('/our-expertise/corporate-insolvency/'),
                    'Constitutional Law'           => home_url('/our-expertise/constitutional-law/'),
                    'Criminal Law - White Collar'  => home_url('/our-expertise/criminal-law/'),
                    'Environmental Law'            => home_url('/our-expertise/environmental-law/'),
                    'Regulatory Litigation'        => home_url('/our-expertise/regulatory-litigation/'),
                    'Mediation'                    => home_url('/our-expertise/mediation/'),
                    'Securities Law'               => home_url('/our-expertise/securities-law/'),
                    'Tax - Direct & Indirect'      => home_url('/our-expertise/tax/'),
                );

                foreach ($sub_practices as $sub_title => $sub_url) {
                    wp_update_nav_menu_item($target_menu_id, 0, array(
                        'menu-item-title'     => $sub_title,
                        'menu-item-url'       => $sub_url,
                        'menu-item-status'    => 'publish',
                        'menu-item-type'      => 'custom',
                        'menu-item-parent-id' => $practice_parent_id,
                    ));
                }
            }

            // 6. Our Awards
            $awards_p = get_page_by_path('our-awards');
            if ($awards_p) {
                wp_update_nav_menu_item($target_menu_id, 0, array(
                    'menu-item-title'     => __('Our Awards', 'legal-insights'),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $awards_p->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ));
            }

            // 7. Insights
            $insights_p = get_page_by_path('insights');
            if ($insights_p) {
                wp_update_nav_menu_item($target_menu_id, 0, array(
                    'menu-item-title'     => __('Insights', 'legal-insights'),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $insights_p->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ));
            }

            // 8. Contact Us
            $contact_p = get_page_by_path('contact-us');
            if ($contact_p) {
                wp_update_nav_menu_item($target_menu_id, 0, array(
                    'menu-item-title'     => __('Contact Us', 'legal-insights'),
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $contact_p->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ));
            }
        }
    }
}
add_action('admin_init', 'legal_insights_auto_create_nav_menu', 10);
add_action('after_switch_theme', 'legal_insights_auto_create_nav_menu', 10);

/**
 * Ensure 'Menus' is ALWAYS visible in Appearance menu (nav-menus.php)
 */
function legal_insights_ensure_menu_admin() {
    global $submenu;
    if (isset($submenu['themes.php'])) {
        $has_menus = false;
        foreach ($submenu['themes.php'] as $item) {
            if (isset($item[2]) && $item[2] === 'nav-menus.php') {
                $has_menus = true;
                break;
            }
        }
        if (!$has_menus) {
            add_theme_page(
                __('Menus', 'legal-insights'),
                __('Menus', 'legal-insights'),
                'edit_theme_options',
                'nav-menus.php'
            );
        }
    }
}
add_action('admin_menu', 'legal_insights_ensure_menu_admin', 999);


