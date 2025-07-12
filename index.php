<?php
// Handle AJAX requests for adding items
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add_item') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "webpos";

    $connection = new mysqli($servername, $username, $password, $database);

    if($connection->connect_error){
        die(json_encode(['success' => false, 'error' => 'Connection Failed: ' . $connection->connect_error]));
    }

    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO orderlisttable (Item, Quantity, Price) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sid", $item, $quantity, $price);
    
    if($stmt->execute()) {
        $new_id = $connection->insert_id;
        echo json_encode([
            'success' => true,
            'id' => $new_id,
            'item' => $item,
            'quantity' => $quantity,
            'price' => $price
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => $connection->error]);
    }
    
    $stmt->close();
    $connection->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" class="has-background-dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>WebPOS</title>
</head>
<body>
    <div class="title_bar">
        <h1>WebPOS - Fast Food Point of Sale System</h1>
    </div>

    <div class="main-content">
    <!-- Order Table -->
        <div class="order_list">
            <table class="table">
            <thead>
                <tr>
                <th>Order_ID</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                <!-- Server Fetch Code -->
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "webpos";

                $connection = new mysqli($servername, $username, $password, $database);

                // connect to mysql server
                if($connection->connect_error){
                    die("Connection Failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM orderlisttable";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid Query: " . $connection->error);
                }

                while($row = $result->fetch_assoc()){
                    echo'<tr>
                        <td>' . $row["ID"] . '</td>
                        <td>' . $row["Item"] . '</td>
                        <td>' . $row["Quantity"] . '</td>
                        <td>' . $row["Price"] . '</td>
                        <td>
                            <div class="buttons is-right is-fullwidth">
                                <button class="button is-medium is-warning action-button">Update</button>
                                <button class="button is-medium is-danger action-button">Delete</button>
                            </div>
                            </td>
                    </tr>';
                }
                ?>
            </tbody>
            </table>
        </div>

        <!-- Menu Buttons -->
        <div class="btn_grid is-size-3">
            <div class="cell"><button class="button is-size-5" onclick="addItem('Hamburger', 1, 5.99)">Hamburger</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Cheese Burger', 1, 6.99)">Cheese Burger</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Fish Fillet Sandwich', 1, 7.49)">Fish Fillet Sandwich</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Chicken Sandwich', 1, 6.49)">Chicken Sandwich</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Spicy Veggie Wrap', 1, 5.49)">Spicy Veggie Wrap</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Chicken Wrap', 1, 6.99)">Chicken Wrap</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Chicken Salad Wrap', 1, 7.99)">Chicken Salad Wrap</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Small Fries', 1, 2.49)">Small Fries</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Medium Fries', 1, 3.49)">Medium Fries</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Large Fries', 1, 4.49)">Large Fries</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Soft Serve', 1, 2.99)">Soft Serve</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Apple Pie', 1, 3.99)">Apple Pie</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Sundae', 1, 4.99)">Sundae</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Coca Cola', 1, 1.99)">Coca Cola</button></div>
            <div class="cell"><button class="button is-size-5" onclick="addItem('Sprite', 1, 1.99)">Sprite</button></div>
        </div>
    </div>

    <script>
    function addItem(itemName, quantity, price) {
        // Create FormData object
        const formData = new FormData();
        formData.append('action', 'add_item');
        formData.append('item', itemName);
        formData.append('quantity', quantity);
        formData.append('price', price);
        
        // Send AJAX request
        fetch('', {  // Empty string means current page
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Add new row to the table without refreshing
                addRowToTable(data.id, data.item, data.quantity, data.price);
                // Optional: Show success message
                console.log('Item added successfully!');
            } else {
                alert('Error adding item: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error adding item');
        });
    }

    function addRowToTable(id, item, quantity, price) {
        const tbody = document.getElementById('orderTableBody');
        const newRow = document.createElement('tr');
        
        newRow.innerHTML = `
            <td>${id}</td>
            <td>${item}</td>
            <td>${quantity}</td>
            <td>${price}</td>
            <td>
                <div class="buttons is-right is-fullwidth">
                    <button class="button is-medium is-warning action-button">Update</button>
                    <button class="button is-medium is-danger action-button">Delete</button>
                </div>
            </td>
        `;
        
        tbody.appendChild(newRow);
    }
    </script>
</body>
</html>