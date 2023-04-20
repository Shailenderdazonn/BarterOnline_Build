<?php
include_once ("core.php");

// Retrieve form data
$title = $_POST["title"];
$price = $_POST["price"];
$description = $_POST["description"];
$category = $_POST["category"];
$location = $_POST["location"];
$userid = $_POST["userid"];
$file = $_FILES["file"];

// Connect to the database
$conn = mysqli_connect("localhost", "dazonnco_admin","Admin@1234@#!", "dazonnco_barter_db");

// Set the file path
$filePath = "img/" . time() . "_" . $file["name"];

// Move the uploaded file to the specified folder
move_uploaded_file($file["tmp_name"], $filePath);
$sql = "INSERT INTO user_ads (title, price, description, category, location, userid) VALUES ('$title', '$price', '$description', '$category', '$location', '$userid')";
mysqli_query($conn, $sql); 

// Update the MySQL table with the file path
$sql = "UPDATE user_ads SET file='$filePath' WHERE id=LAST_INSERT_ID()";
mysqli_query($conn, $sql);

// Redirect to the desired URL
header("Location: https://barteronline.ca/products");
exit; // Make sure to exit after the redirect    

?>

