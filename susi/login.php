<?php

session_start();

function getCourse($username)
{
    // read from database
    return null;
}

function validateUserCredentials($username, $password)
{
    // Проверка в базата данни за потребител с тези
    // име и парола.
    return true;
}

if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    if (validateUserCredentials($_POST["username"], $_POST["password"])) {
        $_SESSION["username"] = $_POST["username"];

        $course = getCourse($_SESSION["username"]);
        if ($course !== null) {
            $_SESSION["course"] = $course;
        }

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <style>
        body {
            background-color: lightgreen;
        }
    </style>
</head>
<body>
<form method="post" action="login.php">
    Име: <input type="text" name="username"><br>
    Парола: <input type="password" name="password"><br>
    <input type="submit" value="Вход">
</form>
</body>
</html>
