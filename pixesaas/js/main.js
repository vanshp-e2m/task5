// PixeSaaS Theme JavaScript
(function() {
	'use strict';

	// Smooth scroll for anchor links
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function(e) {
			const href = this.getAttribute('href');
			if (href !== '#') {
				e.preventDefault();
				const target = document.querySelector(href);
				if (target) {
					target.scrollIntoView({ behavior: 'smooth' });
				}
			}
		});
	});

	// Navbar drop panel
	const toggle = document.querySelector('.navbar__toggle');
	const collapse = document.getElementById('navbar-collapse');

	if (toggle && collapse) {
		const setOpen = (open) => {
			toggle.setAttribute('aria-expanded', String(open));
			collapse.classList.toggle('is-open', open);
		};

		toggle.addEventListener('click', () => {
			setOpen(toggle.getAttribute('aria-expanded') !== 'true');
		});

		// Close on Escape, returning focus to the control that opened it.
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
				setOpen(false);
				toggle.focus();
			}
		});

		// Close after following an in-page link from the panel.
		collapse.addEventListener('click', (e) => {
			if (e.target.closest('a')) {
				setOpen(false);
			}
		});

		// The panel only exists below the collapse breakpoint; reset when the
		// desktop row comes back so it cannot stay stuck open.
		window.matchMedia('(min-width: 1025px)').addEventListener('change', (e) => {
			if (e.matches) {
				setOpen(false);
			}
		});
	}

	// Lazy load images
	if ('IntersectionObserver' in window) {
		const images = document.querySelectorAll('img[data-src]');
		const imageObserver = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					const img = entry.target;
					img.src = img.dataset.src;
					img.removeAttribute('data-src');
					imageObserver.unobserve(img);
				}
			});
		});

		images.forEach(img => imageObserver.observe(img));
	}
})();
