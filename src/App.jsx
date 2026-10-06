import React, { useState, useEffect } from "react";
import Navbar from "./components/Navbar";
import Hero from "./components/Hero";
import PracticeAreas from "./components/PracticeAreas";
import CaseEstimator from "./components/CaseEstimator";
import LandmarkMatters from "./components/LandmarkMatters";
import PartnersDirectory from "./components/PartnersDirectory";
import KnowledgeHub from "./components/KnowledgeHub";
import ChambersLocations from "./components/ChambersLocations";
import Footer from "./components/Footer";
import BciDisclaimerModal from "./components/BciDisclaimerModal";
import ConsultationModal from "./components/ConsultationModal";
import GlobalSearchModal from "./components/GlobalSearchModal";

export default function App() {
  const [bciOpen, setBciOpen] = useState(false);
  const [consultationOpen, setConsultationOpen] = useState(false);
  const [searchOpen, setSearchOpen] = useState(false);
  const [defaultPractice, setDefaultPractice] = useState("");
  const [defaultPartner, setDefaultPartner] = useState("");

  // Keyboard shortcut Ctrl+K to open search
  useEffect(() => {
    const handleKeyDown = (e) => {
      if ((e.metaKey || e.ctrlKey) && e.key === "k") {
        e.preventDefault();
        setSearchOpen((prev) => !prev);
      }
    };
    window.addEventListener("keydown", handleKeyDown);
    return () => window.removeEventListener("keydown", handleKeyDown);
  }, []);

  const handleOpenConsultation = (practice = "", partner = "") => {
    setDefaultPractice(practice);
    setDefaultPartner(partner);
    setConsultationOpen(true);
  };

  const handleScrollToEstimator = () => {
    const el = document.getElementById("estimator");
    if (el) {
      el.scrollIntoView({ behavior: "smooth" });
    }
  };

  return (
    <div style={{ minHeight: "100vh", display: "flex", flexDirection: "column", background: "var(--navy-950)" }}>
      {/* Bar Council of India Mandatory Disclaimer Modal */}
      <BciDisclaimerModal forceOpen={bciOpen} onClose={() => setBciOpen(false)} />

      {/* Privileged Consultation Modal */}
      <ConsultationModal
        isOpen={consultationOpen}
        onClose={() => setConsultationOpen(false)}
        defaultPractice={defaultPractice}
        defaultPartner={defaultPartner}
      />

      {/* Global Instant Search Modal */}
      <GlobalSearchModal
        isOpen={searchOpen}
        onClose={() => setSearchOpen(false)}
        onSelectPractice={(practiceTitle) => handleOpenConsultation(practiceTitle)}
        onSelectPartner={(partnerName) => handleOpenConsultation("", partnerName)}
      />

      {/* Navigation Header */}
      <Navbar
        onOpenConsultation={() => handleOpenConsultation()}
        onOpenSearch={() => setSearchOpen(true)}
        onOpenDisclaimer={() => setBciOpen(true)}
      />

      {/* Hero Section */}
      <main style={{ flex: 1 }}>
        <Hero
          onOpenConsultation={() => handleOpenConsultation()}
          onOpenEstimator={handleScrollToEstimator}
        />

        {/* Practice Areas */}
        <PracticeAreas
          onSelectPracticeForConsultation={(title) => handleOpenConsultation(title)}
        />

        {/* Procedural Strategy & Timeline Estimator */}
        <CaseEstimator
          onBookForMatter={(matterName) => handleOpenConsultation(matterName)}
        />

        {/* Landmark Matters & Judicial Precedents */}
        <LandmarkMatters
          onOpenConsultation={() => handleOpenConsultation()}
        />

        {/* Partners & Advocates Directory */}
        <PartnersDirectory
          onBookWithPartner={(partnerName) => handleOpenConsultation("", partnerName)}
        />

        {/* Thought Leadership & Knowledge Bulletins */}
        <KnowledgeHub
          onConsultationFromInsight={(topic) => handleOpenConsultation(topic)}
        />

        {/* Multi-City Chambers & Court Benches */}
        <ChambersLocations />
      </main>

      {/* Footer */}
      <Footer
        onOpenDisclaimer={() => setBciOpen(true)}
        onOpenConsultation={() => handleOpenConsultation()}
      />
    </div>
  );
}
