<div class="card mb-3 col-12 border border-success">
    <div class="card-body">
        <h5 class="text-right">
            <a class="btn btn-primary" href="main_dashboard_system_expenses_pdf_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class=" icon ni ni-file-docs"></em> Export To PDF</a>
            <a class="btn btn-primary" href="main_dashboard_system_expenses_xls_dump?from=<?php echo $_POST['start_date']; ?>&to=<?php echo $_POST['end_date']; ?>&store=<?php echo $store; ?>"><em class="icon ni ni-grid-add-fill-c"></em> Export To Excel</a>
        </h5>
        <div class="card-header">
            <h5 class="text-center text-primary">Expenses Report From <?php echo date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)); ?></h5>
        </div>
        <table class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Expense Name</th>
                    <th>Expense Description</th>
                    <th>Expense Date</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ret = "SELECT * FROM expenses e
                WHERE e.expense_store_id  = '{$store}' AND e.expense_date BETWEEN '$start' AND '$end'
                ORDER BY expense_date ASC ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                $cumulative_expenses = 0;
                while ($expenses = $res->fetch_object()) {
                    $cumulative_expenses += $expenses->expense_amount;
                ?>
                    <tr>
                        <td><?php echo $expenses->expense_name ?></td>
                        <td><?php echo $expenses->expense_details ?></td>
                        <td><?php echo date('d M Y', strtotime($expenses->expense_date)) ?></td>
                        <td>
                            <?php echo "Ksh " . number_format($expenses->expense_amount, 2);
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="3"><b>Total Amount:</b></td>
                    <td><b><?php echo  "Ksh " . number_format($cumulative_expenses, 2); ?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>