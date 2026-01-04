<?php include_once 'header.php'; ?>

    <form method="POST" enctype="multipart/form-data" action="index.php?action=upload">
        <label>Tytuł pliku:</label>
        <input type="text" name="title" required>
        <br>
        <label>Wybierz plik do przesłania:</label>
        <input type="file" name="file" required>
        <br>
        <label>Dodaj zdjęcie:</label>
        <input type="file" name="image" accept="image/*">
        <br>
        <input type="submit" value="Prześlij plik">
    </form>

<?php include_once 'footer.php'; ?>