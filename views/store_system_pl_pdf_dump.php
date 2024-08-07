<?php
/*
 * Created on Wed Jan 26 2022
 *
 *  Devlan - devlan.co.ke 
 *
 * hello@devlan.info
 *
 *
 * The Devlan End User License Agreement
 *
 * Copyright (c) 2022 Devlan
 *
 * 1. GRANT OF LICENSE
 * Devlan hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 * install and activate this system on two separated computers solely for your personal and non-commercial use,
 * unless you have purchased a commercial license from Devlan. Sharing this Software with other individuals, 
 * or allowing other individuals to view the contents of this Software, is in violation of this license.
 * You may not make the Software available on a network, or in any way provide the Software to multiple users
 * unless you have first purchased at least a multi-user license from Devlan.
 *
 * 2. COPYRIGHT 
 * The Software is owned by Devlan and protected by copyright law and international copyright treaties. 
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
 * Devlan  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 * Devlan SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
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
 * 7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN  OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 * CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 * USE OF THE SOFTWARE, EVEN IF DEVLAN HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 * IN NO EVENT WILL DEVLAN  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 * TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
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
$ret = "SELECT * FROM store_settings  
WHERE store_status  = 'active' AND store_id = '{$store}'";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($stores = $res->fetch_object()) {

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
                            <i>Report Generated On ' . date('d M Y') . '</i>, Proudly Powered By Devlan Solutions LTD : www.devlan.co.ke
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
                            <h5>Profit & Loss Statement Report From ' . date('M d Y', strtotime($start)) . ' To ' . date('M d Y', strtotime($end)) . ' </h5>
                        </div>
                        <table border="1" cellspacing="0" width="98%" style="font-size:9pt">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Date</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                    <th>Discounted Amount</th>
                                    <th>QTY</th>
                                    <th>Margin</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                ';
                                $ret = "SELECT * FROM sales s
                                INNER JOIN products p ON p.product_id = sale_product_id
                                INNER JOIN users us ON us.user_id = s.sale_user_id
                                WHERE p.product_store_id = '{$store}' AND s.sale_datetime BETWEEN '{$start}' AND '{$end}'
                                ORDER BY sale_datetime ASC ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                $cumulative_income = 0;
                                $cumulative_expenditure = 0;
                                while ($sales = $res->fetch_object()) {
                                    /* Sale Amount  */
                                    $sales_amount = $sales->sale_quantity * $sales->sale_payment_amount;
                                    $discounted_price = $sales->product_sale_price - $sales->sale_discount;
                                    $sale_margin = ($sales->product_sale_price - $sales->product_purchase_price) * $sales->sale_quantity;
                                    $cumulative_income += $sales_amount;
                                    $cumulative_expenditure += ($sales->product_purchase_price * $sales->sale_quantity);
                                    $html .=
                                    '
                                        <tr>
                                            <td style="width:100%">' . $sales->product_name . '</td>
                                            <td style="width:100%">' . date('d M Y g:ia', strtotime($sales->sale_datetime)) . '</td>
                                            <td style="width:100%">' . "Ksh " . number_format($sales->product_purchase_price, 2). '</td>
                                            <td style="width:100%">' . "Ksh " . number_format($sales->product_sale_price, 2) . '</td>
                                            <td style="width:100%">' . "Ksh " . number_format($discounted_price, 2) . '</td>
                                            <td style="width:40%">' . $sales->sale_quantity . '</td>
                                            <td style="width:100%">'. "Ksh " . number_format($sale_margin). '</td>
                                            <td style="width:100%">' . "Ksh " . number_format($sales_amount, 2) . '</td>
                                        </tr>
                                    ';
                                }
                                    $html .= '
                                    <tr>
                                        <td  colspan="7"><b>Cumulative Sales: </b></td>
                                        <td style="width:100%"><b>' . "Ksh " . number_format($cumulative_income, 2) . '</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><b>Cumulative Purchase: </b></td>
                                        <td style="width:100%"><b>'. "Ksh " . number_format($cumulative_expenditure, 2) . '</b></td>
                                    </tr>';
                                    if ($cumulative_expenditure > $cumulative_income) {
                                    $html .='
                                    <tr>
                                        <td colspan="7"><b>Cumulative Loss: </b></td>
                                        <td style="width:100%"><b>'. "Ksh " . number_format(abs($cumulative_income - $cumulative_expenditure), 2) . '</b></td>
                                    </tr>';
                                    } else if($cumulative_expenditure < $cumulative_income) {
                                    $html .='
                                    <tr>
                                        <td colspan="7"><b>Cumulative Profit: </b></td>
                                        <td style="width:100%"><b>'. "Ksh " . number_format(abs($cumulative_income - $cumulative_expenditure), 2) . '</b></td>
                                    </tr>';
                                    } else {
                                        $html .='
                                    <tr>
                                        <td colspan="7"><b>Cumulative Profit / Loss: </b></td>
                                        <td style="width:100%"><b>'. "Ksh " . number_format(($cumulative_income - $cumulative_expenditure), 2) . '</b></td>
                                    </tr>';
                                    }$html .='
                            </tbody>
                        </table>
                    </body>
                </html>
        ';
    $dompdf = new Dompdf();
    $dompdf->load_html($html);
    $dompdf->set_paper('A4');
    $dompdf->set_option('isHtml5ParserEnabled', true);
    $dompdf->render();
    $dompdf->stream('Profit And Loss Statement Report From ' . $start . ' To ' . $end, array("Attachment" => 1));
    $options = $dompdf->getOptions();
    $options->setDefaultFont('');
    $dompdf->setOptions($options);
}

