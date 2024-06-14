<?php
session_start();

require "connection.php";
$t_id = $_SESSION["t"]["t_id"];

$l_name = $_POST["l_name"];
$l_id = $_POST["l_id"];
$batch = $_POST["batch"];


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;

if (empty($l_name)) {
    echo "Please insert lesson Name";
} else if (empty($l_id)) {
    echo "Please insert lesson Id";
} else if ($batch == "0") {
    echo "Please Select a Batch";
} else {
    $batchsave = Database::search("SELECT * FROM `lessonnote` WHERE `l_name`='" . $l_name . "' AND `l_id`='" . $l_id . "'  ");

    if ($batchsave->num_rows == 1) {
        echo "The lesson Doesn't Exist";
    } else {
        $f = $batchsave->fetch_assoc();


        $l_file = $_FILES["l_file"];

        if (isset($_FILES["l_file"])) {

            $fileName = "lesson//" . uniqid() . ".pdf";
            move_uploaded_file($l_file["tmp_name"], $fileName);
        } else {
            echo "Please select an File";
        }

        Database::iud("INSERT INTO `lessonnote`(`l_name`,`l_id`,`l_adddate`,`batch_id`,`l_location`,`teacher_t_id`) 
        VALUES('" . $l_name. "','" . $l_id . "','" . $date . "','" . $batch . "','".$fileName."','".$t_id."')");

        echo "Lesson added successfully";

        $last_id = Database::$connection->insert_id;

        // echo "File Saved Successfully";
    }
}
