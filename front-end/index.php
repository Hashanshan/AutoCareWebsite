<!DOCTYPE html>
<html>
<head>
    
    <title>DHEMA Importers</title>
    <link rel="stylesheet" href="css/style.css">
    

</head>
<body>
    


<header class="header">

    <div class="logo">
            
        <img src="../images/logo.jpg" alt="Vehicle Logo" class="img-responsive">
    </div> 

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#features">features</a>
        <a href="#vehicles">vehicles</a>
        <a href="#classes">classes</a>
    </nav>

    <div class="icons">
       <div id="login-btn"><b>☞</b></div>
    </div>

     <?php include('../admin/login.php');?>
    
</header>



<section class="home" id="home">

    <div class="content">
        <h3>Find Your Vehicles</h3>
        <p><span>"DHEMA Importers"</span> is one of the most trusted, qualified & established licensed vehicle importer based in Sri-Lanka. 
            We deal in high-quality brand new & reconditioned vehicles.
             Get the ride of your best qualified deals at an affordable cost only at <span>"DHEMA Importers"</span>.</p>
        
    </div>

</section>



<section class="features" id="features">

    <h1 class="heading"> our <span>features</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/sale.jpg" alt="">
            <h3>Sales</h3>
            <p>💥Offer you great sales and services for vehicles,💥<br>
            💥ISUZU,CANTER,TOYOTA, and mAHINDRA. We are extensively based in areas💥</p>
        </div>

        <div class="box">
            <img src="image/repair.jpg" alt="">
            <h3>Repair</h3>
            <p>💥From cars to commercial vans, all Vehicle repairs, 💥<br>
            💥all makes and models undertaken.💥</p>
        </div>

        <div class="box">
            <img src="image/service.jpg" alt="">
            <h3>Service</h3>
            <p>💥Premium Quality Service @ The Lowest Price!💥<br>
                💥Enjoy DISCOUNTED Prices In DEMODERA! 💥</p>
            
        </div>

        

    </div>

</section>



<section class="vehicles" id="vehicles">

    <h1 class="heading"> our <span>vehicles</span> </h1>

    <div class="swiper vehicle-slider">

        <div class="swiper-wrapper">         

            <?php include ('display-vehicles.php')?>

        </div>

    </div>
       
    
</section>



<section class="classes" id="classes">

    <h1 class="heading"> vehicle <span>classes</span> </h1>

    <div class="box-container">

        <?php include ('display-classes.php')?>

    </div>

</section>




<?php include ('footer.php')?>

<script src="js/script.js"></script>

</body>
</html>