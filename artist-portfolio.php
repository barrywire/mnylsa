<?php

session_start();

if (isset($_SESSION["user_id"])) {
    // create a database connection 
    $mysqli = require __DIR__ . "/database.php";

    // get the user's email address
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user["isArtist"] == "yes") {
        $_SESSION["isArtist"] = true;
        $_SESSION["user_id"] = $user["id"];


        header("Location: artist-dashboard.php");
    }
}

?>

<?php
// fetch the details of the user whose id is in the URL from users table
$sql = "SELECT * FROM users
        WHERE id = {$_GET["id"]}";

$result = $mysqli->query($sql);

$artist = $result->fetch_assoc();

// fetch the artist details of the artist whose id is in the URL from artist_details table
$sql = "SELECT * FROM artist_details
        WHERE artist_id = {$_GET["id"]}";

$detail_result = $mysqli->query($sql);

$artist_details = $detail_result->fetch_assoc();

// fetch the number of art entries of the artist whose id is in the URL from art table
$sql = "SELECT COUNT(*) AS art_count FROM art
        WHERE artist_id = {$_GET["id"]}";

$art_count_result = $mysqli->query($sql);

$art_count = $art_count_result->fetch_assoc();


// fetch the number of gallery entries of the artist whose id is in the URL from art table
$sql = "SELECT COUNT(*) AS gallery_count FROM galleries
        WHERE artist_id = {$_GET["id"]}";

$gallery_count_result = $mysqli->query($sql);

$gallery_count = $gallery_count_result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?= $artist['name'] ?>'s Portfolio</title>

    <!-- Styling imports -->
    <link rel='stylesheet' href='styles/main.css'>
    <link rel='stylesheet' href='styles/utility.css'>

    <!-- Bootstrap Icons imports -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css'>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>

<body>
    <?php include __DIR__ . "/navbar.php"; ?>

    <!-- Start of main -->
    <main>
        <div class='container-cart'>
            <!-- <span>
                Artist id: <?= $artist['id'] ?>
            </span> -->
            <div class='row'>
                <div class='col-md-12 col-lg-12'>

                    <div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
                        <!-- display the artist's profile image in a row with the artist name -->
                        <div class='row'>
                            <div class='col-md-3 col-lg-3 p-3'>
                                <img src='<?= $artist_details['profile_image'] ?>' alt='<?= $artist['name'] ?>' class='card-img-top'>
                            </div>
                            <div class='col-md-9 col-lg-9'>
                                <div class='row px-2'>
                                    <div class='col-md-5 col-lg-5'>
                                        <h1 class='fs-1 p-2'>
                                            <?= $artist['name'] ?>
                                        </h1>
                                        <div class='row justify-content-between'>
                                            <span class='col-5 badge badge-imperial'>
                                                <?= $art_count['art_count'] ?> <?= $art_count['art_count'] == 1 ? " Art Piece" : "Art Pieces" ?>
                                            </span>

                                            <span class='col-5 badge badge-imperial'>
                                                <?= $gallery_count['gallery_count'] ?> <?= $gallery_count['gallery_count'] == 1 ? "Gallery" : "Galleries" ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class='col-md-7 col-lg-7 px-3'>
                                        <p class='fs-5'>
                                            <?= $artist_details['story'] ?>
                                        </p>
                                        <p class='fs-5'>
                                            <?= $artist_details['artist_name'] ?> works on the art that he does from <?= $artist_details['building'] ?> on <?= $artist_details['street'] ?>, <?= $artist_details['town'] ?>, <?= $artist_details['county'] ?> in Kenya.

                                            <br />
                                            <br />
                                            This artist has been with us since <?php
                                                                                $date = date_create($artist_details['created_at']);
                                                                                echo date_format($date, 'F j, Y');
                                                                                ?>.
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <hr class='mobile-hide hr' />

                </div>

            </div>
        </div>

        <div class='container-flex' style='padding-left:7%; padding-right:8%;'>
            <div class='row'>
                <!-- Start of aside navbar -->
                <nav class='col-md-3 col-lg-2 d-md-block'>
                    <div class='position-sticky pt-3 background-cultured'>
                        <ul class='nav flex-column'>
                            <li class='nav-item'>
                                <a class='nav-link active' aria-current='page' href='#'>
                                    <i class='bi bi-postage-heart-fill imperial-red' style='font-size: 22px;'></i>
                                    Art
                                </a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='artist-gallery-portfolio.php?id=<?= $artist['id'] ?>'>
                                    <i class='bi bi-ticket-perforated-fill' style='font-size: 22px;'></i>
                                    Galleries
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of aside navbar -->

                <div class='col-md-9 col-lg-10'>
                    <div class='row'>

                        <!-- Fetch all the art entries by the artist who is logged in -->
                        <!-- Render a card for each piece -->
                        <?php
                        $mysqli = require __DIR__ . '/database.php';

                        $fetch_stmt = "SELECT * FROM art WHERE artist_id = {$artist['id']}";

                        $result = $mysqli->query($fetch_stmt);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $artist_id = $row['artist_id'];
                                $piece_id = $row['id'];
                                $piece_title = $row['title'];
                                $artist_name = $row['artist_name'];
                                $piece_story = $row['story'];
                                $piece_price = $row['price'];
                                $piece_dir = $row['img_path'];
                        ?>
                                <div class='col-lg-3 col-md-6 col-sm-12 px-3 py-4'>
                                    <div class='card'>
                                        <img src='<?= $piece_dir ?>' class='card-img-top' alt='<? $piece_title ?>'>
                                        <div class='card-body'>
                                            <div class='row ml-1'>
                                                <div class='col-6'>
                                                    <a href='art-piece-details.php?id=<?= $piece_id ?>'>
                                                        <h4 class='space-cadet cadet-underlined'><?= $piece_title ?></h4>
                                                    </a>
                                                </div>
                                                <div class='col-6'>
                                                    <a href='artist-details.php?id=<?= $artist_id ?>' class='plain'>
                                                        <h4 class='card-title manatee'><?= $artist_name ?></h4>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class='row ml-1 pt-2'>
                                                <!-- <div class='col-6'>
                                            <i class='bi bi-palette-fill manatee ml-1'></i>
                                            <span class='space-cadet fs-6'>53 palettes</span>
                                        </div> -->
                                                <div class='col-12'>
                                                    <span class='imperial-red fs-6 bold'>Kshs <?= number_format($piece_price, 2) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<center class='fs-5 mt-6 imperial-red'>" . $artist_details['artist_name'] . " has not uploaded art yet. Come back later. </center>";
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </main>
    <!-- End of main -->


</body>

</html>