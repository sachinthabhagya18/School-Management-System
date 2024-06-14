<?php
session_start();

require "connection.php";

$uid = $_SESSION["u"]["adminusername"];

if (isset($_POST["id"])) {
    $pid = $_POST["id"];
    $batchname = $_POST["batchname"];
    $section = $_POST["section"];


    if (isset($_FILES["imguploader"])) {
        $image = $_FILES["imguploader"];
    } else {
    }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    if (empty($batchname)) {
        echo "Please Add a Batch Name.";
    } else {

         $modelhasbrandId = Database::search("SELECT * FROM `batch` WHERE `id`='" . $pid . "' ");
         $mhbi = $modelhasbrandId->fetch_assoc();

        Database::iud("UPDATE `batch` SET `batchname`='" . $batchname . "', `createdate`='".$date."' WHERE `id`='".$pid."'");

        

        $product = Database::search("SELECT * FROM `batch` WHERE  `id`='" . $pid . "' ");

        $n = $product->num_rows;

        if ($n == 1) {
            $row = $product->fetch_assoc();

            $_SESSION["p"] = $row;
       
        } else {
             echo "Error";
         }
    }
} else {
    echo "Product Does not Exit";
}

if (isset($_FILES["imguploader"])) {


    $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
    $file_extention = $image["type"];

    if (!in_array($file_extention, $allowed_image_extention)) {
        echo "Please Select a valid image.";
    } else {
        // echo $imageFile["name"];

        $newimgextention;
        if ($file_extention = "image/jpeg") {
            $newimgextention = ".jpeg";
        } elseif ($file_extention = "image/jpg") {
            $newimgextention = ".jpg";
        } elseif ($file_extention = "image/png") {
            $newimgextention = ".png";
        } elseif ($file_extention = "image/svg") {
            $newimgextention = ".svg";
        }

        $filename = "batchimg//" . uniqid() . $newimgextention;

        move_uploaded_file($image["tmp_name"], $filename);
        $resultProfileImg = Database::search("SELECT * FROM `batch` WHERE `id`='" . $pid . "'  ");
        $pror = $resultProfileImg->num_rows;

        if ($pror == 1) {

            Database::iud("UPDATE `batch` SET `batchimg`='" . $filename . "' WHERE `id`='" .  $pid . "'  ");

            echo "Image Saved Successfully.";
        } else {
            Database::iud("INSERT INTO `batch` (`batchimg`) VALUES ('" . $filename . "') ");
        }
        echo "Batch updated successfully";
    }
}
