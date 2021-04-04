<?php
session_start();

if(isset($_SESSION['access'])) {
    echo("<h2>Inloggade users</h2>
        <p>Kan se denna text</p>");
} else {
    echo("<h4>Secret</h4>");
}
if($_SESSION['access'] == "yesyoucandennis") {
    echo("<h2>En inloggad Dennis</h2>
        <p>Kan se denna text också</p>");
} else {
    echo("<h4>Secret</h4>");
}
if($_SESSION['access'] == "yesyoucan") {
    echo("<h2>En inloggad bollkalle</h2>
        <p>Kan se denna text också</p>");
} else {
    echo("<h4>Secret</h4>");
}
?>