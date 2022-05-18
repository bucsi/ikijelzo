<?php
require_once("templates/header.php");
require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

function get_next_id()
{
    return 99;
}

?>

<body>
    <header>
        <form action="logout.php" method="get"><input type="submit" value="Kilépés, mint <?= $auth->authenticated_user()["fullname"] ?>"></form>
    </header>
    <h1>IKijelző – Főmenü</h1>
    <h2>Új slide felvétele</h2>
    <form action="_add.php" method="POST" enctype="multipart/form-data">
        <?= success(get_letezik("success")) ?>
        <?= error(get_letezik("error")) ?><br>
        <input type="text" name="name" placeholder="Név"><br>
        <input type="number" name="duration" placeholder="Megjelenítési idő (mp)"><br>
        <input type="file" name="image_file" id="image_file"><br><br>
        <input type="submit" value="Hozzáadás">
    </form>
    </details>

    <h2>Meglévő slide törlése</h2>
    <h2>Meglévő slide szerkesztése</h2>
</body>