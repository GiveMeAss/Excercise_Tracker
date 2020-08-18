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

        $user = $_POST["username"];
        $pass = $_POST["password"];

        $sql = "SELECT * FROM testtable WHERE username = '$user' && password = '$pass'";

        $execute = mysqli_query($conn, $sql);

            if(mysqli_num_rows($execute) == 1)
            {
                $_SESSION["is_login"] = true;
            
                $sql1 = "SELECT * from testtable WHERE username = '$user'";
                $execute1 = mysqli_query($conn, $sql);
                if (mysqli_num_rows($execute1) == 1) {
                    
                    $row = mysqli_fetch_assoc($execute1);
                    $_SESSION["user"] = $row["Name"];
                    $_SESSION["task1"] = $row["Task1"];
                    $_SESSION["task2"] = $row["Task2"];
                    $_SESSION["task3"] = $row["Task3"];
                    $_SESSION["username"] = $user;                   
                    header("Location: Index.php");
                }
            }
            else
            {
                $_SESSION['not_login'] = true;
                header("Location: login.php");
            }
?>