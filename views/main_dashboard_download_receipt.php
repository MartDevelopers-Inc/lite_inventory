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
require_once '../config/codeGen.php';
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
$store = $_GET['store'];

$date = new DateTime("now", new DateTimeZone('EAT'));

//Set Letter Head
$path = '../public/images/letterhead.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$letter_head = 'data:image/' . $type . ';base64,' . base64_encode($data);

/* Convert Image To Base 64 */

$html = '
    <style>
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

    body{
        font-family: Arial, sans-serif;
        font-size: 10pt;
    }
    .heading{
        letter-spacing: 1px;
        text-align:center;
    }
    .break-text{
        inline-size: 150px;
    }

    .footer {
        width: 100%;
        text-align: center;
        position: fixed;
        bottom: 5px;
    }
    </style>
    <body style="
    background-image: url('.$letter_head.');
    background-position: center;
    background-repeat: no-repeat;
    height: 500px;
    background-size: cover;">
        <div>
        <div class="footer">
            <hr>
            <i>NativeBeecare POS, Proudly Powered By Devlan Solutions LTD : www.devlan.co.ke</i>
        </div>
        <br><br><br><br><br><br>
        <h4 class="heading" style="font-size:10pt">
            <strong>';
                $sql = "SELECT * FROM receipt_customization rc
                INNER JOIN store_settings ss ON ss.store_id = rc.receipt_store_id
                WHERE ss.store_status = 'active' AND rc.receipt_store_id = '{$store}'";
                $res = mysqli_query($mysqli, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $receipts_header = mysqli_fetch_assoc($res);
                    $html .= '
                        ' . $receipts_header['receipt_header_content'] . ' <br>
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
       
        <table border="1" cellspacing="0" width="98%" style="font-size:9pt">
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
                            <td style="text-align:left;">
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
                        <td colspan="2"><strong>TOTAL:</strong></td>
                        <td style="text-align:right;" colspan=""><strong>Ksh ' . number_format($total_price, 2) . '</strong></td>
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
            '<br>
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
            </br>';
        }
}
$html .= '</body>';
$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper('A4', 'portrait');
//$dompdf->set_paper('A4');
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->render();
$dompdf->stream('Sale Receipt ' . $_GET["number"], array("Attachment" => 1));
/* Delete Posted Barcode */
unlink($path);
$options = $dompdf->getOptions();
$options->setDefaultFont('');
$dompdf->setOptions($options);
