<?php

require "connection.php";

$seachSelect = $_GET["s"];


if ($seachSelect != 0) {
    $invoicers = Database::search("SELECT * FROM student INNER JOIN batch ON batch.id =student.batch_id WHERE `batch_id` = '" . $seachSelect . "' ");
    $in = $invoicers->num_rows;

for ($i = 0; $i < $in; $i++) {
    $ir = $invoicers->fetch_assoc();
?>
    <tr>
        <td><?php echo $ir["s_fname"] . " " . $ir["s_lname"] ?></td>
        <td><?php echo $ir["s_email"] ?></td>
        <td><?php echo $ir["s_nic"] ?></td>
        <td><?php echo $ir["s_mobile"] ?></td>

        <td><?php echo $ir["batchname"] ?></td>


        <td><button class="badge badge-warning" onclick="sendid2(<?php echo $ir['s_id'] ?>);">Edit</button> |
            <button class="badge badge-info" onclick="sendemailid2(<?php echo $ir['s_id'] ?>);">Send Request</button> |
            <button class="badge badge-danger" onclick="deletemodel2(<?php echo $ir['s_id'] ?>);">Delete</button>
        </td>

    </tr>
    <div class="modal fade" id="deleteModel<?php echo $ir['s_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">Warning...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are You Sure You Want To Delete This Product
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="deletestudent2(<?php echo $ir['s_id'] ?>);">Yes</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

} else {
    echo '<div class="row">
    <div class="col-12 text-center">
    <h3 class="text-danger"><b>Please Select Batch</b></h3>
    </div>
    </div>';
}

?>


