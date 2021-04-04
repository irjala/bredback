<?php session_start();?>
<?php include "addtool.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Back-end Jonas style</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>




<body>
    <!-- Containern har max bredd 800px -->
    <div id="container">
      <?php include "navbar.php"?>

        <!-- Artikel för H1 titel OCH min testing area för att snabbare se olika koder -->

            <h1 id="title">Projekt 1</h1>
            <div class="segment">
            <h2>Uppgift 1</h2>
            <p>I den här rutan så visar vi lite information</p>

<?php
/* Uppgift 1 - Superglobal */
//phpinfo(); // All info finns här
$sweMonths = array("Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December");
$manad = date("m");

$serverName = $_SERVER['SERVER_NAME'];
$userDude = $_SERVER['REMOTE_USER'];
$userIP = $_SERVER['REMOTE_ADDR'];
$serverIP = $_SERVER['SERVER_ADDR'];
$serverPort = $_SERVER['SERVER_PORT'];
$apacheVersion = $_SERVER['SERVER_SOFTWARE'];
$serverPHP = phpversion();

print("<p>Ditt username är: <b>" . $userDude . "</b></p>");
print("<p>Din IP adress är: <b>" . $userIP . "</b></p>");
print("<p>Server IP adressen du hämtar sidan från är: <b>" . $serverIP . "</b></p>");

print("<p>Servern har namnet: <b>" . $serverName . "</b></p>");
print("<p>Servern snurrar på port: " . $serverPort . "</p>");
print("<p>Serverns Apache version är: " . $apacheVersion . "</p>");
print("<p>Servern använder PHP version: " . $serverPHP . "</p>");

echo ("<h2>Uppgift 2</h2>");
print("<p>Tid: " . date("h:i:sa") . "</p>");
print("<p>Datum: <b>" . date("d.m.Y") . "</b></p>");

// $manad är en sträng och inte nummer!
// Type cast str till int
$manadInt = (int) $manad;
$dagNamn = date("l");
print("<p>Idag är det: <b>" . swedishdays($dagNamn) . "</b></p>");
print("<p>Månad: <b>" . $sweMonths[$manadInt - 1])."</b></p>";
print("<p>Vecko nummer: <b>" . date("W") . "</b></p>");

//print("<p>Cookie info : " . $_COOKIE[$cookie_value]);
?>
</div>

        <!-- Uppgift 3 -->
<div class="segment">
            <h2>Uppg 3</h2>

            <?php include "datecomparer.php"; ?>
</div>
<!-- Uppgift 4 -->
<div class="segment">
<?php
if (isset($_SESSION['emailer']) && $_SESSION['emailer'] == "sent") {
    echo ("<h2>Uppgift 4 KLAR!");
    echo ("<h3>Tackar, vi har sänt dig ett email (kolla skräp post)</h3>");
} else {
    include "emailer.php";
}
?>

</div>
<div class="segment">

<h2>Uppg 5 Cookie action:</h2>
<!-- Cookie time! -->

<?php
if (!isset($_COOKIE['user'])) {
    $cookie_name = "user";
    $cookie_value = $_SERVER['REMOTE_USER'];
    $cookie_date = date("d.m.Y");
    $cookie_time = date("G:i:s");
    setcookie($cookie_name, $cookie_value, $cookie_date, $cookie_time, time() + (86400 * 30), "/"); // 86400 = 1 day
    print("<p>Hej " . $_COOKIE[$cookie_name] . " du är här för första gången: " . $cookie_date . " klockan " . $cookie_time . "</p>");
} else {
    print("<p>Hej " . $cookie_value . " senast du var här var: " . $cookie_date . " klockan " . $cookie_time . "</p>");
}
?>
    </div>
    <div class="segment">

        <h2>Uppgift 6</h2>

        <!-- Uppgift 6 -->
        <form action="index.php" method="get">
            <p>Login: <input type="text" name="login" /></p>
            <p>Password: <input type="text" name="password" /></p>
            <p><input type="submit" value="Logga in"/></p>
            </form>


<?php

$login = test_input($_GET["login"]);
$password = test_input($_GET["password"]);

$checkstring = ($login . $password);
$USERgetlog = fopen("userlogin.txt", "r");
$USERchecklog = fread($USERgetlog, filesize($filename));

if (strpos(file_get_contents($USERgetlog), $_REQUEST[$checkstring]) !== false) {
    print("<h3>Its there!</h3>");
} else {
    print("<h3>Me no find!!!</h3>");
}
fclose($USERgetlog);

if ($login == "bollkalle" && $password == "plockaboll") {
    $_SESSION['access'] = "yesyoucan";
    print("<a href='profile.php'>Din privata profilsida</a>");
}
if ($login == "dennis" || $login == "Dennis") {
    $_SESSION['access'] = "yesyoucandennis";
    print("<a href='profile.php'>Till DENNIS profilsida</a>");
} else {
    print("<p>Saker å ting är som de ska vara!</p><br>");
}

?>

    </div>
    <div class="segment">
<!-- Uppgift 6 igen -->
        <h2>Här under kommer text</h2>
        <p>Från sessionproof.php<br>Försök att se informationen genom att gå rakt till den sidan bara.</p>

    <?php include "sessionproof.php"; ?>
    </div>
    <div class="segment">
<!-- Uppgift 7 -->
        <h2>Vill du uploada något?</h2>
        <p>Lägg upp en bild! (jpeg, png, gif):</p>

    <?php include "upload.php"; ?>
    </div>

    <div class="segment">
        <h2>Uppg 8</h2>

<?php

// VISITOR LOG som också ränkar hur många besökare varit på sidan

$besoklog = fopen("besok.log", "a+");
if (!$besoklog) {
    // Om PHP inte får rättigheter att öppna+skriva filen
    echo ("<p>Accounting problems!</p>");
} else {
    // All information vi vill lägga i besöks loggen
    fwrite($besoklog, "VIS" . $userIP . " " . $userDude . " " . date("Y-m-d H:i:s") . "\n");
    fclose($besoklog);

    // Räknar raderna i besöks loggen
    $lines = 0;
    $counteraccess = fopen("besok.log", "r");
    while (!feof($counteraccess)) {
        $line = fgets($counteraccess);
        $lines++;
    }

    // Meddelar site visitor vilken besökar nummer han är
    echo ("<h2>Du är besökare nummer: " . $lines . "</p>");
    fclose($counteraccess);

    

fclose($handle);
}
?>

</div>
<div class="segment">

<h2>Gästbok</h2>
<form action="addcomment.php" method="post" name="guest">
Name:<input type="text" name="name" /><br>
Email: <input type="text" name="gemail" /><br>
Message: <br><textarea cols="50" name="message" rows="10"> </textarea><br>
<input type="submit" value="Sign this in the Book" /></form><br> -->

<?php
// Gästbok/*
/*
$guestname = test_input($_REQUEST('name'));
$gemail = test_input($_REQUEST('gemail'));
$gmessage = test_input($_REQUEST('message'));

$guestbook = fopen("guestbook.txt", "rw+");
if (!$guestbook) {
echo ("<p>Book is not here...</p>");
} else {
fwrite($guestbook, $guestname ."\n" .$gemail ."\n" .$gmessage ."\n\n");
fread($guestbook, filesize('guestbook.txt'));
fclose($guestbook);
} */
?>
<!--
</article>
<br>
<br>
-->
</div>
<article>
        <br>

<!-- Feedback -->
<p>Feedback (+ mera sessions på samma gång)</p>
<form action="index.php" method="get">
            <p>Hej dennis, om du skriver mitt namn så får du min feedback: <input type="text" name="feedkey" /></p>
            <p><input type="submit" value="Hit me feedback krångelboll!"/></p>
            </form>

<?php // TO DO --------- MERA SESSIONS!!!
$feedkey = test_input($_GET["feedkey"]);

if ($feedkey == "Jonas" || $feedkey == "jonas" || $feedkey == "Jonas Irjala" || $feedkey == "jonas irjala") {
    $_SESSION['feedbackkey'] = "match";
    print("<a href='feedback.php'>Feedbacken</a>");
} else {
    print("<p>Hmmmm</p><br>");
}
?>

        </article>

        <br>
        <br>
        <br>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>
