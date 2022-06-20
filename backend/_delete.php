<?php

require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

if(!post_exists("id")) {
    header("Location:main.php");
    die;
}

$slides->delete($_POST["id"]);


header("Location:main.php");
die;
