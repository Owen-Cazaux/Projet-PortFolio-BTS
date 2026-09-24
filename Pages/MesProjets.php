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

			<div class="projects-grid">
				<article class="project-card">
					<span class="year">2026</span>
					<h3>Portfolio personnel</h3>
					<p>Une vitrine web personnelle pour présenter mon profil, mes compétences et mes projets.</p>
					<div class="tags"><span>HTML</span><span>CSS</span><span>PHP</span></div>
				</article>
				<article class="project-card">
					<span class="year">2026</span>
					<h3>Application de gestion</h3>
					<p>Une interface de gestion simple pour organiser des tâches, clients ou contenus.</p>
					<div class="tags"><span>PHP</span><span>SQL</span><span>UI</span></div>
				</article>
				<article class="project-card">
					<span class="year">2025</span>
					<h3>Site vitrine</h3>
					<p>Un site marketing axé sur l'identité de marque, la lisibilité et la conversion.</p>
					<div class="tags"><span>HTML</span><span>CSS</span><span>JavaScript</span></div>
				</article>
				<article class="project-card">
					<span class="year">2025</span>
					<h3>Projet de données</h3>
					<p>Un projet centré sur la collecte et la mise en forme d'informations.</p>
					<div class="tags"><span>Tableau</span><span>Analyse</span><span>UX</span></div>
				</article>
			</div>
		</div>
	</section>
</main>

<?php include __DIR__ . "/../HTML-components/footer.php"; ?>
</body>
</html>
