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

        // 3. Mobile Menu Toggle & Mobile Drawer Engine
        var menuToggle = document.getElementById('mobileMenuToggle');
        var headerMain = document.querySelector('.header-main');
        if (menuToggle && headerMain) {
            menuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                var isActive = headerMain.classList.toggle('mobile-menu-active');
                menuToggle.classList.toggle('open', isActive);
                if (isActive) {
                    document.body.classList.add('mobile-nav-lock');
                } else {
                    document.body.classList.remove('mobile-nav-lock');
                }
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (headerMain.classList.contains('mobile-menu-active') && !headerMain.contains(e.target)) {
                    headerMain.classList.remove('mobile-menu-active');
                    menuToggle.classList.remove('open');
                    document.body.classList.remove('mobile-nav-lock');
                }
            });

            // Close on ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && headerMain.classList.contains('mobile-menu-active')) {
                    headerMain.classList.remove('mobile-menu-active');
                    menuToggle.classList.remove('open');
                    document.body.classList.remove('mobile-nav-lock');
                }
            });

            // Close menu when a navigation item is clicked (for in-page anchors or clean transition)
            var navLinks = headerMain.querySelectorAll('.navinr a:not(.has-dropdown-toggle)');
            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    // Only close if it's a direct link (not a parent opening submenu)
                    if (!link.parentElement.classList.contains('menu-item-has-children') && 
                        !link.parentElement.querySelector('.sub_menuinr') &&
                        !link.parentElement.querySelector('.sub-menu')) {
                        headerMain.classList.remove('mobile-menu-active');
                        menuToggle.classList.remove('open');
                        document.body.classList.remove('mobile-nav-lock');
                    }
                });
            });

            // 3b. Mobile Dropdown Accordion Toggle (Practice Areas)
            var parentItems = headerMain.querySelectorAll('.navinr > li');
            parentItems.forEach(function(li) {
                var subMenu = li.querySelector('.sub_menuinr, .sub-menu, .children');
                if (subMenu) {
                    var parentLink = li.querySelector('a');
                    if (parentLink) {
                        parentLink.classList.add('has-dropdown-toggle');
                        parentLink.addEventListener('click', function(e) {
                            if (window.innerWidth <= 991) {
                                e.preventDefault();
                                e.stopPropagation();
                                li.classList.toggle('submenu-open');
                            }
                        });
                    }
                }
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

        // 5. Confidential Legal Inquiry AJAX Submission Engine
        var inquiryForm = document.getElementById('legalInquiryForm');
        if (inquiryForm) {
            inquiryForm.addEventListener('submit', function(e) {
                e.preventDefault();

                var alertBox = document.getElementById('inquiryAlert');
                var submitBtn = document.getElementById('inquirySubmitBtn');
                var btnText = submitBtn ? submitBtn.querySelector('.btn-text') : null;
                var btnSpinner = submitBtn ? submitBtn.querySelector('.btn-spinner') : null;

                if (alertBox) {
                    alertBox.style.display = 'none';
                    alertBox.innerHTML = '';
                }

                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.style.opacity = '0.75';
                    submitBtn.style.cursor = 'not-allowed';
                    if (btnText) btnText.style.display = 'none';
                    if (btnSpinner) btnSpinner.style.display = 'inline-block';
                }

                var formData = new FormData(inquiryForm);
                formData.append('action', 'legal_submit_inquiry');
                if (typeof legalInsightsData !== 'undefined' && legalInsightsData.inquiryNonce) {
                    formData.append('nonce', legalInsightsData.inquiryNonce);
                }

                var ajaxUrl = (typeof legalInsightsData !== 'undefined' && legalInsightsData.ajaxurl)
                    ? legalInsightsData.ajaxurl
                    : '/wp-admin/admin-ajax.php';

                fetch(ajaxUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(function(res) {
                    return res.json();
                })
                .then(function(res) {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.style.opacity = '1';
                        submitBtn.style.cursor = 'pointer';
                        if (btnText) btnText.style.display = 'inline-block';
                        if (btnSpinner) btnSpinner.style.display = 'none';
                    }

                    if (res && res.success) {
                        if (alertBox) {
                            alertBox.style.display = 'block';
                            alertBox.style.background = '#f0fdf4';
                            alertBox.style.border = '1.5px solid #86efac';
                            alertBox.style.color = '#15803d';
                            var msg = (res.data && res.data.message) ? res.data.message : 'Your confidential inquiry has been privileged and transmitted to our Senior Registry.';
                            alertBox.innerHTML = '<div style="display:flex; align-items:flex-start; gap:12px;">' +
                                '<span style="font-size:1.6rem; line-height:1;">⚖️</span>' +
                                '<div>' +
                                    '<strong style="font-size:1.05rem; display:block; margin-bottom:4px; color:#14532d;">Inquiry Privileged &amp; Successfully Dispatched</strong>' +
                                    '<span style="font-size:0.92rem; color:#166534;">' + msg + '</span>' +
                                '</div>' +
                            '</div>';
                            alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        inquiryForm.reset();
                    } else {
                        var err = (res && res.data && res.data.message) ? res.data.message : 'An unexpected error occurred. Please contact our chambers directly.';
                        if (alertBox) {
                            alertBox.style.display = 'block';
                            alertBox.style.background = '#fef2f2';
                            alertBox.style.border = '1.5px solid #fca5a5';
                            alertBox.style.color = '#991b1b';
                            alertBox.innerHTML = '<strong>Submission Error:</strong> ' + err;
                            alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }
                })
                .catch(function() {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.style.opacity = '1';
                        submitBtn.style.cursor = 'pointer';
                        if (btnText) btnText.style.display = 'inline-block';
                        if (btnSpinner) btnSpinner.style.display = 'none';
                    }
                    if (alertBox) {
                        alertBox.style.display = 'block';
                        alertBox.style.background = '#fef2f2';
                        alertBox.style.border = '1.5px solid #fca5a5';
                        alertBox.style.color = '#991b1b';
                        alertBox.innerHTML = '<strong>Connection Error:</strong> Unable to connect to chambers server. Please reach out directly by telephone.';
                        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                });
            });
        }
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
