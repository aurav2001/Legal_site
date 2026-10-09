<?php
/**
 * Template Name: Insights Archive (AGL Style)
 *
 * Description: Dedicated Insights Knowledge Hub archive matching aglaw.in/insights
 * Features: Architectural curved cards (16px 0 45px 0), Animate On Scroll (AOS), category tabs & search.
 *
 * @package Legal_Insights
 */

get_header();

// Determine active category filter
$current_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : 'all';
$search_query = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
if (empty($search_query) && isset($_GET['s'])) {
    $search_query = sanitize_text_field($_GET['s']);
}

// Setup WP Query parameters
$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);

$query_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 8,
    'paged'          => $paged,
);

if (!empty($search_query)) {
    $query_args['s'] = $search_query;
}

if ($current_type !== 'all' && !empty($current_type)) {
    $query_args['category_name'] = $current_type;
}

$insights_query = new WP_Query($query_args);
?>

<!-- Banner Section (matching aglaw.in .about-mn with AOS) -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right" data-aos-duration="1000">
                <div class="bnr_tag">Thought Leadership &amp; Jurisprudence</div>
                <h1 class="bnr_heading">Insights</h1>
                <p class="bnr_subtitle">
                    In-depth legal commentaries, Supreme Court digests, statutory amendments, and cross-border commercial briefings authored by our senior advocates and partners.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Insights Hub Section (.insights-mn) -->
<section class="insights-mn">
    <div class="container-custom">

        <!-- Search Bar on Top Right (like aglaw.in) -->
        <div class="row insight_srch_lst_cont">
            <div class="col-6" data-aos="fade-right">
                <!-- Optional Left Breadcrumbs or Firm Indicator -->
            </div>
            <div class="col-6" data-aos="fade-left">
                <div class="searchbar_bt">
                    <div class="srch_bx">
                        <form action="<?php echo esc_url(get_permalink()); ?>" method="get">
                            <?php if ($current_type !== 'all') : ?>
                                <input type="hidden" name="type" value="<?php echo esc_attr($current_type); ?>">
                            <?php endif; ?>
                            <input type="search" value="<?php echo esc_attr($search_query); ?>" name="search" placeholder="Search by name or topic" class="srchbxinpt">
                            <button type="submit" class="search-submit srchbtn" aria-label="Submit Search">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Tabs (like aglaw.in .insight_menu_slider with top animated line) -->
        <div class="insight_menu_slider" data-aos="fade-up">
            <div class="insight_menu_itm <?php echo ($current_type === 'all') ? 'active' : ''; ?>">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    All Publications
                </a>
            </div>
            <div class="insight_menu_itm <?php echo ($current_type === 'blogs-and-articles') ? 'active' : ''; ?>">
                <a href="<?php echo esc_url(add_query_arg('type', 'blogs-and-articles', get_permalink())); ?>">
                    Blogs &amp; Articles
                </a>
            </div>
            <div class="insight_menu_itm <?php echo ($current_type === 'media-and-events') ? 'active' : ''; ?>">
                <a href="<?php echo esc_url(add_query_arg('type', 'media-and-events', get_permalink())); ?>">
                    Media &amp; Events
                </a>
            </div>
            <div class="insight_menu_itm <?php echo ($current_type === 'supreme-court-digest') ? 'active' : ''; ?>">
                <a href="<?php echo esc_url(add_query_arg('type', 'supreme-court-digest', get_permalink())); ?>">
                    Supreme Court Digest
                </a>
            </div>
        </div>

        <!-- Filter status notice if active -->
        <?php if (!empty($search_query) || $current_type !== 'all') : ?>
            <div style="margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between; background: #f4eee4; padding: 12px 20px; border-radius: 8px;" data-aos="fade-in">
                <div style="font-size: 0.88rem; color: #332720;">
                    Showing results for: 
                    <?php if (!empty($search_query)) : ?>
                        <strong>&ldquo;<?php echo esc_html($search_query); ?>&rdquo;</strong>
                    <?php endif; ?>
                    <?php if ($current_type !== 'all') : ?>
                        in <strong><?php echo esc_html(ucwords(str_replace('-', ' ', $current_type))); ?></strong>
                    <?php endif; ?>
                    (<?php echo esc_html($insights_query->found_posts); ?> found)
                </div>
                <a href="<?php echo esc_url(get_permalink()); ?>" style="font-size: 0.82rem; color: var(--color-gold); font-weight: 700;">Clear Filters &times;</a>
            </div>
        <?php endif; ?>

        <!-- Articles Grid (.evnt_lstng_inr) with Signature Curve Cards -->
        <ul class="evnt_lstng_inr">
            <?php if ($insights_query->have_posts()) : ?>
                <?php 
                $card_idx = 0;
                while ($insights_query->have_posts()) : $insights_query->the_post(); 
                    $card_idx++;
                    $delay = ($card_idx % 2 == 1) ? 100 : 250;
                    $categories = get_the_category();
                    $cat_name = !empty($categories) ? $categories[0]->name : 'Legal Insight';
                    $has_thumbnail = has_post_thumbnail();
                    $thumbnail_url = $has_thumbnail ? get_the_post_thumbnail_url(get_the_ID(), 'insight-card') : 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=800&q=80';
                ?>
                    <li data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
                        <!-- Card Image -->
                        <div class="evnt_img__bx">
                            <span class="category-badge"><?php echo esc_html($cat_name); ?></span>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                            </a>
                        </div>

                        <!-- Card Content -->
                        <div class="evnt_txtbx despara">
                            <div class="evnt_txt__top">
                                <h2 class="mn_hgt_blg">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <p>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo wp_trim_words(get_the_excerpt(), 22, '...'); ?>
                                    </a>
                                </p>
                            </div>

                            <!-- Bottom Meta Bar -->
                            <div class="evnt__btm">
                                <div class="evnt__btm__lft">
                                    <div class="edtr__bx">
                                        <span>
                                            <span class="greytxt">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                                <?php echo get_the_date('jS F Y'); ?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="evnt__btm__rht">
                                    <a href="<?php the_permalink(); ?>" class="btnstyle inline">
                                        <span>Read more</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Subtle corner gradient accent (like aglaw.in .bggrdnt) -->
                        <div class="bggrdnt"></div>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <!-- Empty State -->
                <div class="insights-empty-state" data-aos="fade-up">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5" style="margin: 0 auto 16px auto;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <h3>No Insights Found</h3>
                    <p>There are no legal articles or media briefs matching your current filter criteria.</p>
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn-reset">Reset All Filters</a>
                </div>
            <?php endif; ?>
        </ul>

        <!-- Pagination -->
        <?php if ($insights_query->max_num_pages > 1) : ?>
            <div class="insights-pagination" data-aos="fade-up">
                <?php
                echo paginate_links(array(
                    'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'format'    => '?paged=%#%',
                    'current'   => max(1, $paged),
                    'total'     => $insights_query->max_num_pages,
                    'prev_text' => '&larr; Prev',
                    'next_text' => 'Next &rarr;',
                    'type'      => 'plain',
                ));
                ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php
get_footer();
