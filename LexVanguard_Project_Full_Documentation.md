# ⚖️ Malhotra & Co. Advocates & Solicitors — Full Platform Architecture & Manual (v1.7.0)

**Document Version:** 1.7.0 Client Integrated Production Edition  
**Platform:** WordPress 6.0+ / PHP 7.4 - 8.3+ / Elementor & Elementor Pro  
**Designed for:** Malhotra & Co. Advocates & Solicitors  
**Principal Chambers:** B-33, 1st Floor, Jangpura Extension, New Delhi – 110014  
**Managing Partner:** Chaitanya Malhotra (Advocate, Supreme Court of India & Delhi High Court)  
**Direct Contact:** +91 90135 35766 | chaitanyamlegal@gmail.com  
**Repository:** [github.com/aurav2001/Legal_site](https://github.com/aurav2001/Legal_site)  
**Date:** November 2026  

---

## 1. Executive Summary & Brand Positioning
**Malhotra & Co.** is a boutique law firm with more than 50 years of courtroom practice and three generations in the profession. We act in litigation and advisory matters where careful strategy and focused, partner-led attention make the difference.

* **Our Endeavour:** "We take your case off your shoulders. Our aim is to handle your matter with care, keep you informed and stress-free, and bring it to a close on time, so you can return to your business."
* **Core Values (4 Pillars):** Integrity, Strategy, Timeliness, Confidentiality.
* **Visual Brand Aesthetic:** Deep Royal Navy (`#0b111e`), Regal Metallic Gold (`#c5a059`), Cardo editorial serif headings, clean Inter UI typography, classical architectural column motif, and signature `16px 0 45px 0` curved cards.
* **Technical Performance:** Pure Vanilla JavaScript Animate-on-Scroll engine, strict HTML5 validation, and optimized Core Web Vitals.
* **Operational Autonomy:** 100% editable from WordPress Admin via Theme Options, Custom Post Types, and drag-and-drop Elementor Page Builder.

---

## 2. Master Theme Options Panel (`Appearance ➔ Theme Options`)
A centralized, tabbed administrative control center synchronized with the native WordPress Customizer (`Appearance ➔ Customize`), allowing complete site personalization without code modifications:
* **🏛️ General & Branding:** Firm name (`Malhotra & Co.`), gold accent (`& Co.`), firm sub-tagline (`Advocates & Solicitors`), custom logo uploader, and header consultation button text & link.
* **🚀 Homepage Hero Banner:** Hero main heading (`Trusted Counsel Across Three Generations`), firm descriptive paragraph, CTA buttons text and URLs, and hero visual arch image uploader.
* **📊 Welcome & Chamber Statistics:** Welcome headline, description, 3 live counter badges (`Serving Since 1967`, `50+ Years of Heritage`, `3 Generations`), and Strategic Counsel quote card with story link.
* **📞 Chambers & Offices Directory:** Addresses, telephone numbers (`+91 90135 35766`), emails (`chaitanyamlegal@gmail.com`), and direct Google Maps links for Principal Chambers (`B-33, 1st Floor, Jangpura Extension, New Delhi`) and Court Chambers (Supreme Court & Delhi High Court Bar).
* **🌐 Footer & Social Media Links:** Footer institutional bio, social handles, and dynamic copyright notice.

---

## 3. Custom Post Types (Dedicated WordPress Admin Modules)
To structure firm data, three dedicated Custom Post Types (CPTs) have been architected with tailored meta boxes and pre-seeded production data:
* **👨‍⚖️ Lawyers & Leadership (`team_member`):** Featuring Managing Partner **Chaitanya Malhotra** (Advocate, Supreme Court of India & Delhi High Court | B.A. LL.B., Diploma in IPR). Custom fields: Designation, Bar Admission/Chambers, Court Experience, Education, Practice Expertise, Direct Email, LinkedIn URL, and High-Resolution Portrait.
* **🏛️ Core Practice Disciplines (`practice_area`):** Dedicated menu covering:
  1. *Commercial Litigation (Contractual, shareholder, and business disputes)*
  2. *Domestic & Institutional Arbitration (SIAC, ICC, and Indian Arbitration Act)*
  3. *Civil Litigation (Property, tenancy, succession, and recovery matters)*
  4. *Criminal Litigation & White-Collar Matters (Economic offences and regulatory defense)*
  5. *Startup Advisory & Policy Engagement (Regulatory compliance support for emerging businesses)*
  6. *Appellate & Supreme Court Litigation (SLPs, Review & Curative Petitions, Constitutional Benches)*
  7. *Tribunal Practice (NCLAT & DRAT representations)*
* **Forums Appeared Before:** Supreme Court of India, High Court of Delhi, National Company Law Appellate Tribunal (NCLAT), and Debts Recovery Appellate Tribunal (DRAT).
* **Legal Awards & Accolades (`award`):** Dedicated menu managing benchmark honors from Chambers Global, The Legal 500 Asia Pacific, India Business Law Journal (IBLJ), and BW Legal World.
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
* **One-Click Inquiries CSV Exporter:** Instant export button on the admin leads table to download client consultation records into a UTF-8 BOM formatted CSV spreadsheet for Microsoft Excel and Google Sheets.

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

## 8. Native Legal Tech SEO & Schema.org Rich Snippets
Built-in structured data and social sharing optimization without relying on heavy third-party plugins:
* **Schema.org/LegalService & Attorney Markup:** Injects comprehensive JSON-LD structured data with firm credentials, practice jurisdictions (Supreme Court, High Courts, NCLAT), address, operating hours, and consultation fee structure for Google Rich Snippets.
* **ScholarlyArticle & Breadcrumb Schema:** Automatically marks up legal briefings, research insights, and hierarchical breadcrumb trails for Google search indexing.
* **High-End Social Open Graph & Twitter Cards:** Produces luxury card previews on WhatsApp, LinkedIn, and Twitter with custom title, excerpt, and high-resolution thumbnail.
* **Instant URL Copy Utility:** Dynamic copy-to-clipboard action with feedback on insight briefings.

---

## 9. Deployment & Installation Guide
The theme is packaged into standard WordPress distribution archives ready for production hosting:
* **Production ZIP Package:** `releases/lexvanguard-v1.6.0.zip` (installable via WordPress Admin > Appearance > Themes > Add New > Upload Theme).
* **Source Code Control:** Git repository synchronized on the `main` branch at `https://github.com/aurav2001/Legal_site.git`.
* **Server Compatibility:** WordPress 6.0+, PHP 7.4 through 8.3+, MySQL 5.7+ / MariaDB 10.3+, Elementor & Elementor Pro.

