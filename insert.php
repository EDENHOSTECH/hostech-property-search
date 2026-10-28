<?php

require __DIR__ . "/database.php";

$title = "Property in Agege";
$price = 40000000;
$status = "Available";

$params = [];
$params['title'] = $title;
$params['price'] = $price;
$params['status'] = $status;

$query = "INSERT INTO properties (title, price, `status`) VALUES (:title, :price, :status)";
try{

    $stmt = $pdoConnection->prepare($query);
    $stmt->execute($params);

    if($stmt->rowCount() === 1)
        {
            echo "Property Added Successfully";
        }else{
            echo "The property was not inserted";
        }
}catch(PDOException $e)
{
    error_log($e->getMessage());
    echo "Unable to add property.";
}
