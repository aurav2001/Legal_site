<?php
/**
 * The header for our theme
 *
 * @package Legal_Insights
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Bar Council of India (BCI) Regulatory Disclaimer Modal -->
<div id="bciDisclaimerModal" class="dsclaimer_popup" style="display: none;">
    <div class="disclaimer_popup_inr">
        <h2 class="dsclmr_hdng">DISCLAIMER</h2>
        <p class="dsclmr_subtitle">
            The Bar Council of India restricts advocates and law firms from advertising or soliciting work in any form. By accessing this website, the user acknowledges and confirms that:
        </p>
        <div class="scrl__dv">
            <ul class="dsclmr_txt">
                <li>The user is accessing this portal voluntarily for their own information and knowledge, and there has been no solicitation, invitation, or inducement of any sort by the Firm or its members.</li>
                <li>The content on this website is intended solely for general informational and educational purposes and does not constitute formal legal opinion or legal advice.</li>
                <li>Accessing or downloading materials from this website does not create or establish an advocate-client relationship between the Firm and the user.</li>
                <li>The Firm expressly disclaims all liability for any actions taken or decisions made in reliance on any content available on this website.</li>
                <li>All intellectual property and publication rights in the legal digests, commentaries, and research bulletins are reserved.</li>
            </ul>
        </div>
        <div class="prcd_btn__bx">
            <button type="button" id="proceedBtn" class="prcd_btn">I Accept &amp; Proceed</button>
        </div>
    </div>
</div>

<!-- Clean Luxury Sticky Navigation Bar (Uncluttered) -->
<header class="header-main sticky_top">
    <div class="container-custom">
        <div class="top_hdr_area" style="padding: 14px 0;">
            
            <!-- Brand Logo Area -->
            <div class="logo_area">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo_mn">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <!-- Luxury SVG Scales Crest & Legal Typography -->
                        <div style="width: 42px; height: 42px; background: rgba(197, 160, 89, 0.15); border: 1px solid var(--color-gold); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#c5a059" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                                <path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                                <path d="M7 21h10"/>
                                <path d="M12 3v18"/>
                                <path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/>
                            </svg>
                        </div>
                        <div class="logo-text-wrap">
                            <div class="logo-brand" style="font-size: 1.45rem;">LEX<span>VANGUARD</span></div>
                            <div class="logo-tagline" style="font-size: 0.68rem;"><?php bloginfo('description') ? bloginfo('description') : 'Advocates &amp; Supreme Court Counsel'; ?></div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>

            <!-- Clean Navigation Menu Area -->
            <div class="menu_area" style="gap: 24px;">
                <?php
                if (has_nav_menu('primary')) :
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'navinr',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                else :
                ?>
                    <!-- Clean Default Nav -->
                    <ul class="navinr">
                        <li class="<?php echo is_front_page() ? 'active' : ''; ?>"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li class="<?php echo is_page('about-us') ? 'active' : ''; ?>"><a href="<?php echo esc_url(home_url('/about-us/')); ?>">About Us</a></li>
                        <li class="<?php echo is_page('our-people') ? 'active' : ''; ?>"><a href="<?php echo esc_url(home_url('/our-people/')); ?>">Our People</a></li>
                        <li style="position: relative;" class="<?php echo (is_page('our-expertise') || is_page_template('page-practice-detail.php')) ? 'active' : ''; ?>">
                            <a href="<?php echo esc_url(home_url('/our-expertise/')); ?>">Practice Areas &#9662;</a>
                            <ul class="sub_menuinr">
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/arbitration/')); ?>">Arbitration &amp; ADR</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/commercial-litigation/')); ?>">Commercial Litigation</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/competition-law/')); ?>">Competition Law</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/corporate-insolvency/')); ?>">Corporate &amp; Insolvency Laws</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/constitutional-law/')); ?>">Constitutional Law</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/criminal-law/')); ?>">Criminal Law - White Collar</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/environmental-law/')); ?>">Environmental Law</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/regulatory-litigation/')); ?>">Regulatory Litigation</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/mediation/')); ?>">Mediation</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/securities-law/')); ?>">Securities Law</a></li>
                                <li><a href="<?php echo esc_url(home_url('/our-expertise/tax/')); ?>">Tax - Direct &amp; Indirect</a></li>
                            </ul>
                        </li>
                        <li class="<?php echo is_page('our-awards') ? 'active' : ''; ?>"><a href="<?php echo esc_url(home_url('/our-awards/')); ?>">Our Awards</a></li>
                        <li class="<?php echo (is_page('insights') || is_home() || is_singular('post')) ? 'active' : ''; ?>"><a href="<?php echo esc_url(home_url('/insights/')); ?>">Insights</a></li>
                        <li class="<?php echo is_page('contact-us') ? 'active' : ''; ?>"><a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a></li>
                    </ul>
                <?php endif; ?>

                <!-- Sleek Consultation CTA Button -->
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="clean-nav-btn">Consultation</a>

                <!-- Mobile Hamburger Icon -->
                <div class="header__humburgermenu" id="mobileMenuToggle" aria-label="Toggle Navigation">
                    <div class="header__humburgerblock">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</header>
