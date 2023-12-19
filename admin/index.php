<?php include('partials/menu.php');?>
                    
        
            <div class="main-content">
                <div class="wrapper">
                <?php
                        if(isset($_SESSION['login'])){
                            echo $_SESSION['login'];//thid id display session msg
                            unset($_SESSION['login']);//this is removing session msg

                        }
                    ?>
                    <br>
                    <h1>Make</h1>
                
                    <br><br>
                    <div class="col-4 text-center">
                        <?php
                            $sql="SELECT * FROM tbl_vehicle WHERE make='isuzu'";
                            $res = mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                        ?>
                        <h1><?php echo $count; ?></h1>
                        <br/>
                        ISUZU
                    </div>
                    <div class="col-4 text-center">
                    <?php
                            $sql="SELECT * FROM tbl_vehicle WHERE make='canter'";
                            $res = mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                        ?>
                        <h1><?php echo $count; ?></h1>
                        <br/>
                        CANTER
                    
                    </div>
                    <div class="col-4 text-center">
                    <?php
                            $sql="SELECT * FROM tbl_vehicle WHERE make='toyota'";
                            $res = mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                        ?>
                        <h1><?php echo $count; ?></h1>
                        <br/>
                        TOYOTA
                    </div>
                    <div class="col-4 text-center">
                    <?php
                            $sql="SELECT * FROM tbl_vehicle WHERE make='mahindra'";
                            $res = mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                        ?>
                        <h1><?php echo $count; ?></h1>
                        <br/>
                        MAHINDRA
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="wrapper">
                    <h1>Vehicles</h1>
                
                    <br><br>
                    <div class="col-4 text-center">
                        <?php
                            $sql2="SELECT * FROM tbl_category WHERE title = 'lorry'";
                             
                            $res2=mysqli_query($conn,$sql2);
             
                            
                            $count2=mysqli_num_rows($res2);
                            if($count2>0){
                               $row=mysqli_fetch_assoc($res2);
                               $category_id=$row['id'];
                            }
                            else{
                                $category_id = 0;
                            }

                            $sql="SELECT * FROM tbl_vehicle WHERE category_id = $category_id";
                            $res = mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                        ?>
                        <h1><?php echo $count; ?></h1>
                        <br/>
                        LORRY
                    </div>
                    <div class="col-4 text-center">
                    <?php
                            $sql2="SELECT * FROM tbl_category WHERE title = 'tipper'";
                           
                           $res2=mysqli_query($conn,$sql2);
                           $count2=mysqli_num_rows($res2);
                           if($count2>0){
                              $row=mysqli_fetch_assoc($res2);
                              $category_id=$row['id'];
                           }
                           else{
                               $category_id = 0;
                           }
            
                          

                           $sql="SELECT * FROM tbl_vehicle WHERE category_id = $category_id";
                           $res = mysqli_query($conn,$sql);
                           $count=mysqli_num_rows($res);
                        ?>
                        <h1><?php echo $count; ?></h1>
                        <br/>
                        TIPPER
                    
                    </div>
                    <div class="col-4 text-center">
                    <?php
                            $sql2="SELECT * FROM tbl_category WHERE title = 'van'";
                           #
                           $res2=mysqli_query($conn,$sql2);
                           $count2=mysqli_num_rows($res2);
                           if($count2>0){
                              $row=mysqli_fetch_assoc($res2);
                              $category_id=$row['id'];
                           }
                           else{
                               $category_id = 0;
                           }
            
                           

                           $sql="SELECT * FROM tbl_vehicle WHERE category_id = $category_id";
                           $res = mysqli_query($conn,$sql);
                           $count=mysqli_num_rows($res);
                        ?>
                        <h1><?php echo $count; ?></h1>
                        <br/>
                        VAN
                    </div>
                    <div class="col-4 text-center">
                    <?php
                            $sql2="SELECT * FROM tbl_category WHERE title = 'jeep'";
                            #
                           $res2=mysqli_query($conn,$sql2);
                           $count2=mysqli_num_rows($res2);
                        if($count2>0){
                           $row=mysqli_fetch_assoc($res2);
                           $category_id=$row['id'];
                        }
                        else{
                            $category_id = 0;
                        }

                           $sql="SELECT * FROM tbl_vehicle WHERE category_id = $category_id";
                           $res = mysqli_query($conn,$sql);
                           $count=mysqli_num_rows($res);

                        ?>
                        <h1><?php echo $count; ?></h1>
                        <br/>
                        JEEP
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            

<?php include('partials/footer.php');?>