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
check_login();
require_once('../config/codeGen.php');

// Fetch and sanitize GET parameters
$start = date('Y-m-d', strtotime($_GET['from']));
$end = date('Y-m-d', strtotime($_GET['to']));
$store = (int)$_GET['store'];

/* Function to sanitize data for Excel */
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Define the Excel file name
$fileName = 'Income_Statements_From_' . date('M_d_Y', strtotime($start)) . '_To_' . date('M_d_Y', strtotime($end)) . '.xls';

// Set column headers for Excel file
$fields = array('Sno', 'Month', 'Cash In (Sales Revenue)', 'Cash Out (Expenses)', 'Expense Amount (Ksh)');
$excelData = implode("\t", array_values($fields)) . "\n";

// Query for sales data aggregated by month
$sales_query = "SELECT DATE_FORMAT(sale_datetime, '%Y-%m') AS sale_month, 
DATE_FORMAT(sale_datetime, '%M %Y') AS display_month, 
SUM(sale_quantity * sale_payment_amount) AS total_sales
FROM sales
WHERE sale_datetime BETWEEN ? AND ? 
AND sale_product_id IN (SELECT product_id FROM products WHERE product_store_id = ?)
GROUP BY sale_month
ORDER BY sale_month ASC";
$sales_stmt = $mysqli->prepare($sales_query);
$sales_stmt->bind_param('ssi', $start, $end, $store);
$sales_stmt->execute();
$sales_res = $sales_stmt->get_result();

// Query for expenses data aggregated by month
$expenses_query = "SELECT DATE_FORMAT(expense_date, '%Y-%m') AS expense_month, 
DATE_FORMAT(expense_date, '%M %Y') AS display_month, 
SUM(expense_amount) AS total_expenses, 
GROUP_CONCAT(expense_name SEPARATOR ', ') AS expense_items
FROM expenses
WHERE expense_date BETWEEN ? AND ? 
AND expense_store_id = ?
GROUP BY expense_month
ORDER BY expense_month ASC";
$expenses_stmt = $mysqli->prepare($expenses_query);
$expenses_stmt->bind_param('ssi', $start, $end, $store);
$expenses_stmt->execute();
$expenses_res = $expenses_stmt->get_result();

// Initialize arrays to store sales and expense data
$sales_data = [];
$expense_data = [];

// Fetch sales data and store by month
while ($sales_record = $sales_res->fetch_object()) {
    $sales_data[$sales_record->sale_month] = [
        'display_month' => $sales_record->display_month,
        'total_sales' => $sales_record->total_sales
    ];
}

// Fetch expense data and store by month
while ($expense_record = $expenses_res->fetch_object()) {
    $expense_data[$expense_record->expense_month] = [
        'display_month' => $expense_record->display_month,
        'total_expenses' => $expense_record->total_expenses,
        'items' => $expense_record->expense_items
    ];
}

// Combine all unique months from both sales and expenses data
$all_months = array_unique(array_merge(array_keys($sales_data), array_keys($expense_data)));
sort($all_months); // Sort months in chronological order

// Cumulative totals
$cumulative_income = 0;
$cumulative_expenditure = 0;
$cnt = 1;

// Loop through all months to generate Excel rows
foreach ($all_months as $month) {
    $monthly_sales = $sales_data[$month]['total_sales'] ?? 0;
    $monthly_expenses = $expense_data[$month]['total_expenses'] ?? 0;
    $expense_items = $expense_data[$month]['items'] ?? '';
    $display_month = $sales_data[$month]['display_month'] ?? $expense_data[$month]['display_month'] ?? '';

    // Prepare data for each month
    $lineData = [
        $cnt,
        $display_month,
        number_format($monthly_sales, 2),
        number_format($monthly_expenses, 2),
        (!empty($expense_items) ? "{$expense_items}" : '')
    ];

    // Sanitize the data and append to the Excel content
    array_walk($lineData, 'filterData');
    $excelData .= implode("\t", array_values($lineData)) . "\n";

    $cumulative_income += $monthly_sales;
    $cumulative_expenditure += $monthly_expenses;
    $cnt++;
}

// Add cumulative totals to the Excel sheet
$totalLine = [
    '',
    'Cumulative Cash In (Sales Revenue)',
    'Ksh ' . number_format($cumulative_income, 2),
    'Cumulative Cash Out (Expenses)',
    'Ksh ' . number_format($cumulative_expenditure, 2)
];
array_walk($totalLine, 'filterData');
$excelData .= implode("\t", array_values($totalLine)) . "\n";

// Net Income or Loss
$net_result = $cumulative_income - $cumulative_expenditure;
$net_status = $net_result > 0 ? 'Net Income' : ($net_result < 0 ? 'Net Loss' : 'Break-Even');
$netLine = ['', $net_status, '', '', 'Ksh ' . number_format($net_result, 2)];
array_walk($netLine, 'filterData');
$excelData .= implode("\t", array_values($netLine)) . "\n";

// Set headers for the Excel download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

// Output Excel data
echo $excelData;
