<?php require __DIR__ . "/../HTML-components/header.php"; ?>

<main>
  <section class="hero">
    <div class="wrap">
      <div>
        <h1>Parlons de votre projet</h1>
        <p class="lead">
          Je suis actuellement à la recherche de nouvelles opportunités pour développer des sites et des applications web utiles, lisibles et bien pensés.
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

      <form action="mailto:owen.cazaux2@gmail.com" method="post" enctype="text/plain" class="contact-form" style="max-width: 760px; display: grid; gap: 1rem;">
        <label style="display: grid; gap: 0.5rem; font-weight: 600;">
          Nom
          <input type="text" name="nom" placeholder="Votre nom" style="padding: 0.9rem 1rem; border: 1px solid #d3e2f2; border-radius: 12px; font: inherit; background: #fff;">
        </label>

        <label style="display: grid; gap: 0.5rem; font-weight: 600;">
          Email
          <input type="email" name="email" placeholder="votre@email.fr" style="padding: 0.9rem 1rem; border: 1px solid #d3e2f2; border-radius: 12px; font: inherit; background: #fff;">
        </label>

        <label style="display: grid; gap: 0.5rem; font-weight: 600;">
          Message
          <textarea name="message" rows="6" placeholder="Décrivez votre projet ou votre demande..." style="padding: 0.9rem 1rem; border: 1px solid #d3e2f2; border-radius: 12px; font: inherit; min-height: 160px; resize: vertical; background: #fff;"></textarea>
        </label>

        <button type="submit" class="btn btn-primary" style="width: fit-content; cursor: pointer;">Envoyer</button>
      </form>
    </div>
  </section>
</main>

<?php require __DIR__ . "/../HTML-components/footer.php"; ?>
