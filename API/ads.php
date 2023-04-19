<?php

include_once ("core.php");
$connect = mysqli_connect("localhost", "root","", "barter_db");
// $sql = "SELECT * FROM user_ads ORDER BY ID DESC";
$sql = "SELECT user_ads.id,user_ads.title,user_ads.category,user_ads.location,user_ads.price,user_ads.description,user_ads.file,user_detail.name,user_detail.mobile 
FROM user_ads LEFT JOIN user_detail ON user_ads.userid= user_detail.ID";
$result = mysqli_query($connect, $sql);
$json_array = array();
while ($row = mysqli_fetch_assoc($result)){
$json_array[] = $row;
}

echo json_encode($json_array);
?>