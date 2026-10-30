# Legal Insights & Law Firm WordPress Theme (AGL Style)
> Full Site Replicating & Refining [AGL - Agarwal Law Associates](https://aglaw.in/) — Tailored for Supreme Court Advocates, Corporate Law Firms & Legal Consultants.

---

## 🛠️ WordPress Admin se Edit Kaise Karein? (100% Fully Editable)

Theme ab poori tarah se WordPress Dashboard se editable hai — bina kisi PHP file ko hath lagaye:

### 1. Appearance &rarr; Theme Options (Master Control Panel)
WordPress Admin me **Appearance &rarr; Theme Options** me jayein:
- 🏛️ **General & Branding:** Law firm name (e.g. `Malhotra & Co.`), Tagline, Logo image upload, Header button text & URL.
- 🚀 **Homepage Hero:** Main heading, gold highlight word, description paragraph, buttons text/links, hero image upload, circular floating badge ("60+ Years").
- 📊 **Welcome & Stats:** Welcome heading, description, 3 stats pills (1964, 11 Practice Areas, 500+ Landmark Cases), Strategic Counsel quote card & link.
- 📞 **Chambers & Contact:** Corporate HQ & Supreme Court Chambers ka address, phone numbers, email addresses, aur Google Maps links.
- 🌐 **Footer & Socials:** Footer description text, LinkedIn, YouTube, Twitter/X, Instagram URLs, aur dynamic Copyright notice.
- ⚖️ **BCI Disclaimer:** Bar Council of India disclaimer popup ko enable/disable karein, disclaimer points aur accept button text customize karein.

*(Note: Sabhi settings native **Appearance &rarr; Customize** me bhi available hain!)*

### 2. Our Team / Lawyers (Dedicated Admin Menu)
WordPress sidebar me **Our Team / Lawyers** par click karein:
- **Add New Member** par click karke naye advocates/partners add karein ya existing ko edit karein.
- Fields: Name, Designation/Title, Experience, Chambers/Bar, Education, Practice Expertise, Email, LinkedIn, aur Photo (Featured Image).

### 3. Practice Areas (Dedicated Admin Menu)
WordPress sidebar me **Practice Areas** par click karein:
- Nayi practice verticals add karein, content aur landmark court precedents edit karein.

### 4. Awards & Honors (Dedicated Admin Menu)
WordPress sidebar me **Awards & Honors** par click karein:
- National & Global legal awards add/edit karein with Year, Ranking body (Legal 500, Chambers Global), description aur badge image.

### 5. WordPress Page Editor (Pages &rarr; Edit)
- Kisi bhi page (Home, About Us, Contact Us, Our People, Practice Areas) ko WordPress editor me open karke custom content type karein — wo directly frontend par render hoga!
- Page ke niche diye gaye **Custom Meta Box** se page-specific headings aur override values bhi set kar sakte hain.

### 6. 🎨 Elementor Page Builder Support (100% Visual Drag-and-Drop)
- **Edit With Elementor Support on ALL Pages:** Kisi bhi page (Home, About Us, Contact Us, Our People) par **"Edit with Elementor"** button dabayein — Elementor bina kisi template error ke open hoga aur jo design aap banayenge wo frontend par live render hoga.
- **Dedicated Page Templates:**
  - `Elementor Full Width (LexVanguard)`: Theme ka sticky header + footer retain karte hue edge-to-edge full width layout deta hai.
  - `Elementor Canvas (LexVanguard)`: 100% blank page custom landing pages ke liye.
- **Custom Legal Drag-and-Drop Widgets:**
  Elementor panel me **"LexVanguard Legal Elements"** category ke under ready-made drag-and-drop widgets diye gaye hain:
  - ⚖️ *Law Firm Hero Banner* (Heading, gold highlight, badges, arch visual)
  - 📊 *Law Firm Counter Stats* (1964 Established, 11 Practice Areas, 500+ Cases)
  - 🏛️ *Curved Practice Card* (Architectural curve shape with gold glow)
  - 👤 *Advocate Profile Card* (Photo, title, experience badge, bio, email, socials)

---

## 🌟 Site Pages Included (Theme me konse-konse Pages hain?)

Is WordPress theme me `aglaw.in` ke sabhi main pages aur sub-pages complete templates aur static HTML preview ke saath ready hain:

| Page Name | WordPress Template File | Local HTML Preview File | Description |
| :--- | :--- | :--- | :--- |
| **Home Page** | `front-page.php` | `home.html` | Hero banner ("With You In Every Challenge"), 3 Pillars, 11 Practice Areas Grid, Testimonials (Adani, Essar, Chambers), In The News & Latest Insights. |
| **About Us** | `page-about.php` | `about.html` | 1964 Heritage statement, 4 Core Values (Client-Centric, Trust, Approachable, Transparent), Vision & Mission, Leaders Speak. |
| **Our People** | `page-people.php` | `people.html` | Our Leaders (Mahesh Agarwal, E.C. Agrawala, Rishi Agrawala), Associate Partners (Manu Krishnan, Rajeev Kumar, Ankur Saigal) aur Senior Associates Grid. |
| **Our Expertise** | `page-expertise.php` | `expertise.html` | 3 Core Jurisdictions (Litigation across Courts, ADR, Corporate & Commercial) with in-depth descriptions. |
| **Practice Area Detail** | `page-practice-detail.php` | `practice-detail.html` | Single Practice Area Template (e.g. Arbitration) with Landmark Case Precedents (Sukanya Holdings, ONGC vs Saw Pipes, DMRC Curative Petition, Manipal SIAC, etc.) & Sidebar Navigation. |
| **Our Awards** | `page-awards.php` | `awards.html` | Dedicated Honours & Recognitions gallery (India Business Law Journal, The Lawyer Network, Chambers Asia-Pacific, Chambers Global, A-List Lawyers). |
| **Insights Hub** | `page-insights.php` | `preview.html` | Interactive Category Filter Tabs (`All Publications`, `Blogs & Articles`, `Media & Events`, `Supreme Court Digest`), Live Search, Reading Time & Curve Cards. |
| **Single Insight Article** | `single.php` | Modal view in `preview.html` | 2-Column reading view (8 cols content + 4 cols Related Posts sidebar + Key Takeaways + Social Share). |
| **Contact Us** | `page-contact.php` | `contact.html` | Corporate Office (Mercantile House, KG Marg) + Supreme Court Chambers (Bhagwan Dass Road) + Confidential Inquiry Form. |
| **Privacy Policy** | `page-privacy.php` | `privacy.html` | Bar Council of India (BCI) Regulatory Disclaimers & Data Protection Policy. |

---

## 🎨 Key Visual & Animation Features (Design Highlights)

1. **Section Reveal Animations (AOS):**
   - Pure CSS/JS IntersectionObserver engine matching AOS (`fade-up`, `fade-left`, `fade-right`, `slide-up`) with smooth staggered delays.
2. **Signature Architectural Curve Shape ("Curve Chape"):**
   - Asymmetric border radius: `border-radius: 16px 0 45px 0` (Top-Left 16px, Bottom-Right 45px).
   - Card image radius: `16px 0 0 0`.
   - Dynamic corner glow element (`.bggrdnt`) with gold accents on hover.
3. **Category Tabs with Golden Sliding Top Border:**
   - Active indicator line animated at the top (`::before` / `-3px top`), exactly matching `aglaw.in/insights`.
4. **Practice Areas Dropdown:**
   - Nav bar me 11 legal practice verticals ka complete dropdown menu.
5. **Bar Council of India (BCI) Compliance Modal:**
   - Regulatory popup with "I Accept & Proceed" button (session-based, footer se reopenable).

---

## 💻 Local Browser Testing (Bina PHP / WP Server ke Direct Run karein)

Aap bina kisi server ke in sabhi pages ko direct browser me open karke live animation aur layout check kar sakte hain:
- **Home**: `http://localhost:5173/wp-theme-legal-insights/home.html`
- **About Us**: `http://localhost:5173/wp-theme-legal-insights/about.html`
- **Our People**: `http://localhost:5173/wp-theme-legal-insights/people.html`
- **Our Expertise**: `http://localhost:5173/wp-theme-legal-insights/expertise.html`
- **Practice Area Detail**: `http://localhost:5173/wp-theme-legal-insights/practice-detail.html`
- **Our Awards**: `http://localhost:5173/wp-theme-legal-insights/awards.html`
- **Insights**: `http://localhost:5173/wp-theme-legal-insights/preview.html`
- **Contact Us**: `http://localhost:5173/wp-theme-legal-insights/contact.html`
- **Privacy Policy**: `http://localhost:5173/wp-theme-legal-insights/privacy.html`

*(Ya fir folder me jakar kisi bhi `.html` file par double-click karein!)*

---

## 🚀 WordPress me Install Kaise Karein? (1-Click Installation)

Root folder me `wp-theme-legal-insights.zip` archive generate kiya hua hai:
1. Apne WordPress Dashboard me login karein: `yourdomain.com/wp-admin`
2. Left menu me jayein: **Appearance &rarr; Themes**
3. Upar **Add New Theme** par click karein &rarr; **Upload Theme**
4. `wp-theme-legal-insights.zip` select karein aur **Install Now** par click karein
5. **Activate** par click karein!

### WordPress Pages Create Karna:
WP Admin me **Pages &rarr; Add New** karein aur Page Template dropdown me select karein:
- **Home**: Template automatic `front-page.php` load karega
- **About Us**: Select Template &rarr; `About Us`
- **Our People**: Select Template &rarr; `Our People`
- **Our Expertise**: Select Template &rarr; `Our Expertise`
- **Arbitration / Practice**: Select Template &rarr; `Practice Area Detail`
- **Our Awards**: Select Template &rarr; `Our Awards`
- **Insights**: Select Template &rarr; `Insights Archive (AGL Style)`
- **Contact Us**: Select Template &rarr; `Contact Us`
- **Privacy Policy**: Select Template &rarr; `Privacy Policy & Disclaimer`

### 1-Click Demo Posts Seed:
Agar fresh WP install hai to admin login ke baad simply open karein:
`https://yourdomain.com/wp-admin/?seed_insights=1`
(Ye automatic sample categories aur legal articles create kar dega).
