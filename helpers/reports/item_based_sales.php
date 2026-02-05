<div class="card mb-3 col-12 border border-success">
    <div class="card-body">
        <h5 class="text-right">
            <a class="btn btn-primary" href="main_dashboard_system_item_sales_pdf_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class=" icon ni ni-file-docs"></em> Export To PDF</a>
            <a class="btn btn-primary" href="main_dashboard_system_item_sales_xls_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-grid-add-fill-c"></em> Export To Excel</a>
        </h5>
        <div class="card-header">
            <h5 class="text-center text-primary">Item Based Report Of All Posted Sales From <?php echo date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)); ?></h5>
        </div>
        <table class="table table-bordered dt-responsive"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <thead>
                <tr>
                    <th>Item</th>
                    <th>Total Quantity Sold</th>
                    <th>Total Sales</th>
                    <th>Profit Per Item</th>
                    <th>Total Profit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ret = "
                SELECT
                    p.product_name,

                    SUM(s.sale_quantity) AS total_qty,

                    SUM(s.sale_quantity * s.sale_payment_amount) AS total_amount,

                    (AVG(s.sale_payment_amount) - p.product_purchase_price) AS profit_per_unit,

                    SUM(
                        s.sale_quantity *
                        (s.sale_payment_amount - p.product_purchase_price)
                    ) AS total_profit

                FROM sales s

                INNER JOIN products p
                    ON p.product_id = s.sale_product_id

                WHERE p.product_store_id = ?
                AND s.sale_datetime BETWEEN ? AND ?

                GROUP BY p.product_id

                ORDER BY total_qty DESC
                ";

                $stmt = $mysqli->prepare($ret);
                $stmt->bind_param("sss", $store, $start, $end);
                $stmt->execute();

                $res = $stmt->get_result();

                $cumulative_income = 0;
                $cumulative_profit = 0;

                while ($row = $res->fetch_object()) {

                    $cumulative_income += $row->total_amount;
                    $cumulative_profit += $row->total_profit;
                ?>

                    <tr>
                        <td><?php echo htmlspecialchars($row->product_name); ?></td>

                        <td><?php echo number_format($row->total_qty); ?></td>

                        <td><?php echo "Ksh " . number_format($row->total_amount, 2); ?></td>

                        <td><?php echo "Ksh " . number_format($row->profit_per_unit, 2); ?></td>

                        <td><?php echo "Ksh " . number_format($row->total_profit, 2); ?></td>
                    </tr>

                <?php } ?>

                <tr>
                    <td colspan="2"><b>Totals</b></td>

                    <td>
                        <b><?php echo "Ksh " . number_format($cumulative_income, 2); ?></b>
                    </td>

                    <td></td>

                    <td>
                        <b><?php echo "Ksh " . number_format($cumulative_profit, 2); ?></b>
                    </td>
                </tr>

            </tbody>

        </table>
    </div>
</div>