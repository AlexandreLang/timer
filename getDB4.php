<?php

$sec1 = $_POST['sec'];
$min1 = $_POST['min'];
$h1 = $_POST['h'];

require_once 'dbconfig.php';

$dsn= "mysql:host=$host;dbname=$db";

try{
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $username, $password);

    $result = $conn->prepare("SELECT * FROM counter ORDER BY id ASC");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
        $id = $row['id'];
        switch ($id) {
            case 1:
                $sec1 = $row['sec1'];
                $min1 = $row['min1'];
                $h1 = $row['h1'];
                break;
            case 2:
                $sec2 = $row['sec1'];
                $min2 = $row['min1'];
                $h2 = $row['h1'];
                break;
            case 3:
                $sec3 = $row['sec1'];
                $min3 = $row['min1'];
                $h3 = $row['h1'];
                break;
            case 4:
                $sec4 = $row['sec1'];
                $min4 = $row['min1'];
                $h4 = $row['h1'];
                break;
        }
    }

    echo $sec4.' '.$min4.' '.$h4;

}catch (PDOException $e){
    // report error message
    echo $e->getMessage();
}
