<?php
ob_start();
SESSION_START();
include("connection.php");
?>
<?php
echo $sql="insert into `expenses`(`date`,`date_name`,`money`)values('".$_POST['date']."','".$_POST['date_name']."','".$_POST['money']."')";
$qry=mysql_query($sql);
$_SESSION['date_name']=$_POST['date_name'];
header("location:expenses.php");

?>
