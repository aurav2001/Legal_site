/**
 * Legal Insights WordPress Theme Scripts
 * Pure Vanilla JavaScript (No jQuery dependency required!)
 * High Performance Native AOS Scroll Reveal, BCI Regulatory Modal, Sticky Header & Mobile Nav
 */

(function() {
    'use strict';

    // 1. High Performance Scroll Reveal Engine (IntersectionObserver)
    function initAOSEngine() {
        var aosElements = document.querySelectorAll('[data-aos]');
        if (!aosElements.length) return;

        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('aos-animate');
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -50px 0px'
            });

            aosElements.forEach(function(el) {
                var rect = el.getBoundingClientRect();
                // Hero elements visible on initial view
                if (rect.top < window.innerHeight * 0.85 && rect.bottom > 0) {
                    setTimeout(function() {
                        el.classList.add('aos-animate');
                    }, 120);
                } else {
                    observer.observe(el);
                }
            });
        } else {
            function checkScroll() {
                var windowHeight = window.innerHeight;
                aosElements.forEach(function(el) {
                    var rect = el.getBoundingClientRect();
                    if (rect.top <= windowHeight - 50) {
                        el.classList.add('aos-animate');
                    }
                });
            }
            window.addEventListener('scroll', checkScroll, { passive: true });
            checkScroll();
        }

        // Safety net: ensure everything becomes visible after 4 seconds
        setTimeout(function() {
            aosElements.forEach(function(el) {
                el.classList.add('aos-animate');
            });
        }, 4000);
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
