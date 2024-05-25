<?php
    session_start();

    // Connect to the database
    $mysqli = require __DIR__ . "/database.php";

    // Check if user is logged in and user_id is set
    if(isset($_SESSION["user_id"])) {
        // Prepare and execute query to get user's name
        $stmt = $mysqli->prepare("SELECT username FROM user WHERE id = ?");
        $stmt->bind_param("i", $_SESSION["user_id"]);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the user's name
        $user = $result->fetch_assoc();
        $username = $user['username'];
    }
?>
<style>
    .navbar {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    li {
        display: flex;
        align-items: center;
    }

    .links {
        color: white;
        text-decoration: none;
    }

    .shopping-cart {
        width: 24px;
        height: auto;
        filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);
    }

    .username{
        color: aqua;
    }
</style>
<body>
    <ul class="navbar">
        <li>
            <a class="links" href="./index.php">Home</a>
        </li>
        <li>
            <a class="links" href="./about.php">About</a>
        </li>
        <li>
            <a class="links" href="./contact.php">Contact</a>
        </li>
        <li>
            <a class="links" href="./shop.php">Shop</a>
        </li>
        <li>
            <a class="links" href="./cart.php">
                <img src="./assets/icons/shopping-cart.png" class="shopping-cart" alt="shopping-cart">
            </a>
        </li>
        <li>
            <?php if(isset($_SESSION["user_id"])): ?>
                <p>Logged as <span class="username"><?php echo "\t" . $username; ?></span> | <a href="./php/logout.php">Logout</a></p>
            <?php else: ?>
                <p><a href="./php/login.php">Sign In</a> or <a href="./signup.html">Sign Up</a></p>
            <?php endif; ?>
        </li>
    </ul>
    <hr>
</body>