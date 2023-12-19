<?php include ('partials/menu.php')?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Vehicle</h1>
        <br><br>
        <?php
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

        ?>

        <form action=""method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                
                
                <tr>
                    <td>Make: </td>
                    <td>
                        <input type="text" name="make" placeholder="Isuzu" required>
                    </td>
                </tr>
                <tr>
                    <td>Class: </td>
                    <td>
                        <select name="category">

                            <?php
                                
                                $sql = "SELECT * FROM tbl_category ";

                                $res = mysqli_query($conn,$sql);
                                
                                $count = mysqli_num_rows($res);
                                


                                if($count>0){
                                   
                                    while($row=mysqli_fetch_assoc($res)){
                                      
                                        $id = $row['id'];
                                        $title = $row['title'];
                                       
                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else{
                                    
                                    ?>

                                    <option value="0">No Class Found</option>

                                    <?php
                                }
                                
                                
                            ?>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select_Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                

                <tr>
                    <td>Fuel_Type:</td>
                    <td>
                        <input type="radio" value="petrol" name="fuel">Petrol
                        <input type="radio" value="diesel" name="fuel">Diesel
                        <input type="radio" value="electric" name="fuel">Electric
                    </td>
                </tr>
                <tr>
                    <td>Manufactured_year:</td>
                    <td>
                                
                                <input type="number" name="year">
                    </td>
                </tr>

                <tr>
                    <td>Origin_Country:</td>
                    <td>
                        <input type="text" name="country">
                    </td>
                </tr>

                <tr>
                    <td>Cylinder_Capacity:</td>
                    <td>
                        <input type="number" name="cylinder">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add-vehicle" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
       
            if (isset($_POST['submit'])){
               
                $category=$_POST['category'];
                $make=$_POST['make'];
                $year=$_POST['year'];
                $cylinder=$_POST['cylinder'];         
                $country=$_POST['country'];
               
                
                if(isset($_POST['fuel'])){
                    $fuel_type=$_POST['fuel'];
                }
                else{
                    
                    $fuel_type = 'petrol';
                }

                
                if(isset($_FILES['image']['name'])){
                  

                    $image_name=$_FILES['image']['name'];
                   
                    if($image_name!=""){

                            

                             
                            $ext = end(explode('.',$image_name));

                          
                            $image_name = "Vehicle_name_".rand(000,999).'.'.$ext;

                            $source_path=$_FILES['image']['tmp_name'];

                            $destination_path="../images/vehicle/".$image_name;

                         
                            $upload = move_uploaded_file($source_path,$destination_path);

                            
                            if($upload==false){
                                
                                $_SESSION['uploadd'] = "<div class='error'>Failed to Upload Image.</div>";
                                
                                header('location:'.SITEURL.'admin/manage-vehicle.php');
                               
                                die();
                            }

                            
                }
            } 
                else{
                    $image_name="";
                }

              
                $sql2 = "INSERT INTO tbl_vehicle SET
                make = '$make',
                image_name = '$image_name',
                category_id = $category,
                fuel_type = '$fuel_type',
                year = $year,
                cylinder=$cylinder,
                country='$country'
                ";
                $res2 = mysqli_query($conn,$sql2);

                if($res2==true){
                    
                    $_SESSION['add'] = "<div class='success'>vehicle added Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-vehicle.php');
                }
                else{
                   
                    $_SESSION['add'] = "<div class='error'>Vehicle add failed.</div>";
                    header('location:'.SITEURL.'admin/add-vehicle.php');
                }



            }
        ?>
    </div>
</div>
<?php include ('partials/footer.php')?>