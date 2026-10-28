# ⚖️ Malhotra & Co. — Luxury Law Firm & Legal Knowledge Hub Platform

[![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-21759b?style=for-the-badge&logo=wordpress&logoColor=white)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-7.4%20|%208.0%2B-777bb4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Responsive](https://img.shields.io/badge/Mobile-100%25%20Responsive-brightgreen?style=for-the-badge&logo=responsive&logoColor=white)](#-100-mobile--phone-responsiveness)
[![BCI Compliant](https://img.shields.io/badge/BCI-Regulatory%20Compliant-c5a059?style=for-the-badge)](#-regulatory-compliance-bci)
[![React](https://img.shields.io/badge/React-19.2-61dafb?style=for-the-badge&logo=react&logoColor=black)](https://react.dev/)
[![License](https://img.shields.io/badge/License-GPL%20v2-blue?style=for-the-badge)](http://www.gnu.org/licenses/gpl-2.0.html)

> **Malhotra & Co.** is a state-of-the-art, Tier-1 luxury legal digital platform and WordPress theme modeled after India’s foremost Supreme Court appellate chambers (inspired by [Agarwal Law Associates](https://aglaw.in/)). 
> 
> Engineered for senior courtroom counsel, corporate dispute practices, arbitration specialists, and institutional law firms.

---

## 🏛️ What Is Inside This Repository? (3-in-1 Architecture)

This repository houses a complete, multi-tier legal platform with 3 production-ready options:

| Component | Path | Description |
| :--- | :--- | :--- |
| **WordPress Theme** | [`wp-theme-legal-insights/`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/) | Fully functional custom WordPress theme with auto-menu setup, 1-click sample content seeding, custom post types, and template pages. |
| **Ready-to-Install ZIPs** | [`releases/`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/releases/) | Pre-packaged `.zip` files ready to upload straight to WordPress Admin (`Appearance > Themes > Upload Theme`). |
| **Standalone HTML5 Suite** | [`wp-theme-legal-insights/*.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/) | 10 static HTML5 pages with zero server dependencies — double-click or host anywhere. |
| **React + Vite App** | [`src/`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/src/) | Modern React 19 web app featuring an interactive Procedural Timeline Estimator, Privileged Consultation Modal, and instant global search. |

---

## 📱 100% Mobile & Phone Responsiveness

The platform features an uncompromising mobile user experience tailored for smartphone viewports ($320\text{px}$ to $480\text{px}$) and tablets ($768\text{px}$ to $991\text{px}$):

- **Luxury Slide-Down Mobile Drawer:**
  - Tapping the hamburger button triggers an animated slide-down navigation drawer with glassmorphism blur and subtle gold trim.
  - Active links and hover states have dedicated gold indicators and smooth transitions.
- **Close "X" Morphing Animation:**
  - 3-bar gold hamburger icon smoothly transforms into a clean Close "X" on mobile.
  - Body scroll locking (`mobile-nav-lock`) prevents background page scroll while menu is open.
- **Practice Areas Mobile Accordion:**
  - On mobile touch screens, tapping **"Practice Areas ▾"** expands/collapses the 11 legal vertical sub-links with an animated chevron, without forcing page reload.
- **Outside Click & Escape Dismissal:**
  - Menu auto-closes when tapping outside or pressing the `Esc` key.
- **Fluid Typography:**
  - Hero and section headings utilize responsive `clamp()` CSS scales to prevent line breaks or clipping on narrow screens.
- **Touch Targets & Form Inputs:**
  - All form controls on mobile have minimum $46\text{px}$ touch targets and $16\text{px}$ font sizes to eliminate unwanted auto-zoom on iOS Safari.

---

## 📑 Complete Page & Template Directory

| Page Name | WordPress Template | Local HTML Preview | Key Features |
| :--- | :--- | :--- | :--- |
| **Home Page** | [`front-page.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/front-page.php) | [`home.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/home.html) | Hero banner with arch architectural visual, 3-pillar core overview, 11 interactive practice showcase, leadership spotlight, news & publications. |
| **About Us** | [`page-about-us.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/page-about-us.php) | [`about.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/about.html) | 1964 Heritage statement, 4 foundational values cards (Client-Centric, Trust, Approachable, Transparent), mission & courtroom history. |
| **Our People** | [`page-our-people.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/page-our-people.php) | [`people.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/people.html) | Leadership directory with Senior Advocates, Partners, bar admissions, chambers locations, bios, and direct contact buttons. |
| **Our Expertise** | [`page-our-expertise.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/page-our-expertise.php) | [`expertise.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/expertise.html) | Deep dives into 3 primary courtroom pillars (Commercial Litigation, ADR / Arbitration, Corporate Restructuring) + 11 sector verticals. |
| **Practice Detail** | [`page-practice-detail.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/page-practice-detail.php) | [`practice-detail.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/practice-detail.html) | Focused practice view (e.g. Arbitration & ADR) with landmark precedent citations (*Sukanya Holdings*, *ONGC*, *DMRC Curative*) & sidebar links. |
| **Our Awards** | [`page-our-awards.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/page-our-awards.php) | [`awards.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/awards.html) | Prestigious recognitions showcase (*Chambers Global*, *Legal 500*, *India Business Law Journal*, *The Lawyer Network*). |
| **Insights Hub** | [`page-insights.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/page-insights.php) | [`preview.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/preview.html) | Category filter tabs with animated gold top-border indicator, live client-side search, estimated reading times, and curved digest cards. |
| **Single Article** | [`single.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/single.php) | In `preview.html` | Editorial article reading view with key takeaway callout, breadcrumb trail, author metadata, and sticky related articles sidebar. |
| **Contact Us** | [`page-contact-us.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/page-contact-us.php) | [`contact.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/contact.html) | Supreme Court Chambers & New Delhi Corporate Office cards, Google Maps deep-links, and privileged client inquiry form. |
| **Privacy & Disclaimer**| [`page-privacy.php`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/page-privacy.php) | [`privacy.html`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/privacy.html) | Statutory Bar Council of India (BCI) disclaimer, website terms of access, and statutory confidentiality disclosures. |

---

## 🎨 Architectural Design Highlights

```
Top-Left: 16px ────┬─────────────────────────────┬── Top-Right: 0px
                   │                             │
                   │   Signature Architectural   │
                   │         Curve Card          │
                   │  (border-radius: 16 0 45 0) │
                   │                             │
Bottom-Left: 0px ──┴─────────────────────────────┴── Bottom-Right: 45px
```

1. **Signature Architectural Curve Card:**
   - Asymmetric border radius: `border-radius: 16px 0 45px 0` matching high-end architectural firm identity.
   - Dynamic corner accent glow (`.bggrdnt`) that responds to cursor hover.
2. **High-Performance Scroll Reveal Engine:**
   - Lightweight native `IntersectionObserver` scroll reveal engine in [theme.js](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/assets/js/theme.js). Zero jQuery dependency required.
3. **Curated Color Palette:**
   - Imperial Navy: `#0b111e` & `#0e172a`
   - Regal Gold & Ochre: `#c5a059` & `#b89146`
   - Gallery White & Warm Parchment: `#fbfbfd` & `#f4eee4`
4. **Editorial Typography:**
   - Serif: *Cardo* & *DM Serif Display* for legal dignity and gravitas.
   - Sans: *Inter* & *Poppins* for razor-sharp legibility.

---

## 🚀 Installation & Quick Start

### Option 1: Install in WordPress (Recommended)

1. Download [`releases/lexvanguard.zip`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/releases/lexvanguard.zip) or [`wp-theme-legal-insights.zip`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights.zip).
2. Log into your WordPress Admin panel (`yourdomain.com/wp-admin`).
3. Navigate to **Appearance &rarr; Themes &rarr; Add New Theme &rarr; Upload Theme**.
4. Choose the `.zip` file and click **Install Now**.
5. Click **Activate**.

#### Auto-Setup Features in WordPress:
- **Primary Menu:** The theme automatically creates and assigns the primary navigation menu with the 11 practice area dropdown items.
- **1-Click Demo Content Seeding:** After activation, visit:
  ```
  https://yourdomain.com/wp-admin/?seed_insights=1
  ```
  This creates sample practice pages, sample legal articles, and taxonomies automatically.

---

### Option 2: Standalone Static HTML (Zero Setup)

Double click any `.html` file inside [`wp-theme-legal-insights/`](file:///c:/Users/Gulshan%20Pandey/Desktop/legal%20site/wp-theme-legal-insights/) or run a local static server:

```bash
# If using Python
python -m http.server 8000

# Open in browser:
http://localhost:8000/wp-theme-legal-insights/home.html
```

---

### Option 3: React + Vite Application

For developing or extending the interactive React web application:

```bash
# Install dependencies
npm install

# Start development server
npm run dev

# Build production bundle
npm run build
```

---

## 📂 Repository Structure

```
legal-site/
├── wp-theme-legal-insights/          # Complete WordPress Theme & Static Suite
│   ├── front-page.php                # Homepage template
│   ├── header.php                    # Sticky header with mobile drawer & BCI modal
│   ├── footer.php                    # 3-column footer with firm credentials
│   ├── functions.php                 # Theme setup, enqueues, auto-menu & demo seeder
│   ├── style.css                     # Master responsive stylesheet (v1.2.6)
│   ├── page-about-us.php             # About Us template
│   ├── page-our-people.php           # Senior Advocates & Partners directory
│   ├── page-our-expertise.php        # 11 Practice Areas showcase
│   ├── page-practice-detail.php      # Single practice case study template
│   ├── page-our-awards.php           # Honours & awards gallery
│   ├── page-insights.php             # Filterable legal insights hub
│   ├── page-contact-us.php           # Chambers & office contact template
│   ├── page-privacy.php              # BCI disclaimer & privacy policy
│   ├── single.php                    # Single insight article reading view
│   ├── home.html                     # Standalone Homepage preview
│   ├── about.html                    # Standalone About preview
│   ├── people.html                   # Standalone People preview
│   ├── expertise.html                # Standalone Expertise preview
│   ├── practice-detail.html          # Standalone Practice Detail preview
│   ├── awards.html                   # Standalone Awards preview
│   ├── preview.html                  # Standalone Insights preview
│   ├── contact.html                  # Standalone Contact preview
│   ├── privacy.html                  # Standalone Privacy preview
│   └── assets/
│       └── js/theme.js               # Pure JS AOS, mobile drawer & modal logic
├── src/                              # React 19 + Vite Application
│   ├── components/                   # React components (Navbar, Hero, Modals, Estimator)
│   ├── data/legalData.js             # Chambers directory & practice datasets
│   ├── index.css                     # React design tokens & utilities
│   └── App.jsx                       # Main application layout
├── releases/                         # Pre-built WordPress Theme Zip Archives
│   ├── lexvanguard.zip               # Production theme zip
│   └── lexvanguard-v1.2.6.zip        # Versioned release archive
├── build_zips.ps1                    # PowerShell script to rebuild theme zip packages
├── package.json                      # NPM configuration
└── README.md                         # Project documentation
```

---

## ⚖️ Regulatory Compliance (BCI)

Under the rules framed by the **Bar Council of India (BCI)** under the *Advocates Act, 1961*, law firms and legal practitioners in India are strictly prohibited from advertising or soliciting work.

This website and theme integrate an automated, session-based **BCI Regulatory Disclaimer Modal**:
- Displays on initial visit, asking the user to confirm voluntary access for informational purposes.
- Remembers consent for the browser session.
- Allows user re-verification via the "BCI Disclaimer" trigger in the footer.

---

## 🛠️ Rebuilding Distribution ZIPs

If you make modifications to files within `wp-theme-legal-insights/`, re-package the zip files anytime with:

```powershell
powershell -ExecutionPolicy Bypass -File .\build_zips.ps1
```

---

## 📜 License & Copyright

- **Code:** Licensed under the [GNU General Public License v2.0](http://www.gnu.org/licenses/gpl-2.0.html).
- **Brand & Content:** © 2026 Malhotra & Co. Advocates & Partners. All Rights Reserved.
