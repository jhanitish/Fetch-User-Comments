<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <meta charset="utf-8">
	    <title>Login Page</title>
    </head>
	<style>
		form {
			border: 3px solid #f1f1f1;
			width: 30%;
		}

		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}

		button:hover {
			opacity: 0.8;
		}
		.container {
			padding: 16px;
		}

		span.password {
			float: right;
			padding-top: 16px;
		}
        .row{
			padding-top: 10%;
		}
	</style>

	<body>
		<center>
			<div class="row">
				<form action="" method="GET">
					<div class="container">
						<h1>Login Form</h1>
						<label><b>Username</b></label>
						<input type="text" placeholder="admin/user" name="name" required>

						<label><b>Password</b></label>
						<input type="password" placeholder="mypustak" name="password" required>
						
						<button type="submit" name="submit">Login</button>
					</div>
				</form>
			</div>
		</center>

	</body>
</html>
		<?php 
			if(isset($_GET['submit']))
				{
					$uname=$_GET['name'];
					$pass=$_GET['password'];
					if($uname=="admin" && $pass=="mypustak")
						{
							header("location:adminPanel.php");
						}
						else if($uname=="user" && $pass=="mypustak")
						{
							header("location:comment.php");
						}

					else{
					   ?>
					<center>
					   <p>User Does Not Exist!</p>
					</center>   
						<?php
						header("refresh:3;login.php");
					   }
			}
		?>