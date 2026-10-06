import React, { useState } from "react";
import { chamberLocations } from "../data/legalData";
import { MapPin, Phone, Mail, Building, Scale, ArrowUpRight } from "lucide-react";

export default function ChambersLocations() {
  const [activeCity, setActiveCity] = useState("New Delhi");

  const currentChamber = chamberLocations.find(c => c.city === activeCity) || chamberLocations[0];

  return (
    <section id="chambers" className="section-padding" style={{ background: "var(--navy-900)", position: "relative" }}>
      <div className="legal-container">

        {/* Section Header */}
        <div style={{ textAlign: "center", marginBottom: "48px" }}>
          <div className="section-tag">Offices & Court Desks</div>
          <h2 className="section-title">Chambers Across Financial & Judicial Capitals</h2>
          <p className="section-desc" style={{ margin: "0 auto" }}>
            Strategically situated within minutes of the Supreme Court of India, key High Courts, commercial tribunals, and international arbitral institutions.
          </p>
        </div>

        {/* City Tab Switcher */}
        <div 
          style={{
            display: "flex",
            justifyContent: "center",
            gap: "12px",
            marginBottom: "36px",
            flexWrap: "wrap"
          }}
        >
          {chamberLocations.map((chamber) => (
            <button
              key={chamber.city}
              type="button"
              onClick={() => setActiveCity(chamber.city)}
              style={{
                background: activeCity === chamber.city ? "var(--gold-gradient)" : "rgba(17, 37, 68, 0.4)",
                color: activeCity === chamber.city ? "#040a14" : "var(--slate-200)",
                border: activeCity === chamber.city ? "1px solid var(--gold-400)" : "1px solid rgba(197, 160, 89, 0.2)",
                padding: "12px 28px",
                borderRadius: "6px",
                fontSize: "0.92rem",
                fontWeight: 700,
                cursor: "pointer",
                transition: "all 0.2s ease"
              }}
            >
              {chamber.city}
            </button>
          ))}
        </div>

        {/* Active Chamber Card */}
        <div 
          className="bg-glass"
          style={{
            borderRadius: "12px",
            padding: "40px",
            border: "1px solid rgba(197, 160, 89, 0.3)",
            boxShadow: "0 20px 50px rgba(0, 0, 0, 0.6)"
          }}
        >
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(320px, 1fr))", gap: "36px" }}>
            
            {/* Left Col: Contact info & Address */}
            <div>
              <div style={{ fontSize: "0.78rem", textTransform: "uppercase", letterSpacing: "0.1em", color: "var(--gold-400)", fontWeight: 700, marginBottom: "6px" }}>
                Primary Judicial Station
              </div>
              <h3 style={{ fontSize: "1.7rem", fontWeight: 700, color: "#ffffff", fontFamily: "var(--font-serif)", marginBottom: "8px" }}>
                {currentChamber.city} Chambers
              </h3>
              <div style={{ color: "var(--slate-300)", fontSize: "0.95rem", fontWeight: 500, marginBottom: "24px" }}>
                {currentChamber.title}
              </div>

              <div style={{ display: "flex", flexDirection: "column", gap: "16px", marginBottom: "28px" }}>
                <div style={{ display: "flex", alignItems: "flex-start", gap: "12px" }}>
                  <MapPin size={20} color="var(--gold-400)" style={{ flexShrink: 0, marginTop: "3px" }} />
                  <div>
                    <div style={{ color: "#ffffff", fontWeight: 600, fontSize: "0.92rem" }}>Main Chambers:</div>
                    <div style={{ color: "var(--slate-300)", fontSize: "0.88rem", lineHeight: "1.5" }}>{currentChamber.address}</div>
                    <div style={{ color: "var(--gold-300)", fontSize: "0.82rem", marginTop: "4px" }}>{currentChamber.subAddress}</div>
                  </div>
                </div>

                <div style={{ display: "flex", alignItems: "center", gap: "12px" }}>
                  <Phone size={18} color="var(--gold-400)" style={{ flexShrink: 0 }} />
                  <div>
                    <span style={{ color: "var(--slate-400)", fontSize: "0.82rem" }}>Chambers Registrar Line: </span>
                    <a href={`tel:${currentChamber.phone}`} style={{ color: "#ffffff", textDecoration: "none", fontWeight: 700 }}>
                      {currentChamber.phone}
                    </a>
                  </div>
                </div>

                <div style={{ display: "flex", alignItems: "center", gap: "12px" }}>
                  <Mail size={18} color="var(--gold-400)" style={{ flexShrink: 0 }} />
                  <div>
                    <span style={{ color: "var(--slate-400)", fontSize: "0.82rem" }}>Filing & Inquiries Desk: </span>
                    <a href={`mailto:${currentChamber.email}`} style={{ color: "var(--gold-300)", textDecoration: "none", fontWeight: 600 }}>
                      {currentChamber.email}
                    </a>
                  </div>
                </div>
              </div>
            </div>

            {/* Right Col: Courts Covered & Jurisdiction badge */}
            <div 
              style={{
                background: "rgba(4, 11, 22, 0.6)",
                border: "1px solid rgba(255, 255, 255, 0.08)",
                borderRadius: "8px",
                padding: "28px",
                display: "flex",
                flexDirection: "column",
                justifyContent: "space-between"
              }}
            >
              <div>
                <div style={{ display: "flex", alignItems: "center", gap: "8px", color: "var(--gold-400)", fontWeight: 700, fontSize: "0.88rem", textTransform: "uppercase", marginBottom: "16px" }}>
                  <Scale size={18} />
                  <span>Standing Benches & Tribunals Covered Daily</span>
                </div>

                <ul style={{ listStyle: "none", padding: 0, margin: 0, display: "flex", flexDirection: "column", gap: "12px" }}>
                  {currentChamber.courtsCovered.map((court, idx) => (
                    <li key={idx} style={{ display: "flex", alignItems: "center", gap: "10px", fontSize: "0.92rem", color: "var(--slate-200)" }}>
                      <span style={{ width: "6px", height: "6px", borderRadius: "50%", background: "var(--gold-400)" }}></span>
                      <span>{court}</span>
                    </li>
                  ))}
                </ul>
              </div>

              <div style={{ marginTop: "24px", paddingTop: "20px", borderTop: "1px solid rgba(255, 255, 255, 0.08)" }}>
                <a
                  href={`tel:${currentChamber.phone}`}
                  className="btn-outline-gold"
                  style={{ width: "100%", textAlign: "center", padding: "12px" }}
                >
                  <Phone size={15} />
                  <span>Connect with {currentChamber.city} Chambers Clerk</span>
                </a>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section>
  );
}
