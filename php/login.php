<?php
$is_invalid = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    if($user)
    {
        if(password_verify($_POST["password"], $user["password"]))
        {
            session_start();

            $_SESSION["user_id"] = $user["id"];

            header("Location: ../index.php");
            exit;
        }
    }
}
$is_invalid = true

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Sign In</title>
</head>
<body>
    <div class="header">
        <h1>Sign In</h1>
    </div>

    <div class="validation">
        <?php if($is_invalid): ?>
            <em>Invalid Login</em>
        <?php endif; ?>
    </div>

    <div class="form">
        <form method="post">
            <input 
                type="email" 
                id="email" 
                name="email"
                autocomplete="off"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"
                placeholder="Email"/>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="password"/>
            <p>Want to Sign Up? <a href="../signup.html">Sign Up</a></p>
            <div class="button">
                <button type="submit">Sign In</button>
            </div>
        </form>
    </div>
</body>
</html>