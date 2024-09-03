<?php
include("./config/db.php");
include("./processors/set_data.php");
include("./processors/get_data.php");


if (isset($_GET["id"])) {
    $get_data_obj = new GetData();
    $post =  $get_data_obj->get_specific_post_details($_GET["id"]);
    $related_post =  $get_data_obj->get_related_posts($post["title"], $post["city"], $post["price"]);
    $get_agent_profile =  $get_data_obj->get_agent_profile($post["user_id"]);
}


$set_data_obj = new SetData();
if (isset($_POST["submit"])) {
    $set_data_obj->send_inquiry($_POST, $_FILES);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Property Details</title>
    <?php include('./config/header.php') ?>
</head>

<body>
    <!-- navbar section -->
    <?php include("./config/navbar.php") ?>
    <!-- navbar ends -->

    <!-- property details start here -->

    <div class="container-fluid" style="margin-top: 97px;">
        <div class="row">

            <div class="col-md-6" style="padding-left: 80px;">
                <img class="img-fluid img-rounded shadow" src=<?php echo "seller_panel/assets/upload_images/" . $post['photo']; ?> alt="property-desc-image" style="height: 713px;width: 613px;" />
            </div>
            <div class="col-md-6">
                <span style="margin-left: 35px;">PKR</span><span class="prop-desc-price"> <?php echo $post["price"] ?></span>
                <p class="prop-desc-title"><?php echo $post["title"] ?></p>
                <span style="margin-left: 10px;"><img src="./assets/images/loc2.png" alt="loc2" /></span> <span class="prop-desc-location"> <?php echo $post["address"] ?> <?php echo $post["city"] ?></span>

                <?php
                if ($post['property_type'] == 'sharing' || $post['status'] == 'sharing') {
                ?>
                    <div><span class="badge prop-desc-sharing-badge">Sharing available</span></div>
                <?php }
                ?>

                <?php

                if (!str_contains(strtolower($post['title']), 'plot')) {
                ?>


                    <div class="rooms-desc shadow">
                        <span class="room-desc-details-heading">Details</span>
                        <div class="prop-desc-divider"></div>
                        <div class="no-of-rooms-section">
                            <div class="no-of-rooms"><span><img src="./assets/images/bed.png" alt="bed" /></span> <?php echo $post["bedroom_no"] ?></div>
                            <div class="no-of-rooms"><span> <img src="./assets/images/baat.png" alt="baat" /></span> <?php echo $post["bathroom_no"] ?></div>
                            <div class="no-of-rooms"><span> <img src="./assets/images/sun.png" alt="sun" /></span> <?php echo $post["windows_no"] ?></div>
                            <div class="no-of-rooms"><span> <img src="./assets/images/guest.png" alt="guest" /></span> <?php echo $post["kitchen_no"] ?></div>
                        </div>
                    </div>

                <?php
                }
                ?>

                <div style="margin-top: 79px; margin-left: 35px;">
                    <p class="description">Description</p>
                    <div style="margin-top: 32px; height:10px; border-bottom: 1px solid #E4E4E4;"></div>
                    <div style="margin-top: 35px;">
                        <p class="desc-text-details"><?php echo $post["description"] ?></p>


                    </div>


                </div>
                <?php if (isset($_SESSION['message'])) {
                    echo "<div class='alert alert-success'> " . $_SESSION['message'] . "</div>";
                } ?>
                <?php if (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger'> " . $_SESSION['error'] . "</div>";
                } ?>
                <?php
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    unset($_SESSION['error']);
                } ?>
                <div>
                    <a href="tel:<?php echo $post['phone'] ?>"><button class="call-now-btn"><span><img src="./assets/images/phone.png" /></span>&nbsp;&nbsp;&nbsp;Call Now</button></a>
                    <button type="button" data-toggle="modal" data-target="#myModal" class="float-right inquiry-btn"><span><img src="./assets/images/msg.png" /></span>&nbsp;&nbsp;&nbsp;Inquire</button>
                </div>

                <div class="mt-4">
                    <?php
                    if (isset($get_agent_profile['id'])) {
                    ?>
                        <div class=" p-0  " style="max-width: 400px; border:none;">

                            <div class="card-body  p-0">
                                <h6 class="card-title" style="font-size: 14px;">Posted By</h6>
                              <hr/>

                                <a style="color:black;" href="agent_profile.php?id=<?php echo $get_agent_profile['id'] ?>">
                                    <p class="card-text">

                                        <?php if (isset($get_agent_profile['image'])) { ?>
                                            <img style="max-height: 39px; border-radius: 30px;" src=<?php echo "seller_panel/assets/upload_images/" . $get_agent_profile['image']; ?> alt="agent-pic" /> &nbsp;

                                        <?php } else { ?>
                                            <img style="max-height: 39px; border-radius: 30px;" src="./seller_panel/assets//img/avatars/5.png" alt="agent-pic" /> &nbsp;
                                        <?php }
                                        ?>
                                        <?php if (isset($get_agent_profile['name'])) { ?>
                                            <span style="font-weight: 500;"> <?php echo $get_agent_profile['name'] ?></span>

                                        <?php } ?>



                                    </p>
                                </a>
                                <!-- <a style="font-size: 14px;" href="agent_profile.php?id=<?php echo $get_agent_profile['id'] ?>" class="card-link ml-5 pl-3">View Profile</a> -->



                            </div>
                        </div> <?php                                }

                                ?>
                </div>
            </div>






        </div>

    </div>



    <!-- The Modal -->
    <div class="modal fade " style="margin-top:8%;" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">


                <form method="post" enctype="multipart/form-data">
                    <!-- Modal body -->
                    <div class="modal-body p-5">
                        <div class="row">

                            <h2 class="ml-3" style="font-weight: 500; color: black;  font-size: 24px;line-height: 32px;">Request Information</h2>
                            <div class="col-md-6 mt-4">
                                <label>First name</label>
                                <input type="text" name="first_name" class="form-control" required />

                            </div>
                            <div class="col-md-6 mt-4">
                                <label>Phone number</label>
                                <input type="number" name="phone_no" class="form-control" required />

                            </div>

                        </div>
                        <div class="row mt-2">
                            <input type='hidden' value="<?php echo $_GET['id'] ?>" name="post_id" />
                            <div class="col-md-12">
                                <label>What’s message about?
                                    *</label>
                                <select class="form-control" name="message_reason">
                                    <option>Select</option>
                                    <option value="property_buying">Property Buying</option>
                                    <option value="assistance">Assistance</option>
                                </select>

                            </div>

                        </div>
                        <div class="row mt-2">

                            <div class="col-md-12">
                                <label> Message
                                </label>
                                <textarea name="message" class="form-control">

                                </textarea>

                            </div>

                        </div>
                        <div class="row mt-2">

                            <div class="col-md-12">
                                <label style="color:black; font-size:13px;font-weight: 500; padding: 3px; border-radius: 6px; border: 1px solid #E8E8E8;" for="image"> <span><img src="./assets/images/camera.png" alt="camera" /></span> Upload Photo
                                </label>
                                <br />
                                <input style="display: none;" id="image" type="file" name="image" />

                            </div>
                            <br /> <br />
                            <button type="submit" name="submit" class="btn ml-3" style="background-color: #456BF3;color:white">Submit</button>

                        </div>
                    </div>
                    <form>

            </div>
        </div>
    </div>



    <!-- property details ends here -->










    </div>






    <!-- searches result starts -->
    <div class="container-fluid" style="background-color: #E7F0F5; margin-top: 113px;">
        <h2 class="related-result-text">Related Results</h2>
        <div class="row" style="overflow-x: hidden; padding-top: 65px;padding-left: 54px; padding-right: 30px; ">




            <?php foreach ($related_post as $val) {
                if ($val['id'] !== $_GET["id"]) {
            ?>
                    <div class="col-md-4 ml-4  p-0 " style="margin-top: 69px;">
                        <a href="property_details.php?id=<?php echo $val['id'] ?>">
                            <div class="card bg-white " style="min-height: 430px; max-height: 490px; border-radius: 20px; border-top-left-radius: 20px;border-top-right-radius:20px;">
                                <img style="min-height: 350px; max-height: 350px;" class="card-img-top img-fluid" src=<?php echo "seller_panel/assets/upload_images/" . $val['photo']; ?> alt="Card image">
                                <div class="card-body">
                                    <p class="card-title"><?php echo $val['title'] ?></p> <span class="float-right prop-plan-price">pkr <?php echo $val['price'] ?></span>
                                    <p class="card-text" style="color: black;"><span><img src="./assets/images/market.png" /></span> <?php echo $val['address'] ?>, <?php echo $val['city'] ?></p>

                                </div>
                            </div>
                        </a>
                    </div>

            <?php }
            } ?>



        </div>
        <br /> <br /> <br /> <br /><br /> <br /> <br /> <br />
    </div>

    <!-- searches results ends -->



    <!-- footer  start  here -->
    <?php include('./config/footer.php') ?>

    <!-- footer  ends  here -->


    <?php include("./config/js_footer.php") ?>
</body>