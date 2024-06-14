<?php
session_start();

require "connection.php";

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

$state = 1;

$useremail = $_SESSION["u"]["adminusername"];

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
    $r = Database::search("SELECT * FROM `ac_officer` WHERE `ac_email`='".$email."' OR `ac_code`='".$accode."'");
    if ($r->num_rows > 0) {
        echo "User with the same email address or tcode number already exsist";
    }else{
        
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO ac_officer (`ac_fname`,`ac_lname`,`ac_email`,`ac_code`,`ac_password`,`ac_mobile`,`gender_g_id`,`reg_date`) 
    VALUES ('".$fname."','".$lname."','".$email."','".$accode."','".$password."','".$mobile."','".$gender."','".$date."')");
    echo "Success";
    }



}
