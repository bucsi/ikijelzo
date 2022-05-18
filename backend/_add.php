<?php

require_once("_start.php");

if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

if (!post_letezik("name")) {
    header("Location:main.php?error=Nem adtál nevet a slide-nak!");
    die;
}

if (!post_letezik("duration")) {
    header("Location:main.php?error=Nem adtál megjelenítési időt a slide-nak!");
    die;
}

if (!isset($_FILES["image_file"]) || $_FILES["image_file"]["size"] == 0) {
    header("Location:main.php?error=Nem adtál meg képet!");
    die;
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image_file"]["name"]);
$uploadOk = false;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["image_file"]["tmp_name"]);
if ($check === false) {
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

$slides->add([
    "file" => $target_file,
    "duration"=>intval($_POST["duration"]),
    "name"=>$_POST["name"],
    "user"=>$auth->authenticated_user()["username"],
    "active"=>true,
]);

header("Location:main.php?success=Slide sikeresen hozzáadva!");
die;
