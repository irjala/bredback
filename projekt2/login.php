<?php include "init.php" ?>
<?php include "head.php" ?>
<div class="segment">
    <h2>Logga in!</h2>
<form action="login.php" method="post">
  Användarnamn <br><input type="text" name="usr" id="usr"><br>
  Lösenord <br><input type="password" name="psw" id="psw"><br>
  <input type="submit" name="loginsubmit" value="Logga in">
</form><br>

<?php

  if (isset($_POST['loginsubmit'])){
    echo("STAGE 1 ");
    $name = test_input($_POST['usr']);
    $password = test_input($_POST['psw']);

    if($name == $password){
      echo("<p>OBS fälten får inte vara tomma eller samma!</p>");
    } else if(empty($name)){
      $usr_error = "Du kan inte lämna användarnamn tomt.";
      print($usr_error);
    } else if(empty($password)){
      $psw_error = "Du kan inte lämna lösenord tomt.";
      print($psw_error);
    } else  { 
      echo("STAGE 2 ");
    $hashedpassword = hash("sha256", $password);
    $conn = create_conn();
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    if ($stmt->execute()) { 
      print("Server request sent. . . ");
    } else {
      print("Request failed");
    }
    echo("STAGE 3 ");
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    if($hashedpassword==$row['password']){
      print("Successful log in");

    // Log in är lyckad så vi lägger info till session för framtida funktioner
    $_SESSION['user'] = $row['username'];
    $_SESSION['userID'] = $row['id'];
    $_SESSION['realname'] = $row['realname'];

    header('Refresh:0; url=index.php');
  } else {
    echo "<div class='form'>
   <h3>Username/password is incorrect.</h3></div>";
  }
  /*$pwquery = "SELECT password FROM users WHERE password = ?";
  $pwstmt = $conn->prepare($pwquery);
  $pwstmt->bind_param("s",$password);
  $pwstmt->execute();
  $pwresult = $pwstmt->get_result();
  $pwrow = mysqli_num_rows($pwresult); */
  } 
  
  }else{ 
    echo "<h3>Välkommen logga in på existerande konto</h3></div>";
    echo("STAGE -1 ");

  ?><div class="box">
  <p>Fyll i fältet ovanför och submit för att denna låda skall försvinna</p>
  </div>
  <?php } ?>
  <!-- < ?php include "footer.php" ?> --> 