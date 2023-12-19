<?php
    
    include('../confiq/constants.php');




    if(isset($_GET['id']) && isset($_GET['image_name'])){

        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

       
        if($image_name!=""){
        
            $path = "../images/vehicle/".$image_name;
          
            $remove = unlink($path);
          
            if($remove==false){
                
                $_SESSION['remove']="<div class='error'>Failed to remove vehicle image.</div>";
             
                header('location:'.SITEURL.'admin/manage-vehicle.php');
               

                die();
            }
        }
       
            $sql="DELETE FROM tbl_vehicle WHERE id=$id";
        
            $res=mysqli_query($conn,$sql);

        

            if($res==true){
          
                $_SESSION['delete'] = "<div class='success'>Vehicle Deleted Successfully.</div>";
              
                header('location:'.SITEURL.'admin/manage-vehicle.php');
            }
            else{
                
                $_SESSION['delete'] = "<div class='error'>Class Delete Failed.</div>";
             
                header('location:'.SITEURL.'admin/manage-vehicle.php');

            }
    }
    else{
       
        header("location:".SITEURL.'admin/manage-vehicle.php');


    }

?>