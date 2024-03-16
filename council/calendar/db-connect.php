<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   ='uifrdb_2';

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}