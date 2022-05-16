<?php
/*
 * Created on Mon May 16 2022
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
check_login();
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
                <?php require_once('../partials/header.php');
                /* Load User Details */
                $user_id = $_SESSION['user_id'];
                $ret = "SELECT * FROM system_settings 
                JOIN  users WHERE user_id = '{$user_id}' ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($settings = $res->fetch_object()) {
                ?>
                    <!-- main header @e -->
                    <!-- content @s -->
                    <div class="nk-content ">
                        <div class="container-fluid">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div class="nk-block">
                                        <div class="card card-bordered">
                                            <div class="card-aside-wrap">
                                                <div class="card-inner card-inner-lg">
                                                    <div class="tab-content">
                                                        <!-- Main Personal Info Details -->
                                                        <div class="tab-pane active" id="personal_info">
                                                            <div class="nk-block-head nk-block-head-lg">
                                                                <div class="nk-block-between">
                                                                    <div class="nk-block-head-content">
                                                                        <h4 class="nk-block-title">Personal Information</h4>
                                                                        <div class="nk-block-des">
                                                                            <p>
                                                                                Basic info, like your name and address, that you use on our system.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .nk-block-head -->
                                                        </div>
                                                        <div class="tab-pane" id="update_password">
                                                            <div class="nk-block-head nk-block-head-lg">
                                                                <div class="nk-block-between">
                                                                    <div class="nk-block-head-content">
                                                                        <h4 class="nk-block-title">Login Details</h4>
                                                                        <div class="nk-block-des">
                                                                            <p>
                                                                                Authentication Password & Access Levels
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .nk-block-head -->
                                                        </div>
                                                        <div class="tab-pane" id="account_activity">
                                                            <div class="nk-block-head nk-block-head-lg">
                                                                <div class="nk-block-between">
                                                                    <div class="nk-block-head-content">
                                                                        <h4 class="nk-block-title">System Access Logs</h4>
                                                                        <div class="nk-block-des">
                                                                            <p>
                                                                                See How This User Has Interacted With The System
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .nk-block-head -->
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                                    <div class="card-inner-group">
                                                        <div class="card-inner">
                                                            <div class="user-card">
                                                                <div class="user-avatar bg-primary">
                                                                    <span><?php echo substr($settings->user_name, 0, 2); ?></span>
                                                                </div>
                                                                <div class="user-info">
                                                                    <span class="lead-text"><?php echo $settings->user_name; ?></span>
                                                                    <span class="sub-text"><?php echo $settings->user_email; ?></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                        <div class="card-inner">
                                                            <div class="user-account-info py-0">
                                                                <h6 class="overline-title-alt"><?php echo $settings->system_name . ' ' . $settings->user_access_level; ?> Account</h6>
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                        <div class="card-inner p-0">
                                                            <div class="card-body">
                                                                <ul class="nav nav-tabs">
                                                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal_info"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#update_password"><em class="icon ni ni-bell-fill"></em><span>Update Password</span></a></li>
                                                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#account_activity"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                    </div><!-- .card-inner-group -->
                                                </div><!-- .card-aside -->
                                            </div><!-- .card-aside-wrap -->
                                        </div><!-- .card -->
                                    </div><!-- .nk-block -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>