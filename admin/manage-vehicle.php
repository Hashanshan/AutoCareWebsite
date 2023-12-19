
<?php include ('partials/menu.php')?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Vehicle</h1>
            </br></br>
                    <a href='<?php echo SITEURL; ?>admin/add-vehicle.php' class="btn-primary">Add Vehicle</a>
                </br></br></br>
                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['remove'])){
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['no-vehicle-found'])){
                        echo $_SESSION['no-vehicle-found'];
                        unset($_SESSION['no-vehicle-found']);
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['uploadd'])){
                        echo $_SESSION['uploadd'];
                        unset($_SESSION['uploadd']);
                    }
                    if(isset($_SESSION['failed-remove'])){
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                    }
                ?>
                    <table class="tbl-full">
                        <tr>
                            <th>S.N</th>
                            <th>Class</th>
                            <th>Make</th>
                            <th>Image</th>
                            <th>Fuel type</th>
                            <th>Manufacture Year</th>
                            <th>Origin Country</th>
                            <th>Cylinder Capacity</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                            
                            $sql = "SELECT * FROM tbl_vehicle ";
                            

                            
                            $res = mysqli_query($conn,$sql);

                         
                            $count = mysqli_num_rows($res);

                           
                            $sn=1;

                            
                            if($count>0){
                            
                                while($row=mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $make= $row['make'];
                                    $country = $row['country'];
                                    $cylinder = $row['cylinder'];
                                    $image_name = $row['image_name'];
                                    $category_id = $row['category_id'];
                                    $fuel_type = $row['fuel_type'];
                                    $year= $row['year'];


                                   
                                    ?>
                                    
                            <tr>
                                <td><?php  echo $sn++; ?></td>
                                 <td>
                                    <?php 
                                             $sql2="SELECT * FROM tbl_category WHERE id=$category_id";
                                      
                                             $res2=mysqli_query($conn,$sql2);
                            
                                               $row=mysqli_fetch_assoc($res2);
                                               $category_title=$row['title'];
                                               
                                               echo $category_title;
                                     
                                    ?>
                                 </td>
                                 <td><?php  echo $make; ?></td>
                                <td>
                                    <?php
                                      
                                        if($image_name != ""){
                                    
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/vehicle/<?php echo $image_name; ?>" width="100px">
                                            <?php
                                        }
                                        else{
                                      
                                            echo "<div class='error'>Image Not Available.</div>";
                                        }
                                    ?>
                                </td>
                               
                                <td><?php  echo $fuel_type; ?></td>
                                <td><?php  echo $year; ?></td>
                                <td><?php  echo $country; ?></td>
                                <td><?php  echo $cylinder; ?></td>
                                
                                <td>
                                        <a href="<?php echo SITEURL;?>admin/delete-vehicle.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete  Vehicle</a>
                                </td>
                            </tr>
                                    <?php
                                }                              
                            }
                            else{
                               
                                ?>
                                <tr>
                                    <td colspan = "6"><div class="error">No Vehicle Added.</div></td>
                                </tr>
                                <?php

                            }

                        ?>
                       
                       
                    </table>
        </div>
    </div>


<?php include ('partials/footer.php')?>