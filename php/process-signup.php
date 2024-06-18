<?php
// ------------------------------------------------------ Username validation
if(empty($_POST["username"]))
{
    die("Name is required");
}

// ------------------------------------------------------ Email validation
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
{
    die("Valid email required");
}

// ------------------------------------------------------ Password validation
if(strlen($_POST["password"]) < 8)
{
    die("Password must be longer than 8 chars");
}
if(!preg_match("/[a-z]/i", $_POST["password"]))
{
    die("Password needs at least one character");
}
if(!preg_match("/[0-9]/", $_POST["password"]))
{
    die("Password needs at least one number");
}
if($_POST["password"] != $_POST["checker"])
{
    die("Passwords don't match!");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// ------------------------------------------------------ Connection to database
$mysqli = require __DIR__ . "/database.php";

// ------------------------------------------------------ Payload Insertion | Injection secure
$sql = "INSERT INTO user (username, email, password) 
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
    die("SQL error: " . $mysql->error);
}

$stmt->bind_param("sss",
                  $_POST["username"],
                  $_POST["email"],
                  $password_hash);

// ------------------------------------------------------ Duplicate validation          
try
{
    $stmt->execute();
    header("Location: ./success.php"); // Redirection to main site
    exit;
}
catch(mysqli_sql_exception $e)
{
    if($e->getCode() == 1062)
    {
        die("Email already taken!");
    }
    else
    {
        die("Execute error: " . $e->getMessage);
    }
}

// ------------------------------------------------------ Output