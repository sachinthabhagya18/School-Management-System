<?php
session_start();

require "connection.php";

$uid = $_SESSION["u"]["adminusername"];

if (isset($_POST["id"])) {
    $pid = $_POST["id"];
    $lname = $_POST["lname"];
    $fname = $_POST["fname"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $accode = $_POST["accode"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];



    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    if (empty($fname)) {
        echo "Please Enter a First Name";
    } else if (empty($lname)) {
        echo "Please Enter a Last Name";
    } else if (empty($mobile)) {
        echo"Please enter your mobile";
    } else if (strlen($mobile) != 10) {
        echo"Please use 10 digit mobile nomber";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/",$mobile)==0){
        echo"Invalide mobile number";
    } else if (empty($accode)) {
        echo"Please enter your tcode";
    } else if (empty($email)) {
        echo "Please Enter a Email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalide email address";
    } else if (empty($password)) {
        echo"Please enter your password";
    } else if ($gender== "0") {
        echo "Please Select a Gender";
    } else {

         $modelhasbrandId = Database::search("SELECT * FROM `ac_officer` WHERE `ac_id`='" . $pid . "' ");
         $mhbi = $modelhasbrandId->fetch_assoc();

        Database::iud("UPDATE `ac_officer` SET `ac_fname`='" . $fname . "', `ac_lname`='".$lname."',`ac_email`='".$email."',`ac_code`='".$accode."',`ac_mobile`='".$mobile."',
        `ac_password`='".$password."',`gender_g_id`='".$gender."',`reg_date`='".$date."' WHERE `ac_id`='".$pid."'");

        

        $product = Database::search("SELECT * FROM `ac_officer` WHERE  `ac_id`='" . $pid . "' ");

        $n = $product->num_rows;

        if ($n == 1) {
            $row = $product->fetch_assoc();

            $_SESSION["p"] = $row;
            echo "successfully";
        } else {
             echo "Error";
         }
    }
} else {
    echo "Product Does not Exit";
}

