import React, { useState } from "react";
import { practiceAreas, firmProfile } from "../data/legalData";
import { Lock, ShieldCheck, CheckCircle2, ArrowRight, X, PhoneCall } from "lucide-react";

export default function ConsultationModal({ isOpen, onClose, defaultPractice, defaultPartner }) {
  const [formData, setFormData] = useState({
    name: "",
    entity: "",
    email: "",
    phone: "",
    practiceArea: defaultPractice || practiceAreas[0].title,
    forum: "Supreme Court of India",
    urgency: "Standard Strategic Consultation",
    brief: "",
    ndaRequested: true
  });

  const [isSubmitted, setIsSubmitted] = useState(false);
  const [refId, setRefId] = useState("");

  if (!isOpen) return null;

  const handleSubmit = (e) => {
    e.preventDefault();
    const generatedRef = "VP-" + Math.floor(100000 + Math.random() * 900000);
    setRefId(generatedRef);
    setIsSubmitted(true);
  };

  const handleReset = () => {
    setIsSubmitted(false);
    onClose();
  };

  return (
    <div className="modal-overlay" onClick={onClose}>
      <div 
        className="modal-content-box bg-glass"
        onClick={(e) => e.stopPropagation()}
        style={{
          maxWidth: "720px",
          width: "100%",
          borderRadius: "12px",
          padding: "36px",
          maxHeight: "90vh",
          overflowY: "auto",
          boxShadow: "0 25px 60px rgba(0, 0, 0, 0.8), 0 0 35px rgba(197, 160, 89, 0.2)",
          border: "1px solid rgba(197, 160, 89, 0.4)"
        }}
      >
        <div style={{ display: "flex", justifyContent: "space-between", alignItems: "flex-start", marginBottom: "18px" }}>
          <div>
            <div style={{ display: "inline-flex", alignItems: "center", gap: "6px", color: "var(--gold-400)", fontSize: "0.75rem", textTransform: "uppercase", letterSpacing: "0.1em", fontWeight: 700 }}>
              <Lock size={12} />
              <span>Privileged & Strictly Confidential</span>
            </div>
            <h2 style={{ fontFamily: "var(--font-serif)", fontSize: "1.65rem", color: "#ffffff", margin: "4px 0 0 0" }}>
              Retain Chambers & Request Case Evaluation
            </h2>
          </div>

          <button 
            type="button" 
            onClick={onClose}
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

        {isSubmitted ? (
          <div style={{ textAlign: "center", padding: "30px 20px" }}>
            <div 
              style={{
                width: "68px",
                height: "68px",
                borderRadius: "50%",
                background: "rgba(16, 185, 129, 0.15)",
                border: "2px solid #10b981",
                display: "flex",
                alignItems: "center",
                justifyContent: "center",
                margin: "0 auto 20px auto",
                color: "#10b981"
              }}
            >
              <CheckCircle2 size={36} />
            </div>

            <h3 style={{ fontSize: "1.45rem", color: "#ffffff", marginBottom: "8px", fontFamily: "var(--font-serif)" }}>
              Case Briefing Dossier Initiated
            </h3>

            <div style={{ fontSize: "1.1rem", color: "var(--gold-300)", fontWeight: 700, marginBottom: "16px" }}>
              Chambers Matter File Ref: {refId}
            </div>

            <p style={{ color: "var(--slate-300)", fontSize: "0.95rem", lineHeight: "1.65", maxWidth: "520px", margin: "0 auto 24px auto" }}>
              Your confidential inquiry has been routed to our Senior Partners and Court Registry team. An Associate Counsel will contact you within the specified urgency window under full attorney-client privilege.
            </p>

            <div 
              style={{
                background: "rgba(197, 160, 89, 0.1)",
                border: "1px solid rgba(197, 160, 89, 0.25)",
                borderRadius: "8px",
                padding: "16px",
                marginBottom: "28px",
                fontSize: "0.85rem",
                color: "var(--slate-300)"
              }}
            >
              For immediate ex-parte injunctions or arrest protection within 24 hours, call our Chambers Emergency Hotline:{" "}
              <strong style={{ color: "var(--gold-400)" }}>{firmProfile.emergencyHotline}</strong>
            </div>

            <button
              type="button"
              onClick={handleReset}
              className="btn-gold"
              style={{ padding: "12px 30px" }}
            >
              Close Confirmation
            </button>
          </div>
        ) : (
          <form onSubmit={handleSubmit}>
            <div style={{ display: "grid", gridTemplateColumns: "1fr 1fr", gap: "16px", marginBottom: "16px" }}>
              <div>
                <label style={{ display: "block", fontSize: "0.8rem", color: "var(--slate-300)", marginBottom: "6px", fontWeight: 600 }}>
                  Client / General Counsel Name *
                </label>
                <input
                  type="text"
                  required
                  placeholder="e.g. Adv. Amit Singhal / Rajesh Mehta"
                  value={formData.name}
                  onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                  style={{
                    width: "100%",
                    background: "rgba(4, 11, 22, 0.7)",
                    border: "1px solid rgba(197, 160, 89, 0.25)",
                    borderRadius: "6px",
                    padding: "11px 14px",
                    color: "#ffffff",
                    fontSize: "0.9rem"
                  }}
                />
              </div>

              <div>
                <label style={{ display: "block", fontSize: "0.8rem", color: "var(--slate-300)", marginBottom: "6px", fontWeight: 600 }}>
                  Corporate Entity / Litigant Capacity
                </label>
                <input
                  type="text"
                  placeholder="e.g. Acme Tech Global Pte Ltd / Promoter"
                  value={formData.entity}
                  onChange={(e) => setFormData({ ...formData, entity: e.target.value })}
                  style={{
                    width: "100%",
                    background: "rgba(4, 11, 22, 0.7)",
                    border: "1px solid rgba(197, 160, 89, 0.25)",
                    borderRadius: "6px",
                    padding: "11px 14px",
                    color: "#ffffff",
                    fontSize: "0.9rem"
                  }}
                />
              </div>
            </div>

            <div style={{ display: "grid", gridTemplateColumns: "1fr 1fr", gap: "16px", marginBottom: "16px" }}>
              <div>
                <label style={{ display: "block", fontSize: "0.8rem", color: "var(--slate-300)", marginBottom: "6px", fontWeight: 600 }}>
                  Official Email Address *
                </label>
                <input
                  type="email"
                  required
                  placeholder="gc@enterprise.com"
                  value={formData.email}
                  onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                  style={{
                    width: "100%",
                    background: "rgba(4, 11, 22, 0.7)",
                    border: "1px solid rgba(197, 160, 89, 0.25)",
                    borderRadius: "6px",
                    padding: "11px 14px",
                    color: "#ffffff",
                    fontSize: "0.9rem"
                  }}
                />
              </div>

              <div>
                <label style={{ display: "block", fontSize: "0.8rem", color: "var(--slate-300)", marginBottom: "6px", fontWeight: 600 }}>
                  Direct Chambers Telephone *
                </label>
                <input
                  type="tel"
                  required
                  placeholder="+91 98100 XXXXX"
                  value={formData.phone}
                  onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                  style={{
                    width: "100%",
                    background: "rgba(4, 11, 22, 0.7)",
                    border: "1px solid rgba(197, 160, 89, 0.25)",
                    borderRadius: "6px",
                    padding: "11px 14px",
                    color: "#ffffff",
                    fontSize: "0.9rem"
                  }}
                />
              </div>
            </div>

            <div style={{ display: "grid", gridTemplateColumns: "1fr 1fr", gap: "16px", marginBottom: "16px" }}>
              <div>
                <label style={{ display: "block", fontSize: "0.8rem", color: "var(--slate-300)", marginBottom: "6px", fontWeight: 600 }}>
                  Practice Area Classification
                </label>
                <select
                  value={formData.practiceArea}
                  onChange={(e) => setFormData({ ...formData, practiceArea: e.target.value })}
                  style={{
                    width: "100%",
                    background: "#081325",
                    border: "1px solid rgba(197, 160, 89, 0.25)",
                    borderRadius: "6px",
                    padding: "11px 14px",
                    color: "#ffffff",
                    fontSize: "0.88rem"
                  }}
                >
                  {practiceAreas.map((p) => (
                    <option key={p.id} value={p.title}>{p.title}</option>
                  ))}
                </select>
              </div>

              <div>
                <label style={{ display: "block", fontSize: "0.8rem", color: "var(--slate-300)", marginBottom: "6px", fontWeight: 600 }}>
                  Urgency & Procedural Window
                </label>
                <select
                  value={formData.urgency}
                  onChange={(e) => setFormData({ ...formData, urgency: e.target.value })}
                  style={{
                    width: "100%",
                    background: "#081325",
                    border: "1px solid rgba(197, 160, 89, 0.25)",
                    borderRadius: "6px",
                    padding: "11px 14px",
                    color: "#ffffff",
                    fontSize: "0.88rem"
                  }}
                >
                  <option value="Emergency (Within 24-48 Hours Injunction/Arrest)">🔴 Emergency Injunction / Stay (24-48 Hours)</option>
                  <option value="Expedited (Within 3-5 Days)">🟡 Expedited Hearing (3-5 Days)</option>
                  <option value="Standard Strategic Consultation">Standard Strategic Consultation</option>
                  <option value="Transaction Advisory">Corporate / Transactional Advisory</option>
                </select>
              </div>
            </div>

            <div style={{ marginBottom: "18px" }}>
              <label style={{ display: "block", fontSize: "0.8rem", color: "var(--slate-300)", marginBottom: "6px", fontWeight: 600 }}>
                Matter Summary & Target Relief Sought *
              </label>
              <textarea
                required
                rows={4}
                placeholder="Please outline the nature of the dispute or transaction, opposing parties, current judicial forum (if already filed), and relief sought..."
                value={formData.brief}
                onChange={(e) => setFormData({ ...formData, brief: e.target.value })}
                style={{
                  width: "100%",
                  background: "rgba(4, 11, 22, 0.7)",
                  border: "1px solid rgba(197, 160, 89, 0.25)",
                  borderRadius: "6px",
                  padding: "12px 14px",
                  color: "#ffffff",
                  fontSize: "0.9rem",
                  lineHeight: "1.5"
                }}
              />
            </div>

            <div style={{ display: "flex", alignItems: "center", gap: "10px", marginBottom: "24px" }}>
              <input
                type="checkbox"
                id="ndaCheck"
                checked={formData.ndaRequested}
                onChange={(e) => setFormData({ ...formData, ndaRequested: e.target.checked })}
                style={{ width: "16px", height: "16px", accentColor: "var(--gold-500)" }}
              />
              <label htmlFor="ndaCheck" style={{ fontSize: "0.82rem", color: "var(--slate-300)", cursor: "pointer" }}>
                Execute formal Non-Disclosure Agreement (NDA) prior to disclosing proprietary evidentiary documents.
              </label>
            </div>

            <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
              <div style={{ display: "flex", alignItems: "center", gap: "6px", color: "var(--slate-400)", fontSize: "0.8rem" }}>
                <ShieldCheck size={16} color="var(--gold-400)" />
                <span>Encrypted & Protected by Legal Privilege</span>
              </div>

              <button
                type="submit"
                className="btn-gold"
                style={{ padding: "12px 28px" }}
              >
                <span>Submit to Chambers Registry</span>
                <ArrowRight size={16} />
              </button>
            </div>
          </form>
        )}
      </div>
    </div>
  );
}
