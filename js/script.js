const themeToggle = document.querySelector('.theme-toggle');
const themeHint = document.querySelector('.theme-hint');

if (themeHint) {
	const updateThemeHintVisibility = () => {
		document.documentElement.classList.toggle('has-scrolled', window.scrollY > 64);
	};

	window.addEventListener('scroll', updateThemeHintVisibility, { passive: true });
	updateThemeHintVisibility();
}

if (themeToggle) {
	const savedTheme = localStorage.getItem('portfolio-theme');
	const initialTheme = savedTheme === 'light' || savedTheme === 'dark'
		? savedTheme
		: document.documentElement.dataset.theme || 'dark';
	let themeTransitionTimeout;

	const applyTheme = (theme, animate = false) => {
		const isDark = theme === 'dark';
		window.clearTimeout(themeTransitionTimeout);
		if (animate) {
			document.documentElement.classList.add('theme-transition');
			themeTransitionTimeout = window.setTimeout(() => {
				document.documentElement.classList.remove('theme-transition');
			}, 350);
		}
		document.documentElement.dataset.theme = theme;
		themeToggle.setAttribute('aria-checked', String(isDark));
		themeToggle.querySelector('img').src = isDark
			? themeToggle.dataset.lampOff
			: themeToggle.dataset.lampOn;
	};

	applyTheme(initialTheme);
	themeToggle.addEventListener('click', () => {
		const nextTheme = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
		applyTheme(nextTheme, true);
		localStorage.setItem('portfolio-theme', nextTheme);
	});
}

if (!matchMedia('(hover: none)').matches && !matchMedia('(prefers-reduced-motion: reduce)').matches) {
	const LIFE = 700;
	const canvas = document.createElement('canvas');
	canvas.className = 'brush-trail';
	canvas.setAttribute('aria-hidden', 'true');
	const context = canvas.getContext('2d');

	if (context) {
		document.body.appendChild(canvas);

		let width;
		let height;
		const resizeCanvas = () => {
			const pixelRatio = window.devicePixelRatio || 1;
			width = window.innerWidth;
			height = window.innerHeight;
			canvas.width = width * pixelRatio;
			canvas.height = height * pixelRatio;
			context.setTransform(pixelRatio, 0, 0, pixelRatio, 0, 0);
		};

		resizeCanvas();
		window.addEventListener('resize', resizeCanvas);

		let marks = [];
		let previousPoint = null;
		const root = document.documentElement;
		const getTrailStyle = (x, y) => {
			const target = document.elementFromPoint(x, y);
			const rootStyles = getComputedStyle(root);
			if (!target) {
				return {
					color: rootStyles.getPropertyValue('--trail-color').trim(),
					outline: rootStyles.getPropertyValue('--trail-outline-color').trim()
				};
			}

			const gradientSurface = target.closest('.hero, .projects-hero');
			if (gradientSurface) {
				const gradientStyles = getComputedStyle(gradientSurface);
				const bounds = gradientSurface.getBoundingClientRect();
				const progress = bounds.height ? (y - bounds.top) / bounds.height : 0;
				const isStart = progress < 0.5;
				const color = gradientStyles.getPropertyValue(isStart ? '--trail-start-color' : '--trail-end-color').trim();
				if (color) {
					return {
						color,
						outline: gradientStyles.getPropertyValue(isStart ? '--trail-start-outline-color' : '--trail-end-outline-color').trim()
					};
				}
			}

			const targetStyles = getComputedStyle(target);
			return {
				color: targetStyles.getPropertyValue('--trail-color').trim() || rootStyles.getPropertyValue('--trail-color').trim(),
				outline: targetStyles.getPropertyValue('--trail-outline-color').trim() || rootStyles.getPropertyValue('--trail-outline-color').trim()
			};
		};

		const createMark = (x, y, time, angle, trailStyle, scale = 1) => {
			const markWidth = (10 + Math.random() * 8) * scale;
			const markHeight = (5 + Math.random() * 4) * scale;
			const shape = Array.from({ length: 8 }, () => {
				const pointAngle = Math.random() * Math.PI * 2;
				const radius = 0.72 + Math.random() * 0.48;
				return {
					x: Math.cos(pointAngle) * markWidth * radius / 2,
					y: Math.sin(pointAngle) * markHeight * radius / 2
				};
			});

			marks.push({
				x,
				y,
				time,
				angle,
				color: trailStyle.color,
				outline: trailStyle.outline,
				outlineWidth: Math.max(0.5, 1.5 * scale),
				shape,
				opacity: 0.7 + Math.random() * 0.25
			});
		};

		window.addEventListener('pointermove', (event) => {
			if (event.pointerType === 'touch') return;

			const coalescedEvents = event.getCoalescedEvents?.() ?? [];
			const pointerEvents = coalescedEvents.length ? coalescedEvents : [event];
			const eventTime = performance.now();

			pointerEvents.forEach((pointerEvent) => {
				const currentPoint = { x: pointerEvent.clientX, y: pointerEvent.clientY };
				const trailStyle = getTrailStyle(currentPoint.x, currentPoint.y);
				if (!previousPoint) {
					createMark(currentPoint.x, currentPoint.y, eventTime, 0, trailStyle);
					previousPoint = currentPoint;
					return;
				}

				const distance = Math.hypot(currentPoint.x - previousPoint.x, currentPoint.y - previousPoint.y);
				if (!distance) return;

				const angle = Math.atan2(currentPoint.y - previousPoint.y, currentPoint.x - previousPoint.x);
				const normalX = -Math.sin(angle);
				const normalY = Math.cos(angle);
				const stampCount = Math.max(1, Math.ceil(distance / 5));
				for (let stamp = 1; stamp <= stampCount; stamp++) {
					const progress = stamp / stampCount;
					const x = previousPoint.x + (currentPoint.x - previousPoint.x) * progress;
					const y = previousPoint.y + (currentPoint.y - previousPoint.y) * progress;
					const offset = (Math.random() - 0.5) * 3;
					createMark(x + normalX * offset, y + normalY * offset, eventTime, angle, trailStyle);

					if (Math.random() < 0.16) {
						const fleckOffset = (Math.random() - 0.5) * 14;
						createMark(x + normalX * fleckOffset, y + normalY * fleckOffset, eventTime, angle + Math.random(), trailStyle, 0.25 + Math.random() * 0.3);
					}
				}

				previousPoint = currentPoint;
			});
		});

		window.addEventListener('pointerleave', () => {
			previousPoint = null;
		});

		const drawFrame = (now) => {
			context.clearRect(0, 0, width, height);
			marks = marks.filter((mark) => now - mark.time < LIFE);

			marks.forEach((mark) => {
				const age = (now - mark.time) / LIFE;
				context.fillStyle = mark.color;
				context.globalAlpha = mark.opacity * (1 - age) ** 1.4;
				context.save();
				context.translate(mark.x, mark.y);
				context.rotate(mark.angle);
				context.beginPath();
				context.moveTo(mark.shape[0].x, mark.shape[0].y);

				for (let index = 0; index < mark.shape.length; index++) {
					const current = mark.shape[index];
					const next = mark.shape[(index + 1) % mark.shape.length];
					context.quadraticCurveTo(current.x, current.y, (current.x + next.x) / 2, (current.y + next.y) / 2);
				}

				context.closePath();
				context.fill();
				if (mark.outline && mark.outline !== 'transparent') {
					context.strokeStyle = mark.outline;
					context.lineWidth = mark.outlineWidth;
					context.stroke();
				}
				context.restore();
			});

			context.globalAlpha = 1;

			window.requestAnimationFrame(drawFrame);
		};

		window.requestAnimationFrame(drawFrame);
	}
}

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

