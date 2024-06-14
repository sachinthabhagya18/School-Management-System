<?php
session_start();

require "connection.php";

$lname = $_POST["lname"];
$fname = $_POST["fname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$tcode = $_POST["tcode"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$subject = $_POST["subject"];


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
} else if (empty($tcode)) {
    echo"Please enter your tcode";
} else if (empty($email)) {
    echo "Please Enter a Email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalide email address";
} else if (empty($password)) {
    echo"Please enter your password";
} else if ($gender== "0") {
    echo "Please Select a Gender";
} else if ($subject == "0") {
    echo "Please Select a subject";

} else {
    $r = Database::search("SELECT * FROM `teacher` WHERE `t_email`='".$email."' OR `t_code`='".$tcode."'");
    if ($r->num_rows > 0) {
        echo "User with the same email address or tcode number already exsist";
    }else{
        
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO teacher (`t_fname`,`t_lname`,`t_email`,`t_code`,`t_password`,`t_mobile`,`gender_g_id`,`subject_id`,`reg_date`) 
    VALUES ('".$fname."','".$lname."','".$email."','".$tcode."','".$password."','".$mobile."','".$gender."','".$subject."','".$date."')");
    echo "Success";
    }



}
