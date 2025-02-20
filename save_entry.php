<?php
header('Content-Type: application/json');
include 'db_connect.php'; // Connects to the database

$data = json_decode(file_get_contents("php://input"), true);
if (isset($data['food']) && isset($data['weight'])) {
    $food = $data['food'];
    $weight = floatval($data['weight']);

    $stmt = $conn->prepare("INSERT INTO meal_diary (food_name, weight, date) VALUES (?, ?, NOW())");
    $stmt->bind_param("sd", $food, $weight);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
