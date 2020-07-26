<?php
error_reporting(0);
include_once ("dbconnect.php");
$username = $_POST['username'];

if (isset($username)){
   $sql = "SELECT PRODUCT.PRODUCTID, PRODUCT.NAME, PRODUCT.PRICE, PRODUCT.QUANTITY, PRODUCT.WEIGHT, CART.CARTQUANTITY FROM PRODUCT INNER JOIN CART ON CART.PRODUCTID = PRODUCT.PRODUCTID WHERE CART.USERNAME = '$username'";
}

$result = $conn->query($sql);


if ($result->num_rows > 0)
{
    $response["cart"] = array();
    while ($row = $result->fetch_assoc())
    {
        $cartlist = array();
        $cartlist["PRODUCTID"] = $row["PRODUCTID"];
        $cartlist["NAME"] = $row["NAME"];
        $cartlist["PRICE"] = $row["PRICE"];
        $cartlist["QUANTITY"] = $row["QUANTITY"];
        $cartlist["CARTQUANTITY"] = $row["CARTQUANTITY"];
        $cartlist["WEIGHT"] = $row["WEIGHT"];
        $cartlist["YOURPRICE"] = round(doubleval($row["PRICE"])*(doubleval($row["CARTQUANTITY"])),2)."0";
        array_push($response["cart"], $cartlist);
    }
    echo json_encode($response);
}
else
{
    echo "Cart Empty";
}
?>