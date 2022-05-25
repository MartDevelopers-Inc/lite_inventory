<?php
/*
 * Created on Wed May 18 2022
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
require_once '../config/config.php';
require_once '../config/checklogin.php';
require_once '../config/codeGen.php';
check_login();
require_once('../vendor/autoload.php');

/* Dom PDF */

use Dompdf\Dompdf;

/* Load Barcode */

$dompdf = new Dompdf();

$total_quantity = 0;
$total_price = 0;
$number = $_GET['number'];
$customer = $_GET['customer'];
$phone = $_GET['phone'];
$points = $_GET['points'];

$date = new DateTime("now", new DateTimeZone('EAT'));

/* Convert Image To Base 64 */

$html = '
    <style>
    @page {
        margin: 0px 0px 6px 0px !important;
        padding: 0px 0px 0px 0px !important;
    }
    .heading{
        letter-spacing: 1px;
        text-align:center;
    }
    .break-text{
        inline-size: 150px;
    }
    .footer{
        font-size:8.4pt
    }
    </style>
    <body>
        <div>
        <h4 class="heading" style="font-size:10pt">
            <strong>';
                $sql = "SELECT * FROM receipt_customization rc
                INNER JOIN store_settings ss ON ss.store_id = rc.receipt_store_id
                WHERE ss.store_status = 'active'";
                $res = mysqli_query($mysqli, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $receipts_header = mysqli_fetch_assoc($res);
                    $html .= '
                        ' . $receipts_header['receipt_header_content'] . '
                        Receipt No. ' . $_GET["number"] . ' <br>';
                        if($receipts_header['show_customer'] == 'true'){
                        $html .=
                        '
                        Customer : ' . $_GET["customer"] . ' <br>';}
                        $html .=
                        '
                        Date: ' . $date->format('d M Y H:i') . 
                    '
            </strong>
            ';
        include('../helpers/dom_pdf/receipt_barcode.php');
        $html .=
            '
        </h4>
        </div>
        <hr>
        
        <table cellspacing="5"  style="font-size:8.4pt">
            <thead>
                <tr>
                    <th style="text-align:left;" width="2%">SL</th>
                    <th width="100%" style="text-align:left;"><strong>ITEM DESC</strong></th>
                    <th width="100%" style="text-align:right;"><strong>TOTAL</strong></th>
                </tr>
            </thead>
            <tbody>
                ';
                $ret = "SELECT * FROM sales s INNER JOIN products p ON p.product_id = s.sale_product_id
                WHERE s.sale_receipt_no = '{$number}'";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                $cnt = 1;
                while ($sales = $res->fetch_object()) {
                    /* Amount */

                    $html .=
                        '
                        <tr>
                            <td style="text-align:left;"><strong>' . $cnt . '. </strong></td>
                            <td style="text-align:left; overflow-wrap: break-word">
                                <strong>
                                    ' . $sales->product_name . '<br>
                                    ' . $sales->sale_quantity . ' X  Ksh ' . number_format($sales->sale_payment_amount, 2) . '
                                </strong>
                            </td>
                            <td style="text-align:right;"><strong>' . "Ksh " . number_format(($sales->sale_payment_amount * $sales->sale_quantity), 2) . '</strong></td>
                        </tr>
                            ';
                    $total_quantity += $sales->sale_quantity;
                    $total_price += ($sales->sale_payment_amount * $sales->sale_quantity);
                    $cnt++;
                }

                $html .= '
                    <tr>
                        <td colspan="1"><strong>TOTAL:</strong></td>
                        <td style="text-align:right;" colspan="2"><strong>Ksh ' . number_format($total_price, 2) . '</strong></td>
                    </tr>';
                    $html .= '
            </tbody>
        </table>';
        $sql = "SELECT * FROM sales s INNER JOIN users u ON
        u.user_id = s.sale_user_id
        WHERE s.sale_receipt_no = '{$number}'";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $users = mysqli_fetch_assoc($res);
            $html .=
            '<div class="footer">
                <hr>
                <p align="center"><strong>You Were Served By ' . $users['user_name'] . '<strong></p>
                ';
                if($receipts_header['allow_loyalty_points'] == 'true'){
                    /* Load Loyalty Points Details */
                    $html .=
                    '
                        <p align="center"><strong>Credited Points: ' . $points . '<strong></p>
                    ';
                }
                $html .=
                '<p align="center"><i>' . $receipts_header['receipt_footer_content'] . '</i></p>
            </div>';
        }
}
$html .= '</body>';
$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper(array(0, 0, 204, 650));
$dompdf->set_option('dpi', 80);
//$dompdf->set_paper('A4');
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->render();
$dompdf->stream('Sale Receipt ' . $_GET["number"], array("Attachment" => 1));
/* Delete Posted Barcode */
unlink($path);
$options = $dompdf->getOptions();
$options->setDefaultFont('');
$dompdf->setOptions($options);
