<?php
include 'config.php';
$collection = $client->restaurants->users;
$users = $collection->find([]);
$id = $_POST['id'];
$status = $_POST['status'];
$collection->updateOne(
   ['orders._id' => new MongoDB\BSON\ObjectID($id)],
   ['$set' => ['orders.$.status' => $status]]
);
echo 'success';

