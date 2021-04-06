<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jonas.I Back end kurs sida</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="container">
      <?php include "navbar.php"?>

<?php
include('parsedown.php');
$contents = file_get_contents('raport.md');
$Parsedown = new Parsedown();
echo $Parsedown->text($contents);

?>

</body>
</html>