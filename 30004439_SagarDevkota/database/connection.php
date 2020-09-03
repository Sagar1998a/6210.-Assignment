<?php
$host="localhost";
$db="a3000443_mi5";
$user="a3000443_developer";
$pwd="toiohomai1234";

$dsn="mysql:host=$host; dbname=$db";
try
{
    $conn= new PDO($dsn,$user,$pwd);
}
catch(PDOException $error)
{
echo "<h3> Error </h3>" . $error->getMessage(); 
}
?>