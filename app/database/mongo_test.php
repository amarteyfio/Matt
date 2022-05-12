<?php
require 'mongo_conn.php';


$stud_coll = $client->Users->StudentInfo;

$insertOneResult = $stud_coll->insertOne([
    'username' => 'admin',
    'email' => 'admin@example.com',
    'name' => 'Admin User',
 ]);
 printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
 var_dump($insertOneResult->getInsertedId());



echo "how are you"
?>

