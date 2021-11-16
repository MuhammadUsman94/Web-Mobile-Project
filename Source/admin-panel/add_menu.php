<?php
$hotel_id = $_POST['hotel_id'];

$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$hotel_id = $_POST['hotel_id'];

#creating the id
$key = random_int(0, 999999);
$key = str_pad($key, 6, 0, STR_PAD_LEFT);



include 'config.php';
$collection = $client->restaurants->hotels;
$hotel = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($hotel_id)]);

$new_task = array(
  "id" => $key,
  "name" => $name,
  "desc" => $desc,
  "price" => $price,
);

$collection->updateOne(
  array("_id" => new MongoDB\BSON\ObjectID($hotel_id)), 
  array('$push' => array("menu" => $new_task))
);
header("Location: http://localhost/online-food//view_details.php?id=$hotel_id");





