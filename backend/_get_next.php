<?php
require_once("_start.php");
header("Access-Control-Allow-Origin: *");
$ids = array_keys($slides->findAll(["active" => true]));
if (count($ids) === 0) {
    echo (json_encode([
        "file" => "no active file",
    ]));
    die;
}

if (count($_GET) === 0 || !get_exists("id") || !in_array($_GET["id"], $ids)) {
    echo (json_encode($slides->findById($ids[0])));
    die;
} else {
    $i = array_search($_GET["id"], $ids) + 1;
    if ($i === count($ids)) {
        $i = 0;
    }
    echo (json_encode($slides->findById($ids[$i])));
}
