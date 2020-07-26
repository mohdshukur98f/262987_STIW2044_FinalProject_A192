<?php
error_reporting(0);
include_once("dbconnect.php");
$username = $_POST['username'];


$sql_loaddata = "SELECT * FROM USER WHERE USERNAME = '$username'";
$result = $conn->query($sql_loaddata);
if ($result->num_rows > 0) {
    while ($row = $result ->fetch_assoc()){
        echo $data = "success,".$row["USERNAME"].",".$row["NAME"].",".$row["EMAIL"].",".$row["PHONE"].",".$row["PASSWORD"].",".$row["CREDIT"].",".$row["VERIFY"].",".$row["DATEREGISTER"].",".$quantity.",".$row["GENDER"];
    }
}else{
    echo "failed";
}