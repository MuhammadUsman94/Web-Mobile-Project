<?php

$hotel_id = $_GET['id'];


if (empty($hotel_id)) {
   header("Location: http://localhost/online-food//hotels.php");
   die();
}


include 'config.php';
$collection = $client->restaurants->hotels;
$hotel = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($hotel_id)]);
header("Location: http://localhost/online-food//hotels.php");
?>
