<?php 
    session_start();
    session_destroy();
    $base_url = 'http://localhost/cmet/';
    //Redirect to login page
    header('Location: '.$base_url.'user/auth/login.php');
?>