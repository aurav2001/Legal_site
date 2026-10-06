import React, { useState } from "react";
import { estimatorData } from "../data/legalData";
import { Clock, ShieldAlert, CheckSquare, FileText, ArrowRight, Gavel, Calendar } from "lucide-react";

export default function CaseEstimator({ onBookForMatter }) {
  const [selectedDisputeId, setSelectedDisputeId] = useState(estimatorData.disputeTypes[0].id);

  const currentMatter = estimatorData.disputeTypes.find(d => d.id === selectedDisputeId) || estimatorData.disputeTypes[0];

  return (
    <section id="estimator" className="section-padding" style={{ background: "linear-gradient(180deg, var(--navy-950) 0%, #061122 100%)", position: "relative" }}>
      <div className="legal-container">

        {/* Section Header */}
        <div style={{ textAlign: "center", marginBottom: "48px" }}>
          <div className="section-tag">Interactive Legal Advisory Tool</div>
          <h2 className="section-title">Procedural Roadmap & Timeline Navigator</h2>
          <p className="section-desc" style={{ margin: "0 auto" }}>
            Understand the exact stages, statutory deadlines, and requisite documentary records for high-stakes litigation and arbitration before Indian and international forums.
          </p>
        </div>

        {/* Dispute Type Selector Pills */}
        <div 
          style={{
            display: "flex",
            gap: "10px",
            overflowX: "auto",
            paddingBottom: "16px",
            marginBottom: "32px",
            justifyContent: "flex-start"
          }}
        >
          {estimatorData.disputeTypes.map((dispute) => (
            <button
              key={dispute.id}
              type="button"
              onClick={() => setSelectedDisputeId(dispute.id)}
              style={{
                flexShrink: 0,
                background: selectedDisputeId === dispute.id ? "var(--gold-gradient)" : "rgba(17, 37, 68, 0.4)",
                color: selectedDisputeId === dispute.id ? "#060e1a" : "var(--slate-300)",
                border: selectedDisputeId === dispute.id ? "1px solid var(--gold-400)" : "1px solid rgba(197, 160, 89, 0.18)",
                padding: "12px 22px",
                borderRadius: "6px",
                fontSize: "0.88rem",
                fontWeight: 600,
                cursor: "pointer",
                transition: "all 0.2s ease"
              }}
            >
              {dispute.name}
            </button>
          ))}
        </div>

        {/* Main Strategic Card */}
        <div 
          className="bg-glass"
          style={{
            borderRadius: "12px",
            padding: "36px",
            border: "1px solid rgba(197, 160, 89, 0.3)",
            boxShadow: "0 20px 50px rgba(0, 0, 0, 0.5)"
          }}
        >
          {/* Header Info */}
          <div 
            style={{
              display: "flex",
              flexWrap: "wrap",
              justifyContent: "space-between",
              alignItems: "center",
              gap: "20px",
              borderBottom: "1px solid rgba(255, 255, 255, 0.1)",
              paddingBottom: "24px",
              marginBottom: "32px"
            }}
          >
            <div>
              <div style={{ fontSize: "0.78rem", textTransform: "uppercase", letterSpacing: "0.1em", color: "var(--gold-400)", fontWeight: 700, marginBottom: "4px" }}>
                Target Judicial / Arbitral Forum
              </div>
              <h3 style={{ fontSize: "1.55rem", fontWeight: 700, color: "#ffffff", margin: 0, fontFamily: "var(--font-serif)" }}>
                {currentMatter.name}
              </h3>
              <div style={{ color: "var(--slate-400)", fontSize: "0.9rem", marginTop: "4px" }}>
                Jurisdiction: <span style={{ color: "var(--slate-200)", fontWeight: 600 }}>{currentMatter.forum}</span>
              </div>
            </div>

            <div 
              style={{
                background: "rgba(197, 160, 89, 0.12)",
                border: "1px solid rgba(197, 160, 89, 0.3)",
                borderRadius: "8px",
                padding: "14px 22px",
                textAlign: "right"
              }}
            >
              <div style={{ display: "flex", alignItems: "center", gap: "6px", color: "var(--gold-400)", fontSize: "0.76rem", textTransform: "uppercase", fontWeight: 700, letterSpacing: "0.08em" }}>
                <Clock size={14} />
                <span>Estimated Procedural Trajectory</span>
              </div>
              <div style={{ fontSize: "1.15rem", fontWeight: 700, color: "#ffffff", marginTop: "2px" }}>
                {currentMatter.estimatedTimeline}
              </div>
            </div>
          </div>

          {/* Procedural Phases Timeline */}
          <div style={{ marginBottom: "36px" }}>
            <h4 style={{ fontSize: "1.1rem", color: "#ffffff", marginBottom: "18px", display: "flex", alignItems: "center", gap: "8px" }}>
              <Calendar size={18} color="var(--gold-400)" />
              <span>Procedural Milestones & Strategic Action Plan</span>
            </h4>

            <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(260px, 1fr))", gap: "16px" }}>
              {currentMatter.phases.map((ph, idx) => (
                <div 
                  key={idx}
                  style={{
                    background: "rgba(8, 19, 37, 0.7)",
                    border: "1px solid rgba(197, 160, 89, 0.16)",
                    borderRadius: "8px",
                    padding: "20px",
                    position: "relative"
                  }}
                >
                  <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center", marginBottom: "10px" }}>
                    <span 
                      style={{
                        fontSize: "0.72rem",
                        fontWeight: 700,
                        color: "var(--gold-400)",
                        background: "rgba(197, 160, 89, 0.12)",
                        padding: "3px 8px",
                        borderRadius: "4px"
                      }}
                    >
                      Step 0{idx + 1}
                    </span>
                    <span style={{ fontSize: "0.75rem", color: "var(--slate-400)", fontWeight: 600 }}>
                      {ph.duration}
                    </span>
                  </div>

                  <h5 style={{ fontSize: "0.95rem", fontWeight: 700, color: "#ffffff", marginBottom: "8px" }}>
                    {ph.phase}
                  </h5>

                  <p style={{ fontSize: "0.84rem", color: "var(--slate-300)", lineHeight: "1.6", margin: 0 }}>
                    {ph.action}
                  </p>
                </div>
              ))}
            </div>
          </div>

          {/* Documentary Checklist & Statutory Warning */}
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(320px, 1fr))", gap: "24px", marginBottom: "32px" }}>
            
            {/* Docs checklist */}
            <div 
              style={{
                background: "rgba(4, 11, 22, 0.6)",
                border: "1px solid rgba(255, 255, 255, 0.08)",
                borderRadius: "8px",
                padding: "22px"
              }}
            >
              <div style={{ display: "flex", alignItems: "center", gap: "8px", marginBottom: "14px", color: "var(--gold-400)", fontWeight: 700, fontSize: "0.88rem", textTransform: "uppercase" }}>
                <FileText size={17} />
                <span>Requisite Documentary Records</span>
              </div>
              <ul style={{ listStyle: "none", padding: 0, margin: 0, display: "flex", flexDirection: "column", gap: "10px" }}>
                {currentMatter.requiredDocs.map((doc, dIdx) => (
                  <li key={dIdx} style={{ display: "flex", alignItems: "flex-start", gap: "8px", fontSize: "0.85rem", color: "var(--slate-300)" }}>
                    <CheckSquare size={15} color="var(--gold-400)" style={{ flexShrink: 0, marginTop: "2px" }} />
                    <span>{doc}</span>
                  </li>
                ))}
              </ul>
            </div>

            {/* Statutory Caveat */}
            <div 
              style={{
                background: "rgba(180, 83, 9, 0.08)",
                border: "1px solid rgba(245, 158, 11, 0.3)",
                borderRadius: "8px",
                padding: "22px",
                display: "flex",
                flexDirection: "column",
                justifyContent: "space-between"
              }}
            >
              <div>
                <div style={{ display: "flex", alignItems: "center", gap: "8px", marginBottom: "12px", color: "#fbbf24", fontWeight: 700, fontSize: "0.88rem", textTransform: "uppercase" }}>
                  <ShieldAlert size={18} />
                  <span>Statutory Limitation & Caveat Warning</span>
                </div>
                <p style={{ color: "var(--slate-200)", fontSize: "0.9rem", lineHeight: "1.65" }}>
                  {currentMatter.statutoryWarning}
                </p>
              </div>

              <div style={{ marginTop: "20px" }}>
                <button
                  type="button"
                  onClick={() => onBookForMatter(currentMatter.name)}
                  className="btn-gold"
                  style={{ width: "100%", padding: "12px", fontSize: "0.88rem" }}
                >
                  <span>Initiate Case Briefing for this Matter</span>
                  <ArrowRight size={16} />
                </button>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section>
  );
}
