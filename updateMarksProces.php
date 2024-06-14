<?php
session_start();

require "connection.php";

if (isset($_POST["id"])) {
    $pid = $_POST["id"];
    $marks = $_POST["marks"];



    if (empty($marks)) {

        echo "Please Add Marks.";
    } else {

         $modelhasbrandId = Database::search("SELECT * FROM `marks` WHERE `m_id`='" . $pid . "' ");
         $mhbi = $modelhasbrandId->fetch_assoc();

        Database::iud("UPDATE `marks` SET `marks`='" . $marks . "' WHERE `m_id`='".$pid."'");

        

        $product = Database::search("SELECT * FROM `marks` WHERE  `m_id`='" . $pid . "' ");

        $n = $product->num_rows;

        if ($n == 1) {
            $row = $product->fetch_assoc();

            $_SESSION["m"] = $row;
            echo "Marks updated successfully";
        } else {
             echo "Error";
         }
    }
 } else {
    echo "Product Does not Exit";
 }



