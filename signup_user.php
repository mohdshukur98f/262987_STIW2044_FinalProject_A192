<?php
error_reporting(0);
include_once ("dbconnect.php");
$username = $_POST['username'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$phone = $_POST['phone'];


$sqlinsert = "INSERT INTO USER(USERNAME,NAME,EMAIL,PHONE,PASSWORD,CREDIT,VERIFY,DATEREGISTER,GENDER) 
VALUES ('$username','Not Set','$email','$phone','$password','0','Not Verified',now(),'Not Set')";

if ($conn->query($sqlinsert) === true)
{
    sendEmail($email);
    echo "success";
    
}
else
{
    echo "failed";
}

//http://slumberjer.com/grocery/php/register_user.php?name=Ahmad%20Hanis&email=slumberjer@gmail.com&phone=01949494959&password=123456

function sendEmail($useremail) {
    $to      = $useremail; 
    $subject = 'Verification for My e-Stock'; 
    $message = 'http://seriouslaa.com/myestock/php/verify.php?email='.$useremail; 
    $headers = 'From: noreply@myestock.com' . "\r\n" . 
    'Reply-To: '.$useremail . "\r\n" . 
    'X-Mailer: PHP/' . phpversion(); 
    mail($to, $subject, $message, $headers); 
}

?>