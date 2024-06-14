<?php
session_start();

require "connection.php";

$subjectname = $_POST["subjectname"];
$subjectcode = $_POST["subjectcode"];


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;

if (empty($subjectname)) {
    echo "Please insert Subject Name";
}else if (empty($subjectcode)) {
    echo "Please insert Subject Code";
}  else {
    $batchsave = Database::search("SELECT * FROM `subject` WHERE `subjectname`='" . $subjectname . "' AND `subjectcode`='" . $subjectcode . "'  ");

    if ($batchsave->num_rows == 1) {
        echo "The Subject Doesn't Exist";
    } else {
        $f = $batchsave->fetch_assoc();
       

        Database::iud("INSERT INTO `subject`(`subjectname`,`subjectcode`,`createddate`) 
        VALUES('" . $subjectname . "','" . $subjectcode . "','" . $date . "')");

        echo "Subject added successfully";

        $last_id = Database::$connection->insert_id;

    }
}
