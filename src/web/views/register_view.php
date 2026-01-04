<?php include_once 'header.php'; ?>
<h2>Rejestracja</h2>
<form method="POST" action="index.php?action=register" enctype="multipart/form-data">

    <input type="email" name="email" placeholder="E-mail" required>
    <br>
    <input type="text" name="login" placeholder="Login" required>
    <br>
    <input type="password" name="password" placeholder="Hasło" required>
    <br>
    <input type="password" name="password_confirm" placeholder="Powtórz hasło" required>
    <br>
    <label>Zdjęcie profilowe:</label>
    <input type="file" name="profile_photo" required><br>
    <input type="submit" value="Zarejestruj">
</form>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<?php include_once 'footer.php'; ?>