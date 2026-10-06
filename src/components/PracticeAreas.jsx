import React, { useState } from "react";
import { practiceAreas } from "../data/legalData";
import { ArrowRight, CheckCircle2, Scale, ExternalLink, ShieldCheck, UserCheck } from "lucide-react";

export default function PracticeAreas({ onSelectPracticeForConsultation }) {
  const [selectedCategory, setSelectedCategory] = useState("All");
  const [activeModalPractice, setActiveModalPractice] = useState(null);

  const categories = [
    "All",
    "Disputes & Arbitration",
    "Corporate & Finance",
    "Technology & IP",
    "Regulatory & Crime"
  ];

  const filteredPractices = selectedCategory === "All" 
    ? practiceAreas 
    : practiceAreas.filter(p => p.category === selectedCategory);

  return (
    <section id="practices" className="section-padding" style={{ background: "var(--navy-900)", position: "relative" }}>
      <div className="legal-container">
        
        {/* Section Header */}
        <div style={{ textAlign: "center", marginBottom: "50px" }}>
          <div className="section-tag">Areas of Practice</div>
          <h2 className="section-title">Comprehensive Legal Capabilities</h2>
          <p className="section-desc" style={{ margin: "0 auto" }}>
            Decisive representation across critical economic sectors, from appellate constitutional advocacy to cross-border syndicated transactions and high-tech IP litigation.
          </p>
        </div>

        {/* Filter Tabs */}
        <div 
          style={{
            display: "flex",
            justifyContent: "center",
            flexWrap: "wrap",
            gap: "10px",
            marginBottom: "44px"
          }}
        >
          {categories.map((cat) => (
            <button
              key={cat}
              type="button"
              onClick={() => setSelectedCategory(cat)}
              style={{
                background: selectedCategory === cat ? "var(--gold-gradient)" : "rgba(17, 37, 68, 0.5)",
                color: selectedCategory === cat ? "#050d1a" : "var(--slate-300)",
                border: selectedCategory === cat ? "1px solid var(--gold-400)" : "1px solid rgba(197, 160, 89, 0.2)",
                padding: "9px 20px",
                borderRadius: "30px",
                fontSize: "0.85rem",
                fontWeight: 600,
                cursor: "pointer",
                transition: "all 0.2s ease"
              }}
            >
              {cat}
            </button>
          ))}
        </div>

        {/* Practice Grid */}
        <div 
          style={{
            display: "grid",
            gridTemplateColumns: "repeat(auto-fit, minmax(350px, 1fr))",
            gap: "24px"
          }}
        >
          {filteredPractices.map((practice) => (
            <div 
              key={practice.id}
              className="bg-glass-card"
              style={{
                borderRadius: "10px",
                padding: "32px",
                display: "flex",
                flexDirection: "column",
                justifyContent: "space-between",
                position: "relative"
              }}
            >
              <div>
                <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center", marginBottom: "16px" }}>
                  <span 
                    style={{
                      fontSize: "0.72rem",
                      textTransform: "uppercase",
                      letterSpacing: "0.1em",
                      color: "var(--gold-400)",
                      fontWeight: 600,
                      background: "rgba(197, 160, 89, 0.12)",
                      padding: "4px 10px",
                      borderRadius: "4px",
                      border: "1px solid rgba(197, 160, 89, 0.25)"
                    }}
                  >
                    {practice.badge}
                  </span>
                  <span style={{ fontSize: "0.78rem", color: "var(--slate-500)" }}>{practice.category}</span>
                </div>

                <h3 
                  style={{
                    fontFamily: "var(--font-serif)",
                    fontSize: "1.32rem",
                    fontWeight: 700,
                    marginBottom: "12px",
                    lineHeight: "1.35",
                    color: "#ffffff"
                  }}
                >
                  {practice.title}
                </h3>

                <p style={{ color: "var(--slate-300)", fontSize: "0.92rem", lineHeight: "1.65", marginBottom: "20px" }}>
                  {practice.summary}
                </p>

                {/* Core Capabilities */}
                <div style={{ marginBottom: "24px" }}>
                  <div style={{ fontSize: "0.75rem", textTransform: "uppercase", letterSpacing: "0.08em", color: "var(--gold-400)", fontWeight: 600, marginBottom: "10px" }}>
                    Core Strategic Engagements:
                  </div>
                  <ul style={{ listStyle: "none", padding: 0, margin: 0, display: "flex", flexDirection: "column", gap: "8px" }}>
                    {practice.coreCapabilities.slice(0, 3).map((item, i) => (
                      <li key={i} style={{ display: "flex", alignItems: "flex-start", gap: "8px", fontSize: "0.86rem", color: "var(--slate-300)" }}>
                        <CheckCircle2 size={15} color="var(--gold-400)" style={{ flexShrink: 0, marginTop: "3px" }} />
                        <span>{item}</span>
                      </li>
                    ))}
                  </ul>
                </div>
              </div>

              <div>
                <div 
                  style={{
                    background: "rgba(4, 11, 22, 0.5)",
                    border: "1px solid rgba(255, 255, 255, 0.06)",
                    borderRadius: "6px",
                    padding: "12px 14px",
                    marginBottom: "18px",
                    fontSize: "0.82rem",
                    color: "var(--slate-400)"
                  }}
                >
                  <strong style={{ color: "var(--gold-300)", display: "block", marginBottom: "4px" }}>
                    Practice Lead:
                  </strong>
                  {practice.leadPartner} · {practice.forum}
                </div>

                <div style={{ display: "flex", gap: "10px" }}>
                  <button
                    type="button"
                    onClick={() => setActiveModalPractice(practice)}
                    style={{
                      flex: 1,
                      background: "rgba(197, 160, 89, 0.1)",
                      border: "1px solid rgba(197, 160, 89, 0.3)",
                      color: "var(--gold-300)",
                      padding: "10px",
                      borderRadius: "4px",
                      fontSize: "0.84rem",
                      fontWeight: 600,
                      cursor: "pointer",
                      display: "flex",
                      alignItems: "center",
                      justifyContent: "center",
                      gap: "6px",
                      transition: "all 0.2s ease"
                    }}
                    onMouseEnter={(e) => (e.currentTarget.style.background = "rgba(197, 160, 89, 0.2)")}
                    onMouseLeave={(e) => (e.currentTarget.style.background = "rgba(197, 160, 89, 0.1)")}
                  >
                    <span>Detailed Brief</span>
                    <ExternalLink size={14} />
                  </button>

                  <button
                    type="button"
                    onClick={() => onSelectPracticeForConsultation(practice.title)}
                    className="btn-gold"
                    style={{ padding: "10px 16px", fontSize: "0.82rem" }}
                  >
                    <span>Engage</span>
                  </button>
                </div>
              </div>

            </div>
          ))}
        </div>

      </div>

      {/* Practice Area Deep Dive Modal */}
      {activeModalPractice && (
        <div className="modal-overlay" onClick={() => setActiveModalPractice(null)}>
          <div 
            className="modal-content-box bg-glass"
            onClick={(e) => e.stopPropagation()}
            style={{
              maxWidth: "800px",
              width: "100%",
              borderRadius: "12px",
              padding: "36px",
              maxHeight: "88vh",
              overflowY: "auto",
              boxShadow: "0 25px 60px rgba(0,0,0,0.8), 0 0 35px rgba(197, 160, 89, 0.2)",
              border: "1px solid rgba(197, 160, 89, 0.4)"
            }}
          >
            <div style={{ display: "flex", justifyContent: "space-between", alignItems: "flex-start", marginBottom: "16px" }}>
              <div className="section-tag" style={{ margin: 0 }}>{activeModalPractice.category}</div>
              <button 
                type="button" 
                onClick={() => setActiveModalPractice(null)}
                style={{
                  background: "transparent",
                  border: "none",
                  color: "var(--slate-400)",
                  fontSize: "1.4rem",
                  cursor: "pointer",
                  lineHeight: "1"
                }}
              >
                ✕
              </button>
            </div>

            <h2 style={{ fontFamily: "var(--font-serif)", fontSize: "1.85rem", color: "#ffffff", marginBottom: "16px" }}>
              {activeModalPractice.title}
            </h2>

            <p style={{ color: "var(--slate-200)", fontSize: "1.02rem", lineHeight: "1.75", marginBottom: "24px" }}>
              {activeModalPractice.deepDive}
            </p>

            {/* Landmark Matter in practice */}
            <div 
              style={{
                background: "rgba(197, 160, 89, 0.08)",
                borderLeft: "3px solid var(--gold-400)",
                padding: "16px 20px",
                borderRadius: "0 8px 8px 0",
                marginBottom: "28px"
              }}
            >
              <div style={{ fontSize: "0.78rem", textTransform: "uppercase", letterSpacing: "0.1em", color: "var(--gold-400)", fontWeight: 700, marginBottom: "4px" }}>
                Landmark Precedent / Representation Highlight
              </div>
              <div style={{ color: "#ffffff", fontSize: "0.95rem", lineHeight: "1.6" }}>
                "{activeModalPractice.landmarkMatterPreview}"
              </div>
            </div>

            {/* All Capabilities list */}
            <div style={{ marginBottom: "32px" }}>
              <h4 style={{ fontSize: "1.05rem", color: "#ffffff", marginBottom: "14px" }}>
                Statutory & Procedural Scope:
              </h4>
              <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(280px, 1fr))", gap: "10px" }}>
                {activeModalPractice.coreCapabilities.map((item, idx) => (
                  <div key={idx} style={{ display: "flex", alignItems: "flex-start", gap: "8px", fontSize: "0.88rem", color: "var(--slate-300)" }}>
                    <CheckCircle2 size={16} color="var(--gold-400)" style={{ flexShrink: 0, marginTop: "2px" }} />
                    <span>{item}</span>
                  </div>
                ))}
              </div>
            </div>

            <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "space-between", alignItems: "center", gap: "16px", borderTop: "1px solid rgba(255, 255, 255, 0.1)", paddingTop: "20px" }}>
              <div>
                <div style={{ fontSize: "0.8rem", color: "var(--slate-400)" }}>Designated Practice Head:</div>
                <div style={{ fontSize: "0.98rem", fontWeight: 700, color: "#ffffff" }}>{activeModalPractice.leadPartner}</div>
              </div>

              <div style={{ display: "flex", gap: "12px" }}>
                <button
                  type="button"
                  onClick={() => setActiveModalPractice(null)}
                  style={{
                    background: "transparent",
                    border: "1px solid rgba(255, 255, 255, 0.2)",
                    color: "var(--slate-300)",
                    padding: "10px 18px",
                    borderRadius: "4px",
                    cursor: "pointer"
                  }}
                >
                  Close
                </button>
                <button
                  type="button"
                  onClick={() => {
                    const title = activeModalPractice.title;
                    setActiveModalPractice(null);
                    onSelectPracticeForConsultation(title);
                  }}
                  className="btn-gold"
                >
                  <span>Retain Chambers for this Matter</span>
                  <ArrowRight size={16} />
                </button>
              </div>
            </div>

          </div>
        </div>
      )}
    </section>
  );
}
