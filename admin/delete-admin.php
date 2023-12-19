<?php include('partials/menu.php');?>


<?php
    $sql1 = "SELECT * FROM tbl_admin";
   
    $res1 = mysqli_query($conn,$sql1);
    $count = mysqli_num_rows($res1);
    echo $id = $_GET['id'];
    if($id !=27){
   
        echo $id = $_GET['id'];
    
        $sql = "DELETE FROM tbl_admin WHERE id=$id";
      
        $res = mysqli_query($conn,$sql);

        

        if($res==TRUE){
            
           $_SESSION['delete'] = "<div class='error'>Admin deleted successfully.</div>";
           
           header("location:".SITEURL.'admin/manage-admin.php');

        }
        else{
            
           $_SESSION['delete'] = "<div class='error'>Admin deleted unsuccess</div>";
          
           header("location:".SITEURL.'admin/manage-admin.php');
        }
   
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Can't Delete this admin</div>";
         
           header("location:".SITEURL.'admin/manage-admin.php');
    }


?>



<?php include('partials/footer.php'); ?>