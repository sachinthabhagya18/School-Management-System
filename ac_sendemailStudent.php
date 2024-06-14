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

    $a_id = $_POST["id"];

    $rs =  Database::search("SELECT * FROM marks INNER JOIN student ON marks.student_s_id = student.s_id
    INNER JOIN subject ON subject.id = marks.subject_id
    INNER JOIN assignment ON assignment.a_id = marks.assignment_a_id WHERE `a_id`='" . $a_id . "';");
    $ir = $rs->fetch_assoc();
    $e = $ir["s_email"];
    $marks = $ir["marks"];
    $subject = $ir["subjectname"];
    $name = $ir["a_name"];

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
    $bodyContent =

'<div style="font-family: cursive;background-color:#eeeeee">
            <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
                <tbody>
                    <tr>
                        <td>
                            <table align="center" width="750px" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="width:750px!important">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table width="690" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3" height="auto" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="padding:0;margin:0;font-size:0;line-height:0">
                                                            <table width="690" align="center" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="30"></td>
                                                                        <td height="0" align="center" valign="cnter" style="padding:0;margin:0;font-size:0;line-height:0"><a href="" target="_blank"><img src="images/logo.png" ></a></td>
                                                                        <td width="30"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="center">
                                                            <table width="630" align="center" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="3" height="60"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25"></td>
                                                                        <td align="center">
                                                                            <h1 style="font-family:HelveticaNeue-Light,arial,sans-serif;font-size:48px;color:#404040;line-height:48px;font-weight:bold;margin:0;padding:0">Relese Your '.$subject.' Result </h1>
                                                                        </td>
                                                                        <td width="25"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3" height="40"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" align="center">
                                                                            <p style="color:brown; font-weight:bold;font-size:21px;">Marks :- '.$marks.'</p><br />
                                                                            <p style="color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0">Assment ID :- '.$a_id.'</p><br>
                                                                            <p style="color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0">Assment Name :- '.$name.'</p><br>
                                                                        </td>
                                                                    </tr>
                                                            
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
        
                                                    
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>';
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo 'Subcription failed.Please try again later!';
    } else {
        echo 'success';
    }
} else {
    echo "Please enter your email address";
}
