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

/* Handle Login */
if (isset($_POST['SignIn'])) {
    /* Only Allow Users With Managerial Access Level To Access This PWA */
    $user_email = mysqli_real_escape_string($mysqli, trim($_POST['user_email']));
    $user_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['user_password']))));
    /* Check If Posted Data Matches */
    $ret = mysqli_query($mysqli, "SELECT * FROM users  WHERE user_email='{$user_email}'  
    AND user_password='{$user_password}' AND user_access_level = 'Manager'");
    $num = mysqli_fetch_array($ret);
    /* Load Auth Log Helper */
    include('../functions/auth_logger.php');
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
                    <p class="mb-0">Login to your account</p>
                </div>
                <br><br>
                <form class="mt-4" method="POST">

                    <div class="form-floating mb-3">
                        <input type="email" required class="form-control rounded-3" id="floatingInputEmail" name="user_email">
                        <label for="floatingInputEmail">Email</label>
                    </div>

                    <div class="input-group mb-3" id="show_hide_password">
                        <div class="form-floating flex-grow-1">
                            <input type="password" required class="form-control rounded-3 rounded-end-0 border-end-0" id="floatingInputPassword" name="user_password">
                            <label for="floatingInputPassword">Password</label>
                        </div>
                        <span class="input-group-text bg-transparent rounded-start-0 rounded-3"><i class="bi bi-eye-slash"></i></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Remember</label>
                        </div>
                        <div class=""><a href="reset_password" class="forgot-link">Forgot Password?</a></div>
                    </div>
                    <br><br><br>
                    <div class="mb-0 d-grid">
                        <button type="submit" name="SignIn" class="btn btn-primary btn-ecomm rounded-3">Login</button>
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