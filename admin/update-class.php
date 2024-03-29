<?php include('partials/menu.php')?>
<?php
 
    if(isset($_GET['id'])){
        
        $id=$_GET['id'];
      
        $sql="SELECT*FROM tbl_category WHERE id=$id";
        
        $res=mysqli_query($conn,$sql);

      
        $count=mysqli_num_rows($res);

        if($count==1){
          
            $row = mysqli_fetch_assoc($res);
            $title=$row['title'];
            
            $current_image=$row['image_name'];
            

        }
        else{
           
            $_SESSION['no-category-found'] = "<div class='error'>Can't find class.</div>";
            header('location:'.SITEURL.'admin/manage-class.php');
            
        }

    }
    else{
    
        header('location:'.SITEURL.'admin/manage-class.php');
    }
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                    <tr>
                        <td>Class: </td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title ?>">
                        </td>
                    </tr>

                   
                    <tr>
                        <td>CurrentImage: </td>
                        <td>
                            <?php
                                if($current_image!=""){
                                   
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image?>"width=100px>
                                    <?php

                                }
                                else{
                                   
                                    echo"<div class= 'error'>Image not available</div>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>NewImage:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    
                   
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Class" class="btn-secondary">
                        </td>
                    </tr>

                </table>
            </form>
            <?php
                if(isset($_POST['submit'])){
                   

                
                    $id=$_POST['id'];
                    $title=$_POST['title'];
                    
                    $current_image=$_POST['current_image'];
                   

                    if(isset($_FILES['image']['name'])){
                 
                        $image_name = $_FILES['image']['name'];

                      
                        if($image_name!=""){
                           
                            $ext = end(explode('.',$image_name));

                   
                            $image_name = "vehicle_class_".rand(000,999).'.'.$ext;

                            $source_path=$_FILES['image']['tmp_name'];

                            $destination_path="../images/category/".$image_name;

                     
                            $upload = move_uploaded_file($source_path,$destination_path);

                      
                            if($upload==false){
                        
                                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                             
                                header('location:'.SITEURL.'admin/manage-class.php');
                              
                                die();
                            }
                            
                   
                            if($current_image!=""){
                                $remove_path = "../images/category/".$current_image;
                                $remove= unlink($remove_path);

                                
                                if($remove==false){
                                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current_image</div>";
                                    header('location:'.SITEURL.'admin/manage-class.php');
                                    die();
                                }
                            }
                        }
                        else{
                            $image_name = $current_image;
                        }
                    }
                    else{
                        $image_name = $current_image;
                    }

                  
                    $sql2 = "UPDATE tbl_category SET 
                        title = '$title',
                        
                        image_name = '$image_name'
                        WHERE id=$id
                    ";

                    $res2 = mysqli_query($conn,$sql2);
                   
                    if($res2==true){

                 
                        $_SESSION['update'] = "<div class='success'>Class updated Successfuly</div>";
                        header('location:'.SITEURL.'admin/manage-class.php');
                    }
                    else{
              
                        $_SESSION['update'] = "<div class='error'>Class update failed</div>";
                        header('location:'.SITEURL.'admin/manage-class.php');
                    }
                }
            ?>
    </div>
</div>



<?php include('partials/footer.php')?>