<?php
include ("connect.php");
$sql= "SELECT * FROM category";
$result = $conn->query($sql);
foreach($result as $row){
    $output = '
         <option value="'.$row['category'].'">'.$row['category'].'</option>
    ';
    echo $output;
 }



 

?>