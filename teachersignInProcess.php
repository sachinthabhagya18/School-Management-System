<?php

session_start();

require "connection.php";

$u = $_POST["username"];
$p = $_POST["password"];
$r = $_POST["remember"];

$rs = Database::search("SELECT * FROM `teacher` WHERE `t_email`='".$u."' AND `t_password`='".$p."'");
$n = $rs->num_rows;

if($n==1) {
    echo "Success";
    $d = $rs->fetch_assoc();
    $_SESSION["t"] = $d;

    if($r=="true"){
        setcookie("e",$u,time()+(60*60*24*365));
        setcookie("p",$p,time()+(60*60*24*365));
    } else {
        setcookie("u","",-1);
        setcookie("p","",-1);
    }


} else {
    echo "Invalide deatails";
}

?>