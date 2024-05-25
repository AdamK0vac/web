<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <link rel="stylesheet" href="./css/cart.css">
    <title>Cart</title>
</head>
<body>
<?php
    include "./php/navigation.php";

    $mysqli = require __DIR__ . "/php/database.php";

    if (isset($_SESSION["user_id"]))
    {
        $userId = $_SESSION["user_id"];
        $stmt = $mysqli->prepare("SELECT username, email FROM user WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $username = $user["username"];
        $email = $user["email"];
    } 
    else 
    {
        $username = "Guest";
        $email = "guest@example.com";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST["amount"])) 
        {
            // Initialize an empty array to store cart items
            $cartItems = array();

            // Process the cart data
            foreach ($_POST["amount"] as $itemId => $quantity) 
            {
                // Skip items with a quantity of zero
                if ($quantity == 0) 
                {
                    continue;
                }

                // Add the item ID and quantity to the cart items array
                $cartItems[] = array(
                    "id" => $itemId,
                    "quantity" => $quantity
                );
            }

            if (!empty($cartItems))
            {
                // Start the cart table
                echo "<h2>Order</h2>";
                echo "<form method='post' action=''>";

                echo "<table>";
                echo "<tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Contact</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price Per Item</th>
                        <th>Total Per Item</th>
                    </tr>";

                $totalPricePerOrder = 0;
                $orderId = 1;

                $itemsList = '';

                // Display cart items
                foreach ($cartItems as $index => $item) 
                {
                    // Fetch product details from the database
                    $stmt = $mysqli->prepare("SELECT name, price FROM animals WHERE id = ?");
                    $stmt->bind_param("i", $item["id"]);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    // Add item details to the items list
                    $itemsList .= $row["name"] . " (Quantity: " . $item["quantity"] . "), ";

                    // Display user information only for the first row
                    if ($index === 0)
                    {
                        echo "<tr>";
                        echo "<td rowspan='" . count($cartItems) . "'>" . $orderId . "</td>"; // Order ID
                        echo "<td rowspan='" . count($cartItems) . "'>" . $username . "</td>"; // Username
                        echo "<td rowspan='" . count($cartItems) . "'>" . $email . "</td>"; // Email
                    }

                    // Display product details
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $item["quantity"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>"; // Price per item
                    $totalPricePerItem = $row["price"] * $item["quantity"];
                    echo "<td>" . $totalPricePerItem . "</td>";

                    echo "</tr>";

                    // Total price per order
                    $totalPricePerOrder += $totalPricePerItem;

                    // Increment order ID
                    $orderId++;
                }

                echo "<tr><td colspan='6'>Total Sum</td><td>" . $totalPricePerOrder . "</td></tr>"; // Total sum

                echo "</table>"; // closing table

                $itemsList = rtrim($itemsList, ", ");

                echo "<input type='hidden' name='total_price' value='" . $totalPricePerOrder . "'>";
                echo "<input type='hidden' name='items_list' value='" . $itemsList . "'>";
                echo "<div class='payment-button'>";
                echo "<button type='submit' name='submit_order'>Proceed to Payment</button>";
                echo "</div>";
                echo "</form>"; 
            } 
            else 
            {
                echo "Your cart is empty!";
            }
        } 
        else 
        {
            echo "No items in the cart!";
        }
    } 
    else 
    {
        echo "Cart form not submitted!";
    }

// ------------------------------------------------------------------------------------------------------------ Inserting order 
    if (isset($_POST['submit_order']))
    {
        $totalPrice = $_POST['total_price'];
        $itemsList = $_POST['items_list'];
        
        $stmt = $mysqli->prepare("INSERT INTO orders (user_id, total_price, items_list) VALUES (?, ?, ?)");
        $stmt->bind_param("ids", $userId, $totalPrice, $itemsList);
        $stmt->execute();
        $stmt->close();
        
        echo "<p>Order submitted successfully!</p>";
    }
?>
</body>
</html>