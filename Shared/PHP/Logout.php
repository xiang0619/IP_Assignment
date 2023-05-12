<?php
session_start();

session_unset();

    // Destroy the session
session_destroy();

    // Redirect to the login page or any other desired page
header('Location: http://localhost/IP_Assignment/Homepage.php');
exit();