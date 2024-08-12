<?php
    session_start();

    // Database connection settings
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todologin";

    // Establish a database connection
    $con = mysqli_connect($server, $username, $password, $dbname);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if POST data is set
    if(isset($_POST['mail']) && isset($_POST['pass'])){
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];

        // Debugging output for POST data
        echo "Email: " . $mail . "<br>";
        echo "Password: " . $pass . "<br>";

        // Corrected SQL query string
        $s = "SELECT * FROM register WHERE email = '$mail' AND password = '$pass'";

        // Execute the query
        $result = mysqli_query($con, $s);

        // Check if query execution is successful
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        // Get the number of rows returned by the query
        $num = mysqli_num_rows($result);

        // Debugging output for number of rows
        echo "Number of rows: " . $num . "<br>";

        // Redirect based on query result
        if ($num == 1) {
            echo "Redirecting to index.php";
            header('Location: index.php');
            exit();
        } else {
            echo "Redirecting to login_register.php";
            header('Location: login_register.php');
            exit();
        }
    } else {
        //just checking: the below 3 line is not correct code i was only checking ...
            echo "Redirecting to index.php";
            header('Location: index.php');
            exit();
        // die("Post data not set.");
    }
?>
