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
                if ($net_result > 0) {
                ?>
                    <tr>
                        <td colspan="2"><b>Net Profit:</b></td>
                        <td><b><?php echo "Ksh " . number_format($net_result, 2); ?></b></td>
                    </tr>
                <?php } elseif ($net_result < 0) { ?>
                    <tr>
                        <td colspan="2"><b>Net Loss:</b></td>
                        <td><b><?php echo "Ksh " . number_format(abs($net_result), 2); ?></b></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td colspan="2"><b>Break-Even (No Profit or Loss):</b></td>
                        <td><b><?php echo "Ksh " . number_format($net_result, 2); ?></b></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>