<?php

require __DIR__ . "/database.php";

$price = 38000000;
$id = 1;
$status = "Sold";
$params = [];

$params['price'] = $price;
$params['status'] = $status;
$params['id'] = $id;

$query = "UPDATE properties SET price = :price, `status` = :status WHERE id = :id";

try{
    
    $stmt = $pdoConnection->prepare($query);
    $stmt->execute($params);

    if($stmt->rowCount() === 1)
        {
            echo "Property Updated Successfully!";
        }
        else{
            echo "Unable to update property.";
        }


}catch(PDOException $e)
{
    error_log($e->getMessage());
    echo "Unable to update property";
}



?>