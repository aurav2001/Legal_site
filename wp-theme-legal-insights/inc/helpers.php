<?php
/**
 * Helper functions for LexVanguard / Legal Insights Theme
 *
 * Provides centralized retrieval for theme options, fallback defaults,
 * and data formatters.
 *
 * @package Legal_Insights
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Retrieve a theme setting with graceful fallback
 *
 * Checks in order:
 * 1. WordPress Customizer (`get_theme_mod`)
 * 2. Theme Options panel (`get_option('legal_insights_theme_options')`)
 * 3. Default fallback value passed in argument
 *
 * @param string $key Option key
 * @param mixed $default Fallback value if option not set
 * @return mixed
 */
function legal_insights_get_option($key, $default = '') {
    // 1. Check Customizer theme_mod
    $mod = get_theme_mod($key);
    if ($mod !== false && $mod !== null && $mod !== '') {
        return $mod;
    }

    // 2. Check Theme Options admin page options array
    $options = get_option('legal_insights_theme_options');
    if (is_array($options) && isset($options[$key]) && $options[$key] !== '') {
        return $options[$key];
    }

    // 3. Fallback default
    return $default;
}

/**
 * Get Firm Name with optional HTML formatting for the gold accent
 *
 * @param bool $formatted Whether to format with <span> for gold text
 * @return string
 */
function legal_insights_get_firm_name($formatted = true) {
    $firm_name = legal_insights_get_option('firm_name', 'Malhotra & Co.');
    $gold_text = legal_insights_get_option('firm_name_gold', '& Co.');

    if (!$formatted || empty($gold_text)) {
        return esc_html($firm_name);
    }

    // If firm name contains the gold text, wrap it with span
    if (stripos($firm_name, $gold_text) !== false) {
        $pos = strripos($firm_name, $gold_text);
        $base = substr($firm_name, 0, $pos);
        $accent = substr($firm_name, $pos);
        return esc_html($base) . '<span>' . esc_html($accent) . '</span>';
    }

    return esc_html($firm_name);
}

/**
 * Get Firm Tagline / Subtitle
 *
 * @return string
 */
function legal_insights_get_firm_tagline() {
    $tagline = legal_insights_get_option('firm_tagline');
    if (!empty($tagline)) {
        return esc_html($tagline);
    }

    $site_desc = get_bloginfo('description');
    if (empty($site_desc) || stripos($site_desc, 'just another') !== false || stripos($site_desc, 'tastewp') !== false) {
        return 'Advocates &amp; Supreme Court Counsel';
    }

    return esc_html($site_desc);
}

/**
 * Render Page Content if non-empty (for pages with Gutenberg / Classic Editor content)
 *
 * @param string $wrapper_class Optional CSS class
 */
function legal_insights_render_page_content($wrapper_class = 'page-wp-content-sec') {
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $content = get_the_content();
            if (!empty(trim($content))) {
                echo '<section class="' . esc_attr($wrapper_class) . '" style="padding: 50px 0; background: #ffffff; border-bottom: 1px solid #eee8e2;">';
                echo '<div class="container-custom">';
                echo '<div class="entry-content" style="max-width: 980px; margin: 0 auto; font-size: 1.05rem; line-height: 1.85; color: #334155;">';
                the_content();
                echo '</div>';
                echo '</div>';
                echo '</section>';
            }
        }
        rewind_posts();
    }
}

