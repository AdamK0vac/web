<?php
    session_start();
?>
<style>
    .navbar {
        display: flex;
        justify-content: space-evenly;
    }

    li {
        display: flex;
        align-items: center;
    }

    .links {
        color: White;
    }
</style>
<body>
    <ul class="navbar">
        <li>
            <a class="links" href="./index.php">Home</a>
        </li>
        <li>
            <a class="links" href="./shop.php">Shop</a>
        </li>
        <li>
            <?php if(isset($_SESSION["user_id"])): ?>

                <p>You are logged in | <a href="./php/logout.php">logout</a></p>

            <?php else: ?>

                <p><a href="./php/login.php">Sign In</a> or <a href="./signup.html">Sign Up</a></p>

            <?php endif; ?>
        </li>
    </ul>
    <hr>
</body>