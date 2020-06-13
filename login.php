<?php

function validateUserCredentials($username, $password)
{
    // Проверка в базата данни за потребител с тези
    // име и парола.
    return true;
}

session_start();

if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    if (validateUserCredentials($_POST["username"], $_POST["password"])) {
        $_SESSION["username"] = $_POST["username"];
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
    Парола: <input type="text" name="password"><br>
    <input type="submit" value="Вход">
</form>
</body>
</html>
