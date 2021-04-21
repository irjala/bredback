<?php include "init.php" ?>
<?php include "head.php" ?>

<div class="segment">
<?php

include('parsedown.php');
$contents = file_get_contents('raport.md');
$Parsedown = new Parsedown();
echo $Parsedown->text($contents);

?>
</div>
<div class="picdisp">
<h2>Hur jag byggde min databas</h2>
<img src="./images/database01.png" alt="Relation mellan user id och pageid där commentid kan bli en pageid"></img>

<h2>Hur den används at the moment</h2>
<img src="./images/database02.png" alt="Relation mellan user id och pageid"></img>
</div>

<div class="formbox">
<h3>Kom du ända hit?</h3>
<?php if(isset($_POST['sendfeedbackz'])) {
    $sit = 0;
    $sendcomment = "En knapp har tryckts någonstans";
    $whosend = 1018;  
    $whoname = "Anonym";
    $pageid = 1022;
    $conn = create_conn();      
    $sql = "INSERT INTO comments (pageid, comment, posterid, postername, reply) VALUES (?,?,?,?,?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isisi", $pageid, $sendcomment, $whosend, $whoname, $sit);
    $stmt->execute();

    echo("Actually... Jag föredrar den på itslearning, tack!");
    } else {
    echo("Posta din feedback här<br>Försök reflektera över din egen feedback");} ?>
<form action="rapport.php" method="post">
<textarea rows="3" cols="20" name="feedbackz"></textarea><br>
  <input type="submit" name="sendfeedbackz" value="Skicka">
</form>
</div>


<?php include "footer.php" ?>