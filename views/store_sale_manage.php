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
/* Mark As Paid */
if (isset($_POST['Paid_Credit'])) {
    $sale_id = $_POST['sale_id'];

    /* Update Details */
    $sale_payment = "UPDATE sales SET sale_payment_status = 'paid' WHERE sale_id = '{$sale_id}'";
    $sale_prepare = $mysqli->prepare($sale_payment);
    $sale_prepare->execute();

    if ($sale_prepare) {
        $success = "Credit Payment Done";
    } else {
        $err = "Failed!, Please Try Again";
    }
}
/* Roll Back Sale Record */
if (isset($_POST['delete_sale'])) {
    $sale_id = mysqli_real_escape_string($mysqli, $_POST['sale_id']);
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);
    $sale_quantity = mysqli_real_escape_string($mysqli, $_POST['sale_quantity']);
    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $user_password = mysqli_real_escape_string($mysqli, sha1(md5($_POST['user_password'])));
    /* Activity Logged */
    $log_type = 'Sales Management Logs';
    $log_details = mysqli_real_escape_string($mysqli, $_POST['log_details']);

    /* Check If This Fella Password Matches */
    $sql = "SELECT * FROM  users  WHERE user_id = '{$user_id}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($user_password != $row['user_password']) {
            $err = "Please Enter Correct Password";
        } else {
            /* Pop Product Details */
            $sql = "SELECT * FROM  products  WHERE product_id = '{$product_id}'";
            $return = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($return) > 0) {
                $product_details = mysqli_fetch_assoc($return);
                /* New Quantity */
                $new_stock = $product_details['product_quantity'] + $sale_quantity;
                /* Persist */
                $product_sql = "UPDATE products SET product_quantity = '{$new_stock}' WHERE product_id = '{$product_id}'";
                $sale_sql = "DELETE FROM sales WHERE sale_id = '{$sale_id}'";

                $product_prepare = $mysqli->prepare($product_sql);
                $sale_prepare = $mysqli->prepare($sale_sql);

                $product_prepare->execute();
                $sale_prepare->execute();

                /* Log Operation */
                include('../functions/logs.php');
                if ($product_prepare && $sale_prepare) {
                    $success = "Cash Sale Rolled Back";
                } else {
                    $err = "Failed!, Please Try Again";
                }
            }
        }
    }
}
require_once('../partials/head.php');
?>

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <?php require_once('../partials/store_header.php');
            /* Get Receipt Number */
            $receipt = mysqli_real_escape_string($mysqli, $_GET['receipt']);
            /* Get Store_ID */
            $store_id = mysqli_real_escape_string($mysqli, $_GET['view']);
            ?>
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
                                                <h4 class="nk-block-title fw-normal">Receipt #<?php echo $receipt; ?> Details</h4>
                                                <p>
                                                    This is a detailed record of sale receipt #<?php echo $receipt; ?> <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <?php
                                                    /* Get Receipt Attributes */
                                                    $sql = "SELECT * FROM sales WHERE sale_receipt_no = '{$receipt}'";
                                                    $res = mysqli_query($mysqli, $sql);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        $receipts = mysqli_fetch_assoc($res);
                                                        /* Compute Number Of Loyalty Points */
                                                        $query = "SELECT SUM(sale_payment_amount)  FROM sales WHERE sale_receipt_no = '{$receipt}'";
                                                        $stmt = $mysqli->prepare($query);
                                                        $stmt->execute();
                                                        $stmt->bind_result($total);
                                                        $stmt->fetch();
                                                        $stmt->close();

                                                        /* Load Loyalty Points Helper */
                                                        include('../functions/loyalty_points.php');
                                                    ?>
                                                        <li><a href="main_dashboard_download_receipt?store=<?php echo $view; ?>&number=<?php echo $receipt; ?>&customer=<?php echo $receipts['sale_customer_name']; ?>&points=<?php echo $points_awarded; ?>&phone=<?php echo $receipts['sale_customer_phoneno']; ?>" class="btn btn-white btn-outline-light"><em class="icon ni ni-download"></em><span>Download Receipt</span></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card mb-3 col-md-12 border border-success">
                                    <div class="card-body">
                                        <table class="datatable-init table">
                                            <thead>
                                                <tr>
                                                    <th>Item Details</th>
                                                    <th>Quantity</th>
                                                    <th>Item Unit Price</th>
                                                    <th>Item Sale Price</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $ret = "SELECT * FROM sales s
                                                INNER JOIN products p ON p.product_id =  s.sale_product_id
                                                INNER JOIN users u ON u.user_id = s.sale_user_id
                                                WHERE s.sale_receipt_no = '{$receipt}'";
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                while ($sales = $res->fetch_object()) {
                                                    /* Compute Price */
                                                    $total_sale = ($sales->sale_quantity * $sales->sale_payment_amount);
                                                ?>
                                                    <tr>
                                                        <td><?php echo $sales->product_code . ' ' . $sales->product_name; ?></td>
                                                        <td><?php echo $sales->sale_quantity; ?></td>
                                                        <td>Ksh <?php echo number_format($sales->sale_payment_amount, 2); ?></td>
                                                        <td>Ksh <?php echo number_format($total_sale, 2); ?></td>
                                                        <td>
                                                            <?php if ($sales->sale_payment_status == 'unpaid') { ?>
                                                                <a data-toggle="modal" href="#mark_paid_<?php echo $sales->sale_id; ?>" class="badge badge-dim badge-pill badge-outline-success"><em class="icon ni ni-check"></em> Mark As Paid</a>
                                                                <a data-toggle="modal" href="#delete_<?php echo $sales->sale_id; ?>" class="badge badge-dim badge-pill badge-outline-danger"><em class="icon ni ni-trash-fill"></em> Delete</a>
                                                            <?php } else { ?>
                                                                <a data-toggle="modal" href="#delete_<?php echo $sales->sale_id; ?>" class="badge badge-dim badge-pill badge-outline-danger"><em class="icon ni ni-trash-fill"></em> Delete</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    /* Sale Delete Modal */
                                                    include('../helpers/modals/sale_modal.php');
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
    <?php require_once('../partials/pos_footer.php');; ?>
    <!-- footer @e -->
    </div>
    <!-- wrap @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>