<?php

require "connection.php";

$pid = $_GET["id"];

$product = Database::search("SELECT * FROM `subject` WHERE `id`='".$pid."' ");
$pn = $product->num_rows;

if($pn == 1){



    Database::iud("DELETE FROM `subject` WHERE `id`='".$pid."' ");

    // echo "product deleted";

    echo "sucsess";

} else {
    echo "Product does not exist";
}

?>