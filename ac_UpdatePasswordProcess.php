<?php
session_start();

require "connection.php";

if (isset($_SESSION["ac"])) {

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
           
                    Database::iud("UPDATE `ac_officer` SET 
                    `ac_password`='" . $p1 . "'
                     WHERE `ac_code`='" . $_SESSION["ac"]["ac_code"] . "' ");

                     $resultset = Database::search("SELECT * FROM `ac_officer` WHERE `ac_code`='" . $_SESSION["ac"]["ac_code"] . "' ");

                     $details = $resultset->fetch_assoc();
                     $_SESSION["ac"] = $details;

                     echo "Update Password SuccessFully";
       
    }
} else {

    echo "Update (Error) Please Check";
}
