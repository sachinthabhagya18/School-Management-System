<?php
//$e = "sachinthabaghaya95@gmail.com";
require "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

if (isset($_POST["id"])) {

    $s_id = $_POST["id"];

    $rs =  Database::search("SELECT * FROM `student` WHERE `s_id`='" . $s_id . "';");
    $ir = $rs->fetch_assoc();
    $e = $ir["s_email"];
    $ps = $ir["s_password"];
    // if ($rs->num_rows == 0) {
    // Database::iud("INSERT INTO `subcribers`(`email`)VALUES('" . $e . "');");
    //email code

    $mail = new PHPMailer;
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    //$mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'userbrand22@gmail.com';
    $mail->Password = 'jmkltionziethihw';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->setFrom('userbrand22@gmail.com', 'EASB LMS');
    $mail->addReplyTo('userbrand22@gmail.com', 'EASB LMS');
    $mail->addAddress($e);
    $mail->isHTML(true);
    $mail->Subject = 'EASB School Management System Student Invite';
    $bodyContent = $ps;
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo 'Subcription failed.Please try again later!';
    } else {
        echo 'success';
    }
} else {
    echo "Please enter your email address";
}
