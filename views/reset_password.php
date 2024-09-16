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
require_once('../config/app_config.php');
require_once('../config/codeGen.php');

/* Handle Password Reset */
if (isset($_POST['ResetPassword'])) {
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $password_reset_token = $checksum;
    $reset_url  =  $url . $checksum . '&email=' . $user_email;
    /* Filter And Validate Email */
    if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_email = '{$user_email}'");
        if (mysqli_num_rows($sql) > 0) {
            /* Persist Token And Email It */
            $sql = "UPDATE users SET  user_password_reset_token ='{$password_reset_token}' WHERE  user_email ='{$user_email}'";
            $prepare = $mysqli->prepare($sql);
            $prepare->execute();
            /* Detect Internet Connection First */
            switch (connection_status()) {
                case CONNECTION_NORMAL:
                    /* Load Mailer & Send Password Reset Instructions*/
                    require_once('../mailers/reset_password.php');
                    if ($prepare && $mail->send()) {
                        $success = "Password Reset Instructions Send To Your Email";
                    } else if (CONNECTION_ABORTED && CONNECTION_TIMEOUT) {
                        /* If No Connection Detected, Just Take User To Password Reset */
                        if ($prepare) {
                            $_SESSION['success'] = 'Confirm Your New Password';
                            header("Location: confirm_password?token=$password_reset_token");
                            exit;
                        } else {
                            $info = "Failed!, Please Try Again we there";
                        }
                    }
                    break;
                default:
                    /* Do Not Mail Just Take User To Password Reset  */
                    if ($prepare) {
                        $_SESSION['success'] = 'Confirm Your New Password';
                        header("Location: confirm_password?token=$password_reset_token");
                        exit;
                    } else {
                        $err = "Please Check Your Internet Connectivity atuko";
                    }
                    break;
            }
        } else {
            $err =  "No Account With This Email";
        }
    }
}
require_once('../partials/head.php');
?>

<body class="nk-body npc-crypto ui-clean pg-auth">
    <!-- app body @s -->
    <?php
    /* Wrap All This With System Settings */
    $ret = "SELECT * FROM  system_settings";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($settings = $res->fetch_object()) {
    ?>
        <div class="nk-app-root">
            <div class="nk-split nk-split-page nk-split-md">
                <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container">
                    <div class="nk-block nk-block-middle nk-auth-body">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content text-center">
                                <img class="round" src="https://nativebeecare.co.ke/assets/img/logo/logo-dark.png" alt="">
                                <h5 class="nk-block-title"><br>Reset Password</h5>
                                <div class="nk-block-des">
                                    <p>Having Troubles Accessing <?php echo $settings->system_name; ?>? Enter Your Email To Reset Password</p>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <form method="POST">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="password">Email Address</label>
                                    <a class="link link-primary link-sm" tabindex="-1" href="index">Remember Password</a>
                                </div>
                                <div class="form-control-wrap">
                                    <input type="email" name="user_email" class="form-control form-control-lg" id="default-01">
                                </div>
                            </div><!-- .foem-group -->
                            <div class="form-group">
                                <button name="ResetPassword" class="btn btn-lg btn-primary btn-block">Reset Password</button>
                            </div>
                        </form><!-- form -->
                    </div><!-- .nk-block -->
                </div><!-- .nk-split-content -->
                <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                    <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                        <div class="slider-init">
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">
                                    <!--<div class="nk-feature-img">
                                        <img class="round" src="https://nativebeecare.co.ke/assets/img/logo/logo-dark.png" alt="">
                                    </div> -->
                                    <div class="nk-feature-content py-4 p-sm-5">
                                        <h4><?php echo $settings->system_name; ?></h4>
                                        <p><?php echo $settings->system_tagline; ?></p>
                                        <p>Welcome to Native Beecare, an innovative entity dedicated to fostering sustainable development in Kenya. Since our inception,
                                        we have been on a mission to build capacity for bee products especially in  Makueni County regions while championing the protection of indigenous trees.</p>
                                    </div>
                                </div>
                            </div><!-- .slider-item -->
                        </div><!-- .slider-init -->
                    </div><!-- .slider-wrap -->
                </div><!-- .nk-split-content -->
            </div><!-- .nk-split -->
        </div><!-- app body @e -->
    <?php } ?>
    <!-- JavaScript -->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>