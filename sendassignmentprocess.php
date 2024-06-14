<?php

session_start();

require "connection.php";

$uid = $_SESSION["t"]["t_email"];

$id = $_GET["id"];


$product = Database::search("SELECT * FROM `assignment` WHERE `a_id`='".$id."' ");

$n =$product->num_rows;

if($n == 1){
    $row = $product->fetch_assoc();

    $_SESSION["a"] = $row;

    echo "success";

} else {
    echo "Error";
}

?>