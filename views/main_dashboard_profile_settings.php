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
check_login();

/* Update Profile */
if (isset($_POST['update_personal_info'])) {
    $user_name =  mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_phoneno = mysqli_real_escape_string($mysqli, $_POST['user_phoneno']);
    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    /* Log Attributes */
    $log_type = "User Account Management Logs";
    $log_details = "Updated Personal Information";

    /* Persist */
    $sql = "UPDATE users SET user_name = '{$user_name}', user_email  = '{$user_email}', user_phoneno = '{$user_phoneno}' 
    WHERE user_id = '{$user_id}'";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Log This Operation */
    include('../functions/logs.php');
    if ($prepare) {
        $success = "Personal Details Updated";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Update Password And Access Level */
if (isset($_POST['update_auth_details'])) {
    $old_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['old_password'])));
    $new_password  = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));
    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $user_access_level = mysqli_real_escape_string($mysqli, $_POST['user_access_level']);

    /* Log Attributes */
    $log_type = "User Account Management Logs";
    $log_details = "Updated Personal Authentication Details";

    /* Check If Old Pasword Match */
    if ($new_password != $confirm_password) {
        $err = "New Password And Confirmation Passwords Does Not Match";
    } else {
        /* Check if Old Passwords Match */
        $sql = "SELECT * FROM  users  WHERE user_id = '{$user_id}'";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($old_password != $row['user_password']) {
                $err = "Incorrect Old Password";
            } else {
                /* Update Password & Access Level */
                $sql = "UPDATE users SET user_password = '{$confirm_password}', user_access_level = '{$user_access_level}'
                WHERE user_id = '{$user_id}'";
                $prepare = $mysqli->prepare($sql);
                $prepare->execute();
                /* Load Logs */
                include('../functions/logs.php');
                if ($prepare) {
                    $success = "Auth Details Updated";
                } else {
                    $err = "Failed!, Please Try Again";
                }
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
                                                                                Update Your Personal Information
                                                                            </p>
                                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="form-group col-md-12">
                                                                                            <label for="">Full Name</label>
                                                                                            <input type="text" required name="user_name" value="<?php echo $settings->user_name; ?>" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <label for="">Email</label>
                                                                                            <input type="text" required name="user_email" value="<?php echo $settings->user_email; ?>" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <label for="">Phone Number</label>
                                                                                            <input type="text" required name="user_phoneno" value="<?php echo $settings->user_phoneno; ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button type="submit" name="update_personal_info" class="btn btn-primary">
                                                                                        <em class="icon ni ni-save-fill"></em> Save
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
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
                                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="form-group col-md-12">
                                                                                            <label for="">Old Password</label>
                                                                                            <input type="password" required name="old_password" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <label for="">New Password</label>
                                                                                            <input type="password" required name="new_password" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <label for="">Confirm Password</label>
                                                                                            <input type="password" required name="confirm_password" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <label for="">Access Level</label>
                                                                                            <select type="text" required name="user_access_level" class="form-control">
                                                                                                <option><?php echo $settings->user_access_level; ?></option>
                                                                                                <option>Admin</option>
                                                                                                <option>Manager</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button type="submit" name="update_auth_details" class="btn btn-primary">
                                                                                        <em class="icon ni ni-save-fill"></em> Save
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
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
                                                                            <ul class="timeline-list">
                                                                                <?php
                                                                                /* Load Recent Sales Today */
                                                                                $raw_results = mysqli_query($mysqli, "SELECT * FROM system_logs 
                                                                                WHERE log_user_id ='$user_id' ORDER BY log_created_at DESC LIMIT 10 ");
                                                                                if (mysqli_num_rows($raw_results) > 0) {
                                                                                    while ($results = mysqli_fetch_array($raw_results)) {
                                                                                ?>
                                                                                        <li class="timeline-item">
                                                                                            <div class="timeline-status bg-primary is-outline"></div>
                                                                                            <div class="timeline-date"><?php echo date('d M Y g:ia', strtotime($results['log_created_at'])); ?> </div>
                                                                                            <div class="timeline-data">
                                                                                                <h6 class="timeline-title"><?php echo $results['log_ip_address'] . ' - ' . $results['log_type']; ?></h6>
                                                                                                <div class="timeline-des">
                                                                                                    <p>
                                                                                                        <?php echo $results['log_details']; ?>
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    <?php }
                                                                                } else { ?>
                                                                                    <li class="timeline-item">
                                                                                        <div class="timeline-status bg-danger is-outline"></div>
                                                                                        <div class="timeline-date text-danger"><?php echo date('d M Y g:ia'); ?><em class="text-danger icon ni ni-alert-fill"></em></div>
                                                                                        <div class="timeline-data ">
                                                                                            <h6 class="timeline-title text-danger">No Recent System Access Logs</span></h6>
                                                                                        </div>
                                                                                    </li>
                                                                                <?php } ?>
                                                                            </ul>
                                                                            <hr>
                                                                            <div class="text-center">
                                                                                <a class="btn btn-primary" href="main_dashboard_system_logs_pdf_dump?user=<?php echo $user_id; ?>&name=<?php echo $settings->user_name; ?>"><em class="icon ni ni-file-docs"></em> Export To PDF</a>
                                                                                <a class="btn btn-primary" href="main_dashboard_system_logs_xls_dump?user=<?php echo $user_id; ?>"><em class="icon ni ni-file-xls"></em>Export To Excel</a>
                                                                            </div>
                                                                        </div>
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