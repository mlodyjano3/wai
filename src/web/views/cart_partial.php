<?php
$count = 0;
if (isset($_SESSION['saved_images'])) {
    foreach ($_SESSION['saved_images'] as $qty) {
        $count += $qty;
    }
}
?>
<div style="display:inline-block; margin-left: 20px; padding: 5px; border: 1px dashed #333;">
    Zapamiętane: <strong><?= $count ?></strong> szt. 
    <a href="index.php?action=saved"> [Pokaż]</a>
</div>