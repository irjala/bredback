<?php
echo("<h3>STAGE 1</h3>");
include "init.php";

$sesskey = $_POST['accdeletion'];

$query = "SELECT password FROM users WHERE username = ?";
$conn = create_conn();
$stmt = $conn->prepare($query);
$stmt->bind_param("s",$sesskey);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$pwcompare = $row['password'];

if (isset($_POST['delpw'])) {

    $pwenter = $_POST['delpw'];
    $pwenter = hash("sha256", $pwenter);
    echo("<h3>STAGE 2</h3>");
    
        if($pwenter == $pwcompare){
            echo("<h3>CONFIRMED, deleting profile</h3>");
            
            $query = "DELETE FROM users WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s",$sesskey);
            $stmt->execute();
            session_destroy();
        } else {
            print("<p>:)</p>");
        }
    } else {
        print("<p>:D</p>");
    }

?>