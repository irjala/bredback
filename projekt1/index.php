<?php session_start();?>
<?php include "addtool.php"?>
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
    <!-- Containern har max bredd 800px -->
    <div id="container">
      <?php include "navbar.php"?>

        <!-- Artikel för H1 titel OCH min testing area för att snabbare se olika koder -->
        <article>
            <h1>Projekt 1</h1>
            <p>Back end time... Första projektet finns att beskådas på denna sida.</p>

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

print("<p>Ditt username är: " . $userDude . "</p>");
print("<p>Din IP adress är: " . $userIP . "</p>");
print("<p>Server IP adressen du hämtar sidan från är: " . $serverIP . "</p>");

print("<p>Servern har namnet: " . $serverName . "</p>");
print("<p>Servern snurrar på port: " . $serverPort . "</p>");
print("<p>Serverns Apache version är: " . $apacheVersion . "</p>");
print("<p>Servern använder PHP version: " . $serverPHP . "</p>");

print("<p>Tid: " . date("h:i:sa") . "</p>");
print("<p>Datum: " . date("d.m.Y") . "</p>");

// $manad är en sträng och inte nummer!
// Type cast str till int
$manadInt = (int) $manad;
$dagNamn = date("l");
print("<p>Idag är det: " . swedishdays($dagNamn) . "</p>");
print("<p>Månad: " . $sweMonths[$manadInt - 1]);
print("<p>Vecko nummer: " . date("W") . "</p>");

//print("<p>Cookie info : " . $_COOKIE[$cookie_value]);
?>

        </article>
        <article>

        <!-- Uppgift 3 -->

            <h2>Uppg 3</h2>

            <form action="index.php" method="get">
            <p>Välj en dag: <input type="text" name="inDay" /></p>
            <p>Välj en månad: <input type="text" name="inMonth" /></p>
            <p>Välj ett år: <input type="text" name="inYear" /></p>
            <p><input type="submit" value="input"/></p>
            </form>

            <?php
if (isset($_REQUEST['inDay']) && isset($_REQUEST['inMonth'])) {

    $dag = test_input($_GET["inDay"]);
    $manad = test_input($_GET["inMonth"]);
    $artal = test_input($_GET["inYear"]);

    $userinputdate = mktime(0, 0, 0, $manad, $dag, $artal);
    print("<h3>Du valde datumet: " . gmdate("d.m.Y, H:i:s", $userinputdate) . "</h3>");
    $userinputdayname = swedishdays(gmdate("l", $userinputdate));

    print("<p>Ja du, det var ju en " . $userinputdayname . " som du lade in i fältet</p>");
    $currentdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

    if ($userinputdate > $currentdate) {
        //Användaren lade in framtids datum
        $datediff = ($userinputdate - $currentdate);
        print("<p>Det är " . daysextract($datediff) . "</p>");
        print("<p>Tills det datum du valde</p>");
    } else {
        //Användaren lade in ett datum från tidigare datum
        $datediff = ($currentdate - $userinputdate);
        print("<p>Det har gått " . daysextract($datediff) . "</p>");
        print("<p>Från det datum du valde</p>");
    }
}
?>
        </article>
        <article>

<!-- Uppgift 4 -->

            <h2>Uppg 4</h2>

            <form action="index.php" method="get">
            <p>Användarnamn: <input type="text" name="username" /></p>
            <p>E-mail: <input type="text" name="email" /></p>
            <p><input type="submit" value="Registrera dig"/></p>
            </form>
            <?php // TO DO ----------- random passwordet som skickas till email skall också sparas, kanske länka till något annat.

if (isset($_REQUEST['username']) && isset($_REQUEST['email'])) {
    $username = test_input($_GET['username']);
    $useremail = test_input($_GET['email']);

    $alphas = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    $password = $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)];
    // SPARA LÖSENORDET
    $userinfostorage = fopen("userlogin.txt", "a");
    fwrite($userinfostorage, $username . $password . "\n");
    fclose($userinfostorage);

    $to_email = $useremail;
    $subject = 'Registration confirmation';
    $message = 'Your username is: ' . $username . ' and your password is: ' . $password;
    $headers = 'From: noreply @ backendmaster . org';
    mail($to_email, $subject, $message, $headers);

    echo ("Tackar, vi har sänt dig ett email (kolla skräp post)");
} else {
    echo ("Något gick snett :/");
}

?>

            </article>
            <article>

<h2>Uppg 5 Cookie action:</h2>
<!-- Cookie time! -->

<?php
// TO DO ----------------- Cookie skall registrera ett första gången värde separat och behålla det, för tillfället överskrivs värdet. (isset)
$cookie_name = "user";
$cookie_value = $_SERVER['REMOTE_USER'];
$cookie_date = date("d.m.Y");
$cookie_time = date("G:i:s");
setcookie($cookie_name, $cookie_value, $cookie_date, $cookie_time, time() + (86400 * 30), "/"); // 86400 = 1 day
if (!isset($_COOKIE['user'])) {
    print("<p>Hej " . $cookie_value . " senast du var här var: " . $cookie_date . " klockan " . $cookie_time . "</p>");
}
?>

        </article>
        <article id="CIA">
        <br>

<!-- Uppgift 6 -->
<p>Om du vet så vet du...</p>
<form action="index.php" method="get">
            <p>Login: <input type="text" name="login" /></p>
            <p>Password: <input type="text" name="password" /></p>
            <p><input type="submit" value="Logga in"/></p>
            </form>


<?php // TO DO --------- MERA SESSIONS!!!
$login = test_input($_GET["login"]);
$password = test_input($_GET["password"]);

$checkstring = ($login . $password);
$USERgetlog = fopen("userlogin.txt", "r");
$USERchecklog = fread($USERgetlog, filesize($filename));

if (strpos(file_get_contents($USERgetlog), $_GET[$checkstring]) !== false) {
    print("<h3>Its there!</h3>");
} else {
    print("<h3>Me no find!!!</h3>");
}
fclose($USERgetlog);

if ($login == "bollkalle" && $password == "plockaboll") {
    $_SESSION['dwaccess'] = "yesyoucan";
    print("<a href='profile.php'>Din privata profilsida</a>");
}
if ($login == "dennis" || $login == "Dennis") {
    $_SESSION['dwaccess'] = "yesyoucandennis";
    print("<a href='darkweb.php'>DARK WEB</a>");
} else {
    print("<p>Saker å ting är som de ska vara!</p><br>");
}
?>

        </article>
        <article id="uploadfield">
        <br>
<!-- Uppgift 7 -->
        <h2>Vill du uploada något?</h2>
        <p>Lägg upp en bild! (jpeg, png, gif):</p>

        <form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<br>
</article>

<article>
<h2>Uppg 8</h2>

<?php

// VISITOR LOG som också ränkar hur många besökare varit på sidan

$besoklog = fopen("besok.log", "a+");
if (!$besoklog) {
    echo ("<p>Accounting problems!</p>");
} else {
    fwrite($besoklog, "VIS" . $userIP . " " . $userDude . " " . date("Y-m-d H:i:s") . "\n");
    fclose($besoklog);

    $lines = 0;
    $counteraccess = fopen("besok.log", "r");
    while (!feof($counteraccess)) {
        $line = fgets($counteraccess);
        $lines++;
    }
    $numberwriter = fopen("nummer.txt", "w");
    fwrite($numberwriter, $lines);
    fclose($numberwrite);

    echo ("<h2>Du är besökare nummer: " . $lines . "</p>");
    fclose($counteraccess);
}
?>

</article>

<!--
    HÄR SÅ HANN JAG INTE FIXA GÄSTBOKEN ! ! !
    <article>
<h2>Gästbok</h2>
<form action="addcomment.php" method="post" name="guest">
Name:<input type="text" name="name" /><br>
Email: <input type="text" name="gemail" /><br>
Message: <br><textarea cols="50" name="message" rows="10"> </textarea><br>
<input type="submit" value="Sign this in the Book" /></form><br> -->

<?php
// Gästbok
/*
$guestname = test_input($_GET('guest'));
$gemail = test_input($_GET('gemail'));
$gmessage = test_input($_GET('message'));

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
