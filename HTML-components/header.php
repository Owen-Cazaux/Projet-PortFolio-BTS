<?php
$isPagesDirectory = str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/Pages/');
$basePath = $isPagesDirectory ? '..' : '.';
$currentPage = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
?>

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
  <link rel="stylesheet" href="<?= $basePath ?>/style.css">
</head>
<body>

  <header class="site-header">
    <div class="wrap">
      <a class="logo" href="<?= $basePath ?>/index.php">Owen Cazaux</a>
      <nav class="nav" aria-label="Navigation principale">
        <ul>
          <li><a class="<?= $currentPage === 'index.php' ? 'active' : '' ?>" href="<?= $basePath ?>/index.php" <?= $currentPage === 'index.php' ? 'aria-current="page"' : '' ?>>Accueil</a></li>
          <li><a class="<?= $currentPage === 'MesProjets.php' ? 'active' : '' ?>" href="<?= $basePath ?>/Pages/MesProjets.php" <?= $currentPage === 'MesProjets.php' ? 'aria-current="page"' : '' ?>>Projets</a></li>
          <li><a href="<?= $basePath ?>/index.php#competences">Compétences</a></li>
          <li><a class="<?= $currentPage === 'Contact.php' ? 'active' : '' ?>" href="<?= $basePath ?>/Pages/Contact.php" <?= $currentPage === 'Contact.php' ? 'aria-current="page"' : '' ?>>Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

