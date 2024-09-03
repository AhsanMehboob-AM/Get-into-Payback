<?php
include("./config/db.php");
include("./processors/get_data.php");

$get_data_obj = new GetData();
$featured_post =  $get_data_obj->get_featured_post();
$all_post =  $get_data_obj->get_all_post();
$sharing_post =  $get_data_obj->get_sharing_post();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome To Payback</title>
    <?php include('./config/header.php') ?>
</head>

<body>
    <!--  main top hero section -->
    <div class="hero-main-section">

        <div id="main-hero-div">

            <img id="main-hero-image" class="img-fluid" src="./assets/images/main_hero.jpg" alt="main hero" />

        </div>

        <div class="hero-rectangle">
        </div>

        <div class="navigation-menu">
            <nav class="navbar navbar-expand-md ">
                <a class="navbar-brand" style="margin-left: 80px; margin-top:28px;" href="#">Payback</a>
                <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon ">-</span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto front-nav " style="margin-top: 28px;">
                        <li class="nav-item">
                            <a class="nav-link active-nav " href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="property_search.php">Property</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="contact-navbar-text" href="#" style="margin-right: 80px;">Contact</a>
                        </li>
                        <a href="login.php"> <button class="btn btn-outline-light" style="margin-right:80px;">Sign In</button></a>
                    </ul>
                </div>
            </nav>

        </div>

        <div class="hero-text">
            <p class="hero-text-heading">Discover most <br />Suitable <span id="property-text">Property</span></p>
            <p class="sub-heading-text">Find Your Ideal Property Investment: Tailored to Your Buying
                Needs and Future Savings Goals.</p>
            <a href="property_search.php" class="btn btn-light explore-btn">Explore More</a>
        </div>

    </div>
    <br />
    <!--  main top hero section end here -->

    <!--  featured section start -->

    <div class="container-fluid" style="margin-top: 564px;">


        <h2 class="featured-text">Featured Property</h2>

        <div class="row carousel " style="margin-top: 80px; max-width:100%;">



            <?php foreach ($featured_post as $val) { ?>
                <a href="property_details.php?id=<?php echo $val['id'] ?>">
                    <div style="padding-left: 15px; padding-right:15px;"> <img class="img-fluid img-rounded" src=<?php echo "seller_panel/assets/upload_images/" . $val['photo']; ?> alt="featured-image-2" style="max-height: 355px; min-height: 355px; width:100%;" />
                        <h3 class="featured-property-desc"><?php echo $val['title'] ?><span class="float-right" style="font-weight: 400; font-size: 18px; line-height: 26px; letter-spacing: -0.6px;">
                                <span><img src="./assets/images/market.png" class="float-left pr-1" /></span> <?php echo $val['city']  ?></span></h3>
                        <p class="featured-property-price"> pkr <?php echo $val['price'] ?></p>
                    </div>
                </a>
            <?php } ?>





        </div>
    </div>

    <!--  featured section ends here -->

    <!-- Property plans section start -->
    <div class="container-fluid  " style="background-color:#E7F0F5;  padding-top:100px; ">
        <h2 class="property-plans-text" style="padding-left: 35px; ">Property Plans </h2><a href="property_plans.php"><span id="all-product-see-more-btn" class="float-right mr-4 view-all-link">See More</span></a>
        <div id="property-plans-row" class="row" style="margin-top: 65px; padding-left: 30px; ">
            <?php


            foreach ($all_post as $val) { ?>


                <div class="col-md-4    mt-3 ml-xl-4  ml-3  p-0 " style="max-width: 590px;  ">
                    <a href="property_details.php?id=<?php echo $val['id'] ?>">
                        <div class="card  bg-white " style="border-radius:20px; min-height: 550px; max-height: 550px;">
                            <img class="card-img-top  img-fluid" src=<?php echo "seller_panel/assets/upload_images/" . $val['photo']; ?> style="min-height: 410px; max-height: 410px; border-top-left-radius: 20px;border-top-right-radius:20px;" alt="Card image">
                            <div class="card-body">
                                <p class="card-title"><?php echo $val['title'] ?></p> <span class="float-right prop-plan-price">pkr <?php echo $val['price'] ?></span>
                                <p class="card-text" style="color:black; font-size: 18px;"><span><img src="./assets/images/market.png" /></span> <?php echo $val['address'] ?>, <?php echo $val['city'] ?></p>

                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>



        </div>
    </div>



    <!-- Property plans ends  here -->

    <!-- Saving plans section start -->
    <div class="container-fluid  " style="background-color:#E7F0F5;  padding-top:100px;">
        <h2 class="property-plans-text" style="padding-left: 35px; ">Saving Plans </h2><a href="sharing_properties.php"><span id="saving-plans-see-more-btn" class="float-right mr-4 view-all-link">See More</span></a>
        <div id="saving-plans-row" class="row ml-lg-4 " style="margin-top: 65px;  ">

            <?php foreach ($sharing_post as $val) { ?>
                <div class="col-md-4 mt-3 ml-3 mr-3 p-0 " style="max-width:590px;">
                    <a href="property_details.php?id=<?php echo $val['id'] ?>">
                        <div class="card bg-white " style="border-radius: 20px; min-height: 550px; max-height: 550px;">
                            <img class="card-img-top img-fluid" src=<?php echo "seller_panel/assets/upload_images/" . $val['photo']; ?> style="min-height: 410px; max-height: 410px; border-top-left-radius: 20px;border-top-right-radius:20px;" alt="Card image">
                            <div class="card-img-overlay">
                                <h4 class="card-title"><span class="badge sharing-badge ">Sharing Available</span></h4>

                            </div>
                            <div class="card-body">
                                <p class="card-title"><?php echo $val['title'] ?></p> <span class="float-right prop-plan-price">pkr <?php echo $val['price'] ?></span>
                                <p class="card-text" style="color:black; font-size: 18px;"><span><img src="./assets/images/market.png" /></span> <?php echo $val['address'] ?>, <?php echo $val['city'] ?></p>

                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>





        </div>
        <!-- testemonials section start here -->

        <div class="row bg-white" style="margin-top: 177px; height: 730px;">
            <h2 class="testimonials-heading">What people say<br />
                about our dealing</h2>

        </div>
        <!-- testemonials section ends here -->

    </div>
    <!-- SAVING plans ends  here -->


    <!-- footer  start  here -->
    <?php include('./config/footer.php') ?>

    <!-- footer  ends  here -->





    <?php include("./config/js_footer.php") ?>


</body>

</html>