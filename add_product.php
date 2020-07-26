<?php
error_reporting(0);
include_once ("dbconnect.php");
$prid = $_POST['prid'];
$prname  = ucwords($_POST['prname']);
$quantity  = $_POST['quantity'];
$price  = $_POST['price'];
$type  = $_POST['type'];
$weight  = $_POST['weight'];
$encoded_string = $_POST["encoded_string"];
$decoded_string = base64_decode($encoded_string);
$sold = '0';
$path = '../productimage/'.$prid.'.jpg';

$sqlinsert = "INSERT INTO PRODUCT(PRODUCTID,NAME,PRICE,QUANTITY,SOLD,WEIGHT,TYPE) VALUES ('$prid','$prname','$price','$quantity','$sold','$weight','$type')";
$sqlsearch = "SELECT * FROM PRODUCT WHERE PRODUCTID='$prid'";
$resultsearch = $conn->query($sqlsearch);
if ($resultsearch->num_rows > 0)
{
    echo 'found';
}else{
if ($conn->query($sqlinsert) === true)
{
    if (file_put_contents($path, $decoded_string)){
        echo 'success';
    }else{
        echo 'failed';
    }
}
else
{
    echo "failed";
}    
}


?>