<?php
session_start();
include("connection.php");

if(isset($_POST['uname']) && isset($_POST['psw'])) {
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];

    $sql = "SELECT * FROM login WHERE username = '$uname' AND password = '$psw'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['username'] = $uname;
        header("Location: viewBlog.php");
        exit();
    } else {
        echo '<script> 
            alert("Invalid username or password");
            window.location.href = "index.php";
        </script>';
    }
}
?>