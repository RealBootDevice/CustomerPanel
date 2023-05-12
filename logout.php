<?php

///////////////////////////////////////////////////////
// Developed By: ChangeGame                          //
// My Discord: ! ChangeGame#4800                     //
// Built Using: PHP / HTML / CSS / JS / KeyAuth API  //
///////////////////////////////////////////////////////
// You are not allowed to sell the source it's made  //
// avaliable only for you to use, you can modify it  //
// as you want also credit me for making this not    //
// stealing the credits as that is gay ngl....       //
/////////////////////////////////////////////////////// 

// Initialize the session

session_start();

 

// Unset all of the session variables

$_SESSION = array();

// Destroy the session.

session_destroy();

// Unset login session variables.

unset($_SESSION['un']);

// Redirect to login page

header("location: /");

exit;

?>