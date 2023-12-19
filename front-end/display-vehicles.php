<?php
    $sql = "SELECT * FROM tbl_vehicle ";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

    while($row=mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $make= $row['make'];
        $country = $row['country'];
        $cylinder = $row['cylinder'];
        $image_name = $row['image_name'];
        $category_id = $row['category_id'];
        $fuel_type = $row['fuel_type'];
        $year= $row['year'];


        $sql2="SELECT * FROM tbl_category WHERE id=$category_id";
        $res2=mysqli_query($conn,$sql2);
        $row=mysqli_fetch_assoc($res2);
        $category_title=$row['title'];
        
        ?>
        <div class="swiper-slide box">
            <img src="<?php echo SITEURL; ?>images/vehicle/<?php echo $image_name; ?>"  alt="">
            <h3><?php echo $category_title; ?></h3><br>
            <h4>Make : <?php echo $make; ?></h4>
            <h4>Country : <?php echo $country; ?></h4>
            <h4>Cylinder Capacity : <?php echo $cylinder; ?>CC</h4>
            <h4>Manufacture Year : <?php echo $year; ?></h4>
            <h4>Fuel Type : <?php echo $fuel_type; ?></h4>
        </div>

    <?php
        }       
    ?>
