<?php
/*
    ONE-TIME SETUP SCRIPT
    =====================
    1. Fill in your email and chosen password below
    2. Upload this file to your server
    3. Visit it once in your browser
    4. DELETE THIS FILE immediately after — it's a security risk to leave it up
*/

include("connection.php");

$email    = 'username@gmail.com';   // <-- change this
$password = 'password123';  // <-- change this

$hashed = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $hashed);

if ($stmt->execute()) {
    echo "Admin login created successfully. DELETE THIS FILE NOW.";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>