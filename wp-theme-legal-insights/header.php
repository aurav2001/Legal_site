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

<?php
$bci_enabled = function_exists('legal_insights_get_option') ? legal_insights_get_option('bci_enabled', 'yes') : 'yes';
if ($bci_enabled !== 'no') :
    $bci_title    = function_exists('legal_insights_get_option') ? legal_insights_get_option('bci_title', 'DISCLAIMER') : 'DISCLAIMER';
    $bci_subtitle = function_exists('legal_insights_get_option') ? legal_insights_get_option('bci_subtitle', 'The Bar Council of India restricts advocates and law firms from advertising or soliciting work in any form. By accessing this website, the user acknowledges and confirms that:') : 'The Bar Council of India restricts advocates and law firms from advertising or soliciting work in any form. By accessing this website, the user acknowledges and confirms that:';
    $bci_points_raw = function_exists('legal_insights_get_option') ? legal_insights_get_option('bci_points') : '';
    $bci_btn      = function_exists('legal_insights_get_option') ? legal_insights_get_option('bci_btn_text', 'I Accept & Proceed') : 'I Accept & Proceed';

    if (empty($bci_points_raw)) {
        $bci_points = array(
            'The user is accessing this portal voluntarily for their own information and knowledge, and there has been no solicitation, invitation, or inducement of any sort by the Firm or its members.',
            'The content on this website is intended solely for general informational and educational purposes and does not constitute formal legal opinion or legal advice.',
            'Accessing or downloading materials from this website does not create or establish an advocate-client relationship between the Firm and the user.',
            'The Firm expressly disclaims all liability for any actions taken or decisions made in reliance on any content available on this website.',
            'All intellectual property and publication rights in the legal digests, commentaries, and research bulletins are reserved.'
        );
    } else {
        $bci_points = array_filter(array_map('trim', explode("\n", $bci_points_raw)));
    }
?>
<!-- Bar Council of India (BCI) Regulatory Disclaimer Modal -->
<div id="bciDisclaimerModal" class="dsclaimer_popup" style="display: none;">
    <div class="disclaimer_popup_inr">
        <h2 class="dsclmr_hdng"><?php echo esc_html($bci_title); ?></h2>
        <p class="dsclmr_subtitle">
            <?php echo esc_html($bci_subtitle); ?>
        </p>
        <div class="scrl__dv">
            <ul class="dsclmr_txt">
                <?php foreach ($bci_points as $pt) : ?>
                    <li><?php echo esc_html($pt); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="prcd_btn__bx">
            <button type="button" id="proceedBtn" class="prcd_btn"><?php echo esc_html($bci_btn); ?></button>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Clean Luxury Sticky Navigation Bar (Uncluttered) -->
<header class="header-main sticky_top">
    <div class="container-custom">
        <div class="top_hdr_area">
            
            <!-- Brand Logo Area -->
            <div class="logo_area">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo_mn">
                    <?php 
                    $custom_logo_url = function_exists('legal_insights_get_option') ? legal_insights_get_option('firm_logo') : '';
                    if (has_custom_logo()) :
                        the_custom_logo();
                    elseif (!empty($custom_logo_url)) :
                    ?>
                        <img src="<?php echo esc_url($custom_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" style="max-height: 48px; width: auto;">
                    <?php else : ?>
                        <!-- Luxury SVG Scales Crest & Legal Typography -->
                        <div class="logo-crest">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#c5a059" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                                <path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                                <path d="M7 21h10"/>
                                <path d="M12 3v18"/>
                                <path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/>
                            </svg>
                        </div>
                        <div class="logo-text-wrap">
                            <div class="logo-brand">
                                <?php 
                                if (function_exists('legal_insights_get_firm_name')) {
                                    echo legal_insights_get_firm_name(true);
                                } else {
                                    echo 'MALHOTRA <span>&amp; CO.</span>';
                                }
                                ?>
                            </div>
                            <div class="logo-tagline">
                                <?php 
                                if (function_exists('legal_insights_get_firm_tagline')) {
                                    echo legal_insights_get_firm_tagline();
                                } else {
                                    echo 'Advocates &amp; Supreme Court Counsel';
                                }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>

            <!-- Clean Navigation Menu Area -->
            <div class="menu_area">
                <?php
                $has_custom_menu = false;
                if (has_nav_menu('primary')) {
                    $locations = get_nav_menu_locations();
                    if (!empty($locations['primary'])) {
                        $menu_items = wp_get_nav_menu_items($locations['primary']);
                        if (!empty($menu_items)) {
                            $has_custom_menu = true;
                        }
                    }
                }

                if ($has_custom_menu) :
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

                <?php
                $btn_text = function_exists('legal_insights_get_option') ? legal_insights_get_option('header_consultation_text', 'Consultation') : 'Consultation';
                $btn_link = function_exists('legal_insights_get_option') ? legal_insights_get_option('header_consultation_link', home_url('/contact-us/')) : home_url('/contact-us/');
                if (!empty($btn_link) && strpos($btn_link, 'http') === false && strpos($btn_link, '/') === 0) {
                    $btn_link = home_url($btn_link);
                }
                ?>
                <!-- Sleek Luxury Consultation CTA Button -->
                <a href="<?php echo esc_url($btn_link); ?>" class="clean-nav-btn">
                    <span><?php echo esc_html($btn_text); ?></span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                </a>

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
