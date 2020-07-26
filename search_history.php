<?php
error_reporting(0);
include_once ("dbconnect.php");
$username = $_POST['username'];
$history = $_POST['history'];



$sqlinsert = "INSERT INTO SEARCH_HISTORY(USERNAME,SEARCH,DATESEARCH) 
VALUES ('$username','$history',now())";

if ($conn->query($sqlinsert) === true)
{
    echo "success";
    
}
else
{
    echo "failed";
}
?>