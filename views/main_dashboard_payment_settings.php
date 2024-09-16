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
require_once('../config/checklogin.php');
require_once('../config/codeGen.php');
check_login();

/* Add Store */
if (isset($_POST['update_payments'])) {
    $payment_settings_store_id = mysqli_real_escape_string($mysqli, $_POST['payment_settings_store_id']);
    $payment_settings_means = mysqli_real_escape_string($mysqli, $_POST['payment_settings_means']);
    $store_details = mysqli_real_escape_string($mysqli, $_POST['store_details']);

    /* Log Attributes */
    $log_type = "Stores Management Logs";
    $log_details = "Added $payment_settings_means As A New Payment Means On $store_details";

    /* Persist */
    $sql = "UPDATE  payment_settings SET payment_settings_means = '{$payment_settings_means}'
    WHERE payment_settings_store_id = '{$payment_settings_store_id}'";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Log This Operation */
    include('../functions/logs.php');
    if ($prepare) {
        $success = "Payment Means Updated";
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
                                                                        <a data-toggle="modal" href="#manage_store_payment_mode_<?php echo $stores['store_id']; ?>" class="badge badge-dim badge-pill badge-outline-warning">
                                                                            Manage Payment Configurations
                                                                        </a>
                                                                    <?php } ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Load Modals Via Helpers -->
                                                <?php require('../helpers/modals/manage_payments_configurations.php'); ?>
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