<?php


if (isset($_REQUEST['sort']) && $_GET['sort'] == "rich") {
   
    $prefdrop = $_GET['pref'];
    // koppla oss till databasen
    $conn = create_conn();
    // Skapa SQL kommando
    $sql = "SELECT * FROM users WHERE preference = $prefdrop ORDER BY users.salary DESC";
    fetchAndWrite($sql);
    // Kör sql kommando
    $result = $conn->query($sql);

}

else if (isset($_REQUEST['sort']) && $_GET['sort'] == "poor") {

    $prefdrop = $_GET['pref'];
    // koppla oss till databasen
    $conn = create_conn();
    // Skapa SQL kommando
    $sql = "SELECT * FROM users WHERE preference = $prefdrop ORDER BY users.salary ASC";
    fetchAndWrite($sql);
    $result = $conn->query($sql);

}

else if (isset($_REQUEST['sort']) && $_GET['sort'] == "pop") {

    $prefdrop = $_GET['pref'];
    // koppla oss till databasen
    $conn = create_conn();
    // Skapa SQL kommando
    $sql = "SELECT * FROM users WHERE preference = $prefdrop ORDER BY users.likes DESC";
    fetchAndWrite($sql);
    $result = $conn->query($sql);

}

else if (isset($_REQUEST['sort']) && $_GET['sort'] == "notpop") {

    $prefdrop = $_GET['pref'];
    // koppla oss till databasen
    $conn = create_conn();
    // Skapa SQL kommando
    $sql = "SELECT * FROM users WHERE preference = $prefdrop ORDER BY users.likes ASC";
    fetchAndWrite($sql);
    $result = $conn->query($sql);

}


function fetchAndWrite($sql) {
    $count = 0;
    $max = 6;
    // Kopplar till databasen
    $conn = create_conn();

    if ($result = $conn->query($sql)) {
        //skapa en while loop för att hämta varje rad
        while ($row = $result->fetch_assoc() and ($count < $max)) {
            $prefArr = array('Manlig', 'Kvinnliga', 'Annan', 'Båda', 'Alla');
            $prefGet = $row['preference'];
            //skriv ut endast ett värde (en kolumn en rad -- en cell)
            print("<div class='ad'><ul>");
            print("<h3>Namn: </h3><li>" . $row['realname'] . "</li>");
            print("<h3>Årslön: </h3><li>" . $row['salary'] . "</li>");
            $prefchoice = $prefArr[$prefGet-1];
            print("<h3>Preferens: </h3><li>" . $prefchoice . "</li><br>");
            print("<a href='./profile.php?user=".$row['username']."'>Gå till profilen</a></ul></div>");
            $count++;
        }

    } else {
        print("något gick fel, senaste felet:" . $conn->error);
    }

}
