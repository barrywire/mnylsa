<?php

session_start();

if (isset($_SESSION['user_id'])) {
    // create a database connection 
    $mysqli = require __DIR__ . '/database.php';

    // get the user's email address
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION['user_id']}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
} else {
    header('Location: signin.php');
}

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Galleries | Moneylisa</title>

    <!-- Styling imports -->
    <link rel='stylesheet' href='styles/main.css'>
    <link rel='stylesheet' href='styles/utility.css'>

    <!-- Bootstrap Icons imports -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css'>

</head>

<body class='background-cultured'>
    <?php include __DIR__ . '/navbar.php'; ?>

    <!-- Start of main -->
    <main>
        <div class='container-flex'>
            <div class='container'>
                <div class='col-12 bg-imperial-light'>
                    <div class='row'>
                        <div class='col-8 p-3 border-right'>
                            <h1 class='cultured'>View open exhibitions and galleries.</h1>
                            <p class='cultured fs-6 ps-5'>
                                A curated list of gallery openings by your favorite artists.
                            </p>
                            <p class='cultured fs-5'>
                                4 simple steps.
                            </p>
                        </div>

                        <div class='col-4 p-3 bg-cadet-light'>
                            <p class='cultured'>
                                1. Create your account then sign in.
                                <br>
                                <br>
                                2. Browse through the gallery openings.
                                <br>
                                <br>
                                3. Add a ticket to your cart.
                                <br>
                                <br>
                                4. Checkout then attend the gallery.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row p-2'>

                <!-- Fetch all the gallery record entries by the artist who is logged in -->
                <!-- Render a card for each gallery -->
                <?php
                $mysqli = require __DIR__ . '/database.php';

                $fetch_stmt = "SELECT * FROM galleries";

                $result = $mysqli->query($fetch_stmt);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $gallery_id = $row['id'];
                        $gallery_name = $row['title'];
                        $gallery_location = $row['location'];
                        $gallery_story = $row['story'];
                        $gallery_fee = $row['fee'];
                        $gallery_date = $row['date'];
                        $gallery_imgDir = $row['coverImg'];
                ?>
                        <div class='col-lg-6 col-md-12 p-3'>
                            <div class='card mb-3'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <center>
                                            <img src='<?= $gallery_imgDir ?>' class='card-img-top' alt='<? $gallery_name ?>'>
                                        </center>
                                    </div>
                                    <div class='col-md-8 px-5'>
                                        <div class='card-body'>
                                            <h3 class='space-cadet cadet-underlined'><?= $gallery_name ?></h3>
                                            <p class='card-text'>
                                                <i class='bi bi-geo-fill manatee' style='font-size:22px;'></i>
                                                <?= $gallery_location ?>
                                            </p>
                                            <p class='card-text'>
                                                <i class='bi bi-lightbulb-fill manatee' style='font-size:22px;'></i>
                                                <?= $gallery_story ?>
                                            </p>
                                            <p class='card-text'>
                                                <i class='bi bi-cash-coin manatee' style='font-size:22px;'></i>
                                                Kshs <?= number_format($gallery_fee, 2) ?>
                                            </p>
                                            <p class='card-text'>
                                                <i class='bi bi-calendar-date manatee' style='font-size:22px;'></i>
                                                <?php
                                                $date = date_create($gallery_date);
                                                echo date_format($date, 'F j, Y');
                                                ?>
                                            </p>
                                            <center>
                                                <a href='gallery-details.php?id=<?= $gallery_id ?>' class='btn btn-imperial'>
                                                    View gallery
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<center class='fs-5 mt-6 imperial-red'>No galleries found. Come back later. </center>";
                }
                ?>

            </div>
        </div>
    </main>
    <!-- End of main -->


</body>

</html>