# Legal Insights & Law Firm WordPress Theme (AGL Style)
> Full Site Replicating & Refining [AGL - Agarwal Law Associates](https://aglaw.in/) — Tailored for Supreme Court Advocates, Corporate Law Firms & Legal Consultants.

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
