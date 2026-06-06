<?php
session_start();
include("connection.php");

if (isset($_POST['uname']) && isset($_POST['psw'])) {
    $uname = $_POST['uname'];
    $psw   = $_POST['psw'];

    // Prepared statement — prevents SQL injection
    $stmt = $conn->prepare("SELECT password FROM login WHERE username = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // password_verify checks the plain input against the stored hash
        if (password_verify($psw, $hashedPassword)) {
            session_regenerate_id(true); // prevents session fixation
            $_SESSION['username'] = $uname;
            header("Location: addEntry.php");
            exit();
        }
    }

    $stmt->close();

    // Always redirect to index on failure — don't reveal why it failed
    header("Location: index.php");
    exit();
}
?>