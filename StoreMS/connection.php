<?php
    $hostname='localhost:4306';
    $username='root';
    $password='';
    $dbname='store_db';

    $conn =new mysqli($hostname,$username,$password,$dbname);
    if ($conn->connect_error){
        die("connection faield:" .$conn->connect_error);
        
    } 


?>
