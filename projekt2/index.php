<?php include "init.php" ?>
<?php include "head.php" ?>


    <article>
    <h1>Dating sajt :O</h1>
    <br>
    <p>Ni kommer ha det fett najs här!</p>
    </article>
    <div class="divadd">
    <?php
    if (!isset($_SESSION['user'])){
        echo("<h3>Du är för tillfället inte inloggad</h3><div class='infobox'>");
        include "welcome.php";
        echo("</div>");
    } else {
        echo("<a href='./logout.php' id='logout'>Logout</a>");
        echo("<div class='segment'>");
        include "homeprofile.php";
        echo("</div>");
    }
    ?>
    </div>


<?php include "footer.php" ?>