<?php
require_once("_start.php");
var_dump($_POST);

if (count($_POST) !== 2) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no data");
    die;
}

if (!post_exists("user") || !post_exists("pw")) {
    header("Location:index.php?error=Nem%20adtál%20meg%20minden%20adatot!");
    echo ("invalid data");
    die;
}

$user = $auth->authenticate($_POST["user"], $_POST["pw"]);

if (!$user) {
    header("Location:index.php?error=Hibás%20felhasználónév%20vagy%20jelszó!");
    echo ("cant login");
    die;
}

$auth->login($user);
header("Location:main.php");
