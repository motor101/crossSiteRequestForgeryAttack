<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION["course"])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Избрана дисциплина</title>
    <style>
        body {
            background-color: lightgreen;
        }
    </style>
</head>
<body>
<h1>Записали сте <?= $_SESSION["course"] ?></h1>
<br>
<a href="logout.php">Изход</a>
</body>
</html>