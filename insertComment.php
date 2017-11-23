
<?php
require "connection.php";

$comment=isset($_GET['comment'])?$_GET['comment']:"";
$name=isset($_GET['name'])?$_GET['name']:"";
$email=isset($_GET['email'])?$_GET['email']:"";
if($comment !=null && $name !=null && $email !=null){
$str1="insert into user_comments (comment_Author, comment_author_Email, comment_Content) values('$name','$email','$comment')";
$result1=mysqli_query($con,$str1); }
else{
	echo "Failed";
}

?>

