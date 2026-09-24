<?php

require __DIR__ . "/HTML-components/header.php";

?>

  <main>

    <!-- ============ ACCUEIL ============ -->
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
            <div><dt>Formation</dt><dd>BTS [intitulé], 2e année</dd></div>
            <div><dt>Établissement</dt><dd>[Nom du lycée], [Ville]</dd></div>
            <div><dt>Recherche</dt><dd>Stage / alternance à partir de [mois année]</dd></div>
            <div><dt>Session</dt><dd>Examen 2027</dd></div>
          </dl>
        </aside>
      </div>
    </section>

    <!-- ============ PROJETS (aperçu) ============ -->
    <section class="section" id="projets">
      <div class="wrap">
        <div class="section-head">
          <h2>Projets</h2>
          <a class="text-link" href="projets.html">Tous les projets</a>
        </div>

        <ul class="projects">
          <li class="project">
            <a href="projet-1.html">
              <span class="year">2026</span>
              <span>
                <h3>Titre du projet 1</h3>
                <p>Une phrase pour dire ce que fait le projet et à quoi il sert.</p>
              </span>
              <span class="tags">HTML, CSS, JavaScript</span>
            </a>
          </li>
          <li class="project">
            <a href="projet-2.html">
              <span class="year">2026</span>
              <span>
                <h3>Titre du projet 2</h3>
                <p>Une phrase pour dire ce que fait le projet et à quoi il sert.</p>
              </span>
              <span class="tags">PHP, MySQL</span>
            </a>
          </li>
          <li class="project">
            <a href="projet-3.html">
              <span class="year">2025</span>
              <span>
                <h3>Titre du projet 3</h3>
                <p>Une phrase pour dire ce que fait le projet et à quoi il sert.</p>
              </span>
              <span class="tags">Python</span>
            </a>
          </li>
        </ul>
      </div>
    </section>

    <!-- ============ COMPÉTENCES ============ -->
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

    <!-- ============ CONTACT (aperçu) ============ -->
    <section class="section" id="contact">
      <div class="wrap">
        <div class="section-head">
          <h2>Un message ?</h2>
        </div>
        <a class="contact-mail" href="mailto:">owen.cazaux2@gmail.com</a>
      </div>
    </section>

  </main>

  <footer class="site-footer">
    <div class="wrap">
      <span>© 2026 Owen Cazaux</span>
      <span><a href="#">LinkedIn</a> · <a href="#">GitHub</a></span>
    </div>
  </footer>

</body>
</html>
