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
				<a class="project-card" href="portfolio-personnel.php">
					<span class="year">2026</span>
					<h3>Portfolio personnel</h3>
					<p>Une vitrine web personnelle pour présenter mon profil, mes compétences et mes projets.</p>
					<div class="tags"><span class="tech-tag"><i class="devicon-html5-plain colored" aria-hidden="true"></i><span>HTML</span></span><span class="tech-tag"><i class="devicon-css3-plain colored" aria-hidden="true"></i><span>CSS</span></span><span class="tech-tag"><i class="devicon-javascript-plain colored" aria-hidden="true"></i><span>JS</span></span><span class="tech-tag"><i class="devicon-php-plain colored" aria-hidden="true"></i><span>PHP</span></span></div>
				</a>
				<a class="project-card" href="bot-discord.php">
					<span class="year">2026</span>
					<h3>Bot discord</h3>
					<p>Création de commandes dans le but de facilité l'assignation de rôles discord à de grand nombre d'utilisateur.</p>
					<div class="tags"><span class="tech-tag"><i class="devicon-python-plain colored" aria-hidden="true"></i><span>Python</span></span><span class="tech-tag"><i class="devicon-python-plain colored" aria-hidden="true"></i><span>Discord.py</span></span></div>
				</a>
				<a class="project-card" href="refonte-ui-ux.php">
					<span class="year">2026</span>
					<h3>Refonte UI/UX</h3>
					<p>Dashboard unique et d'un projet interne d'entreprise</p>
					<div class="tags"><span class="tech-tag"><i class="devicon-symfony-original colored" aria-hidden="true"></i><span>Symfony</span></span><span class="tech-tag"><i class="devicon-vuejs-plain colored" aria-hidden="true"></i><span>Vue</span></span><span class="tech-tag"><i class="devicon-tailwindcss-plain colored" aria-hidden="true"></i><span>Tailwind/CSS</span></span><span class="tech-tag"><img src="https://cdn.simpleicons.org/twig/8BC34A" alt="" aria-hidden="true"><span>Twig</span></span></div>
				</a>
			</div>
		</div>
	</section>
</main>

<?php include __DIR__ . "/../HTML-components/footer.php"; ?>
</body>
</html>
