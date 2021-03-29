<?php
session_start();

// Remove whitespaces, remove extra slashes, and convert to safe html characters
// USE FOR ALL USER INPUT
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function prefString($numb){
    $prefarray = array('Man', 'Kvinna', 'Annan', 'Båda', 'Allt');
    return $prefarray($numb);

}

// Sets up connection to database - use $conn = create_conn(); to open connection and $conn->close();
function create_conn()
{
    mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

    //Databaskonfiguration
    $servername = "localhost";
    $username = "irjalajo";
    $password = "63JFTL4yhh";
    $dbname = "irjalajo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    

    // FIX UTF8 encoding
    $conn->set_charset("UTF-8");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}
