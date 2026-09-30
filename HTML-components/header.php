<?php
$isPagesDirectory = str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/Pages/');
$basePath = $isPagesDirectory ? '..' : '.';
$currentPage = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$isHomePage = !$isPagesDirectory && $currentPage === 'index.php';
?>

<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owen Cazaux – Portfolio BTS</title>
  <meta name="description" content="Portfolio de Owen Cazaux, étudiant en BTS SIO SLAM.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&family=Caveat:wght@600;700&family=Figtree:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.16.0/devicon.min.css">
  <link rel="stylesheet" href="<?= $basePath ?>/css/style.css">
  <script src="<?= $basePath ?>/js/script.js" defer></script>
</head>
<body>

  <header class="site-header">
    <div class="wrap">
      <a class="prenom" href="<?= $basePath ?>/index.php">Owen Cazaux</a>
      <nav class="nav" aria-label="Navigation principale">
        <ul>
          <li><a class="<?= $isHomePage || $currentPage === 'index.php' ? 'active' : '' ?>" href="<?= $isHomePage ? '#accueil' : $basePath . '/index.php#accueil' ?>" <?= $isHomePage || $currentPage === 'index.php' ? 'aria-current="page"' : '' ?><?= $isHomePage ? ' data-section="accueil"' : '' ?>>Accueil</a></li>
          <li><a class="<?= $currentPage === 'MesProjets.php' ? 'active' : '' ?>" href="<?= $isHomePage ? '#projets' : $basePath . '/Pages/MesProjets.php' ?>" <?= $currentPage === 'MesProjets.php' ? 'aria-current="page"' : '' ?><?= $isHomePage ? ' data-section="projets"' : '' ?>>Projets</a></li>
          <li><a href="<?= $isHomePage ? '#competences' : $basePath . '/index.php#competences' ?>"<?= $isHomePage ? ' data-section="competences"' : '' ?>>Compétences</a></li>
          <li><a class="<?= $currentPage === 'Contact.php' ? 'active' : '' ?>" href="<?= $isHomePage ? '#contact' : $basePath . '/Pages/Contact.php' ?>" <?= $currentPage === 'Contact.php' ? 'aria-current="page"' : '' ?><?= $isHomePage ? ' data-section="contact"' : '' ?>>Contact</a></li>
        </ul>
      </nav>
    </div>
    <span class="theme-hint" aria-hidden="true">
      <span>Clique ici</span>
      <svg class="theme-hint-arrow" viewBox="0 0 70 20" focusable="false">
        <path d="M 2 13 C 18 13, 27 9, 43 10 S 57 11, 68 10" />
        <path d="M 59 5 L 68 10 L 59 15" />
      </svg>
    </span>
    <button class="theme-toggle" type="button" role="switch" aria-label="Thème sombre" aria-checked="true" title="Basculer entre thème clair et sombre"
      data-lamp-off="<?= $basePath ?>/assets/images/lamp-toggle-off.png"
      data-lamp-on="<?= $basePath ?>/assets/images/lamp-toggle-on.png">
      <img src="<?= $basePath ?>/assets/images/lamp-toggle-on.png" alt="lampe switch">
    </button>
  </header>

  <div class="paint-tools" aria-label="Outils de dessin">
    <button class="paint-select-mode" type="button" aria-label="Mode sélection" title="Revenir au mode sélection" aria-pressed="true">
      <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M5 3.5v16l4.6-4.2 3.1 5.2 2.3-1.4-3.1-5.2 6.1-.3L5 3.5Z" />
      </svg>
    </button>
    <button class="paint-clear" type="button" aria-label="Effacer les dessins" title="Effacer les dessins">
      <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M4 7h16M9 7V4h6v3m3 0-1 13H7L6 7m4 3v7m4-7v7" />
      </svg>
    </button>
    <aside class="paint-palette" aria-label="Palette de couleurs du pinceau">
      <img src="<?= $basePath ?>/assets/images/palette-dark.png" alt="Palette de peinture" data-palette-dark="<?= $basePath ?>/assets/images/palette-dark.png" data-palette-light="<?= $basePath ?>/assets/images/palette-light.png">
      <button type="button" aria-label="Pinceau rose vif" title="Rose vif" data-paint="rose-vif" data-color-light="#DC578F" data-color-dark="#EEC7B3" style="--swatch-x: 36.1%; --swatch-y: 17.8%;"></button>
      <button type="button" aria-label="Pinceau rose clair" title="Rose clair" data-paint="rose-clair" data-color-light="#FFB4D1" data-color-dark="#E2B29B" style="--swatch-x: 20%; --swatch-y: 28.7%;"></button>
      <button type="button" aria-label="Pinceau bleu" title="Bleu" data-paint="bleu" data-color-light="#3B5797" data-color-dark="#EFF3F0" style="--swatch-x: 14.2%; --swatch-y: 50.3%;"></button>
      <button type="button" aria-label="Pinceau rose poudré" title="Rose poudré" data-paint="rose-poudre" data-color-light="#FFA0C5" data-color-dark="#D09477" style="--swatch-x: 23%; --swatch-y: 32%;"></button>
      <button type="button" aria-label="Pinceau bleu clair" title="Bleu clair" data-paint="bleu-clair" data-color-light="#BEDFF8" data-color-dark="#5B898E" style="--swatch-x: 84.2%; --swatch-y: 34.1%;"></button>
      <button type="button" aria-label="Pinceau bleu glacier" title="Bleu glacier" data-paint="bleu-glacier" data-color-light="#B1CFF0" data-color-dark="#435A5A" style="--swatch-x: 87%; --swatch-y: 39%;"></button>
      <button type="button" aria-label="Pinceau bleu pâle" title="Bleu pâle" data-paint="bleu-pale" data-color-light="#E8F4FF" data-color-dark="#457A81" style="--swatch-x: 70.1%; --swatch-y: 17.9%;"></button>
      <button type="button" aria-label="Pinceau bleu ardoise" title="Bleu ardoise" data-paint="bleu-ardoise" data-color-light="#DEE9F6" data-color-dark="#597880" style="--swatch-x: 75.2%; --swatch-y: 67.1%;"></button>
    </aside>
  </div>

