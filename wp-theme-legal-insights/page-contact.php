<?php
/**
 * Template Name: Contact Us (AGL Style)
 *
 * Description: Law firm office, Supreme Court chambers, and confidential inquiry form
 *
 * @package Legal_Insights
 */

get_header();
?>

<!-- Banner Section -->
<section class="about-mn">
    <div class="container-custom">
        <div class="about-banner">
            <div class="about_banner_txt" data-aos="fade-right">
                <div class="bnr_tag">Chambers Engagement</div>
                <h1 class="bnr_heading">Contact Us</h1>
                <p class="bnr_subtitle">
                    Connect directly with our designated Senior Advocates and Partners at our Supreme Court Chambers and Central New Delhi Offices.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Office & Chambers Cards Section (.office-chamber like aglaw.in) -->
<section style="padding: 70px 0 90px 0; background: #fbfbfd;">
    <div class="container-custom">
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; margin-bottom: 60px;">
            
            <!-- Office Card -->
            <div style="background: #ffffff; border: 1px solid var(--border-card); border-radius: var(--card-radius-curve); padding: 38px; box-shadow: 0 6px 20px rgba(51, 39, 32, 0.06); position: relative; overflow: hidden;" data-aos="fade-right">
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-gold); letter-spacing: 0.12em; text-transform: uppercase; display: block; margin-bottom: 6px;">Corporate Headquarters</span>
                <h2 style="font-family: var(--font-serif); font-size: 1.8rem; color: var(--color-dark); margin-bottom: 16px;">Our Office</h2>
                <p style="font-size: 1rem; color: #554a43; line-height: 1.7; margin-bottom: 12px;">
                    Ground Floor, Mercantile House, 15, Kasturba Gandhi Marg, Connaught Place, New Delhi &ndash; 110001
                </p>
                <p style="font-size: 0.95rem; color: #554a43; margin-bottom: 12px;">
                    <strong>Telephone: </strong>+91 11 4220 0000, +91 11 2335 4330
                </p>
                <p style="font-size: 0.95rem; color: #554a43; margin-bottom: 24px;">
                    <strong>Email: </strong><a href="mailto:contact@vanguardpartners.law" style="color: var(--color-gold); font-weight: 600;">contact@vanguardpartners.law</a>
                </p>
                <a href="https://maps.google.com" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.92rem; font-weight: 600; color: var(--color-dark); text-decoration: underline;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>Find Us on Google Maps</span>
                </a>
                <div class="bggrdnt"></div>
            </div>

            <!-- Court Chambers Card -->
            <div style="background: #ffffff; border: 1px solid var(--border-card); border-radius: var(--card-radius-curve); padding: 38px; box-shadow: 0 6px 20px rgba(51, 39, 32, 0.06); position: relative; overflow: hidden;" data-aos="fade-left">
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-gold); letter-spacing: 0.12em; text-transform: uppercase; display: block; margin-bottom: 6px;">Apex Court Desk</span>
                <h2 style="font-family: var(--font-serif); font-size: 1.8rem; color: var(--color-dark); margin-bottom: 16px;">Our Court Chambers</h2>
                <p style="font-size: 1rem; color: #554a43; line-height: 1.7; margin-bottom: 12px;">
                    48 &amp; 74, Lawyers' Chambers, Supreme Court of India, Tilak Marg, New Delhi &ndash; 110001
                </p>
                <p style="font-size: 0.95rem; color: #554a43; margin-bottom: 12px;">
                    <strong>Telephone: </strong>+91 11 2338 2318, +91 11 2338 9629
                </p>
                <p style="font-size: 0.95rem; color: #554a43; margin-bottom: 24px;">
                    <strong>Email: </strong><a href="mailto:chambers@vanguardpartners.law" style="color: var(--color-gold); font-weight: 600;">chambers@vanguardpartners.law</a>
                </p>
                <a href="https://maps.google.com" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.92rem; font-weight: 600; color: var(--color-dark); text-decoration: underline;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>View Supreme Court Chambers Location</span>
                </a>
                <div class="bggrdnt"></div>
            </div>

        </div>

        <!-- Confidential Inquiry Form -->
        <div style="background: #ffffff; border: 1px solid var(--border-card-subtle); border-radius: var(--card-radius-curve); padding: 50px 40px; box-shadow: 0 8px 30px rgba(51, 39, 32, 0.05); max-width: 860px; margin: 0 auto;" data-aos="fade-up">
            <div style="text-align: center; margin-bottom: 36px;">
                <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--color-dark); margin-bottom: 10px;">Confidential Inquiries</h2>
                <p style="font-size: 0.95rem; color: #64748b;">
                    All communications are covered by strict statutory advocate-client privilege.
                </p>
            </div>

            <form action="" method="post" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Your Full Name *</label>
                    <input type="text" required placeholder="e.g. Alok Sharma" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Official Email *</label>
                    <input type="email" required placeholder="name@company.com" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Contact Number *</label>
                    <input type="tel" required placeholder="+91 98110 00000" style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Practice Jurisdiction</label>
                    <select style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none; background: #ffffff;">
                        <option>Supreme Court Litigation / SLP</option>
                        <option>Commercial Arbitration (Domestic / SIAC)</option>
                        <option>Corporate Restructuring &amp; M&amp;A</option>
                        <option>Insolvency &amp; IBC Proceedings</option>
                        <option>White-Collar Crime Defense</option>
                    </select>
                </div>
                <div style="grid-column: 1 / -1;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--color-dark); margin-bottom: 8px;">Brief Overview of Matter</label>
                    <textarea rows="4" placeholder="Brief factual context (Do not include sensitive confidential files here)..." style="width: 100%; padding: 12px 16px; border: 1px solid #deddda; border-radius: 8px; font-family: var(--font-sans); outline: none; resize: vertical;"></textarea>
                </div>
                <div style="grid-column: 1 / -1; text-align: center; margin-top: 10px;">
                    <button type="submit" class="prcd_btn" style="padding: 14px 44px;">Submit Privileged Inquiry</button>
                </div>
            </form>
        </div>

    </div>
</section>

<?php
get_footer();
