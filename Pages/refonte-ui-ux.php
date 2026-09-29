<?php include __DIR__ . "/../HTML-components/header.php"; ?>
<main class="project-detail">
	<section class="hero projects-hero project-detail-hero">
		<div class="wrap">
			<div>
				<p class="project-eyebrow">Projet interne · 2026</p>
				<h1>Refonte UI/UX</h1>
				<p class="lead">Refonte de l’interface d’un dashboard dédié à un projet interne d’entreprise.</p>
				<div class="actions">
					<a class="btn btn-primary" href="MesProjets.php#portfolio">Tous mes projets</a>
					<a class="btn btn-secondary" href="../index.php">Accueil</a>
				</div>
			</div>

			<aside class="fiche" aria-labelledby="refonte-fiche-titre">
				<h2 id="refonte-fiche-titre">Fiche projet</h2>
				<dl>
					<div><dt>Type</dt><dd>Dashboard interne</dd></div>
					<div><dt>Rôle</dt><dd>Refonte UI/UX</dd></div>
					<div><dt>Technologies</dt><dd>Symfony · Vue · Tailwind/CSS · Twig</dd></div>
				</dl>
			</aside>
		</div>
	</section>

	<section class="project-story section">
		<div class="wrap project-story-grid">
			<div>
				<p class="project-eyebrow">Le projet</p>
				<h2>Un dashboard pour un besoin interne</h2>
				<p>Le projet consiste à concevoir une interface de dashboard unique pour un outil interne d’entreprise.</p>
			</div>
			<div class="project-contribution">
				<h2>Ce que j’ai fait</h2>
				<ul>
					<li>Participation à la refonte de l’interface et de l’expérience utilisateur.</li>
					<li>Travail autour d’un dashboard construit avec Symfony, Vue, Tailwind/CSS et Twig.</li>
					<li>À compléter : écrans réalisés, choix d’interface et contribution exacte.</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="project-gallery-section section">
		<div class="wrap">
			<div class="project-section-heading">
				<p class="project-eyebrow">Aperçus</p>
				<h2>Le dashboard en images</h2>
			</div>
			<div class="project-gallery">
				<figure class="project-shot">
					<div class="project-shot__placeholder"><span>Capture 01</span><strong>Vue d’ensemble</strong></div>
					<!-- Remplacer le placeholder par : <img class="project-shot__image" src="../assets/images/projects/refonte-ui-ux/dashboard.webp" alt="Vue d’ensemble du dashboard"> -->
					<figcaption>Vue d’ensemble du dashboard</figcaption>
				</figure>
				<figure class="project-shot">
					<div class="project-shot__placeholder"><span>Capture 02</span><strong>Écran détaillé</strong></div>
					<!-- Remplacer le placeholder par : <img class="project-shot__image" src="../assets/images/projects/refonte-ui-ux/ecran-detail.webp" alt="Écran détaillé du dashboard"> -->
					<figcaption>Écran ou fonctionnalité à présenter</figcaption>
				</figure>
			</div>
		</div>
	</section>
</main>
<?php include __DIR__ . "/../HTML-components/footer.php"; ?>
</body>
</html>