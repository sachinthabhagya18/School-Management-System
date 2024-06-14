<?php

require "connection.php";

if (isset($_GET["s"])) {
    $text = $_GET["s"];
    if (!empty($text)) {


        // $usersrs = Database::search("SELECT * FROM `user` WHERE `email` LIKE '%" . $text . "%' ");
        // $d = $usersrs->num_rows;
        // $row = $usersrs->fetch_assoc();

?>

        <?php

        $invoicers = Database::search("SELECT * FROM batch INNER JOIN student  ON  batch.id = student.batch_id WHERE `s_email` LIKE '%" . $text . "%'  ; ");
        $in = $invoicers->num_rows;
        ?>
                    <?php
                    for ($i = 0; $i < $in; $i++) {
                      $ir = $invoicers->fetch_assoc();
                    ?>
        <tr>
            <td><?php echo $ir["s_fname"] . " " . $ir["s_lname"] ?></td>
            <td><?php echo $ir["s_email"] ?></td>
            <td><?php echo $ir["s_nic"] ?></td>
            <td><?php echo $ir["s_mobile"] ?></td>

            <td><?php echo $ir["batchname"] ?></td>


            <td><button class="badge badge-warning" onclick="sendid(<?php echo $ir['s_id'] ?>);">Edit</button> |
                <button class="badge badge-info" onclick="sendemailid(<?php echo $ir['s_id'] ?>);">Send Request</button> |
                <button class="badge badge-danger" onclick="deletemodel(<?php echo $ir['s_id'] ?>);">Delete</button>
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
                        <button type="button" class="btn btn-danger" onclick="deletestudent(<?php echo $ir['s_id'] ?>);">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <?php
} else {

    $invoicers = Database::search("SELECT * FROM batch INNER JOIN student  ON  batch.id = student.batch_id ");
    $in = $invoicers->num_rows;
    ?>
                <?php
                for ($i = 0; $i < $in; $i++) {
                  $ir = $invoicers->fetch_assoc();
                ?>
    <tr>
        <td><?php echo $ir["s_fname"] . " " . $ir["s_lname"] ?></td>
        <td><?php echo $ir["s_email"] ?></td>
        <td><?php echo $ir["s_nic"] ?></td>
        <td><?php echo $ir["s_mobile"] ?></td>

        <td><?php echo $ir["batchname"] ?></td>


        <td><button class="badge badge-warning" onclick="sendid(<?php echo $ir['s_id'] ?>);">Edit</button> |
            <button class="badge badge-info" onclick="sendemailid(<?php echo $ir['s_id'] ?>);">Send Request</button> |
            <button class="badge badge-danger" onclick="deletemodel(<?php echo $ir['s_id'] ?>);">Delete</button>
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
                    <button type="button" class="btn btn-danger" onclick="deletestudent(<?php echo $ir['s_id'] ?>);">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

   
<?php
}

}
?>