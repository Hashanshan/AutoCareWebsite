<?php

    if(!isset($_SESSION['user'])){
     
        $_SESSION['no-l0gin-message'] = "<div class = 'error text-center'>Please Login to Continue.</div>";
      
        header('location:'.SITEURL.'front-end/index.php');

    }

?>