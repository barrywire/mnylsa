<!-- Start of navigation -->

<!-- Start of md navigation -->
<nav class='navbar sticky-top mobile-hide'>
    <div class='container-fluid'>
        <ul class='navbar-nav'>
            <li class='nav-item'>
                <a href='artists.php' class='nav-link'>Artists</a>
            </li>
        </ul>
        <ul class='navbar-nav'>
            <li class='nav-item'>
                <a href='galleries.php' class='nav-link'>Galleries</a>
            </li>
        </ul>
        <a href='home.php' class='nav-header mr-5'>
            MONEYLISA
        </a>
        <ul class='navbar-nav'>
            <li class='nav-item'>
                <!-- Check to see if there is a user session -->
                <?php if (isset($user)) : ?>
                    <a href='enthusiast-art-orders.php?id=<?= $_SESSION['user_id'] ?>' class='nav-link'>
                        Account
                    </a>

                <?php else : ?>
                    <a href='signin.php' class='nav-link'>
                        Account
                    </a>

                <?php endif; ?>

            </li>
        </ul>
        <ul class='navbar-nav'>
            <li class='nav-item'>
                <!-- Check to see if there is a user session -->
                <?php if (isset($user)) : ?>
                    <p>
                        Hey
                        <a href='enthusiast-art-orders.php?id=<?= $_SESSION['user_id'] ?>'>
                            <?= substr($user['name'], 0, strpos($user['name'], ' ')) ?>
                        </a>
                        |
                        <a href='logout.php' class='space-cadet'>Log out</a>
                    </p>

                <?php else : ?>

                    <div class='col-lg-12'>
                        <p><a href='signin.php'>Sign In</a> or <a href='signup.php'>Sign Up</a></p>
                    </div>

                <?php endif; ?>
            </li>
        </ul>
    </div>
    <hr class='mobile-hide hr' />
</nav>
<!-- End of md navigation -->

<!-- Start of mobile navigation -->
<div class='mobile-show'>
    <div class='container'>
        <a href='home.php' class='nav-header center'>
            <center>MONEYLISA</center>
        </a>
        <hr class='hr-mobile' />

        <ul class='nav justify-content-center'>
            <li class='nav-item'>
                <a href='galleries.php' class='nav-link'>Galleries</a>
            </li>

            <!-- Check to see if there is a user session -->
            <?php if (isset($user)) : ?>
                <li class='nav-item'>
                    <a href='client-dashboard.php' class='nav-link imperial-red'>
                        <?= substr($user['name'], 0, strpos($user['name'], ' ')) ?>
                    </a>
                    <a href='logout.php' class='nav-link space-cadet'>Log out</a>
                </li>
                <li class='nav-item'>
                <?php else : ?>

                    <p class='nav-link'>
                        <a href='signin.php'>Sign In</a>
                        or
                        <a href='signup.html'>Sign Up</a>
                    </p>
                </li>

            <?php endif; ?>
        </ul>
        <hr class='hr-mobile' />
    </div>
</div>

<!-- End of mobile navigation -->

<!-- End of navigation -->
<!-- -------------------------------------------------------------------------------------------- -->