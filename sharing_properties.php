<?php
include("./config/db.php");
include("./processors/get_data.php");

$get_data_obj = new GetData();
$sharing_post =  $get_data_obj->get_all_sharing_posts();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Property Plans</title>
    <?php include('./config/header.php') ?>
</head>

<body>

    <!-- navbar section -->
    <?php include("./config/navbar.php") ?>
    <!-- navbar ends -->



    <!-- Saving plans section start -->
    <div class="container-fluid  " style="background-color:#E7F0F5;  padding-top:100px;">
        <h2 class="property-plans-text" style="padding-left: 35px; ">Saving Plans </h2>
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

        <br /><br /><br /><br /><br /><br /><br /><br />

    </div>
    <!-- SAVING plans ends  here -->



    <!-- footer  start  here -->
    <?php include('./config/footer.php') ?>

    <!-- footer  ends  here -->





    <?php include("./config/js_footer.php") ?>


</body>

</html>