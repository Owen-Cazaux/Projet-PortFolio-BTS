<?php
include __DIR__ . "/HTML-components/header.php";
?>

  <main>

    <section class="hero" id="accueil">
      <div class="wrap">
        <div>
          <h1>Owen<br>Cazaux</h1>
          <p class="lead">
            Étudiant en BTS SIO SLAM. Je conçois et je réalise des sites & applications web, et je présente ici mes projets.
          </p>
          <div class="actions">
            <a class="btn btn-primary" href="Pages/MesProjets.php">Voir mes projets</a>
            <a class="btn btn-secondary" href="Pages/Contact.php">Me contacter</a>
          </div>
        </div>

        <aside class="fiche" aria-labelledby="fiche-titre">
          <h2 id="fiche-titre">Mon profil</h2>
          <dl>
            <div><dt>Formation</dt><dd>BTS SIO SLAM, 2e année</dd></div>
            <div><dt>Établissement</dt><dd>institut d'informatique appliqué, Saint Berthevin</dd></div>
            <div><dt>Recherche</dt><dd>Alternance à partir de Septembre 2027</dd></div>
            <div><dt>Session</dt><dd>Examen 2027</dd></div>
          </dl>
        </aside>
      </div>
    </section>

    <section class="section" id="projets">
      <div class="wrap">
        <div class="section-head">
          <h2>Projets</h2>
          <a class="text-link" href="Pages/MesProjets.php">Voir tous les projets</a>
        </div>

        <div class="projects-grid">
          <a class="project-card" href="Pages/portfolio-personnel.php">
            <span class="year">2026</span>
            <h3>Portfolio personnel</h3>
            <p>Une vitrine web personnelle pour présenter mon profil, mes compétences et mes projets.</p>
            <div class="tags"><span>HTML</span><span>CSS</span><span>JS</span><span>PHP</span></div>
          </a>

          <a class="project-card" href="Pages/bot-discord.php">
            <span class="year">2026</span>
            <h3>Bot discord</h3>
            <p>Création de commandes dans le but de facilité l'assignation de rôles discord à de grand nombre d'utilisateur.</p>
            <div class="tags"><span>Python</span><span>Discord.py</span></div>
          </a>

          <a class="project-card" href="Pages/refonte-ui-ux.php">
            <span class="year">2026</span>
            <h3>Refonte UI/UX</h3>
            <p>Dashboard unique et d'un projet interne d'entreprise</p>
            <div class="tags"><span>Symfony</span><span>Vue</span><span>Tailwind/CSS</span><span>Twig</span></div>
          </a>
        </div>
      </div>
    </section>

    <section class="section" id="competences">
      <div class="wrap">
        <div class="section-head">
          <h2>Compétences</h2>
        </div>

        <div class="skills">
          <div>
            <h3>Développement</h3>
            <ul>
              <li>Tailwind-css</li>
              <li>JavaScript</li>
              <li>PHP Symphony</li>
            </ul>
          </div>
          <div>
            <h3>Données et outils</h3>
            <ul>
              <li>SQL / MySQL</li>
              <li>Git et GitHub</li>
              <li></li>
            </ul>
          </div>
          <div>
            <h3>Autres</h3>
            <ul>
              <li>Travail en équipe</li>
              <li>Gestion de projet</li>
              <li>UI/UX via Figma</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="contact">
      <div class="wrap">
        <div class="section-head">
          <h2>Contact</h2>
        </div>
        <div class="contact-box">
          <a class="contact-mail" href="mailto:owen.cazaux2@gmail.com">owen.cazaux2@gmail.com</a>
          <p>Disponible pour un stage ou une alternance</p>
        </div>
      </div>
    </section>

  </main>

  <?php include __DIR__ . "/HTML-components/footer.php"; ?>

</body>
</html>
