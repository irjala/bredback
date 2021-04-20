<?php include "init.php"; ?>
<?php include "head.php"; ?>
<?php include "updatefunc.php"; ?>


<div class="editprofile">
    <h2>Editera din profil</h2>
<?php


        //if ($_GET['user'] == $_SESSION['user']) {
            
            //$current = $_GET['user'];
            $conn = create_conn();
            $user = $_SESSION['user'];
            $userID = $_SESSION['userID'];

            $sql = "SELECT * FROM users WHERE username = ?";  // ? = Placeholder för data

            $stmt = $conn->prepare($sql); // Prepare returnerar mysqli_stmt objekt
            $stmt->bind_param("s",$user); // Nuförst skickar den användarinmatad data till sql
            $stmt->execute(); // execute returnar true eller false


            $result = $stmt->get_result(); // Returnar data i form av ett msqli_result objekt
            $row = $result->fetch_assoc(); // Ta ut data från mysqli_result objekt till en ass array

            // TA EXEMPEL FRÅN ANVÄNDARNAMN
            $username = $row['username'];
            $realname = $row['realname'];
            $email = $row['email'];
            $zipcode = $row['zipcode'];
            $arslan = $row['salary'];
            $bio = $row['bio'];
            $password = $row['password'];
            $bio = $row['bio'];
            $_POST['preference'] = $row['preference'];
        
            echo(                
            "            
            <ul class='registerlist'>
                <br>

                <li><label>Hejsan </label><h3>".$row['username']. "</h3><br></li>

                <form action='./editprofile.php' method='post'>
                <li>Byt ditt riktiga namn:<br> <input type='text' name='upname' value='$realname'/><input type='submit' name='namesubmit' value='ändra' class='changebutton'></form></li>
                <form action='./editprofile.php' method='post'>
                <li>Byt din email:<br> <input type='text' name='upemail' value='$email'/><input type='submit' name='emailsubmit' value='ändra' class='changebutton'></form></li>
                <form action='./editprofile.php' method='post'>
                <li>Byt postkod:<br> <input type='text' name='upzipcode' value='$zipcode'/><input type='submit' name='zipsubmit' value='ändra' class='changebutton'></form></li>
                <form action='./editprofile.php' method='post'>
                <li>Byt årslön:<br> <input type='text' name='uparslan' value='$arslan'/><input type='submit' name='lansubmit' value='ändra' class='changebutton'></form></li>
                <form action='./editprofile.php' method='post'>
                <li>Byt lösenord:<br> <input type='text' name='uppassword'/><input type='submit' name='pwsubmit' value='ändra' class='changebutton'></form></li>
                <li><br>Byt Preferense:<br></li>
                <form action='./editprofile.php' method='post'>
                <input type='radio' name='preference' value='1' id='male'/><label for='male' class='butlabel'>Man</label><br>
                <input type='radio' name='preference' value='2' id='female'/><label for='female' class='butlabel'>Kvinna</label><br>
                <input type='radio' name='preference' value='3' id='other'/><label for='other' class='butlabel'>Annan</label><br>
                <input type='radio' name='preference' value='4' id='bothof'/><label for='bothof' class='butlabel'>Båda</label><br>
                <input type='radio' name='preference' value='5' id='allof'/><label for='allof' class='butlabel'>Alla</label></li>
                <br><br><input type='submit' name='prefsubmit' value='ändra' class='changebutton'></form><br><br><br>
                <label>Updatera bio</label><br>
                <form action='./editprofile.php' method='post'>
                <textarea name='bioarea' rows='5' cols='40' name='bioinput'>$bio</textarea><br>
                <input type='submit' name='biosubmit' value='Updatera' class='changebutton'><br>
                </form>
                
                
            </ul><br><br>"
        );

        
    if(isset($_POST['upname']) && isset($_POST['namesubmit'])){
        $input = test_input($_POST['upname']);
        $column = "realname";
        updateField($column, $input , $userID);
        print("Real name updated to: ".$input);
        header("Refresh:0");
    }
    if(isset($_POST['upemail']) && isset($_POST['emailsubmit'])){
        $input = test_input($_POST['upemail']);
        $column = "email";
        updateField($column, $input , $userID);
        print("Email updated to: ".$input);
        header("Refresh:0");
    }
    if(isset($_POST['upzipcode']) && isset($_POST['zipsubmit'])){
        $input = test_input($_POST['upzipcode']);
        $column = "zipcode";
        updateField($column, $input , $userID);
        print("Zipcode updated to: ".$input);
        header("Refresh:0");
    }
    if(isset($_POST['uparslan']) && isset($_POST['lansubmit'])){
        $input = test_input($_POST['uparslan']);
        $column = "salary";
        updateField($column, $input , $userID);
        print("Salary updated to: ".$input);
        header("Refresh:0");
    }
    if(isset($_POST['uppassword']) && isset($_POST['pwsubmit'])){
        $input = test_input($_POST['uppassword']);
        $column = "password";
        updatePassword($column, $input , $userID);
        print("Password has been updated");
        header("Refresh:0");
    }
    if(isset($_POST['preference']) && isset($_POST['prefsubmit'])){
        $input = test_input($_POST['preference']);
        $column = "preference";
        updateField($column, $input , $userID);
        print("Preference has been updated");
        header("Refresh:0");
    }
    if(isset($_POST['bioarea']) && isset($_POST['biosubmit'])){
        $input = test_text($_POST['bioarea']);
        $column = "bio";
        updateField($column, $input , $userID);
        print("Bio has been updated");
        header("Refresh:0");
    }
?>
</div>
    <?php include "footer.php"; ?>