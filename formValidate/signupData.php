<?php
require "database.php";

session_start();
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$gender = $_POST["gender"];


$flag = false;

if (!$name) {
    $flag = true;
    $_SESSION["nameError"] = "Name is required";
} else {
    if (strlen($name) < 3) {
        $flag = true;
        $_SESSION["nameError"] = "Name must be at least 3 characters";
    } else {
        $preagMatch = preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $name);
        if ($preagMatch) {
            $flag = true;
            $_SESSION["nameError"] = "Name must not contain special characters";
        }
    }
}

if (!$email) {
    $flag = true;
    $_SESSION["emailError"] = "Email is required";
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
        $_SESSION["emailError"] = "Email is not valid";
    }
}

if (!$password) {
    $flag = true;
    $_SESSION["passwordError"] = "Password is required";
} else {
    if (strlen($password) < 8) {
        $flag = true;
        $_SESSION["passwordError"] = "Password must be at least 8 characters";
    } else {
        $upperCase = preg_match('@[A-Z]@', $password);
        $lowerCase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $spacialCharacte = preg_match('@[^\w]@', $password);

        if (!$upperCase || !$lowerCase || !$number || !$spacialCharacte) {
            $flag = true;
            $_SESSION["passwordError"] = "Password must contain at least one uppercase letter, one lowercase letter, one number and one special character";
        }
    }
}

if (!$gender) {
    $flag = true;
    $_SESSION["genderError"] = "Gender is required";
}


if ($flag) {
    header("location:signup.php");
} else {
    // Email exists test
    $existsCheck = "SELECT * FROM `users` WHERE `email` = '$email'";
    $sql = mysqli_query($dbConnect, $existsCheck);
    $totalRecods = mysqli_num_rows($sql);

    if ($totalRecods > 0) {
        $_SESSION["emailExists"] = "Email already exists";
        header("location:signup.php");
    } else {
        // Data insert
        $sql = "INSERT INTO `users` (`name`, `email`, `password`, `gender`) VALUES ('$name', '$email', '$password', '$gender')";
        $result = mysqli_query($dbConnect, $sql);

        if ($result) {
            $_SESSION["success"] = "Registration successfully";
            header("location:signup.php");
        }
    }
}
