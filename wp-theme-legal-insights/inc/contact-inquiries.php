<?php
/**
 * In-House Client Inquiries & Privileged Intake System
 *
 * Features:
 * 1. Dedicated WP Admin CPT: "Client Inquiries / Leads"
 * 2. Custom Admin Columns (Client Name, Phone, Email, Jurisdiction, Urgency, Status)
 * 3. Inquiry Status Tracker (New, In Review, Contacted, Retained, Closed)
 * 4. Secure AJAX Endpoint for Consultation Form Submission
 * 5. Dual Automated Notifications (HTML Email to Chambers + Privileged Client Acknowledgment)
 * 6. Floating Emergency Chambers Hotline / WhatsApp Widget
 *
 * @package Legal_Insights
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Type: Client Inquiry
 */
function legal_insights_register_inquiries_cpt() {
    $labels = array(
        'name'               => __('Client Inquiries', 'legal-insights'),
        'singular_name'      => __('Client Inquiry', 'legal-insights'),
        'menu_name'          => __('Client Inquiries', 'legal-insights'),
        'all_items'          => __('All Inquiries', 'legal-insights'),
        'view_item'          => __('View Inquiry', 'legal-insights'),
        'search_items'       => __('Search Inquiries', 'legal-insights'),
        'not_found'          => __('No client inquiries found', 'legal-insights'),
        'not_found_in_trash' => __('No inquiries in trash', 'legal-insights'),
    );

    register_post_type('client_inquiry', array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-email-alt',
        'supports'           => array('title', 'editor'),
    ));
}
add_action('init', 'legal_insights_register_inquiries_cpt', 0);

/**
 * Custom Admin Columns for Client Inquiries
 */
function legal_insights_inquiry_columns($columns) {
    $new_columns = array(
        'cb'           => $columns['cb'],
        'title'        => __('Client & Mandate', 'legal-insights'),
        'inquiry_phone'=> __('Contact Phone', 'legal-insights'),
        'inquiry_email'=> __('Email Address', 'legal-insights'),
        'jurisdiction' => __('Practice Area', 'legal-insights'),
        'urgency'      => __('Urgency', 'legal-insights'),
        'status'       => __('Lead Status', 'legal-insights'),
        'date'         => __('Date Received', 'legal-insights'),
    );
    return $new_columns;
}
add_filter('manage_client_inquiry_posts_columns', 'legal_insights_inquiry_columns');

/**
 * Populate Custom Column Data
 */
function legal_insights_inquiry_column_data($column, $post_id) {
    switch ($column) {
        case 'inquiry_phone':
            $phone = get_post_meta($post_id, '_inquiry_phone', true);
            if (!empty($phone)) {
                echo '<a href="tel:' . esc_attr($phone) . '" style="font-weight:600;">' . esc_html($phone) . '</a>';
            } else {
                echo '—';
            }
            break;

        case 'inquiry_email':
            $email = get_post_meta($post_id, '_inquiry_email', true);
            if (!empty($email)) {
                echo '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
            } else {
                echo '—';
            }
            break;

        case 'jurisdiction':
            $jur = get_post_meta($post_id, '_inquiry_jurisdiction', true);
            echo !empty($jur) ? '<span class="badge" style="background:#f1f5f9; padding:4px 8px; border-radius:4px; font-weight:600; font-size:12px;">' . esc_html($jur) . '</span>' : '—';
            break;

        case 'urgency':
            $urg = get_post_meta($post_id, '_inquiry_urgency', true);
            if ($urg === 'Emergency (24-48 Hours)') {
                echo '<span style="color:#dc2626; font-weight:700;">🚨 ' . esc_html($urg) . '</span>';
            } elseif ($urg === 'High') {
                echo '<span style="color:#d97706; font-weight:600;">⚡ ' . esc_html($urg) . '</span>';
            } else {
                echo '<span style="color:#475569;">Normal</span>';
            }
            break;

        case 'status':
            $status = get_post_meta($post_id, '_inquiry_status', true);
            if (empty($status)) {
                $status = 'New';
            }
            $bg_color = '#e0f2fe';
            $txt_color = '#0369a1';
            if ($status === 'In Review') {
                $bg_color = '#fef3c7';
                $txt_color = '#92400e';
            } elseif ($status === 'Contacted') {
                $bg_color = '#ede9fe';
                $txt_color = '#6d28d9';
            } elseif ($status === 'Retained') {
                $bg_color = '#dcfce7';
                $txt_color = '#15803d';
            } elseif ($status === 'Closed') {
                $bg_color = '#f1f5f9';
                $txt_color = '#64748b';
            }
            echo '<span style="display:inline-block; padding:4px 10px; border-radius:12px; font-size:11px; font-weight:700; text-transform:uppercase; background:' . esc_attr($bg_color) . '; color:' . esc_attr($txt_color) . ';">' . esc_html($status) . '</span>';
            break;
    }
}
add_action('manage_client_inquiry_posts_custom_column', 'legal_insights_inquiry_column_data', 10, 2);

/**
 * Register Meta Box for Single Inquiry Detail View in WP Admin
 */
function legal_insights_add_inquiry_meta_box() {
    add_meta_box(
        'client_inquiry_details_box',
        __('Privileged Client Information & Mandate Details', 'legal-insights'),
        'legal_insights_render_inquiry_meta_box',
        'client_inquiry',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'legal_insights_add_inquiry_meta_box');

/**
 * Render Inquiry Meta Box in Admin
 */
function legal_insights_render_inquiry_meta_box($post) {
    wp_nonce_field('legal_save_inquiry_meta_nonce', 'legal_inquiry_meta_nonce');

    $name    = get_post_meta($post->ID, '_inquiry_name', true);
    $email   = get_post_meta($post->ID, '_inquiry_email', true);
    $phone   = get_post_meta($post->ID, '_inquiry_phone', true);
    $jur     = get_post_meta($post->ID, '_inquiry_jurisdiction', true);
    $forum   = get_post_meta($post->ID, '_inquiry_forum', true);
    $urgency = get_post_meta($post->ID, '_inquiry_urgency', true);
    $status  = get_post_meta($post->ID, '_inquiry_status', true);
    $ip      = get_post_meta($post->ID, '_inquiry_ip', true);

    if (empty($status)) {
        $status = 'New';
    }
    ?>
    <div style="padding: 10px 0;">
        <table class="form-table" style="margin-top:0;">
            <tr>
                <th style="width: 200px;"><strong>Client Full Name:</strong></th>
                <td><strong style="font-size: 1.15rem; color: #0b111e;"><?php echo esc_html($name ?: $post->post_title); ?></strong></td>
            </tr>
            <tr>
                <th><strong>Official Email:</strong></th>
                <td><a href="mailto:<?php echo esc_attr($email); ?>" style="font-size: 1.05rem;"><?php echo esc_html($email); ?></a></td>
            </tr>
            <tr>
                <th><strong>Telephone Contact:</strong></th>
                <td><a href="tel:<?php echo esc_attr($phone); ?>" style="font-size: 1.05rem; font-weight: 600; color: #b89146;"><?php echo esc_html($phone); ?></a></td>
            </tr>
            <tr>
                <th><strong>Practice Jurisdiction:</strong></th>
                <td><span style="background: #e2e8f0; padding: 4px 10px; border-radius: 4px; font-weight: 600;"><?php echo esc_html($jur); ?></span></td>
            </tr>
            <tr>
                <th><strong>Target Judicial Forum:</strong></th>
                <td><?php echo esc_html($forum ?: 'Supreme Court of India / High Courts'); ?></td>
            </tr>
            <tr>
                <th><strong>Urgency Level:</strong></th>
                <td>
                    <?php if ($urgency === 'Emergency (24-48 Hours)') : ?>
                        <span style="color: #dc2626; font-weight: 700; font-size: 1rem;">🚨 <?php echo esc_html($urgency); ?></span>
                    <?php else : ?>
                        <span><?php echo esc_html($urgency ?: 'Normal'); ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th><strong>Inquiry Processing Status:</strong></th>
                <td>
                    <select name="_inquiry_status" id="_inquiry_status" style="font-size: 0.95rem; padding: 4px 12px; font-weight: 600;">
                        <option value="New" <?php selected($status, 'New'); ?>>🔵 New Lead</option>
                        <option value="In Review" <?php selected($status, 'In Review'); ?>>🟡 In Review by Counsel</option>
                        <option value="Contacted" <?php selected($status, 'Contacted'); ?>>🟣 Contacted Client</option>
                        <option value="Retained" <?php selected($status, 'Retained'); ?>>🟢 Retained / Client Engaged</option>
                        <option value="Closed" <?php selected($status, 'Closed'); ?>>⚪ Closed / Resolved</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><strong>Client IP Address:</strong></th>
                <td style="color: #94a3b8; font-family: monospace;"><?php echo esc_html($ip ?: 'N/A'); ?></td>
            </tr>
        </table>

        <div style="margin-top: 25px; padding: 20px; background: #fbfbfd; border: 1px solid #e2e8f0; border-radius: 8px;">
            <h3 style="margin-top: 0; color: #0b111e; font-size: 1.1rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px;">
                📜 Legal Mandate Statement &amp; Case Notes
            </h3>
            <div style="font-size: 1.05rem; line-height: 1.8; color: #334155; white-space: pre-line;">
                <?php echo esc_html($post->post_content); ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Save Inquiry Status Meta Box
 */
function legal_insights_save_inquiry_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!isset($_POST['legal_inquiry_meta_nonce']) || !wp_verify_nonce($_POST['legal_inquiry_meta_nonce'], 'legal_save_inquiry_meta_nonce')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['_inquiry_status'])) {
        update_post_meta($post_id, '_inquiry_status', sanitize_text_field($_POST['_inquiry_status']));
    }
}
add_action('save_post_client_inquiry', 'legal_insights_save_inquiry_meta');

/**
 * AJAX Endpoint: Handle Confidential Inquiry Submission
 */
function legal_insights_handle_ajax_inquiry() {
    // 1. Verify Nonce
    if (!check_ajax_referer('legal_inquiry_nonce_action', 'nonce', false)) {
        wp_send_json_error(array('message' => __('Security verification failed. Please reload the page and try again.', 'legal-insights')));
        return;
    }

    // 2. Anti-Bot Honeypot Defense
    if (!empty($_POST['legal_fax_verify'])) {
        // Silent rejection for automated bot scrapers
        wp_send_json_success(array('message' => __('Inquiry received.', 'legal-insights')));
        return;
    }

    // 3. IP Flood & Rate-Limiting Protection (Max 4 submissions per 10 minutes per IP)
    $ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field($_SERVER['REMOTE_ADDR']) : '0.0.0.0';
    $rate_transient = 'legal_inq_rate_' . md5($ip);
    $attempts = (int) get_transient($rate_transient);

    if ($attempts >= 4) {
        wp_send_json_error(array('message' => __('High submission volume detected from your network. Please wait a few minutes before submitting again or call our chambers directly.', 'legal-insights')));
        return;
    }
    set_transient($rate_transient, $attempts + 1, 10 * MINUTE_IN_SECONDS);

    // 4. Sanitize Inputs & Boundary Checks
    $name    = isset($_POST['client_name']) ? sanitize_text_field(substr($_POST['client_name'], 0, 100)) : '';
    $email   = isset($_POST['client_email']) ? sanitize_email(substr($_POST['client_email'], 0, 100)) : '';
    $phone   = isset($_POST['client_phone']) ? sanitize_text_field(substr($_POST['client_phone'], 0, 30)) : '';
    $jur     = isset($_POST['practice_jurisdiction']) ? sanitize_text_field(substr($_POST['practice_jurisdiction'], 0, 100)) : 'General Commercial Dispute';
    $forum   = isset($_POST['court_forum']) ? sanitize_text_field(substr($_POST['court_forum'], 0, 100)) : 'Supreme Court of India';
    $urgency = isset($_POST['urgency_level']) ? sanitize_text_field(substr($_POST['urgency_level'], 0, 50)) : 'Normal';
    $mandate = isset($_POST['legal_mandate']) ? sanitize_textarea_field(substr($_POST['legal_mandate'], 0, 5000)) : '';

    // Validate Required Fields
    if (empty($name) || empty($email) || empty($phone) || empty($mandate)) {
        wp_send_json_error(array('message' => __('Please complete all mandatory fields marked with an asterisk (*).', 'legal-insights')));
        return;
    }

    if (!is_email($email)) {
        wp_send_json_error(array('message' => __('Please enter a valid email address.', 'legal-insights')));
        return;
    }

    // 5. Save to Database as `client_inquiry` post
    $post_title = $name . ' — ' . $jur;
    $inquiry_id = wp_insert_post(array(
        'post_title'   => $post_title,
        'post_content' => $mandate,
        'post_status'  => 'publish',
        'post_type'    => 'client_inquiry',
        'post_author'  => 1,
    ));

    if (is_wp_error($inquiry_id) || !$inquiry_id) {
        wp_send_json_error(array('message' => __('Unable to transmit inquiry. Please contact our chambers directly via phone.', 'legal-insights')));
        return;
    }

    // Save Meta Data
    update_post_meta($inquiry_id, '_inquiry_name', $name);
    update_post_meta($inquiry_id, '_inquiry_email', $email);
    update_post_meta($inquiry_id, '_inquiry_phone', $phone);
    update_post_meta($inquiry_id, '_inquiry_jurisdiction', $jur);
    update_post_meta($inquiry_id, '_inquiry_forum', $forum);
    update_post_meta($inquiry_id, '_inquiry_urgency', $urgency);
    update_post_meta($inquiry_id, '_inquiry_status', 'New');
    update_post_meta($inquiry_id, '_inquiry_ip', $ip);

    // 4. Send Email 1: Notification to Law Firm
    $firm_name  = function_exists('legal_insights_get_firm_name') ? legal_insights_get_firm_name(false) : 'Malhotra & Co.';
    $firm_email = function_exists('legal_insights_get_option') ? legal_insights_get_option('inquiry_notification_email', '') : '';
    if (empty($firm_email)) {
        $firm_email = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_email', get_option('admin_email')) : get_option('admin_email');
    }
    if (empty($firm_email)) {
        $firm_email = get_option('admin_email');
    }

    $firm_subject = sprintf('[Privileged Inquiry] %s - %s (%s)', $name, $jur, $urgency);

    $firm_html = '
    <div style="font-family: Arial, sans-serif; max-width: 650px; margin: 0 auto; background: #0b111e; color: #ffffff; padding: 30px; border-radius: 8px;">
        <div style="border-bottom: 2px solid #c5a059; padding-bottom: 15px; margin-bottom: 25px;">
            <h2 style="color: #c5a059; margin: 0 0 5px 0; font-size: 20px;">⚖️ NEW CONFIDENTIAL CLIENT INQUIRY</h2>
            <p style="color: #94a3b8; margin: 0; font-size: 13px;">Subject to Statutory Advocate-Client Privilege</p>
        </div>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px; color: #e2e8f0; font-size: 14px;">
            <tr><td style="padding: 8px 0; width: 160px; color: #94a3b8;">Client Full Name:</td><td style="font-weight: bold; font-size: 15px; color: #ffffff;">' . esc_html($name) . '</td></tr>
            <tr><td style="padding: 8px 0; color: #94a3b8;">Official Email:</td><td><a href="mailto:' . esc_attr($email) . '" style="color: #c5a059;">' . esc_html($email) . '</a></td></tr>
            <tr><td style="padding: 8px 0; color: #94a3b8;">Telephone Contact:</td><td><a href="tel:' . esc_attr($phone) . '" style="color: #c5a059; font-weight: bold;">' . esc_html($phone) . '</a></td></tr>
            <tr><td style="padding: 8px 0; color: #94a3b8;">Practice Jurisdiction:</td><td>' . esc_html($jur) . '</td></tr>
            <tr><td style="padding: 8px 0; color: #94a3b8;">Target Judicial Forum:</td><td>' . esc_html($forum) . '</td></tr>
            <tr><td style="padding: 8px 0; color: #94a3b8;">Urgency Level:</td><td style="color: #f59e0b; font-weight: bold;">' . esc_html($urgency) . '</td></tr>
        </table>
        <div style="background: #111a2e; border: 1px solid rgba(197,160,89,0.3); border-radius: 6px; padding: 20px; margin-bottom: 25px;">
            <h3 style="color: #c5a059; margin-top: 0; font-size: 15px;">Mandate Outline:</h3>
            <p style="margin: 0; line-height: 1.7; color: #f1f5f9; white-space: pre-line;">' . esc_html($mandate) . '</p>
        </div>
        <div style="text-align: center;">
            <a href="' . esc_url(admin_url('post.php?post=' . $inquiry_id . '&action=edit')) . '" style="display: inline-block; background: #c5a059; color: #0b111e; font-weight: bold; padding: 12px 28px; text-decoration: none; border-radius: 5px;">View in Chambers Admin ➔</a>
        </div>
    </div>';

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );

    @wp_mail($firm_email, $firm_subject, $firm_html, $headers);

    // 5. Send Email 2: Acknowledgment to Prospective Client
    $client_subject = sprintf('Privileged Inquiry Received - %s Advocates & Partners', $firm_name);
    $client_html = '
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background: #ffffff; color: #334155; padding: 32px; border: 1px solid #e2e8f0; border-radius: 8px;">
        <div style="border-bottom: 2px solid #c5a059; padding-bottom: 15px; margin-bottom: 20px;">
            <h2 style="color: #0b111e; margin: 0 0 5px 0;">' . esc_html($firm_name) . '</h2>
            <p style="color: #b89146; margin: 0; font-size: 13px; font-weight: bold; text-transform: uppercase;">Supreme Court Advocates &amp; Appellate Counsel</p>
        </div>
        <p style="font-size: 15px; line-height: 1.7;">Dear <strong>' . esc_html($name) . '</strong>,</p>
        <p style="font-size: 15px; line-height: 1.7;">Thank you for reaching out to our Chambers. We have received your confidential legal inquiry regarding <strong>' . esc_html($jur) . '</strong>.</p>
        <p style="font-size: 14px; line-height: 1.7; background: #fbfbfd; border-left: 3px solid #c5a059; padding: 12px 16px; margin: 20px 0;">
            <strong>Confidentiality Notice:</strong> All communications transmitted through our intake channels are strictly covered under statutory advocate-client privilege pursuant to the Indian Evidence Act and Bar Council of India guidelines.
        </p>
        <p style="font-size: 15px; line-height: 1.7;">Our designated Senior Counsel and practice team will review your mandate and contact you within 24 hours.</p>
        <p style="font-size: 15px; line-height: 1.7; margin-top: 25px;">Sincerely,<br><strong>Senior Registry Desk</strong><br>' . esc_html($firm_name) . '</p>
    </div>';

    $client_headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $firm_name . ' <' . $firm_email . '>',
    );

    @wp_mail($email, $client_subject, $client_html, $client_headers);

    // 6. Return Success Response
    wp_send_json_success(array(
        'message' => __('Your confidential inquiry has been privileged and successfully transmitted to our Senior Registry. Our designated counsel will contact you shortly.', 'legal-insights'),
        'inquiry_id' => $inquiry_id,
    ));
}
add_action('wp_ajax_legal_submit_inquiry', 'legal_insights_handle_ajax_inquiry');
add_action('wp_ajax_nopriv_legal_submit_inquiry', 'legal_insights_handle_ajax_inquiry');

/**
 * Render Floating Emergency Helpline & WhatsApp Button
 */
function legal_insights_render_floating_helpline() {
    $enabled = function_exists('legal_insights_get_option') ? legal_insights_get_option('enable_whatsapp_hotline', 'yes') : 'yes';
    if ($enabled === 'no') {
        return;
    }

    $phone_num = function_exists('legal_insights_get_option') ? legal_insights_get_option('office_phone', '+911142200000') : '+911142200000';
    $clean_phone = preg_replace('/[^0-9]/', '', $phone_num);
    $wa_url = 'https://wa.me/' . $clean_phone . '?text=' . rawurlencode('Hello Chambers Registry, I need urgent legal guidance regarding a High Court / Supreme Court matter.');
    ?>
    <!-- Floating Emergency Legal Desk Pill -->
    <aside class="floating-legal-hotline" aria-label="Emergency Legal Hotline" style="position: fixed; bottom: 25px; right: 25px; z-index: 9999; display: flex; align-items: center; gap: 10px;">
        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" style="background: linear-gradient(135deg, #0b111e 0%, #1e293b 100%); color: #ffffff; padding: 12px 20px; border-radius: 50px; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); border: 1.5px solid #c5a059; transition: all 0.3s ease; font-size: 0.88rem; font-weight: 600;">
            <span style="display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; background: #25D366; border-radius: 50%; color: #fff;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.45 0-2.87-.38-4.12-1.11l-.3-.17-3.12.82.83-3.04-.19-.31a8.2 8.2 0 0 1-1.26-4.43c0-4.54 3.69-8.24 8.24-8.24m4.53 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.25-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.12-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.12-.56-1.35-.77-1.85-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.12.17 1.78 2.72 4.31 3.81.6.26 1.07.42 1.44.53.61.2 1.16.17 1.6.11.49-.07 1.47-.6 1.68-1.18.2-.59.2-1.09.14-1.19-.05-.12-.21-.18-.46-.3Z"/></svg>
            </span>
            <span>Chambers Hotline</span>
        </a>
    </aside>
    <?php
}
add_action('wp_footer', 'legal_insights_render_floating_helpline');
