<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once ("core.php");

// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barter_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from database
$sql = "SELECT c.id as category_id, c.name as category_name, s.id as subcategory_id, s.name as subcategory_name FROM categories c JOIN subcategories s ON c.id = s.category_id ORDER BY c.id ASC, s.id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $categories = array();
    $current_category_id = -1;

    while ($row = $result->fetch_assoc()) {
        // Check if category has changed
        if ($row['category_id'] != $current_category_id) {
            $current_category_id = $row['category_id'];
            $current_category = array(
                "id" => $row['category_id'],
                "name" => $row['category_name'],
                "subcategories" => array()
            );
            array_push($categories, $current_category);
        }

        // Add subcategory to current category
        array_push($current_category["subcategories"], array(
            "id" => $row['subcategory_id'],
            "name" => $row['subcategory_name']
        ));
    }

    // Output the data as JSON
    echo json_encode($categories);
} else {
    echo "0 results";
}

$conn->close();
?>
