<?php
session_start();

require "connection.php";
$s_id = $_SESSION["s"]["s_id"];

$a_id = $_POST["a_id"];
$s_nic = $_POST["s_nic"];
$subjectcode = $_POST["subjectcode"];

$batchsave2 = Database::search("SELECT * FROM `subject` WHERE `subjectcode`='" . $subjectcode . "' ");
$f2 = $batchsave2->fetch_assoc();
$subject_id = $f2["id"];

// echo $s_id;
//  echo $s_nic;
// echo $subjectcode;
//  echo $subject_id;

if (isset($_FILES["l_file"])) {

    $l_file = $_FILES["l_file"];
} else {
}

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;

$batchsave = Database::search("SELECT * FROM `answesheet` WHERE `assignment_a_id`='" . $a_id . "' AND `student_s_id`='" . $s_id . "'  ");

if ($batchsave->num_rows == 1) {
    echo "The Answer Doesn't Exist"; 
} else if(empty($l_file)) {
    echo "Please select an File";
} else {
    $fileName = "lesson//" . uniqid() . ".pdf";
    move_uploaded_file($l_file["tmp_name"], $fileName);
    $f = $batchsave->fetch_assoc();


    Database::iud("INSERT INTO `answesheet`(`assignment_a_id`,`student_s_id`,`add_date`,`subject_id`) 
            VALUES('" . $a_id . "','" . $s_id . "','" . $date . "','" . $subject_id . "')");
    Database::iud("UPDATE `answesheet` SET `as_location`='" . $fileName . "' WHERE `assignment_a_id`='" . $a_id . "' AND `student_s_id`='" . $s_id . "'  ");

    echo "ok";
}
