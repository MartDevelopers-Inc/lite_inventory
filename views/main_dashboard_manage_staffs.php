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

/* Add Staffs */
if (isset($_POST['add_user'])) {
    $user_id = mysqli_real_escape_string($mysqli, $staff_id);
    $user_name  = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_phoneno = mysqli_real_escape_string($mysqli, $_POST['user_phoneno']);
    $user_password = mysqli_real_escape_string($mysqli, $_POST['user_password']);
    $user_access_level = mysqli_real_escape_string($mysqli, $_POST['user_access_level']);
    $user_store_id = mysqli_real_escape_string($mysqli, $_POST['user_store_id']);
    $enc_password = sha1(md5($user_password));

    /* Log User Activity */
    $log_type = "User Account Management Logs";
    $log_details = "Created $user_name Account";


    /* Remove Duplicated */
    $raw_results = mysqli_query($mysqli, "SELECT * FROM users WHERE user_email = '{$user_email}'");
    if (mysqli_num_rows($raw_results) > 0) {
        $err = "User Email  Already Exists";
    } else {
        /* Persist */
        $sql = "INSERT INTO  users  (user_id, user_name, user_email, user_phoneno, user_password, user_access_level, user_store_id)
        VALUES('{$user_id}' , '{$user_name}', '{$user_email}', '{$user_phoneno}', '{$enc_password}', '{$user_access_level}', '{$user_store_id}')";
        $prepare = $mysqli->prepare($sql);
        $prepare->execute();
        /* Log This Operation */
        include('../functions/logs.php');
        /* Email User */
        include('../mailers/add_new_user.php');
        /* Detect Connection First Then Send Mail */
        switch (connection_status()) {
            case CONNECTION_NORMAL:
                if ($prepare && $mail->send()) {
                    $success = "Account Created";
                } else if ($prepare && CONNECTION_ABORTED && CONNECTION_TIMEOUT) {
                    $info = "Account Created But Mailing Failed, Check Your Internet Connectivity.";
                } else {
                    $err = "Failed, Please Try Again";
                }
                break;
            default:
                $err = "Failed, Please Try Again";
                break;
        }
    }
}

/* Update Staffs */
if (isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $user_name  = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_phoneno = mysqli_real_escape_string($mysqli, $_POST['user_phoneno']);
    $user_access_level = mysqli_real_escape_string($mysqli, $_POST['user_access_level']);
    $user_store_id = mysqli_real_escape_string($mysqli, $_POST['user_store_id']);

    /* Log User Activity */
    $log_type = "User Account Management Logs";
    $log_details = "Updated $user_name, $user_email Account";

    /* Persist */
    $sql = "UPDATE users SET user_name = '{$user_name}', user_email = '{$user_email}', 
    user_phoneno = '{$user_phoneno}', user_access_level = '{$user_access_level}', user_store_id = '{$user_store_id}'
    WHERE user_id = '{$user_id}'";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Log This Operation */
    include('../functions/logs.php');
    if ($prepare) {
        $success = "User Account Details Updated";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Delete Staffs */
if (isset($_POST['close_account'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $user_status = mysqli_real_escape_string($mysqli, 'inactive');
    $user_details = mysqli_real_escape_string($mysqli, $_POST['user_details']);
    $userid = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $user_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['user_password'])));

    /* Log This Details */
    $log_type = "User Account Management Logs";
    $log_details = "Deleted $user_details Account";

    /* Check If Posted Password Matches */
    $sql = "SELECT * FROM  users  WHERE user_id = '{$userid}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($user_password != $row['user_password']) {
            $err = "Please Enter Correct Password";
        } else {
            /* Persist */
            $sql = "UPDATE users SET user_status = '{$user_status}' WHERE user_id = '{$user_id}'";
            $prepare = $mysqli->prepare($sql);
            $prepare->execute();
            /* Log This Operation */
            include('../functions/logs.php');
            if ($prepare) {
                $success = "$user_details Account Deleted";
            } else {
                $err = "Failed!, Please Try Again";
            }
        }
    }
}

/* Change Password */
if (isset($_POST['Change_Password'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check If Passwords Match */
    if ($new_password != $confirm_password) {
        $err = "Failed, please try again";
    } else {
        /* Persist Password Change */
        if (mysqli_query(
            $mysqli,
            "UPDATE users SET user_password = '{$new_password}' WHERE user_id = '{$user_id}'"
        )) {
            $success = "Password Reset Successfully";
        } else {
            $err = "Failed, please try again";
        }
    }
}
/* Load Header Partial */
require_once('../partials/head.php')
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
                                            <h3 class="nk-block-title page-title">Manage Users</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    This module allows you to register, update and delete users <br>
                                                </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li><a href="#create_store" data-toggle="modal" class="btn btn-white btn-outline-light"><em class="icon ni ni-user-add"></em><span>Add New Staff</span></a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <!-- Add Store Modal -->
                                <div class="modal fade" id="create_store">
                                    <div class="modal-dialog  modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Fill All Required Fields</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Name</label>
                                                            <input type="text" name="user_name" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Email Address</label>
                                                            <input type="email" name="user_email" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Phone Number</label>
                                                            <input type="text" name="user_phoneno" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Password</label>
                                                            <input type="text" name="user_password" value="<?php echo $defaultPass; ?>" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="default-06">Allocated Store</label>
                                                            <div class="form-control-wrap">
                                                                <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                        <select name="user_store_id" class="form-select form-control form-control-lg" data-search="on">
                                                                            <?php
                                                                            $raw_results = mysqli_query($mysqli, "SELECT * FROM store_settings WHERE store_status = 'active'");
                                                                            if (mysqli_num_rows($raw_results) > 0) {
                                                                                while ($stores = mysqli_fetch_array($raw_results)) {
                                                                            ?>
                                                                                    <option value="<?php echo $stores['store_id']; ?>"><?php echo $stores['store_name']; ?></option>
                                                                            <?php }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="default-06">User Access Level</label>
                                                            <div class="form-control-wrap">
                                                                <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                        <select name="user_access_level" class="form-select form-control form-control-lg" data-search="on">
                                                                            <option value="Staff">Staff</option>
                                                                            <option value="Manager">Manager</option>
                                                                            <option value="Admin">Administrator</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br><br>
                                                    <div class="text-right">
                                                        <button name="add_user" class="btn btn-primary" type="submit">
                                                            <em class="icon ni ni-user-add"></em> Register User
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                                <div class="">
                                    <div class="row">
                                        <div class="card mb-3 col-md-12 border border-success">
                                            <div class="card-body">
                                                <table class="datatable-init table">
                                                    <thead>
                                                        <tr>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Access Level</th>
                                                            <th>Assigned Store</th>
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $user_id = $_SESSION['user_id'];
                                                        $ret = "SELECT * FROM users us INNER JOIN store_settings st ON st.store_id = us.user_store_id 
                                                        WHERE us.user_status ='active'  && us.user_id != '$user_id'";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        while ($users = $res->fetch_object()) { ?>
                                                            <tr>
                                                                <td><?php echo $users->user_name; ?></td>
                                                                <td><?php echo $users->user_email; ?></td>
                                                                <td><?php echo $users->user_phoneno; ?></td>
                                                                <td><?php echo $users->user_access_level; ?></td>
                                                                <td><?php echo $users->store_name; ?></td>
                                                                <td>
                                                                    <a data-toggle="modal" href="#update_<?php echo $users->user_id; ?>" class="badge badge-dim badge-pill badge-outline-warning"><em class="icon ni ni-edit"></em> Edit</a>
                                                                    <a data-toggle="modal" href="#change_password_<?php echo $users->user_id; ?>" class="badge badge-dim badge-pill badge-outline-danger"><em class="icon ni ni-lock"></em> Change Password</a>
                                                                    <a data-toggle="modal" href="#delete_<?php echo $users->user_id; ?>" class="badge badge-dim badge-pill badge-outline-danger"><em class="icon ni ni-trash-fill"></em> Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php include('../helpers/modals/staff_modals.php');
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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