<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
if ($_SESSION['access'] == "yesyoucan") {
print("<p>Session content: </p>");
print($_SESSION);
print("<br>Användaren:" . $_SESSION['user']);

// TODO: Visa en text endast om $_SESSION['user'] == "dennis"

// TODO: Annars styr användaren till loginsidan (index.php)
}
if ($_SESSION['access'] == "yesyoucandennis") {
    print($_SESSION);
    print("<br>Bra jobbat Dennis, du stavade ditt namn rätt.");
}
else {
    print("<a href='index.php'>index</a>");
}
?>

</body>
</html>