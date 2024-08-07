<div class="card mb-3 col-12 border border-success">
    <div class="card-body">
        <h5 class="text-right">
            <a class="btn btn-primary" href="store_system_sales_pdf_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&type=<?php echo $_POST['sale_report_type']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-file-docs"></em> Export To PDF</a>
            <a class="btn btn-primary" href="store_system_sales_xls_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&type=<?php echo $_POST['sale_report_type']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-grid-add-fill-c"></em> Export To Excel</a>
        </h5>
        <div class="card-header">
            <h5 class="text-center text-primary">Summarized Report Of All Posted Sales From <?php echo date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)); ?></h5>
        </div>
        <table class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>QTY</th>
                    <th>Payment Means</th>
                    <th>Sold By</th>
                    <th>Sold To</th>
                    <th>Date Sold</th>
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
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                $cumulative_income = 0;
                while ($sales = $res->fetch_object()) {
                    /* Sale Amount  */
                    $sales_amount = $sales->sale_quantity * $sales->sale_payment_amount;
                    /* Payment Means */
                    if ($sales->sale_payment_method == 'Credit') {
                        $payment_means = 'Credit Sale <br> Payment Due On ' . date('d M Y', strtotime($sales->sale_credit_expected_date));
                    } else {
                        $payment_means = $sales->sale_payment_method;
                    }
                ?>
                    <tr>
                        <td><?php echo $sales->product_name ?></td>
                        <td><?php echo $sales->sale_quantity ?></td>
                        <td><?php echo $payment_means ?></td>
                        <td><?php echo $sales->user_name ?></td>
                        <td><?php echo $sales->sale_customer_name ?></td>
                        <td><?php echo date('d M Y g:ia', strtotime($sales->sale_datetime)) ?></td>
                        <td>
                            <?php echo "Ksh " . number_format($sales_amount, 2);
                            $cumulative_income += $sales_amount;
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="6"><b>Total Amount:</b></td>
                    <td><b><?php echo  "Ksh " . number_format($cumulative_income, 2); ?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>