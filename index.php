<?php
require __DIR__ . "/database.php";

$query = "SELECT * FROM properties";

$stmt = $pdoConnection->prepare($query);
$stmt->execute();

$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHALLENGE CODES</title>
</head>
<body>
    
    <h1>HOSTECH CODE CHALLENGE (READ PROPERTIES)</h1>
    <p>All Properties</p>

    <?php foreach($properties as $property): ?>
        <article>
            <h2><?= htmlspecialchars($property['title']); ?></h2>
            <p>Price: &#8358 <?= number_format((float)($property['price']), 2) ?></p>    
            <span>Status: <?= htmlspecialchars($property['status']); ?></span>
        </article>
    <?php endforeach; ?>
    <?php ?>
    <?php ?>


    <p id="message"></p>

    


</body>
</html>