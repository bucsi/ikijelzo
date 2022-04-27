<?php
require_once("templates/header.php");
require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

function get_next_id(){
    return 99;
}

?>

<body>
    <header>
        <form action="logout.php" method="get"><input type="submit" value="Kilépés, mint <?= $auth->authenticated_user()["fullname"] ?>"></form>
    </header>
    <h1>IKijelző – Főmenü</h1>
    <h2>Új slide felvétele</h2>
    <p>Válassz:</p>
    <details>
        <summary><h3>Szöveges poszt</h3></summary>
        <form action="add.php" method="GET">
        <?= error(get_letezik("error")) ?>
        <input type="number" name="id" id="id" value="<?= get_next_id() ?>" disabled>
        <input type="text" name="title" placeholder="Cím">
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Tartalom"></textarea>
        <input type="url" name="image_url" placeholder="Kép webcíme (opcionális)">
        <input type="submit" value="Hozzáadás">
    </form>
    </details>
    <p><strong>vagy</strong></p>
    <details>
        <summary><h3>Kép</h3></summary>
        <form action="add.php" method="GET">
        <?= error(get_letezik("error")) ?>
        <input type="number" name="id" id="id" value="<?= get_next_id() ?>" disabled>
        <input type="text" name="title" placeholder="Cím">
        <input type="file" name="image_file" id="image_file">
        <input type="submit" value="Hozzáadás">
    </form>
    </details>
    
    <h2>Meglévő slide törlése</h2>
    <h2>Meglévő slide szerkesztése</h2>
</body>