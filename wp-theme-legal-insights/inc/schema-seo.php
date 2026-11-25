<?php
/**
 * Native Legal Tech SEO & Schema.org Structured Data Engine
 *
 * Implements:
 * 1. Schema.org/LegalService & Attorney JSON-LD markup for Google Rich Snippets
 * 2. BreadcrumbList structured data for search result hierarchy
 * 3. Article / NewsArticle schema on legal research insights
 * 4. Open Graph (og:) and Twitter Card meta tags for luxury social sharing
 * 5. Automatic conflict prevention if dedicated third-party SEO plugins are active
 *
 * @package Legal_Insights
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if a third-party SEO plugin is handling meta tags
 *
 * @return bool
 */
function legal_insights_has_seo_plugin() {
    return defined('WPSEO_VERSION') || defined('RANK_MATH_VERSION') || defined('AIOSEO_VERSION') || class_exists('SEOPress');
}

/**
 * Output Schema.org JSON-LD Structured Data in wp_head
 */
function legal_insights_output_schema_jsonld() {
    // Basic firm details from theme options
    $firm_name  = function_exists('legal_insights_get_option') ? legal_insights_get_option('firm_name', 'Malhotra & Co.') : 'Malhotra & Co.';
    $tagline    = function_exists('legal_insights_get_firm_tagline') ? legal_insights_get_firm_tagline() : 'Advocates & Solicitors';
    $site_url   = home_url('/');
    $phone      = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_phone', '+91 90135 35766') : '+91 90135 35766';
    $email      = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_email', 'chaitanyamlegal@gmail.com') : 'chaitanyamlegal@gmail.com';
    $address    = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_address', 'B-33, 1st Floor, Jangpura Extension, New Delhi 110014') : 'B-33, 1st Floor, Jangpura Extension, New Delhi 110014';
    $logo_url   = function_exists('legal_insights_get_option') ? legal_insights_get_option('firm_logo') : '';

    if (empty($logo_url)) {
        $custom_logo_id = get_theme_mod('custom_logo');
        if ($custom_logo_id) {
            $logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
            $logo_url  = !empty($logo_data[0]) ? $logo_data[0] : '';
        }
    }
    if (empty($logo_url)) {
        $logo_url = get_template_directory_uri() . '/screenshot.jpg';
    }

    $schema_graph = array();

    // 1. LegalService / Attorney Entity
    $legal_service = array(
        '@type'              => 'LegalService',
        '@id'                => esc_url($site_url) . '#legalservice',
        'name'               => esc_html($firm_name),
        'alternateName'      => 'Malhotra & Co. Advocates & Solicitors',
        'description'        => esc_html($tagline),
        'url'                => esc_url($site_url),
        'telephone'          => esc_html($phone),
        'email'              => sanitize_email($email),
        'priceRange'         => '₹₹₹₹',
        'currenciesAccepted' => 'INR, USD, EUR, GBP',
        'paymentAccepted'    => 'Wire Transfer, Cheque, Retainer Agreement',
        'openingHours'       => 'Mo-Sa 09:30-19:30',
        'address'            => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => esc_html($address),
            'addressLocality' => 'Jangpura Extension, New Delhi',
            'addressRegion'   => 'Delhi',
            'postalCode'      => '110014',
            'addressCountry'  => 'IN',
        ),
        'hasMap'             => 'https://maps.app.goo.gl/pLAPAMtfgz7hAWnT9',
        'founder'            => array(
            '@type' => 'Person',
            'name'  => 'Chaitanya Malhotra',
            'jobTitle' => 'Managing Partner, Advocate',
        ),
        'areaServed'         => array(
            'Supreme Court of India',
            'High Court of Delhi',
            'National Company Law Appellate Tribunal (NCLAT)',
            'Debts Recovery Appellate Tribunal (DRAT)',
            'Commercial Courts of Delhi & NCR',
        ),
        'knowsAbout'         => array(
            'Commercial Litigation (Contractual, Shareholder & Business Disputes)',
            'Domestic and Institutional Arbitration (SIAC, ICC & Indian Arbitration Act)',
            'Civil Litigation (Property, Tenancy, Succession & Recovery)',
            'Criminal Litigation & White-Collar Offences',
            'Startup Advisory, Corporate Governance & Policy Compliance',
            'Appellate Advocacy before Supreme Court of India & Delhi High Court',
        ),
    );

    if (!empty($logo_url)) {
        $legal_service['logo']  = esc_url($logo_url);
        $legal_service['image'] = esc_url($logo_url);
    }

    $schema_graph[] = $legal_service;

    // 2. Article / Analysis Schema (on single insights)
    if (is_singular('post')) {
        global $post;
        $author_name = get_the_author_meta('display_name', $post->post_author);
        $thumb_url   = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'large') : $logo_url;

        $article_schema = array(
            '@type'            => 'ScholarlyArticle',
            '@id'              => esc_url(get_permalink($post->ID)) . '#article',
            'isPartOf'         => array('@id' => esc_url($site_url)),
            'headline'         => esc_html(get_the_title($post->ID)),
            'description'      => esc_html(wp_strip_all_tags(get_the_excerpt($post->ID))),
            'datePublished'    => get_the_date('c', $post->ID),
            'dateModified'     => get_the_modified_date('c', $post->ID),
            'mainEntityOfPage' => esc_url(get_permalink($post->ID)),
            'author'           => array(
                '@type' => 'Person',
                'name'  => esc_html($author_name),
            ),
            'publisher'        => array(
                '@id' => esc_url($site_url) . '#legalservice',
            ),
        );

        if (!empty($thumb_url)) {
            $article_schema['image'] = esc_url($thumb_url);
        }

        $schema_graph[] = $article_schema;
    }

    // 3. BreadcrumbList Schema
    if (!is_front_page()) {
        $breadcrumbs = array(
            '@type'           => 'BreadcrumbList',
            'itemListElement' => array(
                array(
                    '@type'    => 'ListItem',
                    'position' => 1,
                    'name'     => 'Home',
                    'item'     => esc_url(home_url('/')),
                ),
            ),
        );

        $pos = 2;
        if (is_singular('post')) {
            $breadcrumbs['itemListElement'][] = array(
                '@type'    => 'ListItem',
                'position' => $pos++,
                'name'     => 'Insights & Briefings',
                'item'     => esc_url(home_url('/insights/')),
            );
            $breadcrumbs['itemListElement'][] = array(
                '@type'    => 'ListItem',
                'position' => $pos,
                'name'     => esc_html(get_the_title()),
                'item'     => esc_url(get_permalink()),
            );
        } elseif (is_page()) {
            $breadcrumbs['itemListElement'][] = array(
                '@type'    => 'ListItem',
                'position' => $pos,
                'name'     => esc_html(get_the_title()),
                'item'     => esc_url(get_permalink()),
            );
        }

        $schema_graph[] = $breadcrumbs;
    }

    // Print JSON-LD Output
    $json_output = array(
        '@context' => 'https://schema.org',
        '@graph'   => $schema_graph,
    );

    echo "\n<!-- LexVanguard Native Legal Schema & Structured Data Engine -->\n";
    echo '<script type="application/ld+json">' . wp_json_encode($json_output, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "</script>\n";
}
add_action('wp_head', 'legal_insights_output_schema_jsonld', 2);

/**
 * Output Luxury Open Graph & Twitter Social Cards in wp_head
 */
function legal_insights_output_social_meta_tags() {
    if (legal_insights_has_seo_plugin()) {
        return;
    }

    $firm_name = function_exists('legal_insights_get_option') ? legal_insights_get_option('firm_name', 'LexVanguard Advocates & Legal Consultants') : 'LexVanguard Advocates & Legal Consultants';
    $site_url  = home_url('/');

    if (is_singular('post')) {
        global $post;
        $title = get_the_title($post->ID);
        $desc  = wp_strip_all_tags(get_the_excerpt($post->ID));
        $url   = get_permalink($post->ID);
        $type  = 'article';
        $img   = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'large') : '';
    } else {
        $title = wp_get_document_title();
        $desc  = function_exists('legal_insights_get_firm_tagline') ? legal_insights_get_firm_tagline() : 'Advocates & Supreme Court Counsel';
        $url   = is_front_page() ? $site_url : get_permalink();
        $type  = 'website';
        $img   = '';
    }

    if (empty($img)) {
        $custom_logo_id = get_theme_mod('custom_logo');
        if ($custom_logo_id) {
            $img_data = wp_get_attachment_image_src($custom_logo_id, 'full');
            $img      = !empty($img_data[0]) ? $img_data[0] : '';
        }
    }

    echo "\n<!-- LexVanguard Social Open Graph & Twitter Cards -->\n";
    echo '<meta property="og:site_name" content="' . esc_attr($firm_name) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:type" content="' . esc_attr($type) . '">' . "\n";
    if (!empty($img)) {
        echo '<meta property="og:image" content="' . esc_url($img) . '">' . "\n";
    }

    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($desc) . '">' . "\n";
    if (!empty($img)) {
        echo '<meta name="twitter:image" content="' . esc_url($img) . '">' . "\n";
    }
}
add_action('wp_head', 'legal_insights_output_social_meta_tags', 3);

