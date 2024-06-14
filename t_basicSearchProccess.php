<?php
session_start();

require "connection.php";
$t_id=$_SESSION["t"]["t_id"];
$seachSelect = $_GET["s"];


if ($seachSelect != 0) {
    $invoicers = Database::search("SELECT * FROM assignment INNER JOIN teacher ON assignment.teacher_t_id = teacher.t_id INNER JOIN batch ON assignment.batch_id=batch.id
    WHERE teacher.t_id='" . $t_id . "' AND `batch_id` = '" . $seachSelect . "' ");
    $in = $invoicers->num_rows;

    for ($i = 0; $i < $in; $i++) {
        $ir = $invoicers->fetch_assoc();
?>
        <tr>
            <td><?php echo $ir["a_name"] ?></td>
            <td><?php echo $ir["a_unic_id"] ?></td>
            <td><?php echo $ir["a_release_date"] ?></td>
            <td><?php echo $ir["a_end_date"] ?></td>
            <td><?php echo $ir["batchname"] ?></td>
            <td>


                <button class="badge badge-primary" onclick="location.href='<?php echo $ir['a_location'] ?>'">View Assignment File</button>

                <!-- <a href="<?php echo $ir["l_location"] ?>" download=""></a>
 <input  type="button" value="Download Assignment"> -->
            </td>


            <td><button class="badge badge-warning" onclick="sendid2(<?php echo $ir['a_id'] ?>);">Edit</button> |
                <button class="badge badge-danger" onclick="deletemodel(<?php echo $ir['a_id'] ?>);">Delete</button>
            </td>

        </tr>
        <div class="modal fade" id="deleteModel<?php echo $ir['a_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn btn-danger" onclick="deleteassignment(<?php echo $ir['a_id'] ?>);">Yes</button>
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