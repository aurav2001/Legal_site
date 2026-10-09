import { Document, Packer, Paragraph, TextRun, HeadingLevel, Table, TableRow, TableCell, WidthType, BorderStyle, AlignmentType, ShadingType } from "docx";
import fs from "fs";
import path from "path";

// Color constants for high-end luxury legal branding
const COLOR_PRIMARY = "081325"; // Deep Navy
const COLOR_GOLD = "9C792E";    // Metallic Dark Gold
const COLOR_MUTED = "4A5568";   // Professional Slate Gray
const COLOR_BORDER = "CBD5E0";  // Crisp Table Border Light Gray
const COLOR_ROW_ALT = "F8FAFC"; // Clean Alternating Row Tint

function createTitle(text) {
  return new Paragraph({
    alignment: AlignmentType.CENTER,
    spacing: { before: 240, after: 120 },
    children: [
      new TextRun({
        text: text,
        bold: true,
        size: 36,
        color: COLOR_PRIMARY,
        font: "Arial"
      })
    ]
  });
}

function createSubtitle(text) {
  return new Paragraph({
    alignment: AlignmentType.CENTER,
    spacing: { after: 360 },
    children: [
      new TextRun({
        text: text,
        size: 20,
        color: COLOR_GOLD,
        bold: true,
        font: "Arial"
      })
    ]
  });
}

function createHeading1(text) {
  return new Paragraph({
    heading: HeadingLevel.HEADING_1,
    spacing: { before: 400, after: 160 },
    children: [
      new TextRun({
        text: text,
        bold: true,
        size: 26,
        color: COLOR_PRIMARY,
        font: "Arial"
      })
    ]
  });
}

function createHeading2(text) {
  return new Paragraph({
    heading: HeadingLevel.HEADING_2,
    spacing: { before: 260, after: 120 },
    children: [
      new TextRun({
        text: text,
        bold: true,
        size: 22,
        color: COLOR_GOLD,
        font: "Arial"
      })
    ]
  });
}

function createParagraph(text, isBold = false, italic = false) {
  return new Paragraph({
    spacing: { before: 60, after: 100 },
    children: [
      new TextRun({
        text: text,
        size: 20,
        font: "Calibri",
        bold: isBold,
        italics: italic,
        color: "2D3748"
      })
    ]
  });
}

function createBullet(title, description) {
  return new Paragraph({
    bullet: { level: 0 },
    spacing: { before: 50, after: 80 },
    children: [
      new TextRun({
        text: title + ": ",
        bold: true,
        size: 20,
        font: "Calibri",
        color: COLOR_PRIMARY
      }),
      new TextRun({
        text: description,
        size: 20,
        font: "Calibri",
        color: "2D3748"
      })
    ]
  });
}

function createCheckItem(title, description) {
  return new Paragraph({
    spacing: { before: 50, after: 80 },
    indent: { left: 360 },
    children: [
      new TextRun({ text: "[  ]  ", bold: true, size: 22, color: COLOR_GOLD, font: "Calibri" }),
      new TextRun({ text: title + ": ", bold: true, size: 20, color: COLOR_PRIMARY, font: "Calibri" }),
      new TextRun({ text: description, size: 20, color: COLOR_MUTED, font: "Calibri" })
    ]
  });
}

function makeCell(text, isHeader = false, isAlt = false) {
  return new TableCell({
    width: { size: 3000, type: WidthType.DXA },
    shading: {
      type: ShadingType.CLEAR,
      fill: isHeader ? "0A192F" : (isAlt ? COLOR_ROW_ALT : "FFFFFF")
    },
    margins: { top: 120, bottom: 120, left: 160, right: 160 },
    children: [
      new Paragraph({
        children: [
          new TextRun({
            text: text,
            bold: isHeader,
            color: isHeader ? "FFFFFF" : "2D3748",
            size: 19,
            font: "Calibri"
          })
        ]
      })
    ]
  });
}

const doc = new Document({
  sections: [
    {
      properties: {
        page: {
          margin: { top: 1000, bottom: 1000, left: 1200, right: 1200 }
        }
      },
      children: [
        // Title Block
        createTitle("LEGAL WEB PLATFORM ARCHITECTURE & CONTENT SPECIFICATION"),
        createSubtitle("Tier-1 Law Firm Digital Infrastructure | Scope of Features & Client Content Onboarding"),

        createParagraph("This document outlines the planned architecture, interactive modules, and features to be developed for the law firm's upcoming digital platform, accompanied by the complete content requirements needed from the firm to proceed with development and integration.", false, true),

        // Section 1: Planned Platform Architecture & Features
        createHeading1("1. PLANNED PLATFORM ARCHITECTURE & CAPABILITIES"),
        createParagraph("The proposed web application is architected specifically for high-stakes corporate advisory, appellate litigation, and international dispute resolution. The platform will incorporate the following core interactive modules:"),

        createBullet(
          "Privileged Consultation Booking Portal",
          "An encrypted client inquiry workflow allowing corporate representatives and prospective litigants to schedule confidential legal consultations by selecting specific practice areas and preferred designated partners."
        ),
        createBullet(
          "Procedural Timeline & Strategy Estimator",
          "An interactive advisory calculator enabling clients to assess dispute progression across Indian judicial forums (Supreme Court SLPs, High Court Writs, NCLT Corporate Insolvency, and Arbitration). It outlines projected procedural milestones, hearing stages, and structured fee frameworks."
        ),
        createBullet(
          "Practice Areas & Sector Expertise Hub",
          "Deep-dive modules covering the firm's legal competencies (Mergers & Acquisitions, White-Collar Crime & PMLA Defense, Insolvency & Bankruptcy, Commercial Arbitration, and Intellectual Property), showcasing governing statutes, key capabilities, and lead partner oversight."
        ),
        createBullet(
          "Partners & Senior Counsel Directory",
          "A comprehensive biographical directory detailing each partner's Bar Council enrollment credentials, court admissions, specialized domain experience, alma mater, and direct scheduling channels."
        ),
        createBullet(
          "Landmark Matters & Precedents Showcase",
          "A curated institutional portfolio highlighting landmark reported judgments, high-value commercial victories, and regulatory relief secured by the firm to demonstrate courtroom pedigree."
        ),
        createBullet(
          "Legal Knowledge Hub & Regulatory Insights",
          "A content publishing framework for legal treatises, critical analyses of recent Supreme Court rulings, and regulatory updates (SEBI, RBI, CCI, IBC) to establish institutional thought leadership."
        ),
        createBullet(
          "Global Instant Search Engine (⌘K / Ctrl+K)",
          "A real-time search interface allowing visitors to instantly locate practice domains, specific counsel, case precedents, and legal publications via keyboard shortcuts."
        ),
        createBullet(
          "Emergency Injunction & Stay Desk",
          "A dedicated 24/7 hotline integration for urgent appellate filings, ex-parte interim injunctions, and emergency relief before constitutional courts and tribunals."
        ),
        createBullet(
          "Bar Council of India (BCI) Compliance Module",
          "A mandatory non-solicitation disclaimer modal conforming to Rule 36, Section IV of the Bar Council of India Rules, ensuring complete regulatory legitimacy and non-advertising compliance."
        ),
        createBullet(
          "Multi-Jurisdictional Chambers Locator",
          "A location interface providing direct contact coordinates, digital maps, and chamber access information for offices across New Delhi, Mumbai, Bengaluru, and international desks."
        ),

        // Section 2: Content Requirements Checklist
        createHeading1("2. CONTENT REQUIREMENTS CHECKLIST FROM THE FIRM"),
        createParagraph("To develop and populate the digital platform with precision, the firm is requested to provide the following information and assets:"),

        createHeading2("A. Institutional Profile & Corporate Identity"),
        createCheckItem("Official Firm Name", "Full registered legal trade name of the partnership or LLP."),
        createCheckItem("Firm Tagline & Motto", "Institutional descriptor (e.g., 'Advocates, Solicitors & Global Counsel')."),
        createCheckItem("Year Established", "Year of founding/incorporation (e.g., 'Est. 1994')."),
        createCheckItem("Institutional Overview", "2 to 3 paragraphs summarizing firm history, core philosophy, and courtroom track record."),
        createCheckItem("Official Brand Logo", "Vector SVG format or high-resolution transparent PNG."),
        createCheckItem("Emergency Dispute Hotline", "Dedicated telephone line for urgent stay petitions and after-hours matters."),
        createCheckItem("Inquiry & Intake Email Addresses", "Email addresses designated for consultation intake and general communication."),

        createHeading2("B. Credential Metrics (Homepage Performance Indicators)"),
        createCheckItem("Transactional & Dispute Portfolio Value", "Estimated cumulative value represented (e.g., '₹35,000+ Crores')."),
        createCheckItem("Reported Judgments / Precedents Count", "Approximate number of landmark reported decisions won."),
        createCheckItem("Counsel Strength", "Total number of partners, senior advocates, and legal associates."),
        createCheckItem("Primary Court Jurisdictions", "Principal forums (e.g., Supreme Court of India, High Courts, NCLT/NCLAT, SIAC)."),

        createHeading2("C. Practice Areas & Legal Services"),
        createParagraph("Please specify the practice domains to be incorporated, along with brief summaries (2-3 paragraphs each) and lead partners:"),
        createCheckItem("Commercial Litigation & Supreme Court Practice", "Special Leave Petitions (SLPs), constitutional writs, civil suits."),
        createCheckItem("Corporate Governance & M&A Advisory", "Mergers, joint ventures, cross-border acquisitions, transactional diligence."),
        createCheckItem("Insolvency & Bankruptcy (NCLT / IBC)", "Corporate insolvency resolution process (CIRP), liquidation, creditor representation."),
        createCheckItem("White-Collar Crime Defense & Investigations", "Enforcement Directorate (ED), CBI, SFIO, PMLA, corporate fraud defense."),
        createCheckItem("Domestic & International Commercial Arbitration", "Proceedings under SIAC, ICC, LCIA, UNCITRAL, DIAC rules."),
        createCheckItem("Intellectual Property & Technology Law", "Patent, trademark, copyright litigation, technology licensing."),
        createCheckItem("Additional Sector Practices", "Taxation, Banking & Finance, Real Estate, Maritime Law (as applicable)."),

        createHeading2("D. Advocates & Partners Profiles"),
        createParagraph("For each Partner or Senior Counsel to be featured in the directory:"),
        createCheckItem("Full Name & Title", "Designation (e.g., 'Senior Advocate', 'Managing Partner', 'Partner')."),
        createCheckItem("Professional Headshot", "High-resolution portrait in professional courtroom or corporate attire."),
        createCheckItem("Bar Council Enrollment Number", "State Bar Council registration details (e.g., 'D/1234/2004 - Bar Council of Delhi')."),
        createCheckItem("Admissions & Years in Practice", "Years of active practice and admitted courts (e.g., '22+ Years | Supreme Court & Delhi HC')."),
        createCheckItem("Core Specialization", "Primary areas of focus and advisory expertise."),
        createCheckItem("Educational Background", "Law degrees, university alma maters, and academic distinctions."),
        createCheckItem("Professional Biography", "100 to 150 words detailing career achievements, significant representations, and memberships."),

        createHeading2("E. Landmark Matters & Judicial Precedents"),
        createParagraph("A selection of 3 to 6 notable cases to be showcased in the precedents archive (party names may be anonymized if confidential):"),
        createCheckItem("Matter Subject / Title", "Descriptive title (e.g., 'In re: National Telecom Concession Arbitration Challenge')."),
        createCheckItem("Judicial Forum", "Court or tribunal (e.g., 'Supreme Court of India / High Court of Delhi')."),
        createCheckItem("Dispute / Claim Value", "Financial value or quantum involved (optional if sensitive)."),
        createCheckItem("Outcome / Relief Secured", "Precise legal relief achieved (e.g., 'Secured stay on penalty and set new precedent on patent illegality')."),

        createHeading2("F. Chambers Locations & Contact Points"),
        createCheckItem("Principal Chambers / Head Office", "Full address, direct phone lines, chamber email address."),
        createCheckItem("Branch & Regional Offices", "Addresses and coordinates for Mumbai, Bengaluru, Singapore or other desks."),
        createCheckItem("Map Coordinates / Location Links", "Google Maps links for accurate location routing."),

        createHeading2("G. Legal Insights & Thought Leadership (Initial Set)"),
        createCheckItem("1 to 3 Legal Insight Articles", "Recent legal commentary, statutory analysis, or case briefs authored by the firm's advocates."),

        // Section 3: Media & Asset Specifications
        createHeading1("3. MEDIA & ASSET TECHNICAL SPECIFICATIONS"),
        createParagraph("To ensure optimal visual presentation and performance, assets should adhere to the following technical standards:"),

        new Table({
          width: { size: 9000, type: WidthType.DXA },
          rows: [
            new TableRow({
              children: [
                makeCell("Asset Category", true),
                makeCell("Supported File Formats", true),
                makeCell("Recommended Specifications", true)
              ]
            }),
            new TableRow({
              children: [
                makeCell("Firm Brand Identity (Logo)"),
                makeCell("SVG (Vector) or PNG (Transparent)"),
                makeCell("Minimum 600px width; vector formats preferred for optimal retina scaling")
              ]
            }),
            new TableRow({
              children: [
                makeCell("Partner & Counsel Portraits", false, true),
                makeCell("JPG / PNG / WebP", false, true),
                makeCell("Minimum 800 x 1000px; studio portrait in formal legal attire; uniform background", false, true)
              ]
            }),
            new TableRow({
              children: [
                makeCell("Chambers & Library Photography"),
                makeCell("JPG / WebP"),
                makeCell("1920 x 1080px (16:9 Landscape); architectural/interior clarity")
              ]
            }),
            new TableRow({
              children: [
                makeCell("Insight Articles & Legal Briefs", false, true),
                makeCell("Microsoft Word (.docx) or PDF", false, true),
                makeCell("Structured manuscript containing title, author name, publication date, and references", false, true)
              ]
            })
          ]
        }),

        // Section 4: Regulatory Compliance Standards
        createHeading1("4. STATUTORY & REGULATORY COMPLIANCE NOTE"),
        createParagraph("In strict accordance with Rule 36, Section IV, Chapter II, Part VI of the Bar Council of India Rules, advocates and legal practitioners in India are prohibited from soliciting work or advertising their practice directly. The proposed web architecture incorporates an automated, non-bypassable regulatory disclaimer modal. This ensures that any visitor accessing the platform acknowledges they are seeking information voluntarily without any solicitation or inducement by the firm, ensuring the web platform remains 100% compliant with statutory guidelines."),

        // Section 5: Implementation Roadmap
        createHeading1("5. PROJECT WORKFLOW & NEXT STEPS"),
        createBullet("Step 1: Content Collection", "The firm collates and provides the information outlined in Section 2."),
        createBullet("Step 2: Structural Architecture & Digital Integration", "Our development team configures the platform, styling tokens, and interactive components around the firm's verified identity."),
        createBullet("Step 3: Partner Review & Verification", "The firm reviews the fully integrated platform across desktop and mobile viewports for factual and stylistic verification."),
        createBullet("Step 4: Domain Deployment & Live Launch", "Platform deployment to the firm's official domain with SSL security and search engine indexing.")
      ]
    }
  ]
});

async function main() {
  const primaryPath = path.resolve("C:/Users/Gulshan Pandey/Desktop/legal site/Legal_Platform_Proposal_and_Content_Requirements.docx");
  const fallbackPath = path.resolve("C:/Users/Gulshan Pandey/Desktop/legal site/Client_Requirement_and_Features_Doc.docx");
  const buffer = await Packer.toBuffer(doc);
  
  fs.writeFileSync(primaryPath, buffer);
  console.log(`Word document successfully created in pure English at: ${primaryPath}`);

  try {
    fs.writeFileSync(fallbackPath, buffer);
    console.log(`Also updated: ${fallbackPath}`);
  } catch (e) {
    console.log(`Note: Previous file was locked in Word, primary updated file saved at: ${primaryPath}`);
  }
}

main().catch(err => {
  console.error("Error creating document:", err);
  process.exit(1);
});
