<?php

session_start();
require_once("lib/io.php");
require_once("lib/storage.php");
require_once("lib/auth.php");
$slides = new Storage(new JsonIO("data/slides.json"));
$auth = new Auth(new Storage(new JsonIO("data/users.json")));

function get_letezik($kulcs)
{
    return isset($_GET[$kulcs]) && strlen($_GET[$kulcs])>0 ? $_GET[$kulcs] : false;
}

function post_isset($kulcs){
    return isset($_POST[$kulcs]) ? $_POST[$kulcs] : false;
}

function post_letezik($kulcs)
{
    return isset($_POST[$kulcs]) && strlen($_POST[$kulcs])>0 ? $_POST[$kulcs] : false;
}

function error($msg){
    return $msg ? "<p class='error'>$msg</p>" : "";
}

function success($msg){
    return $msg ? "<p class='success'>$msg</p>" : "";
}