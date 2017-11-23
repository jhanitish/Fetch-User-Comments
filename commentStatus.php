<?php 

require "connection.php";

$commentId=isset($_GET['commentId'])?$_GET['commentId']:"";
$commentStatus=isset($_GET['status'])?$_GET['status']:"";
if($commentId !=null && $commentStatus !=null){
		if($commentStatus == "Approved"){
		$str1="update user_comments set comment_Status='1', comment_Approved='$commentStatus' where comment_Id='$commentId'";
		$result1=mysqli_query($con,$str1);
		echo $commentStatus; }
			else{
					$str1="update user_comments set comment_Approved='$commentStatus' where comment_Id='$commentId'";
		            $result1=mysqli_query($con,$str1);
		}
    }	
else{
	echo "Failed";
}
?>