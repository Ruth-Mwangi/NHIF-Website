<?php
include("connect.php");
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$hospital=$_POST['hospital'];
$category=$_POST['category'];
$users=$_POST['citizen'];
$review=$_POST['review'];

$sql="INSERT INTO review (firstname, lastname,email,hospital,category,users,review) VALUES ('$firstname','$lastname','$email', '$hospital','$category','$users','$review')";

$sql2="UPDATE outpatient set users='$users' WHERE hospital='$hospital'";


if ($conn->query($sql) === TRUE) {
    echo "data inserted  ";
}
else 
{
    echo "failed";
}

if ($conn->query($sql2) === TRUE) {
    echo "data updated  ";
}
else 
{
    echo "failed";
}
?>