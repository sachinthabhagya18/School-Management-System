<?php

session_start();

require "connection.php";

$uid = $_SESSION["s"]["s_id"];

$id = $_GET["id"];


$product = Database::search("SELECT * FROM assignment INNER JOIN batch ON batch.id = assignment.batch_id INNER JOIN student ON student.batch_id = batch.id INNER JOIN teacher ON
assignment.teacher_t_id=teacher.t_id INNER JOIN `subject` ON teacher.subject_id=subject.id WHERE `a_id`='".$id."' AND `s_id`='".$uid."' ");

$n =$product->num_rows;

if($n == 1){
    $row = $product->fetch_assoc();

    $_SESSION["ans"] = $row;

    echo "success";

} else {
    echo "Error";
}

?>