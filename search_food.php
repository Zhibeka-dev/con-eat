<?php
header('Content-Type: application/json');
include 'db_connect.php'; 

if (isset($_GET['food']) && isset($_GET['weight'])) {
    $food = $_GET['food'];
    $weight = floatval($_GET['weight']);

    $stmt = $conn->prepare("SELECT calories, protein, carbs, fats FROM food_table WHERE food_name = ?");
    $stmt->bind_param("s", $food);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $multiplier = $weight / 100;
        echo json_encode([
            "success" => true,
            "calories" => round($row['calories'] * $multiplier, 2),
            "protein" => round($row['protein'] * $multiplier, 2),
            "carbs" => round($row['carbs'] * $multiplier, 2),
            "fats" => round($row['fats'] * $multiplier, 2),
        ]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
