<?php 
session_start();

// session_unset('login_status');
// session_unset('user_id');
// session_unset('user_name');

session_destroy();

header('location:index.php');
 ?>