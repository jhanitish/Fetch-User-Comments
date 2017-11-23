
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <meta charset="utf-8">
		<style type="text/css">
		  table {
			 border-collapse: collapse;
			 width: 50%;
			 
			}
          body{
			  text-align: center;
		  }
		  .row{
			  padding-left: 20px;
			  padding-right: 20px;
			  text-align: center;
		  }
          th, td {
				padding: 8px;
				text-align: left;
				border-bottom: 1px solid #ddd;
			}

       tr:hover{background-color:#f5f5f5}
		</style>
	</head>
	<body>
		<?php
			require "connection.php";
			$str="Select * from user_comments where comment_Status='0' and comment_Approved='New'";
			$result=mysqli_query($con,$str);
        ?>
	<div class="row">
	<?php 	if(count($result)>0) { ?>  
			<table>
			  <tr>
				<th>Name</th>
				<th>Comment</th>
				<th>Comment Id</th>
				<th>Email</th>
				<th>Comment Date</th>
				<th>Comment Status</th>
				</tr>
			  <?php foreach($result as $userComment){ ?>
			  <tr>
			    
				<td><?php echo $userComment['comment_Author'] ?></td>
				<td><?php echo $userComment['comment_Content'] ?></td>
				<td id="commentId"><?php echo $userComment['comment_Id'] ?></td>
				<td><?php echo $userComment['comment_author_Email'] ?></td>
				<td><?php echo $userComment['comment_Date'] ?></td>
				<td><select id="commentStatus">
					  <option value="new">New</option>
					  <option value="rejected">Rejected</option>
					  <option value="approved">Approved</option>
					</select></td>
				<td>
				  <button id="post" type="button" name="button">Done</button>
				</td>
			  </tr>
			  <?php } ?>
			</table>
	<?php }
     else{
		 echo "Currently no new comments are available for admin approval. We will update once new comments comes!!!!!!!!!!!";
	 }	?>			
        </div>			
	</body>
</html>	
<script>

var post = document.getElementById("post");
			if(post != null){
				post.addEventListener("click",function(e){
					var commentId = document.getElementById("commentId").innerHTML;
					var e = document.getElementById("commentStatus");
					var commentStatus = e.options[e.selectedIndex].text;
					var params = "commentId="+commentId+"&status="+commentStatus;
					var ajax = new XMLHttpRequest();
					ajax.open("GET", "commentStatus.php?" + params, true);
					ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
					ajax.onload = function() {
						try{
							var jsonResponse = this.responseText;
							console.log(jsonResponse['status']);
							if (ajax.status === 200 && jsonResponse['status'] != 'Fail') {
								//console.log("Oh Yeah !! Comment Submitted.");
							}
							else{
							}
						}
						catch(e){
							return;
							alert("Here");
						}
					};
					ajax.send(params);
				});
            }else{
			}

</script>