<?php
require_once("_start.php");

function respond_and_log_client(array $resp): never
{
    echo (json_encode($resp));

    $remote_addr = $_SERVER["REMOTE_ADDR"];
    $data = [
        "remote-addr" => $remote_addr,
        "remote-host" => $_SERVER["REMOTE_HOST"] ?? "nincs remote host",
        "request-time" => date("Y/m/d H:m:s"),
        "client-name" => $_GET["client"] ?? "nincs kliens név",
        "response" => $resp
    ];

    global $clients;
    $id = $clients->findOne(["remote-addr" => $remote_addr])["id"] ?? null;
    if ($id) {
        $clients->update($id, $data);
    } else {
        $clients->add($data);
    }

    die;
}


header("Access-Control-Allow-Origin: *");
$ids = array_keys($slides->findAll(["active" => true]));
if (count($ids) === 0) {
    respond_and_log_client([
        "file" => "no active file",
    ]);
}

if (count($_GET) === 0 || !get_exists("id") || !in_array($_GET["id"], $ids)) {
    respond_and_log_client($slides->findById($ids[0]));
}

$i = array_search($_GET["id"], $ids) + 1;
if ($i === count($ids)) {
    $i = 0;
}

respond_and_log_client($slides->findById($ids[$i]));
