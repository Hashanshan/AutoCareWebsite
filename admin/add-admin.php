<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
</br><?br>
<?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
 ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter your full name" Required ></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="user_name" placeholder="Enter your user name" Required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter your password" Required></td>
                </tr>
                <tr>
                    <td>ConfirmPassword: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="confirm password" Required>
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>



<?php include('partials/footer.php'); ?>
<?php
   
    if(isset($_POST['submit'])){
        
        $full_name=$_POST['full_name'];
        $user_name=$_POST['user_name'];
        $password=md5($_POST['password']);
        $confirm_password=md5($_POST['confirm_password']);

      
      if($confirm_password==$password){
                $sql="INSERT INTO tbl_admin SET 
                full_name='$full_name',
                user_name='$user_name',
                password='$password'
                ";
                
                $res = mysqli_query($conn,$sql) or die(mysqli_error());

                
                if($res==true){
                    
                    $_SESSION['add']="<div class='success'>Admin Added Succesfully.</div>";

                    
                    header("location:".SITEURL.'admin/manage-admin.php');


                }
                else{
                    
                    $_SESSION['add']="<div class = 'error' >Admin Added Unsuccess.</div>";

                    
                    header("location:".SITEURL.'admin/add-admin.php');
                }
            }
            else{
                
                $_SESSION['add'] = "<div class='error'>Password not matched.</div>";
                
                
                header("location:".SITEURL.'admin/add-admin.php');
                }
    }
    else{
        
       
    }
?>