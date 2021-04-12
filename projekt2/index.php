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
    }

    ?>
</article>

<div>
<?php include "profile.php" ?>
<?php include "comment.php" ?>

</div>


<?php include "footer.php" ?>