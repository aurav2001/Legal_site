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
            <div class="col-4">
                <div class="footer-lft">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo_mn">
                        <div class="logo-brand" style="font-size: 1.4rem; color: #ffffff;">
                            <?php bloginfo('name'); ?>
                        </div>
                    </a>
                    <p class="footer-desc">
                        Premier Tier-1 full-service legal institution with nationwide courtroom advocacy before the Supreme Court of India, High Courts, and international arbitral seats.
                    </p>
                    <ul class="scl-icn">
                        <li>
                            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://x.com" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Column 2: Navigation & Insights -->
            <div class="col-4">
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
            <div class="col-4">
                <div class="footer-mid">
                    <h2>Practice Jurisdictions</h2>
                    <ul>
                        <li><a href="#">Commercial Litigation &amp; Supreme Court</a></li>
                        <li><a href="#">International &amp; Domestic Arbitration</a></li>
                        <li><a href="#">Corporate Restructuring &amp; M&amp;A</a></li>
                        <li><a href="#">Insolvency &amp; Bankruptcy Code (IBC)</a></li>
                        <li><a href="#">Competition &amp; Antitrust Law</a></li>
                        <li><a href="#">White-Collar Defense &amp; PMLA</a></li>
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
            <div class="col-6">
                <div>
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.
                </div>
            </div>
            <div class="col-6">
                <div class="footer-bot-rght">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/terms/')); ?>">Terms of Access</a></li>
                        <li><a href="javascript:void(0);" id="footerDisclaimerTrigger">BCI Disclaimer</a></li>
                        <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>
</body>
</html>
