<?php
/**
 * Custom Post Types & Meta Boxes for LexVanguard
 *
 * Registers:
 * 1. `team_member`  — Law firm leadership, Senior Advocates, Partners & Associates
 * 2. `practice_area` — 11 Legal Practice Verticals & Core Pillars
 * 3. `award`         — Institutional Awards & Recognitions
 *
 * Includes automatic seeding to populate them immediately upon theme setup.
 *
 * @package Legal_Insights
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Types
 */
function legal_insights_register_cpts() {
    // 1. Team Members / Our People
    $labels_team = array(
        'name'               => __('Our Team', 'legal-insights'),
        'singular_name'      => __('Team Member', 'legal-insights'),
        'menu_name'          => __('Our Team / Lawyers', 'legal-insights'),
        'add_new'            => __('Add New Member', 'legal-insights'),
        'add_new_item'       => __('Add New Team Member / Advocate', 'legal-insights'),
        'edit_item'          => __('Edit Team Member', 'legal-insights'),
        'new_item'           => __('New Team Member', 'legal-insights'),
        'view_item'          => __('View Profile', 'legal-insights'),
        'search_items'       => __('Search Team Members', 'legal-insights'),
        'not_found'          => __('No team members found', 'legal-insights'),
        'not_found_in_trash' => __('No team members in trash', 'legal-insights'),
    );
    register_post_type('team_member', array(
        'labels'             => $labels_team,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'advocates'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-businessperson',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest'       => true,
    ));

    // 2. Practice Areas
    $labels_practice = array(
        'name'               => __('Practice Areas', 'legal-insights'),
        'singular_name'      => __('Practice Area', 'legal-insights'),
        'menu_name'          => __('Practice Areas', 'legal-insights'),
        'add_new'            => __('Add New Practice', 'legal-insights'),
        'add_new_item'       => __('Add New Legal Practice Area', 'legal-insights'),
        'edit_item'          => __('Edit Practice Area', 'legal-insights'),
        'new_item'           => __('New Practice Area', 'legal-insights'),
        'view_item'          => __('View Practice Area', 'legal-insights'),
        'search_items'       => __('Search Practice Areas', 'legal-insights'),
        'not_found'          => __('No practice areas found', 'legal-insights'),
        'not_found_in_trash' => __('No practice areas in trash', 'legal-insights'),
    );
    register_post_type('practice_area', array(
        'labels'             => $labels_practice,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'practice'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'show_in_rest'       => true,
    ));

    // 3. Awards
    $labels_awards = array(
        'name'               => __('Awards & Honors', 'legal-insights'),
        'singular_name'      => __('Award', 'legal-insights'),
        'menu_name'          => __('Awards & Honors', 'legal-insights'),
        'add_new'            => __('Add New Award', 'legal-insights'),
        'add_new_item'       => __('Add New Honor / Recognition', 'legal-insights'),
        'edit_item'          => __('Edit Award', 'legal-insights'),
        'new_item'           => __('New Award', 'legal-insights'),
        'view_item'          => __('View Award', 'legal-insights'),
        'search_items'       => __('Search Awards', 'legal-insights'),
        'not_found'          => __('No awards found', 'legal-insights'),
        'not_found_in_trash' => __('No awards in trash', 'legal-insights'),
    );
    register_post_type('award', array(
        'labels'             => $labels_awards,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'awards'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 22,
        'menu_icon'          => 'dashicons-awards',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest'       => true,
    ));
}
add_action('init', 'legal_insights_register_cpts', 0);

/**
 * Register Meta Boxes for CPTs
 */
function legal_insights_add_cpt_meta_boxes() {
    // Team Member Meta Box
    add_meta_box(
        'team_member_details',
        __('Advocate & Leadership Details', 'legal-insights'),
        'legal_insights_render_team_meta_box',
        'team_member',
        'normal',
        'high'
    );

    // Practice Area Meta Box
    add_meta_box(
        'practice_area_details',
        __('Practice Area Specifications & Landmark Cases', 'legal-insights'),
        'legal_insights_render_practice_meta_box',
        'practice_area',
        'normal',
        'high'
    );

    // Award Meta Box
    add_meta_box(
        'award_details',
        __('Award & Recognition Details', 'legal-insights'),
        'legal_insights_render_award_meta_box',
        'award',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'legal_insights_add_cpt_meta_boxes');

/**
 * Render Team Member Meta Box
 */
function legal_insights_render_team_meta_box($post) {
    wp_nonce_field('legal_team_meta_nonce_action', 'legal_team_meta_nonce');

    $designation = get_post_meta($post->ID, '_team_designation', true);
    $experience  = get_post_meta($post->ID, '_team_experience', true);
    $chambers    = get_post_meta($post->ID, '_team_chambers', true);
    $education   = get_post_meta($post->ID, '_team_education', true);
    $expertise   = get_post_meta($post->ID, '_team_expertise', true);
    $email       = get_post_meta($post->ID, '_team_email', true);
    $linkedin    = get_post_meta($post->ID, '_team_linkedin', true);
    $img_url     = get_post_meta($post->ID, '_team_image_url', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="_team_designation"><?php _e('Designation / Title *', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_team_designation" name="_team_designation" class="large-text" value="<?php echo esc_attr($designation); ?>" placeholder="e.g. Managing Partner & Senior Advocate">
            </td>
        </tr>
        <tr>
            <th><label for="_team_experience"><?php _e('Years of Experience', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_team_experience" name="_team_experience" class="regular-text" value="<?php echo esc_attr($experience); ?>" placeholder="e.g. 32 Years Experience">
            </td>
        </tr>
        <tr>
            <th><label for="_team_chambers"><?php _e('Chambers / Court Bar', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_team_chambers" name="_team_chambers" class="large-text" value="<?php echo esc_attr($chambers); ?>" placeholder="e.g. Supreme Court of India & Delhi High Court">
            </td>
        </tr>
        <tr>
            <th><label for="_team_education"><?php _e('Education & Credentials', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_team_education" name="_team_education" class="large-text" value="<?php echo esc_attr($education); ?>" placeholder="e.g. LL.B. (Campus Law Centre, DU), LL.M. (Harvard Law School)">
            </td>
        </tr>
        <tr>
            <th><label for="_team_expertise"><?php _e('Key Practice Verticals', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_team_expertise" name="_team_expertise" class="large-text" value="<?php echo esc_attr($expertise); ?>" placeholder="e.g. Supreme Court SLPs, Commercial Disputes, Telecom & Mining">
            </td>
        </tr>
        <tr>
            <th><label for="_team_email"><?php _e('Official Email', 'legal-insights'); ?></label></th>
            <td>
                <input type="email" id="_team_email" name="_team_email" class="regular-text" value="<?php echo esc_attr($email); ?>" placeholder="lawyer@chambers.law">
            </td>
        </tr>
        <tr>
            <th><label for="_team_linkedin"><?php _e('LinkedIn Profile URL', 'legal-insights'); ?></label></th>
            <td>
                <input type="url" id="_team_linkedin" name="_team_linkedin" class="large-text" value="<?php echo esc_url($linkedin); ?>" placeholder="https://linkedin.com/in/...">
            </td>
        </tr>
        <tr>
            <th><label for="_team_image_url"><?php _e('Photo URL (Fallback if no Featured Image)', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_team_image_url" name="_team_image_url" class="large-text" value="<?php echo esc_url($img_url); ?>" placeholder="https://...">
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Render Practice Area Meta Box
 */
function legal_insights_render_practice_meta_box($post) {
    wp_nonce_field('legal_practice_meta_nonce_action', 'legal_practice_meta_nonce');

    $pillar_tag   = get_post_meta($post->ID, '_practice_tag', true);
    $landmark     = get_post_meta($post->ID, '_practice_landmark_cases', true);
    $custom_url   = get_post_meta($post->ID, '_practice_custom_url', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="_practice_tag"><?php _e('Pillar / Tagline', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_practice_tag" name="_practice_tag" class="regular-text" value="<?php echo esc_attr($pillar_tag); ?>" placeholder="e.g. Pillar I or Specialized Vertical">
            </td>
        </tr>
        <tr>
            <th><label for="_practice_custom_url"><?php _e('Custom Page Link (Optional)', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_practice_custom_url" name="_practice_custom_url" class="large-text" value="<?php echo esc_attr($custom_url); ?>" placeholder="/our-expertise/arbitration/">
            </td>
        </tr>
        <tr>
            <th><label for="_practice_landmark_cases"><?php _e('Landmark Precedents / Citations', 'legal-insights'); ?></label></th>
            <td>
                <textarea id="_practice_landmark_cases" name="_practice_landmark_cases" rows="5" class="large-text" placeholder="e.g. Sukanya Holdings vs Jayesh H Pandya: Landmark Supreme Court ruling on arbitration non-signatories..."><?php echo esc_textarea($landmark); ?></textarea>
                <p class="description"><?php _e('Enter notable cases, judicial citations, and key precedents handled.', 'legal-insights'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Render Award Meta Box
 */
function legal_insights_render_award_meta_box($post) {
    wp_nonce_field('legal_award_meta_nonce_action', 'legal_award_meta_nonce');

    $year  = get_post_meta($post->ID, '_award_year', true);
    $org   = get_post_meta($post->ID, '_award_org', true);
    $cat   = get_post_meta($post->ID, '_award_cat', true);
    $img   = get_post_meta($post->ID, '_award_image_url', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="_award_year"><?php _e('Award Year *', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_award_year" name="_award_year" class="regular-text" value="<?php echo esc_attr($year); ?>" placeholder="e.g. 2024">
            </td>
        </tr>
        <tr>
            <th><label for="_award_org"><?php _e('Issuing Body / Ranking Directory', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_award_org" name="_award_org" class="large-text" value="<?php echo esc_attr($org); ?>" placeholder="e.g. Chambers Global, Legal 500, India Business Law Journal">
            </td>
        </tr>
        <tr>
            <th><label for="_award_cat"><?php _e('Category / Practice Distinction', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_award_cat" name="_award_cat" class="large-text" value="<?php echo esc_attr($cat); ?>" placeholder="e.g. Tier 1 Commercial Litigation Practice">
            </td>
        </tr>
        <tr>
            <th><label for="_award_image_url"><?php _e('Badge / Logo Image URL (Fallback)', 'legal-insights'); ?></label></th>
            <td>
                <input type="text" id="_award_image_url" name="_award_image_url" class="large-text" value="<?php echo esc_url($img); ?>">
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function legal_insights_save_cpt_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Team Member
    if (isset($_POST['legal_team_meta_nonce']) && wp_verify_nonce($_POST['legal_team_meta_nonce'], 'legal_team_meta_nonce_action')) {
        $fields = array('_team_designation', '_team_experience', '_team_chambers', '_team_education', '_team_expertise', '_team_email', '_team_linkedin', '_team_image_url');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // Save Practice Area
    if (isset($_POST['legal_practice_meta_nonce']) && wp_verify_nonce($_POST['legal_practice_meta_nonce'], 'legal_practice_meta_nonce_action')) {
        if (isset($_POST['_practice_tag'])) {
            update_post_meta($post_id, '_practice_tag', sanitize_text_field($_POST['_practice_tag']));
        }
        if (isset($_POST['_practice_custom_url'])) {
            update_post_meta($post_id, '_practice_custom_url', sanitize_text_field($_POST['_practice_custom_url']));
        }
        if (isset($_POST['_practice_landmark_cases'])) {
            update_post_meta($post_id, '_practice_landmark_cases', wp_kses_post($_POST['_practice_landmark_cases']));
        }
    }

    // Save Award
    if (isset($_POST['legal_award_meta_nonce']) && wp_verify_nonce($_POST['legal_award_meta_nonce'], 'legal_award_meta_nonce_action')) {
        $fields = array('_award_year', '_award_org', '_award_cat', '_award_image_url');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'legal_insights_save_cpt_meta');

/**
 * Automatic Seeding of CPTs (Team Members, Practice Areas, Awards)
 * Runs upon theme setup so the user has editable entries directly in WP Admin.
 */
function legal_insights_seed_cpts() {
    $seeded = get_option('legal_insights_cpts_seeded_v1');
    $force  = isset($_GET['seed_cpts']) && current_user_can('manage_options');

    if ($seeded && !$force) {
        return;
    }

    // 1. Seed Team Members if 0 exist
    $existing_team = get_posts(array('post_type' => 'team_member', 'posts_per_page' => 1));
    if (empty($existing_team) || $force) {
        $sample_team = array(
            array(
                'name'        => 'Rajeev Singhania',
                'title'       => 'Managing Partner & Senior Advocate',
                'experience'  => '32 Years Experience',
                'chambers'    => 'Supreme Court of India & Delhi High Court',
                'education'   => 'LL.B. (Campus Law Centre, DU), LL.M. (Harvard Law School)',
                'expertise'   => 'Supreme Court SLPs, Commercial Disputes, Constitutional Writs, Telecom & Mining',
                'bio'         => 'Third-generation advocate on record with over three decades of formidable courtroom appearances. Regularly represents sovereign entities, global tech giants, and infrastructure conglomerates in landmark constitution bench and appellate matters.',
                'image'       => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=600&q=80',
                'linkedin'    => 'https://linkedin.com',
                'email'       => 'singhania@vanguardpartners.law',
                'order'       => 1,
            ),
            array(
                'name'        => 'Arundhati Sengupta',
                'title'       => 'Senior Partner - International Arbitration & Disputes',
                'experience'  => '22 Years Experience',
                'chambers'    => 'Singapore & New Delhi',
                'education'   => 'B.A. LL.B. (WBNUJS Kolkata), BCL (University of Oxford)',
                'expertise'   => 'SIAC / ICC / LCIA Arbitrations, Cross-Border Enforcement, New York Convention',
                'bio'         => 'Dual-qualified disputes practitioner with extensive counsel experience across Singapore, London, and Indian arbitral seats. Serves on arbitral panels of SIAC and the Mumbai Centre for International Arbitration.',
                'image'       => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                'linkedin'    => 'https://linkedin.com',
                'email'       => 'arundhati@vanguardpartners.law',
                'order'       => 2,
            ),
            array(
                'name'        => 'Vikramaditya Shroff',
                'title'       => 'Partner - Corporate M&A & Private Equity',
                'experience'  => '20 Years Experience',
                'chambers'    => 'Mumbai & New Delhi',
                'education'   => 'B.Com, LL.B. (Government Law College, Mumbai), Solicitor (Bombay Incorporated Law Society)',
                'expertise'   => 'Cross-Border M&A, Private Equity, Schemes of Arrangement, SEBI Takeovers',
                'bio'         => 'Advises leading domestic conglomerates, private equity giants, and Fortune 500 multinationals on high-value public takeovers, demergers, and capital reductions under the Companies Act 2013 and NCLT jurisprudence.',
                'image'       => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                'linkedin'    => 'https://linkedin.com',
                'email'       => 'shroff@vanguardpartners.law',
                'order'       => 3,
            ),
            array(
                'name'        => 'Meenakshi Sundaram',
                'title'       => 'Senior Partner - Insolvency, Banking & Restructuring',
                'experience'  => '25 Years Experience',
                'chambers'    => 'Mumbai & Chennai',
                'education'   => 'M.A., LL.B. (Madras Law College), Insolvency Professional (IBBI)',
                'expertise'   => 'Insolvency & Bankruptcy Code (IBC), CIRP Strategy, Avoidance Litigation, NCLAT',
                'bio'         => 'Foremost authority on IBC jurisprudence in India. Represents lead banks, asset reconstruction companies (ARCs), and resolution applicants in multi-thousand crore distressed asset acquisitions and debt restructurings.',
                'image'       => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80',
                'linkedin'    => 'https://linkedin.com',
                'email'       => 'sundaram@vanguardpartners.law',
                'order'       => 4,
            ),
        );

        foreach ($sample_team as $t) {
            $existing_post = get_page_by_title($t['name'], OBJECT, 'team_member');
            if (!$existing_post) {
                $pid = wp_insert_post(array(
                    'post_title'   => $t['name'],
                    'post_content' => $t['bio'],
                    'post_status'  => 'publish',
                    'post_type'    => 'team_member',
                    'menu_order'   => $t['order'],
                ));
                if ($pid && !is_wp_error($pid)) {
                    update_post_meta($pid, '_team_designation', $t['title']);
                    update_post_meta($pid, '_team_experience', $t['experience']);
                    update_post_meta($pid, '_team_chambers', $t['chambers']);
                    update_post_meta($pid, '_team_education', $t['education']);
                    update_post_meta($pid, '_team_expertise', $t['expertise']);
                    update_post_meta($pid, '_team_email', $t['email']);
                    update_post_meta($pid, '_team_linkedin', $t['linkedin']);
                    update_post_meta($pid, '_team_image_url', $t['image']);
                }
            }
        }
    }

    // 2. Seed Awards if 0 exist
    $existing_awards = get_posts(array('post_type' => 'award', 'posts_per_page' => 1));
    if (empty($existing_awards) || $force) {
        $sample_awards = array(
            array(
                'title' => 'India Business Law Journal',
                'org'   => 'India Business Law Journal (IBLJ)',
                'year'  => '2024',
                'cat'   => 'Top Dispute Practice of the Year',
                'desc'  => 'Ranked as Tier 1 appellate courtroom dispute chamber for landmark Supreme Court representation.',
                'image' => 'https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-11.jpg',
                'order' => 1,
            ),
            array(
                'title' => 'Chambers Global',
                'org'   => 'Chambers and Partners Global',
                'year'  => '2024',
                'cat'   => 'Band 1 Dispute Resolution (India)',
                'desc'  => 'Acknowledged internationally for excellence in commercial dispute resolution and arbitration.',
                'image' => 'https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-12.jpg',
                'order' => 2,
            ),
            array(
                'title' => 'The Legal 500',
                'org'   => 'The Legal 500 Asia Pacific',
                'year'  => '2023',
                'cat'   => 'Leading Appellate Chambers',
                'desc'  => 'Recommended firm for complex regulatory litigation before TDSAT, APTEL, and High Courts.',
                'image' => 'https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-13.jpg',
                'order' => 3,
            ),
            array(
                'title' => 'BW Legal World',
                'org'   => 'BW Legal World 40 Under 40',
                'year'  => '2023',
                'cat'   => 'Dispute Resolution Firm of the Year',
                'desc'  => 'Recognized for trail-blazing corporate restructuring and insolvency representations before NCLAT.',
                'image' => 'https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-14.jpg',
                'order' => 4,
            ),
        );

        foreach ($sample_awards as $a) {
            $existing_post = get_page_by_title($a['title'], OBJECT, 'award');
            if (!$existing_post) {
                $pid = wp_insert_post(array(
                    'post_title'   => $a['title'],
                    'post_content' => $a['desc'],
                    'post_status'  => 'publish',
                    'post_type'    => 'award',
                    'menu_order'   => $a['order'],
                ));
                if ($pid && !is_wp_error($pid)) {
                    update_post_meta($pid, '_award_year', $a['year']);
                    update_post_meta($pid, '_award_org', $a['org']);
                    update_post_meta($pid, '_award_cat', $a['cat']);
                    update_post_meta($pid, '_award_image_url', $a['image']);
                }
            }
        }
    }

    update_option('legal_insights_cpts_seeded_v1', 1);
}
add_action('admin_init', 'legal_insights_seed_cpts');
add_action('after_switch_theme', 'legal_insights_seed_cpts');

