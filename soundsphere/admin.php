<?php

session_start();
if(isset($_SESSION['user_id']) && $_SESSION['is_admin']){
       echo "bienvenue admin ";
}else{
    header("location: login.php");
}

?>