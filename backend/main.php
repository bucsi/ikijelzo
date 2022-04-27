<?php
require_once("templates/header.php");
require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

?>

<body>
    <header>
        <form action="logout.php" method="get"><input type="submit" value="Kilépés, mint <?= $auth->authenticated_user()["fullname"] ?>"></form>
    </header>
    <h2>Új slide felvétele</h2>
    <h2>Meglévő slide törlése</h2>
    <h2>Meglévő slide szerkesztése</h2>
</body>