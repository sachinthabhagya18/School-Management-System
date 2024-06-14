<?php

session_start();

if(isset($_SESSION["ac"])){
    
    $_SESSION["ac"]=null;
    session_destroy();
    echo "success";
}
?>