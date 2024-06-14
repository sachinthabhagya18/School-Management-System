<?php

session_start();

require "connection.php";

$uid = $_SESSION["t"]["t_email"];

$id = $_GET["id"];


$product = Database::search("SELECT * FROM `lessonnote` WHERE `lid`='".$id."' ");

$n =$product->num_rows;

if($n == 1){
    $row = $product->fetch_assoc();

    $_SESSION["l"] = $row;

    echo "success";

} else {
    echo "Error";
}

?>