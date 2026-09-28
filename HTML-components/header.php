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
      data-lamp-off="<?= $basePath ?>/images/lamp-toggle-off.png"
      data-lamp-on="<?= $basePath ?>/images/lamp-toggle-on.png">
      <img src="<?= $basePath ?>/images/lamp-toggle-on.png" alt="lampe switch">
    </button>
  </header>

