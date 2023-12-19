<?php include('../confiq/constants.php');?>
<html>
    <head>
        <title>Login - Vehicle Management System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="bgimg">
        <div class="login">
        <div class="container">
            <div class="logo">
            
                    <img src="../images/logo.jpg" alt="Vehicle Logo" class="img-responsive">
    </div>    
    <div class="clearfix"></div>
    </div>
            <h1 class="text-center">Login</h1>
            <br><br>
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
        <br><br>

            
            <form action="" method="POST" class="text-center">
                Username : 
                <br>
                <input type="text" name="username" placeholder="Username">
                <br><br>
                Password : 
                <br>
                <input type="password" name="password" placeholder="password">
                <br><br>
                <input type="submit" name="submit" value="Login" class="btn-primary">
            </form>
            <br><br>

        
            <p class="text-center">Developed By - <a href="https://www.facebook.com/hashan.shan.37">Hashan</a></p></p>
        </div>

`       </div>
    </body>
</html>

<?php 
   
    if(isset($_POST['submit'])){
      
        $username = mysqli_real_escape_string($conn,$_POST['username']);
     
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
          
            header('location:'.SITEURL.'admin/login.php');
        }

    }
?>
