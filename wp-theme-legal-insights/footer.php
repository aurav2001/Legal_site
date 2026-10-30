<?php
/**
 * The template for displaying the footer
 *
 * @package Legal_Insights
 */
?>

<!-- Footer Main Section -->
<footer class="footer-mn">
    <div class="container-custom">
        <div class="row">
            
            <!-- Column 1: Firm Overview & Social Presence -->
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="footer-lft">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo_mn">
                        <div class="logo-brand" style="font-size: 1.4rem; color: #ffffff;">
                            <?php 
                            if (function_exists('legal_insights_get_firm_name')) {
                                echo legal_insights_get_firm_name(true);
                            } else {
                                echo 'MALHOTRA <span style="color: var(--color-gold);">&amp; CO.</span>';
                            }
                            ?>
                        </div>
                    </a>
                    <p class="footer-desc">
                        <?php 
                        $footer_desc = function_exists('legal_insights_get_option') ? legal_insights_get_option('footer_desc') : '';
                        if (empty($footer_desc)) {
                            $footer_desc = 'Premier Tier-1 full-service legal institution with nationwide courtroom advocacy before the Supreme Court of India, High Courts, and international arbitral seats.';
                        }
                        echo esc_html($footer_desc);
                        ?>
                    </p>
                    <ul class="scl-icn">
                        <?php
                        $linkedin  = function_exists('legal_insights_get_option') ? legal_insights_get_option('social_linkedin', 'https://linkedin.com') : 'https://linkedin.com';
                        $youtube   = function_exists('legal_insights_get_option') ? legal_insights_get_option('social_youtube', 'https://youtube.com') : 'https://youtube.com';
                        $twitter   = function_exists('legal_insights_get_option') ? legal_insights_get_option('social_twitter', 'https://x.com') : 'https://x.com';
                        $instagram = function_exists('legal_insights_get_option') ? legal_insights_get_option('social_instagram') : '';

                        if (!empty($linkedin)) :
                        ?>
                        <li>
                            <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (!empty($youtube)) : ?>
                        <li>
                            <a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (!empty($twitter)) : ?>
                        <li>
                            <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (!empty($instagram)) : ?>
                        <li>
                            <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- Column 2: Navigation & Insights -->
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="footer-mid">
                    <h2>Firm &amp; Knowledge</h2>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/about-us/')); ?>">About Our Chambers</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-people/')); ?>">Senior Advocates &amp; Partners</a></li>
                        <li><a href="<?php echo esc_url(home_url('/insights/')); ?>">Insights &amp; Research Hub</a></li>
                        <li><a href="<?php echo esc_url(add_query_arg('type', 'blogs-and-articles', home_url('/insights/'))); ?>">Blogs &amp; Legal Commentary</a></li>
                        <li><a href="<?php echo esc_url(add_query_arg('type', 'media-and-events', home_url('/insights/'))); ?>">Media Briefs &amp; Delegations</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Chambers Directory</a></li>
                    </ul>
                </div>
            </div>

            <!-- Column 3: Core Practice Areas -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="footer-mid">
                    <h2>Practice Jurisdictions</h2>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/commercial-litigation/')); ?>">Commercial Litigation &amp; Supreme Court</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/arbitration/')); ?>">International &amp; Domestic Arbitration</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/corporate-insolvency/')); ?>">Corporate Restructuring &amp; IBC</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/competition-law/')); ?>">Competition &amp; Antitrust Law (CCI)</a></li>
                        <li><a href="<?php echo esc_url(home_url('/our-expertise/criminal-law/')); ?>">White-Collar Defense &amp; PMLA</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Footer Bottom Bar -->
<section class="footer-bot-mn">
    <div class="container-custom">
        <div class="row" style="align-items: center;">
            <div class="col-md-6 col-12 text-center text-md-start mb-2 mb-md-0">
                <div>
                    &copy; <?php echo date('Y'); ?> <?php 
                    $copyright = function_exists('legal_insights_get_option') ? legal_insights_get_option('footer_copyright') : '';
                    if (empty($copyright)) {
                        $firm = function_exists('legal_insights_get_firm_name') ? legal_insights_get_firm_name(false) : 'Malhotra & Co.';
                        echo esc_html($firm) . ' Advocates &amp; Partners. All Rights Reserved.';
                    } else {
                        echo esc_html($copyright);
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6 col-12 text-center text-md-end">
                <div class="footer-bot-links">
                    <a href="<?php echo esc_url(home_url('/privacy/')); ?>">Privacy Policy &amp; BCI Disclaimer</a>
                    <span style="margin: 0 8px; color: #475569;">&bull;</span>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Chambers Directory</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>
</body>
</html>
