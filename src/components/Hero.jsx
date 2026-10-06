import React from "react";
import { ArrowRight, ShieldCheck, Scale, Briefcase, Award, Globe, PhoneCall, ChevronDown } from "lucide-react";
import { firmProfile } from "../data/legalData";

export default function Hero({ onOpenConsultation, onOpenEstimator }) {
  return (
    <section 
      style={{
        position: "relative",
        minHeight: "100vh",
        display: "flex",
        alignItems: "center",
        paddingTop: "155px",
        paddingBottom: "85px",
        overflow: "hidden",
        background: "radial-gradient(ellipse at 50% 15%, rgba(197, 160, 89, 0.08) 0%, transparent 60%), linear-gradient(180deg, #020611 0%, #071328 50%, #020611 100%)"
      }}
    >
      {/* Ambient Gold Radial Flare */}
      <div 
        style={{
          position: "absolute",
          top: "12%",
          left: "50%",
          transform: "translateX(-50%)",
          width: "600px",
          height: "260px",
          background: "radial-gradient(circle, rgba(212, 175, 55, 0.15) 0%, transparent 70%)",
          filter: "blur(60px)",
          zIndex: 1,
          pointerEvents: "none"
        }}
      />
      {/* Background Hero Image with Deep Contrast Overlay */}
      <div 
        style={{
          position: "absolute",
          inset: 0,
          backgroundImage: `url('/chambers-hero.jpg')`,
          backgroundPosition: "center 30%",
          backgroundSize: "cover",
          backgroundRepeat: "no-repeat",
          opacity: 0.22,
          filter: "saturate(0.9) brightness(0.85)",
          zIndex: 1
        }}
      />

      {/* Atmospheric Radial Gradient Mesh */}
      <div 
        style={{
          position: "absolute",
          inset: 0,
          background: "radial-gradient(circle at 50% 30%, rgba(197, 160, 89, 0.08) 0%, transparent 65%), radial-gradient(circle at 10% 80%, rgba(17, 37, 68, 0.7) 0%, transparent 50%)",
          zIndex: 2,
          pointerEvents: "none"
        }}
      />

      {/* Subtle Grid overlay */}
      <div 
        style={{
          position: "absolute",
          inset: 0,
          backgroundImage: "linear-gradient(to right, rgba(197, 160, 89, 0.03) 1px, transparent 1px), linear-gradient(to bottom, rgba(197, 160, 89, 0.03) 1px, transparent 1px)",
          backgroundSize: "48px 48px",
          zIndex: 2,
          pointerEvents: "none"
        }}
      />

      <div className="legal-container" style={{ position: "relative", zIndex: 10, width: "100%" }}>
        <div style={{ maxWidth: "860px", margin: "0 auto", textAlign: "center" }}>
          
          {/* Prestige Pill */}
          <div 
            style={{
              display: "inline-flex",
              alignItems: "center",
              gap: "8px",
              padding: "7px 16px",
              borderRadius: "9999px",
              background: "rgba(197, 160, 89, 0.12)",
              border: "1px solid rgba(197, 160, 89, 0.35)",
              color: "var(--gold-300)",
              fontSize: "0.82rem",
              letterSpacing: "0.08em",
              textTransform: "uppercase",
              fontWeight: 600,
              marginBottom: "24px",
              boxShadow: "0 0 20px rgba(197, 160, 89, 0.15)"
            }}
          >
            <Award size={15} color="var(--gold-400)" />
            <span>Tier-1 Firm · Supreme Court Litigation & International Arbitration</span>
          </div>

          {/* Majestic Headline */}
          <h1 
            style={{
              fontFamily: "var(--font-serif)",
              fontSize: "clamp(2.3rem, 5.2vw, 3.85rem)",
              fontWeight: 700,
              lineHeight: 1.16,
              color: "#ffffff",
              marginBottom: "24px",
              letterSpacing: "0.01em"
            }}
          >
            Strategic Counsel for <span className="shimmer-text">Complex Disputes</span> & Transformative Deals
          </h1>

          {/* Subtext */}
          <p 
            style={{
              fontSize: "clamp(1.02rem, 1.8vw, 1.22rem)",
              color: "var(--slate-300)",
              lineHeight: "1.75",
              maxWidth: "760px",
              margin: "0 auto 36px auto",
              fontFamily: "var(--font-sans)",
              fontWeight: 400
            }}
          >
            Operating across New Delhi, Mumbai, Bengaluru, and Singapore. We blend forensic courtroom advocacy with deep boardroom acumen to defend corporate enterprise value.
          </p>

          {/* Action CTAs */}
          <div 
            style={{
              display: "flex",
              flexWrap: "wrap",
              gap: "16px",
              justifyContent: "center",
              alignItems: "center",
              marginBottom: "54px"
            }}
          >
            <button
              type="button"
              onClick={onOpenConsultation}
              className="btn-gold"
              style={{ padding: "14px 32px", fontSize: "0.96rem" }}
            >
              <span>Schedule Privileged Consultation</span>
              <ArrowRight size={18} />
            </button>

            <a
              href="#practices"
              className="btn-outline-gold"
              style={{ padding: "13px 28px", fontSize: "0.96rem" }}
            >
              <span>Explore Practice Domains</span>
            </a>

            <button
              type="button"
              onClick={onOpenEstimator}
              style={{
                background: "rgba(255, 255, 255, 0.04)",
                border: "1px solid rgba(255, 255, 255, 0.16)",
                color: "var(--slate-200)",
                padding: "13px 22px",
                borderRadius: "4px",
                fontSize: "0.9rem",
                fontWeight: 500,
                cursor: "pointer",
                display: "inline-flex",
                alignItems: "center",
                gap: "8px",
                transition: "all 0.2s ease"
              }}
              onMouseEnter={(e) => (e.currentTarget.style.borderColor = "var(--gold-400)")}
              onMouseLeave={(e) => (e.currentTarget.style.borderColor = "rgba(255, 255, 255, 0.16)")}
            >
              <Scale size={16} color="var(--gold-400)" />
              <span>Procedural Timeline Estimator</span>
            </button>
          </div>

          {/* Credential Cards Grid */}
          <div 
            style={{
              display: "grid",
              gridTemplateColumns: "repeat(auto-fit, minmax(180px, 1fr))",
              gap: "16px",
              textAlign: "left"
            }}
          >
            {firmProfile.keyStats.map((stat, idx) => (
              <div 
                key={idx}
                className="bg-glass"
                style={{
                  padding: "20px 22px",
                  borderRadius: "8px",
                  border: "1px solid rgba(197, 160, 89, 0.22)",
                  background: "rgba(7, 18, 36, 0.72)",
                  boxShadow: "0 8px 24px rgba(0, 0, 0, 0.35)"
                }}
              >
                <div style={{ fontSize: "1.75rem", fontWeight: 700, fontFamily: "var(--font-serif)", color: "var(--gold-300)", marginBottom: "4px" }}>
                  {stat.value}
                </div>
                <div style={{ fontSize: "0.82rem", color: "var(--slate-400)", fontWeight: 500, lineHeight: "1.4" }}>
                  {stat.label}
                </div>
              </div>
            ))}
          </div>

        </div>
      </div>

      {/* Down Scroll Indicator */}
      <div 
        style={{
          position: "absolute",
          bottom: "16px",
          left: "50%",
          transform: "translateX(-50%)",
          zIndex: 10,
          color: "var(--gold-400)",
          opacity: 0.6,
          display: "flex",
          flexDirection: "column",
          alignItems: "center",
          gap: "4px",
          fontSize: "0.72rem",
          letterSpacing: "0.1em",
          textTransform: "uppercase"
        }}
      >
        <span>Scroll to Explore</span>
        <ChevronDown size={16} />
      </div>
    </section>
  );
}
