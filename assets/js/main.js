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

	// ---- 6. Language switcher --------------------------------------------
	var langSw = document.querySelector('[data-lang-switch]');
	if (langSw) {
		var trigger = langSw.querySelector('.lang-switch__trigger');
		var items   = langSw.querySelectorAll('.lang-switch__item');
		var currentFlag = langSw.querySelector('[data-current-flag]');

		function langClose() { langSw.classList.remove('is-open'); trigger.setAttribute('aria-expanded', 'false'); }
		function langOpen()  { langSw.classList.add('is-open');    trigger.setAttribute('aria-expanded', 'true');  }

		trigger.addEventListener('click', function (e) {
			e.preventDefault(); e.stopPropagation();
			if (langSw.classList.contains('is-open')) langClose(); else langOpen();
		});

		items.forEach(function (item) {
			item.addEventListener('click', function (e) {
				// In WordPress with WPML/Polylang the <a> href is the translated URL — let it navigate.
				// We only intercept when href is "#" (no plugin active) so the picker still works visually.
				if (item.tagName === 'A' && item.getAttribute('href') && item.getAttribute('href') !== '#') {
					// Update visible flag immediately so user sees the change as page loads.
					var flag = item.querySelector('.lang-flag');
					if (flag && currentFlag) currentFlag.innerHTML = flag.innerHTML;
					try { localStorage.setItem('qubyx-lang', item.dataset.lang); } catch (err) {}
					return; // allow link navigation
				}
				e.preventDefault(); e.stopPropagation();
				items.forEach(function (i) { i.classList.remove('is-active'); });
				item.classList.add('is-active');
				var flag = item.querySelector('.lang-flag');
				if (flag && currentFlag) currentFlag.innerHTML = flag.innerHTML;
				langClose();
				try { localStorage.setItem('qubyx-lang', item.dataset.lang); } catch (err) {}
			});
		});

		document.addEventListener('click', function (e) {
			if (!langSw.contains(e.target)) langClose();
		});
	}

	// ---- 7. Store catalog filters -----------------------------------------
	var storeGrid = document.querySelector('[data-store-grid]');
	if (storeGrid) {
		var storeState = { audience: 'hospitals', category: 'all' };
		var storeCounter = document.querySelector('[data-store-count]');
		var storeEmpty = document.querySelector('[data-store-empty]');
		var storeCards = storeGrid.querySelectorAll('.adstore-card');
		var storeSegments = document.querySelectorAll('.adstore-segments a[data-audience]');
		var storeCategories = document.querySelectorAll('.adstore-sidebar a[data-category]');
		var categoryLabels = {
			all: 'All products',
			medical: 'Medical / DICOM',
			color: 'Color / Creative',
			epd: 'E-paper / OEM',
			sensors: 'Sensors',
			bundles: 'Bundles'
		};
		var audienceLabels = {
			hospitals: 'Hospitals',
			color: 'Color professionals',
			oem: 'OEM & manufacturing',
			education: 'Education'
		};

		function cardMatches(card, audience, category) {
			var cats = (card.getAttribute('data-categories') || '').split(',');
			var auds = (card.getAttribute('data-audiences') || '').split(',');
			return auds.indexOf(audience) !== -1 && (category === 'all' || cats.indexOf(category) !== -1);
		}

		function applyStoreFilters() {
			var shown = 0;
			storeCards.forEach(function (card) {
				var visible = cardMatches(card, storeState.audience, storeState.category);
				card.hidden = !visible;
				if (visible) shown++;
			});
			if (storeCounter) {
				storeCounter.innerHTML = '<strong>' + shown + ' result' + (shown === 1 ? '' : 's') + '</strong> in ' + (categoryLabels[storeState.category] || storeState.category) + ' - ' + (audienceLabels[storeState.audience] || storeState.audience);
			}
			if (storeEmpty) storeEmpty.hidden = shown !== 0;
			storeGrid.hidden = shown === 0;

			document.querySelectorAll('.adstore-sidebar__count[data-count]').forEach(function (el) {
				var cat = el.getAttribute('data-count');
				var count = 0;
				storeCards.forEach(function (card) {
					if (cardMatches(card, storeState.audience, cat)) count++;
				});
				el.textContent = count;
			});
		}

		storeSegments.forEach(function (link) {
			link.addEventListener('click', function (e) {
				e.preventDefault();
				storeState.audience = link.getAttribute('data-audience');
				storeSegments.forEach(function (item) { item.classList.toggle('is-active', item === link); });
				applyStoreFilters();
			});
		});

		storeCategories.forEach(function (link) {
			link.addEventListener('click', function (e) {
				e.preventDefault();
				storeState.category = link.getAttribute('data-category');
				storeCategories.forEach(function (item) { item.classList.toggle('is-active', item === link); });
				applyStoreFilters();
			});
		});

		applyStoreFilters();
	}
})();
