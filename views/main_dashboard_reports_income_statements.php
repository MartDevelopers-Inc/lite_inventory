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
                                            <h3 class="nk-block-title page-title">Income Statements</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    Customize, generate and export Income statements reports in spreadsheet(.csv, .xlsx, .xls) or pdf format. <br>
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
                                        // Capture the date range and store from the form input
                                        $start = date('Y-m-d', strtotime($_POST['start_date']));
                                        $end = date('Y-m-d', strtotime($_POST['end_date']));
                                        $store = $_POST['store'];
                                    ?>
                                        <div class="card mb-3 col-12 border border-success">
                                            <div class="card-body">
                                                <h5 class="text-right">
                                                    <!-- Export to PDF and Excel links -->
                                                    <a class="btn btn-primary" href="main_dashboard_income_statements_pdf_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-file-docs"></em> Export To PDF</a>
                                                    <!--
                                                        <a class="btn btn-primary" href="main_dashboard_income_statements_xls_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-grid-add-fill-c"></em> Export To Excel</a>
                                                    -->
                                                </h5>

                                                <!-- Report title -->
                                                <div class="card-header">
                                                    <h5 class="text-center text-primary">Income Statements Report From <?php echo date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)); ?></h5>
                                                </div>
                                                <table class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Month</th>
                                                            <th>Cash In (Sales Revenue)</th>
                                                            <th>Cash Out (Expenses)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Query to get sales data aggregated by month
                                                        $sales_query = "SELECT DATE_FORMAT(sale_datetime, '%Y-%m') AS sale_month, DATE_FORMAT(sale_datetime, '%M %Y') AS display_month, SUM(sale_quantity * sale_payment_amount) AS total_sales
                                                        FROM sales
                                                        WHERE sale_datetime BETWEEN '{$start}' AND '{$end}' 
                                                        AND sale_product_id IN (SELECT product_id FROM products WHERE product_store_id = '{$store}')
                                                        GROUP BY sale_month
                                                        ORDER BY sale_month ASC";
                                                        $sales_stmt = $mysqli->prepare($sales_query);
                                                        $sales_stmt->execute();
                                                        $sales_res = $sales_stmt->get_result();

                                                        // Query to get expenses data aggregated by month with expense items
                                                        $expenses_query = "SELECT DATE_FORMAT(expense_date, '%Y-%m') AS expense_month, DATE_FORMAT(expense_date, '%M %Y') AS display_month, SUM(expense_amount) AS total_expenses, GROUP_CONCAT(expense_name SEPARATOR ', ') AS expense_items
                                                        FROM expenses
                                                        WHERE expense_date BETWEEN '{$start}' AND '{$end}' 
                                                        AND expense_store_id = '{$store}'
                                                        GROUP BY expense_month
                                                        ORDER BY expense_month ASC";
                                                        $expenses_stmt = $mysqli->prepare($expenses_query);
                                                        $expenses_stmt->execute();
                                                        $expenses_res = $expenses_stmt->get_result();

                                                        // Initialize cumulative totals for income and expenditure
                                                        $cumulative_income = 0;
                                                        $cumulative_expenditure = 0;

                                                        // Store results in arrays
                                                        $sales_data = [];
                                                        $expense_data = [];

                                                        // Fetch sales data and store it by month
                                                        while ($sales_record = $sales_res->fetch_object()) {
                                                            $sales_data[$sales_record->sale_month] = [
                                                                'display_month' => $sales_record->display_month,
                                                                'total_sales' => $sales_record->total_sales
                                                            ];
                                                        }

                                                        // Fetch expenses data and store it by month, including expense items
                                                        while ($expense_record = $expenses_res->fetch_object()) {
                                                            $expense_data[$expense_record->expense_month] = [
                                                                'display_month' => $expense_record->display_month,
                                                                'total_expenses' => $expense_record->total_expenses,
                                                                'items' => $expense_record->expense_items
                                                            ];
                                                        }

                                                        // Get all unique months from both sales and expenses
                                                        $all_months = array_unique(array_merge(array_keys($sales_data), array_keys($expense_data)));
                                                        sort($all_months); // Sort months in chronological order

                                                        // Loop through all months and display cumulative data
                                                        foreach ($all_months as $month) {
                                                            $monthly_sales = $sales_data[$month]['total_sales'] ?? 0; // Default to 0 if no sales
                                                            $monthly_expenses = $expense_data[$month]['total_expenses'] ?? 0; // Default to 0 if no expenses
                                                            $expense_items = $expense_data[$month]['items'] ?? ''; // Default to empty if no expense items
                                                            $display_month = $sales_data[$month]['display_month'] ?? $expense_data[$month]['display_month'] ?? '';

                                                            echo "<tr>
                                                                <td>{$display_month}</td>
                                                                <td>Ksh " . number_format($monthly_sales, 2) . "</td>
                                                                <td>Ksh " . number_format($monthly_expenses, 2) . (!empty($expense_items) ? " ({$expense_items})" : '') . "</td>
                                                            </tr>";

                                                            $cumulative_income += $monthly_sales;
                                                            $cumulative_expenditure += $monthly_expenses;
                                                        }
                                                        ?>
                                                        <!-- Display cumulative income (total sales) -->
                                                        <tr>
                                                            <td colspan="2"><b>Cumulative Cash In (Sales Revenue):</b></td>
                                                            <td><b><?php echo "Ksh " . number_format($cumulative_income, 2); ?></b></td>
                                                        </tr>

                                                        <!-- Display cumulative expenses -->
                                                        <tr>
                                                            <td colspan="2"><b>Cumulative Cash Out (Expenses):</b></td>
                                                            <td><b><?php echo "Ksh " . number_format($cumulative_expenditure, 2); ?></b></td>
                                                        </tr>

                                                        <!-- Display Net Profit or Loss -->
                                                        <?php
                                                        $net_result = $cumulative_income - $cumulative_expenditure;
                                                        ?>
                                                        <tr>
                                                            <td colspan="2"><b>Operating Income:</b></td>
                                                            <td><b><?php echo "Ksh " . number_format($net_result, 2); ?></b></td>
                                                        </tr>
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
    ?>
</body>

</html>