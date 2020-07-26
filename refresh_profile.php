<?php
error_reporting(0);
include_once("dbconnect.php");
$username = $_POST['username'];


$sqlquantity = "SELECT * FROM CART WHERE USERNAME = '$username'";

$resultq = $conn->query($sqlquantity);
$quantity = 0;
if ($resultq->num_rows > 0) {
    while ($rowq = $resultq ->fetch_assoc()){
        $quantity = $rowq["CARTQUANTITY"] + $quantity;
    }
}

$sql_loaddata = "SELECT * FROM USER WHERE USERNAME = '$username'";
$result = $conn->query($sql_loaddata);
if ($result->num_rows > 0) {
    while ($row = $result ->fetch_assoc()){
        echo $data = "success,".$row["USERNAME"].",".$row["NAME"].",".$row["EMAIL"].",".$row["PHONE"].",".$row["PASSWORD"].",".$row["CREDIT"].",".$row["VERIFY"].",".$row["DATEREGISTER"].",".$quantity.",".$row["GENDER"];
    }
}else{
    echo "failed";
}