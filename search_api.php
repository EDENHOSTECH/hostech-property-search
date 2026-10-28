<?php

header('Content-Type: application/json; charset=utf-8');

require __DIR__ . "/database.php";

$title = $_GET['title'] ?? "";
$price = $_GET['price'] ?? "";
$status = $_GET['status'] ?? "";

$properties = [];
$error = "";

if($price !== "" && (!is_numeric($price) || (float)$price < 0)){
    $error = "Invalid property price";
}
if($error === "")
{
    $params = [];
    $sql = "SELECT * FROM properties WHERE 1 = 1";
    if($title !== ""){
        $sql .= " AND title LIKE :title";
        $params['title'] = "%". $title. "%";    
    }
    if($price !== ""){
        $sql .= " AND price <= :price";
        $params['price'] = $price;
    }
    if($status !== "")
    {
        $sql .= " AND `status` = :status";
        $params['status'] = $status;
    }

    $sql .= " ORDER BY id DESC";

    $stmt = $pdoConnection->prepare($sql);
    $stmt->execute($params);

    $properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response = [
        "success" => true,
        "count" => count($properties),
        "properties" => $properties
    ];
}
else{
    $response = [
        "success" => false,
        "message" => $error
    ];
}

echo json_encode($response);