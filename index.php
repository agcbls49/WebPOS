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
    <!-- JS -->
    <link rel="stylesheet" type="js" href="script.js">
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
            <tbody>
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
            <div class="cell"><button class="button is-size-5">Hamburger</button></div>
            <div class="cell"><button class="button is-size-5">Cheese Burger</button></div>
            <div class="cell"><button class="button is-size-5">Fish Fillet Sandwich</button></div>
            <div class="cell"><button class="button is-size-5">Chicken Sandwich</button></div>
            <div class="cell"><button class="button is-size-5">Spicy Veggie Wrap</button></div>
            <div class="cell"><button class="button is-size-5">Chicken Wrap</button></div>
            <div class="cell"><button class="button is-size-5">Chicken Salad Wrap</button></div>
            <div class="cell"><button class="button is-size-5">Small Fries</button></div>
            <div class="cell"><button class="button is-size-5">Medium Fries</button></div>
            <div class="cell"><button class="button is-size-5">Large Fries</button></div>
            <div class="cell"><button class="button is-size-5">Soft Serve</button></div>
            <div class="cell"><button class="button is-size-5">Apple Pie</button></div>
            <div class="cell"><button class="button is-size-5">Sundae</button></div>
            <div class="cell"><button class="button is-size-5">Coca Cola</button></div>
            <div class="cell"><button class="button is-size-5">Sprite</button></div>
        </div>
    </div>

    
</body>
</html>