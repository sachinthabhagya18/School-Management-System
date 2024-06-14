<?php

require "connection.php";

$pid = $_GET["id"];

$product = Database::search("SELECT * FROM `ac_officer` WHERE `ac_id`='".$pid."' ");
$pn = $product->num_rows;

if($pn == 1){



    Database::iud("DELETE FROM `ac_officer` WHERE `ac_id`='".$pid."' ");

    // echo "product deleted";

    echo "sucsess";

} else {
    echo "Product does not exist";
}

?>