<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
<div class="profiledisp">
    <h2 id="profilHeader">Profilsida</h2>


    <?php

    $prefArr = array('Manlig', 'Kvinnliga', 'Annan', 'Båda', 'Alla');
        
        // Om du ser din egen profil
        if ($_GET['user'] == $_SESSION['user']) {
            $conn = create_conn();
            //if(isset($_SESSION['user'])){
            $current = $_GET['user'];
            $user = $_SESSION['user'];

            $sql = "SELECT * FROM users WHERE username = ?";  // ? = Placeholder för data

            $stmt = $conn->prepare($sql); // Prepare returnerar mysqli_stmt objekt
            $stmt->bind_param("s",$user); // Nuförst skickar den användarinmatad data till sql
            $stmt->execute(); // execute returnar true eller false


            $result = $stmt->get_result(); // Returnar data i form av ett msqli_result objekt
            $row = $result->fetch_assoc(); // Ta ut data från mysqli_result objekt till en ass array
            $prefnr = $row['preference'];
            $_SESSION['curr'] = $row['id'];
            $_SESSION['pager'] = $row['username'];
            echo(
            "<ul class='registerlist'>
                <br>
                <li><label>Användarnamn</label><br><h3>".$row['username']. "</h3></li>
                <li><label>Namn</label><br><h3>".$row['realname']. "</h3></li>
                <li><label>Email</label><br><h3>".$row['email']. "</h3></li>
                <li><label>Postnummer</label><br><h3>".$row['zipcode']. "</h3></li><br>

                <label>Profil BIO</label><br>
                <p>".$row['bio']. "</p></li><br>
                
                <li><label>Årslön</label><h3>".$row['salary']. "</h3></li></li><br>
                <li><label>Preferens</label><br><h3>".$prefArr[$prefnr-1]. "</h3></li>
            </ul><br><br>"
        );
        echo("<a href='../projekt2/editprofile.php'><button id='editProfileButton'>Byt info</button><a/><br>");
        
            include "comment.php";
            include "commentprinter.php";
            echo("<br><br>");
            include "accdelete.php";
            
      
        // Inloggad, ser annan user
    } else if (isset($_SESSION['user']) && $_GET['user'] != $_SESSION['user']) {
        $user = $_GET['user'];
        $conn = create_conn();
        $sql = "SELECT * FROM users WHERE username = ?";  // ? = Placeholder för data

        $stmt = $conn->prepare($sql); // Prepare returnerar mysqli_stmt objekt
        $stmt->bind_param("s",$user); // Nuförst skickar den användarinmatad data till sql
        $stmt->execute(); // execute returnar true eller false


        $result = $stmt->get_result(); // Returnar data i form av ett msqli_result objekt
        $row = $result->fetch_assoc();
        $prefnr = $row['preference'];
        $_SESSION['curr'] = $row['id'];
        $_SESSION['pager'] = $row['username'];
        echo(
            "<ul class='registerlist'>
                <br>
                <li><label>Användarnamn</label><br><h3>".$row['username']. "</h3></li>
                <li><label>Namn</label><br><h3>".$row['realname']. "</h3></li>
                <li><label>Email</label><br><h3>".$row['email']. "</h3></li>
                <li><label>Postnummer</label><br><h3>".$row['zipcode']. "</h3></li><br>

                <label>Profil BIO</label><br>
                <p>".$row['bio']. "</p></li><br>
                
                <li><label>Årslön</label><h3>".$row['salary']. "</h3></li></li><br>
                <li><label>Preferens</label><br><h3>".$prefArr[$prefnr-1]. "</h3></li>
            </ul><br><br>"
        );

        //echo("<br><br>");
        if(!isset ($_SESSION[$_GET['user']])) {
            include "like.php";
        } else {
            echo("<h2>".$row['likes']." like points</h2>");
        }
        
        echo("<br><br>");
        include "comment.php";
        include "commentprinter.php";
            
        
        // Ej inloggad
    } else {
        $conn = create_conn();
        $user = $_GET['user'];

        $sql = "SELECT * FROM users WHERE username = ?";  // ? = Placeholder för data

        $stmt = $conn->prepare($sql); // Prepare returnerar mysqli_stmt objekt
        $stmt->bind_param("s",$user); // Nuförst skickar den användarinmatad data till sql
        $stmt->execute(); // execute returnar true eller false


        $result = $stmt->get_result(); // Returnar data i form av ett msqli_result objekt
        $row = $result->fetch_assoc();
        $prefnr = $row['preference'];
        $_SESSION['curr'] = $row['id'];
        $_SESSION['pager'] = $row['username'];
        echo(
            "<ul class='registerlist'>
                <br>
                <li><label>Användarnamn</label><br><h3>".$row['username']. "</h3></li>
                <li><label>Namn</label><br><h3>".$row['realname']. "</h3></li><br>
                <li><span class='nopclass'>Email</span><br><h4>Endast de som är inloggade kan se årslön</h4></li><br>
                <li><label>Postnummer</label><br><h3>".$row['zipcode']. "</h3></li><br>

                <label>Profil BIO</label><br>
                <p>".$row['bio']. "</p></li><br><br>
                
                <li><span class='nopclass'>Årslön</span><h4>Endast de som är inloggade kan se årslön</h4></li></li><br>
                <li><label>Preferens</label><br><h3>".$prefArr[$prefnr-1]. "</h3></li>
            </ul><br><br>"

            
        );
        include "comment.php";
        include "commentprinter.php";
    }

    ?>
    

</div>



</article>
<?php include "footer.php" ?>