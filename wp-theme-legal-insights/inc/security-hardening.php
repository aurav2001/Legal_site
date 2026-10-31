<?php
/**
 * LexVanguard Theme Enterprise Security Hardening & Defense-in-Depth Shield
 *
 * Provides comprehensive layer-7 protection against common WordPress attack vectors:
 * 1. HTTP Security Headers (Anti-Clickjacking, MIME-Sniffing, XSS protection)
 * 2. Information Disclosure & Fingerprint Obfuscation (Version Generator, Asset strings removal)
 * 3. Anti-Reconnaissance & User Enumeration Shield (Blocks ?author=N & anonymous REST API user harvesting)
 * 4. Brute Force Cloaking (Generic authentication error messages to prevent username harvesting)
 * 5. XML-RPC & Pingback DDoS Amplification Defense
 * 6. Malicious Request URI & Query String Exploit Sanitizer (LFI, RFI, SQLi patterns)
 * 7. In-Dashboard Theme File Editor Lockdown
 *
 * @package Legal_Insights
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Send Enterprise HTTP Security Headers
 */
function legal_insights_security_headers() {
    if (!is_admin()) {
        // Prevent clickjacking while allowing same-origin iframes (like Elementor preview)
        header('X-Frame-Options: SAMEORIGIN');
        // Prevent MIME type sniffing
        header('X-Content-Type-Options: nosniff');
        // Enable XSS filtering in browsers
        header('X-XSS-Protection: 1; mode=block');
        // Referrer policy
        header('Referrer-Policy: strict-origin-when-cross-origin');
        // Restrict sensitive browser APIs if not required
        header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
    }
}
add_action('send_headers', 'legal_insights_security_headers');

/**
 * 2. Obfuscate WordPress Footprint & Generator Fingerprints
 */
// Remove WordPress generator tag from HTML source
remove_action('wp_head', 'wp_generator');

// Remove Really Simple Discovery (RSD) link
remove_action('wp_head', 'rsd_link');

// Remove Windows Live Writer manifest link
remove_action('wp_head', 'wlwmanifest_link');

// Remove shortlink meta
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Remove adjacent post links from header
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Disable WordPress XML-RPC pingback header
function legal_insights_remove_x_pingback_header($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}
add_filter('wp_headers', 'legal_insights_remove_x_pingback_header');

// Strip WordPress version query string from enqueued CSS and JS for anonymous visitors
function legal_insights_remove_version_scripts_styles($src) {
    if (!is_admin() && strpos($src, 'ver=') !== false) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'legal_insights_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'legal_insights_remove_version_scripts_styles', 9999);

/**
 * 3. Anti-Reconnaissance: Block Author Enumeration (?author=N)
 * Attackers use ?author=1, ?author=2 to discover valid admin usernames.
 */
function legal_insights_block_author_enumeration() {
    if (!is_admin() && isset($_REQUEST['author']) && is_numeric($_REQUEST['author'])) {
        wp_safe_redirect(home_url('/'), 301);
        exit;
    }
}
add_action('template_redirect', 'legal_insights_block_author_enumeration');

/**
 * 4. Restrict Anonymous User Scraping via REST API (/wp-json/wp/v2/users)
 * Prevents automated tools from dumping staff/admin accounts.
 */
function legal_insights_restrict_rest_users_endpoint($endpoints) {
    if (!is_user_logged_in()) {
        if (isset($endpoints['/wp/v2/users'])) {
            unset($endpoints['/wp/v2/users']);
        }
        if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
            unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
        }
    }
    return $endpoints;
}
add_filter('rest_endpoints', 'legal_insights_restrict_rest_users_endpoint');

/**
 * 5. Brute Force Cloaking: Obfuscate Login Error Messages
 * Replaces detailed errors with generic message so hackers cannot verify whether a username exists.
 */
function legal_insights_secure_login_errors() {
    return __('<strong>Security Notice:</strong> Invalid login credentials.', 'legal-insights');
}
add_filter('login_errors', 'legal_insights_secure_login_errors');

/**
 * 6. Disable XML-RPC Pingback Exploits (Layer-7 DDoS Amplification Mitigation)
 */
function legal_insights_disable_xmlrpc_pingbacks($methods) {
    unset($methods['pingback.ping']);
    unset($methods['pingback.extensions.getPingbacks']);
    return $methods;
}
add_filter('xmlrpc_methods', 'legal_insights_disable_xmlrpc_pingbacks');

/**
 * 7. Malicious URI & Exploit Signature Blocker
 * Intercepts common remote file inclusion, SQL injection, and path traversal strings.
 */
function legal_insights_block_malicious_requests() {
    if (is_admin()) {
        return;
    }

    $request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    $query_str   = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';

    $target = rawurldecode($request_uri . ' ' . $query_str);

    $bad_patterns = array(
        'base64_decode(',
        'eval(',
        '<script',
        '</script>',
        'union+select',
        'union select',
        'benchmark(',
        '/etc/passwd',
        '../..',
        '..\\..',
        'proc/self/environ',
    );

    foreach ($bad_patterns as $pattern) {
        if (stripos($target, $pattern) !== false) {
            status_header(403);
            wp_die(
                esc_html__('Access Denied: Security violation detected.', 'legal-insights'),
                esc_html__('403 Forbidden', 'legal-insights'),
                array('response' => 403)
            );
        }
    }
}
add_action('init', 'legal_insights_block_malicious_requests');

/**
 * 8. Prevent In-Dashboard File Editing
 * Removes the built-in theme/plugin code editor so compromised credentials cannot write PHP shells.
 */
function legal_insights_disable_theme_editor() {
    if (!defined('DISALLOW_FILE_EDIT')) {
        define('DISALLOW_FILE_EDIT', true);
    }
}
add_action('init', 'legal_insights_disable_theme_editor');
