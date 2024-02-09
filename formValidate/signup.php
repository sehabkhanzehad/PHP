<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-center text-light">
                        <h2>Sign up</h2>
                    </div>
                    <div class="card-body">
                        <form action="signupData.php" method="POST">

                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" placeholder="Enter your name" class="form-control">
                                <?php if (isset($_SESSION["nameError"])) { ?>
                                    <span class="text-danger"> <?= $_SESSION["nameError"]; ?></span>
                                <?php }
                                unset($_SESSION["nameError"]) ?>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control">
                                <?php if (isset($_SESSION["emailError"])) { ?>
                                    <span class="text-danger"> <?= $_SESSION["emailError"]; ?></span>
                                <?php }
                                unset($_SESSION["emailError"]) ?>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" placeholder="Enter your password" class="form-control">

                                <?php if (isset($_SESSION["passwordError"])) { ?>
                                    <span class="text-danger"> <?= $_SESSION["passwordError"]; ?></span>
                                <?php }
                                unset($_SESSION["passwordError"]) ?>
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Select Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" value="male" type="radio" name="gender" id="gen1">
                                    <label class="form-check-label" for="gen1">
                                        Male
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="female" type="radio" name="gender" id="gen2">
                                    <label class="form-check-label" for="gen2">
                                        Female
                                    </label>
                                </div>
                                <?php if (isset($_SESSION["genderError"])) { ?>
                                    <span class="text-danger"><?= $_SESSION["genderError"]; ?></span>
                                <?php }
                                unset($_SESSION["genderError"]) ?>
                            </div>

                            <button type-submit class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>