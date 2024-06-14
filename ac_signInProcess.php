<?php

session_start();

require "connection.php";

$e = $_POST["email"];
$p = $_POST["password"];
$r = $_POST["remember"];

$rs = Database::search("SELECT * FROM `ac_officer` WHERE `ac_email`='".$e."' AND `ac_password`='".$p."'");
$n = $rs->num_rows;

if($n==1) {
    echo "Success";
    $d = $rs->fetch_assoc();
    $_SESSION["ac"] = $d;

    if($r=="true"){
        setcookie("e",$e,time()+(60*60*24*365));
        setcookie("p",$p,time()+(60*60*24*365));
    } else {
        setcookie("e","",-1);
        setcookie("p","",-1);
    }


} else {
    echo "Invalide deatails";
}

?>