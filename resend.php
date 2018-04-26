<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:index.php');
}
$lid=$_GET['lid'];
$sql="update tblleaves set Status=0,IsRead=0 where id=:lid";
$query = $dbh->prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
header('location:leavehistory.php');
?>