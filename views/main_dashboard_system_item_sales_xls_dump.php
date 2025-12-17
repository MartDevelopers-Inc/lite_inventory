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

$start = date('Y-m-d', strtotime($_GET['from']));
$end = date('Y-m-d', strtotime($_GET['to']));
$store = $_GET['store'];

function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

/* Excel File Name */
$fileName = 'Item Based Sales Report From ' . date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)) . '.xls';

/* Excel Column Names */
$fields = array('Item Details ', 'Quantity Sold ', 'Amount (Ksh)');
$excelData = implode("\t", array_values($fields)) . "\n";

/* Fetch All Records From The Database */
$query = $mysqli->query("SELECT 
    p.product_name,
    SUM(s.sale_quantity) AS total_qty,
    SUM(s.sale_quantity * s.sale_payment_amount) AS total_amount
    FROM sales s
    INNER JOIN products p ON p.product_id = s.sale_product_id
    WHERE p.product_store_id = '{$store}' 
    AND s.sale_datetime BETWEEN '$start' AND '$end'
    GROUP BY p.product_name
    ORDER BY total_qty  DESC
");

$totalQuantity = 0;
$totalAmount = 0;

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        
        $lineData = array(
            $row['product_name'],
            $row['total_qty'],
           $row['total_amount'],
        );
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";

        /* Update total calculations */
        $totalAmount += $row['total_amount'];
    }

    /* Add totals row */
    $totalLine = array(
        'Total',
        '',
        number_format($totalAmount, 2)
    );
    array_walk($totalLine, 'filterData');
    $excelData .= implode("\t", array_values($totalLine)) . "\n";
} else {
    $excelData .= 'No Sales Records Available...' . "\n";
}

/* Generate header for download */
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

/* Output Excel data */
echo $excelData;
exit;
