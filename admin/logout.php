<?php

session_start();

// if the user is logged in, unset the session

if (isset($_SESSION['auth'])) {

    unset($_SESSION['auth']);
}
session_destroy();

// go to login page

header('location: index.php');
?>