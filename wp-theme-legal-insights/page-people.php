<?php
/**
 * Template Name: Our People (AGL Style)
 *
 * Description: Law firm leadership, Senior Advocates, Partners & Associates directory
 *
 * @package Legal_Insights
 */

get_header();

// Sample leadership directory
$leaders = array(
    array(
        'name'        => 'Rajeev Singhania',
        'title'       => 'Managing Partner & Senior Advocate',
        'experience'  => '32 Years Experience',
        'chambers'    => 'Supreme Court of India & Delhi High Court',
        'education'   => 'LL.B. (Campus Law Centre, DU), LL.M. (Harvard Law School)',
        'expertise'   => 'Supreme Court SLPs, Commercial Disputes, Constitutional Writs, Telecom & Mining',
        'bio'         => 'Third-generation advocate on record with over three decades of formidable courtroom appearances. Regularly represents sovereign entities, global tech giants, and infrastructure conglomerates in landmark constitution bench and appellate matters.',
        'image'       => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=600&q=80',
        'linkedin'    => 'https://linkedin.com',
        'email'       => 'singhania@vanguardpartners.law'
    ),
    array(
        'name'        => 'Arundhati Sengupta',
        'title'       => 'Senior Partner - International Arbitration & Disputes',
        'experience'  => '22 Years Experience',
        'chambers'    => 'Singapore & New Delhi',
        'education'   => 'B.A. LL.B. (WBNUJS Kolkata), BCL (University of Oxford)',
        'expertise'   => 'SIAC / ICC / LCIA Arbitrations, Cross-Border Enforcement, New York Convention',
        'bio'         => 'Dual-qualified disputes practitioner with extensive counsel experience across Singapore, London, and Indian arbitral seats. Serves on arbitral panels of SIAC and the Mumbai Centre for International Arbitration.',
        'image'       => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
        'linkedin'    => 'https://linkedin.com',
        'email'       => 'arundhati@vanguardpartners.law'
    ),
    array(
        'name'        => 'Vikramaditya Shroff',
        'title'       => 'Partner - Corporate M&A & Private Equity',
        'experience'  => '20 Years Experience',
        'chambers'    => 'Mumbai & New Delhi',
        'education'   => 'B.Com, LL.B. (Government Law College, Mumbai), Solicitor (Bombay Incorporated Law Society)',
        'expertise'   => 'Cross-Border M&A, Private Equity, Schemes of Arrangement, SEBI Takeovers',
        'bio'         => 'Advises leading domestic conglomerates, private equity giants, and Fortune 500 multinationals on high-value public takeovers, demergers, and capital reductions under the Companies Act 2013 and NCLT jurisprudence.',
        'image'       => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
        'linkedin'    => 'https://linkedin.com',
        'email'       => 'shroff@vanguardpartners.law'
    ),
    array(
        'name'        => 'Meenakshi Sundaram',
        'title'       => 'Senior Partner - Insolvency, Banking & Restructuring',
        'experience'  => '25 Years Experience',
        'chambers'    => 'Mumbai & Chennai',
        'education'   => 'M.A., LL.B. (Madras Law College), Insolvency Professional (IBBI)',
        'expertise'   => 'Insolvency & Bankruptcy Code (IBC), CIRP Strategy, Avoidance Litigation, NCLAT',
        'bio'         => 'Foremost authority on IBC jurisprudence in India. Represents lead banks, asset reconstruction companies (ARCs), and resolution applicants in multi-thousand crore distressed asset acquisitions and debt restructurings.',
        'image'       => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80',
        'linkedin'    => 'https://linkedin.com',
        'email'       => 'sundaram@vanguardpartners.law'
    ),
    array(
        'name'        => 'Kavita Nambiar',
        'title'       => 'Partner & Head of IP, Technology & AI Law',
        'experience'  => '21 Years Experience',
        'chambers'    => 'Bengaluru & New Delhi',
        'education'   => 'B.Sc., LL.B. (Delhi University), LL.M. in IP & Cyberlaw (Columbia Law School)',
        'expertise'   => 'Patent Litigation, Generative AI Regulation, Standard-Essential Patents, DPDPA',
        'bio'         => 'Pioneering technology and IP litigator recognized for groundbreaking defense in software copyright, trade secrets, and digital personal data protection compliance before High Courts and the Supreme Court.',
        'image'       => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
        'linkedin'    => 'https://linkedin.com',
        'email'       => 'kavita@vanguardpartners.law'
    ),
    array(
        'name'        => 'Siddharth Chawla',
        'title'       => 'Partner - White-Collar Crime & Regulatory Defense',
        'experience'  => '24 Years Experience',
        'chambers'    => 'New Delhi & Mumbai',
        'education'   => 'LL.B. (Faculty of Law, DU), Diploma in Forensic Sciences',
        'expertise'   => 'PMLA & Enforcement Directorate, SFIO Corporate Investigations, CBI Courtroom Defense',
        'bio'         => 'Specialist defense counsel in complex corporate fraud, Prevention of Money Laundering Act (PMLA) trials, and international extraditions. Known for tactical courtroom advocacy and emergency bail jurisprudence.',
        'image'       => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
        'linkedin'    => 'https://linkedin.com',
        'email'       => 'chawla@vanguardpartners.law'
    )
);
?>

<!-- Banner Section -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag">Chambers Leadership</div>
                <h1 class="bnr_heading">Our People</h1>
                <p class="bnr_subtitle">
                    A formidable team of Senior Advocates, Partners, and Counsel combining forensic factual scrutiny with generational courtroom presence.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- People Directory Section -->
<section style="padding: 70px 0 100px 0; background: #fbfbfd;">
    <div class="container-custom">

        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px;">
            <?php 
            $p_idx = 0;
            foreach ($leaders as $leader) : 
                $p_idx++;
                $p_delay = ($p_idx % 2 == 1) ? 100 : 250;
            ?>
                <div style="background: #ffffff; border: 1px solid var(--border-card); border-radius: var(--card-radius-curve); overflow: hidden; box-shadow: 0 6px 20px rgba(51, 39, 32, 0.06); display: flex; flex-direction: column; position: relative;" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($p_delay); ?>">
                    
                    <div style="display: flex; gap: 24px; padding: 30px; border-bottom: 1px solid #f1f5f9;">
                        <!-- Lawyer Photo -->
                        <div style="width: 130px; height: 160px; border-radius: var(--card-image-radius); overflow: hidden; flex-shrink: 0; background: #0e172a;">
                            <img src="<?php echo esc_url($leader['image']); ?>" alt="<?php echo esc_attr($leader['name']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>

                        <!-- Header Info -->
                        <div style="flex: 1;">
                            <span style="font-size: 0.74rem; font-weight: 700; text-transform: uppercase; color: var(--color-gold); letter-spacing: 0.08em; display: inline-block; margin-bottom: 4px;">
                                <?php echo esc_html($leader['experience']); ?>
                            </span>
                            <h2 style="font-family: var(--font-serif); font-size: 1.6rem; color: var(--color-dark); margin-bottom: 6px; line-height: 1.25;">
                                <?php echo esc_html($leader['name']); ?>
                            </h2>
                            <div style="font-size: 0.9rem; font-weight: 600; color: #64748b; margin-bottom: 10px;">
                                <?php echo esc_html($leader['title']); ?>
                            </div>
                            <div style="font-size: 0.82rem; color: #94a3b8;">
                                📍 <?php echo esc_html($leader['chambers']); ?>
                            </div>

                            <!-- Social / Email Contact -->
                            <div style="display: flex; gap: 10px; margin-top: 14px;">
                                <a href="<?php echo esc_url($leader['linkedin']); ?>" target="_blank" rel="noopener noreferrer" style="width: 32px; height: 32px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #475569;" title="LinkedIn">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                                </a>
                                <a href="mailto:<?php echo esc_attr($leader['email']); ?>" style="width: 32px; height: 32px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #475569;" title="Email">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Bio & Expertise -->
                    <div style="padding: 24px 30px 28px 30px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <p style="font-size: 0.92rem; color: #554a43; line-height: 1.65; margin-bottom: 16px;">
                                <?php echo esc_html($leader['bio']); ?>
                            </p>
                            <div style="background: rgba(197, 160, 89, 0.08); border-left: 3px solid var(--color-gold); padding: 10px 14px; border-radius: 0 4px 4px 0; font-size: 0.82rem; color: #332720; margin-bottom: 14px;">
                                <strong>Practice Areas: </strong><?php echo esc_html($leader['expertise']); ?>
                            </div>
                        </div>
                        <div style="font-size: 0.8rem; color: #94a3b8; border-top: 1px solid #f1f5f9; padding-top: 14px;">
                            <strong>Education: </strong><?php echo esc_html($leader['education']); ?>
                        </div>
                    </div>

                    <div class="bggrdnt"></div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php
get_footer();
