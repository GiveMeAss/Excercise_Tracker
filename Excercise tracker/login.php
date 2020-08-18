<?php 
    session_start();
    if(isset($_SESSION['sign']))
    {
        echo"<script>alert('Successfully Signed In')</script>";
        session_destroy();
    }
    
    if(isset($_SESSION['taken']))
    {
        echo"<script>alert('Username alredy taken')</script>";
        session_destroy();
    }

    if(isset($_SESSION['not_login']))
    {
        echo"<script>alert('Invalid Username or Password')</script>";
        session_destroy();
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
    <h1 style="text-align: center;">Welcome To Excercise Tracker</h1>
    <div style="text-align: center;"><p>&copy Copyright 2020 Shreyan Dey</p></div>
   <div class="loign-box">
        <div class="row">
            <div class="login-left" style="padding: 4.55rem 2rem;">
                <h3>Login</h3>
                <form action="validation.php" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>   
                </form>
            </div>
            <div class="login-right">
	            <h3>Sign in</h3>
                <form action='registration.php' method="POST">
                    <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div class="left">
                            <label>Name: </label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="right" style="margin-left: 1rem">
                            <label>Task1: </label>
                            <textarea id="Task1" name="Task1" class="form-control" style="height:36px"></textarea>
                        </div>
                    </div>
                    <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div class="left">
                            <label>Create a Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="right" style="margin-left: 1rem">
                            <label>Task2: </label>
                            <textarea id="Task2" name="Task2" class="form-control" style="height:36px"></textarea>
                        </div>
                    </div>
                    <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div class="left">
                            <label>Create a Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="right" style="margin-left: 1rem">
                            <label>Task3: </label>
                            <textarea id="Task3" name="Task3" class="form-control" style="height:36px"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>   
                </form>
            </div>   
        </div>
    </div>  
</div>
</body>
</html>