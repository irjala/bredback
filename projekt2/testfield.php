  <?php include "init.php" ?>
<?php include "head.php" ?>
<div class="container">
<p>hej</p>
<!-- <br>
<br>

<div>
<form class="pref" action="https://cgi.arcada.fi/~irjalajo/BP2/backend-projekt-1/projekt2/testfield.php" method="post">
<input type="radio" name="preference" value="1" id="male"/><label for="male" class="butlabel">Man</label><br>
                <input type="radio" name="preference" value="2" id="female"/><label for="female" class="butlabel">Kvinna</label><br>
                <input type="radio" name="preference" value="3" id="other"/><label for="other" class="butlabel">Annan</label><br>
                <input type="radio" name="preference" value="4" id="bothof"/><label for="bothof" class="butlabel">Båda</label><br>
                <input type="radio" name="preference" value="5" id="allof"/><label for="allof" class="butlabel">Alla</label></li><br><br>
                <input type="submit" name="submit" value="Slutför registreringen" id="registerbutton"><br>
</div> -->
<?php
$name = "test";
$conn = create_conn();
$query = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    echo("<p>".$row['id']."</p>");
    $stmt->close();
 /*
if(isset($_POST['submit'])){
  $nummer = $_POST['preference'];
  print($nummer);
  $prefArr = array('Manlig', 'Kvinnliga', 'Annan', 'Båda', 'Alla');
  print($prefArr[$nummer-1]);


   
    $name = "abc";
    $query = "SELECT username FROM users WHERE username = ?";
    $conn = create_conn();
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s",$name);
    $stmt->execute();
    $result = $stmt->get_result();
    
  
    $idquery = "SELECT id FROM users WHERE username = ?";
    $idstmt = $conn->prepare($idquery);
    $idstmt->bind_param("s",$name);
    $idstmt->execute();
    $idresult = $idstmt->get_result();
    $idrow = 
    
  
    $row = mysqli_num_rows($result);
    $content = $result;
    
    print($row);
    print($content);
    
    print("stage 1 ");
    $name = "abc";

    print($name);
    $query = "SELECT bio FROM users WHERE username = 'abc'";
  
    $conn = create_conn();
    $result = mysqli_query($conn,$query);

    $row = mysqli_num_rows($result);
    print($row['bio']); 
} else {
    print("Click the button please");
}*/

  ?>


<?php include "footer.php" ?>