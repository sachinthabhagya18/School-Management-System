<?php


require "connection.php";

$seachSelect = $_GET["s"];


if ($seachSelect != 0) {
    $invoicers = Database::search("SELECT * FROM marks INNER JOIN student ON marks.student_s_id = student.s_id
    INNER JOIN subject ON subject.id = marks.subject_id
    INNER JOIN assignment ON assignment.a_id = marks.assignment_a_id WHERE `subject_id` = '" . $seachSelect . "' ");
    $in = $invoicers->num_rows;

    for ($i = 0; $i < $in; $i++) {
      $ir = $invoicers->fetch_assoc();
    ?>
      <tr>
        <td ><?php echo $ir["s_fname"] . " " . $ir["s_lname"] ?></td>
        <td><?php echo $ir["s_nic"] ?></td>
        <td><?php echo $ir["subjectname"] ?></td>
        <td><?php echo $ir["a_unic_id"] ?></td>
        <td class="text-danger"><b><?php echo $ir["marks"] ?></b></td>
      </tr>
    
    <?php
    }
    
} else {
    echo '<div class="row">
    <div class="col-12 text-center">
    <h3 class="text-danger"><b>Please Select Subject</b></h3>
    </div>
    </div>';
}

?>