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
            <div class="tags"><span class="tech-tag"><i class="devicon-html5-plain colored" aria-hidden="true"></i><span>HTML</span></span><span class="tech-tag"><i class="devicon-css3-plain colored" aria-hidden="true"></i><span>CSS</span></span><span class="tech-tag"><i class="devicon-javascript-plain colored" aria-hidden="true"></i><span>JS</span></span><span class="tech-tag"><i class="devicon-php-plain colored" aria-hidden="true"></i><span>PHP</span></span></div>
          </a>

          <a class="project-card" href="Pages/bot-discord.php">
            <span class="year">2026</span>
            <h3>Bot discord</h3>
            <p>Création de commandes dans le but de facilité l'assignation de rôles discord à de grand nombre d'utilisateur.</p>
            <div class="tags"><span class="tech-tag"><i class="devicon-python-plain colored" aria-hidden="true"></i><span>Python</span></span><span class="tech-tag"><i class="devicon-python-plain colored" aria-hidden="true"></i><span>Discord.py</span></span></div>
          </a>

          <a class="project-card" href="Pages/refonte-ui-ux.php">
            <span class="year">2026</span>
            <h3>Refonte UI/UX</h3>
            <p>Dashboard unique et d'un projet interne d'entreprise</p>
            <div class="tags"><span class="tech-tag"><i class="devicon-symfony-original colored" aria-hidden="true"></i><span>Symfony</span></span><span class="tech-tag"><i class="devicon-vuejs-plain colored" aria-hidden="true"></i><span>Vue</span></span><span class="tech-tag"><i class="devicon-tailwindcss-plain colored" aria-hidden="true"></i><span>Tailwind/CSS</span></span><span class="tech-tag"><img src="https://cdn.simpleicons.org/twig/8BC34A" alt="" aria-hidden="true"><span>Twig</span></span></div>
          </a>
        </div>
      </div>
    </section>

    <section class="section skills-section" id="competences">
      <div class="wrap">
        <div class="skills-heading">
          <div>
            <p class="skills-kicker">MON TERRAIN DE JEU</p>
            <h2>Compétences</h2>
          </div>
          <p class="skills-heading-note">Du code à la conception,<br>les outils que j’utilise au quotidien.</p>
        </div>

        <div class="skills-explorer" data-skill-tabs>
          <div class="skills-tabs" role="tablist" aria-label="Domaines de compétences" aria-orientation="vertical">
            <button class="skills-tab" id="skills-tab-dev" type="button" role="tab" aria-controls="skills-panel-dev" aria-selected="true" tabindex="0">
              <span class="skills-tab-number">01</span><span class="skills-tab-copy"><span>Développement</span><small>03 compétences</small></span><span class="skills-tab-arrow" aria-hidden="true">↗</span>
            </button>
            <button class="skills-tab" id="skills-tab-data" type="button" role="tab" aria-controls="skills-panel-data" aria-selected="false" tabindex="-1">
              <span class="skills-tab-number">02</span><span class="skills-tab-copy"><span>Données &amp; outils</span><small>02 compétences</small></span><span class="skills-tab-arrow" aria-hidden="true">↗</span>
            </button>
            <button class="skills-tab" id="skills-tab-other" type="button" role="tab" aria-controls="skills-panel-other" aria-selected="false" tabindex="-1">
              <span class="skills-tab-number">03</span><span class="skills-tab-copy"><span>Autres</span><small>03 compétences</small></span><span class="skills-tab-arrow" aria-hidden="true">↗</span>
            </button>
          </div>

          <div class="skills-display">
            <div class="skills-panel" id="skills-panel-dev" role="tabpanel" aria-labelledby="skills-tab-dev" tabindex="0">
              <div class="skills-panel-heading"><p>01 <span>/</span> DÉVELOPPEMENT</p><h3>Construire pour le web.</h3></div>
              <div class="skills-cloud">
                <button class="skill-tile skill-tile--signal" type="button" aria-label="Voir un exemple Tailwind CSS" aria-expanded="false" data-skill="Tailwind CSS" data-code-style="tailwind">
                  <span class="skill-tile-inner">
                    <span class="skill-tile-face skill-tile-front" aria-hidden="false"><span class="skill-tile-number">01</span><span class="skill-tile-name">Tailwind CSS</span><span class="skill-tile-mark" aria-hidden="true">✳</span><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                    <span class="skill-tile-face skill-tile-back" aria-hidden="true"><span class="skill-back-label">EXEMPLE · TAILWIND</span><code class="skill-code"><span class="code-line"><span class="code-key">&lt;button</span></span><span class="code-line code-indent">class="<span class="code-value">flex items-center</span></span><span class="code-line code-indent"><span class="code-value">gap-4 rounded-xl</span></span><span class="code-line code-indent"><span class="code-value">bg-slate-900 px-5</span></span><span class="code-line code-indent"><span class="code-value">py-3 text-white</span>"</span><span class="code-line"><span class="code-key">&gt;Envoyer&lt;/button&gt;</span></span></code><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                  </span>
                </button>
                <button class="skill-tile skill-tile--rose" type="button" aria-label="Voir un exemple JavaScript" aria-expanded="false" data-skill="JavaScript" data-code-style="javascript">
                  <span class="skill-tile-inner">
                    <span class="skill-tile-face skill-tile-front" aria-hidden="false"><span class="skill-tile-number">02</span><span class="skill-tile-name">JavaScript</span><span class="skill-tile-mark" aria-hidden="true">{ }</span><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                    <span class="skill-tile-face skill-tile-back" aria-hidden="true"><span class="skill-back-label">EXEMPLE · JAVASCRIPT</span><code class="skill-code"><span class="code-line"><span class="code-key">const</span> projets = document</span><span class="code-line code-indent">.querySelectorAll(<span class="code-value">'.projet'</span>);</span><span class="code-line"><span class="code-key">projets.forEach</span>((projet) =&gt; {</span><span class="code-line code-indent">projet.classList.add(</span><span class="code-line code-indent"><span class="code-value">'actif'</span>);</span><span class="code-line">});</span></code><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                  </span>
                </button>
                <button class="skill-tile skill-tile--blue" type="button" aria-label="Voir un exemple PHP et Symfony" aria-expanded="false" data-skill="PHP / Symfony" data-code-style="symfony">
                  <span class="skill-tile-inner">
                    <span class="skill-tile-face skill-tile-front" aria-hidden="false"><span class="skill-tile-number">03</span><span class="skill-tile-name">PHP / Symfony</span><span class="skill-tile-mark" aria-hidden="true">&lt;/&gt;</span><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                    <span class="skill-tile-face skill-tile-back" aria-hidden="true"><span class="skill-back-label">EXEMPLE · SYMFONY</span><code class="skill-code"><span class="code-line"><span class="code-key">#[Route('/projets')]</span></span><span class="code-line"><span class="code-key">public function</span> index(): Response</span><span class="code-line">{</span><span class="code-line code-indent">$projets = $repo-&gt;findAll();</span><span class="code-line code-indent"><span class="code-key">return</span> $this-&gt;render(</span><span class="code-line code-indent"><span class="code-value">'projet/index.html.twig'</span>);</span><span class="code-line">}</span></code><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                  </span>
                </button>
              </div>
            </div>

            <div class="skills-panel" id="skills-panel-data" role="tabpanel" aria-labelledby="skills-tab-data" tabindex="0" hidden>
              <div class="skills-panel-heading"><p>02 <span>/</span> DONNÉES &amp; OUTILS</p><h3>Organiser l’essentiel.</h3></div>
              <div class="skills-cloud skills-cloud--two">
                <button class="skill-tile skill-tile--blue" type="button" aria-label="Voir un exemple SQL et MySQL" aria-expanded="false" data-skill="SQL / MySQL" data-code-style="sql">
                  <span class="skill-tile-inner">
                    <span class="skill-tile-face skill-tile-front" aria-hidden="false"><span class="skill-tile-number">01</span><span class="skill-tile-name">SQL / MySQL</span><span class="skill-tile-mark" aria-hidden="true">⌘</span><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                    <span class="skill-tile-face skill-tile-back" aria-hidden="true"><span class="skill-back-label">EXEMPLE · SQL</span><code class="skill-code"><span class="code-line"><span class="code-key">SELECT</span> nom, date_creation</span><span class="code-line"><span class="code-key">FROM</span> projets</span><span class="code-line"><span class="code-key">WHERE</span> publie = <span class="code-value">1</span></span><span class="code-line"><span class="code-key">ORDER BY</span> date_creation</span><span class="code-line code-indent"><span class="code-value">DESC</span> <span class="code-key">LIMIT</span> 6;</span></code><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                  </span>
                </button>
                <button class="skill-tile skill-tile--signal" type="button" aria-label="Voir un exemple Git et GitHub" aria-expanded="false" data-skill="Git & GitHub" data-code-style="git">
                  <span class="skill-tile-inner">
                    <span class="skill-tile-face skill-tile-front" aria-hidden="false"><span class="skill-tile-number">02</span><span class="skill-tile-name">Git &amp; GitHub</span><span class="skill-tile-mark" aria-hidden="true">⑂</span><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                    <span class="skill-tile-face skill-tile-back" aria-hidden="true"><span class="skill-back-label">EXEMPLE · GIT</span><code class="skill-code"><span class="code-line">$ git status</span><span class="code-line">$ git add src/</span><span class="code-line"><span class="code-key">$ git commit</span> -m</span><span class="code-line code-indent"><span class="code-value">"feat: nouvelle page"</span></span><span class="code-line">$ git push origin main</span></code><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                  </span>
                </button>
              </div>
            </div>

            <div class="skills-panel" id="skills-panel-other" role="tabpanel" aria-labelledby="skills-tab-other" tabindex="0" hidden>
              <div class="skills-panel-heading"><p>03 <span>/</span> AUTRES</p><h3>Faire avancer les idées.</h3></div>
              <div class="skills-cloud">
                <button class="skill-tile skill-tile--rose" type="button" aria-label="Voir un exemple de travail en équipe" aria-expanded="false" data-skill="Travail en équipe" data-code-style="team">
                  <span class="skill-tile-inner">
                    <span class="skill-tile-face skill-tile-front" aria-hidden="false"><span class="skill-tile-number">01</span><span class="skill-tile-name">Travail en équipe</span><span class="skill-tile-mark" aria-hidden="true">＋</span><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                    <span class="skill-tile-face skill-tile-back" aria-hidden="true"><span class="skill-back-label">EN ÉQUIPE</span><code class="skill-code"><span class="code-line"><span class="code-key">01</span> · Écouter les besoins</span><span class="code-line"><span class="code-key">02</span> · Partager les idées</span><span class="code-line"><span class="code-key">03</span> · Répartir les tâches</span><span class="code-line"><span class="code-key">04</span> · Construire ensemble</span></code><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                  </span>
                </button>
                <button class="skill-tile skill-tile--blue" type="button" aria-label="Voir un exemple de gestion de projet" aria-expanded="false" data-skill="Gestion de projet" data-code-style="project">
                  <span class="skill-tile-inner">
                    <span class="skill-tile-face skill-tile-front" aria-hidden="false"><span class="skill-tile-number">02</span><span class="skill-tile-name">Gestion de projet</span><span class="skill-tile-mark" aria-hidden="true">↗</span><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                    <span class="skill-tile-face skill-tile-back" aria-hidden="true"><span class="skill-back-label">CYCLE DE PROJET</span><code class="skill-code"><span class="code-line"><span class="code-key">01</span> · À faire</span><span class="code-line">↓</span><span class="code-line">En cours</span><span class="code-line">↓</span><span class="code-line"><span class="code-value">Relecture · Terminé</span></span></code><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                  </span>
                </button>
                <button class="skill-tile skill-tile--signal" type="button" aria-label="Voir un exemple UI/UX et Figma" aria-expanded="false" data-skill="UI/UX via Figma" data-code-style="ux">
                  <span class="skill-tile-inner">
                    <span class="skill-tile-face skill-tile-front" aria-hidden="false"><span class="skill-tile-number">03</span><span class="skill-tile-name">UI/UX via Figma</span><span class="skill-tile-mark" aria-hidden="true">◒</span><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                    <span class="skill-tile-face skill-tile-back" aria-hidden="true"><span class="skill-back-label">DE L’IDÉE AU TEST</span><code class="skill-code"><span class="code-line"><span class="code-key">01</span> · Comprendre le besoin</span><span class="code-line">02 · Esquisser l’interface</span><span class="code-line"><span class="code-key">03</span> · Prototyper</span><span class="code-line"><span class="code-value">04 · Tester &amp; ajuster</span></span></code><span class="skill-flip-hint" aria-hidden="true">↻</span></span>
                  </span>
                </button>
              </div>
            </div>
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
