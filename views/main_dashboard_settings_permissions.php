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

/* Update Receipt Header And Footer */
if (isset($_POST['update_permissions'])) {
    $permission_access_level = mysqli_real_escape_string($mysqli, $_POST['permission_access_level']);
    $permission_module = mysqli_real_escape_string($mysqli, $_POST['permission_module']);
    /* Log Attributes */
    $log_type = "Settings & Configurations Logs";
    $log_details = "Allowed $permission_access_level To Have Access To $permission_module";

    /* Prevent Double Entries */
    $sql = "SELECT * FROM  user_permissions WHERE permission_access_level = '{$permission_access_level}' 
    AND permission_module = '{$permission_module}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $err = "$permission_access_level Already Has Access To $permission_module";
    } else {
        /* Persist */
        $sql = "INSERT INTO user_permissions (permission_access_level, permission_module)
        VALUES('{$permission_access_level}', '{$permission_module}')";
        $prepare = $mysqli->prepare($sql);
        $prepare->execute();
        /* Load Logs */
        include('../functions/logs.php');
        if ($prepare) {
            $success = "$permission_module Added To Staff Access Level";
        } else {
            $err = "Failed!, Please Try Again";
        }
    }
}

/* Delete Access Levels */
if (isset($_POST['roll_permissions'])) {
    $permission_id = mysqli_real_escape_string($mysqli, $_POST['permission_id']);
    $permission_access_level = mysqli_real_escape_string($mysqli, $_POST['permission_access_level']);
    $permission_module = mysqli_real_escape_string($mysqli, $_POST['permission_module']);
    /* Log This Operation */
    $log_type = "Settings & Configurations Logs";
    $log_details = "Revoked $permission_access_level Permission To Access $permission_module";

    /* Persist */
    $sql = "DELETE FROM user_permissions WHERE permission_id  = '{$permission_id}'";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Load Log File */
    include('../functions/logs.php');

    if ($prepare) {
        $success = "Permission Revoked";
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
                                            <h3 class="nk-block-title page-title">Access Level Customizations</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>This module allows you to customize your staff access level permissions and modules they can access </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">

                                        <div class="col-md-6 col-xxl-4">
                                            <div class="card card-bordered h-100 border border-success">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Edit User Access Level Permissions</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-inner">
                                                    <div class="timeline">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>User Access Level</label>
                                                                    <div class="form-control-wrap">
                                                                        <div class="form-group">
                                                                            <div class="form-control-wrap">
                                                                                <select name="permission_access_level" class="form-select form-control form-control-lg" data-search="on">
                                                                                    <option>Staff</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Allowed Modules</label>
                                                                    <div class="form-control-wrap">
                                                                        <div class="form-group">
                                                                            <div class="form-control-wrap">
                                                                                <select name="permission_module" class="form-select form-control form-control-lg" data-search="on">
                                                                                    <option>Select Module</option>
                                                                                    <option>Sales Management</option>
                                                                                    <option>Stocks Management</option>
                                                                                    <option>Items Management</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="text-right">
                                                                <button name="update_permissions" class="btn btn-primary" type="submit">
                                                                    <em class="icon ni ni-update"></em> Update Configurations
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xl-6 col-xxl-8">
                                            <div class="card card-bordered card-full border border-success">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Staff Access Levels Permissions</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list">
                                                    <div class="card-inner">
                                                        <ul class="list-group list-group-flush">
                                                            <?php
                                                            $ret = "SELECT * FROM user_permissions WHERE permission_access_level = 'Staff'";
                                                            $stmt = $mysqli->prepare($ret);
                                                            $stmt->execute(); //ok
                                                            $res = $stmt->get_result();
                                                            $cnt = 1;
                                                            while ($permissions = $res->fetch_object()) {
                                                            ?>
                                                                <li class="list-group-item">
                                                                    # <?php echo $cnt . ' ' . $permissions->permission_module; ?>
                                                                    <div class="text-right">
                                                                        <form method="POST">
                                                                            <!-- Hide All This Please -->
                                                                            <input type="hidden" name="permission_id" value="<?php echo $permissions->permission_id; ?>">
                                                                            <input type="hidden" name="permission_access_level" value="<?php echo $permissions->permission_access_level; ?>">
                                                                            <input type="hidden" name="permission_module" value="<?php echo $permissions->permission_module; ?>">
                                                                            <button class="badge badge-dim badge-pill badge-outline-danger" type="submit" name="roll_permissions">Revoke</button>
                                                                        </form>
                                                                    </div>
                                                                </li>
                                                            <?php $cnt++;
                                                            } ?>
                                                        </ul>
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