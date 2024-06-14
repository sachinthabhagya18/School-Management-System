<?php

require "connection.php";

$seachSelect = $_GET["s"];


if ($seachSelect != 0) {
    $invoicers = Database::search("SELECT * FROM teacher INNER JOIN `subject` ON teacher.subject_id = `subject`.id WHERE `subject_id` = '" . $seachSelect . "' ");
    $in = $invoicers->num_rows;
    for ($i = 0; $i < $in; $i++) {
      $ir = $invoicers->fetch_assoc();
    ?>
      <tr>
      <td><?php echo $ir["t_fname"] . " " . $ir["t_lname"] ?></td>
        <td><?php echo $ir["t_email"] ?></td>
        <td><?php echo $ir["t_code"] ?></td>
        <td><?php echo $ir["t_mobile"] ?></td>

        <td><?php echo $ir["subjectname"] ?></td>


        <td><button class="badge badge-warning" onclick="sendid(<?php echo $ir['t_id'] ?>);">Edit</button> |
          <button class="badge badge-info" onclick="sendemailidteacher(<?php echo $ir['t_id'] ?>);">Send Request</button> |
          <button class="badge badge-danger" onclick="deletemodel(<?php echo $ir['t_id'] ?>);">Delete</button>



        </td>

      </tr>
      <div class="modal fade" id="deleteModel<?php echo $ir['t_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <button type="button" class="btn btn-danger" onclick="deleteteacher(<?php echo $ir['t_id'] ?>);">Yes</button>
            </div>
          </div>
        </div>
      </div>
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




