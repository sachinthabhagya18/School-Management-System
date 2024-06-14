<?php
session_start();

require "connection.php";
$t_id = $_SESSION["t"]["t_id"];

$a_release_date = $_POST["a_release_date"];
$a_end_date = $_POST["a_end_date"];
$a_unic_id= $_POST["a_unic_id"];
$a_name = $_POST["a_name"];
$batch = $_POST["batch"];


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;

if (empty($a_name)) {
    echo "Please insert Assignment Name";
} else if (empty($a_unic_id)) {
    echo "Please insert Assignment Id";
} else if (empty($a_release_date)) {
    echo "Please insert Assignment RElease Date";
} else if (empty($a_end_date)) {
    echo "Please insert Assignment End Date";
} else if ($batch == "0") {
    echo "Please Select a Batch";
} else {
    $batchsave = Database::search("SELECT * FROM `Assignment` WHERE `a_name`='" . $a_name . "' AND `a_unic_id`='" . $a_unic_id . "'  ");

    if ($batchsave->num_rows == 1) {
        echo "The Assignment Doesn't Exist";
    } else {
        $f = $batchsave->fetch_assoc();


        $l_file = $_FILES["l_file"];

        if (isset($_FILES["l_file"])) {

            $fileName = "assignment//" . uniqid() . ".pdf";
            move_uploaded_file($l_file["tmp_name"], $fileName);
        } else {
            echo "Please select an image";
        }

        Database::iud("INSERT INTO `Assignment`(`a_release_date`,`a_end_date`,`a_unic_id`,`a_name`,`batch_id`,`teacher_t_id`,`a_location`) 
        VALUES('" . $a_release_date. "','" . $a_end_date . "','" . $a_unic_id. "','" . $a_name . "','".$batch."','".$t_id."','".$fileName."')");

        echo "Assignment added successfully";

        $last_id = Database::$connection->insert_id;


    }
}
