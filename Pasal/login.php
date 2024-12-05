<?php
session_start();
require 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $username, $hashed_password);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                
                // Display success message and redirect
                echo "<script>
                        alert('Login successful!');
                        window.location.href = 'index.php';
                      </script>";
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No user found with that email address.";
        }
        $stmt->close();
    } else {
        $error = 'Email and password are required.';
    }
    $conn->close();
}
?>
