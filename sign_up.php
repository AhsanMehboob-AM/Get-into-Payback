<?php
include("./config/db.php");
include("./processors/set_data.php");

$set_data_obj = new SetData();
if (isset($_POST["submit"])) {
    $set_data_obj->create_user($_POST);
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <?php include('./config/header.php') ?>
    <style>
        #login-title {
            margin-top: 100px;
            padding-left: 100px;
            color: var(--light-grayscale-content-1, #1C1C1C);
            /* Heading / H3 - 24 */
            font-size: 24px;
            font-family: Inter;
            font-weight: 500;
            line-height: 32px;
        }


        .login-fields {
            margin-left: 80px;
            margin-top: 8px;
            padding-left: 40px;

        }

        .login-img {
            margin-top: 81px;
            position: relative;
            right: 100px;
            max-height: 394px;
            max-width: 517px;
        }

        .eye-icon {
            position: relative;
            top: -40px;
            left: 80px;
            float: right;

        }

        .password-icon {
            position: relative;
            top: -30px;
            left: 90px;
        }

        .email-icon {
            position: relative;
            top: -30px;
            left: 90px;
        }

        #remember-me {
            color: var(--light-grayscale-content-2, #585757);
            /* Paragraph/P2 - 16 */
            font-size: 16px;
            font-family: Inter;
            line-height: 24px;
        }

        #forget-password {
            float: right;
            color: #456BF3;
            text-align: right;
            /* Heading / H5 - 16 */
            font-size: 16px;
            font-family: Inter;
            font-weight: 500;
            line-height: 24px;
            margin-top: 5px;
            margin-right: -100px;
        }

        .login-btn {


            margin-left: 80px;
            margin-top: 24px;
            border-radius: 8px;
            background: #456BF3;
            /* Light/Drop Shadow/2 */
            box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.08), 0px 2px 1px 0px rgba(0, 0, 0, 0.06), 0px 1px 3px 0px rgba(0, 0, 0, 0.10);
            color: white;
        }

        .divider {
            border-bottom: 1px solid rgba(232, 232, 232, 1);
            height: 2px;
            margin-top: 10px;
            width: 380px;
            margin-left: 89px;
        }

        #account-signup-link {
            margin-left: 87px;
            /* Paragraph/P2 - 16 */
            font-size: 16px;
            font-family: Inter;
            line-height: 24px;
            color: rgba(88, 87, 87, 1);
        }

        #sign-up-link {
            color: #456BF3;
            /* Heading / H5 - 16 */
            font-size: 16px;
            font-family: Inter;
            font-weight: 500;
            line-height: 24px;
        }

        #sign-up-text {
            color: #969696;
            /* Paragraph / P3 - 13 */
            font-size: 13px;
            font-family: Inter;
            line-height: 20px;
            margin-left: 88px;
        }

        #term-and-condition {
            color: rgba(69, 107, 243, 1);
            font-size: 13px;
            font-family: Inter;
            line-height: 20px;
        }

        @media only screen and (max-width: 778px) {
            .login-img {
                margin-top: 81px;
                position: relative;
                right: 5px;
                max-height: 239px;
                max-width: 417px;
            }

            #forget-password {
                float: right;
                color: #456BF3;
                text-align: right;
                /* Heading / H5 - 16 */
                font-size: 16px;
                font-family: Inter;
                font-weight: 500;
                line-height: 24px;
                margin-top: 5px;
                margin-right: -30px;
            }

            #login-title {
                margin-top: 100px;
                padding-left: 40px;
                color: var(--light-grayscale-content-1, #1C1C1C);
                /* Heading / H3 - 24 */
                font-size: 24px;
                font-family: Inter;
                font-weight: 500;
                line-height: 32px;
            }

            .login-fields {
                margin-left: 0px;
                margin-top: 8px;
                padding-left: 48px !important;

            }

            .divider {

                margin-left: 10px;
                max-width: 330px;
            }




            .email-icon {
                position: relative;
                top: -30px;
                left: 20px;
            }

            .eye-icon {
                position: relative;
                top: -40px;
                left: 3px !important;
                float: right;
            }

            .password-icon {
                position: relative;
                top: -30px;
                left: 20px;

            }

        }
    </style>
</head>

<body>
    <!-- navbar section -->
    <?php include("./config/navbar.php") ?>
    <!-- navbar ends -->


    <div class="container-fluid">


        <div class="row ">

            <div class="col-md-7">
                <h2 id="login-title">Create account</h2>

                <form method="post">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label class="label-control" style="margin-left: 80px;">Full name</label>
                                <input class="login-fields form-control" type="text" required name="full_name" id="full_name" />
                            </div>
                            <div class="col-md-6 mt-3">
                                <label style="margin-left: 80px;">phone number</label>
                                <input class="login-fields form-control" type="number" required name="number" id="number" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label class="label-control" style="margin-left: 80px;">Email</label>
                                <input class="login-fields form-control" type="email" required name="email" id="email" />
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="label-control" style="margin-left: 80px;">Password</label>
                                <input class="login-fields form-control" type="password" required name="password" id="password" />
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">

                                <input class="login-fields " value="buyer" type="radio" required name="user_status" /> Buyer
                                <input class="login-fields " checked value="seller" type="radio" required name="user_status" /> Seller
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label class="label-control" style="margin-left: 80px;">Country</label>
                                <select value="PAK" data-role="country-selector" class="form-control login-fields" name="country">
                                    <!-- <option>Select</option> -->
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="label-control" style="margin-left: 80px;">City</label>
                                <input class="login-fields form-control" type="text" required name="city" id="city" />
                            </div>
                        </div>

                        <input type="submit" class="btn login-btn" id="login" name="submit" value='Create Account' />
                        <br />

                        <br />
                        <p id="sign-up-text">By clicking the 'Sign Up' button, you confirm that you accept
                            our <span id="term-and-condition">Terms and Conditions</span></p>
                        <div class="divider"></div>
                        <br />
                        <p id="sign-up-text">Have an account? <span id="term-and-condition"><a href="login.php">Login</a></span></p>
                    </div>




                </form>

            </div>
            <div class="col-md-3">


                <img class="img-fluid login-img" src="./assets/images/login.png" alt="login-image" />

            </div>


        </div>






    </div>




    <?php include("./config/js_footer.php") ?>
</body>