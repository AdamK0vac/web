<?php

    include "./php/navigation.php";

    $mysqli = require __DIR__ . "/php/database.php";

    $sql = "SELECT * FROM animals";
    $result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>Shop</title>
</head>
<body>
    <h1>Shop</h1>

    <table class="sortable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Photo</th>
                <th>Stock</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php

                while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $row["id"] . "</td><td>". $row["name"] . "</td><td>" . $row["gender"] . "</td><td>" . "NULL" . "</td><td>" . $row["quantity"] . "</td><td>" . $row["price"] . "</td></tr>";
                }

            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/gh/tofsjonas/sortable@latest/sortable.min.js"></script>
</body>
</html>