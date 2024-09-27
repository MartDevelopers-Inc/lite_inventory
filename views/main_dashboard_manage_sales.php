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
                                            <h3 class="nk-block-title page-title">Manage Posted Sales</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    This module allows you to manage all posted sales records <br>
                                                </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <!-- End Modal -->
                                <div class="">
                                    <div class="row">
                                        <div class="card mb-3 col-md-12 border border-success">
                                            <div class="card-body">
                                                <table class="datatable-init table">
                                                    <thead>
                                                        <tr>
                                                            <th>Receipt Number</th>
                                                            <th>Date Posted</th>
                                                            <th>Items Qty</th>
                                                            <th>Posted By</th>
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ret = "SELECT s.sale_receipt_no, s.sale_datetime, SUM(s.sale_quantity) as total_quantity, 
                                                        p.product_name, u.user_name 
                                                        FROM sales s
                                                        INNER JOIN products p ON p.product_id = s.sale_product_id
                                                        INNER JOIN users u ON u.user_id = s.sale_user_id
                                                        GROUP BY s.sale_receipt_no, s.sale_datetime, p.product_name, u.user_name";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        while ($sales = $res->fetch_object()) {
                                                            /* Count Number Of Sales */
                                                            $query = "SELECT SUM(sale_quantity)  FROM sales 
                                                            WHERE sale_receipt_no = '$sales->sale_receipt_no'";
                                                            $stmt = $mysqli->prepare($query);
                                                            $stmt->execute();
                                                            $stmt->bind_result($number_of_items);
                                                            $stmt->fetch();
                                                            $stmt->close();
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $sales->sale_receipt_no; ?></td>
                                                                <td><?php echo date('d M Y g:ia', strtotime($sales->sale_datetime)); ?></td>
                                                                <td><?php echo $number_of_items; ?></td>
                                                                <td><?php echo $sales->user_name; ?></td>
                                                                <td>
                                                                    <a href="main_dashboard_manage_sale?view=<?php echo $sales->sale_receipt_no; ?>" class="badge badge-dim badge-pill badge-outline-primary"><em class="icon ni ni-external"></em> View Details</a>
                                                                </td>
                                                            </tr>
                                                        <?php
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