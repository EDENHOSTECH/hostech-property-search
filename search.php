<?php

require __DIR__ . "/database.php";

// $title = $_POST['title'];
// $price = $_POST['price'];
// $status = $_POST['status'];

// $params = [];
// $params['title'] = $title;
// $params['price'] = $price;
// $params['status'] = $status;





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHALLENGE CODES</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>HOSTECH CODE CHALLENGE (CREATE PROPERTIES)</h1>
    <p>All Properties</p>
    <form id="propertyForm">
        <label for="Title">Property Title</label>
        <input type="text" name="title" placeholder="e.g Lekki" id="titleInput">
        <label for="Price">Price</label>
        <input type="number" name="price" min="0" id="priceInput" placeholder="1000000">
        <label for="Status">Status</label>
        <select name="status" id="statusInput">
            <option value="">Select Status</option>
            <option value="Available">Available</option>
            <option value="Sold">Sold</option>
        </select>
        <p id="information"></p>
        <button type="submit" id="searchProperty">Search Property</button>

    </form>

    <!-- Message -->
    <p id="message"></p>

    <!-- Results -->
    <div id="results">

    </div>

    

    <script src="search.js"></script>

</body>
</html>