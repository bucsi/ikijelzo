<?php

session_start();
require_once("lib/io.php");
require_once("lib/storage.php");
require_once("lib/auth.php");
$slides = new Storage(new JsonIO("data/slides.json"));
$clients = new Storage(new JsonIO("data/clients.json"));
$auth = new Auth(new Storage(new JsonIO("data/users.json")));

function get_exists(string $key): bool
{
    return isset($_GET[$key]) && strlen($_GET[$key]) > 0 ? $_GET[$key] : false;
}

function post_exists(string $key): bool
{
    return isset($_POST[$key]) && strlen($_POST[$key]) > 0 ? $_POST[$key] : false;
}

function error(string $msg): string
{
    return $msg ? "<p class='error'>$msg</p>" : "";
}

function success(string $msg): string
{
    return $msg ? "<p class='success'>$msg</p>" : "";
}
