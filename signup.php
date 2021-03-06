<!DOCTYPE html>
<html lan='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Moneylisa | Create Account </title>

    <!-- Styling imports -->
    <link rel='stylesheet' href='styles/main.css'>
    <link rel='stylesheet' href='styles/utility.css'>

    <script src='https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js' defer></script>
    <script src='js/signup-validation.js' defer></script>
</head>

<body>
    <main>
        <div class='row'>
            <div class='col-lg-5 col-md-12' style='padding-left: 5%;'>
                <div class='container'>
                    <div class='header'>
                        <h1>MoneyLisa</h1>
                    </div>
                    <h2>Create Account.</h2>

                    <form action='process-signup.php' method='post' id='signup' novalidate>
                        <div class='col-lg-12 mb-4' style='width:94%;'>
                            <label for='name'>Name</label>
                            <input class='form-control mb-2' type='text' id='name' name='name'
                                placeholder='Pablo Picasso'>
                        </div>

                        <div class='col-lg-12 mb-4' style='width:94%;'>
                            <label for='email'>Email</label>
                            <input class='form-control mb-2' type='email' id='email' name='email'
                                placeholder='picasso@venice.com'>
                        </div>

                        <div class='row mb-4'>
                            <div class='col-lg-5 col-sm-12 col-md-6'>
                                <label for='password'>Password</label>
                                <input class='form-control mb-2' type='password' id='password' name='password'
                                    placeholder='SuperPablo1894.'>
                            </div>

                            <div class='col-lg-5 col-sm-12 col-md-6'>
                                <label for='password_confirmation'>Confirm password</label>
                                <input class='form-control mb-2' type='password' id='password_confirmation'
                                    name='password_confirmation' placeholder='SuperPablo1894.'>
                            </div>
                        </div>

                        <div class='row mb-4'>
                            <span>
                                I want to:
                            </span>
                            <div class='col-lg-5 col-sm-12 col-md-6 mb-4'>
                                <input class='mt-3' type='radio' id='isArtist' name='isArtist' value='no' autocomplete='off' checked>
                                <label for='isArtist'>Buy art</label>
                            </div>

                            <div class='col-lg-5 col-sm-12 col-md-6 mb-4'>
                                <input class='mt-3' type='radio' id='isArtist' name='isArtist' value='yes' autocomplete='off'>
                                <label for='isArtist'>Create art</label>
                            </div>
                        </div>


                        <p>
                            Already have an account? <a class='inline-link' href='signin.php'>Sign In</a>
                        </p>

                        <button class='btn btn-lg btn-imperial'>Sign up</button>
                    </form>
                </div>
            </div>

            <div class='col-lg-5 mobile-hide' style='margin-left: 10%;'>
                <img class='img-lg' style='height: 90vh;' src='assets/images/katerina-pavlyuchkova-open.jpg' alt='Welcome'>
                <p class='manatee'> Katerina Pavlyuchkova &nbsp; - &nbsp;
                    <span class='imperial-red'>
                        Open
                    </span>
                </p>
            </div>
        </div>

    </main>
</body>

</html>