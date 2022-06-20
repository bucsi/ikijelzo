<?php
require_once("templates/header.php");
require_once("_start.php");


if (!$auth->is_authenticated()) {
    header("Location:index.php?error=Jelentkezz%20be!");
    echo ("no logged in user");
    die;
}

?>

<body>
    <header>
        <form action="logout.php" method="get"><input type="submit" value="Kilépés, mint <?= $auth->authenticated_user()["fullname"] ?>">
        </form>
    </header>
    <main>

        <h1>IKijelző – Főmenü</h1>
        <details>

            <summary>
                <h2>Új slide felvétele</h2>
            </summary>
            <form action="_add.php" method="POST" enctype="multipart/form-data">
                <?= success(get_exists("success")) ?>
                <?= error(get_exists("error")) ?><br>
                <input type="text" name="name" placeholder="Név"><br>
                <input type="number" name="duration" placeholder="Megjelenítési idő (mp)"><br>
                <input type="file" name="image_file" id="image_file"><br><br>
                <input type="submit" value="Hozzáadás">
            </form>
        </details>


        <details open>
            <summary>
                <h2>Aktív slideok</h2>
            </summary>
            <table>
                <thead>
                    <tr>
                        <th>Megtekintés</th>
                        <th>Név</th>
                        <th>Időtartam</th>
                        <th>Feltöltő</th>
                        <th>Módosítás</th>
                        <th>Kikapcsolás</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($slides->findAll(["active" => true]) as $slide) : ?>
                        <tr>
                            <td>
                                <a href="<?= $slide["file"] ?>" target="_blank">
                                    <button>👁️</button>
                                </a>
                            </td>
                            <form action="_modify.php" method="post">
                                <input type="hidden" name="id" value="<?= $slide["id"] ?>">
                                <td>
                                    <div class="cell-input">
                                        <input type="text" name="name" placeholder="Név" value="<?= $slide["name"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="cell-input">
                                        <input type="number" name="duration" placeholder="Megjelenítési idő (mp)" value="<?= $slide["duration"] ?>">
                                    </div>
                                </td>
                                <td><?= $slide["user"] ?></td>
                                <td><input type="submit" value="💾"></td>
                            </form>
                            <td>
                                <form action="_toggle.php" method="post">
                                    <input type="hidden" name="id" value="<?= $slide["id"] ?>">
                                    <input type="submit" value="🔕">
                                </form>
                            </td>
                            <td><button>❌</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </details>

        <details>
            <summary>
                <h2>Inaktív slideok</h2>
            </summary>
            <table>
                <thead>
                    <tr>
                        <th>Megtekintés</th>
                        <th>Név</th>
                        <th>Időtartam</th>
                        <th>Feltöltő</th>
                        <th>Módosítás</th>
                        <th>Bekapcsolás</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($slides->findAll(["active" => false]) as $slide) : ?>
                        <tr>
                            <td>
                                <a href="<?= $slide["file"] ?>" target="_blank">
                                    <button>👁️</button>
                                </a>
                            </td>
                            <form action="_modify.php" method="post">
                                <input type="hidden" name="id" value="<?= $slide["id"] ?>">
                                <td>
                                    <div class="cell-input">
                                        <input type="text" name="name" placeholder="Név" value="<?= $slide["name"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="cell-input">
                                        <input type="number" name="duration" placeholder="Megjelenítési idő (mp)" value="<?= $slide["duration"] ?>">
                                    </div>
                                </td>
                                <td><?= $slide["user"] ?></td>
                                <td><input type="submit" value="💾"></td>
                            </form>
                            <td>
                                <form action="_toggle.php" method="post">
                                    <input type="hidden" name="id" value="<?= $slide["id"] ?>">
                                    <input type="submit" value="🔔">
                                </form>
                            </td>
                            <td><button>❌</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </details>
    </main>
</body>

</html>