<?php

require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

if (!post_exists("name")) {
    header("Location:main.php?error=Nem mósodítható üresre a slide neve!");
    die;
}

if (!post_exists("duration")) {
    header("Location:main.php?error=Nem módosítható üresre a slide megjelenítési ideje!");
    die;
}

$slide = $slides->findById($_POST["id"]);
$slide["name"] = $_POST["name"];
$slide["duration"] = intval($_POST["duration"]);

$slides->update($_POST["id"], $slide);


header("Location:main.php");
die;
