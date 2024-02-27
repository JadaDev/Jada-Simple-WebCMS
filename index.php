<?php
// index.php

// The Menu
include 'menu.php';

// Check if user is already logged in
if (isset($_SESSION['username'])) {
    $loggedIn = true;
    $username = $_SESSION['username'];
} else {
    $loggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center"><?php echo TITLE_MESSAGE; ?></h3>
                    </div>
                    <div class="card-body">
                        <?php if ($loggedIn): ?>
                            <p>Welcome back, <?php echo $username; ?>!</p>
                            <!-- Here you can display additional content for logged in users -->
                            <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                        <?php else: ?>
                            <p>This is a simple authentication system example with PHP and MySQL. You can register an account or log in to access more features.</p>
                            <div class="text-center">
                                <a href="register.php" class="btn btn-primary">Register</a>
                                <a href="login.php" class="btn btn-success">Login</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
