<?php
/*
 * Created on Thu May 26 2022
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
require_once('../config/checklogin.php');
check_login();
require_once('../config/codeGen.php');
require_once('../vendor/autoload.php');
$view = $_GET['view'];
$code = $_GET['code'];
$amount = $_GET['amount'];

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
WHERE loyalty_points_code = '{$code}'";
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
                    <img src="' . $app_logo . '" width ="10%" align="center">
                    <br>
                    ' . $voucher_details->store_name . ' <br>
                    ' . $voucher_details->store_adr  . ' <br>
                    ' . $voucher_details->store_email  . ' <br>
                </h3>
                <h3 class="list_header letter_head" align="center">
                    <hr style="width:100%" >
                    LOYALTY POINTS VOUCHER OF '.$amount.' <br>
                    <hr style="width:100%" >
                </h3>
                <br>
                <div id="textbox">
                    <h4 class="list_header" align="center">
                        We have awarded this gift voucher to ' . $voucher_details->loyalty_points_customer_name . ', ' . $voucher_details->loyalty_points_customer_phone_no . ' 
                        for redeeming  '.$voucher_details->loyalty_points_count .' loyalty points. <br> Thank you for being our loyal customer.
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
}
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
