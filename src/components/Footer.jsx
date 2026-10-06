import React, { useState } from "react";
import { Scale, PhoneCall, Mail, MapPin, ShieldAlert, ArrowRight, CheckCircle2 } from "lucide-react";
import { firmProfile, practiceAreas, chamberLocations } from "../data/legalData";

export default function Footer({ onOpenDisclaimer, onOpenConsultation }) {
  const [subscribed, setSubscribed] = useState(false);
  const [subEmail, setSubEmail] = useState("");

  const handleSubscribe = (e) => {
    e.preventDefault();
    if (subEmail) {
      setSubscribed(true);
      setSubEmail("");
    }
  };

  return (
    <footer style={{ background: "#02060e", borderTop: "1px solid rgba(197, 160, 89, 0.25)", paddingTop: "80px", paddingBottom: "36px", position: "relative" }}>
      <div className="legal-container">

        {/* Top Tier: Pre-footer Emergency Banner */}
        <div 
          className="bg-glass"
          style={{
            borderRadius: "10px",
            padding: "32px 36px",
            marginBottom: "64px",
            border: "1px solid rgba(197, 160, 89, 0.35)",
            display: "flex",
            flexWrap: "wrap",
            justifyContent: "space-between",
            alignItems: "center",
            gap: "24px",
            background: "linear-gradient(135deg, rgba(8, 19, 37, 0.9) 0%, rgba(17, 37, 68, 0.7) 100%)"
          }}
        >
          <div>
            <div style={{ display: "inline-flex", alignItems: "center", gap: "6px", color: "var(--gold-400)", fontSize: "0.78rem", textTransform: "uppercase", letterSpacing: "0.1em", fontWeight: 700, marginBottom: "4px" }}>
              <span style={{ width: "8px", height: "8px", borderRadius: "50%", background: "#10b981", display: "inline-block" }}></span>
              <span>24/7 Vacation Bench & Emergency Injunction Desk</span>
            </div>
            <h3 style={{ fontSize: "1.45rem", fontWeight: 700, color: "#ffffff", margin: 0, fontFamily: "var(--font-serif)" }}>
              Facing Urgent Coercive Steps, Asset Seizure or Injunction?
            </h3>
            <p style={{ color: "var(--slate-300)", fontSize: "0.9rem", margin: "4px 0 0 0" }}>
              Immediate drafting and mention before Supreme Court Vacation Benches and High Courts.
            </p>
          </div>

          <div style={{ display: "flex", alignItems: "center", gap: "14px" }}>
            <a 
              href={`tel:${firmProfile.emergencyHotline}`}
              style={{
                display: "inline-flex",
                alignItems: "center",
                gap: "8px",
                background: "rgba(255, 255, 255, 0.08)",
                border: "1px solid rgba(255, 255, 255, 0.2)",
                color: "#ffffff",
                padding: "12px 20px",
                borderRadius: "4px",
                fontSize: "0.92rem",
                fontWeight: 700,
                textDecoration: "none"
              }}
            >
              <PhoneCall size={16} color="var(--gold-400)" />
              <span>{firmProfile.emergencyHotline}</span>
            </a>

            <button
              type="button"
              onClick={onOpenConsultation}
              className="btn-gold"
              style={{ padding: "12px 24px" }}
            >
              <span>Retain Immediate Counsel</span>
              <ArrowRight size={16} />
            </button>
          </div>
        </div>

        {/* 4 Columns */}
        <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(240px, 1fr))", gap: "36px", marginBottom: "50px" }}>
          
          {/* Col 1: Firm Overview */}
          <div>
            <div style={{ display: "flex", alignItems: "center", gap: "10px", marginBottom: "16px" }}>
              <div 
                style={{
                  width: "36px",
                  height: "36px",
                  borderRadius: "6px",
                  background: "rgba(197, 160, 89, 0.2)",
                  border: "1px solid var(--gold-400)",
                  display: "flex",
                  alignItems: "center",
                  justifyContent: "center",
                  color: "var(--gold-400)"
                }}
              >
                <Scale size={20} />
              </div>
              <div style={{ fontFamily: "var(--font-serif)", fontSize: "1.2rem", fontWeight: 700, color: "#ffffff" }}>
                VANGUARD <span style={{ color: "var(--gold-400)" }}>&</span> PARTNERS
              </div>
            </div>

            <p style={{ color: "var(--slate-400)", fontSize: "0.85rem", lineHeight: "1.7", marginBottom: "20px" }}>
              A premier Tier-1 full service Indian law firm delivering decisive counsel across commercial disputes, international arbitrations, and high-value transactions.
            </p>

            <button
              type="button"
              onClick={onOpenDisclaimer}
              style={{
                background: "transparent",
                border: "1px solid rgba(197, 160, 89, 0.3)",
                color: "var(--gold-300)",
                padding: "8px 14px",
                borderRadius: "4px",
                fontSize: "0.78rem",
                cursor: "pointer",
                display: "inline-flex",
                alignItems: "center",
                gap: "6px"
              }}
            >
              <ShieldAlert size={14} />
              <span>Review BCI Compliance Notice</span>
            </button>
          </div>

          {/* Col 2: Key Practice Areas */}
          <div>
            <h4 style={{ color: "#ffffff", fontSize: "0.95rem", textTransform: "uppercase", letterSpacing: "0.08em", marginBottom: "18px" }}>
              Key Practice Areas
            </h4>
            <ul style={{ listStyle: "none", padding: 0, margin: 0, display: "flex", flexDirection: "column", gap: "10px" }}>
              {practiceAreas.slice(0, 6).map((p) => (
                <li key={p.id}>
                  <a
                    href="#practices"
                    style={{
                      color: "var(--slate-400)",
                      textDecoration: "none",
                      fontSize: "0.86rem",
                      transition: "color 0.2s ease"
                    }}
                    onMouseEnter={(e) => (e.target.style.color = "var(--gold-400)")}
                    onMouseLeave={(e) => (e.target.style.color = "var(--slate-400)")}
                  >
                    {p.title}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          {/* Col 3: Chambers Contact */}
          <div>
            <h4 style={{ color: "#ffffff", fontSize: "0.95rem", textTransform: "uppercase", letterSpacing: "0.08em", marginBottom: "18px" }}>
              Principal Chambers
            </h4>
            <div style={{ display: "flex", flexDirection: "column", gap: "14px", fontSize: "0.85rem", color: "var(--slate-400)" }}>
              <div>
                <strong style={{ color: "#ffffff", display: "block" }}>New Delhi (Supreme Court):</strong>
                14 Barakhamba Road, Connaught Place & Supreme Court Chambers
              </div>
              <div>
                <strong style={{ color: "#ffffff", display: "block" }}>Mumbai (High Court & BKC):</strong>
                One International Centre & Nariman Point
              </div>
              <div>
                <strong style={{ color: "#ffffff", display: "block" }}>Singapore Desk:</strong>
                Marina Bay Financial Centre, MBFC Tower 1
              </div>
            </div>
          </div>

          {/* Col 4: Legal Bulletins Newsletter */}
          <div>
            <h4 style={{ color: "#ffffff", fontSize: "0.95rem", textTransform: "uppercase", letterSpacing: "0.08em", marginBottom: "18px" }}>
              Regulatory & Supreme Court Digest
            </h4>
            <p style={{ color: "var(--slate-400)", fontSize: "0.84rem", lineHeight: "1.6", marginBottom: "14px" }}>
              Receive monthly strategic briefings on critical judgments and statutory amendments directly in your inbox.
            </p>

            {subscribed ? (
              <div style={{ background: "rgba(16, 185, 129, 0.1)", border: "1px solid #10b981", padding: "12px", borderRadius: "4px", color: "#34d399", fontSize: "0.82rem", display: "flex", alignItems: "center", gap: "8px" }}>
                <CheckCircle2 size={16} />
                <span>Subscription recorded for legal updates.</span>
              </div>
            ) : (
              <form onSubmit={handleSubscribe} style={{ display: "flex", flexDirection: "column", gap: "8px" }}>
                <input
                  type="email"
                  required
                  placeholder="legalcounsel@company.com"
                  value={subEmail}
                  onChange={(e) => setSubEmail(e.target.value)}
                  style={{
                    background: "rgba(4, 11, 22, 0.7)",
                    border: "1px solid rgba(197, 160, 89, 0.25)",
                    borderRadius: "4px",
                    padding: "10px 12px",
                    color: "#ffffff",
                    fontSize: "0.85rem",
                    outline: "none"
                  }}
                />
                <button
                  type="submit"
                  className="btn-gold"
                  style={{ padding: "10px", fontSize: "0.8rem", width: "100%" }}
                >
                  <span>Subscribe to Bulletins</span>
                </button>
              </form>
            )}
          </div>

        </div>

        {/* BCI Disclaimer Footer Note */}
        <div 
          style={{
            borderTop: "1px solid rgba(255, 255, 255, 0.08)",
            paddingTop: "24px",
            marginTop: "32px",
            fontSize: "0.78rem",
            color: "var(--slate-500)",
            lineHeight: "1.7"
          }}
        >
          <p style={{ marginBottom: "10px" }}>
            <strong>DISCLAIMER & TERMS OF ACCESS:</strong> Under the rules of the Bar Council of India, this website does not constitute an advertisement, solicitation, personal communication, invitation, or inducement. All content provided is solely for informational purposes at the unsolicited request of the user. No attorney-client relationship is created hereby.
          </p>
          <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "space-between", alignItems: "center", gap: "10px" }}>
            <div>
              © {new Date().getFullYear()} Vanguard & Partners Advocates & Solicitors. All rights reserved under the Advocates Act, 1961.
            </div>
            <div style={{ display: "flex", gap: "16px" }}>
              <a href="#" onClick={(e) => { e.preventDefault(); onOpenDisclaimer(); }} style={{ color: "var(--gold-400)", textDecoration: "none" }}>Bar Council Disclaimer</a>
              <a href="#" onClick={(e) => { e.preventDefault(); alert("Chambers Privacy Charter: All client inquiries and evidentiary records are safeguarded by attorney-client privilege under Section 126 of the Indian Evidence Act / BSA 2023."); }} style={{ color: "var(--slate-400)", textDecoration: "none" }}>Privilege Policy</a>
              <a href="#chambers" style={{ color: "var(--slate-400)", textDecoration: "none" }}>Chambers Roster</a>
            </div>
          </div>
        </div>

      </div>
    </footer>
  );
}
