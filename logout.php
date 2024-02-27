<?php
// Logout.php

// Start output buffering
ob_start();

// Include menu.php to start the session
include 'menu.php';

// Unset all of the session variables
$_SESSION = array();

// Destroy the session if it has been initialized
if (session_id()) {
    session_destroy();
}

// Redirect to the index page
header("Location: index.php");

// End output buffering and flush the output buffer
ob_end_flush();
exit();
?>
