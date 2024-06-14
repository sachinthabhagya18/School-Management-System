<?php
session_start();

require "connection.php";

$bname = $_POST["bname"];
$section = $_POST["section"];


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;

if (empty($bname)) {
    echo "Please insert Batch Name";
} else if ($section == "0") {
    echo "Please Select a Section";
}  else {
    $batchsave = Database::search("SELECT * FROM `batch` WHERE `batchname`='" . $bname . "' AND `section_s_id`='" . $section . "'  ");

    if ($batchsave->num_rows == 1) {
        echo "The Product Doesn't Exist";
    } else {
        $f = $batchsave->fetch_assoc();
       

        $imageFile = $_FILES["imguploader"];

        if (isset($_FILES["imguploader"])) {

            $fileName = "batchimg//" . uniqid() . ".png";
            move_uploaded_file($imageFile["tmp_name"], $fileName);
        } else {
            echo "Please select an image";
        }

        Database::iud("INSERT INTO `batch`(`batchname`,`createdate`,`batchimg`,`section_s_id`) 
        VALUES('" . $bname . "','" . $date . "','" . $fileName . "','".$section."')");

        echo "batch added successfully";

        $last_id = Database::$connection->insert_id;

        // echo "Image Saved Successfully";
    }
}
