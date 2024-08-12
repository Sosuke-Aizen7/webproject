<?php
    session_start();

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_select_db($con, 'todologin');

    if (isset($_POST['user']) && isset($_POST['mail']) && isset($_POST['pass'])) {
        $user = mysqli_real_escape_string($con, $_POST['user']);
        $mail = mysqli_real_escape_string($con, $_POST['mail']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);

        // Combined SQL query string
        $s = "SELECT * FROM register WHERE username = '$user' OR email = '$mail'";

        $result = mysqli_query($con, $s);

        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        $num = mysqli_num_rows($result);

        if ($num > 0) {
            echo "<script>alert('Username or email already taken');</script>";
        } else {
            $reg = "INSERT INTO register (username, email, password) VALUES ('$user', '$mail', '$pass')";
            if (mysqli_query($con, $reg)) {
                echo "New registration successful";
            } else {
                echo "Error: " . $reg . "<br>" . mysqli_error($con);
            }
        }
    } else {
        echo "Post data not set.";
    }

    mysqli_close($con);
?>
