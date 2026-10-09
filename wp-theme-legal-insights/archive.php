<?php
/**
 * The template for displaying archive pages
 *
 * @package Legal_Insights
 */

get_header();
?>

<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt">
                <div class="bnr_tag">Archive Collection</div>
                <h1 class="bnr_heading"><?php the_archive_title(); ?></h1>
                <?php if (get_the_archive_description()) : ?>
                    <p class="bnr_subtitle"><?php the_archive_description(); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="insights-mn">
    <div class="container-custom">
        <ul class="evnt_lstng_inr">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                $categories = get_the_category();
                $cat_name = !empty($categories) ? $categories[0]->name : 'Legal Insight';
                $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'insight-card') : 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=800&q=80';
                ?>
                <li>
                    <div class="evnt_img__bx">
                        <span class="category-badge"><?php echo esc_html($cat_name); ?></span>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                        </a>
                    </div>
                    <div class="evnt_txtbx despara">
                        <div class="evnt_txt__top">
                            <h2 class="mn_hgt_blg">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p>
                                <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_excerpt(), 22, '...'); ?></a>
                            </p>
                        </div>
                        <div class="evnt__btm">
                            <div class="edtr__bx">
                                <span class="greytxt"><?php echo get_the_date('jS F Y'); ?></span>
                            </div>
                            <div class="evnt__btm__rht">
                                <a href="<?php the_permalink(); ?>" class="btnstyle inline"><span>Read more</span></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile; else : ?>
                <div class="insights-empty-state">
                    <h3>No Records Found</h3>
                    <p>No publications were found in this archive.</p>
                </div>
            <?php endif; ?>
        </ul>

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <div class="insights-pagination">
                <?php echo paginate_links(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
