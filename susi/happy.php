<?php

// код, който обработва отговора на проучването

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Проучване</title>
    <style>
        body {
            background-color: yellowgreen;
        }
    </style>

</head>
<body>
<h1>Проучване</h1>
<h2>Колко сте щастливи от 1 до 10?</h2>
<form method="<?= $_SERVER["PHP_SELF"] ?>">
    1<input type="range" min="1" max="10">10
    <input type="submit">
</form>
</body>
</html>