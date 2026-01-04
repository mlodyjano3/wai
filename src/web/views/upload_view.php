<?php include_once 'header.php'; ?>

<h2>Dodaj nowe zdjęcie</h2>
<form method="POST" enctype="multipart/form-data" action="index.php?action=upload">
    <label>Tytuł:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Autor:</label><br>
    <input type="text" name="author" required><br><br>

    <label>Wybierz zdjęcie JPG lub PNG w rozmiarze do 1MB:</label><br>
    <input type="file" name="image" accept="image/png, image/jpeg" required><br><br>

    <input type="submit" value="Prześlij">
</form>

<?php include_once 'footer.php'; ?>