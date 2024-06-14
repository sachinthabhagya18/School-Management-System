<?php
session_start();

require "connection.php";

if (isset($_SESSION["s"])) {

    $p1 = $_POST["p1"];
    $p2 = $_POST["p2"];



    // validate
    if (empty($p1)) {
        echo "Please Enter Your New Password";
    } elseif (empty($p2)) {
        echo "Please Enter Your Comform Password";
    } else if ($p1 !=$p2) {
        echo "Doesn't Match Password";
    } else {
           
                    Database::iud("UPDATE `student` SET 
                    `s_password`='" . $p1 . "'
                     WHERE `s_nic`='" . $_SESSION["s"]["s_nic"] . "' ");

                     $resultset = Database::search("SELECT * FROM `student` WHERE `s_nic`='" . $_SESSION["s"]["s_nic"] . "' ");

                     $details = $resultset->fetch_assoc();
                     $_SESSION["s"] = $details;

                     echo "Update Password SuccessFully";
       
    }
} else {

    echo "Update (Error) Please Check";
}
