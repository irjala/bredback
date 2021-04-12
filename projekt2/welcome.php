<p>Vår sida fungerar bäst om du är inloggad<br>Har du inte ett konto ännu? Registrera dig idag!</p>
    <a href="index.php?stage=signin"><input type="button" value="logga in"></a>
    <a href="index.php?stage=signup"><input type="button" value="registrera dig" id="registbut"></a><br><br><br>
    
    <?php 
    // Register click INCLUDE register formulär i php
    if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signup')) {
        include "register.php";
    }
    // Login click INCLUDE register formulär i php
    else if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signin')) {
        print("Lets log in . . .");
        header('Refresh:1; url=login.php');
        //include "login.php";
    }
