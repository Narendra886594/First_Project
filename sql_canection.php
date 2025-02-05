<?php
$host = 'localhost';
$name = 'root';
$password = null; 
$database = 'project';
 $dsn = "mysql:host=$host;dbname=$database";
 $pdo = new PDO($dsn, $name, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
?>
