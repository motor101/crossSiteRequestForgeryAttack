<?php

session_start();

function saveCourse($username, $course)
{
    // save the chosen course in the database
}

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION["course"])) {
    header("Location: courses.php");
    exit;
}

$availableCourses = ["Алгебра", "ОСУП", "3D принтиране"];

if (isset($_POST["course"])) {

    if (!isset($_POST["csrf_token"]) || !isset($_COOKIE["csrf_token"])
        || $_POST["csrf_token"] !== $_COOKIE["csrf_token"]) {
        exit;
    }

    if (in_array($_POST["course"], $availableCourses)) {
        $_SESSION["course"] = $_POST["course"];
        saveCourse($_SESSION["username"], $_SESSION["course"]);
        header("Location: courses.php");
        exit;
    }
}

if (isset($_COOKIE["csrf_token"])) {
    $csrfToken = htmlspecialchars($_COOKIE["csrf_token"], ENT_QUOTES);
} else {
    $csrfToken = md5(openssl_random_pseudo_bytes(32));
    setcookie("csrf_token", $csrfToken, time() + 3600 * 24);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добре дошли</title>
    <style>
        body {
            background-color: lightgreen;
        }
    </style>
</head>
<body>
<h1>Здравейте, <?= htmlspecialchars($_SESSION["username"]) ?></h1>
<h2>Моля, запишете се за един от следните курсове.</h2>
<h2>Не можете да променяте избора си т. ч. помислете внимателно какво ви се учи.</h2>
<br>
<form method="post">
    <input type="radio" name="course" value="Алгебра">Алгебра<br>
    <input type="radio" name="course" value="ОСУП">ОСУП<br>
    <input type="radio" name="course" value="3D принтиране">3D принтиране<br><br>
    <input type="text" name="csrf_token" value="<?= $csrfToken ?>" hidden>
    <input type="submit" value="Запази избора ми">
</form>
<br>
<a href="logout.php">Изход</a>
</body>
</html>

