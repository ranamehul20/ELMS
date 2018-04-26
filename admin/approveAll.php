<?php session_start();
error_reporting(0);
include('includes/config.php');
	if(isset($_POST['leave_id']))
	{
		$lid=trim($_POST['leave_id']);
		$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
		$sql="update tblleaves set Status=1,AdminRemarkDate=:admremarkdate where id=:did";
		$query = $dbh->prepare($sql);
		$query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
		$query->bindParam(':did',$lid,PDO::PARAM_STR);
		$query->execute();
	}
?>