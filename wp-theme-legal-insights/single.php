<?php
/**
 * The template for displaying all single posts
 *
 * @package Legal_Insights
 */

get_header();

$categories = get_the_category();
$primary_cat = !empty($categories) ? $categories[0] : null;
$reading_time = function_exists('legal_insights_reading_time') ? legal_insights_reading_time() : '5 min read';
?>

<!-- Single Article Main Section (.intr_mn.blg_mn like aglaw.in) -->
<section class="intr_mn blg_mn">
    <div class="container-custom">
        <div class="row">

            <!-- Main Content Area (8 Columns) -->
            <div class="col-8 blg_lft" data-aos="fade-up">
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Breadcrumbs -->
                    <div class="breadcrumbs-trail">
                        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                        <span class="separator">/</span>
                        <a href="<?php echo esc_url(home_url('/insights/')); ?>">Insights</a>
                        <?php if ($primary_cat) : ?>
                            <span class="separator">/</span>
                            <a href="<?php echo esc_url(add_query_arg('type', $primary_cat->slug, home_url('/insights/'))); ?>">
                                <?php echo esc_html($primary_cat->name); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- Article Title -->
                    <h1 class="blgs_hd"><?php the_title(); ?></h1>

                    <!-- Article Meta Details -->
                    <div class="single-post-meta">
                        <?php if ($primary_cat) : ?>
                            <span class="meta-category"><?php echo esc_html($primary_cat->name); ?></span>
                        <?php endif; ?>
                        
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <span><?php echo get_the_date('jS F Y'); ?></span>
                        </div>

                        <div style="display: flex; align-items: center; gap: 6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                            <span><?php echo esc_html($reading_time); ?></span>
                        </div>

                        <div style="display: flex; align-items: center; gap: 6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <span>By <?php the_author(); ?></span>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="insights_imgbx">
                            <?php the_post_thumbnail('insight-single'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Key Takeaway Box -->
                    <?php if (has_excerpt()) : ?>
                        <div class="key-takeaway-box">
                            <h4>Key Regulatory Takeaway</h4>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    <?php endif; ?>

                    <!-- Post Body Content -->
                    <div class="intr_cnt">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'legal-insights'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <!-- Social Share Bar -->
                    <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 24px; margin-top: 40px; border-top: 1px solid #f1f5f9;">
                        <div style="font-size: 0.88rem; font-weight: 700; color: var(--color-dark); text-transform: uppercase;">Share This Insight:</div>
                        <div style="display: flex; gap: 10px;">
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" style="width: 38px; height: 38px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #475569;" title="Share on LinkedIn">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" style="width: 38px; height: 38px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #475569;" title="Share on X">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                            </a>
                            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" target="_blank" rel="noopener noreferrer" style="width: 38px; height: 38px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #475569;" title="Share on WhatsApp">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                            </a>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

            <!-- Related Posts Sidebar (4 Columns like aglaw.in .blg_rgt) -->
            <div class="col-4 blg_rgt" data-aos="fade-left" data-aos-delay="200">
                <div class="sidebar-inner">
                    <h2 class="intr_hdg2 headingFontBlk blgs_hd">Related Posts</h2>
                    
                    <div class="rltd_post_lst_outr">
                        <ul class="rltd_post_lst">
                            <?php
                            $related_args = array(
                                'post_type'      => 'post',
                                'posts_per_page' => 3,
                                'post__not_in'   => array(get_the_ID()),
                                'orderby'        => 'rand',
                            );

                            if ($primary_cat) {
                                $related_args['cat'] = $primary_cat->term_id;
                            }

                            $related_query = new WP_Query($related_args);

                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post();
                                    $rel_thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'insight-card') : 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=600&q=80';
                            ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="rltd__post_img">
                                                <img src="<?php echo esc_url($rel_thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                                            </div>
                                            <div class="rltd_post_content">
                                                <h4 class="intr_hdng6"><?php the_title(); ?></h4>
                                                <p style="font-size: 0.84rem; color: #64748b; line-height: 1.5; margin-bottom: 8px;"><?php echo wp_trim_words(get_the_excerpt(), 14, '...'); ?></p>
                                                <div style="font-size: 0.76rem; color: #9d9894;"><?php echo get_the_date('jS F Y'); ?></div>
                                            </div>
                                        </a>
                                    </li>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                            ?>
                                <li>
                                    <div class="rltd_post_content">
                                        <p style="color: #94a3b8; font-size: 0.85rem;">No other related posts available at this time.</p>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- Dynamic Widgets Area -->
                    <?php if (is_active_sidebar('insights-sidebar')) : ?>
                        <div style="margin-top: 36px;">
                            <?php dynamic_sidebar('insights-sidebar'); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</section>

<?php
get_footer();
