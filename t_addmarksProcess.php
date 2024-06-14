<?php
session_start();

require "connection.php";
$t_subject = $_SESSION["t"]["subject_id"];

$s_nic = $_POST["s_nic"];
$a_id = $_POST["a_id"];
$marks = $_POST["marks"];

// echo $s_nic;
$state = 1;

if ($s_nic == "0") {
    echo "Please Select a Student";
} else if ($a_id == "0") {
    echo "Please Select a Assment";
} else if (empty($marks)) {
    echo "Please insert Assignment Marks";
} else {
    $batchsave = Database::search("SELECT * FROM `marks` WHERE `student_s_id`='" . $s_nic . "' AND `assignment_a_id`='" . $a_id . "'  ");

    if ($batchsave->num_rows == 1) {
        echo "The Assignment Doesn't Exist";
    } else {
        $f = $batchsave->fetch_assoc();

        $s = Database::search("SELECT * FROM `student` WHERE `s_id`='" . $s_nic . "' ");
        $s_id = $s->fetch_assoc();
       $stu_id = $s_id['s_id'];
       
        Database::iud("INSERT INTO `marks`(`student_s_id`,`subject_id`,`assignment_a_id`,`marks`) 
        VALUES('" . $stu_id . "','" . $t_subject . "','" . $a_id . "','" . $marks . "')");

        echo "Marks added successfully";


        $last_id = Database::$connection->insert_id;
    }
}
