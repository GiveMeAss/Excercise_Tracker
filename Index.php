<?php 
  session_start();
  if($_SESSION['is_login'])
  {
    $user = $_SESSION["user"];
    $task1 = $_SESSION["task1"];
    $task2 = $_SESSION["task2"];
    $task3 = $_SESSION["task3"];
    $username = $_SESSION["username"];

    if(isset($_POST["update-btn"]))
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

        $user_name = $_SESSION["username"];
        $task = $_POST["task"];
        $input = $_POST["update"];

        $sqlu = "UPDATE testtable SET $task = '$input' WHERE username = '$user_name'";
        $executeu = mysqli_query($conn , $sqlu);

        if($executeu){
            $sql1 = "SELECT * from testtable WHERE username = '$user_name'";
            $execute1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($execute1) == 1) {
                    
                    $row = mysqli_fetch_assoc($execute1);
                    $task1u = $row["Task1"];
                    $task2u = $row["Task2"];
                    $task3u = $row["Task3"];    
                }
        }
    $task1 = $task1u;
    $task2 = $task2u;
    $task3 = $task3u;
    }

    if(isset($_POST["delete-btn"]))
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

        $user_name = $_SESSION["username"];
        $task = $_POST["task"];
        $input = $_POST["update"];

        $sqlu = "UPDATE testtable SET $task = '' WHERE username = '$user_name'";
        $executeu = mysqli_query($conn , $sqlu);

        if($executeu){
            $sql1 = "SELECT * from testtable WHERE username = '$user_name'";
            $execute1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($execute1) == 1) {
                    
                    $row = mysqli_fetch_assoc($execute1);
                    $task1u = $row["Task1"];
                    $task2u = $row["Task2"];
                    $task3u = $row["Task3"];    
                }
        }
    $task1 = $task1u;
    $task2 = $task2u;
    $task3 = $task3u;
    }

    if(isset($_POST["del-acc"]))
    {
      session_start();
      $_SESSION["done"] = false;
      if(isset($_SESSION["done"]) == false)
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

        $user_name = $_SESSION["username"];

        $q = "DELETE FROM testtable WHERE username = '$user_name'";
        $exeq = mysqli_query($conn, $q);
        if($exeq)
        {
          $_SESSION["done"] = true;
          header("Location:login.php"); 
        }
        else
        {
          echo "error";
        }
      }
      else
      {
        header("Location:login.php");
      }
    }
  }
  else
  {
    header("Location:validation.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style type="text/css">
    *{
      margin: 0rem;
      padding: 0rem;
      box-sizing: border-box;
    }
    .show th{
      padding: 5px;
    }
    .show td{
      padding: 5px;
      width: 100%; 
    }
    .button{
      display: flex;
      flex-direction: column;
      padding: 5px;
      margin: 0rem !important;
    }
    button{
      font-size: 16px;
      padding: 3px;
      outline: none;
      border: 1px solid black;
      border-radius: 4px;
      box-shadow: 1px 2px 5px black;
    }
    .footer{
      display: flex;
      flex-direction:row;
      justify-content:center;
    }
    .footer button{
      margin:1rem;
      padding:.5rem;
    }
  </style>
</head>
<body>
  <h1>Welcome: <?php echo $user  ?></h1>  	

  <br>

  <table class="show" style="border: 1px solid black; font-family: cursive; font-size: 25px; margin:1rem;" border="1">
    <tr>
      <th>Task1: </th>
      <td><?php echo $task1  ?></td>   
    </tr>
    <tr>
      <th>Task2: </th>
      <td><?php echo $task2  ?></td>
    </tr>
    <tr>
      <th>Task3: </th>  
      <td><?php echo $task3  ?></td>
    </tr>
  </table>

  <h1>Edit Option: </h1>
    <form  method="POST">

      <table class="edit" style="border: 1px solid black; font-family: cursive; font-size: 25px; margin:1rem; padding: 5px;" bgcolor="grey">
        <tr>
          <td>Choose Task:</td>
          <td><select name="task" style=" height: 2rem; width: 6rem; font-size: 20px; font-family: cursive; outline: none;">
            <option value="Task1">Task1</option>
            <option value="Task2">Task2</option>
            <option value="Task3">Task3</option>
          </select></td>       
        </tr>
        <tr>
          <td colspan="2" rowspan="3"><textarea name="update" id="update" style="width: 30rem; height: 6rem; outline: none; font-size: 18px; font-family: sans-serif; border: 1px solid black; padding: 3px;" placeholder="Write Here..."></textarea></td>
        </tr>
        <tr class="button">
          <td><button name="update-btn" style="background-color: green;">Update</button></td>
          <td><button name="delete-btn" style="background-color: red; padding: 3px 6px !important; margin-top: 5px;">Delete</button></td>
        </tr>
      </table>
    </form> 
  <div class="footer">
    <form method="POST"><h4 style="text-align: center;"><button name="del-acc" style="background-color: red;">Delete Account</button></h4></form>
    <h4 style="text-align: center;"><a href="logout.php" style="color: black;"><button style="background-color: grey;">Logout</button></a></h4>
    <h4 style="text-align: center;"><a href="change.php" style="color: black;"><button style="background-color: lightblue;">Change Password</button></a></h4>
  </div>
</body>
</html>