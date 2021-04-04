<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
if (isset($_SESSION['access'])){
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
?>

</body>
</html>