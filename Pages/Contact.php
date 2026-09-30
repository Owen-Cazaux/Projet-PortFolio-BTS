<?php
$cvAbsolutePath = __DIR__ . '/../assets/cv-owen-cazaux.pdf';
include __DIR__ . "/../HTML-components/header.php";
?>

<main>
	<section class="hero">
		<div class="wrap">
			<div>
				<h1>Parlons de votre projet</h1>
				<p class="lead">
					Je suis à la recherche de nouvelles opportunités pour développer des sites et applications web utiles, lisibles et bien pensés.
				</p>
				<div class="actions">
					<a class="btn btn-primary" href="mailto:owen.cazaux2@gmail.com">Me contacter</a>
					<a class="btn btn-secondary" href="../index.php">Retour à l'accueil</a>
				</div>
			</div>

			<aside class="fiche" aria-labelledby="contact-titre">
				<h2 id="contact-titre">Mes coordonnées</h2>
				<dl>
					<div><dt>Email</dt><dd>owen.cazaux2@gmail.com</dd></div>
					<div><dt>Disponibilité</dt><dd>Stage / alternance</dd></div>
					<div><dt>Localisation</dt><dd>France</dd></div>
					<div><dt>Réseaux</dt><dd>GitHub · LinkedIn</dd></div>
				</dl>
			</aside>
		</div>
	</section>

	<section class="section" id="contact">
		<div class="wrap">
			<div class="section-head">
				<h2>Un message ?</h2>
			</div>
			<div class="contact-layout">
				<form class="contact-form" action="mailto:owen.cazaux2@gmail.com" method="post" enctype="text/plain" data-contact-form>
					<div class="contact-form-fields">
						<div class="contact-field">
							<label for="contact-name">Nom</label>
							<input id="contact-name" name="name" type="text" autocomplete="name" maxlength="100" required>
						</div>
						<div class="contact-field">
							<label for="contact-email">E-mail</label>
							<input id="contact-email" name="email" type="email" autocomplete="email" maxlength="254" required>
						</div>
						<div class="contact-field contact-field--full">
							<label for="contact-subject">Sujet</label>
							<select id="contact-subject" name="subject" required>
								<option value="" disabled selected>Choisir un sujet</option>
								<option>Stage</option>
								<option>Alternance</option>
								<option>Projet web</option>
								<option>Autre</option>
							</select>
						</div>
						<div class="contact-field contact-field--full">
							<label for="contact-message">Message</label>
							<textarea id="contact-message" name="message" rows="6" maxlength="5000" required></textarea>
						</div>
					</div>
					<div class="contact-form-footer">
						<p data-contact-status aria-live="polite">Le message sera préparé dans votre application e-mail.</p>
						<button class="btn btn-primary" type="submit">Envoyer le message <span aria-hidden="true">↗</span></button>
					</div>
				</form>

				<aside class="contact-cv" aria-labelledby="contact-cv-title">
					<p class="contact-cv-label">DOCUMENT · PDF</p>
					<h3 id="contact-cv-title">Mon CV</h3>
					<p>Retrouvez mon parcours, mes compétences et mes projets dans un document à télécharger.</p>
					<?php if (is_file($cvAbsolutePath)): ?>
						<a class="contact-cv-download" href="../assets/cv-owen-cazaux.pdf" download>
							<span aria-hidden="true">↓</span> Télécharger le CV
						</a>
					<?php else: ?>
						<p class="contact-cv-unavailable">Le PDF du CV n’est pas encore disponible.</p>
					<?php endif; ?>
				</aside>
			</div>
		</div>
	</section>
</main>

<?php include __DIR__ . "/../HTML-components/footer.php"; ?>
</body>
</html>
