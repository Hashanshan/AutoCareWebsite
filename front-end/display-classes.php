
<?php
    $sql = "SELECT * FROM tbl_category ";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    while($row=mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name'];
        
?>
<div class="box-container">
    <div class="box">
        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="">
        <h3><?php echo $title; ?></h3>
    </div>
</div>

<?php  
    }
?>