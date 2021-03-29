<?php
if(isset($_POST['fname'])){
print("IM HERE!");
} else {
    print("not here");
}
?>

<?php
$conn = create_conn();

$sql = "SELECT * FROM users";

if ($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();
        //skriv ut endast ett värde (en kolumn en rad -- en cell
        print("<p class='ad'>");
        print("Användare i databasen: " . $row['realname'] . "<br></p>");   

} else {
    print("något gick fel, senaste felet:" . $conn->error);
}