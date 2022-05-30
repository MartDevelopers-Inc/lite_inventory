<?php
/*
 * Created on Thu May 19 2022
 *
 * Devlan Solutions LTD - www.devlan.co.ke 
 *
 * hello@devlan.co.ke
 *
 *
 * The Devlan Solutions LTD End User License Agreement
 *
 * Copyright (c) 2022 Devlan Solutions LTD
 *
 * 1. GRANT OF LICENSE
 * Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 * install and activate this system on two separated computers solely for your personal and non-commercial use,
 * unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 * or allowing other individuals to view the contents of this Software, is in violation of this license.
 * You may not make the Software available on a network, or in any way provide the Software to multiple users
 * unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 * 2. COPYRIGHT 
 * The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 * You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 * 3. RESTRICTIONS ON USE
 * You may not, and you may not permit others to
 * (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 * (b) modify, distribute, or create derivative works of the Software;
 * (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 * otherwise exploit the Software.  
 *
 * 4. TERM
 * This License is effective until terminated. 
 * You may terminate it at any time by destroying the Software, together with all copies thereof.
 * This License will also terminate if you fail to comply with any term or condition of this Agreement.
 * Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 * 5. NO OTHER WARRANTIES. 
 * DEVLAN SOLUTIONS LTD DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 * DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 * EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 * SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 * ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 * INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 * SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 * THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 * HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 * 6. SEVERABILITY
 * In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 * affect the validity of the remaining portions of this license.
 *
 * 7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD  OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 * CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 * USE OF THE SOFTWARE, EVEN IF DEVLAN HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 * IN NO EVENT WILL DEVLAN  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 * TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 */

session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
check_login();
require_once('../config/codeGen.php');

$start = date('Y-m-d', strtotime($_GET['from']));
$end = date('Y-m-d', strtotime($_GET['to']));
$store = $_GET['store'];

$report_type = $_GET['type'];
if ($report_type == 'Summarized Report') {
    /* Get Summarized Report */
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    /* Excel File Name */
    $fileName = 'Summarized Sales Report From ' . date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($start)) . 'xls';

    /* Excel Column Name */
    $fields = array('Item Details ', 'Quantity Sold ', 'Sold By ', 'Sold To ', 'Date Sold', 'Amount (Ksh)');


    /* Implode Excel Data */
    $excelData = implode("\t", array_values($fields)) . "\n";

    /* Fetch All Records From The Database */
    $query = $mysqli->query("SELECT * FROM sales s
    INNER JOIN products p ON p.product_id = sale_product_id
    INNER JOIN users us ON us.user_id = s.sale_user_id
    WHERE p.product_store_id = '{$store}' AND s.sale_datetime BETWEEN '$start' AND '$end'
    ORDER BY sale_datetime ASC ");
    if ($query->num_rows > 0) {
        /* Load All Fetched Rows */
        while ($row = $query->fetch_assoc()) {
            /* Sanitize Log Date */
            $sale_datetime = date('d M Y g:ia', strtotime($row['sale_datetime']));
            $sale_amount = $row['sale_quantity'] * $row['sale_payment_amount'];
            /* Hardwire This Data Into .xls File */
            $lineData = array($row['product_name'], $row['sale_quantity'], $row['user_name'], $row['sale_customer_name'], $sale_datetime, $sale_amount);
            array_walk($lineData, 'filterData');
            $excelData .= implode("\t", array_values($lineData)) . "\n";
        }
    } else {
        $excelData .= 'Sales Records Available...' . "\n";
    }

    /* Generate Header File Encodings For Download */
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    /* Render  Excel Data For Download */
    echo $excelData;

    exit;
} else {
    /* Get More Composite Report */
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    /* Excel File Name */
    $fileName = 'Composite Sales Report From ' . date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($start)) . 'xls';

    /* Excel Column Name */
    $fields = array(
        'Item Details',
        'Sold By ',
        'Sold To ',
        'Date Sold',
        'Unit Price (Ksh)',
        'Discount (Ksh)',
        'Discounted Amount (Ksh)',
        'Quantity Sold ',
        'Amount (Ksh)'
    );


    /* Implode Excel Data */
    $excelData = implode("\t", array_values($fields)) . "\n";

    /* Fetch All Records From The Database */
    $query = $mysqli->query("SELECT * FROM sales s
    INNER JOIN products p ON p.product_id = sale_product_id
    INNER JOIN users us ON us.user_id = s.sale_user_id
    WHERE p.product_store_id = '{$store}' AND s.sale_datetime BETWEEN '$start' AND '$end'
    ORDER BY sale_datetime ASC ");
    if ($query->num_rows > 0) {
        /* Load All Fetched Rows */
        while ($row = $query->fetch_assoc()) {
            /* Sanitize Log Date */
            $sale_datetime = date('d M Y g:ia', strtotime($row['sale_datetime']));
            $sale_amount = $row['sale_quantity'] * $row['sale_payment_amount'];
            $discounted_amount = $row['product_sale_price'] - $row['sale_discount'];
            /* Hardwire This Data Into .xls File */
            $lineData = array(
                $row['product_name'],
                $row['user_name'],
                $row['sale_customer_name'],
                $sale_datetime,
                $row['product_sale_price'],
                $row['sale_discount'],
                $discounted_amount,
                $row['sale_quantity'],
                $sale_amount
            );
            array_walk($lineData, 'filterData');
            $excelData .= implode("\t", array_values($lineData)) . "\n";
        }
    } else {
        $excelData .= 'Sales Records Available...' . "\n";
    }

    /* Generate Header File Encodings For Download */
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    /* Render  Excel Data For Download */
    echo $excelData;

    exit;
}
