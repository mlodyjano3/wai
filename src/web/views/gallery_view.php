<?php include_once 'header.php'; ?>

<h1>Galeria zdjęć</h1>

<div class="gallery">
    <?php if (count($images) > 0): ?>
        <?php foreach ($images as $img): ?>
            <div class="image-item" style="display: inline-block; margin: 10px; vertical-align: top; width: 220px;">
                <a href="<?= $img['original'] ?>" target="_blank">
                    <img src="<?= $img['thumbnail'] ?>" alt="<?= htmlspecialchars($img['title']) ?>" style="border: 1px solid #ccc;">
                </a>
                <p><strong>Tytuł:</strong> <?= htmlspecialchars($img['title']) ?></p>
                <p><strong>Autor:</strong> <?= htmlspecialchars($img['author']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Brak zdjęć w galerii.</p>
    <?php endif; ?>
</div>

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