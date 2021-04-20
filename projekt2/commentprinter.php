<div>
    <h3>JAVISST</h3>
<?php
if(isset($_GET['user'])){
$compage = $_GET['user'];

$conn = create_conn();
$query = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $compage);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $pageid = $row['id'];
    $stmt->close();


$sqlcomment = "SELECT * FROM comments WHERE pageid = $pageid ORDER BY comments.tstamp DESC";

$result = $conn->query($sqlcomment);

    if ($result = $conn->query($sqlcomment)) {
        //skapa en while loop för att hämta varje rad
        while ($comrow = $result->fetch_assoc()) {
            echo("<div class='comment'><h3>".$comrow['postername']."</h3>");
            echo("<h5>".$comrow['tstamp']."</h5>");
            echo("<p>".$comrow['comment']."</p>");

            // Min ide var att det skulle köra en while loop i while loopen för att hämta alla kommentarer
            // Jag misstänker att jag borde ha tänkt på ett annat sätt :D
            /* printReplies($comrow['pageid']); */
            
            echo("</div>");
            $_SESSION[$comrow['posterid']] = $comrow['commentid'];
            // Print a link to reply
            /*echo("
                <form action='profile.php?user=".$compage."' method='POST'>
                    <button type='submit' name='reply'>Reply</button>
                </form>");
            if(isset($_POST['reply'])){
            // Function to print replies
            include "reply.php";
            }*/
        }

    } else {
        print("något gick fel, senaste felet:" . $conn->error);
}
}
?>
</div>

<!-- < ?php

        Jag försökte få andra kommentaren in men jag måste gå vidare med mina projekt tyvärr.

    function printReplies($commentnr){
        $sqlcomment = "SELECT * FROM comments WHERE pageid = $commentnr ORDER BY comments.tstamp DESC";
        $result = $conn->query($sqlcomment);

    if ($result = $conn->query($sqlcomment)) {
        //skapa en while loop för att hämta varje rad
        while ($comrow = $result->fetch_assoc()) {
            echo("<div class='comment'><h3>".$comrow['postername']."</h3>");
            echo("<h5>".$comrow['tstamp']."</h5>");
            echo("<p>".$comrow['comment']."</p></div>");
        }
    } else {
            echo("
                <form action='profile.php?user=".$compage."' method='POST'>
                    <button type='submit' name='reply'>Reply</button>
                </form>");
        }
    }
-->