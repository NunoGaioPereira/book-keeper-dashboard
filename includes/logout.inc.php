<?php

session_start();
// unset($_SESSION['userId']);
session_unset(); //delete all session variables
session_destroy(); //destroy all variables
//Send back to home page
header("Location: ../login.php?error=loggedout");