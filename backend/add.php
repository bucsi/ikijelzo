<?php

require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

if (count($_GET) !== 5) {
    //header("Location:main.php?error=Hibás adatok!");
    echo ("wrong data");
    print_r($_POST);
    die;
}

if (
    !post_letezik("title") ||
    !post_isset("id") ||
    !post_letezik("content") ||
    !post_letezik("image_url")
) {
    //header("Location:main.php?error=Nem adtál meg minden adatot!");
    echo ("wrong data");
    print_r($_POST);
    die;
}

echo("Siker!");
