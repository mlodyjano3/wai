<?php include_once 'header.php'; ?>

<h2>Logowanie</h2>

<form method="POST" action="index.php?action=login">
    <label>Login:</label><br>
    <input type="text" name="login" required><br><br>

    <label>Hasło:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Zaloguj">
</form>

<?php if(isset($error)): ?>
    <p style="color: red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php include_once 'footer.php'; ?>