<nav>
    <?php if (isset($_SESSION['user_id'])): ?>
        <span>Zalogowany jako: <strong><?= $_SESSION['user_login'] ?></strong></span>
        <img src="<?= $_SESSION['user_pfp'] ?>" width="30" style="border-radius:50%">
        <a href="index.php?action=logout">Wyloguj</a>
    <?php else: ?>
        <a href="index.php?action=login">Logowanie</a>
        <a href="index.php?action=register">Rejestracja</a>
    <?php endif; ?>
</nav>