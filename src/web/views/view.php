<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moja Galeria WAI</title>
    <link rel="stylesheet" href="/static/main.css"> </head>
<body>
    <nav>
        <a href="index.php?action=gallery">Galeria</a>
        <a href="index.php?action=upload">Dodaj zdjęcie</a>
        <?php if (isset($_SESSION['user'])): ?>
            <span>Zalogowany: <?= $_SESSION['user'] ?></span>
            <a href="index.php?action=logout">Wyloguj</a>
        <?php else: ?>
            <a href="index.php?action=login">Zaloguj</a>
        <?php endif; ?>
    </nav>
    <hr>