<?php
include("./config/db.php");
include("./processors/set_data.php");
include("./processors/get_data.php");

$get_data_obj = new GetData();
$set_data_obj = new SetData();
$cities =  $get_data_obj->get_cities();
$tags =  $get_data_obj->get_tags();



$set_data_obj = new SetData();
if (isset($_POST["search"]) && isset($_POST["city"])) {
    $posts = $get_data_obj->search_posts($_POST["search"], $_POST["city"]);
    $set_data_obj->add_tags($_POST["search"]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Property</title>
    <?php include('./config/header.php') ?>
</head>

<body>
    <!-- navbar section -->
    <?php include("./config/navbar.php") ?>
    <!-- navbar ends -->

    <!-- top searches -->
    <div class="container-fluid" style="height: 114px; background: linear-gradient(0deg, #F2F2F2, #F2F2F2), linear-gradient(0deg, #F2F2F2, #F2F2F2), #F2F2F2;
border: 1px solid #EFEFEF;">
        <span class="top-searches-text">Top Searches
        </span>
        <div style="display: flex; justify-content: center;">

            <!-- <span class="top-searches-active">All</span> -->
            <?php foreach ($tags as $val) { ?>
                <span class="searches-text "><?php echo $val['title'] ?></span>
            <?php } ?>

        </div>

    </div>
    <!-- top searches ends here -->


    <div class="container-fluid" style="height: 114px;background: linear-gradient(0deg, #456BF3, #456BF3), linear-gradient(0deg, #F2F2F2, #F2F2F2), #F2F2F2;
border: 1px solid #EFEFEF;">

        <div style="margin-top: 77px;" class="row justify-content-center">
            <form method="post">
                <input type="search" placeholder="search here" name="search" id="search" />
                <select class="city-search ml-3" name="city">
                    <option id="city-search-first-option"> <span><img src="./assets/images/loc.png" />
                        </span>Select City</option>
                    <?php
                    foreach ($cities as $val) {

                    ?>
                        <option value="<?php echo $val["city"] ?>"><?php echo ucwords($val["city"]) ?></option>
                    <?php
                    }


                    ?>

                </select>
            </form>
        </div>



    </div>

    <!-- top searches end -->
    <?php if (isset($_POST["search"]) && isset($_POST["city"])) {
    ?>
        <h2 class="search-result-text">Search Results <span id="search-counts"> (<?php echo count($posts) ?>)</span></h2>
    <?php } ?>

    <!-- searches result starts -->
    <div class="container-fluid">
        <div class="row" style="overflow-x: hidden;">


            <div class="searches-props">

                <div class="row ml-lg-4  props-row   " style="margin-top: 65px;  ">
                    <?php if (isset($_POST["search"]) && isset($_POST["city"])) { ?>
                        <?php if (!empty($posts)) { ?>
                            <?php foreach ($posts  as $val) { ?>
                                <div class="col-md-4 ml-5 mt-4  p-0 bg-white " style="max-width:498px; min-width: 380px;">
                                    <a style="color:black;" href="property_details.php?id=<?php echo $val['id'] ?>">
                                        <div class="card" style="border-radius: 20px;">
                                            <img class="card-img-top img-fluid" src=<?php echo "seller_panel/assets/upload_images/" . $val['photo']; ?> style="max-height: 430px; min-height: 430px; border-top-left-radius: 20px;border-top-right-radius:20px; " alt="Card image">
                                            <div class="card-body">
                                                <p class="card-title"><?php echo $val["title"] ?> <span class="float-right prop-plan-price">pkr <?php echo $val["price"] ?></span></p>
                                                <p class="card-text text-black"><span><img src="./assets/images/market.png" /></span> <?php echo $val["address"] ?>, <?php echo $val["city"] ?></p>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } else {
                            echo "<center><h5 style='margin-left:150px; margin-top:-40px; margin-right:250px;'>No Result Found!</h5></center>";
                        } ?>
                    <?php }  ?>







                </div>
            </div>
        </div>
    </div>
    <!-- searches results ends -->

    <br />
    <br /><br />
    <br />
    <br /><br />
    <!-- footer  start  here -->
    <?php include('./config/footer.php') ?>

    <!-- footer  ends  here -->


    <?php include("./config/js_footer.php") ?>
</body>