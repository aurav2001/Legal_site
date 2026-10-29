import fs from 'fs';
import path from 'path';
import {
    Document,
    Packer,
    Paragraph,
    TextRun,
    Table,
    TableRow,
    TableCell,
    WidthType,
    BorderStyle,
    AlignmentType,
    HeadingLevel,
    ShadingType,
    Header,
    Footer,
    PageNumber
} from 'docx';

const NAVY = '0E172A';
const GOLD = 'C5A059';
const DARK_SLATE = '1E293B';
const MUTED_TXT = '475569';
const LIGHT_BG = 'F8FAFC';
const CARD_BG = 'F1F5F9';
const BORDER_COLOR = 'CBD5E1';
const GOLD_LIGHT = 'FEF9EE';

const tableBorders = {
    top: { style: BorderStyle.SINGLE, size: 4, color: BORDER_COLOR },
    bottom: { style: BorderStyle.SINGLE, size: 4, color: BORDER_COLOR },
    left: { style: BorderStyle.SINGLE, size: 4, color: BORDER_COLOR },
    right: { style: BorderStyle.SINGLE, size: 4, color: BORDER_COLOR },
    insideHorizontal: { style: BorderStyle.SINGLE, size: 4, color: BORDER_COLOR },
    insideVertical: { style: BorderStyle.SINGLE, size: 4, color: BORDER_COLOR }
};

function createHeaderCell(text, widthPercent) {
    return new TableCell({
        width: { size: widthPercent, type: WidthType.PERCENTAGE },
        shading: { fill: NAVY, type: ShadingType.CLEAR },
        margins: { top: 120, bottom: 120, left: 140, right: 140 },
        children: [
            new Paragraph({
                children: [
                    new TextRun({
                        text,
                        bold: true,
                        color: 'FFFFFF',
                        size: 20, // 10pt
                        font: 'Calibri'
                    })
                ]
            })
        ]
    });
}

function createDataCell(text, widthPercent, isShaded = false, bold = false) {
    return new TableCell({
        width: { size: widthPercent, type: WidthType.PERCENTAGE },
        shading: isShaded ? { fill: LIGHT_BG, type: ShadingType.CLEAR } : undefined,
        margins: { top: 100, bottom: 100, left: 140, right: 140 },
        children: [
            new Paragraph({
                children: [
                    new TextRun({
                        text,
                        bold: bold,
                        color: DARK_SLATE,
                        size: 19, // 9.5pt
                        font: 'Calibri'
                    })
                ]
            })
        ]
    });
}

function createFieldCell(label, placeholder, widthPercent) {
    return new TableCell({
        width: { size: widthPercent, type: WidthType.PERCENTAGE },
        margins: { top: 100, bottom: 100, left: 140, right: 140 },
        children: [
            new Paragraph({
                children: [
                    new TextRun({
                        text: label ? label + '\n' : '',
                        bold: true,
                        color: DARK_SLATE,
                        size: 18,
                        font: 'Calibri'
                    }),
                    new TextRun({
                        text: placeholder,
                        italics: true,
                        color: '94A3B8',
                        size: 18,
                        font: 'Calibri'
                    })
                ]
            })
        ]
    });
}

function makeHeading(title, subtitle = null) {
    const children = [
        new Paragraph({
            heading: HeadingLevel.HEADING_1,
            spacing: { before: 340, after: 80 },
            children: [
                new TextRun({
                    text: title,
                    bold: true,
                    color: NAVY,
                    size: 28, // 14pt
                    font: 'Georgia'
                })
            ]
        })
    ];

    if (subtitle) {
        children.push(
            new Paragraph({
                spacing: { after: 180 },
                children: [
                    new TextRun({
                        text: subtitle,
                        italics: true,
                        color: GOLD,
                        size: 20,
                        font: 'Calibri'
                    })
                ]
            })
        );
    }
    return children;
}

function makeSubHeading(title) {
    return new Paragraph({
        heading: HeadingLevel.HEADING_2,
        spacing: { before: 200, after: 80 },
        children: [
            new TextRun({
                text: title,
                bold: true,
                color: DARK_SLATE,
                size: 22, // 11pt
                font: 'Georgia'
            })
        ]
    });
}

function makeBullet(label, desc) {
    return new Paragraph({
        bullet: { level: 0 },
        spacing: { before: 60, after: 60 },
        children: [
            new TextRun({
                text: label + ': ',
                bold: true,
                color: DARK_SLATE,
                size: 20,
                font: 'Calibri'
            }),
            new TextRun({
                text: desc,
                color: MUTED_TXT,
                size: 20,
                font: 'Calibri'
            })
        ]
    });
}

function makeCalloutBox(title, body) {
    return new Table({
        width: { size: 100, type: WidthType.PERCENTAGE },
        borders: {
            top: { style: BorderStyle.NONE },
            bottom: { style: BorderStyle.NONE },
            left: { style: BorderStyle.SINGLE, size: 24, color: GOLD },
            right: { style: BorderStyle.NONE },
            insideHorizontal: { style: BorderStyle.NONE },
            insideVertical: { style: BorderStyle.NONE }
        },
        rows: [
            new TableRow({
                children: [
                    new TableCell({
                        width: { size: 100, type: WidthType.PERCENTAGE },
                        shading: { fill: GOLD_LIGHT, type: ShadingType.CLEAR },
                        margins: { top: 120, bottom: 120, left: 160, right: 160 },
                        children: [
                            new Paragraph({
                                children: [
                                    new TextRun({
                                        text: title + '\n',
                                        bold: true,
                                        color: NAVY,
                                        size: 20,
                                        font: 'Georgia'
                                    }),
                                    new TextRun({
                                        text: body,
                                        color: DARK_SLATE,
                                        size: 19,
                                        font: 'Calibri'
                                    })
                                ]
                            })
                        ]
                    })
                ]
            })
        ]
    });
}

// Generate the complete document
const doc = new Document({
    styles: {
        default: {
            document: {
                run: {
                    font: 'Calibri',
                    size: 20,
                    color: DARK_SLATE
                }
            }
        }
    },
    sections: [
        {
            properties: {
                page: {
                    margin: {
                        top: 1440, // 1 inch
                        bottom: 1440,
                        left: 1440,
                        right: 1440
                    }
                }
            },
            headers: {
                default: new Header({
                    children: [
                        new Paragraph({
                            alignment: AlignmentType.RIGHT,
                            children: [
                                new TextRun({
                                    text: 'Law Firm Website Development  |  Client Content Questionnaire',
                                    size: 16,
                                    color: '94A3B8',
                                    font: 'Calibri'
                                })
                            ]
                        })
                    ]
                })
            },
            footers: {
                default: new Footer({
                    children: [
                        new Paragraph({
                            alignment: AlignmentType.SPACE_BETWEEN,
                            children: [
                                new TextRun({
                                    text: 'Confidential  |  Prepared for Law Chambers & Legal Counsel',
                                    size: 16,
                                    color: '94A3B8',
                                    font: 'Calibri'
                                }),
                                new TextRun({
                                    text: 'Page ',
                                    size: 16,
                                    color: '94A3B8',
                                    font: 'Calibri'
                                }),
                                new TextRun({
                                    children: [PageNumber.CURRENT],
                                    size: 16,
                                    color: '94A3B8',
                                    font: 'Calibri'
                                })
                            ]
                        })
                    ]
                })
            },
            children: [
                // Title Area
                new Paragraph({
                    alignment: AlignmentType.CENTER,
                    spacing: { after: 80 },
                    children: [
                        new TextRun({
                            text: 'LAW FIRM WEBSITE DEVELOPMENT',
                            bold: true,
                            color: GOLD,
                            size: 20,
                            font: 'Calibri',
                            tracking: 100
                        })
                    ]
                }),
                new Paragraph({
                    alignment: AlignmentType.CENTER,
                    spacing: { after: 120 },
                    children: [
                        new TextRun({
                            text: 'Client Onboarding & Content Gathering Questionnaire',
                            bold: true,
                            color: NAVY,
                            size: 38, // 19pt
                            font: 'Georgia'
                        })
                    ]
                }),
                new Paragraph({
                    alignment: AlignmentType.CENTER,
                    spacing: { after: 260 },
                    children: [
                        new TextRun({
                            text: 'A structured blueprint to collect branding assets, lawyer profiles, practice descriptions, landmark cases, and technical credentials.',
                            italics: true,
                            color: MUTED_TXT,
                            size: 21,
                            font: 'Calibri'
                        })
                    ]
                }),

                // Callout: How to use this document
                makeCalloutBox(
                    'Instructions for the Law Firm / Chambers Team:',
                    'Please fill in the information below or attach corresponding documents. Wherever file uploads are required (e.g., high-resolution logos, attorney headshots, award badges), you can share a shared Google Drive / OneDrive link or send them via email. If any section does not apply to your firm, feel free to write "N/A" or leave it blank.'
                ),

                new Paragraph({ spacing: { after: 200 } }),

                // Section 1
                ...makeHeading('1. Law Firm Identity & Brand Positioning', 'Establish your digital brand stature and institutional presentation'),
                new Table({
                    width: { size: 100, type: WidthType.PERCENTAGE },
                    borders: tableBorders,
                    rows: [
                        new TableRow({
                            children: [
                                createHeaderCell('Item Required', 30),
                                createHeaderCell('Your Response / Input', 50),
                                createHeaderCell('Asset Status', 20)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Full Legal Firm Name', 30, true, true),
                                createFieldCell('', '[ e.g., Malhotra & Co. / Vanguard & Partners ]', 50),
                                createDataCell('[ ] Confirmed', 20)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Brand Tagline / Subtitle', 30, true, true),
                                createFieldCell('', '[ e.g., Advocates & Supreme Court Counsel ]', 50),
                                createDataCell('[ ] Confirmed', 20)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Founding Year / Legacy', 30, true, true),
                                createFieldCell('', '[ e.g., Established 1974 / 50+ Years Legacy ]', 50),
                                createDataCell('[ ] Confirmed', 20)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Official Firm Logo', 30, true, true),
                                createFieldCell('Specifications: High-res PNG with transparent background or Vector SVG / AI / EPS. Both Dark & Light background versions if available.', '[ Link to Logo Files or Attached ]', 50),
                                createDataCell('[ ] Provided\n[ ] Needs Design', 20)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Brand Colors (if any)', 30, true, true),
                                createFieldCell('', '[ e.g., Navy Blue #0E172A, Warm Gold #C5A059, Ivory ]', 50),
                                createDataCell('[ ] Theme Default\n[ ] Custom', 20)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Firm Overview / Bio (About Us)', 30, true, true),
                                createFieldCell('150 - 300 words describing firm founding, core legal ethos, appellate presence, and sovereign/corporate client representation.', '[ Insert Bio text or refer to attached document ]', 50),
                                createDataCell('[ ] Attached\n[ ] Provided', 20)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Core Values / 3 Pillars', 30, true, true),
                                createFieldCell('Three core principles that define your advocacy (e.g., 1. Courtroom Stature, 2. Forensic Factual Scrutiny, 3. Uncompromising Client Fidelity).', '[ 1. ...\n  2. ...\n  3. ... ]', 50),
                                createDataCell('[ ] Completed', 20)
                            ]
                        })
                    ]
                }),

                new Paragraph({ spacing: { after: 260 } }),

                // Section 2
                ...makeHeading('2. Contact Details & Chambers Locations', 'Official office addresses, telephone lines, and inquiry routing'),
                new Table({
                    width: { size: 100, type: WidthType.PERCENTAGE },
                    borders: tableBorders,
                    rows: [
                        new TableRow({
                            children: [
                                createHeaderCell('Information Field', 30),
                                createHeaderCell('Firm Details & Coordinates', 70)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Head Office / Principal Chambers', 30, true, true),
                                createFieldCell('', '[ Full Address, Suite / Floor, City, Pincode ]', 70)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Branch / Court Chambers (if any)', 30, true, true),
                                createFieldCell('', '[ e.g., Chamber 42, Supreme Court of India / High Court Bar ]', 70)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Official Phone Numbers', 30, true, true),
                                createFieldCell('', '[ Landline (with STD code), Chambers Mobile, Fax if any ]', 70)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Public Inquiry Email', 30, true, true),
                                createFieldCell('', '[ e.g., contact@firmname.law / info@firmname.com ]', 70)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Confidential Consultation Routing', 30, true, true),
                                createFieldCell('Where should website consultation requests be emailed?', '[ e.g., partner@firmname.law, registry@firmname.law ]', 70)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Chambers Office Working Hours', 30, true, true),
                                createFieldCell('', '[ e.g., Monday - Friday: 9:30 AM - 7:30 PM | Saturday: By Appointment ]', 70)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Google Maps Embed Link / Pin', 30, true, true),
                                createFieldCell('', '[ Google Maps share link of your chambers ]', 70)
                            ]
                        })
                    ]
                }),

                new Paragraph({ spacing: { after: 260 } }),

                // Section 3
                ...makeHeading('3. Chambers Leadership & Lawyer Profiles (Our People)', 'Showcase your Senior Advocates, Managing Partners, Counsel & Associates'),
                new Paragraph({
                    spacing: { after: 120 },
                    children: [
                        new TextRun({
                            text: 'Please fill this profile template for each Partner, Senior Advocate, or Associate to be featured on the website:',
                            bold: true,
                            color: DARK_SLATE
                        })
                    ]
                }),
                new Table({
                    width: { size: 100, type: WidthType.PERCENTAGE },
                    borders: tableBorders,
                    rows: [
                        new TableRow({
                            children: [
                                createHeaderCell('Lawyer Profile Field', 30),
                                createHeaderCell('Lawyer 1 (e.g. Managing Partner)', 35),
                                createHeaderCell('Lawyer 2 (e.g. Senior Partner)', 35)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Full Name', 30, true, true),
                                createFieldCell('', '[ Full Name with designation ]', 35),
                                createFieldCell('', '[ Full Name with designation ]', 35)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Designation / Bar Role', 30, true, true),
                                createFieldCell('', '[ Managing Partner / Senior Advocate ]', 35),
                                createFieldCell('', '[ Partner - Arbitration & Disputes ]', 35)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Years of Practice / Experience', 30, true, true),
                                createFieldCell('', '[ e.g., 30+ Years Experience ]', 35),
                                createFieldCell('', '[ e.g., 22 Years Experience ]', 35)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Bar Council Enrolment & Chambers', 30, true, true),
                                createFieldCell('', '[ Supreme Court of India & Delhi HC ]', 35),
                                createFieldCell('', '[ Bombay HC & SIAC Singapore ]', 35)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Education & Law Degrees', 30, true, true),
                                createFieldCell('', '[ e.g., LL.B. (Campus Law Centre), LL.M. (Harvard) ]', 35),
                                createFieldCell('', '[ e.g., B.A. LL.B. (NUJS), BCL (Oxford) ]', 35)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Core Practice Specialization', 30, true, true),
                                createFieldCell('', '[ Supreme Court SLPs, Telecom, Constitutional ]', 35),
                                createFieldCell('', '[ Commercial Arbitration, Cross-Border M&A ]', 35)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Professional Headshot Photo', 30, true, true),
                                createFieldCell('High-res professional headshot (portrait, advocate black coat / formal court attire preferred).', '[ File Name / Drive Link ]', 35),
                                createFieldCell('High-res professional headshot (portrait, advocate black coat / formal court attire preferred).', '[ File Name / Drive Link ]', 35)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Lawyer Bio (80 - 150 words)', 30, true, true),
                                createFieldCell('', '[ Summary of career, prominent court representations, and judicial achievements ]', 35),
                                createFieldCell('', '[ Summary of career, prominent court representations, and judicial achievements ]', 35)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('LinkedIn & Chambers Email', 30, true, true),
                                createFieldCell('', '[ LinkedIn URL | partner@firm.law ]', 35),
                                createFieldCell('', '[ LinkedIn URL | partner2@firm.law ]', 35)
                            ]
                        })
                    ]
                }),

                new Paragraph({
                    spacing: { before: 100, after: 240 },
                    children: [
                        new TextRun({
                            text: '* If you have more advocates/counsel, simply copy-paste this table or attach their CVs/resumes.',
                            italics: true,
                            size: 18,
                            color: '64748B'
                        })
                    ]
                }),

                // Section 4
                ...makeHeading('4. Practice Areas & Domain Expertise', 'List and describe your core areas of legal practice'),
                makeBullet('Practice Overview', 'Please check the areas your chambers practice in, and provide 2-3 lines detailing your specific approach:'),
                new Table({
                    width: { size: 100, type: WidthType.PERCENTAGE },
                    borders: tableBorders,
                    rows: [
                        new TableRow({
                            children: [
                                createHeaderCell('Select', 10),
                                createHeaderCell('Practice Area', 30),
                                createHeaderCell('Key Offerings / Focus Tribunals', 60)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('[ ✓ ]', 10),
                                createDataCell('Appellate & Supreme Court Litigation', 30, true, true),
                                createFieldCell('', '[ Special Leave Petitions (SLPs), Review & Curative Petitions, Constitutional Benches ]', 60)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('[ ✓ ]', 10),
                                createDataCell('Domestic & International Arbitration', 30, true, true),
                                createFieldCell('', '[ SIAC, ICC, LCIA, Section 9 interim relief, Section 34 setting aside, Enforcement ]', 60)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('[ ✓ ]', 10),
                                createDataCell('Corporate Insolvency & Bankruptcy (IBC)', 30, true, true),
                                createFieldCell('', '[ NCLT / NCLAT, Corporate Insolvency Resolution (CIRP), Liquidation, Committee of Creditors ]', 60)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('[  ]', 10),
                                createDataCell('White-Collar Crime & Regulatory Defense', 30, true, true),
                                createFieldCell('', '[ PMLA, Enforcement Directorate (ED), SFIO investigations, CBI, Emergency Bail ]', 60)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('[  ]', 10),
                                createDataCell('Mergers, Demergers & Restructuring', 30, true, true),
                                createFieldCell('', '[ Schemes of Arrangement, Capital Reductions, SEBI Takeovers, Joint Ventures ]', 60)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('[  ]', 10),
                                createDataCell('Competition & Antitrust Laws', 30, true, true),
                                createFieldCell('', '[ Competition Commission of India (CCI) filings, Abuse of Dominance, Cartel defense ]', 60)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('[  ]', 10),
                                createDataCell('Infrastructure, Power & Mining', 30, true, true),
                                createFieldCell('', '[ Regulatory disputes before APTEL, PNGRB, TDSAT, concession agreement arbitrations ]', 60)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('[  ]', 10),
                                createDataCell('Intellectual Property & Technology', 30, true, true),
                                createFieldCell('', '[ Patent & Trademark litigation, Data Protection DPDPA compliance, Software copyright ]', 60)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('[  ]', 10),
                                createDataCell('Other Practice Disciplines', 30, true, true),
                                createFieldCell('', '[ Please write any other niche practice areas your firm offers ]', 60)
                            ]
                        })
                    ]
                }),

                new Paragraph({ spacing: { after: 260 } }),

                // Section 5
                ...makeHeading('5. Landmark Precedents & Representative Matters', 'Highlight public court precedents and reported judgments'),
                makeCalloutBox(
                    'Client Privilege & Confidentiality Notice:',
                    'Under Bar Council of India guidelines and attorney-client privilege, only reported judgments, public court orders, or anonymized case summaries should be provided. Do not include confidential commercial terms or sealed arbitration details.'
                ),
                new Paragraph({ spacing: { after: 120 } }),
                new Table({
                    width: { size: 100, type: WidthType.PERCENTAGE },
                    borders: tableBorders,
                    rows: [
                        new TableRow({
                            children: [
                                createHeaderCell('Case / Matter Name', 30),
                                createHeaderCell('Court / Arbitral Tribunal', 25),
                                createHeaderCell('Significance / Legal Precedent Set', 45)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ e.g., Sukanya Holdings vs. Jayesh Pandya ]', 30),
                                createFieldCell('', '[ Supreme Court of India ]', 25),
                                createFieldCell('', '[ Seminal ruling on arbitration clauses and non-signatories under Section 8 ]', 45)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ e.g., ONGC vs. Saw Pipes Ltd. ]', 30),
                                createFieldCell('', '[ Supreme Court of India ]', 25),
                                createFieldCell('', '[ Defined the scope of public policy grounds under Section 34 ]', 45)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ Representative Case 3 ]', 30),
                                createFieldCell('', '[ High Court / NCLAT / SIAC ]', 25),
                                createFieldCell('', '[ Summary of relief secured / commercial impact ]', 45)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ Representative Case 4 ]', 30),
                                createFieldCell('', '[ Forum ]', 25),
                                createFieldCell('', '[ Summary ]', 45)
                            ]
                        })
                    ]
                }),

                new Paragraph({ spacing: { after: 260 } }),

                // Section 6
                ...makeHeading('6. Honours, Rankings & Recognitions', 'Showcase institutional accolades and ranking directory recognitions'),
                new Table({
                    width: { size: 100, type: WidthType.PERCENTAGE },
                    borders: tableBorders,
                    rows: [
                        new TableRow({
                            children: [
                                createHeaderCell('Awarding Institution / Directory', 30),
                                createHeaderCell('Year & Recognition Title', 45),
                                createHeaderCell('Badge Image Available?', 25)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ e.g., Chambers Asia-Pacific ]', 30),
                                createFieldCell('', '[ Top Tier Dispute Resolution & Appellate Firm (2024) ]', 45),
                                createDataCell('[ ] Yes\n[ ] Please fetch logo', 25)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ e.g., India Business Law Journal (IBLJ) ]', 30),
                                createFieldCell('', '[ A-List Indian Lawyers & Leading Law Firm Awards ]', 45),
                                createDataCell('[ ] Yes\n[ ] Please fetch logo', 25)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ e.g., The Legal 500 / Benchmark Litigation ]', 30),
                                createFieldCell('', '[ Commercial Litigation & Arbitration Tier 1 ]', 45),
                                createDataCell('[ ] Yes\n[ ] Please fetch logo', 25)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ Other Institutional Honors ]', 30),
                                createFieldCell('', '[ Details ]', 45),
                                createDataCell('[ ] Provided', 25)
                            ]
                        })
                    ]
                }),

                new Paragraph({ spacing: { after: 260 } }),

                // Section 7
                ...makeHeading('7. Publications, Articles & Case Digests (Insights Hub)', 'Establish thought leadership through authored papers and articles'),
                new Table({
                    width: { size: 100, type: WidthType.PERCENTAGE },
                    borders: tableBorders,
                    rows: [
                        new TableRow({
                            children: [
                                createHeaderCell('Article Title / Topic', 40),
                                createHeaderCell('Author / Partner Name', 30),
                                createHeaderCell('Content Status', 30)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ e.g., Curative Petitions in Commercial Arbitration: A Double-Edged Sword ]', 40),
                                createFieldCell('', '[ Senior Partner Name ]', 30),
                                createDataCell('[ ] Draft ready\n[ ] To be written', 30)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ e.g., Supreme Court Ruling on Group of Companies Doctrine ]', 40),
                                createFieldCell('', '[ Advocate Name ]', 30),
                                createDataCell('[ ] Draft ready\n[ ] To be written', 30)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createFieldCell('', '[ e.g., DPDPA 2023 Compliance for Multinational Corporations ]', 40),
                                createFieldCell('', '[ Tech & IP Partner ]', 30),
                                createDataCell('[ ] Draft ready\n[ ] To be written', 30)
                            ]
                        })
                    ]
                }),

                new Paragraph({ spacing: { after: 260 } }),

                // Section 8
                ...makeHeading('8. Bar Council of India (BCI) Regulatory Compliance', 'Strict compliance with Rule 36 of Bar Council of India Rules'),
                makeBullet('BCI Rule 36 Mandate', 'The Bar Council of India strictly prohibits advocates and law firms from soliciting work or advertising. A mandatory disclaimer modal/page is integrated into your website.'),
                makeBullet('User Acknowledgment', 'Visitors must confirm that they are seeking information of their own accord without any solicitation, inducement, or invitation.'),
                new Paragraph({ spacing: { after: 100 } }),
                new Table({
                    width: { size: 100, type: WidthType.PERCENTAGE },
                    borders: tableBorders,
                    rows: [
                        new TableRow({
                            children: [
                                createHeaderCell('Regulatory Compliance Item', 35),
                                createHeaderCell('Firm Confirmation & Requirements', 65)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('BCI Disclaimer Modal', 35, true, true),
                                createDataCell('Do you approve the standard BCI Rule 36 disclaimer with "Agree / Decline" buttons on the website?\n[ ✓ ] Yes, approved\n[  ] Custom disclaimer text required (please provide)', 65)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Data Protection & Privacy Policy', 35, true, true),
                                createFieldCell('Grievance Officer Name & Email required under Digital Personal Data Protection Act (DPDPA 2023):', '[ Name: ______________ | Email: grievance@firm.law ]', 65)
                            ]
                        })
                    ]
                }),

                new Paragraph({ spacing: { after: 260 } }),

                // Section 9
                ...makeHeading('9. Technical, Hosting & Domain Access Requirements', 'Credentials to launch the website on your official domain'),
                new Table({
                    width: { size: 100, type: WidthType.PERCENTAGE },
                    borders: tableBorders,
                    rows: [
                        new TableRow({
                            children: [
                                createHeaderCell('Technical Service', 25),
                                createHeaderCell('Provider / Details', 45),
                                createHeaderCell('Status / Action Required', 30)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Official Domain Name', 25, true, true),
                                createFieldCell('', '[ e.g., www.malhotraco.law / www.vanguard.in ]\nRegistrar: GoDaddy / Namecheap / Google Domains', 45),
                                createDataCell('[ ] Already Owned\n[ ] Needs to be purchased', 30)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Web Hosting Server', 25, true, true),
                                createFieldCell('', '[ e.g., Hostinger / Cloudways / AWS / cPanel ]\nHosting Login or DNS access required for launch.', 45),
                                createDataCell('[ ] Existing Hosting\n[ ] Need Recommendation', 30)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Official Business Emails', 25, true, true),
                                createFieldCell('', '[ e.g., Google Workspace / Microsoft 365 / Zoho ]\nDo you need @firmname.law email setup?', 45),
                                createDataCell('[ ] Already Active\n[ ] Need Setup Assistance', 30)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('Analytics & Google Search', 25, true, true),
                                createFieldCell('', 'Google Analytics 4 & Google Search Console for traffic and ranking visibility.', 45),
                                createDataCell('[ ] Integrate Standard GA4\n[ ] Provide existing ID', 30)
                            ]
                        }),
                        new TableRow({
                            children: [
                                createDataCell('WhatsApp Chambers Widget', 25, true, true),
                                createFieldCell('', 'Floating WhatsApp button for quick confidential consultation booking (Optional).', 45),
                                createDataCell('[ ] Yes, add WhatsApp\n[ ] No, Email/Phone only', 30)
                            ]
                        })
                    ]
                }),

                new Paragraph({ spacing: { after: 260 } }),

                // Summary / Sign-off
                ...makeHeading('10. Submission Checklist & Next Steps', 'How to return the materials to the development team'),
                makeBullet('Step 1', 'Fill in the form fields directly in this Word document or write your responses below each section.'),
                makeBullet('Step 2', 'Create a Google Drive / OneDrive folder containing all high-resolution image assets (Logo, Headshots, Award badges, CVs).'),
                makeBullet('Step 3', 'Share the completed Word file and Drive link with our development team.'),
                makeBullet('Step 4', 'Our team will populate all pages, verify mobile responsiveness across all devices, and schedule a live staging review before final domain launch.'),

                new Paragraph({ spacing: { before: 180, after: 120 } }),
                makeCalloutBox(
                    'Document Completion Sign-Off:',
                    'Completed By: ___________________________________      Designation: ____________________\n\nLaw Firm / Chambers: __________________________      Date of Submission: _____________'
                )
            ]
        }
    ]
});

// Write to file
const outputPath = path.resolve('Client_Requirements_Questionnaire_Law_Firm.docx');
Packer.toBuffer(doc).then((buffer) => {
    fs.writeFileSync(outputPath, buffer);
    console.log(`Successfully generated: ${outputPath} (${buffer.length} bytes)`);
}).catch((err) => {
    console.error('Error generating document:', err);
    process.exit(1);
});
