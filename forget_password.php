<?php
if (isset($_POST['submit'])) {
    $email_value =   $_POST["email"];
    include("./php_mailer.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
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

        #login-sub-title {
            color: var(--light-grayscale-content-3, #969696);
            /* Paragraph / P3 - 13 */
            font-size: 13px;
            font-family: Inter;
            line-height: 20px;
            margin-left: 100px;
            margin-top: 25px;
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

            #login-sub-title {
                color: var(--light-grayscale-content-3, #969696);
                /* Paragraph / P3 - 13 */
                font-size: 13px;
                font-family: Inter;
                line-height: 20px;
                margin-left: 40px;
                margin-top: 25px;
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
                <h2 id="login-title">Forget Password</h2>
                <p id="login-sub-title">Provide Your Registered Email</p>
                <?php if (isset($_SESSION['message'])) {
                    echo "<div style='max-width:350px; margin-left:90px;' class='alert alert-success'> " . $_SESSION['message'] . "</div>";
                } ?>
                <?php if (isset($_SESSION['error'])) {
                    echo "<div style='max-width:350px; margin-left:90px;'  class='alert alert-danger'> " . $_SESSION['error'] . "</div>";
                } ?>
                <?php
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    unset($_SESSION['error']);
                } ?>
                <form method="post">
                    <div class="col-md-7">

                        <div>
                            <input type="email" placeholder="Email" class="form-control login-fields" required name="email" />
                            <span class="email-icon"><img src="./assets/images/account.png" /></span>
                        </div>


                        <input type="submit" class="btn login-btn" id="login" name="submit" value='Send Email' />
                        <br />
                        <div class="divider"></div>
                        <br />
                        <p id="account-signup-link">Want to login? <span id="sign-up-link"><a href="login.php">Login </a></span></p>
                    </div>




                </form>

            </div>



        </div>






    </div>




    <?php include("./config/js_footer.php") ?>
</body>