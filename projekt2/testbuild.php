<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Projekt 2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <header>
            <?php include "navbar.php" ?>
        </header>
<article>
    <form method="post" action="testad.php">
    Name: <input type="text" name="fname">
    <input type="submit">
    <?php include "testad.php" ?>
</article>