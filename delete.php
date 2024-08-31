<?php
ob_start();
include("connection.php");
$id=$_GET['ID'];
echo $sql ="Delete  from `expenses` where `ID`='$id'";
$qry=mysql_query($sql);
if ($qry>0)
 {
    header("location:expenses.php");
} 
else {
    echo "Delete unsuccessful";
}
?>