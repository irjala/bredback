<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <img src="../projekt2/images/love.jpg" width="450px" height="200px" id="love">
    <br>
    <br>
    <h1>! MAIN ! Välkommen till Kiss Kiss Bang Bang!</h1>
    <br>
    <?php
    if (!isset($_SESSION['user'])){
        echo("<p>Du är för tillfället inte inloggad</p>");
    include "welcome.php";
    } else {
        echo("<a href='./logout.php' id='logout'>Logout</a>");
    }

    ?>
</article>
<blockquote><img src="../projekt2/images/quote.jpg" alt="tadadadada...im loving it" width="400" height="250">
<p id="quttis"></p>När vi treffade på Kiss Kiss Bang Bang så var det kärlek på första ögonblicket. Nu har vi varit lyckliga tillsammans redan 3 veckor!!
</p>

</blockquote>
<article>
<?php include "profile.php" ?>
<?php include "comment.php" ?>

</article>


<?php include "footer.php" ?>