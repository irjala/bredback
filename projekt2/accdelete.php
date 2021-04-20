<?php
    $passtoiframe = $_SESSION['user'];
?>

<label for="trigger">Delete account</label>
<input id="trigger" type="checkbox">
<div class="box">
    <h3>Skriv ditt lösenord och tryck DELETE</h3>
        <?php echo "
        <iframe name='foo' style='display:none;'></iframe>
            <form action='iframehack.php' method='post' target='foo'>
            <input type='text' name='delpw'>
            <input type='submit' value='Delete'>
            <input type='hidden' name='accdeletion' value=" .$passtoiframe .">            
        </form>"
    ?>

    <h4>VARNING - Din profilsida tas bort</h4>
</div>