const themeToggle = document.querySelector('.theme-toggle');
const themeHint = document.querySelector('.theme-hint');
const skillTabs = document.querySelector('[data-skill-tabs]');

if (skillTabs) {
	const tabs = [...skillTabs.querySelectorAll('[role="tab"]')];
	const setSkillTileState = (tile, isFlipped) => {
		tile.setAttribute('aria-expanded', String(isFlipped));
		tile.setAttribute('aria-label', `${isFlipped ? 'Masquer' : 'Voir'} un exemple ${tile.dataset.skill}`);
		tile.querySelector('.skill-tile-front')?.setAttribute('aria-hidden', String(isFlipped));
		tile.querySelector('.skill-tile-back')?.setAttribute('aria-hidden', String(!isFlipped));
	};
	const setFlippingState = (event, isFlipping) => {
		if (event.propertyName !== 'transform') return;
		event.target.closest('.skill-tile-inner')?.closest('.skill-tile')?.classList.toggle('is-flipping', isFlipping);
	};

	skillTabs.addEventListener('transitionrun', (event) => setFlippingState(event, true));
	skillTabs.addEventListener('transitionend', (event) => setFlippingState(event, false));
	skillTabs.addEventListener('transitioncancel', (event) => setFlippingState(event, false));

	const activateTab = (tab, moveFocus = false) => {
		tabs.forEach((currentTab) => {
			const isActive = currentTab === tab;
			currentTab.setAttribute('aria-selected', String(isActive));
			currentTab.tabIndex = isActive ? 0 : -1;
			const panel = document.getElementById(currentTab.getAttribute('aria-controls'));
			if (panel) {
				if (!isActive) {
					panel.querySelectorAll('.skill-tile[aria-expanded="true"]').forEach((tile) => setSkillTileState(tile, false));
				}
				panel.hidden = !isActive;
			}
		});
		if (moveFocus) tab.focus();
	};

	skillTabs.addEventListener('click', (event) => {
		const tile = event.target.closest('.skill-tile');
		if (tile) {
			const bounds = tile.getBoundingClientRect();
			const clickedLeftHalf = event.detail > 0 && event.clientX < bounds.left + bounds.width / 2;
			tile.classList.add('is-flipping');
			tile.style.setProperty('--skill-flip-angle', clickedLeftHalf ? '-180deg' : '180deg');
			setSkillTileState(tile, tile.getAttribute('aria-expanded') !== 'true');
			return;
		}

		const tab = event.target.closest('[role="tab"]');
		if (tab) activateTab(tab);
	});

	skillTabs.addEventListener('keydown', (event) => {
		const currentIndex = tabs.indexOf(event.target.closest('[role="tab"]'));
		if (currentIndex < 0) return;

		let nextIndex;
		if (event.key === 'ArrowRight') nextIndex = (currentIndex + 1) % tabs.length;
		else if (event.key === 'ArrowLeft') nextIndex = (currentIndex - 1 + tabs.length) % tabs.length;
		else if (event.key === 'Home') nextIndex = 0;
		else if (event.key === 'End') nextIndex = tabs.length - 1;
		else return;

		event.preventDefault();
		activateTab(tabs[nextIndex], true);
	});
}

const paintPalette = document.querySelector('.paint-palette');
const paintPaletteImage = paintPalette?.querySelector('img');
const paintButtons = paintPalette?.querySelectorAll('button[data-paint]') ?? [];
const paintSelectMode = document.querySelector('.paint-select-mode');
const paintClearButton = document.querySelector('.paint-clear');
const getPaintColor = (button, theme = document.documentElement.dataset.theme) =>
	button?.dataset[theme === 'dark' ? 'colorDark' : 'colorLight'] ?? '';

if (paintPalette && paintPaletteImage) {
	const savedPaint = localStorage.getItem('portfolio-paint')?.toLowerCase();
	const validPaint = [...paintButtons].find((button) =>
		[button.dataset.paint, button.dataset.colorLight.toLowerCase(), button.dataset.colorDark.toLowerCase()].includes(savedPaint)
	);
	const setDrawingMode = (enabled) => {
		document.documentElement.classList.toggle('drawing-mode', enabled);
		paintSelectMode?.setAttribute('aria-pressed', String(!enabled));
		localStorage.setItem('portfolio-drawing-mode', String(enabled));
	};

	if (validPaint) {
		validPaint.setAttribute('aria-pressed', 'true');
		document.documentElement.style.setProperty('--selected-paint', getPaintColor(validPaint));
		setDrawingMode(localStorage.getItem('portfolio-drawing-mode') === 'true');
	} else {
		paintSelectMode?.setAttribute('aria-pressed', 'true');
	}

	const selectPaint = (button) => {
		document.documentElement.style.setProperty('--selected-paint', getPaintColor(button));
		paintButtons.forEach((paintButton) => paintButton.setAttribute('aria-pressed', String(paintButton === button)));
		localStorage.setItem('portfolio-paint', button.dataset.paint);
		setDrawingMode(true);
	};
	paintPalette.addEventListener('click', (event) => {
		let button = event.target.closest('button[data-paint]');
		if (!button) return;

		if (event.detail > 0) {
			const hitButtons = [...paintButtons].filter((paintButton) => {
				const bounds = paintButton.getBoundingClientRect();
				return event.clientX >= bounds.left && event.clientX <= bounds.right
					&& event.clientY >= bounds.top && event.clientY <= bounds.bottom;
			});
			button = hitButtons.reduce((closestButton, paintButton) => {
				const bounds = paintButton.getBoundingClientRect();
				const closestBounds = closestButton.getBoundingClientRect();
				const distance = Math.hypot(event.clientX - (bounds.left + bounds.width / 2), event.clientY - (bounds.top + bounds.height / 2));
				const closestDistance = Math.hypot(event.clientX - (closestBounds.left + closestBounds.width / 2), event.clientY - (closestBounds.top + closestBounds.height / 2));
				return distance < closestDistance ? paintButton : closestButton;
			}, button);
		}

		selectPaint(button);
	});

	paintSelectMode?.addEventListener('click', () => setDrawingMode(false));
}

if (paintSelectMode) {
	const drawingCanvas = document.createElement('canvas');
	drawingCanvas.className = 'brush-drawing';
	drawingCanvas.setAttribute('aria-hidden', 'true');
	const drawingContext = drawingCanvas.getContext('2d');
	let canvasWidth = 0;
	let canvasHeight = 0;
	let isDrawing = false;

	if (drawingContext) {
		document.body.appendChild(drawingCanvas);

		const resizeDrawingCanvas = () => {
			const pixelRatio = window.devicePixelRatio || 1;
			const nextWidth = Math.max(document.documentElement.scrollWidth, window.innerWidth);
			const nextHeight = Math.max(document.documentElement.scrollHeight, window.innerHeight);
			const previousCanvas = document.createElement('canvas');
			previousCanvas.width = drawingCanvas.width;
			previousCanvas.height = drawingCanvas.height;
			previousCanvas.getContext('2d')?.drawImage(drawingCanvas, 0, 0);

			drawingCanvas.width = nextWidth * pixelRatio;
			drawingCanvas.height = nextHeight * pixelRatio;
			drawingCanvas.style.width = `${nextWidth}px`;
			drawingCanvas.style.height = `${nextHeight}px`;
			drawingContext.setTransform(pixelRatio, 0, 0, pixelRatio, 0, 0);
			if (previousCanvas.width && previousCanvas.height) {
				drawingContext.drawImage(previousCanvas, 0, 0, previousCanvas.width / pixelRatio, previousCanvas.height / pixelRatio);
			}
			canvasWidth = nextWidth;
			canvasHeight = nextHeight;
		};

		resizeDrawingCanvas();
		window.addEventListener('resize', resizeDrawingCanvas);
		window.addEventListener('load', resizeDrawingCanvas, { once: true });
		paintClearButton?.addEventListener('click', () => drawingContext.clearRect(0, 0, canvasWidth, canvasHeight));

		const getCanvasPoint = (event) => ({ x: event.pageX, y: event.pageY });
		const drawDot = (point, color) => {
			drawingContext.beginPath();
			drawingContext.arc(point.x, point.y, 2.5, 0, Math.PI * 2);
			drawingContext.fillStyle = color;
			drawingContext.fill();
		};

		document.addEventListener('pointerdown', (event) => {
			if (!document.documentElement.classList.contains('drawing-mode') || event.target.closest('.paint-tools')) return;
			event.preventDefault();
			isDrawing = true;
			const point = getCanvasPoint(event);
			const color = getComputedStyle(document.documentElement).getPropertyValue('--selected-paint').trim();
			drawDot(point, color);
			drawingContext.beginPath();
			drawingContext.moveTo(point.x, point.y);
			drawingContext.strokeStyle = color;
			drawingContext.lineWidth = 5;
			drawingContext.lineCap = 'round';
			drawingContext.lineJoin = 'round';
		}, true);

		document.addEventListener('pointermove', (event) => {
			if (!isDrawing) return;
			const point = getCanvasPoint(event);
			drawingContext.lineTo(point.x, point.y);
			drawingContext.stroke();
		});

		const stopDrawing = () => {
			isDrawing = false;
			drawingContext.closePath();
		};
		window.addEventListener('pointerup', stopDrawing);
		window.addEventListener('pointercancel', stopDrawing);
		document.addEventListener('dragstart', (event) => {
			if (document.documentElement.classList.contains('drawing-mode')) event.preventDefault();
		});
	}
}

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
		const selectedPaint = [...paintButtons].find((button) => button.getAttribute('aria-pressed') === 'true');
		if (selectedPaint) {
			document.documentElement.style.setProperty('--selected-paint', getPaintColor(selectedPaint, theme));
		}
		if (paintPaletteImage) {
			paintPaletteImage.src = isDark ? paintPaletteImage.dataset.paletteDark : paintPaletteImage.dataset.paletteLight;
		}
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
			const selectedPaint = rootStyles.getPropertyValue('--selected-paint').trim();
			if (selectedPaint) {
				return {
					color: selectedPaint,
					outline: rootStyles.getPropertyValue('--trail-outline-color').trim()
				};
			}

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

const canUsePointerEffects = matchMedia('(hover: hover) and (pointer: fine)').matches
	&& !matchMedia('(prefers-reduced-motion: reduce)').matches;

if (canUsePointerEffects) {
	document.querySelectorAll('.btn').forEach((button) => {
		button.addEventListener('pointermove', (event) => {
			const bounds = button.getBoundingClientRect();
			const offsetX = (event.clientX - bounds.left - bounds.width / 2) * 0.12;
			const offsetY = (event.clientY - bounds.top - bounds.height / 2) * 0.12;
			button.style.translate = `${offsetX}px ${offsetY}px`;
		});

		button.addEventListener('pointerleave', () => {
			button.style.translate = '';
		});
	});

	document.querySelectorAll('.projects-grid .project-card').forEach((card) => {
		card.addEventListener('pointermove', (event) => {
			const bounds = card.getBoundingClientRect();
			const horizontalProgress = (event.clientX - bounds.left) / bounds.width - 0.5;
			const verticalProgress = (event.clientY - bounds.top) / bounds.height - 0.5;
			card.style.setProperty('--tilt-x', `${horizontalProgress * 10}deg`);
			card.style.setProperty('--tilt-y', `${verticalProgress * -10}deg`);
		});

		card.addEventListener('pointerleave', () => {
			card.style.removeProperty('--tilt-x');
			card.style.removeProperty('--tilt-y');
		});
	});
}

if (!matchMedia('(prefers-reduced-motion: reduce)').matches) {
	const decodingGlyphs = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+-*/';
	const titleHeadings = document.querySelectorAll('main h1');

	titleHeadings.forEach((heading) => {
		const accessibleTitle = heading.innerText.replace(/\s+/g, ' ').trim();
		const walker = document.createTreeWalker(heading, NodeFilter.SHOW_TEXT);
		const textNodes = [];
		while (walker.nextNode()) textNodes.push(walker.currentNode);

		const letters = [];
		textNodes.forEach((textNode) => {
			const fragment = document.createDocumentFragment();
			Array.from(textNode.textContent).forEach((character) => {
				if (/\s/u.test(character)) {
					fragment.append(document.createTextNode(character));
					return;
				}

				const letter = document.createElement('span');
				letter.className = 'title-char';
				letter.setAttribute('aria-hidden', 'true');
				letter.textContent = character;
				fragment.append(letter);
				letters.push({ element: letter, character, lastStep: -1 });
			});
			textNode.replaceWith(fragment);
		});

		if (!letters.length) return;

		heading.setAttribute('aria-label', accessibleTitle);
		const animationStart = performance.now();
		const animateTitle = (time) => {
			let remaining = false;
			letters.forEach((letter, index) => {
				const elapsed = time - animationStart - index * 18;
				if (elapsed < 0) {
					remaining = true;
					return;
				}

				letter.element.classList.add('is-visible');
				const step = Math.floor(elapsed / 42);
				if (step < 8) {
					remaining = true;
					if (step !== letter.lastStep) {
						letter.lastStep = step;
						letter.element.textContent = decodingGlyphs[Math.floor(Math.random() * decodingGlyphs.length)];
					}
				} else {
					letter.element.textContent = letter.character;
				}
			});

			if (remaining) requestAnimationFrame(animateTitle);
		};

		requestAnimationFrame(animateTitle);
	});
}

