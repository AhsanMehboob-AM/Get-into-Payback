<?php
include("./config/db.php");
include("./processors/get_data.php");
$get_data_obj = new GetData();

if (isset($_GET["id"])) {

    $get_agent_profile =  $get_data_obj->get_complete_agent_profile_details($_GET["id"]);

    if (!empty($get_agent_profile)) {
        $get_today_agent_post =  $get_data_obj->get_today_agent_posts($get_agent_profile["user_id"]);
        $deals_in_progress = $get_data_obj->get_deals_in_progress($get_agent_profile["user_id"]);
    }
} else {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Agent Profile</title>
    <?php include('./config/header.php') ?>
</head>

<body>
    <!-- navbar section -->
    <?php include("./config/navbar.php") ?>
    <!-- navbar ends -->
    <div class="container-fluid " id="agent-image-info">
        <div class="row">
            <div class="col-md-9">

                <?php
                if (isset($get_agent_profile['image'])) {
                ?>
                    <img style="max-height: 100px; margin-top: 70px; margin-left: 80px;" src=<?php echo "seller_panel/assets/upload_images/" . $get_agent_profile['image']; ?> alt="profile-pic" class="img-fluid  rounded-circle  agent-profile-pic" />
                <?php } else { ?>
                    <img style="max-height: 100px; " src="./seller_panel/assets/img/avatars/5.png" alt="profile-pic" class="img-fluid rounded-circle agent-profile-pic" />


                <?php
                }

                ?>

                <span class="agent-name">

                    <?php if (isset($get_agent_profile["name"])) { ?>

                        <?php echo ucwords($get_agent_profile["name"]) ?>
                    <?php } else {
                        echo "Not Provided By Agent";
                    } ?>


                </span> <span class="agent-shapes">|</span>
                <span> <img src="./assets/images/heart.png" alt="heart" class="img-fluid  agent-shapes" /></span>

                <p id="agent-profession" class="pl-2">Property Dealer <span> <img src="./assets/images/chkbox.png" alt="heart" class="img-fluid " /></span></p>
            </div>

            <div class="col-md-3">
                <?php if (isset($get_agent_profile["phone"])) { ?>

                    <span class="agent-phne"><?php echo ucwords($get_agent_profile["phone"]) ?> <span> <img src="./assets/images/call.png" alt="call" class="img-fluid  call-icon" /></span></span>
                <?php } else {
                ?>

                    <span class="agent-phne"> Not Provided <span> <img src="./assets/images/call.png" alt="call" class="img-fluid  call-icon" /></span></span>
                <?php
                } ?>

            </div>
        </div>

    </div>


    <div class="container-fluid">
        <div class="row">
            <h2 id="today-post-text">Today’s Posts</h2>

        </div>
        <div class="row pl-lg-5" style=" margin-top: 59px;">
            <div class="col-md-8">
                <div class="row">


                    <?php


                    if (!empty($get_today_agent_post)) {
                    ?>

                        <?php foreach ($get_today_agent_post as $val) { ?>

                            <div class="col-md-5">
                                <a style="color: black;" href="property_details.php?id=<?php echo $val['id'] ?>">
                                    <div class="card" style="border-radius: 20px; min-height: 420px; max-height: 420px;">
                                        <img style="max-height: 286px; min-height: 286px; border-top-right-radius:20px; border-top-left-radius:20px;" class="card-img-top img-fluid" src=<?php echo "seller_panel/assets/upload_images/" . $val['photo']; ?> alt="Card image">
                                        <div class="card-body">
                                            <p class="card-title"><?php echo $val['title'] ?></p> <span class="float-right prop-plan-price">pkr <?php echo $val['price'] ?></span>
                                            <p class="card-text"><span><img src="./assets/images/market.png" /></span> <?php echo $val['address'] ?>, <?php echo $val['city'] ?>.</p>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } else {
                        echo "<h6>No Posts Posted Today!</h6>";
                    } ?>
                </div>
            </div>
            <div class="col-md-4 pr-3" id="about-desc">
                <h2 id="about-text">About</h2>
                <div class="divider">
                    <span class="agent-personal-info">Company</span>
                    <?php if (isset($get_agent_profile["phone"])) { ?>

                        <span class=" agent-personal-info float-right"><?php echo ucwords($get_agent_profile["company"]) ?></span>
                    <?php } else {
                    ?>


                        <span class=" agent-personal-info float-right">------</span>
                    <?php
                    } ?>

                </div>
                <div class="divider">
                    <span class="agent-personal-loc">Location</span>
                    <?php if (isset($get_agent_profile["location"])) { ?>

                        <span class=" agent-personal-info float-right"><?php echo ucwords($get_agent_profile["location"]) ?></span>
                    <?php } else {
                    ?>

                        <span class=" agent-personal-info float-right">------</span>
                    <?php
                    } ?>

                </div>
                <!-- <div class="divider">
                    <span class="agent-personal-rating">Overall rating</span> <span class=" agent-personal-info float-right">4.8 (12) </span>
                </div> -->
                <h2 class="agent-profile-bottom-description-title">Description</h2>
                <div class="agent-description-info-text">
                    <?php if (isset($get_agent_profile["description"])) { ?>

                        <?php echo $get_agent_profile["description"] ?>
                    <?php } else {
                    ?>

                        Not Provided
                    <?php
                    } ?>

                </div>
            </div>
        </div>



    </div>






    <!-- searches result starts -->
    <div class="container-fluid" style=" margin-top: 60px;">
        <h2 class="deal-progress-title">Deals In Progress</h2>
        <div class="row pl-lg-5 " style="overflow-x: hidden; margin-top: 35px;">

            <?php


            if (!empty($deals_in_progress)) { ?>

                <?php foreach ($deals_in_progress as $val) { ?>
                    <div class="col-md-4 mt-2" style="max-width:362px;">
                        <a style="color:black;" href="property_details.php?id=<?php echo $val['id'] ?>">
                            <div class="card" style="border-radius: 20px; min-height: 420px; max-height: 420px;">
                                <img style="max-height: 286px; min-height: 286px; border-top-right-radius:20px; border-top-left-radius:20px;" class="card-img-top img-fluid" src=<?php echo "seller_panel/assets/upload_images/" . $val['photo']; ?> alt="Card image">
                                <div class="card-body">
                                    <p class="card-title"><?php echo ucwords($val["title"]) ?></p> <span class="float-right prop-plan-price">pkr <?php echo ucwords($val["price"]) ?></span>
                                    <p class="card-text"><span><img src="./assets/images/market.png" /></span> Bahria, <?php echo ucwords($val["city"]) ?></p>

                                </div>
                            </div>
                        </a>
                    </div>
            <?php }
            } else {
                echo "<h6>No Deals In Progress!</h6>";
            } ?>

        </div>



    </div>
    <br /> <br /> <br /> <br /><br /> <br /> <br /> <br />
    </div>

    <!-- searches results ends -->



    <!-- footer  start  here -->
    <?php include('./config/footer.php') ?>

    <!-- footer  ends  here -->


    <?php include("./config/js_footer.php") ?>
</body>