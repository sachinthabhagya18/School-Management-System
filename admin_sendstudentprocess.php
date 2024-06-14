<?php

session_start();

require "connection.php";

$uid = $_SESSION["u"]["adminusername"];

$id = $_GET["id"];


$product = Database::search("SELECT * FROM `student` WHERE `s_id`='".$id."' ");

$n =$product->num_rows;

if($n == 1){
    $row = $product->fetch_assoc();

    $_SESSION["p2"] = $row;

    echo "success";

} else {
    echo "Error";
}

?>