<?php
/*
 * Created on Sat May 14 2022
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

/* Add Store */
if (isset($_POST['create_store'])) {
    $store_id = mysqli_real_escape_string($mysqli, $sys_gen_id);
    $store_name = mysqli_real_escape_string($mysqli, $_POST['store_name']);
    $store_adr = mysqli_real_escape_string($mysqli, $_POST['store_adr']);
    $store_email = mysqli_real_escape_string($mysqli, $_POST['store_email']);

    /* Log Attributes */
    $log_type = "Stores Management Logs";
    $log_details = "Registered " . $store_name . " As A New Store";

    /* Persist */
    $sql = "INSERT INTO store_settings(store_id, store_name, store_email, store_adr)
    VALUES('{$store_id}', '{$store_name}', '{$store_email}', '{$store_adr}')";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Log This Operation */
    include('../functions/logs.php');
    if ($prepare) {
        $success = "Store Registered";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Update Store */
if (isset($_POST['update_store'])) {
    $store_id = mysqli_real_escape_string($mysqli, $_POST['store_id']);
    $store_name = mysqli_real_escape_string($mysqli, $_POST['store_name']);
    $store_adr = mysqli_real_escape_string($mysqli, $_POST['store_adr']);
    $store_email = mysqli_real_escape_string($mysqli, $_POST['store_email']);
    /* Log Attributes */
    $log_type = "Stores Management Logs";
    $log_details = "Updated " . $store_name . " Details";

    /* Persist */
    $sql = "UPDATE store_settings SET store_name = '{$store_name}', store_adr = '{$store_adr}', store_email = '{$store_email}'
    WHERE store_id = '{$store_id}'";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Log This Operation */
    include('../functions/logs.php');
    if ($prepare) {
        $success = "Store Details Updated";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Delete Store */
if (isset($_POST['delete_store'])) {
    $store_id = mysqli_real_escape_string($mysqli, $_POST['store_id']);
    $store_name = mysqli_real_escape_string($mysqli, $_POST['store_name']);
    $store_status = mysqli_real_escape_string($mysqli, 'closed');
    $store_close_date = mysqli_real_escape_string($mysqli, date('d M Y'));
    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $user_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['user_password'])));

    /* Log Attributes */
    $log_type = "Stores Management Logs";
    $log_details = "Closed " . $store_name;

    /* Check Of This User Password Really Adds Up */
    $sql = "SELECT * FROM  users  WHERE user_id = '{$user_id}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($user_password != $row['user_password']) {
            $err = "Please Enter Correct Password";
        } else {
            /* Persist */
            $sql = "UPDATE store_settings SET store_status = '{$store_status}', store_close_date = '{$store_close_date}'
            WHERE store_id = '{$store_id}'";
            $prepare = $mysqli->prepare($sql);
            $prepare->execute();
            /* Log This Operation */
            include('../functions/logs.php');
            if ($prepare) {
                $success  = "Store Closed";
            } else {
                $err = "Failed!, Please Try Again";
            }
        }
    }
}

/* Re Open Store */
if (isset($_POST['re_open'])) {
    $store_id = mysqli_real_escape_string($mysqli, $_POST['store_id']);
    $store_name = mysqli_real_escape_string($mysqli, $_POST['store_name']);
    $store_status = mysqli_real_escape_string($mysqli, 'active');
    $store_close_date = mysqli_real_escape_string($mysqli, date('d M Y'));
    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $user_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['user_password'])));

    /* Log Attributes */
    $log_type = "Stores Management Logs";
    $log_details = "Re Opened " . $store_name;

    /* Check Of This User Password Really Adds Up */
    $sql = "SELECT * FROM  users  WHERE user_id = '{$user_id}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($user_password != $row['user_password']) {
            $err = "Please Enter Correct Password";
        } else {
            /* Persist */
            $sql = "UPDATE store_settings SET store_status = '{$store_status}', store_close_date = ''
            WHERE store_id = '{$store_id}'";
            $prepare = $mysqli->prepare($sql);
            $prepare->execute();
            /* Log This Operation */
            include('../functions/logs.php');
            if ($prepare) {
                $success  = "Store Opened";
            } else {
                $err = "Failed!, Please Try Again";
            }
        }
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
                                            <h3 class="nk-block-title page-title">Payment Methods Customizations</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>This module allows you to customize which payment methods are available in the registered stores</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <!-- End Modal -->
                                <div class="">
                                    <div class="row">
                                        <?php
                                        /* Pop All Registered Stores */
                                        $raw_results = mysqli_query($mysqli, "SELECT * FROM store_settings ORDER BY store_status ASC");
                                        if (mysqli_num_rows($raw_results) > 0) {
                                            while ($stores = mysqli_fetch_array($raw_results)) {
                                                /* Status Borders */
                                                if ($stores['store_status'] == 'active') {
                                                    $border = 'border border-success';
                                                } else {
                                                    $border = 'border border-danger';
                                                }
                                        ?>
                                                <div class="card mb-3 col-md-6 <?php echo $border; ?>">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-4">
                                                            <img src="../public/images/store.png" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    <?php echo $stores['store_name'];
                                                                    if ($stores['store_status'] == 'active') { ?>
                                                                        <span class="badge badge-dim badge-pill badge-outline-success">Active</span>
                                                                    <?php } else { ?>
                                                                        <span class="badge badge-dim badge-pill badge-outline-danger">Closed</span>
                                                                    <?php } ?>
                                                                </h5>
                                                                <p class="card-text">Store Email: <?php echo $stores['store_email']; ?></p>
                                                                <p class="card-text">Store Address: <?php echo $stores['store_adr']; ?></p>
                                                                <p class="card-text">
                                                                    <?php
                                                                    if ($stores['store_status'] == 'active') { ?>
                                                                        <a href="main_dashboard_settings_payments?store=<?php echo $stores['store_id']; ?>" class="badge badge-dim badge-pill badge-outline-warning">
                                                                            Manage Payment Configurations
                                                                        </a>
                                                                    <?php } ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Load Modals Via Helpers -->
                                                <?php require('../helpers/modals/stores_modals.php'); ?>
                                            <?php }
                                        } else { ?>
                                            <div class="card mb-3 col-md-6 border border-danger">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <img src="../public/images/no_store.png" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">
                                                                No Registered Stores.
                                                            </h5>
                                                            <p class="card-text">
                                                                To manage your stores, kindly create a store first.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div><!-- .nk-block -->
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
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>