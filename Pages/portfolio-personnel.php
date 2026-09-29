<?php include __DIR__ . "/../HTML-components/header.php"; ?>
<main class="project-detail">
	<section class="hero projects-hero project-detail-hero">
		<div class="wrap">
			<div>
				<p class="project-eyebrow">Projet personnel · 2026</p>
				<h1>Portfolio personnel</h1>
				<p class="lead">Une vitrine web pour présenter mon profil, mes compétences et mes projets.</p>
				<div class="actions">
					<a class="btn btn-primary" href="MesProjets.php#portfolio">Tous mes projets</a>
					<a class="btn btn-secondary" href="../index.php">Accueil</a>
				</div>
			</div>

			<aside class="fiche" aria-labelledby="portfolio-fiche-titre">
				<h2 id="portfolio-fiche-titre">Fiche projet</h2>
				<dl>
					<div><dt>Type</dt><dd>Site portfolio</dd></div>
					<div><dt>Rôle</dt><dd>Conception et développement</dd></div>
					<div><dt>Technologies</dt><dd>HTML · CSS · JavaScript · PHP</dd></div>
				</dl>
			</aside>
		</div>
	</section>

	<section class="project-story section">
		<div class="wrap project-story-grid">
			<div>
				<p class="project-eyebrow">Le projet</p>
				<h2>Une présentation de mon parcours</h2>
				<p>Ce site rassemble mon profil, mes compétences et une sélection de projets dans une interface personnelle et responsive.</p>
			</div>
			<div class="project-contribution">
				<h2>Ce que j’ai fait</h2>
				<ul>
					<li>Création des pages d’accueil, de projets et de contact.</li>
					<li>Intégration de l’interface avec HTML, CSS, JavaScript et PHP.</li>
					<li>Ajout des interactions de thème et de dessin au pinceau.</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="project-gallery-section section">
		<div class="wrap">
			<div class="project-section-heading">
				<p class="project-eyebrow">Aperçus</p>
				<h2>Le portfolio en images</h2>
			</div>
			<div class="project-gallery">
				<figure class="project-shot">
					<div class="project-shot__placeholder"><span>Capture 01</span><strong>Page d’accueil</strong></div>
					<!-- Remplacer le placeholder par : <img class="project-shot__image" src="../assets/images/projects/portfolio-personnel/accueil.webp" alt="Page d’accueil du portfolio"> -->
					<figcaption>Page d’accueil et présentation du profil</figcaption>
				</figure>
				<figure class="project-shot">
					<div class="project-shot__placeholder"><span>Capture 02</span><strong>Projets et navigation</strong></div>
					<!-- Remplacer le placeholder par : <img class="project-shot__image" src="../assets/images/projects/portfolio-personnel/projets.webp" alt="Liste des projets du portfolio"> -->
					<figcaption>Liste des projets et navigation du site</figcaption>
				</figure>
			</div>
		</div>
	</section>
</main>
<?php include __DIR__ . "/../HTML-components/footer.php"; ?>
</body>
</html>