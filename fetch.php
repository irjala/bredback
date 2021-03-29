<?php
// Koppla oss till databasen
$conn = create_conn();
// Skapa SQL kommando
$sql = "SELECT * FROM users";
// Kör SQL kommando på databasen
$result = $conn->query($sql);

// Hämta en rad frn den associativa arrayn (dvs result)
$row = $result->fetch_assoc();
// skriv ut endast ett värde (en kolumn en rad -- en cell)
print("Användare i databasen: " . $row['username'] . "<br>");
