<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'sistema_de_problemas';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
$conexion = mysqli_connect('localhost', 'root', '', 'sistema_de_problemas');
?>
