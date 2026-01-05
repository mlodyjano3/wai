<?php include_once 'header.php'; ?>

<h1>Zapamiętane zdjęcia</h1>

<form method="POST" action="index.php?action=saved">
<?php if (!empty($saved_ids) && count($saved_ids) > 0): ?>
    <div class="gallery">
    <?php foreach ($images as $img): ?>
        <?php $id = (string)$img['_id']; ?>
        <div class="image-item" style="display: inline-block; margin: 10px; vertical-align: top; width: 220px; text-align:center; border: 1px solid #ddd; padding: 10px;">
            <a href="<?= $img['original'] ?>" target="_blank">
                <img src="<?= $img['thumbnail'] ?>" alt="Miniatura" style="max-width: 100%;">
            </a>
            <p><strong><?= htmlspecialchars($img['title']) ?></strong></p>
            <p><?= htmlspecialchars($img['author']) ?></p>
            
            <label>Ilość:</label>
            <input type="number" name="quantities[<?= $id ?>]" value="<?= $_SESSION['saved_images'][$id] ?>" min="1" style="width: 50px;">
            <br><br>
            
            <label style="color: red; font-weight: bold; cursor: pointer;">
                <input type="checkbox" name="selected_to_remove[]" value="<?= $id ?>">
                Usuń
            </label>
        </div>
    <?php endforeach; ?>
    </div>
    
    <div style="margin-top: 20px; border-top: 1px solid #ccc; padding-top: 20px;">
        <input type="submit" name="update" value="Zaktualizuj ilości" style="padding: 10px;">
        <input type="submit" name="remove_selected" value="Usuń zaznaczone" style="margin-left: 10px; color: white; background-color: red; border: none; padding: 10px; cursor: pointer;">
    </div>
<?php else: ?>
    <p>Brak zapamiętanych zdjęć.</p>
    <a href="index.php?action=gallery">Wróć do galerii</a>
<?php endif; ?>
</form>

<?php include_once 'footer.php'; ?>