const sectionLinks = document.querySelectorAll('.nav a[data-section]');
const sections = [...sectionLinks]
	.map((link) => document.getElementById(link.dataset.section))
	.filter(Boolean);

if (sectionLinks.length && sections.length) {
	const updateActiveSection = () => {
		const headerHeight = document.querySelector('.site-header')?.offsetHeight ?? 0;
		const scrollPosition = window.scrollY + headerHeight + 80;
		const isAtPageBottom = window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 2;
		let activeSection = isAtPageBottom ? sections[sections.length - 1] : sections[0];

		if (!isAtPageBottom) {
			sections.forEach((section) => {
				if (section.offsetTop <= scrollPosition) {
					activeSection = section;
				}
			});
		}

		sectionLinks.forEach((link) => {
			const isActive = link.dataset.section === activeSection.id;
			link.classList.toggle('active', isActive);

			if (isActive) {
				link.setAttribute('aria-current', 'page');
			} else {
				link.removeAttribute('aria-current');
			}
		});
	};

	window.addEventListener('scroll', updateActiveSection, { passive: true });
	window.addEventListener('resize', updateActiveSection);
	updateActiveSection();
}

