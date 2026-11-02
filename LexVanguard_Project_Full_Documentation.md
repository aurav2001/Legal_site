# ⚖️ LexVanguard Law Firm Platform — Full Architecture & Feature Manual (v1.5.0)

**Document Version:** 1.5.0 Enterprise Production Edition  
**Platform:** WordPress 6.0+ / PHP 7.4 - 8.3+ / Elementor & Elementor Pro  
**Designed for:** Malhotra & Co. Advocates & Supreme Court Counsel  
**Repository:** [github.com/aurav2001/Legal_site](https://github.com/aurav2001/Legal_site)  
**Date:** November 2026  

---

## 1. Executive Summary & Brand Positioning
The **LexVanguard** platform is an enterprise-grade, luxury legal content management system and custom WordPress theme engineered specifically for Tier-1 law firms, Senior Advocates, and appellate counsel. It merges high-end courtroom brand positioning with complete administrative autonomy.

* **Visual Brand Aesthetic:** Deep Royal Navy (`#0b111e`), Regal Metallic Gold (`#c5a059`), Cardo editorial serif headings, and clean Inter UI typography with signature `16px 0 45px 0` architectural curved cards.
* **Technical Performance:** Pure Vanilla JavaScript Animate-on-Scroll engine (zero jQuery dependency for animations), strict HTML5 semantic validation, and optimized Core Web Vitals.
* **Operational Autonomy:** 100% editable from WordPress Admin via Master Theme Options, Custom Post Types (CPTs), and visual drag-and-drop Elementor Page Builder.

---

## 2. Master Theme Options Panel (`Appearance ➔ Theme Options`)
A centralized, tabbed administrative control center synchronized with the native WordPress Customizer (`Appearance ➔ Customize`), allowing complete site personalization without code modifications:
* **🏛️ General & Branding:** Law firm name, regal gold accent text, firm sub-tagline, custom logo uploader (from WordPress media library), and header consultation button text & link.
* **🚀 Homepage Hero Banner:** Hero main heading, gold highlight keyword, sub-tagline, firm descriptive paragraph, CTA buttons text and URLs, and hero visual arch image uploader.
* **📊 Welcome & Chamber Statistics:** Welcome headline, description, 3 live counter badges (`1964 Established`, `11 Practice Areas`, `500+ Landmark Cases`), and Strategic Counsel quote card with story link.
* **📞 Chambers & Offices Directory:** Addresses, telephone numbers, emails, and direct Google Maps links for Corporate HQ (Connaught Place, New Delhi) and Supreme Court Chambers (Tilak Marg Desk).
* **🌐 Footer & Social Media Links:** Footer institutional bio, social handles (LinkedIn, YouTube, Twitter/X, Instagram), and dynamic copyright notice.

---

## 3. Custom Post Types (Dedicated WordPress Admin Modules)
To structure complex firm data, three dedicated Custom Post Types (CPTs) have been architected with tailored meta boxes and pre-seeded production data:
* **👨‍⚖️ Lawyers & Leadership (`team_member`):** Dedicated menu to manage Partners, Senior Advocates, and Associates. Custom fields: Designation, Bar Admission/Chambers, Court Experience, Education, Practice Expertise, Direct Email, LinkedIn URL, and High-Resolution Portrait.
* **🏛️ 11 Practice Verticals (`practice_area`):** Dedicated menu covering:
  1. *Arbitration & ADR (SIAC / LCIA / ICC)*
  2. *Commercial Litigation (High Courts & Commercial Courts)*
  3. *Competition Law (CCI & NCLAT)*
  4. *Corporate & Insolvency Laws (IBC / NCLT)*
  5. *Constitutional Law (Supreme Court Writs & SLPs)*
  6. *Criminal Law & White-Collar Defense (PMLA / ED / CBI)*
  7. *Environmental Law (National Green Tribunal - NGT)*
  8. *Regulatory Litigation (APTEL / TDSAT / PNGRB)*
  9. *Mediation & Conciliation*
  10. *Securities Law & SEBI (SAT Appeals)*
  11. *Taxation - Direct & Indirect (GST / ITAT)*
* **🏆 Legal Awards & Accolades (`award`):** Dedicated menu managing benchmark honors from Chambers Global, The Legal 500 Asia Pacific, India Business Law Journal (IBLJ), and BW Legal World.

---

## 4. Elementor Page Builder Integration (v1.5.0)
Full visual drag-and-drop website construction capabilities engineered with zero preview crashes:
* **Preview Crash Immunity:** A proprietary `legal_insights_is_elementor_page()` detection engine ensures Elementor preview opens instantly without freezing or blank screen issues.
* **Dedicated Elementor Templates:**
  - `Elementor Full Width (LexVanguard)`: Preserves luxury sticky header and footer with edge-to-edge section canvas.
  - `Elementor Canvas (LexVanguard)`: 100% blank canvas for dedicated landing pages.
* **4 Custom Elementor Legal Widgets:** Registered under "LexVanguard Legal Elements" in the Elementor tool pane:
  1. *Law Firm Hero Banner Widget*
  2. *Chamber Counter Stats Widget*
  3. *Curved Practice Area Cards Widget*
  4. *Advocate Profile Cards Widget*

---

## 5. In-House Client Inquiries & Leads Management CRM
Eliminating the need for expensive third-party CRM plugins (e.g. WPForms Pro, Gravity Forms, HubSpot), a native lead management pipeline is built directly into the theme:
* **Dedicated WP Admin Leads Desk:** Accessible via **Client Inquiries** in the WordPress admin menu with custom columns: Client Name, Direct Phone (clickable `tel:`), Official Email (clickable `mailto:`), Practice Area, Urgency Badge, Status, and Date.
* **Lead Status Lifecycle Tracker:** A built-in lead meta box enables legal registry staff to track inquiries through 5 progressive stages:
  `🔵 New Lead` ➔ `🟡 In Review by Counsel` ➔ `🟣 Contacted Client` ➔ `🟢 Retained / Client Engaged` ➔ `⚪ Closed / Resolved`.
* **Zero-Reload AJAX Intake Form:** High-converting intake form on the `Contact Us` page featuring fields for Name, Email, Phone, Practice Jurisdiction, Target Judicial Forum (Supreme Court, High Court, NCLT, CCI, etc.), Matter Urgency level (`🚨 Emergency 24-48h`, `⚡ High`, `Normal`), and Mandate Outline.
* **Dual Automated HTML Email Dispatch:** Automated dispatch via `wp_mail()`:
  1. *Counsel Desk Alert:* Instant notification to firm counsel desk with case brief and admin link.
  2. *Client Privilege Acknowledgment:* Statutory privilege acknowledgment email to the prospective client citing Section 126 of the Indian Evidence Act.
* **Floating Chambers Hotline Desk:** Bottom-right floating WhatsApp / Emergency Helpline pill with pre-filled consultation message, toggleable on/off from Theme Options.

---

## 6. Regulatory Compliance & Bar Council of India (BCI) Shield
Indian legal ethics strictly prohibit advocate advertising and solicitation. The platform includes full statutory safeguards:
* **BCI Compliance Modal:** An elegant regulatory disclaimer modal intercepts first-time visitors with an "I Accept & Proceed" agreement, establishing voluntary information retrieval.
* **Session Storage Optimization:** Visitor consent is cached in browser `sessionStorage` to prevent disruptive re-prompts during active browsing sessions.
* **Manual Review Trigger:** A discrete "BCI Disclaimer" link in the footer allows visitors to re-open and review regulatory terms anytime.

---

## 7. Enterprise-Grade Security Hardening & Bot Defense
Multi-layered defensive security hardening protects the website from common WordPress exploits, scraping bots, and brute-force attacks:
* **Anti-Reconnaissance User Shield:** Blocks `?author=N` scanning and redirects requests to homepage, preventing tools like WPScan from discovering admin usernames. Restricts `/wp-json/wp/v2/users` to authenticated users only.
* **Brute-Force Authentication Cloaking:** Replaces verbose login errors with generic security notices, denying attackers verification of valid usernames.
* **HTTP Security Headers:** Sends `X-Frame-Options: SAMEORIGIN` (anti-clickjacking), `X-Content-Type-Options: nosniff`, `X-XSS-Protection: 1; mode=block`, and strict `Referrer-Policy`.
* **WordPress Footprint Masking:** Removes the generator meta tag, RSD link, WLW manifest, shortlinks, and `?ver=` asset query strings for anonymous visitors.
* **Form Spam Honeypot & Rate Limiting:** Includes an invisible decoy field to silently trap automated spam bots, plus an IP transient limiter capping submissions to 4 per 10 minutes.
* **Admin Theme File Editor:** The Theme File Editor (`Appearance ➔ Theme File Editor`) remains fully enabled for administrative development autonomy.

---

## 8. Developer Easter Egg (GP Signature Watermark)
A sophisticated developer signature watermark engineered for quick agency verification:
* **Secret Keystroke Trigger:** Typing `gpgp` (or `gpgp` + Enter) anywhere on the keyboard triggers a regal gold-and-navy monogram crest at the bottom-right corner.
* **Smart Auto-Dismiss & Hover Pause:** The watermark automatically fades out after exactly 5 seconds, pauses when hovered over by a cursor, and includes an instant dismiss (`×`) button.

---

## 9. Deployment & Installation Guide
The theme is packaged into standard WordPress distribution archives ready for production hosting:
* **Production ZIP Package:** `releases/lexvanguard-v1.5.0.zip` (installable via WordPress Admin > Appearance > Themes > Add New > Upload Theme).
* **Source Code Control:** Git repository synchronized on the `main` branch at `https://github.com/aurav2001/Legal_site.git`.
* **Server Compatibility:** WordPress 6.0+, PHP 7.4 through 8.3+, MySQL 5.7+ / MariaDB 10.3+, Elementor & Elementor Pro.
