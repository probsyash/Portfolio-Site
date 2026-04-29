<?php
    include("connection.php");
    if(isset($_POST['uname']) && isset($_POST['psw'])) {
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $sql = "SELECT * FROM login WHERE username = '$uname' AND password = '$psw'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1) {
            session_start();
            $_SESSION['username'] = $uname;
            header("location: addEntry.php");
        } else {
            echo "Invalid username or password";
        }
    }
?> 