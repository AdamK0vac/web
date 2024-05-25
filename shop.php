<?php
include "./php/navigation.php";

$mysqli = require __DIR__ . "/php/database.php";

$sql = "SELECT * FROM animals";
$result = $mysqli->query($sql);

$isAdmin = isset($_SESSION["user_id"]) && $_SESSION["user_id"] == 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <link rel="stylesheet" href="./css/shop.css">
    <script src="./js/shop.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/tofsjonas/sortable@latest/sortable.min.js"></script>
    <title>Shop</title>
</head>
<body>
    <h1>Shop</h1>
    
    <?php if($isAdmin):?>
        <div class="container">
            <div class="buttons">
                <button onclick="showInsertForm()">Insert</button>
                <button onclick="showDeleteForm()">Delete</button>
                <button onclick="hide()">
                    <img class="close-form" src="./assets/icons/close.png" alt="close">
                </button>
            </div>
            <div class="forms">
                <form class="form insert-form" action="./php/insert.php" method="post">
                    <div class="form">
                        <input type="text" name="name" placeholder="name">
                        <input type="text" name="gender" placeholder="gender">
                        <input type="text" name="photo" placeholder="img-link">
                        <input type="text" name="quantity" placeholder="in-stock">
                        <input type="text" name="price" placeholder="price">
                        <button type="submit">Add</button>
                    </div>
                </form>
                <form class="form delete-form" action="./php/delete.php" method="post">
                    <div class="form">
                        <input type="text" name="name" placeholder="Delete by Name">
                        <button type="submit">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    <?php else:?>
        <p>Sorting is possible by clicking on column headers.</p>
    <?php endif; ?>
    
    <form id="cartForm" action="./cart.php" method="post">
        <table class="sortable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Photo</th>
                    <th>Stock</th>
                    <th>Price (€)</th>
                    <th class="no-sort">Amount</th>
                    <th class="no-sort">Cart</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = $result->fetch_assoc())
                {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>". $row["name"] . "</td>
                            <td>" . $row["gender"] . "</td>
                            <td><a href='#' onclick='showImage(\"" . $row["photo"] . "\")'>image</a></td>
                            <td>" . $row["quantity"] . "</td>
                            <td>" . $row["price"] . "</td>
                            <td><input type='number' name='amount[".$row['id']."]' value='0' min='0' max='".$row['quantity']."'></td>
                            <td><button type='button' onclick='addToCart(".$row['id'].")'>Add to Cart</button></td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="cart-button">
            <button type="submit">Submit Cart</button>
        </div>
    </form>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="modal-image">
        </div>
    </div>

</body>
</html>
