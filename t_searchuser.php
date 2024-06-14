<?php
session_start();
require "connection.php";
$su_id = $_SESSION["t"]["subject_id"];
if (isset($_GET["s"])) {
    $text = $_GET["s"];
    if (!empty($text)) {


        // $usersrs = Database::search("SELECT * FROM `user` WHERE `email` LIKE '%" . $text . "%' ");
        // $d = $usersrs->num_rows;
        // $row = $usersrs->fetch_assoc();

?>

        <?php

        $invoicers = Database::search("SELECT * FROM answesheet INNER JOIN student ON answesheet.student_s_id = student.s_id INNER JOIN batch ON student.batch_id=batch.id INNER JOIN
        subject ON answesheet.subject_id= subject.id INNER JOIN assignment ON assignment.a_id= answesheet.assignment_a_id WHERE `subject`.id='".$su_id."' AND `s_nic` LIKE '%" . $text . "%'   ; ");
        $in = $invoicers->num_rows;
        ?>
        <?php
        for ($i = 0; $i < $in; $i++) {
            $ir = $invoicers->fetch_assoc();
        ?>
            <tr>
                <td><?php echo $ir["s_fname"] . " " . $ir["s_lname"] ?></td>
                <td><?php echo $ir["s_nic"] ?></td>
                <td><?php echo $ir["batchname"] ?></td>
                <td> <button class="badge badge-primary" onclick="location.href='<?php echo $ir['as_location'] ?>'">View Answer Sheet</button></td>
                <td><?php echo $ir["a_unic_id"] ?></td>

            </tr>

        <?php
        }
        ?>
    <?php
    } else {

        $invoicers = Database::search("SELECT * FROM answesheet INNER JOIN student ON answesheet.student_s_id = student.s_id INNER JOIN batch ON student.batch_id=batch.id INNER JOIN
        subject ON answesheet.subject_id= subject.id INNER JOIN assignment ON assignment.a_id= answesheet.assignment_a_id WHERE `subject`.id='".$su_id."'");
        $in = $invoicers->num_rows;
    ?>
        <?php
        for ($i = 0; $i < $in; $i++) {
            $ir = $invoicers->fetch_assoc();
        ?>
            <tr>
                <td><?php echo $ir["s_fname"] . " " . $ir["s_lname"] ?></td>
                <td><?php echo $ir["s_nic"] ?></td>
                <td><?php echo $ir["batchname"] ?></td>
                <td> <button class="badge badge-primary" onclick="location.href='<?php echo $ir['as_location'] ?>'">View Answer Sheet</button></td>
                <td><?php echo $ir["a_unic_id"] ?></td>

            </tr>

        <?php
        }
        ?>


<?php
    }
}
?>