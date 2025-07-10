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
    <!-- Title Bar -->
    <div class="title_bar">
        <h1>WebPOS - Fast Food Point of Sale System</h1>
    </div>
    <!-- Order List -->
    <div class="order_list">
        <table class="table">
            <thead>
                <tr>Order_ID</tr>
                <tr>Item</tr>
                <tr>Quantity</tr>
                <tr>Price</tr>
            </thead>
            <tbody>
                <td>3</td>
                <td>Small Fries</td>
                <td>2</td>
                <td>9.98</td>
                <td>
                    <button class="updateBtn"><a href="update">Update</a></button>
                    <button class="deleteBtn"><a href="delete">Delete</a></button>
                </td>
            </tbody>
        </table>
    </div>
    <!-- Order buttons -->
    <div class="btn_grid grid has-text-white">
        <!-- Sandwiches -->
        <div class="cell"><button class="button">Hamburger</button></div>
        <div class="cell"><button class="button">Cheese Burger</button></div>
        <div class="cell"><button class="button">Fish Fillet Sandwich</button></div>
        <div class="cell"><button class="button">Chicken Sandwich</button></div>
        <div class="cell"><button class="button">Spicy Veggie Wrap</button></div>
        <div class="cell"><button class="button">Chicken Wrap</button></div>
        <div class="cell"><button class="button">Chicken Salad Wrap</button></div>
        <!-- French Fries -->
        <div class="cell"><button class="button">Small Fries</button></div>
        <div class="cell"><button class="button">Medium Fries</button></div>
        <div class="cell"><button class="button">Large Fries</button></div>
        <!-- Desserts -->
        <div class="cell"><button class="button">Soft Serve</button></div>
        <div class="cell"><button class="button">Apple Pie</button></div>
        <div class="cell"><button class="button">Sundae</button></div>
        <!-- Drinks -->
        <div class="cell"><button class="button">Coca Cola</button></div>
        <div class="cell"><button class="button">Sprite</button></div>
    </div>
    
</body>
</html>