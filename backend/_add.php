<?php

require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

if (!post_exists("name")) {
    header("Location:main.php?error=Nem adtál nevet a slide-nak!");
    die;
}

if (!post_exists("duration")) {
    header("Location:main.php?error=Nem adtál megjelenítési időt a slide-nak!");
    die;
}

if (!isset($_FILES["image_file"]) || $_FILES["image_file"]["size"] == 0) {
    header("Location:main.php?error=Nem adtál meg képet!");
    die;
}

if (!((($_FILES["image_file"]["type"] == "video/mp4")
    || ($_FILES["image_file"]["type"] == "image/png")
    || ($_FILES["image_file"]["type"] == "image/gif")
    || ($_FILES["image_file"]["type"] == "image/jpeg"))

    && ($_FILES["image_file"]["size"] < 2000000)
)) {
    header("Location:main.php?error=Hibás formátumú fájl!");
    die;
}

$target_file = "uploads/" . $_FILES["image_file"]["name"];

if ($_FILES["image_file"]["error"] > 0) {
    header("Location:main.php?error=Hibás formátumú fájl!");
    die;
}

if (file_exists($target_file)) {
    header("Location:main.php?error=Ilyen nevű ($target_file) fájl már létezik!");
    die;
}

if (!move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
    header("Location:main.php?error=Fájl mentése sikertelen (ismeretlen hiba)");
    die;
}

$extension = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
$mime = $_FILES["image_file"]["type"];

$slides->add([
    "file" => $target_file,
    "duration" => intval($_POST["duration"]),
    "name" => $_POST["name"],
    "user" => $auth->authenticated_user()["username"],
    "active" => $_POST["active"] ?? false,
    "video" => $extension === "mp4" && $mime === "video/mp4"
]);

header("Location:main.php?success=Slide sikeresen hozzáadva!");
die;
