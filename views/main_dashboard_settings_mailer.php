<?php
/*
 * Created on Fri May 20 2022
 *
 * Devlan Solutions LTD - www.devlan.co.ke 
 *
 * hello@devlan.co.ke
 *
 *
 * The Devlan Solutions LTD End User License Agreement
 *
 * Copyright (c) 2022 Devlan Solutions LTD
 *
 * 1. GRANT OF LICENSE
 * Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 * install and activate this system on two separated computers solely for your personal and non-commercial use,
 * unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 * or allowing other individuals to view the contents of this Software, is in violation of this license.
 * You may not make the Software available on a network, or in any way provide the Software to multiple users
 * unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 * 2. COPYRIGHT 
 * The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 * You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 * 3. RESTRICTIONS ON USE
 * You may not, and you may not permit others to
 * (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 * (b) modify, distribute, or create derivative works of the Software;
 * (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 * otherwise exploit the Software.  
 *
 * 4. TERM
 * This License is effective until terminated. 
 * You may terminate it at any time by destroying the Software, together with all copies thereof.
 * This License will also terminate if you fail to comply with any term or condition of this Agreement.
 * Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 * 5. NO OTHER WARRANTIES. 
 * DEVLAN SOLUTIONS LTD DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 * DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 * EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 * SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 * ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 * INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 * SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 * THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 * HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 * 6. SEVERABILITY
 * In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 * affect the validity of the remaining portions of this license.
 *
 * 7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD  OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 * CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 * USE OF THE SOFTWARE, EVEN IF DEVLAN HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 * IN NO EVENT WILL DEVLAN  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 * TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 */

session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../config/codeGen.php');
check_login();

/* Update Mailer */
if (isset($_POST['upadate_mailer'])) {
    $mailer_host = mysqli_real_escape_string($mysqli, $_POST['mailer_host']);
    $mailer_port = mysqli_real_escape_string($mysqli, $_POST['mailer_port']);
    $mailer_protocol = mysqli_real_escape_string($mysqli, $_POST['mailer_protocol']);
    $mailer_username = mysqli_real_escape_string($mysqli, $_POST['mailer_username']);
    $mailer_mail_from_name = mysqli_real_escape_string($mysqli, $_POST['mailer_mail_from_name']);
    $mailer_mail_from_email  = mysqli_real_escape_string($mysqli, $_POST['mailer_mail_from_email']);

    /* Log Attributes */
    $log_type = "Settings & Configurations Logs";
    $log_details = "Edited STMP Mailer Settings";

    /* Persist */
    $sql = "UPDATE mailer_settings SET mailer_host = '{$mailer_host}', mailer_port = '{$mailer_port}',
    mailer_protocol = '{$mailer_protocol}', mailer_username = '{$mailer_username}', mailer_mail_from_name = '{$mailer_mail_from_name}',
    mailer_mail_from_email = '{$mailer_mail_from_email}'";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Log This Operation */
    include('../functions/logs.php');
    if ($prepare) {
        $success = "Mailer Details Updated Settings";
    } else {
        $err = "Failed!, Please Try Again";
    }
}
require_once('../partials/head.php');
?>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php require_once('../partials/sidebar.php'); ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require_once('../partials/header.php'); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">STMP Mailer Settings</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>This module allows you to customize system STMP mailer</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">

                                        <div class="col-12">
                                            <div class="card card-bordered h-100 border border-success">
                                                <div class="card-inner">
                                                    <div class="timeline">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <?php
                                                            $ret = "SELECT * FROM mailer_settings";
                                                            $stmt = $mysqli->prepare($ret);
                                                            $stmt->execute(); //ok
                                                            $res = $stmt->get_result();
                                                            while ($mailer = $res->fetch_object()) {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">STMP Host</label>
                                                                        <input type="text" value="<?php echo $mailer->mailer_host; ?>" required name="mailer_host" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label for="">STMP Port Number</label>
                                                                        <select type="text" style="width: 100%;" required name="mailer_port" class="basic form-control">
                                                                            <option value="465">465</option>
                                                                            <option value="587">587</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label for="">STMP Protocol</label>
                                                                        <select type="text" style="width: 100%;" required name="mailer_protocol" class="basic form-control">
                                                                            <option value="ssl">SSL</option>
                                                                            <option value="tls">TLS</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">STMP Username</label>
                                                                        <input type="text" required value="<?php echo $mailer->mailer_username; ?>" name="mailer_username" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">STMP Password</label>
                                                                        <input type="password" required value="<?php echo $mailer->mailer_password; ?>" name="mailer_password" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">STMP Mail From Name</label>
                                                                        <input type="text" required value="<?php echo $mailer->mailer_mail_from_name; ?>" name="mailer_mail_from_name" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">STMP Mail From Email</label>
                                                                        <input type="text" required value="<?php echo $mailer->mailer_mail_from_email; ?>" name="mailer_mail_from_email" class="form-control">
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <br>
                                                            <div class="text-right">
                                                                <button name="upadate_mailer" class="btn btn-primary" type="submit">
                                                                    <em class="icon ni ni-update"></em> Update Configurations
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php require_once('../partials/footer.php'); ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php
    require_once('../partials/scripts.php');
    ?>
</body>

</html>