<?php 
    session_start();
    
    $base_url = "http://localhost/cmet/";

    if(!isset($_SESSION['ssUser'])){
        //rediract to login page
        header("Location: ".$base_url."user/auth/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $page_title ?></title>