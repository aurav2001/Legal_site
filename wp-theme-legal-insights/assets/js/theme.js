/**
 * Legal Insights WordPress Theme Scripts
 * Pure Vanilla JavaScript (No jQuery dependency required!)
 * High Performance Native AOS Scroll Reveal, BCI Regulatory Modal, Sticky Header & Mobile Nav
 */

(function() {
    'use strict';

    // 1. High Performance Scroll Reveal Engine
    function initAOSEngine() {
        var aosElements = document.querySelectorAll('[data-aos]');
        if (!aosElements.length) return;

        function revealVisible() {
            var windowHeight = window.innerHeight || document.documentElement.clientHeight;
            aosElements.forEach(function(el) {
                var rect = el.getBoundingClientRect();
                // If element is in viewport or close to it, animate
                if (rect.top <= windowHeight * 1.1) {
                    el.classList.add('aos-animate');
                }
            });
        }

        // Run immediately
        revealVisible();

        // Run on scroll and resize
        window.addEventListener('scroll', revealVisible, { passive: true });
        window.addEventListener('resize', revealVisible, { passive: true });

        // Backup timer to guarantee all elements appear even if not scrolled
        setTimeout(revealVisible, 150);
        setTimeout(revealVisible, 500);
        setTimeout(revealVisible, 1200);
    }

    // Execute immediately if DOM already loaded, or on DOMContentLoaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAll);
    } else {
        initAll();
    }

    function initAll() {
        // Init AOS
        initAOSEngine();

        // 2. Bar Council of India (BCI) Disclaimer Modal
        var modal = document.getElementById('bciDisclaimerModal');
        var disclaimerKey = 'legal_bci_disclaimer_accepted';

        if (modal) {
            if (!sessionStorage.getItem(disclaimerKey)) {
                modal.style.display = 'flex';
            } else {
                modal.style.display = 'none';
            }

            var proceedBtn = document.getElementById('proceedBtn');
            if (proceedBtn) {
                proceedBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    sessionStorage.setItem(disclaimerKey, 'true');
                    modal.style.display = 'none';
                });
            }

            var triggerBtn = document.getElementById('footerDisclaimerTrigger');
            if (triggerBtn) {
                triggerBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    modal.style.display = 'flex';
                });
            }

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.style.display === 'flex' && sessionStorage.getItem(disclaimerKey)) {
                    modal.style.display = 'none';
                }
            });
        }

        // 3. Mobile Menu Toggle
        var menuToggle = document.getElementById('mobileMenuToggle');
        var headerMain = document.querySelector('.header-main');
        if (menuToggle && headerMain) {
            menuToggle.addEventListener('click', function() {
                headerMain.classList.toggle('mobile-menu-active');
                menuToggle.classList.toggle('open');
            });
        }

        // 4. Sticky Header Scroll Effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 40) {
                if (headerMain) headerMain.classList.add('header-scrolled');
            } else {
                if (headerMain) headerMain.classList.remove('header-scrolled');
            }
        }, { passive: true });
    }

    // Also run on full window load
    window.addEventListener('load', function() {
        var aosElements = document.querySelectorAll('[data-aos]');
        aosElements.forEach(function(el) {
            var rect = el.getBoundingClientRect();
            if (rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 1.15) {
                el.classList.add('aos-animate');
            }
        });
    });

})();
