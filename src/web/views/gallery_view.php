<?php include_once 'header.php'; ?>

<h1>Galeria zdjęć</h1>

<form method="POST" action="index.php?action=gallery&page=<?= $page ?>">
    
    <div class="gallery">
        <?php if (count($images) > 0): ?>
            <?php foreach ($images as $img): ?>
                <?php 
                    $id_str = (string)$img['_id'];
                    $is_checked = isset($_SESSION['saved_images'][$id_str]) ? 'checked' : '';
                ?>
                <div class="image-item" style="display: inline-block; margin: 10px; vertical-align: top; width: 220px; text-align:center;">
                    <a href="<?= $img['original'] ?>" target="_blank">
                        <img src="<?= $img['thumbnail'] ?>" alt="<?= htmlspecialchars($img['title']) ?>" style="border: 1px solid #ccc;">
                    </a>
                    <p><strong>Tytuł:</strong> <?= htmlspecialchars($img['title']) ?></p>
                    <p><strong>Autor:</strong> <?= htmlspecialchars($img['author']) ?></p>
                    
                    <label style="background: #eee; padding: 5px; display:block; cursor:pointer;">
                        <input type="checkbox" name="selected_images[]" value="<?= $id_str ?>" <?= $is_checked ?>> 
                        Wybierz
                    </label>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Brak zdjęć w galerii.</p>
        <?php endif; ?>
    </div>

    <div style="margin: 20px 0;">
        <input type="submit" value="Zapamiętaj wybrane" style="padding: 10px 20px; font-weight:bold;">
    </div>

</form>

<div class="pagination" style="margin-top: 20px;">
    <?php if ($page > 1): ?>
        <a href="index.php?action=gallery&page=<?= $page - 1 ?>">&laquo; Poprzednia</a>
    <?php endif; ?>

    <span>Strona <?= $page ?> z <?= $totalPages ?></span>

    <?php if ($page < $totalPages): ?>
        <a href="index.php?action=gallery&page=<?= $page + 1 ?>">Następna &raquo;</a>
    <?php endif; ?>
</div>

<?php include_once 'footer.php'; ?>