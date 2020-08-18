<?php
    session_start();

        $servername = "localhost";
        $username = "root";
        $password = "7596964186";
        $dbname = "testdatabase";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn -> connect_error)
        {
            die("connection failed: " . $conn->connect_error);
        }

        $name = $_POST["name"];
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $task1 = $_POST["Task1"];
        $task2 = $_POST["Task2"];
        $task3 = $_POST["Task3"];

         $name = trim($name);

        $sql1 = "SELECT * FROM testtable WHERE username = '$user' LIMIT 1";

        $execute = mysqli_query($conn, $sql1);

        if($res = mysqli_num_rows($execute))
        {
            $_SESSION['taken'] = true;
            header('Location:login.php');
        }
        else{
            $sql = "INSERT INTO testtable(Name , username , password , Task1 , Task2 , Task3)
            VALUES('$name' , '$user' , '$pass' , '$task1' , '$task2' , '$task3')";

            if($conn->query($sql) === TRUE)
            {
                $_SESSION['sign'] = true;
                header('Location:login.php');
            }
            else {
                echo "error: " . $sql . "<br>" . $conn->error ; 
            }
        }
?>