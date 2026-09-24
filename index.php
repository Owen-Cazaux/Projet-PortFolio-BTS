<?php
include __DIR__ . "/HTML-components/header.php";
?>

  <main>

    <section class="hero" id="accueil">
      <div class="wrap">
        <div>
          <h1 class="prenom">Owen<br>Cazaux</h1>
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
          <article class="project-card">
            <span class="year">2026</span>
            <h3>Portfolio personnel</h3>
            <p>Une vitrine web personnelle pour présenter mon profil, mes compétences et mes projets.</p>
            <div class="tags">
              <span>HTML</span>
              <span>CSS</span>
              <span>PHP</span>
            </div>
          </article>

          <article class="project-card">
            <span class="year">2026</span>
            <h3>Application de gestion</h3>
            <p>Une interface de gestion simple pour organiser des tâches, clients ou contenus avec une logique claire.</p>
            <div class="tags">
              <span>PHP</span>
              <span>SQL</span>
              <span>UI</span>
            </div>
          </article>

          <article class="project-card">
            <span class="year">2025</span>
            <h3>Site vitrine</h3>
            <p>Un site marketing axé sur l’identification de marque, la lisibilité et la conversion.</p>
            <div class="tags">
              <span>HTML</span>
              <span>CSS</span>
              <span>JavaScript</span>
            </div>
          </article>
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
              <li>HTML / CSS</li>
              <li>JavaScript</li>
              <li>PHP</li>
            </ul>
          </div>
          <div>
            <h3>Données et outils</h3>
            <ul>
              <li>SQL / MySQL</li>
              <li>Git et GitHub</li>
              <li>[Autre outil]</li>
            </ul>
          </div>
          <div>
            <h3>Autres</h3>
            <ul>
              <li>Travail en équipe</li>
              <li>Gestion de projet</li>
              <li>Anglais technique</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php include __DIR__ . "/HTML-components/footer.php"; ?>

</body>
</html>
