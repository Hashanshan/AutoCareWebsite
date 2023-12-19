<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>
            <?php 
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>
        <br><br>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Class: </td>
                    <td>
                        <input type="text" name="title" placeholder="Motor-Lorry" required>
                    </td>
                </tr>
                

                <tr>
                    <td>Select image: </td>
                    <td>
                        <input type="file" name="image" accept="image" >
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Class" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
        <?php 
         
            if(isset($_POST['submit'])){
              

               
                $title=$_POST['title'];
                

                
               
                
                if(isset($_FILES['image']['name'])){
                    
                    $image_name=$_FILES['image']['name'];
                    
                    if($image_name!=""){

                            

                             
                            $ext = end(explode('.',$image_name));

                           
                            $image_name = "Vehicle_class_".rand(000,999).'.'.$ext;

                            $source_path=$_FILES['image']['tmp_name'];

                            $destination_path="../images/category/".$image_name;

                            
                            $upload = move_uploaded_file($source_path,$destination_path);

                            
                            if($upload==false){
                               
                                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                               
                                header('location:'.SITEURL.'admin/add-class.php');
                                
                                die();
                            }

                            
                }
            }   
                else{
                    
                    $image_name="";
                }

                
                $sql="INSERT INTO tbl_category SET
                title='$title',
                
                image_name='$image_name'
                ";

                
                $res=mysqli_query($conn,$sql);
                
                
                if($res==true){
                    
                    $_SESSION['add'] = "<div class='success'>Class Added Successfuly.</div>";
                    
                    header('location:'.SITEURL.'admin/manage-class.php');

                }
                else{
                    
                    $_SESSION['add'] = "<div class='error'>Failed to Add Class.</div>";
                    
                    header('location:'.SITEURL.'admin/add-class.php');

                }
            }
        ?>
        
    </div>
</div>

<?php include('partials/footer.php'); ?>