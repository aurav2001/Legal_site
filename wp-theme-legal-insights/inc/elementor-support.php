<?php
/**
 * Elementor Page Builder Integration & Custom Legal Widgets
 *
 * Provides:
 * 1. Elementor theme support & Theme Builder location registration
 * 2. Dedicated "LexVanguard Legal Elements" widget category in Elementor
 * 3. Drag-and-drop custom widgets for Hero, Stats, Practice Cards, Advocates, Awards
 * 4. Editor style compatibility
 *
 * @package Legal_Insights
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Declare Elementor Theme Support
 */
function legal_insights_elementor_setup() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'legal_insights_elementor_setup');

/**
 * Register Elementor Theme Builder Locations (Elementor Pro compatible)
 */
function legal_insights_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
    $elementor_theme_manager->register_location('single');
    $elementor_theme_manager->register_location('archive');
}
add_action('elementor/theme/register_locations', 'legal_insights_register_elementor_locations');

/**
 * Register Custom Elementor Widget Category
 */
function legal_insights_add_elementor_category($elements_manager) {
    $elements_manager->add_category(
        'lexvanguard-elements',
        array(
            'title' => esc_html__('LexVanguard Legal Elements', 'legal-insights'),
            'icon'  => 'fa fa-balance-scale',
        )
    );
}
add_action('elementor/elements/categories_registered', 'legal_insights_add_elementor_category');

/**
 * Enqueue Theme Styles within Elementor Editor & Preview
 */
function legal_insights_elementor_styles() {
    wp_enqueue_style('legal-insights-fonts', 'https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('legal-insights-style', get_stylesheet_uri(), array(), '1.4.0');
}
add_action('elementor/editor/after_enqueue_styles', 'legal_insights_elementor_styles');
add_action('elementor/frontend/after_enqueue_styles', 'legal_insights_elementor_styles');

/**
 * Register Custom Elementor Widgets
 */
function legal_insights_register_elementor_widgets($widgets_manager) {
    if (!class_exists('\Elementor\Widget_Base')) {
        return;
    }

    // 1. Hero Banner Widget
    class LexVanguard_Hero_Widget extends \Elementor\Widget_Base {
        public function get_name() { return 'lexvanguard_hero'; }
        public function get_title() { return esc_html__('Law Firm Hero Banner', 'legal-insights'); }
        public function get_icon() { return 'eicon-banner'; }
        public function get_categories() { return array('lexvanguard-elements'); }

        protected function register_controls() {
            $this->start_controls_section('content_section', array(
                'label' => esc_html__('Hero Content', 'legal-insights'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ));
            $this->add_control('tagline', array(
                'label'   => esc_html__('Small Tagline', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'MALHOTRA & CO. ADVOCATES & PARTNERS',
            ));
            $this->add_control('title_prefix', array(
                'label'   => esc_html__('Main Heading (Prefix)', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'With You In Every',
            ));
            $this->add_control('title_highlight', array(
                'label'   => esc_html__('Gold Highlight Word', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Challenge',
            ));
            $this->add_control('description', array(
                'label'   => esc_html__('Paragraph Description', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Dedicated appellate advocacy before the Supreme Court of India, High Courts, and International Arbitral Seats.',
            ));
            $this->add_control('btn1_text', array(
                'label'   => esc_html__('Button 1 Text', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Schedule Consultation',
            ));
            $this->add_control('btn1_link', array(
                'label'   => esc_html__('Button 1 URL', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array('url' => '/contact-us/'),
            ));
            $this->add_control('btn2_text', array(
                'label'   => esc_html__('Button 2 Text', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Our Practice Areas →',
            ));
            $this->add_control('btn2_link', array(
                'label'   => esc_html__('Button 2 URL', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array('url' => '/our-expertise/'),
            ));
            $this->add_control('image', array(
                'label'   => esc_html__('Arch Image', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array('url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80'),
            ));
            $this->add_control('badge_num', array(
                'label'   => esc_html__('Badge Number', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '60+',
            ));
            $this->add_control('badge_lbl', array(
                'label'   => esc_html__('Badge Label', 'legal-insights'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Years',
            ));
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            $img_url  = !empty($settings['image']['url']) ? $settings['image']['url'] : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80';
            $btn1_url = !empty($settings['btn1_link']['url']) ? $settings['btn1_link']['url'] : '#';
            $btn2_url = !empty($settings['btn2_link']['url']) ? $settings['btn2_link']['url'] : '#';
            ?>
            <section class="hme_bnr__area" style="padding: 70px 0;">
                <div class="container-custom">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <?php if (!empty($settings['tagline'])) : ?>
                                <div class="bnr_sml_cntnt"><?php echo esc_html($settings['tagline']); ?></div>
                            <?php endif; ?>
                            <h1 class="hdng_bnr">
                                <?php echo esc_html($settings['title_prefix']); ?>
                                <?php if (!empty($settings['title_highlight'])) : ?>
                                    <span><?php echo esc_html($settings['title_highlight']); ?></span>
                                <?php endif; ?>
                            </h1>
                            <p class="para_bnr"><?php echo esc_html($settings['description']); ?></p>
                            <div class="hero-btns-wrap">
                                <?php if (!empty($settings['btn1_text'])) : ?>
                                    <a href="<?php echo esc_url($btn1_url); ?>" class="sub_filter_btn active"><?php echo esc_html($settings['btn1_text']); ?></a>
                                <?php endif; ?>
                                <?php if (!empty($settings['btn2_text'])) : ?>
                                    <a href="<?php echo esc_url($btn2_url); ?>" class="sub_filter_btn"><?php echo esc_html($settings['btn2_text']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center mt-4 mt-lg-0">
                            <div class="hm_bnr_visual_frame">
                                <div class="hm_bnr_arch_img">
                                    <img src="<?php echo esc_url($img_url); ?>" alt="Law Firm Hero">
                                </div>
                                <div class="floating-badge-circle fb-top-left">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                                </div>
                                <div class="floating-badge-circle fb-bottom-right">
                                    <div>
                                        <span class="fb-num"><?php echo esc_html($settings['badge_num']); ?></span>
                                        <span class="fb-lbl"><?php echo esc_html($settings['badge_lbl']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }

    // 2. Statistics Counter Pills Widget
    class LexVanguard_Stats_Widget extends \Elementor\Widget_Base {
        public function get_name() { return 'lexvanguard_stats'; }
        public function get_title() { return esc_html__('Law Firm Counter Stats', 'legal-insights'); }
        public function get_icon() { return 'eicon-counter'; }
        public function get_categories() { return array('lexvanguard-elements'); }

        protected function register_controls() {
            $this->start_controls_section('stats_section', array(
                'label' => esc_html__('Statistics Numbers', 'legal-insights'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ));
            $this->add_control('stat1_num', array('label' => 'Stat 1 Number', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '1964'));
            $this->add_control('stat1_lbl', array('label' => 'Stat 1 Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Established'));
            $this->add_control('stat2_num', array('label' => 'Stat 2 Number', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '11'));
            $this->add_control('stat2_lbl', array('label' => 'Stat 2 Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Practice Areas'));
            $this->add_control('stat3_num', array('label' => 'Stat 3 Number', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '500+'));
            $this->add_control('stat3_lbl', array('label' => 'Stat 3 Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Landmark Cases'));
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            ?>
            <div class="welcome-stats-row" style="display: flex; gap: 16px; flex-wrap: wrap;">
                <div class="stat-pill-card">
                    <div class="stat-num"><?php echo esc_html($settings['stat1_num']); ?></div>
                    <div class="stat-lbl"><?php echo esc_html($settings['stat1_lbl']); ?></div>
                </div>
                <div class="stat-pill-card">
                    <div class="stat-num"><?php echo esc_html($settings['stat2_num']); ?></div>
                    <div class="stat-lbl"><?php echo esc_html($settings['stat2_lbl']); ?></div>
                </div>
                <div class="stat-pill-card">
                    <div class="stat-num"><?php echo esc_html($settings['stat3_num']); ?></div>
                    <div class="stat-lbl"><?php echo esc_html($settings['stat3_lbl']); ?></div>
                </div>
            </div>
            <?php
        }
    }

    // 3. Practice Card Widget
    class LexVanguard_Practice_Card_Widget extends \Elementor\Widget_Base {
        public function get_name() { return 'lexvanguard_practice_card'; }
        public function get_title() { return esc_html__('Curved Practice Card', 'legal-insights'); }
        public function get_icon() { return 'eicon-shape'; }
        public function get_categories() { return array('lexvanguard-elements'); }

        protected function register_controls() {
            $this->start_controls_section('card_section', array(
                'label' => esc_html__('Card Content', 'legal-insights'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ));
            $this->add_control('title', array('label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Arbitration & ADR'));
            $this->add_control('desc', array('label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Domestic and international commercial arbitration under SIAC, ICC, and Indian Arbitration Act.'));
            $this->add_control('link', array('label' => 'Link URL', 'type' => \Elementor\Controls_Manager::URL, 'default' => array('url' => '/our-expertise/arbitration/')));
            $this->add_control('image', array('label' => 'Card Image', 'type' => \Elementor\Controls_Manager::MEDIA));
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            $url = !empty($settings['link']['url']) ? $settings['link']['url'] : '#';
            $img = !empty($settings['image']['url']) ? $settings['image']['url'] : '';
            ?>
            <div class="pillar-card" style="margin-bottom: 20px;">
                <?php if (!empty($img)) : ?>
                    <div class="pillar-card-img-wrap">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                    </div>
                <?php endif; ?>
                <div class="pillar-card-content">
                    <div>
                        <h3 class="pillar-card-title"><?php echo esc_html($settings['title']); ?></h3>
                        <p class="pillar-card-desc"><?php echo esc_html($settings['desc']); ?></p>
                    </div>
                    <a href="<?php echo esc_url($url); ?>" class="serv-btn-link">Learn More &rarr;</a>
                </div>
            </div>
            <?php
        }
    }

    // 4. Advocate Profile Card Widget
    class LexVanguard_Advocate_Card_Widget extends \Elementor\Widget_Base {
        public function get_name() { return 'lexvanguard_advocate_card'; }
        public function get_title() { return esc_html__('Advocate Profile Card', 'legal-insights'); }
        public function get_icon() { return 'eicon-person'; }
        public function get_categories() { return array('lexvanguard-elements'); }

        protected function register_controls() {
            $this->start_controls_section('lawyer_section', array(
                'label' => esc_html__('Lawyer Details', 'legal-insights'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ));
            $this->add_control('name', array('label' => 'Name', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Rajeev Singhania'));
            $this->add_control('title', array('label' => 'Designation', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Managing Partner & Senior Advocate'));
            $this->add_control('exp', array('label' => 'Experience', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '32 Years Experience'));
            $this->add_control('chambers', array('label' => 'Chambers', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Supreme Court of India & Delhi High Court'));
            $this->add_control('bio', array('label' => 'Bio', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Third-generation advocate on record with extensive appellate appearances across constitutional and commercial benches.'));
            $this->add_control('image', array('label' => 'Photo', 'type' => \Elementor\Controls_Manager::MEDIA));
            $this->add_control('email', array('label' => 'Email', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'lawyer@chambers.law'));
            $this->add_control('linkedin', array('label' => 'LinkedIn URL', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'https://linkedin.com'));
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            $photo = !empty($settings['image']['url']) ? $settings['image']['url'] : 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=600&q=80';
            ?>
            <div class="leader-card-wrap">
                <div class="leader-card-header">
                    <div class="leader-card-img">
                        <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($settings['name']); ?>">
                    </div>
                    <div class="leader-card-info">
                        <?php if (!empty($settings['exp'])) : ?>
                            <span class="leader-exp-badge"><?php echo esc_html($settings['exp']); ?></span>
                        <?php endif; ?>
                        <h2 class="leader-name"><?php echo esc_html($settings['name']); ?></h2>
                        <div class="leader-title"><?php echo esc_html($settings['title']); ?></div>
                        <div class="leader-chambers">📍 <?php echo esc_html($settings['chambers']); ?></div>
                        <div class="leader-socials">
                            <?php if (!empty($settings['linkedin'])) : ?>
                                <a href="<?php echo esc_url($settings['linkedin']); ?>" target="_blank" rel="noopener noreferrer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
                            <?php endif; ?>
                            <?php if (!empty($settings['email'])) : ?>
                                <a href="mailto:<?php echo esc_attr($settings['email']); ?>"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="leader-bio-body">
                    <p class="leader-bio-text"><?php echo esc_html($settings['bio']); ?></p>
                </div>
                <div class="bggrdnt"></div>
            </div>
            <?php
        }
    }

    // Register all widgets with Elementor
    $widgets_manager->register(new LexVanguard_Hero_Widget());
    $widgets_manager->register(new LexVanguard_Stats_Widget());
    $widgets_manager->register(new LexVanguard_Practice_Card_Widget());
    $widgets_manager->register(new LexVanguard_Advocate_Card_Widget());
}
add_action('elementor/widgets/register', 'legal_insights_register_elementor_widgets');

