<?php
error_reporting(0);
include_once("dbconnect.php");
$username = $_POST['username'];
$orderid = $_POST['orderid'];


if (isset($_POST['orderid'])){
    $sqldelete = "DELETE FROM PAYMENT WHERE USERNAME = '$username' AND ORDERID='$orderid'";
}
    
    if ($conn->query($sqldelete) === TRUE){
       echo "success";
    }else {
        echo "failed";
    }
?>