<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owen Cazaux – Portfolio BTS</title>
  <meta name="description" content="Portfolio de Owen Cazaux, étudiant en BTS SIO SLAM.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&family=Figtree:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const links = document.querySelectorAll('.nav a');
      const sections = [...document.querySelectorAll('main section[id]')];

      const setActiveLink = () => {
        const scrollY = window.scrollY + 180;
        let currentId = 'accueil';

        for (const section of sections) {
          if (scrollY >= section.offsetTop) {
            currentId = section.getAttribute('id');
          }
        }

        links.forEach((link) => {
          const isActive = link.getAttribute('href') === '#' + currentId;
          link.setAttribute('aria-current', isActive ? 'page' : 'false');
          link.classList.toggle('active', isActive);
        });
      };

      setActiveLink();
      window.addEventListener('scroll', setActiveLink, { passive: true });
    });
  </script>
</head>
<body>

  <header class="site-header">
    <div class="wrap">
      <a class="logo" href="#accueil">Owen Cazaux</a>
      <nav class="nav" aria-label="Navigation principale">
        <ul>
          <li><a href="#accueil" aria-current="page">Accueil</a></li>
          <li><a href="#projets">Projets</a></li>
          <li><a href="#competences">Compétences</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

