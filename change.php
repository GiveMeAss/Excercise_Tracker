<?php 
session_start();	

	if(isset($_POST["btn-reset"]))
	{
	    $servername = "localhost";
	    $username = "root";
	    $password = "7596964186";
	    $dbname = "testdatabase";

	    $conn = new mysqli($servername, $username, $password, $dbname);

	    if($conn -> connect_error)
	    {
	        die("connection failed: " . $conn->connect_error);
	    }

	    $username =	$_POST["username"];
        $oldpassword = $_POST["old-password"];
        $newpassword = $_POST["new-password"];

        $username = md5($username);
        $oldpassword = md5($oldpassword);
		$newpassword = md5($newpassword);	    


		$sql1 = "SELECT * from testtable WHERE username = '$username' && password = '$oldpassword' LIMIT 1";
        $execute1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($execute1) == 1) {
			$sqlu = "UPDATE testtable SET password = '$newpassword' WHERE username = '$username'";
	    	$executef = mysqli_query($conn , $sqlu);

	    	if($executef){
	        	header('Location: login.php');
			}
		}
		else
		{
			echo"<h5>Username or Password Not Valid</h5>";
		}	
	}	

?>

<!DOCTYPE html>
<html>
<head>
     <title>Exercise Tracker</title>
     <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="loign-box">
        	<div class="row">
        		<form action="" method="POST">
	        		<div class="form-group">
	                    <label>Enter Username</label>
	                    <input type="text" id="username" name="username" class="form-control" style="color: white; outline: none;" required>
	            	</div>
                    <div class="form-group">
	                    <label>Enter Old Password</label>
	                    <input type="Password" id="password" name="old-password" class="form-control" style="color: white; outline: none;" required>
	            	</div>
	            	<div class="form-group">
	                    <label>Enter New Password</label>
	                    <input type="Password" id="password" name="new-password" class="form-control" style="color: white; outline: none;" required>
	            	</div>
	            	<button name="btn-reset" class="btn btn-transparent" style="color: white; border: 1px solid black;">Reset Password</button>
            	</form>
            </div>
        </div>
	</div>
</body>