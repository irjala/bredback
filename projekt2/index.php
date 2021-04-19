<?php include "init.php" ?>
<?php include "head.php" ?>


    <article>
    <h1>Dating Shmating</h1>
    <?php
    if (!isset($_SESSION['user'])){
        echo("<h2>Om du har ett konto, logga in. Annars kan du registrera dig</h2><div class='formbox'>");
        include "welcome.php";
        echo("</div>");
    } else {
        echo("<a href='./logout.php' id='logout'>Logout</a>");
        echo("<div class='segment'>");
        include "homeprofile.php";
        echo("</div>");
    }
    ?>
    </article>


<?php include "footer.php" ?>