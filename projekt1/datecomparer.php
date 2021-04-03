<form action="index.php" method="get">
            <p>Välj en dag: <input type="text" name="inDay" /></p>
            <p>Välj en månad: <input type="text" name="inMonth" /></p>
            <p>Välj ett år: <input type="text" name="inYear" /></p>
            <p><input type="submit" value="input"/></p>
            </form>

            <?php
if (isset($_REQUEST['inDay']) && isset($_REQUEST['inMonth'])) {

    $dag = test_input($_GET["inDay"]);
    $manad = test_input($_GET["inMonth"]);
    $artal = test_input($_GET["inYear"]);

    if($dag >= 1 && $dag < 32 && $manad >= 1 && $manad < 13 && $artal >= 0){

    $userinputdate = mktime(0, 0, 0, $manad, $dag, $artal);
    print("<h3>Du valde datumet: " . gmdate("d.m.Y", $userinputdate) . "</h3>");
    $userinputdayname = swedishdays(gmdate("l", $userinputdate));

    print("<p>Ja du, det var ju en " . $userinputdayname . " som du lade in i fältet</p>");
    $currentdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

    if ($userinputdate > $currentdate) {
        //Användaren lade in framtids datum
        $datediff = ($userinputdate - $currentdate);
        print("<p>Det är " . daysextract($datediff) . "</p>");
        print("<p>Tills det datum du valde</p>");
        } else {
        //Användaren lade in ett datum från tidigare datum
        $datediff = ($currentdate - $userinputdate);
        print("<p>Det har gått " . daysextract($datediff) . "</p>");
        print("<p>Från det datum du valde</p>");
        }
    } else {
        echo("<p>OBS det måste vara ett giltigt datum</p>");
    }
} else {
    echo("<p>Ge ett datum (år 0 och framåt)</p>");
}
?>