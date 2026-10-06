import React, { useState } from "react";
import { partnersDirectory } from "../data/legalData";
import { Award, GraduationCap, MapPin, Briefcase, Mail, ArrowRight, User } from "lucide-react";

export default function PartnersDirectory({ onBookWithPartner }) {
  const [activePartnerModal, setActivePartnerModal] = useState(null);

  return (
    <section id="partners" className="section-padding" style={{ background: "var(--navy-900)", position: "relative" }}>
      <div className="legal-container">

        {/* Section Header */}
        <div style={{ textAlign: "center", marginBottom: "50px" }}>
          <div className="section-tag">Partners & Senior Counsel</div>
          <h2 className="section-title">Distinguished Legal Minds</h2>
          <p className="section-desc" style={{ margin: "0 auto" }}>
            Led by seasoned Senior Advocates and internationally recognized solicitors with decades of landmark courtroom victories and corporate advisory pedigree.
          </p>
        </div>

        {/* Grid of Partners */}
        <div 
          style={{
            display: "grid",
            gridTemplateColumns: "repeat(auto-fit, minmax(360px, 1fr))",
            gap: "24px"
          }}
        >
          {partnersDirectory.map((partner) => (
            <div 
              key={partner.id}
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
                {/* Header card with name and role */}
                <div style={{ display: "flex", alignItems: "flex-start", gap: "16px", marginBottom: "18px" }}>
                  <div 
                    style={{
                      width: "60px",
                      height: "60px",
                      borderRadius: "50%",
                      background: "linear-gradient(135deg, rgba(197, 160, 89, 0.3) 0%, #0d1e38 100%)",
                      border: "2px solid var(--gold-400)",
                      display: "flex",
                      alignItems: "center",
                      justifyContent: "center",
                      color: "var(--gold-300)",
                      flexShrink: 0
                    }}
                  >
                    <User size={30} />
                  </div>

                  <div>
                    <h3 style={{ fontSize: "1.3rem", fontWeight: 700, color: "#ffffff", margin: 0, fontFamily: "var(--font-serif)" }}>
                      {partner.name}
                    </h3>
                    <div style={{ fontSize: "0.85rem", color: "var(--gold-400)", fontWeight: 600, marginTop: "2px" }}>
                      {partner.role}
                    </div>
                    <div style={{ fontSize: "0.78rem", color: "var(--slate-400)", marginTop: "4px", display: "flex", alignItems: "center", gap: "5px" }}>
                      <MapPin size={13} />
                      <span>{partner.chambers}</span>
                    </div>
                  </div>
                </div>

                <div 
                  style={{
                    display: "inline-block",
                    fontSize: "0.74rem",
                    fontWeight: 700,
                    textTransform: "uppercase",
                    letterSpacing: "0.08em",
                    color: "var(--gold-300)",
                    background: "rgba(197, 160, 89, 0.1)",
                    border: "1px solid rgba(197, 160, 89, 0.25)",
                    padding: "3px 10px",
                    borderRadius: "4px",
                    marginBottom: "14px"
                  }}
                >
                  {partner.experience}
                </div>

                <p style={{ fontSize: "0.9rem", color: "var(--slate-300)", lineHeight: "1.65", marginBottom: "18px" }}>
                  {partner.bio}
                </p>

                {/* Specialties tags */}
                <div style={{ display: "flex", flexWrap: "wrap", gap: "6px", marginBottom: "20px" }}>
                  {partner.specialties.map((spec, sIdx) => (
                    <span 
                      key={sIdx}
                      style={{
                        fontSize: "0.75rem",
                        background: "rgba(255, 255, 255, 0.05)",
                        border: "1px solid rgba(255, 255, 255, 0.1)",
                        color: "var(--slate-300)",
                        padding: "3px 9px",
                        borderRadius: "3px"
                      }}
                    >
                      {spec}
                    </span>
                  ))}
                </div>
              </div>

              <div>
                <div 
                  style={{
                    background: "rgba(4, 11, 22, 0.5)",
                    border: "1px solid rgba(197, 160, 89, 0.15)",
                    borderRadius: "6px",
                    padding: "10px 14px",
                    marginBottom: "16px",
                    display: "flex",
                    alignItems: "center",
                    gap: "8px",
                    fontSize: "0.8rem",
                    color: "var(--gold-300)"
                  }}
                >
                  <Award size={15} style={{ flexShrink: 0 }} />
                  <span>{partner.awards}</span>
                </div>

                <div style={{ display: "flex", gap: "10px" }}>
                  <button
                    type="button"
                    onClick={() => setActivePartnerModal(partner)}
                    style={{
                      flex: 1,
                      background: "rgba(255, 255, 255, 0.05)",
                      border: "1px solid rgba(255, 255, 255, 0.15)",
                      color: "var(--slate-200)",
                      padding: "10px",
                      borderRadius: "4px",
                      fontSize: "0.84rem",
                      fontWeight: 600,
                      cursor: "pointer",
                      transition: "all 0.2s ease"
                    }}
                    onMouseEnter={(e) => (e.currentTarget.style.borderColor = "var(--gold-400)")}
                    onMouseLeave={(e) => (e.currentTarget.style.borderColor = "rgba(255, 255, 255, 0.15)")}
                  >
                    Curriculum Vitae
                  </button>

                  <button
                    type="button"
                    onClick={() => onBookWithPartner(partner.name)}
                    className="btn-gold"
                    style={{ padding: "10px 16px", fontSize: "0.82rem" }}
                  >
                    <span>Retain Counsel</span>
                  </button>
                </div>
              </div>

            </div>
          ))}
        </div>

      </div>

      {/* Partner Detailed Modal */}
      {activePartnerModal && (
        <div className="modal-overlay" onClick={() => setActivePartnerModal(null)}>
          <div 
            className="modal-content-box bg-glass"
            onClick={(e) => e.stopPropagation()}
            style={{
              maxWidth: "700px",
              width: "100%",
              borderRadius: "12px",
              padding: "36px",
              maxHeight: "85vh",
              overflowY: "auto",
              boxShadow: "0 25px 60px rgba(0, 0, 0, 0.8)",
              border: "1px solid rgba(197, 160, 89, 0.4)"
            }}
          >
            <div style={{ display: "flex", justifyContent: "space-between", alignItems: "flex-start", marginBottom: "20px" }}>
              <div>
                <div className="section-tag" style={{ margin: 0, marginBottom: "8px" }}>Advocate Profile</div>
                <h2 style={{ fontFamily: "var(--font-serif)", fontSize: "1.75rem", color: "#ffffff", margin: 0 }}>
                  {activePartnerModal.name}
                </h2>
                <div style={{ color: "var(--gold-400)", fontWeight: 600, fontSize: "0.95rem", marginTop: "4px" }}>
                  {activePartnerModal.role}
                </div>
              </div>

              <button 
                type="button"
                onClick={() => setActivePartnerModal(null)}
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

            <p style={{ color: "var(--slate-200)", fontSize: "1rem", lineHeight: "1.75", marginBottom: "24px" }}>
              {activePartnerModal.bio}
            </p>

            <div style={{ display: "grid", gridTemplateColumns: "1fr 1fr", gap: "16px", marginBottom: "24px" }}>
              <div style={{ background: "rgba(4, 11, 22, 0.6)", padding: "16px", borderRadius: "8px", border: "1px solid rgba(255, 255, 255, 0.08)" }}>
                <div style={{ display: "flex", alignItems: "center", gap: "6px", color: "var(--gold-400)", fontSize: "0.78rem", textTransform: "uppercase", fontWeight: 700, marginBottom: "6px" }}>
                  <GraduationCap size={15} />
                  <span>Academic Pedigree</span>
                </div>
                <div style={{ fontSize: "0.88rem", color: "var(--slate-200)" }}>{activePartnerModal.education}</div>
              </div>

              <div style={{ background: "rgba(4, 11, 22, 0.6)", padding: "16px", borderRadius: "8px", border: "1px solid rgba(255, 255, 255, 0.08)" }}>
                <div style={{ display: "flex", alignItems: "center", gap: "6px", color: "var(--gold-400)", fontSize: "0.78rem", textTransform: "uppercase", fontWeight: 700, marginBottom: "6px" }}>
                  <Briefcase size={15} />
                  <span>Bar Admissions</span>
                </div>
                <div style={{ fontSize: "0.88rem", color: "var(--slate-200)" }}>{activePartnerModal.barAdmissions}</div>
              </div>
            </div>

            <div style={{ background: "rgba(197, 160, 89, 0.08)", border: "1px solid rgba(197, 160, 89, 0.25)", padding: "16px 20px", borderRadius: "8px", marginBottom: "28px" }}>
              <div style={{ fontSize: "0.78rem", textTransform: "uppercase", color: "var(--gold-400)", fontWeight: 700, marginBottom: "4px" }}>
                Judicial Standing & Distinctions
              </div>
              <div style={{ color: "#ffffff", fontSize: "0.95rem", fontWeight: 600 }}>
                {activePartnerModal.awards}
              </div>
            </div>

            <div style={{ display: "flex", justifyContent: "flex-end", gap: "12px" }}>
              <button
                type="button"
                onClick={() => setActivePartnerModal(null)}
                style={{
                  background: "transparent",
                  border: "1px solid rgba(255, 255, 255, 0.2)",
                  color: "var(--slate-300)",
                  padding: "10px 20px",
                  borderRadius: "4px",
                  cursor: "pointer"
                }}
              >
                Close
              </button>
              <button
                type="button"
                onClick={() => {
                  const name = activePartnerModal.name;
                  setActivePartnerModal(null);
                  onBookWithPartner(name);
                }}
                className="btn-gold"
              >
                <span>Request Chambers Appointment</span>
                <ArrowRight size={16} />
              </button>
            </div>

          </div>
        </div>
      )}
    </section>
  );
}
