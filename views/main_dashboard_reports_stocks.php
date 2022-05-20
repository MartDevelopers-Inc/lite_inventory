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
require_once '../config/DataSource.php';
include '../vendor/autoload.php';
check_login();

/* Add Product */
if (isset($_POST['add_item'])) {
    $product_id = mysqli_real_escape_string($mysqli, $ID);
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_purchase_price = mysqli_real_escape_string($mysqli, $_POST['product_purchase_price']);
    $product_sale_price  = mysqli_real_escape_string($mysqli, $_POST['product_sale_price']);
    $product_quantity = mysqli_real_escape_string($mysqli, $_POST['product_quantity']);
    $product_quantity_limit  = mysqli_real_escape_string($mysqli, '2');
    $product_code  = mysqli_real_escape_string($mysqli, $_POST['product_code']);

    /* Log Attributes */
    $log_type = "Add New Item";
    $log_details = "Added  $product_code - $product_name, With A Total Quantity Of  $product_quantity";

    /* Persist This */
    $sql = "INSERT INTO products (product_id, product_name, product_description, product_purchase_price, 
    product_sale_price, product_quantity, product_quantity_limit, product_code)
    VALUES ('{$product_id}', '{$product_name}', '{$product_description}', '{$product_purchase_price}', '{$product_sale_price}', 
    '{$product_quantity}', '{$product_quantity_limit}', '{$product_code}')";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Load Logger */
    require('../functions/logs.php');
    if ($prepare) {
        $success = "$product_name Added ";
    } else {
        $err = 'Please Try Again Or Try Later';
    }
}

/* Update Product */
if (isset($_POST['update_item'])) {
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($mysqli, $_POST['product_name']);
    $product_description = $_POST['product_description'];
    $product_purchase_price = mysqli_real_escape_string($mysqli, $_POST['product_purchase_price']);
    $product_sale_price  = mysqli_real_escape_string($mysqli, $_POST['product_sale_price']);
    $product_quantity = mysqli_real_escape_string($mysqli, $_POST['product_quantity']);
    $product_quantity_limit  = mysqli_real_escape_string($mysqli, '2');
    $product_code  = mysqli_real_escape_string($mysqli, $_POST['product_code']);

    /* Log Details */
    $log_type = "Updated Item";
    $log_details = "Updated  $product_code - $product_name Details";

    $sql = "UPDATE  products SET product_name = '{$product_name}' , product_description = '{$product_description}',
    product_purchase_price = '{$product_purchase_price}', product_sale_price = '{$product_sale_price}',
    product_quantity = '{$product_quantity}' , product_quantity_limit = '{$product_quantity_limit}',
    product_code  = '{$product_code}' WHERE product_id = '{$product_id}' ";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    /* Persist Log */
    include('../functions/logs.php');
    if ($prepare) {
        $success = "$product_name Updated ";
    } else {
        $err = 'Please Try Again Or Try Later';
    }
}
/* Delete Product */
if (isset($_POST['delete_item'])) {
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);
    $product_status  = mysqli_real_escape_string($mysqli, 'inactive');
    $product_details =  $_POST['product_details'];
    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $user_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['user_password'])));

    /* Log Attributes */
    $log_type = "Deleted Item";
    $log_details = "Deleted  $product_details";

    /* Check Of This User Password Really Adds Up */
    $sql = "SELECT * FROM  users  WHERE user_id = '{$user_id}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($user_password != $row['user_password']) {
            $err = "Please Enter Correct Password";
        } else {
            /* Persist */
            $sql = "UPDATE products SET product_status = '{$product_status}' WHERE product_id = '{$product_id}'";
            $prepare = $mysqli->prepare($sql);
            $prepare->execute();
            /* Load Logs */
            include('../functions/logs.php');
            if ($prepare) {
                $success = "$product_details Deleted";
            } else {
                $err = "Failed!, Please Try Again";
            }
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
                                            <h3 class="nk-block-title page-title">Inventory</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    This module allows you to export all the items stock and inventory.
                                                </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li><a href="main_dashboard_system_inventory_pdf_dump" class="btn btn-primary"><em class="icon ni ni-file-docs"></em><span>Export To PDF</span></a></li>
                                                        <li><a href="main_dashboard_system_inventory_xls_dump" class="btn btn-primary"><em class="icon ni ni-grid-add-fill-c"></em><span>Export To Excel</span></a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                <div class="">
                                    <div class="row">
                                        <div class="card mb-3 col-md-12 border border-success">
                                            <div class="card-body">
                                                <table class="datatable-init table">
                                                    <thead>
                                                        <tr>
                                                            <th>Item Details</th>
                                                            <th>Current Item Quantity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ret = "SELECT * FROM products 
                                                        WHERE product_status = 'active'";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        while ($products = $res->fetch_object()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $products->product_code . ' ' . $products->product_name; ?></td>
                                                                <td><?php echo $products->product_quantity; ?></td>
                                                            </tr>
                                                        <?php }
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