<?php
// ------------------------------------------------------ Variables
$name = $_POST["name"];

// ------------------------------------------------------ Ensure database connection
$mysqli = require __DIR__ . "/database.php";

// ------------------------------------------------------ SQL command setup
$sql = "DELETE FROM animals 
        WHERE name = ?";

// ------------------------------------------------------ Injection security
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("s", $name);

// ------------------------------------------------------ Execute
$result = $stmt->execute();

if ($result !== false) {
    if ($stmt->affected_rows > 0) {
        echo "Deletion successful!";
    } else {
        echo "No rows were deleted. The name '$name' does not exist.";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();