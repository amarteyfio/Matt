<?php
use MongoDB\Client;

require '../../vendor/autoload.php';

$client = new MongoDB\Client(
    "mongodb+srv://Omieibi:iUXEcoZt1hDWYbXI@matt.plnfh.mongodb.net/Users?retryWrites=true&w=majority"
);
$db = $client->Users;

?>






