<?php

require_once("_start.php");
if(!$auth->is_authenticated()){
    header("Location:index.php?error=Jelentkezz%20be!");
    echo("no logged in user");
    die;
}

$auth->logout();
header("Location:index.php");