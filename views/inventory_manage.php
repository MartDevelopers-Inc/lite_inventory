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
/* Update Stock And Log That Activity */
if (isset($_POST['update_product_stock'])) {
    /* Product Attributes */
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);
    $product_quantity = mysqli_real_escape_string($mysqli, $_POST['product_quantity']);
    $product_details = mysqli_real_escape_string($mysqli, $_POST['product_details']);

    /* Log Details */
    $log_type = 'Stock Management Logs';
    $log_details = 'Added New Stock Of ' . $product_quantity . ' Items To ' . $product_details;

    /* Get Product Details */
    $sql = "SELECT * FROM  products  WHERE product_id = '{$product_id}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        /* Compute New Stock  */
        $new_stock = $row['product_quantity'] + $product_quantity;
        /* Persist New Stock */
        $sql = "UPDATE products SET product_quantity = '{$new_stock}' WHERE product_id = '{$product_id}'";
        $inventory_sql = "INSERT INTO inventory (inventory_product_id, inventory_qty_added) VALUES('{$product_id}', '{$product_quantity}')";

        $prepare = $mysqli->prepare($sql);
        $inventory_prepare = $mysqli->prepare($inventory_sql);

        $prepare->execute();
        $inventory_prepare->execute();

        /* Log This Operation */
        include('../functions/logs.php');
        if ($prepare && $inventory_prepare) {
            $success = "New Stock Of $product_details Has Been Added";
        } else {
            $err = "Failed!, Please Try Again";
        }
    } else {
        $err = "Please Try Again";
    }
}
require_once('../partials/head.php');
?>

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <?php require_once('../partials/pos_header.php'); ?>
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content nk-content-lg nk-content-fluid">
                <div class="container-xl wide-lg">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-between-md g-3">
                                    <div class="nk-block-head-content">
                                        <div class="align-center flex-wrap pb-2 gx-4 gy-3">
                                            <div>
                                                <h4 class="nk-block-title fw-normal">Inventory & Stocks Management Module</h4>
                                                <p>
                                                    This module allows you to update your stock, keep your inventory in check <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card mb-3 col-md-12 border border-success">
                                    <div class="card-body">
                                        <table class="datatable-init table">
                                            <thead>
                                                <tr>
                                                    <th>Item Code</th>
                                                    <th>Item Name</th>
                                                    <th>Current Quantity</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $store = $_GET['store'];
                                                $ret = "SELECT * FROM products 
                                                WHERE product_status = 'active' AND product_store_id = '{$store}'";
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                while ($products = $res->fetch_object()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $products->product_code; ?></td>
                                                        <td><?php echo $products->product_name; ?></td>
                                                        <td><?php echo $products->product_quantity; ?></td>
                                                        <td>
                                                            <a data-toggle="modal" href="#edit_stock_<?php echo $products->product_id; ?>" class="badge badge-dim badge-pill badge-outline-success"><em class="icon ni ni-edit"></em> Add Stock</a>
                                                        </td>
                                                    </tr>
                                                    <!-- Load Update Stock Modal -->
                                                    <div class="modal fade" id="edit_stock_<?php echo $products->product_id; ?>">
                                                        <div class="modal-dialog  modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title text-center">Add New Stock Of <?php echo  $products->product_name; ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                        <h4 class="text-success">Current Quantity In Store Is : <?php echo $products->product_quantity; ?></h4>
                                                                    </div>
                                                                    <hr>
                                                                    <form method="post" enctype="multipart/form-data">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label>New Item Quantity</label>
                                                                                <input type="number"  name="product_quantity" required class="form-control">
                                                                                <input type="hidden" name="product_id" value="<?php echo $products->product_id; ?>" required class="form-control">
                                                                                <input type="hidden" name="product_details" value="<?php echo $products->product_code . ' ' . $products->product_name; ?>" required class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <br><br>
                                                                        <div class="text-right">
                                                                            <button name="update_product_stock" class="btn btn-primary" type="submit">
                                                                                Add Stock
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
    <!-- content @e -->
    <!-- footer @s -->
    <?php require_once('../partials/pos_footer.php'); ?>
    <!-- footer @e -->
    </div>
    <!-- wrap @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>