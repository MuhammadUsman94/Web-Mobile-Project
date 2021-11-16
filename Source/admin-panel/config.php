<?php
require_once __DIR__ . "/vendor/autoload.php";
use MongoDB\BSON\ObjectId;
$client = new MongoDB\Client('mongodb+srv://dbUser:Admin123!@cluster0.aikdi.mongodb.net/restaurants?retryWrites=true&w=majority');
