<?php

require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

$slide = $slides->findById($_POST["id"]);
$slide["active"] = !$slide["active"];

$slides->update($_POST["id"], $slide);

header("Location:main.php");
die;
