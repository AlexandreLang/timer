<?php

$sec1 = $_POST['sec'];
$min1 = $_POST['min'];
$h1 = $_POST['h'];

require_once 'dbconfig.php';

$dsn= "mysql:host=$host;dbname=$db";

try{
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $username, $password);

    $sql = "UPDATE counter SET sec1=?, min1=?, h1=? WHERE id=4";
    $conn->prepare($sql)->execute([$sec1, $min1, $h1]);

}catch (PDOException $e){
    // report error message
    echo $e->getMessage();
}
