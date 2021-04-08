<?php
session_start();
?>

<!DOCTYPE html>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="Favicon.ico" type="image/png" />
    <title>Back-end kurs PROJEKTFILER</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (isset($_SESSION['access'])){

    echo("<div id='container'>
    <?php include 'navbar.php'?>");

    if ($_SESSION['access'] == "yesyoucan") {
    print("<p>Session content: </p>");
    print($_SESSION);
    print("<br>Användaren:" . $_SESSION['user']);
}
if ($_SESSION['access'] == "yesyoucandennis") {
    print($_SESSION);
    print("<br>Bra jobbat Dennis, du stavade ditt namn rätt. By the way, denna text är endast tillgänglig ifall man loggat in med namnet Dennis");
}
else {
    print("<a href='index.php'>index</a>");
}
} else {
    print("You dont belong here!");
}
echo("</div>");
?>

</body>
</html>