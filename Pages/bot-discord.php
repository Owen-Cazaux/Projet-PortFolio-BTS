<?php include __DIR__ . "/../HTML-components/header.php"; ?>
<main class="project-detail">
	<section class="hero projects-hero project-detail-hero">
		<div class="wrap">
			<div>
				<p class="project-eyebrow">Bot Discord · 2026</p>
				<h1>Bot Discord</h1>
				<p class="lead">Des commandes pour faciliter l’attribution de rôles Discord à un grand nombre d’utilisateurs.</p>
				<div class="actions">
					<a class="btn btn-primary" href="MesProjets.php#portfolio">Tous mes projets</a>
					<a class="btn btn-secondary" href="../index.php">Accueil</a>
				</div>
			</div>

			<aside class="fiche" aria-labelledby="discord-fiche-titre">
				<h2 id="discord-fiche-titre">Fiche projet</h2>
				<dl>
					<div><dt>Type</dt><dd>Bot Discord</dd></div>
					<div><dt>Rôle</dt><dd>Création de commandes</dd></div>
					<div><dt>Technologies</dt><dd>Python · Discord.py</dd></div>
				</dl>
			</aside>
		</div>
	</section>

	<section class="project-story section">
		<div class="wrap project-story-grid">
			<div>
				<p class="project-eyebrow">Le projet</p>
				<h2>Gérer les rôles plus simplement</h2>
				<p>Le bot automatise l’assignation de rôles sur un serveur Discord, notamment lorsqu’il faut traiter de nombreux utilisateurs.</p>
			</div>
			<div class="project-contribution">
				<h2>Ce que j’ai fait</h2>
				<ul>
					<li>Création de commandes pour simplifier l’assignation de rôles.</li>
					<li>Développement du bot en Python avec Discord.py.</li>
					<li>À compléter : détail des commandes et de ma contribution exacte.</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="project-gallery-section section">
		<div class="wrap">
			<div class="project-section-heading">
				<p class="project-eyebrow">Aperçus</p>
				<h2>Le bot en images</h2>
			</div>
			<div class="project-gallery">
				<figure class="project-shot">
					<div class="project-shot__placeholder"><span>Capture 01</span><strong>Commandes du bot</strong></div>
					<!-- Remplacer le placeholder par : <img class="project-shot__image" src="../assets/images/projects/bot-discord/commandes.webp" alt="Commandes du bot Discord"> -->
					<figcaption>Commandes disponibles sur le serveur</figcaption>
				</figure>
				<figure class="project-shot">
					<div class="project-shot__placeholder"><span>Capture 02</span><strong>Attribution des rôles</strong></div>
					<!-- Remplacer le placeholder par : <img class="project-shot__image" src="../assets/images/projects/bot-discord/roles.webp" alt="Attribution de rôles avec le bot"> -->
					<figcaption>Exemple d’attribution de rôles</figcaption>
				</figure>
			</div>
		</div>
	</section>
</main>
<?php include __DIR__ . "/../HTML-components/footer.php"; ?>
</body>
</html>