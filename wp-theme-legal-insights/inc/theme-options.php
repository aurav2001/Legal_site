<?php
/**
 * Theme Options Panel & Customizer Integration
 *
 * Allows users to edit all site details (Firm Name, Hero Banner, Stats,
 * Contact, Socials, BCI Disclaimer) directly from WordPress Admin.
 *
 * @package Legal_Insights
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Theme Options Page under Appearance menu
 */
function legal_insights_add_theme_options_page() {
    add_theme_page(
        __('Theme Options & Content Settings', 'legal-insights'),
        __('Theme Options', 'legal-insights'),
        'edit_theme_options',
        'legal-insights-options',
        'legal_insights_render_theme_options_page'
    );
}
add_action('admin_menu', 'legal_insights_add_theme_options_page');

/**
 * Register Settings
 */
function legal_insights_register_settings() {
    register_setting('legal_insights_options_group', 'legal_insights_theme_options', 'legal_insights_sanitize_options');
}
add_action('admin_init', 'legal_insights_register_settings');

/**
 * Sanitize options input
 */
function legal_insights_sanitize_options($input) {
    if (!is_array($input)) {
        return array();
    }
    $sanitized = array();
    foreach ($input as $key => $value) {
        if ($key === 'bci_points' || $key === 'footer_desc' || $key === 'hero_description' || $key === 'welcome_description' || $key === 'strategic_quote') {
            $sanitized[$key] = wp_kses_post($value);
        } elseif (strpos($key, 'url') !== false || strpos($key, 'link') !== false || strpos($key, 'image') !== false || strpos($key, 'logo') !== false) {
            $sanitized[$key] = esc_url_raw($value);
        } elseif (strpos($key, 'email') !== false) {
            $sanitized[$key] = sanitize_email($value);
        } else {
            $sanitized[$key] = sanitize_text_field($value);
        }
    }
    return $sanitized;
}

/**
 * Enqueue Media Scripts and Admin Styles for Theme Options page
 */
function legal_insights_admin_scripts($hook) {
    if ($hook === 'appearance_page_legal-insights-options') {
        wp_enqueue_media();
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
    }
}
add_action('admin_enqueue_scripts', 'legal_insights_admin_scripts');

/**
 * Render Theme Options Page in WP Admin
 */
function legal_insights_render_theme_options_page() {
    if (!current_user_can('edit_theme_options')) {
        return;
    }

    // Default values
    $defaults = array(
        // General & Branding
        'firm_name'               => 'Malhotra & Co.',
        'firm_name_gold'          => '& Co.',
        'firm_tagline'            => 'Advocates & Supreme Court Counsel',
        'firm_logo'               => '',
        'header_consultation_text'=> 'Consultation',
        'header_consultation_link'=> '/contact-us/',

        // Homepage Hero
        'hero_tagline'            => 'MALHOTRA & CO. ADVOCATES & PARTNERS',
        'hero_title'              => 'With You In Every',
        'hero_title_highlight'    => 'Challenge',
        'hero_description'        => 'At Malhotra & Co., we deliver dedicated, personalized legal counsel and appellate advocacy across the Supreme Court of India, High Courts, and International Arbitration Tribunals.',
        'hero_btn1_text'          => 'Schedule Consultation',
        'hero_btn1_url'           => '/contact-us/',
        'hero_btn2_text'          => 'Our Practice Areas →',
        'hero_btn2_url'           => '/our-expertise/',
        'hero_image'              => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80',
        'hero_badge_num'          => '60+',
        'hero_badge_lbl'          => 'Years',

        // Welcome & Stats
        'welcome_subtag'          => 'Heritage • Excellence • Integrity',
        'welcome_title'           => 'Welcome to Malhotra & Co.',
        'welcome_description'     => 'Established with a storied tradition of courtroom excellence, Malhotra & Co. has grown into a leading full-service law firm serving major corporations, financial institutions, and high-net-worth clients across India.',
        'stat1_num'               => '1964',
        'stat1_lbl'               => 'Established',
        'stat2_num'               => '11',
        'stat2_lbl'               => 'Practice Areas',
        'stat3_num'               => '500+',
        'stat3_lbl'               => 'Landmark Cases',
        'strategic_title'         => 'Our Strategic Counsel',
        'strategic_quote'         => '"Combining forensic factual scrutiny with generational appellate advocacy to deliver exceptional legal outcomes."',
        'strategic_link_text'     => 'Read Our Full Story →',
        'strategic_link_url'      => '/about-us/',

        // Chambers & Contact
        'office_title'            => 'Our Office',
        'office_badge'            => 'Corporate Headquarters',
        'office_address'          => "Ground Floor, Mercantile House, 15, Kasturba Gandhi Marg, Connaught Place, New Delhi – 110001",
        'office_phone'            => '+91 11 4220 0000, +91 11 2335 4330',
        'office_email'            => 'contact@vanguardpartners.law',
        'office_maps_url'         => 'https://maps.google.com',

        'chambers_title'          => 'Our Court Chambers',
        'chambers_badge'          => 'Apex Court Desk',
        'chambers_address'        => "48 & 74, Lawyers' Chambers, Supreme Court of India, Tilak Marg, New Delhi – 110001",
        'chambers_phone'          => '+91 11 2338 2318, +91 11 2338 9629',
        'chambers_email'          => 'chambers@vanguardpartners.law',
        'chambers_maps_url'       => 'https://maps.google.com',

        // Footer & Socials
        'footer_desc'             => 'Premier Tier-1 full-service legal institution with nationwide courtroom advocacy before the Supreme Court of India, High Courts, and international arbitral seats.',
        'social_linkedin'         => 'https://linkedin.com',
        'social_youtube'          => 'https://youtube.com',
        'social_twitter'          => 'https://x.com',
        'social_instagram'        => '',
        'footer_copyright'        => 'Malhotra & Co. Advocates & Partners. All Rights Reserved.',

        // BCI Disclaimer
        'bci_enabled'             => 'yes',
        'bci_title'               => 'DISCLAIMER',
        'bci_subtitle'            => 'The Bar Council of India restricts advocates and law firms from advertising or soliciting work in any form. By accessing this website, the user acknowledges and confirms that:',
        'bci_points'              => "The user is accessing this portal voluntarily for their own information and knowledge, and there has been no solicitation, invitation, or inducement of any sort by the Firm or its members.\nThe content on this website is intended solely for general informational and educational purposes and does not constitute formal legal opinion or legal advice.\nAccessing or downloading materials from this website does not create or establish an advocate-client relationship between the Firm and the user.\nThe Firm expressly disclaims all liability for any actions taken or decisions made in reliance on any content available on this website.\nAll intellectual property and publication rights in the legal digests, commentaries, and research bulletins are reserved.",
        'bci_btn_text'            => 'I Accept & Proceed',
    );

    $saved_options = get_option('legal_insights_theme_options', array());
    $options = wp_parse_args($saved_options, $defaults);

    // Active tab
    $active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'branding';
    ?>
    <div class="wrap" style="max-width: 1100px; margin-top: 20px;">
        <h1 style="font-size: 1.8rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 10px;">
            <span>⚖️</span> <?php _e('LexVanguard — Law Firm Theme Options & CMS Settings', 'legal-insights'); ?>
        </h1>
        <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 25px;">
            <?php _e('Manage all textual content, hero banners, firm contact numbers, court chambers addresses, social links, and regulatory disclaimers without writing code.', 'legal-insights'); ?>
        </p>

        <?php settings_errors(); ?>

        <!-- Tab Navigation -->
        <h2 class="nav-tab-wrapper" style="margin-bottom: 25px;">
            <a href="?page=legal-insights-options&tab=branding" class="nav-tab <?php echo $active_tab === 'branding' ? 'nav-tab-active' : ''; ?>">
                🏛️ <?php _e('General & Branding', 'legal-insights'); ?>
            </a>
            <a href="?page=legal-insights-options&tab=hero" class="nav-tab <?php echo $active_tab === 'hero' ? 'nav-tab-active' : ''; ?>">
                🚀 <?php _e('Homepage Hero', 'legal-insights'); ?>
            </a>
            <a href="?page=legal-insights-options&tab=welcome" class="nav-tab <?php echo $active_tab === 'welcome' ? 'nav-tab-active' : ''; ?>">
                📊 <?php _e('Welcome & Stats', 'legal-insights'); ?>
            </a>
            <a href="?page=legal-insights-options&tab=contact" class="nav-tab <?php echo $active_tab === 'contact' ? 'nav-tab-active' : ''; ?>">
                📞 <?php _e('Chambers & Contact', 'legal-insights'); ?>
            </a>
            <a href="?page=legal-insights-options&tab=footer" class="nav-tab <?php echo $active_tab === 'footer' ? 'nav-tab-active' : ''; ?>">
                🌐 <?php _e('Footer & Socials', 'legal-insights'); ?>
            </a>
            <a href="?page=legal-insights-options&tab=disclaimer" class="nav-tab <?php echo $active_tab === 'disclaimer' ? 'nav-tab-active' : ''; ?>">
                ⚖️ <?php _e('BCI Disclaimer', 'legal-insights'); ?>
            </a>
        </h2>

        <form method="post" action="options.php" style="background: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
            <?php settings_fields('legal_insights_options_group'); ?>

            <!-- Retain values from all tabs via hidden inputs -->
            <?php foreach ($options as $k => $v) : ?>
                <input type="hidden" id="hidden_<?php echo esc_attr($k); ?>" name="legal_insights_theme_options[<?php echo esc_attr($k); ?>]" value="<?php echo esc_attr($v); ?>">
            <?php endforeach; ?>

            <!-- TAB 1: BRANDING -->
            <?php if ($active_tab === 'branding') : ?>
                <h3 style="border-bottom: 2px solid #c5a059; padding-bottom: 8px; color: #0b111e;"><?php _e('Firm Identity & Header Settings', 'legal-insights'); ?></h3>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="firm_name"><?php _e('Firm Name', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="firm_name" class="regular-text" data-sync="firm_name" value="<?php echo esc_attr($options['firm_name']); ?>">
                            <p class="description"><?php _e('Main law firm name (e.g. Malhotra & Co.)', 'legal-insights'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="firm_name_gold"><?php _e('Gold Highlight Portion of Name', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="firm_name_gold" class="regular-text" data-sync="firm_name_gold" value="<?php echo esc_attr($options['firm_name_gold']); ?>">
                            <p class="description"><?php _e('Text segment within firm name highlighted in regal gold (e.g. "& Co.")', 'legal-insights'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="firm_tagline"><?php _e('Firm Sub-Tagline', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="firm_tagline" class="regular-text" data-sync="firm_tagline" value="<?php echo esc_attr($options['firm_tagline']); ?>">
                            <p class="description"><?php _e('E.g. Advocates & Supreme Court Counsel', 'legal-insights'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="firm_logo"><?php _e('Custom Logo URL', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="firm_logo" class="regular-text" data-sync="firm_logo" value="<?php echo esc_url($options['firm_logo']); ?>">
                            <button type="button" class="button legal-media-upload-btn" data-target="firm_logo"><?php _e('Select / Upload Image', 'legal-insights'); ?></button>
                            <p class="description"><?php _e('Leave blank to use the luxury Scales of Justice SVG crest.', 'legal-insights'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="header_consultation_text"><?php _e('Header Button Text', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="header_consultation_text" class="regular-text" data-sync="header_consultation_text" value="<?php echo esc_attr($options['header_consultation_text']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="header_consultation_link"><?php _e('Header Button Link', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="header_consultation_link" class="regular-text" data-sync="header_consultation_link" value="<?php echo esc_attr($options['header_consultation_link']); ?>">
                        </td>
                    </tr>
                </table>
            <?php endif; ?>

            <!-- TAB 2: HERO -->
            <?php if ($active_tab === 'hero') : ?>
                <h3 style="border-bottom: 2px solid #c5a059; padding-bottom: 8px; color: #0b111e;"><?php _e('Homepage Hero Banner Settings', 'legal-insights'); ?></h3>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="hero_tagline"><?php _e('Small Tagline Above Heading', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="hero_tagline" class="large-text" data-sync="hero_tagline" value="<?php echo esc_attr($options['hero_tagline']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_title"><?php _e('Main Heading', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="hero_title" class="large-text" data-sync="hero_title" value="<?php echo esc_attr($options['hero_title']); ?>">
                            <p class="description"><?php _e('E.g. With You In Every', 'legal-insights'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_title_highlight"><?php _e('Highlighted Word in Heading', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="hero_title_highlight" class="regular-text" data-sync="hero_title_highlight" value="<?php echo esc_attr($options['hero_title_highlight']); ?>">
                            <p class="description"><?php _e('Word formatted with italic gold serif font (e.g. Challenge)', 'legal-insights'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_description"><?php _e('Hero Description Paragraph', 'legal-insights'); ?></label></th>
                        <td>
                            <textarea id="hero_description" rows="4" class="large-text" data-sync="hero_description"><?php echo esc_textarea($options['hero_description']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_btn1_text"><?php _e('Primary Button Text & Link', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="hero_btn1_text" class="regular-text" data-sync="hero_btn1_text" value="<?php echo esc_attr($options['hero_btn1_text']); ?>" placeholder="Text">
                            <input type="text" id="hero_btn1_url" class="regular-text" data-sync="hero_btn1_url" value="<?php echo esc_attr($options['hero_btn1_url']); ?>" placeholder="URL">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_btn2_text"><?php _e('Secondary Button Text & Link', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="hero_btn2_text" class="regular-text" data-sync="hero_btn2_text" value="<?php echo esc_attr($options['hero_btn2_text']); ?>" placeholder="Text">
                            <input type="text" id="hero_btn2_url" class="regular-text" data-sync="hero_btn2_url" value="<?php echo esc_attr($options['hero_btn2_url']); ?>" placeholder="URL">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_image"><?php _e('Hero Architectural Arch Image', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="hero_image" class="large-text" data-sync="hero_image" value="<?php echo esc_url($options['hero_image']); ?>">
                            <button type="button" class="button legal-media-upload-btn" data-target="hero_image"><?php _e('Upload / Select Media', 'legal-insights'); ?></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_badge_num"><?php _e('Floating Circular Badge', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="hero_badge_num" style="width: 100px;" data-sync="hero_badge_num" value="<?php echo esc_attr($options['hero_badge_num']); ?>" placeholder="60+">
                            <input type="text" id="hero_badge_lbl" style="width: 140px;" data-sync="hero_badge_lbl" value="<?php echo esc_attr($options['hero_badge_lbl']); ?>" placeholder="Years">
                        </td>
                    </tr>
                </table>
            <?php endif; ?>

            <!-- TAB 3: WELCOME & STATS -->
            <?php if ($active_tab === 'welcome') : ?>
                <h3 style="border-bottom: 2px solid #c5a059; padding-bottom: 8px; color: #0b111e;"><?php _e('Welcome Section & Chamber Statistics', 'legal-insights'); ?></h3>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="welcome_subtag"><?php _e('Welcome Subtag', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="welcome_subtag" class="regular-text" data-sync="welcome_subtag" value="<?php echo esc_attr($options['welcome_subtag']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="welcome_title"><?php _e('Welcome Title', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="welcome_title" class="large-text" data-sync="welcome_title" value="<?php echo esc_attr($options['welcome_title']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="welcome_description"><?php _e('Welcome Paragraph', 'legal-insights'); ?></label></th>
                        <td>
                            <textarea id="welcome_description" rows="4" class="large-text" data-sync="welcome_description"><?php echo esc_textarea($options['welcome_description']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Statistics Pills (Row of 3)', 'legal-insights'); ?></label></th>
                        <td>
                            <div style="display: flex; gap: 15px; margin-bottom: 10px;">
                                <div>
                                    <strong>Stat 1:</strong><br>
                                    <input type="text" id="stat1_num" style="width: 110px;" data-sync="stat1_num" value="<?php echo esc_attr($options['stat1_num']); ?>" placeholder="1964">
                                    <input type="text" id="stat1_lbl" style="width: 130px;" data-sync="stat1_lbl" value="<?php echo esc_attr($options['stat1_lbl']); ?>" placeholder="Established">
                                </div>
                                <div>
                                    <strong>Stat 2:</strong><br>
                                    <input type="text" id="stat2_num" style="width: 110px;" data-sync="stat2_num" value="<?php echo esc_attr($options['stat2_num']); ?>" placeholder="11">
                                    <input type="text" id="stat2_lbl" style="width: 130px;" data-sync="stat2_lbl" value="<?php echo esc_attr($options['stat2_lbl']); ?>" placeholder="Practice Areas">
                                </div>
                                <div>
                                    <strong>Stat 3:</strong><br>
                                    <input type="text" id="stat3_num" style="width: 110px;" data-sync="stat3_num" value="<?php echo esc_attr($options['stat3_num']); ?>" placeholder="500+">
                                    <input type="text" id="stat3_lbl" style="width: 130px;" data-sync="stat3_lbl" value="<?php echo esc_attr($options['stat3_lbl']); ?>" placeholder="Landmark Cases">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="strategic_quote"><?php _e('Strategic Counsel Quote Card', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="strategic_title" class="large-text" data-sync="strategic_title" value="<?php echo esc_attr($options['strategic_title']); ?>" placeholder="Card Title" style="margin-bottom: 8px;"><br>
                            <textarea id="strategic_quote" rows="3" class="large-text" data-sync="strategic_quote" placeholder="Quote Content"><?php echo esc_textarea($options['strategic_quote']); ?></textarea>
                            <div style="margin-top: 8px;">
                                <input type="text" id="strategic_link_text" class="regular-text" data-sync="strategic_link_text" value="<?php echo esc_attr($options['strategic_link_text']); ?>" placeholder="Button Text">
                                <input type="text" id="strategic_link_url" class="regular-text" data-sync="strategic_link_url" value="<?php echo esc_attr($options['strategic_link_url']); ?>" placeholder="Button Link">
                            </div>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>

            <!-- TAB 4: CHAMBERS & CONTACT -->
            <?php if ($active_tab === 'contact') : ?>
                <h3 style="border-bottom: 2px solid #c5a059; padding-bottom: 8px; color: #0b111e;"><?php _e('Chambers & Offices Contact Directory', 'legal-insights'); ?></h3>
                
                <h4 style="color: #c5a059; margin-top: 20px;">🏢 1. Corporate / Main Office</h4>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="office_title"><?php _e('Office Title & Badge', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="office_title" class="regular-text" data-sync="office_title" value="<?php echo esc_attr($options['office_title']); ?>" placeholder="Our Office">
                            <input type="text" id="office_badge" class="regular-text" data-sync="office_badge" value="<?php echo esc_attr($options['office_badge']); ?>" placeholder="Corporate Headquarters">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="office_address"><?php _e('Full Address', 'legal-insights'); ?></label></th>
                        <td>
                            <textarea id="office_address" rows="2" class="large-text" data-sync="office_address"><?php echo esc_textarea($options['office_address']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="office_phone"><?php _e('Telephone Numbers', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="office_phone" class="regular-text" data-sync="office_phone" value="<?php echo esc_attr($options['office_phone']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="office_email"><?php _e('Email Address', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="email" id="office_email" class="regular-text" data-sync="office_email" value="<?php echo esc_attr($options['office_email']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="office_maps_url"><?php _e('Google Maps URL', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="url" id="office_maps_url" class="large-text" data-sync="office_maps_url" value="<?php echo esc_url($options['office_maps_url']); ?>">
                        </td>
                    </tr>
                </table>

                <h4 style="color: #c5a059; margin-top: 30px;">⚖️ 2. Supreme Court Chambers</h4>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="chambers_title"><?php _e('Chambers Title & Badge', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="chambers_title" class="regular-text" data-sync="chambers_title" value="<?php echo esc_attr($options['chambers_title']); ?>" placeholder="Our Court Chambers">
                            <input type="text" id="chambers_badge" class="regular-text" data-sync="chambers_badge" value="<?php echo esc_attr($options['chambers_badge']); ?>" placeholder="Apex Court Desk">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="chambers_address"><?php _e('Full Chambers Address', 'legal-insights'); ?></label></th>
                        <td>
                            <textarea id="chambers_address" rows="2" class="large-text" data-sync="chambers_address"><?php echo esc_textarea($options['chambers_address']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="chambers_phone"><?php _e('Telephone Numbers', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="chambers_phone" class="regular-text" data-sync="chambers_phone" value="<?php echo esc_attr($options['chambers_phone']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="chambers_email"><?php _e('Email Address', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="email" id="chambers_email" class="regular-text" data-sync="chambers_email" value="<?php echo esc_attr($options['chambers_email']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="chambers_maps_url"><?php _e('Google Maps URL', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="url" id="chambers_maps_url" class="large-text" data-sync="chambers_maps_url" value="<?php echo esc_url($options['chambers_maps_url']); ?>">
                        </td>
                    </tr>
                </table>
            <?php endif; ?>

            <!-- TAB 5: FOOTER & SOCIALS -->
            <?php if ($active_tab === 'footer') : ?>
                <h3 style="border-bottom: 2px solid #c5a059; padding-bottom: 8px; color: #0b111e;"><?php _e('Footer & Social Links', 'legal-insights'); ?></h3>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="footer_desc"><?php _e('Footer Brief Description', 'legal-insights'); ?></label></th>
                        <td>
                            <textarea id="footer_desc" rows="3" class="large-text" data-sync="footer_desc"><?php echo esc_textarea($options['footer_desc']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="social_linkedin"><?php _e('LinkedIn URL', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="url" id="social_linkedin" class="large-text" data-sync="social_linkedin" value="<?php echo esc_url($options['social_linkedin']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="social_youtube"><?php _e('YouTube URL', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="url" id="social_youtube" class="large-text" data-sync="social_youtube" value="<?php echo esc_url($options['social_youtube']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="social_twitter"><?php _e('Twitter / X URL', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="url" id="social_twitter" class="large-text" data-sync="social_twitter" value="<?php echo esc_url($options['social_twitter']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="social_instagram"><?php _e('Instagram URL', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="url" id="social_instagram" class="large-text" data-sync="social_instagram" value="<?php echo esc_url($options['social_instagram']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="footer_copyright"><?php _e('Copyright Notice', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="footer_copyright" class="large-text" data-sync="footer_copyright" value="<?php echo esc_attr($options['footer_copyright']); ?>">
                            <p class="description"><?php _e('Year is prepended dynamically (e.g. © 2026 Malhotra & Co...)', 'legal-insights'); ?></p>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>

            <!-- TAB 6: BCI DISCLAIMER -->
            <?php if ($active_tab === 'disclaimer') : ?>
                <h3 style="border-bottom: 2px solid #c5a059; padding-bottom: 8px; color: #0b111e;"><?php _e('Bar Council of India Regulatory Disclaimer', 'legal-insights'); ?></h3>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="bci_enabled"><?php _e('Enable Disclaimer Modal', 'legal-insights'); ?></label></th>
                        <td>
                            <select id="bci_enabled" data-sync="bci_enabled">
                                <option value="yes" <?php selected($options['bci_enabled'], 'yes'); ?>><?php _e('Yes - Show Modal on First Visit', 'legal-insights'); ?></option>
                                <option value="no" <?php selected($options['bci_enabled'], 'no'); ?>><?php _e('No - Disable Disclaimer Modal', 'legal-insights'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="bci_title"><?php _e('Modal Title', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="bci_title" class="regular-text" data-sync="bci_title" value="<?php echo esc_attr($options['bci_title']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="bci_subtitle"><?php _e('Subtitle Notice', 'legal-insights'); ?></label></th>
                        <td>
                            <textarea id="bci_subtitle" rows="2" class="large-text" data-sync="bci_subtitle"><?php echo esc_textarea($options['bci_subtitle']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="bci_points"><?php _e('Disclaimer Bullet Points (1 per line)', 'legal-insights'); ?></label></th>
                        <td>
                            <textarea id="bci_points" rows="6" class="large-text" data-sync="bci_points"><?php echo esc_textarea($options['bci_points']); ?></textarea>
                            <p class="description"><?php _e('Each line will be displayed as a distinct regulatory bullet point in the modal.', 'legal-insights'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="bci_btn_text"><?php _e('Accept Button Text', 'legal-insights'); ?></label></th>
                        <td>
                            <input type="text" id="bci_btn_text" class="regular-text" data-sync="bci_btn_text" value="<?php echo esc_attr($options['bci_btn_text']); ?>">
                        </td>
                    </tr>
                </table>
            <?php endif; ?>

            <p class="submit" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between;">
                <input type="submit" name="submit" id="submit" class="button button-primary button-large" value="<?php esc_attr_e('Save Changes', 'legal-insights'); ?>" style="background: #c5a059; border-color: #b89146; font-size: 1rem; padding: 6px 24px; height: auto;">
                <span style="color: #64748b; font-size: 0.9rem;">
                    <?php _e('Changes reflect immediately across all pages.', 'legal-insights'); ?>
                </span>
            </p>
        </form>
    </div>

    <!-- Admin JS for syncing tab inputs and media uploader -->
    <script>
    jQuery(document).ready(function($) {
        // Sync visible tab inputs to hidden inputs before submit
        $('[data-sync]').on('input change', function() {
            var key = $(this).data('sync');
            $('#hidden_' + key).val($(this).val());
        });

        // WordPress Media Uploader
        $('.legal-media-upload-btn').on('click', function(e) {
            e.preventDefault();
            var targetId = $(this).data('target');
            var frame = wp.media({
                title: 'Select or Upload Law Firm Media',
                button: { text: 'Use this Media' },
                multiple: false
            });

            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#' + targetId).val(attachment.url).trigger('change');
            });

            frame.open();
        });
    });
    </script>
    <?php
}

/**
 * Register with WordPress Customizer (Appearance -> Customize)
 */
function legal_insights_customize_register($wp_customize) {
    // Section: Firm Identity
    $wp_customize->add_section('legal_firm_identity', array(
        'title'    => __('Law Firm Identity & Branding', 'legal-insights'),
        'priority' => 25,
    ));

    $wp_customize->add_setting('legal_insights_theme_options[firm_name]', array(
        'default'           => 'Malhotra & Co.',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('legal_firm_name', array(
        'label'    => __('Firm Name', 'legal-insights'),
        'section'  => 'legal_firm_identity',
        'settings' => 'legal_insights_theme_options[firm_name]',
    ));

    $wp_customize->add_setting('legal_insights_theme_options[firm_tagline]', array(
        'default'           => 'Advocates & Supreme Court Counsel',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('legal_firm_tagline', array(
        'label'    => __('Firm Tagline', 'legal-insights'),
        'section'  => 'legal_firm_identity',
        'settings' => 'legal_insights_theme_options[firm_tagline]',
    ));

    // Section: Hero Banner
    $wp_customize->add_section('legal_hero_section', array(
        'title'    => __('Homepage Hero Banner', 'legal-insights'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('legal_insights_theme_options[hero_title]', array(
        'default'           => 'With You In Every',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('legal_hero_title', array(
        'label'    => __('Hero Heading', 'legal-insights'),
        'section'  => 'legal_hero_section',
        'settings' => 'legal_insights_theme_options[hero_title]',
    ));

    $wp_customize->add_setting('legal_insights_theme_options[hero_title_highlight]', array(
        'default'           => 'Challenge',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('legal_hero_title_highlight', array(
        'label'    => __('Hero Highlight Word', 'legal-insights'),
        'section'  => 'legal_hero_section',
        'settings' => 'legal_insights_theme_options[hero_title_highlight]',
    ));

    $wp_customize->add_setting('legal_insights_theme_options[hero_description]', array(
        'default'           => 'At Malhotra & Co., we deliver dedicated, personalized legal counsel and appellate advocacy across the Supreme Court of India, High Courts, and International Arbitration Tribunals.',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('legal_hero_desc', array(
        'label'    => __('Hero Description', 'legal-insights'),
        'type'     => 'textarea',
        'section'  => 'legal_hero_section',
        'settings' => 'legal_insights_theme_options[hero_description]',
    ));
}
add_action('customize_register', 'legal_insights_customize_register');

