import React, { useState } from "react";
import { landmarkMatters } from "../data/legalData";
import { Scale, Award, ArrowUpRight, CheckCircle } from "lucide-react";

export default function LandmarkMatters({ onOpenConsultation }) {
  const [selectedTag, setSelectedTag] = useState("All");

  const tags = ["All", "Supreme Court of India", "Cross-Border Arbitration", "NCLAT / IBC Landmark", "Delhi High Court IP Division"];

  const filteredMatters = selectedTag === "All"
    ? landmarkMatters
    : landmarkMatters.filter(m => m.tag === selectedTag || m.forum.includes(selectedTag));

  return (
    <section id="precedents" className="section-padding" style={{ background: "var(--navy-950)", position: "relative" }}>
      <div className="legal-container">

        {/* Section Header */}
        <div style={{ textAlign: "center", marginBottom: "48px" }}>
          <div className="section-tag">Track Record & Judicial Precedents</div>
          <h2 className="section-title">Landmark Matters & Precedential Victories</h2>
          <p className="section-desc" style={{ margin: "0 auto" }}>
            Decisions that shaped Indian commercial jurisprudence, protected constitutional liberties, and salvaged billions in distressed corporate assets.
          </p>
        </div>

        {/* Filter Tags */}
        <div 
          style={{
            display: "flex",
            justifyContent: "center",
            flexWrap: "wrap",
            gap: "8px",
            marginBottom: "36px"
          }}
        >
          {tags.map((t) => (
            <button
              key={t}
              type="button"
              onClick={() => setSelectedTag(t)}
              style={{
                background: selectedTag === t ? "var(--gold-gradient)" : "rgba(17, 37, 68, 0.35)",
                color: selectedTag === t ? "#030812" : "var(--slate-300)",
                border: selectedTag === t ? "1px solid var(--gold-400)" : "1px solid rgba(197, 160, 89, 0.18)",
                padding: "8px 18px",
                borderRadius: "20px",
                fontSize: "0.82rem",
                fontWeight: 600,
                cursor: "pointer",
                transition: "all 0.2s ease"
              }}
            >
              {t}
            </button>
          ))}
        </div>

        {/* Matters Grid */}
        <div 
          style={{
            display: "grid",
            gridTemplateColumns: "repeat(auto-fit, minmax(360px, 1fr))",
            gap: "24px"
          }}
        >
          {filteredMatters.map((matter) => (
            <div 
              key={matter.id}
              className="bg-glass-card"
              style={{
                borderRadius: "10px",
                padding: "30px",
                display: "flex",
                flexDirection: "column",
                justifyContent: "space-between",
                position: "relative"
              }}
            >
              <div>
                <div style={{ display: "flex", justifyContent: "space-between", alignItems: "flex-start", marginBottom: "14px", gap: "10px" }}>
                  <span 
                    style={{
                      fontSize: "0.72rem",
                      textTransform: "uppercase",
                      letterSpacing: "0.08em",
                      color: "var(--gold-400)",
                      fontWeight: 700,
                      background: "rgba(197, 160, 89, 0.12)",
                      padding: "4px 10px",
                      borderRadius: "4px"
                    }}
                  >
                    {matter.tag}
                  </span>
                  
                  <span 
                    style={{
                      fontSize: "0.95rem",
                      fontWeight: 700,
                      color: "var(--gold-300)",
                      fontFamily: "var(--font-serif)"
                    }}
                  >
                    {matter.value}
                  </span>
                </div>

                <h3 
                  style={{
                    fontSize: "1.2rem",
                    fontWeight: 700,
                    lineHeight: "1.4",
                    color: "#ffffff",
                    marginBottom: "10px",
                    fontFamily: "var(--font-serif)"
                  }}
                >
                  {matter.title}
                </h3>

                <div style={{ fontSize: "0.82rem", color: "var(--slate-400)", marginBottom: "14px" }}>
                  <strong>Forum:</strong> {matter.forum}
                </div>

                <p style={{ fontSize: "0.9rem", color: "var(--slate-300)", lineHeight: "1.65", marginBottom: "20px" }}>
                  {matter.summary}
                </p>
              </div>

              <div>
                <div 
                  style={{
                    display: "flex",
                    alignItems: "center",
                    gap: "8px",
                    background: "rgba(16, 185, 129, 0.08)",
                    border: "1px solid rgba(16, 185, 129, 0.25)",
                    padding: "8px 12px",
                    borderRadius: "4px",
                    color: "#34d399",
                    fontSize: "0.82rem",
                    fontWeight: 600,
                    marginBottom: "16px"
                  }}
                >
                  <CheckCircle size={15} />
                  <span>Outcome: {matter.outcome}</span>
                </div>

                <button
                  type="button"
                  onClick={onOpenConsultation}
                  style={{
                    width: "100%",
                    background: "transparent",
                    border: "1px solid rgba(197, 160, 89, 0.25)",
                    color: "var(--gold-300)",
                    padding: "9px",
                    borderRadius: "4px",
                    fontSize: "0.82rem",
                    fontWeight: 600,
                    cursor: "pointer",
                    display: "flex",
                    alignItems: "center",
                    justifyContent: "center",
                    gap: "6px",
                    transition: "all 0.2s ease"
                  }}
                  onMouseEnter={(e) => {
                    e.currentTarget.style.background = "rgba(197, 160, 89, 0.15)";
                    e.currentTarget.style.borderColor = "var(--gold-400)";
                  }}
                  onMouseLeave={(e) => {
                    e.currentTarget.style.background = "transparent";
                    e.currentTarget.style.borderColor = "rgba(197, 160, 89, 0.25)";
                  }}
                >
                  <span>Request Precedent Case Brief</span>
                  <ArrowUpRight size={14} />
                </button>
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
}
