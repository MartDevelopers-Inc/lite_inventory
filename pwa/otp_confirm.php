<?php
/*
 *   Crafted On Mon Sep 26 2022
 *
 * 
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */

session_start();
require_once('../config/config.php');
require_once('../config/codeGen.php');

/* Handle Code Confirmation */
if (isset($_POST['verify_otp'])) {
    $otp_1 = mysqli_real_escape_string($mysqli, $_POST['otp_1']);
    $otp_2 = mysqli_real_escape_string($mysqli, $_POST['otp_2']);
    $otp_3 = mysqli_real_escape_string($mysqli, $_POST['otp_3']);
    $otp_4 = mysqli_real_escape_string($mysqli, $_POST['otp_4']);

    /* Concatnate These Posted Characters To Single String */
    $final_otp = $otp_1 . $otp_2 . $otp_3 . $otp_4;

    /* Verify These Codes */
    $sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_password_reset_token = '{$final_otp}'");
    if (mysqli_num_rows($sql) > 0) {
        /* Redirect User To Reset Password */
        $_SESSION['success'] = 'Confirm your new password';
        header("Location: confirm_password?token=$final_otp");
        exit;
    } else {
        $err =  "Invalid code";
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
                    <img class="thubnail" width="50%" src="../public/images/logo.png" alt="">
                    <h5 class="fw-bold text-primary"><br><?php echo $system_name; ?></h5>
                    <p class="mb-0">Kindly Enter the 4 digits code sent to your email</p>
                </div>
                <div class="pt-5">
                    <form class="mt-5" method="POST">
                        <div class="verification-controls d-flex align-items-center justify-content-center gap-3 mb-5">
                            <div class="">
                                <input type="text" class="form-control form-control-lg rounded-3" required name="otp_1">
                            </div>
                            <div class="">
                                <input type="text" class="form-control form-control-lg rounded-3" required name="otp_2">
                            </div>
                            <div class="">
                                <input type="text" class="form-control form-control-lg rounded-3" required name="otp_3">
                            </div>
                            <div class="">
                                <input type="text" class="form-control form-control-lg rounded-3" required name="otp_4">
                            </div>
                        </div>
                        <div class="mb-0 d-grid">
                            <buttun type="submit" name="verify_otp" class="btn btn-primary btn-ecomm rounded-3">Verify</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!--end to page content-->


        <!--start to footer-->
        <footer class="page-footer fixed-bottom border-top d-flex align-items-center justify-content-center">
            <p class="mb-0 rounded-0">Have't recived the code? <a href="reset_password" class="text-danger">Resend</a></p>
        </footer>
        <!--end to footer-->


    </div>
    <!--end wrapper-->


    <!--JS Files-->
    <?php require_once('../partials/pwa_scripts.php'); ?>



</body>


</html>