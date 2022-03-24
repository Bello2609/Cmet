<?php 
    session_start();
    include '../lib/dfunc.php';
    $base_url = 'http://localhost/cmet/';
    // Redirect if user is not logged in
    if(!isset($_SESSION['ssUser'])){
        //rediract to login page
        redirect($base_url.'user/auth/login.php');
    }
    else{
        if(isset($_GET['id'])){
            $cmdtext = "DELETE FROM room_details WHERE room_id = ".$_GET['id'];
            $res = executeQuery($cmdtext);
            if($res){
                echo "Room deleted successfully";
                redirect($base_url.'user');
            }
            else{
                echo "Unable to delete room";
            }
        }
        else{
            redirect($base_url.'user');
        }
    }

?>