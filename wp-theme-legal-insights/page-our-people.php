<?php
/**
 * Template Name: Our People (AGL Style)
 *
 * Description: Law firm leadership, Senior Advocates, Partners & Associates directory.
 * Fully editable via WordPress Admin (Our Team / Lawyers Custom Post Type + Page Editor).
 *
 * @package Legal_Insights
 */

get_header();

// If page is edited with Elementor, render full-width content directly
if (function_exists('legal_insights_is_elementor_page') && legal_insights_is_elementor_page()) {
    echo '<main id="primary" class="site-main elementor-people-content" style="width: 100%;">';
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    echo '</main>';
    get_footer();
    return;
}

// Fallback leaders if CPT is not yet seeded
$fallback_leaders = array(
    array(
        'name'        => 'Chaitanya Malhotra',
        'title'       => 'Managing Partner, Advocate',
        'experience'  => 'Advocate, Supreme Court of India & Delhi High Court',
        'chambers'    => 'Supreme Court of India & Delhi High Court',
        'education'   => 'B.A. LL.B., Diploma in Intellectual Property Rights (IPR)',
        'expertise'   => 'Commercial Litigation, Domestic & Institutional Arbitration, Startup Advisory & Policy Compliance',
        'bio'         => 'Third-generation advocate at Malhotra & Co. Leading appellate representations, commercial dispute resolutions, contractual matters, and startup regulatory advisory before the Supreme Court of India, Delhi High Court, and arbitral tribunals.',
        'image'       => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=600&q=80',
        'linkedin'    => 'https://linkedin.com',
        'email'       => 'chaitanyamlegal@gmail.com'
    ),
    array(
        'name'        => 'Senior Appellate Counsel',
        'title'       => 'Senior Counsel - Supreme Court Litigation',
        'experience'  => 'Three Generations in Courtroom Practice',
        'chambers'    => 'Supreme Court of India Bar Chambers',
        'education'   => 'LL.B., Senior Advocate on Record (AOR)',
        'expertise'   => 'Constitutional Benches, Special Leave Petitions (SLPs), Civil Appeals & Review Mandates',
        'bio'         => 'Distinguished senior advocate carrying forward over five decades of appellate courtroom heritage, appearing in landmark constitutional, commercial, and property litigation across Indian High Courts and the Supreme Court.',
        'image'       => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
        'linkedin'    => 'https://linkedin.com',
        'email'       => 'chaitanyamlegal@gmail.com'
    )
);

// Query dynamic team members from WordPress database
$team_query = new WP_Query(array(
    'post_type'      => 'team_member',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
));
?>

<!-- Banner Section -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag">Chambers Leadership</div>
                <h1 class="bnr_heading"><?php the_title(); ?></h1>
                <p class="bnr_subtitle">
                    A formidable team of Senior Advocates, Partners, and Counsel combining forensic factual scrutiny with generational courtroom presence.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- People Directory Section -->
<section style="padding: 70px 0 100px 0; background: #fbfbfd;">
    <div class="container-custom">

        <div class="people-directory-grid">
            <?php 
            $p_idx = 0;
            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    $p_idx++;
                    $p_delay = ($p_idx % 2 == 1) ? 100 : 250;
                    $t_id       = get_the_ID();
                    $t_name     = get_the_title();
                    $t_title    = get_post_meta($t_id, '_team_designation', true);
                    $t_exp      = get_post_meta($t_id, '_team_experience', true);
                    $t_chambers = get_post_meta($t_id, '_team_chambers', true);
                    $t_edu      = get_post_meta($t_id, '_team_education', true);
                    $t_expert   = get_post_meta($t_id, '_team_expertise', true);
                    $t_email    = get_post_meta($t_id, '_team_email', true);
                    $t_linkedin = get_post_meta($t_id, '_team_linkedin', true);
                    $t_img      = has_post_thumbnail() ? get_the_post_thumbnail_url($t_id, 'large') : get_post_meta($t_id, '_team_image_url', true);
                    if (empty($t_img)) {
                        $t_img = 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=600&q=80';
                    }
            ?>
                <div class="leader-card-wrap" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($p_delay); ?>">
                    <div class="leader-card-header">
                        <div class="leader-card-img">
                            <img src="<?php echo esc_url($t_img); ?>" alt="<?php echo esc_attr($t_name); ?>">
                        </div>
                        <div class="leader-card-info">
                            <?php if (!empty($t_exp)) : ?>
                                <span class="leader-exp-badge"><?php echo esc_html($t_exp); ?></span>
                            <?php endif; ?>
                            <h2 class="leader-name"><?php echo esc_html($t_name); ?></h2>
                            <?php if (!empty($t_title)) : ?>
                                <div class="leader-title"><?php echo esc_html($t_title); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($t_chambers)) : ?>
                                <div class="leader-chambers"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-1px; margin-right:4px;"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg><?php echo esc_html($t_chambers); ?></div>
                            <?php endif; ?>
                            <div class="leader-socials">
                                <?php if (!empty($t_linkedin)) : ?>
                                    <a href="<?php echo esc_url($t_linkedin); ?>" target="_blank" rel="noopener noreferrer" title="LinkedIn">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($t_email)) : ?>
                                    <a href="mailto:<?php echo esc_attr($t_email); ?>" title="Email">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="leader-bio-body">
                        <div>
                            <p class="leader-bio-text"><?php echo get_the_content(); ?></p>
                            <?php if (!empty($t_expert)) : ?>
                                <div class="leader-practice-tag"><strong>Practice Areas: </strong><?php echo esc_html($t_expert); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($t_edu)) : ?>
                            <div class="leader-education-tag"><strong>Education: </strong><?php echo esc_html($t_edu); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="bggrdnt"></div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
                // Render fallback leaders
                foreach ($fallback_leaders as $leader) : 
                    $p_idx++;
                    $p_delay = ($p_idx % 2 == 1) ? 100 : 250;
            ?>
                <div class="leader-card-wrap" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($p_delay); ?>">
                    <div class="leader-card-header">
                        <div class="leader-card-img">
                            <img src="<?php echo esc_url($leader['image']); ?>" alt="<?php echo esc_attr($leader['name']); ?>">
                        </div>
                        <div class="leader-card-info">
                            <span class="leader-exp-badge"><?php echo esc_html($leader['experience']); ?></span>
                            <h2 class="leader-name"><?php echo esc_html($leader['name']); ?></h2>
                            <div class="leader-title"><?php echo esc_html($leader['title']); ?></div>
                            <div class="leader-chambers"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-1px; margin-right:4px;"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg><?php echo esc_html($leader['chambers']); ?></div>
                            <div class="leader-socials">
                                <a href="<?php echo esc_url($leader['linkedin']); ?>" target="_blank" rel="noopener noreferrer" title="LinkedIn">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                                </a>
                                <a href="mailto:<?php echo esc_attr($leader['email']); ?>" title="Email">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="leader-bio-body">
                        <div>
                            <p class="leader-bio-text"><?php echo esc_html($leader['bio']); ?></p>
                            <div class="leader-practice-tag"><strong>Practice Areas: </strong><?php echo esc_html($leader['expertise']); ?></div>
                        </div>
                        <div class="leader-education-tag"><strong>Education: </strong><?php echo esc_html($leader['education']); ?></div>
                    </div>
                    <div class="bggrdnt"></div>
                </div>
            <?php 
                endforeach;
            endif; 
            ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>
