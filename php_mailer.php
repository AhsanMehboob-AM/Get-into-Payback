<?php
require './assets/vendor/autoload.php'; // If you're using Composer (recommended)
include("./config/db.php");

try {

    $db = new DB();

    $post = "select * from users where email='$email_value' limit 1";
    $stmt = $db->db()->prepare($post);
    $stmt->execute();
    $rows = $stmt->fetch();

    if ($rows > 0) {

        $html  = $message = "To Reset Your Password <strong><a href=\"http://localhost/payback/reset_password.php/?token=" . $rows["user_random_id"] . "\"> Click Here</a></strong>";
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("w.khan@thezestit.com");
        $email->setSubject("Reset Your Password");
        $email->addTo($email_value);
        $email->addContent(
            "text/html",
            $html
            // "<strong>To Reset Your Password</strong> &nbsp;<a href='reset_password.php?token='" . $rows["user_random_id"] . "> Click Here</a>"
        );

        $sendgrid = new \SendGrid('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');
        try {
            $response = $sendgrid->send($email);
            $_SESSION["message"] = "Email Send Successfully!";
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    } else {
        $_SESSION["error"] = "Email Not Found!";
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}
