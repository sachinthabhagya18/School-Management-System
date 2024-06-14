<?php

session_start();

require "connection.php";

$uid = $_SESSION["t"]["t_email"];

$id = $_GET["id"];


$product = Database::search("SELECT * FROM marks INNER JOIN subject_has_student ON marks.subject_id = subject_has_student.subject_id
INNER JOIN student ON student.s_id=subject_has_student.student_s_id
INNER JOIN assignment ON marks.assignment_a_id = assignment.a_id WHERE `m_id`='".$id."' ");

$n =$product->num_rows;

if($n == 1){
    $row = $product->fetch_assoc();

    $_SESSION["m"] = $row;

    echo "success";

} else {
    echo "Error";
}

?>