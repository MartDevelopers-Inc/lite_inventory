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
require_once('../config/checklogin.php');
check_login();
require_once('../config/codeGen.php');
require_once('../vendor/autoload.php');
$view = $_GET['view'];
$code = $_GET['code'];
$amount = $_GET['amount'];
$store = $_GET['store'];

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$barcode = new \Com\Tecnick\Barcode\Barcode();

/* Convert Logo To Base64 Image */
$path = '../public/images/logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$app_logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

/* Generate QR Code */
$targetPath = "../storage/cache/";
if (!is_dir($targetPath)) {
    mkdir($targetPath, 0777, true);
}
$qrcodedata = "$code - Verified Voucher";
$bobj = $barcode->getBarcodeObj(
    'QRCODE,H',
    "{$qrcodedata}",
    -4,
    -4,
    'black',
    array(-2, -2, -2, -2)
)->setBackgroundColor('white');
$imageData = $bobj->getPngData();
$timestamp = time();
file_put_contents($targetPath . $timestamp . '.png', $imageData);

/* Convert This QR Code To Base 64 Image */
$qrpath = $targetPath . $timestamp . '.png';
$qrtype = pathinfo($path, PATHINFO_EXTENSION);
$qrdata = file_get_contents($qrpath);
$qrbase64 = 'data:image/' . $qrtype . ';base64,' . base64_encode($qrdata);


/* Load Customer Details */
$ret = "SELECT * FROM  loyalty_points JOIN store_settings  
WHERE loyalty_points_code = '{$code}' AND store_id = '{$store}'";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($voucher_details = $res->fetch_object()) {
    /* Load Partials from helpers */
    $html = '<div style="margin:1px; page-break-after: always;">
            <style type="text/css">
                @media print {
                    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
                }
                

                #b_border {
                    border-bottom: dashed thin;
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
                    font-size: 80%;
                }


                .pagenum:before {
                    content: counter(page);
                }

                /* Thick Green border */
                hr {
                    border: 1px solid green dashed;
                }

                .list_header{
                    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                }

                /* Patient */
                .patient_details{
                    float: left;
                    text-align:left;
                    width:33.33333%;
                }

                /* Doctor */
                .doctor_details{
                    float: right;
                    text-align:right;
                    width:33.33333%;
                }

                /* Appointment Details */
                .appointment_details{
                    float: left;
                    text-align:center;
                    width:33.33333%;
                }

                /* Letter Head */
                .letter_head{
                    color: green; 
                }
            </style>
            <div class="pagebreak">
            <div class="footer letter_head list_header">
                <hr>
                <b>Voucher Generated On ' . date('M d Y g:ia') . '.</b>
            </div>
            <body>
                <h3 class="list_header" align="center">
                    ' . $voucher_details->store_name . ' <br>
                    ' . $voucher_details->store_adr  . ' <br>
                    ' . $voucher_details->store_email  . ' <br>
                </h3>
                <h3 class="list_header letter_head" align="center">
                    <hr style="width:100%" >
                    LOYALTY POINTS VOUCHER OF ' . $amount . ' <br>
                    <hr style="width:100%" >
                </h3>
                <br>
                <div id="textbox">
                    <h4 class="list_header" align="center">
                        We have awarded this gift voucher to ' . $voucher_details->loyalty_points_customer_name . ', ' . $voucher_details->loyalty_points_customer_phone_no . ' 
                        for redeeming  ' . $voucher_details->loyalty_points_count . ' loyalty points. <br> Thank you for being our loyal customer.
                    </h4>
                </div>';
    $html .= '
            </body>
            <br><br><br>
            <div class="list_header letter_head" align="center">
                <p>Scan This QR Code To Verify</p>
                <img src="' . $qrbase64 . '" width="150px" height="150px">
            </div>
        </div>
    </div>';

    $dompdf->load_html($html);
    $canvas = $dompdf->getCanvas();
    $w = $canvas->get_width();
    $h = $canvas->get_height();
    $imageURL = '../public/images/logo.png';
    $imgWidth = 500;
    $imgHeight = 500;
    $canvas->set_opacity(.3);
    $x = (($w - $imgWidth) / 2);
    $y = (($h - $imgHeight) / 2);
    $canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight);
    $dompdf->render();
    $dompdf->stream('Voucher Number ' . $code, array("Attachment" => 1));
    $options = $dompdf->getOptions();
    $dompdf->set_paper('A4');
    $dompdf->set_option('isHtml5ParserEnabled', true);
    $options->setDefaultFont('');
    $dompdf->setOptions($options);
    /* Delete QR Code After Burning It To The DOM PDF */
    unlink($qrpath);

    /* Set Points To Zero After Successful Model */
    if (isset($_GET['code'])) {
        $log_type =  "Sales Management Logs";
        $log_details = "$voucher_details->loyalty_points_customer_name,
        $voucher_details->loyalty_points_customer_phone_no Redeemed $voucher_details->loyalty_points_count Points To $amount";

        $sql = "UPDATE loyalty_points SET loyalty_points_count  = '0' WHERE loyalty_points_code = '{$code}'";
        $prepare = $mysqli->prepare($sql);
        $prepare->execute();
        /* Log This Operation */
        include('../functions/logs.php');
    }
}
