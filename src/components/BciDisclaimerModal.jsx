import React, { useState, useEffect } from "react";
import { Scale, ShieldCheck, ArrowRight, XCircle } from "lucide-react";
import { bciDisclaimerText } from "../data/legalData";

export default function BciDisclaimerModal({ forceOpen, onClose }) {
  const [isOpen, setIsOpen] = useState(false);

  useEffect(() => {
    if (forceOpen) {
      setIsOpen(true);
      return;
    }
    const hasAgreed = sessionStorage.getItem("vanguard_bci_acknowledged");
    if (!hasAgreed) {
      setIsOpen(true);
    }
  }, [forceOpen]);

  const handleAgree = () => {
    sessionStorage.setItem("vanguard_bci_acknowledged", "true");
    setIsOpen(false);
    if (onClose) onClose();
  };

  const handleDecline = () => {
    window.location.href = "https://www.google.com";
  };

  if (!isOpen) return null;

  return (
    <div className="modal-overlay" role="dialog" aria-modal="true">
      <div 
        className="modal-content-box bg-glass"
        style={{
          maxWidth: "760px",
          width: "100%",
          borderRadius: "12px",
          padding: "36px 40px",
          boxShadow: "0 25px 60px rgba(0, 0, 0, 0.7), 0 0 35px rgba(197, 160, 89, 0.2)",
          border: "1px solid rgba(197, 160, 89, 0.4)",
          maxHeight: "90vh",
          overflowY: "auto",
          position: "relative"
        }}
      >
        <div style={{ display: "flex", alignItems: "center", gap: "14px", marginBottom: "20px" }}>
          <div 
            style={{
              width: "48px",
              height: "48px",
              borderRadius: "10px",
              background: "rgba(197, 160, 89, 0.15)",
              border: "1px solid rgba(197, 160, 89, 0.35)",
              display: "flex",
              alignItems: "center",
              justifyContent: "center",
              color: "var(--gold-400)",
              flexShrink: 0
            }}
          >
            <Scale size={26} />
          </div>
          <div>
            <div style={{ fontSize: "0.75rem", textTransform: "uppercase", letterSpacing: "0.12em", color: "var(--gold-400)", fontWeight: 600 }}>
              Statutory Compliance Notice
            </div>
            <h2 style={{ fontSize: "1.45rem", fontWeight: 700, margin: 0, color: "#ffffff" }}>
              {bciDisclaimerText.title}
            </h2>
          </div>
        </div>

        <div 
          style={{
            background: "rgba(3, 8, 17, 0.6)",
            border: "1px solid rgba(255, 255, 255, 0.08)",
            borderRadius: "8px",
            padding: "20px 24px",
            marginBottom: "28px",
            fontSize: "0.93rem",
            color: "var(--slate-300)",
            lineHeight: "1.7"
          }}
        >
          {bciDisclaimerText.paragraphs.map((p, idx) => (
            <p key={idx} style={{ marginBottom: idx === bciDisclaimerText.paragraphs.length - 1 ? 0 : "14px" }}>
              {p}
            </p>
          ))}
        </div>

        <div style={{ display: "flex", flexWrap: "wrap", alignItems: "center", justifyContent: "space-between", gap: "16px" }}>
          <div style={{ display: "flex", alignItems: "center", gap: "8px", color: "var(--slate-400)", fontSize: "0.85rem" }}>
            <ShieldCheck size={16} color="var(--gold-400)" />
            <span>Advocates Act, 1961 · Bar Council of India Rules</span>
          </div>

          <div style={{ display: "flex", alignItems: "center", gap: "12px" }}>
            <button 
              type="button"
              onClick={handleDecline}
              style={{
                background: "transparent",
                border: "1px solid rgba(255, 255, 255, 0.2)",
                color: "var(--slate-400)",
                padding: "10px 20px",
                borderRadius: "4px",
                fontSize: "0.9rem",
                cursor: "pointer",
                transition: "all 0.2s ease"
              }}
              onMouseEnter={(e) => e.target.style.borderColor = "#ff5555"}
              onMouseLeave={(e) => e.target.style.borderColor = "rgba(255, 255, 255, 0.2)"}
            >
              Decline & Exit
            </button>
            <button 
              type="button"
              onClick={handleAgree}
              className="btn-gold"
              style={{ padding: "11px 28px", cursor: "pointer" }}
            >
              <span>I Acknowledge & Enter</span>
              <ArrowRight size={17} />
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}
