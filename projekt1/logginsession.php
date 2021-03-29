<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
if ($_SESSION['dwaccess'] == "yesyoucan") {
print("<p>Session content: </p>");
print($_SESSION);
print("<br>Användaren:" . $_SESSION['user']);
}
if ($_SESSION['dwaccess'] == "yesyoucandennis") {
    print("<p>Hejsan Dennis: </p>");
    print($_SESSION);
    print("<br>Användaren:" . $_SESSION['user']);

// TODO: Annars styr användaren till loginsidan (index.php)
}
else {
    print("<p>Gå bort!</p>");
}
?>

</body>
</html>