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
        'ajaxurl'   => admin_url('admin-ajax.php'),
        'homeUrl'   => home_url('/'),
        'searchUrl' => home_url('/insights/'),
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
 * Auto-create Primary Navigation Menu if none exists and assign to 'primary' location
 */
function legal_insights_auto_create_nav_menu() {
    $locations = get_theme_mod('nav_menu_locations');
    
    // Check if primary location is already assigned to a valid menu
    if (!empty($locations['primary'])) {
        $term = get_term($locations['primary'], 'nav_menu');
        if ($term && !is_wp_error($term)) {
            return;
        }
    }

    $menu_name = 'Primary Navigation Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        if (is_wp_error($menu_id)) {
            return;
        }

        // Add Home custom link
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'   => __('Home', 'legal-insights'),
            'menu-item-url'     => home_url('/'),
            'menu-item-status'  => 'publish',
            'menu-item-type'    => 'custom',
        ));

        // Add key pages to menu
        $menu_slugs = array(
            'about-us'      => __('About Us', 'legal-insights'),
            'our-people'    => __('Our People', 'legal-insights'),
            'our-expertise' => __('Practice Areas', 'legal-insights'),
            'our-awards'    => __('Our Awards', 'legal-insights'),
            'insights'      => __('Insights', 'legal-insights'),
            'contact-us'    => __('Contact Us', 'legal-insights'),
        );

        foreach ($menu_slugs as $slug => $title) {
            $page = get_page_by_path($slug);
            if ($page) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title'     => $title,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ));
            }
        }
    } else {
        $menu_id = $menu_exists->term_id;
    }

    // Assign menu to primary location
    if (!is_array($locations)) {
        $locations = array();
    }
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
}
add_action('admin_init', 'legal_insights_auto_create_nav_menu');
add_action('after_switch_theme', 'legal_insights_auto_create_nav_menu');

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


