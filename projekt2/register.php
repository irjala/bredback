<div class="container">
    <h2>Registrerings uppgifter</h2>
    
    <form class="reqform" action="../projekt2/index.php?stage=signup" method="post">
        <ul class="registerlist">
            <br>
                <li><label>Användarnamn</label><br><input type="text" name="uninput"/></li>
                <li><label>Namn</label><br><input type="text" name="rninput"/></li><br>
                <li><label>Lösenord</label><br><input type="password" name="pwinput"/></li>
                <li><label>Repetera lösenordet</label><br><input type="password" name="pwrepeat"/></li><br>
                <li><label>Email</label><br><input type="text" name="eminput"/></li>
                <li><label>Postnummer</label><br><input type="text" name="pninput"/></li><br>
                <label>Berätta lite om dig själv</label><br>
                <textarea name="comment" rows="5" cols="40" name="bioinput"></textarea><br>
                <li><label>Årslön</label> <input type="text" name="ysinput"/></li><br>
                <li><label>Preferens</label><br>
                <input type="radio" name="preference" value="1" id="male"/><label for="male" class="butlabel">Man</label><br>
                <input type="radio" name="preference" value="2" id="female"/><label for="female" class="butlabel">Kvinna</label><br>
                <input type="radio" name="preference" value="3" id="other"/><label for="other" class="butlabel">Annan</label><br>
                <input type="radio" name="preference" value="4" id="bothof"/><label for="bothof" class="butlabel">Båda</label><br>
                <input type="radio" name="preference" value="5" id="allof"/><label for="allof" class="butlabel">Alla</label></li><br><br>
                <input type="submit" name="submit" value="Slutför registreringen" id="registerbutton"><br>
            </ul>
    </form>

<?php
print("Stage 0");
// Kolla att man klickat submit!
if (isset($_POST['submit'])){
    print("Stage 1");


//$prefArr = array['Manlig', 'Kvinnliga', 'Annan', 'Båda', 'Alla'];

//if (isset($_REQUEST['usr']) && isset($_REQUEST['psw'])  ) {
//KOM IHÅG XSS PROTECTION
$username = test_input($_REQUEST['uninput']);
$password = test_input($_REQUEST['pwinput']);
$repassword = test_input($_REQUEST['pwrepeat']);
$realname = test_input($_POST['rninput']); 
$email = test_input($_POST['eminput']); 
$zip = test_input($_POST['pninput']); 
$bio = test_input($_POST['bioinput']); 
$salary = test_input($_POST['ysinput']);
$preference = test_input($_POST['preference']);

    // OM båda passwordena är samma går vi vidare
    if ($password == $repassword){
    $conn = create_conn();
    
    // Krypterar lösenordet
    $password = hash("sha256", $password);

    // Prepared statements går snabbare att köra och skyddar mot SQL Injection!
    $query = "INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference) VALUES (?,?,?,?,?,?,?,?)";
    $statement = $conn->prepare($query);
    $statement->bind_param("ssssisii",$username, $realname, $password, $email, $zip, $bio, $salary, $preference);
    $statement->execute();
    
    $checkquery = "SELECT username FROM users WHERE username = ?";
    $stmt = $conn->prepare($checkquery); // Prepare returnerar mysqli_stmt objekt
    $stmt->bind_param("s",$username); // Nuförst skickar den användarinmatad data till sql
    $stmt->execute(); // execute returnar true eller false
    $result = $stmt->get_result();
    $answer = mysqli_num_rows($result);
    
    
        // OM statement executades = Data har skrivits in i tabellen. SUCCESS.
        if ($answer == 1) {
                $_SESSION['user'] = $username;
                $row = $result->fetch_assoc();
                $_SESSION['userID'] = $row['id'];

                print("Du har registrerats!");
                header('Refresh:1; url=https://cgi.arcada.fi/~irjalajo/bredback/projekt2/index.php');

            } else {
                // Ifall statement failade att executa.
                print("error" .$conn->error);

            }

        } else {
            // else för lösenords dubbleteringen misslyckades
            echo("<h3>Du lyckades inte skriva ett lösenord två gånger</h3>");
    }
} else {
    $_SESSION['user'] = NULL;
}