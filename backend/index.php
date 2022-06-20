<?php
require_once("templates/header.php");
require_once("_start.php");
?>

<body>
    <h1>IKijelző - Belépés</h1>
    <form action="login.php" method="POST">
        <?= error(get_exists("error")) ?>
        <label for="user">Felhasználónév:</label>
        <input type="text" name="user" id="user">
        <label for="pw">Jelszó:</label>
        <input type="password" name="pw" id="pw">
        <input type="submit" value="Belépés">
    </form>
</body>

</html>