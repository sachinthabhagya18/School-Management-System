<?php
session_start();

require "connection.php";

if (isset($_SESSION["t"])) {

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
           
                    Database::iud("UPDATE `teacher` SET 
                    `t_password`='" . $p1 . "'
                     WHERE `t_code`='" . $_SESSION["t"]["t_code"] . "' ");

                     $resultset = Database::search("SELECT * FROM `teacher` WHERE `t_code`='" . $_SESSION["t"]["t_code"] . "' ");

                     $details = $resultset->fetch_assoc();
                     $_SESSION["s"] = $details;

                     echo "Update Password SuccessFully";
       
    }
} else {

    echo "Update (Error) Please Check";
}
