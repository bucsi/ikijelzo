<?php

require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

$slide = $slides->findById($_POST["id"]);

require_once("templates/header.php");
?>

<body>
    <main>
        <h1><?= $slide["name"] ?></h1>
        <?php if($slide["video"]): ?>
            Az alábbi videót készülsz törölni:
            <video controls muted src="<?=$slide["file"]?>"></video>
        <?php else: ?>
            <p>Az alábbi <output><?= $slide["duration"] ?></output> másodpercig megjelenő képet készülsz törölni:</p>
            <img src="<?= $slide["file"] ?>">
        <?php endif; ?>
        <p>Biztosan törlöd?</p>
        <form class="confirm-delete" action="_delete.php" method="post">
            <input type="hidden" name="id" value="<?= $slide["id"] ?>">
            <input type="submit" value="Igen" class="confirm-delete-btn">
        </form>
        <a href="main.php"><button type="reset">Mégsem</button></a>
    </main>
</body>