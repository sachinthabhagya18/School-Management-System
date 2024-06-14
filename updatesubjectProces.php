<?php
session_start();

require "connection.php";

$uid = $_SESSION["u"]["adminusername"];

if (isset($_POST["id"])) {
    $pid = $_POST["id"];
    $subjectname = $_POST["subjectname"];
    $subjectcode = $_POST["subjectcode"];




    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    if (empty($subjectname)) {
        echo "Please Add a Subject Name.";
    }else if (empty($subjectcode)) {
            echo "Please Add a subject Code.";
    } else {

         $modelhasbrandId = Database::search("SELECT * FROM `subject` WHERE `id`='" . $pid . "' ");
         $mhbi = $modelhasbrandId->fetch_assoc();

        Database::iud("UPDATE `subject` SET `subjectname`='" . $subjectname . "', `createddate`='".$date."',`subjectcode`='".$subjectcode."' WHERE `id`='".$pid."'");

        

        $product = Database::search("SELECT * FROM `subject` WHERE  `id`='" . $pid . "' ");

        $n = $product->num_rows;

        if ($n == 1) {
            $row = $product->fetch_assoc();

            $_SESSION["p"] = $row;
            echo "Subject updated successfully";
        } else {
             echo "Error";
         }
    }
} else {
    echo "Product Does not Exit";
}



