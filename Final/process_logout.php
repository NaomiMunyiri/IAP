<?php
session_start();
include_once 'user.php';    
/*include_once 'db.php';
$conn = new DBConnector(); 
$pdo = $conn->connectToDB();*/ 

$user = new User();
$user -> logout($pdo);
exit;
?>