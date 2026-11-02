# PowerShell Script to Generate Beautiful Formatted Word Document (.docx)
$docPath = Join-Path (Get-Location).Path "LexVanguard_Project_Full_Documentation.docx"
if (Test-Path $docPath) { Remove-Item $docPath -Force }

$word = New-Object -ComObject Word.Application
$word.Visible = $false
$word.DisplayAlerts = 0

$doc = $word.Documents.Add()
$selection = $word.Selection

function Add-Heading($text, $level) {
    $selection.Style = "Heading $level"
    $selection.Font.Name = "Georgia"
    if ($level -eq 1) {
        $selection.Font.Size = 18
        $selection.Font.Bold = $true
        $selection.Font.Color = 0x1E110B # Deep Navy in BGR
    } elseif ($level -eq 2) {
        $selection.Font.Size = 14
        $selection.Font.Bold = $true
        $selection.Font.Color = 0x4691B8 # Gold tone
    } elseif ($level -eq 3) {
        $selection.Font.Size = 12
        $selection.Font.Bold = $true
        $selection.Font.Color = 0x333333
    }
    $selection.TypeText($text)
    $selection.TypeParagraph()
}

function Add-Paragraph($text) {
    $selection.Style = "Normal"
    $selection.Font.Name = "Calibri"
    $selection.Font.Size = 11
    $selection.Font.Color = 0x222222
    $selection.Font.Bold = $false
    $selection.ParagraphFormat.LineSpacingRule = 0 # Single
    $selection.ParagraphFormat.SpaceAfter = 6
    $selection.TypeText($text)
    $selection.TypeParagraph()
}

function Add-Bullet($title, $text) {
    $selection.Style = "Normal"
    $selection.Font.Name = "Calibri"
    $selection.Font.Size = 10.5
    $selection.ParagraphFormat.LeftIndent = 18
    $selection.ParagraphFormat.SpaceAfter = 4
    
    $selection.Font.Bold = $true
    $selection.Font.Color = 0x1E110B
    $selection.TypeText("• " + $title + ": ")
    
    $selection.Font.Bold = $false
    $selection.Font.Color = 0x444444
    $selection.TypeText($text)
    $selection.TypeParagraph()
    $selection.ParagraphFormat.LeftIndent = 0
}

# --- DOCUMENT COVER / HEADER ---
$selection.Font.Name = "Georgia"
$selection.Font.Size = 24
$selection.Font.Bold = $true
$selection.Font.Color = 0x1E110B
$selection.ParagraphFormat.Alignment = 1 # Center
$selection.TypeText("LEXVANGUARD LAW FIRM PLATFORM")
$selection.TypeParagraph()

$selection.Font.Size = 14
$selection.Font.Bold = $true
$selection.Font.Color = 0x4691B8 # Gold in BGR (0xC5A059)
$selection.TypeText("Comprehensive Technical & Feature Specification Manual (v1.5.0)")
$selection.TypeParagraph()

$selection.Font.Size = 10
$selection.Font.Bold = $false
$selection.Font.Color = 0x666666
$selection.TypeText("Prepared for Malhotra & Co. Advocates & Partners | Repository: github.com/aurav2001/Legal_site | Date: November 2026")
$selection.TypeParagraph()
$selection.TypeParagraph()
$selection.ParagraphFormat.Alignment = 0 # Left

# --- SECTION 1 ---
Add-Heading "1. Executive Project Summary" 1
Add-Paragraph "The LexVanguard WordPress Platform is an enterprise-grade, luxury content management system and custom theme engineered specifically for Tier-1 law firms, Senior Advocates, and supreme court appellate counsel. It blends high-end courtroom brand positioning with complete administrative autonomy, empowering non-technical staff to manage all editorial, practice, and lead intake data without touching code."
Add-Bullet "Visual Brand Aesthetic" "Deep Royal Navy (#0b111e), Regal Metallic Gold (#c5a059), Cardo editorial serif headings, and clean Inter UI typography with signature 16px 0 45px 0 architectural curved cards."
Add-Bullet "Technical Performance" "Pure Vanilla JavaScript Animate-on-Scroll engine (zero jQuery dependency for animations), strict HTML5 validation, and optimized Core Web Vitals."
Add-Bullet "Operational Autonomy" "100% editable from WordPress Admin via Theme Options, Custom Post Types, and drag-and-drop Elementor Page Builder."

# --- SECTION 2 ---
Add-Heading "2. Master Theme Options Panel (Appearance > Theme Options)" 1
Add-Paragraph "A centralized, tabbed administrative control center synchronized with the native WordPress Customizer (Appearance > Customize), allowing complete site personalization without code modifications:"
Add-Bullet "General & Branding" "Law firm name, regal gold accent text, firm sub-tagline, custom logo uploader (from media library), and header consultation button text/link."
Add-Bullet "Homepage Hero Banner" "Hero main heading, gold highlight keyword, sub-tagline, firm descriptive paragraph, CTA buttons text and URLs, and hero visual arch image uploader."
Add-Bullet "Welcome & Chamber Statistics" "Welcome headline, description, 3 live counter badges ('1964 Established', '11 Practice Areas', '500+ Landmark Cases'), and Strategic Counsel quote card with story link."
Add-Bullet "Chambers & Offices Directory" "Addresses, telephone numbers, emails, and direct Google Maps links for Corporate HQ (Connaught Place, New Delhi) and Supreme Court Chambers (Tilak Marg Desk)."
Add-Bullet "Footer & Social Media Links" "Footer institutional bio, social handles (LinkedIn, YouTube, Twitter/X, Instagram), and dynamic copyright notice."

# --- SECTION 3 ---
Add-Heading "3. Custom Post Types (Dedicated WordPress Admin Modules)" 1
Add-Paragraph "To structure complex firm data, three dedicated Custom Post Types (CPTs) have been architected with tailored meta boxes and pre-seeded production data:"
Add-Bullet "Lawyers & Leadership (team_member)" "Dedicated menu to manage Partners, Senior Advocates, and Associates. Fields include Designation, Bar Admission/Chambers, Court Experience, Education, Practice Expertise, Direct Email, LinkedIn URL, and High-Resolution Portrait."
Add-Bullet "11 Practice Verticals (practice_area)" "Dedicated menu covering Arbitration & ADR, Commercial Litigation, Competition Law, Corporate & Insolvency (IBC), Constitutional Law, Criminal Law (White Collar), Environmental Law (NGT), Regulatory Litigation (APTEL/TDSAT), Mediation, Securities Law (SEBI), and Taxation."
Add-Bullet "Legal Awards & Accolades (award)" "Dedicated menu managing benchmark honors from Chambers Global, The Legal 500 Asia Pacific, India Business Law Journal (IBLJ), and BW Legal World."

# --- SECTION 4 ---
Add-Heading "4. Elementor Page Builder Integration (v1.5.0)" 1
Add-Paragraph "Full visual drag-and-drop website construction capabilities engineered with zero preview crashes:"
Add-Bullet "Preview Crash Immunity" "A proprietary legal_insights_is_elementor_page() detection engine ensures Elementor preview opens instantly without freezing or blank screen issues."
Add-Bullet "Dedicated Elementor Templates" "Elementor Full Width (preserves luxury sticky header and footer with edge-to-edge section canvas) and Elementor Canvas (100% blank canvas for dedicated landing pages)."
Add-Bullet "4 Custom Elementor Legal Widgets" "Registered under 'LexVanguard Legal Elements' in the Elementor tool pane: Law Firm Hero Banner, Chamber Counter Stats, Curved Practice Area Cards, and Advocate Profile Cards."

# --- SECTION 5 ---
Add-Heading "5. In-House Client Inquiries & Leads Management CRM" 1
Add-Paragraph "Eliminating the need for expensive third-party CRM plugins (e.g. WPForms Pro, Gravity Forms, HubSpot), a native lead management pipeline is built directly into the theme:"
Add-Bullet "Dedicated WP Admin Leads Desk" "Accessible via 'Client Inquiries' in the WordPress admin menu with custom columns: Client Name, Direct Phone (clickable tel:), Official Email (clickable mailto:), Practice Area, Urgency Badge, Status, and Date."
Add-Bullet "Lead Status Lifecycle Tracker" "A built-in lead meta box enables legal registry staff to track inquiries through 5 progressive stages: New Lead -> In Review by Counsel -> Contacted Client -> Retained / Client Engaged -> Closed / Resolved."
Add-Bullet "Zero-Reload AJAX Intake Form" "High-converting intake form on the Contact Us page featuring fields for Name, Email, Phone, Practice Jurisdiction, Target Judicial Forum (Supreme Court, High Court, NCLT, CCI, etc.), Matter Urgency level (Emergency 24-48h, High, Normal), and Mandate Outline."
Add-Bullet "Dual Automated HTML Email Dispatch" "Automated dispatch via wp_mail(): (1) Instant notification to firm counsel desk with case brief and admin link; (2) Statutory privilege acknowledgment email to the prospective client citing Section 126 of the Indian Evidence Act."
Add-Bullet "Floating Chambers Hotline Desk" "Bottom-right floating WhatsApp / Emergency Helpline pill with pre-filled consultation message, toggleable on/off from Theme Options."

# --- SECTION 6 ---
Add-Heading "6. Regulatory Compliance & Bar Council of India (BCI) Shield" 1
Add-Paragraph "Indian legal ethics strictly prohibit advocate advertising and solicitation. The platform includes full statutory safeguards:"
Add-Bullet "BCI Compliance Modal" "An elegant regulatory disclaimer modal intercepts first-time visitors with an 'I Accept & Proceed' agreement, establishing voluntary information retrieval."
Add-Bullet "Session Storage Optimization" "Visitor consent is cached in browser sessionStorage to prevent disruptive re-prompts during active browsing sessions."
Add-Bullet "Manual Review Trigger" "A discrete 'BCI Disclaimer' link in the footer allows visitors to re-open and review regulatory terms anytime."

# --- SECTION 7 ---
Add-Heading "7. Enterprise-Grade Security Hardening & Bot Defense" 1
Add-Paragraph "Multi-layered defensive security hardening protects the website from common WordPress exploits, scraping bots, and brute-force attacks:"
Add-Bullet "Anti-Reconnaissance User Shield" "Blocks ?author=N scanning and redirects requests to homepage, preventing tools like WPScan from discovering admin usernames. Restricts /wp-json/wp/v2/users to authenticated users only."
Add-Bullet "Brute-Force Authentication Cloaking" "Replaces verbose login errors with generic notices, denying attackers verification of valid usernames."
Add-Bullet "HTTP Security Headers" "Sends X-Frame-Options: SAMEORIGIN (anti-clickjacking), X-Content-Type-Options: nosniff, X-XSS-Protection: 1; mode=block, and strict Referrer-Policy."
Add-Bullet "WordPress Footprint Masking" "Removes the generator meta tag, RSD link, WLW manifest, shortlinks, and ?ver= asset query strings for anonymous visitors."
Add-Bullet "Form Spam Honeypot & Rate Limiting" "Includes an invisible decoy field to silently trap automated spam bots, plus an IP transient limiter capping submissions to 4 per 10 minutes."
Add-Bullet "Admin Theme File Editor" "The Theme File Editor (Appearance > Theme File Editor) remains fully enabled for administrative development autonomy."

# --- SECTION 8 ---
Add-Heading "8. Developer Easter Egg (GP Signature Watermark)" 1
Add-Paragraph "A sophisticated developer signature watermark engineered for quick agency verification:"
Add-Bullet "Secret Keystroke Trigger" "Typing 'gpgp' (or 'gpgp' + Enter) anywhere on the keyboard triggers a regal gold-and-navy monogram crest at the bottom-right corner."
Add-Bullet "Smart Auto-Dismiss & Hover Pause" "The watermark automatically fades out after exactly 5 seconds, pauses when hovered over by a cursor, and includes an instant dismiss ('x') button."

# --- SECTION 9 ---
Add-Heading "9. Deployment & Installation Guide" 1
Add-Paragraph "The theme is packaged into standard WordPress distribution archives ready for production hosting:"
Add-Bullet "Production ZIP Package" "releases/lexvanguard-v1.5.0.zip (installable via WordPress Admin > Appearance > Themes > Add New > Upload Theme)."
Add-Bullet "Source Code Control" "Git repository synchronized on the main branch at https://github.com/aurav2001/Legal_site.git."
Add-Bullet "Server Compatibility" "WordPress 6.0+, PHP 7.4 through 8.3+, MySQL 5.7+ / MariaDB 10.3+, Elementor & Elementor Pro."

# Save document
try {
    $doc.SaveAs2("$docPath")
    Write-Host "SUCCESS: Documentation created at $docPath ($((Get-Item $docPath).Length) bytes)"
} catch {
    Write-Host "Save error: $_"
} finally {
    $doc.Close([ref]$false)
    $word.Quit()
    [System.Runtime.Interopservices.Marshal]::ReleaseComObject($word) | Out-Null
}
