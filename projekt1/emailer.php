<?php
    echo(
            "<h2>Uppg 4</h2>

            <form action='index.php' method='get'>
            <p>Användarnamn: <input type='text' name='username' /></p>
            <p>E-mail: <input type='text' name='email' /></p>
            <p><input type='submit' value='Registrera dig'/></p>
            </form>"
    );
if (isset($_REQUEST['username']) && isset($_REQUEST['email'])) {
    $username = test_input($_GET['username']);
    $useremail = test_input($_GET['email']);

    // Skapar arrays med Symboler
    $alphas = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    // Skapar ett password med random symboler
    $password = $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)] . $alphas[rand(0, 61)];
    

    // Skicka email
    $to_email = $useremail;
    $subject = 'Registration confirmation';
    $message = 'Your username is: ' . $username . ' and your password is: ' . $password;
    $headers = 'From: noreply @ backendmaster . org';
    mail($to_email, $subject, $message, $headers);

    // SPARA LÖSENORDET
    $userinfostorage = fopen("userlogin.txt", "a+");
    fwrite($userinfostorage, $username);
    fwrite($userinfostorage, $password."\n");
    fclose($userinfostorage);

    $_SESSION['emailer'] = "sent";
} else {
    echo ("<p>Fyll i username och email, vi skickar ett genererat lösenord åt dig.</p>");
}

?>