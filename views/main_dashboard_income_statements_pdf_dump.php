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
require_once '../config/config.php';
require_once '../config/checklogin.php';
require_once '../config/codeGen.php';
check_login();
require_once('../vendor/autoload.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$start = date('Y-m-d', strtotime($_GET['from']));
$end = date('Y-m-d', strtotime($_GET['to']));
$store = $_GET['store'];

/* Wrap All This Under System Settings */
$ret = "SELECT * FROM store_settings  WHERE store_status  = 'active' AND store_id = '{$store}'";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($stores = $res->fetch_object()) {

    /* Quick AI To Filter This */
        $html =
            '
                <!DOCTYPE html>
                    <html>
                        <head>
                            <meta name="" content="XYZ,0,0,1" />
                            <style type="text/css">
                                table {
                                    font-size: 12px;
                                    padding: 4px;
                                }

                                tr {
                                    page-break-after: always;
                                }

                                th {
                                    text-align: left;
                                    padding: 4pt;
                                }

                                td {
                                    padding: 5pt;
                                }

                                #b_border {
                                    border-bottom: dashed thin;
                                }

                                legend {
                                    color: #0b77b7;
                                    font-size: 1.2em;
                                }

                                #error_msg {
                                    text-align: left;
                                    font-size: 11px;
                                    color: red;
                                }

                                .header {
                                    margin-bottom: 20px;
                                    width: 100%;
                                    text-align: left;
                                    position: absolute;
                                    top: 0px;
                                }

                                .footer {
                                    width: 100%;
                                    text-align: center;
                                    position: fixed;
                                    bottom: 5px;
                                }

                                #no_border_table {
                                    border: none;
                                }

                                #bold_row {
                                    font-weight: bold;
                                }

                                #amount {
                                    text-align: right;
                                    font-weight: bold;
                                }

                                .pagenum:before {
                                    content: counter(page);
                                }

                                /* Thick red border */
                                hr.red {
                                    border: 1px solid red;
                                }
                                .list_header{
                                    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                                }
                            </style>
                        </head>

                        <body style="margin:1px;">
                            <div class="footer">
                                <hr>
                                <i><b>Report Generated On ' . date('d M Y') . ', NativeBeecare POS. Powered By Devlan Solutions LTD ~ devlan.co.ke </b><i>
                            </div>
                            
                            <div class="list_header" align="center">
                                <h3>
                                    ' . $stores->store_name . '
                                </h3>
                                <h4>
                                    ' . $stores->store_email . '<br>
                                    ' . $stores->store_adr . ' 
                                </h4>
                                <hr style="width:100%" , color=black>
                                <h5>Income Statement Reports  From ' . date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)) . ' </h5>
                            </div>
                            <table border="1" cellspacing="0" width="98%" style="font-size:9pt">
                                <thead>
                                    <tr>
                                        <th style="width:50%">Month</th>
                                        <th style="width:100%">Cash In (Sales Revenue)</th>
                                        <th style="width:100%">Cash Out (Expenses)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ';
                                    // Query to get sales data aggregated by month
                                    $sales_query = "SELECT DATE_FORMAT(sale_datetime, '%Y-%m') AS sale_month, 
                                    DATE_FORMAT(sale_datetime, '%M %Y') AS display_month, SUM(sale_quantity * sale_payment_amount) AS total_sales
                                    FROM sales
                                    WHERE sale_datetime BETWEEN '{$start}' AND '{$end}' 
                                    AND sale_product_id IN (SELECT product_id FROM products WHERE product_store_id = '{$store}')
                                    GROUP BY sale_month
                                    ORDER BY sale_month ASC";
                                    $sales_stmt = $mysqli->prepare($sales_query);
                                    $sales_stmt->execute();
                                    $sales_res = $sales_stmt->get_result();

                                    // Query to get expenses data aggregated by month with expense items
                                    $expenses_query = "SELECT DATE_FORMAT(expense_date, '%Y-%m') AS expense_month, 
                                    DATE_FORMAT(expense_date, '%M %Y') AS display_month, SUM(expense_amount) AS total_expenses, GROUP_CONCAT(expense_name SEPARATOR ', ') AS expense_items
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

                                        $html .= "<tr>
                                            <td>".$display_month."</td>
                                            <td>Ksh " . number_format($monthly_sales, 2) . "</td>
                                            <td>Ksh " . number_format($monthly_expenses, 2) . (!empty($expense_items) ? " ({$expense_items})" : '') . "</td>
                                        </tr>";
                                        
                                        $cumulative_income += $monthly_sales;
                                        $cumulative_expenditure += $monthly_expenses;
                                    }
                                        $html .= '
                                        <tr>
                                            <td  colspan="2"><b>Cumulative Cash In (Sales Revenue): </b></td>
                                            <td><b>' . "Ksh " . number_format($cumulative_income, 2) . '</b></td>
                                        </tr>
                                        <tr>
                                            <td  colspan="2"><b>Cumulative Cash Out (Expenses): </b></td>
                                            <td><b>' . "Ksh " . number_format($cumulative_expenditure, 2) . '</b></td>
                                        </tr>';
                                        $net_result = $cumulative_income - $cumulative_expenditure;
                                         $html .= '
                                            <tr>
                                                <td  colspan="2"><b>Operating Income: </b></td>
                                                <td><b>' . "Ksh " . number_format($net_result, 2) . '</b></td>
                                            </tr>
                                </tbody>
                            </table>
                        </body>
                    </html>
            ';
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->render();
        $dompdf->stream('Income Statements Reports From ' . $start . ' To ' . $end, array("Attachment" => 1));
        $options = $dompdf->getOptions();
        $options->setDefaultFont('');
        $dompdf->setOptions($options);
   
}
