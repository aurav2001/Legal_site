<?php
/**
 * Template Name: Our Awards
 *
 * Replicates the https://aglaw.in/our-awards/ page layout
 * Displays all prestigious national & international recognitions
 * with AOS scroll reveals and luxury architectural cards.
 *
 * Fully editable via WordPress Admin (Awards & Honors CPT + Page Editor).
 */

get_header();

// If page is edited with Elementor, render full-width content directly
if (function_exists('legal_insights_is_elementor_page') && legal_insights_is_elementor_page()) {
    echo '<main id="primary" class="site-main elementor-awards-content" style="width: 100%;">';
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    echo '</main>';
    get_footer();
    return;
}

// Query dynamic awards
$awards_query = new WP_Query(array(
    'post_type'      => 'award',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
));
?>

<!-- Sub-Page Banner: Centered, Majestic, and Symmetrical -->
<section class="about-mn text-center" style="padding: 95px 0 75px; background: linear-gradient(135deg, #090e18 0%, #111a2e 50%, #0d1527 100%); border-bottom: 1px solid rgba(197, 160, 89, 0.25);">
    <div class="container-custom">
        <div class="about_banner_txt text-center" style="max-width: 880px; margin: 0 auto; text-align: center;" data-aos="fade-up">
            <div class="bnr_tag" style="justify-content: center; display: inline-flex; margin-bottom: 16px; color: var(--color-gold); font-size: 0.85rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
                Benchmarked Honors &amp; Accolades
            </div>
            <h1 class="bnr_heading" style="font-size: clamp(2.3rem, 4.5vw, 3.4rem); font-family: var(--font-serif); margin-bottom: 20px; color: #ffffff; text-align: center; line-height: 1.2;">
                National &amp; Global Recognitions
            </h1>
            <p class="bnr_subtitle" style="font-size: 1.08rem; line-height: 1.85; color: #cbd5e1; max-width: 760px; margin: 0 auto; text-align: center;">
                Celebrating more than 50 years of practice and three generations in the legal profession. Recognized by leading ranking directories and legal publications for dedicated advocacy before the Hon'ble Supreme Court of India and High Courts.
            </p>
        </div>
    </div>
</section>

<!-- Awards Gallery Grid Section -->
<section style="background: var(--bg-light); padding: 75px 0 130px;">
    <div class="container-custom">
        
        <!-- Awards Grid: Equal Height 4-Column Luxury Cards -->
        <div class="awards-gallery-grid">
            <?php
            $a_idx = 0;
            if ($awards_query->have_posts()) :
                while ($awards_query->have_posts()) : $awards_query->the_post();
                    $a_idx++;
                    $a_id   = get_the_ID();
                    $a_year = get_post_meta($a_id, '_award_year', true);
                    $a_org  = get_post_meta($a_id, '_award_org', true);
                    $a_cat  = get_post_meta($a_id, '_award_cat', true);
                    $a_img  = has_post_thumbnail() ? get_the_post_thumbnail_url($a_id, 'medium') : get_post_meta($a_id, '_award_image_url', true);
            ?>
                <div class="award-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($a_idx * 50); ?>">
                    <div class="award-badge-img">
                        <?php if (!empty($a_img)) : ?>
                            <img src="<?php echo esc_url($a_img); ?>" alt="<?php the_title_attribute(); ?>" onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';">
                            <div class="award-vector-icon" style="display: none;">
                                <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#c5a059" stroke-width="1.8">
                                    <circle cx="12" cy="8" r="6"/>
                                    <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
                                </svg>
                            </div>
                        <?php else : ?>
                            <div class="award-vector-icon">
                                <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#c5a059" stroke-width="1.8">
                                    <circle cx="12" cy="8" r="6"/>
                                    <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($a_year)) : ?>
                        <div class="award-year"><?php echo esc_html($a_year); ?></div>
                    <?php endif; ?>
                    <h3 class="award-title"><?php the_title(); ?></h3>
                    <p class="award-desc"><?php echo get_the_content(); ?></p>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="award-card" data-aos="fade-up" data-aos-delay="50">
                    <div class="award-badge-img">
                        <img src="https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-11.jpg" alt="India Business Law Journal" onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';">
                        <div class="award-vector-icon" style="display: none;">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#c5a059" stroke-width="1.8"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                        </div>
                    </div>
                    <div class="award-year">2024</div>
                    <h3 class="award-title">India Business Law Journal</h3>
                    <p class="award-desc">Ranked as Tier 1 appellate courtroom dispute chamber for landmark Supreme Court representation.</p>
                </div>

                <div class="award-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="award-badge-img">
                        <img src="https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-12.jpg" alt="Chambers and Partners Global" onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';">
                        <div class="award-vector-icon" style="display: none;">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#c5a059" stroke-width="1.8"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                        </div>
                    </div>
                    <div class="award-year">2024</div>
                    <h3 class="award-title">Chambers Global</h3>
                    <p class="award-desc">Acknowledged internationally for excellence in high-stakes commercial dispute resolution and arbitration.</p>
                </div>

                <div class="award-card" data-aos="fade-up" data-aos-delay="150">
                    <div class="award-badge-img">
                        <img src="https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-13.jpg" alt="The Legal 500 Asia Pacific" onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';">
                        <div class="award-vector-icon" style="display: none;">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#c5a059" stroke-width="1.8"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                        </div>
                    </div>
                    <div class="award-year">2024</div>
                    <h3 class="award-title">The Legal 500</h3>
                    <p class="award-desc">Recommended counsel for complex appellate advocacy and regulatory litigation before High Courts.</p>
                </div>

                <div class="award-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="award-badge-img">
                        <img src="https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-14.jpg" alt="BW Legal World" onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';">
                        <div class="award-vector-icon" style="display: none;">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#c5a059" stroke-width="1.8"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                        </div>
                    </div>
                    <div class="award-year">2024</div>
                    <h3 class="award-title">BW Legal World</h3>
                    <p class="award-desc">Recognized for trail-blazing corporate restructuring, NCLAT proceedings, and dispute leadership.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- Call to Action Banner -->
<section style="background: #0e172a; padding: 70px 0; border-top: 1px solid rgba(197, 160, 89, 0.25);" data-aos="fade-up">
    <div class="container-custom text-center">
        <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: #ffffff; margin-bottom: 16px;">
            Trusted Representation for Your Crucial Legal Battles
        </h2>
        <p style="color: #94a3b8; max-width: 620px; margin: 0 auto 30px; font-size: 1.05rem;">
            Discover how more than 50 years and three generations of dedicated appellate advocacy can safeguard your commercial and legal interests.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="sub_filter_btn active" style="padding: 12px 28px; font-size: 0.95rem; background: linear-gradient(135deg, #c5a059 0%, #dfba73 50%, #b38b42 100%); color: #0b111e !important; font-weight: 700; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 4px 18px rgba(197, 160, 89, 0.35); border: 1px solid #dfba73;">
                Schedule Confidential Consultation
            </a>
            <a href="<?php echo esc_url(home_url('/insights/')); ?>" class="sub_filter_btn" style="padding: 12px 28px; font-size: 0.95rem; background: rgba(255, 255, 255, 0.08); color: #ffffff !important; border: 1.5px solid rgba(197, 160, 89, 0.6); border-radius: 6px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
                Explore Case Studies
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
