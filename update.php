<?php
ob_start();
include("connection.php");
$date=$_POST['date'];
$date_name=$_POST['date_name'];
$money=$_POST['money'];

$sql="update `expenses` set `date`='$date',`date_name`='$date_name',`money`='$money' where `date`='$date'";
$qry=mysql_query($sql);
header("location:expenses.php");
?>