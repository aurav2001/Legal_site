import React, { useState, useEffect } from "react";
import { Scale, PhoneCall, Search, Menu, X, ShieldAlert, ArrowUpRight, Sparkles, ChevronRight } from "lucide-react";
import { firmProfile } from "../data/legalData";

export default function Navbar({ onOpenConsultation, onOpenSearch, onOpenDisclaimer }) {
  const [isScrolled, setIsScrolled] = useState(false);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [activeHover, setActiveHover] = useState(null);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 25);
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const navLinks = [
    { label: "Practice Areas", href: "#practices" },
    { label: "Precedents", href: "#precedents" },
    { label: "Partners", href: "#partners" },
    { label: "Case Estimator", href: "#estimator" },
    { label: "Legal Insights", href: "#insights" },
    { label: "Chambers", href: "#chambers" },
  ];

  return (
    <header className="navbar-wrapper">
      {/* Top Utility & Regulatory Ribbon */}
      <div className="navbar-top-ribbon">
        <div className="navbar-ribbon-content">
          <div className="ribbon-left">
            <span className="live-pulse-dot"></span>
            <span className="ribbon-tag">Emergency Dispute & Injunction Desk:</span>
            <a href={`tel:${firmProfile.emergencyHotline}`} className="ribbon-hotline">
              <PhoneCall size={12} style={{ display: "inline", marginRight: "4px" }} />
              {firmProfile.emergencyHotline}
            </a>
            <span className="ribbon-divider">|</span>
            <span className="ribbon-jurisdiction">24/7 Supreme Court & NCLT Urgent Filings</span>
          </div>

          <div className="ribbon-right">
            <button 
              type="button" 
              onClick={onOpenDisclaimer}
              className="ribbon-disclaimer-btn"
            >
              <ShieldAlert size={13} />
              <span>BCI Regulatory Compliance</span>
            </button>
            <span className="ribbon-divider">|</span>
            <span className="ribbon-chambers-text">Delhi · Mumbai · Bengaluru · Singapore</span>
          </div>
        </div>
      </div>

      {/* Main Floating Glass Navbar */}
      <nav className={`navbar-main ${isScrolled ? "navbar-scrolled" : ""}`}>
        <div className="navbar-container">
          {/* Brand Seal & Monogram */}
          <a href="#" className="brand-lockup">
            <div className="brand-crest">
              <Scale size={22} className="brand-scale-icon" />
              <div className="crest-glow"></div>
            </div>
            <div className="brand-text-block">
              <div className="brand-name">
                VANGUARD <span className="brand-ampersand">&</span> SHROFF
              </div>
              <div className="brand-subtext">
                Advocates · Solicitors · Est. 1994
              </div>
            </div>
          </a>

          {/* Desktop Navigation Links */}
          <div className="nav-desktop-menu">
            {navLinks.map((item, index) => (
              <a
                key={item.label}
                href={item.href}
                className={`nav-link-item ${activeHover === index ? "active" : ""}`}
                onMouseEnter={() => setActiveHover(index)}
                onMouseLeave={() => setActiveHover(null)}
              >
                <span>{item.label}</span>
                <span className="nav-link-glow"></span>
              </a>
            ))}
          </div>

          {/* Right Action Hub: Search + Consultation CTA */}
          <div className="nav-desktop-actions">
            {/* Quick Search Pill */}
            <button
              type="button"
              onClick={onOpenSearch}
              className="nav-search-pill"
              title="Search matter, partner or law (Ctrl+K)"
            >
              <Search size={15} className="search-icon" />
              <span className="search-text">Search matter...</span>
              <kbd className="search-kbd">⌘K</kbd>
            </button>

            {/* Privileged Consultation CTA */}
            <button
              type="button"
              onClick={onOpenConsultation}
              className="nav-cta-gold"
            >
              <span className="cta-shine"></span>
              <span className="cta-text">Privileged Consultation</span>
              <ArrowUpRight size={15} className="cta-arrow" />
            </button>
          </div>

          {/* Mobile Menu Hamburger */}
          <button
            type="button"
            onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
            className="nav-mobile-toggle"
            aria-label="Toggle navigation menu"
          >
            {mobileMenuOpen ? <X size={22} /> : <Menu size={22} />}
          </button>
        </div>

        {/* Mobile Menu Drawer */}
        {mobileMenuOpen && (
          <div className="mobile-drawer">
            <div className="mobile-drawer-links">
              {navLinks.map((item) => (
                <a
                  key={item.label}
                  href={item.href}
                  onClick={() => setMobileMenuOpen(false)}
                  className="mobile-link"
                >
                  <span>{item.label}</span>
                  <ChevronRight size={16} color="var(--gold-400)" />
                </a>
              ))}
            </div>

            <div className="mobile-drawer-actions">
              <button
                type="button"
                onClick={() => {
                  setMobileMenuOpen(false);
                  onOpenSearch();
                }}
                className="btn-outline-gold mobile-btn"
              >
                <Search size={16} />
                <span>Quick Search (Matters / Advocates)</span>
              </button>

              <button
                type="button"
                onClick={() => {
                  setMobileMenuOpen(false);
                  onOpenConsultation();
                }}
                className="nav-cta-gold mobile-btn"
                style={{ justifyContent: "center" }}
              >
                <span>Privileged Consultation</span>
                <ArrowUpRight size={16} />
              </button>

              <div className="mobile-hotline-card">
                <div style={{ display: "flex", alignItems: "center", gap: "8px", color: "var(--gold-300)", fontSize: "0.82rem" }}>
                  <span className="live-pulse-dot"></span>
                  <span style={{ fontWeight: 600 }}>Emergency Injunction Helpline:</span>
                </div>
                <a href={`tel:${firmProfile.emergencyHotline}`} style={{ color: "#ffffff", fontWeight: 700, fontSize: "0.95rem", textDecoration: "none", marginTop: "4px", display: "block" }}>
                  {firmProfile.emergencyHotline}
                </a>
              </div>
            </div>
          </div>
        )}
      </nav>
    </header>
  );
}
