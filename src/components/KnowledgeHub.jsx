import React, { useState } from "react";
import { legalInsights } from "../data/legalData";
import { BookOpen, Clock, Calendar, ArrowRight, Share2, BookmarkCheck } from "lucide-react";

export default function KnowledgeHub({ onConsultationFromInsight }) {
  const [activeArticle, setActiveArticle] = useState(null);

  return (
    <section id="insights" className="section-padding" style={{ background: "var(--navy-950)", position: "relative" }}>
      <div className="legal-container">

        {/* Section Header */}
        <div style={{ textAlign: "center", marginBottom: "48px" }}>
          <div className="section-tag">Thought Leadership & Regulatory Bulletins</div>
          <h2 className="section-title">Knowledge Hub & Legal Digests</h2>
          <p className="section-desc" style={{ margin: "0 auto" }}>
            Authoritative analysis on emerging Supreme Court jurisprudence, corporate governance amendments, and digital technology regulations.
          </p>
        </div>

        {/* Articles Grid */}
        <div 
          style={{
            display: "grid",
            gridTemplateColumns: "repeat(auto-fit, minmax(360px, 1fr))",
            gap: "24px"
          }}
        >
          {legalInsights.map((insight) => (
            <div 
              key={insight.id}
              className="bg-glass-card"
              style={{
                borderRadius: "10px",
                padding: "30px",
                display: "flex",
                flexDirection: "column",
                justifyContent: "space-between"
              }}
            >
              <div>
                <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center", marginBottom: "16px" }}>
                  <span 
                    style={{
                      fontSize: "0.74rem",
                      textTransform: "uppercase",
                      letterSpacing: "0.08em",
                      color: "var(--gold-400)",
                      fontWeight: 700,
                      background: "rgba(197, 160, 89, 0.12)",
                      padding: "4px 10px",
                      borderRadius: "4px"
                    }}
                  >
                    {insight.category}
                  </span>

                  <div style={{ display: "flex", alignItems: "center", gap: "6px", color: "var(--slate-400)", fontSize: "0.78rem" }}>
                    <Clock size={13} />
                    <span>{insight.readTime}</span>
                  </div>
                </div>

                <h3 
                  style={{
                    fontSize: "1.24rem",
                    fontWeight: 700,
                    lineHeight: "1.4",
                    color: "#ffffff",
                    marginBottom: "12px",
                    fontFamily: "var(--font-serif)"
                  }}
                >
                  {insight.title}
                </h3>

                <p style={{ fontSize: "0.9rem", color: "var(--slate-300)", lineHeight: "1.65", marginBottom: "16px" }}>
                  {insight.summary}
                </p>

                <div 
                  style={{
                    background: "rgba(197, 160, 89, 0.08)",
                    borderLeft: "2px solid var(--gold-400)",
                    padding: "10px 14px",
                    borderRadius: "0 4px 4px 0",
                    marginBottom: "20px",
                    fontSize: "0.82rem",
                    color: "var(--slate-200)",
                    fontStyle: "italic"
                  }}
                >
                  <strong style={{ color: "var(--gold-400)", fontStyle: "normal" }}>Key Takeaway: </strong>
                  {insight.keyTakeaway}
                </div>
              </div>

              <div>
                <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center", borderTop: "1px solid rgba(255, 255, 255, 0.08)", paddingTop: "16px" }}>
                  <div style={{ fontSize: "0.78rem", color: "var(--slate-400)" }}>
                    By <strong>{insight.author}</strong> · {insight.date}
                  </div>

                  <button
                    type="button"
                    onClick={() => setActiveArticle(insight)}
                    style={{
                      background: "transparent",
                      border: "none",
                      color: "var(--gold-300)",
                      fontSize: "0.86rem",
                      fontWeight: 700,
                      cursor: "pointer",
                      display: "flex",
                      alignItems: "center",
                      gap: "4px"
                    }}
                  >
                    <span>Read Digest</span>
                    <ArrowRight size={15} />
                  </button>
                </div>
              </div>

            </div>
          ))}
        </div>

      </div>

      {/* Article Reader Modal */}
      {activeArticle && (
        <div className="modal-overlay" onClick={() => setActiveArticle(null)}>
          <div 
            className="modal-content-box bg-glass"
            onClick={(e) => e.stopPropagation()}
            style={{
              maxWidth: "760px",
              width: "100%",
              borderRadius: "12px",
              padding: "36px",
              maxHeight: "88vh",
              overflowY: "auto",
              boxShadow: "0 25px 60px rgba(0, 0, 0, 0.8)",
              border: "1px solid rgba(197, 160, 89, 0.4)"
            }}
          >
            <div style={{ display: "flex", justifyContent: "space-between", alignItems: "flex-start", marginBottom: "18px" }}>
              <div className="section-tag" style={{ margin: 0 }}>{activeArticle.category}</div>
              <button 
                type="button" 
                onClick={() => setActiveArticle(null)}
                style={{
                  background: "transparent",
                  border: "none",
                  color: "var(--slate-400)",
                  fontSize: "1.4rem",
                  cursor: "pointer"
                }}
              >
                ✕
              </button>
            </div>

            <h2 style={{ fontFamily: "var(--font-serif)", fontSize: "1.65rem", color: "#ffffff", marginBottom: "14px", lineHeight: "1.3" }}>
              {activeArticle.title}
            </h2>

            <div style={{ display: "flex", gap: "16px", color: "var(--slate-400)", fontSize: "0.82rem", marginBottom: "24px", borderBottom: "1px solid rgba(255, 255, 255, 0.08)", paddingBottom: "14px" }}>
              <span>Author: <strong>{activeArticle.author}</strong></span>
              <span>•</span>
              <span>Published: {activeArticle.date}</span>
              <span>•</span>
              <span>{activeArticle.readTime}</span>
            </div>

            <div 
              style={{
                background: "rgba(197, 160, 89, 0.1)",
                border: "1px solid rgba(197, 160, 89, 0.3)",
                padding: "16px 20px",
                borderRadius: "8px",
                marginBottom: "24px"
              }}
            >
              <div style={{ fontSize: "0.78rem", textTransform: "uppercase", color: "var(--gold-400)", fontWeight: 700, marginBottom: "4px" }}>
                Executive Counsel Takeaway
              </div>
              <p style={{ color: "#ffffff", fontSize: "0.95rem", lineHeight: "1.65", margin: 0 }}>
                {activeArticle.keyTakeaway}
              </p>
            </div>

            <h4 style={{ fontSize: "1.05rem", color: "#ffffff", marginBottom: "14px" }}>
              Structured Digest & Analysis:
            </h4>

            <div style={{ display: "flex", flexDirection: "column", gap: "16px", marginBottom: "32px" }}>
              {activeArticle.sections.map((sec, sIdx) => (
                <div key={sIdx} style={{ background: "rgba(4, 11, 22, 0.5)", border: "1px solid rgba(255, 255, 255, 0.06)", borderRadius: "8px", padding: "16px" }}>
                  <div style={{ color: "var(--gold-300)", fontWeight: 700, fontSize: "0.95rem", marginBottom: "6px" }}>
                    § {sIdx + 1}. {sec}
                  </div>
                  <p style={{ color: "var(--slate-300)", fontSize: "0.88rem", lineHeight: "1.65", margin: 0 }}>
                    Our legal teams examine the operational mechanics of this topic, advising corporate boards and litigants to preserve evidentiary paper trails and update standard operating procedures.
                  </p>
                </div>
              ))}
            </div>

            <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center", borderTop: "1px solid rgba(255, 255, 255, 0.1)", paddingTop: "20px" }}>
              <button
                type="button"
                onClick={() => setActiveArticle(null)}
                style={{
                  background: "transparent",
                  border: "1px solid rgba(255, 255, 255, 0.2)",
                  color: "var(--slate-300)",
                  padding: "10px 18px",
                  borderRadius: "4px",
                  cursor: "pointer"
                }}
              >
                Close Reader
              </button>

              <button
                type="button"
                onClick={() => {
                  const title = activeArticle.title;
                  setActiveArticle(null);
                  onConsultationFromInsight(title);
                }}
                className="btn-gold"
              >
                <span>Consult Chambers on this Topic</span>
                <ArrowRight size={16} />
              </button>
            </div>

          </div>
        </div>
      )}
    </section>
  );
}
