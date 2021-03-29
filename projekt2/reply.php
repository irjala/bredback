<div class="reply">
    <h4>Write a reply</h3>
    <form method="post">
    <textarea name="commentfield" rows="5" cols="40"></textarea>
    <input type="submit" name="submit" value="Submit"> 
    </form>
</div>
<?php

if(isset($_POST['submit']) && isset($_POST['commentfield'])) {
    
    

    if(!isset($_SESSION['user'])){
        $sit = 0;
        $sendcomment = $_POST['commentfield'];
        $whosend = 999;  
        $whoname = "Anonym";
        $pageid = $_SESSION[$comrow['posterid']];
        $conn = create_conn();      
        $sql = "INSERT INTO comments (pageid, comment, posterid, postername, reply) VALUES (?,?,?,?,?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isisi", $pageid, $sendcomment, $whosend, $whoname, $sit);
        $stmt->execute();

        mysqli_close($conn);
        header('Refresh:0');

        } else if (isset($_SESSION['user'])){
        $sit = 0;
        $sendcomment = $_POST['commentfield'];
        $whosend = $_SESSION['userID'];
        $whoname = $_SESSION['realname'];
        $pageid = $_SESSION[$comrow['posterid']];
        $conn = create_conn();      
        $sql = "INSERT INTO comments (pageid, comment, posterid, postername, reply) VALUES (?,?,?,?,?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isisi", $pageid, $sendcomment, $whosend, $whoname, $sit);
        $stmt->execute();

        mysqli_close($conn);

    }
}


/*
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
*/