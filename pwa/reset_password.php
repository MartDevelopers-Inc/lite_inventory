<?php
/*
 *   Crafted On Mon Sep 16 2024
 *   By the one and only Martin Mbithi (martin@devlan.co.ke)
 *   
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD Super Duper User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. LICENSE TO BE AWESOME
 *   Congrats, you lucky human! Devlan Solutions LTD hereby bestows upon you the magical,
 *   revocable, personal, non-exclusive, and totally non-transferable right to install this epic system
 *   on not one, but TWO separate computers for your personal, non-commercial shenanigans.
 *   Unless, of course, you've leveled up with a commercial license from Devlan Solutions LTD.
 *   Sharing this software with others or letting them even peek at it? Nope, that's a big no-no.
 *   And don't even think about putting this on a network or letting a crowd join the fun unless you
 *   first scored a multi-user license from us. Sharing is caring, but rules are rules!
 *
 *   2. COPYRIGHT POWER-UP
 *   This Software is the prized possession of Devlan Solutions LTD and is shielded by copyright law
 *   and the forces of international copyright treaties. You better not try to hide or mess with
 *   any of our awesome proprietary notices, labels, or marks. Respect the swag!
 *
 *
 *   3. RESTRICTIONS, NO CHEAT CODES ALLOWED
 *   You may not, and you shall not let anyone else:
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or do any sneaky stuff to
 *   figure out the source code of this software;
 *   (b) modify, remix, distribute, or create your own funky version of this masterpiece;
 *   (c) copy (except for that one precious backup), distribute, show off in public, transmit, sell, rent,
 *   lease, or otherwise exploit the Software like it's your own.
 *
 *
 *   4. THE ENDGAME
 *   This License lasts until one of us says 'Game Over'. You can call it quits anytime by
 *   destroying the Software and all the copies you made (no hiding them under your bed).
 *   If you break any of these sacred rules, this License self-destructs, and you must obliterate
 *   every copy of the Software, no questions asked.
 *
 *
 *   5. NO GUARANTEES, JUST PIXELS
 *   DEVLAN SOLUTIONS LTD doesn’t guarantee this Software is flawless—it might have a few
 *   quirks, but who doesn’t? DEVLAN SOLUTIONS LTD washes its hands of any other warranties,
 *   implied or otherwise. That means no promises of perfect performance, marketability, or
 *   non-infringement. Some places have different rules, so you might have extra rights, but don’t
 *   count on us for backup if things go sideways. Use at your own risk, brave adventurer!
 *
 *
 *   6. SEVERABILITY—KEEP THE GOOD STUFF
 *   If any part of this License gets tossed out by a judge, don’t worry—the rest of the agreement
 *   still stands like a boss. Just because one piece fails doesn’t mean the whole thing crumbles.
 *
 *
 *   7. NO DAMAGE, NO DRAMA
 *   Under no circumstances will Devlan Solutions LTD or its squad be held responsible for any wild,
 *   indirect, or accidental chaos that might come from using this software—even if we warned you!
 *   And if you ever think you’ve got a claim, the most you’re getting out of us is the license fee you
 *   paid—if any. No drama, no big payouts, just pixels and code.
 *
 */

session_start();
require_once('../config/config.php');
require_once('../config/codeGen.php');

/* Handle Password Reset */
if (isset($_POST['ResetPassword'])) {
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $password_reset_token = $otp;
    /* Filter And Validate Email */
    if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_email = '{$user_email}' AND user_access_level = 'Manager'");
        if (mysqli_num_rows($sql) > 0) {
            /* Persist OTP And Email It */
            $sql = "UPDATE users SET  user_password_reset_token ='{$password_reset_token}' WHERE  user_email ='{$user_email}'";
            $prepare = $mysqli->prepare($sql);
            $prepare->execute();
            /* Detect Internet Connection First */
            switch (connection_status()) {
                case CONNECTION_NORMAL:
                    /* Load Mailer & Send Password Reset Instructions*/
                    require_once('../mailers/pwa_reset_password.php');
                    if ($prepare && $mail->send()) {
                        $_SESSION['success'] = 'Enter the code we have sent to your email';
                        header("Location: otp_confirm");
                        exit;
                        $success = "Password Reset Instructions Send To Your Email";
                    } else if (CONNECTION_ABORTED && CONNECTION_TIMEOUT) {
                        /* If No Connection Detected, Just Take User To Password Reset */
                        if ($prepare) {
                            $_SESSION['success'] = 'Confirm your new password';
                            header("Location: confirm_password?token=$password_reset_token");
                            exit;
                        } else {
                            $info = "Failed!, please try again we there";
                        }
                    }
                    break;
                default:
                    /* Do Not Mail Just Take User To Password Reset  */
                    if ($prepare) {
                        $_SESSION['success'] = 'Confirm your new password';
                        header("Location: confirm_password?token=$password_reset_token");
                        exit;
                    } else {
                        $err = "Please check your internet connectivity";
                    }
                    break;
            }
        } else {
            $err =  "No manager account with this email";
        }
    }
}

/* Load Header Partial */
require_once('../partials/pwa_head.php');

?>

<body>

    <!--page loader-->
    <div class="loader-wrapper">
        <div class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
            <div class="spinner-border text-white" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!--end loader-->

    <!--start wrapper-->
    <div class="wrapper">

        <!--start to page content-->
        <div class="page-content">

            <div class="login-body">
                <div class="text-center">
                    <img class="thubnail" width="50%" src="https://nativebeecare.co.ke/assets/img/logo/logo-dark.png" alt="">
                    <h5 class="fw-bold text-dark"><br><?php echo $system_name; ?></h5>
                    <p class="mb-0">Reset Password</p>
                </div>
                <br><br>
                <form class="mt-4" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" required class="form-control rounded-3" id="floatingInputEmail" name="user_email">
                        <label for="floatingInputEmail">Email</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="text-right"><a href="index" class="forgot-link">Remember Password?</a></div>
                    </div>
                    <br><br><br><br>
                    <div class="mb-0 d-grid">
                        <button type="submit" name="ResetPassword" class="btn btn-primary btn-ecomm rounded-3">Reset Password</button>
                    </div>
                </form>
            </div>

        </div>
        <!--end to page content-->
    </div>
    <!--end wrapper-->


    <!--JS Files-->
    <?php require_once('../partials/pwa_scripts.php'); ?>
</body>

</html>