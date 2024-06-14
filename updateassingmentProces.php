<?php
session_start();

require "connection.php";

$tid = $_SESSION["t"]["t_id"];

if (isset($_POST["id"])) {
    $pid = $_POST["id"];

    $a_release_date = $_POST["a_release_date"];
    $a_end_date = $_POST["a_end_date"];
    $a_unic_id = $_POST["a_unic_id"];
    $a_name = $_POST["a_name"];
    $batch = $_POST["batch"];


    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    if (empty($a_name)) {
        echo "Please Enter a Assignment Name";
    } else if (empty($a_unic_id)) {
        echo "Please Enter a Assignment Unicode";
    } else if (empty($a_release_date)) {
        echo "Please enter Assignment Release Date";
    } else if (empty($a_end_date)) {
        echo "Please Enter a Assignment End Date";
    } else if ($batch == "0") {
        echo "Please Select a Batch";
    } else {

        $modelhasbrandId = Database::search("SELECT * FROM `assignment` WHERE `a_id`='" . $pid . "' ");
        $mhbi = $modelhasbrandId->fetch_assoc();

        Database::iud("UPDATE `assignment` SET `a_release_date`='" . $a_release_date . "', `a_end_date`='" . $a_end_date . "',`a_unic_id`='" . $a_unic_id . "',`a_name`='" . $a_name . "',
`batch_id`='" . $batch . "' WHERE `a_id`='" . $pid . "'");



        $product = Database::search("SELECT * FROM `assignment` WHERE  `a_id`='" . $pid . "' ");

        $n = $product->num_rows;

        if ($n == 1) {
            $row = $product->fetch_assoc();

            // $_SESSION["t"] = $row;
            echo "successfully";
        } else {
            echo "Error";
        }
    }
} else {
    echo "Product Does not Exit";
}
