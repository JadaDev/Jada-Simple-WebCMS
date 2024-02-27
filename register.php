<?php
// Register.php

// Start session if not already started
if (session_id() === '') {
    session_start();
}

require_once('config.php');

// Function to generate a salt
function generateSalt() {
    return uniqid(mt_rand(), true);
}

// Function to hash password with salt
function hashPassword($password, $salt) {
    return hash('sha256', $password . $salt);
}

// Function to register a new user
function registerUser($username, $email, $password) {
    global $conn;
    $salt = generateSalt();
    $hashedPassword = hashPassword($password, $salt);
    $sql = "INSERT INTO users (username, email, password, salt) VALUES ('$username', '$email', '$hashedPassword', '$salt')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to authenticate user
function authenticateUser($username, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = hashPassword($password, $row['salt']);
        if ($hashedPassword === $row['password']) {
            return true;
        }
    }
    return false;
}

// Registration form submission
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(registerUser($username, $email, $password)) {
        // Log in the user after successful registration
        if(authenticateUser($username, $password)) {
            // Start session and store username
            $_SESSION['username'] = $username;
            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Registration failed!";
        }
    } else {
        $error = "Registration failed!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- The Menu -->
    <?php include 'menu.php'; ?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Register</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <?php if(isset($error)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
