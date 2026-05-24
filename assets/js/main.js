/**
 * Qubyx Theme — main.js
 * Tiny, no dependencies, deferred. Progressive enhancement only.
 */
(function () {
	'use strict';

	// ---- 1. Sticky header shadow on scroll ----------------------------------
	var header = document.querySelector('[data-site-header]');
	if (header) {
		var setScrolled = function () {
			header.setAttribute('data-scrolled', window.scrollY > 8 ? 'true' : 'false');
		};
		setScrolled();
		window.addEventListener('scroll', setScrolled, { passive: true });
	}

	// ---- 2. Mobile menu -----------------------------------------------------
	var toggle = document.querySelector('[data-mobile-toggle]');
	var panel = document.getElementById('mobile-nav');
	if (toggle && panel) {
		toggle.addEventListener('click', function () {
			var isOpen = !panel.hasAttribute('hidden');
			if (isOpen) {
				panel.setAttribute('hidden', '');
				toggle.setAttribute('aria-expanded', 'false');
			} else {
				panel.removeAttribute('hidden');
				toggle.setAttribute('aria-expanded', 'true');
			}
		});
	}

	// ---- 3. Reveal-on-scroll for [data-reveal] -------------------------------
	if ('IntersectionObserver' in window) {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (e) {
				if (e.isIntersecting) {
					e.target.classList.add('is-visible');
					io.unobserve(e.target);
				}
			});
		}, { rootMargin: '0px 0px -10% 0px', threshold: 0.05 });

		document.querySelectorAll('[data-reveal]').forEach(function (el) { io.observe(el); });
	}

	// ---- 4. Auto-generate TOC from .prose headings (resource pages) ----------
	var toc = document.querySelector('[data-toc] .toc__list');
	var prose = document.querySelector('[data-prose]');
	if (toc && prose) {
		var headings = prose.querySelectorAll('h2, h3');
		if (!headings.length) {
			document.querySelector('[data-toc]').style.display = 'none';
		} else {
			headings.forEach(function (h, i) {
				if (!h.id) {
					h.id = 'sect-' + (i + 1) + '-' + h.textContent.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '').slice(0, 40);
				}
				var li = document.createElement('li');
				if (h.tagName === 'H3') li.style.paddingLeft = '12px';
				var a = document.createElement('a');
				a.href = '#' + h.id;
				a.textContent = h.textContent;
				a.dataset.tocLink = h.id;
				li.appendChild(a);
				toc.appendChild(li);
			});

			// Highlight active link
			if ('IntersectionObserver' in window) {
				var links = toc.querySelectorAll('a[data-toc-link]');
				var observer = new IntersectionObserver(function (entries) {
					entries.forEach(function (entry) {
						if (entry.isIntersecting) {
							links.forEach(function (l) { l.classList.toggle('is-active', l.dataset.tocLink === entry.target.id); });
						}
					});
				}, { rootMargin: '-40% 0px -55% 0px' });
				headings.forEach(function (h) { observer.observe(h); });
			}
		}
	}

	// ---- 5. Subtle parallax for hero bars (only if motion is allowed) ---------
	if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		var bars = document.querySelectorAll('.hero__bars > div');
		if (bars.length) {
			// Re-trigger height animation on load for the visual flourish.
			setTimeout(function () {
				bars.forEach(function (bar, i) { bar.style.transitionDelay = (i * 40) + 'ms'; });
			}, 60);
		}
	}
})();
