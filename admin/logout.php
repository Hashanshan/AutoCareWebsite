<?php 

    include('../confiq/constants.php');
   
    session_destroy();
   
    header('location:'.SITEURL.'front-end/index.php');
?>