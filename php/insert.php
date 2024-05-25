<?php
// ------------------------------------------------------ Form data
$name = $_POST["name"];
$gender = $_POST["gender"];
$photo = $_POST["photo"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];

// ------------------------------------------------------ Ensure database connection
$mysqli = require __DIR__ . "/database.php";

// ------------------------------------------------------ SQL command setup
$sql = "INSERT INTO animals (name, gender, photo, quantity, price)
        VALUES (?, ?, ?, ?, ?);";

// ------------------------------------------------------ Injection security
$stmt = $mysqli->prepare($sql);

if(!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssii", $name, $gender, $photo, $quantity, $price);

// ------------------------------------------------------ Execute
$result = $stmt->execute();
if($result) {
    echo "Insertion successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();