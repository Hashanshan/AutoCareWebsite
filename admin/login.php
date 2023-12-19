<?php include('../confiq/constants.php');?>
<form action="" method="POST" class="login-form">
        <h3>login now</h3>
        <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);

                }
                if(isset($_SESSION['no-l0gin-message'])){
                    echo $_SESSION['no-l0gin-message'];
                    unset($_SESSION['no-l0gin-message']);

                }
        ?>
        <input type="text" placeholder="your User Name" name="username" class="box">
        <input type="password" placeholder="your password" name="password" class="box">
        
        <input type="submit" value="login now" name="submit"  class="btn">
    </form>

    <?php 

    if(isset($_POST['submit'])){
        
        $username = $_POST['username'];
     
        $password=md5($_POST['password']);
     
        $sql="SELECT * FROM tbl_admin WHERE user_name='$username' AND password='$password'";
        
        $res = mysqli_query($conn,$sql);


        $count = mysqli_num_rows($res);

        if($count==1){
    
            $_SESSION['login'] = "<div class = 'success'>Login Succesful.</div>";

            header('location:'.SITEURL.'admin/');

            $_SESSION['user'] = $username;
        }
        else{

            $_SESSION['login'] = "<div class = 'error text-center'>User name or Password didn't match.</div>";

            header('location:'.SITEURL.'front-end/index.php');
        }

    }
?>
