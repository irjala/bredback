<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <h1>Dating sajt :O</h1>
    <br>
    <p>Ni kommer ha det fett najs här!</p>
    <?php
    if (!isset($_SESSION['user'])){
        echo("<p>Du är för tillfället inte inloggad</p>");
    include "welcome.php";
    } else {
        echo("<a href='./logout.php' id='logout'>Logout</a>");
        echo("<div class='segment'>");
        include "profile.php";
        echo("<(div><div class='segment'>");
        include "comment.php";
        echo("</div>");
    }
    ?>
</article>


<?php include "footer.php" ?>