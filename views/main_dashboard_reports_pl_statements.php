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
                                            <h3 class="nk-block-title page-title">Profit And Loss Statements</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    Customize, generate and export P&L statements reports in spreadsheet(.csv, .xlsx, .xls) or pdf format. <br>
                                                </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->

                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <!-- End Modal -->
                                <div class="row">
                                    <div class="card mb-3 col-12 border border-success">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>From Date</label>
                                                                <input type="text" name="start_date" required class="date-picker form-control">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>To Date</label>
                                                                <input type="text" name="end_date" required class="date-picker form-control">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Select Store</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <select name="store" class="form-select form-control form-control-lg" data-search="on">
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
                                                        <div class="text-right">
                                                            <button name="get_statements" class="btn btn-primary" type="submit">
                                                                <em class="icon ni ni-report-profit"></em> Get Reports
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_POST['get_statements'])) {
                                        $start = date('Y-m-d', strtotime($_POST['start_date']));
                                        $end = date('Y-m-d', strtotime($_POST['end_date']));
                                        $store = $_POST['store'];
                                    ?>
                                        <div class="card mb-3 col-12 border border-success">
                                            <div class="card-body">
                                                <h5 class="text-right">
                                                    <a class="btn btn-primary" href="store_system_pl_pdf_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-file-docs"></em> Export To PDF</a>
                                                    <a class="btn btn-primary" href="store_system_pl_xls_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-grid-add-fill-c"></em> Export To Excel</a>
                                                </h5>
                                                <div class="card-header">
                                                    <h5 class="text-center text-primary">Income Statement From <?php echo date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)); ?></h5>
                                                </div>
                                                <table class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th>Date</th>
                                                            <th>Purchase Price</th>
                                                            <th>Discounted Sale Price</th>
                                                            <th>QTY Sold</th>
                                                            <th>Margin</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ret = "SELECT * FROM sales s
                                                        INNER JOIN products p ON p.product_id = sale_product_id
                                                        INNER JOIN users us ON us.user_id = s.sale_user_id
                                                        WHERE p.product_store_id = '{$store}' AND s.sale_datetime BETWEEN '{$start}' AND '{$end}'
                                                        ORDER BY sale_datetime ASC ";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); // Execute query
                                                        $res = $stmt->get_result();

                                                        $cumulative_income = 0;       // Total Cash In (Revenue)
                                                        $cumulative_expenditure = 0;  // Total Cash Out (Cost of Goods Sold)

                                                        while ($sales = $res->fetch_object()) {
                                                            /* Sale Amount (Revenue) */
                                                            $sales_amount = $sales->sale_quantity * $sales->sale_payment_amount;
                                                            $discounted_price = $sales->product_sale_price - $sales->sale_discount;
                                                            $sale_margin = ($discounted_price - $sales->product_purchase_price) * $sales->sale_quantity;

                                                            /* Output Sales Data */
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $sales->product_name ?></td>
                                                                <td><?php echo date('d M Y', strtotime($sales->sale_datetime)) ?></td>
                                                                <td><?php echo "Ksh " . number_format($sales->product_purchase_price, 2); ?></td>
                                                                <td><?php echo "Ksh " . number_format($discounted_price, 2); ?></td>
                                                                <td><?php echo $sales->sale_quantity ?></td>
                                                                <td><?php echo "Ksh " . number_format($sale_margin); ?></td>
                                                                <td>
                                                                    <?php echo "Ksh " . number_format($sales_amount, 2); ?>
                                                                    <?php
                                                                    $cumulative_income += $sales_amount;  // Accumulate Total Cash In
                                                                    $cumulative_expenditure += ($sales->product_purchase_price * $sales->sale_quantity); // Accumulate Total Cash Out
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!-- Total Cash In (Revenue) -->
                                                        <tr>
                                                            <td colspan="6"><b>Total Cash In (Revenue):</b></td>
                                                            <td><b><?php echo  "Ksh " . number_format($cumulative_income, 2); ?></b></td>
                                                        </tr>
                                                        <!-- Total Cash Out (Cost of Goods Sold) -->
                                                        <tr>
                                                            <td colspan="6"><b>Total Cash Out (Cost of Goods Sold):</b></td>
                                                            <td><b><?php echo  "Ksh " . number_format($cumulative_expenditure, 2); ?></b></td>
                                                        </tr>
                                                        <!-- Net Profit or Loss -->
                                                        <?php
                                                        $net_result = $cumulative_income - $cumulative_expenditure;
                                                        if ($net_result > 0) {
                                                        ?>
                                                            <tr>
                                                                <td colspan="6"><b>Net Profit:</b></td>
                                                                <td><b><?php echo  "Ksh " . number_format($net_result, 2); ?></b></td>
                                                            </tr>
                                                        <?php } elseif ($net_result < 0) { ?>
                                                            <tr>
                                                                <td colspan="6"><b>Net Loss:</b></td>
                                                                <td><b><?php echo  "Ksh " . number_format(abs($net_result), 2); ?></b></td>
                                                            </tr>
                                                        <?php } else { ?>
                                                            <tr>
                                                                <td colspan="6"><b>Break-Even (No Profit or Loss):</b></td>
                                                                <td><b><?php echo  "Ksh " . number_format($net_result, 2); ?></b></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } ?>
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
    include('../functions/sales_reports_chart.php');
    ?>
</body>

</html>