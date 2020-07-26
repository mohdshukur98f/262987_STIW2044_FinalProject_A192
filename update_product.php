<?php
error_reporting(0);
include_once("dbconnect.php");
$prid = $_POST['prid'];
$prname = $_POST['prname'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$type = $_POST['type'];
$weight = $_POST['weight'];

$encoded_string = $_POST["encoded_string"];
$decoded_string = base64_decode($encoded_string);

$path = '../productimage/'.$prid.'.jpg';

if (file_put_contents($path, $decoded_string)){
    echo 'success';
}else{
    echo 'failed';
}

if (isset($prname)){
    $sqlupdate = "UPDATE PRODUCT SET NAME = '$prname', PRICE='$price', QUANTITY='$quantity', WEIGHT='$weight', TYPE='$type' WHERE PRODUCTID = '$prid'";

    if ($conn->query($sqlupdate)){
        echo 'success';    
    }else{
        echo 'failed';
    }
    
}


$conn->close();
?>