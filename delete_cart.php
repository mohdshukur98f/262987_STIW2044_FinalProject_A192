<?php
error_reporting(0);
include_once("dbconnect.php");
$username = $_POST['username'];
$productdid = $_POST['productdid'];


if (isset($_POST['productdid'])){
    $sqldelete = "DELETE FROM CART WHERE USERNAME = '$username' AND PRODUCTID='$productdid'";
}else{
    $sqldelete = "DELETE FROM CART WHERE USERNAME = '$username'";
}
    
    if ($conn->query($sqldelete) === TRUE){
       echo "success";
    }else {
        echo "failed";
    }
?>