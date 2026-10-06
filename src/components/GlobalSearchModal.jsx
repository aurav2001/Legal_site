import React, { useState } from "react";
import { practiceAreas, landmarkMatters, partnersDirectory, legalInsights } from "../data/legalData";
import { Search, X, Scale, Award, BookOpen, User, ArrowRight } from "lucide-react";

export default function GlobalSearchModal({ isOpen, onClose, onSelectPractice, onSelectPartner }) {
  const [query, setQuery] = useState("");

  if (!isOpen) return null;

  const q = query.trim().toLowerCase();

  const matchedPractices = q ? practiceAreas.filter(p => 
    p.title.toLowerCase().includes(q) || 
    p.summary.toLowerCase().includes(q) ||
    p.coreCapabilities.some(c => c.toLowerCase().includes(q))
  ) : [];

  const matchedMatters = q ? landmarkMatters.filter(m => 
    m.title.toLowerCase().includes(q) || 
    m.summary.toLowerCase().includes(q) ||
    m.forum.toLowerCase().includes(q)
  ) : [];

  const matchedPartners = q ? partnersDirectory.filter(p => 
    p.name.toLowerCase().includes(q) || 
    p.role.toLowerCase().includes(q) ||
    p.specialties.some(s => s.toLowerCase().includes(q))
  ) : [];

  const matchedArticles = q ? legalInsights.filter(a => 
    a.title.toLowerCase().includes(q) || 
    a.summary.toLowerCase().includes(q) ||
    a.category.toLowerCase().includes(q)
  ) : [];

  const totalResults = matchedPractices.length + matchedMatters.length + matchedPartners.length + matchedArticles.length;

  return (
    <div className="modal-overlay" onClick={onClose}>
      <div 
        className="modal-content-box bg-glass"
        onClick={(e) => e.stopPropagation()}
        style={{
          maxWidth: "700px",
          width: "100%",
          borderRadius: "12px",
          padding: "28px",
          maxHeight: "85vh",
          overflowY: "auto",
          boxShadow: "0 25px 60px rgba(0, 0, 0, 0.8)",
          border: "1px solid rgba(197, 160, 89, 0.4)"
        }}
      >
        {/* Search input header */}
        <div style={{ display: "flex", alignItems: "center", gap: "12px", borderBottom: "1px solid rgba(197, 160, 89, 0.3)", paddingBottom: "16px", marginBottom: "20px" }}>
          <Search size={22} color="var(--gold-400)" />
          <input
            autoFocus
            type="text"
            placeholder="Search practices, Supreme Court precedents, partners, or statutes..."
            value={query}
            onChange={(e) => setQuery(e.target.value)}
            style={{
              flex: 1,
              background: "transparent",
              border: "none",
              color: "#ffffff",
              fontSize: "1.1rem",
              outline: "none"
            }}
          />
          <button 
            type="button" 
            onClick={onClose}
            style={{
              background: "transparent",
              border: "none",
              color: "var(--slate-400)",
              fontSize: "1.3rem",
              cursor: "pointer"
            }}
          >
            ✕
          </button>
        </div>

        {/* Results */}
        {!q ? (
          <div style={{ textAlign: "center", padding: "40px 20px", color: "var(--slate-400)" }}>
            <div style={{ fontSize: "0.95rem", marginBottom: "8px" }}>
              Type keywords such as <strong style={{ color: "var(--gold-300)" }}>"Arbitration"</strong>, <strong style={{ color: "var(--gold-300)" }}>"Supreme Court"</strong>, <strong style={{ color: "var(--gold-300)" }}>"PMLA"</strong>, or <strong style={{ color: "var(--gold-300)" }}>"Patent"</strong>.
            </div>
            <div style={{ fontSize: "0.82rem", color: "var(--slate-500)" }}>
              Instant indexing across all practice briefs, partner bios, and reported cases.
            </div>
          </div>
        ) : totalResults === 0 ? (
          <div style={{ textAlign: "center", padding: "40px 20px", color: "var(--slate-400)" }}>
            No legal records found matching "{query}".
          </div>
        ) : (
          <div style={{ display: "flex", flexDirection: "column", gap: "20px" }}>
            
            {/* Practices */}
            {matchedPractices.length > 0 && (
              <div>
                <div style={{ fontSize: "0.75rem", textTransform: "uppercase", letterSpacing: "0.1em", color: "var(--gold-400)", fontWeight: 700, marginBottom: "8px" }}>
                  Practice Areas ({matchedPractices.length})
                </div>
                <div style={{ display: "flex", flexDirection: "column", gap: "8px" }}>
                  {matchedPractices.map((p) => (
                    <div 
                      key={p.id}
                      onClick={() => {
                        onClose();
                        onSelectPractice(p.title);
                      }}
                      style={{
                        background: "rgba(4, 11, 22, 0.6)",
                        border: "1px solid rgba(255, 255, 255, 0.08)",
                        borderRadius: "6px",
                        padding: "12px 16px",
                        cursor: "pointer",
                        display: "flex",
                        justifyContent: "space-between",
                        alignItems: "center"
                      }}
                    >
                      <div>
                        <div style={{ color: "#ffffff", fontWeight: 600, fontSize: "0.95rem" }}>{p.title}</div>
                        <div style={{ color: "var(--slate-400)", fontSize: "0.82rem" }}>{p.category} · {p.leadPartner}</div>
                      </div>
                      <ArrowRight size={15} color="var(--gold-400)" />
                    </div>
                  ))}
                </div>
              </div>
            )}

            {/* Partners */}
            {matchedPartners.length > 0 && (
              <div>
                <div style={{ fontSize: "0.75rem", textTransform: "uppercase", letterSpacing: "0.1em", color: "var(--gold-400)", fontWeight: 700, marginBottom: "8px" }}>
                  Partners & Senior Advocates ({matchedPartners.length})
                </div>
                <div style={{ display: "flex", flexDirection: "column", gap: "8px" }}>
                  {matchedPartners.map((pt) => (
                    <div 
                      key={pt.id}
                      onClick={() => {
                        onClose();
                        onSelectPartner(pt.name);
                      }}
                      style={{
                        background: "rgba(4, 11, 22, 0.6)",
                        border: "1px solid rgba(255, 255, 255, 0.08)",
                        borderRadius: "6px",
                        padding: "12px 16px",
                        cursor: "pointer",
                        display: "flex",
                        justifyContent: "space-between",
                        alignItems: "center"
                      }}
                    >
                      <div>
                        <div style={{ color: "#ffffff", fontWeight: 600, fontSize: "0.95rem" }}>{pt.name}</div>
                        <div style={{ color: "var(--gold-400)", fontSize: "0.82rem" }}>{pt.role} ({pt.chambers})</div>
                      </div>
                      <ArrowRight size={15} color="var(--gold-400)" />
                    </div>
                  ))}
                </div>
              </div>
            )}

            {/* Precedents */}
            {matchedMatters.length > 0 && (
              <div>
                <div style={{ fontSize: "0.75rem", textTransform: "uppercase", letterSpacing: "0.1em", color: "var(--gold-400)", fontWeight: 700, marginBottom: "8px" }}>
                  Landmark Matters & Rulings ({matchedMatters.length})
                </div>
                <div style={{ display: "flex", flexDirection: "column", gap: "8px" }}>
                  {matchedMatters.map((m) => (
                    <div 
                      key={m.id}
                      style={{
                        background: "rgba(4, 11, 22, 0.6)",
                        border: "1px solid rgba(255, 255, 255, 0.08)",
                        borderRadius: "6px",
                        padding: "12px 16px"
                      }}
                    >
                      <div style={{ color: "#ffffff", fontWeight: 600, fontSize: "0.92rem" }}>{m.title}</div>
                      <div style={{ color: "var(--gold-300)", fontSize: "0.8rem", marginTop: "2px" }}>{m.forum} · {m.value}</div>
                    </div>
                  ))}
                </div>
              </div>
            )}

            {/* Articles */}
            {matchedArticles.length > 0 && (
              <div>
                <div style={{ fontSize: "0.75rem", textTransform: "uppercase", letterSpacing: "0.1em", color: "var(--gold-400)", fontWeight: 700, marginBottom: "8px" }}>
                  Legal Insights & Bulletins ({matchedArticles.length})
                </div>
                <div style={{ display: "flex", flexDirection: "column", gap: "8px" }}>
                  {matchedArticles.map((a) => (
                    <div 
                      key={a.id}
                      style={{
                        background: "rgba(4, 11, 22, 0.6)",
                        border: "1px solid rgba(255, 255, 255, 0.08)",
                        borderRadius: "6px",
                        padding: "12px 16px"
                      }}
                    >
                      <div style={{ color: "#ffffff", fontWeight: 600, fontSize: "0.92rem" }}>{a.title}</div>
                      <div style={{ color: "var(--slate-400)", fontSize: "0.8rem", marginTop: "2px" }}>{a.category} · By {a.author}</div>
                    </div>
                  ))}
                </div>
              </div>
            )}

          </div>
        )}
      </div>
    </div>
  );
}
