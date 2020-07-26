<?php
error_reporting(0);
include_once ("dbconnect.php");
$username = $_POST['username'];
$prodid = $_POST['productid'];
$userquantity = $_POST['quantity'];

$sqlsearch = "SELECT * FROM CART WHERE USERNAME = '$username' AND PRODUCTID= '$prodid'";

$result = $conn->query($sqlsearch);
if ($result->num_rows > 0) {
    while ($row = $result ->fetch_assoc()){
        $prquantity = $row["CARTQUANTITY"];
    }
    $prquantity = $prquantity + $userquantity;
    $sqlinsert = "UPDATE CART SET CARTQUANTITY = '$prquantity' WHERE PRODUCTID = '$prodid' AND USERNAME = '$username'";
    
}else{
    $sqlinsert = "INSERT INTO CART(USERNAME,PRODUCTID,CARTQUANTITY) VALUES ('$username','$prodid',$userquantity)";
}

if ($conn->query($sqlinsert) === true)
{
    $sqlquantity = "SELECT * FROM CART WHERE USERNAME = '$username'";

    $resultq = $conn->query($sqlquantity);
    if ($resultq->num_rows > 0) {
        $quantity = 0;
        while ($row = $resultq ->fetch_assoc()){
            $quantity = $row["CARTQUANTITY"] + $quantity;
        }
    }

    $quantity = $quantity;
    echo "success,".$quantity;
}
else
{
    echo "0";
}

?>