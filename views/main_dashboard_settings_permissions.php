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

/* Update Receipt Header And Footer */
if (isset($_POST['update_permissions'])) {
    $permission_access_level = mysqli_real_escape_string($mysqli, $_POST['permission_access_level']);
    $permission_module = mysqli_real_escape_string($mysqli, $_POST['permission_module']);
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

    /* Persist */
    $sql = "DELETE FROM user_permissions WHERE permission_id  = '{$permission_id}'";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
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
                                                                    Update Configurations
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
                                                                            <input type="hidden" name="permission_id" value="<?php echo $permissions->permission_id; ?>">
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