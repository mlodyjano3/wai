<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria Zdjęć</title>
    <link rel="stylesheet" href="a_frontend/main.css">
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .error { color: red; font-weight: bold; }
        nav { margin-bottom: 20px; padding: 10px; background: #f0f0f0; }
        nav a { margin-right: 15px; text-decoration: none; color: #333; }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<nav>
    <a href="index.php?action=gallery">Galeria</a>
    <a href="index.php?action=upload">Dodaj zdjęcie</a>
    
    <?php include 'cart_partial.php'; ?>
    
    <span style="float:right">
    <?php if (isset($_SESSION['user_id'])): ?>
        Zalogowany: <strong><?= htmlspecialchars($_SESSION['user_login']) ?></strong>
        <?php if(isset($_SESSION['user_pfp'])): ?>
            <img src="<?= htmlspecialchars($_SESSION['user_pfp']) ?>" style="height:30px; vertical-align:middle; border-radius:50%">
        <?php endif; ?>
        <a href="index.php?action=logout" style="margin-left:10px; color:red;">Wyloguj</a>
    <?php else: ?>
        <a href="index.php?action=login">Logowanie</a>
        <a href="index.php?action=register">Rejestracja</a>
    <?php endif; ?>
    </span>
    <div style="clear:both"></div>
</nav>
<hr>