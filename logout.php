<?php
$con=mysqli_connect('localhost','root','') or die(mysqli_error());
$db_select= mysqli_select_db($con,'trip_form') or die(mysqli_error());
$sql2="DELETE FROM tbl_check where state='login' ";
$sql3="DELETE FROM tbl_check where state='logout' ";
$res1= mysqli_query($con,$sql2) or die(mysqli_error());
$res1= mysqli_query($con,$sql3) or die(mysqli_error());
$sql1="INSERT INTO tbl_check SET
state='logout' ";
$res1=mysqli_query($con,$sql1) or die(mysqli_error());
header('location:http://localhost/form_project/login.php');
?>