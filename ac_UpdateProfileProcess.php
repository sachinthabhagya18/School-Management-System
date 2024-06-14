<?php
session_start();

require "connection.php";

if (isset($_SESSION["ac"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $email = $_POST["e"];


    if (isset($_FILES["i"])) {
        $image = $_FILES["i"];
    } else {
    }
    // validate
    if (empty($fname)) {
        echo "Please Enter Your First Name";
    } elseif (empty($lname)) {
        echo "Please Enter Your Last Name";
    } else if (empty($mobile)) {
        echo "Please Enter Your Mobile Number";
    } else if (strlen($mobile) != 10) {
        echo "Please enter 10 digit mobile number";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
        echo "Invalid mobile number";
    } else if (empty($email)) {
        echo "Please Enter your email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalide email address";
    } else {


        Database::iud("UPDATE `ac_officer` SET 
        `ac_fname`='" . $fname . "',
        `ac_lname`='" . $lname . "',
        `ac_mobile`='" . $mobile . "',
        `ac_email`='" . $email . "'
         WHERE `ac_code`='" . $_SESSION["ac"]["ac_code"] . "' ");



            if (isset($_FILES["i"])) {
                $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
                $file_extention = $image["type"];

                if (!in_array($file_extention, $allowed_image_extention)) {
                    echo "Please Select a valid image.";
                } else {

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

                    $filename = "profiles//" . uniqid() . $newimgextention;

                    move_uploaded_file($image["tmp_name"], $filename);

                    Database::iud("UPDATE `ac_officer` SET 
                    `ac_img` = '".$filename."'
                     WHERE `ac_code`='" . $_SESSION["ac"]["ac_code"] . "' ");


                }
            } else {
                echo "Update SuccessFully";

            }
            $resultset = Database::search("SELECT * FROM `ac_officer` WHERE `ac_code`='" . $_SESSION["ac"]["ac_code"] . "' ");

            $details = $resultset->fetch_assoc();
            $_SESSION["ac"] = $details;
       
    }
} else {

    echo "Update (Error) Please Check";
}
