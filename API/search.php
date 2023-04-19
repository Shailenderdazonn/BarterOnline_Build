<?php
// include_once ("core.php");
// $host = "localhost";  
// $user = "root";  
// $password = '';  
// $db_name = "barter_db";  
// $conn = mysqli_connect($host, $user, $password, $db_name);  
// if(mysqli_connect_errno()) {  
//     die("Failed to connect with MySQL: ". mysqli_connect_error());  
// }  


// if(isset($_POST['submit'])){
// $category = $_POST['category'];
// $location = $_POST["location"];
// // $sql =" SELECT * FROM `user_ads` WHERE  `category`='category' ";
// // select category, location from user_ads";
// $sql="SELECT * FROM `user_ads` W HERE `location`='$location' && `category`='$category'";
// $result = mysqli_query($conn, $sql); 
// }


 
//     $count = mysqli_num_rows($result);            
//     if($count == 1){  
//          header('Location: http://localhost:3000/products');
       
//     }  
    
    
// }





include_once ("core.php");

// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barter_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query based on request parameters
$sql = "SELECT * FROM user_ads WHERE 1=1";
if (isset($_GET["location"])) {
  $location = $_GET["location"];
  $sql .= " AND location = '$location'";
}
if (isset($_GET["category"])) {
  $category = $_GET["category"];
  $sql .= " AND category = '$category'";
}
if (isset($_GET["min_price"])) {
  $min_price = $_GET["min_price"];
  $sql .= " AND price >= $min_price";
}
if (isset($_GET["max_price"])) {
  $max_price = $_GET["max_price"];
  $sql .= " AND price <= $max_price";
}

// Execute SQL query and store results in an array
$result = $conn->query($sql);
$ads = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $ads[] = $row;
  }
}

// Convert array to JSON and output
header("Content-Type: application/json");
echo json_encode($ads);

// Close database connection
$conn->close();


?>

