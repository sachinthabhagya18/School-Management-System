<?php
session_start();

require "connection.php";

$tid = $_SESSION["t"]["t_id"];

if (isset($_POST["id"])) {
    $pid = $_POST["id"];
    $l_name = $_POST["l_name"];
    $l_id = $_POST["l_id"];
    $batch = $_POST["batch"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    if (empty($l_name)) {
        echo "Please insert lesson Name";
    } else if (empty($l_id)) {
        echo "Please insert lesson Id";
    } else if ($batch == "0") {
        echo "Please Select a Batch";
    } else {

        // if (isset($_FILES["l_file"])) {
        //     $l_file = $_FILES["l_file"];
        //     $fileName = "lesson//" . uniqid() . ".pdf";
        //     move_uploaded_file($l_file["tmp_name"], $fileName);
        // } else {
        //     echo "Please select an File";
        // }


        Database::iud("UPDATE `lessonnote` SET `l_name`='" . $l_name . "', `l_id`='" . $l_id . "',`batch_id`='" . $batch . "',`teacher_t_id`='" . $tid . "' WHERE `lid`='" . $pid . "'");

        echo "Lesson added successfully";
    }
} else {
    echo "Product Does not Exit";
}
