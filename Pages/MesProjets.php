<?php include __DIR__ . "/../HTML-components/header.php"; ?>

<main class="projects-page">
	<section class="hero projects-hero">
		<div class="wrap">
			<div>
				<h1>Mes projets</h1>
				<p class="lead">
					Voici quelques réalisations qui illustrent mon travail, mes compétences et ma manière de concevoir des solutions web utiles et lisibles.
				</p>
				<div class="actions">
					<a class="btn btn-primary" href="Contact.php">Me contacter</a>
					<a class="btn btn-secondary" href="../index.php">Retour à l'accueil</a>
				</div>
			</div>

			<aside class="fiche" aria-labelledby="projets-fiche-titre">
				<h2 id="projets-fiche-titre">Mon approche</h2>
				<dl>
					<div><dt>Type</dt><dd>Sites web · applications</dd></div>
					<div><dt>Objectif</dt><dd>Expérience claire et fonctionnelle</dd></div>
					<div><dt>Stack</dt><dd>HTML · CSS · PHP · JS</dd></div>
					<div><dt>Style</dt><dd>Moderne et épuré</dd></div>
				</dl>
			</aside>
		</div>
	</section>

	<section class="section" id="portfolio">
		<div class="wrap">
			<div class="section-head">
				<h2>Portfolio</h2>
			</div>

			<div class="project-filters" data-project-filters>
				<div class="project-filter-combobox">
					<label class="visually-hidden" for="project-technology-search">Filtrer les projets par technologie</label>
					<div class="project-filter-control">
						<input id="project-technology-search" type="search" placeholder="Chercher une technologie…" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" aria-expanded="false" aria-controls="project-technology-options" data-project-technology-search>
						<button class="project-filter-toggle" type="button" aria-label="Afficher les technologies" aria-expanded="false" aria-controls="project-technology-options" data-project-toggle>⌄</button>
						<button class="project-filter-reset" type="button" aria-label="Effacer le filtre" title="Effacer le filtre" data-project-reset hidden>×</button>
					</div>
					<div class="project-filter-options" id="project-technology-options" role="listbox" aria-label="Technologies disponibles" data-project-options hidden></div>
				</div>
				<p class="project-filter-status" data-project-status aria-live="polite">3 projets</p>
				<p class="project-filter-empty" data-project-empty hidden>Aucun projet ne correspond à cette technologie.</p>
			</div>

			<div class="projects-grid" data-project-list>
				<a class="project-card" href="portfolio-personnel.php">
					<span class="year">2026</span>
					<h3>Portfolio personnel</h3>
					<p>Une vitrine web personnelle pour présenter mon profil, mes compétences et mes projets.</p>
					<div class="tags"><span class="tech-tag"><i class="devicon-html5-plain colored" aria-hidden="true"></i><span>HTML</span></span><span class="tech-tag"><i class="devicon-css3-plain colored" aria-hidden="true"></i><span>CSS</span></span><span class="tech-tag"><i class="devicon-javascript-plain colored" aria-hidden="true"></i><span>JS</span></span><span class="tech-tag"><i class="devicon-php-plain colored" aria-hidden="true"></i><span>PHP</span></span></div>
				</a>
				<a class="project-card" href="bot-discord.php">
					<span class="year">2026</span>
					<h3>Bot discord</h3>
					<p>Création de commandes pour faciliter l’attribution de rôles Discord à un grand nombre d’utilisateurs.</p>
					<div class="tags"><span class="tech-tag"><i class="devicon-python-plain colored" aria-hidden="true"></i><span>Python</span></span><span class="tech-tag"><i class="devicon-python-plain colored" aria-hidden="true"></i><span>Discord.py</span></span></div>
				</a>
				<a class="project-card" href="refonte-ui-ux.php">
					<span class="year">2026</span>
					<h3>Refonte UI/UX</h3>
					<p>Refonte d’un dashboard pour un projet interne d’entreprise.</p>
					<div class="tags"><span class="tech-tag"><i class="devicon-symfony-original colored" aria-hidden="true"></i><span>Symfony</span></span><span class="tech-tag"><i class="devicon-vuejs-plain colored" aria-hidden="true"></i><span>Vue</span></span><span class="tech-tag"><i class="devicon-tailwindcss-plain colored" aria-hidden="true"></i><span>Tailwind/CSS</span></span><span class="tech-tag"><img src="../assets/images/twig-1-3509747330.png" alt="" aria-hidden="true"><span>Twig</span></span></div>
				</a>
			</div>
		</div>
	</section>
</main>

<?php include __DIR__ . "/../HTML-components/footer.php"; ?>
</body>
</html>
