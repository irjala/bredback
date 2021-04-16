<?php include "init.php" ?>
<?php include "head.php" ?>


    <article>
    <h1>Dating sajt :O</h1>
    <br>
    <p>Ni kommer ha det fett najs här!</p>
    </article>
    <?php
    if (!isset($_SESSION['user'])){
        echo("<div><p>Du är för tillfället inte inloggad</p>");
        include "welcome.php";
        echo("</div>");
    } else {
        echo("<a href='./logout.php' id='logout'>Logout</a>");
        echo("<div class='segment'>");
        include "homeprofile.php";
        echo("</div>");
    }
    ?>


<?php include "footer.php" ?>