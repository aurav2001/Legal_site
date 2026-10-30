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

<!-- Sub-Page Banner -->
<section class="about-mn">
    <div class="about-banner">
        <div class="bnrbx">
            <img class="img-fluid desktop-view" src="https://aglaw.in/wp-content/uploads/2024/09/Our-Awards.jpg" alt="Our Awards" onerror="this.src='https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=1600&q=80';">
        </div>
        <div class="bnr__cntnt">
            <div class="vrtclcntr_bx">
                <div class="vrtclcntr_bxinr">
                    <div class="container-custom">
                        <div class="about_banner_txt" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="bnr_heading"><?php the_title(); ?></h2>
                            <p class="bnr_para">
                                <strong>Celebrating Distinction</strong><br>
                                We have been nationally and internationally recognized for consistently providing top-notch legal representation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Render Content from WordPress Page Editor if present
if (function_exists('legal_insights_render_page_content')) {
    legal_insights_render_page_content();
}
?>

<!-- Awards Gallery Grid Section -->
<section class="paddingTop paddingBottom" style="background: var(--bg-light);">
    <div class="container-custom">
        
        <div class="row text-center mb-4" data-aos="fade-up">
            <div class="col-md-12">
                <div class="sub-badge" style="display:inline-block; margin-bottom: 12px; background: rgba(197, 160, 89, 0.12); color: var(--color-gold); font-size: 0.8rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 6px 16px; border-radius: 20px;">
                    Honours &amp; Accolades
                </div>
                <h2 class="headingFontBlk" style="margin-bottom: 16px;">National &amp; Global Recognitions</h2>
                <p class="headingParaBlk" style="max-width: 680px; margin: 0 auto;">
                    Year after year, leading ranking directories and legal publications acknowledge our relentless commitment to excellence before the Hon'ble Supreme Court and High Courts.
                </p>
            </div>
        </div>

        <!-- Awards Grid -->
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
                            <img src="<?php echo esc_url($a_img); ?>" alt="<?php the_title_attribute(); ?>" onerror="this.parentElement.innerHTML='<span style=\'font-size:2.5rem;\'>🏆</span>';">
                        <?php else : ?>
                            <span style="font-size: 2.5rem;">🏆</span>
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
                        <img src="https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-11.jpg" alt="India Business Law Journal" onerror="this.parentElement.innerHTML='<span style=\'font-size:2.5rem;\'>🏆</span>';">
                    </div>
                    <div class="award-year">2024</div>
                    <h3 class="award-title">India Business Law Journal</h3>
                    <p class="award-desc">Recognized as Top Tier Dispute Resolution Firm and Leading Supreme Court Practitioners.</p>
                </div>

                <div class="award-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="award-badge-img">
                        <img src="https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-15.jpg" alt="A-List Indian's Most Recommended Lawyers" onerror="this.parentElement.innerHTML='<span style=\'font-size:2.5rem;\'>⭐</span>';">
                    </div>
                    <div class="award-year">2024</div>
                    <h3 class="award-title">A-List Indian Lawyers</h3>
                    <p class="award-desc">Featured among India's Most Recommended Legal Minds.</p>
                </div>

                <div class="award-card" data-aos="fade-up" data-aos-delay="150">
                    <div class="award-badge-img">
                        <img src="https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-12.jpg" alt="The Lawyer Network">
                    </div>
                    <div class="award-year">2023 - 2024</div>
                    <h3 class="award-title">The Lawyer Network</h3>
                    <p class="award-desc">Annual Law Firm Awards winner for Commercial Litigation &amp; High-Stakes Arbitration.</p>
                </div>

                <div class="award-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="award-badge-img">
                        <img src="https://aglaw.in/wp-content/uploads/2024/09/AGL-Resize-16.jpg" alt="Award Winning Law Firm">
                    </div>
                    <div class="award-year">2023</div>
                    <h3 class="award-title">Award Winning Firm</h3>
                    <p class="award-desc">Excellence in Appellate Advocacy &amp; Insolvency Litigation across Indian Tribunals.</p>
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
            Discover how six decades of apex court experience can safeguard your commercial interests.
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
