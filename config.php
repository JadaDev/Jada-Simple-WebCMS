<?php
// Config.php

// Database Configuration
define("WEBSITE_NAME", "Jada-Web"); // This is the website Name
define("TITLE_MESSAGE", "JadaDev Simple WebCMS"); // This is Index Message
define("DASHBOARD_WELCOME", "Welcome, "); // This is Dashboard Message than the user name!

// Database Host ( 127.0.0.1 or localhost )
$servername = "localhost";
// Database User ( exp : root )
$username = "root";
// Database Pass ( exp : ascent )
$password = "ascent";
// Database Name ( exp : jada_web )
$dbname = "jada_web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
