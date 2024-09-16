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
    $product_store_id = mysqli_real_escape_string($mysqli, $_POST['product_store_id']);

    /* Log Attributes */
    $log_type = "Items Management Logs";
    $log_details = "Added  $product_code - $product_name, With A Total Quantity Of  $product_quantity";

    /* Persist This */
    $sql = "INSERT INTO products (product_id, product_store_id, product_name, product_description, product_purchase_price, 
    product_sale_price, product_quantity, product_quantity_limit, product_code)
    VALUES ('{$product_id}', '{$product_store_id}', '{$product_name}', '{$product_description}', '{$product_purchase_price}', '{$product_sale_price}', 
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
    $product_store_id = mysqli_real_escape_string($mysqli, $_POST['product_store_id']);

    /* Log Details */
    $log_type = "Items Management Logs";
    $log_details = "Updated  $product_code - $product_name Details";

    $sql = "UPDATE  products SET product_name = '{$product_name}', product_store_id = '{$product_store_id}' , product_description = '{$product_description}',
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
    $log_type = "Items Management Logs";
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
                                            <h3 class="nk-block-title page-title">Manage Items</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    This module allows you to register, update and delete items <br>
                                                </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li><a href="#create_store" data-toggle="modal" class="btn btn-white btn-outline-light"><em class="icon ni ni-grid-plus-fill"></em><span>Add Item</span></a></li>
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
                                                            <label>Item Name</label>
                                                            <input type="text" name="product_name" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Item Code</label>
                                                            <input type="text" value="<?php echo $a . $b; ?>" name="product_code" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Item Quantity</label>
                                                            <input type="text" name="product_quantity" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Item Purchase Price (Ksh)</label>
                                                            <input type="text" name="product_purchase_price" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Item Retail Sale Price (Ksh)</label>
                                                            <input type="text" name="product_sale_price" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Items Store</label>
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select name="product_store_id" class="form-select form-control form-control-lg" data-search="on">
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
                                                        <div class="form-group col-md-12">
                                                            <label>Item Description</label>
                                                            <textarea type="text" name="product_description" rows="3" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="text-right">
                                                        <button name="add_item" class="btn btn-primary" type="submit">
                                                            <em class="icon ni ni-list-check"></em> Register Item
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                                <div class="row">
                                    <div class="card mb-3 col-12 border border-success">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Select Store</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <select name="store_id" class="form-select form-control form-control-lg" data-search="on">
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
                                                        </div>
                                                        <br>
                                                        <div class="text-right">
                                                            <button name="get_sale_reports" class="btn btn-primary" type="submit">
                                                                <em class="icon ni ni-report-profit"></em> Get Items
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($_POST['store_id'])) {
                                ?>
                                    <div class="">
                                        <div class="row">
                                            <div class="card mb-3 col-md-12 border border-success">
                                                <div class="card-body">
                                                    <table class="datatable-init table">
                                                        <thead>
                                                            <tr>
                                                                <th>Item Code</th>
                                                                <th>Item Name</th>
                                                                <th>QTY</th>
                                                                <th>Purchase Price</th>
                                                                <th>Retail Price</th>
                                                                <th>Manage</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $store = $_POST['store_id'];
                                                            $ret = "SELECT * FROM products p 
                                                            INNER JOIN store_settings ss ON ss.store_id = p.product_store_id
                                                            WHERE p.product_status = 'active' AND ss.store_status ='active' AND p.product_store_id = '{$store}'";
                                                            $stmt = $mysqli->prepare($ret);
                                                            $stmt->execute(); //ok
                                                            $res = $stmt->get_result();
                                                            while ($products = $res->fetch_object()) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $products->product_code; ?></td>
                                                                    <td><?php echo $products->product_name; ?></td>
                                                                    <td><?php echo $products->product_quantity; ?></td>
                                                                    <td>Ksh <?php echo $products->product_purchase_price; ?></td>
                                                                    <td>Ksh <?php echo $products->product_sale_price; ?></td>
                                                                    <td>
                                                                        <a data-toggle="modal" href="#update_<?php echo $products->product_id; ?>" class="badge badge-dim badge-pill badge-outline-warning"><em class="icon ni ni-edit"></em> Edit</a>
                                                                        <a data-toggle="modal" href="#delete_<?php echo $products->product_id; ?>" class="badge badge-dim badge-pill badge-outline-danger"><em class="icon ni ni-trash-fill"></em> Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <!-- Load Modals Via Partials -->
                                                            <?php require('../helpers/modals/items_modals.php');
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block -->
                                <?php } ?>
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