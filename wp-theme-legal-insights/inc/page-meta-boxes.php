<?php
/**
 * In-Page Meta Boxes for WordPress Page Editor
 *
 * Displays contextual setting boxes directly on page edit screens in WP Admin
 * (About Us, Contact Us, Practice Areas, Our Awards, Our People).
 *
 * @package Legal_Insights
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Meta Boxes for Pages
 *
 * @param string $post_type Current post type screen
 * @param WP_Post|null $post Current post object
 */
function legal_insights_register_page_meta_boxes($post_type, $post = null) {
    if ($post_type !== 'page') {
        return;
    }

    if (!($post instanceof WP_Post)) {
        global $post;
    }

    if (!($post instanceof WP_Post) || empty($post->ID)) {
        return;
    }

    $template = get_post_meta($post->ID, '_wp_page_template', true);
    $slug     = isset($post->post_name) ? $post->post_name : '';

    // About Us Page Meta Box
    if ($template === 'page-about-us.php' || $template === 'page-about.php' || $slug === 'about-us' || $slug === 'about') {
        add_meta_box(
            'legal_about_page_meta',
            __('About Us Page Custom Settings', 'legal-insights'),
            'legal_insights_render_about_page_meta_box',
            'page',
            'normal',
            'high'
        );
    }

    // Contact Us Page Meta Box
    if ($template === 'page-contact-us.php' || $template === 'page-contact.php' || $slug === 'contact-us' || $slug === 'contact') {
        add_meta_box(
            'legal_contact_page_meta',
            __('Contact Us Page — Office & Chambers Override', 'legal-insights'),
            'legal_insights_render_contact_page_meta_box',
            'page',
            'normal',
            'high'
        );
    }

    // Practice Detail Page Meta Box
    if ($template === 'page-practice-detail.php') {
        add_meta_box(
            'legal_practice_detail_page_meta',
            __('Practice Detail Page Custom Settings', 'legal-insights'),
            'legal_insights_render_practice_detail_meta_box',
            'page',
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'legal_insights_register_page_meta_boxes', 10, 2);


/**
 * Render About Page Meta Box
 */
function legal_insights_render_about_page_meta_box($post) {
    wp_nonce_field('legal_page_meta_nonce_action', 'legal_page_meta_nonce');

    $tagline   = get_post_meta($post->ID, '_about_tagline', true);
    $heritage_tag   = get_post_meta($post->ID, '_about_heritage_tag', true);
    $heritage_title = get_post_meta($post->ID, '_about_heritage_title', true);
    $heritage_text  = get_post_meta($post->ID, '_about_heritage_text', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="_about_tagline"><?php _e('Banner Tagline', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_about_tagline" name="_about_tagline" class="large-text" value="<?php echo esc_attr($tagline); ?>" placeholder="Institutional Heritage & Values">
            </td>
        </tr>
        <tr>
            <th><label for="_about_heritage_tag"><?php _e('Heritage Tag (Above Heading)', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_about_heritage_tag" name="_about_heritage_tag" class="regular-text" value="<?php echo esc_attr($heritage_tag); ?>" placeholder="Established In 1964">
            </td>
        </tr>
        <tr>
            <th><label for="_about_heritage_title"><?php _e('Heritage Section Heading', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_about_heritage_title" name="_about_heritage_title" class="large-text" value="<?php echo esc_attr($heritage_title); ?>" placeholder="Pioneering Legal Institutions with Supreme Court Chambers">
            </td>
        </tr>
        <tr>
            <th><label for="_about_heritage_text"><?php _e('Heritage Full Statement', 'legal-insights'); ?></label></th>
            <td>
                <textarea id="_about_heritage_text" name="_about_heritage_text" rows="4" class="large-text"><?php echo esc_textarea($heritage_text); ?></textarea>
            </td>
        </tr>
    </table>
    <p class="description"><?php _e('Any content written in the main WordPress editor above will also be displayed on the About Us page.', 'legal-insights'); ?></p>
    <?php
}

/**
 * Render Contact Page Meta Box
 */
function legal_insights_render_contact_page_meta_box($post) {
    wp_nonce_field('legal_page_meta_nonce_action', 'legal_page_meta_nonce');

    $tagline    = get_post_meta($post->ID, '_contact_tagline', true);
    $form_title = get_post_meta($post->ID, '_contact_form_title', true);
    $form_sub   = get_post_meta($post->ID, '_contact_form_sub', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="_contact_tagline"><?php _e('Banner Tagline', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_contact_tagline" name="_contact_tagline" class="large-text" value="<?php echo esc_attr($tagline); ?>" placeholder="Chambers Engagement">
            </td>
        </tr>
        <tr>
            <th><label for="_contact_form_title"><?php _e('Form Section Title', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_contact_form_title" name="_contact_form_title" class="large-text" value="<?php echo esc_attr($form_title); ?>" placeholder="Confidential Inquiries">
            </td>
        </tr>
        <tr>
            <th><label for="_contact_form_sub"><?php _e('Privilege Notice Under Form', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_contact_form_sub" name="_contact_form_sub" class="large-text" value="<?php echo esc_attr($form_sub); ?>" placeholder="All communications are covered by strict statutory advocate-client privilege.">
            </td>
        </tr>
    </table>
    <p class="description"><?php _e('Chambers address and phone numbers can also be globally edited in Appearance > Theme Options.', 'legal-insights'); ?></p>
    <?php
}

/**
 * Render Practice Detail Page Meta Box
 */
function legal_insights_render_practice_detail_meta_box($post) {
    wp_nonce_field('legal_page_meta_nonce_action', 'legal_page_meta_nonce');

    $badge      = get_post_meta($post->ID, '_practice_badge', true);
    $subheading = get_post_meta($post->ID, '_practice_subheading', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="_practice_badge"><?php _e('Domain Badge (Above Overview)', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_practice_badge" name="_practice_badge" class="regular-text" value="<?php echo esc_attr($badge); ?>" placeholder="Domain Expertise">
            </td>
        </tr>
        <tr>
            <th><label for="_practice_subheading"><?php _e('Section Subheading', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_practice_subheading" name="_practice_subheading" class="large-text" value="<?php echo esc_attr($subheading); ?>" placeholder="Overview & Strategic Approach">
            </td>
        </tr>
    </table>
    <p class="description"><?php _e('Enter the main practice text directly into the WordPress editor above.', 'legal-insights'); ?></p>
    <?php
}

/**
 * Save Page Meta Box Data
 */
function legal_insights_save_page_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!isset($_POST['legal_page_meta_nonce']) || !wp_verify_nonce($_POST['legal_page_meta_nonce'], 'legal_page_meta_nonce_action')) {
        return;
    }
    if (!current_user_can('edit_page', $post_id)) {
        return;
    }

    $fields = array(
        '_about_tagline', '_about_heritage_tag', '_about_heritage_title', '_about_heritage_text',
        '_contact_tagline', '_contact_form_title', '_contact_form_sub',
        '_practice_badge', '_practice_subheading'
    );

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            if ($field === '_about_heritage_text') {
                update_post_meta($post_id, $field, wp_kses_post($_POST[$field]));
            } else {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post_page', 'legal_insights_save_page_meta');

